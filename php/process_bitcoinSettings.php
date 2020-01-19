<?php
include_once 'dbconnect.php';
include "functions.php";
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
sec_session_start();
if(isset($_POST["update"])){
    $api_key = $_POST['api_key'];
    //$x_pub = $_POST['x_pub']; -->Enable this is live mode
    $call_back_url = $_POST['call_back_url'];
    $secret = $_POST['secret'];
  $sql5 = "UPDATE `bitcoin_settings` SET `api_key` = '$api_key',`secret` = '$secret', `call_back_url` = '$call_back_url' WHERE `bitcoin_settings`.`id` = 1";
if(mysqli_query($mysqli, $sql5)){
header('location:../bitcoinSettings.php?success=sucess');
}else{
     echo "Error updating record: " . mysqli_error($mysqli);
}

}else{
    echo 'problem with save button';
}


?>