<?php
    session_start();
    // fake user name
    $_SESSION["current_username"] = "organizer01";

    $username = $_SESSION["current_username"];
    
    $connection = new PDO(
        "mysql:host=localhost;dbname=webtech1;charset=utf8mb4",
        "root",
        ""
    );

    $statement = $connection->prepare(
        'select e.*, COUNT(at.event_id) as attendants
        from event as e 
        join organizer as o 
        on o.id = e.organizer_id 
        join account as a 
        on o.user_name = a.user_name 
        left join attendences as at
        ON at.event_id = e.id
        where a.user_name=:username
        GROUP BY e.id'
    );

    $statement->execute([
        ":username"=>$username
    ]);

    $result = $statement->fetchAll(PDO::FETCH_OBJ);
    echo json_encode($result);
?>