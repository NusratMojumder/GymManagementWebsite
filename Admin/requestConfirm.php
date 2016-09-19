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
}

if(isset($_GET["id"])){

	$id = $_GET["id"];
        $package = 1;
        $diet_plan = "you have no diet plan yet";

	mysql_connect('localhost','root','');
        mysql_select_db('gym');
	
	$_sql = mysql_query("update registration set admin_confirmation='1' where id='$id'") 
			or Die(mysql_error());
        
        $sql = mysql_query("INSERT INTO `member`(`registration_id`,`package_id`,`diet_plan`)
							VALUES (
									'$id',
									'$package',
									'$diet_plan'
									
									)")or die(mysql_error());
		
	if($_sql && $sql){
		ob_start();
		header("location: memberRequest.php");
		ob_end_flush();		
	}
}else{
	?>
	<?php
}
?>