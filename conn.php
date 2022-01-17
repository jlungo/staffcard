<?php
    $servername='localhost';
    $username='root';
    $password='';
    $dbname = "staff_db";
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
      if(!$conn){
          die('Could not Connect MySql Server:' .mysql_error());
        }
        $emp_no = "";
        $emp_name = "";
        $pension_type = "";
        $pension_number = "";
        $registered_date = "";
        $monthly_contribution = "";
        $current_balance = "";

?>