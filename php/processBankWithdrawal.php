<?php
include_once 'dbconnect.php';
include "functions.php";
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
sec_session_start();




if(isset($_POST['bank_withdraw'])){
    $for_type = strtolower($_POST['type']);
    $amount1 = $_POST['amount'];
    
    $sql_fees = "SELECT `fee_amt`, `type`, `for_type` FROM `default_gateway_fees` WHERE for_type = '$for_type'";

$result_fees = mysqli_query($mysqli, $sql_fees);

if($result_fees->num_rows > 0){
    while ($row = $result_fees->fetch_assoc()){
        
        $fee_amt = $row['fee_amt'];
        $type = strtolower($row['type']);
        
    }
    
    
}else{
    header('location:../withdrawBank.php?error=No such fee type');
}
$sql2 = "SELECT * FROM members where username = '".$_SESSION['username']."'";
$result = $mysqli->query($sql2);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
                        $names = $row['First_name'] . ' ' . $row['Last_name'];
						$first_name = $row['First_name'];
            $last_name= $row['Last_name'];
            $phone = $row['phone'];
            $level = $row['level'];
            $bank_name = $row['bank_name'];
            $swift_code = $row['bank_swift_code'];
             $bank_account_number = $row['bank_account_number'];
            $country = $row['country'];
            $available_balance = $row['available_balance'];
            $member_rate = $row['e_rate'];
            $member_currency = $row['member_currency'];
						$this_user = $_SESSION['username'];
						$date = date('y-m-d: h.m.s');
						 $member_rate = $row['e_rate'];
            $member_currency = $row['member_currency'];
    }     
    
    if($first_name ==='' || $last_name ==='' || $phone ==='' || $level ==='' | $bank_name ==='' || $swift_code ==='' || $bank_account_number ==='' || $country ===''){
         header('location:edit_profile.php?error=error');
     }
     
 $amount = round($amount1/$member_rate, 2);  
 if($amount <= $available_balance) {
     
     if($bank_name !=="" OR $swift_code !=="" OR $bank_account_number !=="" OR $country !==""){
         
         if($type == 'fixed'){
            $apply_fee = $fee_amt;
            
        }elseif($type == 'percent'){
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
`agent_fee`,
`net_admin_fee`,
`net_amt`,
`balance`,
`reference_number`
)  
VALUES  
( 
'$bank_name', 
'$this_user',
'Withdraw via $for_type (<br>Acount names: $names <br>Bank name: $bank_name<br> Acc number: $bank_account_number<br> Swift code: $swift_code <br>Country: $country)',
'Withdraw',
'$date',
'Pending',
'$amount',
'$apply_fee',
'-',
'$apply_fee',
'$net_amt',
'-',
'-'
)";
if(mysqli_query($mysqli,$sql)){    
        $new_bal = $available_balance - $amount;
     $sqlupdate = "UPDATE `members` SET `available_balance` = '$new_bal' WHERE `members`.`username` = '$this_user'";
         if(mysqli_query($mysqli, $sqlupdate)){
                header('Location: ../account.php?success=Withdrawal request has been received and is being processed');
                    } else {
                    echo "Error updating record: " . mysqli_error($mysqli);
   } 
        
        
   
}else{
     echo "Error updating record: " . mysqli_error($mysqli);
    //header('Location: ../withdraw.php?error=error1');
        



}}else{
    
    header('location:../edit_profile.php?error=Please complete your profile to proceed');
}



 }else{
     header('Location: ../withdraw.php?error=You do not have sufficient balance to complete this withdrawal request');
 }    
     
     
     
     
 }else{
     echo 'User not found';
 }






}else{
    header('location:../withdrawBank.php?error=Session expired. Start again.');
}


?>