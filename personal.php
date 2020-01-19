<!doctype html>
<html class="no-js" lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1" />
    <meta name="description" content="" />
   
						<link rel="alternate" href="mw/personal.html" hreflang="en-mw" /> 
						<link rel="alternate" href="rw/personal.html" hreflang="en-rw" /> 
						<link rel="alternate" href="tz/personal.html" hreflang="en-tz" /> 
						<link rel="alternate" href="ug/personal.html" hreflang="en-ug" /> 
						<link rel="alternate" href="zm/personal.html" hreflang="en-zm" /> 
						<link rel="alternate" href="zw/personal.html" hreflang="en-zw" /> 
    <link rel="shortcut icon" href="favicon.ico" />
    <link rel="apple-touch-icon" href="favicon.ico" />
	<link rel="canonical" href="personal.html" />
	<meta property="og:image" content="media/1350/pesapal-share.png"/>
	<meta property="og:site_name" content="Pesapal"/>
	<meta property="og:description" content="Use Mobile money or your card to make web and mobile payments online or from your local store with instant notification and access receipts for each payment"/>
		<title>Personal Account - Kenya | Pesapal</title>
		<meta property="og:title" content="Personal Account - Kenya | Pesapal"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:300,400|Ubuntu:400" />
    <link href="DependencyHandlerbeba.css?s=L2Fzc2V0cy9jc3MvcHVibGljLmNzczsvY3NzL3NsaWRlc2hvdy5jc3M7L2Nzcy9sYW5kaW5nQ3VzdG9tdjUyLmNzczsvYXNzZXRzL2Nzcy9mb3VuZGF0aW9uLm1pbi5jc3M7L2Fzc2V0cy9jc3MvcHBhcHAuY3NzOy9jc3MvY21zY3VzdG9tQ1NTdjQyLmNzczsvYXNzZXRzL2Nzcy9qcXVlcnkuc2lkci5kYXJrLmNzczsvYXNzZXRzL2Nzcy9zdHlsZS5jc3M7L2Fzc2V0cy9jc3MvaGVscGVyLmNzczsvYXNzZXRzL2Nzcy9vd2wuY2Fyb3VzZWwubWluLmNzczs&amp;t=Css&amp;cdv=995149879" type="text/css" rel="stylesheet"/>

	
</head>

<body id="pp-land" class="clear fblue">

<!--BEGIN HEADER-->
<?php
if(login_check($mysqli) == true){
$sql = "SELECT * FROM members where username = '".$_SESSION['username']."'";
$result = $mysqli->query($sql);
    while($row = $result->fetch_assoc()) {
        
 
      $available_balance = $row['available_balance'];
      
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
      
    }}
?> 
 <header class="clear layout-public menufix-">
    <div class="title-bar hide-for-medium" data-responsive-toggle="pp-menu">
        <a href="index.html">ePAY</a>
        <a class="button plain dropdown cdrop" data-toggle="c-dropdown"><img src="images/flags/KE.png" alt="Kenya" /> <small>KE</small></a>
        <div class="dropdown-pane" id="c-dropdown" data-dropdown>
            <ul class="clist">
                        <li class="cntry-ke"><a id="link1CountryKE" href="#" onclick="fnLoadLink('KE', 'index.html');return false;"><img src="images/flags/KE.png" alt="Kenya" /> Kenya</a></li>
                        <li class="cntry-mw"><a href="mw/index.html"><img src="images/flags/MW.png" alt="Malawi" /> Malawi</a></li>
                        <li class="cntry-tz"><a href="tz/index.html"><img src="images/flags/TZ.png" alt="Tanzania" /> Tanzania</a></li>
                        <li class="cntry-rw"><a href="rw/index.html"><img src="images/flags/RW.png" alt="Rwanda" /> Rwanda</a></li>
                        <li class="cntry-ug"><a href="ug/index.html"><img src="images/flags/UG.png" alt="Uganda" /> Uganda</a></li>
                        <li class="cntry-zm"><a href="zm/index.html"><img src="images/flags/ZM.png" alt="Zambia" /> Zambia</a></li>
                        <li class="cntry-zw"><a href="zw/index.html"><img src="images/flags/ZW.png" alt="Zimbabwe" /> Zimbabwe</a></li>
            </ul>
        </div>		
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
			   echo '<li class="column small-6"><a href="#" class="pp-loginlink">Usd. '.$bal.'</a></li>
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
                <li class="menu-text hide-for-small-only"> <a href="index.html" id="logo">ePAY</a> </li>
                <li class="country">
                    <a class="button plain dropdown cdrop" data-toggle="country-dropdown"><img src="images/flags/KE.png" alt="Kenya" /> <span> Kenya</span></a>
                    <div class="dropdown-pane" id="country-dropdown" data-dropdown>
                        <ul class="clist">
                                    <li class="cntry-ke"><a id="link2CountryKE" href="#" onclick="fnLoadLink('KE', 'index.html');return false;"><img src="images/flags/KE.png" alt="Kenya" /> Kenya</a></li>
                                    <li class="cntry-mw"><a href="mw/index.html"><img src="images/flags/MW.png" alt="Malawi" /> Malawi</a></li>
                                    <li class="cntry-tz"><a href="tz/index.html"><img src="images/flags/TZ.png" alt="Tanzania" /> Tanzania</a></li>
                                    <li class="cntry-rw"><a href="rw/index.html"><img src="images/flags/RW.png" alt="Rwanda" /> Rwanda</a></li>
                                    <li class="cntry-ug"><a href="ug/index.html"><img src="images/flags/UG.png" alt="Uganda" /> Uganda</a></li>
                                    <li class="cntry-zm"><a href="zm/index.html"><img src="images/flags/ZM.png" alt="Zambia" /> Zambia</a></li>
                                    <li class="cntry-zw"><a href="zw/index.html"><img src="images/flags/ZW.png" alt="Zimbabwe" /> Zimbabwe</a></li>
                        </ul>
                    </div>
                </li>

