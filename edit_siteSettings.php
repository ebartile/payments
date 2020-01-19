<?php
include_once 'php/dbconnect.php';
include_once 'php/functions.php';

sec_session_start();

  if (!login_check($mysqli) == true){
        header("Location: login.php");
            }
    if(isset($_POST['save'])){
        $site = $_POST['gateway'];
        $mode = $_POST['paypal_mode'];
        $email = $_POST['paypal_email'];
        $cencel = $_POST['paypal_cancel'];
        $confirm = $_POST['paypal_confirm'];
        $currency = $_POST['default_currency'];
        $symbol = $_POST['symbol'];
      $sqlupdate = "UPDATE `site_config` SET `site_name` = '$site', `paypal_gateway_mode` = '$mode',`paypal_email` = '$email', `paypal_cencel_url` = '$cencel', `paypal_confirm_url` = '$confirm', `gateway_currency` = '$currency', `gateway_currency_symbol` = '$symbol' WHERE `site_config`.`id` = 1";
         if(mysqli_query($mysqli, $sqlupdate)){
                header('Location:GeneralSettings.php?success=Site configuration updated successfully.');
                    } else {
                    echo "Error updating record: " . mysqli_error($mysqli);
   }   
        
        
    }
    
?>
<!DOCTYPE html>
<html lang="en" xmlns:fb="http://ogp.me/ns/fb#">
    
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="author" content="" />
        <meta name="description" /> 
        <meta property="og:image" content="content/assetbase/img/pp-logo-2.png" />
        <title>Edit Site settings- Payment Gateway</title>
        <link rel="shortcut icon" href="content/images/favicon-2.ico" />
        <link rel="apple-touch-icon" href="content/images/apple-touch-icon-2.png" />
		<link rel="canonical" href="" />

        <!-- Style Sheets -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:300,400|Ubuntu:400" /> 
		<link rel="stylesheet" href="assets/css/foundation.min.css" />
		<link rel="stylesheet" href="assets/css/ppapp.css" />
		<link rel="stylesheet" href="assets/css/dashboard.css" />
		<link rel="stylesheet" href="assets/css/jquery.sidr.dark.css">
		<link rel="stylesheet" href="assets/css/style.css" />
		<link rel="stylesheet" href="assets/css/helper.css" />
        <script type="text/javascript" src="content/assetbase/js/jquery-2.js"></script>
        <script type="text/JavaScript" src="js/sha512.js"></script> 
<script type="text/JavaScript" src="js/forms.js"></script>
    </head>
<body class="solid fplain">
<div class="pdp-preloader"></div>
<div id="pp-wrapper">
		<!--HEADER SCRIPT-->


<?php require_once "inc/header.php"; ?>



<!--HEADER SCRIPT END-->
	<!--BODY-->  
		<div class="pp-body dsh">            
			<section class="pp-loginblock">
				<div class="row">
					<div class="column medium-12 large-10 large-offset-1">																					
						<div id="main" class="boxgrad">
							<div id="pp-main" class="tabs-panel is-active" aria-hidden="false">
                                    
                                
                                


