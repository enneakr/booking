<?php
include ("db/database.php");
session_start();
$message = array();
$error = false;

    
    $facebook = cleanup($con,$_POST['facebook']);
    $line = cleanup($con,$_POST['line']);    
    $website = cleanup($con,$_POST['website']);  

    $regid = $_SESSION['login_org'];
    $sql = "UPDATE organizer set Facebook = '$facebook', Line = '$line', Website = '$website' WHERE RegID = $regid ";
    $result = $con->query($sql);

    $message["type"] = 'SUCCESS';

    $message["message"] = 'Edited';
        
        

header('Content-type: application/json');
echo json_encode($message);

function cleanup($mysqli,$data){
    return mysqli_real_escape_string($mysqli,trim(htmlentities(strip_tags($data))));
}