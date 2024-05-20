<?php 

require_once '../config/config.php';

class User{

    private $conn;

    public function create($name, $username, $email, $password){

        $password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users(name, username, email, password) VALUES(?, ?, ?, ?)";

        $stmt = $this->conn->prepare($sql);



    }
}