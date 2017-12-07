<?php
include ("db/database.php");
session_start();
$message = array();
$error = false;

if($_POST['stype']=='Logout'){
    session_unset();
    session_destroy();
    $message["type"] = 'REMOVED';
    $message["message"] = 'User has logged out ';
}

if($_POST['stype']=='Login'){
    $required = array('username','password');
    foreach($required as $field){if(empty($_POST[$field])){$error = true;}}

    if(!$error){
        $username = cleanup($con,$_POST['username']);
        $password = md5(cleanup($con,$_POST['password']));   
        
        $sql = "SELECT UserID from user WHERE UserID='$username' AND Password='$password' AND tokenvalid=1";
        $result = $con->query($sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $row_count = $result->num_rows;
        if($row_count){
            $_SESSION['login_user'] = $row['UserID'];
            $message['message'] = 'Welcome '.$row['UserID'];
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
    $required = array('username','email','password','firstname','lastname');
    foreach($required as $field){if(empty($_POST[$field])){$error = true;}}

    $username = cleanup($con,$_POST['username']);
    $email = cleanup($con,$_POST['email']);    
    $password = md5(cleanup($con,$_POST['password']));   
    $firstname = cleanup($con,$_POST['firstname']);   
    $lastname = cleanup($con,$_POST['lastname']);   

    // check for valid email address
    if( !filter_var($email,FILTER_VALIDATE_EMAIL)){
        $error=true;
        $message["error"] = 'Invalid email';
    }
    if(!preg_match('/^[A-Za-z]{1}[A-Za-z0-9]{5,31}$/',$username)){
        $error = true;
        $message["error"] = 'Bad username format';
        $message["type"] = 'Fail';
    }

    $sql = "SELECT UserID FROM User WHERE UserID ='$username'";
    $result = $con->query($sql);
    $row_count = $result->num_rows;
   
    if($row_count){
        $error = true;
        $message["type"] = 'FAIL';
        $message["message"] = 'Cannot use that username';
    }
    if(!$error){
        $token = sha1(uniqid()); 
        $sql2 = "INSERT INTO User (UserID,EmailAddress,token,Password,FirstName,LastName,JobID) VALUES ('$username','$email','$token','$password','$firstname','$lastname',1)";
        $result2 = $con->query($sql2);
        $message["type"] = 'SUCCESS';
        // email out token info
        $messageout = '<a href="http://localhost/sample_1/val.php??email='.$email.'&token='.$token.'">Click the link or enter in the token '.$token.'</a>';
        //send_mail($myemail,'Activate',$messageout);

        $message["message"] = 'Email sent please active before you login';
        
    }else{
        $message["type"] = 'FAIL';
        $message["message"] = 'Data error';
    }
}

header('Content-type: application/json');
echo json_encode($message);

function send_mail($to,$subject,$body){
    $from = 'noresponse@localhost.com';
    $header = '';
    $header .= 'From: $from\n';
    $header .= 'Reply-to: $from\n';
    $header .= 'Return-Path: $from\n';
    $header .= 'MIME-Version:1.0';
    $body .= '<br>thank you';
    mail($to,$subject,$body,$header);
    
    
}

function cleanup($mysqli,$data){
    return mysqli_real_escape_string($mysqli,trim(htmlentities(strip_tags($data))));
}