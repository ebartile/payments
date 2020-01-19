<?php
 ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
 require_once $_SERVER["DOCUMENT_ROOT"] . '/php/dbconnect.php';
 
 //get referring url
 
 $referrer= @$_SERVER['HTTP_REFERER'];
 
 
 //Get fixer access key
 
 
 //GET THE EXCHANGE RATE FEES
 
 
 
 
 
 //get base currency
 
 $sql = "SELECT `gateway_currency` FROM site_config where id = 1";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
		$default_currency = $row['gateway_currency'];
    } }
 //
 
 
// set API Endpoint and API key 
$endpoint = 'latest';
$access_key = '5ffe92db7536de6952dcf795aa6c0424';
$base = $default_currency;
// Initialize CURL:
$ch = curl_init('http://data.fixer.io/api/'.$endpoint.'?access_key='.$access_key.'&base='.$base.'');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Store the data:
$json = curl_exec($ch);
curl_close($ch);

// Decode JSON response:
$exchangeRates = json_decode($json, true);

// Access the exchange rate for different currencies against the base currency

if($exchangeRates['success'] == 1){
foreach ($exchangeRates as $obj) {
    if(is_array($obj)) {
    foreach ($obj as $key => $value) {
   
    //echo 'The exchange rate of '.$key. ' is ' . $value . '</br>';
    
    
    //UPDATE into the exchange rates rates table
    
    $SQL = "INSERT INTO `currency_rates`(`code`, `rate`) VALUES ('$key','$value')";
    
    if(mysqli_query($mysqli, $SQL)){
        
        //redirect if referrer was a website url
        
        if($referrer == 'https://www.binitoo.com/currency_rates.php' || $referrer== 'https://www.binitoo.com/currency_rates.php?success=%20Currency%20rate%20updated%20successfully.'){
          header('location:'.$referrer);  
        }else{
        echo 'Currency rates updated. Base is: '. $default_currency.'<br>';
        }
    }else{
         if($referrer == 'https://www.binitoo.com/currency_rates.php' || $referrer== 'https://www.binitoo.com/currency_rates.php?success=%20Currency%20rate%20updated%20successfully.'){
          header('location:'.$referrer);  
         }else{
        echo 'There is some error while updating currency rates'.mysqli_error($mysqli);
         }
    }
}
}
}

















}else{
 print_r($exchangeRates);   
}











?>