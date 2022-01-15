<?php
	include('conn.php');
   
	   $emp_no=$_POST['emp_no'];
	   $emp_name=$_POST['emp_name'];
      $certificate_type=$_POST['certificate_type'];
      $issued_by=$_POST['issued_by'];
      $year_issued=$_POST['year_issued'];
      $date_uploaded=$_POST['date_uploaded'];
      $attachment_name=$_POST['attachment_name'];
    
	mysqli_query($conn,"insert into certificates (emp_no, emp_name, certificate_type, issued_by, year_issued, date_uploaded, attachment_name) values ('$emp_no','$emp_name','$certificate_type','$issued_by','$year_issued','$date_uploaded', '$attachment_name')");
   header('location:certificate_report.php');
   mysqli_close($conn);
?>

