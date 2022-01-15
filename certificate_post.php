<?php
session_start();
include("db_connect.php"); 
 
  if(isset($_COOKIE['adminid'])){$adminid = $_COOKIE['adminid'];}

  if(isset($_POST['certificate'])){         
	           
               $Employee_Number = mysqli_real_escape_string($db,$_POST["Employee_Number"]);	
               $Employee_Name =mysqli_real_escape_string($db,$_POST["Employee_Name"]);	      
               $Certificate_Type = mysqli_real_escape_string($db,$_POST["Certificate_Type"]);       
               $Issued_By = mysqli_real_escape_string($db,$_POST["Issued_By"]);     
               $Year_Issued= mysqli_real_escape_string($db,$_POST["Year_Issued"]);
               $Date_Uploaded= mysqli_real_escape_string($db,$_POST["Date_Uploaded"]);   
               $Attachment_Name= mysqli_real_escape_string($db,$_POST["Attachment_Name"]);   
                   
                $orgName = $_FILES['filed']['name'];
                $orgtmpName = $_FILES['filed']['tmp_name'];
                $orgSize = $_FILES['filed']['size'];
                $orgType = $_FILES['filed']['type'];
             
           $sqln="SELECT * FROM certificate  WHERE id='$id17' ";
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
                                         echo"Contents already exists"; 
                                 //exit;  
                           }                
                      }
?>                