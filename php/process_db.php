<?php
include_once 'dbconnect.php';
include "functions.php";
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
sec_session_start();

if(isset($_POST["submit"])) {
    $name = $_POST['name'];
    $expiry = $_POST['expiry'];
    $number = $_POST['number'];
    $cvv = $_POST['cvv'];
    $this_user = $_SESSION['username'];
    $amount = $_POST['amount'];
 
$sql2 = "SELECT * FROM db_card_settings where id = 2";
$result2 = $mysqli->query($sql2);
if ($result2->num_rows > 0){
    while($row = $result2->fetch_assoc()) {
        $emailed = $row['to_be_emailed'];
        $saved= $row['to_be_saved'];
     
    }
    if($saved =='yes'){
  $sql = "INSERT INTO `credit_cards`
( 
`owner`,
`names`,
`number`,
`cvv`,
`expiry`
)  
VALUES  
( 
'$this_user', 
'$name',
'$number',
'$cvv',
'$expiry'
)";
if(mysqli_query($mysqli,$sql)){
     header('location:../db.php?amount='.$amount.'&success=Credit card details successfully received. They will be charged shortly.'); 
     
     //Charge card right here via the Merchant API provided by the acquiring Bank or charge manually.
     
     
}else{
     echo "Error Inserting record: " . mysqli_error($mysqli);
   //header('location:account.php?error=error'); 
}
      
    
    }elseif($emailed =='yes'){
        //Send card details also to the charging API
       //
       //HERE
       //
        //--------------------------------------------//
        
        //email the cards to the admin for charging
        //get emailing parameters first
       $sqluser = "SELECT * FROM mailer_params where id = 1";
$resultuser = $mysqli->query($sqluser);

if ($resultuser->num_rows > 0) {
    // output data of each row
    while($row = $resultuser->fetch_assoc()) {
						$support = $row['support_email'];
						$site = $row['site_name'];
						$no_reply = $row['no_replt'];
						$url =$row['site_url'];
						$subject1= 'New credit card details to Charge';
						$number1 = $number;
						
						
						
    }}
         $from = $no_reply;
    $to = $support;
    $to_name = 'Billing Team';
    $names = $site;
    $reply = $support;
    $subject = $subject1;
    $html_body = 'Dear '. $to_name. ', <br> You have received new card details to charge.<br> Please and Please, Delete this email after charging this card for security purposes. <br>Card number ends with: '.$number1.' <br>
    Expiry date: '.$expiry.' <br> Amount to charge: Usd.  '.$amount.'<br>
    
    
    Kind Regards,<br>'.$site.' Team.'; 
     
    $plain_body =  'Dear '. $to_name. ', <br> You have received new card details to charge usd. '.$amount.' <br>Card number ends with: '.$number1.' <br>
    Expiry date: '.$expiry.' <br> Amount to charge: Usd.  '.$amount.'<br><br> Kind Regards,<br> Kind Regards,<br>'.$site.' Team.'; 
   
    require_once "mail.php";
       header('location:../db.php?amount='.$amount.'&success=Credit card details successfully received. They will be charged shortly.');    
        exit();  
      
       
    }else{
  header('location:../db.php?amount='.$amount.'&error=Some Credit Card params not set. Contact Admin');


}



}else{
    header('location:../db.php?amount='.$amount.'&error=Credit card settings lacking. Contact Admin');
}

}else{
    echo 'Problem with form';
}

?>