<?php
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
$no_reply = 'info@binitoo.com';
$email = 'briangurucoder@gmail.com';
$username = 'Brian';
 $site = 'Binitoo.com';
 $support = 'info@binitoo.com';
 $subject1 = 'You have received';
 $url = 'https://www.binitoo.com';
 $from = $no_reply;
    $to = $email;
    $to_name = $username;
    $names = $site;
    $reply = $support;
    $subject = $subject1;
    $voucher_code ='4566763465';
    $html_body = 'Dear '. $to_name. ', <br> Here is your Recharge Voucher.<br>'.$voucher_code.' <br>Kind Regards,<br>Binitoo.com Team.';
    
    $plain_body = 'Dear '. $to_name. ', <br> Here is your Recharge Voucher.<br>'.$voucher_code.' <br>Kind Regards,<br>Binitoo.com Team.';
          
    
    
    require_once "mail.php";


















?>