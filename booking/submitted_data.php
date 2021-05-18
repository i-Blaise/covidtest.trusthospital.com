<?php
include('../class_libraries/class_lib.php');
$getData = new dbData();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Covid Test Portal - The Trust Hospital</title>
	<link rel="icon" type="image/png" href="img/trust-logo.png">
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  margin-left: auto;
  margin-right: auto;
  width: 80%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

/*h2, h3{*/
/*  text-align: center;*/
/*  margin-left: auto;*/
/*  margin-right: auto;*/
/*}*/

h1 {
    font-family: Montserrat, sans-serif;
    margin-bottom: .5rem!important;
    font-weight: 700;
    color: darkgray;
}

h2 {
    font-family: Montserrat, sans-serif;
    text-align: left!important;
    margin: 2rem 0 .5rem !important;
    width: 80%;
    font-size: 27px;
    font-weight: 500;
}
h3 {
    font-family: Montserrat, sans-serif;
    text-align: left!important;
    margin: 1.5rem 0!important;
    width: 80%;
    font-size: 16px;
    color: darkorange;
}
.h3-one {
    margin: 0 0 1.5rem!important;
}


/* Buttons */

:root {
  --border-size: 0.125rem;
  --duration: 250ms;
  --ease: cubic-bezier(0.215, 0.61, 0.355, 1);
  --font-family: monospace;
  --color-primary: white;
  --color-secondary: black;
  --color-tertiary: dodgerblue;
  --shadow: rgba(0, 0, 0, 0.1);
  --space: 1rem;
}

* {
  box-sizing: border-box;
}

img.logo {
    width: 200px;
}
body {
    height: 100%;
    width: 100vw;
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    place-items: center;
    padding: calc(var(--space) * 2);
    max-width: 80vw;
}
.multi-button {
  display: flex;
  width: 80%;
}

.multi-button button {
  flex-grow: 1;
  cursor: pointer;
  position: relative;
  padding:
    calc(var(--space) / 1.125)
    var(--space)
    var(--space);
  border: var(--border-size) solid black;
  color: var(--color-secondary);
  background-color: var(--color-primary);
  font-size: 1.5rem;
  font-family: var(--font-family);
  text-transform: lowercase;
  text-shadow: var(--shadow) 2px 2px;
  transition: flex-grow var(--duration) var(--ease);
}

.multi-button button + button {
  border-left: var(--border-size) solid black;
  margin-left: calc(var(--border-size) * -1);
}

.multi-button button:hover,
.multi-button button:focus {
  flex-grow: 2;
  color: white;
  outline: none;
  text-shadow: none;
  background-color: var(--color-secondary);
}

.multi-button button:focus {
  outline: var(--border-size) dashed var(--color-primary);
  outline-offset: calc(var(--border-size) * -3);
}

.multi-button:hover button:focus:not(:hover) {
  flex-grow: 1;
  color: var(--color-secondary);
  background-color: var(--color-primary);
  outline-color: var(--color-tertiary);
}

.multi-button button:active {
  transform: translateY(var(--border-size));
}
.multi-button button a {
    text-decoration: none;
    color: darkgray;
}

/*Mobile Style*/

@media only screen and (max-width: 767px) {
   body {
    max-width: 100vw;
}
.multi-button {
    display: flex;
    width: 100%;
}
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    margin-left: auto;
    margin-right: auto;
    width: 100%;
}
h2 {
    width: 100%;
}
h3 {
    width: 100%;
}
}

</style>
</head>


<?php

