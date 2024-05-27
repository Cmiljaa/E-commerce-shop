<?php 

require_once '../app/config/Database.php';
require_once '../app/classes/User.php';
require_once '../app/classes/Product.php';
require_once '../app/config/ResponseManager.php';

$response = new ResponseManager();

$db = new Database();

$db -> startSession();

$user = new User();

if(!$user->isAdmin()){
    $response -> redirect("Location: ../login.php");
}

$product = new Product();