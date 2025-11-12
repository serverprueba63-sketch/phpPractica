
<?php 
$hostname = "sql204.infinityfree.com";
$username = "if0_40340257";
$password = "wZHxqx2IuatsS";
$database = "if0_40340257_biblioteca";

try{
    $connection = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
    $connection -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sqlQuery = "SELECT * FROM Libros";

    $result = $connection -> query($sqlQuery);

    foreach($result as $field){
        echo $field["ID_LIBRO"] . "<br>";
        echo $field["Titulo"] . "<br>";
        echo $field["Genero"] . "<br>";
        echo $field["Año_Publicacion"] . "<br>";
        echo $field["Disponible"] . "<br>";
    }

}catch(PDOException $e){
    echo "Error: " . $e -> getMessage();
}

$connection = null;