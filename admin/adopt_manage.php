<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <title>Voice for Animals</title>

  <!-- Favicons-->
  <link rel="icon" href="#" sizes="32x32">
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="#">
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="#">
  <!-- For Windows Phone -->


  <!-- CORE CSS-->
  
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="../../../cdn.datatables.net/1.10.6/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  


  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="css/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="js/plugins/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="js/plugins/chartist-js/chartist.min.css" type="text/css" rel="stylesheet" media="screen,projection">
</head>

<body>

  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START HEADER -->
		<?php include_once './includes/header.php'; ?>
  <!-- END HEADER -->

  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START MAIN -->
  <div id="main">
    <!-- START WRAPPER -->
    <div class="wrapper">

             <!-- START LEFT SIDEBAR NAV-->
		<?php include_once './includes/nav.php'; ?>
            <!-- END LEFT SIDEBAR NAV-->
      <!-- //////////////////////////////////////////////////////////////////////////// -->

      <!-- START CONTENT -->
      <section id="content">
        
		<!--breadcrumbs start-->
        	<div id="breadcrumbs-wrapper" class=" grey lighten-3">
          	<div class="container">
            	<div class="row">
              	<div class="col s12 m12 l12">
                	<h5 class="breadcrumbs-title">Voice For Animals</h5>
                	<ol class="breadcrumb">
                  	<li><a href="index.php">Dashboard</a>
                  	</li>
                  	<li class="active">Adopt</a>
                  	</li>
                  	<li class="active">Manage</a>
                  	</li>
                	</ol>
              	</div>
            	</div>
          	</div>
        	</div>
        	<!--breadcrumbs end-->
        

        <!--start container-->
        <div class="container">
          <div class="section">
            <!--DataTables example-->
            <div id="table-datatables">
              <h4 class="header">Adopt</h4>
              <div class="row">
                <div class="col s12 m8 l12">
                  <table id="data-table-simple" class="responsive-table display" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Content/Image</th>
			    <th>Action</th>
			    <th>Status</th>
                        </tr>
                    </thead>
                 
                    <tfoot>
                        <tr>
                            <th>Title</th>
                            <th>Content/Image</th>
			    <th>Action</th>
			    <th>Status</th>
                        </tr>
                    </tfoot>
                 
                    <tbody>
                        <tr>
                            <td>ADOPTION PROCESS</td>
                            <td>Every year hundreds of ls such as dogs, cats are become homeless for many reasons. Our mission is to find out the homless ls around the country and make a better life for them. As like human they need love, care and also need home</td>
			    <td><a href="#">Make Live|<br><a href="#">Update|<br><a href="#">Delete</td>
			    <td><a class="btn waves-effect waves-light teal">Active</a></td>
                        </tr>
                       <tr>
                            <td>1.Meeting with the pet</td>
                            <td>Every year hundreds of ls such as dogs, cats are become homeless for many reasons. Our mission is to find out the homless ls around the country and make a better life for them. As like human they need love, care and also need home</td>
			    <td><a href="#">Make Live|<br><a href="#">Update|<br><a href="#">Delete</td>
			    <td><a class="btn waves-effect waves-light teal">Active</a></td>
                        </tr>
                            <td>Dogs</td>
                            <td><img src="images/1.jpg" alt="Scan Foundation" border=3 height=100 width=100></img></td>
			    <td><a href="#">Make Live|<br><a href="#">Update|<br><a href="#">Delete</td>
			    <td><a class="btn waves-effect waves-light teal">Active</a></td>
                        </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div> 
          </div>
        </div>
        <!--end container-->

      </section>
      <!-- END CONTENT -->

    </div>
    <!-- END WRAPPER -->

  </div>
  <!-- END MAIN -->

  <!-- START FOOTER -->
 		<?php include_once './includes/footer.php'; ?>
    <!-- END FOOTER -->



    <!-- ================================================
    Scripts
    ================================================ -->
    
    <!-- jQuery Library -->
    <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>    
    <!--materialize js-->
    <script type="text/javascript" src="js/materialize.js"></script>
    <!--prism-->
    <script type="text/javascript" src="js/prism.js"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <!-- data-tables -->
    <script type="text/javascript" src="js/plugins/data-tables/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/plugins/data-tables/data-tables-script.js"></script>
    <!-- chartist -->
    <script type="text/javascript" src="js/plugins/chartist-js/chartist.min.js"></script>   
    
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="js/plugins.js"></script>    
</body>
</html>