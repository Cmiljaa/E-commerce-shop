<?php 

class Cart extends Database{

    public function addToCart($product_id, $user_id, $quantity){
        $sql = "INSERT INTO cart(product_id, user_id, quantity) VALUES (?,?,?)";

        $stmt = $this->conn->prepare($sql);

        $stmt -> bind_param("iis", $product_id, $user_id, $quantity);

        $stmt -> execute();
    }

    public function getCartItems(){
        $sql = "SELECT p.product_id, p.name, p.price, p.size, p.image, c.quantity FROM cart c INNER JOIN products p ON c.product_id = p.product_id WHERE user_id = ?";

        $stmt = $this -> conn -> prepare($sql);

        $stmt -> bind_param("i", $_SESSION['user_id']);

        $stmt -> execute();

        $result = $stmt -> get_result();

        return $result -> fetch_all(MYSQLI_ASSOC);
    }

    public function destroyCart(){
        $stmt = $this->conn->prepare("DELETE FROM cart WHERE user_id = ?");

        $stmt -> bind_param("i", $_SESSION['user_id']);

        $stmt -> execute();
    }
}