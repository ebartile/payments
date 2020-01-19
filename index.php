<?php
include_once 'php/register.inc.php';
include_once 'php/functions.php';
sec_session_start();

  if (login_check($mysqli) == true){
        header("Location: account.php");
            }
      
    $sql_site= "SELECT * FROM site_config where id = 1";
$result_site = $mysqli->query($sql_site);
    while($row = $result_site->fetch_assoc()) {
    $site = $row['site_name'];
    }
?>


<!doctype html>
<html class="no-js" lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1" />
    <meta name="description" content="<?php echo $site; ?>™ is the best Payment processing software on Planet Earth." />
  
					
    <link rel="shortcut icon" href="favicon.ico" />
    <link rel="apple-touch-icon" href="favicon.ico" />
	<link rel="canonical" href="index.html" />
	<meta property="og:image" content="media/1350/pesapal-share.png"/>
	<meta property="og:site_name" content="Epay"/>
	<meta property="og:description" content="Epay"/>
		<title><?php echo  $site; ?>™  | The best Payment processing software</title>
		<meta property="og:title" content="Payments"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:300,400|Ubuntu:400" />
    <link href="DependencyHandlerbeba.css?s=L2Fzc2V0cy9jc3MvcHVibGljLmNzczsvY3NzL3NsaWRlc2hvdy5jc3M7L2Nzcy9sYW5kaW5nQ3VzdG9tdjUyLmNzczsvYXNzZXRzL2Nzcy9mb3VuZGF0aW9uLm1pbi5jc3M7L2Fzc2V0cy9jc3MvcHBhcHAuY3NzOy9jc3MvY21zY3VzdG9tQ1NTdjQyLmNzczsvYXNzZXRzL2Nzcy9qcXVlcnkuc2lkci5kYXJrLmNzczsvYXNzZXRzL2Nzcy9zdHlsZS5jc3M7L2Fzc2V0cy9jc3MvaGVscGVyLmNzczsvYXNzZXRzL2Nzcy9vd2wuY2Fyb3VzZWwubWluLmNzczs&amp;t=Css&amp;cdv=995149879" type="text/css" rel="stylesheet"/>

	 <script type="text/JavaScript" src="js/sha512.js"></script> 
<script type="text/JavaScript" src="js/forms.js"></script>
	<style>
* {
    box-sizing: border-box;
}


#myVideo {
    position: fixed;
    right: 0;
    bottom: 0;
    min-width: 100%; 
    min-height: 100%;
    z-index:-1;
    opacity:0.7;
}



#myBtn {
    width: 200px;
    font-size: 18px;
    padding: 10px;
    border: none;
    background: green;
    color: #fff;
    cursor: pointer;
}

#myBtn:hover {
    background: #ddd;
    color: black;
}
</style>		
	
</head>

<body id="pp-land" class="clear fblue">
<video autoplay unmuted loop id="myVideo">
  <source src="video/Video1_Timelapse.mp4" type="video/mp4">
  Your browser does not support HTML5 video.
</video>
<!--BEGIN HEADER-->
<?require_once "inc/header.php"; ?>
<!--END HEADER-->
	
<!--BODY-->
<div class="pp-body ">

            <section class="pp-slideshow pp-slideshow-gr">
                <h1 class="hide">Pay, shop and receive payments</h1>
			<div class="row homeslide">
				<div class="column medium-6
					sleft				">
                	<div class="pp-business">
						<h2>Business</h2>
						<h3>
				<a href="">
					Accept online &amp; mobile payments
				</a>
			</h3>
	<p>signup as a Businesses receiving payments.</p>
	<p>Recieve payments for  goods and services.</p>
			<a href="register.php" class="alert button main">
Start Accepting Payments			</a> 
	<div class="pp-items row">
		<div class="item column small-4"><a href="#" class="page-scroll"><i class="pe-7s-monitor"></i></a>
			<h4><a href="#" class="page-scroll">Online Payments</a></h4>
		</div>
				<div class="item column small-4"><a href="" class="page-scroll"><i class="pe-7s-phone"></i></a>
			<h4><a href="#" class="page-scroll">Point of Sale</a></h4>
		</div>
					<div class="item column small-4"><a href="#" class="page-scroll"><i class="pe-7s-tools"></i></a>
				<h4><a href="#" class="page-scroll">Business Tools</a></h4>
			</div>
	</div>
					</div>
				</div>
				<div class="column medium-6
					sright				">
                	<div class="pp-personal">
						<h2>Personal</h2>
						<h3>
				<a href="#">pre -
					Make online &amp; mobile payments
				</a>
			</h3>
	<p>Recieve payments online easily.</p>
	<p>Pay bills online and merchants.</p>
			<a href="register.php" class="alert button main">
