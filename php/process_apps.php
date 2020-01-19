<?php
include_once 'dbconnect.php';
include "functions.php";
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
sec_session_start();
if(isset($_POST["create"])) {
$appName = $_POST['appName'];
$this_user = $_SESSION['username'];
$date = date('0-0-0: 0.0.0');
$key = 'Pending';
$secret = 'Pending';
}
$sqluser = "SELECT * FROM apps where  ap_name = '$appName'";
$resultuser = $mysqli->query($sqluser);
if ($resultuser->num_rows > 0) {
    header('location:../api.php?error=You are not allowed to use this App Name. Choose another one.');
     
}else{
      $sql = "INSERT INTO `apps`
( 
`ap_name`,
`owner`,
`consumer_key`,
`consumer_secret`,
`issued_on`,
`expires_on`,
`status`
)  
VALUES  
( 
'$appName', 
'$this_user',
'$key',
'$secret',
'$date',
'Never',
'Pending'
)";
if(mysqli_query($mysqli,$sql)){    
        header('Location: ../api.php?success=Your App has been created successfully. It will be Approved in 2 to 5 business days.');
}else{
     echo "Error updating record: " . mysqli_error($mysqli);
    //header('Location: ../withdraw.php?error=error1');
        



}
}
    


?>