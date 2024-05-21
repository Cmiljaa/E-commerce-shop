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


}