<?php

$host = "localhost";
$username = "root";
$password = "";
$dbname = "car_dealership";
$dsn = "mysql:host=$host;dbname=$dbname";
$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

try {
    $pdo = new PDO($dsn, $username, $password, $options);
    return $pdo;

} catch (\PDOException $error) {
    throw new \PDOException($error->getMessage(), (int) $error->getCode());
}


