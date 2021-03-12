<?php
include('../class_libraries/class_lib.php');
$getData = new dbData();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Covid Test Portal - The Trust Hospital</title>
	<link rel="icon" type="image/png" href="../assets/img/icons/trust-logo.png">
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



          <!-- Notification -->
	<!-- jQuery -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- Toastr -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  margin-left: auto;
  margin-right: auto;
  width: 80%;
}

table.first {
    margin-top: 5%;
}

td, th {
  /* border: 1px solid #dddddd; */
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
/* body{
  background: #f2f2f2;
  font-family: 'Open Sans', sans-serif;
} */

.search {
  width: 100%;
  position: relative;
  display: flex;
}

.searchTerm {
  width: 100%;
  border: 3px solid #FF8C20;
  border-right: none;
  padding: 5px;
  height: 36px;
  border-radius: 5px 0 0 5px;
  outline: none;
  color: #9DBFAF;
}

.searchTerm:focus{
  color: black;
}

.searchButton {
  width: 40px;
  height: 36px;
  border: 1px solid #FF8C20;
  background: #FF8C20;
  text-align: center;
  color: #fff;
  border-radius: 0 5px 5px 0;
  cursor: pointer;
  font-size: 20px;
}

/*Resize the wrap to see the search bar change!*/
.wrap{
    display: flex;
    width: 30%;
    position: relative;
    /* top: 10%; */
    margin-top: 3%;
    left: 15%;
    transform: translate(-50%, -50%);
}

@media only screen and (max-width: 767px) {
   body {
    max-width: 100vw;
}
.wrap {
    /* display: flex; */
    width: 60%;
    left: 31%;
}
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    margin-left: auto;
    margin-right: auto;
    width: 100%;
}
.table-responsive {
    display: block;
    max-width: 100%;
  width: 100%;
}
h2 {
    width: 100%;
}
h3 {
    width: 100%;
}
}





/* 
@media (max-width: 575.98px) {
  .table-responsive-sm {
    display: block;
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    -ms-overflow-style: -ms-autohiding-scrollbar; }
    .table-responsive-sm > .table-bordered {
      border: 0; } }

@media (max-width: 767.98px) {
  .table-responsive-md {
    display: block;
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    -ms-overflow-style: -ms-autohiding-scrollbar; }
    .table-responsive-md > .table-bordered {
      border: 0; } }

@media (max-width: 991.98px) {
  .table-responsive-lg {
    display: block;
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    -ms-overflow-style: -ms-autohiding-scrollbar; }
    .table-responsive-lg > .table-bordered {
      border: 0; } }

@media (max-width: 1599.98px) {
  .table-responsive-xl {
    display: block;
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    -ms-overflow-style: -ms-autohiding-scrollbar; }
    .table-responsive-xl > .table-bordered {
      border: 0; } } */

.table-responsive {
  display: block;
  overflow-x: auto;
  border-collapse: collapse;
  margin-left: auto;
  margin-right: auto;
    width: 80%;
  -webkit-overflow-scrolling: touch;
  -ms-overflow-style: -ms-autohiding-scrollbar; }
  .table-responsive > .table-bordered {
    border: 0; }

.table th {
    padding: 1rem;
    vertical-align: top;
    border-top: 2px solid black; 
    border-bottom: 2px solid black; 
    background-color: #dddddd
}

</style>
</head>

<?php

if (isset($_POST['submit']) && $_POST['submit'] == "search")
{
  
    $reg_num = $_POST['reg_num'];
    $get_data = $getData->searchPatient($reg_num);
    $check_data_num = $getData->checkDataNum($reg_num);
  //   print_r($check_data_num);
  // die();
    if($check_data_num == 1)
    {
        $patientResult = $getData->fetchPatientResults($reg_num);
        $result = mysqli_fetch_array($patientResult);
        $patientDetails = mysqli_fetch_array($get_data);
    }elseif($check_data_num < 1)
    {
        echo "     <script type='text/javascript'>   
        $(document).ready(function() {
        toastr.options.positionClass = 'toast-top-right';
        toastr.options.closeButton = true;
        toastr.options.closeDuration = 300;
        toastr.warning('Registration Number Not Found', 'Warning');
    });
    </script>";
    }elseif($check_data_num > 1)
    {
        echo "     <script type='text/javascript'>   
        $(document).ready(function() {
        toastr.options.positionClass = 'toast-top-right';
        toastr.options.closeButton = true;
        toastr.options.closeDuration = 300;
        toastr.error('Currupted Data', 'Error');
    });
    </script>";
    }
}
?>




<body>
  <a href="https://covidtest.thetrusthospital.com/dev/">
<img class="logo" src="../assets/img/icons/Trust-hspital-logo.png">
</a>

<h1 style="margin-bottom: -10px;">The Trust Hospital - Covid Test Portal</h1>
<h2 style="margin-bottom: -10px;">Covid Test Result</h2>
<h3 class="h3-one">Please provide your Registration Number to view your result</h3>