<div class="row">
   	<div class="column medium-7 lleft">
   	  <fieldset>
          <legend>Site settings - Payment Gateway</legend>
        	
			<?php 
		if(isset($_GET['success'])){
		echo '<div class="validation-summary-errors" data-valmsg-summary="true"><ul><li>'.$_GET['success']. '</li></ul></div>';
		
		}
			if(isset($_GET['error'])){
		echo '<div class="validation-summary-errors" data-valmsg-summary="true"><ul><li>'.$_GET['error'].'</li></ul></div>';
		
		}
		?>	


	<table>
											<thead>
											<tr>
											    <th><a href="account.php">Recent activity</a></th>
													
												</tr>
											</thead>
											<tbody>
											   <?php 
		   
											   $sql = "SELECT * FROM site_config";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      
        echo
											'
											<form action="" method="POST">
											
											<tr><td>
										<input  class="button special small fit" type ="submit" name="save" value ="Update"></td></tr>
											
													
												<tr>	
													<td>Name of this Gateway: <span style="color:#2B547E;">
													
													
													
												<input type="text"	name="gateway" value=" ' .$row['site_name']. '" required>
													
													
													</span></td> </tr>
													
											<tr>		
											<td>PayPal Gateway Mode (live or sandbox):	
											
											<input type="text"	name="paypal_mode" value="'.$row['paypal_gateway_mode'].'" required></td>
													
													</tr>
													
												
												
												<td>Paypal email address:	
											
											<input type="text"	name="paypal_email" value="'.$row['paypal_email'].'" required></td>
													
												<tr>	<td>Paypal Cancel Url: 
												<input type="text"	name="paypal_cancel" value="'.$row['paypal_cencel_url'].'" required>
												
											</td> </tr>
												
						
						
							<tr><td>Paypal confirm Url:
							
							
						<input type="text" name="paypal_confirm"	value="'.$row['paypal_confirm_url'].'" required>
							
							
							
							
							</td></tr>
							
							
						<tr>	<td>Gateway System Default Currency: 
						<select name="default_currency" required>
							<option value="'.$row['gateway_currency'].'" hidden selected>'.$row['gateway_currency'].'</option>
							
	<option value="USD">United States Dollars</option>
	<option value="EUR">Euro</option>
	<option value="GBP">United Kingdom Pounds</option>
	<option value="DZD">Algeria Dinars</option>
	<option value="ARP">Argentina Pesos</option>
	<option value="AUD">Australia Dollars</option>
	<option value="ATS">Austria Schillings</option>
	<option value="BSD">Bahamas Dollars</option>
	<option value="BBD">Barbados Dollars</option>
	<option value="BEF">Belgium Francs</option>
	<option value="BMD">Bermuda Dollars</option>
	<option value="BRR">Brazil Real</option>
	<option value="BGL">Bulgaria Lev</option>
	<option value="CAD">Canada Dollars</option>
	<option value="CLP">Chile Pesos</option>
	<option value="CNY">China Yuan Renmimbi</option>
	<option value="CYP">Cyprus Pounds</option>
	<option value="CSK">Czech Republic Koruna</option>
	<option value="DKK">Denmark Kroner</option>
	<option value="NLG">Dutch Guilders</option>
	<option value="XCD">Eastern Caribbean Dollars</option>
	<option value="EGP">Egypt Pounds</option>
	<option value="FJD">Fiji Dollars</option>
	<option value="FIM">Finland Markka</option>
	<option value="FRF">France Francs</option>
	<option value="DEM">Germany Deutsche Marks</option>
	<option value="XAU">Gold Ounces</option>
	<option value="GRD">Greece Drachmas</option>
	<option value="HKD">Hong Kong Dollars</option>
	<option value="HUF">Hungary Forint</option>
	<option value="ISK">Iceland Krona</option>
	<option value="INR">India Rupees</option>
	<option value="IDR">Indonesia Rupiah</option>
	<option value="IEP">Ireland Punt</option>
	<option value="ILS">Israel New Shekels</option>
	<option value="ITL">Italy Lira</option>
	<option value="JMD">Jamaica Dollars</option>
	<option value="JPY">Japan Yen</option>
	<option value="JOD">Jordan Dinar</option>
	<option value="KES">Kenya Shillings</option>
	<option value="KRW">Korea (South) Won</option>
	<option value="LBP">Lebanon Pounds</option>
	<option value="LUF">Luxembourg Francs</option>
	<option value="MYR">Malaysia Ringgit</option>
	<option value="MXP">Mexico Pesos</option>
	<option value="NLG">Netherlands Guilders</option>
	<option value="NZD">New Zealand Dollars</option>
	<option value="NOK">Norway Kroner</option>
	<option value="PKR">Pakistan Rupees</option>
	<option value="XPD">Palladium Ounces</option>
	<option value="PHP">Philippines Pesos</option>
	<option value="XPT">Platinum Ounces</option>
	<option value="PLZ">Poland Zloty</option>
	<option value="PTE">Portugal Escudo</option>
	<option value="ROL">Romania Leu</option>
	<option value="RUR">Russia Rubles</option>
	<option value="SAR">Saudi Arabia Riyal</option>
	<option value="XAG">Silver Ounces</option>
	<option value="SGD">Singapore Dollars</option>
	<option value="SKK">Slovakia Koruna</option>
	<option value="ZAR">South Africa Rand</option>
	<option value="KRW">South Korea Won</option>
	<option value="ESP">Spain Pesetas</option>
	<option value="XDR">Special Drawing Right (IMF)</option>
	<option value="SDD">Sudan Dinar</option>
	<option value="SEK">Sweden Krona</option>
	<option value="CHF">Switzerland Francs</option>
	<option value="TWD">Taiwan Dollars</option>
	<option value="THB">Thailand Baht</option>
	<option value="TTD">Trinidad and Tobago Dollars</option>
	<option value="TRL">Turkey Lira</option>
	<option value="VEB">Venezuela Bolivar</option>
	<option value="ZMK">Zambia Kwacha</option>
	<option value="EUR">Euro</option>
	<option value="XCD">Eastern Caribbean Dollars</option>
	<option value="XDR">Special Drawing Right (IMF)</option>
	<option value="XAG">Silver Ounces</option>
	<option value="XAU">Gold Ounces</option>
	<option value="XPD">Palladium Ounces</option>
	<option value="XPT">Platinum Ounces</option>
					
						
						
						</slect>
						
						</td> </tr>
							
							<tr><td>Gateway Currency Symbol: 
							
							<input type="text" name="symbol"	value="'.$row['gateway_currency_symbol'].'" required>
							
							
							
							
							</td></tr>
							
							
							
							
							
							
										<tr>
										<td>
										<input  class="button special small fit" type ="submit" name="save" value ="Update">
										
										
										
										</td>
										
										
										
										</tr>		
												
											</form>	
												
												
												
												';
												
    }
} else {
    echo "<tr><td><p style='color:red;text-align:center;'>No such  Settings.</p></td><td>";
}		
					?>
											
											</tbody>
											<tfoot>
												<tr>
													<td colspan="2"></td>
													<!--<td>100.00</td>-->
												</tr>
											</tfoot>
										</table>

        </fieldset>
    </div>
    <div class="column medium-5 lright">
           <?php require_once "inc/sidebar.php"; ?>
			
    </div>
</div>
											
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
			<!--END BODY-->
		
<div id=""></div>
<?php require_once "inc/footer.php"; ?>
    </div>
	


        
	
    <script type="text/javascript" src="content/assetbase/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="content/assetbase/js/jquery.ddslick.min-2.js"></script>
	<script src="assets/js/jquery.easing.min.js" type="text/javascript"></script>
    <script src="assets/js/what-input.js" type="text/javascript"></script>
    <script src="assets/js/foundation.min.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sidr.min.js" type="text/javascript"></script>
	<script src="assets/js/jquery-ui.min.js" type="text/javascript"></script>
	<script src="assets/js/app.js" type="text/javascript"></script>
    <script src="assets/js/dash.js" type="text/javascript"></script>
	<script src="assets/js/selector.js" type="text/javascript"></script>
		<script src="Scripts/pp/pp.js"></script>
	
</body>


</html>