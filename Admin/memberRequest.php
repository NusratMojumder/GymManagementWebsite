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

    <title>Member Request</title>

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
                            <small>Requests</small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
				        <!-- Content Row -->
        <div class="row">
            <!-- Content Column -->
            <div class="col-lg-12">
              <h2 class="sub-header"> Requests: </h2>
			  <div class="table-responsive">
				<table class="table table-striped">
				  <thead>
					<tr>
					  <th>ID</th>
					  <th>Name</th>
                                          <th>Phone No.</th>
                                          <th>Email id:</th>
                                          <th>Gender</th>
                                          <th>Confirmation</th>
					</tr>
				  </thead>
				  <tbody>
				  
					<?php 
					mysql_connect('localhost','root','');
                                        mysql_select_db('gym');
                                        $id="";
					$name = "";
                                        $phone = "";
                                        $email = "";
                                        $gender = "";
                                        $adminConfirmation = "";
					$sql = mysql_query("SELECT * FROM registration where admin_confirmation='0' ") OR DIE(mysql_error());
					$numberofrows = mysql_num_rows($sql);
					if($numberofrows > 0){
						while($row = mysql_fetch_array($sql)){
                                                        $id = $row["id"];
                                                        $name = $row["name"];
                                                        $phone = $row["phone_no"];
                                                        $email = $row["email_id"];
                                                        $gender = $row["gender"];
                                                        $adminConfirmation = $row["admin_confirmation"];
	
								?>
							
							<tr>
                                                            
                                                          <td> 	<?php echo $id; ?> </td>
							  <td>	<?php echo $name; ?> </td>
							  <td> 	<?php echo $phone; ?> </td>
							  <td> 	<?php echo $email; ?> </td>
                                                          <td> 	<?php echo $gender; ?> </td>
                                                          <td><a href="requestConfirm.php?id=<?php echo $id ; ?>" class="btn btn-success">Confirm</a></td>
                                                          <td><a href="requestDecline.php?id=<?php echo $id ; ?>" class="btn btn-success">Decline</a></td>
							</tr>
						
							<?php 
						}
					}
                                        
                                        else { ?>
                                                        <tr><td colspan="6"><?php echo "No Requests"; ?></td></tr>
                                        <?php } ?>
                                                        
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
