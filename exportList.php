<?php include 'general/header.php';?>



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

                </div>
            </div>
            <!-- /Page Header -->
<?php $jsonValue = json_decode(file_get_contents($apiUrl.'/api/getsrapedates/'.$_GET['lang']));


?>
            <!--=== Page Content ===-->
            <div class="row">
                <!--=== Example Box ===-->
                <div class="col-md-12">

                    <div class="loading" style="font-weight: bold; color:green;"> </div>

                    <table class="table table-striped table-bordered table-hover datatable">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($jsonValue as $values): ?>
                            <tr>
                                <td > <B> <?php echo $values->lastUpdated;?> </B> </td>

                                <td><a href="<?php echo $apiUrl;?>/api/getdata/xls/1/0/<?php echo $_GET['lang'];?>/<?php echo $values->lastUpdated;?>"> <i class="icon-download"></i> Download</a>  </td>
                            </tr>
                        <?php endforeach;?>


                        </tbody>
                    </table>



            </div>
            <!-- /.container -->

        </div>
    </div>

</body>
</html>