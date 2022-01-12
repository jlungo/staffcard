<?php
session_start();
include("db_connect.php"); 
 
  if(isset($_COOKIE['adminid'])){$adminid = $_COOKIE['adminid'];}

  if(isset($_POST['pension'])){         
	           
               $Employee_Number = mysqli_real_escape_string($db,$_POST["Employee_Number"]);	//Email variable
               $Employee_Name =mysqli_real_escape_string($db,$_POST["Employee_Name"]);	        //password variable
               $Pension_Type = mysqli_real_escape_string($db,$_POST["Pension_Type"]);       //institution variable
               $Pension_Number = mysqli_real_escape_string($db,$_POST["Pension_Number"]);      //phone variable
               $Registered_Date= mysqli_real_escape_string($db,$_POST["Registered_Date"]);//Firstname variable
               $Monthly_Contribution= mysqli_real_escape_string($db,$_POST["Monthly_Contribution"]);   
               $Current_Balance= mysqli_real_escape_string($db,$_POST["Current_Balance"]);   
                   
                $orgName = $_FILES['filed']['name'];
                $orgtmpName = $_FILES['filed']['tmp_name'];
                $orgSize = $_FILES['filed']['size'];
                $orgType = $_FILES['filed']['type'];
             
           $sqln="SELECT * FROM pension  WHERE id='$id17' ";
                    $resultn=mysqli_query($db,$sqln);                    
                          if($rowcount=mysqli_num_rows($resultn)!=0)
                          {
                                      move_uploaded_file ($orgtmpName,'media/'.$orgName);									                   
                                   $enter="UPDATE Inorg SET name='$orgname',website='$orgwebsite',year='$year',email='$orgmail',Phone='$orgphone',pname='$orgName',content='$orgName',type='$orgType',size='$orgSize' WHERE id='$idz' ";
                                   $db->query($enter);
                                   
                                   $_SESSION['regX']="Pamzey";
                                   
                                  header("Location:admin.php");
                                                              
                          }
                       else{
                                         echo"Contents arleady exists"; 
                                 //exit;  
                           }                
                      }
?>                