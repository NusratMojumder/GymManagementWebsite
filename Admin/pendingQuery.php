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

    <title>Pending Queries</title>

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
                                <a href="#" class="fa fa-fw fa-dashboard">Pending Queries</a>
                            </li>
                             <li class="active">
                                <i class="fa fa-dashboard"></i> 
                                <a href="allQuery.php" class="fa fa-fw fa-dashboard">All Queries</a>
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
					  <th>Problem</th>
					  <th>Problem Date</th>
                                          <th>Reply</th>
					</tr>
				  </thead>
				  <tbody>
					<?php 
					mysql_connect('localhost','root','');
                                        mysql_select_db('gym');
                                        $id = "";
                                        $member_id = "";
					$problem = "";
                                        $problem_date = "";
                                        $solution = "";
                                        $solution_date = "";

                                        $sql = mysql_query("SELECT * FROM member_query where solution='pending'") OR DIE(mysql_error());
					$numberofrows = mysql_num_rows($sql);
					if($numberofrows > 0){
						while($row = mysql_fetch_array($sql)){
                                         
                                        $id = $row["id"];    
                                        $problem = $row["problem"];           
                                        $problem_date = $row["problem_date"];
                                        $solution = $row["solution"];
                                        
					?>
							<tr>
                                                          <td> 	<?php echo $id; ?> </td>
                                                          <td> 	<?php echo $problem; ?> </td>
                                                          <td>	<?php echo $problem_date; ?> </td>
                                                          <td>	<?php echo $solution; ?> </td>
                                                          <td><a href="queryReply.php?query_id=<?php echo $id ; ?>" class="btn btn-success">Reply</a></td>
							 
                        				</tr>
						
							<?php 
						}
					}
                                        
                                        else { ?>
                                                        <tr><td colspan="6"><?php echo "No Pending Queries"; ?></td></tr>
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
