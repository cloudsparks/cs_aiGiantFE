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
                                            <form id="searchFundInHistory" role="form">
                                             <div class="col-sm-12 px-0">
                                                <!-- <div class="col-sm-4 form-group">
                                                    <label class="control-label" for="">
                                                        Date
                                                    </label>
                                                    <input id="searchDate" type="text" class="form-control" dataName="searchDate" dataType="singleDate">
                                                </div> -->
                                                <div class="col-sm-3 form-group" id="datepicker" >
                                                    <label class="control-label" data-th="date">Created Date</label>
                                                    <div class="input-daterange input-group" id="datepicker-range">
                                                        <input id="dateRangeStart" type="text" class="form-control" name="start" dataName="createdAt" dataType="dateRange" autocomplete="off">
                                                        <div class="input-group-addon">
                                                            <?php echo $translations['A00941'][$language]; /* to */?>
                                                        </div>
                                                        <input id="dateRangeEnd" type="text" class="form-control" name="end" dataName="createdAt" dataType="dateRange">
                                                    </div>
                                                </div>

                                                <div class="col-sm-3 form-group" id="datepicker2" >
                                                    <label class="control-label" data-th="date">Actived Date</label>
                                                    <div class="input-daterange input-group" id="datepicker-range">
                                                        <input id="dateRangeStart" type="text" class="form-control" name="start" dataName="activedAt" dataType="dateRange" autocomplete="off">
                                                        <div class="input-group-addon">
                                                            <?php echo $translations['A00941'][$language]; /* to */?>
                                                        </div>
                                                        <input id="dateRangeEnd" type="text" class="form-control" name="end" dataName="activedAt" dataType="dateRange">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 form-group">
                                                    <label class="control-label">
                                                        <?php echo $translations["A00318"][$language];?>
                                                    </label>
                                                    <select class="form-control" dataName="status" dataType="select">
                                                        <option value=""><?php echo $translations["A00055"][$language]?></option>
                                                        <option value="Waiting Approval"><?php echo $translations["B00254"][$language]?></option>
                                                        <option value="Approved"><?php echo $translations["B00256"][$language]?></option>
                                                        <option value="Rejected"><?php echo $translations["B00259"][$language]?></option>
                                                    </select>
                                                </div>
<!--                                                 <div class="col-sm-3 form-group">
                                                    <label class="control-label">
                                                        Approved Date
                                                    </label>
                                                    <div class="input-group input-daterange">
                                                        <input type="text" class="form-control" dataName="approvedDate" dataType="dateRange">
                                                        <span class="input-group-addon">
                                                            <?php echo $translations['A00813'][$language]; /* to */?>
                                                        </span>
                                                        <input type="text" class="form-control" dataName="approvedDate" dataType="dateRange">
                                                    </div>
                                                </div> -->
                                          <!--       <div class="col-sm-3 form-group">
                                                    <label class="control-label" for="">
                                                        <?php echo $translations['A00148'][$language]; /* Member ID */ ?>
                                                    </label>
                                                    <input id="memberID" type="text" class="form-control" dataName="memberID" dataType="text">
                                                </div> -->
