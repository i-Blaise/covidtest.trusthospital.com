<?php
namespace Dompdf;
require_once '../vendor/autoload.php';
session_start();

function turnTOBase64($path){
  $type = pathinfo($path, PATHINFO_EXTENSION);
  $data = file_get_contents($path);
  $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
  return $base64;
}

if(isset($_GET['download']))
{
$url = 'https://covidtest.thetrusthospital.com/dev/booking/generate_pdf_for_qrcode.php?status='.$_SESSION['registration_number'];   
$url_filter = htmlspecialchars($url); 
$online_pdf_url = 'https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl='.$url.'&choe=UTF-8';
$qrcode_img = 'img/qrcodes/code'.$_SESSION['registration_number'];
if(file_put_contents($qrcode_img, file_get_contents($online_pdf_url)))
{


$fever_or_chills = (isset($_SESSION['post']['fever_or_chills']) && $_SESSION['post']['fever_or_chills'] == 1) ?  "Yes" : "No";
$generalWeakness = (isset($_SESSION['post']['generalWeakness']) && $_SESSION['post']['generalWeakness'] == 1) ?  "Yes" : "No";
$cough = (isset($_SESSION['post']['cough']) && $_SESSION['post']['cough'] == 1) ?  "Yes" : "No";
$soreThroat = (isset($_SESSION['post']['soreThroat']) && $_SESSION['post']['soreThroat'] == 1) ?  "Yes" : "No";
$runnyNose = (isset($_SESSION['post']['runnyNose']) && $_SESSION['post']['runnyNose'] == 1) ?  "Yes" : "No";
$shortness_of_breath = (isset($_SESSION['post']['shortness_of_breath']) && $_SESSION['post']['shortness_of_breath'] == 1) ?  "Yes" : "No";
$diarrhoea = (isset($_SESSION['post']['diarrhoea']) && $_SESSION['post']['diarrhoea'] == 1) ?  "Yes" : "No";
$nausea_or_vomiting = (isset($_SESSION['post']['nausea_or_vomiting']) && $_SESSION['post']['nausea_or_vomiting'] == 1) ?  "Yes" : "No";
$headache = (isset($_SESSION['post']['headache']) && $_SESSION['post']['headache'] == 1) ?  "Yes" : "No";
$irritability_or_confusion = (isset($_SESSION['post']['irritability_or_confusion']) && $_SESSION['post']['irritability_or_confusion'] == 1) ?  "Yes" : "No";
$loss_of_smell = (isset($_SESSION['post']['loss_of_smell']) && $_SESSION['post']['loss_of_smell'] == 1) ?  "Yes" : "No";
$loss_of_taste = (isset($_SESSION['post']['loss_of_taste']) && $_SESSION['post']['loss_of_taste'] == 1) ?  "Yes" : "No";


$muscular_pain = (isset($_SESSION['post']['muscular_pain']) && $_SESSION['post']['muscular_pain'] == 1) ?  "Yes" : "No";
$chest_pain = (isset($_SESSION['post']['chest_pain']) && $_SESSION['post']['chest_pain'] == 1) ?  "Yes" : "No";
$abdominal_pain = (isset($_SESSION['post']['abdominal_pain']) && $_SESSION['post']['abdominal_pain'] == 1) ?  "Yes" : "No";
$joint_pain = (isset($_SESSION['post']['joint_pain']) && $_SESSION['post']['joint_pain'] == 1) ?  "Yes" : "No";


$seizure = (isset($_SESSION['post']['seizure']) && $_SESSION['post']['seizure'] == 1) ?  "Yes" : "No";
$pharnygeal_exudate = (isset($_SESSION['post']['pharnygeal_exudate']) && $_SESSION['post']['pharnygeal_exudate'] == 1) ?  "Yes" : "No";
$abnormal_lung_xray = (isset($_SESSION['post']['abnormal_lung_xray']) && $_SESSION['post']['abnormal_lung_xray'] == 1) ?  "Yes" : "No";
$conjuctival_injection = (isset($_SESSION['post']['conjuctival_injection']) && $_SESSION['post']['conjuctival_injection'] == 1) ?  "Yes" : "No";
$dyspnea_or_tachpnea = (isset($_SESSION['post']['dyspnea_or_tachpnea']) && $_SESSION['post']['dyspnea_or_tachpnea'] == 1) ?  "Yes" : "No";
$abnormal_lung_ausculation = (isset($_SESSION['post']['abnormal_lung_ausculation']) && $_SESSION['post']['abnormal_lung_ausculation'] == 1) ?  "Yes" : "No";


$date_of_onset_symptoms = $_SESSION['post']['date_first_at_hospital'];
$date_of_admission = $_SESSION['post']['date_of_admission'];
$date_first_at_hospital = $_SESSION['post']['date_first_at_hospital'];
$name_of_hospital = $_SESSION['post']['name_of_hospital'];
$hospital_visit_number = $_SESSION['post']['hospital_visit_number'];
$date_of_isolation = $_SESSION['post']['date_of_isolation'];
$date_of_death = $_SESSION['post']['date_of_death'];
$other_symptoms = $_SESSION['post']['other_symptoms'];
$asymptomatic = (isset($_SESSION['post']['asymptomatic']) && $_SESSION['post']['asymptomatic'] == 1) ?  "Yes" : "No";
$admitted_to_hospital = (isset($_SESSION['post']['admitted_to_hospital']) && $_SESSION['post']['admitted_to_hospital'] == 1) ?  "Yes" : "No";
$ventilated = (isset($_SESSION['post']['ventilated']) && $_SESSION['post']['ventilated'] == 1) ?  "Yes" : "No";


// Logo Base 64 for pdf
$registration_number = $_SESSION['registration_number'];
$qrcode_img_base64 = turnTOBase64($qrcode_img);
$online_payment_base64 = turnTOBase64($qrcode_img);
$path = 'img/trust-logo.png';
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);



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
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>
<img src="'.$base64.'" width="180" height="150" alt="hospitals logo"/>
<h1 style="margin-bottom: -10px;">The Trust Hospital - Covid Test Portal</h1>
<h2>Patient Booking Form</h2>

<h3>Registration Number: '.$_SESSION['registration_number'].'</h3>
<table>
  <tr>
    <th>Full Name: </th>
    <td>'. $_SESSION['post']['name'].'</td>
  </tr>
  <tr>
    <th>Email Address: </th>
    <td>'. $_SESSION['post']['email'].'</td>
  </tr>
  <tr>
    <th>Phone Number: </th>
    <td>'.$_SESSION['post']["phone"].'</td>
  </tr>
  <tr>
    <th>Gender: </th>
    <td>'.$_SESSION['post']["gender"].'</td>
  </tr>
  <tr>
    <th>Passport ID: </th>
    <td>'.$_SESSION['post']["passport"].'</td>
  </tr>
  <tr>
  <th>District: </th>
  <td>'.$_SESSION['post']["district"].'</td>
</tr>
  <tr>
    <th>Home Address: </th>
    <td>'.$_SESSION['post']["address"].'</td>
  </tr>
  <tr>
  <th>Landmark: </th>
  <td>'.$_SESSION['post']["landmark"].'</td>
</tr>
  <tr>
    <th>Date of Birth: </th>
    <td>'.$_SESSION['post']["DOB"].'</td>
  </tr>
  <tr>
  <th>Age: </th>
  <td>'.$_SESSION['post']["age"].'</td>
</tr>
  <tr>
    <th>Receipt Number: </th>
    <td>'.$_SESSION['post']["receipt_number"].'</td>
  </tr>
  <tr>
    <th>Hospital Number: </th>
    <td>'.$_SESSION['post']["hospital_number"].'</td>
  </tr>
</table>

<h3>Symptoms Info</h3>
<table>
<tr>
  <th>History of fever / chills: </th>
  <td>'. $fever_or_chills .'</td>
</tr>
<tr>
  <th>General Weakness: </th>
  <td>'.$generalWeakness.'</td>
</tr>
<tr>
  <th>Cough: </th>
  <td>'.$cough.'</td>
</tr>
<tr>
  <th>Sore Throat: </th>
  <td>'.$soreThroat.'</td>
</tr>
<tr>
  <th>Runny Nose: </th>
  <td>'.$runnyNose.'</td>
</tr>
<tr>
  <th>Loss Of Smell: </th>
  <td>'.$loss_of_smell.'</td>
</tr>
<tr>
  <th>Shortness Of Breath: </th>
  <td>'.$shortness_of_breath.'</td>
</tr>
<tr>
  <th>Diarrhoea: </th>
  <td>'.$diarrhoea.'</td>
</tr>
<tr>
  <th>Nausea / Vomiting: </th>
  <td>'.$nausea_or_vomiting.'</td>
</tr>
<tr>
  <th>Headache: </th>
  <td>'.$headache.'</td>
</tr>
<tr>
  <th>Irritability / Confusion: </th>
  <td>'.$irritability_or_confusion.'</td>
</tr>
<tr>
  <th>Loss Of Taste: </th>
  <td>'.$loss_of_taste.'</td>
</tr>
</table>



<h3>Pains</h3>
<table>
  <tr>
    <th>Muscular Pains: </th>
    <td>'.$muscular_pain.'</td>
  </tr>
  <tr>
    <th>Chest Pains: </th>
    <td>'.$chest_pain.'</td>
  </tr>
  <tr>
    <th>Abdominal Pains: </th>
    <td>'.$abdominal_pain.'</td>
  </tr>
  <tr>
    <th>Joint Pains: </th>
    <td>'.$joint_pain.'</td>
  </tr>
</table>

<h3>Vital Signs</h3>
<table>
  <tr>
    <th>Seizure: </th>
    <td>'.$seizure.'</td>
  </tr>
  <tr>
    <th>Conjuctival Injection: </th>
    <td>'.$conjuctival_injection.'</td>
  </tr>
  <tr>
    <th>Pharnygeal Exudate: </th>
    <td>'.$pharnygeal_exudate.'</td>
  </tr>
  <tr>
    <th>Dyspnea / Tachpnea: </th>
    <td>'.$dyspnea_or_tachpnea.'</td>
  </tr> 
  <tr>
    <th>Abnormal Lung X-ray: </th>
    <td>'.$abnormal_lung_xray.'</td>
  </tr> 
  <tr>
  <th>Abnormal Lung Auscultation: </th>
  <td>'.$abnormal_lung_ausculation.'</td>
  </tr>
</table>



<h3>Clinical Course</h3>
<table>
  <tr>
    <th>Date of onset of symptoms: </th>
    <td>'.$date_of_onset_symptoms.'</td>
  </tr>
  <tr>
    <th>Asymptomatic: </th>
    <td>'.$asymptomatic.'</td>
  </tr>
  <tr>
    <th>Date first seen at hospital </th>
    <td>'.$date_first_at_hospital.'</td>
  </tr>
  <tr>
    <th>Admitted to hospital?: </th>
    <td>'.$admitted_to_hospital.'</td>
  </tr>
  <tr>
    <th>Name of Hospital: </th>
    <td>'.$name_of_hospital.'</td>
  </tr>
  <tr>
    <th>Hospital visit number: </th>
    <td>'.$hospital_visit_number.'</td>
  </tr>
  <tr>
    <th>Date of admission: </th>
    <td>'.$date_of_admission.'</td>
  </tr>
  <tr>
    <th>Date of isolation: </th>
    <td>'.$date_of_isolation.'</td>
  </tr>
  <tr>
    <th>Was person ventilated: </th>
    <td>'.$ventilated.'</td>
  </tr>
  <tr>
    <th>Date of death (if applicable): </th>
    <td>'.$date_of_death.'</td>
  </tr>
  <tr>
    <th>Other underlying conditions: </th>
    <td>'.$other_symptoms.'</td>
  </tr>
</table>
<br>
<br>
<br>
<br>
<table>
<thead>
<tr>
<th>Scan to view your PDF online</th>
<th>Scan to make payment online</th>
</tr>
</thead>
<tbody>
<tr>
<th><img src="'.$qrcode_img_base64.'" alt="hospitals logo"/></th>
<th><img src="'.$online_payment_base64.'" alt="hospitals logo"/></th>
</tr>
</tbody>
</table>

</html>

');
// $dompdf->def("DOMPDF_ENABLE_REMOTE", true);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("BookingFormData",array("Attachment" => false));
// def("DOMPDF_ENABLE_REMOTE", true);
$options = new Options();
$options->set('isRemoteEnabled',true);      
$dompdf = new Dompdf( $options );
exit(0);
}else{
 echo 'qrcode not generated';
}
}else{
    echo "wrong";
}
?>