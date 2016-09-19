<?php 
session_start();
include_once '../Include/class.Problem&Solution.php';
$user = new ProblemSolution(); $id = $_SESSION['id'];
if (!$user->get_session()){
 header("location: ../Website/login.php");
}

if (isset($_GET['q'])){
 $user->user_logout();
 header("location: ../Website/login.php");
}
 ?>
<?php

    include_once '../Include/class.Problem&Solution.php';
    $user = new ProblemSolution();

    if (isset($_REQUEST['submit'])){
        extract($_REQUEST);
        $problem = $user->submit_problem($problem,$id);
        if ($problem) {
            // Registration Success
            header("location: ../Member/memberQuery.php");
        } else {
            // Registration Failed
            echo "<script>alert('Submission Failed')</script>";
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

    <title>Submit Query</title>

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
		 <?php include_once("./include/navigation.php"); ?>

		<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                                   Submit
                            <small>Query</small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
                <!-- Content Row -->
           <div class="row">

               <form class="col-md-12"  name="name" action='submitQuery.php' method='post' enctype="multipart/form-data">

                                    <div class="form-group" >
				        <textarea name="problem" class="form-control input-lg" rows="10" placeholder="Problem" required="required"></textarea>
				    </div>
				    <div class="form-group">
				        <input type="submit" name="submit" class="btn btn-primary btn-lg btn-block" value='Submit' >
				    </div>
			</form>
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