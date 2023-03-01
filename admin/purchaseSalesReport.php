<?php
    session_start();

    // Get current page name
    $thisPage = basename($_SERVER['PHP_SELF']);

    // Check the session for this page

?>
<!DOCTYPE html>
<html>
<?php include("head.php"); ?>
<!-- Begin page -->
<div id="wrapper">
    <!-- Top Bar Start -->
    <?php include("topbar.php"); ?>
    <!-- Top Bar End -->
    <!-- ========== Left Sidebar Start ========== -->
    <?php include("sidebar.php"); ?>
    <!-- Left Sidebar End -->
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default bx-shadow-none">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion"
                                           href="#collapseOne" aria-expanded="false" aria-controls="collapseOne"
                                           class="collapse">
                                            <?php echo $translations['A00051'][$language]; /* Search */ ?>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel"
                                     aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <div id="searchMsg" class="text-center alert" style="display: none;"></div>
                                        <form id="searchForm" role="form">

                                            <div class="col-xs-12">
                                                <div class="row">
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00137'][$language]; /* Date */ ?>
                                                        </label>
                                                        <div class="input-group input-daterange">
                                                            <input type="text" class="form-control" dataName="date"
                                                                   dataType="dateRange">
                                                            <span class="input-group-addon">
                                                                <?php echo $translations['A00139'][$language]; /* to */ ?>
                                                            </span>
                                                            <input type="text" class="form-control" dataName="date"
                                                                   dataType="dateRange">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label" for="" data-th="username">
                                                            <?php echo $translations['A00102'][$language]; /* Username */ ?>
                                                        </label>
                                                        <span class="pull-right">
                                                            <input id="match" type="radio" name="usernameType" value="match" checked> 
                                                            <label for="match" style="margin-right: 15px;">Match</label>

                                                            <input id="like" type="radio" name="usernameType" value="like" style="margin-left: 15px;" > 
                                                            <label for="like">Like</label>
                                                        </span>
                                                        <input type="text" class="form-control" dataName="username"
                                                               dataType="text">
                                                    </div>

                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label" for="" data-th="">
                                                            <?php echo $translations['A01242'][$language]; /* Leader Username */ ?>
                                                        </label>
                                                        <input id="leaderUsername" class="form-control"
                                                               dataName="leaderUsername" dataType="text">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xs-12">
                                                <div class="row">
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label" for="" data-th="">
                                                            <?php echo $translations['A01349'][$language]; /*Main Leader Username*/ ?>
                                                        </label>
                                                        <input id="mainLeaderUsername" class="form-control"
                                                               dataName="mainLeaderUsername" dataType="text">
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00153'][$language]; /* Country */ ?>
                                                        </label>
                                                        <select id="countryName" class="form-control" dataName="countryName"
                                                                dataType="text">
                                                            <option value="">
                                                                <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="col-xs-12">
                                            <div id="searchBtn" class="btn btn-primary waves-effect waves-light">
                                                <?php echo $translations['A00051'][$language]; /* Search */ ?>
                                            </div>
                                            <div id="resetBtn" class="btn btn-default waves-effect waves-light">
                                                <?php echo $translations['A00053'][$language]; /* Reset */ ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <button id="exportBtn" type="" onclick="exportBtn()"
                                class="btn btn-primary waves-effect waves-light"
                                style="margin-bottom: 10px;display:none;">
                            <?php echo $translations['A01352'][$language]; /*Export to xlsx*/ ?>
                        </button>
                        <button type="" id="seeAllBtn" onclick="seeAllBtn()"
                                class="btn btn-primary waves-effect waves-light"
                                style="margin-bottom: 10px;display:none;">
                            <?php echo $translations['A01191'][$language]; /*See All*/ ?>
                        </button>
                        <form>
                            <div id="basicwizard" class="pull-in" style="display: none">
                                <div class="tab-content b-0 m-b-0 p-t-0">
                                    <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                    <div id="listingDiv" class="table-responsive"></div>
                                    <span id="paginateText"></span>
                                    <div class="text-center">
                                        <ul class="pagination pagination-md" id="listingPager"></ul>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php include("footer.php"); ?>
    </div>
