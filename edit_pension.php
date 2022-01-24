<?php
require_once 'conn.php';
if (isset($_POST['submit'])) {

	    $emp_no=$_POST['emp_no'];
	    $emp_name=$_POST['emp_name'];
        $pension_type=$_POST['pension_type'];
        $pension_number=$_POST['pension_number'];
        $registered_date=$_POST['registered_date'];
        $monthly_contribution=$_POST['monthly_contribution'];
        $current_balance=$_POST['current_balance'];
		
	    mysqli_query($conn,"UPDATE pensions SET emp_no='$emp_no', emp_name='$emp_name', pension_type='$pension_type', pension_number='$pension_number', registered_date='$registered_date', monthly_contribution='$monthly_contribution', current_balance='$current_balance',  WHERE emp_no='$emp_no'");//update query
	
        header('location:pension_report.php');
}

?>