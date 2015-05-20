<?php include 'config.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <title>Offerfinder 1.0</title>

    <!--=== CSS ===-->
    <base href="<?php echo $websiteUrl;?>">
    <!--=== CSS ===-->

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

    <!--[if IE 8]>
    <link href="assets/css/ie8.css" rel="stylesheet" type="text/css" />
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

    <!-- Page specific plugins -->
    <!-- Charts -->
    <script type="text/javascript" src="plugins/sparkline/jquery.sparkline.min.js"></script>

    <script type="text/javascript" src="plugins/daterangepicker/moment.min.js"></script>
    <script type="text/javascript" src="plugins/daterangepicker/daterangepicker.js"></script>
    <script type="text/javascript" src="plugins/blockui/jquery.blockUI.min.js"></script>

    <!-- Pickers -->
    <script type="text/javascript" src="plugins/pickadate/picker.js"></script>
    <script type="text/javascript" src="plugins/pickadate/picker.date.js"></script>
    <script type="text/javascript" src="plugins/pickadate/picker.time.js"></script>
    <script type="text/javascript" src="plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script>

    <!-- Noty -->
    <script type="text/javascript" src="plugins/noty/jquery.noty.js"></script>
    <script type="text/javascript" src="plugins/noty/layouts/top.js"></script>
    <script type="text/javascript" src="plugins/noty/themes/default.js"></script>

    <!-- Slim Progress Bars -->
    <script type="text/javascript" src="plugins/nprogress/nprogress.js"></script>

    <!-- Bootbox -->
    <script type="text/javascript" src="plugins/bootbox/bootbox.js"></script>

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

    <!-- Demo JS -->
    <script type="text/javascript" src="assets/js/custom.js"></script>
    <script type="text/javascript" src="assets/js/demo/ui_general.js"></script>
    <script type="text/javascript" src="assets/js/custom.js"></script>
    <script type="text/javascript" src="assets/js/demo/ui_general.js"></script>

    <?php if(basename($_SERVER['PHP_SELF']) == 'index.php') : ?>
    <script data-jsfiddle="common" src="dist/handsontable.full.js"></script>
    <link data-jsfiddle="common" rel="stylesheet" media="screen" href="dist/handsontable.full.css">
    <script  data-jsfiddle="common" src="js/samples.js"></script>
    <script src="js/highlight/highlight.pack.js"></script>
    <link rel="stylesheet" media="screen" href="js/highlight/styles/github.css">

    <script src="js/md5.js"></script>
    <?php endif;?>


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
                    <li><a href="index.php<?php echo '?updated=-1&lang='.$_GET['lang'];?>&scrapeStartDate=<?php echo $_GET['scrapeStartDate'];?>"><i class="icon-angle-right"></i>All content</a></li>
                    <li><a href="index.php<?php echo '?updated=0&lang='.$_GET['lang'];?>&scrapeStartDate=<?php echo $_GET['scrapeStartDate'];?>"><i class="icon-angle-right"></i>Unedited content</a></li>
                    <li><a href="index.php<?php echo'?updated=1&lang='.$_GET['lang'];?>&scrapeStartDate=<?php echo $_GET['scrapeStartDate'];?>"><i class="icon-angle-right"></i>Edited content</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-download"></i> Export
                    <i class="icon-caret-down small"></i>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo $apiUrl;?>/api/getdata/xls/1/0/<?php echo $_GET['lang'];?>/<?php echo date("d-m-Y");?>"><i class="icon-download"></i>Excel </a></li>
                    <li><a href="<?php echo $apiUrl;?>/api/getdata/xls/1/0/<?php echo $_GET['lang'];?>/<?php echo date("d-m-Y");?>"><i class="icon-download"></i>Csv </a></li>
                    <li><a href="<?php echo $apiUrl;?>/api/getdata/xls/1/0/<?php echo $_GET['lang'];?>/<?php echo date("d-m-Y");?>"><i class="icon-download"></i>Json</a></li>
                    <li><a href="exportList.php?lang=<?php  echo $_GET['lang'];?>"><i class="icon-folder-close "></i>Choose By Date</a></li>
                </ul>
            </li>


            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-upload"></i>
                    Import
                    <i class="icon-caret-down small"></i>
                </a>
                <ul class="dropdown-menu">
                    <?php
                    switch($_GET['lang']) {
                        case 'es':
                           ?>
                            <li><a href="javascript:spiderWebsite('flipit_es')"><i class="icon-upload"></i>Flipit ES (master)</a></li>
                            <li><a href="javascript:spiderWebsite('cupones')"><i class="icon-upload"></i>Cupones</a></li>
                            <li><a href="javascript:spiderWebsite('cuponation')"><i class="icon-upload"></i> Cuponation</a></li>
                            <li><a href="javascript:spiderWebsite('cupon_es')"><i class="icon-upload"></i>Cupon.es</a></li>
                            <li> <a href="javascript:spiderWebsite('cuponesmagicos')"><i class="icon-upload"></i>Cuponesmagicos</a> </li>
                    <?php
                        break;
                        case 'de': ?>

                            <li><a href="javascript:spiderWebsite('flipit_de')"><i class="icon-upload"></i>Flipit DE (master)</a></li>
                            <li><a href="javascript:spiderWebsite('gutscheincodes')"><i class="icon-upload"></i>Gutscheincodes</a></li>
                            <li><a href="javascript:spiderWebsite('sparwelt')"><i class="icon-upload"></i>sparwelt</a></li>
                            <li><a href="javascript:spiderWebsite('gutscheinsammler')"><i class="icon-upload"></i>gutscheinsammler</a></li>
                            <li><a href="javascript:spiderWebsite('gutscheinpony_de')"><i class="icon-upload"></i>gutscheinpony</a></li>

                    <?php
                        break;
                        case 'in':
                            ?>

                            <li><a href="javascript:spiderWebsite('flipit_in')"><i class="icon-upload"></i>Flipit IN (master)</a></li>
                            <li><a href="javascript:spiderWebsite('cashkaro_in')"><i class="icon-upload"></i>Cashkaro</a></li>
                            <li><a href="javascript:spiderWebsite('cuponation_in')"><i class="icon-upload"></i>Cuponation India</a></li>
                            <li><a href="javascript:spiderWebsite('couponraja_in')"><i class="icon-upload"></i>Coupon Raja</a></li>
                            <li><a href="javascript:spiderWebsite('couponzguru_in')"><i class="icon-upload"></i>Couponzguru</a></li>

                    <?php break;

                    }
                    ?>
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

        <!-- Top Right Menu -->
        <ul class="nav navbar-nav navbar-right">

            <!-- User Login Dropdown -->
            <li class="dropdown user">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <!--<img alt="" src="assets/img/avatar1_small.jpg" />-->
                    <i class="icon-flag"></i>
                    <span class="username">Countries</span>
                    <i class="icon-caret-down small"></i>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="index.php?updated=-1&lang=es"><i class="icon-flag"></i> Spain</a></li>
                    <li><a href="index.php?updated=-1&lang=de"><i class="icon-flag"></i> Germany</a></li>
                    <li><a href="index.php?updated=-1&lang=de"><i class="icon-flag"></i> India </a></li>

                </ul>
            </li>
            <!-- /user login dropdown -->
        </ul>
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
                        <li>
                            <a href="<?php echo $_SERVER['PHP_SELF'].'?updated=-1&lang=es&scrapeStartDate=';?>">
                                <i class="icon-angle-right"></i>
                                Spain
                            </a>
                        </li>

                        <li>
                            <a href="<?php echo $_SERVER['PHP_SELF'].'?updated=-1&lang=de';?>">
                                <i class="icon-angle-right"></i>
                                Germany
                            </a>
                        </li>

                        <li>
                            <a href="<?php echo $_SERVER['PHP_SELF'].'?updated=-1&lang=in';?>">
                                <i class="icon-angle-right"></i>
                                India
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