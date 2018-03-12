<?php
    include("../connection.php");
    $event_id = $_GET["event_id"];

    $statement = $connection->prepare(
        "SELECT e.name, e.google_form, at.email, at.first_name, at.last_name, o.name as 'organizer_name'
        FROM event as e
        JOIN attendences as ad
        on e.id = ad.event_id
        JOIN attendants as at
        ON ad.attendant_id = at.id
        JOIN organizer as o
        ON e.organizer_id = o.id
        WHERE e.id=:event_id AND ad.is_checkin=1"
    );

    $statement->execute([
        ":event_id"=>$event_id
    ]);

    $event_name = "";
    $event_form = "";
    $organizer_name = "";
    $attendant_emails = array();
    $attendant_name = array();

    while($row = $statement->fetch(PDO::FETCH_OBJ)){
        $event_name = $row->name;
        $event_form = $row->google_form;
        $organizer_name = $row->organizer_name;

        array_push($attendant_emails, $row->email);
        array_push($attendant_name, $row->first_name . " " . $row->last_name);
    }

    echo json_encode(array(
        "eventName"=>$event_name,
        "formLink"=>$event_form,
        "organizerName"=>$organizer_name,
        "email"=>$attendant_emails,
        "attendant"=>$attendant_name
    ));
?>