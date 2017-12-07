<?php
include ("db/database.php");
session_start();
$message = array();
$error = false;

    $regid = $_SESSION['login_org'];
    $sql = "SELECT * from organizer WHERE RegID = $regid ";
    $result = $con->query($sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    
    $facebook = (empty($_POST['facebook']))? $row['Facebook'] :cleanup($con,$_POST['facebook']);
    $line = (empty($_POST['line']))? $row['Line'] :cleanup($con,$_POST['line']);    
    $website = (empty($_POST['website']))? $row['Website'] :cleanup($con,$_POST['website']);  

    $sql2= "UPDATE organizer set Facebook = '$facebook', Line = '$line', Website = '$website' WHERE RegID = $regid ";
    $result2 = $con->query($sql2);

    $message["type"] = 'SUCCESS';

    $message["message"] = 'Edited';
        
        

header('Content-type: application/json');
echo json_encode($message);

function cleanup($mysqli,$data){
    return mysqli_real_escape_string($mysqli,trim(htmlentities(strip_tags($data))));
}