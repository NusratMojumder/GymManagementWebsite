<?php 
session_start();
include_once '../Include/class.Admin.php';
$admin = new Admin(); $id = $_SESSION['id'];
if (!$admin->get_admin_session()){
 header("location: ../Admin/adminLogin.php");
}

if (isset($_GET['q'])){
 $admin->admin_logout();
 header("location: ../Admin/adminLogin.php");
}
 ?>
<?php
include_once '../Include/class.Admin.php';
$admin = new Admin();

    if (isset($_REQUEST['submit'])){
        extract($_REQUEST);
        $package = $admin->add_package($name, $description, $gender, $schedule, $fee);
        if ($package) {
            // Registration Success
            echo "<script>alert('Package Added')</script>";
            header("location: ../Admin/viewPackage.php");
        } else {
            // Registration Failed
            echo "<script>alert('Already exists')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add Package</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include_once("include_templates/navigation.php"); ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                             Add Package
                        </h1>
                       
                    </div>
                </div>
                <!-- /.row -->



                <div class="row">

                    <form class="col-md-12"  name="packageadd" method='post' enctype="multipart/form-data">

                                    <div class="form-group" >
				        <input type="text" name="name" class="form-control input-lg" placeholder="Title" required="required">
				    </div>

                                    <div class="form-group" >
				        <textarea name="description" class="form-control input-lg" rows="3" placeholder="Description" required="required"></textarea>
				    </div>
				    <div class="form-group" >
                                        <select type="text" name="gender" class="form-control input-lg" placeholder="Gender" required="required">
                                            <option>Male & Female</option>
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>
				    </div>
                                   <div class="form-group" >
                                        <input type="text" name="schedule" class="form-control input-lg" placeholder="Schedule" required="required">
				    </div>
                                    <div class="form-group" >
				        <input type="number" name="fee" class="form-control input-lg" placeholder="Price" required="required">
				    </div>
				    <div class="form-group">
				        <input type="submit" name="submit" class="btn btn-primary btn-lg btn-block" value='Save' >
				    </div>
			</form>
                </div>
                         
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
