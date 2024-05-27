<?php 

require_once 'config.php';

$product -> delete($_GET['id']);

header("Location: index.php");

exit();