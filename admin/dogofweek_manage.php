<?php 

	$page_id="";
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

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Voice for Animals</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
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
                        DOG OF THE WEEK
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i>DASHBOARD</a></li>
                        <li class="active">DOG OF THE WEEK</li>
                    </ol>
                </section>

                
                
                                                
            <?php 
            
            global $database, $db;
            $qry="SELECT * from `".TBL_DOGOF_THEWEEK."`";
            $result = $database->query( $qry );
/* 			
print_r($result);
exit; */
            ?>
                      
                
                
                
                
                
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>S.NO</th>
                                                <th>NAME OF THE DOG</th>
                                                <th>AREA</th>
                                                <th>MESSAGE</th>
                                                <th style="width: 95px;">ACTION</th>
                                                <th>STATUS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        				<?php 
                                                        $j=0;
                                                        while($row = $database->fetch_array( $result ))
                                                        {

                                                        ?>
                                        	<tr class="odd">
                                        		<td> <?php echo $j+1; ?></td>
                                        		<td><?php echo $row['dog_name']; ?></td>
                                        		<td><?php echo $row['dog_area']; ?></td>
                                        		<td><?php echo $row['message']; ?></td>
												<td style="width: 95px;">
                                                <a href="dogofweek_edit.php?id=<?php echo $row['dog_id']; ?>">
                                                    <button class="btn btn-xs bg-maroon">EDIT</button>
                                                </a>
                                                <a href="dogofweek_actions.php?mode=user_delete&id=<?php echo $row['dog_id']; ?>" onclick="return confirm('Are You Sure To Delete')">
                                                    <button class="btn btn-xs btn-danger delete_confirm">DELETE</button>
                                                </a>
                            	
                            					</td>
                                        		<td>
                                                     <?php if($row['status'] == "approved")
                                                     				{?>
                                                     						<button class="btn btn-xs bg-olive">APPROVED</button>
                                                     <?php } elseif($row['status'] == "pending")
                                                                 	{?>
                                                                             <button class="btn btn-xs bg-orange">PENDING</button>
                                                     <?php } elseif($row['status'] == "rejected")
                                                     				{?>
                                                     						 <button class="btn btn-xs bg-orange">REJECTED</button>
                                                     <?php }?>
                                                 </td>

                                            </tr>
                                            			<?php 
                                                                $j++;
                                                                }
                                                        ?>
                                        </tbody>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js" type="text/javascript"></script>
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
