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
<?php

include_once '../Include/class.Admin.php';
$admin = new Admin();
$query_id = $_GET['query_id'];
    if (isset($_REQUEST['submit'])){
        extract($_REQUEST);
       
        $update = $admin->send_solution($query_id,$solution);
        if ($update) {
            // Registration Success
            echo "<script>alert('Update Successful')</script>";
            header("location: ../Admin/allQuery.php");
        } else {
            // Registration Failed
            echo "<script>alert('Update Failed')</script>";
        }
    }
?>
<html>
    
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Reply to Query</title>

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
                             Reply to Query
                        </h1>
                       
                    </div>
                </div>
                <!-- /.row -->
<?php
mysql_connect('localhost','root','');
mysql_select_db('gym');
if(isset($_GET['query_id']))
{
$id=$_GET['query_id'];
$query1=mysql_query("select * from member_query where id='$id'");
$query2=mysql_fetch_array($query1);
}

?>
                <form method="post" action="">
                    <div class="form-group" >
                        Problem:<label type="text" name="problem" class="form-control input-lg"><?php echo $query2['problem']; ?></label>
                    </div>
                    <div class="form-group" >
                        Solution:<input type="text" name="solution" class="form-control input-lg" value="Solution" />
                    </div>
                    <div class="form-group" >
                        <input type="submit" name="submit" class="btn btn-primary btn-lg btn-block" value="Reply" />
                    </div>             
                </form>
            </div>
</body>
</html>
