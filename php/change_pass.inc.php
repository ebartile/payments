<?php
include_once 'dbconnect.php';
include_once 'config.inc.php';
include_once 'functions.php';

$error_msg = "";

if (isset($_POST['reset'])){
    $user_email = $_POST['email'];

    //Now can insert this password retrieval request
$sql = "SELECT * FROM members where email = '$user_email'";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
						$email = $row['email'];
						$username = $row['username'];
						$retrieval_code = (rand(22222, 9999));
						$fname = $row['First_name'];
						$lname = $row['Last_name'];
						$fullnames = 	$fname . ' ' .$lname;
						$date_retrieved = date('Y-m-d H:i:s');
						$expiry = date("Y-m-d H:i:s", strtotime('+2 hours'));
						$phone = $row['phone'];
    }    
            
     //insert the user retrieval attempt
      $sql2 = "INSERT INTO `password_retrievals`
( 
`username`,
`email`,
`retrieval_code`,
`date_retrieved`,
`code_expiry`,
`status`
)  
VALUES  
( 
'$username', 
'$email',
'$retrieval_code',
'$date_retrieved',
'$expiry',
'Not Used'
)";
if(mysqli_query($mysqli,$sql2)){
    
    $from = 'info@binitoo.com';
    $to = $email;
    $to_name = $fullnames;
    $names = "Binitoo Cash";
    $reply = 'info@binitoo.com';
    $subject = 'Retrieving your Password';
    $html_body = 'Dear '. $fullnames. ',<br>This is your activation Code: ' . $retrieval_code . ' <br>You MUST enter it where needed within 2 hours before it expires. <br> Kind Regards,<br>Binitoo.com Team.'; 
    $plain_body = 'Dear '. $fullnames. ', This is your activation Code: ' . $retrieval_code . ' You MUST enter it where needed within 2 hours before it expires. Kind Regards, <br> Binitoo.com Team.'; 
    
    if($phone == ''){
         require_once "mail.php";
          header('location:../forgot_pass_code.php?success=We have emailed you a link to retreive your password. Click it within 2 hours to continue with password reset process.');
    }else{
   
    
    //sms the code
    $sms = 'Here is your AssistApp.co.ke retrieval code: '. $retrieval_code;
    //require_once "../sms/send.php";
    header('location:../forgot_pass_code.php?success= We have sent an EMAIL with a retrieval Code. Enter it below within 2 hours to proceed with password reset process.');
    }
    
}else{
    echo "Error updating record: " . mysqli_error($mysqli);
}
  

    }else{
    header('location:../forgot.php?error=This email is not registered on Binitoo');
}





}elseif(isset($_POST["final"])) { 
    $code = $_POST['code'];
    $email2 = $_POST['email'];
$sqluser = "SELECT * FROM password_retrievals where retrieval_code = '$code' AND email = '$email2'";
$resultuser = $mysqli->query($sqluser);

if ($resultuser->num_rows > 0) {
    // output data of each row
    while($row = $resultuser->fetch_assoc()) {
						$email = $row['email'];
						$status= $row['status'];
						$username = $row['username'];
						$date_retrieved = $row['date_retrieved'];
						$expiry = $row['code_expiry'];
						$date_now = date('Y-m-d H:i:s');
						$time_lapsed = abs(strtotime($date_now) - strtotime($expiry));
    }    
 if(strtotime($date_now) < strtotime($expiry) && $status =='Not Used' && $email =$email2){       
     //Update password retrievals to Retrieval Accepted
       $sql20 = "UPDATE `password_retrievals` SET `status` = 'Retrieval Accepted' WHERE `password_retrievals`.`retrieval_code` = '$code'";
             if(mysqli_query($mysqli, $sql20)){
                 if(sec_session_start() == true){
                      
                  header('location:../change_pass.php?success=You may now change your password.');
                    }else{
                            
                  header('location:../change_pass.php?error=A problem occurred. Please contact support on info@assistapp.co.ke');
                    }
               
                    } else {
                       
                    echo "Error updating record: " . mysqli_error($mysqli);
   } 
 }else{
     //Code is expired
     header('location:../forgot.php?error=Code was expired. Start the password reset process again and complete it within one hour.');
 }
}else{
    //Code is wrong
    header('location:../forgot_pass_code.php?error=Invalid retrieval code. Try again or start the process again.');



}

}else{
    header('location:../forgot.php');
}
    
    
    

?>