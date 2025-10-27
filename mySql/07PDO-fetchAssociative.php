<?php 
$servername = "localhost";
$user = "wuser";
$password = "abc123.";
$DB = "world";

try {
  $connection = new PDO("mysql:host=$servername; dbname=$DB", $user,$password);

  $connection -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $query = "SELECT * from country ORDER BY Name desc";
  $result = $connection -> query($query);

  while ($tuple = $result -> fetch(PDO::FETCH_ASSOC)){
    echo $tuple["Name"] . "<<>>" . $tuple["SurfaceArea"] . "<br>";
  }
} catch(PDOException $exception){
  echo "Connection failed " . $exception -> getMessage(); 
}

$connection = null;