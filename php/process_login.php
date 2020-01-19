<?php
include_once 'dbconnect.php';
include_once 'functions.php';

sec_session_start(); // Our custom secure way of starting a PHP session.

if (isset($_POST['email'], $_POST['p'])) {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = $_POST['p']; // The hashed password.
    
    if (login($email, $password, $mysqli) == true) {
        // Login success 
       if((isset($_GET['amt']))){
           if((isset($_GET['amt'])) !==''){
               	$amt = $_GET['amt'];
   $businessEmail = $_GET['business'];
   $currency = $_GET['currency'];
   $itemName =  $_GET['itemName'];
   $notify_url = $_GET['notify_url'];
   $cancel_url = $_GET['cancel_url'];
   $success_url = $_GET['success_url'];
            header('Location: ../pay_now.php?amt='.$amt.'&currency='.$currency.'&business='.$businessEmail.'&itemName='.$itemName.'&notify_url='.$notify_url.'&cancel_url='.$cancel_url.'&success_url='.$success_url.'');
        exit();
           }else{
             header("Location: ../account.php");
        exit();   
           }
     
       }else{
            header("Location: ../account.php");
        exit();
       }
    } else {
        // Login failed 
        header('Location: ../login.php?error=Incorrect email or password');
        exit();
    }
} else {
    // The correct POST variables were not sent to this page. 
    header('Location: ../error.php?err=Could not process login');
    exit();
}