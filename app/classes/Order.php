<?php 

class Order extends Cart{

    protected $conn;

    public function __construct()
    {
        global $conn;

        $this -> conn = $conn;
    }

    public function create(){
        
    }



}