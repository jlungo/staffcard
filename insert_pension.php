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
	  
        $sql = "INSERT INTO pension (Emp_No, Emp_Name, Pension_Type, Pension_Number, Registered_Date, Monthly_Contribution, Current_Balance) VALUES ('$Emp_No','$Emp_Name','$Pension_Type','$Pension_Number','$Registered_Date','$Monthly_Contribution','$Current_Balance')";
        if (mysqli_query($conn, $sql)) {
         echo "New record has been added successfully !";
         header('location:pension_report.php');
      } else {
         echo "Error: " . $sql . ":-" . mysqli_error($conn);
      }
      mysqli_close($conn);
?>