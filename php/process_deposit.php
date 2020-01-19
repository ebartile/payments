<?php
include "config.inc.php";
include "functions.php";
include "dbconnect.php";
ini_set('display_errors', 0); 
sec_session_start();
if(isset($_POST["deposit"])) {
    $amount = $_POST['amount'];
   $account = $_POST['account'];
    switch ($_POST["deposit_method"]) {
     case $_POST["deposit_method"] == 'BANK':
         
         
         
         
         header('Location: ../banks.php');
         
         
         
         
         
         
         
        exit();
       break;
       
       case $_POST["deposit_method"] == 'Agent':
         
         
         
         
         header('Location: ../agent_deposit.php');
         
         
         
         
         
         
         
        exit();
       break;
       
       
       
       
       case $_POST["deposit_method"] == 'BITCOIN':
           $this_user = $_SESSION['username'];
            $sqluser = "SELECT * FROM invoices ORDER BY id DESC limit 1";
$resultuser = $mysqli->query($sqluser);

if ($resultuser->num_rows > 0) {
    // output data of each row
    while($row = $resultuser->fetch_assoc()){
						$account1 = $row['id'];
						$invoice = $account1 + 1;
						
            
    }
        
    }  else{
        $invoice = 1;
    }
    $date = date('y-m-d h:i:s');
     $sqlinvoice = "INSERT INTO `invoices`
    
( 
`TransTime`,
`raised_by`,
`amount`,
`payment_status`
)  
VALUES  
( 
'$date',
'$this_user', 
'$amount',
'Not Paid'
)"; 
    if(mysqli_query($mysqli,$sqlinvoice)){ 
        
        $sqluser = "SELECT * FROM bitcoin_settings";
$resultuser = $mysqli->query($sqluser);

if ($resultuser->num_rows > 0) {
    // output data of each row
    while($row = $resultuser->fetch_assoc()){
						$api_key = $row['api_key'];
						$secret = $row['secret'];
						$xpub = $row['xpub'];
						$call_back_url = $row['call_back_url'];
						
            
    }
         $secret = $secret;

$my_xpub = $xpub;
$my_api_key = $api_key;
if($my_xpub == ''){
    header('location:../deposit.php?error=Xpub error. Contact admin');
}elseif($my_api_key ==''){
     header('location:../deposit.php?error=API key error. Contact admin');
}elseif($secret ==''){
    header('location:../deposit.php?error=API Secret error. Contact admin');

}elseif($secret ==''){
    header('location:../deposit.php?error=API Secret error. Contact admin');
}
$my_callback_url = $call_back_url."?invoice=.'$invoice.'&secret='.$secret.'";

$root_url = 'https://api.blockchain.info/v2/receive';

$parameters = 'xpub=' .$my_xpub. '&callback=' .urlencode($my_callback_url). '&key=' .$my_api_key;

$response = file_get_contents($root_url . '?' . $parameters);

$object = json_decode($response);
$address = $object->address;
if($address ==''){
   header('location:../deposit.php?error=Bitcoin Sending Address error. Contact admin'); 
}else{
             
      $sql20 = "UPDATE `invoices` SET `bitcoin_address` = '$address' WHERE `invoices`.`id` = '$invoice'";
             if(mysqli_query($mysqli, $sql20)){
                    header("location:../bitcoin.php?amount=$amount&address=$address&invoice=$invoice&secret=$secret");
               
                    } else {
                       
                    echo "Error updating record: " . mysqli_error($mysqli);
   } 
        

    }} }     
        exit();
       break;
       
        case $_POST["deposit_method"] == 'MPESA':
         header("location:../mpesa.php?amount=$amount");
        exit();
       break;
       
        case $_POST["deposit_method"] == 'CARD':
         header("location:../card.php?amount=$amount");
        exit();
       break;
       
       //could be simplify Mastercard
       
       case $_POST["deposit_method"] == 'CC':
           
         header("location:../cc.php?amount=$amount");
        exit();
       break;
       
       //could be paypal
       case $_POST["deposit_method"] == 'PAYPAL':
           
         header("location:../paypal.php?amount=$amount");
        exit();
       break;
       //could be self Credit cards
       case $_POST["deposit_method"] == 'DB':
           
         header("location:../db.php?amount=$amount");
        exit();
       break;
       
       //could be self Credit cards
       case $_POST["deposit_method"] == 'STRIPE':
           
         header("location:../stripe.php?amount=$amount");
        exit();
       break;
       
       
        //could be offline Mobile Payment methods
       case $_POST["deposit_method"] == 'offlineMOBI':
           
         header("location:../offlineMOBI.php?amount=$amount");
        exit();
       break;
       //method not installed
     default:
         header('Location: ../deposit.php?error= This method is not Installed.');
        exit();
    }
   
   
    
}
else{
    
    header('Location: ../deposit.php?error=error1');
        exit();
}







?>