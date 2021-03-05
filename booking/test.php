<?php
include('../class_libraries/class_lib.php');
$getData = new dbData();

$sms_msgid = 1;
$sms_status = "done";
$email_status = 1;
$reg_id = "TTH67899876";
$r = $getData->insertBookingData($_SESSION['post'], $reg_id, $sms_msgid, $sms_status, $email_status);

echo $r;
// print_r($_SESSION['post']);
