<?php
include_once 'dbconnect.php';
include_once 'config.inc.php';

$error_msg = "";

if (isset($_POST['username'], $_POST['email'], $_POST['p'])) {
    // Sanitize and validate the data passed in
    $country = filter_input(INPUT_POST, 'Country', FILTER_SANITIZE_STRING);
    $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING);
    $fname = filter_input(INPUT_POST, 'FirstName', FILTER_SANITIZE_STRING);
    $lname = filter_input(INPUT_POST, 'LastName', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    
    $sql_currency = "SELECT * FROM `currency` WHERE country = '$country'";

$result_currency = mysqli_query($mysqli, $sql_currency);

if($result_currency->num_rows > 0){
    while ($row = $result_currency->fetch_assoc()){
        
       $currency_code = $row['code'];
       $symbol = $row['symbol'];
        $currency = $row['currency'];
        $e_rate = $row['e_rate'];
    }
    
    
}else{
     $currency_code = 'USD';
       $symbol = '$';
        $currency = 'Dollars';
        $e_rate = 1;
}
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Not a valid email
        $error_msg .= '<p class="error">The email address you entered is not valid</p>';
    }
    
    $password = filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING);
    if (strlen($password) != 128) {
        // The hashed pwd should be 128 characters long.
        // If it's not, something really odd has happened
        $error_msg .= '<p class="error">Invalid password configuration.</p>';
    }

    // Username validity and password validity have been checked client side.
    // This should should be adequate as nobody gains any advantage from
    // breaking these rules.
    //
    
    $prep_stmt = "SELECT id FROM members WHERE email = ? || username = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);
    
    if ($stmt) {
        $stmt->bind_param('ss', $email, $username);
        $stmt->execute();
        $stmt->store_result();
        
        if ($stmt->num_rows == 1) {
           
            $error_msg .= '<p style="background-color:yellow;" class="error">A user with this email address already exists.</p>';
             header('location:register.php?error=This username and/or email address is already registered here.');
        }
    } else {
        $error_msg .= '<p class="error">Database error</p>';
    }
    
    // TODO: 
    // We'll also have to account for the situation where the user doesn't have
    // rights to do registration, by checking what type of user is attempting to
    // perform the operation.

    if (empty($error_msg)) {
        // Create a random salt
        $random_salt = hash('sha512', uniqid(openssl_random_pseudo_bytes(16), TRUE));

        // Create salted password 
        $password = hash('sha512', $password . $random_salt);

        // Insert the new user into the database 
        if ($insert_stmt = $mysqli->prepare("INSERT INTO members (First_name, Last_name, country, level, member_currency, member_currency_symbol,e_rate, username, email, password, salt) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)")) {
            $insert_stmt->bind_param('sssssssssss', $fname, $lname, $country, $type,$currency_code, $symbol, $e_rate, $username, $email, $password, $random_salt);
            // Execute the prepared query.
            if (!$insert_stmt->execute()) {
                header('Location: ../error.php?err=Registration failure: INSERT'.mysqli_error($mysqli));
                exit();
            }
        }
       header('Location:login.php?success=Registration successful. You may now login');
       //email user here
       
       //get emailing parameters
       $sqluser = "SELECT * FROM mailer_params where id = 1";
$resultuser = $mysqli->query($sqluser);

if ($resultuser->num_rows > 0) {
    // output data of each row
    while($row = $resultuser->fetch_assoc()) {
						$support = $row['support_email'];
						$site = $row['site_name'];
						$no_reply = $row['no_replt'];
						$url =$row['site_url'];
						$subject1= $row['mailer_subject'];
						
						
						
    }}
       
        $from = $no_reply;
    $to = $email;
    $to_name = $username;
    $names = $site;
    $reply = $support;
    $subject = $subject1;
    $html_body = 'Dear '. $to_name. ', <br> Your registration was successful.<br> Follow this link to login: <br>'.$url.'/login.php.<br>Kind Regards,<br>Binitoo.com Team.'; 
    $plain_body = 'Dear '. $to_name. ', <br> Your registration was successful.<br> Follow this link to login: <br>'.$url.'/login.php.<br>Kind Regards,<br>Binitoo.com Team.';
    
    require_once "mail.php";
       
        exit();
    }
}

?>