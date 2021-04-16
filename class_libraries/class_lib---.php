<?php
session_start();
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'covidtest.trusthospital');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class DB_con
{
  // public static $con;
 function __construct()
 {
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
$this->dbh=$con;
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
 }
 public function countdata()
 {
 $myQuery = "SELECT * FROM products";
 $result=mysqli_query($this->dbh, $myQuery);
 $num = mysqli_num_rows($result);
 return $num;
 }
}


class dbData extends DB_con{
  public $id;

//   public function __construct($cat_id){
//   $this -> id = $cat_id;
// }


public function getPatientInfoForQRCode($reg_num)
{
   $myQuery = "SELECT * FROM patientbookingform WHERE registration_number = '$reg_num'";
   $result=mysqli_query($this->dbh, $myQuery);

}


  public function adminLogin($admin_email, $admin_pass){
     $encrypted_pass = md5($admin_pass);
    $myQuery = "SELECT * FROM user WHERE admin_email = '$admin_email' AND admin_pass = '$encrypted_pass'";
    $result=mysqli_query($this->dbh, $myQuery);
   //  return $result;
    $num = mysqli_num_rows($result);
    if($num == 1)
    {
      return $result;
    }elseif($num < 1)
    {
       return 'not found';
    }else
    {
      return 'error';
    }
    
  }



public function checkDataNum($reg_num){
   $myQuery = "SELECT * FROM patientbookingform WHERE registration_number = '$reg_num'";
   $result=mysqli_query($this->dbh, $myQuery);
   $num = mysqli_num_rows($result);
    return $num;
 }

  public function checkLogin($admin_email, $admin_pass){
   $encrypted_pass = md5($admin_pass);
  $myQuery = "SELECT * FROM user WHERE admin_email = '$admin_email' AND admin_pass = '$encrypted_pass'";
  $result=mysqli_query($this->dbh, $myQuery);
  $num = mysqli_num_rows($result);
   return $num;
  
}

