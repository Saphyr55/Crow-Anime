<?php

use Backend\Database;

require_once $_SERVER["DOCUMENT_ROOT"].'/core/backend/Database.php';
$encoding = 'UTF-8';
$lang = 'en';
$title = 'not found';
$page = $_SERVER['PHP_SELF'];
$sec = "5";
$bdd = Database::getDatabase();
