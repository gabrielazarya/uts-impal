public class OrderDetail {
    public int productId;
    public int quantity;
    private double subTotal;
    private Product product;

    public OrderDetail(int productId, int quantity, Product product) {
        this.productId = productId;
        this.quantity = quantity;
        this.product = product;
        calculateSubTotal();
    }

    public void setQuantity(int quantity) {
        this.quantity = quantity;
        calculateSubTotal();
    }

    private void calculateSubTotal() {
        double price = product.getPrice(productId);
        this.subTotal = price * quantity;
    }

    public double getSubTotal() {
        return subTotal;
    }
}
