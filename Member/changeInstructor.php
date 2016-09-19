<?php 
session_start();
include_once '../Include/class.Login&MemberDetail.php';
$user = new LoginMemberDetail(); $id = $_SESSION['id'];
if (!$user->get_session()){
 header("location: ../Website/login.php");
}

if (isset($_GET['q'])){
 $user->user_logout();
 header("location: ../Website/login.php");
}
 ?>
 <?php
include('config/connect_to_mysql.php');
if(isset($_GET['package_id']))
{
$package_id=$_GET['package_id'];

$query=mysql_query("update member set package_id='$package_id' where registration_id='$id'");

if($package_id==1)
{
$query=mysql_query("update member set instructor_id='0' where registration_id='$id'");
header('location: packageInstructor.php');
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

    <title>Package</title>

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
                            Package
                            <small>List</small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
				        <!-- Content Row -->
        <div class="row">
            <!-- Content Column -->
            <div class="col-lg-12">
              <h2 class="sub-header"> packages </h2>
			  <div class="table-responsive">
				<table class="table table-striped">
				  <thead>
					<tr>
					  <th>ID</th>
					  <th>Name</th>
                                          <th>Qualification</th>
					</tr>
				  </thead>
				  <tbody>
				  <?php 
					mysql_connect('localhost','root','');
                                        mysql_select_db('gym');
					$instructor_id = "";
					$instructor_name = "";
					$instructor_qualification = "";	
                                        
                                        $package_id=$_GET['package_id'];
                                
					$sql = mysql_query("SELECT * FROM instructor where package_id=$package_id ORDER BY id") OR DIE(mysql_error());
					$numberofrows = mysql_num_rows($sql);
					if($numberofrows > 0){
						while($row = mysql_fetch_array($sql)){
								$instructor_id= $row["id"];
								$instructor_name = $row["name"];
                                                                $instructor_qualification = $row["qualification"];
								?>
							
							<tr>
							  <td>	<?php echo $instructor_id; ?> </td>
							  <td> 	<?php echo $instructor_name;  ?> </td>
							  <td> 	<?php echo $instructor_qualification; ?> </td>
                                                          <td><a href="updatePkgInstructor.php?instructor_id=<?php echo $instructor_id ; ?>" class="btn btn-success">Choose</a></td>
                                                         
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
