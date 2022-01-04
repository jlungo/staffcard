<?php 

include ('includes/topbar.php');

$leave = "SELECT * FROM leaves ORDER BY id DESC ";
$leaveretrieve = mysqli_query($db, $leave);
$count = 1;

?>

        <div class="charts">
          <div class="mid-content-top charts-grids">
            <div class="middle-content table-responsive">
              <h4 class="title">Staff User Report</h4>
              <!-- start content_slider -->
              <?php
              if($_SESSION['message'] != ''){?>
                    <div class="alert alert-info">
                        <i class="fa fa-envelope"></i>&nbsp;<?php echo $_SESSION['message']?>
                    </div>
              <?php }else{?>

                <?php } ?>
                 
              <table id="example" class="display nowrap" style="width:100%">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Emp no</th>
                    <th>Emp Name</th>
                    <th>Start date</th>
                    <th>End date</th>
                    <th>Total Days</th>
                    <th>Home address</th>
                    <th>Dependant Name</th>
                    <th>EDIT</th>
                    <th>DELETE</th>
                  </tr>
                </thead>
                <tbody>
               
                 <?php while ($foundleave = mysqli_fetch_array($leaveretrieve)) {?>
                    <tr>            
                                    <td><?php echo $count;?></td>
                                    <td><?php echo $foundleave['Empno'];?></td>
                                    <td><?php echo   $foundleave['Empname']; ?></td>
                                    <td><?php echo $foundleave['leavestart']; ?></td>
                                    <td><?php echo $foundleave['leaveend']; ?></td>
                                    <td><?php echo  $foundleave['totaldays']; ?></td>
                                    <td><?php echo  $foundleave['homeaddress']; ?></td>
                                    <td><?php echo  $foundleave['nameofdependant']; ?></td>
                                    <td><button><a data-toggle='modal' data-id='' href='#leave<?php echo $foundleave['id']?>' class='open-Initial2'><i class="fa fa-minus"></i>Edit Leave</a></button></td>
                                    <td><button><a  href='deleteleave.php?id=<?php echo $foundleave['id']?>' class='open-Initial2'><i class="fa fa-minus"></i>Delete Leave</a></button></td>
                 </tr>



                
 <div id="leave<?php echo $foundleave['id']?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
      <div class="modal-header" style="background:#222d32">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="font-weight: bold;color: #F0F0F0">
          <center>
            EDIT STAFF LEAVE
          </center>
        </h4>
      </div>
      <form method="post" action="addleave.php" enctype='multipart/form-data'>

        <div class="modal-body">
          <center>
          <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp;&nbsp;Emp No:<label style="color: red;font-size:20px;">*</label>
                <input style="width:270px;" type="text" name="empno" value="<?php if (isset($foundleave['Empno'])) {
                                                                                echo $foundleave['Empno'];
                                                                              } ?>"></span></p>
            <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;Emp name:<label style="color: red;font-size:20px;">*</label>
                <input style="width:270px;" type="text" name="empname" value="<?php if (isset($foundleave['Empname'])) {
                                                                                  echo $foundleave['Empname'];
                                                                                } ?>"></span></p>
            <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;Leave Start Date:<label style="color: red;font-size:20px;">*</label>
                <input style="width:270px;" type="text" name="leavestart" value="<?php if (isset($foundleave['leavestart'])) {
                                                                                  echo $foundleave['leavestart'];
                                                                                } ?>"></span></p>
            <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;Leave End Date:<label style="color: red;font-size:20px;">*</label>
                <input style="width:270px;" type="text" name="leaveend" value="<?php if (isset($foundleave['leaveend'])) {
                                                                                  echo $foundleave['leaveend'];
                                                                                } ?>"></span></p>
            <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp;&nbsp;Total Days:<label style="color: red;font-size:20px;">*</label>
                <input style="width:270px;" type="text" name="totaldays" value="<?php if (isset($foundleave['totaldays'])) {
                                                                                    echo $foundleave['totaldays'];;
                                                                                  } ?>"></span></p>
            <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">Home Address:<label style="color: red;font-size:20px;">*</label>
                <input style="width:270px;" type="text" name="home" value="<?php if (isset($foundleave['homeaddress'])) {
                                                                                echo $foundleave['homeaddress'];
                                                                              } ?>"></span></p>
                                                                               <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">Name of Dependant:<label style="color: red;font-size:20px;">*</label>
                <input style="width:270px;" type="text" name="depname" value="<?php if (isset($foundleave['nameofdependant'])) {
                                                                                echo $foundleave['nameofdependant'];
                                                                              } ?>"></span></p>

            <input type="hidden" name="id" value="<?php echo $foundleave['id']; ?>" />
            <input type="hidden" name="page" value="leavereport.php" />
            <input type="hidden" name="pageid" value="<?php echo $idz; ?>" />

          </center>
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-success" value="Update" id="addmember" name="leaveupdate"> &nbsp;
          <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
        </div>
    </div>
    </form>
  </div>
</div>

                
                <?php  $count++; } ?>
                 
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
  <script src="admin/js/bootstrap.js"> </script>
	<!-- //Bootstrap Core JavaScript -->
	 	<script src=" css/bootstrap-dropdownhover.js"></script>
<?php $_SESSION['message']='';?>
</body>

</html>