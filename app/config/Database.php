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

    public function getConnection(){
        session_start();
        return $this-> conn;
    }

}