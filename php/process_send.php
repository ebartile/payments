<?php
include_once 'dbconnect.php';
include "functions.php";
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
sec_session_start();

$sql_fees = "SELECT `fee_amt`, `type`, `for_type` FROM `default_gateway_fees` WHERE for_type = 'Send'";

$result_fees = mysqli_query($mysqli, $sql_fees);

if($result_fees->num_rows > 0){
    while ($row = $result_fees->fetch_assoc()){
        
        $fee_amt = $row['fee_amt'];
        $type = strtolower($row['type']);
        
    }
    
    
}
if(isset($_POST["send"])) {
    $amount = $_POST['amount'];
    $email = $_POST['email'];
     
}

//check if sender is a registered user
$sql2 = "SELECT * FROM members where username = '".$_SESSION['username']."'";
$result = $mysqli->query($sql2);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
                        $namess = $row['First_name'] . $row['Last_name'];
						$this_user = $_SESSION['username'];
						$date = date('y-m-d: h.m.s');
						$available_balance = $row['available_balance'];
						$user_email = $row['email'];
						$member_rate = $row['e_rate'];
					
    }     
    if($user_email === $email){
        header('location:../send.php?error=You cannot send money to your own account');
    }else{
 if($amount <= $available_balance) {  
     
     //check account of the recipient
     $sql22 = "SELECT * FROM members where email = '$email'";
$result22 = $mysqli->query($sql22);

if ($result22->num_rows > 0) {
    // output data of each row
    while($row = $result22->fetch_assoc()) {
                        $names = $row['First_name'] . $row['Last_name'];
						$recipient_username = $row['username'];
						$date = date('y-m-d: h.m.s');
						$available_balance2 = $row['available_balance'];
    }     
     
}else{
    header('location:../send.php?success=You have sent money to ' . $email. ' He/she will find his/her money in his/her account as soon as he/she registers and confirms his or her email address.');
}  
     
     if($type == 'fixed'){
            $apply_fee = $fee_amt;
            
        }elseif($type == 'fixed'){
             $apply_fee = $fee_amt/100*$amount;
        }else{
           $apply_fee = 0; 
        }
    $net_amt = $amount - $apply_fee;
     
     $sql = "INSERT INTO `transactons`
( 
`recipient_name`,
`sender_name`,
`naration`,
`transaction_type`,
`date`,
`status`,
`gross_amt`,
`fee_amt`,
`net_amt`,
`balance`,
`reference_number`
)  
VALUES  
( 
'$recipient_username', 
'$this_user',
'Payment (To $namess From $names)',
'Money Send',
'$date',
'Completed',
'$amount',
'$apply_fee',
'$net_amt',
'-',
'-'
)";
if(mysqli_query($mysqli,$sql)){    
        $new_bal = $available_balance - $amount;
     $sqlupdate = "UPDATE `members` SET `available_balance` = '$new_bal' WHERE `members`.`username` = '$this_user'";
         if(mysqli_query($mysqli, $sqlupdate)){
             
               $new_bal2 = $available_balance2 + $net_amt;
     $sqlupdate2 = "UPDATE `members` SET `available_balance` = '$new_bal2' WHERE `members`.`username` = '$recipient_username'";
         if(mysqli_query($mysqli, $sqlupdate2)){
                header('Location: ../account.php?success=Money sent successfully');
                    } else {
                    echo "Error updating record: " . mysqli_error($mysqli);
   } 
        
                header('Location: ../account.php?success=oney sent successfully');
                    } else {
                    echo "Error updating record: " . mysqli_error($mysqli);
   } 
        
        
   
}else{
     echo "Error updating record: " . mysqli_error($mysqli);
    //header('Location: ../withdraw.php?error=error1');
        



}
 }else{
     header('Location: ../send.php?error=You do not have sufficient funds to complete this transaction.'. $amount);
 }    
     
     
     
    }   
 }

?>