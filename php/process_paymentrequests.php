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
                   header('location:../account.php?success5=success5');
               
                    } else {
                       
                    echo "Error updating record: " . mysqli_error($mysqli);
   } 
   
    
                
    
    
    
}elseif(isset($_POST["approve"])){
    
     $amount = $_POST['amount'];
    $id = $_POST['id'];
    $sender_name = $_POST['sender_name'];
    //check whether logged in user has enough balance
    $sql = "SELECT * FROM members where username = '$this_user'";
$result = $mysqli->query($sql);
    while($row = $result->fetch_assoc()) {
      $available_balance = $row['available_balance'];
      $new_bal = $available_balance - $amount;
    }
    if($amount <= $available_balance){
        $sql2 = "SELECT * FROM members where username = '$sender_name'";
$result2 = $mysqli->query($sql2);
    while($row = $result2->fetch_assoc()) {
      $available_balance2 = $row['available_balance'];
      $new_bal2 = $available_balance2 + $amount;
    }
    
    
    
     $sql20 = "UPDATE `transactons` SET `status` = 'Approved' WHERE `transactons`.`transaction_id` = '$id'";
             if(mysqli_query($mysqli, $sql20)){
                 
                 //update funds to the requester
                 $sql22 = "UPDATE `members` SET `available_balance` = '$new_bal2' WHERE `members`.`username` = '$sender_name'";
             if(mysqli_query($mysqli, $sql22)){
                 //update funds to the user who is approving this request
                 
                 $sql23 = "UPDATE `members` SET `available_balance` = '$new_bal' WHERE `members`.`username` = '$this_user'";
             if(mysqli_query($mysqli, $sql23)){
                 
                   header('location:../account.php?success5=success5');
               
                    } else {
                       
                    echo "Error updating record: " . mysqli_error($mysqli);
   } 
   
                  
               
                    } else {
                       
                    echo "Error updating record: " . mysqli_error($mysqli);
   } 
   
                 
                 
                 
                 
                 
                 
                 
                 
                 
                  
               
                    } else {
                       
                    echo "Error updating record: " . mysqli_error($mysqli);
   } 
   
    }else{
        //No sufficient funds
         header('location:../myPayment_requests.php?error5=error5');
    } 
    
    
}else{
    
    header('../myPayment_requests.php?error=error');
}



?>