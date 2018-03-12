<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "webtech1";
try {
    $conn = new PDO(
        "mysql:host=localhost;dbname=webtech1;charset=utf8mb4",
        "root",
        ""
    );
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
    $stmt = $conn->prepare("SELECT * FROM category");
    $stmt->execute();
    $categories = $stmt->fetchAll(PDO::FETCH_OBJ);
    if ($categories !== false) {
        echo json_encode($categories);
    } else {
        echo "[]";
    }
    
}
catch(PDOException $e) {
    echo "[]";
}
?>