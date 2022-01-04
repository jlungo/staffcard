<?php 
    session_start();
    include("db_connect.php"); 
    if(isset($_COOKIE['adminid'])){$adminid = $_COOKIE['adminid'];}

if(isset($_POST['addleave']))
{
	 if($_POST['empno']!=''&&$_POST['empname']!=''&&$_POST['leavestart']!=''&&$_POST['leaveend']!=''&&$_POST['totaldays']!=''&&$_POST['home']!=''&&$_POST['depname']!='')
	  {              
	   
	  $empno = mysqli_real_escape_string($db,$_POST['empno']);
   $empname = mysqli_real_escape_string($db,$_POST['empname']);		
 $leavestart=mysqli_real_escape_string($db,$_POST['leavestart']);
   $leaveend =mysqli_real_escape_string($db,$_POST['leaveend']);
	$totaldays = mysqli_real_escape_string($db,$_POST['totaldays']);
	$home = mysqli_real_escape_string($db,$_POST['home']);
	$depname = mysqli_real_escape_string($db,$_POST['depname']);
	$pagex = mysqli_real_escape_string($db,$_POST['page']);

			
	   
	  
	
	 
							 $leavequery = "INSERT INTO leaves (Empno,Empname,leavestart,leaveend,totaldays,homeaddress,nameofdependant) 
					        VALUES ('$empno ','$empname', '$leavestart','$leaveend','$totaldays','$home','$depname')";
							$db->query($leavequery) or die('Error1, query failed');	
							
							$leaveadd="Leave Added Succesfully";					  
							$_SESSION['message']=$leaveadd;
							   header("Location:$pagex");  //member added successfully
			
		 
		 
						
		   }else{
                $pagex = mysqli_real_escape_string($db,$_POST['page']);
			   $_SESSION['message']="Not all text boxes were completed";
              
							header("Location:$pagex");  
		   }
			   
			
	 }

     if(isset($_POST['leaveupdate'])){         
	           
        $empno = mysqli_real_escape_string($db,$_POST['empno']);
        $empname = mysqli_real_escape_string($db,$_POST['empname']);		
         $leavestart=mysqli_real_escape_string($db,$_POST['leavestart']);
         $leaveend =mysqli_real_escape_string($db,$_POST['leaveend']);
         $totaldays = mysqli_real_escape_string($db,$_POST['totaldays']);
         $home = mysqli_real_escape_string($db,$_POST['home']);
         $depname = mysqli_real_escape_string($db,$_POST['depname']);
         $pagex = mysqli_real_escape_string($db,$_POST['page']); 
         $id= mysqli_real_escape_string($db,$_POST['id']);  
          
      
        $sqln="SELECT * FROM leaves  WHERE id='$id' ";
             $resultn=mysqli_query($db,$sqln);                    
                   if($rowcount=mysqli_num_rows($resultn)!=0)
                   {
                             								                   
                            $enter="UPDATE leaves SET Empno='$empno',Empname='$empname',leavestart='$leavestart',leaveend='$leaveend',totaldays='$totaldays',homeaddress='$home',nameofdependant='$depname' WHERE id='$id' ";
                            $db->query($enter);
                            
                            $leaveedit="Leave Edited  Succesfully";					  
							$_SESSION['message']=$leaveedit;
                            
                            header("Location:$pagex");
                                                       
                   }
                    else{
                        $_SESSION['message']="Contents does not exist"; 
                          //exit;  
                    }                
            }   



?>



