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
    <meta name="msapplication-TileColor" content="#ef5350">
    <meta name="msapplication-TileImage" content="#">
    <!-- For Windows Phone -->


    <!-- CORE CSS-->    
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection">


    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="js/plugins/material-preloader/materi34343alPreloader.html" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="js/plugins/jvectormap/jquery-jvectormap.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="js/plugins/chartist-js/chartist.min.css" type="text/css" rel="stylesheet" media="screen,projection">


</head>

<body>

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

                <!--start container-->
                <div class="container">

                    <!--card stats start-->
                    <div id="card-stats">
                        <div class="row">
                            <div class="col s12 m6 l3">
                                <div class="card">
                                    <div class="card-content  green white-text">
                                        <p class="card-stats-title"><i class="mdi-social-group-add"></i>New Post</p>
                                        <h4 class="card-stats-number">0</h4>
                                    </div>
                                    <div class="card-action  green darken-2">
                                        <div id="clients-bar"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m6 l3">
                                <div class="card">
                                    <div class="card-content purple white-text">
                                        <p class="card-stats-title"><i class="mdi-editor-attach-money"></i>Donation</p>
                                        <h4 class="card-stats-number">$0</h4>
                                    </div>
                                    <div class="card-action purple darken-2">
                                        <div id="sales-compositebar"></div>

                                    </div>
                                </div>
                            </div>                            
                            <div class="col s12 m6 l3">
                                <div class="card">
                                    <div class="card-content blue-grey white-text">
                                        <p class="card-stats-title"><i class="mdi-action-trending-up"></i>Adoption Rate</p>
                                        <h4 class="card-stats-number">0</h4>
                                    </div>
                                    <div class="card-action blue-grey darken-2">
                                        <div id="profit-tristate"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m6 l3">
                                <div class="card">
                                    <div class="card-content deep-purple white-text">
                                        <p class="card-stats-title"><i class="mdi-editor-insert-drive-file"></i>New Reports</p>
                                        <h4 class="card-stats-number">0</h4>
                                    </div>
                                    <div class="card-action  deep-purple darken-2">
                                        <div id="invoice-line"></div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <!--card stats end-->

                    <!-- //////////////////////////////////////////////////////////////////////////// -->
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
    
    
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="js/plugins.js"></script>
</body>
</html>
