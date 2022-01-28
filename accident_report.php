<?php 
session_start();
include("db_connect.php");

if(isset($_COOKIE['adminid'])&&$_COOKIE['adminemail']){
	
	$userid=$_COOKIE['adminid'];
$useremail=$_COOKIE['adminemail'];

$sqluser ="SELECT * FROM Administrator WHERE Password='$userid' && Email='$useremail'";

$retrieved = mysqli_query($db,$sqluser);
    while($found = mysqli_fetch_array($retrieved))
	     {
              $firstname = $found['Firstname'];
		      $sirname= $found['Sirname'];
			  $emails = $found['Email'];
			  	   $id= $found['id'];			  
   
  	     
}		 
		 
}else{
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

    <!--autofill scripts-->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js">
    </script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript">
    </script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
    </script>

    <!--webfonts-->
    <link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext"
        rel="stylesheet">
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
    $(document).on("click", ".open-Delete-accident", function() {
        var myValue = $(this).data('emp_no');
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
                            accident: vals
                        },
                        success: function(result) {
                            if (result == 1) {
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
<script type="text/javascript">
$(document).on("click", ".open-Passwords", function() {

    var myT = $(this).data('id');
    var myTitle = $(this).data('ie');
    var myp = $(this).data('if');
    var mym = $(this).data('ig');
    var myn = $(this).data('ih');
    var myk = $(this).data('ij');
    var mykm = $(this).data('ik');
    var accidentid = $(this).data('in');



    $(".modal-title #oldname").val(myTitle);
    $(".modal-body #oldname").val(myTitle);
    $(".modal-body #oldpass").val(mykm);
    $(".modal-body #ss").val(myp);
    $(".modal-body #bb").val(mym);
    $(".modal-body #cc").val(myn);
    $(".modal-body #dd").val(myk);
    $(".modal-body #staffid").val(myT);
    $(".modal-body #accidentid").val(accidentid);

});
</script>
<?php if(isset($_SESSION['memberadded'])){?>
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
		    }?>
<?php if(isset($_SESSION['memberexist'])){?>
<script type="text/javascript">
$(document).ready(function() {
    sweetAlert("Oops...", "There is arleady a staff with those details in the database", "error");
});
</script>
<?php 
       	   session_destroy();}  
           ?>
<?php if(isset($_SESSION['emptytextboxes'])){?>
<script type="text/javascript">
$(document).ready(function() {
    sweetAlert("Oops...", "You did not fill all the textboxes on the form", "error");
});
</script>
<?php 
       	   session_destroy();}  
           ?>
<?php if(isset($_SESSION['tutor'])){?>
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
       	   session_destroy();}  
           ?>
<?php if(isset($_SESSION['cat'])){?>
<script type="text/javascript">
$(document).ready(function() {
    sweetAlert("Oops...", "This category arleady in the system", "error");
});
</script>
<?php 
       	   session_destroy();}  
           ?>
<?php if(isset($_SESSION['category'])){?>
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
       	   session_destroy();}  
           ?>
<?php if(isset($_SESSION['del'])){?>
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
       	   session_destroy();}  
           ?>




<?php if(isset($_SESSION['pass'])) {?>
<script type="text/javascript">
$(document).ready(function() {
    swal({
        title: "Successful!",
        text: "Staff details edited!!.",
        type: "success"
    });

});
</script>
<?php  session_destroy(); }?>


<?php   $sqlid ="SELECT * FROM Users Order BY id DESC";
			       $ret = mysqli_query($db,$sqlid);				                
                     while($found = mysqli_fetch_array($ret))
	                 {
                       $idsx=$found['id'];
                     }
      
	  
	    

$sqluse ="SELECT * FROM Inorg ORDER BY id DESC ";
$retrieve = mysqli_query($db,$sqluse);
    while($foundk = mysqli_fetch_array($retrieve))
	     {
              $name = $foundk['name'];
		      $website= $foundk['website'];
              $phone= $foundk['Phone'];
              $year= $foundk['year'];
			  $mail= $foundk['email'];
			  $idz= $foundk['id'];
		 }	 

  ?>

<div id="Taxreceipted" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
            <div class="modal-header" style="background:#222d32">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="font-weight: bold;color: #F0F0F0">
                    <center>
                        PRINT IDs IN BULK
                    </center>
                </h4>
            </div>

            <div class="modal-body">
                <form action="printbulk.php" method="post">
                    <div class="input-group" style="margin-bottom:10px">
                        <span class="input-group-addon">From</span>
                        <input id="text" type="number" class="form-control" name="startpoint">
                    </div>
                    <div class="input-group" style="margin-bottom:10px">
                        <span class="input-group-addon">To</span>
                        <input type="number" class="form-control" name="endpoint">
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">Employee id starts @</span>
                        <input id="msg" type="text" class="form-control" name="receiptrange" placeholder=""
                            value="<?php echo$idsx; ?>" readonly="readonly">
                    </div>


            </div>
            <div class="modal-footer">



                <input type="submit" class="btn btn-success" value="Submit" id="btns1" name="Change"> &nbsp;
            </div>
            </form>
        </div>
    </div>
</div>



<div id="Passwords" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <!-- Modal content-->
        <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
            <div class="modal-header" style="background:#222d32">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="font-weight: bold;color: #F0F0F0">
                    <center>
                        EDIT ACCIDENT INFORMATION OF <input style="border: none; background:#222d32" type="text"
                            id="oldname" value="" readonly />
                    </center>
                </h4>
            </div>
            <form method="post" action="upload.php" enctype='multipart/form-data'>
                <div class="modal-body">
                    <center>
                        <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp;
                                &nbsp;Employee Number:<label style="color: red;font-size:20px;">*</label><input
                                    style="width:270px;" type="text" name="Emp_No" id='staffid'></span></p>
                        <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp;
                                &nbsp;&nbsp; &nbsp;Employee Name:<label
                                    style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text"
                                    name="Emp_Name" id='oldname'></span></p>
                        <p style="margin-bottom:10px;"><span
                                style="font-size: 18px; font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Job
                                Description:<label style="color: red;font-size:20px;">*</label><input
                                    style="width:270px;" type="text" name="job_desc" id='ss'></span></p>
                        <p style="margin-bottom:10px;"><span
                                style="font-size: 18px; font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Accident
                                Type:<label style="color: red;font-size:20px;">*</label><input style="width:270px;"
                                    type="text" name="acc_type" id='ss'></span></p>
                        <p style="margin-bottom:10px;"><span
                                style="font-size: 18px; font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Accident
                                Description:<label style="color: red;font-size:20px;">*</label><input
                                    style="width:270px;" type="text" name="acc_desc" id='ss'></span></p>

                        <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp;Accident
                                Date:<label style="color: red;font-size:20px;">*</label><input style="width:270px;"
                                    type="date" name="acc_date" id='cc'></span></p>
                        <p style="margin-bottom:10px;"><span
                                style="font-size: 18px; font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Any
                                Description:<label style="color: red;font-size:20px;">*</label><input
                                    style="width:270px;" type="text" name="acc_desc" id='ss'></span></p>

                        <input type="hidden" name="id" id="accidentid" />
                    </center>

                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success" value="Update" id="edit_pension" name="edit_pension">
                    &nbsp;
                    <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                </div>
        </div>
        </form>
    </div>
</div>

<div id="Useradd" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
            <div class="modal-header" style="background:#222d32">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="font-weight: bold;color: #F0F0F0">
                    <center>
                        ADD STAFF DETAILS
                    </center>
                </h4>
            </div>

            <div class="modal-body">
                <center>
                    <form method="post" action="upload.php" enctype='multipart/form-data' style="width: 98%;">


                        <p style="margin-bottom:10px;">
                            <span style="font-size: 15px; font-weight: bold;"><input type="checkbox"
                                    name="pro">&nbsp;Pro&nbsp;&nbsp; &nbsp; &nbsp;</span>
                            <span style="font-size: 15px; font-weight: bold;"><input type="checkbox" name="dr">&nbsp;Dr
                                &nbsp; &nbsp;&nbsp;&nbsp;</span>
                            <span style="font-size: 15px; font-weight: bold;"><input type="checkbox" name="mr">&nbsp;Mr
                                &nbsp; &nbsp; &nbsp;&nbsp;</span>
                            <span style="font-size: 15px; font-weight: bold;"><input type="checkbox"
                                    name="mrs">&nbsp;Mrs &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span>
                            <span style="font-size: 15px; font-weight: bold;"><input type="checkbox"
                                    name="miss">&nbsp;Miss</span>
                        </p>

                        <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp;
                                &nbsp;Firstname:<label style="color: black;font-size:20px;">*</label><input
                                    style="width:270px;" type="text" name="mfname"></span></p>
                        <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp;
                                &nbsp;&nbsp; &nbsp;Sirname:<label style="color: black;font-size:20px;">*</label><input
                                    style="width:270px;" type="text" name="msname"></span></p>
                        <p style="margin-bottom:10px;"><span
                                style="font-size: 18px; font-weight: bold;">Department:<label
                                    style="color: black;font-size:20px;">*</label><input style="width:270px;"
                                    type="text" name="minstitution"></span></p>
                        <p style="margin-bottom:10px;"><span
                                style="font-size: 18px; font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rank:<label
                                    style="color: black;font-size:20px;">*</label><input style="width:270px;"
                                    type="text" name="memail"></span></p>
                        <p style="margin-bottom:10px;"><span
                                style="font-size: 18px; font-weight: bold;">&nbsp;Email:<label
                                    style="color: black;font-size:20px;">*</label><input style="width:270px;"
                                    type="text" name="mphone"></span></p>
                        <p><span style="font-size: 18px; font-weight: bold;">&nbsp;&nbsp; &nbsp;&nbsp;Staff ID:<label
                                    style="color: black;font-size:20px;">*</label><input style="width:270px;"
                                    type="text" name="mpassword"></span></p>
                        Add profile picture:<input name='filed' type='file' id='filed'>

                        <input type="hidden" name="page" value="admin.php" />
                </center>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-success" value="Submit" id="addmember" name="addmember"> &nbsp;
                <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
            </div>
        </div>
        </form>
    </div>
</div>

<div id="Initialisation" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
            <div class="modal-header" style="background:#222d32">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="font-weight: bold;color: #F0F0F0">
                    <center>
                        SYSTEM INFORMATION INITIALISATION
                    </center>
                </h4>
            </div>
            <form method="post" action="upload.php" enctype='multipart/form-data'>

                <div class="modal-body">
                    <center>
                        <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp;&nbsp;Org
                                Name:<label style="color: black;font-size:20px;">*</label><input style="width:270px;"
                                    type="text" name="orgname"></span></p>
                        <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp;
                                &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;Phone:<label
                                    style="color: black;font-size:20px;">*</label><input style="width:270px;"
                                    type="text" name="orgphone"></span></p>
                        <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp;
                                &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;Email:<label
                                    style="color: black;font-size:20px;">*</label><input style="width:270px;"
                                    type="text" name="orgemail"></span></p>
                        <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp;
                                &nbsp;&nbsp;&nbsp;Website:<label style="color: black;font-size:20px;">*</label><input
                                    style="width:270px;" type="text" name="orgwebsite"></span></p>
                        <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">Active
                                Year:<label style="color: black;font-size:20px;">*</label><input style="width:270px;"
                                    type="text" name="orgyear"></span></p>
                        Attach Organisation Logo:(<h7 style="color:black">Make sure it is a transparent image</h7>
                        )<input name='filed' type='file' id='filed'>
                        <input type="hidden" name="page" value="admin.php" />
                    </center>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success" value="Finish" id="addmember" name="orginitial"> &nbsp;
                    <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                </div>
        </div>
        </form>
    </div>
</div>

<!--ADD ACCIDENT HISTORY--->
<div id="add_promotion" class="modal fade" role="dialog">


    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
            <div class="modal-header" style="background:#222d32">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="font-weight: bold;color: #F0F0F0">
                    <center>
                        ADD ACCIDENT HISTORY
                    </center>
                </h4>
            </div>
            <form method="post" action="process.php" enctype='multipart/form-data'>

                <div class="modal-body">
                    <center>


                        <table>


                            <tr>
                                <td>
                                    <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">
                                            <label for="emp_no" style="color: black;font-size:20px;">Emp No:*
                                            </label>
                                        </span></p>
                                </td>
                                <td>
                                    <p style="margin-bottom:10px;"><span style="font-size: 18px; ">
                                            <input style="width:270px;" type="text" id="id"
                                                onkeyup="GetDetail(this.value)" value="" name="emp_no">
                                        </span></p>
                                </td>
                            </tr>



                            <tr>
                                <td>
                                    <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">
                                            <label for="emp_name" style="color: black;font-size:20px;">Emp
                                                Name:*</label>
                                        </span></p>
                                </td>

                                <td>
                                    <p style="margin-bottom:10px;"><span style="font-size: 18px;">
                                            <input style="width:270px;" type="text" id="Emp_Name" value=""
                                                name="emp_name">
                                        </span></p>
                                </td>
                            </tr>


                            <tr>
                                <td>
                                    <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">
                                            <label for="job_desc" style="color: black;font-size:20px;">Job
                                                Description:*</label>
                                        </span></p>
                                </td>
                                <td>
                                    <p style="margin-bottom:10px;"><span style="font-size: 18px;">
                                            <input style="width:270px;" type="text" name="job_desc">
                                        </span></p>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">
                                            <label for="acc_type" style="color: black;font-size:20px;">Accident
                                                Type:*</label>
                                        </span></p>
                                </td>
                                <td>
                                    <p style="margin-bottom:10px;"><span style="font-size: 18px; "> <input
                                                style="width:270px;" type="text" name="acc_type">
                                        </span></p>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">
                                            <label for="acc_desc" style="color: black;font-size:20px;">Accident
                                                Description:*</label>
                                        </span></p>
                                </td>
                                <td>
                                    <p style="margin-bottom:10px;"><span style="font-size: 18px; ">
                                            <input style="width:270px;" type="text" name="acc_desc">
                                        </span></p>
                                </td>
                            </tr>


                            <tr>
                                <td>
                                    <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">
                                            <label for="acc_date" style="color: black;font-size:20px;">Accident
                                                Date:*</label>
                                        </span></p>
                                </td>
                                <td>
                                    <p style="margin-bottom:10px;"><span style="font-size: 18px;"> <input
                                                style="width:270px;" type="date" name="acc_date">
                                        </span></p>
                                </td>
                            </tr>


                            <tr>
                                <td>
                                    <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">
                                            <label for="any_desc" style="color: black;font-size:20px;">
                                                Any
                                                Description:*
                                            </label>
                                        </span></p>
                                </td>
                                <td> <br> <textarea name="any_desc" style="width:270px;"> </textarea>
                                </td>
                            </tr>

                            <input type="hidden" name="page" value="admin.php" />
                        </table>

                    </center>

                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success" value="submit" id="addmember" name="save"> &nbsp;
                    <button type="button" class="btn btn-success" data-dismiss="modal">CLOSE</button>
                </div>
        </div>
        </form>
    </div>
</div>


<div id="Initialisation2" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
            <div class="modal-header" style="background:#222d32">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="font-weight: bold;color: #F0F0F0">
                    <center>
                        EDIT SYSTEM INFORMATION
                    </center>
                </h4>
            </div>
            <form method="post" action="upload.php" enctype='multipart/form-data'>

                <div class="modal-body">
                    <center>
                        <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp;&nbsp;Org
                                Name:<label style="color: black;font-size:20px;">*</label>
                                <input style="width:270px;" type="text" name="orgname"
                                    value="<?php if(isset($name)){echo$name;} ?>"></span></p>
                        <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp;
                                &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;Phone:<label
                                    style="color: black;font-size:20px;">*</label>
                                <input style="width:270px;" type="text" name="orgphone"
                                    value="<?php if(isset($phone)){echo$phone;} ?>"></span></p>
                        <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp;
                                &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;Email:<label
                                    style="color: black;font-size:20px;">*</label>
                                <input style="width:270px;" type="text" name="orgemail"
                                    value="<?php if(isset($mail)){echo$mail;} ?>"></span></p>
                        <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp;
                                &nbsp;&nbsp;&nbsp;Website:<label style="color: black;font-size:20px;">*</label>
                                <input style="width:270px;" type="text" name="orgwebsite"
                                    value="<?php if(isset($website)){echo$website;} ?>"></span></p>
                        <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">Active
                                Year:<label style="color: black;font-size:20px;">*</label>
                                <input style="width:270px;" type="text" name="orgyear"
                                    value="<?php if(isset($year)){echo$year;} ?>"></span></p>
                        Attach Organisation Logo:(<h7 style="color:black">Make sure it is a transparent image</h7>
                        )<input name='filed' type='file' id='filed'>
                        <input type="hidden" name="page" value="admin.php" />
                        <input type="hidden" name="pageid" value="<?php echo$idz; ?>" />

                    </center>

                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success" value="Update" id="addmember" name="orgupdate"> &nbsp;
                    <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
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
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target=".collapse" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>


                        <?php   
				$sqln ="SELECT * FROM Inorg ";
                     $rgetb = mysqli_query($db,$sqln);
	                   $numb=mysqli_num_rows($rgetb);
                   if($numb!=0){
                            while($foundl = mysqli_fetch_array($rgetb))
	                                     {
                                              $profile= $foundl['pname'];
		                                  }
										echo"<center><img src='media/$profile'  width='70%' height='140px' alt=''></center>";	   
                               }
							else{
														     	
								
										
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
                                    <i class="fa fa-tv"></i> <span>Control Panel</span>
                                </a>
                            </li>

                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-cog"></i>
                                    <span>Initialisation</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>

                                <ul class="treeview-menu">
                                    <li><a data-toggle='modal' data-id='' href='#Initialisation' class='open-Initial'><i
                                                class="fa fa-plus"></i>Add System Info</a></li>
                                    <li><a data-toggle='modal' data-id='' href='#Initialisation2'
                                            class='open-Initial2'><i class="fa fa-minus"></i>Edit System Info</a></li>
                                </ul>
                            </li>

                            <li class="treeview">
                                <a data-toggle='modal' data-id='' href='#Useradd' class='open-adduser'><i
                                        class="fa fa-user"></i>Add Employee</a>

                            </li>
                            <li class="treeview">
                                <a href="bulk.php"><i class='fa fa-print'></i>Bulk Registration</a>
                            </li>
                            <li class="treeview">
                                <a data-toggle='modal' href="#Taxreceipted" class="Open-Taxreceipted"><i
                                        class='fa fa-print'></i>Bulk printing</a>
                            </li>
                            <!-- workplace accident info system menu in the side panel -->
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-cog"></i>
                                    <span>Work Accident Report</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a data-toggle='modal' data-id='' href='#add_promotion' class='open-Initial'><i
                                                class="fa fa-plus"></i>Add Accident History</a></li>
                                    <li><a href='accident_report.php' class='open-Initial2'><i
                                                class="fa fa-minus"></i>List of Staff & Accident Info.</a></li>
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
										$sql ="SELECT * FROM Profilepictures WHERE ids='$id' && Category='User'";
                                                $rget = mysqli_query($db,$sql);
												$num=mysqli_num_rows($rget);
                                                if($num!=0){
												                  while($found = mysqli_fetch_array($rget))
	                                                                {
                                                                       $profile= $found['name'];
		                                                            }
																	echo"<img src='admin/images/$profile' height='50px' width='50px' alt=''>";	   
												             }
												        else{
												           	echo"<img src='admin/images/profile.png' height='50px' width='50px' alt=''>";	   
														     	
												             }
										
										?>
                                    </span>
                                    <div class="user-name">
                                        <p style="color:#1D809F;"><?php if(isset($sirname))
                                            {echo"<strong>".$firstname." ".$sirname."! </strong>";} ?>
                                        </p>
                                        <span>Administrator&nbsp;<img src='admin/images/dot.png' height='15px'
                                                width='15px' alt=''>
                                        </span>
                                    </div>
                                    <i class="fa fa-angle-down lnr"></i>
                                    <i class="fa fa-angle-up lnr"></i>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                            <ul class="dropdown-menu drp-mnu">
                                <li>
                                    <a data-toggle='modal' data-id='<?php echo$id; ?>' href='#Updatepicture'
                                        class='open-Updatepicture'><i class="fa fa-user"></i>Change profile picture</a>
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
                            <h4 class="title">List of Staff & Accident Info</h4>
                            <!-- start content_slider -->
                            <div class="alert alert-info">
                                <i class="fa fa-envelope"></i>&nbsp;This screen displays 50 records use the search box
                                to spool more records
                            </div>

                            <table id="example" class="display nowrap" style="width:100%">
                                <thead>
                                    <tr>



                                        <th>Emp No</th>
                                        <th>Emp Name</th>
                                        <th>Job <br>Description</th>
                                        <th>Accident <br>Type</th>
                                        <th>Accident <br>Desciption</th>
                                        <th>Accident <br> Date</th>
                                        <th>Any Description</th>
                                        <th>Edit </th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php $sqlmember ="SELECT * FROM workplace "; //name of database
                                          $retrieve = mysqli_query($db,$sqlmember);
                                                          $count=0;
                                                  while($found = mysqli_fetch_array($retrieve))
                                                {
                                                      $emp_no=$found['emp_No'];
                                                      $emp_name=$found['emp_Name'];
                                                      $job_desc=$found['job_desc'];
                                                      $acc_type=$found['acc_type'];
                                                      $acc_desc=$found['acc_desc'];
                                                      $acc_date=$found['acc_date'];
                                                      $any_desc=$found['any_desc'];
                                                      $count++;
                                              
                                          echo "<tr>    
                                                  <td>$emp_no</td>                                       
                                                  <td>$emp_name</td>        	
                                                  <td>$job_desc</td>
                                                  <td>$acc_type</td>
                                                  <td>$acc_desc</td>
                                                  <td>$acc_date</td>
                                                  <td>$any_desc</td>
                                                  <td>
                                                  <a data-toggle='modal' class='open-Passwords btn  btn-info' title='edit user details' href='#edit_promotion$count'><span class='glyphicon glyphicon-edit' style='color:white;'></span></a>
                                                  </td>
                                                  <td>
                                                  <a data-id='$emp_no'  class='open-Delete-accident btn  btn-danger' title='delete user' ><span class='glyphicon glyphicon-trash' style='color:white;'></span></a>
                                                  </td>			 
                                               </tr>"; ?>

                                    <div id="edit_promotion<?php echo $count;?>" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <!-- Modal content-->
                                            <div class="modal-content"
                                                style="font-size: 14px; font-family: Times New Roman;color:black;">
                                                <div class="modal-header" style="background:#222d32">
                                                    <button type="button" class="close"
                                                        data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title" style="font-weight: bold;color: #F0F0F0">
                                                        <center>
                                                            EDIT ACCIDENT HISTORY
                                                        </center>
                                                    </h4>
                                                </div>
                                                <form method="post" action="upload.php" enctype='multipart/form-data'>
                                                    <div class="modal-body">
                                                        <center>


                                                            <div class="form-group row" style="font-size: 18px;">
                                                                <label for="emp_no" class="col-sm-5 col-form-label"
                                                                    style="color: black;font-size:20px;  font-weight: bold;">
                                                                    Emp No:* </label>
                                                                <div class="col-sm-7">
                                                                    <!-- <input type="text" class="form-control"
                                                                        id="emp_no" placeholder="Password">  style="width:270px;"-->
                                                                    <input type="text" class="form-control"
                                                                        value="<?php echo $emp_no; ?>" name="emp_no">
                                                                </div>
                                                            </div>

                                                            <div class="form-group row" style="font-size: 18px;">
                                                                <label for="emp_name" class="col-sm-5 col-form-label"
                                                                    style="color: black;font-size:20px;  font-weight: bold;">
                                                                    Emp Name:* </label>
                                                                <div class="col-sm-7">
                                                                    <input type="text" class="form-control"
                                                                        value="<?php echo $emp_name; ?>"
                                                                        name="emp_name">
                                                                </div>
                                                            </div>

                                                            <div class="form-group row" style="font-size: 18px;">
                                                                <label for="job_desc" class="col-sm-5 col-form-label"
                                                                    style="color: black;font-size:20px;  font-weight: bold;">
                                                                    Job Description:* </label>
                                                                <div class="col-sm-7">
                                                                    <input class="form-control" type="text"
                                                                        value="<?php echo $job_desc; ?>"
                                                                        name="job_desc">
                                                                </div>
                                                            </div>

                                                            <div class="form-group row" style="font-size: 18px;">
                                                                <label for="acc_type" class="col-sm-5 col-form-label"
                                                                    style="color: black;font-size:20px;  font-weight: bold;">
                                                                    Accident Type:* </label>
                                                                <div class="col-sm-7">
                                                                    <input class="form-control" type="text"
                                                                        value="<?php echo $acc_type; ?>"
                                                                        name="acc_type">
                                                                </div>
                                                            </div>

                                                            <div class="form-group row" style="font-size: 18px;">
                                                                <label for="acc_desc" class="col-sm-5 col-form-label"
                                                                    style="color: black;font-size:20px;  font-weight: bold;">
                                                                    Accident Description:* </label>
                                                                <div class="col-sm-7">
                                                                    <input class="form-control" type="text"
                                                                        value="<?php echo $acc_desc; ?>"
                                                                        name="acc_desc">
                                                                </div>
                                                            </div>

                                                            <div class="form-group row" style="font-size: 18px;">
                                                                <label for="acc_date" class="col-sm-5 col-form-label"
                                                                    style="color: black;font-size:20px;  font-weight: bold;">
                                                                    Accident Date:* </label>
                                                                <div class="col-sm-7">
                                                                    <input class="form-control" type="date"
                                                                        value="<?php echo $acc_date; ?>"
                                                                        name="acc_date">
                                                                </div>
                                                            </div>

                                                            <div class="form-group row" style="font-size: 18px;">
                                                                <label for="any_desc" class="col-sm-5 col-form-label"
                                                                    style="color: black;font-size:20px;  font-weight: bold;">
                                                                    Any Description:* </label>
                                                                <div class="col-sm-7">
                                                                    <input class="form-control" type="text"
                                                                        value="<?php echo $any_desc; ?>"
                                                                        name="any_desc">
                                                                </div>
                                                            </div>

                                                            <input type="hidden" name="apage" value="admin.php" />
                                                            <input type="hidden" name="emp_no"
                                                                value="<?php echo$emp_no; ?>" />

                                                        </center>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="submit" class="btn btn-success" value="update"
                                                            id="addmember" name="accupdate"> &nbsp;
                                                        <button type="button" class="btn btn-success"
                                                            data-dismiss="modal">CLOSE</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>



                                    <?php } ?>

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


    <!---autofill script -->
    <script>
    // onkeyup event will occur when the user 
    // release the key and calls the function
    // assigned to this event
    function GetDetail(str) {
        if (str.length == 0) {

            document.getElementById("Emp_Name").value = "";
            return;
        } else {

            // Creates a new XMLHttpRequest object
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {

                // Defines a function to be called when
                // the readyState property changes
                if (this.readyState == 4 &&
                    this.status == 200) {

                    // Typical action to be performed
                    // when the document is ready
                    var myObj = JSON.parse(this.responseText);

                    // Returns the response data as a
                    // string and store this array in a variable 

                    // // Assign the value received to
                    // // last name input field
                    document.getElementById(
                        "Emp_Name").value = myObj[0];
                }
            };

            // xhttp.open("GET", "filename", true);
            xmlhttp.open("GET", "autofill.php?id=" + str, true);

            // Sends the request to the server
            xmlhttp.send();
        }
    }
    </script>



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

</body>

</html>