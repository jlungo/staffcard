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
        $certificate_type = "";
        $issued_by = "";
        $year_issued = "";
        $date_uploaded = "";
        $attachment_name = "";

?>