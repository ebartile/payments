<?php
$referrer = $_SERVER['HTTP_REFERER'] ;
$url = 'https://www.binitoo.com';
if($referrer ==""){
    
 header('location:'.$url.'/login.php?error=There was an error while accessing API resources.');   
    
    
}else{
   //read the post Data
   $amt = $_POST['amt'];
   $businessEmail = $_POST['businessEmail'];
   $currency = $_POST['currency'];
   $itemName =  $_POST['itemName'];
   $notify_url = $_POST['notify_url'];
   $cancel_url = $_POST['cancel_url'];
   $success_url = $_POST['success_url'];
if($amt !=='' && $currency !=='' && $itemName !=='' && $notify_url !=='' && $cancel_url !=='' && $success_url !==''){
    header('location:'.$url.'/login.php?amt='.$amt.'&currency='.$currency.'&business='.$businessEmail.'&itemName='.$itemName.'&notify_url='.$notify_url.'&cancel_url='.$cancel_url.'&success_url='.$success_url.'');
}else{
    header('location:'.$url.'/api.php?error=Wrong post data. Follow the below guide when implementing your third party applications.');
}  
}








?>