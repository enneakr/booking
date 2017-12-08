<?php
    include ("db/database.php");    
    $message = array();

    $eventid = $_GET['eventid'];
    $sql = "UPDATE event SET isCancel=1 WHERE EventID = $eventid ";
    $result = $con->query($sql);
    $message['type'] = 'SUCCESS';
    $message["message"] = 'Event Created';

    header('Content-type: application/json');
    echo json_encode($message);
?>