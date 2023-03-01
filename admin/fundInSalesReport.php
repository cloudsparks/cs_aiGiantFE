<?php
    session_start();

    // Get current page name
    $thisPage = basename($_SERVER['PHP_SELF']);

    // Check the session for this page
    // if(!isset ($_SESSION['access'][$thisPage]))
    //     echo '<script>window.location.href="accessDenied.php";</script>';
    // $_SESSION['lastVisited'] = $thisPage;
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

                                            <div class="col-sm-12 px-0">
                                                <div class="col-sm-3 form-group">
                                                    <label class="control-label">
                                                        <?php echo $translations['A00137'][$language]; /* Date */ ?>
                                                    </label>
                                                    <div class="input-group input-daterange">
                                                        <input type="text" class="form-control" dataName="dateRange"
                                                               dataType="dateRange">
                                                        <span class="input-group-addon">
                                                            <?php echo $translations['A00139'][$language]; /* to */ ?>
                                                        </span>
                                                        <input type="text" class="form-control" dataName="dateRange"
                                                               dataType="dateRange">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 form-group">
                                                    <label class="control-label">
                                                        <?php echo $translations['A00102'][$language]; /* Username */ ?>
                                                    </label>
                                                    <input type="text" class="form-control" dataName="username"
                                                           dataType="text">
                                                </div>

                                                <div class="col-sm-3 form-group">
                                                    <label class="control-label" for="" data-th="">
                                                        <?php echo $translations['A01109'][$language]; /* Leader Username */ ?>
                                                    </label>
                                                    <input id="leaderUsername" class="form-control"
                                                           dataName="leaderUsername" dataType="text">
                                                </div>
                                                <div class="col-sm-3 form-group">
                                                    <label class="control-label" for="" data-th="">
                                                        <?php echo $translations['A01349'][$language]; /*Main Leader Username*/ ?>
                                                    </label>
                                                    <input id="mainLeaderUsername" class="form-control"
                                                           dataName="mainLeaderUsername" dataType="text">
                                                </div>
                                            </div>


                                            <!--        <div class="col-sm-3 form-group">
                                                    <label class="control-label" for="" data-th="">
                                                        <?php echo $translations['A00828'][$language]; /* Product */ ?>
                                                    </label>
                                                    <select id="productNameList" class="form-control" dataName="product" dataType="select">
                                                    </select>
                                                </div> -->
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
                        <!-- <div class="card-box p-b-0"> -->
                        <button id="exportBtn" type="button" onclick="exportBtn()"
                                class="btn btn-primary waves-effect waves-light"
                                style="margin-bottom: 10px;display: none"><?php echo $translations['A01352'][$language]; /*Export to xlsx*/ ?></button>
                        <button id="seeAllBtn" type="button" onclick="seeAllBtn()"
                                class="btn btn-primary waves-effect waves-light"
                                style="margin-bottom: 10px;display: none"><?php echo $translations['A01191'][$language]; /*See All*/ ?></button>
                        <form>
                            <div id="basicwizard" class="pull-in" style="display: none">
                                <div class="tab-content b-0 m-b-0 p-t-0">
                                    <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                    <div id="salesReportListDiv" class="table-responsive"></div>
                                    <span id="paginateText"></span>
                                    <div class="text-center">
                                        <ul class="pagination pagination-md" id="pagerSalesReportList"></ul>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--     </div> -->
                    </div>
                </div><!-- End row -->
            </div><!-- container -->
        </div><!-- content -->
        <?php include("footer.php"); ?>
    </div>
    <!-- End content-page -->
    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->
