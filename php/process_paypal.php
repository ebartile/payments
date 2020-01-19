<?php
/**
 * Copyright (C) 2013 peredur.net
 * 
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
include_once '../php/dbconnect.php';
include_once '../php/functions.php';

sec_session_start();

  if (!login_check($mysqli) == true){
        header("Location: login.php");
            }
   
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

 <html>
<head>
<title>Deposit with Bank transfer </title>
 <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<header class="headerlogged">
    <?php if (login_check($mysqli) == true) : ?>
        <?php include "../inc/loggedinheader.php"; ?>
            
        <?php else : ?>
            <?php include "../inc/header.php"; ?>
        <?php endif; ?>
    
</header>
<div class="content">
    <div style="background-color:#fff; width:70%; float:right;height:70%;  border:2px solid gray; border-radius:10px; padding:10px; margin-top:110px;">
    <p>Recent activity <span style="float:right;"><a href="#">More>></a></span></p>
    <ul>
        <li><a href="account.php">Ready to ship</a></li>
        <li><a href="received_activity.php">Payments received</a></li>
        <li><a href="sent_activity.php">Payments sent</a></li>
        <li><a href="activity_fees_balance.php">Activity (Including balance and fees)</a></li>
        
        
        
    </ul>
  
    <div class="">
   <h3>Click confirm to continue and deposit funds to your  PayMents Account using Paypal</h3>
    <?php
    if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
} 
$sql33 = "SELECT * FROM members where username = '".$_SESSION['username']."' DESC LIMIT 1";
$result = $mysqli->query($sql33);

if ($result->num_rows > 0) {
    // output data of each row
    $session = $_SESSION['username'];
    ?>
    
    
 <form action="https://secure.paypal.com/uk/cgi-bin/webscr" method="post" name="paypal" id="paypal">
    <!-- Prepopulate the PayPal checkout page with customer details, -->
    <input type="hidden" name="email" value="<?php echo $row['email']; ?>">

    <!-- We don't need to use _ext-enter anymore to prepopulate pages -->
    <!-- cmd = _xclick will automatically pre populate pages -->
    <!-- More information: https://www.x.com/docs/DOC-1332 -->
    <input type="hidden" name="cmd" value="_xclick" />
    <input type="hidden" name="business" value="tobasudarl@gmail.com" />
    <input type="hidden" name="cbt" value="Return to Vision International" />
    <input type="hidden" name="currency_code" value="USD" />

    <!-- Allow the customer to enter the desired quantity -->
    <input type="hidden" name="quantity" value="1" />
    <input type="hidden" name="item_name" value="Deposit through Paypal" />

    <!-- Custom value you want to send and process back in the IPN -->
    <input type="hidden" name="custom" value="<?php echo $session; ?>" />
    
    <input type="hidden" name="invoice" value="<?php echo $invoice_id ?>" />
    <input type="hidden" name="amount" value="<?php echo $amount; ?>" />
    <input type="hidden" name="return" value="http://<?php echo $_SERVER['SERVER_NAME']?>/shop/paypal/thankyou"/>
    <input type="hidden" name="cancel_return" value="http://<?php echo $_SERVER['SERVER_NAME']?>/shop/paypal/cancelled" />

    <!-- Where to send the PayPal IPN to. -->
    <input type="hidden" name="notify_url" value="http://<?php echo $_SERVER['SERVER_NAME']?>/shop/paypal/process" />
</form>
    
   </div>
  
</div>
    
<!----- we will be adding our main parts of our online gateway here---->

<div style="background-color:#fff; width:23%; float:left;height:40%; border:2px solid gray; border-radius:10px; padding:10px;margin-top:110px;">
    
  <p> Balance                   <span style="float:right;"><a href="#">More>></a></span></p>
  <p style="font-size:16px; color:gray;"> Available</p>
  <!----display balance --->
  
  
 <?php
 include "php/balance.php";
 
 
 ?>
            
 <!----end of display balance --->
  <hr>
 <ul> <li><a href="withdraw_funds.php">Withdraw</a></li> <li><a href="#">Currencies</a></li> </br> </ul>
 
 <li class="invoicebutton"><a href="add_funds.php">Add Funds</a></li>
</div>

<div class="accountinvoice" style="background-color:#fff; width:23%; float:left; clear: left; height:35%; border:2px solid gray; border-radius:10px; padding:10px;margin-top:10px;">
    
  <p> Invoicing                  <span style="float:right;"><a href="#">More>></a></span></p>
  <p style="font-size:16px; color:gray;"> Create and send custom invoices. Your customers can pay you online using their cards or PayMents account.</P>
  <hr>
  <li class="invoicebutton"><a href="create_invoice.php">Create Invoice</a> </li>
</div>




<!---- you can actually type anything here --->

</div>




<footer>
<!----- our footer menu will appear here---->
 <?php
include "inc/footer.php";

?>
</footer>
</body>
<!---- end of our html document---->
</html>