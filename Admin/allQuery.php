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
}?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Member Queries</title>

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
                            Member
                            <small>Queries</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> 
                                <a href="pendingQuery.php" class="fa fa-fw fa-dashboard">Pending Queries</a>
                            </li>
                             <li class="active">
                                <i class="fa fa-dashboard"></i> 
                                 <a href="#" class="fa fa-fw fa-dashboard">All Queries</a>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
				        <!-- Content Row -->
        <div class="row">
            <!-- Content Column -->
            <div class="col-lg-12">
              <h2 class="sub-header"> Requests: </h2>
			  <div class="table-responsive"  id="pending">
                              <table class="table table-striped">
				  <thead>
					<tr>
                                          <th>ID</th>
					  <th>Member Id</th>
					  <th>Problem</th>
					  <th>Problem Date</th>
                                          <th>Solution</th>
                                          <th>Solution Date</th>
					</tr>
				  </thead>
                                  <tbody>
                                      <?php $admin->show_problem(); ?>
                                  </tbody>
				</table>
			 
                          </div>
            </div>
        </div>
        <!-- /.row -->
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
