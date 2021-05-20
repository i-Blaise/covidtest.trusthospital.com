<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Covid Test Portal - The Trust Hospital</title>
	<link rel="icon" type="image/png" href="img/trust-logo.png">
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">  
<!-- <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> -->
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="css/montserrat-font.css">
	<link rel="stylesheet" type="text/css" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="css/style.css"/>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
</head>
<!-- @if (session('status') === 'email exists')
<body class="form-v10" onload="email_exixts()">
@elseif (session('status') === 'tmc')
<body class="form-v10" onload="tmc()">
@else -->
<style>
	/* .container {
    width:100%;
    border:1px solid #d3d3d3;
} */
/* .container div {
    width:100%;
} */
.container .header {
    background-color: transparent;
	text-align: center;
    /* padding: 2px; */
    cursor: pointer;
    font-weight: bold;
}
.container .content {
    display: none;
    /* padding : 5px; */
}
</style>












<?php

?>
<body class="form-v10">
<!-- @endif -->
	<div class="page-content">
		<a href="https://covidtest.thetrusthospital.com/dev/">
		<img class="logo" src="img/Trust-hspital-logo.png">
		</a>
		<div class="form-v10-content">
			<form class="form-detail" action="http://localhost/covid.trusthospital/booking/reveiw_data.php" method="post" enctype="multipart/form-data" id="myform">
				<div class="form-left">
					<h2>Patient Information</h2>
					<div class="form-row">
						<input type="text" name="name" class="input-text" placeholder="Full Name*" required>
					</div>
					<div class="form-row">
						<input type="text" name="email" class="input-text" placeholder="Email Address*" required  pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
					</div>
					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="text" name="phone" class="input-text" placeholder="Phone Number*" required>
						</div>
						<div class="form-row form-row-2">
						<select name="gender" required>
						    <option value="" disabled selected>Gender*</option>
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
					<select name="district" required>
						<option value="" disabled selected>District*</option>
						<option value=""disabled style="font-weight: bold;"><b>Greater Accra Region</b></option>
						<option value="Ablekuma Central">Ablekuma Central</option>
						<option value="Ablekuma North">Ablekuma North</option>
						<option value="Ablekuma West">Ablekuma West</option>
						<option value="Accra Metropolitan">Accra Metropolitan</option>
						<option value="Ada East">Ada East</option>
						<option value="Ada West">Ada West</option>
						<option value="Adenta">Adenta</option>
						<option value="Ashaiman">Ashaiman</option>
						<option value="Ayawaso East">Ayawaso East</option>
						<option value="Ayawaso Central">Ayawaso Central</option>
						<option value="Ayawaso North">Ayawaso North</option>
						<option value="Ayawaso West">Ayawaso West</option>
						<option value="Ga Central">Ga Central</option>
						<option value="Ga East">Ga East</option>
						<option value="Ga North">Ga North</option>
						<option value="Ga South">Ga South</option>
						<option value="Ga West">Ga West</option>
						<option value="Korle Klottey">Korle Klottey</option>
						<option value="Kpone Katamanso">Kpone Katamanso</option>
						<option value="Krowor">Krowor</option>
						<option value="La Dade Kotopon">La Dade Kotopon</option>
						<option value="La Nkwantanang Madina">La Nkwantanang Madina</option>
						<option value="Ledzokuku">Ledzokuku</option>
						<option value="Ningo Prampram">Ningo Prampram</option>
						<option value="Okaikwei North">Okaikwei North</option>
						<option value="Shai Osudoku">Shai Osudoku</option>
						<option value="Tema Metropolitan">Tema Metropolitan</option>
						<option value="Tema West">Tema West</option>
						<option value="Weija Gbawe">Weija Gbawe</option>
					</select>
					<span class="select-btn">
			  		<i class="zmdi zmdi-chevron-down"></i>
					</span>
					</div>

					<div class="form-row">
						<input type="text" name="address" class="input-text" required placeholder="Home Address*">
					</div>
					<div class="form-row">
						<input type="text" name="landmark" class="input-text" placeholder="Landmark">
					</div>
					<div class="form-row">
						<label class="date-label" style="color: black;">Date Of Birth*:</label>
						<input type="date" name="DOB" id="DOB" class="input-text" required placeholder="YYYY-MM-DD" onchange="ageCalculator()" value="">
					</div>
					<div class="form-row">
						<input type="hidden" name="age" id="age" class="input-text" placeholder="Please Input Your Date of Birth above" readonly>
					</div>
					<div class="form-row">
						<input type="text" name="age1" id="age1" class="input-text" placeholder="Please Input Your Date of Birth above" readonly>
					</div>
						<div class="form-group">
							<div class="form-row form-row-1">
								<input type="text" name="receipt_number" class="input-text" placeholder="Receipt Number">
							</div>
							<div class="form-row form-row-2">
								<input type="text" name="hospital_number" class="input-text" placeholder="Hospital Number">
							</div>
						</div>
					
				  	<h5 style="font-weight: bold; color: #EC8D62; ">Insurance</h5>
					  <div class="form-row">
					<select name="insuranceVal" id="insuranceVal" required onchange="insuranceCheck()">
						<option value="" disabled style="font-weight: bold;" selected>Insurance Type*</option>
						<option value="Insurance">Insurance</option>
						<option value="Corporate">Corporate</option>
						<option value="Private">Private</option>
					</select>
					<span class="select-btn">
			  		<i class="zmdi zmdi-chevron-down"></i>
					</span>
					</div>

					<div class="form-row">
						<input type="text" name="my_company" id="my_company" class="input-text" placeholder="My Company" disabled>
					</div>
					<div class="form-row">
						<input type="text" name="insurance_name" id="insurance_name" class="input-text" placeholder="Insurance Name" disabled>
					</div>
					<div class="form-row">
						<input type="text" name="insurance_number" id="insurance_number" class="input-text" placeholder="Insurance Number" disabled>
					</div>

					<h5 style="font-weight: bold; color: #EC8D62; ">Please select a package</h5>

					<div class="form-row">
			<select name="package_name" required>
				<option value=""disabled selected>Available Packages*:</option>
				<option value=""disabled style="font-weight: bold;"><b>On-Premises</b></option>
				<option value="48 hours - GHS 300 (On-Premises)">48 hours - GHS 300</option>
				<option value="12 hours - GHS 500 (On-Premises)">12 hours - GHS 500</option>
				<option value="2-4 hours - GHS 900 (On-Premises)">2-4 hours - GHS 900</option>
				<option value=""disabled style="font-weight: bold;"><b>Home Service (Premium)</b></option>
				<option value="12 hours - GHS 700 per test (Premium)">12 hours - GHS 700 per test</option>
				<option value="4 hours - GHS 1000 per test (Premium)">4 hours - GHS 1000 per test</option>
			</select>
			<span class="select-btn">
				  <i class="zmdi zmdi-chevron-down"></i>
			</span>
				</div>

				</div>




				<div class="form-right">
					<h2>Symptoms Information</h2>
					<h5 style="font-weight: bold; ">Patient symptoms(check all reported informations)</h5>
			<div class="container">
   			<div class="header"><span>Expand</span>
			</div>
			<div class="content">
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
			</div>
			</div>




			<h5 style="font-weight: bold; ">Pain (Check all that apply)</h5>
			<div class="container">
   			<div class="header"><span>Expand</span>
			</div>
			<div class="content">
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
			</div>
			</div>



			<!-- <h2>Patient Vital Signs</h2>
			<h5 style="font-weight: bold; ">Check all observed signs:</h5>
			
			<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Simple collapsible</button>
			<div id="demo" class="collapse">
			<div class="container">
    <div class="header"><span>Expand</span>

    </div>

	<div class="content">
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
				  <input type="checkbox" name="abnormal_lung_xray" value="1">
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
					  <input type="checkbox" name="abnormal_lung_ausculation" value="1">
					  <span class="checkmark"></span>
				</label>
			</div>
		</div>
	</div>
    </div>
