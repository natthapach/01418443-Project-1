<?php
    // include("../connection.php");
    $connection = new PDO(
        "mysql:host=localhost;dbname=webtech1;charset=utf8mb4",
        "root",
        ""
    );    
    $statement = $connection->prepare("SELECT e.*, o.name as 'organizer_name', COUNT(ad.event_id) as attendant FROM event as e JOIN organizer as o ON e.organizer_id = o.id LEFT JOIN attendences as ad ON e.id = ad.event_id GROUP BY e.id");
    $statement->execute();
    $events = $statement->fetchAll(PDO::FETCH_OBJ);

    
?>
