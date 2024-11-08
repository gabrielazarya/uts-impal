public class Product {
    private int id;
    private String name;
    private double price;

    public Product(int id, String name, double price) {
        this.id = id;
        this.name = name;
        this.price = price;
    }

    public double getPrice(int id) {
        if (this.id == id) {
            return price;
        }
        return 0;
    }
}
