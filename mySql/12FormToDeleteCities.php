<?php

$servername = "localhost";
$user = "wuser";
$password = "abc123.";
$DB = "world";

try {
  $connection = new PDO("mysql:host=$servername; dbname=$DB", $user, $password);

  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if($_SERVER['REQUEST_METHOD'] == "GET"){
        $countryCode = $_GET['countryCode'];
        $sqlDelete = "DELETE FROM city WHERE CountryCode like :countryCode";

        //Preparamos la sentencia sql
        $stm = $connection -> prepare($sqlDelete);

        $stm -> bindParam(':countryCode', $countryCode, PDO::PARAM_STR);

        $stm -> execute();

        $num = $stm -> rowCount();

        echo "Tuplas eliminadas: " . $num;
    }
  
} catch (PDOException $exception) {
  echo "Connection failed " . $exception->getMessage();
}

$connection = null;

