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
                            <div class="panel-group">
                                <div class="panel panel-default bx-shadow-none">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            Add Contract Purchase Period
                                        </h4>
                                    </div>

                                    <div class="panel-body">
                                        <div id="searchMsg" class="text-center alert" style="display: none;"></div>
                                        <form id="setForm" role="form">
                                            <div class="col-xs-12">
                                                <div class="row">
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label">
                                                            Portfolio Start Month
                                                        </label>
                                                        <div class="input-daterange">
                                                            <input type="text" class="form-control" id="portfolioMonth">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label">
                                                            Purchase Start Date
                                                        </label>
                                                        <div class="input-daterange">
                                                            <input type="text" class="form-control" id="purchaseStartDate">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label">
                                                            Purchase End Date
                                                        </label>
                                                        <div class="input-daterange">
                                                            <input type="text" class="form-control" id="purchaseEndDate">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                   
                                        </form>

                                        <div class="col-xs-12">
                                            <button id="resetBtn" type="reset" class="btn btn-default waves-effect waves-light">
                                                <?php echo $translations['A00053'][$language]; /* Reset */ ?>
                                            </button>
                                            <button id="submitBtn" type="submit" class="btn btn-primary waves-effect waves-light">
                                                <?php echo $translations['A00323'][$language]; /* Submit */ ?>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End row -->

                    <!-- Start row -->
                   <!--  <div class="row">
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
                                                                Module
                                                            </label>
                                                            <select class="form-control" id="module" dataName="module" dataType="select">
                                                                <option value="">
                                                                    --Please Select--
                                                                </option>
                                                                <?php foreach($_SESSION["liveRateModules"] as $key => $value){ ?>
                                                                    <option value="<?php echo $key; ?>">
                                                                        <?php echo $value; ?>
                                                                    </option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>

                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label">
                                                                Mark Type
                                                            </label>
                                                            <div>
                                                                <input type="radio" id="markTypeInc" name="markType" value="inc" checked>
                                                                <label for="markTypeInc" style="margin-right: 100px;">Up</label>

                                                                <input type="radio" id="markTypeDec" name="markType" value="dec" style="margin-left: 100px;">
                                                                <label for="markTypeDec">Down</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xs-12">
                                                    <div class="row">
                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label">
                                                                Crypto Type
                                                            </label>
                                                            <select class="form-control" id="cryptoType" dataName="cryptoType" dataType="select">
                                                                <option value="">
                                                                    --Please Select--
                                                                </option>
                                                                <?php foreach($_SESSION["coinTypeArr"] as $key => $value){ ?>
                                                                    <option value="<?php echo $value['value']; ?>">
                                                                        <?php echo $value['display']; ?>
                                                                    </option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>

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
                    </div> -->
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

    <div class="modal fade" id="editPortfolioModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-modal="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <span id="canvasTitle" class="modal-title">
                        Add Contract Purchase Period
                    </span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body modalBodyFont">
                    <form id="setForm" role="form">
                        <div class="col-xs-12">
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label class="control-label">
                                        Portfolio Start Month
                                    </label>
                                    <div class="input-daterange">
                                        <input type="text" class="form-control" id="editPortfolioMonth">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label class="control-label">
                                        Purchase Start Date
                                    </label>
                                    <div class="input-daterange">
                                        <input type="text" class="form-control" id="editPurchaseStartDate">
                                    </div>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label class="control-label">
                                        Purchase End Date
                                    </label>
                                    <div class="input-daterange">
                                        <input type="text" class="form-control" id="editPurchaseEndDate">
                                    </div>
                                </div>
                            </div>
                        </div>                                   
                    </form>
                </div>
                <div class="modal-footer" style="border-top: none;">
                    <button class="btn btn-primary waves-effect waves-light" data-dismiss="modal">Close</button>
                    <button id="editSubmitBtn" type="submit" class="btn btn-primary waves-effect waves-light" data-dismiss="modal">
                        <?php echo $translations['A00323'][$language]; /* Submit */ ?>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery  -->
    <?php include("shareJs.php"); ?>

<script>

    // Initialize all the id in this page
    var divId    = 'markDownRateDiv';
    var tableId  = 'markDownRateTable';
    var pagerId  = 'markDownRatePager';
    var btnArray = {};
    var thArray  = Array(
            'Purchase Start Date',
            'Purchase End Date',
            'Month',
            'Edit',
            'Updated At',
            'Updated By'
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
    var saveData;

    $(document).ready(function() {
        setTodayDatePicker();

        formData = {
            command   : 'getContractPurchaseDate'
        };
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $('#submitBtn').click(function() {
            $('.text-danger').text("");
            var startDateTS = $('#purchaseStartDate').val();
            var endDateTS = $('#purchaseEndDate').val();
            var contractStartTS = $('#portfolioMonth').val();
            contractStartTS = contractStartTS==""?"":new Date(contractStartTS).getTime()/1000;
            startDateTS = startDateTS==""?"":new Date(startDateTS).getTime()/1000;
            endDateTS = endDateTS==""?"": new Date(endDateTS).getTime()/1000;

            var formData = {
                'command'       : 'addContractPurchaseDate',
                startDateTS     : startDateTS,
                endDateTS       : endDateTS,
                contractStartTS : contractStartTS
            };
            fCallback = addContractPurchaseSetting;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });

        $('#resetBtn').click(function() {
            $('#setForm').find('input:not([type=radio])').each(function() {
               $(this).val(''); 
            });
        });
    });

    function seeAllBtn() {
        var searchID = 'searchForm';
        var searchData = buildSearchDataByType(searchID);
        formData  = {
            command : 'getContractPurchaseDate',
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
            'Purchase Start Date',
            'Purchase End Date',
            'Month',
            'Updated At',
            'Updated By'
        );
        var key = Array(
            'start_date',
            'end_date',
            'contract_start',
            'updated_at',
            'updated_by'
        );
        var formData = {
            command: "getContractPurchaseDate",
            filename: "contractPurchasePeriodList",
            searchData: searchData,
            header: thArray,
            key: key,
            DataKey: "list",
            type: 'export'
        };

        fCallback = exportExcel;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }
    
    function loadDefaultListing(data, message) {
        $('#basicwizard').show();
        $('#exportBtn').show();
        $('#seeAllBtn').show();
        
        var tableNo;
        saveData = data.list;
        if (data.list) {
            var newList = [];
            $.each(data.list, function(k, v){
                var editBtn = `<a data-toggle="tooltip" title="" onclick="editContractModal(${k})" class="btn btn-icon waves-effect waves-light btn-primary" data-original-title="Edit"><i class="fa fa-edit"></i></a>`;
                var rebuild = {
                    start_date      : v['start_date'],
                    end_date        : v['end_date'],
                    contract_start  : v['contract_start'],
                    editBtn         : editBtn,      
                    updated_at      : v['updated_at'],
                    updated_by      : v['updated_by']
                };

                newList.push(rebuild);
            });
        }
        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);
    }

    function editContractModal(k){
        var contractData = saveData[k];
        var getCurrDate = new Date(contractData.start_date).getTime();
        var today = new Date().getTime();

        if(getCurrDate <= today){
            $('#editPurchaseStartDate').attr('disabled',true)
        }else{
            $('#editPurchaseStartDate').attr('disabled',false)
        }
        $('#editPortfolioMonth').val(contractData.contract_start);
        $('#editPurchaseStartDate').val(contractData.start_date);
        $('#editPurchaseEndDate').val(contractData.end_date);
        $('#editPortfolioModal').modal('show');

        $("#editSubmitBtn").click(function(){
            $('.text-danger').text("");
            var contract_id = contractData.id;

            var startDateTS = $('#editPurchaseStartDate').val();

            var endDateTS = $('#editPurchaseEndDate').val();

            var contractStartTS = $('#editPortfolioMonth').val();

            contractStartTS = contractStartTS==""?"":new Date(contractStartTS).getTime()/1000;
            startDateTS = startDateTS==""?"":new Date(startDateTS).getTime()/1000;
            endDateTS = endDateTS==""?"": new Date(endDateTS).getTime()/1000;
            var formData = {
                'command'       : 'editContractPurchaseDate',
                contract_id     : contract_id,
                startDateTS     : startDateTS,
                endDateTS       : endDateTS,
                contractStartTS : contractStartTS
            };

            fCallback = editContractPurchaseSetting;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });
    }

    function addContractPurchaseSetting(data, message) {
        showMessage(message, 'success', 'Congratulations', '', 'contractPurchasePeriodSetting.php');
    }

    function editContractPurchaseSetting(data, message) {
        $('#editPortfolioModal').modal('hide');
        showMessage(message, 'success', 'Congratulations', '', 'contractPurchasePeriodSetting.php');
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
        
        $('#portfolioMonth').datepicker({
            singleDatePicker: true,
            timePicker: false,
            startView: 1,
            format: 'yyyy-mm-dd'
        });

        $('#purchaseStartDate , #purchaseEndDate').daterangepicker({
            singleDatePicker: true,
            timePicker: false,
            locale: {
                format: 'YYYY-MM-DD'
            }
        });

        $('#editPortfolioMonth').datepicker({
            singleDatePicker: true,
            timePicker: false,
            startView: 1,
            format: 'yyyy-mm-dd'
        });

        $('#editPurchaseStartDate , #editPurchaseEndDate').daterangepicker({
            singleDatePicker: true,
            timePicker: false,
            locale: {
                format: 'YYYY-MM-DD'
            }
        });
        var dateToday = $('#purchaseStartDate , #purchaseEndDate , #editPurchaseStartDate , #editPurchaseEndDate').val('');
    }

</script>
</body>
</html>
