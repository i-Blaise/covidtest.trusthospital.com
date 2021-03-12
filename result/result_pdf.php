<?php
use Dompdf\Dompdf;
require_once '../vendor/autoload.php';
include('../class_libraries/class_lib.php');
$getData = new dbData();

function turnTOBase64($path){
  $type = pathinfo($path, PATHINFO_EXTENSION);
  $data = file_get_contents($path);
  $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
  return $base64;
}

if (isset($_GET['reg_num']))
{
  
        $reg_num = $_GET['reg_num'];
        $get_data = $getData->searchPatient($reg_num);
        $patientResult = $getData->fetchPatientResults($reg_num);
        $result = mysqli_fetch_array($patientResult);
        $patientDetails = mysqli_fetch_array($get_data);


}


// Logo Base 64 for pdf
$path = '../assets/img/icons/trust-logo.png';
$base64Img = turnTOBase64($path);


$dompdf = new Dompdf(); 
$dompdf->loadHtml('<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

.table-responsive {
    display: block;
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    -ms-overflow-style: -ms-autohiding-scrollbar; }
    .table-responsive > .table-bordered {
      border: 0; }
  
  .table th {
      padding: 1rem;
      vertical-align: top;
      border-top: 2px solid black; 
      border-bottom: 2px solid black; 
      background-color: #dddddd
  }
</style>
</head>
<body>
<img src="'.$path.'" width="180" height="150" alt="hospitals logo"/>
<h1 style="margin-bottom: -10px;">The Trust Hospital - Covid Test Portal</h1>
<h2>Patient Test Results</h2>

<table class="first">
  <tr>
    <th>Lab Number: '.$result['lab_number'].' </th>
    <td></td>

    <th>Patient Name: '.$patientDetails['full_name'].'</th>
    <td></td>
  </tr>

  <tr>
    <th>Age: '.$patientDetails['age'].'</th>
    <td></td>

    <th>Gender: '.$patientDetails['sex'].'</th>
    <td></td>
  </tr>

  <tr>
    <th>Reciept Type: '.$result['receipt_type'].'</th>
    <td></td>

    <th>Organization: '.$result['organisation'].'</th>
    <td></td>
  </tr>

  <tr>
    <th>Episode Number: '.$result['episode_number'].'</th>
    <td></td>

    <th>Patient Tel: '.$patientDetails['phone_number'].'</th>
    <td></td>
  </tr>

  <tr>
    <th>Manual Path Number: '.$result['manual_path_number'].'</th>
    <td></td>
  </tr>
</table>

<hr style="width:80%;text-align:middle;">


<table>
  <tr>
    <th>Requested By: '.$result['requested_by'].'</th>
    <td></td>

    <th>Sample Collection Date: '.$result['sample_collection_date'].'</th>
    <td></td>
  </tr>

  <tr>
    <th>Requested From: '.$result['requested_from'].'</th>
    <td></td>

    <th>Receive Date: '.$result['received_date'].'</th>
    <td></td>
  </tr>

  <tr>
    <th>Diagnosis: '.$result['diagnosis'].'</th>
    <td></td>

    <th>Report Date: '.$result['report_date'].'</th>
    <td></td>
  </tr>
</table>


<hr style="width:80%;text-align:middle;">


<table>
  <tr>
    <th>REQUESTED: '.$result['requested'].'</th>
    <td></td>
  </tr>
</table>

<table>
  <tr>
    <th>CoVID PCR TEST ('.$result['name_of_doctor'].') -> </th>
    <td>[LABORATORY]</td>
  </tr>
</table>


<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">PARAMETER</th>
                <th scope="col">FLAG</th>
                <th scope="col">RESULTS</th>
                <th scope="col">UNITS</th>
                <th scope="col">NORMAL RANGE</th>
            
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>'.$result['parameter'].'</td>
                <td>'.$result['flag'].'</td>
                <td>'.$result['results'].'</td>
                <td>'.$result['unit'].'</td>
                <td>'.$result['normal_range'].'</td>
            </tr>
        </tbody>
    </table>
</div>


</html>

');
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("Covid Test Result",array("Attachment" => true));
$options = new Options();
$options->set('isRemoteEnabled',true);      
$dompdf = new Dompdf( $options );
exit(0);
?>