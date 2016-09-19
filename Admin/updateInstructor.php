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
$instructor_id = $_GET['instructor_id'];
    if (isset($_REQUEST['submit'])){
        extract($_REQUEST);
       
        $update = $admin->update_instructor($instructor_id,$name, $package, $qualification);
        if ($update) {
            // Registration Success
            echo "<script>alert('Update Successful')</script>";
            header("location: ../Admin/viewInstructor.php");
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

if(isset($_GET['instructor_id']))
{
$instructor_id=$_GET['instructor_id'];
$query1=mysql_query("select * from instructor where id='$instructor_id'");
$query2=mysql_fetch_array($query1);
$package=$query2['package_id'];
}
?>
                <form method="post" action="">
                    <div class="form-group" >
                        Name:<input type="text" name="name" class="form-control input-lg" value="<?php echo $query2['name']; ?>" />
                    </div>
                     <div class="form-group" >
                                        <select name="package" required="required" class="form-control input-lg">
                                             
                                    <option>
                       
                                            <?php

                                                mysql_connect('localhost','root','');

                                                 mysql_select_db('gym');
                                                $get_packages= "select * from package where id='$package' ";
                                                $run_packages=  mysql_query($get_packages);

                                                while ($package_row =  mysql_fetch_array($run_packages))
                                                {
                                                    $package_id = $package_row['id'];
                                                    $package_name = $package_row['name'];

                                                    echo "$package_name";
                                                }
                                              ?>
                       
                                     </option>
                                    <?php
                             
                                        mysql_connect('localhost','root','');

                                        mysql_select_db('gym');

                                        $sql="SELECT * FROM package";
                                        $result=  mysql_query($sql);

                                        while($package_row=  mysql_fetch_array($result))
                                        {
                                           $package_id = $package_row['id'];
                                           $package_name = $package_row['name'];

                                            echo "<option value='$package_id'>$package_name</option>";
                                        }

                                        echo "</select>";
                                              ?>
                                        </select>
                                    </div>   
                    <div class="form-group" >
                        Qualification:<textarea type="text" name="qualification" rows="3" class="form-control input-lg"><?php echo $query2['qualification']; ?></textarea>
                    </div>
                    <div class="form-group" >
                        <input type="submit" name="submit" class="btn btn-primary btn-lg btn-block" value="update" />
                    </div>             
                </form>
            </div>
</body>
</html>
