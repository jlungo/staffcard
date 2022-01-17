<?php
session_start();
include("db_connect.php");

if (isset($_COOKIE['adminid']) && $_COOKIE['adminemail']) {

  $userid = $_COOKIE['adminid'];
  $useremail = $_COOKIE['adminemail'];

  $sqluser = "SELECT * FROM Administrator WHERE Password='$userid' && Email='$useremail'";

  $retrieved = mysqli_query($db, $sqluser);
  while ($found = mysqli_fetch_array($retrieved)) {
    $firstname = $found['Firstname'];
    $sirname = $found['Sirname'];
    $emails = $found['Email'];
    $id = $found['id'];
  }
} else {
  header('location:index.php');
  exit;
}
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
          title: "Confirm deleting Leave Report",
          text: "Are you sure you want to delete this leave report?",
          type: "warning",
          showCancelButton: true,
          cancelButtonColor: "red",
          confirmButtonColor: "green",
          confirmButtonText: "Remove",
          cancelButtonText: "Cancel",
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
                      text: "Staff Leave has been deleted from the database.",
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
            swal("Cancelled", "This staff report is safe :)", "error");
          }
        });

    });
  </script>

  
  <!-- requried-jsfiles-for owl -->
  <!-- //requried-jsfiles-for owl -->
</head>
<script type="text/javascript">
  $(document).on("click", ".open-Passwords", function() {

    var myT = $(this).data('id');
    var myTitle = $(this).data('ie');
    var myp = $(this).data('if');
    var mym = $(this).data('ig');
    var myn = $(this).data('ih');
    var myk = $(this).data('ij');
    var mykm = $(this).data('ik');


    $(".modal-title #oldname").val(myTitle);
    $(".modal-body #oldname").val(myTitle);
    $(".modal-body #oldpass").val(mykm);
    $(".modal-body #ss").val(myp);
    $(".modal-body #bb").val(mym);
    $(".modal-body #cc").val(myn);
    $(".modal-body #dd").val(myk);
    $(".modal-body #staffid").val(myT);
  });
</script>
<?php if (isset($_SESSION['memberadded'])) { ?>
  <script type="text/javascript">
    $(document).ready(function() {
      swal({
        title: "Successful!",
        text: "Staff added successfully!!.",
        type: "success"
      });
    });
  </script>

<?php
  session_destroy();
} ?>
<?php if (isset($_SESSION['memberexist'])) { ?>
  <script type="text/javascript">
    $(document).ready(function() {
      sweetAlert("Oops...", "There is arleady a staff with those details in the database", "error");
    });
  </script>
<?php
  session_destroy();
}
?>
<?php if (isset($_SESSION['emptytextboxes'])) { ?>
  <script type="text/javascript">
    $(document).ready(function() {
      sweetAlert("Oops...", "You did not fill all the textboxes on the form", "error");
    });
  </script>
<?php
  session_destroy();
}
?>
<?php if (isset($_SESSION['tutor'])) { ?>
  <script type="text/javascript">
    $(document).ready(function() {
      swal({
          title: "User removed successfully",
          text: "Do you want to remove another one?",
          type: "success",
          showCancelButton: true,
          confirmButtonColor: "green",
          confirmButtonText: "OK!",
          closeOnConfirm: true,
          closeOnCancel: true,
          buttonsStyling: false
        },
        function(isConfirm) {
          if (isConfirm) {
            window.location = "administrator.php?id=2";
          } else {
            window.location = "administrator.php";
          }
        });

    });
  </script>
<?php
  session_destroy();
}
?>
<?php if (isset($_SESSION['cat'])) { ?>
  <script type="text/javascript">
    $(document).ready(function() {
      sweetAlert("Oops...", "This category arleady in the system", "error");
    });
  </script>
<?php
  session_destroy();
}
?>
<?php if (isset($_SESSION['category'])) { ?>
  <script type="text/javascript">
    $(document).ready(function() {
      swal({
          title: "Category added successfully",
          text: "Do you want to add another one?",
          type: "success",
          showCancelButton: true,
          confirmButtonColor: "green",
          confirmButtonText: "OK!",
          closeOnConfirm: true,
          closeOnCancel: true,
          buttonsStyling: false
        },
        function(isConfirm) {
          if (isConfirm) {
            window.location = "administrator.php?id=3";
          } else {
            window.location = "administrator.php";
          }
        });

    });
  </script>
<?php
  session_destroy();
}
?>
<?php if (isset($_SESSION['del'])) { ?>
  <script type="text/javascript">
    $(document).ready(function() {
      swal({
          title: "Category Deleted",
          text: "Do you want to delete another one?",
          type: "success",
          showCancelButton: true,
          confirmButtonColor: "green",
          confirmButtonText: "OK!",
          closeOnConfirm: true,
          closeOnCancel: true,
          buttonsStyling: false
        },
        function(isConfirm) {
          if (isConfirm) {
            window.location = "administrator.php?id=4";
          } else {
            window.location = "administrator.php";
          }
        });

    });
  </script>
<?php
  session_destroy();
}
?>




