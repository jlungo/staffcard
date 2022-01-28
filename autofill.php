<?php
  
// Get the user id 
$emp_id = $_REQUEST['id'];
  
// Database connection
$con = mysqli_connect("localhost", "root", "", "staff_db");
  
if ($emp_id !== "") {
      
    // Get corresponding first name and 
    // last name for that user id    SELECT CONCAT(Firstname, ,Sirname) AS emp_Name FROM users WHERE id='$emp_id' users.Firstname, users.Sirname,
    $query = mysqli_query($con, "SELECT  CONCAT(users.Mtitle, ' ' ,users.Firstname,' ' ,users.Sirname) AS emp_Name  FROM users WHERE id='$emp_id' ");
  
    $row = mysqli_fetch_array($query);

    
  
    // Get the first name
    // $firstname = $row["Firstname"];
  
    // Get the last name
    // $sirname = $row[  "Sirname"];

    // $emp_name = $firstname + $sirname;

     // Get the employee name
     $emp_name = $row["emp_Name"];
}
  
// Store it in a array
$result = array(
    // "$firstname","$emp_name"
     "$emp_name"
    );
  
// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
?>