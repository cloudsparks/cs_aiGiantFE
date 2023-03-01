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

                                             <div class="col-sm-12 px-0">
                                                <div class="col-sm-3 form-group">
                                                    <label class="control-label">
                                                        <?php echo $translations['A00101'][$language]; /* Name */ ?>
                                                    </label>
                                                    <input type="text" class="form-control" dataName="name" dataType="text">
                                                </div>
                                                <div class="col-sm-3 form-group">
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
                                                <!-- <div class="col-sm-4 form-group" id="datepicker" >
                                                    <label class="control-label" data-th=""><?php echo $translations['A00112'][$language]; /* Created at */ ?></label>
                                                    <div class="input-daterange input-group" id="datepicker-range">
                                                    <input id="dateRangeStart" type="text" class="form-control" name="start" dataName="bonusDate" dataType="dateRange">
                                                    <div class="input-group-addon">
                                                        <?php echo $translations['A00139'][$language]; /* to */?>
                                                    </div>
                                                    <input id="dateRangeEnd" type="text" class="form-control" name="end" dataName="bonusDate" dataType="dateRange">
                                                    </div>
                                                </div> -->
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

                    <!-- <a id="addWaterBucket" href="addWaterBucket.php" type="button" class="btn btn-primary waves-effect w-md waves-light m-b-20">
                        Add Water Bucket
                    </a> -->
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- <div class="card-box p-b-0"> -->
                              <button id="exportBtn" type="button" onclick="exportBtn()" class="btn btn-primary waves-effect waves-light" style="margin-bottom: 10px;display: none"><?php echo $translations['A01352'][$language]; /*Export to xlsx*/ ?></button>
                                </button> 
                               <button id="seeAllBtn" type="button" onclick="seeAllBtn()" class="btn btn-primary waves-effect waves-light" style="margin-bottom: 10px;display: none"><?php echo $translations['A01191'][$language]; /*See All*/ ?></button>
                                </button> 
                                <form>
                                    <div id="basicwizard" class="pull-in" style="display: none">
                                        <div class="tab-content b-0 m-b-0 p-t-0">
                                            <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                            <div id="bonusListDiv" class="table-responsive"></div>
                                            <span id="paginateText"></span>
                                            <div class="text-center">
                                                <ul class="pagination pagination-md" id="pagerBonusList"></ul>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            <!-- </div> -->
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
    var divId    = 'bonusListDiv';
    var tableId  = 'bonusListTable';
    var pagerId  = 'pagerBonusList';
    var btnArray = {};
    var thArray  = Array(
        "<?php echo $translations['A00137'][$language]; /* Date */?>",
        "<?php echo $translations['M01523'][$language]; /* Account Type */?>",
        "<?php echo $translations['A00101'][$language]; /* Name */?>",
        "<?php echo $translations['A00102'][$language]; /* Username */ ?>",
        "From Amount",
        "<?php echo $translations['A00973'][$language]; /* Percentage */ ?>",
        "Cashback Amount"
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

        // fCallback = loadDefaultListing;
        // formData  = {command: 'packageCashbackList'};
        // ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            
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

      function seeAllBtn() {
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
     }

      function exportBtn(){
         
          var searchID = 'searchForm';
          var searchData = buildSearchDataByType(searchID);
            var thArray = Array(
                "Date",
                // "Leader Username",
                "Account Type",
                "Name",
                "Username",
                "From Amount",
                "Percentage",
                "Cashback Amount"
            );
            var key  = Array (
               'date',
               // 'mainLeaderUsername',
               'accountType',
               'name',
               'username',
               'fromAmount',
               'percentage',
               'cashbackAmount'
            );
            var formData  = {
                command    : "packageCashbackList",
                filename   : "cashbackReport",
                inputData  : searchData,
                header     : thArray,
                key        : key,
                DataKey    : "cashbackPackagePage"
            };
             $.redirect('exportExcel2.php', formData); 
    }

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

    function pagingCallBack(pageNumber, fCallback){
        if(pageNumber > 1) bypassLoading = 1;

        var searchData = buildSearchDataByType(searchId);
        var formData   = {
            command : 'packageCashbackList',
            pageNumber  : pageNumber,
            inputData   : searchData
        };
            
        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }
    
    function loadDefaultListing(data, message) {
        console.log(data);
        $('#basicwizard, #exportBtn, #seeAllBtn').show();

        var cashbackPackagePage = data.cashbackPackagePage;
        var tableNo;

        if(cashbackPackagePage){
            var newList = [];
            $.each(cashbackPackagePage, function(k,v){
                
                 var rebuildData ={
                    date: v['date'],
                    accountType: v['accountType'],
                    name: v['name'],
                    username: v['username'],
                    fromAmount: decimalWithoutRoundSpecial(v['fromAmount']),
                    percentage: v['percentage'],
                    cashbackAmount: decimalWithoutRoundSpecial(v['cashbackAmount'])

                };
                newList.push(rebuildData);
            });

        }


        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        if(cashbackPackagePage) {
            $.each(cashbackPackagePage, function(k, v) {
                $('#'+tableId).find('tr#'+k).attr('data-th', v['username']);
                $('#'+tableId).find('tr#'+k).attr('data-value', v['value']);
                $('#'+tableId).find('tr#'+k).attr('data-type', v['type']);
            });
        }

        $('#'+tableId).find('tbody tr').each(function(){
            $(this).find("td:eq(4)").css("text-align", "right");
            $(this).find("td:eq(5)").css("text-align", "right");
            $(this).find("td:eq(6)").css("text-align", "right");
        });

        $('#'+tableId+' tr:last').after(data.total);

        // $('#'+tableId).tableExport({
        //     headers: true, // (Boolean), display table headers (th or td elements) in the <thead>, (default: true)
        //     footers: false, // (Boolean), display table footers (th or td elements) in the <tfoot>, (default: false)
        //     formats: ['xlsx'], // (String[]), filetype(s) for the export, (default: ['xlsx', 'csv', 'txt'])
        //     filename: 'Cash_Back_List', // (id, String), filename for the downloaded file, (default: 'id')
        //     bootstrap: true, // (Boolean), style buttons using bootstrap, (default: true)
        //     exportButtons: true, // (Boolean), automatically generate the built-in export buttons for each of the specified formats (default: true)
        //     position: 'bottom', // (top, bottom), position of the caption element relative to table, (default: 'bottom')
        //     ignoreRows: null, // (Number, Number[]), row indices to exclude from the exported file(s) (default: null)
        //     ignoreCols: null, // (Number, Number[]), column indices to exclude from the exported file(s) (default: null)
        //     trimWhitespace: false // (Boolean), remove all leading/trailing newlines, spaces, and tabs from cell text in the exported file(s) (default: false)
        // });

        // $('button.xlsx').removeClass("btn-default").addClass("btn-primary waves-effect waves-light");
        // $('button.xlsx').text('Export to xlsx');
        // $('table#'+tableId).find("caption").append('<button type="" id="seeAllBtn" class="btn btn-primary waves-effect waves-light" style="margin-bottom: 10px;">See All</button>');  
    }
    
    function tableBtnClick(btnId) {
        var btnName  = $('#'+btnId).attr('id').replace(/\d+/g, '');
        var tableRow = $('#'+btnId).parent('td').parent('tr');
        var tableId  = $('#'+btnId).closest('table');
        
        if (btnName == 'edit') {
            var username = tableRow.attr('data-th');
            var value = tableRow.attr('data-value');
            var type = tableRow.attr('data-type');

            $.redirect("editWaterBucketListing.php",{username: username, value: value, type: type});
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
