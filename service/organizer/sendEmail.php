<?php
    session_start();
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require '../mailer/Exception.php';
    require '../mailer/PHPMailer.php';
    require '../mailer/SMTP.php';

    // Set Sender Email
    // $emailAddr = Email for authenticating with the Google SMTP server, not the sender email.
    // $emailPass = Password of above email.
    $emailAddr = 'event.push.sample@gmail.com';
    $emailPass = 'eventpush443';
    //

    // Data POST
    $eventName = $_POST['eventName'];
    $eventOrganizer = $_POST["organizer"];
    $eventAttendant = $_POST['attendant'];
    $eventFormLink = $_POST['formLink'];
    $eventEmail = $_POST['email'];


    $mail = new PHPMailer;

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = $emailAddr;
    $mail->Password = $emailPass;
    $mail->SMTPSeure = 'tls';
    $mail->Port = 587;
    
    $mail->setFrom('eventpush@noreply.com', 'Event Push Notification');
    $mail->addReplyTo('eventpush@noreply.com', 'Event Push Notification');

    // Receipt
    $mail->addAddress($eventEmail);
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

    // Set EMail format to HTML
    $mail->isHTML(true);

    // Email Body HTML format

    // $bodyContent = '<div style="background:red"><h1>';
    // $bodyContent .= '[Event Notification] ';
    // $bodyContent .= '<br/>from '.$eventOrganizer;
    // $bodyContent .= '</h1></div>';
    // $bodyContent .= '<p>';
    // $bodyContent .= 'Dear, '.$eventAttendant;
    // $bodyContent .= '<br/><br/>Please do the form for the event '.$eventName.' from this link';
    // $bodyContent .= $eventFormLink.'<br/><br/>';
    // $bodyContent .= 'Thank you, <br/>'.$eventOrganizer;
    // $bodyContent .= '</p>';

    $bodyContent = "<div style='text-align:center'>
                        <h1>Please Ask Some Question About Event</h1>
                        <h2>$eventName</h2>
                    </div>
                    <div>
                        <p>
                            dear $eventAttendant <br><br>
                            please ask some question in follow link <br>
                            $eventFormLink
                        </p>

                        <p>
                            if you have some question, contract to your organizer : <b>$eventOrganizer</b>
                        </p>

                        <p>
                            Thank you <br>
                            Event Push
                        </p>
                    </div>
                    ";

    $mail->Subject = "Test Email from Localhost";
    $mail->Body = $bodyContent;

    if(!$mail->send()) {
        echo 'EMail could not be sent.';
        echo 'Mailer Error: '.$mail->ErrorInfo;
    } else {
        echo "EMail is sent to $eventEmail.";
    }
?>