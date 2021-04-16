<?php
// namespace Dompdf;
use Dompdf\Dompdf;
require_once '../vendor/autoload.php';
include('../class_libraries/class_lib.php');
// $getData = new dbData();


if(isset($_GET['status']))
{ 
  $getData = new dbData();
  $check = $_GET['status'];
  $check_code = substr($check,0,3);
  if($check_code == 'TTH')
  {
    $registration_number = $_GET['status'];
    $patientDetails = $getData->fetchPatientDetails($registration_number);
    if(!isset($patientDetails)){
        echo '<h1>data not found</h1>';
        die();
    }
    if($patientDetails['payment_status'] == 'paid'){
        echo '<h1>Payment Already Made</h1>';
        die();
    }
    $_SESSION['post']['name'] = $patientDetails['full_name'];
    $_SESSION['post']['phone'] = $patientDetails['phone_number'];
    $_SESSION['post']['email'] = $patientDetails['email'];
    $_SESSION['post']['packages'] = $patientDetails['packages'];

    echo "<script>location='https://covidtest.thetrusthospital.com/dev/payment_api'</script>";

}else{
    echo '<h1>wrong data, try again later</h1>';
}

}else{
    echo '<h1>no data set</h1>';
}