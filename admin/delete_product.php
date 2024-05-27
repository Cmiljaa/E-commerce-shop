<?php 

require_once 'admin_config.php';

$product -> delete($_GET['id']);

$response -> redirect("Location: index.php");
