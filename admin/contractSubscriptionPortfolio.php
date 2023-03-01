<?php 
    session_start(); 
    $countryList = $_SESSION['countryList'];
    $trancheList = $_SESSION['trancheList'];
    $trancheV2List = $_SESSION['trancheV2List'];
    $trancheVersion = $_SESSION['trancheVersion'];
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
                                                            Purchase Date
                                                        </label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control input-daterange-from"
                                                                   dataName="date" dataType="dateRange"/>
                                                            <span class="input-group-addon">
                                                                <?php echo $translations['A00139'][$language]; /* to */ ?>
                                                            </span>
                                                            <input type="text" class="form-control input-daterange-to"
                                                                   dataName="date" dataType="dateRange"/>
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
                                                        <input type="text" class="form-control" dataName="memberID" dataType="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="row">
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00318'][$language]; /* Status */ ?>
                                                        </label>
                                                        <select id="status" class="form-control" dataName="status"
                                                                dataType="text">
                                                            <option value="">
                                                                <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                            </option>
                                                            <option value="Active"><?php echo $translations['A00372'][$language]; /* Active */ ?></option>
                                                            <option value="Not Active,">Not Acitve</option>
                                                            <option value="Terminated"><?php echo $translations['A01131'][$language]; /* terminated */ ?></option>
                                                            <option value="Expired">Expired</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label for="bonusTypeSelect">Type</label>
                                                        <select id="bonusTypeSelect" class="form-control" dataName="trancheVersion" dataType="text">
                                                            <option value="">
                                                                <?php echo $translations['A00055'][$language]; // All ?>
                                                            </option>
                                                            <?php foreach($_SESSION["trancheVersion"] as $key => $value){ ?>
                                                                <option value="<?php echo $value; ?>">
                                                                    <?php echo $value; ?>
                                                                </option>
                                                           <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            Tranche
                                                        </label>
                                                        <select id="tranche" class="form-control" dataName="tranche"
                                                                dataType="text">
                                                            <option value="">
                                                                <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                            </option>
                                                                <?php foreach($_SESSION["trancheList"] as $key => $value){ ?>
                                                                    <option value="<?php echo $value['id']; ?>">
                                                                        <?php echo $value['display']; ?>
                                                                    </option>
                                                               <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            V2 Tranche 
                                                        </label>
                                                        <select id="tranche" class="form-control" dataName="trancheV2"
                                                                dataType="text">
                                                            <option value="">
                                                                <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                            </option>
                                                                <?php foreach($_SESSION["trancheV2List"] as $key => $value){ ?>
                                                                    <option value="<?php echo $value['id']; ?>">
                                                                        <?php echo $value['display']; ?>
                                                                    </option>
                                                               <?php } ?>
                                                        </select>
                                                    </div>

                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A01503'][$language]; /* Reference No */ ?>
                                                        </label>
                                                        <input type="text" class="form-control" dataName="refNo" dataType="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                    </div>
                                                    

                                                    <!-- Search -->
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A01672'][$language]; /* Leader Username */ ?>
                                                        </label>
                                                        <input type="text" class="form-control" dataName="leaderUsername"
                                                               dataType="text">
                                                    </div>

                                                </div>
                                            </div>


                                            <!-- <div class="col-xs-12">
                                                <div class="row">
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00926'][$language]; /* Maturity Date */ ?>
                                                        </label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control input-daterange-from"
                                                                   dataName="maturityDate" dataType="dateRange"/>
                                                            <span class="input-group-addon">
                                                                <?php echo $translations['A00927'][$language]; /* to */ ?>
                                                            </span>
                                                            <input type="text" class="form-control input-daterange-to"
                                                                   dataName="maturityDate" dataType="dateRange"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
                                           
                                        </form>

                                        <div class="col-xs-12" style="margin-top: 10px">
                                            <button id="searchBtn" type="submit"
                                                    class="btn btn-primary waves-effect waves-light">
                                                <?php echo $translations['A00051'][$language]; /* Search */ ?>
                                            </button>
                                            <button type="submit" id="resetBtn"
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
                        <div id="basicwizard" class="pull-in" style="display:none">
                            <div class="tab-content b-0 m-b-0 p-t-0">
                                <a id="exportBtn" onclick="exportBtn()" class="btn btn-primary waves-effect waves-light m-b-rem1" style="display: none;"><?php echo $translations['A01352'][$language]; /* Export to xlsx */ ?></a>
                                <a id="seeAllBtn" onclick="seeAllBtn()" class="btn btn-primary waves-effect waves-light m-b-rem1" style="display: none;">
                                    <?php echo $translations['A01191'][$language]; /* See All */ ?>
                                </a>
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
        </div>
        <input type="hidden" id="detectSeeAll" value="0">
        <?php include("footer.php"); ?>
    </div>
</div>
<script>
    var resizefunc = [];
</script>
<?php include("shareJs.php"); ?>
<script>

    var divId = 'listingDiv';
    var tableId = 'listingTable';
    var pagerId = 'listingPager';
    var btnArray = {};
    var thArray = Array(
        "Purchase Date",
        "Member ID",
        "Username",
        "Sponsor Username",
        "Ref No",
        "Contract ID",
        "Tranche",
        "Type",
        "Contract Units",
        "Subscription Units",
        "Activation Units",
        "Remaining Units",
        "Trading Units",
        "Cash Units",
        "Commodities Wallet",
        "Mature Date",
        "Status",
    );

    var method = 'POST';
    var url = 'scripts/reqAdmin.php';
    var debug = 0;
    var bypassBlocking = 0;
    var bypassLoading = 0;
    var pageNumber = 1;
    var offsetSecs = getOffsetSecs();

    $(document).ready(function () {

        setTodayDatePicker();

        $("body").keyup(function (event) {
            if (event.keyCode == 13) {
                $("#searchBtn").click();
            }
        });

        $('#resetBtn').click(function () {
            $('#alertMsg').removeClass('alert-success').html('').hide();
            $('#searchForm').find('input:not([type=radio])').each(function () {
                $(this).val('');
            });
            $('#searchForm').find('select').each(function () {
                $(this).val('');
            });
        });

        $('#searchBtn').click(function () {
            pagingCallBack(pageNumber, loadSearch);
        });

    });

    function exportBtn() {
        var searchId = 'searchForm';
        var searchData = buildSearchDataByType(searchId);

        var exportParams = {
            searchData  : searchData,
            pageNumber  : pageNumber,
            seeAll      : 1,
            usernameSearchType  : $("input[name=usernameType]:checked").val()
        };

        var key = Array(
            'purchaseDate',
            'memberID',
            'username',
            'sponsorUsername',
            'referenceNo',
            'contractID',
            'tranche',
            'trancheV2',
            'contractUnit',
            'subscriptionUnit',
            'activationUnit',
            'remainingUnit',
            'tradingUnits',
            'cashUnits',
            'commoditiesWallet',
            'matureDate',
            'status',
        );

        var formData = {

            command     : "addExcelReq",
            API         : "getMemberContractSubPortfolio",
            fileName    : "MemberContractSubPortfolio",
            searchData   : searchData,
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
            command         : 'getMemberContractSubPortfolio',
            searchData      : searchData,
            pageNumber      : 1,
            seeAll          : 1
        };

        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadDefaultListing(data, message) {
        $('#basicwizard').show();

        if (data) {
            $("#exportBtn").show();
        } else {
            $("#exportBtn").hide();
        }

        if (data.totalPage > 1) {
            $("#seeAllBtn").show();
        } else {
            $("#seeAllBtn").hide();
        }

        var tableNo;
        var portfolioPageListing = data.dataList;

        // date: "28/10/2021 13:48:25"
        // member_id
        // username: "aaron02"
        // units: "1000.00"
        // matureAt: "-"
        // statusDisplay: "Active"
        
        // amount: "0.00"
        // matureAtCountDown: "-"
        // refNo: "33623306"
        // status: "Active"

        // Date|  Status| Member Id |  Username | Package (Units) | Mature Date

        if (data != "" && portfolioPageListing.length > 0) {
            var newData = [];
            $.each(portfolioPageListing, function (k, v) {
                var rebuild = {
                    purchaseDate: v['purchaseDate'],
                    memberID: v['memberID'],
                    username: v['username'],
                    sponsorUsername  : v['sponsorUsername'],
                    referenceNo : v['referenceNo'],
                    contractID: v['contractID'], 
                    tranche: v['tranche'],
                    trancheV2: v['trancheV2'],
                    contractUnit: numberThousand(v['contractUnit'], 2),
                    subscriptionUnit: numberThousand(v['subscriptionUnit'], 2),
                    activationUnit: numberThousand(v['activationUnit'], 2),
                    remainingUnit: numberThousand(v['remainingUnit'], 2),
                    tradingUnits: numberThousand(v['tradingUnits'], 2),
                    cashUnits: numberThousand(v['cashUnits'], 2),
                    commoditiesWallet: numberThousand(v['commoditiesWallet'], 2),
                    matureDate : v['matureDate'],
                    status: v['status']

                };

                newData.push(rebuild);
            });
        }

        buildTable(newData, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        $('#' + tableId).find('tr').each(function () {
            $(this).find('td:eq(8), th:eq(8)').css('text-align', "right");
            $(this).find('td:eq(9), th:eq(9)').css('text-align', "right");
            $(this).find('td:eq(10), th:eq(10)').css('text-align', "right");
            $(this).find('td:eq(11), th:eq(11)').css('text-align', "right");
            $(this).find('td:eq(12), th:eq(12)').css('text-align', "right");
            $(this).find('td:eq(13), th:eq(13)').css('text-align', "right");
            $(this).find('td:eq(14), th:eq(14)').css('text-align', "right");
        });

        if(data.grandTotal) {
            $('#' + tableId).find('tbody').append(`
                <tr style="">
                    <td colspan='6' class="text-right"><b><?php echo $translations['A00651'][$language]; /* Grand Total */?>:</b></td>
                    <td> ${numberThousand(data.grandTotal, 2)} </td>
                    <td></td>
                    <td> ${numberThousand(data.grandTotal, 2)} </td>
                    <td colspan='9'></td>
                </tr>
            `);
        }
    }


    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<?php echo $translations['A00114'][$language]; /* Search successfully */?>').show();
        setTimeout(function () {
            $('#searchMsg').removeClass('alert-success').html('').hide();
        }, 3000);
    }

    function pagingCallBack(pageNumber, fCallback) {

        if (pageNumber > 1) bypassLoading = 1;

        $("#seeAllBtn").show();

        var searchId = 'searchForm';
        var searchData = buildSearchDataByType(searchId);
        var formData = {
            command: "getMemberContractSubPortfolio",
            pageNumber: pageNumber,
            searchData: searchData,
            usernameSearchType: $("input[name=usernameType]:checked").val()
        };
        fCallback = loadDefaultListing;

        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function setTodayDatePicker() {
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1;
        var yyyy = today.getFullYear();
        if (dd < 10) {
            dd = '0' + dd;
        }
        if (mm < 10) {
            mm = '0' + mm;
        }
        var today = dd + '/' + mm + '/' + yyyy;

        $('.input-daterange-from').daterangepicker({
            singleDatePicker: true,
            timePicker: false,
            locale: {
                format: 'DD/MM/YYYY'
            }
        });
        $('.input-daterange-from').val('');

        $('.input-daterange-to').daterangepicker({
            singleDatePicker: true,
            timePicker: false,
            locale: {
                format: 'DD/MM/YYYY'
            }
        });
        $('.input-daterange-to').val('');

        return today;
    }
</script>
</body>
</html>
