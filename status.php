<?php
    session_start();
    $message = array();

    if(isset($_SESSION['login_user'])){
        $message["type"]='ACTIVE';
    }else{
        $message["type"]='EMPTHY';
    }
    header('Content-type: application/json');
    echo json_encode($message);
?>