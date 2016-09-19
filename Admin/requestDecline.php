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
if(isset($_GET["id"])){

	$id = $_GET["id"];

	mysql_connect('localhost','root','');
        mysql_select_db('gym');
	
	$_sql = mysql_query("delete from registration where id='$id'") 
			or Die(mysql_error());
	if($_sql){
		ob_start();
		header("location: memberRequest.php");
		ob_end_flush();		
	}
}else{
	?>
	<?php
}
?>