<?php
//this file processes deposits on the agent end. Agent is trying to approve or reject a deposit to a client's account
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
include_once 'dbconnect.php';
include "functions.php";
sec_session_start();
if(isset($_POST["approve"])){
    $amount1 = $_POST['amount'];
    $sender = $_POST['sender_name'];
    $recipient = $_POST['recipient_name'];
    $transaction_id = $_POST['id'];

//check if sender is a registered user
$sql2 = "SELECT * FROM members where username = '".$_SESSION['username']."'";
$result = $mysqli->query($sql2);

if($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
                        $namess = $row['First_name'] . $row['Last_name'];
						$this_user = $_SESSION['username'];
						$date = date('y-m-d: h.m.s');
						$available_balance = $row['available_balance'];
						$email2 = $row['email'];
						$member_rate = $row['e_rate'];
            $member_currency = $row['member_currency'];
            	$amount =$amount1;
    }     

     //check account of the recipient or client depositing funds
     $sql22 = "SELECT * FROM members where username = '$recipient'";
$result22 = $mysqli->query($sql22);

if ($result22->num_rows > 0) {
    // output data of each row
    while($row = $result22->fetch_assoc()) {
                        $names = $row['First_name'] . $row['Last_name'];
						$recipient_username = $row['username'];
						$date = date('y-m-d: h.m.s');
						$available_balance2 = $row['available_balance'];
						$username = $row['username'];
						$id = $row['id'];
    }     
     
 if($id == $sender){
     header('location:../agent_deposits.php?error=Sorry!!! You cannot approve a deposit to your own account');
 }else{   
     
     $sql = "UPDATE `transactons` SET `status`= 'Completed' WHERE `transactons`.`transaction_id` ='$transaction_id'";
if(mysqli_query($mysqli,$sql)){    
        
        //UPDATE BALANCE OF THE AGENT
        $new_agent_bal = $available_balance - $amount;
      $sql_agent = "UPDATE `members` SET `available_balance`='$new_agent_bal' WHERE `members`.`id`='$sender'";
        if(mysqli_query($mysqli,$sql_agent)){
            
            //UPDATE CUSTOMER BALANCE
            
             $new_bal = $available_balance2 + $amount;
      $sql_2 = "UPDATE `members` SET `available_balance`='$new_bal' WHERE `members`.`username`='$recipient'";
            
           if(mysqli_query($mysqli,$sql_2)){ 
            
            header('location:../agent_deposits.php?success=Deposit to client was successful');
        }else{
             echo "Error updating record: " . mysqli_error($mysqli);
        }
        
        }else{
             echo "Error updating record: " . mysqli_error($mysqli);
        } 
   
}else{
     echo "Error updating record: " . mysqli_error($mysqli);
    //header('Location: ../withdraw.php?error=error1');
        



}
 }    
}else{
    
     header('Location: ../agent_deposits.php?error= Sorry!! You cannot deposit funds to a non-registered member right now. Try again later or request them to register with us first.');
    
}
    
    
    
}
}elseif(isset($_POST["reject"])){
     $amount1 = $_POST['amount'];
    $sender = $_POST['sender_name'];
    $recipient = $_POST['recipient_name'];
    $transaction_id = $_POST['id'];
     $sql_2 = "UPDATE `transactons` SET `status`= 'Rejected' WHERE `transactons`.`transaction_id` ='$transaction_id'";
       if(mysqli_query($mysqli,$sql_2)){ 
            header('Location: ../agent_deposits.php?success= You have rejected this transaction.');
       }else{
           echo "Error updating record: " . mysqli_error($mysqli);
    //header('Location: ../withdraw.php?error=error1');
         
       }
}else{
      header('Location: ../agent_deposits.php?error=There is a form error. Please try again or contact admin.'); 
}
?>