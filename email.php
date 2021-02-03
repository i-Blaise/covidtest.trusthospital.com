<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "vendor/autoload.php";

//PHPMailer Object
$mail = new PHPMailer(true); //Argument true in constructor enables exceptions



$mail->isSMTP();
$mail->Host = 'covidtest.thetrusthospital.com';
$mail->SMTPAuth = true;
$mail->Username = 'testcovid@covidtest.thetrusthospital.com'; //paste one generated by Mailtrap
$mail->Password = 'testcovid12345'; //paste one generated by Mailtrap
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;


//From email address and name
$mail->From = "menniablaise@gmail.com";
$mail->FromName = "Blaze";

//To address and name
$mail->addAddress("menniablaise@yahoo.com", "Blaise");
$mail->addAddress("menniablaise@hotmail.com"); //Recipient name is optional

//Address to which recipient will reply
$mail->addReplyTo("menniablaise@yahoo.com", "Reply");

//CC and BCC
// $mail->addCC("cc@example.com");
// $mail->addBCC("bcc@example.com");

//Send HTML or Plain Text email
$mail->isHTML(true);

$mail->Subject = "Subject Text";
$mail->Body = "<i>Mail body in HTML</i>";
$mail->AltBody = "This is the plain text version of the email content";

try {
    $mail->send();
    echo "Message has been sent successfully";
} catch (Exception $e) {
    echo "Mailer Error: " . $mail->ErrorInfo;
}