<?php 

class User{

    protected $conn;

    public function __construct()
    {
        global $conn;
        $this -> conn = $conn;
    }

    public function create($name, $username, $email, $password){

        $password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users(name, username, email, password) VALUES(?, ?, ?, ?)";

        $stmt = $this->conn->prepare($sql);

        $stmt -> bind_param("ssss", $name, $username, $email, $password);

        $result = $stmt -> execute();

        if($result){
           $_SESSION['message']['type'] = "success";
           $_SESSION['message']['text'] = "Successfully added member!";
           header("Location: index.php");
           exit();
        }
        else{
            $_SESSION['message']['type'] = "danger";
            $_SESSION['message']['text'] = "Error!";
            header("Location: register.php");
            exit();
        }
    }
}