if(isset($_POST['submit']) && $_POST['submit'] == "Submit")
{

  $_SESSION['post'] = $_POST;
//   print_r($_SESSION['post']);
  // $fever_or_chills = (isset($_SESSION['post']['fever_or_chills']) && $_SESSION['post']['fever_or_chills'] == 1) ?  "Yes" : "No";
  // echo $fever_or_chills;
//   die();

    // Personal info
	$fullName = $_POST["name"];
	$email = $_POST["email"];
	$raw_phone = $_POST["phone"];
  $phone = $getData->addCountryCode($raw_phone);
	$gender = $_POST["gender"];
	$passport = $_POST["passport"];
  $district = $_POST["district"];
  $address = $_POST["address"];
  $landmark = $_POST["landmark"];
  $date_of_birth = $_POST["DOB"];
  $age = $_POST["age"];
	$receipt_number = $_POST["receipt_number"];
  $hospital_number = $_POST["hospital_number"];

  $package_name = $_POST["package_name"];

  switch ($package_name) {
    case "48 hours - GHS 300 (On-Premises)":
      $package_amount = 300;
      break;
    case "12 hours - GHS 500 (On-Premises)":
      $package_amount = 500 ;
      break;
    case "2-4 hours - GHS 900 (On-Premises)":
      $package_amount = 900;
      break;
    case "12 hours - GHS 700 per test (Premium)":
      $package_amount = 700;
      break;
    case "4 hours - GHS 1000 per test (Premium)";
      $package_amount = 1000;
      break;
      default:
      $package_amount = "Error - Unknown";
  }

	// Symptoms Information


$fever_or_chills = (!empty($_POST["fever_or_chills"])) ?  $_POST["fever_or_chills"] : 0;
$generalWeakness = (!empty($_POST["generalWeakness"])) ?  $_POST["generalWeakness"] : 0;
$cough = (!empty($_POST["cough"])) ?  $_POST["cough"] : 0;
$soreThroat = (!empty($_POST["soreThroat"])) ?  $_POST["soreThroat"] : 0;
$runnyNose = (!empty($_POST["runnyNose"])) ?  $_POST["runnyNose"] : 0;
$loss_of_smell = (!empty($_POST["loss_of_smell"])) ?  $_POST["loss_of_smell"] : 0;
$shortness_of_breath = (!empty($_POST["shortness_of_breath"])) ?  $_POST["shortness_of_breath"] : 0;
$diarrhoea = (!empty($_POST["diarrhoea"])) ?  $_POST["diarrhoea"] : 0;
$nausea_or_vomiting = (!empty($_POST["nausea_or_vomiting"])) ?  $_POST["nausea_or_vomiting"] : 0;
$irritability_or_confusion = (!empty($_POST["irritability_or_confusion"])) ?  $_POST["irritability_or_confusion"] : 0;
$loss_of_taste = (!empty($_POST["loss_of_taste"])) ?  $_POST["loss_of_taste"] : 0;
$headache = (!empty($_POST["headache"])) ?  $_POST["headache"] : 0;


$muscular_pain = (!empty($_POST["muscular_pain"])) ?  $_POST["muscular_pain"] : 0;
$abdominal_pain = (!empty($_POST["abdominal_pain"])) ?  $_POST["abdominal_pain"] : 0;
$chest_pain = (!empty($_POST["chest_pain"])) ?  $_POST["chest_pain"] : 0;
$joint_pain = (!empty($_POST["joint_pain"])) ?  $_POST["joint_pain"] : 0;


	// Patient Vital Signs
$seizure = (!empty($_POST["seizure"])) ?  $_POST["seizure"] : 0;
$pharnygeal_exudate = (!empty($_POST["pharnygeal_exudate"])) ?  $_POST["pharnygeal_exudate"] : 0;
$abnormal_lung_xray = (!empty($_POST["abnormal_lung_xray"])) ?  $_POST["abnormal_lung_xray"] : 0;
$conjuctival_injection = (!empty($_POST["conjuctival_injection"])) ?  $_POST["conjuctival_injection"] : 0;
$dyspnea_or_tachpnea = (!empty($_POST["dyspnea_or_tachpnea"])) ?  $_POST["dyspnea_or_tachpnea"] : 0;
$abnormal_lung_ausculation = (!empty($_POST["abnormal_lung_ausculation"])) ?  $_POST["abnormal_lung_ausculation"] : 0;


    // Patient Clinical Course
	$date_of_onset_symptoms = (!empty($_POST["date_of_onset_symptoms"])) ? $_POST["date_of_onset_symptoms"] : "N/A";
  $date_first_at_hospital = (!empty($_POST["date_first_at_hospital"])) ? $_POST["date_first_at_hospital"] : "N/A";
  $asymptomatic = (!empty($_POST["asymptomatic"])) ?  $_POST["asymptomatic"] : "N/A";
  $name_of_hospital = (!empty($_POST["name_of_hospital"])) ? $_POST["name_of_hospital"] : "N/A";
  $hospital_visit_number = (!empty($_POST["hospital_visit_number"])) ? $_POST["hospital_visit_number"] : "N/A";
  $ventilated = (!empty($_POST["ventilated"])) ? $_POST["ventilated"] : "N/A";
  $date_of_death = (!empty($_POST["date_of_death"])) ? $_POST["date_of_death"] : "N/A";
  $date_of_admission = (!empty($_POST["date_of_admission"])) ? $_POST["date_of_admission"] : "N/A";
  $date_of_isolation = (!empty($_POST["date_of_isolation"])) ? $_POST["date_of_isolation"] : "N/A";
  $admitted_to_hospital = (!empty($_POST["admitted_to_hospital"])) ? $_POST["admitted_to_hospital"] : "N/A";
  $other_symptoms = (!empty($_POST["other_symptoms"])) ? $_POST["other_symptoms"] : "N/A";
}


