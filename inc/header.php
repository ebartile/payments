<?php
if(login_check($mysqli) == true){
    
    
    
    $sql_default_currency = "SELECT * FROM site_config where id = 1";
$result23 = $mysqli->query($sql_default_currency);
    while($row = $result23->fetch_assoc()) {
    $gateway_currency = $row['gateway_currency'];
    $gateway_currency_symbol = $row['gateway_currency_symbol'];
    }
    
$sql = "SELECT * FROM members where username = '".$_SESSION['username']."'";
$result = $mysqli->query($sql);
    while($row = $result->fetch_assoc()) {
        
      $member_currency = $row['member_currency'];
      $member_currency_symbol = $row['member_currency_symbol'];
      $available_balance = $row['available_balance'];
      $country = $row['country'];
    
 
    
       $rate = $row['e_rate'];

      $balance = $available_balance * $rate;

     
      if ( intval($balance) == $balance ) {
        $bal = number_format($balance, 0, ".", ",");
    }
    else {
        $bal = number_format($balance, 2, ".", ",");
        /*
        If you don't want to remove trailing zeros from decimals,
        eg. 19.90 to become: 19.9, remove the next line
        */
      
    }
      
    }}
    
   $ip = $_SERVER['REMOTE_ADDR'];
   
   $res = file_get_contents('https://www.iplocate.io/api/lookup/'.$ip.'');
$res = json_decode($res, true);

$country_code= $res['country_code'];
    
    
?> 
 <header class="clear layout-public menufix-"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <div class="title-bar hide-for-medium" data-responsive-toggle="pp-menu">
        <a href="index.php"><img src="images/logo.png" width="150px" height=""></a>
        <a class="button plain dropdown" data-toggle="c-dropdown"> <small><img src="https://www.countryflags.io/<?php echo $country_code; ?>/flat/64.png"><?php echo $country_code; ?></small></a>
   		
		        	<button id="simple-menu">&nbsp;<i class="pe-7s-menu2"></i>&nbsp;</button>
    </div>
		<div class="mobile-bar show-for-small-only">
			<ul class="row collapse">
			   <?php
			   if (!login_check($mysqli) == true){
			       
echo '<li class="column small-6"><a href="login.php" class="pp-loginlink">Login</a></li>
				<li class="column small-6"><a href="register.php" class="pp-registerlink">Register</a></li>
				';
			   }else{
	
			   echo '
			  
			   <li class="column small-6"><a href="#" class="pp-loginlink">'.$member_currency.'. '. '. '.$bal.'</a></li>
			   	<li class="column small-6"><a href="deposit.php" class="pp-registerlink">Deposit</a></li>
			   		<li class="column small-6"><a href="withdraw.php" class="pp-registerlink">Withdraw</a></li>
			   			<li class="column small-6"><a href="send.php" class="pp-registerlink">Send</a></li>
			   				<li class="column small-6"><a href="request.php" class="pp-registerlink">Request</a></li>
				<li class="column small-6"><a href="php/logout.php" class="pp-registerlink">Logout</a></li>
				
				';
				
			   }
			   
			   
			   ?>
			</ul>
		</div>
    <div class="top-bar" id="pp-menu">
        <div id="sidr" class="top-bar-left">
            <ul class="dropdown menu" data-dropdown-menu role="menu">
                <li class="menu-text hide-for-small-only"> <a href="index.php"><img src="images/logo.png" width="150px" height=""></a> </li>
                <li class="country">
                    <a class="button plain dropdown cdrop" data-toggle="country-dropdown"> <span> <img src="https://www.countryflags.io/<?php echo $country_code; ?>/flat/64.png"> <?php echo $country_code; ?></span></a>
                    
                </li>

