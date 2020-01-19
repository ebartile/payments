<?php
include_once 'dbconnect.php';
include "functions.php";
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
sec_session_start();
if(isset($_POST["update"])){
    $paybill_number = $_POST['paybill_number'];
    $initiator = $_POST['initiator_name'];
    $pass = $_POST['pass'];
    $command = $_POST['command_id'];
    $consumer_key = $_POST['key'];
    $secret = $_POST['secret'];
    $e_rate = $_POST['e_rate'];
  $sql5 = "UPDATE `mpesa_b2c_settings` SET `paybill_number` = '$paybill_number', `consumer_key` = '$consumer_key', `consumer_secret` = '$secret',`e_rate` = '$e_rate' WHERE `mpesa_b2c_settings`.`id` = 1";
if(mysqli_query($mysqli, $sql5)){
header('location:../mpesa_b2c_settings.php?success=success');
}else{
     echo "Error updating record: " . mysqli_error($mysqli);
}

}else{
    echo 'problem with save button';
}


?>