</div> -->


	<!-- <h2>Patient Clinical Course</h2>	
	
	<div class="form-row">
	<label class="date-label" style="color: white;">Date of onset of symptoms:</label>
		<input type="date" name="date_of_onset_symptoms" class="input-text" placeholder="YYYY-MM-DD">
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
		<label class="date-label" style="color: white;">Date first seen at hospital:</label>
			<input type="date" name="date_first_at_hospital" class="input-text" placeholder="YYYY-MM-DD">
	</div>

	<div class="form-row">
		<select name="admitted_to_hospital" required>
			<option value="" disabled selected>Admitted to hospital?*</option>
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
			<label class="date-label" style="color: white;">Date of admission:</label>
					<input type="date" name="date_of_admission" class="input-text" placeholder="YYYY-MM-DD">
		</div>
		<div class="form-row">
			<label class="date-label" style="color: white;">Date of isolation:</label>
					<input type="date" name="date_of_isolation" class="input-text" placeholder="YYYY-MM-DD">
		</div>

		<div class="form-row">
			<select name="ventilated" required>
				<option value=""disabled selected>Was the person ventilated*:</option>
				<option value="1">Yes</option>
				<option value="0">No</option>
				<option value="2">Unknown</option>
			</select>
			<span class="select-btn">
				  <i class="zmdi zmdi-chevron-down"></i>
			</span>
		</div>

		<div class="form-row">
			<label class="date-label" style="color: white;">Date of death, if applicable:</label>
					<input type="date" name="date_of_death" class="input-text" placeholder="YYYY-MM-DD">
		</div>
		<div class="form-row">
			<input type="text" name="other_symptoms" placeholder="Other underlying conditions" class="input-text">
		</div> -->
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

