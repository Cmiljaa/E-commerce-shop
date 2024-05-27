<?php

require_once 'app/config/Database.php';
require_once 'app/classes/User.php';
require_once 'inc/header.php';

$db -> startSession();

$user = new User();

$user -> logout();

header("Location: login.php");
exit();