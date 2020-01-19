<?php
include_once 'dbconnect.php';
include_once 'functions.php';

sec_session_start();
if(isset($_POST['update_method'])){
    $code = $_POST['code'];
    $rate = $_POST['rate'];
    $allowed_currency = $_POST['allowed_currency'];
    $deposit_fee = $_POST['deposit_fee'];
    $withdraw_fee = $_POST['withdraw_fee'];
    $active = $_POST['active'];
    $deposit = $_POST['deposit'];
    $withdraw = $_POST['withdraw'];
    $allowed_country = $_POST['allowed_country'];

    $sqlupdate = "UPDATE `payment_methods` SET `allowed` = '$active', `deposit_method` = '$deposit',`withdrawal_method` = '$withdraw', `allowed_currency` = '$allowed_currency', `conversion_rate` = '$rate', `deposit_fee` = '$deposit_fee', `withdrawal_fee` = '$withdraw_fee', `allowed_country` = '$allowed_country' WHERE `payment_methods`.`method_id` = '$code'";
         if(mysqli_query($mysqli, $sqlupdate)){
                header('Location:../paymentMethods.php?success=Payment method details updated');
                    } else {
                    echo "Error updating record: " . mysqli_error($mysqli);
   } 
    
}else{
    echo 'POST issue';
}

?>