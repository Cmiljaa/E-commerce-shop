<?php 

require_once 'Cart.php';

class Order extends Cart{

    public function create($delivery_address){
        $stmt = $this->conn->prepare("INSERT INTO orders(user_id, delivery_address) VALUES(?,?)");

        $stmt-> bind_param("is", $_SESSION['user_id'], $delivery_address);

        $stmt -> execute();

        $order_id = $this->conn->insert_id;

        $cart_items = $this -> getCartItems();

        $stmt = $this->conn->prepare("INSERT INTO order_items(order_id, product_id, quantity) VALUES(?, ?, ?)");

        foreach($cart_items as $item){
            $stmt -> bind_param("iis", $order_id, $item['product_id'], $item['quantity']);

            $stmt -> execute();
        }

        $this -> destroyCart();
    }

    public function getOrders(){
        $stmt = $this->conn->prepare("SELECT o.order_id, o.delivery_address, o.created_at, p.price, p.size, p.image, p.name, oi.quantity
        FROM orders o
        INNER JOIN order_items oi USING(order_id)
        INNER JOIN products p USING(product_id) WHERE user_id = ?");

        $stmt -> bind_param("i", $_SESSION['user_id']);

        $stmt -> execute();

        $results = $stmt-> get_result();

        $results = $results -> fetch_all(MYSQLI_ASSOC);

        return $results;
    }

}