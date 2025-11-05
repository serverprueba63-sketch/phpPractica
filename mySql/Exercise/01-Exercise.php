<!DOCTYPE html>
<html>
<body>

<?php

$servername = "localhost";
$username = "wuser";
$password = "abc123.";
$myDB = "world";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$myDB", $username, $password);
    $conn->exec("set names utf8");
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //echo "Connection successfully<br>";

    $sql = "SELECT Name from city WHERE CountryCode like 'ESP'";
    $result = $conn->query($sql);
?>
<form action="./01-ExerciseUpdate.php" method="post">
City: <select name="nameCity">
<?php
    foreach ($result as $row){
        echo '<option  value="' . $row["Name"] .'">'.  $row["Name"]  . '</option>';
    }
?>
</select>
<input type="submit" value="Increment population">
</form>
<?php
}
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;
?>