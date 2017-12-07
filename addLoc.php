<?php
    include ("db/database.php");    
    session_start();
    $message = array();
    $error = false;

    if(empty($_POST['loc'])){$error = true;}

    if(!$error){
        $loc = cleanup($con,$_POST['loc']);   
        
        $sql = "INSERT INTO location (LocationName) VALUES ('$loc')";
        $result = $con->query($sql);
    
        $message['type'] = 'SUCCESS';
        $message["message"] = 'Location insert';
    

    }else{
        $message["type"] = 'FAIL';
        $message["message"] = 'Field is null';
    }

    header('Content-type: application/json');
    echo json_encode($message);

    function cleanup($mysqli,$data){
        return mysqli_real_escape_string($mysqli,trim(htmlentities(strip_tags($data))));
    }
?>