<?php

                                     //Disciplinary Information System Table                           
                                      $stableG8="CREATE TABLE IF NOT EXISTS Disciplinary (id int(11) NOT NULL auto_increment,
                                      Emp_No int(11) NOT NULL,
                                      Emp_Name varchar(300)NOT NULL, 
                                      Disciplinary_Type varchar(300)NOT NULL,
                                      Date_commited DATE NOT NULL,
                                      Date_discussed DATE NOT NULL,  
                                      Description TEXT NOT NULL,                             
                                      Action_taken TEXT NOT NULL,                                                      
                                      PRIMARY KEY(id) )";
                             $db->query($stableG8);                             
	
    
    ?>