function ageCalculator() {  
    var userinput = document.getElementById("DOB").value;  
    var dob = new Date(userinput);  
    if(userinput==null || userinput=='') {  
      document.getElementById("age").innerHTML = "**Choose a date please!";    
      return false;   
    } else {  
      
    //calculate month difference from current date in time  
    var month_diff = Date.now() - dob.getTime();  
      
    //convert the calculated difference in date format  
    var age_dt = new Date(month_diff);   
      
    //extract year from date      
    var year = age_dt.getUTCFullYear()
      
    //now calculate the age of the user  
    var age = Math.abs(year - 1970);
      
    //display the calculated age  
    document.getElementById("age1").value = age + ' years'; 
    document.getElementById("age").value = age; 
    }  
}  




function insuranceCheck() {  
	var disabled = true;
	var required = false;
    var insuranceVal = document.getElementById("insuranceVal").value;
	// alert(insuranceVal);
	if(insuranceVal == 'Insurance')
	{
        if (disabled)
		{
			$("#my_company").prop('disabled', false);
			$("#my_company").prop('required', true);
			
			$("#insurance_name").prop('disabled', false);
			$("#insurance_name").prop('required', true);

			$("#insurance_number").prop('disabled', false);
			$("#insurance_number").prop('required', true);
		}
	}else if(insuranceVal == 'Corporate')
	{
		if (disabled)
		{
			$("#my_company").prop('disabled', false);
			$("#my_company").prop('required', true);

			$("#insurance_name").prop('disabled', true);
			$("#insurance_name").prop('required', false);

			$("#insurance_number").prop('disabled', true);
			$("#insurance_number").prop('required', false);
		}

	}else if(insuranceVal == 'Private')
	{
		if (disabled)
		{
		$("#my_company").prop('disabled', true);
		$("#insurance_name").prop('disabled', true);
		$("#insurance_number").prop('disabled', true);
		}
	}
}
</script>
<script>
	$(".header").click(function () {

$header = $(this);
//getting the next element
$content = $header.next();
//open up the content needed - toggle the slide- if visible, slide up, if not slidedown.
$content.slideToggle(500, function () {
	//execute this after slideToggle is done
	//change text of header based on visibility of content div
	$header.text(function () {
		//change text based on condition
		return $content.is(":visible") ? "Collapse" : "Expand";
	});
});

});
</script>
</body>
</html>