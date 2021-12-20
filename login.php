<<<<<<< HEAD
<<<<<<< HEAD
<?php
session_start();  



 //Connecting to the database 
include("db_connect.php"); 

 //Posting crredential in the database
if(isset($_POST['login_button'])) {
	$user_email = trim($_POST['user_email']);
	$user_password = trim($_POST['password']);

//Verify Email and password
	$sql = "SELECT * FROM Administrator WHERE Email='$user_email' && Password='$user_password'";
	$resultset = mysqli_query($db, $sql) or die("database error:". mysqli_error($db));
	$row = mysqli_fetch_assoc($resultset);	
	
				
	if($row['Password']==$user_password){				
		
        setcookie("adminid",$user_password,time()+(60*60*24*7));
        setcookie("adminemail",$user_email,time()+(60*60*24*7));
		echo "ok";		
		
	}
	
//Sending rejection note	
	else {				
		echo "email or password does not exist."; // wrong details 
	       }		
}


 	
=======
<?php
session_start();   
include("db_connect.php"); 
 
if(isset($_POST['login_button'])) {
	$user_email = trim($_POST['user_email']);
	$user_password = trim($_POST['password']);
	
	$sql = "SELECT * FROM Administrator WHERE Email='$user_email' && Password='$user_password'";
	$resultset = mysqli_query($db, $sql) or die("database error:". mysqli_error($db));
	$row = mysqli_fetch_assoc($resultset);	
	
				
	if($row['Password']==$user_password){				
		
        setcookie("adminid",$user_password,time()+(60*60*24*7));
        setcookie("adminemail",$user_email,time()+(60*60*24*7));
		echo "ok";		
		
	}

	
	else {				
		echo "email or password does not exist."; // wrong details 
	       }		
}


 	
>>>>>>> df822572559672ea85bbd59693e524784893f56f
?>
=======

<?php
session_start();   
include("db_connect.php"); 
 
if(isset($_POST['login_button'])) {
	$user_email = trim($_POST['user_email']);
	$user_password = trim($_POST['password']);
	
	$sql = "SELECT * FROM Administrator WHERE Email='$user_email' && Password='$user_password'";
	$resultset = mysqli_query($db, $sql) or die("database error:". mysqli_error($db));
	$row = mysqli_fetch_assoc($resultset);	
	
				
	if($row['Password']==$user_password){				
		
        setcookie("adminid",$user_password,time()+(60*60*24*7));
        setcookie("adminemail",$user_email,time()+(60*60*24*7));
		echo "ok";		
		
	}
	
	
	else {				
		echo "email or password does not exist."; // wrong details 
	       }		
}

>>>>>>> ef0cc4658915ee3347714cefd2d5b71374c8dcc8
