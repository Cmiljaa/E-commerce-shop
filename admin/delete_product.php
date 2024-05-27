<?php 

require_once 'admin_config.php';

$product -> delete($_GET['id']);

header("Location: index.php");

exit();