<?php
	session_start();
	include_once '../Include/class.Admin.php';
	$admin = new Admin();

	if (isset($_REQUEST['submit'])) { 
		extract($_REQUEST);   
	    $login = $admin->check_admin_login($username, $password);
	    if ($login) {
	        // Login Success
	       header("location: ../Admin/adminHome.php");
	    } else {
	        // Login Failed
	        echo 'Login Failed';
	    }
	}
?>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="css/adminloginstyle.css" rel="stylesheet">
    <title>Login</title>
  <script language="javascript" type="text/javascript"> 
            
            function submitlogin() {
                var form = document.login;
				if(form.email.value == ""){
					alert( "Enter email or username." );
					return false;
				}
				else if(form.password.value == ""){
					alert( "Enter password." );
					return false;
				}	 
			}
		</script>
</head>
<body class="landing">

		<!-- Page Wrapper -->
	<div class="login">
	<div class="logintitle">Administrator Login</div>
    <form  method="post"  name="login-admin" method="post">

        <input type="text" name="username" placeholder="username" class="form-control">

          <input type="password" name="password" placeholder="Password" class="form-control">
        <button type="submit" name="submit" class="submitbtn" onclick="return(submitlogin());">Login</button>
       </form>
</div>
                
                <!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
                
</body>
</html>
