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
        <title>My profile</title>
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
          <legend>My profile</legend>
        	
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
											    <th><a href="account.php"><button>Recent activity</button></a></th>
													
												</tr>
											</thead>
											<tbody>
											  		   <?php 
		   
											    $sql = "SELECT * FROM members WHERE username = '".$_SESSION['username']."'";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      
        echo
											'
											<form action="php/process_editprofile.php" method="POST">
											
											<tr><td>
										<input  class="button special small fit" type ="submit" name="save" value ="Update"></td></tr>
											<tr>
													<td>Account ID: <a href="#">82992'.$row['id'] . '</a></td>
													
													</tr>
													
												<tr>	
													<td>First name: <span style="color:#2B547E;">
													
													
													
												<input type="text"	name="first_name" value=" ' .$row['First_name']. '" required>
													
													
													</span></td> </tr>
													
											<tr>		
											<td>Last name:	
											
											<input type="text"	name="last_name" value="'.$row['Last_name'].'" required></td>
													
													</tr>
													
												<tr><td>Email: 	 '.$row['email'].' </td></tr>
												
												<td>Phone number:	
											
											<input type="text"	name="phone" value="'.$row['phone'].'" required></td>
													
												<tr>	<td>Account type: 
												<select name="account_type">
												<option value="'.$row['level'].'">'.$row['level'].'</option>
												
										<option value="Personal">Personal</option>
										
											<option value="Business">Business</option>
												
											</td> </tr>
												
						<tr><td>Payment institutions<hr></td></tr>
						
							<tr><td>Bank Name:
							
							
						<input type="text" name="bank_name"	value="'.$row['bank_name'].'" required>
							
							
							
							
							</td></tr>
							
							
						<tr>	<td>Swift code: 
						
						
						<input type="text" name="swift_code" value="'.$row['bank_swift_code'].'" required>
						
						
						
						
						</td> </tr>
							
							<tr><td>Account number: 
							
							<input type="text" name="acc_number"	value="'.$row['bank_account_number'].'" required>
							
							
							
							
							</td></tr>
							
							
							<tr><td>Country: 
							
							
							
							<input type="text" name="country"	value="'.$row['country'].'" required></td>
							
							
							
										<tr>
										<td>
										<input  class="button special small fit" type ="submit" name="save" value ="Update">
										
										
										
										</td>
										
										
										
										</tr>		
												
											</form>	
												
												
												
												';
												
    }}
												
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
           <h4>Personal account benefits</h4>
			<ul class="benefits">
				<li>
					<i class="pe-7s-check"></i>
					<h5>Receipt for all Transactions</h5>
					Access all your past transactions, and get a receipt for any payment
				</li>
				<li>
					<i class="pe-7s-check"></i>
					<h5>Online account</h5>
					Access to an online account that allows you to make secure payments
				</li>
				<li>
					<i class="pe-7s-check"></i>
					<h5>SMS &amp; Email notifications</h5>
					You can setup reminders and we will remind you when payments are due
				</li>
			</ul>
			
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
