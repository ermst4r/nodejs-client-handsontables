function spiderWebsite(shopName) {
    var answer = confirm('Are you sure? Dont do this to often, because it will fetch ' + shopName.toUpperCase());
    if (answer) {
        $.ajax({
            context: document.body,
            type: 'GET',
            url: hostName + '/api/run_spider/' + shopName,
            success: function (data) {
                $(".loading").after("Job will be run! Please check back in 1 minute for the updated actions");
            }
        });
    }
}

$(document).ready(function () {
    var scriptPram = document.getElementById('offerfinder');
    hostName = scriptPram.getAttribute('data-apiurl');
    function confirmation(msg, url) {
        var answer = confirm(msg)
        if (answer) {
            window.location = url;
        }

    }

    var jqxhrFlipit = $.ajax({
        type: 'GET',
        url: hostName + '/api/getflipitdata/',
        context: document.body,
        global: false,
        async:false,
        success: function(data) {
            return data;
        }
    }).responseText;
    flipitshops = JSON.parse(jqxhrFlipit);


    var jqxhrNoFlipit = $.ajax({
        type: 'GET',
        url: hostName + '/api/noflipitdata/',
        context: document.body,
        global: false,
        async:false,
        success: function(data) {
            return data;
        }
    }).responseText;
    noflipitshops = JSON.parse(jqxhrNoFlipit);



    var QueryString = function () {
        // This function is anonymous, is executed immediately and
        // the return value is assigned to QueryString!
        var query_string = {};
        var query = window.location.search.substring(1);
        var vars = query.split("&");
        for (var i = 0; i < vars.length; i++) {
            var pair = vars[i].split("=");
            // If first entry with this name
            if (typeof query_string[pair[0]] === "undefined") {
                query_string[pair[0]] = pair[1];
                // If second entry with this name
            } else if (typeof query_string[pair[0]] === "string") {
                var arr = [query_string[pair[0]], pair[1]];
                query_string[pair[0]] = arr;
                // If third or later entry with this name
            } else {
                query_string[pair[0]].push(pair[1]);
            }
        }
        return query_string;
    }();
    if (typeof QueryString.updated === 'undefined') {
        updated = 0;
    } else {
        updated = QueryString.updated;
    }

    if (typeof QueryString.website === 'undefined') {
        shopName = "cupones";
    } else {
        shopName = QueryString.website;
    }
    if (typeof QueryString.deleted === 'undefined') {
        contextMenuString = "Delete this row";
        deleted = 0;
    } else {
        contextMenuString = "Redo this row";
        deleted = 1;
    }




    var jqxhr = $.ajax({
        type: 'GET',
        url: hostName + '/api/gethashcontent/' + shopName + '/' + updated + '/' + deleted,
        context: document.body,
        global: false,
        async:false,
        success: function(data) {
            return data;
        }
    }).responseText;
    jsonSearch = JSON.parse(jqxhr);

    $.ajax({
        context: document.body,
        type: 'GET',
        url: hostName + '/api/getcontent/' + shopName + '/' + updated + '/' + deleted,
        success: function (data) {
            $("#loading").hide();
            var jsonArr = [];
        for(var i =0; i<data.length; i++) {

            if(flipitshops.indexOf(String(data[i].shopName)) > -1 && noflipitshops.indexOf(String(data[i].shopName)) != -1) {
                jsonArr.push({
                    shopName:data[i].shopName,
                    website:data[i].website,
                    productName:data[i].productName,
                    endDate:data[i].endDate
                });
            }

        }


            hot.loadData(jsonArr);


        }
    });
    var
        container = document.getElementById('example1'),
        autosave = document.getElementById('autosave'),
        load = document.getElementById('load'),
        save = document.getElementById('save'),
        hot;





    var oldShopName ='';
    function negativeValueRenderer(instance, td, row, col, prop, value, cellProperties) {


        Handsontable.renderers.TextRenderer.apply(this, arguments);
        if (col == 2) {
            //td.style.fontWeight = 'normal';
            //td.style.color = 'black';
            //td.style.background = '#f3c0c0';
        }

        if (col == 1 || col == 0) {
            cellProperties.readOnly = true; // make cell read-only if it is first row or the text reads 'readOnly'
        }


        // make  the rowline flipit blue
        if(col == 0) {
            oldShopName = value;
        }
        if(col == 1 || col == 0 || col ==3 ) {

            if(oldShopName == 'flipit_es') {
                td.style.fontWeight = 'normal';
                td.style.color = 'black';
                td.style.background = '#86dbff';
            }
        }

        if (col == 2) {

            // add class "negative"
            var orginvalue = String(value);
            switch (shopName) {
                case 'cupones':
                    orginvalue.replace("      ","").replace("      ","").slice(0,-1).replace("  ","");
                break;
                case 'cuponation':
                    orginvalue.replace("-", "").replace("+", "").replace("\"", "");
                break;
                case 'cuponesmagicos':
                    orginvalue.trim().replace(/\r?\n|\r/g, " ");
                break;
                case 'cupon_es':
                    orginvalue.replace(/\r?\n|\r/g, " ").trim().replace("-","").replace("+","").replace("\"","");
                break;
            }
            if(oldShopName == 'flipit_es') {
                td.style.fontWeight = 'normal';
                td.style.color = 'black';
                td.style.background = '#86dbff';
                cellProperties.readOnly = true; // make cell read-only if it is first row or the text reads 'readOnly'
            } else {

                if(jsonSearch.indexOf(orginvalue) == -1) {
                    td.style.fontWeight = 'normal';
                    td.style.color = 'black';
                    td.style.background = '#bfecc7';

                } else {
                    td.style.fontWeight = 'normal';
                    td.style.color = 'black';
                    td.style.background = '#f3c0c0';

                }
            }


        }





    }


    Handsontable.renderers.registerRenderer('negativeValueRenderer', negativeValueRenderer);


    hot = new Handsontable(container, {
        startRows: 1,
        startCols: 1,
        rowHeaders: true,
        colHeaders: true,
        minSpareRows: 0,
        contextMenu: {
            callback: function (key, options) {
                ajax(hostName + '/api/delete_code', 'POST', "delete=" + deleted + "&oldValue=" + this.getDataAtCell(options.end.row, 2) + "&shopName=" + shopName, function (res) {

                });
                this.alter('remove_row', options.end.row);
            },
            items: {
                "about": {name: contextMenuString}
            }
        },

        colWidths: [200, 200, 800, 120],
        colHeaders: ["Competitor", "Shopname", "Description", "Expiredate"],
        columns: [
            {data: 'website'},
            {data: 'shopName'},
            {data: 'productName'},
            {data: 'endDate'}
        ],

        cells: function (row, col, prop) {
            var cellProperties = {};



            cellProperties.renderer = "negativeValueRenderer"; // uses lookup map
            return cellProperties;
        },

        beforeChange: function (change, source) {
            var oldValue = change[0][3];
            var columnIndex = change[0][1];
            if (columnIndex === 'productName') {
                if (oldValue.length < 15) {
                    alert("The content cannot be smaller then 15 characters");
                    change.splice(0, 3);
                }
                if (oldValue.length > 150) {
                    alert("The content cannot be larger then 150 characters");
                    change.splice(0, 3);
                }
            }

        },

        afterChange: function (change, source) {
            if (source === 'loadData') {
                return; //don't save this change
            }
            var oldValue = encodeURIComponent(change[0][2]);
            var newValue = encodeURIComponent(change[0][3]);
            var rowIndex = change[0][0];
            var columnIndex = change[0][1];
            if (oldValue != newValue) {
                if (columnIndex == "endDate") {
                    ajax(hostName + '/api/updatecode', 'POST', "newValue=" + newValue + "&shopName=" + shopName + "&oldValue=" + hot.getDataAtCell(rowIndex, 2) + "&dateChange=1", function (res) {
                    });
                } else {
                    if (newValue.length > 15 && newValue.length < 150) {
                        ajax(hostName + '/api/updatecode', 'POST', "newValue=" + newValue + "&shopName=" + shopName + "&oldValue=" + oldValue, function (res) {

                        });
                    }
                }
            }
        }
    });

});