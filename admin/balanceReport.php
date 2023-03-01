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

                                            <div class="col-xs-12">
                                                <div class="row">
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00102'][$language]; /* Username */ ?>
                                                        </label>
                                                        <span class="pull-right">
                                                             <input id="match" type="radio" name="usernameType"
                                                                    value="match" checked>
                                                            <label for="match"
                                                                   style="margin-right: 15px;"><?php echo $translations['A01347'][$language]; /* Match */ ?></label>

                                                            <input id="like" type="radio" name="usernameType" value="like"
                                                                   style="margin-left: 15px;">
                                                            <label for="like"><?php echo $translations['A01348'][$language]; /* Like */ ?></label>
                                                        </span>
                                                        <input type="text" class="form-control" dataName="username"
                                                               dataType="text">
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00117'][$language]; /* Full Name */ ?>
                                                        </label>
                                                        <input type="text" class="form-control" dataName="name"
                                                               dataType="text">
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00148'][$language]; /* Member ID */ ?>
                                                        </label>
                                                        <input type="text" class="form-control" dataName="memberID"
                                                               dataType="text">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xs-12">
                                                <div class="row">
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label" for="" data-th="">
                                                            <?php echo $translations['A01109'][$language]; /* Leader Username */ ?>
                                                        </label>
                                                        <input id="leaderUsername" class="form-control"
                                                               dataName="leaderUsername" dataType="text">
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label" for="" data-th="">
                                                            <?php echo $translations['A01349'][$language]; /* Main Leader Username */ ?>
                                                        </label>
                                                        <input id="mainLeaderUsername" class="form-control"
                                                               dataName="mainLeaderUsername" dataType="text">
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label" for="" data-th="">
                                                            <?php echo $translations['A00137'][$language]; /* Date */ ?>
                                                        </label>
                                                        <input id="transactionDateRange" class="form-control"
                                                               dataName="transactionDateRange" dataType="singleDate">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                        <div class="col-xs-12 m-t-rem1">
                                            <button id="searchBtn" type="submit"
                                                    class="btn btn-primary waves-effect waves-light">
                                                <?php echo $translations['A00051'][$language]; /* Search */ ?>
                                            </button>
                                            <button id="resetBtn" type="submit"
                                                    class="btn btn-default waves-effect waves-light">
                                                <?php echo $translations['A00053'][$language]; /* Reset */ ?>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div id="grandTotal" class="card-box"
                             style="background:#f5f5f5; padding: 20px 25px; display: none">
                            <div class="row">

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <!-- <div class="card-box p-b-0"> -->
                        <div id="basicwizard" class="pull-in" style="display: none;">
                            <div class="tab-content b-0 m-b-0 p-t-0">
                                <button type="button" onclick="exportBtn()"
                                        class="btn btn-primary waves-effect waves-light m-b-rem1"><?php echo $translations['A01352'][$language]; /*Export to xlsx*/ ?></button>
                                <button type="button" onclick="seeAllBtn()"
                                        class="btn btn-primary waves-effect waves-light m-b-rem1">
                                    <?php echo $translations['A01191'][$language]; /*See All*/ ?>
                                </button>
                                <form>
                                    <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                    <div id="listingDiv" class="table-responsive"></div>
                                    <span id="paginateText"></span>
                                    <div class="text-center">
                                        <ul class="pagination pagination-md" id="listingPager"></ul>
                                    </div>

                                </form>
                            </div>
                        </div>
                        <!--  </div> -->
                    </div>
                </div><!-- End row -->

            </div> <!-- container -->

        </div> <!-- content -->
        <input type="hidden" id="detectSeeAll" value="0">
        <?php include("footer.php"); ?>

    </div>

</div>

<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->
<?php include("shareJs.php"); ?>

