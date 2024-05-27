<?php

require_once 'app/config/Database.php';
require_once 'app/classes/User.php';
require_once 'inc/header.php';

$db -> startSession();

$user = new User();

$user -> logout();

$response -> redirect("Location: login.php");