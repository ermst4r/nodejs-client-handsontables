<!doctype html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Imbull.com - Content editor V0.01</title>
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



    <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>



</head>
<div align="left">
    <?php $updated = (isset($_GET['updated']) ? $_GET['updated'] : -1);?>
    <p> <a href="/?shopName=cupones">Cupones</a> | <a href="/?shopName=Cuponation">Cuponation</a> </p>
    <p>You are now editing <span style="color:red; font-weight: bold;">Cupones</span>
        <span style="font-size:12px; ">

               <a style="color:black;" href="http://sandbox.ermst4r.nl/contentscraper/?updated=-1"> <?php echo (($updated == -1) ? '<B style="color:black;"> (all content) </B>' : '(all content)');?></a>  /
                <a  style="color:black;" href="http://sandbox.ermst4r.nl/contentscraper/?updated=0"> <?php echo (($updated == 0) ? '<B style="color:black;"> (unedited content) </B>' : '(unedited content)');?></a> /
                <a  style="color:black;" href="http://sandbox.ermst4r.nl/contentscraper/?updated=1">  <?php echo (($updated == 1) ? '<B style="color:black;"> (edited content) </B>' : '(edited content)');?> </a>

        </span> </p>
    <a href="http://localhost:3000/api/getdata/cupones/json/<?php echo $updated;?>" target="_blank">Export JSON</a> | <a href="http://localhost:3000/api/getdata/cupones/csv/<?php echo $updated;?>">Export CSV</a> |
    <a href="javascript:spiderWebsite();" title="dont do that to often"  style="color:red; font-weight: bold;">SCRAPE WEBSITE NOW!</a>
    <BR><BR>
    <div class="loading" style="font-weight: bold; color:green;"> </div>
</div>

<div class="wrapper">
    <div class="wrapper-row">



        <div id="example1" ></div>

                    <script>

                        function spiderWebsite()
                        {
                            $.ajax({
                                context: document.body,
                                type: 'GET',
                                url: 'http://localhost:3000/api/run_spider/'+shopName,

                                    success: function (data) {
                                        $(".loading").after("Job will be run! Please check back in 1 minute for the updated actions");
                                    }
                            });
                        }

                        var QueryString = function () {
                            // This function is anonymous, is executed immediately and
                            // the return value is assigned to QueryString!
                            var query_string = {};
                            var query = window.location.search.substring(1);
                            var vars = query.split("&");
                            for (var i=0;i<vars.length;i++) {
                                var pair = vars[i].split("=");
                                // If first entry with this name
                                if (typeof query_string[pair[0]] === "undefined") {
                                    query_string[pair[0]] = pair[1];
                                    // If second entry with this name
                                } else if (typeof query_string[pair[0]] === "string") {
                                    var arr = [ query_string[pair[0]], pair[1] ];
                                    query_string[pair[0]] = arr;
                                    // If third or later entry with this name
                                } else {
                                    query_string[pair[0]].push(pair[1]);
                                }
                            }
                            return query_string;
                        } ();



                        shopName = "cupones";
                        loaded = false;

                        $.ajax({
                            context: document.body,
                            type: 'GET',
                            url: 'http://localhost:3000/api/getcontent/cupones/'+QueryString.updated,
                            success: function (data) {
                                hot.loadData(data);
                            }
                        });





                        var

                                container = document.getElementById('example1'),
                                exampleConsole = document.getElementById('example1console'),
                                autosave = document.getElementById('autosave'),
                                load = document.getElementById('load'),
                                save = document.getElementById('save'),
                                autosaveNotification,
                                hot;

                        function negativeValueRenderer(instance, td, row, col, prop, value, cellProperties) {
                            Handsontable.renderers.TextRenderer.apply(this, arguments);
                            // if row contains negative number


                            if(col == 2) {
                                td.style.fontWeight = 'normal';
                                td.style.color = 'black';
                                td.style.background = '#f3c0c0';
                            }




                            if(col == 1  || col ==0) {
                                cellProperties.readOnly = true; // make cell read-only if it is first row or the text reads 'readOnly'
                            }





                            if (col == 2) {
                                // add class "negative"
                                ajax('http://localhost:3000/api/check_content/cupones', 'POST','content_hash='+value,  function (res) {
                                    if(res.responseText=="0") {
                                        td.style.fontWeight = 'normal';
                                        td.style.color = 'black';
                                        td.style.background = '#bfecc7';
                                    }
                                });


                            }





                        }




                        Handsontable.renderers.registerRenderer('negativeValueRenderer', negativeValueRenderer);

                        hot = new Handsontable(container, {
                            startRows: 1,
                            startCols: 1,
                            rowHeaders: true,
                            colHeaders: true,
                            minSpareRows: 0,
                            contextMenu: false,
                            colWidths: [200, 200, 800, 120],
                            colHeaders: ["Competitor", "Shopname", "Description","Expiredate"],
                            columnSorting: {
                                column: 1
                            },
                            afterOnCellMouseDown: function(){
                                loaded = true;
                                console.log("Handsontable initialized!");

                            },




                            cells: function (row, col, prop) {
                                var cellProperties = {};



                                cellProperties.renderer = "negativeValueRenderer"; // uses lookup map


                                return cellProperties;
                            },

                            afterChange: function (change, source) {
                                if (source === 'loadData') {

                                    return; //don't save this change
                                }


                                clearTimeout(autosaveNotification);
                                var oldValue = change[0][2];
                                var newValue = change[0][3];
                                var rowIndex = change[0][0];
                                var columnIndex = change[0][1];
                                if(columnIndex == "endDate") {
                                    ajax('http://localhost:3000/api/updatecode', 'POST', "newValue="+newValue+"&shopName=cupones&oldValue="+hot.getDataAtCell(rowIndex,2)+"&dateChange=1", function (res) {

                                    });
                                } else {
                                    ajax('http://localhost:3000/api/updatecode', 'POST', "newValue="+newValue+"&shopName=cupones&oldValue="+oldValue, function (res) {

                                    });
                                }



                            }
                        });



                        Handsontable.Dom.addEvent(save, 'click', function() {

                            // save all cell's data
                            ajax('json/save.json', 'GET', JSON.stringify({data: hot.getData()}), function (res) {
                                var response = JSON.parse(res.response);

                                if (response.result === 'ok') {
                                    exampleConsole.innerText = 'Data saved';
                                }
                                else {
                                    exampleConsole.innerText = 'Save error';
                                }
                            });
                        });

                        Handsontable.Dom.addEvent(autosave, 'click', function() {

                            if (autosave.checked) {
                                exampleConsole.innerText = 'Changes will be autosaved';
                            }
                            else {
                                exampleConsole.innerText ='Changes will not be autosaved';
                            }
                        });


                    </script>

                </div>


        </div>

    </div>
</div>

<div id="outside-links-wrapper"></div>