<!DOCTYPE html>
<?php 
error_reporting (E_ALL ^ E_NOTICE);
$page_id="user_edit";
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

//if(!$session->check_permission_level($page_id))
//{
//    echo "<script>alert(\"You have not permission to access this page.\");</script>";
//     redirect_to("home.php");
//}
//print_r($_REQUEST);
$id=$_REQUEST['id'];
/* print_r($id);
exit; */
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
                 // alert('hi');
				$("#user_new").validate({
					rules: {
						username: { 
							required: true,
							alpha:true
						},
						name: { 
							required: true
						},
						account_type: {
							required: true
						},
						status :
						{
							required: true
							}
						},
					messages: {
						username: {
							required: "Please enter your username",
							names: "Please enter a valid username"
						},
						name: { 
							required: "Please enter your username",
							names: "Please enter a valid username"
						},
						account_type: {
							required: "Please select type of account"
						},
						status: {
							required: "Please select type of status"
						}
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
				
				
				
				<?php 
            global $database, $db;
            $qry="SELECT * from `".TBL_ADMIN."`
			         WHERE `id`='".$_REQUEST['id']."' ";
            
            $result = $database->query( $qry );
            $row = $database->fetch_array( $result );
           
            ?>
				
		
                                <form role="form" id="user_new" action="user_actions.php" enctype="multipart/form-data" method="post">
								<input type="hidden" name="mode" value="user_edit">
								<input type="hidden" id="id" name="id" value="<?php echo $_REQUEST['id']; ?>">
                                     <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="username">USERNAME</label>
                                            <input type="text" class="form-control" name="username" id="username" value="<?php echo $row['username']; ?>" id="username" required>
                                        </div>
                                     </div>
                                     <div class="col-lg-6">
                                         <div class="form-group">
                                            <label for="name">FULL NAME</label>
                                            <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>" id="name" required>
                                        </div>
                                        </div>
                                     <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>ACCOUNT TYPE</label>
                                            <select class="form-control" id="account_type" name="account_type" required>
												 <option  <?php if($row['account_type']=='1') { echo 'selected="true"';} ?> value="1">Admin</option>
                                                 <option <?php if($row['account_type']=='2') { echo 'selected="true"';} ?> value="2">Sub-Admin</option>
                                            </select>
                                        </div>
                                      </div>
                                      <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>STATUS</label>
                                            <select class="form-control" id="status" name="status" required>
                                                 <option  <?php if($row['isActive']=='1') { echo 'selected="true"';} ?> value="1">Active</option>
                                                 <option <?php if($row['isActive']=='2') { echo 'selected="true"';} ?> value="2">Inactive</option>
                                            </select>
                                        </div>
                                      </div>
                                      <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="image">IMAGE</label>
                                            <input type="file" id="image" name="image" accept="image/*" onchange="showimagepreview1(this)">
                                        </div>
                                        <div class="form-group">
                                        <div class="col-md-3">
                                             <img id="imgprvw1" alt="uploaded image preview" src="images/user/<?php echo $row['image']; ?>" />
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