  function callSmsAPI($method, $url, $data){
    $curl = curl_init();
    switch ($method){
       case "POST":
          curl_setopt($curl, CURLOPT_POST, 1);
          if ($data)
             curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
          break;
       case "PUT":
          curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
          if ($data)
             curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
          break;
       default:
          if ($data)
             $url = sprintf("%s?%s", $url, http_build_query($data));
    }
    // OPTIONS:
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
       'APIKEY: 111111111111111111111',
       'Content-Type: application/json',
    ));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    // EXECUTE:
    $result = curl_exec($curl);
    if(!$result){die("Connection Failure");}
    curl_close($curl);
    return $result;
 }


 function sendEmail($email, $name, $msg){
  
  
  //PHPMailer Object
  $mail = new PHPMailer(true); //Argument true in constructor enables exceptions
  
  
  
  $mail->isSMTP();
  $mail->Host = 'covidtest.thetrusthospital.com';
  $mail->SMTPAuth = true;
  $mail->Username = 'testcovid@covidtest.thetrusthospital.com'; //paste one generated by Mailtrap
  $mail->Password = 'testcovid12345'; //paste one generated by Mailtrap
  $mail->SMTPSecure = 'ssl';
  $mail->Port = 465;
  
  
  //From email address and name
  $mail->From = "testcovid@covidtest.thetrusthospital.com";
  $mail->FromName = "Covid Test Portal - The Trust Hospital";
  
  //To address and name
  $mail->addAddress($email, $name);
  // $mail->addAddress("menniablaise@hotmail.com");
  
  //Address to which recipient will reply
  // $mail->addReplyTo("menniablaise@yahoo.com", "Reply");
  
  //CC and BCC
  // $mail->addCC("cc@example.com");
  // $mail->addBCC("bcc@example.com");
  
  //Send HTML or Plain Text email
  $mail->isHTML(true);
  
  $mail->Subject = "The Trus Hospital || Covid Test Booking";
  $mail->Body = $msg;
  // $mail->AltBody = "This is the plain text version of the email content";
      if($mail->send())
      {
         return 'Loading...';
      }else{
         echo "Mailer Error: " . $mail->ErrorInfo;
      }
 }


 public function insertBookingData($data,$reg_id, $sms_msgid, $sms_data, $email_status, $payment = false){
   //  print_r($$data['name']);
   //  die();
    if(isset($data['submit']) && $data['submit'] == "Submit"){

      $sms_status = (isset($payment) && $payment === true) ? 'pending' : 'pay later';

      $payment_status = (isset($payment) && $payment === true) ? 'paid' : 'pay later';

		$fullName = $data['name'];
		$email = $data['email'];
		$phone = $data['phone'];
		$gender = $data['gender'];
		$passport = $data['passport'];
		$district = $data['district'];
		$address = $data['address'];
		$landmark = $data['landmark'];
		$dob = $data['DOB'];
		$age = $data['age'];
		$receipt_number = $data['receipt_number'];
		$hospital_number = $data['hospital_number'];
		$package_selected = $data["packages"];


      $fever_or_chills = (!empty($data["fever_or_chills"])) ?  $data["fever_or_chills"] : 0;
      $generalWeakness = (!empty($data["generalWeakness"])) ?  $data["generalWeakness"] : 0;
      $cough = (!empty($data["cough"])) ?  $data["cough"] : 0;
      $soreThroat = (!empty($data["soreThroat"])) ?  $data["soreThroat"] : 0;
      $runnyNose = (!empty($data["runnyNose"])) ?  $data["runnyNose"] : 0;
      $loss_of_smell = (!empty($data["loss_of_smell"])) ?  $data["loss_of_smell"] : 0;
      $shortness_of_breath = (!empty($data["shortness_of_breath"])) ?  $data["shortness_of_breath"] : 0;
      $diarrhoea = (!empty($data["diarrhoea"])) ?  $data["diarrhoea"] : 0;
      $nausea_or_vomiting = (!empty($data["nausea_or_vomiting"])) ?  $data["nausea_or_vomiting"] : 0;
      $irritability_or_confusion = (!empty($data["irritability_or_confusion"])) ?  $data["irritability_or_confusion"] : 0;
      $loss_of_taste = (!empty($data["loss_of_taste"])) ?  $data["loss_of_taste"] : 0;
      $headache = (!empty($data["headache"])) ?  $data["headache"] : 0;


      $muscular_pain = (!empty($data["muscular_pain"])) ?  $data["muscular_pain"] : 0;
      $abdominal_pain = (!empty($data["abdominal_pain"])) ?  $data["abdominal_pain"] : 0;
      $chest_pain = (!empty($data["chest_pain"])) ?  $data["chest_pain"] : 0;
      $joint_pain = (!empty($data["joint_pain"])) ?  $data["joint_pain"] : 0;


	// Patient Vital Signs
      $seizure = (!empty($data["seizure"])) ?  $data["seizure"] : 0;
      $pharnygeal_exudate = (!empty($data["pharnygeal_exudate"])) ?  $data["pharnygeal_exudate"] : 0;
      $abnormal_lung_xray = (!empty($data["abnormal_lung_xray"])) ?  $data["abnormal_lung_xray"] : 0;
      $conjuctival_injection = (!empty($data["conjuctival_injection"])) ?  $data["conjuctival_injection"] : 0;
      $dyspnea_or_tachpnea = (!empty($data["dyspnea_or_tachpnea"])) ?  $data["dyspnea_or_tachpnea"] : 0;
      $abnormal_lung_ausculation = (!empty($data["abnormal_lung_ausculation"])) ?  $data["abnormal_lung_ausculation"] : 0;


    // Patient Clinical Course
	   $date_of_onset_symptoms = $data["date_of_onset_symptoms"];
      $date_first_at_hospital = $data["date_first_at_hospital"];
      $asymptomatic = (!empty($data["asymptomatic"])) ?  $data["asymptomatic"] : 0;
      $name_of_hospital = $data["name_of_hospital"];
      $hospital_visit_number = $data["hospital_visit_number"];
      $ventilated = $data["ventilated"];
      $date_of_death = $data["date_of_death"];
      $date_of_admission = $data["date_of_admission"];
      $date_of_isolation = $data["date_of_isolation"];
      $admitted_to_hospital = $data["admitted_to_hospital"];
      $other_symptoms = $data["other_symptoms"];
      //  die();

      $result_status = 0;
      
      if(isset($sms_status)){

         $myQuery = "INSERT INTO patientbookingform (
            full_name, 
            phone_number,
            email, 
            passportID,
            district,
            home_address, 
            landmark,
            date_of_birth,
            age,
            receipt_number, 
            hospital_number, 
            sex, 
            packages,
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
            email_status,
            payment_status,
            result_status) VALUES (
           '$fullName',
           '$phone',
           '$email',
           '$passport',
           '$district',
           '$address',
           '$landmark',
           '$dob',
           '$age',
           '$receipt_number', 
           '$hospital_number', 
           '$gender', 
           '$package_selected',
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
           '$ventilated', 
           '$date_of_death', 
           '$other_symptoms',
           '$reg_id',
           '$sms_msgid',
           '$sms_status',
           '$email_status',
           '$payment_status',
           '$result_status')";
         $result=mysqli_query($this->dbh, $myQuery);
         if(!$result){
            return "Error: " .mysqli_error($this->dbh);
         }else{
            return "good";
         }
      }
    }else{
       return "no";
    }

  
}

