<?php 

require_once '../app/classes/User.php';
require_once '../app/config/config.php';
require_once '../app/classes/Product.php';

$user = new User();

if(!$user->isLogged() || !$user->isAdmin()){
    header("Location: ../login.php");
    exit();
}
else{
    
    $admin = new Product();

    $admin -> delete($_GET['id']);

    header("Location: index.php");

    exit();
}