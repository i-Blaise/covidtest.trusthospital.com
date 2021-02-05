<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Covid Test Portal - The Trust Hospital</title>
	<link rel="icon" type="image/png" href="img/trust-logo.png">
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="css/montserrat-font.css">
	<link rel="stylesheet" type="text/css" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="css/style.css"/>
</head>
<!-- @if (session('status') === 'email exists')
<body class="form-v10" onload="email_exixts()">
@elseif (session('status') === 'tmc')
<body class="form-v10" onload="tmc()">
@else -->













<?php
include('../class_libraries/class_lib.php');
$database_con = new DB_con();
$getData = new dbData();



if(isset($_POST['submit']))
{

    // Personal info
	$fullName = $_POST["name"];
	$email = $_POST["email"];
	$phone = $_POST["phone"];
	$gender = $_POST["gender"];
	$passport = $_POST["passport"];
	$address = $_POST["address"];
	$receipt_number = $_POST["receipt"];
    $hospital_number = $_POST["hospital"];

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
	if(isset($_POST["abdnormal_lung_xray"]))
	{
		$abdnormal_lung_xray = $_POST["abdnormal_lung_xray"];
	}else{
		$abdnormal_lung_xray = 0;
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
	if(isset($_POST["abdnormal_lung_ausculation"]))
	{
		$abdnormal_lung_ausculation = $_POST["abdnormal_lung_ausculation"];
	}else{
		$abdnormal_lung_ausculation = 0;
	}



    // Patient Clinical Course
	$date_of_onset_symptoms = $_POST["date_of_onset_symptoms"];
	$date_first_at_hospital = $_POST["date_first_at_hospital"];
    $asymptomatic = $_POST["asymptomatic"];
    $name_of_hospital = $_POST["name_of_hospital"];
    $hospital_visit_number = $_POST["hospital_visit_number"];
    $ventialted = $_POST["ventialted"];
    $date_of_death = $_POST["date_of_death"];
    $date_of_admission = $_POST["date_of_admission"];
    $date_of_isolation = $_POST["date_of_isolation"];
    $admitted_to_hospital = $_POST["admitted_to_hospital"];
    $other_symptoms = $_POST["other_symptoms"];
    
    


if(isset($fullName, $email, $phone, $gender, $passport, $address, $receipt_number, $hospital_number)){


    $myQuery = "INSERT INTO patientbookingform (
		 full_name, 
		 phone_number,
		 email, 
		 passportID, 
		 home_address, 
		 receipt_number, 
		 hospital_number, 
		 sex, 
		 fever_or_chills, 
		 general_weakness, 
		 cough, 
		 sore_throat, 
		 runny_nose, 
		 shortness_of_breath, 
		 diarrhoea, 
		 nausea_or_vomiting, 
		 headache, 
		 irritability_or_confusion, 
		 loss_of_smell, 
		 loss_of_taste,
		 muscular_pain, 
		 chest_pain, 
		 abdominal_pain, 
		 joint_pain,
		 seizure,
		 pharnygeal_exudate, 
		 abdnormal_lung_xray,
		 conjuctival_injection,
		 dyspnea_or_tachpnea,
		 abdnormal_lung_ausculation,
		 date_of_onset_of_symptoms, 
		 date_first_at_hospital,
		 asymptomatic, 
		 admitted_to_hospital, 
		 date_of_admission, 
		 name_of_hospital, 
		 hospital_visit_number, 
		 date_of_isolation, 
		 was_person_ventilated, 
		 date_of_death, 
		 other_underlying_conditions) VALUES (
		'$fullName',
		'$phone',
		'$email',
		'$passport',
		'$address', 
		'$receipt_number', 
		'$hospital_number', 
		'$gender', 
		'$fever_or_chills', 
		'$generalWeakness', 
		'$cough', 
		'$soreThroat', 
		'$runnyNose', 
		'$shortness_of_breath', 
		'$diarrhoea', 
		'$nausea_or_vomiting', 
		'$headache', 
		'$irritability_or_confusion', 
		'$loss_of_smell', 
		'$loss_of_taste', 
		'$muscular_pain', 
		'$chest_pain', 
		'$abdominal_pain', 
		'$joint_pain', 
		'$seizure', 
		'$pharnygeal_exudate', 
		'$abdnormal_lung_xray', 
		'$conjuctival_injection', 
		'$dyspnea_or_tachpnea', 
		'$abdnormal_lung_ausculation', 
		'$date_of_onset_symptoms', 
		'$date_first_at_hospital', 
		'$asymptomatic', 
		'$admitted_to_hospital', 
		'$date_of_admission', 
		'$name_of_hospital', 
		'$hospital_visit_number', 
		'$date_of_isolation', 
		'$ventialted', 
		'$date_of_death', 
		'$other_symptoms')";
    $result=mysqli_query($database_con->dbh, $myQuery);
    if($result){
		echo "worked";
		// echo $result;
    }else{
		echo "Error" .mysqli_error($database_con->dbh);
	}
}else{
	echo "not set";
}
}
?>
<body class="form-v10">
<!-- @endif -->
	<div class="page-content">
		<img class="logo" src="img/Trust-hspital-logo.png">
		<div class="form-v10-content">
			<form class="form-detail" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data" id="myform">
				<div class="form-left">
					<h2>Patient Information</h2>
					<div class="form-row">
						<input type="text" name="name" class="input-text" placeholder="Full Name" required>
					</div>
					<div class="form-row">
						<input type="text" name="email" class="input-text" placeholder="Email Address" required  pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
					</div>
					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="text" name="phone" class="input-text" placeholder="Phone Number" required>
						</div>
						<div class="form-row form-row-2">
						<select name="gender">
						    <option value="male">Male</option>
						    <option value="female">Female</option>
						</select>
						<span class="select-btn">
						  	<i class="zmdi zmdi-chevron-down"></i>
						</span>
						</div>
					</div>
					<div class="form-row">
						<input type="text" name="passport" class="input-text" placeholder="Passport ID (For Travellers)">
					</div>
					<div class="form-row">
						<input type="text" name="address" class="input-text" required placeholder="Home Address">
					</div>
						<div class="form-group">
							<div class="form-row form-row-1">
								<input type="text" name="receipt" class="input-text" placeholder="Receipt Number" required>
							</div>
							<div class="form-row form-row-2">
								<input type="text" name="hospital" class="input-text" placeholder="Hospital Number">
							</div>
						</div>
				</div>
				<div class="form-right">
					<h2>Syptoms Information</h2>
					<h5 style="font-weight: bold; ">Patient symptoms(check all reported informations)</h5>
					<div class="form-group">
						<div class="form-row form-row-1">
					<div class="form-checkbox">
						<label class="container"><p>History of fever / Chills</p>
						  	<input type="checkbox" name="fever_or_chills" value="1">
						  	<span class="checkmark"></span>
						</label>
					</div>
					<div class="form-checkbox">
						<label class="container"><p>General Weakness</p>
						  	<input type="checkbox" name="generalWeakness" value="1">
						  	<span class="checkmark"></span>
						</label>
					</div>
					<div class="form-checkbox">
						<label class="container"><p>Cough</p>
						  	<input type="checkbox" name="cough" value="1">
						  	<span class="checkmark"></span>
						</label>
					</div>
					<div class="form-checkbox">
						<label class="container"><p>Sore Throat</p>
						  	<input type="checkbox" name="soreThroat" value="1">
						  	<span class="checkmark"></span>
						</label>
					</div>
					<div class="form-checkbox">
						<label class="container"><p>Runny Nose</p>
						  	<input type="checkbox" name="runnyNose" value="1">
						  	<span class="checkmark"></span>
						</label>
					</div>
					<div class="form-checkbox">
						<label class="container"><p>Loss of Smell</p>
						  	<input type="checkbox" name="loss_of_smell" value="1">
						  	<span class="checkmark"></span>
						</label>
					</div>
				</div>

				<div class="form-row form-row-2">
					<div class="form-checkbox">
						<label class="container"><p>Shortness Of Breath</p>
						  	<input type="checkbox" name="shortness_of_breath" value="1">
						  	<span class="checkmark"></span>
						</label>
					</div>
					<div class="form-checkbox">
						<label class="container"><p>Diarrhoea</p>
						  	<input type="checkbox" name="diarrhoea" value="1">
						  	<span class="checkmark"></span>
						</label>
					</div>
					<div class="form-checkbox">
						<label class="container"><p>Nausea / Vomiting</p>
						  	<input type="checkbox" name="nausea_or_vomiting" value="1">
						  	<span class="checkmark"></span>
						</label>
					</div>
					<div class="form-checkbox">
						<label class="container"><p>Headache</p>
						  	<input type="checkbox" name="headache" value="1">
						  	<span class="checkmark"></span>
						</label>
					</div>
					<div class="form-checkbox">
						<label class="container"><p>Irritability / Confusion</p>
						  	<input type="checkbox" name="irritability_or_confusion" value="1">
						  	<span class="checkmark"></span>
						</label>
					</div>
					<div class="form-checkbox">
						<label class="container"><p>Loss of Taste</p>
						  	<input type="checkbox" name="loss_of_taste" value="1">
						  	<span class="checkmark"></span>
						</label>
					</div>
				</div>
			</div>

			<h5 style="font-weight: bold; ">Pain (Check all that apply)</h5>
					<div class="form-group">
						<div class="form-row form-row-1">
					<div class="form-checkbox">
						<label class="container"><p>Muscular Pain</p>
						  	<input type="checkbox" name="muscular_pain" value="1">
						  	<span class="checkmark"></span>
						</label>
					</div>
					<div class="form-checkbox">
						<label class="container"><p>Abdominal pain</p>
						  	<input type="checkbox" name="abdominal_pain" value="1">
						  	<span class="checkmark"></span>
						</label>
					</div>
				</div>

				<div class="form-row form-row-2">
					<div class="form-checkbox">
						<label class="container"><p>Chest Pain</p>
						  	<input type="checkbox" name="chest_pain" value="1">
						  	<span class="checkmark"></span>
						</label>
					</div>
					<div class="form-checkbox">
						<label class="container"><p>Joint Pain</p>
						  	<input type="checkbox" name="joint_pain" value="1">
						  	<span class="checkmark"></span>
						</label>
					</div>
				</div>
			</div>
			<h2>Patient Vital Signs</h2>
			<h5 style="font-weight: bold; ">Check all observed signs:</h5>
			<div class="form-group">
			<div class="form-row form-row-1">
			<div class="form-checkbox">
				<label class="container"><p>Seizure</p>
					  <input type="checkbox" name="seizure" value="1">
					  <span class="checkmark"></span>
				</label>
			</div>
			<div class="form-checkbox">
				<label class="container"><p>Pharnygeal Exudate</p>
					  <input type="checkbox" name="pharnygeal_exudate" value="1">
					  <span class="checkmark"></span>
				</label>
			</div>
		<div class="form-checkbox">
			<label class="container"><p>Abnormal Lung X-ray</p>
				  <input type="checkbox" name="abdnormal_lung_xray" value="1">
				  <span class="checkmark"></span>
			</label>
		</div>
	</div>

		<div class="form-row form-row-2">
			<div class="form-checkbox">
				<label class="container"><p>Conjuctival Injection</p>
					  <input type="checkbox" name="conjuctival_injection" value="1">
					  <span class="checkmark"></span>
				</label>
			</div>
			<div class="form-checkbox">
				<label class="container"><p>Dyspnea / Tachpnea</p>
					  <input type="checkbox" name="dyspnea_or_tachpnea" value="1">
					  <span class="checkmark"></span>
				</label>
			</div>
			<div class="form-checkbox">
				<label class="container"><p>Abnormal Lung Auscultation</p>
					  <input type="checkbox" name="abdnormal_lung_ausculation" value="1">
					  <span class="checkmark"></span>
				</label>
			</div>
		</div>
	</div>


	<h2>Patient Clinical Course</h2>	
	
	<div class="form-row">
	<p style="color: white;">Date of onset of symptoms:</p>
		<input type="date" name="date_of_onset_symptoms" class="input-text" required>
	</div>
			<div class="form-group">
			<div class="form-row form-row-1">
			<div class="form-checkbox">
				<label class="container"><p>Asymptomatic</p>
					  <input type="checkbox" name="asymptomatic" value="1">
					  <span class="checkmark"></span>
				</label>
			</div>
	</div>

		<div class="form-row form-row-2">
		</div>	
	</div>

	<div class="form-row">
		<p style="color: white;">Date first seen at hospital:</p>
			<input type="date" name="date_first_at_hospital" class="input-text" required>
	</div>

	<div class="form-row">
		<select name="admitted_to_hospital">
			<option value="position">Admitted to hospital?</option>
			<option value="1">Yes</option>
			<option value="0">No</option>
			<option value="2">Unknown</option>
		</select>
		<span class="select-btn">
			  <i class="zmdi zmdi-chevron-down"></i>
		</span>
	</div>

	<div class="form-row">
			<input type="text" name="name_of_hospital" placeholder="Name of Hospital" class="input-text">
		</div>
		<div class="form-row">
				<input type="text" name="hospital_visit_number" placeholder="Hospital Visit Number" class="input-text">
		</div>		
		
		<div class="form-row">
			<p style="color: white;">Date of admission:</p>
					<input type="date" name="date_of_admission" class="input-text">
		</div>
		<div class="form-row">
			<p style="color: white;">Date of isolation:</p>
					<input type="date" name="date_of_isolation" class="input-text">
		</div>

		<div class="form-row">
			<select name="ventialted">
				<option value="position">Was the person ventilated:</option>
				<option value="1">Yes</option>
				<option value="0">No</option>
				<option value="2">Unknown</option>
			</select>
			<span class="select-btn">
				  <i class="zmdi zmdi-chevron-down"></i>
			</span>
		</div>

		<div class="form-row">
			<p style="color: white;">Date of death, if applicable:</p>
					<input type="date" name="date_of_death" class="input-text">
		</div>
		<div class="form-row">
			<input type="text" name="other_symptoms" placeholder="Others underlining conditions and comorbidity" class="input-text" required>
		</div>
					<div class="form-row-last">
						<input type="submit" name="submit" class="register" value="Submit">
					</div>
				</div>
			</form>
		</div>
	</div>
	<script>
	function email_exixts() {
  alert("This email is already in our system");
}

function tmc() {
  alert("accept terms and conditions");
}
</script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>