<?php
$db = new mysqli("localhost","root","root");
if($db->connect_errno > 0){
die('Unable to connect to database [' . $db->connect_error . ']');  } 

//connection to  push Education history
$servername ='localhost';
$username='root';
$password='root';
$dbname ="staff_db";