<li id="item_1240" role="menuitem" class="menuitem home current active"><a href="index.php"><i class="pe-7s-home"></i></a></li>
 <?php
			   if (!login_check($mysqli) == true){
echo '
<li id="item_1317" role="menuitem" class="is-dropdown-submenu-parent opens-right " aria-haspopup="true" aria-label="Business" data-is-click="false">
    <a href="#">Business</a>
    <ul class="menu vertical submenu is-dropdown-submenu first-sub" data-submenu="" role="menu">
		<li id="item_1413_1" role="menuitem" class="show-for-small-only is-submenu-item is-dropdown-submenu-item "><a href="#">Business Account</a></li>
        <li id="item_1413" role="menuitem" class="is-submenu-item is-dropdown-submenu-item "><a href="https://www.binitoo.com/Page.php?code=XlAPCHF526628GSHAJstatic-online-payments/">Online payments</a></li>
		<li id="item_1414" role="menuitem" class="is-submenu-item is-dropdown-submenu-item ">
			<a href="https://www.binitoo.com/Page.php?code=XlAPCHF526628GSHAJstatic-point-of-sale/">Point-of-Sale</a>
			<ul class="menu vertical submenu is-dropdown-submenu" data-submenu="" role="menu">
                <li id="item_1414_1" role="menuitem" class="is-submenu-item is-dropdown-submenu-item "><a href="#">Pricing</a></li>
                <li id="item_1414_6" role="menuitem" class="is-submenu-item is-dropdown-submenu-item "><a href="#">Buy Now</a></li>
                <li id="item_1414_2" role="menuitem" class="is-submenu-item is-dropdown-submenu-item "><a href="#">Request for Terminal</a></li>
				<li id="item_1414_3" role="menuitem" class="is-submenu-item is-dropdown-submenu-item"><a href="#" target="_blank">Download App</a></li>
                <li id="item_1414_4" role="menuitem" class="is-submenu-item is-dropdown-submenu-item"><a href="#" target="_blank">User Guide</a></li>
                <li id="item_1414_5" role="menuitem" class="is-submenu-item is-dropdown-submenu-item"><a href="#" target="_blank">Product Guide</a></li>
            </ul>
		</li>
		<li id="item_1442" role="menuitem" class="is-dropdown-submenu-parent is-submenu-item is-dropdown-submenu-item opens-right " aria-haspopup="true" aria-label="Business Solutions">
            <a href="#">Business Solutions</a>
            <ul class="menu vertical submenu is-dropdown-submenu" data-submenu="" role="menu">
                <li id="item_1415" role="menuitem" class="is-submenu-item is-dropdown-submenu-item "><a href="#">Online Invoice</a></li>
                <li id="item_1417" role="menuitem" class="is-submenu-item is-dropdown-submenu-item "><a href="https://www.binitoo.com/Page.php?code=XlAPCHF526628GSHAJstatic-online-payments/">Payments Methods</a></li>
                <li id="item_1418" role="menuitem" class="is-submenu-item is-dropdown-submenu-item "><a href="#">Booking Engine</a></li>
                <li id="item_1419" role="menuitem" class="is-submenu-item is-dropdown-submenu-item "><a href="#">Ticketsasa</a></li>
				<li id="item_1420" role="menuitem" class="is-submenu-item is-dropdown-submenu-item "><a href="#">Duka Manager</a></li>
                
            </ul>
        </li>
        <li id="item_1420" role="menuitem" class="menuitem "><a href="#">Pricing</a></li>
        <li id="item_1858" role="menuitem" class="menuitem "><a href="#">FAQs</a></li>
		<li id="item_1859" role="menuitem" class="menuitem "><a href="#">Visa on Mobile (mVisa)</a></li>req
	</ul>
</li>
<li id="item_1316" role="menuitem" class="is-dropdown-submenu-parent opens-right " aria-haspopup="true" aria-label="Personal">
    <a href="#">Personal</a>
    <ul class="menu vertical submenu is-dropdown-submenu" data-submenu="" role="menu">
		<li id="item_1316_0" role="menuitem" class="show-for-small-only is-submenu-item is-dropdown-submenu-item "><a href="#">Personal Account</a></li>
				<li id="item_1316_11" role="menuitem" class="is-submenu-item is-dropdown-submenu-item ">
            		<a href="#">Mobile</a>
				</li>
			<li id="item_1316_11" role="menuitem" class="is-dropdown-submenu-parent is-submenu-item is-dropdown-submenu-item opens-right" aria-haspopup="true" aria-label="Pay">
            <a href="#">Pay</a>
            <ul class="menu vertical submenu is-dropdown-submenu first-sub" data-submenu="" role="menu">
					<li id="item_1316_1_1"  role="menuitem" class="is-submenu-item is-dropdown-submenu-item"><a href="#">Bills</a></li>
				                    <li id="item_School" role="menuitem" class="is-submenu-item is-dropdown-submenu-item "><a href="#">School Fees</a></li>
                <li id="item_1316_3"><a href="#">Other Services</a></li>
            </ul>
        </li>
        <li id="item_1316_2" role="menuitem" class="is-dropdown-submenu-parent is-submenu-item is-dropdown-submenu-item opens-right" aria-haspopup="true" aria-label="Buy">
            <a href="#">Buy</a>
            <ul class="menu vertical">
                    <li id="item_1339" role="menuitem" class="is-submenu-item is-dropdown-submenu-item "><a href="#">Airtime</a></li>
                                    <li id="item_1356" role="menuitem" class="is-submenu-item is-dropdown-submenu-item "><a href="#">Event tickets</a></li>
                <li id="item_1409" role="menuitem" class="is-submenu-item is-dropdown-submenu-item "><a href="#">Holiday offers</a></li>
                <li id="item_1410" role="menuitem" class="is-submenu-item is-dropdown-submenu-item "><a href="#">Flights</a></li>
                <li id="item_1348_2" role="menuitem" class="is-submenu-item is-dropdown-submenu-item "><a href="#">From Online-shops</a></li>
            </ul>
        </li>
        
        <li id="item_1859" role="menuitem" class="menuitem "><a href="#">FAQs</a></li>
    </ul>
</li>
<li id="item_1313" role="menuitem" class="menuitem "><a href="blog.php">Blog</a></li>            </ul>';

}else{
  echo '<li id="item_1317" role="menuitem" class="is-dropdown-submenu-parent opens-right " aria-haspopup="true" aria-label="Business" data-is-click="false">
    <a href="deposit.php">Deposit</a></li>
    
<li id="item_1316" role="menuitem" class="is-dropdown-submenu-parent opens-right " aria-haspopup="true" aria-label="Personal">
    <a href="withdraw.php">Withdraw</a>
    
       
</li>
<li id="item_1313" role="menuitem" class="menuitem "><a href="send.php">Send</a></li> 
<li id="item_1313" role="menuitem" class="menuitem "><a href="request.php">Request</a></li>
</ul>' ;
   
    
}
?>
        </div>
        <div class="top-bar-right">
            <ul class="menu">
                <?php
 if (!login_check($mysqli) == true){
echo '<li><a id="hrefRegisterDashboardLink" href="login.php">Login</a></li>
                <li><a id="hrefLogInLogOutLink" href="register.php">Register</a></li>
                
                
              <li class="sec"><span>
                
                <button class="button alert">Secured</button></span>
                
                
                </li>  
                
                ';
 }else{
     
      $this_user = $_SESSION['username'];
							
							$sql = "SELECT level FROM members WHERE username = '$this_user'";
							$result = $mysqli->query($sql);
    while($row = $result->fetch_assoc()) {  
           $level = $row['level'];
    }
    if($level == 'admin'){
        echo '<li class="sec"><a href="admin.php" class="secimg s1"><span>Admin</span></a></li>';
        
    }elseif($level == 'agent'){
        echo '<li class="sec"><a href="agent.php" class="secimg s1"><span>Agency</span></a></li>';
    }
     echo '
               
                
                <li class="sec"><a href="#" class="secimg s1"><span>'.$member_currency.'. '.$bal.' </span></a></li>
                
     
     <li><a id="hrefRegisterDashboardLink" href="profile.php">Profile</a></li>
                <li><a id="hrefLogInLogOutLink" href="php/logout.php">Logout</a></li>
                
                
                
                ';
 }
 
 
 
 ?>
            </ul>
        </div>
    </div>
</header>