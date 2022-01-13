<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
</head>
<body>

<form action="insert.php" method="POST">
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="Emp_No"><b>Emp No</b></label>
    <input type="text" placeholder="Enter Emp_No" name="Emp_No" id="Emp_No" required>

    <label for="psw"><b>Emp Name</b></label>
    <input type="text" placeholder="Enter Emp_Name" name="Emp_Name" id="Emp_Name" required>

    <label for="Objective"><b>Objective</b></label>
    <input type="text" placeholder="Objective" name="Objective" id="Objective" required>
	 <label for="Objective"><b>Apraisee score</b></label>
    <input type="text" placeholder="Apraisee score" name="Apraisee_score" id="Objective" required>
	    <label for="Objective"><b>Supervisorscore</b></label>
    <input type="text" placeholder="Supervisorscore" name="Supervisor_score" id="Objective" required>
	    <label for="Objective"><b>Performance score</b></label>
    <input type="text" placeholder="Performance score" name="Performance_score" id="Objective" required>
	  <label for="Objective"><b>Recommendations</b></label>
    <input type="text" placeholder="Recommendations" name="Recommendations" id="Objective" required>
    <hr>
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

    <button type="submit" class="registerbtn" name="submit">Register</button>
  </div>
  
  <div class="container signin">
    <p>Already want to view report? <a href="report.php">VIEW REPORT</a>.</p>
  </div>
</form>

</body>
</html>
