<?php

require_once "dbconnect.php";

if(isset($_POST['addfee'])){
    $country = $_POST['country'];
    $type = $_POST['type'];
    $fixed = $_POST['fixed'];
    $percent = $_POST['percent'];
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    $sql = "INSERT INTO `country_specific_fees`(`country`, `fee_type`, `fixed_fee`, `percent_fee`) VALUES ('$country','$type','$fixed','$percent')";
    if(mysqli_query($mysqli, $sql)){
        header('location:../countryFees.php?success=Fee added successfully');
    }else{
         header('location:../countryFees.php?error='.mysqli_error($mysqli));
    }
}else{
     header('location:../countryFees.php');
}











?>