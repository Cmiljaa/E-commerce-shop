<?php 

class Database{

    protected $conn;

    public function __construct()
    {
        $this->conn = mysqli_connect("localhost", "root", "", "shop");

        if(!$this->conn){
            echo "Error! Database is not connected!";
        }
    }

    public function startSession(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

}