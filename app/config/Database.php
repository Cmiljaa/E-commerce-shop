<?php 

class Database{

    protected $conn;

    public function __construct()
    {
        $this->conn = mysqli_connect("localhost", "root", "", "shop");
        if(!$this->conn){
            echo "Error! Database is not connected!";
        }
        session_start();
    }

    public function getConnection(){
        return $this->conn;
    }


}