?>
<body>
<img class="logo" src="../assets/img/icons/Trust-hspital-logo.png">

<h1 style="margin-bottom: -10px;">The Trust Hospital - Covid Test Portal</h1>
<h2 style="margin-bottom: -10px;">PATIENT BOOKING FORM</h2>
<h3 class="h3-one">Please review the data you provided</h3>


<div class="multi-button">
<button><a href="javascript:history.go(-1)">Go back</a></button>
 <button><a href="http://localhost/covid.trusthospital/booking/generate_pdf.php?download=true">Download as PDF</a></button>
 <button><a href="http://localhost/covid.trusthospital/payment_api/redirect.php?token=3a5c6651f230d818ccd0715fd91e7a527ec0bb8c93185b790dc986196cf935dededa7230c309ecbd0d27265e19cee8fb&qs=%7B%22aapf_txn_amt%22%3A%220.5%22,%22aapf_txn_clientRspRedirectURL%22%3A%22https%3A%2F%2Fcovidtest.thetrusthospital.com%2Fdev%2Fpayment_api%2Fredirect.php?token=3a5c6651f230d818ccd0715fd91e7a527ec0bb8c93185b790dc986196cf935dededa7230c309ecbd0d27265e19cee8fb%22,%22aapf_txn_clientTxnWH%22%3A%22http%3A%2F%2F4a767a17.ngrok.io%2Frest%2Fapi%2Fcallback%22,%22aapf_txn_cref%22%3A%2278babbd4d%22,%22aapf_txn_currency%22%3A%22GHS%22,%22aapf_txn_datetime%22%3A%222021%2F02%2F25%2018%3A19%3A14%22,%22aapf_txn_gw_ref%22%3A%2209FG02251817276146462%22,%22aapf_txn_gw_sc%22%3A%2299-PENDING%22,%22aapf_txn_maskedInstr%22%3A%2205452**150%22,%22aapf_txn_otherInfo%22%3A%22test%20payment%22,%22aapf_txn_payLink%22%3A%223P4Yu8At%22,%22aapf_txn_payScheme%22%3A%22MTNMM%22,%22aapf_txn_ref%22%3A%222991-451a-8d1e%22,%22aapf_txn_sc%22%3A%2206%22,%22aapf_txn_sc_msg%22%3A%2299-PENDING%22,%22aapf_txn_signature%22%3A%223B13B61DDB0B5087B7B7103914181E0C049F0B71C26C60353C2623DC03139B6A%22%7D">Sumbmit and pay online</a></button>
  <!-- <button onclick="checkout()" >Sumbmit and pay online</button> -->
