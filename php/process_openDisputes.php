<?php
include "config.inc.php";
include "functions.php";
include "dbconnect.php";
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
sec_session_start(); 
if(isset($_POST['save'])){
    $transaction_code = $_POST['transaction_id'];
    $date = date('y-m-d: h.m.s');
    $recipient_name = $_POST['claim_against_who'];
    $message = $_POST['message'];
    $this_user = $_SESSION['username'];
  $sql = "INSERT INTO `disputes`
( 
`date`,
`transaction_code`,
`complainant`,
`claim_against_who`,
`status`
)  
VALUES  
( 
'$date', 
'$transaction_code',
'$this_user',
'$recipient_name',
'Open'
)";  
if(mysqli_query($mysqli,$sql)){ 
 $sql3 = "SELECT * FROM disputes";
$result3 = $mysqli->query($sql3);
    while($row = $result3->fetch_assoc()) {
$dispute_id = $row['dispute_id'];
$new_disputeID = $dispute_id + 1;
    }
 
 
   $sql2 = "INSERT INTO `dispute_messages`
( 
`date`,
`dispute_id`,
`message`,
`transaction_code`,
`sender`,
`recipient`
)  
VALUES  
( 
'$date',
'$dispute_id',
'$message',
'$transaction_code',
'$this_user',
'$recipient_name'
)";   
  if(mysqli_query($mysqli,$sql2)){  
      
       $sql20 = "UPDATE `transactons` SET `status` = 'On HOLD' WHERE `transactons`.`transaction_id` = '$transaction_code'";
             if(mysqli_query($mysqli, $sql20)){
                   header('location:../resolution_center.php?success7=success7');
               
                    } else {
                       
                    echo "Error updating record: " . mysqli_error($mysqli);
   } 
      
  }else{
    echo "Error updating record: " . mysqli_error($mysqli);
  }
 
}else{
    echo "Error updating record: " . mysqli_error($mysqli);
}
    
    
    
}else{
    
    
echo 'Problem with form';
}
























?>