<form class="wrap" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
   <div class="search">
      <input type="text" class="searchTerm" name="reg_num" placeholder="Enter your registration number here">
      <button type="submit" name="submit" value="search" class="searchButton">
        <i class="fa fa-search"></i>
     </button>
   </div>
</form>




<?php if(isset($patientDetails))
          {
            $url = "http://localhost/covid.trusthospital/result/result_pdf.php?reg_num=$reg_num";
?>
<a href="<?php echo $url; ?>" >
<button type="button" class="btn btn-default btn-sm">
  <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> Download as PDF
</button>
</a>
<br>
<br>
<table class="first">
  <tr>
    <th>Lab Number: <?php echo $result['lab_number']; ?></th>
    <td></td>

    <th>Patient Name: <?php echo $patientDetails['full_name']; ?></th>
    <td></td>
  </tr>

  <tr>
    <th>Age: <?php echo $patientDetails['age']; ?></th>
    <td></td>

    <th>Gender: <?php echo $patientDetails['sex']; ?></th>
    <td></td>
  </tr>

  <tr>
    <th>Receipt Type: <?php echo $result['receipt_type']; ?> </th>
    <td></td>

    <th>Organisation: <?php echo $result['organisation']; ?></th>
    <td></td>
  </tr>

  <tr>
    <th>Episode Number: <?php echo $result['episode_number']; ?></th>
    <td></td>

    <th>Patient Tel: <?php echo $patientDetails['phone_number']; ?></th>
    <td></td>
  </tr>

  <tr>
    <th>Manual Path Number: <?php echo $result['manual_path_number']; ?></th>
    <td></td>
  </tr>
</table>

<hr style="width:80%;text-align:middle;">


<table>
  <tr>
    <th>Requested By: <?php echo $result['requested_by']; ?></th>
    <td></td>

    <th>Sample Collection Date: <?php echo $result['sample_collection_date']; ?></th>
    <td></td>
  </tr>

  <tr>
    <th>Requested From: <?php echo $result['requested_from']; ?></th>
    <td></td>

    <th>Receive Date: <?php echo $result['received_date']; ?></th>
    <td></td>
  </tr>

  <tr>
    <th>Diagnosis: <?php echo $result['diagnosis']; ?></th>
    <td></td>

    <th>Report Date: <?php echo $result['report_date']; ?></th>
    <td></td>
  </tr>
</table>


<hr style="width:80%;text-align:middle;">


<table>
  <tr>
    <th>REQUESTED: <?php echo $result['requested']; ?></th>
    <td></td>
  </tr>
</table>

<table>
  <tr>
    <th>CoVID PCR TEST (B2B DR. AKWETEY) -> </th>
    <td>[LABORATORY]</td>
  </tr>
</table>


<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">PARAMETER</th>
                <th scope="col">FLAG</th>
                <th scope="col">RESULTS</th>
                <th scope="col">UNITS</th>
                <th scope="col">NORMAL RANGE</th>
            
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $result['parameter']; ?></td>
                <td><?php echo $result['flag']; ?></td>
                <td><?php echo $result['results']; ?></td>
                <td><?php echo $result['unit']; ?></td>
                <td><?php echo $result['normal_range']; ?></td>
            </tr>
        </tbody>
    </table>
</div>

<?php
}else{
?>
<br>
<br>
<table class="first">
  <tr>
    <th>Lab Number:</th>
    <td></td>

    <th>Patient Name:</th>
    <td></td>
  </tr>

  <tr>
    <th>Age: </th>
    <td></td>

    <th>Gender: </th>
    <td></td>
  </tr>

  <tr>
    <th>Reciept Type: </th>
    <td></td>

    <th>Organization: </th>
    <td></td>
  </tr>

  <tr>
    <th>Episode Number: </th>
    <td></td>

    <th>Patient Tel: </th>
    <td></td>
  </tr>

  <tr>
    <th>Manual Path Number: </th>
    <td></td>
  </tr>
</table>

<hr style="width:80%;text-align:middle;">


<table>
  <tr>
    <th>Requested By: </th>
    <td></td>

    <th>Sample Collection Date: </th>
    <td></td>
  </tr>

  <tr>
    <th>Requested From: </th>
    <td></td>

    <th>Receive Date: </th>
    <td></td>
  </tr>

  <tr>
    <th>Diagnosis: </th>
    <td></td>

    <th>Report Date: </th>
    <td></td>
  </tr>
</table>


<hr style="width:80%;text-align:middle;">


<table>
  <tr>
    <th>REQUESTED: </th>
    <td></td>
  </tr>
</table>

<table>
  <tr>
    <th>CoVID PCR TEST (B2B DR. AKWETEY) -> </th>
    <td>[LABORATORY]</td>
  </tr>
</table>


<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">PARAMETER</th>
                <th scope="col">FLAG</th>
                <th scope="col">RESULTS</th>
                <th scope="col">UNITS</th>
                <th scope="col">NORMAL RANGE</th>
            
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Specimen Type <BR> SARS-COV-2, RT-PCR</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>

<?php
}
?>
</body>
</html>




