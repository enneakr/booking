<?php
    include ("db/database.php");    
    session_start();
    $message = array();

    $tel = cleanup($con,$_POST['tel']);   

    $regid = $_SESSION['login_org'];
    $sql = "INSERT INTO organizertel (RegID,Tel) VALUES ($regid,'$tel')";
    $result = $con->query($sql);

    $message = 'SUCCESS';

    header('Content-type: application/json');
    echo json_encode($message);

    function cleanup($mysqli,$data){
        return mysqli_real_escape_string($mysqli,trim(htmlentities(strip_tags($data))));
    }
?>