</div><!-- END wrapper -->
<!-- jQuery  -->
<script>var resizefunc = [];</script>
<?php include("shareJs.php"); ?>
<script>
    // Initialize all the id in this page
    var divId = 'salesReportListDiv';
    var tableId = 'salesReportListTable';
    var pagerId = 'pagerSalesReportList';
    var btnArray = Array("view");
    var thArray = Array();

    // Initialize the arguments for ajaxSend function
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
        //     command: 'getFundInSalesReport',
        //     // pageNumber: pageNumber
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
        //         command : 'getFundInSalesReport',
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
            command: 'getFundInSalesReport',
            inputData: searchData,
            pageNumber: 1,
            seeAll: 1
        };

        // console.log(formData);
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function exportBtn() {

        var searchID = 'searchForm';
        var searchData = buildSearchDataByType(searchID);

        var thArray = Array(
            "Date",
            "Total Fund In Transaction",
            "Total Fund In Value",
            "Qty of coin fund in",
            "Total value in USD",
            "Qty of coin fund in",
            "Total value in USD",
            "Qty of coin fund in",
            "Total value in USD",
        );

        thArray = Array(Array('','','','BTC','','ETH','','USDT',''),thArray);

        var key = {};

        var exportParams = {
            inputData  : searchData,
            pageNumber  : pageNumber,
            seeAll      : 1,
            usernameSearchType  : $("input[name=usernameType]:checked").val()
        };

        var formData = {
            command     : "addExcelReq",
            API         : "getFundInSalesReport",
            fileName    : "fundInSalesReport",
            inputData   : searchData,
            params      : exportParams,
            headerAry   : thArray,
            keyAry      : key,
            titleKey    : "report",
            type        : 'export',
            returnType  : 'excel',
            usernameSearchType : $("input[name=usernameType]:checked").val()
        };

        fCallback = exportExcel;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function pagingCallBack(pageNumber, fCallback) {
        if (pageNumber > 1) bypassLoading = 1;

        var searchID = 'searchForm';
        var searchData = buildSearchDataByType(searchID);
        var formData = {
            command: "getFundInSalesReport",
            pageNumber: pageNumber,
            inputData: searchData
        };
        if (!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadDefaultListing(data, message) {
        console.log(data);
        $('#basicwizard').show();
        if (data) {
            $('#exportBtn').show();
            $('#seeAllBtn').show();
        }
        // if(data.productNameList) {
        //     $('#productNameList').empty();
        //     $('#productNameList').append('<option value="">'+'<?php echo $translations['A00829'][$language]; /* All */?>'+'</option>');
        //     $.each(data.productNameList, function(key, val) {
        //         $('#productNameList').append('<option value="'+val+'">'+val+'</option>');
        //     });
        // }

        var thArray = ["<?php echo $translations['A00137'][$language]; /* Date */?>", "Total Fund In Transaction", "Total Fund In Value", "Qty of coin fund in", "Total value in USD", "Qty of coin fund in", "Total value in USD", "Qty of coin fund in", "Total value in USD"];
        // for (i = 0; i < data.secondTableHeader; i++) {
        //     thArray.push("<?php echo $translations['A00627'][$language]; /* Quantity */?>", "<?php echo $translations['A00206'][$language]; /* Bonus Value */?>", "<?php echo $translations['A00833'][$language]; /* Amount */?>");
        // }
        //  for (i = 0; i < data.secondTableHeader; i++) {
        //     thArray.push("<?php echo $translations['A00627'][$language]; /* Quantity */?>", "<?php echo $translations['A00833'][$language]; /* Amount */?>");
        // }

        var tableNo;
        if (data.report) {
            var newList = [];

            var value1 = 0;
            var value2 = 0;
            var value3 = 0;
            var value4 = 0;
            var value5 = 0;
            var value6 = 0;
            var value7 = 0;
            var value8 = 0;
            var value9 = 0;
            var value10 = 0;
            var value11 = 0;
            var value12 = 0;
            var value13 = 0;
            var value14 = 0;

            $.each(data.report, function (k, v) {
                var btc, eth, xrp, eos, RMBcredit, tether;
                var bitcoinAmount, ethAmount, xrpAmount, eosAmount, RMBcreditAmount, tetherAmount;

                $.each(v, function (k2, v2) {
                    // console.log(k2);
                    if (k2 == 'bitcoin') {
                        btc = addCormer(v2);
                        value3 += v2;
                        // console.log('bitcoin');
                    } else if (k2 == 'bitcoinAmount') {
                        bitcoinAmount = addCormer(decimalWithoutRoundSpecial(v2));
                        value4 += v2;
                        // console.log('bitcoin');
                    } else if (k2 == 'ethereum') {
                        // console.log('ethereum');
                        eth = addCormer(decimalWithoutRoundSpecial(v2));
                        value5 += v2;
                    } else if (k2 == 'ethereumAmount') {
                        // console.log('ethereum');
                        ethAmount = addCormer(decimalWithoutRoundSpecial(v2));
                        value6 += v2;
                    }
                    // else if(k2 == 'ripple') {
                    //     // console.log('ripple');
                    //     xrp = addCormer(decimalWithoutRoundSpecial(v2));
                    //     value7+=v2;
                    // }else if(k2 == 'rippleAmount') {
                    //     // console.log('ripple');
                    //     xrpAmount = addCormer(decimalWithoutRoundSpecial(v2));
                    //     value8+=v2;
                    // }else if(k2 == 'eos') {
                    //     // console.log('eos');
                    //     eos = addCormer(decimalWithoutRoundSpecial(v2));
                    //     value9+=v2;
                    // }else if(k2 == 'eosAmount') {
                    //     // console.log('eos');
                    //     eosAmount = addCormer(decimalWithoutRoundSpecial(v2));
                    //     value10+=v2;
                    // }else if(k2 == 'RMBcredit') {
                    //     // console.log('eos');
                    //     RMBcredit = addCormer(decimalWithoutRoundSpecial(v2));
                    //     value11+=v2;
                    // }
                    // else if(k2 == 'RMBcreditAmount') {
                    //     // console.log('eos');
                    //     RMBcreditAmount = addCormer(decimalWithoutRoundSpecial(v2));
                    //     value12+=v2;
                    // }
                    else if (k2 == 'tether') {
                        // console.log('eos');
                        tether = addCormer(decimalWithoutRoundSpecial(v2));
                        value13 += v2;
                    } else if (k2 == 'tetherAmount') {
                        // console.log('eos');
                        tetherAmount = addCormer(decimalWithoutRoundSpecial(v2));
                        value14 += v2;
                    }

                });

                var rebuildData = {
                    date: k,
                    count: v['count'].toFixed(2),
                    total: addCormer(decimalWithoutRoundSpecial(v['totalFundInValue'])),
                    btc: (btc || '0.00'),
                    bitcoinAmount: (bitcoinAmount || '0.00'),
                    eth: (eth || '0.00'),
                    ethAmount: (ethAmount || '0.00'),
                    // xrp : (xrp || '0.00'),
                    // xrpAmount : (xrpAmount || '0.00'),
                    // eos : (eos || '0.00'),
                    // eosAmount : (eosAmount || '0.00'),
                    // RMBcredit : (RMBcredit || '0.00'),
                    // RMBcreditAmount : (RMBcreditAmount || '0.00'),
                    tether: (tether || '0.00'),
                    tetherAmount: (tetherAmount || '0.00')
                };
                newList.push(rebuildData);

                value1 += v['count'];
                value2 += v['totalFundInValue'];

            });
        }
        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        $('#' + tableId).find('tbody tr').each(function () {
            $(this).find('td:eq(0)').css('min-width', "100px");
            $(this).find('td:eq(1)').css('min-width', "100px");
            $(this).find('td:eq(2)').css('min-width', "100px");
            $(this).find('td:eq(3)').css('min-width', "100px");
            $(this).find('td:eq(4)').css('min-width', "100px");
            $(this).find('td:eq(5)').css('min-width', "100px");
            $(this).find('td:eq(6)').css('min-width', "100px");
            $(this).find('td:eq(7)').css('min-width', "100px");
            $(this).find('td:eq(8)').css('min-width', "100px");
            $(this).find('td:eq(9)').css('min-width', "100px");
            $(this).find('td:eq(10)').css('min-width', "100px");
            $(this).find('td:eq(11)').css('min-width', "100px");
            $(this).find('td:eq(12)').css('min-width', "100px");
            $(this).find('td:eq(13)').css('min-width', "100px");
            $(this).find('td:eq(14)').css('min-width', "100px");


            $(this).find('td:eq(1)').css('text-align', "right");
            $(this).find('td:eq(2)').css('text-align', "right");
            $(this).find('td:eq(3)').css('text-align', "right");
            $(this).find('td:eq(4)').css('text-align', "right");
            $(this).find('td:eq(5)').css('text-align', "right");
            $(this).find('td:eq(6)').css('text-align', "right");
            $(this).find('td:eq(7)').css('text-align', "right");
            $(this).find('td:eq(8)').css('text-align', "right");
            $(this).find('td:eq(9)').css('text-align', "right");
            $(this).find('td:eq(10)').css('text-align', "right");
            $(this).find('td:eq(11)').css('text-align', "right");
            $(this).find('td:eq(12)').css('text-align', "right");
            $(this).find('td:eq(13)').css('text-align', "right");
            $(this).find('td:eq(14)').css('text-align', "right");
            $(this).find('td:last-child').css('text-align', 'center');

            /*value1 += parseFloat($(this).find('td:eq(1)').text());
            value2 += parseFloat($(this).find('td:eq(2)').text());
            value3 += parseFloat($(this).find('td:eq(3)').text());
            value4 += parseFloat($(this).find('td:eq(4)').text());
            value5 += parseFloat($(this).find('td:eq(5)').text());
            value6 += parseFloat($(this).find('td:eq(6)').text());
            value7 += parseFloat($(this).find('td:eq(7)').text());
            value8 += parseFloat($(this).find('td:eq(8)').text());
            value9 += parseFloat($(this).find('td:eq(9)').text());
            value10 += parseFloat($(this).find('td:eq(10)').text());*/
        });


        if (value1) {
            // $('#'+tableId+' tr:last').after('<tr class="lastTr"><th colspan="1" class="text-right">Total :</th><th style="text-align: right">'+(addCormer(decimalWithoutRoundSpecial(value1)))+'</th><th style="text-align: right">'+(addCormer(decimalWithoutRoundSpecial(value2)))+'</th><th style="text-align: right">'+addCormer(value3)+'</th><th style="text-align: right">'+(addCormer(decimalWithoutRoundSpecial(value4)))+'</th><th style="text-align: right">'+addCormer(value5)+'</th><th style="text-align: right">'+addCormer(decimalWithoutRoundSpecial(value6))+'</th><th style="text-align: right">'+addCormer(value7)+'</th><th style="text-align: right">'+addCormer(decimalWithoutRoundSpecial(value8))+'</th><th style="text-align: right">'+addCormer(value9)+'</th><th style="text-align: right">'+addCormer(decimalWithoutRoundSpecial(value10))+'</th><th style="text-align: right">'+addCormer(decimalWithoutRoundSpecial(value11))+'</th><th style="text-align: right">'+addCormer(decimalWithoutRoundSpecial(value12))+'</th><th style="text-align: right">'+addCormer(decimalWithoutRoundSpecial(value13))+'</th><th style="text-align: right">'+addCormer(decimalWithoutRoundSpecial(value14))+'</th><th></th></tr>');
            $('#' + tableId + ' tr:last').after('<tr class="lastTr"><th colspan="1" class="text-right">Total :</th><th style="text-align: right">' + (addCormer(dcFourNoRound(value1, 3, 1))) + '</th><th style="text-align: right">' + (addCormer(dcFourNoRound(value2, 3, 1))) + '</th><th style="text-align: right">' + (addCormer(dcFourNoRound(value3, 3, 1))) + '</th><th style="text-align: right">' + (addCormer(dcFourNoRound(value4, 3, 1))) + '</th><th style="text-align: right">' + (addCormer(dcFourNoRound(value5, 3, 1))) + '</th><th style="text-align: right">' + addCormer(dcFourNoRound(value6, 3, 1))
                // +'</th><th style="text-align: right">'+addCormer(dcFourNoRound(value7, 3, 1))+'</th><th style="text-align: right">'+addCormer(dcFourNoRound(value8, 3, 1))+'</th><th style="text-align: right">'+addCormer(value9)+'</th><th style="text-align: right">'+addCormer(dcFourNoRound(value10, 3, 1))+'</th><th style="text-align: right">'+addCormer(dcFourNoRound(value11, 3, 1))+'</th><th style="text-align: right">'+addCormer(dcFourNoRound(value12, 3, 1))
                + '</th><th style="text-align: right">' + addCormer(dcFourNoRound(value13, 3, 1)) + '</th><th style="text-align: right">' + addCormer(dcFourNoRound(value14, 3, 1)) + '</th><th></th></tr>');
        }


        var content = "";
        // content += `<tr>
        //                 <th colspan="3"></th>
        //                 <th colspan="2" style="text-align: center">BTC</th>
        //                 <th colspan="2" style="text-align: center">ETH</th>
        //                 <th colspan="2" style="text-align: center">XRP (ripple)</th>
        //                 <th colspan="2" style="text-align: center">EOS</th>
        //                 <th colspan="2" style="text-align: center">RMB</th>
        //                 <th colspan="2" style="text-align: center">USDT</th>
        //                 <th></th>
        //             </tr>`;

        content += `<tr>
                                <th colspan="3"></th>
                                <th colspan="2" style="text-align: center">BTC</th>
                                <th colspan="2" style="text-align: center">ETH</th>
                                <th colspan="2" style="text-align: center">USDT</th>
                                <th></th>
                            </tr>`;

        $('#salesReportListTable thead tr:first').before(content);

        // $('#salesReportListTable thead tr:first').before('<tr>'+data.firstTableHeader+'</tr>');

        // $('#'+tableId).tableExport({
        //     headers: true, // (Boolean), display table headers (th or td elements) in the <thead>, (default: true)
        //     footers: false, // (Boolean), display table footers (th or td elements) in the <tfoot>, (default: false)
        //     formats: ['xlsx'], // (String[]), filetype(s) for the export, (default: ['xlsx', 'csv', 'txt'])
        //     filename: 'Fund_In_Sales_report', // (id, String), filename for the downloaded file, (default: 'id')
        //     bootstrap: true, // (Boolean), style buttons using bootstrap, (default: true)
        //     exportButtons: true, // (Boolean), automatically generate the built-in export buttons for each of the specified formats (default: true)
        //     position: 'bottom', // (top, bottom), position of the caption element relative to table, (default: 'bottom')
        //     ignoreRows: null, // (Number, Number[]), row indices to exclude from the exported file(s) (default: null)
        //     ignoreCols: null, // (Number, Number[]), column indices to exclude from the exported file(s) (default: null)
        //     trimWhitespace: false // (Boolean), remove all leading/trailing newlines, spaces, and tabs from cell text in the exported file(s) (default: false)
        // });

        // $('button.xlsx').removeClass("btn-default").addClass("btn-primary waves-effect waves-light");
        // $('table#'+tableId).find("caption").append('<button type="button" onclick="seeAllBtn()" class="btn btn-primary waves-effect waves-light" style="margin-bottom: 10px;">See All</button>');
    }

    // $('#exportBtn').click(function() {
    //     var searchID = 'searchForm';
    //     var searchData = buildSearchDataByType(searchID);
    //     var thArray = Array(
    //        'Date',
    //        'Total Fund In Transaction',
    //        'Total Fund In Value',
    //        'BTC Qty of coin fund in',
    //        'BTC Total value in USD',
    //        'ETH Qty of coin fund in',
    //        'ETH Total value in USD',
    //        'XRP (ripple) Qty of coin fund in',
    //        'XRP (ripple) Total value in USD',
    //        'EOS Qty of coin fund in',
    //        'EOS Total value in USD'
    //         );
    //     var key  = Array (
    //        'Date',
    //        'Total Fund In Transaction',
    //        'Total Fund In Value',
    //        'BTC Qty of coin fund in',
    //        'BTC Total value in USD',
    //        'ETH Qty of coin fund in',
    //        'ETH Total value in USD',
    //        'XRP (ripple) Qty of coin fund in',
    //        'XRP (ripple) Total value in USD',
    //        'EOS Qty of coin fund in',
    //        'EOS Total value in USD'
    //     );
    //     var formData  = {
    //         command    : "getFundInSalesReport",
    //         filename   : "fundInSalesReport",
    //         inputData  : searchData,
    //         header     : thArray,
    //         key        : key,
    //         DataKey    : "salesReport"
    //     };
    //      $.redirect('exportExcel2.php', formData);
    // });

    function tableBtnClick(btnId) {
        var btnName = $('#' + btnId).attr('id').replace(/\d+/g, '');
        var tableRow = $('#' + btnId).parent('td').parent('tr');
        var tableId = $('#' + btnId).closest('table');

        if (btnName == 'view') {
            var viewDate = tableRow.attr('data-th');
            $.redirect("fundInSalesReportListing.php", {viewDate: viewDate});
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