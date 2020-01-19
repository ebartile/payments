<?php
require_once '../php/dbconnect.php';
require_once "../php/functions.php";
//we need to write some SQL here to get the Mpesa number of the person being paid. Below is a sample Mpesa number

 $select = "select * from access_token ORDER BY id DESC LIMIT 1";
  	$result = mysqli_query($mysqli, $select);
  if(mysqli_num_rows($result) > 0){
   while($row = mysqli_fetch_assoc($result)){
       $token = $row['token'];
       
   }}else{
       header('location:../withdraw.php?error=Crons not running well. Contact admin.');
   }
// Get B2C parameters

 $select2 = "select * from mpesa_b2c_settings WHERE id = 1";
  	$result2 = mysqli_query($mysqli, $select2);
  
   while($row = mysqli_fetch_assoc($result2)){
      $InitiatorName = $row['initiator_name'];
        $SecurityCredential = $row['initiator_pass'];
        
        $CommandID = $row['command_id'];
        $rate = $row['e_rate'];
        $Amount = $amount * $rate;
        $PartyA = $row['paybill_number'];
        $PartyB = $phone;
        $queueTimeurl = $row['queueTimeurl'];
        $ResultURL = $row['ResultURL'];
       
   }
require_once "MpesaApi.php";

use Edwinmugendi\Sapamapay\MpesaApi;

$mpesa_api = new MpesaApi();

$configs = array(
    'AccessToken' => $token,
    'Environment' => 'live',
    'Content-Type' => 'application/json',
);

//$api = 'c2b_register_url';
//$api = 'account_balance';
//$api = 'stk_push';
//$api = 'generate_token';

//$api = 'c2b_simulate';
$api = 'b2c_payment_request';

if ($api == 'c2b_register_url') {//Tested
    $parameters = array(
        'ValidationURL' => 'https://www.assistapp.co.ke/mpesa/validation.php',
        'ConfirmationURL' => 'https://www.assistapp.co.ke/mpesa/confirmation.php',
        'ResponseType' => 'Completed',
        'ShortCode' => '693165',
    );
} else if ($api == 'generate_token') {//Tested
    $parameters = array(
        'ConsumerKey' => 'f5ShSgHkhk9g1olFzpZEAkVyYDP0Cd7A',
        'ConsumerSecret' => 'ZTDaMViCCmyS2AjL',
    );
} else if ($api == 'stk_push') {
    $parameters = array(
        'BusinessShortCode' => '693165',
        'Password' => 'TkNZpjhQ',
        'Timestamp' => '20171010101010',
        'TransactionType' => 'TransactionType',
        'Amount' => '10',
        'PartyA' => '254706745202',
        'PartyB' => '693165',
        'PhoneNumber' => '254706745202',
        'CallBackURL' => 'https://192.241.213.216/stk_push_callback',
        'AccountReference' => '1232',
        'TransactionDesc' => 'TESTING',
    );
} else if ($api == 'stk_query') {
    $parameters = array(
        'BusinessShortCode' => '603013',
        'Password' => 'TkNZpjhQ',
        'Timestamp' => '20171010101010',
        'CheckoutRequestID' => 'ws_co_123456789',
    );
} else if ($api == 'account_balance') {//Tested
    $parameters = array(
        'CommandID' => 'AccountBalance',
        'PartyA' => '693165',
        'IdentifierType' => '4',
        'Remarks' => 'Remarks',
        'Initiator' => 'apiop41',
        'SecurityCredential' => 'TkNZpjhQ',
        'QueueTimeOutURL' => 'https://192.241.213.216/b2c_timeout_url',
        'ResultURL' => 'https://192.241.213.216/b2c_result_url',
    );
} else if ($api == 'b2b_payment_request') {//Tested
    $parameters = array(
        'CommandID' => 'BusinessPayBill',
        'Amount' => '10',
        'PartyA' => '603013',
        'SenderIdentifierType' => '4',
        'PartyB' => '600000',
        'RecieverIdentifierType' => '4',
        'Remarks' => 'Remarks',
        'Initiator' => 'apiop41',
        'SecurityCredential' => 'TkNZpjhQ',
        'QueueTimeOutURL' => 'https://google.com',
        'ResultURL' => 'https://google.com',
        'AccountReference' => '12',
    );
} else if ($api == 'b2c_payment_request') {//Tested
    $parameters = array(
        'InitiatorName' => $InitiatorName,
        'SecurityCredential' => $SecurityCredential,
        'CommandID' => $CommandID,
        'Amount' => $Amount,
        'PartyA' => $PartyA,
        'PartyB' => $PartyB,
        'Remarks' => 'Remarks',
        'QueueTimeOutURL' => $queueTimeurl,
        'ResultURL' => 'B2CResult_url.php',
        'Occasion' => '12',
        
    );
} else if ($api == 'reversal') {//Tested
    $parameters = array(
        'CommandID' => 'TransactionReversal',
        'ReceiverParty' => '254708374149',
        'RecieverIdentifierType' => '1',
        'Remarks' => 'remarks',
        'Initiator' => 'apiop41',
        'SecurityCredential' => 'TkNZpjhQ',
        'QueueTimeOutURL' => 'https://192.241.213.216/b2c_timeout_url',
        'ResultURL' => 'https://192.241.213.216/b2c_result_url',
        'TransactionID' => '11211',
        'Occasion' => '12',
        'Amount' => '10',
    );
} else if ($api == 'transaction_status_request') {//Tested
    $parameters = array(
        'CommandID' => 'TransactionStatusQuery',
        'PartyA' => '254708374149',
        'IdentifierType' => '603013',
        'Remarks' => 'remarks',
        'Initiator' => 'apiop41',
        'SecurityCredential' => 'TkNZpjhQ',
        'QueueTimeOutURL' => 'https://192.241.213.216/b2c_timeout_url',
        'ResultURL' => 'https://192.241.213.216/b2c_result_url',
        'TransactionID' => '11211',
        'Occasion' => '12',
    );
} else if ($api == 'c2b_simulate') {//Tested
    $parameters = array(
        'CommandID' => 'CustomerPayBillOnline',
        'Amount' => '100',
        'Msisdn' => '254706745202',
        'BillRefNumber' => 'TESTING',
        'ShortCode' => '693165',
    );
}

//E# if statement

$response1 = $mpesa_api->call($api, $configs, $parameters);
//echo 'JSON response: <p>';
$response = json_encode($response1);
//echo '<p>Response var_dump:<p>';
//var_dump($response);

$results = json_decode($response, true);
  $response_code= $results['HttpStatusCode'];
  $message = $results['HttpStatusMessage'];
  
  if ($results['HttpStatusCode'] == '200'){
     
      $request_id = $results['Response']['OriginatorConversationID'];
      
      //Check What is happening with this request.
      
      $date = date('ymdhis');
  $sql="INSERT INTO `mpesa_withdrawals`(`request_id`, `time_requested`,`requested_by_username`,`site_registered_phone`,`amount`, `status`) VALUES ('$request_id', '$date','$this_user','$phone','$amount', 'System is reviewing')";     
       if(mysqli_query($mysqli, $sql)){
           header("location:../account.php?success=Your Mpesa withdrawal has been successfully requested. You should receive an Mpesa confirmation message anytime from now.");
           
       }else{
           echo mysqli_error($mysqli);
       }
      
      
      
      
      
  }else{
      header("location:../withdraw.php?error= Mpesa experienced an error. Error message raised is: $message . Contact admin now to solve.");
  }

?>