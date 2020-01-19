<?php
include_once 'dbconnect.php';
include_once 'functions.php';

sec_session_start();
if(isset($_POST['submitcard'])){
    $bank = $_POST['bank_name'];
    
    
     $sql = "INSERT INTO `banks`
( 
`bank_name`,
`value`,
`active`
)  
VALUES  
( 
'$bank',
'$bank',
'no'
)";

         if(mysqli_query($mysqli, $sql)){
                header('Location:../admin_banks.php?success=A new Bank has been added. You may now edit to supply needed details and activate');
                    } else {
                    echo "Error updating record: " . mysqli_error($mysqli);
   } 
    
}else{
    echo 'POST issue';
}

?>