<script>
    // Initialize all the id in this page
    var divId = 'listingDiv';
    var tableId = 'listingTable';
    var pagerId = 'listingPager';
    var btnArray = {};
    var thArray = {};
    var searchId = 'searchForm';

    // Initialize the arguments for ajaxSend function
    var url = 'scripts/reqAgent.php';
    var method = 'POST';
    var debug = 0;
    var bypassBlocking = 0;
    var bypassLoading = 0;
    var pageNumber = 1;
    var formData = "";
    var fCallback = "";

    $(document).ready(function () {

        $("body").keyup(function (event) {
            if (event.keyCode == 13) {
                $("#searchBtn").click();
            }
        });

        // fCallback = loadDefaultListing;
        // formData  = {command: 'getBalanceReport', pageNumber: pageNumber};
        // // console.log(formData);
        // ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        //reset to default search
        $('#resetBtn').click(function () {
            $('#alertMsg').removeClass('alert-success').html('').hide();
            $('#searchForm').find('input:not([type=radio])').each(function () {
                $(this).val('');
            });
            $('#searchForm').find('select').each(function () {
                $(this).val('');
                $("#searchForm")[0].reset();
            });

        });

        $('#searchBtn').click(function () {
            pagingCallBack(pageNumber, loadSearch);
        });

        $('#datepicker input').each(function () {
            $(this).datepicker('clearDates');
        });

        // $("#exportBtn").click(function(){
        //     var searchID = 'searchForm';
        //     var searchData = buildSearchDataByType(searchID);
        //     var thArray = Array(
        //         "Username",
        //         // "Leader Username",
        //         "Bitcoin",
        //         "Ethereum",
        //         "Ripple",
        //         "Cardano",
        //         "EOS",
        //         "Tether",
        //         "IBG Credit",
        //         "Withholding Bonus"
        //         );
        //     var key  = Array (
        //        'username',
        //        // 'mainLeaderUsername',
        //        'bitcoin',
        //        'ethereum',
        //        'ripple',
        //        'cardano',
        //        'eos',
        //        'tether',
        //        'ibgCredit',
        //        'witholdingBonus'
        //     );
        //     var formData  = {
        //         command    : "getBalanceReport",
        //         filename   : "BalanceReport",
        //         inputData  : searchData,
        //         header     : thArray,
        //         key        : key,
        //         DataKey    : "balanceReport"
        //     };
        //      $.redirect('exportExcel2.php', formData);

        // })

    });

    function exportBtn() {

        var searchID = 'searchForm';
        var searchData = buildSearchDataByType(searchID);
        var thArray = Array();
        var key = Array();
        var formData = {
            command: "getBalanceReport",
            filename: "BalanceReport",
            searchData: searchData,
            header: thArray,
            key: key,
            DataKey: "balanceReport",
            type: 'export',
            usernameSearchType : $("input[name=usernameType]:checked").val()
        };
        fCallback = exportExcel;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function seeAllBtn() {
        var searchID = 'searchForm';
        var searchData = buildSearchDataByType(searchID);
        formData = {
            command: 'getBalanceReport',
            searchData: searchData,
            pageNumber: 1,
            seeAll: 1
        };

        // console.log(formData);
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    $('#transactionDateRange').datepicker({
        // language: language,
        format: 'dd/mm/yyyy',
        orientation: 'auto',
        autoclose: true
    });

    $('#dateRangeStart').datepicker({
        // language: language,
        format: 'dd/mm/yyyy',
        orientation: 'auto',
        autoclose: true
    });

    $('#dateRangeEnd').datepicker({
        // language: language,
        format: 'dd/mm/yyyy',
        orientation: 'auto',
        autoclose: true
    });

    // $('#searchForm').keypress(function(e){
    //        if(e.which == 13){//Enter key pressed
    //            $('#searchBtn').click();//Trigger enter button click event
    //        }
    //    });

    function pagingCallBack(pageNumber, fCallback) {
        if (pageNumber > 1) bypassLoading = 1;

        $("#seeAllBtn").show();

        var searchData = buildSearchDataByType(searchId);
        var formData = {
            command: "getBalanceReport",
            pageNumber: pageNumber,
            searchData: searchData,
            usernameSearchType: $("input[name=usernameType]:checked").val()
        };

        if (!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadDefaultListing(data, message) {
        $('#grandTotal').show();
        $('#basicwizard').show();
        var tableNo;
        var grandTotalList = data.allCreditTotalBalance;
        var balanceReport = data.balanceReport;
        var creditTypeAry = data.creditType;

        var value1 = 0;
        var value2 = 0;
        var value3 = 0;
        var value4 = 0;
        var value5 = 0;
        var value6 = 0;
        var value7 = 0;
        var value8 = 0;
        var value9 = 0;
        var thArray = [" <?php echo $translations['A00148'][$language]; /* Member ID */ ?>", "<?php echo $translations['A00102'][$language]; /* Username */?>", "<?php echo $translations['A00117'][$language]; /* Full Name */?>", "<?php echo $translations['A01349'][$language]; /* Main Leader Username */ ?>"];

        var creditNameArray = {};
        if (creditTypeAry) {
            $.each(creditTypeAry, function (creditKey, creditValue) {
                thArray.push(creditValue["display"]);
                creditNameArray[creditKey] = creditKey;
            });
        }

        if (balanceReport) {
            var newList = [];
            var temp = {};
            $.each(balanceReport, function (k, v) {
                var rebuildData = [];

                rebuildData['member_id'] = v['member_id'];
                rebuildData['username'] = v['username'];
                rebuildData['name'] = v['name'];
                rebuildData['mainLeaderUsername'] = v['mainLeaderUsername'];

                $.each(creditNameArray,function (key,value) {
                    rebuildData[key] = v[value];
                });

                newList.push(rebuildData);
            });
        }

        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        // $("#"+tableId).find("thead").prepend("<tr id='titleTh'><th>Username</th><th>Leader Username</th></tr>");

        if (data.creditType) {

            $.each(data.creditType, function (key, value) {
                // bonusName.push(key);
                // thArray.push(value['display']);
                $("#" + tableId).find("thead tr#titleTh").append("<th>" + value["display"] + "</th>");
            });

            // $("#"+tableId).find("thead tr#titleTh").append("<th colspan='2'></th>");
        }

        var count = 4;
        $('#' + tableId).find('tbody tr').each(function () {
            $(this).find('td:eq(1)').css('min-width', "150px");

            $.each(creditNameArray,function (key,value) {
                $(this).find('td:eq(count)').css('text-align', "right");
                count++;
            });
        });


        var total = data.totalBalance;

        if (total) {
            var grandTotalRow = '<tr class="lastTr"><th colspan="4" class="text-right">Total :</th>';

            $.each(total,function (key,value) {
                grandTotalRow += '<th>' + ((value)) + '</th>';
            });

            grandTotalRow += '</tr>';

            $('#' + tableId + ' tr:last').after(grandTotalRow);
        }

        if (data.totalPage == 1) {
            var detectSeeAll = $("#detectSeeAll").val();

            if (detectSeeAll == 0) {
                $("#seeAllBtn").hide();
                $("#pagerBalanceList").hide();
                $("#detectSeeAll").val(1);
            } else {
                $("#seeAllBtn").hide();
                $("#pagerBalanceList").hide();
                // $('button.xlsx').trigger("click");
            }

        }

        var grandTotal = '';
        if (grandTotalList) {
            grandTotal += '<table class="table-responsive" style="border:0px;">';
            grandTotal += '<thead>';
            $.each(grandTotalList, function (key, list) {
                grandTotal += '<tr>';
                grandTotal += '<th>' + data['creditType'][key]['display'] + '</th>';
                grandTotal += '<th style="padding-left: 15px;"> : ' + (list ? addCormer(list) : "0.00") + '</th>';
                grandTotal += '</tr>';
            });
            grandTotal += '</thead>';
            grandTotal += '</table>';

            $('#grandTotal').empty().append(grandTotal);
        }
    }

    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span><?php echo $translations['A00114'][$language]; /* Search successful. */ ?></span>').show();
        setTimeout(function () {
            $('#searchMsg').removeClass('alert-success').html('').hide();
        }, 3000);
    }


    $('#seeAllBtn').click(function () {

        var searchID = 'searchForm';
        var searchData = buildSearchDataByType(searchID);

        formData = {
            command: 'getBalanceReport',
            searchData: searchData,
            pageNumber: 1,
            seeAll: 1
        };
        // console.log(formData);
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

    });

</script>
</body>
</html>