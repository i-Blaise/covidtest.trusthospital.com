<?php
include_once "payfluid_api_sdk.php";

$token = isset($_REQUEST['token']) ? $_REQUEST['token'] : null;
$cancel = isset($_REQUEST['cancel']) ? $_REQUEST['cancel'] : null;
$redirect_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/redirect.php";

error_log(var_export($_REQUEST, true));

if (isset($cancel) && "true" == $cancel) {
    echo "<html><body>";
    echo "<script>window.close();</script>";
    echo "</body></html>";
    exit();
} else if (isset($token)) {
    $result = \payfluid\MerchantAPI::query($token);

    if ($result->result == 1) {

        echo "Payment Processed successfully: " . json_encode($result);
        exit();
    } else {
        // \todo handle error
        echo "Unable to complete Payment: " . json_encode($result);
        exit();
    }
} else if (isset($_POST['request'])) {
    $request = $_POST['request'];
    if ($request == "createPayLink") {
        $name = $_POST['name'] ;
        $currency = $_POST['currency'];
        $otherInfo = $_POST['otherInfo'] ;
        $amount = $_POST['amount'];
        $phone = $_POST['phone'] ;
        $descr = $_POST['descr'] ;
        $callbackUrl = $_POST['callbackUrl'] ;
        $redirectUrl = $_POST['redirectUrl'] ;
        $lang = $_POST['language'] ;
        $email = $_POST['email'];

        //credential params
		
		   $date = new \DateTime();
        $dateTime = $date->format('Y-m-d\TH:i:s.v\Z');
        $reference = substr(md5($dateTime . 'DUMMY'), 23, 32);
        
        $result = \payfluid\MerchantAPI::createPayLink($currency, $amount, $reference, $descr, $redirectUrl, $callbackUrl, $name, $otherInfo, $lang, $phone, $email);
        
        echo $result;
        
        exit();
    }
}

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Payfluid Demo</title>
  <link rel="stylesheet" href="style.css">
  <link
  rel="stylesheet" type="text/css"
  href="//cdn.jsdelivr.net/gh/loadingio/ldbutton@v1.0.1/dist/ldbtn.min.css"
/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script
      src="https://code.jquery.com/jquery-1.12.4.min.js"
      integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
      crossorigin="anonymous"></script>
</head>

<body class="ld-over">
<form class="signup-form ">

    <!-- form header -->
    <div class="form-header">
      <h1>Payment Details</h1>
    </div>

    <!-- form body -->
    <div class="form-body ld ld-ring ld-spin" >


      <div class="horizontal-group">
        <div class="form-group left">
          <label for="name" class="label-title">Name *</label>
          <input type="text" id="name" class="form-input" placeholder="enter your name" value="Eugene Sunkwa-Arthur"
            required="required" />
        </div>
        <div class="form-group right">
          <label for="phone" class="label-title">Phone Number</label>
          <input type="tel" id="phone" minlength="10" maxlength="13" class="form-input" value="0548343909"
            placeholder="+233548343909" />
        </div>
      </div>

      <!-- Email -->
      <div class="form-group">
        <label for="email" class="label-title">Email*</label>
        <input type="email" id="email" class="form-input" placeholder="enter your email"
          value="eugenearthur53@gmail.com" required="required">
      </div>

      <div class="horizontal-group">
        <div class="form-group left">
          <label for="language" class="label-title">Language *</label>
          <input type="text" id="language" class="form-input" placeholder="enter your language" value="en"
            required="required">
        </div>
        <div class="form-group right">
          <label for="currency" class="label-title">Currency *</label>
          <input type="text" class="form-input" id="currency" placeholder="enter your currency" value="GHS"
            required="required">
        </div>
      </div>

      <div class="horizontal-group">
        <div class="form-group left">
          <label for="otherInfo" class="label-title">Other Info</label>
          <input type="text" id="otherInfo" class="form-input" value="test payment" placeholder="enter other info">
        </div>
        <div class="form-group right">
          <label for="currency" class="label-title">Amount *</label>
          <input type="number" id="amount" min="1" value="1" class="form-input" required="required">
        </div>
      </div>

      <div class="form-group">
        <label for="choose-file" class="label-title">Description</label>
        <textarea class="form-input" id="description" rows="3" cols="30"
          style="height:auto; resize: none;">Testing Payfluid api</textarea>
      </div>

      <div class="form-group">
        <label for="redirecturl" class="label-title">Response Redirect Url*</label>
        <input type="text" id="redirecturl" class="form-input" value=<?php echo $redirect_url ?> placeholder="enter your redirect url"
          required="required">
      </div>

      <div class="form-group">
        <label for="callbackurl" class="label-title">Status Callback Url*</label>
        <input type="text" id="callbackurl" class="form-input" value="http://4a767a17.ngrok.io/rest/api/callback" placeholder="enter your callback url"
          required="required">
      </div>


    </div>

    <!-- form-footer -->
    <div class="form-footer">
      <span>* required</span>
      <button class="buttonload" onclick="checkout()" class="btn" id="paymentBtn"><i class="loading"></i> Make Payment</button>
    </div>

  </form>
  <script>
      function checkout() {
        $('#paymentBtn').prop('disabled',true)
        $('.loading').toggleClass('fa fa-spinner fa-spin')
        if($("#currency").val().toLowerCase() == "ghs"){
            $.post("index.php",
              {
                request: "createPayLink",
                language: $('#language').val(),
                currency: $("#currency").val(),
                amount: $("#amount").val(),
                descr: $("#description").val(),
                phone: $("#phone").val(),
                email: $("#email").val(),
                callbackUrl: $("#callbackurl").val(),
                redirectUrl: $("#redirecturl").val(),
                otherInfo: $("#otherInfo").val(),
                name: $("#name").val()
              })
              .done(function (data) {
                  result = JSON.parse(data);
                  if (result.result_code === '00') {
                    webURL = result.webURL;
                    window.location = webURL;
                  } else {
                    alert("Error submit returned : " + data);
                    $('#paymentBtn').prop('disabled',false);
                    $('.loading').toggleClass('fa fa-spinner fa-spin')
                  }
              }).fail(function() {
                  alert( "An Error Occured." );
                  $('#paymentBtn').prop('disabled',false)
                  $('.loading').toggleClass('fa fa-spinner fa-spin')
              });
        }else {
            alert("Error: Invalid Currency. Please convert to GHS.")
            $('#paymentBtn').prop('disabled',false)
            $('.loading').toggleClass('fa fa-spinner fa-spin')
        }
      }  
  </script> 
  
  </body>

</html>
