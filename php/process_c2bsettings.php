<?php
include_once 'dbconnect.php';
include "functions.php";
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
sec_session_start();
if(isset($_POST["update"])){
    $paybill_number = $_POST['paybill_number'];
    $confirm_url = $_POST['confirm_url'];
    $valid_url = $_POST['valid_url'];
    $reg_url = $_POST['reg_url'];
    $consumer_key = $_POST['consumer_key'];
    $secret = $_POST['secret'];
    $sms_notif = $_POST['sms_notifications'];
    $e_rate = $_POST['e_rate'];
    $token = $_POST['security_token'];
  $sql5 = "UPDATE `mpesa_c2b_settings` SET `paybill_number` = '$paybill_number',`register_url` = '$reg_url',`confirm_url` = '$confirm_url',`validation_url` = '$valid_url',`security_token` = '$token', `consumer_key` = '$consumer_key', `consumer_secret` = '$secret',`sms_on` = '$sms_notif',`e_rate` = '$e_rate' WHERE `mpesa_c2b_settings`.`id` = 1";
if(mysqli_query($mysqli, $sql5)){
header('location:../c2bMpesasettings.php?success=sucess');
}else{
     echo "Error updating record: " . mysqli_error($mysqli);
}

}else{
    echo 'problem with save button';
}


?>