<?php
include "config.inc.php";
include "functions.php";
include "dbconnect.php";
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
sec_session_start(); 
$this_user = $_SESSION['username'];

if(isset($_POST["reject"])) {
    $amount = $_POST['amount'];
    $id = $_POST['id'];
    $sender_name = $_POST['sender_name'];
 
      $sql20 = "UPDATE `transactons` SET `status` = 'Rejected' WHERE `transactons`.`transaction_id` = '$id'";
             if(mysqli_query($mysqli, $sql20)){
                   header('location:../account.php?success7=success7');
               
                    } else {
                       
                    echo "Error updating record: " . mysqli_error($mysqli);
   } 
   
    
                
    
    
    
}elseif(isset($_POST["approve"])){
    
     $amount = $_POST['amount'];
    $id = $_POST['id'];
    $sender_name = $_POST['sender_name'];
    
    //Find our the user who requested this withdrawal
   
        $sql2 = "SELECT * FROM members where username = '$sender_name'";
$result2 = $mysqli->query($sql2);
    while($row = $result2->fetch_assoc()) {
      $available_balance2 = $row['available_balance'];
      $new_bal2 = $available_balance2 - $amount;
    }
 if($amount <=$available_balance2){   
    
     $sql20 = "UPDATE `transactons` SET `status` = 'Approved' WHERE `transactons`.`transaction_id` = '$id'";
             if(mysqli_query($mysqli, $sql20)){
                 
                 //update funds to the requester
                 $sql22 = "UPDATE `members` SET `available_balance` = '$new_bal2' WHERE `members`.`username` = '$sender_name'";
             if(mysqli_query($mysqli, $sql22)){
           header('location:../account.php?success8=success8');
               
                    } else {
                       
                    echo "Error updating record: " . mysqli_error($mysqli);
   } 
   
                 
                 
                 
                 
                 
                 
                 
                 
                 
                  
               
                    } else {
                       
                    echo "Error updating record: " . mysqli_error($mysqli);
   } 
   
    }else{
        //No sufficient funds
         header('location:../pending_withdrawals.php?error5=error5');
    } 
    
    
}else{
    
    header('../pending_withdrawals.php?error=error');
}



?>