<?php 

session_start();

$conn = mysqli_connect("localhost", "root", "", "shop");

if(!$conn){
    echo "Error! Database is not connected!";
}
