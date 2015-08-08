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
                        ANIMAL REGISTRATION
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i>DASHBOARD</a></li>
                        <li class="active">ANIMAL REGISTRATION</li>
                    </ol>
                </section>

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
                
                                                
            <?php 
            
            global $database, $db;
            $qry="SELECT * from `".TBL_ANIMAL."`";
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
                                                <th>ANIMAL NAME</th>
                                                <th>SCAN FOUNDATION ID</th>
                                                <th>SPECIES</th>
                                                <th>MEDICAL HISTROY</th>
                                                <th>VETERINARIAN NAME</th>
                                                <th>VETERINARIAN MOB</th>
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
                                        		<td><?php echo $j+1; ?></td>
                                        		<td><?php echo $row['animal_name']; ?></td>
                                        		<td><?php if($row['sf_id'] == "")
                                        				{
                                        						echo "Not Allocated"; }
                                        					else 
                                        					{
                                        						echo $row['sf_id'];
                                                        }?></td>
                                        		<td><?php echo $row['species']; ?></td>
                                        		<td><?php echo $row['medical_histroy']; ?></td>
                                        		<td><?php echo $row['vet_name']; ?></td>
                                        		<td><?php echo $row['vet_mob']; ?></td>
												<td style="width: 95px;">
                                                <a href="editanimal_registration.php?id=<?php echo $row['animal_id']; ?>">
                                                    <button class="btn btn-xs bg-maroon">EDIT</button>
                                                </a>
                                                <a href="animal_actions.php?mode=post_delete&id=<?php echo $row['animal_id']; ?>" onclick="return confirm('Are You Sure To Delete')">
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
                                                     						 <button class="btn btn-xs bg-navy">REJECTED</button>
                                                     <?php } elseif($row['status'] == "")
                                                     				{?>
                                                     						<?php echo "No Status"; ?>
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

        <!-- jQuery 2.0.2 -->
        <script src="css/includes/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="css/includes/bootstrap.min.js" type="text/javascript"></script>
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
<?php
unset($_SESSION["msg"]);
unset($_SESSION["msg1"]);
unset($_SESSION["msg2"]);
?>