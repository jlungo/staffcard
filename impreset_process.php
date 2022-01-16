<?php 
include_once 'db_connect.php';
if(isset($_POST['save']))
{  
    $Emp_No =$_POST['Emp_No'];
    $Emp_Name =$_POST['Emp_Name'];
    $Impreset_purpose =$_POST['Impreset_purpose'];
    $Impreset_amount =$_POST['Impreset_amount'];
    $Impreset_date =$_POST['Impreset_date'];
    $Expected_date_of_retirement =$_POST['Expected_date_of_retirement'];
    $Retirement_amount =$_POST['Retirement_amount'];
    $sql = "INSERT INTO Impreset_Information (Emp_No,Emp_Name,Impreset_purpose,Impreset_amount,Impreset_date,Expected_date_of_retirement,Retirement_amount) 
    VALUES('$Emp_No','$Emp_Name',' $Impreset_purpose','$Impreset_amount', '$Impreset_date',' $Expected_date_of_retirement',' $Retirement_amount')";
    if(mysqli_query($conn,$sql)){
        echo "New impreset record created successfully";
    } else{
        echo "Error: " . $sql . " ".mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>