<li id="item_1240" role="menuitem" class="menuitem home current active"><a href="index.html"><i class="pe-7s-home"></i></a></li>
 <?php
			   if (!login_check($mysqli) == true){
echo '
<li id="item_1317" role="menuitem" class="is-dropdown-submenu-parent opens-right " aria-haspopup="true" aria-label="Business" data-is-click="false">
    <a href="business.html">Business</a>
    <ul class="menu vertical submenu is-dropdown-submenu first-sub" data-submenu="" role="menu">
		<li id="item_1413_1" role="menuitem" class="show-for-small-only is-submenu-item is-dropdown-submenu-item "><a href="business.html">Business Account</a></li>
        <li id="item_1413" role="menuitem" class="is-submenu-item is-dropdown-submenu-item "><a href="business/online-payments.html">Online payments</a></li>
		<li id="item_1414" role="menuitem" class="is-submenu-item is-dropdown-submenu-item ">
			<a href="business/pos.html">Point-of-Sale (Sabi)</a>
			<ul class="menu vertical submenu is-dropdown-submenu" data-submenu="" role="menu">
                <li id="item_1414_1" role="menuitem" class="is-submenu-item is-dropdown-submenu-item "><a href="business/pos/pesapal-sabi-pricing.html">Pricing</a></li>
                <li id="item_1414_6" role="menuitem" class="is-submenu-item is-dropdown-submenu-item "><a href="business/pos.html#buy">Buy Now</a></li>
                <li id="item_1414_2" role="menuitem" class="is-submenu-item is-dropdown-submenu-item "><a href="request-pesapal-sabi.html">Request for Terminal</a></li>
				<li id="item_1414_3" role="menuitem" class="is-submenu-item is-dropdown-submenu-item"><a href="#" target="_blank">Download App</a></li>
                <li id="item_1414_4" role="menuitem" class="is-submenu-item is-dropdown-submenu-item"><a href="media/1434/pesapal-pos-guide-2017.pdf" target="_blank">User Guide</a></li>
                <li id="item_1414_5" role="menuitem" class="is-submenu-item is-dropdown-submenu-item"><a href="media/1435/pesapal-sabi-user-guide.pdf" target="_blank">Product Guide</a></li>
            </ul>
		</li>
		<li id="item_1442" role="menuitem" class="is-dropdown-submenu-parent is-submenu-item is-dropdown-submenu-item opens-right " aria-haspopup="true" aria-label="Business Solutions">
            <a href="business/solutions.html">Business Solutions</a>
            <ul class="menu vertical submenu is-dropdown-submenu" data-submenu="" role="menu">
                <li id="item_1415" role="menuitem" class="is-submenu-item is-dropdown-submenu-item "><a href="business/solutions/invoice.html">Online Invoice</a></li>
                <li id="item_1417" role="menuitem" class="is-submenu-item is-dropdown-submenu-item "><a href="business/solutions/payments-page.html">Payments page</a></li>
                <li id="item_1418" role="menuitem" class="is-submenu-item is-dropdown-submenu-item "><a href="business/solutions/booking-engine.html">Booking Engine</a></li>
                <li id="item_1419" role="menuitem" class="is-submenu-item is-dropdown-submenu-item "><a href="business/solutions/online-ticketing.html">Ticketsasa</a></li>
				<li id="item_1420" role="menuitem" class="is-submenu-item is-dropdown-submenu-item "><a href="business/solutions/duka-manager.html">Duka Manager</a></li>
                
            </ul>
        </li>
        <li id="item_1420" role="menuitem" class="menuitem "><a href="business/pricing.html">Pricing</a></li>
        <li id="item_1858" role="menuitem" class="menuitem "><a href="business/faqs.html">FAQs</a></li>
		<li id="item_1859" role="menuitem" class="menuitem "><a href="business/mvisa.html">Visa on Mobile (mVisa)</a></li>
	</ul>
</li>
<li id="item_1316" role="menuitem" class="is-dropdown-submenu-parent opens-right " aria-haspopup="true" aria-label="Personal">
    <a href="personal.html">Personal</a>
    <ul class="menu vertical submenu is-dropdown-submenu" data-submenu="" role="menu">
		<li id="item_1316_0" role="menuitem" class="show-for-small-only is-submenu-item is-dropdown-submenu-item "><a href="personal.html">Personal Account</a></li>
				<li id="item_1316_11" role="menuitem" class="is-submenu-item is-dropdown-submenu-item ">
            		<a href="mobile.html">Mobile</a>
				</li>
			<li id="item_1316_11" role="menuitem" class="is-dropdown-submenu-parent is-submenu-item is-dropdown-submenu-item opens-right" aria-haspopup="true" aria-label="Pay">
            <a href="#">Pay</a>
            <ul class="menu vertical submenu is-dropdown-submenu first-sub" data-submenu="" role="menu">
					<li id="item_1316_1_1"  role="menuitem" class="is-submenu-item is-dropdown-submenu-item"><a href="personal/pay-bills.html">Bills</a></li>
				                    <li id="item_School" role="menuitem" class="is-submenu-item is-dropdown-submenu-item "><a href="pay/schoolpay/index.html">School Fees</a></li>
                <li id="item_1316_3"><a href="directory.html">Other Services</a></li>
            </ul>
        </li>
        <li id="item_1316_2" role="menuitem" class="is-dropdown-submenu-parent is-submenu-item is-dropdown-submenu-item opens-right" aria-haspopup="true" aria-label="Buy">
            <a href="#">Buy</a>
            <ul class="menu vertical">
                    <li id="item_1339" role="menuitem" class="is-submenu-item is-dropdown-submenu-item "><a href="personal/buy-airtime.html">Airtime</a></li>
                                    <li id="item_1356" role="menuitem" class="is-submenu-item is-dropdown-submenu-item "><a href="personal/event-tickets.html">Event tickets</a></li>
                <li id="item_1409" role="menuitem" class="is-submenu-item is-dropdown-submenu-item "><a href="personal/holiday-offers.html">Holiday offers</a></li>
                <li id="item_1410" role="menuitem" class="is-submenu-item is-dropdown-submenu-item "><a href="personal/flights.html">Flights</a></li>
                <li id="item_1348_2" role="menuitem" class="is-submenu-item is-dropdown-submenu-item "><a href="directory.html">From Online-shops</a></li>
            </ul>
        </li>
        
        <li id="item_1859" role="menuitem" class="menuitem "><a href="personal/faqs.html">FAQs</a></li>
    </ul>
</li>
<li id="item_1313" role="menuitem" class="menuitem "><a href="blog.html">Blog</a></li>            </ul>';

}else{
  echo '<li id="item_1317" role="menuitem" class="is-dropdown-submenu-parent opens-right " aria-haspopup="true" aria-label="Business" data-is-click="false">
    <a href="deposit.php">Deposit</a>
    <ul class="menu vertical submenu is-dropdown-submenu first-sub" data-submenu="" role="menu">
		<li id="item_1413_1" role="menuitem" class="show-for-small-only is-submenu-item is-dropdown-submenu-item "><a href="business.html">Business Account</a></li>
        <li id="item_1413" role="menuitem" class="is-submenu-item is-dropdown-submenu-item "><a href="business/online-payments.html">Online payments</a></li>
		<li id="item_1414" role="menuitem" class="is-submenu-item is-dropdown-submenu-item ">
			<a href="business/pos.html">Point-of-Sale (Sabi)</a>
			<ul class="menu vertical submenu is-dropdown-submenu" data-submenu="" role="menu">
                <li id="item_1414_1" role="menuitem" class="is-submenu-item is-dropdown-submenu-item "><a href="business/pos/pesapal-sabi-pricing.html">Pricing</a></li>
                <li id="item_1414_6" role="menuitem" class="is-submenu-item is-dropdown-submenu-item "><a href="business/pos.html#buy">Buy Now</a></li>
                <li id="item_1414_2" role="menuitem" class="is-submenu-item is-dropdown-submenu-item "><a href="request-pesapal-sabi.html">Request for Terminal</a></li>
				<li id="item_1414_3" role="menuitem" class="is-submenu-item is-dropdown-submenu-item"><a href="#" target="_blank">Download App</a></li>
                <li id="item_1414_4" role="menuitem" class="is-submenu-item is-dropdown-submenu-item"><a href="media/1434/pesapal-pos-guide-2017.pdf" target="_blank">User Guide</a></li>
                <li id="item_1414_5" role="menuitem" class="is-submenu-item is-dropdown-submenu-item"><a href="media/1435/pesapal-sabi-user-guide.pdf" target="_blank">Product Guide</a></li>
            </ul>
		</li>
		<li id="item_1442" role="menuitem" class="is-dropdown-submenu-parent is-submenu-item is-dropdown-submenu-item opens-right " aria-haspopup="true" aria-label="Business Solutions">
            <a href="business/solutions.html">Business Solutions</a>
            <ul class="menu vertical submenu is-dropdown-submenu" data-submenu="" role="menu">
                <li id="item_1415" role="menuitem" class="is-submenu-item is-dropdown-submenu-item "><a href="business/solutions/invoice.html">Online Invoice</a></li>
                <li id="item_1417" role="menuitem" class="is-submenu-item is-dropdown-submenu-item "><a href="business/solutions/payments-page.html">Payments page</a></li>
                <li id="item_1418" role="menuitem" class="is-submenu-item is-dropdown-submenu-item "><a href="business/solutions/booking-engine.html">Booking Engine</a></li>
                <li id="item_1419" role="menuitem" class="is-submenu-item is-dropdown-submenu-item "><a href="business/solutions/online-ticketing.html">Ticketsasa</a></li>
				<li id="item_1420" role="menuitem" class="is-submenu-item is-dropdown-submenu-item "><a href="business/solutions/duka-manager.html">Duka Manager</a></li>
                
            </ul>
        </li>
        <li id="item_1420" role="menuitem" class="menuitem "><a href="business/pricing.html">Pricing</a></li>
        <li id="item_1858" role="menuitem" class="menuitem "><a href="business/faqs.html">FAQs</a></li>
		<li id="item_1859" role="menuitem" class="menuitem "><a href="business/mvisa.html">Visa on Mobile (mVisa)</a></li>
	</ul>
</li>
<li id="item_1316" role="menuitem" class="is-dropdown-submenu-parent opens-right " aria-haspopup="true" aria-label="Personal">
    <a href="withdraw.php">Withdraw</a>
    <ul class="menu vertical submenu is-dropdown-submenu" data-submenu="" role="menu">
		<li id="item_1316_0" role="menuitem" class="show-for-small-only is-submenu-item is-dropdown-submenu-item "><a href="personal.html">Personal Account</a></li>
				<li id="item_1316_11" role="menuitem" class="is-submenu-item is-dropdown-submenu-item ">
            		<a href="mobile.html">Mobile</a>
				</li>
			<li id="item_1316_11" role="menuitem" class="is-dropdown-submenu-parent is-submenu-item is-dropdown-submenu-item opens-right" aria-haspopup="true" aria-label="Pay">
            <a href="#">Pay</a>
            <ul class="menu vertical submenu is-dropdown-submenu first-sub" data-submenu="" role="menu">
					<li id="item_1316_1_1"  role="menuitem" class="is-submenu-item is-dropdown-submenu-item"><a href="personal/pay-bills.html">Bills</a></li>
				                    <li id="item_School" role="menuitem" class="is-submenu-item is-dropdown-submenu-item "><a href="pay/schoolpay/index.html">School Fees</a></li>
                <li id="item_1316_3"><a href="directory.html">Other Services</a></li>
            </ul>
        </li>
        <li id="item_1316_2" role="menuitem" class="is-dropdown-submenu-parent is-submenu-item is-dropdown-submenu-item opens-right" aria-haspopup="true" aria-label="Buy">
            <a href="#">Buy</a>
            <ul class="menu vertical">
                    <li id="item_1339" role="menuitem" class="is-submenu-item is-dropdown-submenu-item "><a href="personal/buy-airtime.html">Airtime</a></li>
                                    <li id="item_1356" role="menuitem" class="is-submenu-item is-dropdown-submenu-item "><a href="personal/event-tickets.html">Event tickets</a></li>
                <li id="item_1409" role="menuitem" class="is-submenu-item is-dropdown-submenu-item "><a href="personal/holiday-offers.html">Holiday offers</a></li>
                <li id="item_1410" role="menuitem" class="is-submenu-item is-dropdown-submenu-item "><a href="personal/flights.html">Flights</a></li>
                <li id="item_1348_2" role="menuitem" class="is-submenu-item is-dropdown-submenu-item "><a href="directory.html">From Online-shops</a></li>
            </ul>
        </li>
        
        <li id="item_1859" role="menuitem" class="menuitem "><a href="personal/faqs.html">FAQs</a></li>
    </ul>
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
                
                
                <li class="sec"><a href="#" class="secimg s1"><span>Norton</span></a></li>
                <li class="sec"><a href="#" class="secimg s2"><span>PCI</span></a></li>
                ';
 }else{
     echo '
     
                <li class="sec"><a href="#" class="secimg s1"><span>Usd. '.$bal.' </span></a></li>
                
     
     <li><a id="hrefRegisterDashboardLink" href="profile.php">My profile</a></li>
                <li><a id="hrefLogInLogOutLink" href="php/logout.php">Logout</a></li>
                
                
                
                ';
 }
 
 
 
 ?>
            </ul>
        </div>
    </div>
