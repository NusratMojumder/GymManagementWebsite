
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="memberHome.php">Member Account</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php $user->get_fullname($id); ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                          <li>
                           <a href="memberHome.php?q=logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Side bar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="basicInfo.php"><i class="fa fa-fw fa-dashboard"></i>Basic Info</a>
                    </li>
                      <li>
                        <a href="packageInstructor.php"><i class="fa fa-fw fa-edit"></i>Package & Instructor</a>
                    </li>
                    <li>
                        <a href="memberQuery.php"><i class="fa fa-fw fa-bar-chart-o"></i>Queries</a>
                    </li>
                    <li>
                        <a href="dietPlan.php"><i class="fa fa-fw fa-edit"></i>Diet Plan</a>
                    </li>	
                </ul>
            </div>
        </nav>