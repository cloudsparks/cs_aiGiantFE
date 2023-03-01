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
                                                <!-- <div class="col-sm-4 form-group" id="datepicker" >
                                                    <label class="control-label" data-th="date">Date</label>
                                                    <div class="input-daterange input-group" id="datepicker-range">
                                                        <input id="dateRangeStart" type="text" class="form-control" name="start" dataName="searchDate" dataType="dateRange" autocomplete="off">
                                                        <div class="input-group-addon">
                                                            <?php echo $translations['A00139'][$language]; /* to */?>
                                                        </div>
                                                        <input id="dateRangeEnd" type="text" class="form-control" name="end" dataName="searchDate" dataType="dateRange">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label">
                                                        Approved Date
                                                    </label>
                                                    <div class="input-group input-daterange">
                                                        <input type="text" class="form-control" dataName="approvedDate" dataType="dateRange">
                                                        <span class="input-group-addon">
                                                            <?php echo $translations['A00139'][$language]; /* to */?>
                                                        </span>
                                                        <input type="text" class="form-control" dataName="approvedDate" dataType="dateRange">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label" for="">
                                                        <?php echo $translations['A00148'][$language]; /* Member ID */ ?>
                                                    </label>
                                                    <input id="memberID" type="text" class="form-control" dataName="memberID" dataType="text">
                                                </div> -->
                                                <div class="col-sm-3 form-group">
                                                    <label class="control-label" for="">
                                                        <?php echo $translations['A00102'][$language]; /* Username */ ?>
                                                    </label>
                                                    <span class="pull-right">
                                                        <input id="match" type="radio" name="usernameType" value="match" checked> 
                                                        <label for="match" style="margin-right: 15px;"><?php echo $translations['A01347'][$language]; /* Match */ ?></label>

                                                        <input id="like" type="radio" name="usernameType" value="like" style="margin-left: 15px;" > 
                                                        <label for="like"><?php echo $translations['A01348'][$language]; /* Like */ ?></label>
                                                    </span>
                                                    <input id="username" type="text" class="form-control" dataName="username" dataType="text">
                                                </div>
                                                <!-- <div class="col-sm-4 form-group">
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
                                                <!-- <div class="col-sm-4 form-group">
                                                    <label class="control-label" for="" data-th="name">
                                                        Full Name
                                                    </label>
                                                    <input type="text" class="form-control" dataName="name" dataType="text">
                                                </div>
                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label" for="">
                                                        Coin Type
                                                    </label>
                                                    <select id="creditTypeSelect" class="form-control" dataName="creditType" dataType="select"></select>
                                                </div>
                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label" for="">
                                                        Leader Username
                                                    </label>
                                                    <input id="leaderUsername" type="text" class="form-control" dataName="leaderUsername" dataType="text">
                                                </div>
                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label" for="">
                                                        Main Leader Username
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
                                <button id="exportBtn" type="" onclick="exportBtn()" class="btn btn-primary waves-effect waves-light" style="margin-bottom: 10px; display: none">
                                      <?php echo $translations['A01352'][$language]; /* Export to xlsx */?>
                                </button>
                                 <button id="seeAllBtn" type="" onclick="seeAllBtn()" class="btn btn-primary waves-effect waves-light" style="margin-bottom: 10px; display: none">
                                      <?php echo $translations['A01191'][$language]; /* See All */?>
                                </button>
                                <form>
                                    <div id="basicwizard" class="pull-in" style="display:none">
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
    var divId    = 'fundInListDiv';
    var tableId  = 'fundInListTable';
    var pagerId  = 'pageFundInList';
    var btnArray = {};
    var thArray  = Array(
            '<?php echo $translations['A00102'][$language]; /* username */ ?>',
            'Maintenance Date'
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
        // formData    = {command      : 'quantumMaintenanceListing'
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

        //   $('#searchFundInHistory').keypress(function(e){
        //     if(e.which == 13){//Enter key pressed
        //         $('#searchBtn').click();//Trigger enter button click event
        //     }
        // });

        // $('#seeAllBtn').click(function() {

        //     var searchID = 'searchForm';
        //     var searchData = buildSearchDataByType(searchID);
        //     formData  = {
        //         command : 'packageCashbackList',
        //         inputData   : searchData,
        //         pageNumber   : 1,
        //         seeAll   : 1
        //     };
        //     // console.log(searchData);
        //     fCallback = loadDefaultListing;
        //     ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        // }); 
    });

      function seeAllBtn() {
        var searchID = 'searchFundInHistory';
        var searchData = buildSearchDataByType(searchID);
        formData  = {
            command : 'quantumMaintenanceListing',
            inputData   : searchData,
            pageNumber   : 1,
            seeAll   : 1
        };

        // console.log(formData);
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function exportBtn(){
         
          var searchID = 'searchFundInHistory';
          var searchData = buildSearchDataByType(searchID);
            var thArray = Array(
                "Username",
                "Maintenance Date"
                );
            var key  = Array (
               'username',
               'latestDate'
            );
            var formData  = {
                command    : "quantumMaintenanceListing",
                filename   : "QuantumMaintenance",
                inputData  : searchData,
                header     : thArray,
                key        : key,
                DataKey    : "latestQuantumMaintenanceDate"
            };
             $.redirect('exportExcel2.php', formData); 
    }

    
    function loadDefaultListing(data, message) {
        console.log(data);
        $('#basicwizard').show();
        $('#seeAllBtn').show();
        $('#exportBtn').show();
        
        var addressPageListing = data.latestQuantumMaintenanceDate;
        if (addressPageListing){
            var newData = [];
            $.each(addressPageListing, function(i, obj){
                var rebuild = {
                    username: obj.username, 
                    latestDate: obj.latestDate
                };

                newData.push(rebuild);
            });
        }

        var tableNo;
        buildTable(newData, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        /*if(typeof(data.activityTypeList) != 'undefined') {
            var selection = $('#searchFundInHistory #activityType').val();
            // Set the Command dropdown in Search section
            var searchDropdown = data.activityTypeList;
            setSearchOption(searchDropdown, selection);
        }
*/
        // $('#'+tableId+' tr:last').after(data.total);

       //  $('#'+tableId).tableExport({
       //      headers: true, // (Boolean), display table headers (th or td elements) in the <thead>, (default: true)
       //      footers: false, // (Boolean), display table footers (th or td elements) in the <tfoot>, (default: false)
       //      formats: ['xlsx'], // (String[]), filetype(s) for the export, (default: ['xlsx', 'csv', 'txt'])
       //      filename: 'Fund_In_History', // (id, String), filename for the downloaded file, (default: 'id')
       //      bootstrap: true, // (Boolean), style buttons using bootstrap, (default: true)
       //      exportButtons: true, // (Boolean), automatically generate the built-in export buttons for each of the specified formats (default: true)
       //      position: 'bottom', // (top, bottom), position of the caption element relative to table, (default: 'bottom')
       //      ignoreRows: null, // (Number, Number[]), row indices to exclude from the exported file(s) (default: null)
       //      ignoreCols: null, // (Number, Number[]), column indices to exclude from the exported file(s) (default: null)
       //      trimWhitespace: false // (Boolean), remove all leading/trailing newlines, spaces, and tabs from cell text in the exported file(s) (default: false)
       //  });

       // $('button.xlsx').removeClass("btn-default").addClass("btn-primary waves-effect waves-light");
       // $('button.xlsx').text('Export to xlsx');
       // $('table#'+tableId).find("caption").append('<button type="button" onclick="seeAllBtn()" class="btn btn-primary waves-effect waves-light" style="margin-bottom: 10px;">See All</button>');
    }

    // function tableBtnClick(btnId) {

    //     var btnName  = $('#'+btnId).attr('id').replace(/\d+/g, '');
    //     var tableRow = $('#'+btnId).parent('td').parent('tr');
    //     var tableId  = $('#'+btnId).closest('table');

    //     if (btnName == 'withdrawal'){
    //         var id = tableRow.attr('data-th');
    //         $("#storePortfolioID").val(id);
    //         var formData = {
    //             command     : "validateAddCapitalWithdrawal",
    //             portfolioID : id
    //         };
    //         fCallback = redirectWithdrawal;
    //         ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    //     }

    //     else if (btnName == 'view'){
    //         var id = tableRow.attr('data-th');
    //         $("#storePortfolioID").val(id);
    //         // alert('XD');
    //         var formData = {
    //             command : "getLoanDetails",
    //             referenceID  : id ,
    //         };
            
    //         // console.log(formData);
            
    //         fCallback = showLoanDetails;
    //         ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    //     }
    // }
    function pagingCallBack(pageNumber, fCallback){
        var searchId   = 'searchFundInHistory';
        var searchData = buildSearchDataByType(searchId);

        if(pageNumber > 1) bypassLoading = 1;
        
        var formData = {
            command      : "quantumMaintenanceListing",
            searchData    : searchData,
            pageNumber   : pageNumber,
            usernameSearchType : $("input[name=usernameType]:checked").val()
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