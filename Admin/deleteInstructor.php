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

 if(isset($_GET['instructor_id']))
        {
            $delete_id = $_GET['instructor_id'];
            $delete_query = "delete from instructor where id='$delete_id'";
            
            if(mysql_query($delete_query))
            {
                echo "<script>alert('Instructor removed')</script>";
                echo "<script>window.open('viewInstructor.php','_self')</script>";
        }
}
?>