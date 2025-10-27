<?php
$servername = "localhost";
$user = "wuser";
$password = "abc123.";
$DB = "world";

try {
  $connection = new PDO("mysql:host=$servername; dbname=$DB", $user, $password);

  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


  //2. Process
  //1. copy the template from phpMyAdmin
  //$sql = "INSERT INTO `city`(``) VALUES (NULL, `CabezaDeVaca`, `ESP`, `\`, ``)"

  //$sql = "INSERT INTO city (Name, CountryCode, Population) VALUE('Moreiras', 'ESP', 601)";

  //echo $sql;
  //2. set a sentence with previus cariables
  $nameCity = "Vila de Cruces";
  $codeCountry = "ESP";
  $population = 5082;
  
  $sql = "INSERT INTO city (Name, CountryCode, Population) VALUE('" . $nameCity . "', '" . $codeCountry . "', " . $population . ")";
  
  $connection->exec($sql);
  echo "<br>Record Inserted";
  
} catch (PDOException $exception) {
  echo "Connection failed " . $exception->getMessage();
}

$connection = null;