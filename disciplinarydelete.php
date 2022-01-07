<?php

session_start();
include("db_connect.php"); 
 
  if(isset($_COOKIE['adminid'])){$adminid = $_COOKIE['adminid'];}
//disciplinary action information system data delete
                        
                         $idx = $_GET['id'];
						 $querry="SELECT * FROM disciplinary WHERE id='$idx' ";
										$results=mysqli_query($db,$querry);
									   $checks=mysqli_num_rows($results);
										if($checks!=0)
										{
													$querr="DELETE FROM disciplinary WHERE id='$idx'";
												 $results=mysqli_query($db,$querr);
												//   echo"ok"; 
												$_SESSION['disciplinarydeleted']=" disciplinary record deleted successfully";
                                               header("Location:Disciplinary.php ");  

										 }
										  
					   
                                        //  <a href='disciplinarydelete.php?id=$id'  class=' btn  btn-danger' title='delete user' ><span class='glyphicon glyphicon-trash' style='color:white;'></span></a>		

                    ?>