<?php if (isset($_SESSION['pass'])) { ?>
  <script type="text/javascript">
    $(document).ready(function() {
      swal({
        title: "Successful!",
        text: "Staff details edited!!.",
        type: "success"
      });

    });
  </script>
<?php session_destroy();
} ?>


<?php $sqlid = "SELECT * FROM Users Order BY id DESC";
$ret = mysqli_query($db, $sqlid);
while ($found = mysqli_fetch_array($ret)) {
  $idsx = $found['id'];
}




$sqluse = "SELECT * FROM Inorg ORDER BY id DESC ";
$retrieve = mysqli_query($db, $sqluse);
while ($foundk = mysqli_fetch_array($retrieve)) {
  $name = $foundk['name'];
  $website = $foundk['website'];
  $phone = $foundk['Phone'];
  $year = $foundk['year'];
  $mail = $foundk['email'];
  $idz = $foundk['id'];
}

?>





<div id="Passwords" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
      <div class="modal-header" style="background:#222d32">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="font-family: Times New Roman;color:#F0F0F0;">
          <center>
            Edit details of <input style="border: none;background:#222d32" type="text" id="oldname" value="" readonly="readonly" />

          </center>
        </h4>
      </div>
      <div class="modal-body">
        <center>

          <form method="post" action="upload.php" enctype='multipart/form-data'>

            <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;Firstname:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="mfname" id='oldname'></span></p>
            <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp; &nbsp;Sirname:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="msname" id='ss'></span></p>
            <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">Department:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="minstitution" id='cc'></span></p>
            <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rank:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="mrank" id='dd'></span></p>
            <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp;Email:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="memail" id='bb'></span></p>
            <p><span style="font-size: 18px; font-weight: bold;">&nbsp;&nbsp; &nbsp;&nbsp;Staff ID:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="mid" id='oldpass'></span></p>
            Add profile picture:<input name='filed' type='file' id='filed'>
            <input type="hidden" name="page" id="staffid" />

        </center>

      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-success" value="Reset" id="amendreceipt" name="resetpass"> &nbsp;
        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
      </div>
    </div>
    </form>
  </div>
</div>
<div id="Updatepicture" class="modal fade" role="dialog">
  <div class="modal-dialog" style="float:right;width:20%">
    <!-- Modal content-->
    <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
      <div class="modal-header" style="background:#222d32">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">
        </h4>
      </div>
      <div class="modal-body">
        <center>
          <p></p>
          <form method="post" action="upload.php" enctype='multipart/form-data'>

            <p style="margin-bottom:10px;">
              Select picture<input name='file2' type='file' id='file2'>
            </p>
            <p>
              <input name='id' type='hidden' value='' id='bookId'>
              <input name='category' type='hidden' value='Administrator'>
              <input type="hidden" name="page" value="users.php" />

            </p>

        </center>
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-success" value="Change" id="btns1" name="Change"> &nbsp;

      </div>
    </div>
    </form>
  </div>
</div>


