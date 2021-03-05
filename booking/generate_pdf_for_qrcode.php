<?php
// namespace Dompdf;
use Dompdf\Dompdf;
require_once '../vendor/autoload.php';
include('../class_libraries/class_lib.php');
// $getData = new dbData();

function turnTOBase64($path){
  $type = pathinfo($path, PATHINFO_EXTENSION);
  $data = file_get_contents($path);
  $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
  return $base64;
}
if(isset($_GET['status']))
{ 
  $getData = new dbData();
  $check = $_GET['status'];
  $check_code = substr($check,0,3);
  if($check_code == 'TTH')
  {
    $registration_number = $_GET['status'];
    $data = $getData->searchPatient($registration_number);
    $row = mysqli_fetch_array($data);
    // print($row['full_name']);
    // var_dump($row);

    // die();
    



$fever_or_chills = ($row['fever_or_chills'] == 1) ?  "Yes" : "No";
$generalWeakness = ($row['general_weakness'] == 1) ?  "Yes" : "No";
$cough = ($row['cough'] == 1) ?  "Yes" : "No";
$soreThroat = ($row['sore_throat'] == 1) ?  "Yes" : "No";
$runnyNose = ($row['runny_nose'] == 1) ?  "Yes" : "No";
$shortness_of_breath = ($row['shortness_of_breath'] == 1) ?  "Yes" : "No";
$diarrhoea = ($row['diarrhoea'] == 1) ?  "Yes" : "No";
$nausea_or_vomiting = ($row['nausea_or_vomiting'] == 1) ?  "Yes" : "No";
$headache = ($row['headache'] == 1) ?  "Yes" : "No";
$irritability_or_confusion = ($row['irritability_or_confusion'] == 1) ?  "Yes" : "No";
$loss_of_smell = ($row['loss_of_smell'] == 1) ?  "Yes" : "No";
$loss_of_taste = ($row['loss_of_taste'] == 1) ?  "Yes" : "No";


$muscular_pain = ($row['muscular_pain'] == 1) ?  "Yes" : "No";
$chest_pain = ($row['chest_pain'] == 1) ?  "Yes" : "No";
$abdominal_pain = ($row['abdominal_pain'] == 1) ?  "Yes" : "No";
$joint_pain = ($row['joint_pain'] == 1) ?  "Yes" : "No";


$seizure = ($row['seizure'] == 1) ?  "Yes" : "No";
$pharnygeal_exudate = ($row['pharnygeal_exudate'] == 1) ?  "Yes" : "No";
$abnormal_lung_xray = ($row['abnormal_lung_xray'] == 1) ?  "Yes" : "No";
$conjuctival_injection = ($row['conjuctival_injection'] == 1) ?  "Yes" : "No";
$dyspnea_or_tachpnea = ($row['dyspnea_or_tachpnea'] == 1) ?  "Yes" : "No";
$abnormal_lung_ausculation = ($row['abnormal_lung_ausculation'] == 1) ?  "Yes" : "No";


$date_of_onset_symptoms = $row['date_first_at_hospital'];
$date_of_admission = $row['date_of_admission'];
$date_first_at_hospital = $row['date_first_at_hospital'];
$name_of_hospital = $row['name_of_hospital'];
$hospital_visit_number = $row['hospital_visit_number'];
$date_of_isolation = $row['date_of_isolation'];
$date_of_death = $row['date_of_death'];
$other_symptoms = $row['other_underlying_conditions'];
$asymptomatic = ($row['asymptomatic'] == 1) ?  "Yes" : "No";
$admitted_to_hospital = ($row['admitted_to_hospital'] == 1) ?  "Yes" : "No";
$ventilated = ($row['was_person_ventilated'] == 1) ?  "Yes" : "No";


//  Base 64 images for pdf
// $qrcode_img_base64 = turnTOBase64($qrcode_img);
// $online_payment_base64 = turnTOBase64($qrcode_img);
$logo_path = 'img/trust-logo.png';
// $logo = turnTOBase64($logo_path);



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
<img src="'.$logo_path.'" width="180" height="150" alt="hospitals logo"/>
<h1 style="margin-bottom: -10px;">The Trust Hospital - Covid Test Portal</h1>
<h2>Patient Booking Form</h2>

<h3>Registration Number: '.$row['registration_number'].'</h3>
<table>
  <tr>
    <th>Full Name: </th>
    <td>'. $row['full_name'].'</td>
  </tr>
  <tr>
    <th>Email Address: </th>
    <td>'. $row['email'].'</td>
  </tr>
  <tr>
    <th>Phone Number: </th>
    <td>'.$row["phone_number"].'</td>
  </tr>
  <tr>
    <th>Gender: </th>
    <td>'.$row["sex"].'</td>
  </tr>
  <tr>
    <th>Passport ID: </th>
    <td>'.$row["passportID"].'</td>
  </tr>
  <tr>
  <th>District: </th>
  <td>'.$row["district"].'</td>
</tr>
  <tr>
    <th>Home Address: </th>
    <td>'.$row["home_address"].'</td>
  </tr>
  <tr>
  <th>Landmark: </th>
  <td>'.$row["landmark"].'</td>
</tr>
  <tr>
    <th>Date of Birth: </th>
    <td>'.$row["date_of_birth"].'</td>
  </tr>
  <tr>
  <th>Age: </th>
  <td>'.$row["age"].'</td>
</tr>
  <tr>
    <th>Receipt Number: </th>
    <td>'.$row["receipt_number"].'</td>
  </tr>
  <tr>
    <th>Hospital Number: </th>
    <td>'.$row["hospital_number"].'</td>
  </tr>
  <tr>
  <th>Selected Package: </th>
  <td>'.$row["packages"].'</td>
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

</html>

');
// $dompdf->def("DOMPDF_ENABLE_REMOTE", true);
// die();
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("BookingFormData",array("Attachment" => false));
// def("DOMPDF_ENABLE_REMOTE", true);
$options = new Options();
$options->set('isRemoteEnabled',true);      
$dompdf = new Dompdf( $options );
exit(0);
}else{
 echo 'invalid data.';
}
}else{
    echo "wrong";
}
?>