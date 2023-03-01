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
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapse">
                                                <?php echo $translations['A00051'][$language]; /* Search */ ?>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div id="searchMsg" class="text-center alert" style="display: none;"></div>
                                            <form id="searchForm" role="form">
                                                <!--< div class="col-sm-4 form-group">
                                                    <label class="control-label">
                                                        <?php echo $translations['A00101'][$language]; /* Name */ ?>
                                                    </label>
                                                    <input type="text" class="form-control" dataName="name" dataType="text">
                                                </div> -->
                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label">
                                                        <?php echo $translations['A00102'][$language]; /* Username */ ?>
                                                    </label>
                                                    <input type="text" class="form-control" dataName="username" dataType="text">
                                                </div>
                                                <!-- <div class="col-sm-4 form-group">
                                                    <label class="control-label" for="" data-th="email">
                                                        <?php echo $translations['A00103'][$language]; /* Email */ ?>
                                                    </label>
                                                    <input type="text" class="form-control" dataName="email" dataType="text">
                                                </div> -->
                                                <!-- <div class="col-sm-4 form-group">
                                                    <label class="control-label" data-th="role_id">Role Name</label>
                                                    <select id="roleName" class="form-control">
                                                    </select>
                                                </div> -->
                                                <!-- <div class="col-sm-4 form-group">
                                                    <label class="control-label" data-th="disabled">
                                                        <?php echo $translations['A00104'][$language]; /* Disabled */ ?>
                                                    </label>
                                                    <select class="form-control" dataName="disabled" dataType="select">
                                                        <option value="">
                                                            <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                        </option>
                                                        <option value="1">
                                                            <?php echo $translations['A00056'][$language]; /* Yes */ ?>
                                                        </option>
                                                        <option value="0">
                                                            <?php echo $translations['A00057'][$language]; /* No */ ?>
                                                        </option>
                                                    </select>
                                                </div> -->
                                                <div class="col-sm-4 form-group" id="datepicker" >
                                                    <label class="control-label" data-th=""><?php echo $translations['A00564'][$language]; /* Created at */ ?></label>
                                                    <div class="input-daterange input-group" id="datepicker-range">
                                                    <input id="dateRangeStart" type="text" class="form-control" name="start" dataName="transactionDateRange" dataType="dateRange">
                                                    <div class="input-group-addon">
                                                        <?php echo $translations['A00139'][$language]; /* to */?>
                                                    </div>
                                                    <input id="dateRangeEnd" type="text" class="form-control" name="end" dataName="transactionDateRange" dataType="dateRange">
                                                    </div>
                                                </div>
                                            </form>
                                            <!-- hidden -->
                                            <!-- <form id="adminType" role="form" style="display:none;">
                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label" for="" data-th="name">Admin Type</label>
                                                    <input type="text" class="form-control" value="Admin">
                                                </div>
                                            </form> -->

                                            <div class="col-xs-12 m-t-rem1">
                                                <button id="searchBtn" type="submit" class="btn btn-primary waves-effect waves-light">
                                                    <?php echo $translations['A00051'][$language]; /* Search */ ?>
                                                </button>
                                                <button id="resetBtn" type="submit" class="btn btn-default waves-effect waves-light">
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
                            <div class="card-box p-b-0">
                                <form>
                                    <input id="agentID" type="hidden" value="">
                                    <div id="basicwizard" class="pull-in">
                                        <div class="tab-content b-0 m-b-0 p-t-0">
                                            <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                            <div id="agentInListDiv" class="table-responsive">
                                                <caption>IN</caption><br>
                                            </div>
                                            <span id="paginateText"></span>
                                        </div>
                                    </div>
                                    <div id="basicwizard" class="pull-in">
                                        <div class="tab-content b-0 m-b-0 p-t-0">
                                            <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                            <div id="agentOutListDiv" class="table-responsive">
                                                <caption>OUT</caption><br>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div id="basicwizard" class="pull-in">
                                        <div class="tab-content b-0 m-b-0 p-t-0">
                                            <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                            <div id="agentNettListDiv" class="table-responsive">
                                                <caption>NETT</caption><br>
                                            </div>
                                            <div id="saveButtonDiv" class="col-md-12 m-b-20" hidden>
                                                <!-- <button type="submit" class="btn btn-default waves-effect waves-light">Cancel</button> -->
                                                <button id="add" type="button" class="btn btn-primary waves-effect waves-light">
                                                    <?php echo $translations['A01006'][$language]; /* Save */ ?>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <span id="paginateText"></span>
                                    <div class="text-center">
                                        <ul class="pagination pagination-md" id="pagerAgentList"></ul>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!-- End row -->

                </div> <!-- container -->

            </div> <!-- content -->

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
    var divInId    = 'agentInListDiv';
    var divOutId    = 'agentOutListDiv';
    var divNettId    = 'agentNettListDiv';
    var tableInId  = 'agentInListTable';
    var tableOutId  = 'agentOutListTable';
    var tableNettId  = 'agentNettListTable';
    var pagerInId  = 'pagerAgentInList';
    var pagerOutId  = 'pagerAgentOutList';
    var pagerNettId  = 'pagerAgentNettList';
    var btnArray = {};    
    var thArrayIn  = Array('Currency',
                         'External',
                         'P2P',
                         'Admin',
                         'Total'
                        );
    var thArrayOut  = Array('Currency',
                         'External',
                         'P2P',
                         'Admin',
                         'Total'
                        );
    var thArrayNett  = Array('Currency',
                             'Nett',
                             'Paid Out',
                             'Balance',
                            );
    var searchId = 'searchForm';
        
    // Initialize the arguments for ajaxSend function
    var url             = 'scripts/reqAgent.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";  

    $(document).ready(function() {

        fCallback = loadDefaultListing;
        formData  = {command: 'getAgentSummary', pageNumber: pageNumber};
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            
        //reset to default search
        $('#resetBtn').click(function() {
            $('#alertMsg').removeClass('alert-success').html('').hide();
            $('#searchForm').find('input').each(function() {
               $(this).val(''); 
            });
            $('#searchForm').find('select').each(function() {
                $(this).val('');
            $("#searchForm")[0].reset();
            });

        });
        
        $('#searchBtn').click(function() {
            pagingCallBack(pageNumber, loadSearch);
        }); 

        $('#datepicker input').each(function() {
            $(this).datepicker('clearDates');
        });


        $('#add').click(function() {
            var paidOutData = {};
            var balanceData = {};
            var agentID = $("#agentID").val();

            $("input[name=paidOut]").each(function(){
                paidOutData[$(this).attr("id")] = $(this).val();
            });

            $("input[name=balance]").each(function(){
                balanceData[$(this).attr("id")] = $(this).val();
            });
            
            var formData = {
                command  : "updateAgentSummary",
                agentID  : agentID,
                paidOutData : paidOutData,
                balanceData : balanceData,
            };

            var fCallback = saveSummary;

            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            
        });
    });

    $('#dateRangeStart').datepicker({
        // language: language,
        format      : 'dd/mm/yyyy',
        orientation : 'auto',
        autoclose   : true
    });

    $('#dateRangeEnd').datepicker({
        // language: language,
        format      : 'dd/mm/yyyy',
        orientation : 'auto',
        autoclose   : true
    });

    function pagingCallBack(pageNumber, fCallback){
        if(pageNumber > 1) bypassLoading = 1;

        var searchData = buildSearchDataByType(searchId);
        var formData   = {
            command     : "getAgentSummary",
            pageNumber  : pageNumber,
            inputData   : searchData
        };

        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }
    
    function loadDefaultListing(data, message) {
        var tableNo1, tableNo2, tableNo3;
        var inSummary = data.summaryList.IN;
        var outSummary = data.summaryList.OUT;
        var nettSummary = data.summaryList.NETT;

        $("#agentID").val(data.agentID);

        // build IN summary table
        if(data != "" && inSummary.length>0) {
            var newInList = [];
            var j = 0;
            // console.log(inSummary);
            $.each(inSummary, function(k, v) {
                var rebuildInData = {
                    currency : v['creditType'],
                    fundIn : v['fundIn'],
                    trade : v['trade'],
                    admin : v['admin'],
                    total : v['totalAmount'],
                };
                ++j;
                newInList.push(rebuildInData);
            });

            buildTable(newInList, tableInId, divInId, thArrayIn, btnArray, message, tableNo1);
            
        }

        // build OUT summary table
        if(data != "" && outSummary.length>0) {
            var newOutList = [];
            var j = 0;
            $.each(outSummary, function(k, v) {

                var rebuildOutData = {
                    currency : v['creditType'],
                    fundIn : v['fundIn'],
                    trade : v['trade'],
                    admin : v['admin'],
                    total : v['totalAmount'],
                };
                ++j;
                newOutList.push(rebuildOutData);
            });

            buildTable(newOutList, tableOutId, divOutId, thArrayOut, btnArray, message, tableNo2);
        }

        // build OUT summary table
        if(data != "" && nettSummary.length>0) {
            var newNettList = [];
            var j = 0;
            $.each(nettSummary, function(k, v) {

                var rebuildNettData = {
                    currency : v['creditType'],
                    nett : v['nett'],
                    paidOut : '<input id="'+v['creditType']+'" name="paidOut" value="'+v['paidOut']+'", type="text">',
                    balance : '<input id="'+v['creditType']+'" name="balance" value="'+v['balance']+'", type="text">',

                };
                ++j;
                newNettList.push(rebuildNettData);
            });

            buildTable(newNettList, tableNettId, divNettId, thArrayNett, btnArray, message, tableNo3);
            $("#saveButtonDiv").show();
        }

        pagination(pagerInId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);
    }
    
    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span><?php echo $translations['A00114'][$language]; /* Search successful. */ ?></span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide(); 
        }, 3000);
    }

    function saveSummary(data, message){
        showMessage('<?php echo $translations['A00684'][$language]; /* Successful created new admin. */ ?>', 'success', 'Agent Summary', 'user-plus', 'agentSummary.php');
    }
    
   
</script>
</body>
</html>
