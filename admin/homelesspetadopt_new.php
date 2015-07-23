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
    <link rel="icon" href="#">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="#">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="#">
    <!-- For Windows Phone -->


    <!-- CORE CSS-->    
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection">


    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="js/plugins/material-preloader/materialPreloader.html" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="js/plugins/jvectormap/jquery-jvectormap.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="js/plugins/chartist-js/chartist.min.css" type="text/css" rel="stylesheet" media="screen,projection">


</head>

<body>
    <!-- Start Page Loading -->

    <!-- End Page Loading -->

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
                  	<li class="active">Homeless Pet Adoption</a>
                  	</li>
                  	<li class="active">Post New</li>
                	</ol>
              	</div>
            	</div>
          	</div>
        	</div>
        	<!--breadcrumbs end-->


                <!--start container-->
                <div class="container">

                    <!--Form Advance-->          
          <div class="row">
            <div class="col s12 m12 l12">
              <div class="card-panel">
                <h4 class="header2">Homeless Pet Adoption</h4>
                <div class="row">
                  <form class="col s12">
                    <div class="row">
                      <div class="input-field col s6">
                        <input id="first_name" type="text">
                        <label for="first_name">Title</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s6">
                        <input id="first_name" type="text">
                        <label for="first_name">Url</label>
                      </div>
                    </div>
                      <div class="row">
                        <div class="input-field col s12">
                          <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Submit
                            <i class="mdi-content-send right"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                  </form>
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



    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <!-- START FOOTER -->
		<?php include_once './includes/footer.php'; ?>
    <!-- END FOOTER -->


    <!-- ================================================
    Scripts
    ================================================ -->
    
    <!-- jQuery Library -->
    <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>    
    <!--materialize js-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script type="text/javascript" src="js/plugins/material-preloader/materialPreloader-2.html"></script>   

    <!-- chartist -->
    <script type="text/javascript" src="js/plugins/chartist-js/chartist.min.js"></script>   

   <!--prism-->
    <script type="text/javascript" src="js/prism.js"></script>

    <!-- chartjs -->
    <script type="text/javascript" src="js/plugins/chartjs/chart.min.js"></script>
    <script type="text/javascript" src="js/plugins/chartjs/chart-script.js"></script>

    <!-- sparkline -->
    <script type="text/javascript" src="js/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script type="text/javascript" src="js/plugins/sparkline/sparkline-script.js"></script>
    
    <!--jvectormap-->
    <script type="text/javascript" src="js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script type="text/javascript" src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script type="text/javascript" src="js/plugins/jvectormap/vectormap-script.js"></script>
    <!-- chartist -->
    <script type="text/javascript" src="js/plugins/chartist-js/chartist.min.js"></script> 
    
    
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="js/plugins.js"></script>
</body>

</html>
