<?php
include('class_libraries/class_lib.php');
$database_con = new DB_con();
$getData = new dbData();

$name = 'TTH101010';
$email = 'menniablaise@yahoo.com';
$phone = 571659610;
$country_code = 233;
$check_code = substr($phone,0,3);
$check_first_char = substr($phone,0,1);
$country_code = 233;
if($check_code == $country_code)
{
    // $phone = $country_code.$phone;
    echo $phone;
}elseif($check_first_char == 0){
    echo "wrong";
    $phone = $country_code.$phone;
    echo $phone;
    echo $country_code;
}
// $get_data = $getData->sendEmail($email, $name);
// $response = json_decode($get_data, true);
// $response = simplexml_load_string($get_data);
// $response = new SimpleXMLElement($get_data);
// $errors = $response['response']['errors'];
// $data = $response['response']['data'][0];
// $xml=simplexml_load_string($myXMLData) or die("Error: Cannot create object");
// print_r($xml);

// print_r($get_data);
// echo $response->sms[0]->status;
// echo $response->sms[0]->msgid;

    // if(isset($_GET['download']))
    // {
    // $_SESSION['name'] = $fullName;                                 
		// $_SESSION['phone'] = $phone;                                                  
		// $_SESSION['email'] = $email;
		// $_SESSION['passport'] = $passport;
		// $_SESSION['address']  = $address;
		// $_SESSION['DOB']  = $date_of_birth;
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
		// $_SESSION[' abnormal_lung_xray']  =	$abnormal_lung_xray;
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
		// $_SESSION['ventialted']  =	$ventialted;
		// $_SESSION['date_of_death']  =	$date_of_death;
    // $_SESSION['other_symptoms'] =	$other_symptoms;

    // if(isset($_SESSION['fever_or_chills'])){
		// echo "<script>location='http://localhost/covid.trusthospital/generate_pdf.php?download=set'</script>";
    // }

// }
