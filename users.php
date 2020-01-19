<?php
include_once 'php/dbconnect.php';
include_once 'php/functions.php';

sec_session_start();

  if (!login_check($mysqli) == true){
        header("Location: login.php");
            }
            
            $this_user = $_SESSION['username'];
							
							$sql = "SELECT level FROM members WHERE username = '$this_user'";
							$result = $mysqli->query($sql);
    while($row = $result->fetch_assoc()) {  
           $level = $row['level'];
    }
    if($level !== 'admin'){
        
        header('location:account.php');
            
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
        <title> Admin users </title>
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
          <legend>All users </legend>
        	<form action ="userDetails.php" METHOD="GET" >
        	 <label class="control-label" for="buyerFirstName">Email address  <span class="field-validation-valid" data-valmsg-for="firstName" data-valmsg-replace="false">*</span></label>
<div class="form-group row">
	<div class="column medium-6">
		<div class="input-group">
		  <span class="input-group-label"><i class="pe-7s-user"></i></span>
		 <input type="text" placeholder="Enter email" name="email" required>
	   </div>
	</div>
	<div class="column medium-6">
		<div class="input-group">
		  <span class="input-group-label"><i class="pe-7s-user"></i></span>
			<input type="submit" value="Search user" class="button alert" name="search">
	   </div>
	</div>

</div>   
        	    
     
        	</form>
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
											    	<th>Full names</th>
													
												
												
												<th>Aaccount type</th>
												<th>Available balance</th>
												<th>Actions</th>
    										
												</tr>
											</thead>
											<tbody>
											   <?php 
										//let us check user
										
$sqluser = "SELECT * FROM members WHERE level !='admin' ORDER BY id DESC";
$resultuser = $mysqli->query($sqluser);

if ($resultuser->num_rows > 0) {
    // output data of each row
    while($row = $resultuser->fetch_assoc()) {
						$level = $row['level'];
    
   
      
        echo
											'<tr>
													<td><a href="userDetails.php?code=XlAPCHF526628GSHAJ'.$row['id'].'">'.$row['First_name'].' '.$row['Last_name'].'</a></td>
												
														<td><span style="color:#2B547E;">' .$row['level']. '</span>  </td>
													<td>'.$gateway_currency.'. '.$row['available_balance'].'</td>
													
														<td>
														<form action="php/process_user_manager.php" method="POST">
														<input type="hidden" name="id" value ="'.$row['id'].'">
														<select name="status"  style="width:100px; height:30px; font-size:13px;">
														
								
														<option value="" hidden>Act now</option>
													
														<option value="Suspended">Suspend</option>
														<option value="Limited">Limited</option>
														
														<option value="Banned">Banned</option>
														
															<option value="Verified">Verify</option>
															<option value="Delete">Delete</option>
															
															<option value="admin">Make Admin</option>
														<option value="agent">Make Agent</option>
														
														</select><br>
													<input style="width:100px; height:30px; font-size:12px;" type="submit" name="act" value ="Save">	
														
														
														</form>
														
														
														
														
														</td>
												</tr>';
												
    }}else{
        echo 'No users registered yet';
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
