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
        <title> Bitcoin transactions</title>
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
          <legend>Real time Bitcoin Transactions</br>
						Bitcoin deposits will appear here.</legend>
        	
			<?php 
		if(isset($_GET['success'])){
		echo '<div class="validation-summary-errors" data-valmsg-summary="true"><ul><li>'.$_GET['success']. '</li></ul></div>';
		
		}
			if(isset($_GET['error'])){
		echo '<div class="validation-summary-errors" data-valmsg-summary="true"><ul><li>'.$_GET['error'].'</li></ul></div>';
		
		}
		?>	


	    
				<table style="width:100%;">
											<thead>
											<tr>
											    <th><a href="account.php">Recent activity</a></th>
												</tr>
											</thead>
											<tbody>
											   <?php 
										//let us check user
										
										 $sqluser = "SELECT * FROM members where username = '".$_SESSION['username']."'";
$resultuser = $mysqli->query($sqluser);

if ($resultuser->num_rows > 0) {
    // output data of each row
    while($row = $resultuser->fetch_assoc()) {
						$level = $row['level'];
    }
    if($level ==='admin'){
											   
											   
											    $sql = "SELECT * FROM invoices ORDER BY id DESC LIMIT 10";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo '<tr>
    <th>Transaction Id</td>
    <th>Date</td>
    <th>Raised By</td>
    <th>Amount</td>
    <th>Payment status</td>
    <th>Recieving Bitcoin address</td>
    
    </tr>';
    while($row = $result->fetch_assoc()) {
      
        echo
											'<tr>
													<td><a href="#">'.$row['id'] . '</a></td>
													<td><a href="#">'. date('d F, Y (H:i:s)', strtotime($row['TransTime'])) . ' hrs</a></td>
													<td><span style="color:#2B547E;"> '.$row['raised_by'].' </span></td>
													<td>Usd: '.$row['amount'].'</td>
						
							<td> '.$row['payment_status'].'</td>
							<td> '.$row['bitcoin_address'].'</td>
												</tr>';
												
    }
} else {
    echo "<p style='color:red;text-align:center;'>No Bitcoins Transaction done so far..</p>";
}		
	}else{
	        $sql = "SELECT * FROM transactons WHERE status ='Completed' ORDER BY transaction_id DESC";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      
        echo
											'<tr>
													
													<td><a href="singlePayment.php?code=XlAPCHF526628GSHAJ'.$row['transaction_id'].'">'. date('d F, Y', strtotime($row['date'])) . '</a></td>
													<td><span style="color:#2B547E;">' .$row['naration']. '</span> '.$row['sender_name'].' By <span style="color:#2B547E;">' .$row['recipient_name']. '</span> '.' </br> '.$row['status'].' 
													
													
													
													
													
													
													
													</td>
													<td>'.$row['transaction_type'].' <br> Ref #. '.$row['reference_number'].'</td>
						
							<td>$ '.$row['net_amt'].' USD</td>
												</tr>';
												
    }
} else {
    echo "<p style='color:red;text-align:center;'>You have not send or received money recently.</p>";
}
	}
	
	
	
	
	
	
	}								?>
											
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
