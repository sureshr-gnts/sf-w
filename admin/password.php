<!DOCTYPE html>
<?php 
$page_id="poll_new";
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
        <script type="text/javascript" src="js/plugins/jquery-validation/jquery.validate.js"></script>
        <script>
			
			$().ready(function() {
				
				 $.validator.addMethod("alphabetOnly", function(value, element) {
		                return this.optional(element) || /^[a-z\-\s]+$/i.test(value);
		            }, "Text must contain only letters, numbers, or dashes.");
                 // alert('hi');
				$("#user_new").validate({
					rules: {
						
						password: {
							required: true,
							minlength: 5
						},
						cpassword: {
							required: true,
							minlength: 5,
							equalTo: "#txt_password"
						},

						
						},
					messages: {
						
						password: {
							required: "Please provide a password",
							minlength: "Your password must be at least 5 characters long"
						},
						cpassword: {
							required: "Please provide a password",
							minlength: "Your password must be at least 5 characters long",
							equalTo: "Please enter the same password"
						}, 
						
					}
				});
				
			
				
			});
           </script>	

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
                        CHANGE PASSWORD
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i>DASHBOARD</a></li>
                        <li class="active">CHANGE PASSWORD</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                <?php if (isset($_SESSION["msg2"])) { ?>
            							<div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-ban"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b> <?php echo $_SESSION["msg2"]; ?>
                						</div>
                				<?php } ?>
				<!-- form start -->
                                <form role="form" action="dashboard.php" enctype="multipart/form-data" method="post">
								<input type="hidden" name="mode" value="password_change">
                                     <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="question">CURRENT PASSWORD</label>
                                            <input type="password" id="current_password" name="current_password" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="answer_one">NEW PASSWORD</label>
                                            <input type="password" id="password" name="new_password" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="answer_two">CONFIRM PASSWORD</label>
                                            <input type="password" id="cpassword" name="confirm_password" class="form-control" required>
                                        </div>
                                    	<div class="box-footer">
                                            <button type="submit" name="action" class="btn btn-primary pull-right">Submit</button>
										</div>
				     				</div>
                                </form>
                </section>
	</aside>

        <!-- Bootstrap -->
        <script src="css/includes/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>

</body>
</html>
<?php
unset($_SESSION["msg"]);
unset($_SESSION["msg1"]);
unset($_SESSION["msg2"]);
?>