Start Making Payments			</a> 
	<div class="pp-items row">
		<div class="item column small-4"><a href="mobile.html" class="page-scroll"><i class="pe-7s-wallet"></i></a>
			<h4><a href="#" class="page-scroll">Wallet Top Up</a></h4>
		</div>
				<div class="item column small-4"><a href="#" class="page-scroll"><i class="pe-7s-phone"></i></a>
			<h4><a href="#" class="page-scroll">Buy Airtime</a></h4>
		</div>
					<div class="item column small-4"><a href="#" class="page-scroll"><i class="pe-7s-file"></i></a>
				<h4><a href="#" class="page-scroll">Pay Bills</a></h4>
			</div>
	</div>
					</div>
				</div>
			</div>
            </section>   
<section id="more" class="pp-contentblock block-0 text-center">
            <div class="row btext blink">
					<div class="column medium-4 ">
							<div class="twrap">
								<i class="pe-7s-network"></i>
							<h3>Comprehensive payment options
							</h3>
							<p>With 1000+ Agents in sub sahara africa available in over 10 countries, we offer you the most comprehensive payment options</p>
							</div>
					</div>
									<div class="column medium-4 ">
							<div class="twrap">
										<i class="pe-7s-news-paper"></i>
							<h3>Your payment history
								</h3>
							<p>From the first time you start using us, we keep a record of all your transactions which you can access anywhere, anytime</p>
							</div>
					</div>
									<div class="column medium-4 ">
							<div class="twrap">
									<i class="pe-7s-print"></i>
								<h3>Receipt for all payments
									</h3>
								<p>Download and print receipts for all payments that are made through us which you can access anywhere, anytime</p>
							</div>
					</div>
				             </div>
				</section>    <section id="mpos" class="pp-imageblock block-4 bright" style="background-image:url('media/1097/generic.jpg'); background-size: cover;">
	<div class="gd"></div>
	<div class="bgtop">
		<div class="bgbottom">
				<div class="row">
                	<div class="column medium-4 large-6 bimg">
								<a href="#">
									<img src="media/1672/pesapal-sabi-suite.png" alt="PayMents POS" />
								</a>
                    </div>
                    <div class="column medium-8 large-6">
                    	<div class="btxt">
                    		<h3><i class="pe-7s-calculator"></i><?php echo  $site; ?>™ POS comming soon</h3>
                        	<p><?php echo  $site; ?>™ POS is a Mobile Point-of-sale solution that simplifies how you manage payments within your store enabling digital payments. With this simplified process, reconciliation reports, simple settlement process, <?php echo  $site; ?>™’s POS is designed with you and your business in mind. Soon Coming</p>
									<a href="#" class="button primary">Learn More</a>
																		<a href="#" class="hollow button secondary" target="_blank">
											<span>Get <?php echo  $site; ?>™ POS</span>
									</a>
									
                        </div>
                    </div>
                </div>
		</div>
	</div>
</section>
<p> </p>    <section id="secure" class="pp-contentblock bright">
	<div class="row">
		<div class="column medium-6 bimg">
			<img src="media/1089/secure-online-transactions.png" alt="<?php echo  $site; ?>™ Cash Vouchers" />
		</div>
		<div class="column medium-6">
			<div class="btxt">
				<h3><i class="pe-7s-lock"></i> <?php echo  $site; ?>™ Vouchers</h3>
				<p>With <?php echo  $site; ?>™ top up Vouchers, you can make online payments without a credit card, so there’s no need to draw on credit when shopping online.
and at no extra cost to you.</p>
							<a href="#" class="hollow secondary button">Learn More</a>
								</div>
								<h3><i class="pe-7s-lock"></i> <?php echo  $site; ?>™ Wallet</h3>
				<p>With <?php echo  $site; ?>™ wallet, you can recieve mobile payments instant efts,swift and bank depsoits in east and south africa. make use of our voucher which are sold by many agents and redeem into cash. Take africa tradition cash payments to digital world of cards and digital wallets top up such as skrill and paypal instant with out credit card, so there’s no need to draw on credit when shopping online. use our api to intergrate in your web site such that customers start paying using our vouchers and wallets. minimise risks of charge back of credit by accepting <?php echo  $site; ?>™ wallet vouchers as alternative payement to cards. funds are settled to you instant or withdraw via our wallets cards no matter where you are,  you access your funds. 
				</p>
							<a href="#" class="hollow secondary button">Learn More</a>
								</div>
									<h3><i class="pe-7s-lock"></i> <?php echo  $site; ?>™ Wallet Cards</h3>
				<p>With <?php echo  $site; ?>™ wallet cards, withdraw cash at any atm. use it at any point sale. notification when deposit and withdraw.
Order your card today and start transacting. we have both local and international <?php echo  $site; ?>™ cash wallet cards. Order yours now.
							<a href="register.php" class="hollow secondary button">Order card Now</a>
								</div>
		</div>
	</div>
