<?php
include('../class_libraries/class_lib.php');
$getData = new dbData();
// $date = new \DateTime();
// $dateTime = $date->format('YmdHisv');
// print($dateTime);

// $url = 'https://payfluid-api.herokuapp.com/payfluid/ext/api/status?msg';
// $context = stream_context_create(
//     array(
//     'http' => array(
//     'method' => 'GET',
//     'header' => 'payReference: 3H3Ww9ar',
//     )
//     ));
    
//     $result = file_get_contents($url, false, $context);
//     $see = json_decode($result);
//     print_r($see->aapf_txn_gw_sc);
//     echo '</br>';
    // if ($see->aapf_txn_gw_sc != '0-SUCCESSFUL')
    // {
    //     echo 'not';
    // }else{
    //     echo $see->aapf_txn_gw_sc;
    // }

    $result = $getData->paymentStatus('TTH65206153', '3P4Yu8At');
    // $result = $getData->verifyPayment('3P4Yu8At');
    // $_SESSION['data'] = $result;
    print_r($result);
    // print_r($_SESSION['registration_number']);
    // $dbUpdate = $getData->fetchOnlinePaymentDB('TTH132555361');
    // print_r($dbUpdate['callback']);