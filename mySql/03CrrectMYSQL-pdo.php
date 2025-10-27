<?php
$servername = "localhost";
$username = "wuser";
$password = "abc123.";
$myDb = "world";


try {
  $conn = new PDO("mysql:host=$servername;dbname=$myDb", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
