<?php

   include_once '../Include/class.Registration.php';
    $user = new Registration();

    // Checking for user logged in or not
    /*if (!$user->get_session())
    {
       header("location:index.php");
    }*/
    if (isset($_REQUEST['submit'])){
        extract($_REQUEST);
        $register = $user->reg_user($uname, $uphone, $uemail, $ugender, $upass);
        if ($register) {
            // Registration Success
            echo "<script>alert('Registration Successful')</script>";
        } else {
            // Registration Failed
            echo 'Registration failed. Email already exits please try again';
        }
    }
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="assets/css/main.css" />	
<link rel="stylesheet" href="assets/css/loginform.css" />
  <title>Sign Up</title>
  	<script language="javascript" type="text/javascript"> 
		    function submitreg() {
                var form = document.reg;
				if(form.uname.value == ""){
                    alert( "Enter name." );
                    return false;
                }
                 else if(form.uphone.value == ""){
                    alert( "Enter Phone no." );
                    return false;
                }
                   else if(form.uemail.value == ""){
                    alert( "Enter email." );
                    return false;
                }
                 else if(form.ugender.value == ""){
                    alert( "Select gender." );
                    return false;
                }
                else if(form.upass.value == ""){
                    alert( "Enter password." );
                    return false;
                }
             
            } 
	</script> 
</head>

  <body>
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
                                                                <a href="signup.php">Sign Up</a>
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
    <h2>Sign Up</h2>
    </div>
    
      <form class="col-md-12"  name="reg"  method='post' enctype="multipart/form-data">

                                    <div class="input-group input-group-lg">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
				        <input type="text" name="uname" class="form-control" placeholder="Name" required="required">
				    </div>

                                    <div class="input-group input-group-lg">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input type="text" name="uphone" class="form-control" placeholder="Phone No." required="required">
				    </div>
                                    
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input type="text" name="uemail" class="form-control" placeholder="Email" required="required">
				    </div>
				      
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>  
                                        <select type="text" name="ugender" class="form-control" placeholder="Gender" required="required">
                                            <option>Gender</option>
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>
				    </div>
                                   
                                     <div class="input-group input-group-lg">
                                         <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                        <input type="password" name="upass" class="form-control input-lg" placeholder="Password" required="required">
				    </div>
		
                                    <button type="submit" name="submit" class="float" onclick="return(submitreg());">Register</button>
                                    <a href="login.php">Already registered! Click Here!</a>
                                    
			</form>
           <!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
        
  </body>
</html>
