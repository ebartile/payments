<?php
include_once 'dbconnect.php';
include_once 'functions.php';

sec_session_start();
if(isset($_POST['update_MOBI'])){
    $code = $_POST['code'];
    $allowed =$_POST['allowed'];
    $rate = $_POST['rate'];
    $allowed_currency = $_POST['allowed_currency'];
    $mobile = $_POST['mobi_number'];
    $allowed_country = $_POST['allowed_country'];
    
$sqlupdate = "UPDATE `offline_MOBI` SET `allowed` = '$allowed', `e_rate` = '$rate', `currency` = '$allowed_currency', `mobi_number` = '$mobile', `allowed_country`='$allowed_country' WHERE `offline_MOBI`.`id` = '$code'";
         if(mysqli_query($mysqli, $sqlupdate)){
                header('Location:../offline_mobi_manager.php?successw=Mobil payment details updated');
                    } else {
                    echo "Error updating record: " . mysqli_error($mysqli);
   } 
    
}else{
    echo 'POST issue';
}

?>