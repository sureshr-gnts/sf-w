<?php 

	$page_id="aboutus_mgt";
	include_once 'libs/class.database.php';
	include_once 'libs/class.session.php';
	include_once 'libs/functions.php';
	session_start();


	$session= new Session();
	if(!$session->has_logged_in())
	{
		redirect_to("index.php");
	}
/* 	if(!$session->check_permission_level($page_id))
	{
		echo "<script>alert(\"You have not permission to access this page.\");</script>";
		redirect_to("index.php");
	} */

?> 
<?php
$userid = $_SESSION['VFA_Userid'];
$mode=$_REQUEST["mode"];

if($mode == "password_change")
{
	$current_password=$_REQUEST["current_password"];
	$en_password= md5($current_password);
	$new_password=$_REQUEST["new_password"];
    $confirm_password=md5($_REQUEST["confirm_password"]);

	global $database, $db;

 	$qry="SELECT password from `".TBL_ADMIN."`
			         WHERE `id`='".$userid."'";

            
            $result = $database->query( $qry );
            $row_1 = $database->fetch_array( $result );
            $old_pass = $row_1['password'];
    
     
if( $en_password == $old_pass )
{


$qry_update="UPDATE `".TBL_ADMIN."` SET `password`='".$confirm_password."'
			         WHERE `id`='".$userid."' ";
	$result_update = $database->query( $qry_update );
 if($result_update>0)
 	{

		$_SESSION["msg1"]="Updated successfully!.";
		redirect_to('dashboard.php');
	 }
	 else
	 {
		$_SESSION["msg2"]="Updating failed!.";
		redirect_to('password.php');
	 }
}
else
{

	$_SESSION["msg2"]="Enter correct password";
	redirect_to('password.php');
	
	
}
}

?>	
	

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Voice for Animals</title>
		<link rel="icon" href="img/favicon.ico" type="image/x-icon">
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="css/includes/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="css/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- Date Picker -->
        <link href="css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
    </head>
    <body class="pace-done skin-black fixed">
        <!-- header logo: style can be found in header.less -->
  		<?php include_once './includes/header.php'; ?>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                <?php include_once './includes/nav.php'; ?>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Dashboard
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                <?php if (isset($_SESSION["msg1"])) { ?>
            							<div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-ban"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b> <?php echo $_SESSION["msg1"]; ?>
                						</div>
                				<?php } ?>

                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>
                                        0
                                    </h3>
                                    <p>
                                        New Post
                                    </p>
                                </div>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>
                                        0
                                    </h3>
                                    <p>
                                        Adoption Rate
                                    </p>
                                </div>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>
                                        0
                                    </h3>
                                    <p>
                                        New Reports
                                    </p>
                                </div>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>
                                        0
                                    </h3>
                                    <p>
                                        Donation
                                    </p>
                                </div>
                            </div>
                        </div><!-- ./col -->
                    </div><!-- /.row -->

                                </div>
                            </div><!-- /.box -->

                        </section><!-- right col -->
                    </div><!-- /.row (main row) -->

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->


        <!-- jQuery 2.0.2 -->
        <script src="css/includes/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="css/includes/bootstrap.min.js" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- datepicker -->
        <script src="js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>

        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="js/AdminLTE/dashboard.js" type="text/javascript"></script>

        <!-- AdminLTE for demo purposes -->
        <script src="js/AdminLTE/demo.js" type="text/javascript"></script>

    </body>
</html>
<?php
unset($_SESSION["msg1"]);
unset($_SESSION["msg2"]);
unset($_SESSION["msg"]);
?>