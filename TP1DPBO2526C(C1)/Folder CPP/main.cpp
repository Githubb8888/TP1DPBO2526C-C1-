#include <iostream>
#include <vector>
#include <string>

using namespace std;

class Movie {
public:
    string id, title, genre, price;
    Movie(string i, string t, string g, string p) : id(i), title(t), genre(g), price(p) {}
};

int main() {
    vector<Movie> movies;
    string choice, id, title, genre, price;

    while (true) {
        cout << "\n1. Tambah 2. Tampil 3. Update 4. Hapus 5. Cari 0. Keluar\nPilih: ";
        cin >> choice;
        
        if (choice == "1") {
            cout << "ID: "; cin >> id; cout << "Judul: "; cin >> title;
            cout << "Genre: "; cin >> genre; cout << "Harga: "; cin >> price;
            movies.push_back(Movie(id, title, genre, price));
        } else if (choice == "2") {
            for (const auto& m : movies) {
                cout << m.id << " | " << m.title << " | " << m.genre << " | " << m.price << "\n";
            }
        } else if (choice == "3") {
            cout << "ID Update: "; cin >> id;
            for (auto& m : movies) {
                if (m.id == id) {
                    cout << "Judul baru: "; cin >> m.title;
                    cout << "Genre baru: "; cin >> m.genre;
                    cout << "Harga baru: "; cin >> m.price;
                }
            }
        } else if (choice == "4") {
            cout << "ID Hapus: "; cin >> id;
            for (auto it = movies.begin(); it != movies.end(); ) {
                if (it->id == id) it = movies.erase(it);
                else ++it;
            }
        } else if (choice == "5") {
            cout << "ID Cari: "; cin >> id;
            for (const auto& m : movies) {
                if (m.id == id) cout << "Ketemu: " << m.title << "\n";
            }
        } else if (choice == "0") {
            break;
        }
    }
    return 0;
}