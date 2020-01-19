<?php
include_once 'dbconnect.php';
include "functions.php";
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
sec_session_start();
if(isset($_POST["act"])) {
$id = $_POST['id'];
$status = $_POST['status'];
if($status ==='admin'){
    $sql20 = "UPDATE `members` SET `level` = '$status' WHERE `members`.`id` = '$id'";
             if(mysqli_query($mysqli, $sql20)){
                   header('location:../AdminUsers.php?success=User removed from admin access');
               
                    } else {
                       
                    echo "Error updating record: " . mysqli_error($mysqli);
   } 

}elseif($status ==='Personal'){
    $id = $_POST['id'];
    $sql20 = "UPDATE `members` SET `level` = '$status' WHERE `members`.`id` = '$id'";
             if(mysqli_query($mysqli, $sql20)){
                   header('location:../agents.php?success=User profile updated to '. $status);
               
                    } else {
                       
                    echo "Error updating record: " . mysqli_error($mysqli);
                    }  
}elseif($status ==='Verified'){
    $id = $_POST['id'];
    $sql20 = "UPDATE `members` SET `verified_status` = '$status' WHERE `members`.`id` = '$id'";
             if(mysqli_query($mysqli, $sql20)){
                   header('location:../users.php?success=success=User profile updated to '. $status);
               
                    } else {
                       
                    echo "Error updating record: " . mysqli_error($mysqli);
   }  
}
elseif($status ==='Delete'){
    $id = $_POST['id'];
    $sql20 = "DELETE FROM `members` WHERE `members`.`id` = '$id'";
             if(mysqli_query($mysqli, $sql20)){
                   header('location:../AdminUsers.php?success=User profile updated to '. $status);
               
                    } else {
                       
                    echo "Error updating record: " . mysqli_error($mysqli);
   }  
}
elseif($status ==='agent'){
    $id = $_POST['id'];
  $id = $_POST['id'];
    $sql20 = "UPDATE `members` SET `level` = '$status' WHERE `members`.`id` = '$id'";
             if(mysqli_query($mysqli, $sql20)){
                   header('location:../agents.php?success=User profile updated to '. $status);
               
                    } else {
                       
                    echo "Error updating record: " . mysqli_error($mysqli);
   }   
}
else{
    $id = $_POST['id'];
    $sql20 = "UPDATE `members` SET `status` = '$status' WHERE `members`.`id` = '$id'";
             if(mysqli_query($mysqli, $sql20)){
                   header('location:../users.php?success=User profile updated to '. $status);
               
                    } else {
                       
                    echo "Error updating record: " . mysqli_error($mysqli);
   }  
}
    
}
?>