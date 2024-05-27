<?php

require_once 'app/config/Database.php';
require_once 'app/classes/User.php';
require_once 'inc/header.php';

session_start();

$user = new User();

$user -> logout();

header("Location: login.php");
exit();