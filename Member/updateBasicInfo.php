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
       
        $update = $user->edit_basic_info($id,$uname, $uphone, $uemail, $ugender, $upass);
        if ($update) {
            // Registration Success
            echo "<script>alert('Update Successful')</script>";
            header("location: ../Member/basicInfo.php");
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

    <title>Update Basic Info</title>
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
                             Update Basic Info
                        </h1>
                       
                    </div>
                </div>
                <!-- /.row -->
              <?php
mysql_connect('localhost','root','');
mysql_select_db('gym');

$query1=mysql_query("select * from registration where id='$id'");
$query2=mysql_fetch_array($query1);

?>
                <form method="post" action="">
                    <div class="form-group" >
                        Name:<input type="text" name="uname" class="form-control input-lg" required="required" value="<?php echo $query2['name']; ?>"/>
                    </div>
                    <div class="form-group" >
                        Phone No.:<input type="text" name="uphone" class="form-control input-lg" required="required" value="<?php echo $query2['phone_no']; ?>" />
                    </div>
                    <div class="form-group" >
                       Email Id:<input type="text" name="uemail" class="form-control input-lg" required="required" value="<?php echo $query2['email_id']; ?>" />
                    </div>
                     <div class="form-group" >
                      Gender:<select type="text" name="ugender" class="form-control" placeholder="Gender" required="required">
                                            <option><?php echo $query2['gender']; ?></option>
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>
                     </div>
                    <div class="form-group" >
                       Password:<input type="text" name="upass" class="form-control input-lg" required="required" value="<?php echo $query2['password']; ?>" />
                    </div>
                    <div class="form-group" >
                       <button type="submit" name="submit" class="float" class="btn btn-primary btn-lg btn-block">Update</button>
                    </div>             
                </form>
            </div>
        </div>
      </div>
    
</body>
</html>
