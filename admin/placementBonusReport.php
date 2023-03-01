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

                                                <div class="col-xs-12">
                                                    <div class="row">
                                                        <div class="col-sm-4 form-group" id="datepicker" >
                                                            <label class="control-label" data-th="">Date Range</label>
                                                            <div class="input-daterange input-group" id="datepicker-range">
                                                            <input id="dateRangeStart" type="text" class="form-control" name="start" dataName="tradingDate" dataType="dateRange">
                                                            <div class="input-group-addon">
                                                                <?php echo $translations['A00139'][$language]; /* to */?>
                                                            </div>
                                                            <input id="dateRangeEnd" type="text" class="form-control" name="end" dataName="tradingDate" dataType="dateRange" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label">
                                                                <?php echo $translations['A00102'][$language]; /* Username */ ?>
                                                            </label>
                                                            <span class="pull-right">
                                                                <input id="match" type="radio" name="usernameType" class="usernameType" value="match" checked> 
                                                                <label for="match" style="margin-right: 15px;">Match</label>

                                                                <input id="like" type="radio" name="usernameType" class="usernameType" value="like" style="margin-left: 15px;" > 
                                                                <label for="like">Like</label>
                                                            </span>
                                                            <input type="text" class="form-control" dataName="username" dataType="text">
                                                        </div>
                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label">
                                                                Member ID
                                                            </label>
                                                            <input type="text" class="form-control" dataName="memberID" dataType="text">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>

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
                                <button id="exportBtn" type="button" class="btn btn-primary waves-effect waves-light" style="margin-bottom: 10px;display: none">
                                     Export to xlsx
                                </button> 
                                <button id="seeAllBtn" type="" class="btn btn-primary waves-effect waves-light" style="margin-bottom: 10px;display: none">
                                     See All
                                </button> 
                                <form>
                                    <div id="basicwizard" class="pull-in" style="display: none">
                                        <div class="tab-content b-0 m-b-0 p-t-0">
                                            <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                            <div id="listingDiv" class="table-responsive"></div>
                                            <span id="grandTotal"></span>
                                            <span id="paginateText"></span>
                                            <div class="text-center">
                                                <ul class="pagination pagination-md" id="listingPager"></ul>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
            'Bonus Date',
            'Member ID',
            '<?php echo $translations['A00102'][$language]; /* Username */ ?>',
            'A leg ROI', //'C/F Left BV',
            'B leg ROI', //'C/F Right BV',
            'Paired ROI', //'BV Paired',
            'Percentage',
            'Bonus Amount',
            // 'New BV',
            // 'Remaining BV',
            // 'New BV',
            // 'Remaining BV',
            );
    var searchId = 'searchForm';
    var url = 'scripts/reqBonus.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";  

    $(document).ready(function() {

        $('#resetBtn').click(function () {
            $('#alertMsg').removeClass('alert-success').html('').hide();
            $('#searchForm').find('input:not([type=radio])').each(function () {
                $(this).val('');
            });
            $('#searchForm').find('select').each(function () {
                $(this).val('');
                $("#searchForm")[0].reset();
            });

        });


         $('#exportBtn').click(function () {
            var searchId   = 'searchForm';
            var searchData = buildSearchDataByType(searchId);
           
            var key  = Array (
                'date',
               'member_id',
               'username',
               'left_bv',
               'right_bv',
               'bv_paired',
               'payPercentage',
               'payableAmount'
            //    'cf_left',
            //    'rm_left',
            //    'cf_right',
            //    'rm_right',
            );
           
            var formData  = { 
                command     : "getPlacementReport",
                fileName    : 'PlacementReport',
                searchData  : searchData,
                header      : thArray,
                key         : key,
                type        : 'export',
                DataKey     : "dataListing",
                usernameSearchType : $("input[name=usernameType]:checked").val()

            };
                fCallback = exportExcel;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        });

        $('#seeAllBtn').click(function() {

        var searchID = 'searchForm';
        var searchData = buildSearchDataByType(searchID);
        formData  = {
            command : 'getPlacementReport',
            searchData   : searchData,
            pageNumber   : 1,
            seeAll   : 1,
            usernameSearchType : $("input[name=usernameType]:checked").val(),

        };
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

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


    function pagingCallBack(pageNumber, fCallback){
        if(pageNumber > 1) bypassLoading = 1;

        var searchData = buildSearchDataByType(searchId);
        var formData   = {
            command     : "getPlacementReport",
            pageNumber  : pageNumber,
            searchData   : searchData,
            usernameSearchType : $("input[name=usernameType]:checked").val(),

        };
            
        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }
    
    function loadDefaultListing(data, message) {

        
        $('#basicwizard, #exportBtn, #seeAllBtn').show();
        var tableNo;
        
        if (data.dataListing){
             var newList = [];
             $.each(data.dataListing, function(k, v){
                 var rebuildData = {
                     date : v['date'],
                     member_id:v['member_id'],
                     username : v['username'],
                     left_bv: addCormer(v['left_bv']),
                     right_bv : addCormer(v['right_bv']),
                     bv_paired : addCormer(v['bv_paired']),
                     payPercentage : addCormer(v['payPercentage']),
                     payableAmount : addCormer(v['payableAmount']),
                    //  cf_left : addCormer(v['cf_left']),
                    //  rm_left: addCormer(v['rm_left']),
                    //  cf_right : addCormer(v['cf_right']),
                    //  rm_right: addCormer(v['rm_right']),
                 };
                 newList.push(rebuildData);
             });
         }
        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);


        $('#'+tableId).find('tr').each(function(){
                $(this).find('th:eq(4), td:eq(4)').css('text-align', "right");
                $(this).find('th:eq(5), td:eq(5)').css('text-align', "right");
                $(this).find('th:eq(7), td:eq(7)').css('text-align', "right");
                $(this).find('th:eq(8), td:eq(8)').css('text-align', "right");
            });

        $('#' + tableId).find('tbody').append(`
            <tr style="">
                <td colspan='7' class="text-right"><?php echo $translations['A00651'][$language]; /* Grand Total */?>:</td>
                <td style="text-align: right;"> ${numberThousand((data.grandTotal), 2)} </td>
            </tr>
        `);
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
