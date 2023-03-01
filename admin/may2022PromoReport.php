<?php
session_start();
$thisPage = basename($_SERVER['PHP_SELF']);
$communityRank = $_SESSION['communityRank'];
?>
<!DOCTYPE html>
<html>
<?php include("head.php"); ?>
<div id="wrapper">
    <?php include("topbar.php"); ?>
    <?php include("sidebar.php"); ?>
    <div class="content-page">
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
                                                <label class="control-label">
                                                    <?php echo $translations['A00102'][$language]; /* Username */ ?>
                                                </label>
                                                <span class="pull-right">
                                                    <input id="match" type="radio" name="usernameType" value="match"
                                                    checked>
                                                    <label for="match"
                                                    style="margin-right: 15px;"><?php echo $translations['A01347'][$language]; /* Match */ ?></label>

                                                    <input id="like" type="radio" name="usernameType" value="like"
                                                    style="margin-left: 15px;">
                                                    <label for="like"><?php echo $translations['A01348'][$language]; /* Like */ ?></label>
                                                </span>
                                                <input type="text" class="form-control" dataName="username" dataType="text">
                                            </div>
                                            <div class="col-sm-4 form-group">
                                                <label class="control-label">
                                                    Rank List
                                                </label>
                                                <select class="form-control" dataName="rank" dataType="select">
                                                    <option value="">
                                                        <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                    </option>

                                                    <?php
                                                    foreach ($communityRank as $value => $rankRow) {
                                                        echo "<option value='".$rankRow['id']."'>".$rankRow['display']."</option>";
                                                    }
                                                    ?>
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
                <a id="exportBtn" onclick="exportBtn()" class="btn btn-primary waves-effect waves-light" style="margin-bottom: 10px;display: none">
                    <?php echo $translations['A01352'][$language]; /*Export to xlsx*/ ?>
                </a>
                <a id="seeAllBtn" onclick="seeAllBtn()" class="btn btn-primary waves-effect waves-light" style="margin-bottom: 10px;display: none">
                    <?php echo $translations['A01191'][$language]; /*See All*/ ?>
                </a>
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
    var thArray = Array(
        '<?php echo $translations['A00969'][$language]; /* Bonus Date */?>',
        '<?php echo $translations['A00984'][$language]; /* Rank */?>',
        '<?php echo $translations['A00102'][$language]; /* Username */ ?>',
        '<?php echo $translations['A00058'][$language]; /* First */ ?>',
        '<?php echo $translations['A01664'][$language]; /* Sales Amount */ ?>',
        '<?php echo $translations['A01665'][$language]; /* Second */ ?>',
        '<?php echo $translations['A01664'][$language]; /* Sales Amount */ ?>',
        "<?php echo $translations['A01666'][$language]; /* Third */ ?>",
        '<?php echo $translations['A01664'][$language]; /* Sales Amount */ ?>',
        "<?php echo $translations['A01667'][$language]; /* Bonus Tier Amount */ ?>",
        "<?php echo $translations['M00986'][$language]; /* Pay Percentage */ ?> (%)",
        "<?php echo $translations['M00054'][$language]; /* Payable Amount */ ?>"
        );

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

        var exportParams = {
            searchData  : searchData,
            pageNumber  : pageNumber,
            seeAll      : 1,
            usernameSearchType  : $("input[name=usernameType]:checked").val()
        };

        var key = Array(
            'bonus_date',
            'rank',
            'username',
            'salesUsername1',
            'salesAmount1',
            'salesUsername2',
            'salesAmount2',
            'salesUsername3',
            'salesAmount3',
            'from_amount',
            'percentage',
            'amount'
            );

        var formData = {
            command     : "addExcelReq",
            API         : "getMay2022PromoBonusReport",
            fileName    : "may2020PromoBonusReport",
            searchData  : searchData,
            params      : exportParams,
            headerAry   : thArray,
            keyAry      : key,
            titleKey    : "bonusList",
            type        : 'export',
            returnType  : 'excel',
            usernameSearchType : $("input[name=usernameType]:checked").val()
        };

        fCallback = exportExcel;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function seeAllBtn() {
        var searchID = 'searchForm';
        var searchData = buildSearchDataByType(searchID);
        formData = {
            command: 'getMay2022PromoBonusReport',
            searchData: searchData,
            pageNumber: 1,
            seeAll: 1
        };

        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function pagingCallBack(pageNumber, fCallback) {
        if (pageNumber > 1) bypassLoading = 1;

        var searchID = 'searchForm';
        var searchData = buildSearchDataByType(searchID);
        var formData = {
            command: "getMay2022PromoBonusReport",
            pageNumber: pageNumber,
            searchData: searchData,
            usernameSearchType: $("input[name=usernameType]:checked").val()
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
        } else {
            $('#exportBtn').hide();
        }

        // if (data.totalPage > 1) {
        //     $('#seeAllBtn').show();
        // } else {
        //     $('#seeAllBtn').hide();
        // }        



        var tableNo;

        if (data.bonusList) {
            var newList = [];
            $.each(data.bonusList, function (k, v) {
                var rebuildData = {
                    bonus_date      : v['bonus_date'],
                    rank            : v['rank'],
                    username        : v['username'],
                    salesUsername1  : v['salesUsername1'],
                    salesAmount1    : addCormer(v['salesAmount1']),
                    salesUsername2  : v['salesUsername2'],
                    salesAmount2    : addCormer(v['salesAmount2']),
                    salesUsername3  : v['salesUsername3'],
                    salesAmount3    : addCormer(v['salesAmount3']),
                    from_amount     : addCormer(v['from_amount'], 0),
                    percentage      : addCormer(v['percentage'], 0),
                    amount          : addCormer(v['amount'], 0)
                };

                newList.push(rebuildData);
            });
        }

        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        $('#' + tableId).find('tbody tr, thead tr').each(function () {
            $(this).find('td:eq(3), th:eq(3)').addClass('greyBg');
            $(this).find('td:eq(4), th:eq(4)').addClass('greyBg').css('text-align', "right");
            $(this).find('td:eq(6), th:eq(6)').css('text-align', "right");
            $(this).find('td:eq(7), th:eq(7)').addClass('greyBg');
            $(this).find('td:eq(8), th:eq(8)').addClass('greyBg').css('text-align', "right");
            $(this).find('td:eq(9), th:eq(9)').css('text-align', "right");
            $(this).find('td:eq(10), th:eq(10)').css('text-align', "right");
            $(this).find('td:eq(11), th:eq(11)').css('text-align', "right");
        });

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