<?php
include_once 'dbconnect.php';
include "functions.php";
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
sec_session_start();
if(isset($_POST["save"])) {
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
 $account_type = $_POST['account_type'];
  $bank_name = $_POST['bank_name'];
  $swift_code = $_POST['swift_code'];
  $acc_number = $_POST['acc_number'];
  $country = $_POST['country'];
  $phone = $_POST['phone'];
  $this_user = $_SESSION['username'];
}
 $sqlupdate = "UPDATE `members` SET `First_name` = '$first_name', `Last_name` = '$last_name',`phone` = '$phone', `level` = '$account_type', `bank_name` = '$bank_name', `bank_swift_code` = '$swift_code', `bank_account_number` = '$acc_number',`country` = '$country' WHERE `members`.`username` = '$this_user'";
         if(mysqli_query($mysqli, $sqlupdate)){
                header('Location: ../profile.php?success=Profile updated successfully.');
                    } else {
                    echo "Error updating record: " . mysqli_error($mysqli);
   } 
?>