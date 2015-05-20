<?php include 'general/header.php';?>

    <div id="content">
        <div class="container">


            <!--=== Page Header ===-->
            <div class="page-header">
                <div class="page-title">

                </div>
            </div>
            <!-- /Page Header -->
<?php $jsonValue = json_decode(file_get_contents($apiUrl.'/api/getsrapedates/'.$_GET['lang'])); ?>

            <!--=== Page Content ===-->
            <div class="row">
                <!--=== Example Box ===-->
                <div class="col-md-12">



                    <table class="table table-striped table-bordered table-hover" id="showexport">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Action</th>

                        </tr>
                        </thead>

                        <tbody>
                        <?php foreach($jsonValue as $values): ?>
                            <tr>
                                <td > <B> <?php echo date("Y-m-d",strtotime($values->lastUpdated));?> </B> </td>

                                <td><a href="<?php echo $apiUrl;?>/api/getdata/xls/1/0/<?php echo $_GET['lang'];?>/<?php echo $values->lastUpdated;?>"> <i class="icon-download"></i> Download</a>  </td>
                            </tr>
                        <?php endforeach;?>


                        </tbody>
                    </table>



            </div>
            <!-- /.container -->

        </div>

            <script>

                $(document).ready(function() {
                    $('#showexport').dataTable( {
                        "order": [[ 1, "desc" ]]
                    } );
                } );

            </script>
    </div>

</body>
</html>