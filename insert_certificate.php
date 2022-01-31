<?php
   session_start();
	include('conn.php');
   
	   $emp_no=$_POST['emp_no'];
      $certificate_type=$_POST['certificate_type'];
      $issued_by=$_POST['issued_by'];
      $year_issued=$_POST['year_issued'];
      $date_uploaded=$_POST['date_uploaded'];
     // $attachment_name=$_POST['attachment_name'];

                   $coictName = $_FILES['attachment_name']['name'];
                   $coicttemp = $_FILES['attachment_name']['tmp_name'];
                    $coictSize = $_FILES['attachment_name']['size'];
                   $coictType = $_FILES['attachment_name']['type'];
   $user = $conn->query("SELECT CONCAT(Firstname, ' ', Lastname) as name FROM Users WHERE Staffid = '$emp_no'")->fetch_assoc();
   if (empty($user)) {
      $_SESSION['invalidUserCert'] = 'set';
      header('location:certificate_report.php');
      $
   }
   else {
      $emp_name = $user['name'];
      mysqli_query($conn,"insert into certificates (emp_no, emp_name, certificate_type, issued_by, year_issued, date_uploaded, attachment_name) 
   values ('$emp_no','$emp_name','$certificate_type','$issued_by','$year_issued','$date_uploaded', '$coictName')");
      header('location:certificate_report.php');
      mysqli_close($conn);
   }
?>

