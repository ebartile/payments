<?php
include_once 'dbconnect.php';
include "functions.php";
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
sec_session_start();
$sql_fees = "SELECT `fee_amt`, `type`, `for_type` FROM `default_gateway_fees` WHERE for_type = 'Withdraw via mobile money'";

$result_fees = mysqli_query($mysqli, $sql_fees);

if($result_fees->num_rows > 0){
    while ($row = $result_fees->fetch_assoc()){
        
        $fee_amt = $row['fee_amt'];
        $type = strtolower($row['type']);
        
    }
    
    
}
if(isset($_POST['withdraw'])){
    $amount = $_POST['amount'];
    $mobi = $_POST['MOBI'];
    $phone = $_POST['phone'];
$sql2 = "SELECT * FROM members where username = '".$_SESSION['username']."'";
$result = $mysqli->query($sql2);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
                        $names = $row['First_name'] . $row['Last_name'];
						$bank_name = $row['bank_name'];
						$swift_code = $row['bank_swift_code'];
						$bank_account_number = $row['bank_account_number'];
						$country = $row['country'];
						$this_user = $_SESSION['username'];
						$date = date('y-m-d: h.m.s');
						$available_balance = $row['available_balance'];
						if($type == 'fixed'){
            $apply_fee = $fee_amt;
            
        }elseif($type == 'fixed'){
             $apply_fee = $fee_amt/100*$amount;
        }else{
           $apply_fee = 0; 
        }
    $net_amt = $amount - $apply_fee;
    }     
 if($amount <= $available_balance) {
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
'$mobi', 
'$this_user',
'Withdraw to $mobi ($phone)',
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
    header('Location: ../account.php?error=You do not have sufficient funds to withdraw this amount');
}
    
    
    
}else{
   header('Location: ../login.php?error=Please login first before you withdraw.'); 
}
    
    
    
}else{
     header('Location: ../withdraw_MOBI_offline.php?error=Withdrawal form error$amount='.$amount.'');
}
?>