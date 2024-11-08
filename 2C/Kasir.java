import java.util.Scanner;

public class Kasir {
    public static void main(String[] args) {
        Order order = new Order();
        Printer printer = new Printer();
        
        // Setting ID untuk Order
        order.setId(1);

        // Membuat produk contoh
        Product product1 = new Product(101, "Produk A", 10.0);
        Product product2 = new Product(102, "Produk B", 20.0);

        // Tambahkan produk ke order
        order.addOrderDetail(101, 2, product1); // Product ID 101, Quantity 2
        order.addOrderDetail(102, 3, product2); // Product ID 102, Quantity 3

        // Hitung total
        double total = order.calculateTotal();
        System.out.println("Total Order: " + total);

        // Cetak struk
        String struk = order.loadData();
        printer.printStruk(struk);
    }
}
