<?php

// database connection
require_once 'db/database.php';

$email = cleanup($con,$_POST['email']);
$password = md5(cleanup($con,$_POST['password']));
$username = cleanup($con,$_POST['username']);
$error = array();

$sql = "SELECT name FROM users WHERE name = '".$username."'";

$result = $con->query($sql);
$row_count = $result->num_rows;

//validation
if($row_count){$error['mesaage']='already there';}

if(!empty($error)){
    echo 'There was an error';
}else{
     //insert data
    $sql_new = "INSERT INTO users (name,email,password) VALUES ('".$username."','".$email."','".$password."')";

    if($con->query($sql_new)===TRUE){
        echo "inserted new record";
    }else{
        echo "there was an error?";
    }
}
echo $row_count;

function cleanup($mysqli,$data){
    return mysqli_real_escape_string($mysqli,trim(htmlentities(strip_tags($data))));
}