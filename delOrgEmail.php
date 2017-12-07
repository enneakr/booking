<?php
    include ("db/database.php");    
    session_start();
    $message = array();

    $regid = $_SESSION['login_org'];
    $sql = "DELETE FROM organizeremail WHERE RegID=$regid AND EmailAddress = '".$_GET['email']."' ";

    $result = $con->query($sql);
    $message = "Deleted";

    header('Content-type: application/json');
    echo json_encode($message);
?>