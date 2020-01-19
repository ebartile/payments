<?php
include_once 'php/dbconnect.php';
include_once 'php/functions.php';

sec_session_start();

  if (!login_check($mysqli) == true){
        header("Location: login.php");
            }
            $domain = 'https://www.epay.me/new';
    
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
        <title>Edit B2C Mpesa settings - Payment Gateway</title>
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
          <legend>B2C Mpesa settings - Payment Gateway</legend>
        	
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
		   
$sql = "SELECT * FROM mpesa_b2c_settings";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      
        echo
											'<form action="php/process_b2c_settings.php" method="POST">
											<tr>
										
											<td><input type="submit" class="button special small fit" name ="update" value="Save"></td></tr>
											<tr>
													<td>Paybill Number:<input type="text" name="paybill_number" value="'.$row['paybill_number'] . '" required></td>
													
												
													
											
							
												</tr>
												<tr>
													<td>Consumer Key:<input type="text" name="key" value="'.$row['consumer_key'] . '" required></td>
													
												
													
											
							
												</tr>
												<tr>
													<td>Consumer secret:<input type="text" name="secret" value="'.$row['consumer_secret'] . '" required></td>
													
												
													
											
							
												</tr>
												
												<tr>
													<td>Initiator name: <input type="text" name="initiator_name" value="'.$row['initiator_name'] . '" required></td>
													
												
													
											
							
												</tr>	
												
													<tr>
													<td>Initiator Pass: <input type="text" name="pass" value="'.$row['initiator_pass'] . '" required></td>
													
											
													
											
							
												</tr>
												
													<tr>
													<td>Command Id: <input type="text" name="command_id" value="'.$row['command_id'] . '" required></td>
													
												
													
											
							
												</tr>
												
												<tr>
													<td>Remarks:<input type="text" name="remarks "  value="'.$row['remarks'] . '" required></td>
													
												
													
											
							
												</tr>
												
												<tr>
													<td>Queue Out Time url :<input type="text" name="queueTimeurl " value="'.$domain.'/B2C/queueTimeoutUrl.php" readonly></td>
													
												
													
											
							
												</tr>
												
													<tr>
													<td>USD to Ksh Exchange rate: <input type="text" name="e_rate" value="'.$row['e_rate'] . '"></td>
								
												</tr>
													<tr>
													<td>ResultURL : <input type="text" name="ResultURL" value="'.$domain.'/B2C/B2CResult_url.php" readonly></td>
								
												</tr>
												
												
													<tr>
													<td>Occassion: <input type="text" name="Occassion" value="'.$row['Occassion'] . '"></td>
													
												
												
											
											
							
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