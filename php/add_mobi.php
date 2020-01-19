<?php
include_once 'dbconnect.php';
include_once 'functions.php';

sec_session_start();
if(isset($_POST['submitcard'])){
    $mobi = $_POST['mobi_name'];
    
    
    $sql = "INSERT INTO `offline_MOBI`
( 
`MOBI_name`,
`value`,
`allowed`
)  
VALUES  
( 
'$mobi', 
'$mobi',
'no'
)";

         if(mysqli_query($mysqli, $sql)){
                header('Location:../offline_mobi_manager.php?successw=A new Bank has been added. You may now edit to supply needed details and activate');
                    } else {
                    echo "Error updating record: " . mysqli_error($mysqli);
   } 
    
}else{
    echo 'POST issue';
}

?>