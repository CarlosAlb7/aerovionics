<?php

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'basewebsite';

try {
  $conn = new PDO("mysql:host=localhost;dbname=basewebsite", "root","");
} catch (PDOException $e) {
  die('Connection Failed: ' . $e->getMessage());
}

?>
