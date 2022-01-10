<?php 
include_once 'db_connect.php';
if(isset($_POST['save']))
{
    $emp_no =$_POST['emp_no'];
    $emp_name =$_POST['emp_name'];
    $safari_start_date =$_POST['safari_start_date'];
    $return_date =$_POST['return_date'];
    $purpose_safari =$_POST['purpose_safari'];
    $authorisation_status =$_POST['authorisation_status'];
    $source_fund =$_POST['source_fund'];
    $sql = "INSERT INTO StaffIS (emp_no,emp_name,safari_start_date,return_date,purpose_safari,authorisation_status,source_fund) 
    VALUES('$emp_no','$emp_name',' $safari_start_date','$return_date', '$purpose_safari',' $authorisation_status',' $source_fund')";
    if(mysqli_query($conn,$sql)){
        echo "New record created successfully!";
    } else{
        echo "Error: " . $sql . " ".mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>