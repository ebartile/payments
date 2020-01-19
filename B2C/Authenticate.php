<?php
require_once '../php/dbconnect.php';
require_once "../php/functions.php";
require_once "MpesaApi.php";
//select to get Daraja B2C app parameters
$sql2 = "SELECT * FROM mpesa_b2c_settings where id = 1";
$result = $mysqli->query($sql2);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
                        $key = $row['consumer_key'];
                        $secret = $row['consumer_secret'];
                        $shortcode = $row['paybill_number'];
                         
    } }  

use Edwinmugendi\Sapamapay\MpesaApi;

$mpesa_api = new MpesaApi();

$configs = array(
    'AccessToken' => 'ARKUjJdeFL4EGlF4RjF7c5K1GtOp',
    'Environment' => 'live',
    'Content-Type' => 'application/json',
);

//$api = 'c2b_register_url';
//$api = 'account_balance';
//$api = 'stk_push';
//$api = 'generate_token';

//$api = 'c2b_simulate';
$api = 'generate_token';

if ($api == 'c2b_register_url') {//Tested
    $parameters = array(
        'ValidationURL' => 'https://www.epay.me/mpesa/validation.php',
        'ConfirmationURL' => 'https://www.epay.me/mpesa/confirmation.php',
        'ResponseType' => 'Completed',
        'ShortCode' => '693165',
    );
} else if ($api == 'generate_token') {//Tested
    $parameters = array(
        'ConsumerKey' => $key,
        'ConsumerSecret' => $secret,
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
 else if ($api == 'b2c_payment_request') {
    $parameters = array(
        'InitiatorName' => 'GURUMIMI',
        'SecurityCredential' => 'TkNZpjhQ',
        'CommandID' => 'SalaryPayment',
        'Amount' => '10',
        'PartyA' => '981934',
        'PartyB' => '254706745202',
        'Remarks' => 'Remarks',
        'QueueTimeOutURL' => 'https://assistapp.co.ke/b2cpayments.php',
        'ResultURL' => 'https://assistapp.co.ke/b2cResults.php',
        'Occasion' => '12',
    );
 }
//E# if statement
//header("Content-Type:application/json");
$response = $mpesa_api->call($api, $configs, $parameters);
echo 'JSON response: <p>';
$json= json_encode($response);
//echo '<p>Response var_dump:<p>';
var_dump($response);



$array = json_decode($json, true);
 //$logFile = "transaction_status.json";
 // $log = fopen($logFile, "a");
 // fwrite($log, $json);
 // fclose($log);
//print_r($array);


if($array['HttpStatusCode'] == 200){

$token = $array['Response']['access_token']; 
// below this, we want now to process the send money via B2C using the B2C API
  $date = date('ymdhis');
  $sql="INSERT INTO `access_token`(`token`,`date_generated`) VALUES ('$token','$date')";     
       if(mysqli_query($mysqli, $sql)){
           echo 'New token added'. 'Token is:'. $token;
           
       }else{
           echo mysqli_error($mysqli);
       }
  
       
}else{
    echo 'Mpesa Withdrawal Authorization denied.';
}

?>