<?php
include('../class_libraries/class_lib.php');
$getData = new dbData();
include_once "payfluid_api_sdk.php";

$results = \payfluid\MerchantAPI::verifyPayment($data,$token);
$result = json_decode($results);
$payReference = $result->aapf_txn_payLink;

// echo $payReference;
// die();
$registration_number = $_SESSION['registration_number'];


$result = $getData->verifyPayment($payReference);
$payment_status = (isset($result->aapf_txn_gw_sc)) ? $result->aapf_txn_gw_sc : 0;
if($payment_status == '0-SUCCESSFUL'){
    $result = $getData->updateDBPayment($registration_number, $result, true, true);
    
}else{
    $result = $getData->updateDBPayment($registration_number, $result, false);
}


session_destroy();

?>