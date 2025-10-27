<?php
$servername = "localhost";
$username = "wuser";
$password = "abc123.";
$myDb = "world";


try {
  //1. Open
  $conn = new PDO("mysql:host=$servername;dbname=$myDb", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";

  //2. Process

/*  
  $sql = "SELECT * FROM city WHERE CountryCode = 'ESP'"

  $sql = "SELECT * FROM city WHERE CountryCode = (SELECT code FROM country WHERE Name = 'Spain') ORDER BY Population desc";
*/
  /*Select (fields) from table1, table2 Where t1.x=t2.Y and t2.z = 'Spain' sin joins
  $sql = "SELECT city.Name, city.Population FROM city, country WHERE city.CountryCode=country.Code AND country.Name='Spain'";*/
  //Usando Joins
  $sql = "SELECT city.Name, city.Population FROM city JOIN country on city.CountryCode = country.Code WHERE country.Name = 'Spain'";

  $result = $conn -> query($sql);

  foreach($result as $row){
    echo $row["Name"] . " | " . $row["Population"] . "<br><br>";
  }   

} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

//3. Close
$conn = null;

