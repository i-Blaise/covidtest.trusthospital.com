<?php
session_start();
header('Content-Type: application/json');
include_once "payfluid_api_sdk.php";

define("language", "GHS");
define("currency", "en");
define("description", "Testing Payfluid api");
define("callbackurl", "http://4a767a17.ngrok.io/rest/api/callback");
define("otherInfo", "test payment");
$redirect_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/dev/payment_api/redirect.php";
$name = "Blaise" ;
$amount = 1;
$phone = 571659610 ;
$email = "email@test.com";

// if (isset($_SESSION['request'])) {
//     $request = $_SESSION['request'];
//     if ($request == "createPayLink") {
//         $name = $_SESSION['name'] ;
//         $amount = $_SESSION['amount'];
//         $phone = $_SESSION['phone'] ;
//         $email = $_SESSION['email'];

    $date = new \DateTime();
    $dateTime = $date->format('Y-m-d\TH:i:s.v\Z');
    $reference = substr(md5($dateTime . 'DUMMY'), 23, 32);
    
    $result = \payfluid\MerchantAPI::createPayLink(currency, $amount, $reference, description, $redirect_url, callbackurl, $name, otherInfo, language, $phone, $email);
    
    // $result_obj = json_encode($result);
    // $result_obj = json_decode($result);
    // print_r($result);
    // echo $result_obj;
    
    exit();
//     }
// }