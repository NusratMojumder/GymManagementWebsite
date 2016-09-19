<!DOCTYPE HTML>
<html>
	<head>
		<title>Park City Gymnasium</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>

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

                       				<!-- Main -->
					<article id="main">
						<section class="wrapper style5">
							<div class="inner">

							 <table align="center" border="2px">
                                                            <tr>
                                                                <td colspan="5">
                                                                    <strong>Instructors:</strong>
                                                                </td>
                                                            </tr>
                                                            
                                                             <tr>
                                                                 <th>
                                                                    <label>Instructor Name :</label>
                                                                 </th>
                                                                 <th>
                                                                    <label>Package :</label>
                                                                 </th>
                                                                 
                                                                  <th>
                                                                    <label>Qualification :</label>
                                                                 </th>
                                                            </tr>
                                                            <?php
                         
                                                                mysql_connect('localhost','root','');
                                                                mysql_select_db('gym');
                                                                $query= "select * from instructor";

                                                                $run= mysql_query($query);

                                                                while ($row = mysql_fetch_array($run))
                                                                {
                                                                    $instructorid = $row['id'];
                                                                    $instructorname = $row['name'];
                                                                    $instructorpackageid = $row['package_id'];
                                                                    $instructorqualification= $row['qualification'];
                                                            ?>
                                                            
                                                            <tr>
                                                                <td>
                                                                    <?php 
                                                                    echo $instructorname;
                                                                   ?>
                                                                </td>
                                                                
                                                                 <td>
                                                                                 <?php
                                               include ("./config/connect_to_mysql.php");
                                                $get_packages= "select * from package where id='$instructorpackageid' ";
                                                $run_packages=  mysql_query($get_packages);

                                                while ($package_row =  mysql_fetch_array($run_packages))
                                                {
                                                    $package_id = $package_row['id'];
                                                    $package_name = $package_row['name'];

                                                    echo "$package_name";
                                                }
                                              ?>
                                                                 </td>
                                                                
                                                                 <td>
                                                                    <?php 
                                                                    echo $instructorqualification;
                                                                   ?>
                                                                </td>
                                                                
                                                            </tr>
                                                                <?php } ?>
                                                        </table>
							</div>
						</section>
					</article>

				<!-- Footer -->
					<footer id="footer">
						<ul class="copyright">
							<li>&copy; Park City Gymnasium</li><li>2015</li>
						</ul>
					</footer>

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