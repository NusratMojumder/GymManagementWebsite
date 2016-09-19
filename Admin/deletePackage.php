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

mysql_connect('localhost','root','');

   mysql_select_db('gym');

 if(isset($_GET['package_id']))
        {
            $delete_id = $_GET['package_id'];
            $delete_query = "delete from package where id='$delete_id'";
            
            if(mysql_query($delete_query))
            {
                echo "<script>alert('Package removed')</script>";
                echo "<script>window.open('viewPackage.php','_self')</script>";
        }
}
?>