<?php
    include ("db/database.php");    
    session_start();
    $message = array();

    $email = cleanup($con,$_POST['email']);   

    $regid = $_SESSION['login_org'];
    $sql = "INSERT INTO organizeremail (RegID,EmailAddress) VALUES ($regid,'$email')";
    $result = $con->query($sql);

    $message = 'SUCCESS';

    header('Content-type: application/json');
    echo json_encode($message);

    function cleanup($mysqli,$data){
        return mysqli_real_escape_string($mysqli,trim(htmlentities(strip_tags($data))));
    }
?>