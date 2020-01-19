<?php
//header("Content-Type:application/json");
require_once '../php/dbconnect.php';
require_once "../php/functions.php";
  $stkCallbackResponse = file_get_contents("php://input");
 
$array = json_decode($stkCallbackResponse, true);

// $logFile = "stkPushCallbackResponse.json";
 // $log = fopen($logFile, "a");
  //fwrite($log, $stkCallbackResponse);
  //fclose($log);
  
$request_idd = $array['Result']['OriginatorConversationID'];
$code = $array['Result']['ResultCode'];
$payment_id = $array['Result']['TransactionID'];
$message = $array['Result']['ResultDesc'];
 $select1 = "select * from mpesa_withdrawals WHERE request_id ='$request_idd'";
  	$result1 = mysqli_query($mysqli, $select1);
  
if(mysqli_num_rows($result1) > 0){
    
    if($code == 0){
    $date = date('ymdhis');
    $TransactionAmount = $array['Result']['TransactionAmount'];
    
    $sql_update = "UPDATE `mpesa_withdrawal_requests` SET `amount_paid`='$TransactionAmount',`mpesa_code`='$payment_id',`time_paid`='$date',`status`='Completed' WHERE `mpesa_withdrawals`.`request_id` = '$request_idd'";
    if(mysqli_query($mysqli, $sql_update)){
        echo 'Email the admin and user here.';
        
        
        
    }else{
        echo mysqli_error($mysqli);
    }
    
    
    
}else{


    $sql_update = "UPDATE `mpesa_withdrawals` SET `status`= '$message' WHERE `mpesa_withdrawals`.`request_id`='$request_idd'";
    if(mysqli_query($mysqli, $sql_update)){
        echo 'Email the admin and user here.';
        
        
    }else{
         echo mysqli_error($mysqli);
    }
    
    
}
}else{
    echo 'Just ignore';
}
 



?>		