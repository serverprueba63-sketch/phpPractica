<?php
$servername = "localhost";
$user = "wuser";
$password = "abc123.";
$DB = "world";

try {
  $connection = new PDO("mysql:host=$servername; dbname=$DB", $user, $password);

  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


  //2. Process
  
  //$sql = "DELETE FROM city WHERE ID = 4084";
  
  $sql = "DELETE FROM city WHERE CountryCode = 'AFG'";

  $num = $connection->exec($sql);

  echo "Number of deleted records: " . $num;
  
} catch (PDOException $exception) {
  echo "Connection failed " . $exception->getMessage();
}

$connection = null;