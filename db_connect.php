<?php
 
 $db = new mysqli("localhost","root","");
   if($db->connect_errno > 0){
         die('Unable to connect to database [' . $db->connect_error . ']');  } 

$db = new mysqli("localhost", "root", "");
if ($db->connect_errno > 0) {
  die('Unable to connect to database [' . $db->connect_error . ']');
}

$db->query("CREATE DATABASE IF NOT EXISTS `staff_db`");

mysqli_select_db($db, "staff_db");

$stableYZ = "CREATE TABLE IF NOT EXISTS Inorg (id int(11) NOT NULL auto_increment,
              name varchar(300)NOT NULL,Phone varchar(300)NOT NULL,email varchar(100)NOT NULL,
              website varchar(300)NOT NULL,year varchar(10)NOT NULL,pname varchar(1000)NOT NULL,type varchar(30)NOT NULL,
              size decimal(10)NOT NULL,content longblob NOT NULL, PRIMARY KEY(id) )";
$db->query($stableYZ);

$stableZ = "CREATE TABLE IF NOT EXISTS Profilepictures (id int(11) NOT NULL auto_increment,
              ids varchar(30)NOT NULL,Category varchar(30)NOT NULL,name varchar(1000)NOT NULL,type varchar(30)NOT NULL,
              Size decimal(10)NOT NULL,content longblob NOT NULL,
              PRIMARY KEY(id) )";
$db->query($stableZ);

$stable1 = "CREATE TABLE IF NOT EXISTS Files (id int(11) NOT NULL auto_increment,
              Title varchar(300)NOT NULL,Name varchar(1000)NOT NULL,
              Type varchar(30)NOT NULL,Size decimal(10) NULL,
              content longblob NOT NULL,PRIMARY KEY(id) )";
$db->query($stable1);

$stable56 = "CREATE TABLE IF NOT EXISTS Users (id int(11) NOT NULL auto_increment,
              Firstname varchar(300)NOT NULL, 
              Sirname varchar(300)NOT NULL,
              Mtitle Varchar(30)NOT NULL,                                 
              `Rank` varchar(30)NOT NULL,                                 
              Department varchar(300)NOT NULL,
              Email varchar(300)NOT NULL,
              Staffid varchar(300)NOT NULL,
              Online varchar(300)NOT NULL,
              Picname varchar(1000)NOT NULL,
              Time bigint(30)NOT NULL DEFAULT 0,                         
              PRIMARY KEY(id) )";
$query1 = $db->query($stable56);


$stable175 = "CREATE TABLE IF NOT EXISTS StaffDep (id int(11) NOT NULL auto_increment,
                EmployeeNo varchar(20)NOT NULL, 
                EmployeeName varchar(255)NOT NULL,
                FDepNo int(3)NOT NULL DEFAULT 0,                                 
                MDepNo int(3)NOT NULL DEFAULT 0,                               
                AgeOldDep int(3)NOT NULL DEFAULT 0,
                AgeYoungDep int(3)NOT NULL DEFAULT 0,
                `Address` varchar(255)NOT NULL,
                PRIMARY KEY(id) )";
$db->query($stable175);
// print_r($db->error);


$stable4 = "CREATE TABLE IF NOT EXISTS Administrator (id int(11) NOT NULL auto_increment,
              Firstname varchar(30)NOT NULL,Sirname varchar(30)NOT NULL,Mtitle Varchar(30)NOT NULL,
              Phone varchar(30)NOT NULL,Password varchar(30)NOT NULL,Email varchar(30)NOT NULL,PRIMARY KEY(id) )";
$db->query($stable4);



$sql = "SELECT * FROM Administrator ";
$result = mysqli_query($db, $sql);
$rowcount = mysqli_num_rows($result);

if ($rowcount == 0) {
  $enter = "INSERT INTO Administrator (Password,Email,Firstname,Sirname,Mtitle,Phone) VALUES('admin','admin@gmail.com','Patrick','Mvuma','Mr','265999107724')";
  $db->query($enter);

                         $stable03="CREATE TABLE IF NOT EXISTS ProIS (emp_no int(11) NOT NULL auto_increment,
                
                                  emp_name varchar(300)NOT NULL,
                                  job_desc Varchar(30)NOT NULL,                                 
                                  current_rank varchar(30)NOT NULL,  
                                  new_rank varchar(300)NOT NULL,                               
                                  date_promoted date NOT NULL,
                                  
                                  high_ed varchar(300)NOT NULL,
                                  PRIMARY KEY(emp_no) )";
                         $db->query($stable03); 
                         
                         $stable05="CREATE TABLE IF NOT EXISTS ProIS (emp_no int(11) NOT NULL auto_increment,
                                  emp_name varchar(300)NOT NULL,                             
                                  num_male int(10)NOT NULL,  
                                  num_female int(10)NOT NULL,    
                                  age_of_youngest int(10) NOT NULL,
                                  age_of_oldest int(10)NOT NULL, 
                                  home_address varchar(300)NOT NULL,
                                  PRIMARY KEY(emp_no) )";
                         $db->query($stable05); 
                        
			   
			    $stable4="CREATE TABLE IF NOT EXISTS Administrator (id int(11) NOT NULL auto_increment,
                                  Firstname varchar(30)NOT NULL,Sirname varchar(30)NOT NULL,Mtitle Varchar(30)NOT NULL,
                                  Phone varchar(30)NOT NULL,Password varchar(30)NOT NULL,Email varchar(30)NOT NULL,PRIMARY KEY(id) )";
                                      $db->query($stable4);
						
			 	 	
		
					$sql="SELECT * FROM Administrator ";					
                   $result=mysqli_query($db,$sql);
                   $rowcount=mysqli_num_rows($result);
                     
                       if($rowcount==0)
                         {
                           $enter="INSERT INTO Administrator (Password,Email,Firstname,Sirname,Mtitle,Phone) VALUES('admin','admin@gmail.com','Patrick','Mvuma','Mr','265999107724')";
                                  $db->query($enter);
								  
						   
                                                    $querydy = "INSERT INTO Files (Title,Name,Size,Type) ".
                                 "VALUES ('Staff','staff.csv','76','application/vnd.ms-excel')";                                 
                                     $db->query($querydy) or die('Errorr, query failed to upload');	
                                  
                          }
                     
					 		
                        }
?>