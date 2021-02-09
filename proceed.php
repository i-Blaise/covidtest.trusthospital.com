
<?php


if(isset($_GET['status']) && $_GET['status'] == "save")
{
	include('class_libraries/class_lib.php');
	$database_con = new DB_con();
	$getData = new dbData();
	// For php mailer
	require_once 'vendor/autoload.php';

	
	if(isset($_SESSION['registration_number'], $_SESSION['name'], $_SESSION['email'], $_SESSION['phone'], $_SESSION['gender'], $_SESSION['address']))
	{
		$registration_number = $_SESSION['registration_number'];
		$fullName = $_SESSION['name'];
		$email = $_SESSION['email'];
		$phone_unfiltered = $_SESSION['phone'];
		$gender = $_SESSION['gender'];
		$passport = $_SESSION['passport'];
		$address = $_SESSION['address'];
		$dob = $_SESSION['DOB'];
		$receipt_number = $_SESSION['receipt_number'];
		$hospital_number = $_SESSION['hospital_number'];

	}else{
		// header("Location: https://covidtest.thetrusthospital.com/dev/index.php?status=errrror");
		session_destroy();
		echo "<script>location='https://covidtest.thetrusthospital.com/dev/index.php?status=errrror'</script>";
		die();
	}


	
	$fever_or_chills = ($_SESSION['fever_or_chills'] == 1) ?  1 : 0;
	$generalWeakness = ($_SESSION['generalWeakness'] == 1) ?  1 : 0;
	$cough = ($_SESSION['cough'] == 1) ?  1 : 0;
	$soreThroat = ($_SESSION['soreThroat'] == 1) ?  1 : 0;
	$runnyNose = ($_SESSION['runnyNose'] == 1) ?  1 : 0;
	$shortness_of_breath = ($_SESSION['shortness_of_breath'] == 1) ?  1 : 0;
	$diarrhoea = ($_SESSION['diarrhoea'] == 1) ?  1 : 0;
	$nausea_or_vomiting = ($_SESSION['nausea_or_vomiting'] == 1) ?  1 : 0;
	$headache = ($_SESSION['headache'] == 1) ?  1 : 0;
	$irritability_or_confusion = ($_SESSION['irritability_or_confusion'] == 1) ?  1 : 0;
	$loss_of_smell = ($_SESSION['loss_of_smell'] == 1) ?  1 : 0;
	$loss_of_taste = ($_SESSION['loss_of_taste'] == 1) ?  1 : 0;
	
	
	$muscular_pain = ($_SESSION['muscular_pain'] == 1) ?  1 : 0;
	$chest_pain = ($_SESSION['chest_pain'] == 1) ?  1 : 0;
	$abdominal_pain = ($_SESSION['abdominal_pain'] == 1) ?  1 : 0;
	$joint_pain = ($_SESSION['joint_pain'] == 1) ?  1 : 0;
	
	
	$seizure = ($_SESSION['seizure'] == 1) ?  1 : 0;
	$pharnygeal_exudate = ($_SESSION['pharnygeal_exudate'] == 1) ?  1 : 0;
	$abnormal_lung_xray = ($_SESSION['abnormal_lung_xray'] == 1) ?  1 : 0;
	$conjuctival_injection = ($_SESSION['conjuctival_injection'] == 1) ?  1 : 0;
	$dyspnea_or_tachpnea = ($_SESSION['dyspnea_or_tachpnea'] == 1) ?  1 : 0;
	$abnormal_lung_ausculation = ($_SESSION['abnormal_lung_ausculation'] == 1) ?  1 : 0;
	
	
	$date_of_onset_symptoms = $_SESSION['date_first_at_hospital'];
	$date_of_admission = $_SESSION['date_of_admission'];
	$date_first_at_hospital = $_SESSION['date_first_at_hospital'];
	$name_of_hospital = $_SESSION['name_of_hospital'];
	$hospital_visit_number = $_SESSION['hospital_visit_number'];
	$date_of_isolation = $_SESSION['date_of_isolation'];
	$date_of_death = $_SESSION['date_of_death'];
	$other_symptoms = $_SESSION['other_symptoms'];
	$asymptomatic = ($_SESSION['asymptomatic'] == 1) ?  1 : 0;
	$admitted_to_hospital = ($_SESSION['admitted_to_hospital'] == 1) ?  1 : 0;
	$ventialted = ($_SESSION['ventialted'] == 1) ?  1 : 0;



	// SMS
$client = 'TTH101010';
$password = 'Keep@123$';
$check_code = substr($phone_unfiltered,0,3);
$check_first_char = substr($phone_unfiltered,0,1);
$country_code = 233;
if($check_code != $country_code)
{
    $phone = $phone_unfiltered;
}else{
    $phone = $country_code.$phone_unfiltered;
}
$text = 'Hi '.$fullName.', Your Covid Test registration number is '.$registration_number.'
The Trust Hospital';
$msg = urlencode($text);
$get_data = $getData->callAPI('GET', 'https://api.wirepick.com/httpsms/send?client='.$client.'&password='.$password.'&phone='.$phone.'&text='.$msg, false);
$response = new SimpleXMLElement($get_data);
// print_r($response);
$sms_status = $response->sms[0]->status;
$sms_msgid = $response->sms[0]->msgid;





$email_data = $getData->sendEmail($email, $fullName, $text);
if(isset($email_data) && $email_data == 'sent')
{
	$email_status = 1;
}else{
	$email_status = 0;
}



if(isset($fullName, $email, $phone, $gender, $address, $dob)){


    $myQuery = "INSERT INTO patientbookingform (
		 full_name, 
		 phone_number,
		 email, 
		 passportID, 
		 home_address, 
		 date_of_birth,
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
		 abnormal_lung_xray,
		 conjuctival_injection,
		 dyspnea_or_tachpnea,
		 abnormal_lung_ausculation,
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
		 other_underlying_conditions,
		 registration_number,
		 sms_msgid,
		 sms_status,
		 email_status) VALUES (
		'$fullName',
		'$phone',
		'$email',
		'$passport',
		'$address', 
		'$dob',
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
		'$abnormal_lung_xray', 
		'$conjuctival_injection', 
		'$dyspnea_or_tachpnea', 
		'$abnormal_lung_ausculation', 
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
		'$other_symptoms',
		'$registration_number',
		'$sms_msgid',
		'$sms_status',
		'$email_status')";
    $result=mysqli_query($database_con->dbh, $myQuery);
    if($result){
		// echo "worked";
		session_destroy();
		echo "<script>location='https://covidtest.thetrusthospital.com/dev/index.php?status=saved'</script>";
die();
    }else{
		echo "<script>location='https://covidtest.thetrusthospital.com/dev/index.php?status=error'</script>";
		echo "Error" .mysqli_error($database_con->dbh);
	}
}else{
	echo "<script>location='https://covidtest.thetrusthospital.com/dev/index.php?status=notset'</script>";
}
}