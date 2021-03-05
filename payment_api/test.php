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


    $result = $getData->paymentStatus('TTH34873881', '3H3Ww9ar');
    // $_SESSION['data'] = $result;
    // print_r($_SESSION['data']);
    print_r($result);