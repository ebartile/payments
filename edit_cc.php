<?php
include_once 'php/dbconnect.php';
include_once 'php/functions.php';

sec_session_start();

  if (!login_check($mysqli) == true){
        header("Location: login.php");
            }
    
    if(isset($_POST['update'])){
        $secret = $_POST['secret'];
        $key = $_POST['key'];
        $mode = $_POST['mode'];
        $id = $_GET['gateway'];
        
     $sqlupdate = "UPDATE `credit_card_params` SET `mode` = '$mode', `api_key` = '$key', `secret` = '$secret' WHERE `credit_card_params`.`id` = '$id'";
         if(mysqli_query($mysqli, $sqlupdate)){
                header('Location:cc_params.php?success=Credit card gateway Params updated.');
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
        <title>Managed Credit card gateways settings - Payment Gateway</title>
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
          <legend>Edit Managed Credit card gateways settings - Payment Gateway</legend>
        	
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
		   $gateway = $_GET['gateway'];
$sql = "SELECT * FROM credit_card_params WHERE id =$gateway";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      
        echo
											'<form action="" method="POST">
											<tr>
										
											<td><input type="submit" class="button special small fit" name ="update" value="Save '.$row['cc_gateway_name'].' params"></td></tr>
											<tr>
													<td>Gateway name:<input type="text" name="name" value="'.$row['cc_gateway_name'] . '" readonly>
													
													
													
													
													
													
													</td>
													
												
													
											
							
												</tr>
												
												
												<tr>
													<td>API key: <input type="text" name="key" value="'.$row['api_key'] . '" ></td>
													
												
													
											
							
												</tr>	
												
													<tr>
													<td>Api Secret: <input type="text" name="secret" value="'.$row['secret'] . '"></td>
													
												
													
											
							
												</tr>
												
													<tr>
													<td>Gateway mode (sandbox or live): <input type="text" name="mode" value="'.$row['mode'] . '"></td>
													
												
													
											
							
												</tr>
												
												
												
												
												
												
												
												<tr>
										
											<td><input type="submit" class="button special small fit" name ="update" value="Save Save '.$row['cc_gateway_name'].' params">
											
											</td></tr>
											</form>	
												';
												
    }
} else {
    echo "<tr><td><p style='color:red;text-align:center;'>Please click Edit settings button above to set up parameters.</p></td><td>";
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
           <?php //require_once "inc/sidebar.php"; ?>
			
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