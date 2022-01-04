<?php 
    session_start();
    include("db_connect.php"); 
    if(isset($_COOKIE['adminid'])){$adminid = $_COOKIE['adminid'];}

  
    if(isset($_GET['id'])){

    $id=mysqli_real_escape_string($db,$_GET['id']);
    $pagex = 'leavereport.php';
    $deletequery = "DELETE FROM leaves WHERE id=$id";
    $db->query($deletequery) or die('Error1, query failed');	
    }

    header("Location:$pagex");
?>