</div>
<script>var resizefunc = [];</script>
<?php include("shareJs.php"); ?>
<script>

    var divId = 'listingDiv';
    var tableId = 'listingTable';
    var pagerId = 'listingPager';
    var btnArray = {};
    var thArray = Array();
    var exportArray;
    var exportSubArray;

    var url = 'scripts/reqReport.php';
    var method = 'POST';
    var debug = 0;
    var bypassBlocking = 0;
    var bypassLoading = 0;
    var pageNumber = 1;

    $(document).ready(function () {

        $("body").keyup(function (event) {
            if (event.keyCode == 13) {
                $("#searchBtn").click();
            }
        });

        // var formData  = {
        //     command: 'getSalesPurchaseReport',
        //     pageNumber: pageNumber
        // };
        // var fCallback = loadDefaultListing;
        // ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $('#resetBtn').click(function () {
            $("#searchForm")[0].reset();
        });

        $('#searchBtn').click(function () {
            pagingCallBack(pageNumber, loadSearch);
        });

        // Initialize date picker
        $('.input-daterange input').each(function () {
            $(this).daterangepicker({
                singleDatePicker: true,
                timePicker: false,
                locale: {
                    format: 'DD/MM/YYYY'
                }
            });
            $(this).val('');
        });

        // $('#seeAllBtn').click(function() {

        //     var searchID = 'searchForm';
        //     var searchData = buildSearchDataByType(searchID);
        //     formData  = {
        //         command : 'getSalesPurchaseReport',
        //         inputData   : searchData,
        //         pageNumber   : 1,
        //         seeAll   : 1
        //     };
        //     // console.log(formData);
        //     fCallback = loadDefaultListing;
        //     ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        // });
    });

    function seeAllBtn() {
        var searchID = 'searchForm';
        var searchData = buildSearchDataByType(searchID);
        formData = {
            command: 'getSalesPurchaseReport',
            inputData: searchData,
            pageNumber: 1,
            seeAll: 1
        };

        // console.log(formData);
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function pagingCallBack(pageNumber, fCallback) {
        if (pageNumber > 1) bypassLoading = 1;

        var searchID = 'searchForm';
        var searchData = buildSearchDataByType(searchID);
        var formData = {
            command: "getSalesPurchaseReport",
            pageNumber: pageNumber,
            inputData: searchData
        };
        if (!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }


    function exportBtn() {
        var searchID = 'searchForm';
        var searchData = buildSearchDataByType(searchID);
        var thArray = [exportArray, exportSubArray];

        var key = {};

        var exportParams = {
            searchData  : searchData,
            pageNumber  : pageNumber,
            seeAll      : 1,
            usernameSearchType  : $("input[name=usernameType]:checked").val()
        };

        var formData = {
            command     : "addExcelReq",
            API         : "getSalesPurchaseReport",
            fileName    : "SalesPurchaseReport",
            searchData  : searchData,
            params      : exportParams,
            headerAry   : thArray,
            keyAry      : key,
            titleKey    : "report",
            type        : 'export',
            returnType  : 'excel',
            usernameSearchType : $("input[name=usernameType]:checked").val()
        };

        // console.log(thArray);

        fCallback = exportExcel;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadDefaultListing(data, message) {
        var tableNo;
        $('#basicwizard').show();
        $('#exportBtn').show();
        $('#seeAllBtn').show();

        var list = data['report'];

        // loadCountryDropdown(data.countryList);
        
        thArray = ['Date', 'Total Amount'];

        exportSubArray = ['Date', 'Total Amount'];

        exportArray = [];

        var extraHeader = thArray.length;

        for(var i = 0; i < extraHeader; i++) {
            exportArray.push("");
        }
        var subHeaderLen = data['creditArray'].length;

        $.each(data['productArray'], function(k,v){
            thArray.push(v['display']);
            exportArray.push(v['display']);

            for(var i = 1; i<subHeaderLen; i++) {
                exportArray.push("");
            }
        });

        if(list) {
            var newList = [];

            $.each(list, function(k,v){
                var rebuildData = {
                    date: k,
                    totalAmount: addCormer(v['totalAmount'])
                };

                $.each(data['productArray'], function(k1,v1){
                    $.each(data['creditArray'], function(k2,v2){

                        var rebuildKey = v2['name']+v1['id'];

                        // rebuildData[rebuildKey] = addCormer(v[v1['id']][v2['name']]);
                        rebuildData[rebuildKey] = addCormer(v[v1['name']][v2['name']]);
                    });
                });

                newList.push(rebuildData);
            });

            // console.log(newList);
        }

        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        $("#"+tableId).find('thead tr th').each(function(i){
            if(i<=extraHeader-1) {
                $(this).attr('rowspan', '2');
            }else{
                $(this).attr('colspan', subHeaderLen);
                $(this).css('text-align', 'center');
            }
        });

        var subHeader = "";

        $.each(data['productArray'], function(k,v){

            if(k%2==0) {
                $("#"+tableId).find('thead tr th').eq(k+extraHeader).addClass("greyBg");
            }

            $.each(data['creditArray'], function(k1,v1){

                var bg = "";

                if(k%2==0) {
                    bg = "greyBg";

                    var tdInd = (subHeaderLen*k)+extraHeader+k1;
                    $("#"+tableId+" tbody tr td:nth-child("+(tdInd+1)+")").addClass(bg);
                }


                subHeader += `<th class="${bg}">${v1['display']}</th>`;
                exportSubArray.push(v1['display']);
            });
        });

        $("#"+tableId+" thead").append(`<tr>${subHeader}</tr>`);

        var totalRow = "";
        var totalArray = data.totalArray;
        $.each(data['productArray'], function (k, v){
            $.each(data['creditArray'], function(k2, v2){
                var productId = v['name'];
                var dataKey = v2.name+"Total";

                var bgClass = "";
                if(k%2==0){
                    bgClass="greyBg";
                }
                
                totalRow+=`<td class="${bgClass}"><b>${addCormer(totalArray[productId][dataKey])}</b></td>`;
            });


            // totalRow+=`<td class="${bgClass}">${addCormer(totalArray[productId]['totalAmount'])}</td>`;
            // totalRow+=`<td class="${bgClass}">${addCormer(totalArray[productId]['totalQuantity'])}</td>`;
            // totalRow+=`<td class="${bgClass}">${addCormer(totalArray[productId]['bonusValue'])}</td>`;
        });
        $("#"+tableId).find('tbody').append(`<tr><td><b>Total</b></td><td><b>${addCormer(totalArray['grandTotal'])}</b></td>${totalRow}</tr>`);

        $("#"+tableId).find('tbody tr td:not(:first-child)').each(function(){
            $(this).css('text-align', 'right');
        });

    }

    function loadCountryDropdown(data) {
        if (data) {
            $.each(data, function (key, val) {
                var countryID = val['id'];
                var country = val['name'];
                $('#countryName').append('<option value="' + countryID + '">' + country + '</option>');
            });
        }
    }

    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span>' + '<?php echo $translations['A00114'][$language]; /* Search successful. */?>' + '</span>').show();
        setTimeout(function () {
            $('#searchMsg').removeClass('alert-success').html('').hide();
        }, 3000);
    }
</script>
</body>
</html>