</header>
<!--END HEADER-->
	
<!--BODY-->
<div class="pp-body ">

            <section class="pp-slideshow pp-slideshow-gr" style="background-image:url('media/1214/personal-landing-page-a.jpg'); background-color:#1e62a6;">
                <div class="row innerslide">
<div class="column medium-6 sleft">
<div class="pp-slidewrap">
		<h1>Experience Convenience</h1>
    	<h3>Make online &amp; mobile payments</h3>
		<p>We make it easy and safe for you to buy goods and pay for services online and when visiting your local store.</p>
			<a href="https://www.pesapal.com:443/dashboard/my/account/buyerregister" class="alert button main">
				<span>Open a Personal account</span>
		</a> 
			</div>
</div>
<div class="column medium-6 sright">
	<div class="pp-items row">
		<div class="item column small-4"><a href="mobile.html" class="page-scroll"><i class="pe-7s-phone"></i></a>
			<h4><a href="mobile.html" class="page-scroll">Mobile</a></h4>
		</div>
				<div class="item column small-4"><a href="personal/buy-airtime.html" class="page-scroll"><i class="pe-7s-phone"></i></a>
			<h4><a href="personal/buy-airtime.html" class="page-scroll">Buy Airtime</a></h4>
		</div>
					<div class="item column small-4"><a href="personal/pay-bills.html" class="page-scroll"><i class="pe-7s-file"></i></a>
				<h4><a href="personal/pay-bills.html" class="page-scroll">Pay Bills</a></h4>
			</div>
	</div>
