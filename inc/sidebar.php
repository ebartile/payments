  <?php
if(login_check($mysqli) == true){
$sql = "SELECT SUM(available_balance) as Balance, SUM(pending_balance) as Balance2 FROM members";
$result = $mysqli->query($sql);
    while($row = $result->fetch_assoc()) {
        
 
      $available_balance = $row['Balance'];
      $pending_balance = $row['Balance2'];
      
      if ( intval($available_balance) == $available_balance ) {
        $bal = number_format($available_balance, 0, ".", ",");
    }
    else {
        $bal = number_format($available_balance, 2, ".", ",");
        /*
        If you don't want to remove trailing zeros from decimals,
        eg. 19.90 to become: 19.9, remove the next line
        */
      
    }
     if ( intval($pending_balance) == $pending_balance ) {
        $bal2 = number_format($pending_balance, 0, ".", ",");
    }
    else {
        $bal2 = number_format($pending_balance, 2, ".", ",");
        /*
        If you don't want to remove trailing zeros from decimals,
        eg. 19.90 to become: 19.9, remove the next line
        */
      
    } 
    }}
    $this_user = $_SESSION['username'];
  $sql_22 = "SELECT available_balance, pending_balance FROM members WHERE username ='$this_user'";
$result_22 = $mysqli->query($sql_22);
    while($row = $result_22->fetch_assoc()) {
        
 
      $available_balance22 = $row['available_balance'] * $rate;
      $pending_balance22 = $row['pending_balance'] * $rate;
      
      if ( intval($available_balance22) == $available_balance22 ) {
        $bal = number_format($available_balance22, 0, ".", ",");
    }
    else {
        $bal = number_format($available_balance22, 2, ".", ",");
        /*
        If you don't want to remove trailing zeros from decimals,
        eg. 19.90 to become: 19.9, remove the next line
        */
      
    }
     if ( intval($pending_balance22) == $pending_balance22 ) {
        $bal2 = number_format($pending_balance22, 0, ".", ",");
    }
    else {
        $bal2 = number_format($pending_balance22, 2, ".", ",");
        /*
        If you don't want to remove trailing zeros from decimals,
        eg. 19.90 to become: 19.9, remove the next line
        */
      
    } }  
    
    
    
  $sql = "SELECT level,id FROM members WHERE username='".$_SESSION['username']."'";
$result = $mysqli->query($sql);
    while($row = $result->fetch_assoc()) { 
        
        $level = $row['level'];
        $user_id = $row['id'];
    }
    
   //gateway fees separated from available amounts 
$sql_fees = "SELECT SUM(fee_amt) as fee_total, SUM(agent_fee) as agent_fee, SUM(net_admin_fee) as net_admin_fee FROM transactons";
$result_fees = $mysqli->query($sql_fees);
    while($row = $result_fees->fetch_assoc()) { 
        
        $fee_total = round($row['fee_total'], 2);
        $agent_fee_total = round($row['agent_fee'], 2);
        $admin_fee_total = round($row['net_admin_fee'], 2);
        
        
    }    
    
  //agent fees separated from their amounts
  $this_user = $_SESSION['username'];
  $sql_agent_fees_totals = "SELECT SUM(agent_fee) as agent_fee FROM transactons WHERE recipient_name = '$user_id' || sender_name = '$user_id'";
$result_agent_total_fees = $mysqli->query($sql_agent_fees_totals);
    while($row = $result_agent_total_fees->fetch_assoc()) { 
        
      
        $this_agent_fee_total = $row['agent_fee'] * $rate;
        
       
        
        
    }
?>
<?php

