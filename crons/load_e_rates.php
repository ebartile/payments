<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once '../php/dbconnect.php';
include_once '../php/config.inc.php';

$sql = "SELECT * FROM currency";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $code = $row['code'];
        $rate = $row['e_rate'];
        
        //echo $code . '</br>';
        
        $sql2 = "UPDATE `members` SET `e_rate`='$rate' WHERE `members`.`member_currency`= '$code'";
        if(mysqli_query($mysqli, $sql2)){
            
            header('location:../admin.php?success=Currency rates uploaded and updated successfully.');
        }else{
             header('location:../admin.php?error=Error while updating currency rates. Try again later.');
        }
        
        
    }
    
    
    
    
}


















?>