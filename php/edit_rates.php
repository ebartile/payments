<?php
error_reporting(E_ALL); ini_set('display_errors', 1); 
include_once '../php/dbconnect.php';
include_once '../php/functions.php';

sec_session_start();
if(isset($_POST['edit_rate'])){
    $id = $_POST['id'];
    $rate = $_POST['rate'];
    
    $sql= "UPDATE `currency` SET `e_rate`='$rate' WHERE `currency`.`id` = $id";
    
   if(mysqli_query($mysqli,$sql)){
        header('location:../currency_rates.php?success= Currency rate updated successfully.');
            
            
    }else{
      header('location:../currency_rates.php?error=There was an error while updating. Try later.');
              
    }
    
    
}else{
    header('location:../currency_rates.php?error=There was a form error while updating. Try later.');
}
















?>