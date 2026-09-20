class Movie:
    def __init__(self, id_movie, title, genre, price):
        self.id = id_movie
        self.title = title
        self.genre = genre
        self.price = price

movies = []

while True:
    print("\n1. Tambah  2. Tampil  3. Update  4. Hapus  5. Cari  0. Keluar")
    pilihan = input("Pilih: ")

    if pilihan == '1':
        movies.append(Movie(input("ID: "), input("Judul: "), input("Genre: "), input("Harga: ")))
    elif pilihan == '2':
        for m in movies:
            print(f"{m.id} | {m.title} | {m.genre} | {m.price}")
    elif pilihan == '3':
        m_id = input("ID Update: ")
        for m in movies:
            if m.id == m_id:
                m.title = input("Judul baru: ")
                m.genre = input("Genre baru: ")
                m.price = input("Harga baru: ")
    elif pilihan == '4':
        m_id = input("ID Hapus: ")
        movies = [m for m in movies if m.id != m_id]
    elif pilihan == '5':
        m_id = input("ID Cari: ")
        for m in movies:
            if m.id == m_id:
                print(f"Ketemu: {m.title} | {m.genre}")
    elif pilihan == '0':
        break