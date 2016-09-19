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
$package_id = $_GET['package_id'];
    if (isset($_REQUEST['submit'])){
        extract($_REQUEST);
       
        $update = $admin->update_package($package_id,$name, $description, $gender, $schedule, $fee);
        if ($update) {
            // Registration Success
            echo "<script>alert('Update Successful')</script>";
            header("location: ../Admin/viewPackage.php");
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

    <title>Sky View Gym Admin Panel</title>

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
                             Update Package
                        </h1>
                       
                    </div>
                </div>
                <!-- /.row -->
<?php
mysql_connect('localhost','root','');
mysql_select_db('gym');

if(isset($_GET['package_id']))
{
$package_id=$_GET['package_id'];
$query1=mysql_query("select * from package where id='$package_id'");
$query2=mysql_fetch_array($query1);
}
?>
                <form method="post" action="">
                    <div class="form-group" >
                        Name:<input type="text" name="name" class="form-control input-lg" value="<?php echo $query2['name']; ?>" />
                    </div>
                    
                    <div class="form-group" >
			Description:<textarea name="description" class="form-control input-lg" rows="3" placeholder="Description" required="required"><?php echo $query2['description']; ?></textarea>
                    </div>
                    
                    <div class="form-group" >
                        Gender:<select type="text" name="gender" class="form-control input-lg" placeholder="Gender" required="required">
                                            <option><?php echo $query2['gender']; ?></option>
                                            <option>Male & Female</option>
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>
                    </div>
                    
                    <div class="form-group" >
                        Description:<textarea name="schedule" class="form-control input-lg" rows="3" placeholder="Schedule" required="required"><?php echo $query2['schedule']; ?></textarea>
                    </div>
                    
                    <div class="form-group" >
                        Price:<input type="number" name="fee" class="form-control input-lg" value="<?php echo $query2['fee']; ?>" />
                    </div>
                    
                    <div class="form-group" >
                        <input type="submit" name="submit" class="btn btn-primary btn-lg btn-block" value="update" />
                    </div>             
                </form>
            </div>
</body>
</html>
