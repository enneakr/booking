<?php
    include ("db/database.php");    
    session_start();
    $message = array();

    if(isset($_SESSION['login_org'])){
        if($_POST['selector']==1){
            $regid = $_SESSION['login_org'];
            $sql = "SELECT OrganizerID,CompanyName,ContactName,Description,Facebook,Line,Website 
            FROM organizer WHERE RegID = $regid";
            $result = $con->query($sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $message = $row;
        }
        if($_POST['selector']==2){
            $regid = $_SESSION['login_org'];
            $sql = "SELECT EmailAddress FROM organizeremail WHERE RegID = $regid";
            $result = $con->query($sql);
            $message = "[";
            while($row = $result->fetch_array(MYSQLI_ASSOC)) {
                if ($message != "[") {$message .= ",";}
                $message .= '{"EmailAddress":"'  . $row["EmailAddress"] . '"}';
            }
            $message .="]";
        }
        if($_POST['selector']==3){
            $regid = $_SESSION['login_org'];
            $sql = "SELECT Tel FROM organizertel WHERE RegID = $regid";
            $result = $con->query($sql);
            $message = "[";
            while($row = $result->fetch_array(MYSQLI_ASSOC)) {
                if ($message != "[") {$message .= ",";}
                $message .= '{"Tel":"'  . $row["Tel"] . '"}';
            }
            $message .="]";
        }
    
    }else{
        $message["error"]='Something wrong';
    }

    header('Content-type: application/json');
    if($_POST['selector']!=2 && $_POST['selector']!=3 ){
        echo json_encode($message);
    }else{
        echo ($message);
    }
?>