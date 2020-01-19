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
    if($level !== 'agent'){
        
        header('location:account.php');
            
    }
    
							$sql2 = "SELECT commission FROM agent_commission WHERE id = 1";
							$result2 = $mysqli->query($sql2);
    while($row = $result2->fetch_assoc()) {  
           $amount = $row['commission'];
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
        <title>Generate card voucher</title>
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
          <legend>Generate a card Voucher</legend>
        	
			<?php 
		if(isset($_GET['success'])){
		echo '<div class="validation-summary-errors" data-valmsg-summary="true"><ul><li>'.$_GET['success']. '</li></ul></div>';
		
		}
			if(isset($_GET['error'])){
		echo '<div class="validation-summary-errors" data-valmsg-summary="true"><ul><li>'.$_GET['error'].'</li></ul></div>';
		
		}
		?>	


	<form  class="form-horizontal" action="voucher_confirm.php" method="POST" name="login_form">



<div class="form-group">
	<label class="control-label" for="buyerEmail">Recipient's phone<span class="field-validation-valid" data-valmsg-for="email" data-valmsg-replace="false">*</span></label>
	<div class="controls input-group">
		<span class="input-group-label"><i class="pe-7s-mail"></i></span>
			<input type="text" name="contact" id="email" placeholder="Recipient's phone" required/>
	</div>
</div>

<div class="form-group row">
	<div class="column medium-6">
		<label for="buyerPassword" class="control-label">Value (Amount) <span class="field-validation-valid" data-valmsg-for="password" data-valmsg-replace="false">*</span></label>
		<div class="input-group">
		  <span class="input-group-label"><i class="pe-7s-lock"></i></span>
		  <input type="text" name="amount" id="amount" placeholder="Amount" required/>
								
	   </div>
	   
	</div>
	
</div>

<div class="form-group">
	<div class="controls input-group">
		<input type="submit" value="Generate" name="generate" class="button alert"/>
	</div>
</div>
</form>
<?php
				 if (isset($_GET['cancel_url'])) {
            echo '<p style="color:gray;" class="error"><a href="'.$_GET['cancel_url'].'">Return to Merchant</a></p>';
        }
				
				
				?>

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
