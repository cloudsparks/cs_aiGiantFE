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

                        <div class="col-lg-12 col-md-12">

                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                                <div class="panel panel-default bx-shadow-none">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <?php echo $translations['A00051'][$language]; /* Search */ ?>
                                        </h4>
                                    </div>

                                    <div class="panel-collapse" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div id="searchMsg" class="text-center alert" style="display: none;"></div>
                                            <form id="searchActivityLog" role="form">
                                                <div class="col-sm-3 form-group">
                                                    <label class="control-label" for="">
                                                        <?php echo $translations['A00137'][$language]; /* Date */ ?>
                                                    </label>
                                                    <input id="searchDate" type="text" class="form-control" dataName="searchDate" dataType="singleDate">
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

                                <div class="panel panel-default bx-shadow-none">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                        <?php echo $translations['A01346'][$language]; /* Set IBGT Rate */ ?>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div id="" class="text-center alert" style="display: none;"></div>
                                                <div class="col-sm-12">
                                              <!--     <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="#"><?php echo $translations['A00952'][$language]; /* Type */ ?> <span class="text-danger">*</span></label>
                                                        <select id="type" class="form-control">
                                                           <option value="add"><?php echo $translations['A01238'][$language]; /* Add */ ?></option>
                                                            <option value="remove"><?php echo $translations['A01239'][$language]; /* Remove */ ?></option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="#"><?php echo $translations['A00102'][$language]; /* Username */ ?> <span class="text-danger">*</span></label>
                                                        <input id="username" type="text" class="form-control">
                                                    </div> -->
                                                      <div class="col-sm-5 form-group">
                                                        <label class="control-label" for="" data-th="#"><?php echo $translations['A00367'][$language]; /* Rate */ ?><span class="text-danger">*</span></label>
                                                        <input id="rate" type="text" class="form-control" style="margin-top: 5px">
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <a id ="updateBtn" href="#" type="button" class="btn btn-primary waves-effect w-md waves-light m-b-20 m-t-rem3" onclick=""><?php echo $translations['A00300'][$language]; /* Update */?></a>
                                                    </div>
                                                </div>

                                                 <!-- <div class="col-sm-12">
                                                    <div class="col-xs-12 col-sm-12">
                                                        <a id ="updateBtn" href="#" type="button" class="btn btn-primary waves-effect w-md waves-light m-b-20 m-t-rem3" onclick=""><?php echo $translations['A00300'][$language]; /* Update */?></a>
                                                    </div>
                                                </div> -->
                                                 <div class="col-sm-12 px-0" style="margin-top: 30px">
                                                    <div id="basicwizard" class="pull-in" style="display: none">
                                                    <div class="tab-content b-0 m-b-0 p-t-0">
                                                    <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                                    <div id="ibgRateDiv" class="table-responsive"></div>
                                                            <span id="paginateText"></span>
                                                    <!-- <div class="text-center">
                                                        <ul class="pagination pagination-md" id="pagerIbgRateList"></ul>
                                                    
                                                    </div> -->
                                                    </div>
                                                    </div>
                                              </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>    
                        
                  
                    <!-- End row -->

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

    var url            = 'scripts/reqAdmin.php';
    var method         = 'POST';
    var debug          = 0;
    var bypassBlocking = 0;
    var bypassLoading  = 0;
    var fCallback      = "";
    var pageNumber     = 1;
    
    var divId    = 'ibgRateDiv';
    var tableId  = 'ibgRateTable';
    var pagerId  = 'pagerIbgRateList';
    var btnArray = {};
    var thArray  = Array (
             // 'Type',
             '<?php echo $translations['A00367'][$language]; /* Rate */ ?>',
             '<?php echo $translations['A01152'][$language]; /* Updated By */ ?>',
             '<?php echo $translations['A00377'][$language]; /* Updated At */ ?>'
            );

    $(document).ready(function() {

        // var formData = {
        //     command  : "adminSetIBGTRateList",
        // };
        // // /console.log(formData);
        // var fCallback = loadDefaultListing;

        // ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
       
  });

    $('#searchDate').datepicker({
        // language: language,
        format      : 'dd/mm/yyyy',
        orientation : 'auto',
        autoclose   : true
    });

    $('#resetBtn').click(function() {
        $('#alertMsg').removeClass('alert-success').html('').hide();
        $('#searchActivityLog').find('input:not([type=radio])').each(function() {
            $(this).val('');
        });
        $('#searchActivityLog').find('select').val('');
        // setTodayDatePicker();
    });

    $('#searchBtn').click(function() {
        pagingCallBack(pageNumber, loadSearch);
    });

    function pagingCallBack(pageNumber, fCallback){
        var searchId   = 'searchActivityLog';
        var searchData = buildSearchDataByType(searchId);

        if(pageNumber > 1) bypassLoading = 1;

        var formData = {
            command      : "adminSetIBGTRateList",
            inputData    : searchData,
            pageNumber   : pageNumber
        };

        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

     $('#updateBtn').click(function() {
        
        // var type   = $('#type').find('option:selected').val();
        // var username = $('#username').val();
        var rate = $('#rate').val(); 
        
        var formData = {
            command  : "adminSetIBGTRate",
            rate : rate
            // username : username
        };
        // /console.log(formData);
        var fCallback = updateRate;

        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
     });

   function loadDefaultListing(data, message) {
           console.log(data);
           $('#basicwizard').show();
            var tableNo;

            if(data.rateList){
            var newList = [];
            $.each(data.rateList, function(k,v){
                
                 var rebuildData ={
                    // type : v['type'],
                    unit_price : v['unit_price'],
                    updatedBy : v['updatedBy'],
                    created_at : v['created_at']
                    // createdAt : v['business_id'],
                    // lastLogin : v['last_login']
                };
                newList.push(rebuildData);
            });

        }


            buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
            pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);
  }
    
    function updateRate (data, message) {
       // console.log(data);
        showMessage('<?php echo $translations['A01240'][$language]; /* Successfully update leader */ ?>', 'success', '<?php echo $translations['A01237'][$language]; /* Set Leader */ ?>', 'edit', 'adminSetIBGTRateListing.php');
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