if($level =='admin'){
echo '
<div style="padding:10px; border-radius: 12.5px; box-shadow: 5px 10px gray;">
    <div style="opacity:1;">
  <h4>Total system Balances</h4>
        <hr>
		<p>Available: '.$gateway_currency. ' '. $bal.'
		</p>
		<br>
			<p>Pending: '.$gateway_currency .' '.$bal2.'
		</p>
		
		<br>
			<p>Gross Fees: '.$gateway_currency .' '.$fee_total.'
		</p>
		<br>
			<p>Agent Fees: '.$gateway_currency .' '.$agent_fee_total.'
		</p>
		<br>
			<p>Net admin fees: '.$gateway_currency .' '.$admin_fee_total.'
		</p>
		<hr>
           <h4>Admin 1: User management</h4>
			<ul class="benefits">
			    	<li>
				<a href="AdminUsers.php">Manage Admin users</a>
				</li>
				<li>
				<a href="users.php">Manage users</a>
				</li>
					<li>
				<a href="agents.php">Agents</a>
				</li>
				
			</ul>
			<hr>
			 <h4>Admin 2: Site Settings</h4>
			<ul class="benefits">
			    	<li>
				<a href="GeneralSettings.php">General Site settings</a>
				</li>
				<li>
				<a href="gatewayFees.php">Default gateway fees</a>
				</li>
				<li>
				<a href="countryFees.php">Fees per country</a>
				</li>
				<li>
				<a href="currency_rates.php">Currency rates</a>
				</li>
				
				<li>
				<a href="exchangeRate_fees.php">Exchange rate fees</a>
				</li>
				<li><a href="crons/load_e_rates.php">Update Currency Rates</a></li>
				<li>
				<a href="mailSettings.php">Mailer Params</a>
				</li>
				<li>
					<a href="c2bMpesasettings.php">C2B Mpesa settings</a>
				</li>
				<li>
					<a href="mpesa_b2c_settings.php">B2C Mpesa settings</a>
				</li>
				<li>
					<a href="bitcoinSettings.php">Bitcoin (BlockChain.info) settings</a>
				</li>
					<li>
					<a href="cc_params.php">Credit card Gateway Params</a>
				</li
					<li>
					<a href="content.php">Content Management System</a>
				</li>
			</ul>
			<hr>
			<h4>Admin 3: Transactions </h4>
			<ul class="benefits">
			    	<li>
				<a href="mpesa_transactions.php">Mpesa transactions (Real-time)</a>
				</li>
				<li>
				<a href="bitcoin_transactions.php">Bitcoin Transactions (Real-time)</a>
				</li>
				<a href="pending_deposits.php">Pending deposits (Offline)</a>
				</li>
				<li>
				<a href="pending_withdrawals.php">Pending withdrawal requests (Offline)</a>
				</li>
			
			</ul>
			
			<hr>
			<h4>Admin 4: Payment methods</h4>
			<ul class="benefits">
			    	<li>
				<a href="paymentMethods.php">Payment methods</a>
				</li>
			    	<li>
				<a href="admin_banks.php">Banks</a>
				</li>
				<li><a href="offline_mobi_manager.php">Offline Mobi manager</a></li>
				<li>
				<a href="db_ccs.php">Saved Credit/Debit cards</a>
				</li>
					<li>
				<a href="cards.php">Scratch cards (Vouchers)</a>
				</li>
		
			</ul>
			</div>
			</div>';
			
}elseif($level =='agent'){
    
    
  echo '
<div style="padding:10px; border-radius: 12.5px; box-shadow: 5px 10px gray;">
    <div style="opacity:1;">
  
		<hr>
           <h4>Agent dashboard menu</h4>
			<ul class="benefits">
				<li>
				Total agent balance: '.$member_currency.': '. $available_balance22.' 
				</li>
				Total agent pending balance: '.$member_currency.': '. $pending_balance22.' 
				</li>
				<li>
				Total commission paid: '.$member_currency.': '. $this_agent_fee_total.' 
				</li>
			
			<li>
				<a href="agent.php">Agent services</a>
				</li>
			    	<li>
				<a href="my_agentVouchers.php">My Voucher sales history</a>
				</li>
				
					<li>
				<a href="generatecardVouchers.php">Generate a Voucher</a>
				</li>
				
			</ul>
			<hr>
			 
			</div>
			</div>';  
    
    
}