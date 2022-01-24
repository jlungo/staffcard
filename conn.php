<?php
    $servername='localhost';
    $username='root';
    $password='';
    $dbname='staff_db';
    $conn=mysqli_connect($servername, $username, $password, $dbname);
    if(!$conn){
        die('could not connect mysql server:' .mysql_error());   

     }

     $emp_no =$_POST['emp_no'];
     $emp_name =$_POST['emp_name'];
     $job_desc =$_POST['job_desc'];
     $acc_type =$_POST['acc_type'];
     $acc_desc =$_POST['acc_desc'];
     $Acc_date =$_POST['Acc_date'];
     $any_desc =$_POST['any_desc'];


    ?>
