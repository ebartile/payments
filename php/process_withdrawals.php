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
if(isset($_POST["withdraw"])) {
    $amount1 = $_POST['amount'];
    if($_POST['method_name'] =="BANK"){
 
 
   header('location:../withdrawBank.php');
 
 
//What about withdrawal method is agent?//

} elseif(($_POST['method_name'] =="Agent")){
    
    
   header('location:../withdrawAgent.php?amount='.$amount1);
    
    


 
 
 
 
 
 
 //What about if withdrawal method chosen is Mpesa?
} elseif(($_POST['method_name'] =="MPESA")){
     
     //get current user info
   $sql2 = "SELECT * FROM members where username = '".$_SESSION['username']."'";
$result = $mysqli->query($sql2);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
                        $names = $row['First_name'] . $row['Last_name'];
						$bank_name = $row['bank_name'];
						$swift_code = $row['bank_swift_code'];
						$bank_account_number = $row['bank_account_number'];
						$country1 = $row['country'];
						$country = strtoupper($country1);
						$this_user = $_SESSION['username'];
						$date = date('y-m-d: h.m.s');
						$available_balance = $row['available_balance'];
						$phone = $row['phone'];
						$member_rate = $row['e_rate'];
            $member_currency = $row['member_currency'];
    }     
    
    if($country =='KENYA'){
 $amount = round($amount1/$member_rate, 2);  
 if($amount <= $available_balance) {
    
         
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
'$phone', 
'$this_user',
'Withdraw to Mpesa ($phone)',
'Withdraw',
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
             //send the Mpesa to PartyB at this Juncture
             require_once "../B2C/send.php";
                //header('Location: ../account.php?successw=success9');
                    } else {
                    echo "Error updating record: " . mysqli_error($mysqli);
   } 
        
        
   
}else{
     echo "Error updating record: " . mysqli_error($mysqli);
    //header('Location: ../withdraw.php?error=error1');
        



}}else{
    
    header('location:../edit_profile.php?error=error');
}



 }else{
      header('Location: ../withdraw.php?error=This Mpesa version is not supported in your country');
      //Mpesa is not supported in your country
 }    
     
     
     
 }else{
   header('Location: ../withdraw.php?error=User not found');
   
 }
     
} elseif(($_POST['method_name'] =="offlineMOBI")){
 //if it is offline     
  $sql2 = "SELECT * FROM members where username = '".$_SESSION['username']."'";
$result = $mysqli->query($sql2);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
                        $names = $row['First_name'] . $row['Last_name'];
						$bank_name = $row['bank_name'];
						$swift_code = $row['bank_swift_code'];
						$bank_account_number = $row['bank_account_number'];
						$country1 = $row['country'];
						$country = strtoupper($country1);
						$this_user = $_SESSION['username'];
						$date = date('y-m-d: h.m.s');
						$available_balance = $row['available_balance'];
						$phone = $row['phone'];
						$member_rate = $row['e_rate'];
            $member_currency = $row['member_currency'];
    }  
    
    $amount = round($amount1/$member_rate, 2);  
 if($amount <= $available_balance) {
    
         
         if($type == 'fixed'){
            $apply_fee = $fee_amt;
            
        }elseif($type == 'percent'){
             $apply_fee = $fee_amt/100*$amount;
        }else{
           $apply_fee = 0; 
        }
    $net_amt = $amount - $apply_fee;

 header('location:../withdraw_MOBI_offline.php?amount='.$amount1.''); 
  
    
    
}else{
  header('location:../withdraw_MOBI_offline.php?error=No enough funds&amount='.$amount1);   
}  
    
}else{
    echo 'User not found';
} 




}else{
    header('location:../withdraw.php?amount='.$amount1.'&error=Method not installed or configured');
}
}
?>