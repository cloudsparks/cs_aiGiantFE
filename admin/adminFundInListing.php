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
                                                <div class="col-sm-3 form-group">
                                                    <label class="control-label" for="">
                                                        <?php echo $translations['A00356'][$language]; /* Date */ ?>
                                                    </label>
                                                    <input id="searchDate" type="text" class="form-control" dataName="searchDate" dataType="singleDate">
                                                </div>
                                                <div class="col-sm-3 form-group hide">
                                                    <label class="control-label" for="">
                                                        <?php echo $translations['A00148'][$language]; /* Member ID */ ?>
                                                    </label>
                                                    <input id="memberID" type="text" class="form-control" dataName="memberID" dataType="text">
                                                </div>
                                                <div class="col-sm-3 form-group">
                                                    <label class="control-label" for="">
                                                        <?php echo $translations['A00102'][$language]; /* Username */ ?>
                                                    </label>
                                                    <input id="username" type="text" class="form-control" dataName="username" dataType="text">
                                                </div>
                                                <div class="col-sm-3 form-group">
                                                    <label class="control-label" for="">
                                                        <?php echo $translations['A00267'][$language]; /* Credit Type */ ?>
                                                    </label>
                                                    <select class="form-control" dataName="creditType" dataType="select">
                                                        <option value="">Select a credit type</option>
                                                        <option value="bitcoin">Bitcoin</option>
                                                        <option value="ethereum">Ethereum</option>
                                                        <option value="ripple">XRP(ripple)</option>
                                                        <option value="cardano">ADA(Cardano)</option>
                                                        <option value="tether">ERC20 USDT</option>
                                                        <option value="eos">EOS</option>
                                                    </select>
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
                           <!--  <div class="card-box p-b-0"> -->
                                <button type="" id="seeAllBtn" class="btn btn-primary waves-effect waves-light visible-xs" style="margin-bottom: 10px;">
                                      See All
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
                          <!--   </div> -->
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
            '<?php echo $translations['A00102'][$language]; /* username */ ?>',
            // 'fullname',
            '<?php echo $translations['A00267'][$language]; /* Credit Type */ ?>',
            // 'wallet address',
            '<?php echo $translations['A00821'][$language]; /* amount */ ?>',
            '<?php echo $translations['A00367'][$language]; /* Rate */ ?>',
            '<?php echo $translations['M00891'][$language]; /* Received Amount */ ?>',
            // 'Callback Amount',
            '<?php echo $translations['A00318'][$language]; /* status */ ?>',
            '<?php echo $translations['A00112'][$language]; /* created at */ ?>',
            '<?php echo $translations['A00377'][$language]; /* Updated At */ ?>'
        );
        
    // Initialize the arguments for ajaxSend function
    var url            = 'scripts/reqAdmin.php';
    var method         = 'POST';
    var debug          = 0;
    var bypassBlocking = 0;
    var bypassLoading  = 0;
    var pageNumber     = 1;
    var activityDate   = ""; 
        
    $(document).ready(function() {
        setTodayDatePicker();
        // formData    = {command      : 'getAdminFundInListing'
        // };
        // fCallback = loadDefaultListing;
        // ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        
        $('#searchBtn').click(function() {
            pagingCallBack(pageNumber, loadSearch);
        });
        
        $('#resetBtn').click(function() {
            $('#alertMsg').removeClass('alert-success').html('').hide();
            $('#searchFundInHistory').find('input').each(function() {
               $(this).val(''); 
            });
            $('#searchFundInHistory').find('select').val('');
            setTodayDatePicker();
        });

        //   $('#searchFundInHistory').keypress(function(e){
        //     if(e.which == 13){//Enter key pressed
        //         $('#searchBtn').click();//Trigger enter button click event
        //     }
        // });

        $('#seeAllBtn').click(function() {

            var searchID = 'searchForm';
            var searchData = buildSearchDataByType(searchID);
            formData  = {
                command : 'packageCashbackList',
                inputData   : searchData,
                pageNumber   : 1,
                seeAll   : 1
            };
            // console.log(searchData);
            fCallback = loadDefaultListing;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        }); 
    });
    
    function loadDefaultListing(data, message) {
        $('#alertMsg').removeClass('alert-success').html('').hide();
        // console.log(data);
        $('#basicwizard').show();

        var newData = [];
        var addressPageListing = data.addressPageListing;
        if(addressPageListing) {
            $.each(addressPageListing, function(i, obj){
                var rebuild = {
                    username: obj.username, 
                    credit_type: obj.credit_type, 
                    // walletAddress: obj.walletAddress, 
                    amount: addCormer(obj.amount),
                    rate: addCormer(obj.rate), 
                    totalValue: addCormer(decimalWithoutRoundSpecial(obj.totalValue)),
                    // callbackAmount : addCormer(decimalWithoutRoundSpecial(obj.receivableAmount)),
                    status: obj.status, 
                    created_at: obj.created_at, 
                    approved_at: obj.approved_at
                };

                newData.push(rebuild);
            });

            var tableNo;
            buildTable(newData, tableId, divId, thArray, btnArray, message, tableNo);
            pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);
        }else{
            $("#"+divId).empty();
            $("#pageFundInList").empty();
            $("#paginateText").empty();
            $('#alertMsg').addClass('alert-success').html("<span>No Result Found.</span>").show();
        }
        

        $('#'+tableId).find('tbody tr').each(function(){
            $(this).find("td:eq(2)").css("text-align", "right");
            $(this).find("td:eq(3)").css("text-align", "right");
            $(this).find("td:eq(4)").css("text-align", "right");
            $(this).find("td:eq(5)").css("text-align", "right");
            $(this).find("td:last-child").css('text-align', 'center');
        });

        if(typeof(data.activityTypeList) != 'undefined') {
            var selection = $('#searchFundInHistory #activityType').val();
            // Set the Command dropdown in Search section
            var searchDropdown = data.activityTypeList;
            setSearchOption(searchDropdown, selection);
        }

        $('#'+tableId+' tr:last').after(data.total);

        $('#'+tableId).tableExport({
            headers: true, // (Boolean), display table headers (th or td elements) in the <thead>, (default: true)
            footers: false, // (Boolean), display table footers (th or td elements) in the <tfoot>, (default: false)
            formats: ['xlsx'], // (String[]), filetype(s) for the export, (default: ['xlsx', 'csv', 'txt'])
            filename: 'Fund_In_History', // (id, String), filename for the downloaded file, (default: 'id')
            bootstrap: true, // (Boolean), style buttons using bootstrap, (default: true)
            exportButtons: true, // (Boolean), automatically generate the built-in export buttons for each of the specified formats (default: true)
            position: 'bottom', // (top, bottom), position of the caption element relative to table, (default: 'bottom')
            ignoreRows: null, // (Number, Number[]), row indices to exclude from the exported file(s) (default: null)
            ignoreCols: null, // (Number, Number[]), column indices to exclude from the exported file(s) (default: null)
            trimWhitespace: false // (Boolean), remove all leading/trailing newlines, spaces, and tabs from cell text in the exported file(s) (default: false)
        });

        $('button.xlsx').removeClass("btn-default").addClass("btn-primary waves-effect waves-light");
        $('button.xlsx').text('Export to xlsx');
        $('table#'+tableId).find("caption").append('<button type="" id="seeAllBtn" class="btn btn-primary waves-effect waves-light" style="margin-bottom: 10px;">See All</button>');  
    }

    function pagingCallBack(pageNumber, fCallback){
        var searchId   = 'searchFundInHistory';
        var searchData = buildSearchDataByType(searchId);

        if(pageNumber > 1) bypassLoading = 1;
        
        var formData = {
            command      : "getAdminFundInListing",
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
        
        $('#searchDate').daterangepicker({
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
    
    
</script>
</body>
</html>