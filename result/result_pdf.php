<?php
use Dompdf\Dompdf;
require_once '../vendor/autoload.php';

function turnTOBase64($path){
  $type = pathinfo($path, PATHINFO_EXTENSION);
  $data = file_get_contents($path);
  $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
  return $base64;
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
<h2>Patient Booking Form</h2>

<table class="first">
  <tr>
    <th>Lab Number: </th>
    <td></td>

    <th>Patient Name: </th>
    <td></td>
  </tr>

  <tr>
    <th>Age: </th>
    <td></td>

    <th>Gender: </th>
    <td></td>
  </tr>

  <tr>
    <th>Reciept Type: </th>
    <td></td>

    <th>Organization: </th>
    <td></td>
  </tr>

  <tr>
    <th>Episode Number: </th>
    <td></td>

    <th>Patient Tel: </th>
    <td></td>
  </tr>

  <tr>
    <th>Manual Path Number: </th>
    <td></td>
  </tr>
</table>

<hr style="width:80%;text-align:middle;">


<table>
  <tr>
    <th>Requested By: </th>
    <td></td>

    <th>Sample Collection Date: </th>
    <td></td>
  </tr>

  <tr>
    <th>Requested From: </th>
    <td></td>

    <th>Receive Date: </th>
    <td></td>
  </tr>

  <tr>
    <th>Diagnosis: </th>
    <td></td>

    <th>Report Date: </th>
    <td></td>
  </tr>
</table>


<hr style="width:80%;text-align:middle;">


<table>
  <tr>
    <th>REQUESTED: </th>
    <td></td>
  </tr>
</table>

<table>
  <tr>
    <th>CoVID PCR TEST (B2B DR. AKWETEY) -> </th>
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
                <td>Specimen Type <BR> SARS-COV-2, RT-PCR</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>


</html>

');
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("BookingFormData",array("Attachment" => false));
$options = new Options();
$options->set('isRemoteEnabled',true);      
$dompdf = new Dompdf( $options );
exit(0);
?>