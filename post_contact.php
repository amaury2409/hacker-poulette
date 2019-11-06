<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$firstname = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
$subject = $_POST['subject'];
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

$errors = [];


if ($firstname == "") {
    $errors['firstname'] = 'Veuillez remplir votre prénom';
}
if ($lastname == "") {
    $errors['lastname'] = 'Veuillez remplir votre nom';
}
if ($email == "" || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'Veuillez remplir un email valide';
}

if ($message == "") {
    $errors['message'] = 'Veuillez remplir votre message';
}
session_start();

if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    $_SESSION['inputs'] = $_POST;
    
// header('Location: contact.php');
} else {
    // $_SESSION['success'] = 1;
    // header('Location: contact.php');
    // var_dump($_SESSION);

    // //Create a new PHPMailer instance
    // $mail = new PHPMailer(true);


    // $mail->IsSMTP();
    // $mail->SMTPAuth = true;
    // $mail->SMTPSecure = 'tls';
    // $mail->Host = "smtp.gmail.com";
    // $mail->Port = 587;
    // $mail->IsHTML(true);

    // //Username to use for SMTP authentication
    // $mail->Username = "henrottayamaury@gmail.com";
    // $mail->Password = "jenaimarre";

    // //Set who the message is to be sent from
    // $mail->setFrom($email, $firstname . ' ' . $lastname);

    // //Set who the message is to be sent to
    // $mail->addAddress($email, 'amaury henrottay');
    // //Set the subject line
    // $mail->Subject = $subject;

    // //convert HTML into a basic plain-text alternative body
    // $mail->msgHTML($message);

    // //Replace the plain text body with one created manually
    // $mail->AltBody = 'This is a plain-text message body';

    // //send the message, check for errors
    // if (!$mail->send()) {
    //     echo "Mailer Error: " . $mail->ErrorInfo;
    // } else {
    //     echo "Message sent!";

    //     $_SESSION['success'] = 1;
    //     echo('ça fonctionne');
    //     // header('Location: contact.php');
    // }
}

var_dump($errors);
die();