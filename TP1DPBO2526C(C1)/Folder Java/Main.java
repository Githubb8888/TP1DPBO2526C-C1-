import java.util.ArrayList;
import java.util.Scanner;

class Movie {
    String id, title, genre, price;
    public Movie(String id, String title, String genre, String price) {
        this.id = id; this.title = title; this.genre = genre; this.price = price;
    }
}

public class Main {
    public static void main(String[] args) {
        ArrayList<Movie> movies = new ArrayList<>();
        Scanner sc = new Scanner(System.in);
        
        while(true) {
            System.out.print("\n1.Tambah 2.Tampil 3.Update 4.Hapus 5.Cari 0.Keluar\nPilih: ");
            String choice = sc.nextLine();
            
            if(choice.equals("1")) {
                System.out.print("ID: "); String id = sc.nextLine();
                System.out.print("Judul: "); String title = sc.nextLine();
                System.out.print("Genre: "); String genre = sc.nextLine();
                System.out.print("Harga: "); String price = sc.nextLine();
                movies.add(new Movie(id, title, genre, price));
            } else if(choice.equals("2")) {
                for(Movie m : movies) {
                    System.out.println(m.id + " | " + m.title + " | " + m.genre + " | " + m.price);
                }
            } else if(choice.equals("3")) {
                System.out.print("ID Update: "); String id = sc.nextLine();
                for(Movie m : movies) {
                    if(m.id.equals(id)) {
                        System.out.print("Judul baru: "); m.title = sc.nextLine();
                        System.out.print("Genre baru: "); m.genre = sc.nextLine();
                        System.out.print("Harga baru: "); m.price = sc.nextLine();
                    }
                }
            } else if(choice.equals("4")) {
                System.out.print("ID Hapus: "); String id = sc.nextLine();
                movies.removeIf(m -> m.id.equals(id));
            } else if(choice.equals("5")) {
                System.out.print("ID Cari: "); String id = sc.nextLine();
                for(Movie m : movies) {
                    if(m.id.equals(id)) System.out.println("Ketemu: " + m.title);
                }
            } else if(choice.equals("0")) {
                break;
            }
        }
    }
}