<!DOCTYPE html>
<?php 
include_once 'libs/class.database.php';
include_once 'libs/class.session.php';
include_once 'libs/functions.php';
include_once 'libs/lang.php';
session_start();
$session= new Session();
if(!$session->has_logged_in())
{
	redirect_to("index.php");
}

$id=$_REQUEST['id'];
$error=$_REQUEST['error'];

$formd_username="";
$formd_password="";
$formd_name="";
$formd_account_type="";
$formd_status="";
if(isset($_SESSION["userEdit_formData"])){
		$formd_username=$_SESSION["userEdit_formData"]["username"];
        $formd_password=$_SESSION["userEdit_formData"]["password"];
        $formd_name=$_SESSION["userEdit_formData"]["name"];
        $formd_account_type=$_SESSION["userEdit_formData"]["account_type"];
        $formd_status=$_SESSION["userEdit_formData"]["status"];
        unset($_SESSION["userEdit_formData"]);
    }
    unset($_SESSION["userEdit_formData"]);
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
        <!-- jQuery 2.0.2 -->
        <script src="css/includes/jquery.min.js"></script>
        <script type="text/javascript" src="js/plugins/jquery-validation/jquery.validate.js"></script>
      
	
 	<script>
			
			$().ready(function() {
				
				 $.validator.addMethod("alphabetOnly", function(value, element) {
		                return this.optional(element) || /^[a-z\-\s]+$/i.test(value);
		            }, "Text must contain only letters, numbers, or dashes.");
                 // alert('hi');
				$("#user_new").validate({
					rules: {
						username: { 
							required: true,
							alphabetOnly: true
						},
						name:{
							required: true,
							alphabetOnly: true
						},
						password: {
							required: true,
							minlength: 5
						},
						cpassword: {
							required: true,
							minlength: 5,
							equalTo: "#txt_password"
						},

						account_type: "required",
						status: "required",
						image: "required"
						},
					messages: {
						username: {
							required: "Please enter your username",
							alphabetOnly: "Please enter a valid username(alphabet only)"
						},
						name:{
							required: "Please enter your name",
							alphabetOnly: "Please enter a valid username(alphabet only)"
						},
						password: {
							required: "Please provide a password",
							minlength: "Your password must be at least 5 characters long"
						},
						cpassword: {
							required: "Please provide a password",
							minlength: "Your password must be at least 5 characters long",
							equalTo: "Please enter the same password"
						}, 
						account_type: "Please select type of account",
						status: "Please select status",
						image: "Please select an image"
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
                        USER
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i>DASHBOARD</a></li>
                        <li class="active">USER</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
				<!-- form start -->
				<?php if (isset($_SESSION["msg"])) { ?>
            		<div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-ban"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b> <?php echo $_SESSION["msg"]; ?>
                	</div>
                <?php } ?>
                <?php if (isset($_SESSION["msg1"])) { ?>
            	<div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-ban"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b> <?php echo $_SESSION["msg1"]; ?>
                </div>
                <?php } ?>
				

				
				
                                <form role="form"  id="user_new" action="user_actions.php" enctype="multipart/form-data" method="post" autocomplete="off">
								<input type="hidden" name="mode" value="user">
                                     <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="username">USERNAME</label>
                                            <input type="text" class="form-control" name="username" id="username" required/>
                                        </div>
                                     </div>
                                     <div class="col-lg-6">
                                         <div class="form-group">
                                            <label for="name">FULL NAME</label>
                                            <input type="text" class="form-control" name="name" id="name" required/>
                                        </div>
                                     </div>
                                     <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="password">PASSWORD</label>
                                            <input type="password" class="form-control" name="password" id="password" required/>
                                        </div>
                                     </div>
                                     <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="cpassword">CONFIRM PASSWORD</label>
                                            <input type="password" class="form-control" name="cpassword" id="cpassword" required/>
                                        </div>
                                     </div>
                                     
                                     <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>ACCOUNT TYPE</label>
                                            <select class="form-control" id="account_type" name="account_type" required/>
                                                <option value="" disabled selected>Select Account Type</option>
                                                <option value="1">Admin</option>
                                                <option value="2">Sub-Admin</option>
                                            </select>
                                        </div>
                                      </div>
                                      <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>STATUS</label>
                                            <select class="form-control" id="status" name="status" required/>
                                                <option value="" disabled selected>Select Status</option>
                                                <option value="1">Active</option>
                                                <option value="2">Inactive</option>
                                            </select>
                                        </div>
                                      </div>
                                      <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="image">IMAGE</label>
                                            <input type="file" id="image" name="image" accept="image/*" onchange="showimagepreview1(this)" required/>
                                        </div>
                                        <div class="form-group">
                                        <div class="col-md-3">
                                             <img id="imgprvw1" alt="upload new image" src="img/upload.png" />
                                        </div>
                                        </div>
				     				 </div>

									<div class="col-lg-12"> 
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
        <script>
               function showimagepreview1(input) {
               if (input.files && input.files[0]) {
               var filerdr = new FileReader();
               filerdr.onload = function(e) {
               $('#imgprvw1').attr('src', e.target.result);
               }
               filerdr.readAsDataURL(input.files[0]);
               }
               }
           </script>

</body>
</html>
<?php
unset($_SESSION["msg"]);
unset($_SESSION["msg1"]);
unset($_SESSION["msg2"]);
?>
