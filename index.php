<?php include 'general/header.php';?>




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
                            <script src="js/offerfinder.js" data-apiurl="<?php echo $apiUrl;?>" data-country="<?php echo $_GET['lang'];?>" id="offerfinder"> </script>
                        </div>



        </div>
        <!-- /.container -->

    </div>
</div>

</body>
</html>