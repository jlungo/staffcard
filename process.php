<?php 
include_once 'db_connect.php';
if(isset($_POST['save']))
{   $emp_no =$_POST['emp_no'];
    $emp_name =$_POST['emp_name'];
    $job_desc =$_POST['job_desc'];
    $acc_type =$_POST['acc_type'];
    $acc_desc =$_POST['acc_desc'];
    $acc_date =$_POST['acc_date'];
    $any_desc =$_POST['any_desc'];
    $sql = "INSERT INTO workplace (emp_no,emp_name,job_desc,acc_type,acc_desc,acc_date,any_desc) 
    VALUES('$emp_no','$emp_name','$job_desc','$acc_type', '$acc_desc', '$acc_date', '$any_desc')";
    if(mysqli_query($conn,$sql)){
        echo "New Accident Incident record created successfully!";
    } else {
        echo "Error: " . $sql . " ".mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>



