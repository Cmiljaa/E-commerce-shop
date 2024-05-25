<?php 

Class Product{
    protected $conn;

    public function __construct()
    {
        global $conn;
        $this -> conn = $conn;
    }

    public function get_products(){

        $sql = "SELECT * FROM products";

        $stmt = $this -> conn -> query($sql);

        return $stmt -> fetch_all(MYSQLI_ASSOC);
    }

    public function create($name, $price, $size, $image){

        $stmt = $this -> conn -> prepare("INSERT INTO products(name, price, size, image) VALUES(?,?,?,?)");

        $stmt -> bind_param("ssss", $name, $price, $size, $image);

        $stmt -> execute();

    }

    public function read($product_id){

        $sql = "SELECT * FROM products WHERE product_id = ?";

        $stmt = $this->conn->prepare($sql);

        $stmt -> bind_param("i", $product_id);

        $stmt -> execute();

        $result = $stmt -> get_result();

        return $result -> fetch_assoc();

    }

    public function update($product_id, $name, $price, $size, $image){

        $stmt = $this -> conn -> prepare("UPDATE products SET name=?, price=?, size=?, image=? WHERE product_id = ? ");

        $stmt -> bind_param("ssssi", $name, $price, $size, $image, $product_id);

        $stmt -> execute();

    }

    public function delete($product_id){
        
        $stmt = $this -> conn -> prepare("DELETE FROM products WHERE product_id = ?");

        $stmt -> bind_param("i", $product_id);

        $stmt -> execute();
    }

}