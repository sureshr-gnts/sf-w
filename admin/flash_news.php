<!DOCTYPE html>
<?php 
$page_id="flash_news";
include_once 'libs/class.database.php';
include_once 'libs/class.session.php';
include_once 'libs/functions.php';
session_start();
$session= new Session();
//if(!$session->has_logged_in())
//{
//	redirect_to("index.php");
//}

//if(!$session->check_permission_level($page_id))
//{
//    echo "<script>alert(\"You have not permission to access this page.\");</script>";
//     redirect_to("home.php");
//}

//$error="";
//$error = $_GET['error'];
$id=$_REQUEST['id'];
$error=$_REQUEST['error'];

$formd_workwithus="";
$formd_positions="";
$formd_salary="";
$formd_pleasenote="";

if(isset($_SESSION["flash_newsEdit_formData"])){
        //print_r($_SESSION["newsEdit_formData"]);
        $formd_workwithus=$_SESSION["flash_newsEdit_formData"]["workwithus"];
        $formd_positions=$_SESSION["flash_newsEdit_formData"]["positions"];
        $formd_salary=$_SESSION["flash_newsEdit_formData"]["salary"];
        $formd_pleasenote=$_SESSION["flash_newsEdit_formData"]["pleasenote"];
        unset($_SESSION["flash_newsEdit_formData"]);
    }
    unset($_SESSION["flash_newsEdit_formData"]);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Voice for Animals</title>
	<link rel="icon" href="img/favicon.ico" type="image/x-icon">
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
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
                        FLASH NEWS
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i>DASHBOARD</a></li>
                        <li class="active">FLASH NEWS</li>
                        <li class="active">MANAGE</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
				<!-- form start -->
                               <form role="form" action="flash_news_actions.php" id="flash_news" enctype="multipart/form-data" method="post">
				<input type="hidden" name="mode" value="flash_news" />
				     <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>WORK WITH US</label>
                                            <textarea class="form-control" name="workwithus" rows="6"></textarea>
                                        </div>
				     </div>
				     <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>POSITIONS</label>
                                            <textarea class="form-control" name="positions" rows="6"></textarea>
                                        </div>
				     </div>
				     <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>SALARY</label>
                                            <textarea class="form-control" name="salary" rows="6"></textarea>
                                        </div>
				     </div>
				     <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>PLEASE NOTE</label>
                                            <textarea class="form-control" name="pleasenote" rows="6"></textarea>
                                        </div>
				     </div>
				     <div class="col-lg-12">
                                    	    <div class="box-footer">
                                            <button type="submit" value="Save" name="action" class="btn btn-primary pull-right">SUBMIT</button>
					    </div>
				     </div>
                                </form>
                </section>
	</aside>

        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>

</body>
</html>
