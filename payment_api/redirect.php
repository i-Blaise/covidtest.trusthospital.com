<?php
include_once "payfluid_api_sdk.php";

//AUTO VERIFY SET TO TRUE
    $token = isset($_GET['token']) ? $_GET['token'] : '';

    $data = isset($_GET['qs']) ? $_GET['qs'] : '';



$result = \payfluid\MerchantAPI::verifyPayment($data,$token);
$result = json_decode($result);
      
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>PayFluid Demo</title>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300|Montserrat' rel='stylesheet' type='text/css'>
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>

	<style>
		body {
            overflow: hidden;
            }
            .background {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            -webkit-filter: blur(5px);
            filter: blur(5px);
            background-image: url("https://images.unsplash.com/photo-1418065460487-3e41a6c84dc5?q=80&fm=jpg&s=13c892f6ad31fb47e453970580ad28e1");
            background-size: contain;
            }
            .background::after {
            content: "";
            position: absolute;
            height: 100%;
            width: 100%;
            top: 0;
            left: 0;
            background-color: rgba(0,0,0,0.2);
            }
            .modalbox.success,
            .modalbox.error {
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
            transform: scale(0.75);
            /*margin-top: 15%;*/
            background: #fff;
            padding: 25px 25px 15px;
            border: 1px solid #aaa;
            text-align: center;
            }
            .modalbox.error{
                 margin-top: 15%;
            }
            .modalbox.success{
                 margin-top: -10%;
            }
            .modalbox.success.animate .icon,
            .modalbox.error.animate .icon {
            -webkit-animation: fall-in 0.75s;
            -moz-animation: fall-in 0.75s;
            -o-animation: fall-in 0.75s;
            animation: fall-in 0.75s;
            }
            .modalbox.success h1,
            .modalbox.error h1 {
            font-family: 'Montserrat', sans-serif;
            }
            .modalbox.success p,
            .modalbox.error p {
            font-family: 'Open Sans', sans-serif;
            }
            .modalbox.success button,
            .modalbox.error button,
            .modalbox.success button:active,
            .modalbox.error button:active,
            .modalbox.success button:focus,
            .modalbox.error button:focus {
            -webkit-transition: all 0.1s ease-in-out;
            transition: all 0.1s ease-in-out;
            -webkit-border-radius: 0;
            -moz-border-radius: 0;
            border-radius: 0;
            margin-top: 15px;
            width: 80%;
            background: transparent;
            color: #0a6;
            border-color: #0a6;
            outline: none;
            }
            .modalbox.success button:hover,
            .modalbox.error button:hover,
            .modalbox.success button:active:hover,
            .modalbox.error button:active:hover,
            .modalbox.success button:focus:hover,
            .modalbox.error button:focus:hover {
            color: #fff;
            background: #0a6;
            border-color: transparent;
            }
            .modalbox.success .icon,
            .modalbox.error .icon {
            position: relative;
            margin: 0 auto;
            margin-top: -75px;
            background: #0a6;
            height: 100px;
            width: 100px;
            border-radius: 50%;
            }
            .modalbox.success .icon span,
            .modalbox.error .icon span {
            postion: absolute;
            font-size: 4em;
            color: #fff;
            text-align: center;
            padding-top: 20px;
            }
            .modalbox.error button,
            .modalbox.error button:active,
            .modalbox.error button:focus {
            color: #ff424f;
            border-color: #ff424f;
            }
            .modalbox.error button:hover,
            .modalbox.error button:active:hover,
            .modalbox.error button:focus:hover {
            color: #fff;
            background: #ff424f;
            }
            .modalbox.error .icon {
            background: #ff424f;
            }
            .modalbox.error .icon span {
            padding-top: 25px;
            }
            .center {
            float: none;
            margin-left: auto;
            margin-right: auto;
            /* stupid browser compat. smh */
            }
            .center .change {
            clearn: both;
            display: block;
            font-size: 10px;
            color: #ccc;
            margin-top: 10px;
            }
            @-webkit-keyframes fall-in {
            0% {
                -ms-transform: scale(3, 3);
                -webkit-transform: scale(3, 3);
                transform: scale(3, 3);
                opacity: 0;
            }
            50% {
                -ms-transform: scale(1, 1);
                -webkit-transform: scale(1, 1);
                transform: scale(1, 1);
                opacity: 1;
            }
            60% {
                -ms-transform: scale(1.1, 1.1);
                -webkit-transform: scale(1.1, 1.1);
                transform: scale(1.1, 1.1);
            }
            100% {
                -ms-transform: scale(1, 1);
                -webkit-transform: scale(1, 1);
                transform: scale(1, 1);
            }
            }
            @-moz-keyframes fall-in {
            0% {
                -ms-transform: scale(3, 3);
                -webkit-transform: scale(3, 3);
                transform: scale(3, 3);
                opacity: 0;
            }
            50% {
                -ms-transform: scale(1, 1);
                -webkit-transform: scale(1, 1);
                transform: scale(1, 1);
                opacity: 1;
            }
            60% {
                -ms-transform: scale(1.1, 1.1);
                -webkit-transform: scale(1.1, 1.1);
                transform: scale(1.1, 1.1);
            }
            100% {
                -ms-transform: scale(1, 1);
                -webkit-transform: scale(1, 1);
                transform: scale(1, 1);
            }
            }
            @-o-keyframes fall-in {
            0% {
                -ms-transform: scale(3, 3);
                -webkit-transform: scale(3, 3);
                transform: scale(3, 3);
                opacity: 0;
            }
            50% {
                -ms-transform: scale(1, 1);
                -webkit-transform: scale(1, 1);
                transform: scale(1, 1);
                opacity: 1;
            }
            60% {
                -ms-transform: scale(1.1, 1.1);
                -webkit-transform: scale(1.1, 1.1);
                transform: scale(1.1, 1.1);
            }
            100% {
                -ms-transform: scale(1, 1);
                -webkit-transform: scale(1, 1);
                transform: scale(1, 1);
            }
            }
            @-webkit-keyframes plunge {
            0% {
                margin-top: -100%;
            }
            100% {
                margin-top: 25%;
            }
            }
            @-moz-keyframes plunge {
            0% {
                margin-top: -100%;
            }
            100% {
                margin-top: 25%;
            }
            }
            @-o-keyframes plunge {
            0% {
                margin-top: -100%;
            }
            100% {
                margin-top: 25%;
            }
            }
            @-moz-keyframes fall-in {
            0% {
                -ms-transform: scale(3, 3);
                -webkit-transform: scale(3, 3);
                transform: scale(3, 3);
                opacity: 0;
            }
            50% {
                -ms-transform: scale(1, 1);
                -webkit-transform: scale(1, 1);
                transform: scale(1, 1);
                opacity: 1;
            }
            60% {
                -ms-transform: scale(1.1, 1.1);
                -webkit-transform: scale(1.1, 1.1);
                transform: scale(1.1, 1.1);
            }
            100% {
                -ms-transform: scale(1, 1);
                -webkit-transform: scale(1, 1);
                transform: scale(1, 1);
            }
            }
            @-webkit-keyframes fall-in {
            0% {
                -ms-transform: scale(3, 3);
                -webkit-transform: scale(3, 3);
                transform: scale(3, 3);
                opacity: 0;
            }
            50% {
                -ms-transform: scale(1, 1);
                -webkit-transform: scale(1, 1);
                transform: scale(1, 1);
                opacity: 1;
            }
            60% {
                -ms-transform: scale(1.1, 1.1);
                -webkit-transform: scale(1.1, 1.1);
                transform: scale(1.1, 1.1);
            }
            100% {
                -ms-transform: scale(1, 1);
                -webkit-transform: scale(1, 1);
                transform: scale(1, 1);
            }
            }
            @-o-keyframes fall-in {
            0% {
                -ms-transform: scale(3, 3);
                -webkit-transform: scale(3, 3);
                transform: scale(3, 3);
                opacity: 0;
            }
            50% {
                -ms-transform: scale(1, 1);
                -webkit-transform: scale(1, 1);
                transform: scale(1, 1);
                opacity: 1;
            }
            60% {
                -ms-transform: scale(1.1, 1.1);
                -webkit-transform: scale(1.1, 1.1);
                transform: scale(1.1, 1.1);
            }
            100% {
                -ms-transform: scale(1, 1);
                -webkit-transform: scale(1, 1);
                transform: scale(1, 1);
            }
            }
            @keyframes fall-in {
            0% {
                -ms-transform: scale(3, 3);
                -webkit-transform: scale(3, 3);
                transform: scale(3, 3);
                opacity: 0;
            }
            50% {
                -ms-transform: scale(1, 1);
                -webkit-transform: scale(1, 1);
                transform: scale(1, 1);
                opacity: 1;
            }
            60% {
                -ms-transform: scale(1.1, 1.1);
                -webkit-transform: scale(1.1, 1.1);
                transform: scale(1.1, 1.1);
            }
            100% {
                -ms-transform: scale(1, 1);
                -webkit-transform: scale(1, 1);
                transform: scale(1, 1);
            }
            }
            @-moz-keyframes plunge {
            0% {
                margin-top: -100%;
            }
            100% {
                margin-top: 15%;
            }
            }
            @-webkit-keyframes plunge {
            0% {
                margin-top: -100%;
            }
            100% {
                margin-top: 15%;
            }
            }
            @-o-keyframes plunge {
            0% {
                margin-top: -100%;
            }
            100% {
                margin-top: 15%;
            }
            }
            @keyframes plunge {
            0% {
                margin-top: -100%;
            }
            100% {
                margin-top: 15%;
            }
            }
	</style>
