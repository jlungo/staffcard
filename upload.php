<?php
session_start();
include("db_connect.php"); 
 
  if(isset($_COOKIE['adminid'])){$adminid = $_COOKIE['adminid'];}




 
  if(isset($_POST['resetpass'])){
	 	                  
		 $mfname = mysqli_real_escape_string($db,$_POST['mfname']);
		$msname = mysqli_real_escape_string($db,$_POST['msname']);		
	  $memail=mysqli_real_escape_string($db,$_POST['memail']);
	    $mid =mysqli_real_escape_string($db,$_POST['mid']);
	     $minstititution = mysqli_real_escape_string($db,$_POST['minstitution']);
		   $rank = mysqli_real_escape_string($db,$_POST['mrank']);
		      		$id = mysqli_real_escape_string($db,$_POST['page']);
					$orgName = $_FILES['filed']['name'];
                 $orgtmpName = $_FILES['filed']['tmp_name'];
                 $orgSize = $_FILES['filed']['size'];
                 $orgType = $_FILES['filed']['type'];
			
		   
		 
		    if (isset($_POST["mr"]))
                                 {
     	                           $mtitle="Mr";
								 }
                 elseif(isset($_POST["miss"]))
                                 {     	
		                           $mtitle="Miss";
                                  }
                 elseif(isset($_POST["mrs"]))
                                   {     	
		                      $mtitle="Mrs";
                                   }	 
                 elseif (isset($_POST["dr"]))
                                  {
     	
		                           $mtitle="Dr";
								  }
			    elseif (isset($_POST["pro"]))
                               {   $mtitle="Pro";
								  }
				               else	
				               {
				               	$mtitle="";
				               }
		   $check="SELECT * FROM Users WHERE id='$id' ";
						       $checks=mysqli_query($db,$check);
						  $found=mysqli_num_rows($checks);
							  if($found!=0)
							  {              $f=move_uploaded_file ($orgtmpName,'images/'.$orgName);
					                  if(isset($f)){//image is a folder in which you will save documents
                                                 $queryz = "UPDATE Users SET Picname='$orgName' WHERE id='$id' ";
                                             $db->query($queryz) or die('Errorr, query failed to upload picture');}	
									  
									  $quer = "UPDATE Users SET Firstname='$mfname',Sirname='$msname',Mtitle='$mtitle',Email='$memail',Staffid='$mid',Rank='$rank',Department='$minstititution' WHERE id='$id' ";
                                        $db->query($quer) or die('Errorr, query failed to update');	
										
										$_SESSION['pass']="okjs";				
                                    header("Location:admin.php");
 }
					       }
 
 		   
