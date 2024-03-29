<?php 

	$page_id="dashboard";
	include_once 'libs/class.database.php';
	include_once 'libs/class.session.php';
	include_once 'libs/functions.php';
	session_start();


	$session= new Session();
	if(!$session->has_logged_in())
	{
		redirect_to("index.php");
	}

	?> 
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Voice for Animals</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="css/includes/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="css/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- DATA TABLES -->
        <link href="css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
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
                        ABOUT US
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i>DASHBOARD</a></li>
                        <li class="active">ABOUT US</li>
                    </ol>
                </section>
		<section class="content">
				<!-- form start -->
                <form role="form">
				     <div class="col-lg-12">
                     	<div class="box-footer">
                        <a href="aboutus_update.php" class="btn bg-olive margin pull-right">Edit About Us</a>
						</div>
				     </div>
                 </form>
                </section>
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">

                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                
                                
                                
                                                
           <?php 
            global $database, $db;
            $qry="SELECT * from `".TBL_ABOUTUS."`";
            
            $result = $database->query( $qry );
            $row = $database->fetch_array( $result );
            ?>               
                
                                
                                
                                
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>S.NO</th>
                                                <th>TITLE</th>
                                                <th>CONTENT</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>ABOUT US</td>
                                                <td><?php echo $row['aboutus']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>GOALS</td>
                                                <td><?php echo $row['goals']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>MISSION</td>
                                                <td><?php echo $row['mission']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>CORE MISSION</td>
                                                <td><?php echo $row['core_mission']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>METHODS</td>
                                                <td><?php echo $row['methods']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- jQuery 2.0.2 -->
        <script src="css/includes/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="css/includes/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- page script -->
        <script type="text/javascript">
            $(function() {
                $("#example1").dataTable();
                $('#example2').dataTable({
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false
                });
            });
        </script>

    </body>
</html>
