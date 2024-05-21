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

    public function login($username, $password){

        $sql = "SELECT * FROM users WHERE username = ?";

        $stmt = $this -> conn -> prepare($sql);

        $stmt -> bind_param("s", $username);

        $stmt -> execute();

        $results = $stmt -> get_result();

        if($results -> num_rows == 1){
            $user = $results -> fetch_assoc();

            if(password_verify($password, $user['password'])){

                $_SESSION['user_id'] = $user['user_id'];

                return true;
            }

        }
        return false;
    }

    public function isLogged(){

        if(isset($_SESSION['user_id'])){
            return true;
        }

        return false;   
    }

    public function logout(){
        unset($_SESSION['user_id']);
    }
}