<button>  <a href="http://localhost/covidtest.trusthospital.com/booking/proceed.php?status=save">Submit and Pay Later</a></button>
</a>
</div>



  <!-- <div class="multi-button">
  <button><a href="javascript:history.go(-1)">Go back</a></button>
   <button><a href="https://covidtest.thetrusthospital.com/booking/generate_pdf.php?download=true">Download as PDF</a></button>
  <button><a href="https://covidtest.thetrusthospital.com/payment_api">Save and pay online</a></button>
  <button>  <a href="https://covidtest.thetrusthospital.com/booking/proceed.php?status=save">Save and pay later</a></button>
</div> -->

</div>
<br>
<br>
<table>
  <tr>
    <th>Full Name: </th>
    <td id="name"><?php echo $fullName ?></td>
  </tr>
  <tr>
    <th>Email Address: </th>
    <td id="email"><?php echo $email ?></td>
  </tr>
  <tr>
    <th>Phone Number: </th>
    <td id="phone"><?php echo $phone ?></td>
  </tr>
  <tr>
    <th>Gender: </th>
    <td><?php echo $gender ?></td>
  </tr>
  <tr>
    <th>Passport ID: </th>
    <td><?php echo $passport ?></td>
  </tr>
  <tr>
    <th>District: </th>
    <td><?php echo $district ?></td>
  </tr>
  <tr>
    <th>Home Address: </th>
    <td><?php echo $address ?></td>
  </tr>
  <tr>
    <th>Landmark: </th>
    <td><?php echo $landmark ?></td>
  </tr>
  <tr>
    <th>Date of Birth: </th>
    <td><?php echo $date_of_birth ?></td>
  </tr>
  <tr>
    <th>Age: </th>
    <td><?php echo $age.' years' ?></td>
  </tr>
  <tr>
    <th>Receipt Number: </th>
    <td><?php echo $receipt_number ?></td>
  </tr>
  <tr>
    <th>Hospital Number: </th>
    <td><?php echo $hospital_number ?></td>
  </tr>
  <tr>
    <th>Selected Package: </th>
    <td><?php echo $package_name ?></td>
  </tr>
  <tr style="display:none;">
    <th>Amount: </th>
    <td id='amount'><?php echo $package_amount ?></td>
  </tr>
</table>


<table>
  <h3>Symptoms Info</h3>
  <tr>
    <th>History of fever / chills: </th>
    <td><?php echo ($fever_or_chills == '1') ? "Yes" : "No"; ?></td>
  </tr>
  <tr>
    <th>General Weakness: </th>
    <td><?php echo ($generalWeakness == '1') ? "Yes" : "No"; ?></td>
  </tr>
  <tr>
    <th>Cough: </th>
    <td><?php echo ($cough == '1') ? "Yes" : "No"; ?></td>
  </tr>
  <tr>
    <th>Sore Throat: </th>
    <td><?php echo ($soreThroat == '1') ? "Yes" : "No"; ?></td>
  </tr>
  <tr>
    <th>Runny Nose: </th>
    <td><?php echo ($runnyNose == '1') ? "Yes" : "No"; ?></td>
  </tr>
  <tr>
    <th>Loss Of Smell: </th>
    <td><?php echo ($loss_of_smell == '1') ? "Yes" : "No"; ?></td>
  </tr>
  <tr>
    <th>General Weakness: </th>
    <td><?php echo ($generalWeakness == '1') ? "Yes" : "No"; ?></td>
  </tr>
  <tr>
    <th>Shortness Of Breath: </th>
    <td><?php echo ($shortness_of_breath == '1') ? "Yes" : "No"; ?></td>
  </tr>
  <tr>
    <th>Diarrhoea: </th>
    <td><?php echo ($diarrhoea == '1') ? "Yes" : "No"; ?></td>
  </tr>
  <tr>
    <th>Nausea / Vomiting: </th>
    <td><?php echo ($nausea_or_vomiting == '1') ? "Yes" : "No"; ?></td>
  </tr>
  <tr>
    <th>Headache: </th>
    <td><?php echo ($headache == '1') ? "Yes" : "No"; ?></td>
  </tr>
  <tr>
    <th>Irritability / Confusion: </th>
    <td><?php echo ($irritability_or_confusion == '1') ? "Yes" : "No"; ?></td>
  </tr>
  <tr>
    <th>Loss Of Taste: </th>
    <td><?php echo ($loss_of_taste == '1') ? "Yes" : "No"; ?></td>
  </tr>
