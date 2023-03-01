<?php 
    session_start(); 
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
                                                        <div class="input-group">
                                                            <input type="text" class="form-control input-daterange-from"
                                                                   dataName="dateRange" dataType="dateRange"/>
                                                            <span class="input-group-addon">
                                                                <?php echo $translations['A00139'][$language]; /* to */ ?>
                                                            </span>
                                                            <input type="text" class="form-control input-daterange-to"
                                                                   dataName="dateRange" dataType="dateRange"/>
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
                                                        <input type="text" class="form-control username" dataName="username"
                                                               dataType="text">
                                                    </div>
                                                    <!-- <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A01109'][$language]; /* Leader Username */ ?>
                                                        </label>
                                                        <input type="text" class="form-control" dataName="leaderUsername" dataType="text">
                                                    </div> -->
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00148'][$language]; /* Member ID */ ?>
                                                        </label>
                                                        <input type="text" class="form-control" dataName="memberID" dataType="text">
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
                                                                <option value="Pending">Pending</option>
                                                                <option value="Approved">Approved</option>
                                                                <option value="Rejected">Rejected</option>
                                                            </select>
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
                                <div style="margin-top: 10px; margin-bottom: 10px">
                                        <span>
                                            <?php echo $translations['A00571'][$language]; /* Remark */ ?> : 
                                        </span>
                                    <input id="remark" type="form-control">
                                </div>
                                <span>
                                    <?php echo $translations['A00663'][$language]; /* With selected */ ?> : 
                                </span>
                                <div id="selectionDiv" style="display: inline-block; margin-left: 5px; width: 150px">
                                    <select id="statusSelect" class="m-l-rem1 form-control" dataName="status"
                                            dataType="select">
                                        <option value="Approve" selected>
                                            <?php echo $translations['A01218'][$language]; /* Approved */ ?>
                                        </option>
                                        <option value="Reject">
                                            <?php echo $translations['A01439'][$language]; /* Rejected */ ?>
                                        </option>
                                    </select>
                                </div>
                                <div style="display: inline-block; margin-left:20px;">
                                    <button type="" id="updateBtn" class="btn btn-primary waves-effect waves-light"
                                            style="width: 100px">
                                        <?php echo $translations['A00300'][$language]; /* Update */ ?>
                                    </button>
                                </div>
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
        "check",
        "<?php echo $translations['A00356'][$language] //Created Date ?>",
        "<?php echo $translations['A01755'][$language] //Termination Date ?>",
        "<?php echo $translations['A00148'][$language] //Member ID ?>",
        "<?php echo $translations['A00102'][$language]; /* Username */?>",
        "<?php echo $translations['A01756'][$language] //Contract Date ?>",
        "<?php echo $translations['A01757'][$language] //Contract AUM ?>",
        "<?php echo $translations['A01758'][$language] //Processing Fee ?>",
        "<?php echo $translations['A01677'][$language] //Amount Receivable ?>",
        "<?php echo $translations['A00318'][$language] //Status ?>",
        "<?php echo $translations['A01759'][$language] //Approved Date ?>",
        "<?php echo $translations['A00147'][$language] //Done By ?>",
        "<?php echo $translations['A00571'][$language] //Remark ?>"
    );

    var method = 'POST';
    var url = 'scripts/reqAdmin.php';
    var debug = 0;
    var bypassBlocking = 0;
    var bypassLoading = 0;
    var pageNumber = 1;
    var offsetSecs = getOffsetSecs();
    var currentID = "";

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
            var getDataType = $("input[name=usernameType]:checked").val();
            $('.username').attr('dataType', getDataType);
            pagingCallBack(pageNumber, loadSearch);
        });

        $('#updateBtn').click(function () {
            var username = [];
            var checkedDetails = [];
            $('#' + tableId).find('[type=checkbox]:checked').each(function () {
                var checkboxID = $(this).parent('td').parent('tr').attr('data-username');
                username.push(checkboxID);
            });
            if (username.length === 0)
                showMessage('<?php echo $translations['A00613'][$language]; /* No check box selected. */ ?>', 'warning', '<?php echo $translations['A00614'][$language]; /* Update Status */ ?>', 'edit', '');
            
            else if(username.length >= 500){
                showMessage('Cannot select records more than 500.', 'warning', 'Update Status', 'edit', '');
            } else {
                var formData = {
                    command: 'actionForTerminatePortfolio',
                    username: username,
                    action: $('#statusSelect').find('option:selected').val(),
                    remark : $("#remark").val()
                };
                // console.log(formData)
                fCallback = updateCallback;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }
        });

    });

    function exportBtn() {
        var searchID = 'searchForm';
        var searchData = buildSearchDataByType(searchID);

        var thArray = Array(
            "<?php echo $translations['A00356'][$language] //Created Date ?>",
            "<?php echo $translations['A01755'][$language] //Termination Date ?>",
            "<?php echo $translations['A00148'][$language] //Member ID ?>",
            "<?php echo $translations['A00102'][$language]; /* Username */?>",
            "<?php echo $translations['A01756'][$language] //Contract Date ?>",
            "<?php echo $translations['A01757'][$language] //Contract AUM ?>",
            "<?php echo $translations['A01758'][$language] //Processing Fee ?>",
            "<?php echo $translations['A01677'][$language] //Amount Receivable ?>",
            "<?php echo $translations['A00318'][$language] //Status ?>",
            "<?php echo $translations['A01759'][$language] //Approved Date ?>",
            "<?php echo $translations['A00147'][$language] //Done By ?>",
            "<?php echo $translations['A00571'][$language] //Remark ?>"
        );

        var key = Array(
            'created_at',
            'termination_date',
            'member_id',
            'username',
            'contract_date',
            'amount',
            'management_fee',
            'balance',
            'status',
            'approved_date',
            'done_by',
            'remark'
        );

        var formData = {
            command: "getTerminationListing",
            flag        : "Capital Redemption",
            filename: "CapitalRedemptionListingReport",
            searchData: searchData,
            pageNumber      : 1,
            seeAll          : 1,
            header: thArray,
            key: key,
            DataKey: "earlyTerminationListing",
            type: 'export'
        };

        fCallback = exportExcel;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function seeAllBtn() {
        var searchID = 'searchForm';
        var searchData = buildSearchDataByType(searchID);
        formData = {
            command         : 'getTerminationListing',
            flag            : "Capital Redemption",
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
        var listing = data.earlyTerminationListing;

        if (data != "" && listing.length > 0) {
            var newData = [];
            $.each(listing, function (k, v) {  
                var checkbox = "";
                if (v['status'] === "Pending") {
                    checkbox = "<input name ='checkbox' type ='checkbox'>";
                } else {
                    checkbox = "-";
                }               

                var rebuild = {
                    check               : checkbox,
                    created_at          : v['created_at'],
                    termination_date    : v['termination_date'],
                    member_id           : v['member_id'],
                    username            : v['username'],
                    contract_date       : v['contract_date'],
                    amount              : numberThousand(v['amount'], 2), 
                    management_fee      : numberThousand(v['management_fee'], 2), 
                    balance             : numberThousand(v['balance'], 2), 
                    status              : v['status'],
                    approved_date       : v['approved_date'] || '-',
                    done_by             : v['done_by'] || '-',
                    remark              : v['remark']
                };

                newData.push(rebuild);
            });
        }

        buildTable(newData, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        if (data != "" && listing.length > 0) {
            $.each(listing, function (k, v) {
                $('#' + tableId).find('tr#' + k).attr('data-username', v['username']);
            });
        }

        $('#' + tableId).find('tr').each(function () {
            $(this).find('td:eq(6), th:eq(6)').css('text-align', "right");
            $(this).find('td:eq(7), th:eq(7)').css('text-align', "right");
            $(this).find('td:eq(8), th:eq(8)').css('text-align', "right");
        });
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
            command             : "getTerminationListing",
            flag                : "Capital Redemption",
            pageNumber          : pageNumber,
            searchData          : searchData,
            // usernameSearchType  : $("input[name=usernameType]:checked").val()
        };
        fCallback = loadDefaultListing;

        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function updateCallback(data, message) {
        showMessage('<?php echo $translations['A00616'][$language]; /* Successful updated status. */ ?>', 'success', '<?php echo $translations['A00617'][$language]; /* Update Status */ ?>', 'edit', 'capitalRedemptionList.php');
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
