<?php
include 'conn.php';

//create connection
$conn = mysqli_connect($servername,$username,$password,"$dbname");
if(!$conn){
    die('could not connect my Sql:' .mysql_error());
}
     
$db->query("CREATE DATABASE IF NOT EXISTS `staff_db`");
mysqli_select_db($db,"staff_db");
             
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

// Pension Information SQL Script
$stable17= "CREATE TABLE IF NOT EXISTS pensions (emp_no varchar(30) NOT NULL,
	emp_name varchar(300)NOT NULL,
	pension_type Varchar(30)NOT NULL,                                 
	pension_number varchar(30)NOT NULL,                                 
	registered_date date NOT NULL,
	monthly_contribution varchar(300)NOT NULL,
	current_balance varchar(300)NOT NULL,
	PRIMARY KEY(emp_no) )";
$db->query($stable17); 

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
	
	
	//Adding The Staff_Benefit Information SQL Script 
	$createStaffBen="CREATE TABLE IF NOT EXISTS staff_ben (emp_id int(11) NOT NULL auto_increment,
                                  Employee_numb varchar(300)NOT NULL, 
                                  Employee_name varchar(300)NOT NULL,
                                  Benefit_type Varchar(30)NOT NULL,                               
                                  Benefit_desc varchar(300)NOT NULL,
                                  Benefit_amount float(10)NOT NULL,
                                  date_start date NOT NULL,
                                  date_end date NOT NULL,
                                  -- Picname varchar(1000)NOT NULL,
                                  -- Time bigint(30)NOT NULL,                         
                                  PRIMARY KEY(emp_id) )";
                         $db->query($createStaffBen); 


	$tableStaffDep="CREATE TABLE IF NOT EXISTS StaffDep (
		id int(11) NOT NULL auto_increment,
		EmployeeNo varchar(20)NOT NULL, 
		EmployeeName varchar(255)NOT NULL,
		FDepNo int(3)NOT NULL DEFAULT 0,                                 
		MDepNo int(3)NOT NULL DEFAULT 0,                               
		AgeOldDep int(3)NOT NULL DEFAULT 0,
		AgeYoungDep int(3)NOT NULL DEFAULT 0,
		`Address` varchar(255)NOT NULL,
		PRIMARY KEY(id) )";
		$db->query($tableStaffDep);


							 


									 	 	
/// End of Creating Tables SQL Scripts \\\


	$sql="SELECT * FROM Administrator ";					
	$result=mysqli_query($db,$sql);
	$rowcount=mysqli_num_rows($result);

	if($rowcount==0)
	{
	$enter="INSERT INTO Administrator (Password,Email,Firstname,Sirname,Mtitle,Phone) VALUES	('admin','admin@gmail.com','Patrick','Mvuma','Mr','265999107724')";
	$db->query($enter);
	  
	$querydy = "INSERT INTO Files (Title,Name,Size,Type) ".
	"VALUES ('Staff','staff.csv','76','application/vnd.ms-excel')";                                 
	$db->query($querydy) or die('Error, query failed to upload!');	

	}

	       //Disciplinary Information System create table  SQL script                        
		   $disciplinarytable="CREATE TABLE IF NOT EXISTS Disciplinary (id int(11) NOT NULL auto_increment,
		   Emp_No int(11) NOT NULL,
		   Emp_Name varchar(300)NOT NULL, 
		   Disciplinary_Type varchar(300)NOT NULL,
		   Date_commited DATE NOT NULL,
		   Date_discussed DATE NOT NULL,  
		   Description TEXT NOT NULL,                             
		   Action_taken TEXT NOT NULL,                                                      
		   PRIMARY KEY(id) )";
  $db->query($disciplinarytable);                             

                     
					 		

?>
