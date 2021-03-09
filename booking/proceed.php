<?php
	include('../class_libraries/class_lib.php');
	$getData = new dbData();
	// For php mailer
	require_once '../vendor/autoload.php';


if(isset($_GET['status']) && $_GET['status'] == "save")
{

	
	if(isset($_SESSION['registration_number'], $_SESSION['post']['name'], $_SESSION['post']['email'], $_SESSION['post']['phone'], $_SESSION['post']['gender'], $_SESSION['post']['address']))
	{
		$registration_number = $_SESSION['registration_number'];
		$fullName = $_SESSION['post']['name'];
		$email = $_SESSION['post']['email'];
		$raw_phone = $_SESSION['post']['phone'];

	}else{
		session_destroy();
		echo "<script>location='https://covidtest.thetrusthospital.com/dev/index.php?status=session_errrror'</script>";
		die();
	}



	// SMS
$client = 'TTH101010';
$password = 'Keep@123$';
$phone = $getData->addCountryCode($raw_phone);
$text = 'Hi '.$fullName.', Your Covid Test registration number is '.$registration_number.'
The Trust Hospital';
$msg = urlencode($text);
$get_data = $getData->callSmsAPI('GET', 'https://api.wirepick.com/httpsms/send?client='.$client.'&password='.$password.'&phone='.$phone.'&text='.$msg, false);
$response = new SimpleXMLElement($get_data);
$sms_status = $response->sms[0]->status;
$sms_msgid = $response->sms[0]->msgid;





// Send Email 
$email_data = $getData->sendEmail($email, $fullName, $text);
if(isset($email_data) && $email_data == 'Loading...')
{
	$email_status = 1;
}else{
	$email_status = 0;
}
// print($email_data);
// die();


if(isset($fullName, $email, $raw_phone)){


    $result = $getData->insertBookingData($_SESSION['post'], $registration_number, $sms_msgid, $sms_status, $email_status);

    if($result == "good"){

		session_destroy();
		echo "<script>location='https://covidtest.thetrusthospital.com/dev/index.php?status=saved'</script>";
		die();

	}else{
		session_destroy();
		echo "<script>location='https://covidtest.thetrusthospital.com/dev/index.php?status=notsaved'</script>";
		die();
		}


}else{
		// echo "<script>location='https://covidtest.thetrusthospital.com/dev/index.php?status=error'</script>";
		echo "<script>location='http://localhost/covid.trusthospital/index.php?status=error'</script>";
	}
}else{
	session_destroy();
	// echo "<script>location='https://covidtest.thetrusthospital.com/dev/index.php?status=notset'</script>";
	echo "<script>location='https://covidtest.thetrusthospital.com/dev/booking/index.php?status=notset'</script>";
}