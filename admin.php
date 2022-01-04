<?php include ('includes/topbar.php')?>




        <div class="charts">
          <div class="mid-content-top charts-grids">
            <div class="middle-content">
              <h4 class="title">Users</h4>
              <!-- start content_slider -->
              <div class="alert alert-info">
                <i class="fa fa-envelope"></i>&nbsp;This screen displays 50 records use the search box to spool more records
              </div>

              <table id="example" class="display nowrap" style="width:100%">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>STAFF ID</th>
                    <th>RANK</th>
                    <th>DEPARTMENT</th>
                    <th>CONTACTS</th>
                    <th>PRINT</th>
                    <th>EDIT</th>
                    <th>DELETE</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $sqlmember = "SELECT * FROM Users ";
                  $retrieve = mysqli_query($db, $sqlmember);
                  $count = 0;
                  while ($found = mysqli_fetch_array($retrieve)) {
                    $title = $found['Mtitle'];
                    $firstname = $found['Firstname'];
                    $sirname = $found['Sirname'];
                    $rank = $found['Rank'];
                    $id = $found['id'];
                    $dept = $found['Department'];
                    $contact = $found['Email'];
                    $count = $count + 1;
                    $get_time = $found['Time'];
                    $time = time();
                    $pass = $found['Staffid'];
                    $names = $firstname . " " . $sirname;

                    echo "<tr>    <td>$id</td>                                       
                             <td>$title $firstname $sirname</td>        	
                             <td>$pass</td>
                             <td>$contact</td>
                             
			                 <td>$dept</td>
			                 <td>$rank</td>
			                 <td>
			                   <a  href='card.php?id=$id' class='btn  btn-success' title='click to print report' ><span class='glyphicon glyphicon-print' style='color:white;'></span></a>
                              </td>
			                 <td>
			                   <a data-toggle='modal' data-id='$id' data-ie='$firstname'   data-if='$sirname' data-ig='$rank' data-ih='$dept' data-ij='$contact' data-ik='$pass' class='open-Passwords btn  btn-info' title='edit user details' href='#Passwords'><span class='glyphicon glyphicon-edit' style='color:white;'></span></a>
							 
			                 </td>				                 
			                 <td>
			                   <a data-id='$id'  class='open-Delete btn  btn-danger' title='delete user' ><span class='glyphicon glyphicon-trash' style='color:white;'></span></a>
							 
			                 </td>			 
                             </tr>";
                  }

                  ?>
                </tbody>

              </table>
              <button id="clear-all-button">Clear All Filters</button>

            </div>

          </div>

          <!--//sreen-gallery-cursual---->
        </div>
      </div>
    </div>
    <!--footer-->
    <div class="footer">
      <p>© 2018 Attainment . All Rights Reserved | Design and developed by mvumapatrick@gmail.com

      </p>
    </div>
    <!--//footer-->
  </div>

  <!-- new added graphs chart js-->

  <script src="admin/js/Chart.bundle.js"></script>
  <script src="admin/js/utils.js"></script>


  <!-- Classie -->
  <!-- for toggle left push menu script -->
  <script src="admin/js/classie.js"></script>
  <script>
    var menuLeft = document.getElementById('cbp-spmenu-s1'),
      showLeftPush = document.getElementById('showLeftPush'),
      body = document.body;

    showLeftPush.onclick = function() {
      classie.toggle(this, 'active');
      classie.toggle(body, 'cbp-spmenu-push-toright');
      classie.toggle(menuLeft, 'cbp-spmenu-open');
      disableOther('showLeftPush');
    };


    function disableOther(button) {
      if (button !== 'showLeftPush') {
        classie.toggle(showLeftPush, 'disabled');
      }
    }
  </script>
  <!-- //Classie -->
  <!-- //for toggle left push menu script -->

  <!--scrolling js-->
  <script src="admin/js/jquery.nicescroll.js"></script>
  <script src="admin/js/scripts.js"></script>
  <!--//scrolling js-->

  <!-- side nav js -->
  <script src='admin/js/SidebarNav.min.js' type='text/javascript'></script>
  <script>
    $('.sidebar-menu').SidebarNav()
  </script>

  <!-- Bootstrap Core JavaScript -->
  <script src="admin/js/bootstrap.js""> </script>
	<!-- //Bootstrap Core JavaScript -->
	 	<script src=" css/bootstrap-dropdownhover.js"></script>

</body>

</html>