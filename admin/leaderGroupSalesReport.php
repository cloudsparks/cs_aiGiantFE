<?php
session_start();
$thisPage = basename($_SERVER['PHP_SELF']);
$countryList = $_SESSION['countryList'];
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
                                                <input type="text" class="form-control" dataName="username"
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
                                            <div class="col-sm-4 form-group">
                                                <label class="control-label">
                                                    <?php echo $translations['A00153'][$language]; /* Country */ ?>
                                                </label>
                                                <select class="form-control" dataName="countryName" dataType="select">
                                                    <option value="">
                                                        <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                    </option>

                                                    <?php
                                                    foreach ($countryList as $value => $countryRow) {
                                                        echo "<option value='".$countryRow['id']."'>".$countryRow['display']."</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="row">
                                            <div class="col-sm-4 form-group">
                                                <label class="control-label">
                                                    Package Type
                                                </label>
                                                <select id="packageType" class="form-control" dataName="packageType" dataType="text">
                                                    <option value="">
                                                        <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                    </option>
                                                    <option value="JCV Plan">
                                                        JCV Plan
                                                    </option>
                                                    <option value="China & International Package">
                                                        China & International Package
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

                <a id="exportBtn" onclick="exportBtn()"
                class="btn btn-primary waves-effect waves-light"
                style="margin-bottom: 10px;display: none">
                <?php echo $translations['A01352'][$language]; /*Export to xlsx*/ ?>
            </a>
            <a id="seeAllBtn" onclick="seeAllBtn()"
            class="btn btn-primary waves-effect waves-light"
            style="margin-bottom: 10px;display: none">
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
        '<?php echo $translations['A00137'][$language]; /* Date */?>',
        '<?php echo $translations['A00148'][$language]; /* Member ID */?>',
        '<?php echo $translations['A00102'][$language]; /* Username */ ?>',
        'Referral Username',
        '<?php echo $translations['A00153'][$language]; /* Country */?>',
        'Package Type',
        'Invested Amount'
        );

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
            'created_at',
            'memberID',
            'username',
            'upline_username',
            'country_name',
            'product_name',
            'bonus_value'
            );

        var formData = {
            command     : "addExcelReq",
            API         : "getLeaderGroupSalesReport",
            fileName    : "LeaderGroupSalesReport",
            searchData  : searchData,
            params      : exportParams,
            headerAry   : thArray,
            keyAry      : key,
            titleKey    : "portfolioList",
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
            command: 'getLeaderGroupSalesReport',
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
            command: "getLeaderGroupSalesReport",
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

        if (data.totalPage > 1) {
            $('#seeAllBtn').show();
        } else {
            $('#seeAllBtn').hide();
        }        



        var tableNo;

        if (data.portfolioList) {
            var newList = [];
            $.each(data.portfolioList, function (k, v) {

                var rebuildData = {
                    created_at: v['created_at'],
                    memberID: v['memberID'],
                    username: v['username'],
                    upline_username: v['upline_username'],
                    country: v['country_name'],
                    product_name: v['product_name'],
                    bonus_value: addCormer(v['bonus_value'])
                };

                newList.push(rebuildData);
            });
        }

        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        $('#' + tableId).find('tbody tr').each(function () {
            $(this).find("td:eq(6)").css("text-align", "right");
            $(this).find("td:eq(7)").css("text-align", "right");
        });

        $('#' + tableId + ' tr:last').after(addCormer(data.total));

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