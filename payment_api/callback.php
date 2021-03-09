<?php
include('../class_libraries/class_lib.php');
$getData = new dbData();
// For php mailer
require_once '../vendor/autoload.php';

// echo $_SESSION['payRef'];
// die();
$registration_number = $_SESSION['registration_number'];
$fullName = $_SESSION['post']['name'];
$email = $_SESSION['post']['email'];






// SMS
$client = 'TTH101010';
$password = 'Keep@123$';
$phone = $getData->addCountryCode($_SESSION['post']['phone']);
$text = 'Hi '.$fullName.', Your Covid Test registration number is '.$registration_number.'. The Trust Hospital';
$msg = urlencode($text);
$get_sms_data = $getData->callSmsAPI('GET', 'https://api.wirepick.com/httpsms/send?client='.$client.'&password='.$password.'&phone='.$phone.'&text='.$msg, false);
$response = new SimpleXMLElement($get_sms_data);
$sms_status = $response->sms[0]->status;
$sms_msgid = $response->sms[0]->msgid;


// Send Email 
$email_data = $getData->sendEmail($email, $fullName, $text);
if(isset($email_data) && $email_data == 'Loading...')
{
$email_status = 1;
}else{
$email_status = 0;
}

$booking_data = $getData->insertBookingData($_SESSION['post'], $registration_number, $sms_msgid, $sms_status, $email_status, true);

    $handle = fopen(__DIR__.DIRECTORY_SEPARATOR."paymentStatusLog.txt", "a");
    $paymentStatus = $getData->paymentStatus($_SESSION['registration_number'] , $_SESSION['payRef']);
    fwrite($handle, "\n -");
    fwrite($handle, "- Payment Status for Reg Num: ".$_SESSION['registration_number']." is ".$paymentStatus.". Date: " .date("Y-m-d H:i:s"));
    fclose($handle);

session_destroy();

?>