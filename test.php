<?php
include('class_libraries/class_lib.php');
$database_con = new DB_con();
$getData = new dbData();
require_once 'vendor/autoload.php';

$fullName = 'email@test.com';
$pass = 'test';

// $get_data = $getData->adminLogin($email, $pass);
// var_dump($_SESSION['user']);
// $NUM = 'TTH'.mt_rand(10000000, 99999999);
// ECHO $NUM;

$email = 'menniablaise@hotmail.com';
$fullName = 'Blaise';
$text = 'hiii';
$email_data = $getData->sendEmail($email, $fullName, $text);
if(isset($email_data) && $email_data == 'Loading...')
{
	$email_status = 1;
}else{
	$email_status = 0;
}
print($email_status);