public function insertPaymentDetails($data, $registration_number, $callback = false){
   //  print_r($data->aapf_txn_amt);
   //  die();
    if(is_array($data) ||is_object($data)){

      $aapf_txn_amt = $data->aapf_txn_amt;
      $aapf_txn_clientRspRedirectURL = $data->aapf_txn_clientRspRedirectURL;
      $aapf_txn_clientTxnWH = $data->aapf_txn_clientTxnWH;
      $aapf_txn_cref = $data->aapf_txn_cref;
      $aapf_txn_currency = $data->aapf_txn_currency;
      $aapf_txn_datetime = $data->aapf_txn_datetime;
      $aapf_txn_gw_ref = $data->aapf_txn_gw_ref;
      $aapf_txn_gw_sc = $data->aapf_txn_gw_sc ;
      $aapf_txn_maskedInstr = $data->aapf_txn_maskedInstr;
      $aapf_txn_otherInfo = $data->aapf_txn_otherInfo;
      $aapf_txn_payLink = $data->aapf_txn_payLink;
      $aapf_txn_payScheme = $data->aapf_txn_payScheme;
      $aapf_txn_ref = $data->aapf_txn_ref ;
      $aapf_txn_sc = $data->aapf_txn_sc;
      $aapf_txn_sc_msg = $data->aapf_txn_sc_msg;
      $aapf_txn_signature = $data->aapf_txn_signature;


      if(isset($aapf_txn_signature)){
         if($callback === false){
            $callback_status = 0;
            $paymentQuery = "INSERT INTO online_payment (
               registration_number,
               aapf_txn_amt,
               aapf_txn_clientRspRedirectURL, 
               aapf_txn_clientTxnWH,
               aapf_txn_cref,
               aapf_txn_currency, 
               aapf_txn_datetime, 
               aapf_txn_gw_ref, 
               aapf_txn_gw_sc, 
               aapf_txn_maskedInstr, 
               aapf_txn_otherInfo, 
               aapf_txn_payLink, 
               aapf_txn_payScheme, 
               aapf_txn_ref, 
               aapf_txn_sc, 
               aapf_txn_sc_msg, 
               aapf_txn_signature,
               callback) VALUES (
              '$registration_number',
              '$aapf_txn_amt',
              '$aapf_txn_clientRspRedirectURL',
              '$aapf_txn_clientTxnWH',
              '$aapf_txn_cref',
              '$aapf_txn_currency',
              '$aapf_txn_datetime',
              '$aapf_txn_gw_ref',
              '$aapf_txn_gw_sc',
              '$aapf_txn_maskedInstr',
              '$aapf_txn_otherInfo',
              '$aapf_txn_payLink',
              '$aapf_txn_payScheme',
              '$aapf_txn_ref',
              '$aapf_txn_sc',
              '$aapf_txn_sc_msg',
              '$aapf_txn_signature',
              '$callback_status')";
          $payment=mysqli_query($this->dbh, $paymentQuery);
         }else{
            $callback_status = 1;
            $paymentQuery = "INSERT INTO online_payment (
               registration_number,
               aapf_txn_amt,
               aapf_txn_clientRspRedirectURL, 
               aapf_txn_clientTxnWH,
               aapf_txn_cref,
               aapf_txn_currency, 
               aapf_txn_datetime, 
               aapf_txn_gw_ref, 
               aapf_txn_gw_sc, 
               aapf_txn_maskedInstr, 
               aapf_txn_otherInfo, 
               aapf_txn_payLink, 
               aapf_txn_payScheme, 
               aapf_txn_ref, 
               aapf_txn_sc, 
               aapf_txn_sc_msg, 
               aapf_txn_signature,
               callback) VALUES (
              '$registration_number',
              '$aapf_txn_amt',
              '$aapf_txn_clientRspRedirectURL',
              '$aapf_txn_clientTxnWH',
              '$aapf_txn_cref',
              '$aapf_txn_currency',
              '$aapf_txn_datetime',
              '$aapf_txn_gw_ref',
              '$aapf_txn_gw_sc',
              '$aapf_txn_maskedInstr',
              '$aapf_txn_otherInfo',
              '$aapf_txn_payLink',
              '$aapf_txn_payScheme',
              '$aapf_txn_ref',
              '$aapf_txn_sc',
              '$aapf_txn_sc_msg',
              '$aapf_txn_signature',
              '$callback_status')";
          $payment=mysqli_query($this->dbh, $paymentQuery);
         }

   if(!$payment){  
       echo "Error: " .mysqli_error($database_con->dbh);
       die();
   }else{
      return 'good';
   die();
   }
      }
   }

  
}


