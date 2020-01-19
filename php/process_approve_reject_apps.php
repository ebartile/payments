<?php
include_once 'dbconnect.php';
include "functions.php";
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
sec_session_start();
if(isset($_POST["approve"])) {
$appid = $_POST['appid'];
$owner = $_POST['owner'];
$appname = $_POST['appname'];
$status = 'Approved';
$this_user = $_SESSION['username'];
$date = date('y-m-d: h.i.s');
$consumer_secret = $appname . $owner;
$key = base64_encode($appname);
$secret = base64_encode($consumer_secret);

    $sql20 = "UPDATE `apps` SET `status` = 'Approved',`issued_on` = '$date',`expires_on` = 'Never', `consumer_key` = '$key',`consumer_secret` = '$secret' WHERE `apps`.`appd_id` = '$appid'";
             if(mysqli_query($mysqli, $sql20)){
                   header('location:../apps.php?success=This app has been approved successfully.');
               
                    } else {
                       
                    echo "Error updating record: " . mysqli_error($mysqli);
   } 

}else{
    $appid = $_POST['appid'];
    $sql20 = "UPDATE `apps` SET `status` = 'Rejected' WHERE `apps`.`appd_id` = '$appid'";
             if(mysqli_query($mysqli, $sql20)){
                   header('location:../apps.php?success=This app has been Rejected and deactivated successfully.');
               
                    } else {
                       
                    echo "Error updating record: " . mysqli_error($mysqli);
   }  
}
?>