<?php
include ("db/database.php");
session_start();
$message = array();
$error = false;

if($_POST['stype']=='Logout'){
    session_unset();
    session_destroy();
    $message["type"] = 'REMOVED';
    $message["message"] = 'Organizer has logged out ';
}

if($_POST['stype']=='Login'){
    $required = array('username','password');
    foreach($required as $field){if(empty($_POST[$field])){$error = true;}}

    if(!$error){
        $username = cleanup($con,$_POST['username']);
        $password = cleanup($con,$_POST['password']);   
        
        $sql = "SELECT * from organizer WHERE OrganizerID='$username' AND Password='$password' AND ApprovedStatus=1";
        $result = $con->query($sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $row_count = $result->num_rows;
        if($row_count){
            $_SESSION['login_org'] = $row['RegID'];
            $message['message'] = 'Welcome '.$row['CompanyName'];
            $message["type"] = 'LOGIN';
        }else{
            $message['message'] =  'Incorrect User information';
            $message["type"] = 'FAIL';
        }
    }else{
        $message["type"] = 'FAIL';
        $message["message"] = 'Missing Field';
    }
}

if($_POST['stype']=='Register'){
    $required = array('company','contact','email','tel','date','note');
    foreach($required as $field){if(empty($_POST[$field])){$error = true;}}

    $company = cleanup($con,$_POST['company']);
    $contact = cleanup($con,$_POST['contact']);    
    $email = cleanup($con,$_POST['email']);   
    $tel = cleanup($con,$_POST['tel']);   
    $date = cleanup($con,$_POST['date']);
    $note = mysqli_real_escape_string($con,$_POST['note']);   

    $username = 'org'.generatePassword(7); 
    $password = generatePassword(6);

    // check for valid email address
    if( !filter_var($email,FILTER_VALIDATE_EMAIL)){
        $error=true;
        $message["error"] = 'Invalid email';
    }
    

    $sql = "SELECT OrganizerID FROM organizer WHERE OrganizerID ='$username'";
    $result = $con->query($sql);
    $row_count = $result->num_rows;
   
    while($row_count){
        $username = 'org'.generatePassword(7);
        $sql = "SELECT OrganizerID FROM organizer WHERE OrganizerID ='$username'";
        $result = $con->query($sql);
        $row_count = $result->num_rows; 
    }
    if(!$error){
        $sql = "INSERT INTO organizer (OrganizerID,Password,CompanyName,ContactName,RegNote,ContactTime) VALUES ('$username','$password','$company','$contact','$note','$date')";
        $result = $con->query($sql);

        $sql = "SELECT RegID from organizer WHERE OrganizerID = '$username' ";
        $result = $con->query($sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $regid = $row['RegID'];

        $sql = "INSERT INTO organizeremail (RegID,EmailAddress) VALUES ($regid,'$email')";
        $result = $con->query($sql);

        $sql = "INSERT INTO organizertel (RegID,Tel) VALUES ($regid,'$tel') ";
        $result = $con->query($sql);

        $message["type"] = 'SUCCESS';
        // email out token info
        //$messageout = '<a href="http://localhost/sample_1/val.php??email='.$email.'&token='.$token.'">Click the link or enter in the token '.$token.'</a>';
        //send_mail($myemail,'Activate',$messageout);

        $message["message"] = 'Application sent please wait for responding';
        
    }else{
        $message["type"] = 'FAIL';
        $message["message"] = 'Data error';
    }
}

header('Content-type: application/json');
echo json_encode($message);

function cleanup($mysqli,$data){
    return mysqli_real_escape_string($mysqli,trim(htmlentities(strip_tags($data))));
}

function generatePassword($length) {
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $count = mb_strlen($chars);

    for ($i = 0, $result = ''; $i < $length; $i++) {
        $index = rand(0, $count - 1);
        $result .= mb_substr($chars, $index, 1);
    }

    return $result;
}

  