<?php
    include("../connection.php");
    $event_id = $_GET["event_id"];

    $statement = $connection->prepare(
        "SELECT e.name, e.google_form, at.email
        FROM event as e
        JOIN attendences as ad
        on e.id = ad.event_id
        JOIN attendants as at
        ON ad.attendant_id = at.id
        WHERE e.id=:event_id AND ad.is_checkin=1"
    );

    $statement->execute([
        ":event_id"=>$event_id
    ]);

    $event_name = "";
    $event_form = "";
    $attendant_emails = array();

    while($row = $statement->fetch(PDO::FETCH_OBJ)){
        $event_name = $row->name;
        $event_form = $row->google_form;
        array_push($attendant_emails, $row->email);
    }

    echo json_encode(array(
        "eventName"=>$event_name,
        "formLink"=>$event_form,
        "email"=>$attendant_emails
    ));
?>