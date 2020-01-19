<?php
error_reporting(E_ALL); ini_set('display_errors', 1);
include_once 'dbconnect.php';
include_once 'functions.php';

sec_session_start();
//amount=20000&paymentId=B6bAa8KdK&paymentDate=1562678649997&paymentStatus=APPROVED&authCode=fm9KkA&currency=USD&signature=9AB5F1D2CB11792ED7BD280D617978D6&reference=99999

if(isset($_REQUEST['amount']) !== false){
    if(isset($_REQUEST['paymentStatus']) == 'APPROVED'){
        
    $paymentID = $_REQUEST['paymentId'];
    $paymentDate = $_REQUEST['paymentDate'];
    $total = $_REQUEST['amount']/100;
    $this_user = $_SESSION['username'];
    $signature = $_REQUEST['signature'];
    $date = date('y-m-d: h.i.s');
    
   // Let us ensure this is a unique payment to avoid duplication 
      $sql3 = "SELECT * FROM transactons WHERE reference_number = '$signature'";
$result3 = $mysqli->query($sql3);
if(mysqli_num_rows($result3) <= 0){
    //look for $this_user
     $sql2 = "SELECT * FROM members where username = '$this_user'";
$result2 = $mysqli->query($sql2);
    while($row = $result2->fetch_assoc()) {
      $available_balance2 = $row['available_balance'];
      $new_bal2 = $available_balance2 + $total;
    }
    
   $sql22 = "UPDATE `members` SET `available_balance` = '$new_bal2' WHERE `members`.`username` = '$this_user'";
             if(mysqli_query($mysqli, $sql22)){
                 //insert the transaction 
                 
               $sqlME = "INSERT INTO `transactons`
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
'Credit card deposit',
'Deposit via Credit card',
'Deposit',
'$date',
'Completed',
'$total',
'0',
'$total',
'-',
'$signature'
)";
if(mysqli_query($mysqli,$sqlME)){


                 
                 header('location:../account.php?success=Credit card deposit was successful.');
             }else{
                 echo mysqli_error($mysqli);
             }
                 
                 
                 
             }else{
                 header('location:../account.php?error=There was some error. This payment was '. $_REQUEST['paymentStatus']);
             }
    
    
}else{
    header('location:../account.php?error= This transaction was already updated a while ago'); 
}  
        
    }else{
      header('location:../account.php?error=There was some error. This payment was'. $_REQUEST['paymentStatus']);  
    }
    
}else{
    echo 'Issue here';
}

?>