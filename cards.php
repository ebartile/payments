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
    
$sql2 = "SELECT commission, min_amt, max_amt, admin_commission FROM agent_commission WHERE id = 1";
$result2 = $mysqli->query($sql2);
    while($row = $result2->fetch_assoc()) {  
           $amount = $row['commission'];
           $max = $row['max_amt'];
           $min = $row['min_amt'];
           $amount1 = $row['admin_commission'];
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
        <title>Scratch / Scan cards manager</title>
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
          <legend>Scratch / Scan cards manager</br>
					</legend>
						<?php 
		if(isset($_GET['success'])){
		echo '<div class="validation-summary-errors" data-valmsg-summary="true"><ul><li>'.$_GET['success']. '</li></ul></div>';
		
		}
			if(isset($_GET['error'])){
		echo '<div class="validation-summary-errors" data-valmsg-summary="true"><ul><li>'.$_GET['error'].'</li></ul></div>';
		
		}
		?>
        	<p><button onclick="openForm()" class="button alt small fit" style="float:right;">Add a card</button> 
        	
        	
        <button onclick="openForm1()" class="button alt small fit" style="float:left;">Agent commission: <?php echo $amount; ?>% <br> Admin commission: <?php echo $amount1; ?>% <br>Maximum amount: <?php echo $min; ?>  <br> Minimum amount: <?php echo $max; ?> <br>(Change this)</button>
        	
        	</p>
			


	    
					<table>
											<thead>
											<tr>
											    	<th>Code on card</th>
													
												<th> Value in <?php echo $gateway_currency; ?></th>
												<th>Sold by?</th>
												<th>Sold at?</th>
												<th>Profit for agent?</th>
												<th>System fee</th>
												<th>Status</th>
												
												
    										
												</tr>
											</thead>
											<tbody>
											   <?php 
										//let us check user
										
$sqluser = "SELECT * FROM scratch_scan_cards ORDER BY id DESC";
$resultuser = $mysqli->query($sqluser);

if ($resultuser->num_rows > 0) {
    // output data of each row
    while($row = $resultuser->fetch_assoc()) {
						
    $value = $row['value_in_dollars'];
    $sold_at = $row['sold_at'];
    $admin_fee = $row['admin_fee'];
    $profit = $value - $sold_at - $admin_fee;
    
    
   
      
        echo
											'<tr>
													<td><a href="#">xxxx</a></td>
													
													<td><span style="color:#2B547E;">' .round($row['value_in_dollars'], 2). '</span>  </td>
													<td>'.$row['generated_by'].'</td>
													<td>'.round($row['sold_at'], 2).'</td>
													<td>'.round($admin_fee, 2).'</td>
													<td>'.round($profit, 2).'</td>
													
														<td><span style="color:#2B547E;">' .$row['status']. '</span>  </td>
													
													
												</tr>';
												
    }}else{
        echo 'No card added so far.';
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
                             
  <form action="php/add_card.php" class="form-container" method="POST">
      <button type="button" class="btn cancel" onclick="closeForm()">Close form </button>
    <p>You are now adding a new Scratch card</p>

    <label for="code"><b>Code to be on CARD</b></label>
    <input type="text" placeholder="Enter Code" name="code" required>

    <label for="psw"><b>Value</b></label>
    <input type="text" name="value" placeholder="Enter value in allowed currency" required />
   
    <label for="psw"><b>Are you a Human? If yes, replace the word YES below with number "1" before submitting.</b></label>
    <input type="text" name="robot" value="YES" required>
    <button type="submit" class="btn" name="submitcard">Submit this card for use in deposits</button>
    
  </form>
</div>



<div class="form-popup" id="myForm1" style="background-color:beige;">
                             
  <form action="php/edit_commission.php" class="form-container" method="POST">
      <button type="button" class="btn cancel" onclick="closeForm1()">Close form </button>
    <p>Note: Commission is always in percentage</p>

    <label for="code"><b>Commission amount in %age (Same is used on Agent withdrawals as percentage of gross fees)</b></label>
    <input type="text" placeholder="Enter Commission" name="commission" value=" <?php echo $amount; ?>" required>

   <label for="code"><b>Minimum amount in <?php echo $gateway_currency; ?></b></label>
    <input type="text" placeholder="Enter minimum amount" name="min" value=" <?php echo $min; ?>" required>
    
     <label for="code"><b>Maximum amount in <?php echo $gateway_currency; ?></b></label>
    <input type="text" placeholder="Enter maximum amount" name="max" value=" <?php echo $max; ?>" required>
    
    <label for="code"><b>Admin Commission amount in %age</b></label>
    <input type="text" placeholder="Enter admin Commission" name="admin_commission" value=" <?php echo $amount1; ?>" required>
   

    <button type="submit" class="btn" name="submitcommission">Save</button>
    
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
	<script>
function openForm1() {
  document.getElementById("myForm1").style.display = "block";
}

function closeForm1() {
  document.getElementById("myForm1").style.display = "none";
}
</script>

</body>


</html>