</div>
</div>
            </section>  
<section id="buy" class="pp-contentblock pp-links bright">
<div class="row btext">
<div class="column medium-6 bimg"><img style="width: 500px; height: 237.31587561374795px;" src="media/1069/buye373.png?width=500&amp;height=237.31587561374795" alt="" data-id="1377"></div>
<div class="column medium-6">
<div class="btxt">
<h3>Buy Online</h3>
<h4>Safe and convenient experience</h4>
<p><span style="font-weight: 400;">Shop online and enjoy a wide variety of payments options. Pesapal offers you a secure and hassle free shopping experience from over 200+ online stores and merchants.</span></p>
</div>
</div>
</div>
<div class="row">
<div class="column">
<ul class="blist">
	<li><a data-id="1339" href="personal/buy-airtime.html" title="Buy Airtime" class="hollow button secondary">Buy Airtime</a></li>
		<li><a data-id="1356" href="personal/event-tickets.html" title="Event Tickets" class="hollow button secondary">Buy Event Tickets</a></li>
	<li><a data-id="1409" href="personal/holiday-offers.html" title="Holiday Offers" class="hollow button secondary">Buy Holiday Packages</a></li>
	<li><a data-id="1410" href="personal/flights.html" title="Flights" class="hollow button secondary">Buy Flights Tickets</a></li>
	<li><a data-id="1348" href="directory.html" title="Directory" class="hollow button secondary">Buy from Online shops</a></li>
