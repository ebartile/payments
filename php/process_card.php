<?php
include_once 'dbconnect.php';
include "functions.php";
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
sec_session_start();
if(isset($_POST["submit"])) {
    $code = $_POST['code'];
    $date = date('y-m-d: h.m.s');
    $this_user = $_SESSION['username'];
 
$sql2 = "SELECT * FROM scratch_scan_cards where card_code = '$code'";
$result2 = $mysqli->query($sql2);
if ($result2->num_rows > 0){
    while($row = $result2->fetch_assoc()) {
        $value = $row['value_in_dollars'];
        $status= $row['status'];
     
    }
    if($status === 'valid'){
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
'PayMents Scratch card',
'Deposit via Scratch card ($code)',
'Deposit',
'$date',
'Completed',
'$value',
'0',
'$value',
'-',
'$code'
)";
if(mysqli_query($mysqli,$sql)){
    
    $sql3 = "SELECT * FROM members where username = '".$_SESSION['username']."'";
$result3 = $mysqli->query($sql3);
    while($row = $result3->fetch_assoc()) {
      $available_balance = $row['available_balance'];
      $new_bal = $available_balance + $value; 

    
     $sql19 = "UPDATE `members` SET `available_balance` = '$new_bal' WHERE `members`.`username` = '$this_user'";
             if(mysqli_query($mysqli, $sql19)){
                 
                 $sql20 = "UPDATE `scratch_scan_cards` SET `status` = 'Used' WHERE `scratch_scan_cards`.`card_code` = '$code'";
             if(mysqli_query($mysqli, $sql20)){
                   header('location:../account.php?success=Deposit via scratch card is successful.');
               
                    } else {
                       
                    //echo "Error updating record: " . mysqli_error($mysqli);
   } 
   
   
               
                    } else {
                    echo "Error updating record: " . mysqli_error($mysqli);
   } 
    
    }  
    
}else{
     echo "Error Inserting record: " . mysqli_error($mysqli);
   //header('location:account.php?error=error'); 
}
      
    
    }elseif($status ==='Used'){
        
        header('location:../card.php?error=This card is already used.');
        
    }else{
  header('location:../card.php?error2=error2');


}



}else{
    header('location:../card.php?error=Card is invalid');
}

}else{
    echo 'Problem with form';
}

?>