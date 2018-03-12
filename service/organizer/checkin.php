<?php
    include("../connection.php");
    session_start();
    // fake user name
    // $_SESSION["current_username"] = "organizer01";
    $username = $_SESSION["current_username"];
    $attendant_id = $_POST["attendant_id"];
    $event_id = $_POST["event_id"];
    $affectedRow = $connection->exec(
        "UPDATE `attendences` 
        SET `is_checkin`= 1
        WHERE attendant_id='$attendant_id' 
            and event_id='$event_id' 
            and status_id='C'
            and EXISTS (SELECT *
                        FROM event as e
                        JOIN organizer as o
                        ON e.organizer_id = o.id 
                        WHERE o.user_name = '$username')"
    );
    if($affectedRow>0){
        $statement = $connection->prepare(
            "SELECT ad.*, at.first_name as 'attendant_fn', at.last_name as 'attendant_ln', e.name as 'event_name', ac.profile as 'profile'
            FROM `attendences`as ad 
            JOIN `attendants` as at
            ON ad.attendant_id = at.id
            JOIN `event` as e
            ON ad.event_id = e.id 
            JOIN `account` as ac
            ON at.user_name = ac.user_name 
            WHERE ad.attendant_id=:attendant_id and ad.event_id=:event_id"
        );
        $statement->execute([
            ":attendant_id" => $attendant_id,
            ":event_id" => $event_id
        ]);
        $row = $statement->fetchAll(PDO::FETCH_OBJ);
        echo json_encode($row[0]);
    }else{
        echo 0;
    }
?>