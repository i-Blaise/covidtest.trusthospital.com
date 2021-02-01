<!-- <script> 
$(function(){
  $("#header").load("ordere-detail-email.html"); 
});
</script> -->

<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;
require 'vendor\autoload.php';

$mail = new PHPMailer;

$mail->isSMTP();                            // Set mailer to use SMTP
$mail->Host = 'smtp.hostinger.com';             // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                     // Enable SMTP authentication
$mail->Username = 'fashion@threeoddlayers.com';          // SMTP username
$mail->Password = 'Mennia123'; // SMTP password
$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                          // TCP port to connect to

$mail->setFrom('fashion@threeoddlayers.com', 'Please Work');
$mail->addReplyTo('menniablaise@yahoo.com', 'Please Work Thanks');
$mail->addAddress('menniablaise@gmail.com');   // Add a recipient
$mail->addCC('menniablaise@yahoo.com');
// $mail->addBCC('bcc@example.com');

$mail->isHTML(true);  // Set email format to HTML

$bodyContent = '<h1>Hiii this is from tol!!</h1>';
$bodyContent .= '<p>This is the HTML email sent from localhost using PHP script by <b>CodexWorld</b></p>';

$mail->Subject = 'it fockn worked';
// $mail->Body    = file_get_contents('index.php');
$mail->Body = $_SESSION['p_test1'];
$mail->send();

if(!$mail->send()) {
    echo 'Message could not be sent.';
    $_SESSION['emailfailed'] = 'false';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
    $_SESSION['emailgone'] = 'true';
}
?>