<?php
$updated = (isset($_GET['updated']) ? $_GET['updated'] : -1);
$deleted = (isset($_GET['deleted']) ? $_GET['deleted'] : -0);
$apiUrl = 'http://localhost:3000';
$websiteUrl = 'http://sandbox.ermst4r.nl/contentscraper/';
?>
<!doctype html>
<head>
    <meta charset='utf-8'>
    <title>Offerfinder 1.0 </title>
    <style>
        html{font-family:sans-serif;}

    </style>
    <!--
    Loading Handsontable (full distribution that includes all dependencies apart from jQuery)
    -->
    <script data-jsfiddle="common" src="dist/handsontable.full.js"></script>
    <link data-jsfiddle="common" rel="stylesheet" media="screen" href="dist/handsontable.full.css">
    <script  data-jsfiddle="common" src="js/samples.js"></script>
    <script src="js/highlight/highlight.pack.js"></script>
    <link rel="stylesheet" media="screen" href="js/highlight/styles/github.css">
    <script src="js/jquery.js"></script>
    <script src="js/md5.js"></script>
</head>
<div style="float: right">
    <B> Fetch Data</B><BR>
    <a href="javascript:spiderWebsite('cupones')">Cupones</a><BR>
    <a href="javascript:spiderWebsite('cuponation')">Cuponation</a><BR>
    <a href="javascript:spiderWebsite('cupon_es')">Cupon.es</a><BR>
    <a href="javascript:spiderWebsite('cuponesmagicos')">Cuponesmagicos</a><BR>
</div>

<div align="left">
    <div id="error" style="border:3px solid red; width: 350px; height: 100px; padding: 5px;display:none;">
        <BR>
        <span style="color:red;"> <B> Error Occurd! </B> </span><BR><BR>
        <div id="msg" style="font-size:15px;"> </div>
    </div>

    <p>

    </p>

        <span style="font-size:12px; ">

               <a style="color:black;" href="<?php echo $websiteUrl;?>?updated=-1"> <?php echo (($updated == -1) ? '<B style="color:black;"> (all content) </B>' : '(all content)');?></a>  /
                <a  style="color:black;" href="<?php echo $websiteUrl;?>?updated=0"> <?php echo (($updated == 0) ? '<B style="color:black;"> (unedited content) </B>' : '(unedited content)');?></a> /
                <a  style="color:black;" href="<?php echo $websiteUrl;?>?updated=1">  <?php echo (($updated == 1) ? '<B style="color:black;"> (edited content) </B>' : '(edited content)');?> </a> /
                <a  style="color:black;" href="<?php echo $websiteUrl;?>?updated=-1&deleted=1" title="Show trascan">   <img src="images/trash.gif"> </a>

        </span> </p>
    <BR>

    Export to:
    <a href="<?php echo $apiUrl;?>/api/getdata/json/1/<?php echo $deleted;?>" target="_blank"><img src="images/json_icon.png" title="Export JSON File" ></a> |
    <a href="<?php echo $apiUrl;?>/api/getdata/csv/1/<?php echo $deleted;?>"><img src="images/csv_icon.png" title="Export Csv File" ></a> |
    <a href="<?php echo $apiUrl;?>/api/getdata/xls/1/<?php echo $deleted;?>"><img src="images/excel_icon.png" title="Export Excel File" ></a> |

    <BR><BR>
    <div class="loading" style="font-weight: bold; color:green;"> </div>

</div>



<div class="wrapper">
    <div class="wrapper-row">
        <div id="loading" > <img src="images/ajax-loader.gif"> </div>
        <div id="example1"  ></div>

    </div>

</div>

</div>
</div>

<div id="outside-links-wrapper"></div>
<script src="js/offerfinder.js" data-apiurl="<?php echo $apiUrl;?>" id="offerfinder"> </script>