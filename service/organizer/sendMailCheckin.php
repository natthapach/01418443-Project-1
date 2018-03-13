<?php
    $url = "sendEmail.php";
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
    $statement->exec([
        ":attendant_id"=>$attendant_id,
        ":event_id"=>$event_id
    ]);
    $result = $statement->fetch(PDO::FETCH_OBJ);
    $attendant_name = $result->first_name . " " . $result->last_name;
    $date = array(
        "eventName"=>$result->event_name,
        "organizer"=>$result->organizer_name,
        "attendant"=>$result->attendant_name,
        "formLink"=>$result->google_form,
        "email"=>$result->email
    );
    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context  = stream_context_create($options);
    $response = file_get_contents($url, false, $context);
    echo $response;
    // if ($result === FALSE) { /* Handle error */ }
?>