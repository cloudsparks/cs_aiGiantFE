<?php
session_start();


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
                                        <form id="searchAdvertisement" role="form">
                                            <div class="col-sm-4 form-group">
                                                <label class="control-label">
                                                    <?php echo $translations["A00950"][$language]; /* Ad No */ ?>
                                                </label>
                                                <input type="text" class="form-control" dataName="advertisementNo" dataType="text">
                                            </div>
                                            <div class="col-sm-4 form-group">
                                                <label class="control-label">
                                                    <?php echo $translations['A00951'][$language]; /* Username */ ?>
                                                </label>
                                                <input type="text" class="form-control" dataName="username" dataType="text">
                                                <!-- <input id="purchaseDate" type="text" class="form-control" dataName="purchaseDate" dataType="singleDate"> -->
                                            </div>
                                            <div class="col-sm-4 form-group">
                                                <label class="control-label">
                                                    <?php echo $translations['A00952'][$language]; /* Type */ ?>
                                                </label>
                                                <select class="form-control" dataName="type" dataType="select">
                                                    <option value="">
                                                        <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                    </option>
                                                    <option value="buy">
                                                        <?php echo $translations['A00953'][$language]; /* Buy */ ?>
                                                    </option>
                                                    <option value="sell">
                                                        <?php echo $translations["A00954"][$language]; /* Sell */ ?>
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="col-sm-4 form-group">
                                                <label class="control-label">
                                                    <?php echo $translations['A00318'][$language]; /* Status */ ?>
                                                </label>
                                                <select class="form-control" dataName="status" dataType="select">
                                                    <option value="">
                                                        <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                    </option>
                                                    <option value="New">
                                                        <?php echo $translations['A00955'][$language]; /* New */ ?>
                                                    </option>
                                                    <option value="Canceled">
                                                        <?php echo $translations['A00956'][$language]; /* Canceled */ ?>
                                                    </option>
                                                    <option value="Completed">
                                                        <?php echo $translations['A00957'][$language]; /* Completed */ ?>
                                                    </option>
                                                    <option value="Flushed">
                                                        <?php echo $translations['A00958'][$language]; /* Flushed */ ?>
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="col-sm-4 form-group">
                                                <label class="control-label">
                                                    <?php echo $translations['A00112'][$language]; /* Created at */ ?>
                                                </label>
                                                 <div class="input-group">
                                                    <div>
                                                        <input id="dateFrom" type="text" class="form-control" dataName="searchDate" dataType="dateRange">
                                                    </div>
                                                    <span class="input-group-addon">
                                                        <?php echo $translations['A00139'][$language]; /* to */?>
                                                    </span>
                                                    <div>
                                                        <input id="dateTo" type="text" class="form-control" dataName="searchDate" dataType="dateRange">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="col-xs-12">
                                            <button id="searchBtn" type="submit" class="btn btn-primary waves-effect waves-light">
                                                <?php echo $translations['A00051'][$language]; /* Search */ ?>
                                            </button>
                                            <button type="submit" id="resetBtn" class="btn btn-default waves-effect waves-light">
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
                            <div id="basicwizard" class="pull-in">
                                <div class="tab-content b-0 m-b-0 p-t-0">
                                    <form>
                                        <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                        <div id="advertisementListDiv" class="table-responsive"></div>
                                        <span id="paginateText"></span>
                                        <div class="text-center">
                                            <ul class="pagination pagination-md" id="pagerAdvertisementList"></ul>
                                        </div>

                                    </form>
                                    <!-- <span>
                                        <?php echo $translations['A00663'][$language]; /* With selected */ ?> : 
                                    </span>
                                    <select id="status">
                                        <option value="Used" selected>
                                            <?php echo $translations['A00659'][$language]; /* Used */ ?>
                                        </option>
                                        <option value="Cancel">
                                            <?php echo $translations['A00660'][$language]; /* Cancel */ ?>
                                        </option>
                                        <option value="Refund">
                                            <?php echo $translations['A00661'][$language]; /* Refund */ ?>
                                        </option>
                                    </select>
                                    <button type="submit" id="updateBtn" class="btn btn-primary waves-effect waves-light">
                                        <?php echo $translations['A00300'][$language]; /* Update */ ?>
                                    </button> -->
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

    // Initialize all the id in this page
    var divId    = 'advertisementListDiv';
    var tableId  = 'advertisementListTable';
    var pagerId  = 'pagerAdvertisementList';
    var btnArray = {};
    var thArray  = Array(
                           '<?php echo $translations['A00564'][$language]; /* Transaction Date */ ?>',
                           '<?php echo $translations["A00950"][$language]; /* Ad No */ ?>',
                           '<?php echo $translations['A00565'][$language]; /* Transaction Type */ ?>',
                            '<?php echo $translations['A00102'][$language]; /* Username */ ?>',
                            '<?php echo $translations['A00117'][$language]; /* Full Name */ ?>',
                            '<?php echo $translations['A00959'][$language]; /* Quantity */ ?>',
                            '<?php echo $translations['A00960'][$language]; /* Quantity Left */ ?>',
                            '<?php echo $translations['A00961'][$language]; /* Price */ ?>',
                            '<?php echo $translations['A00962'][$language]; /* Total Cost */ ?>',
                            '<?php echo $translations['A00318'][$language]; /* Status */ ?>',
                            '<?php echo $translations['A00963'][$language]; /* Descriptiion */ ?>'
                        );

     // Initialize the arguments for ajaxSend function
    var url             = 'scripts/reqTrade.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";
    var searchId        = 'searchAdvertisement';
    // var type            = "<?php echo $_GET['type'];?>";  

    $(document).ready(function() {

        setTodayDatePicker();
        formData  = {
            command : 'getAdvertisementList',
            pageNumber   : pageNumber
        };
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        
        //reset to default search
        $('#resetBtn').click(function() {
            $('#alertMsg').removeClass('alert-success').html('').hide();
            $('#searchAdvertisement').find('input').each(function() {
               $(this).val(''); 
            });
            $('#searchAdvertisement').find('select').each(function() {
                $(this).val('');
            $("#searchAdvertisement")[0].reset();
            setTodayDatePicker();
            });

        });
        
        $('#searchBtn').click(function() {
            pagingCallBack(pageNumber, loadSearch);
        }); 

         //  $('#searchAdvertisement').keypress(function(e){
         //    if(e.which == 13){//Enter key pressed
         //        $('#searchBtn').click();//Trigger enter button click event
         //    }
         // });
    });
    
    function loadDefaultListing(data, message) {
        console.log(data);
        var tableNo;
        buildTable(data.advertisementList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);


        $('#'+tableId).find('tbody tr').each(function(){
            $(this).find('td:eq(9)').addClass('hide');
        });
    }

    function pagingCallBack(pageNumber, fCallback){
        if(pageNumber > 1) bypassLoading = 1;

        var searchData = buildSearchDataByType(searchId);
        var formData   = {
            command     : 'getAdvertisementList',
            pageNumber  : pageNumber,
            inputData   : searchData,
        };
        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span>'+'<?php echo $translations['A00114'][$language]; /* Search successful. */?>'+'</span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide(); 
        }, 3000);
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
        
        $('#dateFrom').daterangepicker({
            singleDatePicker: true,
            timePicker: false,
            locale: {
                format: 'DD/MM/YYYY 00:00:00'
            }
        });
        $('#dateFrom').val('');

        $('#dateTo').daterangepicker({
            singleDatePicker: true,
            timePicker: false,
            locale: {
                format: 'DD/MM/YYYY 23:59:59'
            }
        });
        $('#dateTo').val('');
        
        return today;
    }

</script>
</body>
</html>