<?php
$updated = (isset($_GET['updated']) ? $_GET['updated'] : -1);
$deleted = (isset($_GET['deleted']) ? $_GET['deleted'] : -0);
$apiUrl = 'http://localhost:3000';
$websiteUrl = 'http://sandbox.ermst4r.nl/contentscraper/';
$currentHomePage = $_SERVER['PHP_SELF'].'?updated=-1&lang=es';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <title>Offerfinder 1.0</title>

    <!--=== CSS ===-->
    <base href="<?php echo $websiteUrl;?>">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <!-- jQuery UI -->
    <!--<link href="plugins/jquery-ui/jquery-ui-1.10.2.custom.css" rel="stylesheet" type="text/css" />-->
    <!--[if lt IE 9]>
    <link rel="stylesheet" type="text/css" href="plugins/jquery-ui/jquery.ui.1.10.2.ie.css"/>
    <![endif]-->
    <!-- Theme -->
    <link href="assets/css/main.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="assets/css/fontawesome/font-awesome.min.css">
    <!--[if IE 7]>
    <link rel="stylesheet" href="assets/css/fontawesome/font-awesome-ie7.min.css">
    <![endif]-->

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>

    <!--=== JavaScript ===-->

    <script type="text/javascript" src="assets/js/libs/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>

    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/libs/lodash.compat.min.js"></script>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="assets/js/libs/html5shiv.js"></script>
    <![endif]-->

    <!-- Smartphone Touch Events -->
    <script type="text/javascript" src="plugins/touchpunch/jquery.ui.touch-punch.min.js"></script>
    <script type="text/javascript" src="plugins/event.swipe/jquery.event.move.js"></script>
    <script type="text/javascript" src="plugins/event.swipe/jquery.event.swipe.js"></script>

    <!-- General -->
    <script type="text/javascript" src="assets/js/libs/breakpoints.js"></script>
    <script type="text/javascript" src="plugins/respond/respond.min.js"></script> <!-- Polyfill for min/max-width CSS3 Media Queries (only for IE8) -->
    <script type="text/javascript" src="plugins/cookie/jquery.cookie.min.js"></script>
    <script type="text/javascript" src="plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script type="text/javascript" src="plugins/slimscroll/jquery.slimscroll.horizontal.min.js"></script>

    <!-- App -->
    <script type="text/javascript" src="assets/js/app.js"></script>
    <script type="text/javascript" src="assets/js/plugins.js"></script>
    <script type="text/javascript" src="assets/js/plugins.form-components.js"></script>

    <script>
        $(document).ready(function(){
            "use strict";

            App.init(); // Init layout and core plugins
            Plugins.init(); // Init all plugins
            FormComponents.init(); // Init all form-specific plugins
        });
    </script>

    <script data-jsfiddle="common" src="dist/handsontable.full.js"></script>
    <link data-jsfiddle="common" rel="stylesheet" media="screen" href="dist/handsontable.full.css">
    <script  data-jsfiddle="common" src="js/samples.js"></script>
    <script src="js/highlight/highlight.pack.js"></script>
    <link rel="stylesheet" media="screen" href="js/highlight/styles/github.css">
    <script src="js/jquery.js"></script>
    <script src="js/md5.js"></script>
</head>

<body>

