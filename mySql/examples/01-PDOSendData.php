<?php

$servername = "localhost";
$user = "wuser";
$password = "abc123.";
$DB = "world";

$nameCity = $countryCode = "";
$population;



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $connection = new PDO("mysql:host=$servername; dbname=$DB", $user, $password);

        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $nameCity = test_input($_POST['nameCity']);
        $countryCode = test_input($_POST['countryCode']);
        $population = $_POST['population'];


        $sqlInsert = "INSERT INTO city (Name, CountryCode, Population) VALUES (:nameCity, :countryCode, :population)";

        $stm = $connection -> prepare($sqlInsert);

        $stm -> bindParam(":nameCity", $nameCity, PDO::PARAM_STR);
        $stm -> bindParam(":countryCode",$countryCode, PDO::PARAM_STR);
        $stm -> bindParam(":population", $population, PDO::PARAM_INT);

        $stm -> execute();
        echo "<br>Record Inserted";

    } catch (PDOException $e) {
        echo "Connection Failed " . $e->getMessage();
    }
    $connection = null;
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


