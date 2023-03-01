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
                <!-- Start container -->
                <div class="container">
                    <!-- Start row -->
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
                                                                <?php echo $translations['A00137'][$language]; /* Date */ ?>
                                                            </label>
                                                            <div class="input-group input-daterange">
                                                                <input type="text" class="form-control" dataName="createdAt"
                                                                       dataType="dateRange">
                                                                <span class="input-group-addon">
                                                                    <?php echo $translations['A00139'][$language]; /* to */ ?>
                                                                </span>
                                                                <input type="text" class="form-control" dataName="createdAt"
                                                                       dataType="dateRange">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label">
                                                                <?php echo $translations['A00102'][$language]; /* Username */ ?>
                                                            </label>
                                                            <input type="text" class="form-control" dataName="username" dataType="text">
                                                        </div>
                                                        <!-- <div class="row"> -->
                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label">
                                                                Credit Type
                                                            </label>
                                                            <select class="form-control" id="creditType" dataName="creditType" dataType="select">
                                                            </select>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="col-xs-12">
                                                    <div class="row">
                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label">
                                                                <?php echo $translations['A01109'][$language]; /* Leader Username */ ?>
                                                            </label>
                                                            <input type="text" class="form-control" dataName="leaderUsername" dataType="text">
                                                        </div>
                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label">
                                                                <?php echo $translations['A01349'][$language]; /* Main Leader Username */ ?>
                                                            </label>
                                                            <input type="text" class="form-control" dataName="mainLeaderUsername" dataType="text">
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
                    <!-- End row -->

                    <!-- Start row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <form>
                                <div id="basicwizard" class="pull-in" style="display: none">
                                    <div class="tab-content b-0 m-b-0 p-t-0" style="padding-bottom: 0;">
                                        <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                        <div id="purchaseCreditListDiv" class="table-responsive"></div>
                                        <span id="paginateText"></span>
                                        <div class="text-center">
                                            <ul class="pagination pagination-md" id="pagePurchaseCreditList"></ul>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- End row -->
                </div>
                <!-- container -->
            </div>
            <!-- content -->
            <?php include("footer.php"); ?>
        </div>
        <!-- End content-page -->


        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <script>
        var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <?php include("shareJs.php"); ?>

<script>

    // Initialize all the id in this page
    var divId    = 'purchaseCreditListDiv';
    var tableId  = 'purchaseCreditListTable';
    var pagerId  = 'pagePurchaseCreditList';
    var btnArray = {};
    var thArray  = Array(
            'Date',
            'Member ID',
            'Username',
            'Main Leader Username',
            'Credit Type',
            'Purchase Amount',
            'Done By',
            'Remarks'
        );
        
    // Initialize the arguments for ajaxSend function
    var url            = 'scripts/reqAdmin.php';
    var method         = 'POST';
    var debug          = 0;
    var bypassBlocking = 0;
    var bypassLoading  = 0;
    var pageNumber     = 1;

    $(document).ready(function() {
        var formData = {
            'command'   : 'getPurchaseCreditInfo'
        };

        fCallback = loadData;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0)

        $('#searchBtn').click(function() {
            pagingCallBack(pageNumber, loadSearch);
        });
        
        $('#resetBtn').click(function() {
            $('#alertMsg').removeClass('alert-success').html('').hide();
            $('#searchForm').find('input:not([type=radio])').each(function() {
               $(this).val(''); 
            });
            $('#searchForm').find('select').val('');
        });

    
        $('.input-daterange input').each(function() {
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

    function loadData(data, message) {
        if(data) {
            $('#fromUsername').attr('value', data.creditData[0].fromUsername);
            $('#balance').attr('value', data.creditData[0].balance);
            creditData = data.creditData;
            var creditType = ``;
            $.each(creditData, function(k, v) {
                creditType += `
                    <option id="${k}" value='${v['name']}'>${v['display']}</option>
                `;
            });
            $('#creditType').html(creditType);
        } else {
            showMessage('', 'warning', 'Error');
        }
    }
    function loadDefaultListing(data, message) {
        var tableNo;
        if(data.listing) {
            var newList = [];
            $.each(data.listing, function(k, v) {
                var rebuildData = {
                    created_at : v['created_at'],
                    member_id : v['member_id'],
                    username : v['username'],
                    mainLeaderUsername : v['mainLeaderUsername'],
                    credit_type : v['credit_type'],
                    amount : v['amount'],
                    created_by : v['created_by'],
                    remark : v['remark']
                };
                newList.push(rebuildData);
            });
        }
        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        $('#'+tableId).find('tbody tr').each(function(){
            $(this).find("td:eq(5)").css("text-align", "right");
        });

        $('#basicwizard').show();
    }

    function pagingCallBack(pageNumber, fCallback){
        var searchId   = 'searchForm';
        var searchData = buildSearchDataByType(searchId);

        if(pageNumber > 1) bypassLoading = 1;
        
        var formData = {
            command     : "getPurchaseCreditListing",
            searchData  : searchData,
            pageNumber  : pageNumber
        };
        
        if(!fCallback)
            fCallback = loadDefaultListing;

        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }
    
    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span><?php echo $translations['A00114'][$language]; /* Search successful. */ ?></span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide(); 
        }, 3000);
    }
    
</script>
</body>
</html>