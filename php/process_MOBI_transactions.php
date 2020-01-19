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




if(isset($_POST["submit"])) {
    $amount = $_POST['amount'];
    $refnum = $_POST['refnum'];
    $MOBI = $_POST['MOBI'];
    $date = date('y-m-d: h.m.s');
    $this_user = $_SESSION['username'];
     if($type == 'fixed'){
            $apply_fee = $fee_amt;
            
        }elseif($type == 'fixed'){
             $apply_fee = $fee_amt/100*$amount;
        }else{
           $apply_fee = 0; 
        }
    $net_amt = $amount - $apply_fee;
    
}
    
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
'$MOBI',
'Deposit via $MOBI',
'Deposit',
'$date',
'Pending',
'$amount',
'$apply_fee',
'$net_amt',
'-',
'$refnum'
)";
if(mysqli_query($mysqli,$sql)){
    
    header('location:../account.php?success=success');
    
}else{
     echo "Error updating record: " . mysqli_error($mysqli);
   //header('location:account.php?error=error'); 
}
    
    
    
    












?>