</table>


<table>
  <h3>Pains</h3>
  <tr>
    <th>Muscular Pains: </th>
    <td><?php echo ($muscular_pain == '1') ? "Yes" : "No"; ?></td>
  </tr>
  <tr>
    <th>Chest Pains: </th>
    <td><?php echo ($chest_pain == '1') ? "Yes" : "No"; ?></td>
  </tr>
  <tr>
    <th>Abdominal Pains: </th>
    <td><?php echo ($abdominal_pain == '1') ? "Yes" : "No"; ?></td>
  </tr>
  <tr>
    <th>Joint Pains: </th>
    <td><?php echo ($joint_pain == '1') ? "Yes" : "No"; ?></td>
  </tr>
</table>

<table>
  <h3>Vital Signs</h3>
  <tr>
    <th>Seizure: </th>
    <td><?php echo ($seizure == '1') ? "Yes" : "N/A"; ?></td>
  </tr>
  <tr>
    <th>Conjuctival Injection: </th>
    <td><?php echo ($conjuctival_injection == '1') ? "Yes" : "N/A"; ?></td>
  </tr>
  <tr>
    <th>Pharnygeal Exudate: </th>
    <td><?php echo ($pharnygeal_exudate == '1') ? "Yes" : "N/A"; ?></td>
  </tr>
  <tr>
    <th>Dyspnea / Tachpnea: </th>
    <td><?php echo ($dyspnea_or_tachpnea == '1') ? "Yes" : "N/A"; ?></td>
  </tr>
  <tr>
    <th>Abnormal Lung X-ray: </th>
    <td><?php echo ($abnormal_lung_xray == '1') ? "Yes" : "N/A"; ?></td>
  </tr>
  <tr>
    <th>Abnormal Lung Auscultation: </th>
    <td><?php echo ($abnormal_lung_ausculation == '1') ? "Yes" : "N/A"; ?></td>
  </tr>
</table>

<table>
  <h3>Clinical Course</h3>
  <tr>
    <th>Date of onset of symptoms: </th>
    <td><?php echo $date_of_onset_symptoms?></td>
  </tr>
  <tr>
    <th>Asymptomatic: </th>
    <td><?php echo ($asymptomatic == '1') ? "Yes" : $asymptomatic; ?></td>
  </tr>
  <tr>
    <th>Date first seen at hospital </th>
    <td><?php echo $date_first_at_hospital; ?></td>
  </tr>
  <tr>
    <th>Admitted to hospital?: </th>
    <td><?php if($admitted_to_hospital == 1)
    {
      echo "Yes";
    }elseif($admitted_to_hospital == 0)
    {
      echo "No";
    }else{
      echo $admitted_to_hospital;
    } ?></td>
  </tr>
  <tr>
    <th>Name of Hospital: </th>
    <td><?php echo $name_of_hospital ?></td>
  </tr>
  <tr>
    <th>Hospital visit number: </th>
    <td><?php echo $hospital_visit_number; ?></td>
  </tr>
  <tr>
    <th>Date of admission: </th>
    <td><?php echo $date_of_admission; ?></td>
  </tr>
  <tr>
    <th>Date of isolation: </th>
    <td><?php echo $date_of_isolation; ?></td>
  </tr>
  <tr>
    <th>Was person ventilated: </th>
    <td><?php if($ventilated == 1)
    {
      echo "Yes";
    }elseif($ventilated == 0)
    {
      echo "No";
    }else{
      echo $ventilated;
    } ?></td>
  </tr>
  <tr>
    <th>Date of death (if applicable): </th>
    <td><?php echo $date_of_death; ?></td>
  </tr>
  <tr>
    <th>Other underlying conditions: </th>
    <td><?php echo $other_symptoms; ?></td>
  </tr>
