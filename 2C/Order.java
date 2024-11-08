import java.util.ArrayList;
import java.util.List;

public class Order {
    private int id;
    private List<OrderDetail> orderDetails;

    public Order() {
        this.orderDetails = new ArrayList<>();
    }

    public void setId(int id) {
        this.id = id;
    }

    public void addOrderDetail(int productId, int quantity, Product product) {
        OrderDetail detail = new OrderDetail(productId, quantity, product);
        orderDetails.add(detail);
    }

    public double calculateTotal() {
        double total = 0;
        for (OrderDetail detail : orderDetails) {
            total += detail.getSubTotal();
        }
        return total;
    }

    public String loadData() {
        StringBuilder struk = new StringBuilder();
        struk.append("Order ID: ").append(id).append("\n");
        for (OrderDetail detail : orderDetails) {
            struk.append("Product ID: ").append(detail.productId)
                 .append(" Quantity: ").append(detail.quantity)
                 .append(" SubTotal: ").append(detail.getSubTotal()).append("\n");
        }
        struk.append("Total: ").append(calculateTotal()).append("\n");
        return struk.toString();
    }
}
