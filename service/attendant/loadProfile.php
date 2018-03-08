<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "webtech";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT * FROM attendants;"); 
    $stmt->execute();
    $events = $stmt->fetchAll(PDO::FETCH_OBJ);

 

    echo json_encode($events);
}
catch(PDOException $e) {
    echo "[]";
}
?>