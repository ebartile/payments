<?php
/**
 * Copyright (C) 2013 peredur.net
 * 
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
include_once 'php/dbconnect.php';
include_once 'php/functions.php';

sec_session_start();

  if (!login_check($mysqli) == true){
        header("Location: login.php");
            }
    
?>
<!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Edit Profile - Payment Gateway</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<?php require_once "inc/user_header.php"; ?>
				</header>

			<!-- Main -->
				<section id="main" class="container">
					<!--<header>--->
					
						<p>	 <?php
        if (isset($_GET['error'])) {
            echo '<p style="color:red;" class="error">Sorry! Card already used.</p>';
        }
        if (isset($_GET['error2'])) {
            echo '<p style="color:red;" class="error2">Sorry!! Card is invalid. Purchase another one at one of our outlets.</p>';
        }
         if (isset($_GET['success3'])) {
            echo '<p style="color:green;" class="suucess3">Deposit successful.</p>';
        }
        
        if (isset($_GET['success6'])) {
            echo '<p style="color:green;" class="success6">Deposit Payment has been Approved succesfully.</p>';
        }
        if (isset($_GET['success5'])) {
            echo '<p style="color:orange;" class="success5">Deposit Payment has been Rejected succesfully.</p>';
        }
         if (isset($_GET['success7'])) {
            echo '<p style="color:orange;" class="success7">Withdrawal request has been rejected successfully.</p>';
        }
         if (isset($_GET['success8'])) {
            echo '<p style="color:green;" class="success8">Withdrawal request has been Approved successfully.</p>';
        }
        
        if (isset($_GET['success9'])) {
            echo '<p style="color:green;" class="success9">Withdrawal request has been submitted. It will be completed within 24 business hours.</p>';
        }
        ?>	
				</p>
					<!---</header>--->
				
					<div class="box">
					    
					    <div style="width:20%; float:left; margin:20px; border: 1px solid #fff; padding:10px;">
					        <div>
					            Available balance
					            <hr>
					        <div id="balance">
					           
					                        <?php
 
$sql = "SELECT * FROM members where username = '".$_SESSION['username']."'";
$result = $mysqli->query($sql);
    while($row = $result->fetch_assoc()) {
      $level = $row['level'];
      $available_balance = $row['available_balance'];
    }
      if($level !== 'admin'){
        echo '<span>
				    
						
							<p style="color:#096669;font-size:22px;font-weight: bold;">$ '.$available_balance.' USD</p>
								
				</span>';
    

        } else{
            
          $sql2 = "SELECT sum(available_balance) as available_balance FROM members";
$result2 = $mysqli->query($sql2);
    while($row = $result2->fetch_assoc()) {  
            $total_bal = $row['available_balance'];
          
           
            echo '<span>
				    
						
							<p style="color:#096669;font-size:22px;font-weight: bold;"> $ '.$total_bal.' USD <br><span style="color:gray;font-size:12px;font-weight: thin;">(Total for all users)</span> </p>
								
				</span>';
				
        }}
            ?>
					            
					            
					            
					            </div>
					            
					            </div><br>
					            <ul class="actions">
					      <li><a href="deposit.php" style="width:50px; padding:2px;" class="button alt small">Deposit</a></li>
					      <li><a href="withdraw.php" style="width:80px; padding:2px;"class="button alt small">Withdraw</a></li></ul><hr>
					      <a href="send.php">Send</a><br>
					      <a href="request.php">Request</a>
					        
					    </div>
				<table style="width:70%;">
											<thead>
											<tr>
											    <th><a href="account.php">Recent activity</a></th>
													
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
											<form>
											
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
											
											<input type="text"	name="first_name" value="'.$row['Last_name'].'" required></td>
													
													</tr>
													
												<tr><td>Email: 	 '.$row['email'].' </td></tr>
													
												<tr>	<td>Account type: 
												<select name="account_type">
												<option value="	'.$row['level'].'">'.$row['level'].'</option>
												
										<option value="Personal">Personal</option>
										
											<option value="Business">Business</option>
												
											</td> </tr>
												
						<tr><td>Payment institutions<hr></td></tr>
						
							<tr><td>Bank Name:
							
							
						<input type="text" name="bank_name"	value="'.$row['bank_name'].'" required>
							
							
							
							
							</td></tr>
							
							
						<tr>	<td>Swift code: 
						
						
						<input type="text" name="swfit_code"	value="'.$row['bank_swift_code'].'" required>
						
						
						
						
						</td> </tr>
							
							<tr><td>Account number: 
							
							<input type="text" name="acc_number"	value="'.$row['bank_account_number'].'" required>
							
							
							
							
							</td></tr>
							
							
							<tr><td>Country: 
							
							
							
							<input type="text" name="country"	value="'.$row['country'].'" required></td>
							
							
							<tr><td>Account status: <input type="text" name="status"	value="'.$row['status'].'" readonly></td>
							
												</tr>
										<tr>
										<td>
										<input  class="button special small fit" type ="submit" name="save" value ="Update">
										
										
										
										</td>
										
										
										
										</tr>		
												
											</form>	
												
												
												
												';
												
    }
} else {
    echo "<tr><td><p style='color:red;text-align:center;'>No such  USER.</p></td><td>";
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
										
					</div>
				
				</section>

			<!-- Footer -->
			<?php require_once "inc/footer.php"; ?>

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>