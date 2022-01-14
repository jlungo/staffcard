<?php
	include('conn.php');
   
	   $emp_no=$_POST['emp_no'];
	   $emp_name=$_POST['emp_name'];
      $bank_name=$_POST['bank_name'];
      $bank_branch_address=$_POST['bank_branch_address'];
      $bank_account_number=$_POST['bank_account_number'];
    
	mysqli_query($conn,"insert into bank (emp_no, emp_name, bank_name, bank_branch_address, bank_account_number) values ('$emp_no','$emp_name','$bank_name','$bank_branch_address','$bank_account_number')");
   header('location:bank_report.php');
   mysqli_close($conn);
?>