if(isset($_POST['addmember']))
     {
     	 if($_POST['memail']!=''&&$_POST['mfname']!=''&&$_POST['msname']!=''&&$_POST['mphone']!=''&&$_POST['minstitution']!=''&&$_POST['mpassword']!='')
           {              
            
   		$mfname = mysqli_real_escape_string($db,$_POST['mfname']);
		$msname = mysqli_real_escape_string($db,$_POST['msname']);		
	  $memail=mysqli_real_escape_string($db,$_POST['memail']);
	    $mphone =mysqli_real_escape_string($db,$_POST['mphone']);
	     $minstititution = mysqli_real_escape_string($db,$_POST['minstitution']);
		   $mpassword = mysqli_real_escape_string($db,$_POST['mpassword']);
		      		$pagex = mysqli_real_escape_string($db,$_POST['page']);
					$orgName = $_FILES['filed']['name'];
                 $orgtmpName = $_FILES['filed']['tmp_name'];
                 $orgSize = $_FILES['filed']['size'];
                 $orgType = $_FILES['filed']['type'];
			
		   
		 
		    if (isset($_POST["mr"]))
                                 {
     	                           $mtitle="Mr";
								 }
                 elseif(isset($_POST["miss"]))
                                 {     	
		                           $mtitle="Miss";
                                  }
                 elseif(isset($_POST["mrs"]))
                                   {     	
		                      $mtitle="Mrs";
                                   }	 
                 elseif (isset($_POST["dr"]))
                                  {
     	
		                           $mtitle="Dr";
								  }
			    elseif (isset($_POST["pro"]))
                               {   $mtitle="Pro";
								  }
				               else	
				               {
				               	$mtitle="";
				               }
							   
							   $check="SELECT * FROM Users WHERE Firstname='$mfname' && Sirname='$msname'";
						       $checks=mysqli_query($db,$check);
						  $found=mysqli_num_rows($checks);
							  if($found==0)
							  {
							  	                                  move_uploaded_file ($orgtmpName,'images/'.$orgName);
								
							  	$query = "INSERT INTO Users (Firstname,Sirname,Mtitle,Email,Staffid,Rank,Department,Online,Picname) ".
                            "VALUES ('$mfname','$msname', '$mtitle','$mphone','$mpassword','$memail','$minstititution','Offline','$orgName')";
                                 $db->query($query) or die('Error1, query failed');	
								 
							     $memberadd="tyy";					  
			                     $_SESSION['memberadded']=$memberadd;
                                    header("Location:$pagex");  //member added successfully
				 
			  
			  
							  }else{
							  	$_SESSION['memberexist']="member already exist";
                                 header("Location:$pagex");  
				 
							  }
				}else{
					$_SESSION['emptytextboxes']="Not all text boxes were completed";
                                 header("Location:$pagex");  
				 
				    }
               
          }

 if(isset($_POST['Valuedel'])){ 	
	
	 $tutor=$_POST['Valuedel'];
 	 $querry="SELECT * FROM Users WHERE id='$tutor' ";
                     $results=mysqli_query($db,$querry);
                    $checks=mysqli_num_rows($results);
                     if($checks!=0)
                     {
      	 	                  $querry="DELETE FROM Users WHERE id='$tutor'";
                              $results=mysqli_query($db,$querry);
                               echo"ok"; 
				      }
				       
	
 }
 if(isset($_FILES['file2']['name'])&&$_POST['Change'])	{
			 	
	              $id=$_POST['id'];
		          $protocol=$_POST['category'];
			     $receiptName = $_FILES['file2']['name'];
                 $receipttmpName = $_FILES['file2']['tmp_name'];
                 $receiptSize = $_FILES['file2']['size'];
                 $receiptType = $_FILES['file2']['type'];
				   $pages=$_POST['page'];
				   
				 if($id=='')
				 {
				       $userid=$_COOKIE['userid'];
                       $useremail=$_COOKIE['useremail'];

                          $sqluser ="SELECT * FROM Users WHERE Password='$userid' && Email='$useremail'";

                          $retrieved = mysqli_query($db,$sqluser);
                          while($found = mysqli_fetch_array($retrieved))
	                     {
                             $id= $found['id'];   
  	                     }
				 }
			
 	 $qued="SELECT * FROM Profilepictures WHERE ids='$id' ";
                     $resul=mysqli_query($db,$qued);
                    $checks=mysqli_num_rows($resul);
                     if($checks!=0)
                     {
                     	if( move_uploaded_file ($receipttmpName, 'admin/images/'.$receiptName)){//image is a folder in which you will save documents
                            $queryz = "UPDATE Profilepictures SET name='$receiptName',size='$receiptSize',type='$receiptType',content='$receiptName',Category='$protocol' WHERE ids='$id' ";
                                  $db->query($queryz) or die('Errorr, query failed to upload');	
									    //$_SESSION['update']="yes";
										if($protocol=="Administrator"){
									                                     header("Location:$pages");
										                              }	
										                              else{
										                              		header("Location:user.php");
																		  }
						}
						
                     }
                     else{
							  
                             if( move_uploaded_file ($receipttmpName, 'admin/images/'.$receiptName)){//image is a folder in which you will save documents
                                 $queryz = "INSERT INTO Profilepictures (name,size,type,content,Category,ids) ".
                                 "VALUES ('$receiptName','$receiptSize',' $receiptType', '$receiptName','$protocol','$id')";                                 
                                     $db->query($queryz) or die('Errorr, query failed to upload');	
									    //$_SESSION['update']="yes";
									   if($protocol=="Administrator"){
									                                     header("Location:$pages");
										                              }	
										                              else{
										                              		   header("Location:user.php");
																		     }
					
						             }
					   }
			 }

 if(isset($_POST['orginitial'])){         
	           
			  $orgname = mysqli_real_escape_string($db,$_POST["orgname"]);	//Email variable
			  $orgphone =mysqli_real_escape_string($db,$_POST["orgphone"]);	        //password variable
              $orgmail = mysqli_real_escape_string($db,$_POST["orgemail"]);       //institution variable
			  $orgwebsite = mysqli_real_escape_string($db,$_POST["orgwebsite"]);      //phone variable
	          $year= mysqli_real_escape_string($db,$_POST["orgyear"]);//Firstname variable
	           $pagez= mysqli_real_escape_string($db,$_POST["page"]);
	             $orgName = $_FILES['filed']['name'];
                 $orgtmpName = $_FILES['filed']['tmp_name'];
                 $orgSize = $_FILES['filed']['size'];
                 $orgType = $_FILES['filed']['type'];
			
			
		  $sqln="SELECT * FROM Inorg  WHERE name='$orgname' && website='$orgwebsite'";
                   $resultn=mysqli_query($db,$sqln);                    
                         if($rowcount=mysqli_num_rows($resultn)==0)
                         {                 //$date= date("d.m.y");
                         
                                  move_uploaded_file ($orgtmpName, 'media/'.$orgName);
                             	 $enter="INSERT INTO Inorg (name,website,year,email,Phone,pname,size,content,type) 
                               	     VALUES('$orgname','$orgwebsite','$year','$orgmail','$orgphone','$orgName','$orgSize','$orgName','$orgType')";
                                  $db->query($enter);
								  
                                  $_SESSION['regk']="Pamzey";
								  
								 header("Location:admin.php");
								                             
                         }
                      else{
                      	     	 	echo"Contents arleady exists"; 
						        //exit;  
					      }                
                     }                
                 
 
 if(isset($_POST['orgupdate'])){         
	           
			  $orgname = mysqli_real_escape_string($db,$_POST["orgname"]);	//Email variable
			  $orgphone =mysqli_real_escape_string($db,$_POST["orgphone"]);	        //password variable
              $orgmail = mysqli_real_escape_string($db,$_POST["orgemail"]);       //institution variable
			  $orgwebsite = mysqli_real_escape_string($db,$_POST["orgwebsite"]);      //phone variable
	          $year= mysqli_real_escape_string($db,$_POST["orgyear"]);//Firstname variable
			$pagez= mysqli_real_escape_string($db,$_POST["page"]);   
		    $idz= mysqli_real_escape_string($db,$_POST["pageid"]);   
				  
			        $orgName = $_FILES['filed']['name'];
                  $orgtmpName = $_FILES['filed']['tmp_name'];
                    $orgSize = $_FILES['filed']['size'];
                   $orgType = $_FILES['filed']['type'];
			
		  $sqln="SELECT * FROM Inorg  WHERE id='$idz' ";
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
                 
 if(isset($_POST["bulk"]))
	{
		$file = $_FILES['file']['tmp_name'];
		$handle = fopen($file, "r");
		$c = 0;$count = 0; 
		while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
		{
			$mtitle = $filesop[0];
			$mfname = $filesop[1];
			$msname = $filesop[2];
			$minstititution = $filesop[3];
			$rank = $filesop[4];
			$mphone = $filesop[5];
			$sid = $filesop[6];
				 $count++;
			  if($count>1){ 
			$query = "INSERT INTO Users (Firstname,Sirname,Mtitle,Email,Staffid,Rank,Department) ".
                            "VALUES ('$mfname','$msname', '$mtitle','$mphone','$sid','$rank','$minstititution')";
                                 $db->query($query) or die('Error1, query failed');	
								 
								    $c = $c + 1;
			  }
			
		}

		
			if(isset($c)){
                      $_SESSION['Import']=$c;								  
                          header("Location:bulk.php");
			            }				    
					else{
				          echo "Sorry! There is some problem.";
			            }

	}
?>
 	
?>
