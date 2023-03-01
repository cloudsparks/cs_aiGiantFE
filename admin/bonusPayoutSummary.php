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
                                                            <input type="text" class="form-control" dataName="bonusDate"
                                                                   dataType="dateRange">
                                                            <span class="input-group-addon">
                                                                <?php echo $translations['A00139'][$language]; /* to */ ?>
                                                            </span>
                                                            <input type="text" class="form-control" dataName="bonusDate"
                                                                   dataType="dateRange">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label" for="" data-th="">
                                                            <?php echo $translations['A01242'][$language]; /* Leader Username */ ?>
                                                        </label>
                                                        <input id="leaderUsername" class="form-control"
                                                               dataName="leaderUsername" dataType="text">
                                                    </div>

                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label" for="" data-th="">
                                                            <?php echo $translations['A01349'][$language]; /*Main Leader Username*/ ?>
                                                        </label>
                                                        <input id="mainLeaderUsername" class="form-control"
                                                               dataName="mainLeaderUsername" dataType="text">
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
                        <div id="basicwizard" class="pull-in" style="display: none">
                            <div class="tab-content b-0 m-b-0 p-t-0">
                                <button type="button" onclick="exportBtn()"
                                        class="btn btn-primary waves-effect waves-light" style="margin-bottom: 10px;">
                                    <?php echo $translations['A01352'][$language]; /*Export to xlsx*/ ?>
                                </button>
                                <button type="button" onclick="seeAllBtn()"
                                        class="btn btn-primary waves-effect waves-light" style="margin-bottom: 10px;">
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

        // Bonus Date  Total BV    Total Payout Amount Percentage  Bonus Payout    Payout Percentage

        var searchId = 'searchForm';
        var url = 'scripts/reqBonus.php';
        var method = 'POST';
        var debug = 0;
        var bypassBlocking = 0;
        var bypassLoading = 0;
        var pageNumber = 1;
        var formData = "";
        var fCallback = "";

        var url = 'scripts/reqAdmin.php';
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

            $('#resetBtn').click(function () {
                $("#searchForm")[0].reset();
            });

            $('#searchBtn').click(function () {
                pagingCallBack(pageNumber, loadSearch);
            });

            $('#addMemo').click(function () {
                $.redirect("addMemo.php");
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
        });

        function exportBtn() {
            var searchID = 'searchForm';
            var searchData = buildSearchDataByType(searchID);
            var thArray = [exportArray, exportSubArray];

            var key = Array();

            var exportParams = {
                searchData  : searchData,
                pageNumber  : pageNumber,
                seeAll      : 1,
                usernameSearchType  : $("input[name=usernameType]:checked").val()
            };

            var formData  = {
                command     : "addExcelReq",
                API         : "getBonusPayoutSummary",
                fileName    : 'BonusPayoutSummary',
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


        function pagingCallBack(pageNumber, fCallback) {
            if (pageNumber > 1) bypassLoading = 1;

            $("#seeAllBtn").show();

            var searchID = 'searchForm';
            var searchData = buildSearchDataByType(searchID);
            var formData = {
                command: "getBonusPayoutSummary",
                pageNumber: pageNumber,
                searchData: searchData,
            };
            if (!fCallback)
                fCallback = loadDefaultListing;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }

        function seeAllBtn() {
            var searchID = 'searchForm';
            var searchData = buildSearchDataByType(searchID);
            formData = {
                command: 'getBonusPayoutSummary',
                searchData: searchData,
                pageNumber: 1,
                seeAll: 1
            };

            fCallback = loadDefaultListing;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }

        function loadDefaultListing(data, message) {
            var tableNo;
            $('#basicwizard').show();
            $('#exportBtn').show();
            $('#seeAllBtn').show();

            var list = data['report'];

            thArray = ['Bonus Date', 'Total BV','Total Payout Amount', 'Percentage'];

            exportSubArray = ['Bonus Date', 'Total BV','Total Payout Amount', 'Percentage'];

            exportArray = [];

            var extraHeader = thArray.length;

            if(list) {

                for(var i = 0; i < extraHeader; i++) {
                    exportArray.push("");
                }
                // var subHeaderLen = data.creditArray.length;
                var subHeaderLen = 2;

                // console.log(subHeaderLen);

                $.each(data['bonusName'], function(k,v){
                    thArray.push(v['display']);
                    exportArray.push(v['display']);

                    for(var i = 1; i<subHeaderLen; i++) {
                        exportArray.push("");
                    }
                });
                
                var newList = [];

                $.each(list, function(k,v){
                    var rebuildData = {
                        date: k,
                        totalBonusValue: numberThousand(v['totalBonusValue'],2),
                        subTotalPayoutAmount: numberThousand(v['subTotalPayoutAmount'],2),
                        subTotalPayoutAmountPercentage: numberThousand(v['subTotalPayoutAmountPercentage'],2) + "%"
                    };

                    var key1 = 1;
                    $.each(data['bonusName'], function(k1,v1){

                        rebuildKey = 'amount' + key1;
                        rebuildData[rebuildKey] = numberThousand(v[k1]['payout'],6);

                        rebuildKey = 'percentage' + key1;
                        rebuildData[rebuildKey] = numberThousand(v[k1]['percentage'],2) + "%";

                        key1++;
                    });

                    newList.push(rebuildData);
                });

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

            var j=0;
            $.each(data['bonusName'], function(k,v){

                var bg = "";

                if(j%2==0) {
                    bg = "greyBg";

                    var tdInd = (subHeaderLen*j)+extraHeader;
                    // $("#"+tableId+" tbody tr td:nth-child("+(tdInd+1)+")").addClass(bg);
                    for(var i = 1; i<=subHeaderLen; i++) {
                        $("#"+tableId+" tbody tr td:nth-child("+(tdInd+i)+")").addClass(bg);
                    }

                    $("#"+tableId).find('thead tr th').eq(j+extraHeader).addClass("greyBg");
                }

                subHeader += `<th class="${bg}">Bonus Payout</th><th class="${bg}">Payout Percentage</th>`;
                exportSubArray.push("Bonus Payout", "Payout Percentage");
                j++
            });

            $("#"+tableId+" thead").append(`<tr>${subHeader}</tr>`);

            var totalRow = "";
            var totalArray = data.totalArray;

            totalRow += `
                <td><b>${numberThousand(data.totalBonusReport.totalBonusValue,2)}</b></td>
                <td><b>${numberThousand(data.totalBonusReport.totalPayoutAmount,2)}</b></td>
                <td><b>${numberThousand(data.totalBonusReport.totalPayoutAmountPercentage,2)}%</b></td>
            `;

            var t="";
            $.each(data.totalBonusReport, function (k, v) {
                $.each(data.bonusName, function (k2, v2) {
                    var dataKey = k+"Percentage";

                    var bgClass = "";
                    if(t%2==0){
                        bgClass="greyBg";
                    }

                    if (k == k2) {
                        totalRow += `
                            <td class="${bgClass}"><b>${numberThousand(v,6)}</b></td>
                            <td class="${bgClass}"><b>${numberThousand(data.totalBonusReport[dataKey],2)}%</b></td>
                        `;
                    }
                });
                t++;
            });

            $("#"+tableId).find('tbody').append(`<tr><td><b>Total:</b></td>${totalRow}</tr>`);

            $("#"+tableId).find('tbody tr td:not(:first-child)').each(function(){
                $(this).css('text-align', 'right');
            });
        }

        function tableBtnClick(btnId) {
            var btnName = $('#' + btnId).attr('id').replace(/\d+/g, '');
            var tableRow = $('#' + btnId).parent('td').parent('tr');
            var id = tableRow.attr('data-th');

            if (btnName == "edit") {
                $.redirect('editMemo.php', {id: id});
            } else if (btnName == "delete") {
                var formData = {command: 'removeMemo', id: id};
                var fCallback = removeCallback;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }
        }

        function removeCallback(data, message) {
            showMessage('<?php echo $translations['A00823'][$language]; /* Successful remove memo. */?>', 'success', '<?php echo $translations['A00824'][$language]; /* Remove Memo */?>', 'trash', 'memo.php');
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