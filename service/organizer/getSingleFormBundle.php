<?php
    include("../connection.php");
    $attendant_id = $_POST["attendant_id"];
    $event_id = $_POST["event_id"];
    $statement = $connection->prepare(
        "SELECT e.name as 'event_name', e.google_form, at.first_name, at.last_name, at.email, o.name as 'organizer_name'
        FROM attendences as ad
        JOIN event as e
        ON ad.event_id = e.id
        JOIN attendants as at
        ON at.id = ad.attendant_id
        JOIN organizer as o
        ON e.organizer_id = o.id
        WHERE ad.attendant_id=:attendant_id and ad.event_id=:event_id"
    );
    $statement->execute([
        ":attendant_id"=>$attendant_id,
        ":event_id"=>$event_id
    ]);
    $result = $statement->fetch(PDO::FETCH_OBJ);
    echo json_encode($result);
?>