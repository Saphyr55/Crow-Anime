<?php
$connection_file = '/assets/data/connection.json';
if (file_exists($connection_file)) {
    $data_connection = file_get_contents($connection_file);
    
    $connection = json_decode($data_connection);
    $host = $connection->host;
    $username = $connection->username;
    $password = $connection->password;
    $dbname = $connection->dbname;

    $bdd = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
}