<!-- Header -->
<header class="header navbar navbar-fixed-top" role="banner">
    <!-- Top Navigation Bar -->
    <div class="container">

        <!-- Only visible on smartphones, menu toggle -->
        <ul class="nav navbar-nav">
            <li class="nav-toggle"><a href="javascript:void(0);" title=""><i class="icon-reorder"></i></a></li>


        </ul>

        <!-- Logo -->
        <a class="navbar-brand" href="<?php echo $currentHomePage;?>">

            <strong>OfferFinder</strong>
        </a>
        <!-- /logo -->

        <!-- Sidebar Toggler -->
        <a href="#" class="toggle-sidebar bs-tooltip" data-placement="bottom" data-original-title="Toggle navigation">
            <i class="icon-reorder"></i>
        </a>
        <!-- /Sidebar Toggler -->

        <!-- Top Left Menu -->
        <ul class="nav navbar-nav navbar-left hidden-xs hidden-sm">
            <li>
                <a href="<?php echo $currentHomePage;?>">
                    Home
                </a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-picture"> </i> Show
                    <i class="icon-caret-down small"></i>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo $_SERVER['PHP_SELF'].'?updated=-1&lang=es';?>"><i class="icon-angle-right"></i>All content</a></li>
                    <li><a href="<?php echo $_SERVER['PHP_SELF'].'?updated=0&lang=es';?>"><i class="icon-angle-right"></i>Unedited content</a></li>
                    <li><a href="<?php echo $_SERVER['PHP_SELF'].'?updated=1&lang=es';?>"><i class="icon-angle-right"></i>Edited content</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-download"></i> Export
                    <i class="icon-caret-down small"></i>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo $apiUrl;?>/api/getdata/xls/1/0"><i class="icon-download"></i>Excel </a></li>
                    <li><a href="<?php echo $apiUrl;?>/api/getdata/csv/1/0"><i class="icon-download"></i>Csv </a></li>
                    <li><a href="<?php echo $apiUrl;?>/api/getdata/json/1/0"><i class="icon-download"></i>Json</a></li>
                </ul>
            </li>


            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-upload"></i>
                    Import
                    <i class="icon-caret-down small"></i>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="javascript:spiderWebsite('flipit_es')"><i class="icon-upload"></i>Flipit ES (master)</a></li>
                    <li><a href="javascript:spiderWebsite('cupones')"><i class="icon-upload"></i>Cupones</a></li>
                    <li><a href="javascript:spiderWebsite('cuponation')"><i class="icon-upload"></i> Cuponation</a></li>
                    <li><a href="javascript:spiderWebsite('cupon_es')"><i class="icon-upload"></i>Cupon.es</a></li>
                    <li> <a href="javascript:spiderWebsite('cuponesmagicos')"><i class="icon-upload"></i>Cuponesmagicos</a> </li>
                </ul>
            </li>
            <li>
                <a href="/help/help.pdf">
                     <i class="icon-question"> </i> Help
                </a>
            </li>

        </ul>
        <!-- /Top Left Menu -->


        <!-- /Top Right Menu -->
    </div>
    <!-- /top navigation bar -->
</header> <!-- /.header -->

<div id="container">
    <div id="sidebar" class="sidebar-fixed">
        <div id="sidebar-content">

            <!--=== Navigation ===-->
            <ul id="nav">
                <li class="current open">
                    <a href="javascript:void(0);">
                        <i class="icon-dashboard"></i>
                        Offers
                    </a>
                    <ul class="sub-menu">
                        <li class="current">
                            <a href="<?php echo $currentHomePage;?>">
                                <i class="icon-angle-right"></i>
                                Spain
                            </a>
                        </li>

                    </ul>
                </li>
            </ul>
            <!-- /Navigation -->
        </div>
        <div id="divider" class="resizeable"></div>
    </div>
    <!-- /Sidebar -->

    <div id="content">
        <div class="container">
            <!-- Breadcrumbs line -->
            <div class="crumbs">
                <ul id="breadcrumbs" class="breadcrumb">
                    <li>
                        <i class="icon-home"></i>
                        <a href="index.html">Dashboard</a>
                    </li>
                    <li class="current">
                        <a href="calendar.html" title="">Calendar</a>
                    </li>
                </ul>

                <ul class="crumb-buttons">
                    <li><a href="charts.html" title=""><i class="icon-signal"></i><span>Statistics</span></a></li>
                </ul>
            </div>
            <!-- /Breadcrumbs line -->

            <!--=== Page Header ===-->
            <div class="page-header">
                <div class="page-title">
                 <h3> <img src="images/spain_flag_icon.png"> Spain   </h3>

                    <span>Here you see all the offers of spain</span>
                </div>
            </div>
            <!-- /Page Header -->

            <!--=== Page Content ===-->
            <div class="row">
                <!--=== Example Box ===-->
                <div class="col-md-12">

                    <div class="loading" style="font-weight: bold; color:green;"> </div>

                            <div class="wrapper">
                                <div class="wrapper-row">
                                    <div id="loading" > <img src="images/ajax-loader.gif"> </div>
                                    <div id="example1"  ></div>

                                </div>

                            </div>
                            <script src="js/offerfinder.js" data-apiurl="<?php echo $apiUrl;?>" id="offerfinder"> </script>
                        </div>



        </div>
        <!-- /.container -->

    </div>
</div>

</body>
</html>