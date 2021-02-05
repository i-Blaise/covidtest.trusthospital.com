<?php
include('../class_libraries/class_lib');
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
    $fever_or_chills = $_POST["fever_or_chills"];
    $generalWeakness = $_POST["generalWeakness"];
    $cough = $_POST["cough"];
    $soreThroat = $_POST["soreThroat"];
    $runnyNose = $_POST["runnyNose"];
    $loss_of_smell = $_POST["loss_of_smell"];
    $shortness_of_breath = $_POST["shortness_of_breath"];
    $diarrhoea = $_POST["diarrhoea"];
    $nausea_or_vomiting = $_POST["nausea_or_vomiting"];
    $irritability_or_confusion = $_POST["irritability_or_confusion"];
    $loss_of_taste = $_POST["loss_of_taste"];
    $muscular_pain = $_POST["muscular_pain"];
    $abdominal_pain = $_POST["abdominal_pain"];
    $chest_pain = $_POST["chest_pain"];
    $joint_pain = $_POST["joint_pain"];
    $headache = $_POST["headache"];


    // Patient Vital Signs
    $seizure = $_POST["seizure"];
    $pharnygeal_exudate = $_POST["pharnygeal_exudate"];
    $abdnormal_lung_xray = $_POST["abdnormal_lung_xray"];
    $conjuctival_injection = $_POST["conjuctival_injection"];
    $dyspnea_or_tachpnea = $_POST["dyspnea_or_tachpnea"];
    $abdnormal_lung_ausculation = $_POST["abdnormal_lung_ausculation"];



    // Patient Clinical Course
    $date_of_onset_symptoms = $_POST["date_of_onset_symptoms"];
    $asymptomatic = $_POST["asymptomatic"];
    $name_of_hospital = $_POST["name_of_hospital"];
    $hospital_visit_number = $_POST["hospital_visit_number"];
    $ventialted = $_POST["ventialted"];
    $date_of_death = $_POST["date_of_death"];
    $date_of_admission = $_POST["date_of_admission"];
    $date_of_isolation = $_POST["date_of_isolation"];
    $admitted_to_hospital = $_POST["admitted_to_hospital"];
    $other_symptoms = $_POST["other_symptoms"];
    
    


if(isset($fullName, $email, $phone, $gender, $passport, $address, $receipt, $hospital)){


    $myQuery = "INSERT INTO patientbookingform (full_name, phone_number, email, passportID, home_address, receipt_number, hospital_number, sex, chills_or_fever, general_weakness, cough, sore_throat, runny_nose, shortness_of_breath, diarrhoea, nausea_or_vomiting, headache, irritability_or_confusion, loss_of_smell, loss_of_taste, muscular_pain, chest_pain, abdominal_pain, joint_pain, date_of_onset_of_symptoms, asymptomatic, admitted_to_hospital, date_of_admission, name_of_hospital, hospital_visit_number, date_of_isolation, was_person_ventilated, date_of_death, other_underlying_conditions) VALUES ('$fullName', '$phone', '$email', '$passport', '$address', '$receipt_number', '$hospital_number', '$gender', '$fever_or_chills', '$generalWeakness', '$cough', '$soreThroat', '$runnyNose', '$shortness_of_breath', '$diarrhoea', '$nausea_or_vomiting', '$headache', '$irritability_or_confusion', '$loss_of_smell', '$loss_of_taste', '$muscular_pain', '$chest_pain', '$abdominal_pain', '$joint_pain', '$date_of_onset_symptoms', '$asymptomatic', '$admitted_to_hospital', '$date_of_admission', '$name_of_hospital', '$hospital_visit_number', '$date_of_isolation', '$date_of_death', '$other_symptoms')";
    $result=mysqli_query($database_con->dbh, $myQuery);
    if($result){
    }
}
}
?>