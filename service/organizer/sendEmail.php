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
    $emailAddr = '';
    $emailPass = '';
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
    $mail->addAddress('');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

    // Set EMail format to HTML
    $mail->isHTML(true);

    // Email Body HTML format
    $bodyContent = '<h1>';
    $bodyContent .= '[Event Notification] ';
    $bodyContent .= '<br/>from '.$eventOrganizer;
    $bodyContent .= '</h1>';
    $bodyContent .= '<p>';
    $bodyContent .= 'Dear, '.$eventAttendant;
    $bodyContent .= '<br/><br/>Please do the form for the event '.$eventName.' from this link';
    $bodyContent .= $eventFormLink.'<br/><br/>';
    $bodyContent .= 'Thank you, <br/>'.$eventOrganizer;
    $bodyContent .= '</p>';

    $mail->Subject = "Test Email from Localhost";
    $mail->Body = $bodyContent;

    if(!$mail->send()) {
        echo 'EMail could not be sent.';
        echo 'Mailer Error: '.$mail->ErrorInfo;
    } else {
        echo 'EMail is sent.';
    }
?>