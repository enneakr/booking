<?php
    include ("db/database.php");    
    session_start();
    $message = array();

    $regid = $_SESSION['login_org'];
    $sql = "DELETE FROM organizertel WHERE RegID=$regid AND Tel = '".$_GET['tel']."' ";

    $result = $con->query($sql);
    $message = "Deleted";

    header('Content-type: application/json');
    echo json_encode($message);
?>