<?php
    $servername='localhost';
    $username='root';
    $password='';
    $dbname = "staff_db";
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
      if(!$conn){
          die('Could not Connect MySql Server:' .mysql_error());
        }
        $Emp_No = "";
        $Emp_Name = "";
        $Pension_Type = "";
        $Pension_Number = "";
        $Registered_Date = "";
        $Monthly_Contribution = "";
        $Current_Balance = "";

?>