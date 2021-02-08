<?php
namespace Dompdf;
require_once 'vendor/autoload.php';
session_start();

if(isset($_GET['download']))
{
$fever_or_chills = ($_SESSION['fever_or_chills'] == 1) ?  "Yes" : "No";
$generalWeakness = ($_SESSION['generalWeakness'] == 1) ?  "Yes" : "No";
$cough = ($_SESSION['cough'] == 1) ?  "Yes" : "No";
$soreThroat = ($_SESSION['soreThroat'] == 1) ?  "Yes" : "No";
$runnyNose = ($_SESSION['runnyNose'] == 1) ?  "Yes" : "No";
$shortness_of_breath = ($_SESSION['shortness_of_breath'] == 1) ?  "Yes" : "No";
$diarrhoea = ($_SESSION['diarrhoea'] == 1) ?  "Yes" : "No";
$nausea_or_vomiting = ($_SESSION['nausea_or_vomiting'] == 1) ?  "Yes" : "No";
$headache = ($_SESSION['headache'] == 1) ?  "Yes" : "No";
$irritability_or_confusion = ($_SESSION['irritability_or_confusion'] == 1) ?  "Yes" : "No";
$loss_of_smell = ($_SESSION['loss_of_smell'] == 1) ?  "Yes" : "No";
$loss_of_taste = ($_SESSION['loss_of_taste'] == 1) ?  "Yes" : "No";


$muscular_pain = ($_SESSION['muscular_pain'] == 1) ?  "Yes" : "No";
$chest_pain = ($_SESSION['chest_pain'] == 1) ?  "Yes" : "No";
$abdominal_pain = ($_SESSION['abdominal_pain'] == 1) ?  "Yes" : "No";
$joint_pain = ($_SESSION['joint_pain'] == 1) ?  "Yes" : "No";


$seizure = ($_SESSION['seizure'] == 1) ?  "Yes" : "No";
$pharnygeal_exudate = ($_SESSION['pharnygeal_exudate'] == 1) ?  "Yes" : "No";
$abnormal_lung_xray = ($_SESSION['abnormal_lung_xray'] == 1) ?  "Yes" : "No";
$conjuctival_injection = ($_SESSION['conjuctival_injection'] == 1) ?  "Yes" : "No";
$dyspnea_or_tachpnea = ($_SESSION['dyspnea_or_tachpnea'] == 1) ?  "Yes" : "No";
$abnormal_lung_ausculation = ($_SESSION['abnormal_lung_ausculation'] == 1) ?  "Yes" : "No";


$date_of_onset_symptoms = $_SESSION['date_first_at_hospital'];
$date_of_admission = $_SESSION['date_of_admission'];
$date_first_at_hospital = $_SESSION['date_first_at_hospital'];
$name_of_hospital = $_SESSION['name_of_hospital'];
$hospital_visit_number = $_SESSION['hospital_visit_number'];
$date_of_isolation = $_SESSION['date_of_isolation'];
$date_of_death = $_SESSION['date_of_death'];
$other_symptoms = $_SESSION['other_symptoms'];
$asymptomatic = ($_SESSION['asymptomatic'] == 1) ?  "Yes" : "No";
$admitted_to_hospital = ($_SESSION['admitted_to_hospital'] == 1) ?  "Yes" : "No";
$ventialted = ($_SESSION['ventialted'] == 1) ?  "Yes" : "No";


// Logo Base 64 for pdf
$registration_number = $_SESSION['registration_number'];
$path = 'https://covidtest.thetrusthospital.com/dev/assets/img/icons/Trust-hspital-logo.png';
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
<img src="'.$path.' ?>" width="150" height="150"/>
<h1 style="margin-bottom: -10px;">The Trust Hospital - Covid Test Portal</h1>
<h2>Patient Booking Form</h2>

<h3>Registration Number: '.$_SESSION['registration_number'].'</h3>
<table>
  <tr>
    <th>Full Name: </th>
    <td>'. $_SESSION['name'].'</td>
  </tr>
  <tr>
    <th>Email Address: </th>
    <td>'. $_SESSION['email'].'</td>
  </tr>
  <tr>
    <th>Phone Number: </th>
    <td>'.$_SESSION["phone"].'</td>
  </tr>
  <tr>
    <th>Gender: </th>
    <td>'.$_SESSION["gender"].'</td>
  </tr>
  <tr>
    <th>Passport ID: </th>
    <td>'.$_SESSION["passport"].'</td>
  </tr>
  <tr>
    <th>Home Address: </th>
    <td>'.$_SESSION["address"].'</td>
  </tr>
  <tr>
    <th>Date of Birth: </th>
    <td>'.$_SESSION["DOB"].'</td>
  </tr>
  <tr>
    <th>Receipt Number: </th>
    <td>'.$_SESSION["receipt_number"].'</td>
  </tr>
  <tr>
    <th>Hospital Number: </th>
    <td>'.$_SESSION["hospital_number"].'</td>
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
    <td>'.$ventialted.'</td>
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



</html>

');
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("BookingFormPDF",array("Attachment" => true));
// def("DOMPDF_ENABLE_REMOTE", true);
$options = new Options();
$options->set('isRemoteEnabled',true);      
$dompdf = new Dompdf( $options );
exit(0);
}else{
    echo "wrong";
}
?>