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

    <title>Instructor List</title>

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
                            Instructor
                            <small>List</small>
                        </h1>
                         
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> 
                                <a href="#" class="fa fa-fw fa-dashboard">Instructor List</a>
                            </li>
                             <li class="active">
                                <i class="fa fa-dashboard"></i> 
                                <a href="addInstructor.php" class="fa fa-fw fa-dashboard">Add Instructor</a>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
				        <!-- Content Row -->
        <div class="row">
            <!-- Content Column -->
            <div class="col-lg-12">
              <h2 class="sub-header"> instructors </h2>
			  <div class="table-responsive">
				<table class="table table-striped">
				  <thead>
					<tr>
					  <th>ID</th>
					  <th>Name</th>
                                          <th>Package</th>
                                          <th>Qualification</th>
					 
					</tr>
				  </thead>
				  <tbody>
				  
					<?php 
					mysql_connect('localhost','root','');
                                        mysql_select_db('gym');
					$instructor_id = "";
					$instructor_name = "";
                                        $instructor_package= "";
					$instructor_qualification = "";
						
						
					$sql = mysql_query("SELECT * FROM instructor ORDER BY id") OR DIE(mysql_error());
					$numberofrows = mysql_num_rows($sql);
					if($numberofrows > 0){
						while($row = mysql_fetch_array($sql)){
								$instructor_id = $row["id"];
                                                                $instructor_name = $row["name"];
                                                                $instructor_package=$row["package_id"];
								$instructor_qualification = $row["qualification"];
								
								?>
							
							<tr>
							  <td><?php echo $instructor_id; ?></td>
							  <td><?php echo $instructor_name  ?></td>
                                                          <td>
                                                                        <?php
                                                             mysql_connect('localhost','root','');
                                                             mysql_select_db('gym');
                                                              $get_packages= "select * from package where id='$instructor_package' ";
                                                              $run_packages=  mysql_query($get_packages);

                                                              while ($package_row =  mysql_fetch_array($run_packages))
                                                              {
                                                                  $package_id = $package_row['id'];
                                                                  $package_name = $package_row['name'];

                                                                  echo "$package_name";
                                                              }
                                                            ?>
                                                          </td>
							  <td><?php echo $instructor_qualification ?> </td>
                                                        
                                                          <td><a href="updateInstructor.php?instructor_id=<?php echo $instructor_id ; ?>" class="btn btn-success">Update</a></td>
                                                          <td><a href="deleteInstructor.php?instructor_id=<?php echo $instructor_id ; ?>" class="btn btn-danger">Delete</a></td>
                                                         
							</tr>
						
							<?php 
						}
					}
					?>

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
