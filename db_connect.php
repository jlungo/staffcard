<?php
include 'conn.php';

//create connection
$conn = mysqli_connect($servername,$username,$password,"$dbname");
if(!$conn){
    die('could not connect my Sql:' .mysql_error());
}
     
$db->query("CREATE DATABASE IF NOT EXISTS `staff_db`");
mysqli_select_db($db,"staff_db");
             
<<<<<<< HEAD
/// Start of Creating Tables SQL Scripts \\\		                       
		    
	$table1="CREATE TABLE IF NOT EXISTS Inorg (id int(11) NOT NULL auto_increment,
	name varchar(300)NOT NULL,Phone varchar(300)NOT NULL,email varchar(100)NOT NULL,
	website varchar(300)NOT NULL,year varchar(10)NOT NULL,pname varchar(1000)NOT NULL,type varchar(30)NOT NULL,
	size decimal(10)NOT NULL,content longblob NOT NULL, PRIMARY KEY(id) )";
	$db->query($table1);
		 
	$table2="CREATE TABLE IF NOT EXISTS Profilepictures (id int(11) NOT NULL auto_increment,
	ids varchar(30)NOT NULL,Category varchar(30)NOT NULL,name varchar(1000)NOT NULL,type varchar(30)NOT NULL,
	Size decimal(10)NOT NULL,content longblob NOT NULL,
	PRIMARY KEY(id) )";
	$db->query($table2);

	$table3="CREATE TABLE IF NOT EXISTS Files (id int(11) NOT NULL auto_increment,
	Title varchar(300)NOT NULL,Name varchar(1000)NOT NULL,
	Type varchar(30)NOT NULL,Size decimal(10) NULL,
	content longblob NOT NULL,PRIMARY KEY(id) )";
	$db->query( $table3);

	$table4="CREATE TABLE IF NOT EXISTS Users (id int(11) NOT NULL auto_increment,
	Firstname varchar(300)NOT NULL, 
	Sirname varchar(300)NOT NULL,
	Mtitle Varchar(30)NOT NULL,                                 
	Rank varchar(30)NOT NULL,                                 
	Department varchar(300)NOT NULL,
	Email varchar(300)NOT NULL,
	Staffid varchar(300)NOT NULL,
	Online varchar(300)NOT NULL,
	Picname varchar(1000)NOT NULL,
	Time bigint(30)NOT NULL,                         
	PRIMARY KEY(id) )";
	$db->query($table4); 

	$table5="CREATE TABLE IF NOT EXISTS Staff_Education (emp_no int(11) NOT NULL auto_increment,
	emp_name varchar(300)NOT NULL,
	cert_obtained Varchar(30)NOT NULL,                                 
	institution varchar(30)NOT NULL,  
	institution_add varchar(300)NOT NULL,                               
	year_stated_edu date NOT NULL,
	year_graduated varchar(300)NOT NULL,
	PRIMARY KEY(emp_no) )";
	$db->query($table5); 

	$table6="CREATE TABLE IF NOT EXISTS Administrator (id int(11) NOT NULL auto_increment,
	Firstname varchar(30)NOT NULL,Sirname varchar(30)NOT NULL,Mtitle Varchar(30)NOT NULL,
	Phone varchar(30)NOT NULL,Password varchar(30)NOT NULL,Email varchar(30)NOT NULL,PRIMARY KEY(id) )";
	$db->query($table6);

	$table7="CREATE TABLE IF NOT EXISTS ProIS (emp_no int(11) NOT NULL auto_increment,
	emp_name varchar(300)NOT NULL,
	job_desc Varchar(30)NOT NULL,                                 
	current_rank varchar(30)NOT NULL,  
	new_rank varchar(300)NOT NULL,                               
	date_promoted date NOT NULL,
	high_ed varchar(300)NOT NULL,
	PRIMARY KEY(emp_no) )";
	$db->query($table7); 

	$table8="CREATE TABLE IF NOT EXISTS Impreset_Information (
	id int(11) NOT NULL auto_increment,
	Emp_No varchar(300)NOT NULL, 
	Emp_Name varchar(300)NOT NULL,
	Impreset_purpose Varchar(300)NOT NULL,                                 
	Impreset_amount int(50)NOT NULL,                                 
	Impreset_date varchar(11)NOT NULL,
	Expected_date_of_retirement varchar(11)NOT NULL,
	Retirement_amount int(11)NOT NULL,                        
	PRIMARY KEY(id))";
	$db->query($table8); 	
									 	 	
