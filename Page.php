<?php
error_reporting(E_ALL); ini_set('display_errors', 1);
include_once 'php/dbconnect.php';
include_once 'php/functions.php';
sec_session_start();
    if(isset($_GET['code'])){
      $code = $_GET['code'];
	$id = preg_replace('/XlAPCHF526628GSHAJ/', '', $code);  
	   
	 $sql = "SELECT * FROM cms where alias = '$id'";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $title = $row['title'];
        $alias = $row['alias'];
         $body = $row['body'];
         $status = $row['status'];
    }}}else{
        header("Location: index.php?error= Page not found.");
    }
?>

<!DOCTYPE html>
<html lang="en" xmlns:fb="http://ogp.me/ns/fb#">
    
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="author" content="" />
        <meta name="description" content="<?php echo  $title; ?>" /> 
        <meta property="og:image" content="content/assetbase/img/pp-logo-2.png" />
        <title><?php echo  $title; ?></title>
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
          <legend> </legend>
        	
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
													
													
												
													
												</tr>
											</thead>
											<tbody>
											   <?php 
							$code = $_GET['code'];
						$id = preg_replace('/XlAPCHF526628GSHAJ/', '', $code);				   
	 $sql = "SELECT * FROM cms where alias = '$id'";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $title = $row['title'];
        $alias = $row['alias'];
         $body = $row['body'];
         $status = $row['status'];
         
      
    
        echo
											'<tr>
												
												</tr>
											<tr><td><h1><span style="color:#2B547E;">' .$row['title']. '</span></h1></td></tr>			
													<tr><td><span style="color:#2B547E;">' .$row['body']. '</span></td></tr>
													
													
												
												
													';
    }										
      } else {
    
    //report as under. Real meaning is --- that transaction does not concern logged in user
    echo "<p style='color:red;text-align:center;'>This page does not exist. <a href='account.php'>Go back to account overview</a>.</p>";
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
