<?php 

include ('includes/db_connection.php');

$leave = "SELECT * FROM leaves ORDER BY id DESC ";
$leaveretrieve = mysqli_query($db, $leave);
$count = 1;

?>

<!DOCTYPE HTML>
<html>

<head>
  <title>admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
  <script type="application/x-javascript">
    addEventListener("load", function() {
      setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
      window.scrollTo(0, 1);
    }
  </script>

  <!-- Bootstrap Core CSS -->
  <link href="admin/css/bootstrap.css" rel='stylesheet' type='text/css' />

  <!-- Custom CSS -->
  <link href="admin/css/style.css" rel='stylesheet' type='text/css' />

  <!-- font-awesome icons CSS -->
  <link href="admin/css/font-awesome.css" rel="stylesheet">
  <!-- //font-awesome icons CSS-->

  <!-- side nav css file -->
  <link href='admin/css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css' />
  <!-- //side nav css file -->

  <!-- js-->
  <script src="admin/js/jquery-1.11.1.min.js"></script>
  <script src="admin/js/modernizr.custom.js"></script>

  <!--webfonts-->
  <link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
  <!--//webfonts-->

  <!-- chart -->
  <script src="admin/js/Chart.js"></script>
  <!-- //chart -->

  <!-- Metis Menu -->
  <script src="admin/js/metisMenu.min.js"></script>
  <script src="admin/js/custom.js"></script>
  <link href="admin/css/custom.css" rel="stylesheet">
  <!--//Metis Menu -->
  <script src="script/sweetalert.min.js"></script>
  <link rel="stylesheet" type="text/css" href="script/sweetalert.css">

  <!-- <script src="jquery.js"></script> -->
  <link href="css/animate.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/bootstrap-dropdownhover.css">


  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css" />


  <script src='https://code.jquery.com/jquery-1.12.4.js'></script>
  <script src='https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js'></script>
  <script src='https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js'></script>
  <script src='https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js'></script>
  <script src='https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js'></script>
  <script src='https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js'></script>

  <script>
    $(document).ready(function() {
      $('#example').DataTable({


      });
    });
  </script>
  <script type="text/javascript">
    $(document).on("click", ".open-Delete", function() {
      var myValue = $(this).data('id');
      swal({
          title: "Are you sure?",
          text: "You want to remove this staff from the database!",
          type: "warning",
          showCancelButton: true,
          cancelButtonColor: "red",
          confirmButtonColor: "green",
          confirmButtonText: "Yes, remove!",
          cancelButtonText: "No, cancel!",
          closeOnConfirm: false,
          closeOnCancel: false,
          buttonsStyling: false
        },
        function(isConfirm) {
          if (isConfirm) {
            var vals = myValue;
            $.ajax({
              type: 'POST',
              url: "upload.php",
              data: {
                Valuedel: vals
              },
              success: function(result) {
                if (result == "ok") {
                  swal({
                      title: "Deleted!",
                      text: "Staff has been deleted from the database.",
                      type: "success"
                    },
                    function() {
                      location.reload();
                    }
                  );
                }

              }
            });
          } else {
            swal("Cancelled", "This user is safe :)", "error");
          }
        });

    });
  </script>

  <script type="text/javascript">
    $(document).on("click", ".open-Updatepicture", function() {
      var myTitle = $(this).data('id');
      $(".modal-body #bookId").val(myTitle);

    });
  </script>
  <!-- requried-jsfiles-for owl -->
  <!-- //requried-jsfiles-for owl -->
</head>

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