function addCountryCode($raw_phone){
   $check_phone_code = substr($raw_phone,0,3);
 $check_first_num = substr($raw_phone,0,1);
 $country_code = 233;
 if($check_phone_code == $country_code)
 {
     $phone = $raw_phone;
     return $phone;
 }elseif($check_first_num == 0){
     $new_number = substr($raw_phone, 1);
     $phone = $country_code.$new_number;
     return $phone;
 }elseif($check_first_num == '+'){
     $phone = substr($raw_phone, 1);
     return $phone;
 }else{
    $phone = $raw_phone;
   return $phone;
 }
 }


 function verifyPayment($payRef){

   $ref = 'payReference: ';
   $ref .= $payRef;
   $url = 'https://payfluid-api.herokuapp.com/payfluid/ext/api/status?msg';
   $context = stream_context_create(array(
       'http' => array(
       'method' => 'GET',
       'header' => $ref,
       )
       ));
   $result = file_get_contents($url, false, $context);
   $data = json_decode($result);
    // print_r($see);
   return $data;

 }


 function paymentStatus($registration_number, $payRef){
   // sleep(500);
   $result = $this->verifyPayment($payRef);
   $payment_status = (isset($result->aapf_txn_sc)) ? $result->aapf_txn_sc : 'pending';
   // return 'yoooo';
   // die();


   if(!isset($result->status_msg)){
      for($i=0; $i < 5; $i++)
   {
   if($payment_status == 0){
      $i = 6;
   }else{
   sleep(500);
   $result = $this->verifyPayment($payRef);
   $payment_status = (isset($result->aapf_txn_sc)) ? $result->aapf_txn_sc : 'pending';
   }
   }

 }else{
   return 'invalid pay ref';
   die();
 }


 
 $callback_status = $this->fetchCallbackStatus($registration_number);
 
 if ($payment_status == 0 && $callback_status == 0){
   $dbUpdate = $this->updateDBPayment($registration_number, $result);
   if($dbUpdate == 'good'){
      return 'verified';

      $patientDetails = $this->fetchPatientDetails($registration_number);
      $fullName = $patientDetails['full_name'];
      $raw_phone = $patientDetails['phone_number'];
      $email = $patientDetails['email'];
      $amount_paid = $patientDetails['packages'];

      // Send Confirmation sms and email
      $client = 'TTH101010';
      $password = 'Keep@123$';
      $phone = $this->addCountryCode($raw_phone);
      $text = 'Hi '.$fullName.', Your Covid Test payment of GHS'.$amount_paid.' has been confirmed. Your registration number is '.$registration_number.'. Thank you, Stay safe.';
      $msg = urlencode($text);
      $get_data = $this->callSmsAPI('GET', 'https://api.wirepick.com/httpsms/send?client='.$client.'&password='.$password.'&phone='.$phone.'&text='.$msg, false);
      $response = new SimpleXMLElement($get_data);
      $sms_status = $response->sms[0]->status;
      $sms_msgid = $response->sms[0]->msgid;

      $email_data = $this->sendEmail($email, $fullName, $text);


      
   }else{
      return 'failed';
   }
 }else{
   $dbUpdate = $this->updateDBPayment($registration_number, $result, false);
   if($dbUpdate == 'good'){
   return 'payment failed';
   }else{
   return 'errror';
   }
   die();
 }

}

 function updateDBPayment($registration_number, $data, $paymentSuccess = true, $callback = false){
    if($paymentSuccess)
    {

   if(is_array($data) ||is_object($data)){
      $aapf_txn_gw_sc = $data->aapf_txn_gw_sc;
      $aapf_txn_sc_msg = $data->aapf_txn_gw_sc;
      $aapf_txn_sc = $data->aapf_txn_sc;

      if($aapf_txn_sc == 0 && $callback == true)
      {
         $callback_status = 1;
         $paymentQuery = "UPDATE online_payment SET 
         aapf_txn_gw_sc = '$aapf_txn_gw_sc', 
         aapf_txn_sc_msg= '$aapf_txn_sc_msg',
         aapf_txn_sc = '$aapf_txn_sc',
         callback = '$callback_status'
         WHERE 
         registration_number = '$registration_number'";

$payment = mysqli_query($this->dbh, $paymentQuery);
if(!$payment){  
   echo "Error: " .mysqli_error($database_con->dbh);
   die();
}else{
  $online_payment = true;
}


   }elseif($aapf_txn_sc == 0 && $callback == false)
   {
      
      $callback_status = 0;
      $paymentQuery = "UPDATE online_payment SET 
      aapf_txn_gw_sc = '$aapf_txn_gw_sc', 
      aapf_txn_sc_msg= '$aapf_txn_sc_msg',
      aapf_txn_sc = '$aapf_txn_sc',
      callback = '$callback_status'
      WHERE 
      registration_number = '$registration_number'";

$payment = mysqli_query($this->dbh, $paymentQuery);
if(!$payment){  
echo "Error: " .mysqli_error($database_con->dbh);
die();
}else{
$online_payment = true;
}

   }

if(isset($online_payment) && $online_payment == true){
   $bookingFormQuery = "UPDATE patientbookingform SET 
   payment_status = 'paid'
   WHERE 
   registration_number = '$registration_number'";

$bookingQueryStatus = mysqli_query($this->dbh, $bookingFormQuery);
if(!$bookingQueryStatus){  
   echo "Error: " .mysqli_error($database_con->dbh);
   die();
}else{
  return "good";
}
}

}

    }else{
         $bookingFormQuery = "UPDATE patientbookingform SET 
         payment_status = 'unpaid'
         WHERE 
         registration_number = '$registration_number'";
      
      $bookingQueryStatus = mysqli_query($this->dbh, $bookingFormQuery);
      if(!$bookingQueryStatus){  
         echo "Error: " .mysqli_error($database_con->dbh);
         die();
      }else{
        return "unpaid";
      }
    }
 }



 public function fetchPatientDetails($registration_number)
 {
 $myQuery = "SELECT full_name, phone_number, email, packages, payment_status FROM patientbookingform WHERE registration_number = '$registration_number'";
 $result=mysqli_query($this->dbh, $myQuery);
 $row = mysqli_fetch_assoc($result);
 return $row;
 }




 public function insertResults($data, $registration_number){
   //  print_r($data->aapf_txn_amt);
   //  die();
    if(is_array($data) ||is_object($data)){



		$registration_number = $data['reg_num'];
		$lab_number = (empty($data['lab_number'])) ?  "N/A" : $data['lab_number'];
		$receipt_type = (empty($data['receipt_type'])) ?  "N/A" : $data['receipt_type'];
		$episode_number = (empty($data['episode_number'])) ?  "N/A" : $data['episode_number'];
		$manual_path_number = (empty($data['manual_path_number'])) ?  "N/A" : $data['manual_path_number'];
		$organisation = (empty($data['organisation'])) ?  "N/A" : $data['organisation'];
		$requested_by = (empty($data['requested_by'])) ?  "N/A" : $data['requested_by'];
		$requested_from = (empty($data['requested_from'])) ?  "N/A" : $data['requested_from'];
		$diagnosis = (empty($data['diagnosis'])) ?  "N/A" : $data['diagnosis'];
		$sample_collection_date = (empty($data['sample_collection_date'])) ?  "N/A" : $data['sample_collection_date'];
		$received_date = (empty($data['received_date'])) ?  "N/A" : $data['received_date'];
		$report_date = (empty($data['report_date'])) ?  "N/A" : $data['report_date'];
		$requested = (empty($data['requested'])) ?  "N/A" : $data['requested'];
		$name_of_doctor = (empty($data['name_of_doctor'])) ?  "N/A" : $data['name_of_doctor'];
		$parameter = (empty($data['parameter'])) ?  "N/A" : $data['parameter'];
		$flag = (empty($data['flag'])) ?  "N/A" : $data['flag'];
		$results = (empty($data['results'])) ?  "N/A" : $data['results'];
		$unit = (empty($data['unit'])) ?  "N/A" : $data['unit'];
		$normal_range = (empty($data['normal_range'])) ?  "N/A" : $data['normal_range'];
      $result_status = 1;

      $checkDuplicate = $this->checkResultNum($registration_number);


      if($checkDuplicate > 1)
      {

      if(isset($registration_number)){
         $resultQuery = "INSERT INTO test_result (
            registration_number,
            lab_number,
            receipt_type, 
            episode_number,
            manual_path_number,
            organisation, 
            requested_by, 
            requested_from, 
            diagnosis, 
            sample_collection_date, 
            received_date, 
            report_date, 
            requested, 
            name_of_doctor, 
            parameter, 
            results, 
            unit,
            normal_range) VALUES (
           '$registration_number',
           '$lab_number',
           '$receipt_type',
           '$episode_number',
           '$manual_path_number',
           '$organisation',
           '$requested_by',
           '$requested_from',
           '$diagnosis',
           '$sample_collection_date',
           '$received_date',
           '$report_date',
           '$requested',
           '$name_of_doctor',
           '$parameter',
           '$results',
           '$unit',
           '$normal_range')";
       $resultStatus=mysqli_query($this->dbh, $resultQuery);

       $resultquery = "UPDATE patientbookingform SET 
       result_status = '$result_status'
       WHERE 
       registration_number = '$registration_number'";
   if(!$resultStatus && !$resultquery){  
       echo "Error: " .mysqli_error($this->dbh);
       die();
   }else{
      return 'good';
   die();
   }
      }
   }else{
      return 'duplicate';
   }
   }

  
}


