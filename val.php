<?php
include('db/database.php');

if(isset($_GET['email'])){$email=cleanup($con,$_GET['email']);}
if(isset($_GET['token'])){$token=cleanup($con,$_GET['token']);}

if(isset($email) && isset($token)){
    $sql = "UPDATE users SET tokenvalid = 1 WHERE (email='$email' AND token='$token') LIMIT 1";
    $result = $con->query($sql);
    echo 'Your account is now valid you can log in <a href="index.php">login</a>';
}else{
    echo 'ERROR';
}

function cleanup($mysqli,$data){
    return mysqli_real_escape_string($mysqli,trim(htmlentities(strip_tags($data))));
}

?>

