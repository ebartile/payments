<?php
include_once 'dbconnect.php';
include_once 'functions.php';

sec_session_start();
if(isset($_POST['submitcard'])){
    $code = $_POST['code'];
    $value = $_POST['value'];
    
     $sql = "INSERT INTO `scratch_scan_cards`
( 
`card_code`,
`value_in_dollars`,
`status`
)  
VALUES  
( 
'$code', 
'$value',
'valid'
)";

         if(mysqli_query($mysqli, $sql)){
                header('Location:../cards.php?successw=A new scratch card has been added');
                    } else {
                    echo "Error updating record: " . mysqli_error($mysqli);
   } 
    
}else{
    echo 'POST issue';
}

?>