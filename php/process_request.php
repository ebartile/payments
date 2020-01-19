<?php
include_once 'dbconnect.php';
include "functions.php";
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
sec_session_start();
$sql_fees = "SELECT `fee_amt`, `type`, `for_type` FROM `default_gateway_fees` WHERE for_type = 'Request'";

$result_fees = mysqli_query($mysqli, $sql_fees);

if($result_fees->num_rows > 0){
    while ($row = $result_fees->fetch_assoc()){
        
        $fee_amt = $row['fee_amt'];
        $type = strtolower($row['type']);
        
    }
    
    
}

if(!isset($_POST["request"])) {
    
    header('Location: ../request.php?error=There is a form error. Please try again or contact admin.'); 
}else{
    $amount1 = $_POST['amount'];
    $email = $_POST['email'];

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
            	$amount = round($amount1 / $member_rate, 2);
    }     

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
     
 if($email2 == $email){
     header('location:../request.php?error=Sorry!!! You cannot request payment from your own account');
 }else{   
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
'$this_user', 
'$recipient_username',
'Payment request (To $names By $namess)',
'Payment Request',
'$date',
'Pending',
'$amount',
'$apply_fee',
'$net_amt',
'-',
'-'
)";
if(mysqli_query($mysqli,$sql)){    
        
        header('Location: ../account.php');
   
}else{
     echo "Error updating record: " . mysqli_error($mysqli);
    //header('Location: ../withdraw.php?error=error1');
        



}
 }    
}else{
    
    //as modified for PatricK South Africa to allow Fund requests from non-registered members 
    
    /* Save this transaction and alert by email the requested email to register and find this transaction on pending requests to approve or reject */
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
'$this_user', 
'$email',
'Payment request (To $email)',
'Payment Request',
'$date',
'Pending',
'$amount',
'$apply_fee',
'$net_amt',
'-',
'-'
)";
if(mysqli_query($mysqli,$sql)){    
        
//email this user about this Payment request
        
        
        
       //get emailing parameters
       $sqluser = "SELECT * FROM mailer_params where id = 1";
$resultuser = $mysqli->query($sqluser);

if ($resultuser->num_rows > 0) {
    // output data of each row
    while($row = $resultuser->fetch_assoc()) {
						$support = $row['support_email'];
						$site = $row['site_name'];
						$no_reply = $row['no_replt'];
						$url =$row['site_url'];
						$subject1= 'New Payment Request';
						
						
						
    }}
       
        $from = $no_reply;
    $to = $email;
    $to_name = 'User';
    $names = $site;
    $reply = $support;
    $subject = $subject1;
    $html_body = 'Dear '. $to_name. ', <br> You have a new Payment request of '. $amount1. ' by ' . $this_user. ' on '. $site.'.<br> Follow this link to register and complete this payment: <br>'.$url.'/register.php.<br>Kind Regards,<br>Binitoo.com Team.'; 
    $plain_body = 'Dear '. $to_name. ', <br> You have a new Payment request of '. $amount1. ' by ' . $this_user. ' on '. $site.'.<br> Follow this link to register and complete this payment: <br>'.$url.'/register.php.<br>Kind Regards,<br>Binitoo.com Team.';
    
    require_once "mail.php";
        
        
        
        
        
        
        
        header('Location: ../account.php');
   
}else{
     echo "Error updating record: " . mysqli_error($mysqli);
    //header('Location: ../withdraw.php?error=error1');
        



}
    
    
    
    
    
    
    
    
    
    
     //header('Location: ../request.php?error= Sorry!! You cannot request payment from a non-registered member right now. Try again later or request them to register with us first.');
    
}
    
    
    
}
}
?>