</ul>
</div>
</div>
</section>    <section id="bills" class="pp-imageblock block-2 bleft" style="background-image:url('media/1100/ewalletbg.jpg'); background-size: cover;">
	<div class="gd"></div>
	<div class="bgtop">
		<div class="bgbottom">
				<div class="row">
                	<div class="column medium-4 large-6 bimg">
                    </div>
                    <div class="column medium-8 large-6">
                    	<div class="btxt">
                    		<h3><i class="pe-7s-wallet"></i> All your Bills in one place!</h3>
                        	<p>Pay your TV, Internet and Electricity bills and buy airtime on your mobile or online with mobile money or your debit/ credit card.</p>
									<a href="personal/pay-bills.html" class="button primary">Pay Bills</a>
																		<a href="personal/buy-airtime.html" class="hollow button secondary" target="_blank">
											<span>Buy Airtime</span>
									</a>
									
                        </div>
                    </div>
                </div>
		</div>
	</div>
</section>    <section id="pay" class="pp-contentblock block-3 tls text-center bdtop">
        	<div class="row btitle text-center">
            	<div class="column large-6 large-offset-3 medium-8 medium-offset-2">
						<h3>Pay for Services</h3>
										<h4>Pay your bills and services conveniently on desktop or mobile</h4>
                </div>
            </div>
            <div class="row btext blink">
					<div class="column medium-4 ">
							<div class="twrap">
									<a href="bills.html" class="icon">
										<i class="pe-7s-file"></i>
									</a>
							<h3>Bills
										<a href="bills.html">/bills</a>
							</h3>
							<p>Settle your bills conveniently with mobile money and your credit or debit cards.</p>
								<a href="bills.html" class="button hollow secondary">
										<span>Pay your Bill</span>
								</a>
							</div>
					</div>
									<div class="column medium-4 ">
							<div class="twrap">
									<a href="Auth/Authenticate/indexe964.html" class="icon">
										<i class="pe-7s-study"></i>
									</a>
							<h3>School Fees
									<a href="Auth/Authenticate/indexe964.html">/school-fees</a>
								</h3>
							<p>Pay school fees online and get a receipt fast and securely on PesaPal</p>
									<a href="Auth/Authenticate/indexe964.html" class="button hollow secondary">
										<span>Pay School Fees</span>
								</a>
							</div>
					</div>
									<div class="column medium-4 ">
							<div class="twrap">
									<a href="directory.html" class="icon">
									<i class="pe-7s-albums"></i>
								</a>
								<h3> Other Services
										<a href="directory.html">/-other-services</a>
									</h3>
								<p>Find online stores that use Pesapal and conveniently complete your purchase.</p>
										<a href="directory.html" class="button hollow secondary">
										<span>View Directory</span>
									</a>
							</div>
					</div>
				             </div>
				</section></div>
<!--END BODY-->


