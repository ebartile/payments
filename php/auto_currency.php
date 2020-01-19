<?php
require_once "dbconnect.php";
require_once "functions.php";
sec_session_start();

  if (!login_check($mysqli) == true){
        header("Location: login.php?error= You must login first to access this page");
            }else{
                
     $this_user = $_SESSION['username'];
							
							$sql = "SELECT level FROM members WHERE username = '$this_user'";
							$result = $mysqli->query($sql);
    while($row = $result->fetch_assoc()) {  
           $level = $row['level'];
    }
    if($level != 'admin'){
        
         header("Location: account.php?error= You have no permission to access this area.");
    }             
                
                
            }

  // change to the free URL if you're using the free version
  //change file_name to your preferred Currency rate API
  $json = file_get_contents("php://input");
  
  //$obj = json_decode($json, true);
//$logFile = "rates.json";
 //$log = fopen($logFile, "a");
  //fwrite($log, $json);
  //fclose($log);

if(!$obj['status']){
    header('location:../currency_rates.php?error=Error while updating currency rates automatically. Try again later or use the Manual method.');
}else{
$sql_default_currency = "SELECT * FROM site_config where id = 1";
$result23 = $mysqli->query($sql_default_currency);
    while($row = $result23->fetch_assoc()) {
    $gateway_currency = $row['gateway_currency'];
    $gateway_currency_symbol = $row['gateway_currency_symbol'];
    }
    
$sql = "SELECT * FROM currency ORDER BY country ASC";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        
        
        $id = $row['id'];
      
         $code = $row['code'];
        
         $rate = 100;
        

         $sql_update= "UPDATE `currency` SET `e_rate`='$rate' WHERE `currency`.`code` ='$code'";
         if(mysqli_query($mysqli, $sql_update)){
            
            header('location:../currency_rates.php?success=Currency rates automatically updated successfully.');
        }else{
             header('location:../currency_rates.php?error=Error while updating currency rates automatically. Try again later or use the Manual method.');
        }
         
         
}
    
    
    
}


}

?>