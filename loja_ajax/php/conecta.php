<?php

$host = 'localhost';
$name = 'loja_ajax';
$user = 'developer';
$pass = 'developer';
$port = '3306';

try {
    $conn = new PDO("mysql:host={$host};port={$port};dbname={$name}",$user,$pass);
} catch (PDOException $e) {
    echo $e->getMessage();
}
