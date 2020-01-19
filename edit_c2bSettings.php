<?php
include_once 'php/dbconnect.php';
include_once 'php/functions.php';
sec_session_start();

  if (!login_check($mysqli) == true){
        header("Location: login.php?error= You must login first to access this page");
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
        <title>C2B Mpesa settings - Payment Gateway</title>
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
          <legend>Edit C2B Mpesa settings - Payment Gateway</legend>
        	
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
		   
$sql = "SELECT * FROM mpesa_c2b_settings";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      
        echo
											'<form action="php/process_c2bsettings.php" method="POST">
											<tr>
										
											<td><input type="submit" class="button special small fit" name ="update" value="Save"></td></tr>
											<tr>
													<td>Paybill Number:<input type="text" name="paybill_number" value="'.$row['paybill_number'] . '" readonly></td>
													
												
													
											
							
												</tr>
												
												
												<tr>
													<td>Register url: <input type="text" name="reg_url" value="'.$row['register_url'] . '" ></td>
													
												
													
											
							
												</tr>	
												
													<tr>
													<td>Confirmation url: <input type="text" name="confirm_url" value="'.$row['confirm_url'] . '"></td>
													
												
													
											
							
												</tr>
												
													<tr>
													<td>Validation url: <input type="text" name="valid_url" value="'.$row['validation_url'] . '"></td>
													
												
													
											
							
												</tr>
												
												<tr>
													<td>consumer Key:<input type="text" name="consumer_key"  value="'.$row['consumer_key'] . '"></td>
													
												
													
											
							
												</tr>
												
												<tr>
													<td>Consumer secret:<input type="text" name="secret" value="'.$row['consumer_secret'] . '"></td>
													
												
													
											
							
												</tr>
												
													<tr>
													<td>Ksh to USD Exchange rate: <input type="text" name="e_rate" value="'.$row['e_rate'] . '"></td>
								
												</tr>
													<tr>
													<td>Sms Notifications: <input type="text" name="sms_notifications" value="'.$row['sms_on'] . '"></td>
								
												</tr>
												
												
													<tr>
													<td>Security token: <input type="text" name="security_token" value="'.$row['security_token'] . '"></td>
													
												
											<td>
											Encoded Security token: <input type="text" value="'.$row['encoded_token'] . '">
											</td>	
											
											
							
												</tr>
												
												
												
												
												
												
												
												<tr>
										
											<td><input type="submit" class="button special small fit" name ="update" value="Save">
											
											</td></tr>
											</form>	
												';
												
    }
} else {
    echo "<tr><td><p style='color:red;text-align:center;'>Please click Edit settings button above to set up Mpesa C2B parameters.</p></td><td>";
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