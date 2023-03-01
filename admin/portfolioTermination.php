<?php 
session_start();
$thisPage = basename($_SERVER['PHP_SELF']);
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
                                                        <label class="control-label" for="">
                                                            <?php echo $translations['A00148'][$language]; /* Member ID */ ?>
                                                        </label>
                                                        <input id="memberID" type="text" class="form-control" dataName="memberID" dataType="text">
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
                        <form>
                            <div id="basicwizard" class="pull-in" style="display: none">
                                <div class="tab-content b-0 m-b-0 p-t-0" style="padding-bottom: 0;">
                                    <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                    <div id="listingDiv" class="table-responsive"></div>
                                    <span id="paginateText"></span>
                                    <div class="text-center">
                                        <ul class="pagination pagination-md" id="listingPager"></ul>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div id="updateDiv" style="display: none;">
                            <span>
                                <?php echo $translations['A00663'][$language]; /* With selected */ ?> : 
                            </span>
                            <div id="selectionDiv" style="display: inline-block; margin-left: 5px; width: 150px">
                                <select id="statusSelect" class="m-l-rem1 form-control">
                                    <option value="Terminate" selected>
                                        Terminate
                                    </option>
                                    <option value="Pending">
                                        Pending
                                    </option>
                                    <option value="Reject">
                                        Reject
                                    </option>
                                </select>
                            </div>
                            <div style="display: inline-block; margin-left:20px;">
                                <button type="" id="updateBtn" class="btn btn-primary waves-effect waves-light" style="width: 100px">
                                    <?php echo $translations['A00300'][$language]; /* Update */ ?>
                                </button>
                            </div>
                        </div>
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
    var divId    = 'listingDiv';
    var tableId  = 'listingTable';
    var pagerId  = 'listingPager';
    var btnArray = {};
    var thArray  = Array(
        '',
        'Date',
        '<?php echo $translations['A00148'][$language]; /* Member ID */ ?>',
        '<?php echo $translations['A00102'][$language]; /* Username */ ?>',
        'Total Principle Amount (USDT)',
        'Total Income Earning',
        'Termination Fee',
        'Amount Receivable',
        'Status',
        );
    var url            = 'scripts/reqClient.php';
    var method         = 'POST';
    var debug          = 0;
    var bypassBlocking = 0;
    var bypassLoading  = 0;
    var pageNumber     = 1;
    var activityDate   = ""; 

    $(document).ready(function() {

        var formData = {
            command      : "portfolioTerminateRequestList",
            pageNumber   : pageNumber
        };

        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $('#searchBtn').click(function() {
            pagingCallBack(pageNumber, loadSearch);
        });

        $('#resetBtn').click(function() {
            $('#alertMsg').removeClass('alert-success').html('').hide();
            $('#searchForm').find('input:not([type=radio])').each(function() {
                $(this).val(''); 
            });
            $('#searchForm').find('select').val('');
            setTodayDatePicker();
        });



        $('#updateBtn').click(function() {
            var checkedIDs = [];
            $('.checkKyc:checked').each(function() {
                var checkboxID = $(this).val();
                checkedIDs.push(checkboxID);
            });
            if(checkedIDs.length === 0)
                showMessage('<?php echo $translations['A00613'][$language]; /* No check box selected. */ ?>', 'warning', '<?php echo $translations['A00614'][$language]; /* Update Status */ ?>', 'edit', '');
            else {
                var formData   = {
                    command : 'terminatePortfolioByBatch',
                    clientIDAry : checkedIDs,
                    status : $('#statusSelect').val(),
                    remark : $('#remark').val()
                };
                fCallback = updateCallback;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }
        });
    });

    function loadDefaultListing(data, message) {

        $('#basicwizard').show();

        var terminatePortfolio = data.list;
        if (terminatePortfolio){
            var newData = [];
            $.each(terminatePortfolio, function(i, obj){
                var checkbox = '';
                var action = '';
                if(obj.status == 'Pending Terminate') {
                    var action = `
                    <a data-toggle="tooltip" title="" onclick="portfolioTermination('${obj.client_id}')" class="btn btn-icon waves-effect waves-light btn-primary" data-original-title="Terminate" aria-describedby="" style="margin:0px 4px 0px 4px">
                    <i class="fa fa-check"></i>
                    </a>`;
                    checkbox = `<input type="checkbox" class="checkKyc" value="${obj.client_id}">`;
                }

                var rebuild = {
                    check: checkbox,
                    terminated_at: obj.terminated_at,
                    memberID: obj.memberID,
                    username: obj.username,
                    totalPrinciple: obj.totalPrinciple,
                    totalEarningAmount : obj.totalEarningAmount,
                    terminatedFees: obj.terminatedFees,
                    amountReceivable: obj.amountReceivable,
                    status: obj.status,
                    action : action
                };

                newData.push(rebuild);
            });

            $("#updateDiv").show();
        }

        var tableNo;
        buildTable(newData, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);
    }

    function pagingCallBack(pageNumber, fCallback){
        var searchId   = 'searchForm';
        var searchData = buildSearchDataByType(searchId);

        if(pageNumber > 1) bypassLoading = 1;

        var formData = {
            command      : "portfolioTerminateRequestList",
            searchData    : searchData,
            pageNumber   : pageNumber
        };

        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }


    function portfolioTermination(clientID){
        var formData = {
            command      : "terminatePortfolio",
            client_id    : clientID,
        };
        fCallback = updateCallback;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function setSearchOption(data, searchVal) {
        $('#searchForm #activityType').find('option:not(:first-child)').remove();
        $.each(data, function(key, val) {
            $('#searchForm #activityType').append('<option value="' + val['activityType'] + '">' + val['activityType'] + '</option>');
        });
        if (searchVal != ' '){
            $('#searchForm #activityType').val(searchVal);
        }
    }

    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span><?php echo $translations['A00114'][$language]; /* Search successful. */ ?></span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide(); 
        }, 3000);
    }

    function updateCallback(data, message) {
        showMessage('<?php echo $translations['A00616'][$language]; /* Successful updated status. */ ?>', 'success', '<?php echo $translations['A00617'][$language]; /* Update Status */ ?>', 'edit', 'portfolioTermination.php');
    }

</script>
</body>
</html>