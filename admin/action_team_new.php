<!DOCTYPE html>
<?php 
$page_id="action_team";
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

$formd_title="";
$formd_content="";
$formd_url="";

if(isset($_SESSION["action_teamEdit_formData"])){
        $formd_title=$_SESSION["action_teamEdit_formData"]["title"];
        $formd_content=$_SESSION["action_teamEdit_formData"]["content"];
        $formd_url=$_SESSION["action_teamEdit_formData"]["url"];
        unset($_SESSION["action_teamEdit_formData"]);
    }
    unset($_SESSION["action_teamEdit_formData"]);
?>
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
                        ACTION TEAM
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i>DASHBOARD</a></li>
                        <li class="active">ACTION TEAM</li>
                        <li class="active">POST NEW</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
				<!-- form start -->
                               <form role="form" action="url_post_actions.php" id="action_team" enctype="multipart/form-data" method="post">
				<input type="hidden" name="mode" value="action_team" />
                                     <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="title">TITLE</label>
                                            <input type="text" class="form-control" name="title" id="title">
                                        </div>
                                        <div class="form-group">
                                            <label for="content">CONTET</label>
                                            <input type="text" class="form-control" name="content" id="content">
                                        </div>
                                        <div class="form-group">
                                            <label for="url">URL</label>
                                            <input type="text" class="form-control" name="url" id="url">
                                        </div>
                                    	    <div class="box-footer">
                                            	<button type="submit" value="Save" name="action" class="btn btn-primary pull-right">Submit</button>
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
