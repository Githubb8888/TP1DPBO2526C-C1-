<?php
session_start();

class Movie {
    public $id, $title, $genre, $price, $image;
    public function __construct($id, $title, $genre, $price, $image) {
        $this->id = $id; $this->title = $title; $this->genre = $genre; 
        $this->price = $price; $this->image = $image;
    }
}

if (!isset($_SESSION['movies'])) $_SESSION['movies'] = [];

if (isset($_POST['action'])) {
    $id = $_POST['id'];
    if ($_POST['action'] == 'tambah') {
        $_SESSION['movies'][$id] = new Movie($id, $_POST['title'], $_POST['genre'], $_POST['price'], $_POST['image']);
    } elseif ($_POST['action'] == 'hapus') {
        unset($_SESSION['movies'][$id]);
    } elseif ($_POST['action'] == 'update' && isset($_SESSION['movies'][$id])) {
        $_SESSION['movies'][$id]->title = $_POST['title'];
        $_SESSION['movies'][$id]->genre = $_POST['genre'];
        $_SESSION['movies'][$id]->price = $_POST['price'];
        $_SESSION['movies'][$id]->image = $_POST['image'];
    }
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

$search_result = null;
if (isset($_GET['search_id'])) {
    $sid = $_GET['search_id'];
    if (isset($_SESSION['movies'][$sid])) $search_result = $_SESSION['movies'][$sid];
}
?>

<!DOCTYPE html>
<html>
<head><title>Bioskop CRUD PHP</title></head>
<body>
    <form method="POST">
        <input type="text" name="id" placeholder="ID" required>
        <input type="text" name="title" placeholder="Judul" required>
        <input type="text" name="genre" placeholder="Genre" required>
        <input type="number" name="price" placeholder="Harga" required>
        <input type="text" name="image" placeholder="Path Gambar (img/poster.jpg)" required>
        <button type="submit" name="action" value="tambah">Tambah</button>
        <button type="submit" name="action" value="update">Update</button>
    </form>

    <form method="GET">
        <input type="text" name="search_id" placeholder="Cari ID">
        <button type="submit">Cari</button>
    </form>

    <?php if($search_result): ?>
        <p>Hasil Cari: <?= $search_result->title ?> | <?= $search_result->genre ?></p>
    <?php endif; ?>

    <table border="1">
        <tr><th>ID</th><th>Judul</th><th>Genre</th><th>Harga</th><th>Gambar</th><th>Aksi</th></tr>
        <?php foreach ($_SESSION['movies'] as $m): ?>
        <tr>
            <td><?= $m->id ?></td>
            <td><?= $m->title ?></td>
            <td><?= $m->genre ?></td>
            <td><?= $m->price ?></td>
            <td><?= $m->image ?></td>
            <td>
                <form method="POST">
                    <input type="hidden" name="id" value="<?= $m->id ?>">
                    <button type="submit" name="action" value="hapus">Hapus</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>