<?php
	include "Conn.php";
   require "upload.php";
	// if(isset($_POST['submit']))
    
   //    $Emp_No = $_POST['Emp_No'];
   //     $Emp_Name = $_POST['Emp_Name'];
   //    $Objective = $_POST['Objective'];
	//   $Apraisee_score = $_POST['Apraisee_score'];
	//   $Supervisor_score = $_POST['Supervisor_score'];
	//   $Performance_score = $_POST['Performance_score'];
	//   $Recommendations = $_POST['Recommendations'];
	  
   //   $sql = "INSERT INTO opras (Emp_No,Emp_Name,Objective,Apraisee_score,Supervisor_score,Performance_score,Recommendations) VALUES ('$Emp_No','$Emp_Name','$Objective','$Apraisee_score','$Supervisor_score','$Performance_score','$Recommendations')";
    
    
     if(isset($_POST['submit']))
    
     $Emp_No = $_POST['EmpNo'];
      $Emp_Name = $_POST['EmpName'];
     $Objective = $_POST['Idtyp'];
    $Apraisee_score = $_POST['IdNo'];
    $Supervisor_score = $_POST['	IssueDate'];
    $Performance_score = $_POST['Expdate'];
    $Recommendations = $_POST['POI'];
    
    $sql = "INSERT INTO idinfo (EmpNo,EmpName,Idtyp,IdNo,IssueDate,Expdate,POI) VALUES ('$Emp_No','$Emp_Name','$Objective','$Apraisee_score','$Supervisor_score','$Performance_score','$Recommendations')";
   
    
    
    
    
    
     if (mysqli_query($conn, $sql)) {
        echo "New record has been added successfully !";
	  
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
     mysqli_close($conn);
?>