</table>

<!-- <div class="multi-button">
  <button>Go back</button>
  <button>Download as PDF</button>
  <button>Proceed</button>
</div> -->
<?php
  // $_SESSION['name'] = $fullName;                                 
  // $_SESSION['phone'] = $phone;                                                  
  // $_SESSION['email'] = $email;
  // $_SESSION['passport'] = $passport;
  // $_SESSION['district']  = $district;
  // $_SESSION['address']  = $address;
  // $_SESSION['landmark']  = $landmark;
  // $_SESSION['DOB']  = $date_of_birth;
  // $_SESSION['age']  = $age;
  // $_SESSION['receipt_number'] = $receipt_number;
  // $_SESSION['hospital_number']  = $hospital_number;
  // $_SESSION['gender'] = $gender;
  // $_SESSION['fever_or_chills']  = $fever_or_chills;
  // $_SESSION['generalWeakness'] = $generalWeakness;
  // $_SESSION['cough']  = $cough;
  // $_SESSION['soreThroat']  = $soreThroat;
  // $_SESSION['runnyNose']  = $runnyNose;
  // $_SESSION['shortness_of_breath']  = $shortness_of_breath;
  // $_SESSION['diarrhoea']  = $diarrhoea;
  // $_SESSION['nausea_or_vomiting']  = $nausea_or_vomiting;
  // $_SESSION['headache']  = $headache;
  // $_SESSION['irritability_or_confusion']  =	$irritability_or_confusion;
  // $_SESSION['loss_of_smell']  = $loss_of_smell;
  // $_SESSION['loss_of_taste']  = $loss_of_taste;
  // $_SESSION['muscular_pain']  =	$muscular_pain;
  // $_SESSION['chest_pain']  = $chest_pain;
  // $_SESSION['abdominal_pain']  =	$abdominal_pain;
  // $_SESSION['joint_pain']  = $joint_pain;
  // $_SESSION['seizure']  =	$seizure;
  // $_SESSION['pharnygeal_exudate']  = $pharnygeal_exudate;
  // $_SESSION['abnormal_lung_xray']  =	$abnormal_lung_xray;
  // $_SESSION['conjuctival_injection']  =	$conjuctival_injection;
  // $_SESSION['dyspnea_or_tachpnea']  = $dyspnea_or_tachpnea;
  // $_SESSION['abnormal_lung_ausculation']  =	$abnormal_lung_ausculation;
  // $_SESSION['date_of_onset_symptoms']  =	$date_of_onset_symptoms;
  // $_SESSION['date_first_at_hospital']  = $date_first_at_hospital;
  // $_SESSION['asymptomatic']  = $asymptomatic;
  // $_SESSION['admitted_to_hospital']  = $admitted_to_hospital;
  // $_SESSION['date_of_admission']  = $date_of_admission;
  // $_SESSION['name_of_hospital']  =	$name_of_hospital;
  // $_SESSION['hospital_visit_number']  =	$hospital_visit_number;
  // $_SESSION['date_of_isolation']  = $date_of_isolation;
  // $_SESSION['ventilated']  =	$ventilated;
  // $_SESSION['other_symptoms'] =	$other_symptoms;

  
  $_SESSION['registration_number'] = 'TTH'.mt_rand(10000000, 99999999);
  $_SESSION['request'] = 'createPayLink';
  $_SESSION['amount'] = $package_amount;
  $_SESSION['post']['package_amount'] = $package_amount;
  $_SESSION['package_name'] = $package_name;
  ?>
</body>
</html>