// public function updatePatientResultStatus($registration_number){
//    $updateQuery = "UPDATE patientbookingform SET 
//    result_status = 'paid'
//    WHERE 
//    registration_number = '$registration_number'";
// }


public function searchPatient($reg_num){
   $myQuery = "SELECT * FROM patientbookingform WHERE registration_number = '$reg_num'";
   $result=mysqli_query($this->dbh, $myQuery);
 //   return $reg_num;
 //   die();
   $num = mysqli_num_rows($result);
   if($num == 1)
   {
     return $result;
   }elseif($num < 1){
      return 'not found';
   }else{
    return 'error';
   }
   
 }

public function fetchPatientResults($registration_number)
{
$myQuery = "SELECT * FROM test_result WHERE registration_number = '$registration_number'";
$result=mysqli_query($this->dbh, $myQuery);
return $result;
}

public function fetchCallbackStatus($registration_number)
{
$myQuery = "SELECT callback FROM online_payment WHERE registration_number = '$registration_number'";
$result=mysqli_query($this->dbh, $myQuery);
// return $result;

$num = mysqli_num_rows($result);
if($num == 1)
{
   $row = mysqli_fetch_assoc($result);
  return $row;
}elseif($num < 1){
   echo 'not found';
}else{
 echo 'error';
}
}

public function checkResultNum($reg_num){
   $myQuery = "SELECT * FROM test_result WHERE registration_number = '$reg_num'";
   $result=mysqli_query($this->dbh, $myQuery);
   $num = mysqli_num_rows($result);
    return $num;
 }


}