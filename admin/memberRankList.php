<?php 
session_start();
$thisPage = basename($_SERVER['PHP_SELF']);
$thisUrl = $_SERVER['REQUEST_URI'];
$pathInfo = pathinfo($thisUrl);

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
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapse">
                                            <?php echo $translations['A00051'][$language]; /* Search */ ?>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <div id="searchMsg" class="text-center alert" style="display: none;"></div>
                                        <form id="searchForm" role="form">
                                            <div class="col-xs-12">
                                                <div class="row">
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            Effective Date
                                                        </label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control input-daterange-from" dataname="effectiveDate" datatype="dateRange">
                                                            <span class="input-group-addon">
                                                                <?php echo $translations['A00139'][$language]; /* to */?>
                                                            </span>
                                                            <input type="text" class="form-control input-daterange-to" dataname="effectiveDate" datatype="dateRange">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00102'][$language]; /* Username */ ?>
                                                        </label>
                                                        <span class="pull-right">
                                                            <input id="match" type="radio" name="usernameType" value="match" checked> 
                                                            <label for="match" style="margin-right: 15px;"><?php echo $translations['A01347'][$language]; /* Match */ ?></label>

                                                            <input id="like" type="radio" name="usernameType" value="like" style="margin-left: 15px;" > 
                                                            <label for="like"><?php echo $translations['A01348'][$language]; /* Like */ ?></label>
                                                        </span>
                                                        <input type="text" class="form-control" dataName="username" dataType="text">
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A01349'][$language]; /* Main Leader Username */ ?>
                                                        </label>
                                                        <input type="text" class="form-control" dataName="mainLeaderUsername" dataType="text">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xs-12">
                                                <div class="row">
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            Bonus Name  
                                                        </label>
                                                        <select class="form-control" id="bonusName" dataName="bonusName" dataType="select">
                                                            <!-- <option value="">
                                                                <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                            </option> -->
                                                            <?php foreach($_SESSION["bonusList"] as $key => $value) { ?>
                                                                <option id="<?php echo $value['id']; ?>" value="<?php echo $value['bonusName']; ?>">
                                                                    <?php echo $value['display']; ?>
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            Bonus Rank
                                                        </label>
                                                        <select class="form-control" id="currentRank" dataName="currentRank" dataType="select">
                                                            <option value="">
                                                                <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                            </option>
                                                            <?php foreach($_SESSION["bonusList"][0]['rankList'] as $key => $value) { ?>
                                                                <option id="<?php echo $value['id']; ?>" value="<?php echo $value['name']; ?>">
                                                                    <?php echo $value['display']; ?>
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="col-xs-12">
                                            <button id="searchBtn" class="btn btn-primary waves-effect waves-light">
                                                <?php echo $translations['A00051'][$language]; /* Search */ ?>
                                            </button>
                                            <button id="resetBtn" class="btn btn-default waves-effect waves-light">
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
                        <a id="exportBtn" class="btn btn-primary waves-effect waves-light m-b-rem1" style="display: none" onclick="exportBtn()"><?php echo $translations['A01352'][$language]; /*Export to xlsx*/ ?></a>
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
<script>
    var resizefunc = [];
</script>
<?php include("shareJs.php"); ?>
<script>

    var url       = 'scripts/reqAdmin.php';
    var divId    = 'listingDiv';
    var tableId  = 'listingTable';
    var pagerId  = 'listingPager';
    var btnArray = {};
    var thArray  = Array(
        '<?php echo $translations['A00102'][$language]; /* Username */ ?>',
        '<?php echo $translations['A01349'][$language]; /* Main Leader Username */ ?>',
        'Current Rank',
        'System Rank',
        'Admin Set Rank',
        'Effective Date',
        );

    // id : 1000000
    //       username : director
    //       mainLeaderUsername : -
    //       currentRank : Trader
    //       systemHitRank : Trader
    //       adminSetRank : -
    //       effectiveDate : 16/11/2021 14:56:41

    var method         = 'POST';
    var debug          = 0;
    var bypassBlocking = 0;
    var bypassLoading  = 0;
    var pageNumber     = 1;

    $(document).ready(function() {
        setTodayDatePicker();

        $("body").keyup(function(event) {
            if (event.keyCode == 13) {
                $("#searchBtn").click();
            }
        });

        $('#resetBtn').click(function() {
            $('#alertMsg').removeClass('alert-success').html('').hide();
            $('#searchForm').find('input:not([type=radio])').each(function() {
                $(this).val(''); 
            });
            $('#searchForm').find('select').each(function() {
                $(this).val('');
            });
        });

        $('#searchBtn').click(function() {
            pagingCallBack(pageNumber, loadSearch);
        });

        $('#bonusName').change(function() {
            var selected = $('#bonusName').find(':selected').attr('id') - 1;
            var currentRankList = <?php echo json_encode($_SESSION["bonusList"]); ?>;
            currentRankList = currentRankList[selected]['rankList'];
            console.log(currentRankList);
            var selections = `
                <option value="">
                    <?php echo $translations['A00055'][$language]; /* All */ ?>
                </option>`;

            $.each(currentRankList, function(k, v) {
                selections += `
                    <option id="${v['id']}" value="${v['id']}">
                        ${v['display']}
                    </option>`;
            });
            console.log(selections);
            $('#currentRank').html(selections);
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

        var key  = Array (
            'username',
            'mainLeaderUsername',
            'currentRank',
            'systemHitRank',
            'adminSetRank',
            'effectiveDate',
        );

        var formData = {
            command     : "addExcelReq",
            API         : "getMemberRankList",
            fileName    : "MemberRankListReport",
            inputData   : searchData,
            params      : exportParams,
            headerAry   : thArray,
            keyAry      : key,
            titleKey    : "clientRank",
            type        : 'export',
            returnType  : 'excel',
            usernameSearchType : $("input[name=usernameType]:checked").val()
        };

        fCallback = exportExcel;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }


    function loadDefaultListing(data, message) {
        $('#basicwizard').show();

        if (data) {
            $('#exportBtn').show(); 
        } else {
            $('#exportBtn').hide();
        }

        var tableNo;
        var clientRank = data.clientRank;

        if(clientRank) {
            var newList = [];
            $.each(clientRank, function(k, v) {
                var rebuildData = {
                    username : v['username'],
                    mainLeaderUsername : v['mainLeaderUsername'],
                    currentRank : v['currentRank'],
                    systemHitRank : v['systemHitRank'],
                    adminSetRank : v['adminSetRank'],
                    effectiveDate : v['effectiveDate'],
                };

                newList.push(rebuildData);
            });
        }

        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);
    }


    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span><?php echo $translations['A00114'][$language]; /* Search successful. */ ?></span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide(); 
        }, 3000);
    }

    function pagingCallBack(pageNumber, fCallback){
        var searchId   = 'searchForm';
        var searchData = buildSearchDataByType(searchId);
        if(pageNumber > 1) bypassLoading = 1;

        var formData = {
            command    : "getMemberRankList",
            searchData  : searchData,
            pageNumber : pageNumber,
            usernameSearchType : $("input[name=usernameType]:checked").val()
        };
        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function setTodayDatePicker() {
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1;
        var yyyy = today.getFullYear();
        if(dd<10){
            dd='0'+dd;
        } 
        if(mm<10){
            mm='0'+mm;
        }
        var today = dd+'/'+mm+'/'+yyyy;
        
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
