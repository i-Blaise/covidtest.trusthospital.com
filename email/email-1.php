<?php
include('class_lib.php');
$database_con = new DB_con();
$getData = new dbData();
use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;
require 'vendor\autoload.php';

if(isset($_SESSION['email']))
{
    $user_email = $_SESSION['email'];
}elseif(isset($_SESSION['new_acc_email']))
{
    $user_email = $_SESSION['new_acc_email'];
}


//Email to User
$mail = new PHPMailer;
$mail->isSMTP();                            // Set mailer to use SMTP
$mail->Host = 'smtp.hostinger.com';             // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                     // Enable SMTP authentication
$mail->Username = 'fashion@threeoddlayers.com';          // SMTP username
$mail->Password = 'Mennia123'; // SMTP password
$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                          // TCP port to connect to

$mail->setFrom('fashion@threeoddlayers.com', 'TOL Order');
$mail->addReplyTo('fashion@threeoddlayers.com', 'ThreeOddLayers');
$mail->addAddress($user_email); 
// $mail->addBCC('bcc@example.com');

$mail->isHTML(true);  // Set email format to HTML

$mail->Subject = 'Your Order Details';
$mail->Body = $_SESSION['user_order_email'];
// $mail->send();

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent 5<br>';
}












// Emails to the sellers
if($_SESSION["loggedin_main"] == true && !isset($_SESSION["loggedin_modal"]))
								{
								   $result = $getData->getuser_cart($_SESSION["email"]);
								   while($r_row=mysqli_fetch_array($result))
										   {
											   $quantity = $r_row['quantity'];
											   $code = $r_row['code'];
												   
                                               $p_result=mysqli_query($database_con->dbh, "SELECT shop FROM products WHERE code = '$code'");
						   
											   while($row=mysqli_fetch_array($p_result)){

if(in_array('2',  $row)){
    $mail = new PHPMailer;
    $mail->isSMTP();                            // Set mailer to use SMTP
    $mail->Host = 'smtp.hostinger.com';             // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                     // Enable SMTP authentication
    $mail->Username = 'fashion@threeoddlayers.com';          // SMTP username
    $mail->Password = 'Mennia123'; // SMTP password
    $mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                          // TCP port to connect to
    
    $mail->setFrom('fashion@threeoddlayers.com', 'Teddy SZN');
    // $mail->addReplyTo('fashion@threeoddlayers.com', 'ThreeOddLayers');
    $mail->addAddress('teddyszn23@gmail.com');   // Add a recipient (Teddy szn)
    // $mail->addBCC('bcc@example.com');
    
    $mail->isHTML(true);  // Set email format to HTML
    
    $mail->Subject = 'You Have An Order!!!';
    $mail->Body = $_SESSION['seller_email'];
    // $mail->send();
    
    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent 1<br>';
    }

}

if(in_array('3',  $row)){
    $mail = new PHPMailer;
    $mail->isSMTP();                            // Set mailer to use SMTP
    $mail->Host = 'smtp.hostinger.com';             // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                     // Enable SMTP authentication
    $mail->Username = 'fashion@threeoddlayers.com';          // SMTP username
    $mail->Password = 'Mennia123'; // SMTP password
    $mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                          // TCP port to connect to
    
    $mail->setFrom('fashion@threeoddlayers.com', 'Prissys Thrift Shop');
    // $mail->addReplyTo('fashion@threeoddlayers.com', 'ThreeOddLayers');
    $mail->addAddress('priscaborkloe@gmail.com');   // Add a recipient (Prissy)
    // $mail->addBCC('bcc@example.com');
    
    $mail->isHTML(true);  // Set email format to HTML
    
    $mail->Subject = 'You Have An Order!!!';
    $mail->Body = $_SESSION['seller_email'];
    // $mail->send();
    
    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent 2<br>';
    }

}


                                               }
                                            }
                                            
}elseif(isset($_SESSION["shopping_cart"]) && !isset($_SESSION['loggedin_main']))
{
    $teddy = false;
    $prissy = false;
    $code = array();
    $count = 0;
    foreach($_SESSION["shopping_cart"] as $keys => $row)
    {
        $code[$count++] = $row['code'];  
    }
$ids = join("','",$code);   
$p_result=mysqli_query($database_con->dbh, "SELECT shop FROM products WHERE code IN ('$ids')");
    while($r_row=mysqli_fetch_array($p_result))
    {
        if(in_array('2',  $r_row))
        {
            $teddy = true;
        }
        if(in_array('3',  $r_row))
        {
            $prissy = true;
        }
    }
    
    if($teddy)
    {
        $mail = new PHPMailer;
        $mail->isSMTP();                            // Set mailer to use SMTP
        $mail->Host = 'smtp.hostinger.com';             // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                     // Enable SMTP authentication
        $mail->Username = 'fashion@threeoddlayers.com';          // SMTP username
        $mail->Password = 'Mennia123'; // SMTP password
        $mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                          // TCP port to connect to
        
        $mail->setFrom('fashion@threeoddlayers.com', 'Teddy SZN');
        $mail->addReplyTo('fashion@threeoddlayers.com', 'ThreeOddLayers');
        $mail->addAddress('teddyszn23@gmail.com');   // Add a recipient (Teddy szn)
        // $mail->addBCC('bcc@example.com');
        
        $mail->isHTML(true);  // Set email format to HTML
        
        $mail->Subject = 'You Have An Order!!!';
        $mail->Body = $_SESSION['seller_email'];
        // $mail->send();
        
        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent 3<br>';
        }
    }

    if($prissy)
    { 
        $mail = new PHPMailer;
        $mail->isSMTP();                            // Set mailer to use SMTP
        $mail->Host = 'smtp.hostinger.com';             // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                     // Enable SMTP authentication
        $mail->Username = 'fashion@threeoddlayers.com';          // SMTP username
        $mail->Password = 'Mennia123'; // SMTP password
        $mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                          // TCP port to connect to
        
        $mail->setFrom('fashion@threeoddlayers.com', 'Prissys Thrift Shop');
        $mail->addReplyTo('fashion@threeoddlayers.com', 'ThreeOddLayers');
        $mail->addAddress('priscaborkloe@gmail.com');  
        // $mail->addBCC('bcc@example.com');
        
        $mail->isHTML(true);  // Set email format to HTML
        
        $mail->Subject = 'You Have An Order!!!';
        $mail->Body = $_SESSION['seller_email'];
        // $mail->send();
        
        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent 4<br>';
        }
    }
}


//Email to User
$mail = new PHPMailer;
$mail->isSMTP();                            // Set mailer to use SMTP
$mail->Host = 'smtp.hostinger.com';             // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                     // Enable SMTP authentication
$mail->Username = 'fashion@threeoddlayers.com';          // SMTP username
$mail->Password = 'Mennia123'; // SMTP password
$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                          // TCP port to connect to

$mail->setFrom('fashion@threeoddlayers.com', 'TOL Order');
$mail->addReplyTo('fashion@threeoddlayers.com', 'ThreeOddLayers');
$mail->addAddress('menniablaise@yahoo.com'); 
// $mail->addBCC('bcc@example.com');

$mail->isHTML(true);  // Set email format to HTML

$mail->Subject = 'Your Order Details';
$mail->Body = $_SESSION['user_order_email'];
// $mail->send();

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent 5<br>';
}
            

     

unset($_SESSION['FullName'], $_SESSION['country'], $_SESSION['address1'], $_SESSION['box_number'], $_SESSION['city'], $_SESSION['tel'], $_SESSION['new_acc_email'])




?>