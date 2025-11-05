<?php
    $servername = "localhost";
    $username = "wuser";
    $password = "abc123.";
    $database = "world";

    try {
        //Connection
        $connection = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $connection -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $nameCity = $_POST["nameCity"];
            $percent  = 1.10;
            //process
            $sqlUpdate = "UPDATE city SET Population = Population * :percent WHERE Name = :nameCity";

            //Prepare query
            $stm = $connection -> prepare($sqlUpdate);

            $stm -> bindParam(":percent", $percent, PDO::PARAM_STR);
            $stm -> bindParam(":nameCity", $nameCity, PDO::PARAM_STR);

            //Execute query
            $stm -> execute();
            $num = $stm -> rowCount();

            echo "update: " . $num;

        }

    }catch(PDOException $e){
        echo "Error to connection " . $e -> getMessage();
    }