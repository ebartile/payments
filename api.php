<?php
include_once 'php/dbconnect.php';
include_once 'php/functions.php';
sec_session_start();
$domain = 'https://www.paymentprocessor-script.com/demos/downloads/Payments-version-2-0-1-2';
?>
<!DOCTYPE html>
<html lang="en" xmlns:fb="http://ogp.me/ns/fb#">
    

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="author" content="" />
        <meta name="description" /> 
        <meta property="og:image" content="content/assetbase/img/pp-logo-2.png" />
        <title> API</title>
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
          <legend>API - (Application Programming Interface)</br>
					</legend>
        	<p>	Lets your third-party apps talk to your gateway through the guidance of developers.</p>
			<?php 
		if(isset($_GET['success'])){
		echo '<div class="validation-summary-errors" data-valmsg-summary="true"><ul><li>'.$_GET['success']. '</li></ul></div>';
		
		}
			if(isset($_GET['error'])){
		echo '<div class="validation-summary-errors" data-valmsg-summary="true"><ul><li>'.$_GET['error'].'</li></ul></div>';
		
		}
		?>	
 <?php
					    if (!login_check($mysqli) == true){
       
            }else{

               echo '
               <form action ="php/process_apps.php" method ="POST">
               
               <div class="form-group">
	<label class="control-label" for="buyerEmail">Your app Name <span class="field-validation-valid" data-valmsg-for="email" data-valmsg-replace="false">*</span></label>
	<div class="controls input-group">
		<span class="input-group-label"><i class="pe-7s-mail"></i></span>
	 <input type="text" name ="appName" placeholder="Your App Name" required>
               <br>
	</div>
</div>
              
               <center><input type ="submit" name ="create" value ="Create App" class="button alert"></center>
               </form>
               
               
               
               
               <div></div>
               
               ';
               
                
            }
            
            ?>
            
            
            <?php
            
            
            
             	    if (login_check($mysqli) == true){
             	        
             	        echo ' <h2>My Apps</h2><hr>
               <div class="table-wrapper">
										<table class="alt">
											<thead>
											
											<tr>
											<th>
											App Name
											</th>
											<th>
											Consumer Key
											</th>
											
											<th>
											Consumer Secret
											</th>
											<th>
										Issued on
											</th>
											<th>
											Expires on
											</th>
										<th>
											Status
											</th>
											</tr>
										
											</thead>
												<tbody>
											';
             	        
             	       $sqluser = "SELECT * FROM apps where owner = '".$_SESSION['username']."'";
$resultuser = $mysqli->query($sqluser);

if ($resultuser->num_rows > 0) {
    
    
    // output data of each row
    while($row = $resultuser->fetch_assoc()) {
						$appname = $row['ap_name'];
						$key = $row['consumer_key'];
						$secret = $row['consumer_secret'];
						$issued_on = $row['issued_on'];
						$expiry = $row['expires_on'];
						$status = $row['status'];
    
               
               echo '
              
										
												
								<tr>
								<td>'.$appname.'</td>
								<td>'.$key.' </td>
								<td>'.$secret.' </td>
								<td>'.$issued_on.' </td>
								<td>'.$expiry.' </td>
								<td>'.$status.' </td>
								</tr>
											
							 
												
											
               ';
             	        
             	    }
    
    
}else{
             	        echo "You have not created any App. Create using the form above.<br><br><hr>";
             	    }
             	    } 
             	    
             	    ?>
             	    
             	  
					 </tbody>
											<tfoot>
												<tr>
													<td colspan="2"></td>
													
												</tr>
											</tfoot>
										</table>				
               
               
               
					<h2>POST</h2><hr>
					<p>To let your Application/Website talk to PayMents Gateway, you need to follow as below:</p>
					
					<p>Method: POST</p>
					<p>Action url: <?php echo $domain; ?>/api/webscr</p>
					
					<h2>Variables</h2>
					<div class="table-wrapper">
										<table class="alt">
											<thead>
												<tr>
													<th>Name</th>
													<th>What it is as per PayMents Gateway</th>
													
												</tr>
											</thead>
											<tbody>
												
												<tr>
												 <td>itemName</td>   
												    <td>Name of the Item being purchased.</td>
												    </tr>
												   <tr>
												       
												   <td>_xclick</td>    
												       
												     <td>The type of button clicked is a Buy Now Button</td>  
												   </tr> 
												    <tr>
												     <td>businessEmail</td>   
												      <td>The recipients Email</td> 
												        
												        
												    </tr>
												    <tr>
												    
												    <td>amt</td>    
												        
												    <td>Amount to be paid</td>
												        
												        
												    </td>
												    
												</tr>
												
												
											<tr>
											    
											<td>notify_url</td>    
											  <td>Url where PayMents will send notifications in the form of IPN</td>
											    
											</tr
											
											<tr>
											    
											<td>cancel_url</td>    
											  <td>Url Where users will be send to if they decide to cancel the purchase along the way.</td>
											    
											</tr>
											<tr>
												<td>success_url</td>    
											  <td>Url where users will be redirected to after a successful payment.</td>
											    
											</tr>
											
										
											
											
											
											</tbody>
											<tfoot>
												<tr>
													<td colspan="2"></td>
													
												</tr>
											</tfoot>
										</table>
									</div>
									
									<hr>
											
											<h2>API reponse: GET</h2>
											
												
											<p>The PayMents gateway will respond as follows to the notify_url you posted. From there, you can deal with the response in the manner of your business logic. The sky is the limit from here.</p>
											
											<p>METHOD: GET</p>
							<div class="table-wrapper">
										<table class="alt">
											<thead>
												<tr>
													<th>Name</th>
													<th>What it is as per PayMents Gateway</th>
													
												</tr>
											</thead>
											<tbody>
												
											
												   <tr>
												       
												   <td>Auth</td>    
												       
												     <td>Your secret key as generated from your PayMents account</td>  
												   </tr> 
												    <tr>
												     <td>paidBy</td>   
												      <td>The person who paid you</td> 
												        
												        
												    </tr>
												    <tr>
												    
												    <td>amt</td>    
												        
												    <td>Amount paid</td>
												        
												        
												    </td>
												    
												</tr>
												
												
											<tr>
											    
											<td>fee</td>    
											  <td>The fee charged in that transaction</td>
											    
											</tr
											
											<tr>
											    
											<td>payer</td>    
											  <td>Who was paid(Normally your business email)</td>
											    
											</tr>
										<tr>
												<td>TransId</td>    
											  <td>The transaction ID of this Payment	    
											</tr>
											
											
											<tr>
												<td>payDate</td>    
											  <td>Date and time of this Payment    
											</tr>
											
											
											
											</tbody>
											<tfoot>
												<tr>
													<td colspan="2"></td>
													
												</tr>
											</tfoot>
										</table>
        </fieldset>
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
