<?php 

Class Product{
    protected $conn;

    public function __construct()
    {
        global $conn;
        $this -> conn = $conn;
    }

    public function fetch_all(){

        $sql = "SELECT * FROM products";

        $stmt = $this -> conn -> query($sql);

        return $stmt -> fetch_all(MYSQLI_ASSOC);
    }

    public function read($product_id){

        $sql = "SELECT * FROM products WHERE product_id = ?";

        $stmt = $this->conn->prepare($sql);

        $stmt -> bind_param("i", $product_id);

        $stmt -> execute();

        $result = $stmt -> get_result();

        return $result -> fetch_assoc();

    }

}