<?php 

require_once '../app/config/Database.php';
require_once '../app/classes/User.php';
require_once '../app/classes/Product.php';

$db = new Database();

$db -> startSession();

$user = new User();

if(!$user->isAdmin()){
    header("Location: ../login.php");
    exit();
}

$product = new Product();