<!--                                                 <div class="col-sm-3 form-group">
                                                    <label class="control-label" for="">
                                                        <?php echo $translations['A00141'][$language]; /* Username */ ?>
                                                    </label>
                                                    <span class="pull-right">
                                                      <input id="match" type="radio" name="usernameType" value="match" checked> 
                                                    <label for="match" style="margin-right: 15px;"><?php echo $translations['A01347'][$language]; /* Match */ ?></label>

                                                    <input id="like" type="radio" name="usernameType" value="like" style="margin-left: 15px;" > 
                                                    <label for="like"><?php echo $translations['A01348'][$language]; /* Like */ ?></label>
                                                    </span>
                                                    <input id="username" type="text" class="form-control" dataName="userName" dataType="text">
                                                </div> -->
                                            </div>
                                            <div class="col-sm-12 px-0">
                                                <!-- <div class="col-sm-3 form-group">
                                                    <label class="control-label">
                                                        Username Type 
                                                    </label>
                                                    <div class="form-control" style="border: none">
                                                        <input id="match" type="radio" name="usernameType" value="match" checked> 
                                                        <label for="match">Match</label>

                                                        <input id="like" type="radio" name="usernameType" value="like" style="margin-left: 15px;" > 
                                                        <label for="like">Like</label>
                                                    </div>
                                                </div> -->
                                             <!--    <div class="col-sm-3 form-group">
                                                    <label class="control-label" for="" data-th="name">
                                                        <?php echo $translations['A00944'][$language]; /* Full Name */?>
                                                    </label>
                                                    <input type="text" class="form-control" dataName="name" dataType="text">
                                                </div> -->
                                           <!--      <div class="col-sm-3 form-group">
                                                    <label class="control-label" for="">
                                                        Coin Type
                                                    </label>
                                                    <select id="creditTypeSelect" class="form-control" dataName="creditType" dataType="select"></select>
                                                </div> -->
                                               <!--  <div class="col-sm-3 form-group">
                                                    <label class="control-label" for="">
                                                        <?php echo $translations['A01109'][$language]; /* Leader Username */ ?>
                                                    </label>
                                                    <input id="leaderUsername" type="text" class="form-control" dataName="leaderUsername" dataType="text">
                                                </div> -->
                                          <!--       <div class="col-sm-3 form-group">
                                                    <label class="control-label" for="">
                                                        <?php echo $translations['A01349'][$language]; /* Main Leader Username */ ?>
                                                    </label>
                                                    <input id="mainLeaderUsername" type="text" class="form-control" dataName="mainLeaderUsername" dataType="text">
                                                </div> -->
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
                            <!-- <div class="card-box p-b-0"> -->
                                <button id="exportBtn" type="" onclick="exportBtn()" class="btn btn-primary waves-effect waves-light" style="margin-bottom: 10px;display: none">
                                      <?php echo $translations['A01352'][$language]; /*Export to xlsx*/ ?>
                                </button>
                                 <button id="seeAllBtn" type="" onclick="seeAllBtn()" class="btn btn-primary waves-effect waves-light" style="margin-bottom: 10px;display: none">
                                      <?php echo $translations['A01191'][$language]; /*See All*/ ?>
                                </button>
                                <form>
                                    <div id="basicwizard" class="pull-in" style="display: none">
                                        <div class="tab-content b-0 m-b-0 p-t-0" style="padding-bottom: 0;">
                                            <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                            <div id="fundInListDiv" class="table-responsive"></div>
                                            <span id="paginateText"></span>
                                            <div class="text-center">
                                                <ul class="pagination pagination-md" id="pageFundInList"></ul>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <div id="updateDiv" style="display: none;">
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
                                        <select id="statusSelect" class="m-l-rem1 form-control">
                                            <option value="Approved" selected>
                                                <?php echo $translations['A01218'][$language]; /* Approved */ ?>
                                            </option>
                                            <option value="Rejected">
                                                <?php echo $translations['A01439'][$language]; /* Rejected */ ?>
                                            </option>
                                        </select>
                                    </div>
                                    <div style="display: inline-block; margin-left:20px;">
                                        <button type="" id="updateBtn" class="btn btn-primary waves-effect waves-light" style="width: 100px">
                                            <?php echo $translations['A00300'][$language]; /* Update */ ?>
                                        </button>
                                    </div>
                                </div>
                           <!--  </div> -->
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
    var divId    = 'fundInListDiv';
    var tableId  = 'fundInListTable';
    var pagerId  = 'pageFundInList';
    var btnArray = {};
    var thArray  = Array(
                    '',
                    'ID',
                    '<?php echo $translations['A00137'][$language]; /* Date */ ?>',
                    '<?php echo $translations['A00148'][$language]; /* Member ID */ ?>',
                    '<?php echo $translations['A00102'][$language]; /* Username */ ?>',
                    '<?php echo $translations['A00117'][$language]; /* Full Name */ ?>',
                    '<?php echo $translations['A01440'][$language]?>',
                    '<?php echo $translations['A01442'][$language]?>',
                    '<?php echo $translations['A00318'][$language]; /* Status */ ?>',
                    '<?php echo $translations['A00377'][$language]; /* Updated At */ ?>',
                    '<?php echo $translations['A01447'][$language]; /* Updated At */ ?>',
                    '<?php echo $translations['A01448'][$language]; /* Updated At */ ?>',
                    '<?php echo $translations['A00571'][$language]; /* Remark */ ?>',
                    ''
        );
        
    // Initialize the arguments for ajaxSend function
    var url            = 'scripts/reqClient.php';
    var method         = 'POST';
    var debug          = 0;
    var bypassBlocking = 0;
    var bypassLoading  = 0;
    var pageNumber     = 1;
    var activityDate   = ""; 

    $(document).ready(function() {
        setTodayDatePicker();
        // formData    = {command      : 'getFundInListing'
        // };
        // fCallback = loadDefaultListing;
        // ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        
        $('#searchBtn').click(function() {
            pagingCallBack(pageNumber, loadSearch);
        });
        
        $('#resetBtn').click(function() {
            $('#alertMsg').removeClass('alert-success').html('').hide();
            $('#searchFundInHistory').find('input:not([type=radio])').each(function() {
               $(this).val(''); 
            });
            $('#searchFundInHistory').find('select').val('');
            setTodayDatePicker();
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
                    command : 'updateKYC',
                    kycIDAry : checkedIDs,
                    status : $('#statusSelect').val(),
                    remark : $('#remark').val()
                };
                fCallback = updateCallback;

                console.log(formData);
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }
        });
    });

    //   function seeAllBtn() {
    //     var searchID = 'searchFundInHistory';
    //     var searchData = buildSearchDataByType(searchID);
    //     formData  = {
    //         command : 'getFundInListing',
    //         inputData   : searchData,
    //         pageNumber   : 1,
    //         seeAll   : 1
    //     };

    //     // console.log(formData);
    //     fCallback = loadDefaultListing;
    //     ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    // }

    // function exportBtn(){
         
    //       var searchID = 'searchFundInHistory';
    //       var searchData = buildSearchDataByType(searchID);
    //         var thArray = Array(
    //             "Member ID",
    //             "Username",
    //             "Full Name",
    //             "Main Leader Username",
    //             "Coin Type",
    //             "Wallet Address",
    //             "Amount",
    //             "Rate",
    //             "Received Amount",
    //             "Callback Amount",
    //             "Status",
    //             "Date",
    //             "Approved At"
    //             );
    //         var key  = Array (
    //             'memberID',
    //            'username',
    //            'fullname',
    //            'mainLeaderUsername',
    //            'credit_type',
    //            'walletAddress',
    //            'amount',
    //            'rate',
    //            'totalValue',
    //            'receivableAmount',
    //            'status',
    //            'created_at',
    //            'approved_at'
    //         );
    //         var formData  = {
    //             command    : "getFundInListing",
    //             filename   : "FundInReport",
    //             inputData  : searchData,
    //             header     : thArray,
    //             key        : key,
    //             DataKey    : "addressPageListing"
    //         };
    //          $.redirect('exportExcel2.php', formData); 
    // }

    
    function loadDefaultListing(data, message) {
        console.log(data);

        $('#basicwizard').show();
        // $('#seeAllBtn, #exportBtn').show();
        
        var addressPageListing = data.kycList;
        if (addressPageListing){
            var newData = [];
            $.each(addressPageListing, function(i, obj){
                var checkbox = '';
                var action = `
                    <a data-toggle="tooltip" title="" onclick="viewKYCDetails('${obj.id}')" class="btn btn-icon waves-effect waves-light btn-primary" data-original-title="View" aria-describedby="" style="margin:0px 4px 0px 4px">
                        <i class="fa fa-eye"></i>
                    </a>`;

                if(obj.check == 1) {
                    checkbox = `<input type="checkbox" class="checkKyc" value="${obj.id}">`;
                }

                var rebuild = {
                    check: checkbox,
                    id: obj.id,
                    createdAt: obj.createdAt,
                    memberID: obj.memberID,
                    username: obj.username,
                    name: obj.name,
                    // genderDisplay: obj.genderDisplay,
                    nric: obj.nric,
                    documentType: obj.documentType,
                    status: obj.status,
                    updatedAt: obj.updatedAt,
                    approvedAt: obj.approvedAt,
                    updaterID: obj.updaterID || '-',
                    remark: obj.remark,
                    action: action
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
        var searchId   = 'searchFundInHistory';
        var searchData = buildSearchDataByType(searchId);

        if(pageNumber > 1) bypassLoading = 1;
        
        var formData = {
            command      : "getKYCListing",
            searchData    : searchData,
            pageNumber   : pageNumber
        };
        
        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    // Set the default date which is today.
    // Set the timepicker
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
        
        $('#createdAt').daterangepicker({
            singleDatePicker: true,
            timePicker: false,
            locale: {
                format: 'DD/MM/YYYY'
            }
        });

        $('#activedAt').daterangepicker({
            singleDatePicker: true,
            timePicker: false,
            locale: {
                format: 'DD/MM/YYYY'
            }
        });
        var dateToday = $('#searchDate').val('');

        $('#timeFrom').timepicker({
            defaultTime : '',
            showSeconds: true
        });
        $('#timeTo').timepicker({
            defaultTime : '',
            showSeconds: true
        });

        return dateToTimestamp(today);
    }

    function viewKYCDetails(id) {
        $.redirect('kycDetails.php', {
            id: id
        });
    }

    // Set the activity type dropdown in the search part
    function setSearchOption(data, searchVal) {
        $('#searchFundInHistory #activityType').find('option:not(:first-child)').remove();
        $.each(data, function(key, val) {
            $('#searchFundInHistory #activityType').append('<option value="' + val['activityType'] + '">' + val['activityType'] + '</option>');
        });
        if (searchVal != ' '){
            $('#searchFundInHistory #activityType').val(searchVal);
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
        showMessage('<?php echo $translations['A00616'][$language]; /* Successful updated status. */ ?>', 'success', '<?php echo $translations['A00617'][$language]; /* Update Status */ ?>', 'edit', 'kycListing.php');
    }
    
</script>
</body>
</html>