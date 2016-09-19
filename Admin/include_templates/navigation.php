
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="adminHome.php">Admin Panel</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
              
                <li class="dropdown">
       
                             <a href="adminHome.php?q=logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>

            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="memberRequest.php"><i class="fa fa-fw fa-dashboard"></i>Member Requests</a>
                    </li>
                      <li>
                        <a href="pendingQuery.php"><i class="fa fa-fw fa-edit"></i>Member Queries</a>
                    </li>
                    <li>
                        <a href="viewPackage.php"><i class="fa fa-fw fa-bar-chart-o"></i>Package Information</a>
                    </li>
                     <li>
                        <a href="viewInstructor.php"><i class="fa fa-fw fa-edit"></i>Instructor Details</a>
                    </li>	
                </ul>
            </div>
        </nav>