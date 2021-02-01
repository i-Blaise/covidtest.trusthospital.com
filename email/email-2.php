<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

$name = $_GET['name'];
$email = $_GET['email'];
$subject = $_GET['subject'];
$message = $_GET['message'];



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



               

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {$mail->Host = 'localhost';

//Recipients
$mail->setFrom('menniablaise@gmail.com', 'Massive Cheerful Giving Network');
$mail->addAddress('menniablaise@gmail.com');               // Name is optional
$mail->addReplyTo('menniablaise@yahoo.com', "Blaise");

//Content
$mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'MCGN contact us form';
    $mail->Body    = 'hiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii';

    $mail->send();
    echo 'Message sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

            }
        }
    }
?>