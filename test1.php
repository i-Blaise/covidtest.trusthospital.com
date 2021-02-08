<?php
include('class_libraries/class_lib.php');
$database_con = new DB_con();
$getData = new dbData();

$name = 'TTH101010';
$email = 'menniablaise@yahoo.com';
$get_data = $getData->sendEmail($email, $name);
// $response = json_decode($get_data, true);
// $response = simplexml_load_string($get_data);
// $response = new SimpleXMLElement($get_data);
// $errors = $response['response']['errors'];
// $data = $response['response']['data'][0];
// $xml=simplexml_load_string($myXMLData) or die("Error: Cannot create object");
// print_r($xml);

print_r($get_data);
// echo $response->sms[0]->status;
// echo $response->sms[0]->msgid;