<!--FOOTER-->
<footer>
        <div class="pp-supported">
            <div class="row">
                <div class="column">
                    <span>Payment methods available</span>
                    <img src="images/payments/visa.png" alt="Visa" title="Visa" />
                    <img src="images/payments/mastercard.png" alt="MasterCard" title="MasterCard" />
                    <img src="images/payments/americanexpress.png" alt="American Express" title="American Express" />
                        <img src="images/payments/mpesa.png" alt="MPESA" title="MPESA" />
                        <img src="images/payments/airtel.png" alt="Airtel Money" title="Airtel Money" />
						<img src="media/1525/mvisal.png" alt="Mvisa" title="Mvisa" />
                        <img src="images/payments/equity.png" alt="Equity" title="Equity" />
                        <img src="images/payments/coopbank.png" alt="Co-op" title="Co-op Bank" />
                                                            <img src="images/payments/ewallet.png" alt="e-wallet" title="E wallet" />
                </div>
            </div>
        </div>
        <div class="pp-summary">
            <div class="title-bar hide-for-medium" data-responsive-toggle="pp-footer">
                <button type="button" data-toggle="pp-footer"><i class="pe-7s-plus"></i> More Info</button>
            </div>
            <div class="row" id="pp-footer" data-animate="hinge-in-from-top hinge-out-from-top">
                <div class="column large-2 medium-3 small-6 col c1">
                    <h4><a href="about-us.html">ABOUT US</a></h4>
                    <ul>
                        <li><a href="about-us.html">About us</a></li>
                        <li><a href="http://developer.pesapal.com/" target="_blank">Developers</a></li>
                        <li><a href="security.html">Security</a></li>
                        <li><a href="terms-and-conditions.html">Terms &amp; Conditions</a></li>
                        <li><a href="privacy-policy.html">Privacy Policy</a></li>
                    </ul>
                </div>
                <div class="column large-2 medium-3 small-6 col c2">
                    <h4><a href="personal.html">Personal</a></h4>
                    <ul>
                        <li><a href="directory.html">Buy Online</a></li>
                        <li><a href="bills.html">Pay your bills</a></li>
                            <li><a href="pay/schoolpay/index.html">Pay School fees </a></li>
                                                    <li><a href="personal/event-tickets.html">Event Tickets</a></li>
                        <li><a href="personal/holiday-offers.html">Holiday Offers</a></li>
                        <!--<li><a href="/personal/e-wallet">Get e-wallet</a></li>-->
                    </ul>
                </div>
                <div class="column large-2 medium-3 small-6 col c3">
                    <h4><a href="business.html">Business</a></h4>
                    <ul>
                        <li><a href="business/online-payments.html">Online Payments</a></li>
                        <li><a href="business/solutions.html">Business Tools</a></li>
                       	<li><a href="business/pos.html">Point-Of-Sale</a></li>
                        <li><a href="business/faqs.html">FAQs</a></li>
                        <li><a href="business/pricing.html">Pricing</a></li>
                    </ul>
                </div>
                <div class="column large-4 medium-3 small-6 col c4">
                    <h4><a href="help-support.html">Talk to Us</a></h4>
                    <div class="row">
                            <div class="column large-6 medium-12">
                                Pesapal Limited <br />
                                <!--Dagoretti Lane <br />-->
                                P.O Box 1179-00606 <br />
                                Nairobi, Kenya
                            </div>
                            <div class="column large-6 medium-12">
                                Tel: +254-70-921-9000 <br />
                                Email: info@pesapal.com <br />
                                <a href="help-support.html">Help &amp; Support</a>
                            </div>
                    </div>
                </div>
                <div class="column large-2 medium-12 col last">
                    <h4>Countries</h4>
                    <div class="row">
                        <div class="column large-6 medium-12 small-6 ">
                            <ul class="cmenu">
                                <li><a href="index.html"><img src="images/flags/KE.png" alt="Kenya" /> Kenya</a></li>
                                <li><a href="mw.html"><img src="images/flags/MW.png" alt="Malawi" /> Malawi</a></li>
                                <li><a href="rw.html"><img src="images/flags/RW.png" alt="Rwanda" /> Rwanda</a></li>
                                <li><a href="tz.html"><img src="images/flags/TZ.png" alt="Tanzania" /> Tanzania</a></li>
                            </ul>
                        </div>
                        <div class="column large-6 medium-12 small-6 ">
                            <ul class="cmenu">
                                <li><a href="ug.html"><img src="images/flags/UG.png" alt="Uganda" /> Uganda</a></li>
                                <li><a href="zm.html"><img src="images/flags/ZM.png" alt="Zambia" /> Zambia</a></li>
                                <li><a href="zw.html"><img src="images/flags/ZW.png" alt="Zimbabwe" /> Zimbabwe</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                    <!--END SUMMARY-->
    <div class="pp-copyright bl">
        <div class="row">
            <div class="column medium-12">
                    <div class="social">
                        <a href="https://www.facebook.com/pesapal" target="_blank"><i class="pe-7s-facebook"></i></a>
                        <a href="https://twitter.com/PesaPal" target="_blank"><i class="pe-7s-twitter"></i></a>
                        <a href="https://www.youtube.com/user/pesapal" target="_blank"><i class="pe-7s-youtube"></i></a>
                        <a href="https://plus.google.com/u/0/104977800597904514249" target="_blank"><i class="pe-7s-google-plus"></i></a>
                        <a href="https://www.linkedin.com/company/pesapal" target="_blank"><i class="pe-7s-linkedin2"></i></a>
                        <a href="https://www.instagram.com/pesapal" target="_blank"><i class="pe-7s-instagram"></i></a>
                    </div>
                ©2009-2019 Pesapal™, all rights reserved
            </div>
        </div>
    </div>
    <!--END COPYRIGHT-->
