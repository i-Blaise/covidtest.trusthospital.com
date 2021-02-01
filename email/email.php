<?php
include('class_lib.php');
$database_con = new DB_con();
$getData = new dbData();

use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// require 'C:\xampp\composer\vendor\autoload.php';

// require 'PHPMailer-master/src/Exception.php';
require 'phpmailer/vendor/autoload.php';
// require 'PHPMailer-master/src/SMTP.php';



$action = htmlspecialchars($_POST["action"]);


// Sub Total
$subTotal;
// Delivery 
$delivery;
// Final Price 
$finalTotal;
// Customers Name
$_SESSION['FullName'];
//Customer Address
$_SESSION['address1'];
// Customer Phone Number 
$_SESSION['tel'];
// Customer City 
$_SESSION['city'];

    switch($action){
        // If you're creating a new account to make purchase
        case 'New_Account_Order_Confirmation';

        if(isset($_SESSION['order_placed']) && $_SESSION['order_placed'] == true)
        {
            
            if(isset($_SESSION["shopping_cart"]))
            {
                // $total = 0;
                $sum = 0;
                $subTotal = 0;
                foreach($_SESSION["shopping_cart"] as $keys => $row)
                {
                    $total = $row['quantity'] * $row['price'];
                    $sum = $total;
                    $subTotal += $total;
                    
            
            
                }

                if(isset($_SESSION['delivery']))
                {
                    $delivery = $_SESSION['delivery'];
                    
                }
                
                if($_SESSION['delivery'] != 'Free'){
                    $finalPrice = $_SESSION['deliveryVal'] + $subTotal;
                    $finalTotal = 'GH₵ '.$finalPrice;
                }



               
               
               
    $mail = new PHPMailer(TRUE);

    $mail->isSMTP();                            // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                     // Enable SMTP authentication
    $mail->Username = 'menniablaise@gmail.com';          // SMTP username
    $mail->Password = 'mennia123'; // SMTP password
    $mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                          // TCP port to connect to

    $mail->Host = 'localhost';
    $mail->setFrom('menniablaise@yahoo.com', 'Tol');
    $mail->addAddress('menniablaise@yahoo.com', 'Blaise');
    $mail->Subject = 'New Order!!!';
    $mail->Body = 'Helloooo, it fucking worked!';
    $mail->send();

if(!$mail->send()) {
    echo 'Message could not be sent.';
    // echo 'Mailer Error: ' . $mail->ErrorInfo;
    $_SESSION['emailfailed'] = 'false';
} else {
    $_SESSION['emailgone'] = 'true';




$_SESSION['username'] = $_SESSION['FullName'];
$_SESSION['email'] = $_SESSION['new_acc_email'];
$_SESSION['loggedin'] = true;

unset($_SESSION['FullName'], $_SESSION['address1'], $_SESSION['tel'], $_SESSION['city'], $_SESSION['new_acc_email'], $_SESSION['shopping_cart'], $_SESSION['wish_list']);

// $_SESSION['order'] = 'true';
// header("refresh:5;url=https://threeoddlayers.com/beta/index.php");

        }
        
        $_SESSION['checkthis'] = 'true';


        } else {
    $_SESSION['shop_cart'] = 'true';
        }


    } else {
        $_SESSION['order_placed_v'] = 'true';
            }
            
}
//    $mail->Body =

//        $total = 0;
//        $sum = 0;
//        $subTotal = 0;
//        foreach($_SESSION["shopping_cart"] as $keys => $row)
//        {
//            $total = $row['quantity'] * $row['price'];
//            $sum = $total;
//            $subTotal += $total;


//            'Hello '.$_SESSION['FullName'].' <br> You ordered to buy '.$row['name'].'  x'.$row['quantity'].'<br> The following is the payment: <br> Subtotal: '.$subTotal.'<br> Delivery: '.$delivery.' <br> Total: '.$finalTotal.'<br> Thank You ;)' ;
//         } 
        
?>

