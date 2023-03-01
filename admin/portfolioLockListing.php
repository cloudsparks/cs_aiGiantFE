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
                                                            <label class="control-label" for="">
                                                                <?php echo $translations['A00102'][$language]; /* Username */ ?>
                                                            </label>
                                                            <input id="username" type="text" class="form-control" dataName="username" dataType="text">
                                                        </div>
                                                         
                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label">
                                                               <?php echo $translations['A00148'][$language]; /* Member ID */ ?>
                                                            </label>
                                                            <input id="memberID" type="text" class="form-control" dataName="memberID" dataType="text">
                                                        </div>

                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label">
                                                                 <?php echo $translations['A00117'][$language]; /* Full Name */?>
                                                            </label>
                                                            <input id="fullname" type="text" class="form-control" dataName="fullname" dataType="text">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xs-12">
                                                    <div class="row">
                                                        <div class="col-sm-4 form-group">
                                                            <label>
                                                                Rebate Lock
                                                            </label>
                                                            <select id="rebateLock" class="form-control" dataName="rebateLock" dataType="select" >
                                                                <option value="">
                                                                    <?php echo $translations['M00369'][$language]; /* All */?>
                                                                </option>
                                                                <option value="on">
                                                                    <?php echo $translations['A01198'][$language]; /* On */?>
                                                                </option>
                                                                <option value="off">
                                                                    <?php echo $translations['A01199'][$language]; /* Off */?>
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-4 form-group">
                                                            <label>
                                                                Goldmine Lock
                                                            </label>
                                                                <select id="goldmineLock" class="form-control" dataName="goldmineLock" dataType="select" >
                                                                <option value="">
                                                                    <?php echo $translations['M00369'][$language]; /* All */?>
                                                                </option>
                                                                <option value="on">
                                                                    <?php echo $translations['A01198'][$language]; /* On */?>
                                                                </option>
                                                                <option value="off">
                                                                    <?php echo $translations['A01199'][$language]; /* Off */?>
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>


                                       
                                            </form>
                                            <div class="col-xs-12">
                                                <button id="searchBtn" type="submit" class="btn btn-primary waves-effect waves-light">
                                                    <?php echo $translations['A00051'][$language]; /* Search */ ?>
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
                            <!-- <div class="card-box p-b-0"> -->
                                <form id="updateForm" role="form">
                                    <div id="basicwizard" class="pull-in" style="display: none">
                                        <div class="tab-content b-0 m-b-0 p-t-0" style="padding-bottom: 0;">
                                            <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                            <div id="listingDiv" class="table-responsive"></div>
                                            <span id="paginateText"></span>
                                            <div class="text-center">
                                                <ul class="pagination pagination-md" id="listingPager"></ul>
                                            </div>
                                            <!-- start -->
                                            <div id="paginationOptions" class="newLineMargin" style="display: table;padding: 10px 0px;">
                                                <div style="display: inline-block;">
                                                    <span class="m-l-rem1">
                                                        <?php echo $translations['A00602'][$language]; /* with selected */ ?> : &nbsp;&nbsp;&nbsp;
                                                    </span>
                                                </div>
                                                <label style="margin-left:25px;">
                                                    Rebate Lock
                                                </label>
                                                <div id="selectionDiv" style="display: inline-block; margin-left: 5px; width: 150px">
                                                    
                                                    <select id="rebateStatus" class="m-l-rem1 form-control" dataName="rebate" dataType="select">
                                                        <option value="on">
                                                            <?php echo $translations['A01198'][$language]; /* On */ ?>
                                                        </option>
                                                        <option value="off">
                                                            <?php echo $translations['A01199'][$language]; /* Off */ ?>
                                                        </option>
                                                    </select>
                                                </div>
                                                <label style="margin-left:25px;">
                                                    Goldmine Lock
                                                </label>
                                                <div id="selectionDiv2" style="display: inline-block; margin-left: 5px; width: 150px">
                                                    <select id="goldmineStatus" class="m-l-rem1 form-control" dataName="goldmine" dataType="select">
                                                        <option value="on">
                                                            <?php echo $translations['A01198'][$language]; /* On */ ?>
                                                        </option>
                                                        <option value="off">
                                                            <?php echo $translations['A01199'][$language]; /* Off */ ?>
                                                        </option>
                                                    </select>
                                                </div>
                                                <div style="display: inline-block; margin-left:20px;">
                                                    <button id="updateBtn" class="btn btn-primary waves-effect waves-light" style="width: 100px">
                                                        <?php echo $translations['A00300'][$language]; /* Update */ ?>
                                                    </button>
                                                </div>
                                            </div>
                                            <!-- end -->
                                        </div>
                                    </div>
                                </form>
                            <!-- </div> -->
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
    var divId    = 'listingDiv';
    var tableId  = 'listingTable';
    var pagerId  = 'listingPager';
    var btnArray = {};
    var thArray  = Array(
        '<input type="checkbox" id="checkAll" >',
        '<?php echo $translations['A00148'][$language]; /* Member ID */ ?>',
        '<?php echo $translations['A00102'][$language]; /* Username */ ?>',
        '<?php echo $translations['M00035'][$language]; /* Full Name */ ?>',
        '<?php echo $translations['A00377'][$language]; /* Updated At */ ?>',   //Rebate Update Date
        'Rebate Lock',
        'Goldmine Lock',
        '<?php echo $translations['A00821'][$language]; /* Amount */ ?>'
        );
    var searchId = 'searchForm';
        
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

        $("body").keyup(function(event) {
            if (event.keyCode == 13) {
                $("#searchBtn").click();
            }
        });
        
        
        
        $('#searchBtn').click(function() {
            pagingCallBack(pageNumber, loadSearch);
        });

        $('#updateBtn').click(function() {
            var portfolioIDArr = [];
            $(".portfolioCheck:checked").each(function() {
                var checkboxID = $(this).val();
                portfolioIDArr.push(checkboxID);
            });
            var rebateStatus = $('#rebateStatus').find('option:selected').val();
            var goldmineStatus = $('#goldmineStatus').find('option:selected').val();
         
            if(portfolioIDArr.length === 0)
                showMessage('<?php echo $translations['A00613'][$language]; /* No check box selected. */ ?>', 'warning', '<?php echo $translations['A00614'][$language]; /* Update Status */ ?>', 'edit', '');

            
            else {

                var formData   = {
                    command : 'editPortfolioLock',
                    portfolioIDArr : portfolioIDArr,
                    updateLockArr : {
                        rebate   : rebateStatus,
                        goldmine   : goldmineStatus
                    }
                };
                fCallback = updateCallback;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }
        });

        
    });

    function buildCreditType (data, message){
        console.log(data);
        var html = `<option value=""><?php echo $translations['A00055'][$language]; /* All */ ?></option>`;

        $.each(data.creditList, function(i, obj) {
            html+=`<option value="${obj.value}">${obj.display}</option>`;
        });
        $("#creditType").html(html);
    }

    
    function loadDefaultListing(data, message) {
        console.log(data);
        $('#basicwizard').show();
        //set default if data.bankAccList is null
        var tableNo;
       
        if (data.listing){
            var newList = [];
            $.each(data.listing, function(k, v){

                var checkbox = `<input type="checkbox" value="${v['id']}" class="portfolioCheck" >`;

                var rebuild = {
                    checkbox : checkbox,
                    member_id : v['member_id'],
                    username : v['username'],    
                    name : v['name'],      
                    updated_at : v['updated_at'],
                    rebate_status: v['rebate_status'],
                    goldmine_status: v['goldmine_status'],
                    tier_value: v['tier_value']

                };

                newList.push(rebuild);
            });
        }
        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);
        
        // $('#listingTable > tbody > tr').each(function(index, value) {
        //     var rebateLockCell = $('td:eq(5)', this);
        //     var goldmineLockCell = $('td:eq(6)', this);
        //     var rebateLock = rebateLockCell.text();
        //     var goldmineLock = goldmineLockCell.text();
        //     rebateLockCell.text('').append($('<input />',{'value' : rebateLock, 'id': "rebateLock"}));
        //     goldmineLockCell.text('').append($('<input />',{'value' : goldmineLock, 'id': "goldmineLock"}));
        // });
    }

    function pagingCallBack(pageNumber, fCallback){
            if(pageNumber > 1) bypassLoading = 1;

            var searchData = buildSearchDataByType(searchId);
            var formData   = {
                command     : 'getPortfolioLockList',
                searchData   : searchData
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

    function updateCallback(data, message) {
        showMessage('<?php echo $translations['A00616'][$language]; /* Successful updated status. */ ?>', 'success', '<?php echo $translations['A00617'][$language]; /* Update Status */ ?>', 'edit', 'walletAddressListing.php');
    }
    
</script>
</body>
</html>
