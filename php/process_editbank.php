<?php
include_once 'dbconnect.php';
include_once 'functions.php';

sec_session_start();
if(isset($_POST['update_bank'])){
    $code = $_POST['code'];
    $active =$_POST['active'];
    $rate = $_POST['rate'];
    $allowed_currency = $_POST['allowed_currency'];
    $swift = $_POST['swift'];
    $account = $_POST['account'];
    $account_names = $_POST['account_names'];
    $allowed_country = $_POST['allowed_country'];
    
$sqlupdate = "UPDATE `banks` SET `active` = '$active', `business_name` = '$account_names', `swift_code` = '$swift',`account_number` = '$account', `allowed_currency` = '$allowed_currency', `conversion_rate` = '$rate', `allowed_country`='$allowed_country' WHERE `banks`.`id` = '$code'";
         if(mysqli_query($mysqli, $sqlupdate)){
                header('Location:../admin_banks.php?success=Bank details updated');
                    } else {
                    echo "Error updating record: " . mysqli_error($mysqli);
   } 
    
}else{
    echo 'POST issue';
}

?>