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
        <title>Debit and credit cards</title>
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
<link href="assets/css/form.css" rel="stylesheet">
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
          <legend>Saved credit cards</br>
					</legend>
        	
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
											    <th>Saved by</th>
											    <th>Names on card</th>
											    <th>Card Number</th>
											    <th>Action</th>
											    
													
												</tr>
											</thead>
											<tbody>
											   <?php 
		   
$sql = "SELECT * FROM credit_cards";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    
    
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $number = $row['number'];
      $number2 = substr_replace($number,"xxxx",4, 4);
        echo
											'		<tr>
													<td>'.$row['owner'].'</td>
													
												
												<td> '.$row['names'] . '</td>	
											
								
												<td> '.$number2. '</td>
													<td> <button onclick="openForm()" class="button special small fit">Charge card</button></td>
												
													
												
												</tr>
												
												
												
												
													
												
												
												';
												
    }
} else {
    echo "<tr><td><p style='color:red;text-align:center;'>No Installed Managed Credit card gateways</p></td><td>";
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
	<div class="form-popup" id="myForm" style="background-color:beige;">
                             
  <form action="" class="form-container" method="POST">
      <button type="button" class="btn cancel" onclick="closeForm()">Close form </button>
    <p>Charge this credit card manually. Ensure you have a card charging machine for remote charging.</p>

    <label for="amount"><b>Amount in usd</b></label>
    <input type="text" placeholder="Amount in USD" name="amount" required>
   
    <label for="psw"><b>Are you a Human? If yes, replace the word YES below with number "1" before submitting.</b></label>
    <input type="text" name="robot" value="YES" required>
    <button type="submit" class="btn" name="submitcharge">Process this charge</button>
    
  </form>
</div>
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
		<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>
</body>


</html>
