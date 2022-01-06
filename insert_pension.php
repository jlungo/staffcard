<?php
	include ('conn.php');	
	if(isset($_POST['submit']))
    
        $Emp_No = $_POST['Emp_No'];
        $Emp_Name = $_POST['Emp_Name'];
        $Pension_Type = $_POST['Pension_Type'];
        $Pension_Number = $_POST['Pension_Number'];
        $Registered_Date = $_POST['Registered_Date'];
        $Monthly_Contribution = $_POST['Monthly_Contribution'];
        $Current_Balance = $_POST['Current_Balance'];
	  
        mysqli_query($conn, "insert into pension (Emp_No, Emp_Name, Pension_Type, Pension_Number, Registered_Date, Monthly_Contribution, Current_Balance) values ('$Emp_No','$Emp_Name','$Pension_Type','$Pension_Number','$Registered_Date','$Monthly_Contribution','$Current_Balance')");
     ?>
       <script language="JavaScript">
            alert('Successfully registered. You can now login');
            document.location='admin.php';
        </script>
     mysqli_close($conn);
?>