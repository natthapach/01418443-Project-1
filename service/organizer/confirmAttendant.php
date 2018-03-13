<?php
    include("../connection.php");
    session_start();
    // fake user name
    // $_SESSION["current_username"] = "organizer01";

    include("../connection.php");
    $event_id = $_POST["event_id"];
    $attendant_id = $_POST["attendant_id"];
    $current_user = $_SESSION["current_username"];

    $sql = "UPDATE `attendences` 
    SET `status_id`='C', `attentded_code`='$attendant_id-$event_id'
    WHERE attendant_id='$attendant_id' 
        and event_id='$event_id' 
        and EXISTS (SELECT *
                        FROM event as e
                        JOIN organizer as o
                        ON e.organizer_id = o.id
                        JOIN account as a
                        ON a.user_name = o.user_name
                        where e.id='$event_id' and a.user_name='$current_user')";

    $affectedRow = $connection->exec(
        $sql
    );


    // $statement = $connection->prepare(
    //     "UPDATE 'attendences' 
    //     SET 'status_id'='C'
    //     WHERE attendant_id=:attendant_id 
    //         and event_id=:event_id 
    //         and EXISTS (SELECT *
    //                         FROM event as e
    //                         JOIN organizer as o
    //                         ON e.organizer_id = o.id
    //                         JOIN account as a
    //                         ON a.user_name = o.user_name
    //                         where e.id=:event_id and a.user_name=:current_user)"
    // );
    // $affectedRow = $statement->execute([
    //     ':attendant_id' => $attendant_id,
    //     ':event_id' => $event_id,
    //     ':current_user' => $current_user
    // ]);

    echo $affectedRow;
    // echo $sql;
?>