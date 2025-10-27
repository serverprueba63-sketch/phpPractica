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


        $sqlInsert = "INSERT INTO city (Name, CountryCode, Population) VALUES ('" . $nameCity . "', '" . $countryCode . "'," . $population . ")";

        $connection -> exec($sqlInsert);
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


