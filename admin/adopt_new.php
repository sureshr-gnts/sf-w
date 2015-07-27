<!DOCTYPE html>
<?php 
$page_id="adopt";
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

$formd_lifepet_foster="";
$formd_adoption_process="";
$formd_meeting="";
$formd_application="";
$formd_screening="";
$formd_home_visit="";
$formd_approval="";
$formd_followup="";
$formd_clinic="";
$formd_medical_services="";
$formd_dogs_url="";
$formd_cats_url="";

if(isset($_SESSION["adoptEdit_formData"])){
        $formd_lifepet_foster=$_SESSION["adoptEdit_formData"]["lifepet_foster"];
        $formd_adoption_process=$_SESSION["adoptEdit_formData"]["adoption_process"];
        $formd_meeting=$_SESSION["adoptEdit_formData"]["meeting"];
        $formd_application=$_SESSION["adoptEdit_formData"]["application"];
        $formd_screening=$_SESSION["adoptEdit_formData"]["screening"];
        $formd_home_visit=$_SESSION["adoptEdit_formData"]["home_visit"];
        $formd_approval=$_SESSION["adoptEdit_formData"]["approval"];
        $formd_followup=$_SESSION["adoptEdit_formData"]["followup"];
        $formd_clinic=$_SESSION["adoptEdit_formData"]["clinic"];
        $formd_medical_services=$_SESSION["adoptEdit_formData"]["medical_services"];
        $formd_dogs_url=$_SESSION["adoptEdit_formData"]["dogs_url"];
        $formd_cats_url=$_SESSION["adoptEdit_formData"]["cats_url"];
        unset($_SESSION["adoptEdit_formData"]);
    }
    unset($_SESSION["adoptEdit_formData"]);
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
                        ADOPT
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i>DASHBOARD</a></li>
                        <li class="active">ADOPT</li>
                        <li class="active">MANAGE</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
				<!-- form start -->
                                <form role="form" action="adopt_actions.php" id="adopt" enctype="multipart/form-data" method="post">
				<input type="hidden" name="mode" value="adopt" />
				     <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>FRIENDS FOR LIFE PET FOSTER PROGRAM</label>
                                            <textarea class="form-control" name="lifepet_foster" rows="5"></textarea>
                                        </div>
                                     </div>
				     <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>ADOPTION PROCESS</label>
                                            <textarea class="form-control" name="adoption_process" rows="5"></textarea>
                                        </div>
                                     </div>
				     <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>1. MEETING WITH THE PET</label>
                                            <textarea class="form-control" name="meeting" rows="5"></textarea>
                                        </div>
                                     </div>
				     <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>2. ADOPTION APPLICATION</label>
                                            <textarea class="form-control" name="application" rows="5"></textarea>
                                        </div>
                                     </div>
				     <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>3. SCREENING</label>
                                            <textarea class="form-control" name="screening" rows="5"></textarea>
                                        </div>
                                     </div>
				     <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>4. HOME VISIT</label>
                                            <textarea class="form-control" name="home_visit" rows="5"></textarea>
                                        </div>
                                     </div>
				     <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>5. APPROVAL AND TRANSFER</label>
                                            <textarea class="form-control" name="approval" rows="5"></textarea>
                                        </div>
                                     </div>
				     <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>6. FOLLOW-UP</label>
                                            <textarea class="form-control" name="followup" rows="5"></textarea>
                                        </div>
                                     </div>
				     <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>7. ANIMAL BEHAVIOUR CLINIC</label>
                                            <textarea class="form-control" name="clinic" rows="5"></textarea>
                                        </div>
                                     </div>
				     <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>8. VETERINARY MEDICAL SERVICES</label>
                                            <textarea class="form-control" name="medical_services" rows="5"></textarea>
                                        </div>
                                     </div>
				     <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="dogs_url">DOGS FOR ADOPTION</label>
                                            <input type="text" class="form-control" id="dogs_url" name="dogs_url" placeholder="IMAGE URL">
                                        </div>
                                     </div>
				     <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="cats_url">CATS FOR ADOPTION</label>
                                            <input type="text" class="form-control" id="cats_url" name="cats_url" placeholder="IMAGE URL">
                                        </div>
                                     </div>
				     <div class="col-lg-12">
                                    	    <div class="box-footer">
                                             <button type="submit" value="Save" name="action" class="btn btn-primary pull-right">Submit</button>
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
