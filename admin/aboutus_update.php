<?php 
$page_id="about";
include_once 'libs/class.database.php';
include_once 'libs/class.session.php';
include_once 'libs/functions.php';
session_start();
/* $session= new Session();
if(!$session->has_logged_in())
{
	redirect_to("index.php");
}
if(!$session->check_permission_level($page_id))
{
    echo "<script>alert(\"You have no permission to access this page.\");</script>";
     redirect_to("home.php");
} */
$error = $_GET['error'];
$abt_id= $_GET['abt_id'];

$formd_aboutus="";
$formd_goals="";
$formd_mission="";
$formd_core_mission="";
$formd_methods="";

if(isset($_SESSION["aboutusEdit_formData"])){
	$formd_aboutus=$_SESSION["aboutusEdit_formData"]["aboutus"];
	$formd_goals=$_SESSION["aboutusEdit_formData"]["goals"];
	$formd_mission=$_SESSION["aboutusEdit_formData"]["mission"];
	$formd_core_mission=$_SESSION["aboutusEdit_formData"]["core_mission"];
	$formd_methods=$_SESSION["aboutusEdit_formData"]["methods"];
	unset($_SESSION["aboutusEdit_formData"]);
}
unset($_SESSION["aboutusEdit_formData"]);
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
                        Voice for Animals
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                        <li><a href="#"><i class="fa fa-dashboard"></i>About Us</a></li>
                        <li class="active">Update</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                
           <?php 
            global $database, $db;
            $qry="SELECT * from `".TBL_ABOUTUS."`";
            
            $result = $database->query( $qry );
            $row = $database->fetch_array( $result );
            ?>               
                
                
				<!-- form start -->
                             <form role="form" action="about_actions.php" enctype="multipart/form-data" method="post">
                    		<input type="hidden" name="mode" value="upload">
                                     <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>ABOUT US</label>
                                            <textarea class="form-control" name="aboutus" rows="6"><?php echo $row['aboutus']; ?></textarea>
                                        </div>
				     </div>
				     <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>GOALS</label>
                                            <textarea class="form-control" name="goals" rows="6"><?php echo $row['goals']; ?></textarea>
                                        </div>
                                     </div>
				     <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>MISSION</label>
                                            <textarea class="form-control" name="mission" rows="6"><?php echo $row['mission']; ?></textarea>
                                        </div>
				     </div>
				     <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>CORE MISSION</label>
                                            <textarea class="form-control" name="core_mission" rows="6"><?php echo $row['core_mission']; ?></textarea>
                                        </div>
				     </div>
				     <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>METHODS</label>
                                            <textarea class="form-control" name="methods" rows="6"><?php echo $row['methods']; ?></textarea>
                                        </div>
					 </div>
					 <div class="col-lg-12">
                                    	<div class="box-footer">
                                            <button type="submit" class="btn btn-primary pull-right">Update</button>
                                         </div>
					</div>
				     </div>
                                </form>
                </section>
	</aside>

      		  <!-- jQuery 2.0.2 -->
        <script src="css/includes/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="css/includes/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>

</body>
</html>
