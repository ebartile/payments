<?php
include_once 'php/dbconnect.php';
include_once 'php/functions.php';

sec_session_start();

  if (!login_check($mysqli) == true){
        header("Location: login.php");
            }
            $this_user = $_SESSION['username'];
 $result = $mysqli->query("select * from members WHERE username = '$this_user'");
        while ($row = $result->fetch_assoc()) {
           
            $first_name = $row['First_name'];
            $last_name= $row['Last_name'];
            $phone = $row['phone'];
            $level = $row['level'];
            $bank_name = $row['bank_name'];
            $swift = $row['bank_swift_code'];
            $acc = $row['bank_account_number'];
            $country = $row['country'];
            $available_balance = $row['available_balance'];
            $member_rate = $row['e_rate'];
            $member_currency = $row['member_currency'];
        }           
     if($first_name ==='' || $last_name ==='' || $phone ==='' || $level ==='' | $bank_name ==='' || $swift ==='' || $acc ==='' || $country ===''){
         header('location:edit_profile.php?error=error');
     } 
  if(isset($_POST['generate'])){
      
      $contact = $_POST['contact'];
      $amount1 = $_POST['amount'];
      
      $amount = round($amount1/$member_rate, 2);
      
      
      
      
							$sql2 = "SELECT * FROM agent_commission WHERE id = 1";
							$result2 = $mysqli->query($sql2);
    while($row = $result2->fetch_assoc()) {  
           $commission = $row['commission'];
           $commission_amt = $commission/100 * $amount;
           
            $admin_commission = $row['admin_commission'];
          $admin_profit_from_agent_commission = $commission_amt * $commission_amt/100; 
           $deduct = $amount -  $commission_amt;
           $profit = $deduct - $admin_profit_from_agent_commission;
          $min = $row['min_amt'];
          $max = $row['max_amt'];
          $max_amt = round($max * $member_rate, 2);
          $min_amt = round($min * $member_rate, 2);
         
    }
   if($amount > $max) {
      header('location:generatecardVouchers.php?error=Amount should never exceed '. $member_currency. ' '. $max_amt);  
   }elseif($amount < $min ){
        header('location:generatecardVouchers.php?error=Only enter amount equal or above '. $member_currency. ' '.$min_amt);
   }else{
    if($available_balance < $amount){
    
      header('location:generatecardVouchers.php?error=You do not have sufficient funds to sell this value of voucher.');
      
  }else{
      
      //Reduce member balance
      $amount_to_reduce = $amount + $admin_profit_from_agent_commission;
      $bal = $available_balance - $amount_to_reduce;
      $sql_balance ="UPDATE `members` SET `available_balance`= '$bal' WHERE username = '$this_user'";
      
      if(mysqli_query($mysqli, $sql_balance)){
          
      
      $voucher_code = rand(1000000000,9999999999); 
      
      $sql_add="INSERT INTO `scratch_scan_cards`(`generated_by`, `card_code`, `value_in_dollars`, `sold_at`,`admin_fee`,`status`) VALUES ('$this_user','$voucher_code','$amount','$deduct','$admin_profit_from_agent_commission','valid')";
      
      if(mysqli_query($mysqli, $sql_add)){
          
          //Email this Voucher
          	$sql_email = "SELECT * FROM members WHERE phone = '$contact'";
			$result_email = $mysqli->query($sql_email);
        while ($row = $result_email->fetch_assoc()) {
           
            $email = $row['email'];
            $name = $row['First_name'];
            
        $from = 'support@binitoo.com';
    $to = $email;
    $to_name = $name;
    $names = 'Binitoo.com';
    $reply = 'support@binitoo.com';
    $subject = 'Recharge Voucher';
    $html_body = 'Dear '. $to_name. ', <br> Here is your Recharge Voucher.<br>'.$voucher_code.' <br>Value: '.$amount1.' <br>Kind Regards,<br>Binitoo.com Team.';
    
    $plain_body = 'Dear '. $to_name. ', <br> Here is your Recharge Voucher.<br>'.$voucher_code.' <br>Value: '.$amount1.'<br>Kind Regards,<br>Binitoo.com Team.';
          require_once 'php/mail.php';
          
        }
          header('location:my_agentVouchers.php?success=Card Voucher successfully sent to the customer.');
      }else{
           header('location:my_agentVouchers.php?error=Error in voucher issuing.' . mysqli_error($mysqli));
      }
      }else{
           header('location:my_agentVouchers.php?error=Error in voucher issuing.' . mysqli_error($mysqli));
      }
  } 
      
      
      
   }   
      
  }
?>
