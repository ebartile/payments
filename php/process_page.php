<?php
include_once 'dbconnect.php';
include_once 'functions.php';

sec_session_start();
if(isset($_POST['publish'])){
   $title = $_POST['title'];
    $body = mysqli_real_escape_string($mysqli, $_POST['body']);
    $descr = $title;
    $keywords = $title;
    $date = date('Y-m-d h:i:s');
    $type = $_POST['type'];
    $vp_string = $type.'-'.$title;
     $vp_string = trim($vp_string);

        $vp_string = html_entity_decode($vp_string);

        $vp_string = strip_tags($vp_string);

        $vp_string = strtolower($vp_string);

        $vp_string = preg_replace('~[^ a-z0-9_.]~', ' ', $vp_string);

        $vp_string = preg_replace('~ ~', '-', $vp_string);

        $vp_string = preg_replace('~-+~', '-', $vp_string);

        $vp_string .= "/";
$sql = "SELECT * FROM cms WHERE alias ='$vp_string'";
$result = $mysqli->query($sql);

if ($result->num_rows <= 0) {
 
     $sql = "INSERT INTO `cms`
( 
`title`, `descr`, `keywords`, `body`, `alias`, `type`, `time`, `status`
)  
VALUES  
( 
'$title', 
'$descr',
'$keywords',
'$body',
'$vp_string',
'$type',
'$date',
'Published'
)";

         if(mysqli_query($mysqli, $sql)){
                header('Location:../content.php?success=A new page has been added successfully. It automatically appears in ' .$type. ' section.');
                    } else {
                    echo "Error updating record: " . mysqli_error($mysqli);
   } 
}else{
     header('Location:../content.php?error=You already have a page with this title in ' .$type. ' section.');
}   
}else{
    echo 'POST issue';
}

?>