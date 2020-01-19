<?php
include_once 'dbconnect.php';
include_once 'functions.php';

sec_session_start();

if(isset($_POST['save'])){
    
  $s_email = $_POST['s_email'];
  
  $no_reply = $_POST['no_reply'];
  
  
  $subject = $_POST['subject'];
  
  $site = $_POST['site'];
  $url = $_POST['url'];
  
  $sql ="UPDATE `mailer_params` SET `site_url`='$url',`support_email`='$s_email',`site_name`='$site',`no_replt`=' $no_reply',`mailer_subject`='$subject' WHERE `mailer_params`.`id`=1";
   
   if(mysqli_query($mysqli, $sql)){

    header('location:../mailSettings.php?success= Mailer params saved succesfully.');
   }else{
      header('location:../mailSettings.php?error='.mysqli_error($mysqli)); 
   }
    
    
    
    
    
    
    
    
    
    
    
    
    
}else{
    header('location:../mailSettings.php');
}

































?>