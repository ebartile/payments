<?php
include_once 'dbconnect.php';
include "functions.php";
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
sec_session_start();
$sql_fees = "SELECT `fee_amt`, `type`, `for_type` FROM `default_gateway_fees` WHERE for_type = 'Withdraw'";

$result_fees = mysqli_query($mysqli, $sql_fees);

if($result_fees->num_rows > 0){
    while ($row = $result_fees->fetch_assoc()){
        
        $fee_amt = $row['fee_amt'];
        $type = strtolower($row['type']);
        
    }
    
    
}


//get agent fees

$sql_agent_fees = "SELECT * FROM `agent_commission`";

$result_agent_fees = mysqli_query($mysqli, $sql_agent_fees);

if($result_agent_fees->num_rows > 0){
    while ($row = $result_agent_fees->fetch_assoc()){
        
       $agent_commission = $row['commission'];
        
    }
    
    
}

//get rate for this user
$this_user = $_SESSION['username'];
$sql_rate = "SELECT * FROM `members` WHERE username = '$this_user'";

$result_rate = mysqli_query($mysqli, $sql_rate);

if($result_rate->num_rows > 0){
    while ($row = $result_rate->fetch_assoc()){
        
       $rate = $row['e_rate'];
       $balance = $row['available_balance'];
       $user_email = $row['email'];
       $user_names = $row['First_name']. ' '. $row['Last_name'];
        
    }
    
    
}


if(isset($_POST["withdraw"])) {
    $amount1 = $_POST['amount'];
    $amount = $amount1/$rate;
    $agent = $_POST['agent_number'];
    $date = date('y-m-d: h.m.s');
    $this_user = $_SESSION['username'];
     if($type == 'fixed'){
            $apply_fee = $fee_amt;
            
        }elseif($type == 'percent'){
             $apply_fee = $fee_amt/100*$amount;
        }else{
           $apply_fee = 0; 
        }
    $net_amt = $amount - $apply_fee; // amount sent to client by agent
    $agent_fee = $apply_fee * $agent_commission; // fee payable to agent
    $net_fee = $apply_fee - $agent_fee; //net admin fee
     
}
//does the user have sufficient balance?

if($balance >= $amount){
    


//Check if agent exists
$sql = "SELECT * FROM members where id = '$agent' AND level = 'agent'";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // Agent exists

while ($row = $result->fetch_assoc()){
        
      
       $balance_agent = $row['available_balance'];
       $agent_names = $row['First_name']. ' ' . $row['Last_name'];
       $agent_email = $row['email'];
       
        
}



  //Check if user has sufficient funds  
    

    
    
    
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
`agent_fee`,
`net_admin_fee`,
`net_amt`,
`balance`,
`reference_number`
)  
VALUES  
( 
'$agent', 
'$this_user',
'Withdraw via Agent ($agent)',
'Withdraw',
'$date',
'Completed',
'$amount',
'$apply_fee',
'$agent_fee',
'$net_fee',
'$net_amt',
'-',
'-'
)";
if(mysqli_query($mysqli,$sql)){
    
    //deduct amount from user balance
    $new_bal = $balance - $amount; 
       $sql23 = "UPDATE `members` SET `available_balance` = '$new_bal' WHERE `members`.`username` = '$this_user'";
             if(mysqli_query($mysqli, $sql23)){
                 
                 //now add the funds to agent
                 
                 //recall to add some commission for the good work done
        $amount_to_add_to_agent_balance = $amount - $net_fee;
        $new_agent_balance = $balance_agent +  $amount_to_add_to_agent_balance; 
                  $sql2r = "UPDATE `members` SET `available_balance` = '$new_agent_balance' WHERE `members`.`id` = '$agent'";
             if(mysqli_query($mysqli, $sql2r)){
    
       
   //EMAIL CUSTOMER    
   $no_reply = 'info@binitoo.com';

$username = $user_names;
 $site = 'Binitoo.com';
 $support = 'info@binitoo.com';
 $subject1 = 'Agent withdrawal successful';
 $url = 'https://www.binitoo.com';
 $from = $no_reply;
    $to = $user_email;
    $to_name = $username;
    $names = $site;
    $reply = $support;
    $subject = $subject1;
   
    $html_body = 'Dear '. $to_name. ', <br> Confirmed.<br>You have withdrawan '.$amount1.' from agent number: '.$agent.' ('.$agent_names.')<br>Fee is: '.$apply_fee.'.<br>Kind Regards,<br>Binitoo.com Team.';
    
    $plain_body = 'Dear '. $to_name. ', <br> Confirmed.<br>You have withdrawan '.$amount1.' from agent number: '.$agent.' ('.$agent_names.')<br>Fee is: '.$apply_fee.'.<br>Kind Regards,<br>Binitoo.com Team.';
          
    
    
    require_once "mail.php";
   
               
    
     header('location:../account.php?success= Withdrawal via agent was successfull');
             }else{
                 echo mysqli_error($mysqli);
             }
             
             
             
             
             
             }
    
    
   
    
}else{
     echo "Error updating record: " . mysqli_error($mysqli);
   //header('location:account.php?error=error'); 
}
    
}else{
    header('location:../withdrawAgent.php?error= You have entered a wrong agent number.'); 
}    
    
}else{
    header('location:../withdrawAgent.php?error= You do not have sufficient balance to withdraw this amount. Note: You also cannot enter your own agent number.'); 
}   












?>