<?php
    include ("db/database.php");    
    session_start();
    $message = array();
    $error = false;

    $required = array('eventname','eventtype','startdate','starttime','enddate','endtime','eventdesc','location','ticketname','quantity','ticketprice','startregdate','startregtime','endregdate','endregtime');
    foreach($required as $field){if(empty($_POST[$field])){$error = true;}}


    if(!$error){
        $eventname = cleanup($con,$_POST['eventname']);  
        $eventtype = cleanup($con,$_POST['eventtype']);  
        $startdate = cleanup($con,$_POST['startdate']);  
        $starttime = cleanup($con,$_POST['starttime']);  
        $enddate = cleanup($con,$_POST['enddate']);  
        $endtime = cleanup($con,$_POST['endtime']);  
        $eventdesc = cleanup($con,$_POST['eventdesc']);  
        $location = cleanup($con,$_POST['location']);  
        $ticketname = cleanup($con,$_POST['ticketname']);  
        $quantity = cleanup($con,$_POST['quantity']);  
        $ticketprice = cleanup($con,$_POST['ticketprice']);  
        $startregdate = cleanup($con,$_POST['startregdate']);  
        $startregtime = cleanup($con,$_POST['startregtime']);  
        $endregdate = cleanup($con,$_POST['endregdate']);  
        $endregtime = cleanup($con,$_POST['endregtime']);  
        $regid = $_SESSION['login_org'];
        
        $sql = "SELECT TypeID FROM eventtype WHERE TypeName = '$eventtype'";
        $result = $con->query($sql);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $typeid = $row['TypeID'];

        $sql = "INSERT INTO event (EventName,RegID,StartEventDate,EndEventDate,StartEventTime,EndEventTime,TypeID,Description) 
                VALUES ('$eventname',$regid,'$startdate','$enddate','$starttime','$endtime',$typeid,'$eventdesc')";
        $result = $con->query($sql);

        $sql = "SELECT MAX(EventID) FROM event WHERE RegID = $regid";
        $result = $con->query($sql);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $eventid = $row['MAX(EventID)'];

        $sql = "INSERT INTO tier (Name,MaxQuantity,Price,StartRegDate,EndRegDate,StartRegTime,EndRegTime) 
                VALUES ('$ticketname',$quantity,$ticketprice,'$startregdate','$endregdate','$startregtime','$endregtime')";
        $result = $con->query($sql);

        $sql = "SELECT TierNo FROM tier ORDER BY TierNo DESC LIMIT 1";
        $result = $con->query($sql);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $tierid = $row['TierNo'];
    
        $sql = "INSERT INTO assignlocation (LocationID,EventID,TierNo) 
        VALUES ($location,$eventid,$tierid)";
        $result = $con->query($sql);
        
        $message['type'] = 'SUCCESS';
        $message["message"] = 'Event Created';
    

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