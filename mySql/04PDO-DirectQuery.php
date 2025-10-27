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

  $sql = "SELECT * FROM city";

  $result = $conn -> query($sql);

  foreach($result as $row){
    echo $row["Name"] . " " . $row["Population"] . "<br>";
  }   

} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

//3. Close
$conn = null;
?>
