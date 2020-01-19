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
    $recipient_name = $_POST['recipient_name'];
 
      $sql20 = "UPDATE `transactons` SET `status` = 'Rejected' WHERE `transactons`.`transaction_id` = '$id'";
             if(mysqli_query($mysqli, $sql20)){
                   header('location:../admin.php?success=Deposit has been rejected.');
               
                    } else {
                       
                    echo "Error updating record: " . mysqli_error($mysqli);
   } 
   
    
                
    
    
    
}elseif(isset($_POST["approve"])){
    
     $amount = $_POST['amount'];
    $id = $_POST['id'];
    $recipient_name = $_POST['recipient_name'];
    //let us find out the details of the user who desposited
        $sql2 = "SELECT * FROM members where username = '$recipient_name'";
$result2 = $mysqli->query($sql2);
    while($row = $result2->fetch_assoc()) {
      $available_balance2 = $row['available_balance'];
      $new_bal2 = $available_balance2 + $amount;
    }

     $sql20 = "UPDATE `transactons` SET `status` = 'Approved' WHERE `transactons`.`transaction_id` = '$id'";
             if(mysqli_query($mysqli, $sql20)){
                 
                 //update funds to the user who deposited
                 $sql22 = "UPDATE `members` SET `available_balance` = '$new_bal2' WHERE `members`.`username` = '$recipient_name'";
             if(mysqli_query($mysqli, $sql22)){
                 header('location:../admin.php?success=Deposit has been Approved succesfully.');
   
                    } else {
                       
                    echo "Error updating record: " . mysqli_error($mysqli);
   } 
   

               
                    } else {
                       
                    echo "Error updating record: " . mysqli_error($mysqli);
   } 
   
  
    
}else{
    
    header('../pending_deposits.php?error=Form error. Contact admin for assistance.');
}



?>