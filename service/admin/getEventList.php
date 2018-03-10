<?php
    // include("../connection.php");
    $connection = new PDO(
        "mysql:host=localhost;dbname=webtech1;charset=utf8mb4",
        "root",
        ""
    );    
    $statement = $connection->prepare("SELECT * FROM event ");
    $statement->execute();
    $events = $statement->fetchAll(PDO::FETCH_OBJ);

    
?>
