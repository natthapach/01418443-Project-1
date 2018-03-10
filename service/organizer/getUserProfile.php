<?php
    include("../connection.php");
    session_start();
    // fake user name
    $_SESSION["current_username"] = "organizer01";

    $username = $_SESSION["current_username"];

    $statement = $connection->prepare(
        "select o.*, a.profile, s.*, s2.*
        from organizer as o
        join account as a 
        on a.user_name = o.user_name 
        CROSS JOIN (SELECT count(*) as 'total_event'
                    FROM event as e 
                    JOIN organizer as o
                    ON e.organizer_id = o.id
                    WHERE o.user_name=:username) as s
        CROSS JOIN (SELECT COUNT(*) as 'total_attendant'
                    FROM event as e 
                    JOIN organizer as o
                    ON e.organizer_id = o.id
                       JOIN attendences as a
                    ON a.event_id = e.id
                    WHERE o.user_name=:username) as s2
        where o.user_name=:username"
    );

    $statement->execute([
        ":username"=>$username
    ]);

    $result = $statement->fetchAll(PDO::FETCH_OBJ);

    if(sizeof($result) > 0){
        echo json_encode($result[0]);
    }else{
        echo "error";
    }
?>