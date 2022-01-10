<?php 
<<<<<<< HEAD
// database connection
=======
// database successfull
>>>>>>> d0109868c51e544e005ecef389334324aaff0fe8
include_once 'db_connect.php';
if(isset($_POST['save']))
{
    $emp_no =$_POST['emp_no'];
    $emp_name =$_POST['emp_name'];
    $job_desc =$_POST['job_desc'];
    $current_rank =$_POST['current_rank'];
    $new_rank =$_POST['new_rank'];
    $date_promoted =$_POST['date_promoted'];
    $high_ed =$_POST['high_ed'];
    $sql = "INSERT INTO prois (emp_no,emp_name,job_desc,current_rank,new_rank,date_promoted,high_ed) 
    VALUES('$emp_no','$emp_name',' $job_desc','$current_rank', '$new_rank',' $date_promoted',' $high_ed')";
    if(mysqli_query($conn,$sql)){
        echo "New record created successfully!";
    } else{
        echo "Error: " . $sql . " ".mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>



