<?php
/* Namespace alias. */
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
error_reporting(E_ALL); ini_set('display_errors', 1);
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

//PHPMailer Object
$mail = new PHPMailer;


//From email address and name
$mail->From = $from;
$mail->FromName = $names;

//To address and name
$mail->addAddress($to, $to_name);
//$mail->addAddress("briangurucoder@gmail.com"); //Recipient name is optional

//Address to which recipient will reply
$mail->addReplyTo($reply, "Reply");

//CC and BCC
//$mail->addCC("briangurucoder@gmail.com");
//$mail->addBCC("briangurucoder@gmail.com");

//Send HTML or Plain Text email
$mail->isHTML(true);

$mail->Subject = $subject;
$mail->Body = $html_body;
$mail->AltBody = $plain_body;

if(!$mail->send()) 
{
    echo "Mailer Error: " . $mail->ErrorInfo;
} 
else 
{
    //echo "Message has been sent successfully";
}

?>