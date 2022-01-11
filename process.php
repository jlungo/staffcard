<?php 
// database connection
include_once 'db_connect.php';
if(isset($_POST['save']))
{
    $emp_no =$_POST['emp_no'];
    $emp_name =$_POST['emp_name'];
    $bank_name =$_POST['bank_name'];
    $bank_branchname =$_POST['bank_branchname'];
    $bank_accountnumber =$_POST['bank_accountnumber'];
    $sql = "INSERT INTO bankinfo (emp_no,emp_name,bank_name,bank_branchname,bank_accountnumber) 
    VALUES('$emp_no','$emp_name',' $bank_name,'$bank_branchname', '$bank_accountnumber')";
    if(mysqli_query($conn,$sql)){
        echo "New record created successfully!";
    } else{
        echo "Error: " . $sql . " ".mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>



