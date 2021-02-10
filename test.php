<?php
include('class_libraries/class_lib.php');
$database_con = new DB_con();
$getData = new dbData();

$email = 'email@test.com';
$pass = 'test';

// $get_data = $getData->adminLogin($email, $pass);
// var_dump($_SESSION['user']);
$NUM = 'TTH'.mt_rand(10000000, 99999999);
ECHO $NUM;