</head>

<body>
	<div class="background"></div>
	<div class="container">

		<div class="row" <?php if (!(is_object($result) || is_array($result))) echo " style='display: none';"; ?>>
			<div class="modalbox success col-sm-8 col-md-6 col-lg-5 center animate">
				<div class="icon">
					<span class="glyphicon glyphicon-ok"></span>
				</div>
				<h1>Verification Successful!</h1>

				<div>
					<table>
						<tbody style="text-align: right; ">

                            <?php
                            
                            
                                if(is_array($result) ||is_object($result)){
                                    foreach ($result as $key => $value) {
                                        ?>
                                            <tr>
                                                <td style="text-align:left"><h5><?php echo $key ?></h5></td>
                                                <td style="word-break:break-all"><h6><?php echo $value?></h6></td>
                                            </tr>
                                            <?php
                                            }
                                }
                                
                             ?>
						</tbody>
					</table>
				</div>
				<button type="button" class="redo btn">Ok</button>
			</div>
			
		</div>
		
		<div class="row" <?php if ((is_object($result) || is_array($result))) echo " style='display: none';"; ?>>
			<div class="modalbox error col-sm-8 col-md-6 col-lg-5 center animate">
				<div class="icon">
					<span class="glyphicon glyphicon-thumbs-down"></span>
				</div>
				<h1>Oh no!</h1>
				<p>Oops! Something went wrong,
                    <br> you should try again.
                </p>
				<button type="button" class="redo btn">Try again</button>				
			</div>
		</div>
	</div>
</body>
</html>