</section>
<section id="benefits" class="benefitSlider pp-contentblock">
			<div class="owl-carousel owl-theme text-center">
										<div class="slide1 text-left">
											<div id="hotels" class="pp-imageblock bleft block-1" style="background-image()">
												<div class="gd"></div>
												<div class="bgtop">
													<div class="bgbottom">
														<div class="row">
															<div class="column medium-6 bimg">
																<a href="#">
																	<img src="media/1274/hotels.png" alt="Buy bulk-airtime" />
																</a>
															</div>
															<div class="column medium-6">
																<div class="btxt">
																	<h3><a href="#"><i class="pe-7s-portfolio"></i> The Best Hotels Use Us!</a></h3>
																	<p>Over 500+ hotels have increased their hotel revenue by enabling Online &amp; Mobile booking by providing a secure booking and payment experience at no extra cost.</p>
																	<a href="#" class="hollow button secondary">LEARN MORE</a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>											
										</div>
										<div class="slide2 text-left">
											<div id="travel" class="pp-imageblock bright block-1" style="background-image()">
												<div class="gd"></div>
												<div class="bgtop">
													<div class="bgbottom">
														<div class="row">
															<div class="column medium-6 bimg">
																<a href="#">
																	<img src="media/1424/travel.png" alt="Buy bulk-airtime" />
																</a>
															</div>
															<div class="column medium-6">
																<div class="btxt">
																	<h3><a href="#"><i class="pe-7s-plane"></i> Top Tour &amp; Travel Operators!</a></h3>
																	<p>Bookings and payments from across the world have been made easier and more efficient with dual currency (ZAR/UGX/KES/USD) processing and the introduction of <?php echo  $site; ?>™'s vouchers and agent top ups payments.</p>
																	<a href="#" class="hollow button secondary">LEARN MORE</a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>											
										</div>
										<div class="slide3 text-left">
											<div id="billers" class="pp-imageblock bleft block-1" style="background-image()">
												<div class="gd"></div>
												<div class="bgtop">
													<div class="bgbottom">
														<div class="row">
															<div class="column medium-6 bimg">
																<a href="#">
																	<img src="media/1425/billers.png" alt="Buy bulk-airtime" />
																</a>
															</div>
															<div class="column medium-6">
																<div class="btxt">
																	<h3><a href="#"><i class="pe-7s-date"></i> Efficient Customer Billing!</a></h3>
																	<p>Whether it&#39;s a subscription, bill payment or paid signups, we help service and utility providers to collect their monthly payments efficiently online and via mobile phones.</p>
																	<a href="#" class="hollow button secondary">LEARN MORE</a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>											
										</div>
										<div class="slide4 text-left">
											<div id="ecommerce" class="pp-imageblock bright block-1" style="background-image()">
												<div class="gd"></div>
												<div class="bgtop">
													<div class="bgbottom">
														<div class="row">
															<div class="column medium-6 bimg">
																<a href="#">
																	<img src="media/1423/ecommerce.png" alt="Buy bulk-airtime" />
																</a>
															</div>
															<div class="column medium-6">
																<div class="btxt">
																	<h3><a href="#"><i class="pe-7s-cart"></i> Enabling E-commerce!</a></h3>
																	<p>Over 200+ online stores can now provide their customers ability to pay online, and have their items delivered conveniently, offering both Mobile money, Bank Transfers and card payments through a secure payment experience.</p>
																	<a href="#" class="hollow button secondary">LEARN MORE</a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>											
										</div>

						  </div>
		  </section></div>
<!--END BODY-->


<!--FOOTER-->
<?php require_once "inc/footer.php"; ?>
<!--END FOOTER-->   

<script src="DependencyHandlerd1d8.js?s=L2Fzc2V0cy9qcy9zZWxlY3Rvci5qczsvYXNzZXRzL2pzL2pxdWVyeS5qczsvYXNzZXRzL2pzL2pxdWVyeS5lYXNpbmcubWluLmpzOy9hc3NldHMvanMvd2hhdC1pbnB1dC5qczsvYXNzZXRzL2pzL2ZvdW5kYXRpb24ubWluLmpzOy9hc3NldHMvanMvanF1ZXJ5LnNpZHIubWluLmpzOw&amp;t=Javascript&amp;cdv=995149879" type="text/javascript"></script><script src="assets/js/owl.carousel.min54c2.js?vs=2" type="text/javascript"></script><script src="DependencyHandlerde1f.js?s=L2Fzc2V0cy9qcy9hcHAuanM7&amp;t=Javascript&amp;cdv=995149879" type="text/javascript"></script>

<script src="DependencyHandler763e.js?s=L3NjcmlwdHMvbGFuZGluZy5qczsvc2NyaXB0cy9jaG9jb2xhdGUuanM7&amp;t=Javascript&amp;cdv=995149879" type="text/javascript"></script>
	
	<script>
var video = document.getElementById("myVideo");
var btn = document.getElementById("myBtn");

function myFunction() {
  if (video.paused) {
    video.play();
    btn.innerHTML = "Pause video";
  } else {
    video.pause();
    btn.innerHTML = "Play video";
  }
}
</script>

</body>


</html>