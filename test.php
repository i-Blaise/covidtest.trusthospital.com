<?php
include('class_libraries/class_lib.php');
$database_con = new DB_con();
$getData = new dbData();

$client = 'TTH101010';
$password = 'Keep@123$';
$phone = +233571659610;
$text = 'The most simple API call is the GET call, so let’s start with that!';
$msg = urlencode($text);
$get_data = $getData->callAPI('GET', 'https://api.wirepick.com/httpsms/send?client='.$client.'&password='.$password.'&phone='.$phone.'&text='.$msg, false);
// $response = json_decode($get_data, true);
// $response = simplexml_load_string($get_data);
$response = new SimpleXMLElement($get_data);
// $errors = $response['response']['errors'];
// $data = $response['response']['data'][0];
// $xml=simplexml_load_string($myXMLData) or die("Error: Cannot create object");
// print_r($xml);

print_r($response);
echo $response->sms[0]->status;
echo $response->sms[0]->msgid;