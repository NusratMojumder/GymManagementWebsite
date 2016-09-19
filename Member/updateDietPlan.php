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

    include_once '../Include/class.Login&MemberDetail.php';
    $user = new LoginMemberDetail();

    if (isset($_REQUEST['submit'])){
        extract($_REQUEST);
       
        $update = $user->update_diet_plan($diet_plan,$id);
        if ($update) {
            // Registration Success
            echo "<script>alert('Update Successful')</script>";
            header("location: ../Member/dietPlan.php");
        } else {
            // Registration Failed
            echo "<script>alert('Update Failed')</script>";
        }
    }
?>
<html>
    <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Update Diet Plan</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>
<body>
    
      <div id="wrapper">

         <!-- Navigation -->
    	 <?php include_once("./include/navigation.php"); ?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                             Update Diet Plan
                        </h1>
                       
                    </div>
                </div>
                <!-- /.row -->
                
                <form method="post" action="">
                    <div class="form-group" >
                        Diet Plan:<textarea type="text" name="diet_plan" rows="8" class="form-control input-lg"><?php $user->diet_plan($id); ?>   </textarea>
                    </div>
                    <div class="form-group" >
                        <input type="submit" name="submit" class="btn btn-primary btn-lg btn-block" value="update" />
                    </div>             
                </form>
            </div>
        </div>
      </div>
</body>
</html>
