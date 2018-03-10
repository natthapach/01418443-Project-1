<?php
    include("../connection.php");
    session_start();
    // fake user name
    $_SESSION["current_username"] = "organizer01";
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
            "SELECT * 
            FROM `attendences` 
            WHERE attendant_id=:attendant_id and event_id=:event_id"
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