</footer>
<!--END FOOTER-->    <script src="DependencyHandlerd1d8.js?s=L2Fzc2V0cy9qcy9zZWxlY3Rvci5qczsvYXNzZXRzL2pzL2pxdWVyeS5qczsvYXNzZXRzL2pzL2pxdWVyeS5lYXNpbmcubWluLmpzOy9hc3NldHMvanMvd2hhdC1pbnB1dC5qczsvYXNzZXRzL2pzL2ZvdW5kYXRpb24ubWluLmpzOy9hc3NldHMvanMvanF1ZXJ5LnNpZHIubWluLmpzOw&amp;t=Javascript&amp;cdv=995149879" type="text/javascript"></script><script src="assets/js/owl.carousel.min54c2.js?vs=2" type="text/javascript"></script><script src="DependencyHandlerde1f.js?s=L2Fzc2V0cy9qcy9hcHAuanM7&amp;t=Javascript&amp;cdv=995149879" type="text/javascript"></script><script src="scripts/public54c2.js?vs=2" type="text/javascript"></script><script src="DependencyHandler4a63.js?s=L3NjcmlwdHMvbGFuZGluZy5qczs&amp;t=Javascript&amp;cdv=995149879" type="text/javascript"></script>
    
<script type="text/javascript">

    function fnGetUserProfileLinks(userprofileurl, fnProcessUserData) {
        $.ajax({
            url: userprofileurl,
            type: 'POST',
            contentType: 'application/json; charset=utf-8',
            dataType: 'json',
            success: function (userData) {
                fnProcessUserData(userData);
            },
            error: function (xhr, textStatus, errorThrown) {
                console.warn(xhr.responseText)
                console.log('Error fnShowAJAXUserLinks!  xhr.status = ' + xhr.status + ' textStatus = ' + textStatus + ' errorThrown = ' + errorThrown + ' userprofileurl=' + userprofileurl);
            }
        });
    }

    function fnProcessUserData(userData) {

        if (userData.IsLoggedOnBuyer || userData.IsLoggedOnMerchant) {
            $("a#hrefLogInLogOutLink").text("Logout");
            $("a#hrefLogInLogOutLink").attr("href", "dashboard/account/signout/index.html");
            $("a#sidr-id-hrefLogInLogOutLink").text("Logout");
            $("a#sidr-id-hrefLogInLogOutLink").attr("href", "dashboard/account/signout/index.html");

            if (userData.IsLoggedOnBuyer && userData.IsLoggedOnMerchant) {
                $("a#hrefRegisterDashboardLink").text("My Account");
                $("a#hrefRegisterDashboardLink").attr("href", "Auth/Authenticate/index19df.html");
                $("a#sidr-id-hrefRegisterDashboardLink").text("Account");
                $("a#sidr-id-hrefRegisterDashboardLink").attr("href", "Auth/Authenticate/index19df.html");
            }
            else {
                if (userData.IsLoggedOnBuyer) {
                    $("a#hrefRegisterDashboardLink").text("My Account");
                    $("a#hrefRegisterDashboardLink").attr("href", "dashboard/my/index.html");
                    $("a#sidr-id-hrefRegisterDashboardLink").text("My Account");
                    $("a#sidr-id-hrefRegisterDashboardLink").attr("href", "dashboard/my/index.html");
                }
                else {
                    $("a#hrefRegisterDashboardLink").text("My Account");
                    $("a#hrefRegisterDashboardLink").attr("href", "dashboard/merchant/index.html");
                    $("a#sidr-id-hrefRegisterDashboardLink").text("My Account");
                    $("a#sidr-id-hrefRegisterDashboardLink").attr("href", "dashboard/merchant/index.html");
                }
            }
        }
        else {
            $("a#hrefLogInLogOutLink").text("Register");
            $("a#hrefLogInLogOutLink").attr("href", "Auth/Authenticate/indexbd5c.html");
            $("a#sidr-id-hrefLogInLogOutLink").text("Register");
            $("a#sidr-id-hrefLogInLogOutLink").attr("href", "Auth/Authenticate/indexbd5c.html");

            $("a#hrefRegisterDashboardLink").text("Login");
            $("a#hrefRegisterDashboardLink").attr("href", "Auth/Authenticate/index19df.html");
            $("a#sidr-id-hrefRegisterDashboardLink").text("Login");
            $("a#sidr-id-hrefRegisterDashboardLink").attr("href", "Auth/Authenticate/index19df.html");
        }
    }

    function fnDebug(logMessage) {
        console.log('log:' + logMessage + ', at:' + window.location.href);
    }

    function fnLoadLink(country, menuUrl) {
        fnSetCountrySessionAndClick('https://www.pesapal.com/auth/localization/selectcountry/' + country, menuUrl);
    }

    function fnGetCountrySession(countryProfileUrl) {
        fnDebug('1. fnGetCountrySession:' + countryProfileUrl);

        $.ajax({
            url: countryProfileUrl,
            type: 'POST',
            contentType: 'application/json; charset=utf-8',
            dataType: 'json',
            success: function (countryValue) {
                fnDebug('2. fnGetCountrySession:' + countryProfileUrl + ', countryValue:' + countryValue);
            },
            error: function (xhr, textStatus, errorThrown) {
                console.log('Error fnGetCountrySession!  xhr.status = ' + xhr.status + ' textStatus = ' + textStatus + ' errorThrown = ' + errorThrown);
                console.warn(xhr.responseText)
            }
        });
    }

    function fnSetCountrySessionX(selectCountryUrl, fnCallBack, countryProfileUrl) {
        fnDebug('fnSetCountrySessionX:' + selectCountryUrl);

        $.ajax({
            url: selectCountryUrl,
            type: 'POST',
            contentType: 'application/json; charset=utf-8',
            dataType: 'json',
            success: function (setResult) {
                fnCallBack(setResult, countryProfileUrl);
            },
            error: function (xhr, textStatus, errorThrown) {
                console.log('Error fnSetCountrySessionX!  xhr.status = ' + xhr.status + ' textStatus = ' + textStatus + ' errorThrown = ' + errorThrown);
                console.warn(xhr.responseText)
            }
        });
    }

    function fnSetCountrySession(selectCountryUrl) {
        fnDebug('1. fnSetCountrySession:' + selectCountryUrl);

        fnSetCountrySessionX(
            selectCountryUrl,
            function (setResult, countryProfileUrl) {
                fnDebug('2. fnSetCountrySession:' + selectCountryUrl + ', setResult:' + setResult);
                //fnGetCountrySession(countryProfileUrl);
            },
            'Auth/Authenticate/indexd3b2.html'
            );
    }

    function fnSetCountrySessionAndClick(selectCountryUrl, hrefUrl) {
        fnDebug('1. fnSetCountrySessionAndClick:' + selectCountryUrl + ', hrefUrl:' + hrefUrl);

        fnSetCountrySessionX(
            selectCountryUrl,
            function (setResult, countryProfileUrl) {
                fnDebug('2. fnSetCountrySessionAndClick:' + selectCountryUrl + ', hrefUrl:' + hrefUrl + ', setResult:' + setResult);
                //fnGetCountrySession(countryProfileUrl);
                fnClickUrl(hrefUrl);
            },
            'Auth/Authenticate/indexd3b2.html'
            );
    }

    function fnClickUrl(hrefUrl) {
        try { window.location.assign(hrefUrl); }
        catch (e) { window.location = hrefUrl; }
    }

