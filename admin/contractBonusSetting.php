<?php 
    session_start();

    // Get current page name
    $thisPage = basename($_SERVER['PHP_SELF']);
    $trancheList = $_SESSION['trancheList'];
    $contractProductList = $_SESSION['contractProductList'];
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
                        <form id="addForm" role="form">
                            <div class="col-lg-12">
                                <div class="panel-group">
                                    <div class="panel panel-default bx-shadow-none">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                Update Contract Headcount Setting
                                            </h4>
                                        </div>

                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-sm-5 form-group">
                                                    <label class="control-label">
                                                        Tranche
                                                    </label>
                                                    <select class="form-control" id="trancheOption">
                                                        <option value="">--Please Select--</option>
                                                       <?php foreach($_SESSION["trancheList"] as $key => $value){ ?>
                                                            <option value="<?php echo $value['id']; ?>">
                                                                <?php echo $value['display']; ?>
                                                            </option>
                                                       <?php } ?>
                                                    </select>
                                                    <span id="codeError" class="errorSpan text-danger"></span>
                                                </div>
                                                <div class="col-sm-3 form-group">
                                                    <label class="control-label">
                                                        Current Tranche's Contract Headcount
                                                    </label>
                                                    <input class="form-control" id="trancheHeadcount" disabled style="width: 80px;">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-5 form-group">
                                                    <label class="control-label">
                                                        Headcount adjust to
                                                    </label>
                                                    <input class="form-control" id="setQuantity">
                                                    <span id="quantityError" class="errorSpan text-danger"></span>
                                                </div>
                                                <div class="col-xs-12">
                                                    <button id="resetBtn" type="reset" class="btn btn-default waves-effect waves-light">
                                                        <?php echo $translations['A00053'][$language]; /* Reset */ ?>
                                                    </button>
                                                    <button id="submitBtn" type="button" class="btn btn-primary waves-effect waves-light">
                                                        <?php echo $translations['A00323'][$language]; /* Submit */ ?>
                                                    </button>
                                                </div> 
                                            </div>
                                            

                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- End row -->

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
                                                <div class="col-sm-12 px-0">
                                                    <div class="col-sm-4 form-group" id="datepicker">
                                                        <label class="control-label">
                                                            Date
                                                        </label>
                                                        <div class="input-daterange input-group" id="datepicker-range">
                                                            <input id="dateRangeStart" type="text" class="form-control"
                                                                   name="start" dataName="date" dataType="dateRange">
                                                            <div class="input-group-addon">
                                                                <?php echo $translations['A00139'][$language]; /* to */ ?>
                                                            </div>
                                                            <input id="dateRangeEnd" type="text" class="form-control"
                                                                   name="end" dataName="date" dataType="dateRange">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            Tranche
                                                        </label>
                                                        <select class="form-control" id="module" dataName="tranche" dataType="select">
                                                           <option value="">All</option>
                                                           <?php foreach($_SESSION["trancheList"] as $key => $value){ ?>
                                                                <option value="<?php echo $value['id']; ?>">
                                                                    <?php echo $value['display']; ?>
                                                                </option>
                                                           <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </form>

                                            <div class="col-xs-12 m-t-rem1">
                                                <button id="searchBtn" type="button"
                                                        class="btn btn-primary waves-effect waves-light">
                                                    <?php echo $translations['A00051'][$language]; /* Search */ ?>
                                                </button>
                                                <button id="resetBtn2" type="button"
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
                    <!-- End row -->

                    <!-- Start row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <button type="button" onclick="exportBtn()" class="btn btn-primary waves-effect waves-light m-b-rem1" style="display:none" id="exportBtn"><?php echo $translations['A01352'][$language]; /*Export to xlsx*/ ?></button>
                            <button type="button" onclick="seeAllBtn()" class="btn btn-primary waves-effect waves-light " style="margin-bottom: 10px; display: none;" id="seeAllBtn">
                                <?php echo $translations['A01191'][$language]; /*See All*/ ?>
                            </button>
                            <form>
                                
                                <div id="basicwizard" class="pull-in" style="display: none">
                                    <div class="tab-content b-0 m-b-0 p-t-0" style="padding-bottom: 0;">
                                        <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                        <div id="markDownRateDiv" class="table-responsive"></div>
                                        <span id="paginateText"></span>
                                        <div class="text-center">
                                            <ul class="pagination pagination-md" id="markDownRatePager"></ul>
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
    var divId    = 'markDownRateDiv';
    var tableId  = 'markDownRateTable';
    var pagerId  = 'markDownRatePager';
    var btnArray = {};
    var thArray  = Array(
            'Tranche Range',
            'Contract ID',
            'Contract Headcount',
            'Previous Headcount',
            'Headcount Adjustment',
            'Current Headcount',
            'Done By',
            'Updated Date'
        );
    var searchId = 'searchForm';
    var coinLiveRate = {};
    var coinDisplay = {};
        
    // Initialize the arguments for ajaxSend function
    var url             = 'scripts/reqAdmin.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";

    $(document).ready(function() {

        formData = {
            command   : 'getTrancheQuantityList'
        };
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $('#submitBtn').click(function() {
            $('.text-danger').text("");
            var trancheCode = $('#trancheOption option:selected').val();
            var setQuantity = $('#setQuantity').val();

            var formData = {
                'command'       : 'adminSetTrancheQuantity',
                trancheCode     : trancheCode,
                setQuantity     : setQuantity
            };
            fCallback = setTrancheQuantitySuccess;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });

        $('#trancheOption').on('change', function() { 

            var trancheCode = $('#trancheOption option:selected').val();

            formData = {
                command   : 'getTrancheHeadCount',
                trancheCode : trancheCode
            };
            fCallback = loadHeadCount;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });

        $('#searchBtn').click(function () {
            pagingCallBack(pageNumber, loadSearch);
        });

        $('#resetBtn').click(function() {
              $('#addForm').find('input:not([type=radio])').each(function() {
                  $(this).val(''); 
              });
              $('#addForm').find('select').each(function() {
                  $(this).val('all');
              });
          });

        $('#resetBtn2').click(function () {
            $('#alertMsg').removeClass('alert-success').html('').hide();
            $('#searchForm').find('input:not([type=radio])').each(function () {
                $(this).val('');
            });
            $('#searchForm').find('select').each(function () {
                $(this).val('');
                $("#searchForm")[0].reset();
            });

        });

        $('#datepicker input').each(function () {
            $(this).datepicker('clearDates');
        });
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

    function seeAllBtn() {
        var searchID = 'searchForm';
        var searchData = buildSearchDataByType(searchID);
        formData  = {
            command : 'getTrancheQuantityList',
            inputData   : searchData,
            pageNumber   : 1,
            seeAll   : 1
        };
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function exportBtn() {
        var searchID = 'searchForm';
        var searchData = buildSearchDataByType(searchID);
        var thArray = Array(
            'Contract Type',
            'Rebate Percentage',
            'Direct Sponsor Percentage',
            'Month',
            'Updated At',
            'Updated By'
        );
        var key = Array(
            'contractType',
            'rebateBonus',
            'sponsorBonus',
            'month',
            'updatedAt',
            'updaterBy',
        );
        var formData = {
            command: "getTrancheQuantityList",
            filename: "contractBonusListing",
            searchData: searchData,
            header: thArray,
            key: key,
            DataKey: "contractList",
            type: 'export'
        };

        fCallback = exportExcel;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function pagingCallBack(pageNumber, fCallback) {
        if (pageNumber > 1) bypassLoading = 1;

        var searchData = buildSearchDataByType(searchId);
        console.log(searchData)
        var formData = {
            command: "getTrancheQuantityList",
            pageNumber: pageNumber,
            searchData: searchData,
            usernameSearchType: $("input[name=usernameType]:checked").val(),

        };

        if (!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }
    
    function loadDefaultListing(data, message) {
        $('#basicwizard').show();
        $('#exportBtn').show();
        $('#seeAllBtn').show();
                
        var tableNo;
        if (data.setTrancheQuantityList) {
            var newList = [];
            $.each(data.setTrancheQuantityList, function(k, v){

                var rebuild = {
                    trancheRange   : v['trancheRange'],
                    contractID    : v['contractID'],
                    contractHeadcount   : v['contractHeadcount'],
                    previousHeadcount   : v['previousHeadcount'],
                    headcountAdjust     : v['headcountAdjust'],
                    currentHeadcount    : v['currentHeadcount'],
                    doneBy    : v['doneBy'],
                    updatedDate    : v['updatedDate'],
                };

                newList.push(rebuild);
            });
        }
        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);
    }

    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span><?php echo $translations['A00114'][$language]; /* Search successful. */ ?></span>').show();
        setTimeout(function () {
            $('#searchMsg').removeClass('alert-success').html('').hide();
        }, 3000);
    }

    function loadHeadCount(data, message) {
        $('#trancheHeadcount').val(data.currentHeadcount);
    }

    function setTrancheQuantitySuccess(data, message) {
        showMessage(message, 'success', 'Congratulations', '', 'contractBonusSetting.php');
    }

</script>
</body>
</html>