/// End of Creating Tables SQL Scripts \\\
=======
   
        		                       
		  //table
		$stableYZ="CREATE TABLE IF NOT EXISTS Inorg (id int(11) NOT NULL auto_increment,
                 name varchar(300)NOT NULL,Phone varchar(300)NOT NULL,email varchar(100)NOT NULL,
                 website varchar(300)NOT NULL,year varchar(10)NOT NULL,pname varchar(1000)NOT NULL,type varchar(30)NOT NULL,
                 size decimal(10)NOT NULL,content longblob NOT NULL, PRIMARY KEY(id) )";
               $db->query($stableYZ);
							 
			   $stableZ="CREATE TABLE IF NOT EXISTS Profilepictures (id int(11) NOT NULL auto_increment,
                 ids varchar(30)NOT NULL,Category varchar(30)NOT NULL,name varchar(1000)NOT NULL,type varchar(30)NOT NULL,
                 Size decimal(10)NOT NULL,content longblob NOT NULL,
                 PRIMARY KEY(id) )";
               $db->query($stableZ);
			   
			    $stable1="CREATE TABLE IF NOT EXISTS Files (id int(11) NOT NULL auto_increment,
                                  Title varchar(300)NOT NULL,Name varchar(1000)NOT NULL,
                                 Type varchar(30)NOT NULL,Size decimal(10) NULL,
                                   content longblob NOT NULL,PRIMARY KEY(id) )";
                                 $db->query( $stable1);
               
                  $stable56="CREATE TABLE IF NOT EXISTS Users (id int(11) NOT NULL auto_increment,
                                  Firstname varchar(300)NOT NULL, 
                                  Sirname varchar(300)NOT NULL,
                                  Mtitle Varchar(30)NOT NULL,                                 
                                  Rank varchar(30)NOT NULL,                                 
                                  Department varchar(300)NOT NULL,
                                  Email varchar(300)NOT NULL,
                                  Staffid varchar(300)NOT NULL,
                                  Online varchar(300)NOT NULL,
                                  Picname varchar(1000)NOT NULL,
                                  Time bigint(30)NOT NULL,                         
                                  PRIMARY KEY(id) )";
                         $db->query($stable56); 
                         s
// group 13 work table
                         $stable13="CREATE TABLE IF NOT EXISTS Staff_Education (emp_no int(11) NOT NULL auto_increment;
                
                                  emp_name varchar(300)NOT NULL,
                                  cert_obtained Varchar(30)NOT NULL,                                 
                                  institution varchar(30)NOT NULL,  
                                  institution_add varchar(300)NOT NULL,                               
                                  year_stated_edu date NOT NULL,
                                  
                                 year_graduated varchar(300)NOT NULL,

                                 PRIMARY KEY(emp_no) )";
                         $db->query($stable13); 
                         

//table
                         $stable03="CREATE TABLE IF NOT EXISTS StaffIS (emp_no int(11) NOT NULL auto_increment,
                                 emp_name varchar(100)NOT NULL,
                                  safari_start_date date NOT NULL,                                 
                                  return_date date NOT NULL,  
                                  purpose_safari varchar(100)NOT NULL,                               
                                  authorisation_status varchar(100) NOT NULL,
                                source_fund varchar(300)NOT NULL,
                                  PRIMARY KEY(emp_no) )";
                         $db->query($stable03); 
                         
                        
			   
			    $stable4="CREATE TABLE IF NOT EXISTS Administrator (id int(11) NOT NULL auto_increment,
                                  Firstname varchar(30)NOT NULL,Sirname varchar(30)NOT NULL,Mtitle Varchar(30)NOT NULL,
                                  Phone varchar(30)NOT NULL,Password varchar(30)NOT NULL,Email varchar(30)NOT NULL,PRIMARY KEY(id) )";
                                      $db->query($stable4);
						
			 	 	
>>>>>>> ba94369c8e79f38fe3e2d781e16b089523d191b3
		
	$sql="SELECT * FROM Administrator ";					
	$result=mysqli_query($db,$sql);
	$rowcount=mysqli_num_rows($result);

	if($rowcount==0)
	{
	$enter="INSERT INTO Administrator (Password,Email,Firstname,Sirname,Mtitle,Phone) VALUES	('admin','admin@gmail.com','Patrick','Mvuma','Mr','265999107724')";
	$db->query($enter);
	  
	$querydy = "INSERT INTO Files (Title,Name,Size,Type) ".
	"VALUES ('Staff','staff.csv','76','application/vnd.ms-excel')";                                 
	$db->query($querydy) or die('Errorr, query failed to upload');	

	}
                     
					 		

?>