<body class="cbp-spmenu-push">
  <div class="main-content">
    <div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
      <!--left-fixed -navigation-->
      <aside class="sidebar-left">
        <nav class="navbar navbar-inverse">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>


            <?php
            $sqln = "SELECT * FROM Inorg ";
            $rgetb = mysqli_query($db, $sqln);
            $numb = mysqli_num_rows($rgetb);
            if ($numb != 0) {
              while ($foundl = mysqli_fetch_array($rgetb)) {
                $profile = $foundl['pname'];
              }
              echo "<center><img src='media/$profile'  width='70%' height='140px' alt=''></center>";
            } else {



            ?>
              <h1>
                <a class="navbar-brand" href="index.html"><span class="fa fa-area-chart">

                  </span>MAIN MENU<span class="dashboard_text"></span>
                </a>
              </h1>
            <?php } ?>

          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="sidebar-menu">
              <li class="header">
                <h4>Administrator</h4>
              </li>


              <li class="treeview">
                <a href="admin.php">
                  <i class="fa fa-tv"></i> <span>Return Home</span>
                </a>
              </li>


              

              <li class="treeview">
                <a href="#">
                  <i class="fa fa-sign-out"></i>
                  <span>Staff Leave</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a data-toggle='modal' data-id='' href='#Leaveadd' class='open-Initial'><i class="fa fa-plus"></i>Add Staff On Leave</a></li>
                  <li><a data-toggle='modal' data-id='' href='#Initialisation2' class='open-Initial2'><i class="fa fa-minus"></i>Edit Staff On Leave</a></li>
                  <li><a data-toggle='modal' data-id='' href='leavereport.php' class='open-Initial2'><i class="fa fa-tv"></i>View Leave report</a></li>
                </ul>
              </li>

              


            </ul>
          </div>
          <!-- /.navbar-collapse -->
        </nav>
      </aside>
    </div>
    <!--left-fixed -navigation-->

    <!-- header-starts -->
    <div class="sticky-header header-section">
      <div class="header-left">
        <!--toggle button start-->
        <button id="showLeftPush"><i class="fa fa-bars"></i></button>
        <!--toggle button end-->

        <!--notification menu end -->
        <div class="clearfix"> </div>
      </div>
      <div class="header-right">


        <!--search-box-->

        <div class="profile_details">
          <ul>
            <li class="dropdown profile_details_drop">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                <div class="profile_img">
                  <span class="prfil-img">
                    <?php
                    $sql = "SELECT * FROM Profilepictures WHERE ids='$id' && Category='User'";
                    $rget = mysqli_query($db, $sql);
                    $num = mysqli_num_rows($rget);
                    if ($num != 0) {
                      while ($found = mysqli_fetch_array($rget)) {
                        $profile = $found['name'];
                      }
                      echo "<img src='admin/images/$profile' height='50px' width='50px' alt=''>";
                    } else {
                      echo "<img src='admin/images/profile.png' height='50px' width='50px' alt=''>";
                    }

                    ?>
                  </span>
                  <div class="user-name">
                    <p style="color:#1D809F;"><?php if (isset($sirname)) {
                                                echo "<strong>" . $firstname . " " . $sirname . "! </strong>";
                                              } ?>
                    </p>
                    <span>Administrator&nbsp;<img src='admin/images/dot.png' height='15px' width='15px' alt=''>
                    </span>
                  </div>
                  <i class="fa fa-angle-down lnr"></i>
                  <i class="fa fa-angle-up lnr"></i>
                  <div class="clearfix"></div>
                </div>
              </a>
              <ul class="dropdown-menu drp-mnu">
                <li>
                  <a data-toggle='modal' data-id='<?php echo $id; ?>' href='#Updatepicture' class='open-Updatepicture'><i class="fa fa-user"></i>Change profile picture</a>
                </li>
                <li> <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a> </li>
              </ul>
            </li>
          </ul>
        </div>
        <div class="clearfix"> </div>
      </div>
      <div class="clearfix"> </div>
    </div>
    <!-- //header-ends -->
    <!-- main content start-->
    <div id="page-wrapper">
      <div class="main-page">







        <div class="charts">
          <div class="mid-content-top charts-grids">
            <div class="middle-content">
              <h4 class="title">Leave Report</h4>
              <!-- start content_slider -->
              <div class="alert alert-info">
                <i class="fa fa-envelope"></i>&nbsp;Leave report of all staff's who are on valid Leave
              </div>

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
                    
                  </tr>
                </thead>
                <tbody>
                  <?php $leaves = "SELECT * FROM leaves WHERE leaveend  >= Date(now())";
                  $retrieve = mysqli_query($db, $leaves);
                  $count = 0;
                  while ($found = mysqli_fetch_array($retrieve)) {
                                        $Empno = $found['Empno'];
                                      $name = $found['Empname'];
                                  $leavestart = $found['leavestart']; 
                                 $leaveend=  $found['leaveend'];
                                  $totaldays =$found['totaldays']; 
                                  $homeaddress= $found['homeaddress'];
                                   $found['nameofdependant']; 
                
                    echo "<tr>    <td>$id</td> 
                              <td>$Empno</td>                                       
                             <td>$name</td>        	
                             <td>$leavestart</td>
                             <td>$leaveend</td>
                             
			                 <td>$totaldays</td>
			                 <td>$homeaddress</td>
			                git 	 
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
      <p> For Office use only

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