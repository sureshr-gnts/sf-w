<!DOCTYPE html>
<?php 
$page_id="news_category";
include_once 'libs/class.database.php';
include_once 'libs/class.session.php';
include_once 'libs/functions.php';
session_start();
$session= new Session();
if(!$session->has_logged_in())
{
	redirect_to("index.php");
}

//if(!$session->check_permission_level($page_id))
//{
//    echo "<script>alert(\"You have not permission to access this page.\");</script>";
//     redirect_to("home.php");
//}

//$error="";
//$error = $_GET['error'];
$id=$_REQUEST['id'];
$error=$_REQUEST['error'];

$formd_category_name="";

if(isset($_SESSION["categoryEdit_formData"])){
        //print_r($_SESSION["newsEdit_formData"]);
        $formd_category_name=$_SESSION["categoryEdit_formData"]["category_name"];
        unset($_SESSION["categoryEdit_formData"]);
    }
    unset($_SESSION["categoryEdit_formData"]);
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
                        ADD NEWS CATEGORY
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i>DASHBOARD</a></li>
                        <li><a href="#"><i class="fa fa-dashboard"></i>NEWS CATEGORY</a></li>
                        <li class="active">ADD CATEGORY</li>
                    </ol>
                </section>
				
                <!-- Main content -->
                <section class="content">
                <?php if (isset($_SESSION["msg"])) { ?>
            	<div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-ban"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b> <?php echo $_SESSION["msg"]; ?>
                </div>
                <?php } ?>
				<!-- form start -->
                                <form role="form" action="category_action.php" id="addnews_category" enctype="multipart/form-data" method="post">
								<input type="hidden" name="mode" value="addnews_category" />
                                     <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="category_name">CATEGORY NAME</label>
                                            <input type="text" class="form-control" id="category_name" name="category_name">
                                        </div>
                                    	    <div class="box-footer">
                                            <button type="submit" value="Save" name="action" class="btn btn-primary">SUBMIT</button>
					    </div>
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
<?php
unset($_SESSION["msg"]);

?>
