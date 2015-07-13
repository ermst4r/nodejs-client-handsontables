<?php include 'general/header.php';?>



<div id="content" style="margin-top:-40px;">
    <div class="container">


        <!-- /Normal -->

        <!-- /Breadcrumbs line -->

        <!--=== Page Header ===-->
        <div class="page-header">
            <div class="page-title">
                <div class="form-group">
                    <form method="post">
                        <div class="col-md-9">

                        </div>
                </div>



            </div>
        </div>
        <!-- /Page Header -->

        <!--=== Page Content ===-->
        <div class="row" >
            <!--=== Example Box ===-->
            <div class="col-md-12">

                <!--=== Page Content ===-->
                <div class="row">


                   <!--   <table class="table table-striped table-bordered table-hover" id="showexport" style="width: 500px;">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Action</th>

                        </tr>
                        </thead>

                        <tbody>
                        <tr>
                            <td >  <input type="text" name="date" class="form-control pickdateofferfind" value="<?php echo (isset($_GET['scrapeStartDate']) ? $_GET['scrapeStartDate'] : '');?> "> </td>

                            <td>     <input type="submit" name="sbmDate" class="form-control btn btn-success" value="Set date"> </td>
                        </tr>



                        </tbody>
                    </table> -->



                    <!-- /.container -->
                    <div class="loading" style="font-weight: bold; color:green;"> </div>

                    <div class="wrapper">
                        <div class="wrapper-row">
                            <div id="loading" > <img src="images/ajax-loader.gif"> </div>
                            <div id="example1"   ></div>

                        </div>

                    </div>

                    <script src="js/codes.js" data-scrapestartdate="<?php echo ( $_GET['scrapeStartDate']  || strlen($_GET['scrapeStartDate']) > 0   ? $_GET['scrapeStartDate'] : 0 );?>" data-apiurl="<?php echo $apiUrl;?>" data-country="<?php echo $_GET['lang'];?>" id="offerfinder"> </script>
                </div>



            </div>
            <!-- /.container -->

        </div>
    </div>

    </body>
    </html>
