<?php
	include "Conn.php";	
	if(isset($_POST['submit']))
    
      $Emp_No = $_POST['Emp_No'];
       $Emp_Name = $_POST['Emp_Name'];
      $Objective = $_POST['Objective'];
	  $Apraisee_score = $_POST['Apraisee_score'];
	  $Supervisor_score = $_POST['Supervisor_score'];
	  $Performance_score = $_POST['Performance_score'];
	  $Recommendations = $_POST['Recommendations'];
	  
     $sql = "INSERT INTO opras (Emp_No,Emp_Name,Objective,Apraisee_score,Supervisor_score,Performance_score,Recommendations) VALUES ('$Emp_No','$Emp_Name','$Objective','$Apraisee_score','$Supervisor_score','$Performance_score','$Recommendations')";
     if (mysqli_query($conn, $sql)) {
        echo "New record has been added successfully !";
	  
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
     mysqli_close($conn);
?>