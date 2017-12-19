<?php

require_once('PHPMailer-master/PHPMailerAutoload.php');

$name = $_POST['name'];
$email = $_POST['email'];
$msg = $_POST['msg'];


    //$notSpecifiedText = 'Not specified';
    $body = "";

    $body .= '<b>'.$name.'</b> wants to contact you through your website. Please find the details below:<br><br>';
    $body .= "Name: $_POST[name] <br>";
    $body .= "Email: $_POST[email] <br>";
    $body.= $name."'s IP Address:". $_SERVER['REMOTE_ADDR']." <br>";
    $commentsText = trim($msg);

    $body .= "Message : $commentsText <br>";

    $mail = new PHPMailer();

    $mail->IsSMTP(); // enable SMTP
   // $mail->SMTPDebug = 2; // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail ssl
    $mail->Host = 'smtp.zoho.com';
    $mail->Port = 465; // or 587
    $mail->IsHTML(true);
    $mail->Username = "admin@coffeesoftwares.com";        // Make sure to replace this with your shell enabled user
    $mail->Password = "password";      // Make sure to use the proper password for your user

    $mail->From = "admin@coffeesoftwares.com";
    $mail->FromName = $_POST['email'];

   
    $mail->Body = $body;

    $mail->AddAddress('sharmadeepti888@gmail.com');
    $msg = "";
    if (!$mail->Send()) {
        $msg = "Mailer Error: " . $mail->ErrorInfo;
    } else {
        $msg = "Message has been sent, we will contact you soon";
    }

    $response = '<script>';

    $response .= 'alert("' . $msg . '"); ';

    $action = $_SERVER['HTTP_REFERER'];
    $response .= 'window.location.href="' . $action . '";';
    $response .= '</script>';

    unset($_POST);
    echo $response;

 ?>
