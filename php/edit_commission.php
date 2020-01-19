<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once "dbconnect.php";
if(isset($_POST['submitcommission'])){
    $commission = $_POST['commission'];
    $max = $_POST['max'];
   $min = $_POST['min'];
   $admin_com = $_POST['admin_commission'];
    $sql="UPDATE `agent_commission` SET `commission`='$commission', `min_amt`='$min', `max_amt`='$max', `admin_commission` = '$admin_com' WHERE `agent_commission`.`id`=1";
    
    
    if(mysqli_query($mysqli, $sql)){
        header('location:../cards.php?success=Commission updated.');
            
        
    }else{
      header('location:../cards.php?error=There was some form error while updating this commission.');  
    }
    
    
}else{
     header('location:../cards.php?error=There was some form error while updating this commission.');  
}




?>