</script>

    <script type="text/javascript">

        //window.onload = fnRedirectGlobalCountries();
        $(document).ready(function () {
            fnRedirectGlobalCountries();
        });

        function fnRedirectGlobalCountries() {
            fnRedirectCountries('Auth/Authenticate/indexd3b2.html', 'ke', 'ke,mw,rw,tz,ug,zm,zw', 'index.html', '/personal', 'auth/localization/selectcountry/index.html');
        }

        function fnRedirectCountries(countryProfileUrl, globalCountry, countryContent, basePathUrl, redirectUrlPath, selectCountryUrl) {
            fnDebug('fnRedirectCountries:' + countryProfileUrl);

            $.ajax({
                url: countryProfileUrl,
                type: 'POST',
                contentType: 'application/json; charset=utf-8',
                dataType: 'json',
                success: function (countryValue) {
                    fnDebug('countryValue:' + countryValue);

                    countryValue = countryValue.toLowerCase();

                    fnSetCountrySession(selectCountryUrl + countryValue);

                    if (countryValue != globalCountry) {
                        if (countryContent == 'undefined' || countryContent == '') {
                            fnReplaceUrl(basePathUrl + '/' + countryValue);
                        } else {
                            var arrayCountryContent = countryContent.split(',');
                            if (arrayCountryContent.indexOf(countryValue) >= 0) {
                                fnReplaceUrl(basePathUrl + '/' + countryValue + redirectUrlPath);
                            }
                            else {
                                fnReplaceUrl(basePathUrl + '/' + countryValue);
                            }
                        }
                    }
                },
                error: function (xhr, textStatus, errorThrown) {
                    console.log('Error fnRedirectCountries!  xhr.status = ' + xhr.status + ' textStatus = ' + textStatus + ' errorThrown = ' + errorThrown);
                    console.warn(xhr.responseText)
                }
            });
        }

        function fnReplaceUrl(redirectToUrl) {
            try { window.location.replace(redirectToUrl); }
            catch (e) { window.location = redirectToUrl; }
        }

    </script>
<script type="text/javascript">

    $(document).ready(function () {
        fnGetUserProfileLinks('auth/localization/userprofile/index.html', fnProcessUserData);
    });

</script>
		


</body>

<!-- Mirrored from www.pesapal.com/personal by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 17 Aug 2019 15:09:58 GMT -->
</html>