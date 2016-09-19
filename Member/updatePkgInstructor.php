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
mysql_connect('localhost','root','');
mysql_select_db('gym');
if(isset($_GET['instructor_id']))
{
$instructor_id=$_GET['instructor_id'];

$query3=mysql_query("update member set instructor_id='$instructor_id'  where registration_id='$id'");
if($query3)
{
header('location: packageInstructor.php');
}
}

?>