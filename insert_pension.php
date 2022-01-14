<?php
	include('conn.php');
   
	   $emp_no=$_POST['emp_no'];
	   $emp_name=$_POST['emp_name'];
      $pension_type=$_POST['pension_type'];
      $pension_number=$_POST['pension_number'];
      $registered_date=$_POST['registered_date'];
      $monthly_contribution=$_POST['monthly_contribution'];
      $current_balance=$_POST['current_balance'];
    
	mysqli_query($conn,"insert into pensions (emp_no, emp_name, pension_type, pension_number, registered_date, monthly_contribution, current_balance) values ('$emp_no','$emp_name','$pension_type','$pension_number','$registered_date','$monthly_contribution','$current_balance')");
   header('location:pension_report.php');
   mysqli_close($conn);
?>

