<?php
include_once 'php/dbconnect.php';
include_once 'php/functions.php';

sec_session_start();

  if (!login_check($mysqli) == true){
        header("Location: login.php");
            }
            $this_user = $_SESSION['username'];
 $result = $mysqli->query("select * from members WHERE username = '$this_user'");
        while ($row = $result->fetch_assoc()) {
           
            $first_name = $row['First_name'];
            $last_name= $row['Last_name'];
            $phone = $row['phone'];
            $level = $row['level'];
            $bank_name = $row['bank_name'];
            $swift = $row['bank_swift_code'];
            $acc = $row['bank_account_number'];
            $country = $row['country'];
            $member_currency = $row['member_currency'];
            $member_rate = $row['e_rate'];
        }           
     if($first_name ==='' || $last_name ==='' || $phone ==='' || $level ==='' | $bank_name ==='' || $swift ==='' || $acc ==='' || $country ===''){
         header('location:edit_profile.php?error=error');
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
        <title> Send </title>
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
   	      
          <legend>Confirm to send money</legend>
        	
		<?php
					$email = $_GET['email'];
					 $sqluser = "SELECT * FROM members where email = '$email'";
$resultuser = $mysqli->query($sqluser);

if ($resultuser->num_rows > 0) {
    // output data of each row
    while($row = $resultuser->fetch_assoc()){
						$first_name = $row['First_name'];
						$last_name = $row['Last_name'];
						$amount1 = $_GET['amount'];
						$email = $row['email'];
						$amount = round($amount1/$member_rate, 2);
    }
    
    echo '<span style="color:green;"> You are about to send '. $member_currency . ' ' . $amount. ' to ' . $first_name . ' ' .$last_name. '</span>';
    
}else{
    $email = $_GET['email'];
    $amount1 = $_GET['amount'];
    	$amount = round($amount1/$member_rate, 2);
    echo '<span style="color:orange;">You are about to send '. $member_currency . ' ' . $amount . ' to an unregistered person on '. $email . ' . He/she will see this money as soon as he/she registers on Payments</span>';
}

?>
<div class="validation-summary-valid" data-valmsg-summary="true"><ul><li style="display:none"></li>
</ul></div>
<form  class="form-horizontal" action="php/process_send.php" method="POST" name="login_form">



<div class="form-group">
	<label class="control-label" for="buyerEmail">Recipient's email address<span class="field-validation-valid" data-valmsg-for="email" data-valmsg-replace="false">*</span></label>
	<div class="controls input-group">
		<span class="input-group-label"><i class="pe-7s-mail"></i></span>
			<input type="email" name="email" id="email" value="<?php
									
									$email = $_GET['email'];
									echo $email;
									
									?>" placeholder="" readonly/>
	</div>
</div>

<div class="form-group row">
	<div class="column medium-6">
		<label for="buyerPassword" class="control-label">Amount <span class="field-validation-valid" data-valmsg-for="password" data-valmsg-replace="false">*</span></label>
		<div class="input-group">
		  <span class="input-group-label"><i class="pe-7s-lock"></i></span>
		 	<input type="text" name="amount" id="amount" value="<?php
									
									
									echo $amount;
									
									?>" placeholder="Amount" readonly/>
									
	   </div>
	   
	</div>
	
</div>

<div class="form-group">
	<div class="controls input-group">
		<input type="submit" value="Confirm and send" name="send" class="button alert"/>
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
          
        <h4>Keep your account Secure</h4>
        <ul class="hints">
            <li>
                <i class="pe-7s-lock"></i>
                <h5>Password Safety</h5>
                Do not share your password or have it stored on a browser by default unless necessary.
            </li>
            <li>
                <i class="pe-7s-power"></i>
                <h5>Always Logout</h5>
                Once done, always logout so that no one gains access to your account without your knowledge.
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
