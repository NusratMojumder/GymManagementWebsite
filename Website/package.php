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
                                                                    <strong>Packages :</strong>
                                                                </td>
                                                            </tr>
                                                            
                                                             <tr>
                                                                 <th>
                                                                    <label>Name</label>
                                                                 </th>
                                                                 <th>
                                                                    <label>Description</label>
                                                                 </th>
                                                                 
                                                                 <th>
                                                                    <label>Gender</label>
                                                                 </th>
                                                                 
                                                                 <th>
                                                                    <label>Schedule</label>
                                                                 </th>
                                                                 
                                                                 <th>
                                                                    <label>Fee</label>
                                                                 </th>
                                                                 
                                                                 
                                                                 
                                                            </tr>
                                                            <?php
                         
                                                                mysql_connect('localhost','root','');
                                                                mysql_select_db('gym');
                                                                $query= "select * from package";

                                                                $run= mysql_query($query);

                                                                while ($row = mysql_fetch_array($run))
                                                                {
                                                                    $packageid = $row['id'];
                                                                    $packagename = $row['name'];
                                                                    $packagedescription = $row['description'];
                                                                    $packageprice = $row['gender'];
                                                                    $packageschedule= $row['schedule'];
                                                                    $packagefee= $row['fee'];
                                                                      
                         
 
                                                            ?>
                                                            
                                                            <tr>
                                                                <td>
                                                                   <?php 
                                                                    echo $packagename;
                                                                   ?>
                                                                </td>
                                                                <td>
                                                                    <?php 
                                                                    echo $packagedescription;
                                                                   ?>
                                                                </td>
                                                                <td>
                                                                   <?php 
                                                                    echo $packageprice;
                                                                   ?>
                                                                </td>
                                                                
                                                                 <td>
                                                                   <?php 
                                                                    echo $packageschedule;
                                                                   ?>
                                                                </td>
                                                                
                                                                
                                                                
                                                                 <td>
                                                                   <?php 
                                                                    echo $packagefee;
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