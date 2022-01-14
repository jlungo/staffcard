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
        $bank_name = "";
        $bank_branch_address = "";
        $bank_account_number = "";

?>