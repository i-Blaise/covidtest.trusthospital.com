<?php
include('../class_libraries/class_lib.php');
$getData = new dbData();

$verify_payment = $getData->paymentStatus($_SESSION['registration_number'], $_SESSION['payReference']);



$handle = fopen(__DIR__.DIRECTORY_SEPARATOR."paymentStatusLog.txt", "a");

if($verify_payment == 'verified')
{
    $paymentStatus = 'paid and verified';
    fwrite($handle, "\n -");
    fwrite($handle, "- Payment Status for Reg Num: ".$_SESSION['registration_number']." is ".$paymentStatus.". Date: " .date("Y-m-d H:i:s"));
}elseif($result == 'failed' || $verify_payment == 'payment failed'){
    $paymentStatus = 'unverified';
    fwrite($handle, "\n -");
    fwrite($handle, "- Payment Status for Reg Num: ".$_SESSION['registration_number']." is ".$paymentStatus.". Date: " .date("Y-m-d H:i:s"));
}


    fclose($handle);
    session_destroy();
?>