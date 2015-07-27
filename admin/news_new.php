<!DOCTYPE html>
<?php 
$page_id="news_new";
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
//print_r($_REQUEST);
$newsid=$_REQUEST['newsid'];
$error=$_REQUEST['error'];

$formd_news_title="";
$formd_category="";
$formd_news_content="";
$formd_news_source="";
$formd_source_url="";
$formd_created_from="";
$formd_created_by="";
$formd_date="";
if(isset($_SESSION["newsEdit_formData"])){
        //print_r($_SESSION["newsEdit_formData"]);
	    $formd_news_title=$_SESSION["newsEdit_formData"]["news_title"];
        $formd_category=$_SESSION["newsEdit_formData"]["category"];
        $formd_news_content=$_SESSION["newsEdit_formData"]["news_content"];
        $formd_source=$_SESSION["newsEdit_formData"]["source"];
        $formd_source_url=$_SESSION["newsEdit_formData"]["source_url"];
        $formd_created_from=$_SESSION["newsEdit_formData"]["created_from"];
        $formd_created_by=$_SESSION["newsEdit_formData"]["created_by"];
        $formd_date=$_SESSION["newsEdit_formData"]["date"];
        unset($_SESSION["newsEdit_formData"]);
    }
    unset($_SESSION["newsEdit_formData"]);
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
                        LATEST NEWS
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i>DASHBOARD</a></li>
                        <li><a href="#"></i>LATEST NEWS</a></li>
                        <li class="active">ADD NEWS</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
				<!-- form start -->





                
                <?php 
            global $database, $db;
            $qry="SELECT id,category_name	from `".TBL_NEWS_CAT."` WHERE `isactive`='1'  order by category_name asc ";
            
           $result = $database->query( $qry );
            
			$data = array();
			$i=0;
			while($row = $database->fetch_array( $result )){
				$data[$i] = array("id"=>$row['id'],"category_name"=>$row['category_name']);
				$i++;
			}

            ?>
                
                





                                <form role="form" action="news_actions.php" enctype="multipart/form-data" method="post">
                    		<input type="hidden" name="mode" value="upload">
                                     <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="news_title">NEWS TITLE</label>
                                            <input type="text" class="form-control" id="news_title" name="news_title">
                                        </div>
				     </div>
                                     <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>SELECT CATEGORY</label>
                                            <select class="form-control" id="category" name="category">
                                                <option value="" disabled selected>Select Category</option>
						<?php 
						
							foreach($data as $val)
							{
						?>
                  				<option <?php if($formd_category == $val['id']) {echo 'selected=true""';} ?> value="<?php echo $val['id']; ?>"> <?php echo $val['category_name']; ?> </option>
                     				<?php } ?>
                                            </select>
                                        </div>
				     </div>
                                     <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>NEWS CONTENT</label>
                                            <textarea class="form-control" rows="4" id="news_content" name="news_content"></textarea>
                                        </div>
				     </div>
                                     <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="source">SOURCE</label>
                                            <input type="text" class="form-control" id="source" name="source">
                                        </div>
				     </div>
                                     <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="source_url">SOURCE URL</label>
                                            <input type="text" class="form-control" id="source_url" name="source_url">
                                        </div>
				     </div>
                                     <div class="col-lg-6">
                                    	    <div class="box-footer">
                                            <button type="submit" value="Add News" name="action" class="btn btn-primary">Submit</button>
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
