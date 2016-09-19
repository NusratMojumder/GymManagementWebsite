<?php
	session_start();
	include_once '../Include/class.Login&MemberDetail.php';
	$user = new LoginMemberDetail();

	if (isset($_REQUEST['submit'])) { 
		extract($_REQUEST);   
	    $login = $user->check_login($email, $password);
	    if ($login) {
	        // Registration Success
	       header("location: ../Member/memberHome.php");
	    } else {
	        // Registration Failed
	        echo 'Login Failed';
	    }
	}
?>
<head>
  <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="assets/css/main.css" />	
<link rel="stylesheet" href="assets/css/loginform.css" />
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
			<div id="page-wrapper">

				<!-- Header -->
					<header id="header" class="alt">
                                            <h1><a href="index.html">Park City Gym</a></h1>                                                          
						<nav id="nav">
							<ul>
                                                                <li class="special">
                                                                    <a href="login.php">Login</a>
								</li>
                                                                <li class="special">
                                                                    <a href="registration.php">Sign Up</a>
								</li>
								<li class="special">
									<a href="#menu" class="menuToggle"><span>Menu</span></a>
									<div id="menu">
										<ul>
                                                                                    <li><a href="home.php">Home</a></li>
                                                                                    <li><a href="package.php">Package</a></li>
                                                                                    <li><a href="instructor.php">Instructor</a></li>
                                                                                    <li><a href="about.php">About</a></li>
                                                                                    <li><a href="contact.php">Contact</a></li>
										</ul>
									</div>
								</li>
							</ul>
						</nav>
					</header>
               
                        </div>
    
<div class="login">
  <div class="heading">
    <h2>Sign in</h2>
  </div>
    <form  method="post" name="login" method="post">

      <div class="input-group input-group-lg">
        <span class="input-group-addon"><i class="fa fa-user"></i></span>
        <input type="text" name="email" placeholder="email" class="form-control">
          </div>

        <div class="input-group input-group-lg">
          <span class="input-group-addon"><i class="fa fa-lock"></i></span>
          
          <input type="password" name="password" placeholder="Password" class="form-control">
        </div>
        <button type="submit" name="submit" class="float" onclick="return(submitlogin());">Login</button>
        <center><a href="registration.php">Register new user</a></center>
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
