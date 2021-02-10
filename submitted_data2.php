<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
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

h2, h3{
  text-align: center;
  margin-left: auto;
  margin-right: auto;
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

body {
  height: 100vh;
  margin: 0 auto;
  display: grid;
  place-items: center;
  padding: calc(var(--space) * 2);
  max-width: 700px;
}

.multi-button {
  display: flex;
  width: 100%;
  box-shadow: var(--shadow) 4px 4px;
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
</style>
</head>


<?php


if(isset($_POST['submit']) && $_POST['submit'] == "Submit")
{


    // Personal info
	$fullName = $_POST["name"];
	$email = $_POST["email"];
	$phone = $_POST["phone"];
	$gender = $_POST["gender"];
	$passport = $_POST["passport"];
  $address = $_POST["address"];
  $date_of_birth = $_POST["DOB"];
	$receipt_number = $_POST["receipt_number"];
  $hospital_number = $_POST["hospital_number"];

	// Symptoms Information

if(isset($_POST["fever_or_chills"]))
{
	$fever_or_chills = $_POST["fever_or_chills"];

}else
{
	$fever_or_chills = 0;
}
if(isset($_POST["generalWeakness"]))
{
	$generalWeakness = $_POST["generalWeakness"];
}else
{
	$generalWeakness = 0;
}
if(isset($_POST["cough"]))
{
	$cough = $_POST["cough"];
}else
{
	$cough = 0;
}
if(isset($_POST["soreThroat"]))
{
	$soreThroat = $_POST["soreThroat"];
}else
{
	$soreThroat = 0;
}
if(isset($_POST["runnyNose"]))
{
	$runnyNose = $_POST["runnyNose"];
}else
{
	$runnyNose = 0;
}
if(isset($_POST["loss_of_smell"]))
{
	$loss_of_smell = $_POST["loss_of_smell"];
}else
{
	$loss_of_smell = 0;
}
if(isset($_POST["shortness_of_breath"]))
{
	$shortness_of_breath = $_POST["shortness_of_breath"];
}else
{
	$shortness_of_breath = 0;
}
if(isset($_POST["diarrhoea"]))
{
	$diarrhoea = $_POST["diarrhoea"];
}else
{
	$diarrhoea = 0;
}
if(isset($_POST["nausea_or_vomiting"]))
{
	$nausea_or_vomiting = $_POST["nausea_or_vomiting"];
}else
{
	$nausea_or_vomiting = 0;
}
if(isset($_POST["irritability_or_confusion"]))
{
	$irritability_or_confusion = $_POST["irritability_or_confusion"];
}else
{
	$irritability_or_confusion = 0;
}
if(isset($_POST["loss_of_taste"]))
{
	$loss_of_taste = $_POST["loss_of_taste"];
}else
{
	$loss_of_taste = 0;
}
if(isset($_POST["muscular_pain"]))
{
	$muscular_pain = $_POST["muscular_pain"];
}else
{
	$muscular_pain = 0;
}
if(isset($_POST["abdominal_pain"]))
{
	$abdominal_pain = $_POST["abdominal_pain"];
}else
{
	$abdominal_pain = 0;
}
if(isset($_POST["chest_pain"]))
{
	$chest_pain = $_POST["chest_pain"];
}else
{
	$chest_pain = 0;
}
if(isset($_POST["joint_pain"]))
{
	$joint_pain = $_POST["joint_pain"];
}else
{
	$joint_pain = 0;
}
if(isset($_POST["headache"]))
{
	$headache = $_POST["headache"];
}else
{
	$headache = 0;
}


	// Patient Vital Signs
	if(isset($_POST["seizure"]))
	{
		$seizure = $_POST["seizure"];
	}else{
		$seizure = 0;
	}
	if(isset($_POST["pharnygeal_exudate"]))
	{
		$pharnygeal_exudate = $_POST["pharnygeal_exudate"];
	}else{
		$pharnygeal_exudate = 0;
	}
	if(isset($_POST["abnormal_lung_xray"]))
	{
		$abnormal_lung_xray = $_POST["abnormal_lung_xray"];
	}else{
		$abnormal_lung_xray = 0;
	}
	if(isset($_POST["conjuctival_injection"]))
	{
		$conjuctival_injection = $_POST["conjuctival_injection"];
	}else{
		$conjuctival_injection = 0;
	}
	if(isset($_POST["dyspnea_or_tachpnea"]))
	{
		$dyspnea_or_tachpnea = $_POST["dyspnea_or_tachpnea"];
	}else{
		$dyspnea_or_tachpnea = 0;
	}
	if(isset($_POST["abnormal_lung_ausculation"]))
	{
		$abnormal_lung_ausculation = $_POST["abnormal_lung_ausculation"];
	}else{
		$abnormal_lung_ausculation = 0;
	}



    // Patient Clinical Course
	$date_of_onset_symptoms = $_POST["date_of_onset_symptoms"];
  $date_first_at_hospital = $_POST["date_first_at_hospital"];
  if(isset($_POST["asymptomatic"]))
	{
		$asymptomatic = $_POST["asymptomatic"];
	}else{
		$asymptomatic = 0;
	}
    $name_of_hospital = $_POST["name_of_hospital"];
    $hospital_visit_number = $_POST["hospital_visit_number"];
    $ventilated = $_POST["ventilated"];
    $date_of_death = $_POST["date_of_death"];
    $date_of_admission = $_POST["date_of_admission"];
    $date_of_isolation = $_POST["date_of_isolation"];
    $admitted_to_hospital = $_POST["admitted_to_hospital"];
    $other_symptoms = $_POST["other_symptoms"];
}


?>
<body>
<img class="logo" src="assets/img/icons/Trust-hspital-logo.png">

<h1 style="margin-bottom: -10px;">The Trust Hospital - Covid Test Portal</h1>
<h2 style="margin-bottom: -10px;">Patient Booking Form</h2>
<h3>Please review the data you provided</h3>

<!--<div class="multi-button">-->
<!--  <button><a href="javascript:history.go(-1)">Go back</a></button>-->
<!--   <button><a href="http://localhost/covid.trusthospital/generate_pdf.php?download=true">Download as PDF</a></button>-->
<!--  <button>  <a href="http://localhost/covid.trusthospital/proceed_to_save.php?status=save">Proceed</a></button>-->
<!--  </a>-->
<!--</div>-->

 <div class="multi-button">
  <button><a href="javascript:history.go(-1)">Go back</a></button>
   <button><a href="https://covidtest.thetrusthospital.com/dev/generate_pdf.php?download=true">Download as PDF</a></button>
  <button>  <a href="https://covidtest.thetrusthospital.com/dev/proceed.php?status=save">Proceed</a></button>
  </a>
</div>
<br>
<br>
<!-- <form action="process_data.php">
    <div class="form-row-last">
        <input type="submit" name="proceed" class="register" value="Submit">
    </div>
</form>
<form action="http://localhost/covid.trusthospital/generate_pdf.php" method="post">
    <div class="form-row-last">
        <input type="submit" name="download" value="Download PDF">
    </div>
</form> -->
<table>
  <tr>
    <th>Full Name: </th>
    <td><?php echo $fullName ?></td>
  </tr>
  <tr>
    <th>Email Address: </th>
    <td><?php echo $email ?></td>
  </tr>
  <tr>
    <th>Phone Number: </th>
    <td><?php echo $phone ?></td>
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
    <th>Home Address: </th>
    <td><?php echo $address ?></td>
  </tr>
  <tr>
    <th>Date of Birth: </th>
    <td><?php echo $date_of_birth ?></td>
  </tr>
  <tr>
    <th>Receipt Number: </th>
    <td><?php echo $receipt_number ?></td>
  </tr>
  <tr>
    <th>Hospital Number: </th>
    <td><?php echo $hospital_number ?></td>
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
    <td><?php echo ($seizure == '1') ? "Yes" : "No"; ?></td>
  </tr>
  <tr>
    <th>Conjuctival Injection: </th>
    <td><?php echo ($conjuctival_injection == '1') ? "Yes" : "No"; ?></td>
  </tr>
  <tr>
    <th>Pharnygeal Exudate: </th>
    <td><?php echo ($pharnygeal_exudate == '1') ? "Yes" : "No"; ?></td>
  </tr>
  <tr>
    <th>Dyspnea / Tachpnea: </th>
    <td><?php echo ($dyspnea_or_tachpnea == '1') ? "Yes" : "No"; ?></td>
  </tr>
  <tr>
    <th>Abnormal Lung X-ray: </th>
    <td><?php echo ($abnormal_lung_xray == '1') ? "Yes" : "No"; ?></td>
  </tr>
  <tr>
    <th>Abnormal Lung Auscultation: </th>
    <td><?php echo ($abnormal_lung_ausculation == '1') ? "Yes" : "No"; ?></td>
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
    <td><?php echo ($asymptomatic == '1') ? "Yes" : "No"; ?></td>
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
      echo "Unknown";
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
      echo "Unknown";
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
  $_SESSION['name'] = $fullName;                                 
  $_SESSION['phone'] = $phone;                                                  
  $_SESSION['email'] = $email;
  $_SESSION['passport'] = $passport;
  $_SESSION['address']  = $address;
  $_SESSION['DOB']  = $date_of_birth;
  $_SESSION['receipt_number'] = $receipt_number;
  $_SESSION['hospital_number']  = $hospital_number;
  $_SESSION['gender'] = $gender;
  $_SESSION['fever_or_chills']  = $fever_or_chills;
  $_SESSION['generalWeakness'] = $generalWeakness;
  $_SESSION['cough']  = $cough;
  $_SESSION['soreThroat']  = $soreThroat;
  $_SESSION['runnyNose']  = $runnyNose;
  $_SESSION['shortness_of_breath']  = $shortness_of_breath;
  $_SESSION['diarrhoea']  = $diarrhoea;
  $_SESSION['nausea_or_vomiting']  = $nausea_or_vomiting;
  $_SESSION['headache']  = $headache;
  $_SESSION['irritability_or_confusion']  =	$irritability_or_confusion;
  $_SESSION['loss_of_smell']  = $loss_of_smell;
  $_SESSION['loss_of_taste']  = $loss_of_taste;
  $_SESSION['muscular_pain']  =	$muscular_pain;
  $_SESSION['chest_pain']  = $chest_pain;
  $_SESSION['abdominal_pain']  =	$abdominal_pain;
  $_SESSION['joint_pain']  = $joint_pain;
  $_SESSION['seizure']  =	$seizure;
  $_SESSION['pharnygeal_exudate']  = $pharnygeal_exudate;
  $_SESSION['abnormal_lung_xray']  =	$abnormal_lung_xray;
  $_SESSION['conjuctival_injection']  =	$conjuctival_injection;
  $_SESSION['dyspnea_or_tachpnea']  = $dyspnea_or_tachpnea;
  $_SESSION['abnormal_lung_ausculation']  =	$abnormal_lung_ausculation;
  $_SESSION['date_of_onset_symptoms']  =	$date_of_onset_symptoms;
  $_SESSION['date_first_at_hospital']  = $date_first_at_hospital;
  $_SESSION['asymptomatic']  = $asymptomatic;
  $_SESSION['admitted_to_hospital']  = $admitted_to_hospital;
  $_SESSION['date_of_admission']  = $date_of_admission;
  $_SESSION['name_of_hospital']  =	$name_of_hospital;
  $_SESSION['hospital_visit_number']  =	$hospital_visit_number;
  $_SESSION['date_of_isolation']  = $date_of_isolation;
  $_SESSION['ventilated']  =	$ventilated;
  $_SESSION['date_of_death']  =	$date_of_death;
  $_SESSION['other_symptoms'] =	$other_symptoms;

  
  $_SESSION['registration_number'] = mt_rand(1262055681,1262055681);
  ?>

</body>
</html>




