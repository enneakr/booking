<?php
$dbServer = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'booking_db';

$con = new mysqli($dbServer,$dbUser,$dbPass,$dbName);
if($con->connect_error){
    die('Connect Error: '.$mysqli->connect_error);
}



