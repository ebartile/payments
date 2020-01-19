<?php
include_once 'dbconnect.php';
include "functions.php";
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
sec_session_start();
$sql_fees = "SELECT `fee_amt`, `type`, `for_type` FROM `default_gateway_fees` WHERE for_type = 'Deposit'";

$result_fees = mysqli_query($mysqli, $sql_fees);

if($result_fees->num_rows > 0){
    while ($row = $result_fees->fetch_assoc()){
        
        $fee_amt = $row['fee_amt'];
        $type = strtolower($row['type']);
        
    }
    
    
}

//get rate for this user
$this_user = $_SESSION['username'];
$sql_rate = "SELECT `member_currency`,`e_rate`, `available_balance` FROM `members` WHERE username = '$this_user'";

$result_rate = mysqli_query($mysqli, $sql_rate);

if($result_rate->num_rows > 0){
    while ($row = $result_rate->fetch_assoc()){
        
       $rate = $row['e_rate'];
       $balance = $row['available_balance'];
        $member_currency = $row['member_currency'];
    }
    
    
}


if(isset($_POST["deposit"])) {
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
    $net_amt = $amount - $apply_fee;
    
}


//Check if agent exists
$sql = "SELECT * FROM members where id = '$agent' AND level = 'agent' AND username !='$this_user'";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // Agent exists

while ($row = $result->fetch_assoc()){
        $agent_names = $row['First_name']. ' ' . $row['Last_name'];
      
       $balance_agent = $row['available_balance'];
        
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
`net_amt`,
`balance`,
`reference_number`
)  
VALUES  
( 
'$this_user', 
'$agent',
'Deposit via Agent ($agent)',
'Deposit',
'$date',
'Pending',
'$amount',
'$apply_fee',
'$net_amt',
'-',
'-'
)";
if(mysqli_query($mysqli,$sql)){
    
   header('location:../account.php?success= Confirmed. Give '. $amount1. ' to '. $agent_names .' and leave the agent premises after you receive a confirmation message and funds are credited to your Binitoo Account.');

    
}else{
     echo "Error updating record: " . mysqli_error($mysqli);
   //header('location:account.php?error=error'); 
}
    
}else{
    header('location:../agent_deposit.php?error= You have entered a wrong agent number. Note: You also cannot enter your own agent number.'); 
}    
    












?>