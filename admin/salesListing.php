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
                                            <form id="searchSales" role="form">
                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label">
                                                        <?php echo $translations['A00102'][$language]; /* Username */ ?>
                                                    </label>
                                                    <input type="text" class="form-control" dataName="username" dataType="text">
                                                </div>
                                              
                                                  <div class="col-sm-4 form-group">
                                                <label class="control-label">
                                                   Created At
                                                </label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control input-daterange-from" dataName="transactionDate" dataType="dateRange"/>
                                                    <span class="input-group-addon">
                                                        <?php echo $translations['A00139'][$language]; /* to */?>
                                                    </span>
                                                    <input type="text" class="form-control input-daterange-to" dataName="transactionDate" dataType="dateRange" />
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
                        <div class="card-box p-b-0">
                                 <button id="exportBtn" class="btn btn-primary waves-effect waves-light m-b-rem1">Export to xlsx</button>
                                <div id="basicwizard" class="pull-in">
                                   
                                    <form>
                                    <div class="tab-content b-0 m-b-0 p-t-0">
                                        <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                        <div id="salesListDIV" class="table-responsive"></div>
                                        <span id="paginateText"></span>
                                        <div class="text-center">
                                            <ul class="pagination pagination-md" id="pagerSalesList"></ul>
                                        </div>
                                    </div>
                                </div>
                                 </form>
                                  <button type="" id="seeAllBtn" class="btn btn-primary waves-effect waves-light" style="margin-bottom: 10px;">
                                              <?php echo $translations['A01191'][$language]; /* See All */?>
                                  </button> 
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
    var divId    = 'salesListDIV';
    var tableId  = 'salesListTable';
    var pagerId  = 'pagerSalesList';
    var btnArray = {};
    var thArray  = Array (
        "<?php echo $translations['A00112'][$language]; /* Created At */ ?>",
        "<?php echo $translations['A00102'][$language]; /* username */ ?>",
        "<?php echo $translations['A00996'][$language]; /* Stake Amount */ ?>(USD)",
        "Type",
        "CZO rate",
        "CZO amount"
    );

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

        setTodayDatePicker();
      

       fCallback = loadDefaultListing;
        formData  = {command: 'getSalesListing'};
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

    });

        $('#searchBtn').click(function() {
            pagingCallBack(pageNumber, loadSearch);
        });

        $('#resetBtn').click(function() {
            $('#alertMsg').removeClass('alert-success').html('').hide();
            $('#searchSales').find('input').each(function() {
                $(this).val('');
            });
            $('#searchSales').find('select').each(function() {
                $(this).val('');
            });
        });

        $('#seeAllBtn').click(function() {

        var searchID = 'searchSales';
        var searchData = buildSearchDataByType(searchID);
        formData  = {
            command : 'getSalesListing',
            inputData   : searchData,
            pageNumber   : 1,
            seeAll   : 1
        };
        console.log(formData);
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

    }); 

        $('#exportBtn').click(function() {
            var searchId   = 'searchSales';
            var searchData = buildSearchDataByType(searchId);
            var key  = Array (
               'created_at',
               'username',
               'product_price',
               'type',
               'coinRate',
               'czoAmount'
            );
            var formData  = {
                command    : "getSalesListing",
                filename   : "SalesListing",
                inputData  : searchData,
                header     : thArray,
                key        : key,
                DataKey    : "salesPageListing"

            };
             $.redirect('exportExcel2.php', formData);
        });


    function loadDefaultListing(data, message) {

        if(data.seeAll || data.seeAll == null) {
                $("#seeAllBtn").hide();
                $('#pagerSalesList').hide();
        }
        
        console.log(data);

        var totalUSDAmount = 0;
        var totalCZOAmount = 0;
        var tableNo;
        buildTable(data.salesPageListing, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        $('#' + tableId).find('tbody').append('<tr class=""><td style="text-align:right;border-left: none;" colspan="2"><b><?php echo $translations['A00221'][$language]; /* Total */?>:</b></td><td id="totalUSD"></td><td></td><td style="text-align: right"><b><?php echo $translations['A00221'][$language]; /* Total */?>:</b></td><td id="totalCZO"></td></tr>');

        $('#'+tableId).find('tbody tr').each(function(){
            var x = $(this).find("td:eq(2)").text().replace(',', '');
            var z = $(this).find("td:eq(5)").text().replace(',', '');

            if(x.length != 0){

                var totalUSD = parseFloat(x);

                 totalUSDAmount += totalUSD;
            }

            if(z.length != 0){

                var totalCZO = parseFloat(z);
                
                totalCZOAmount += totalCZO;
            }
            
        });

        $('#totalUSD').text((parseFloat(totalUSDAmount)).toFixed(8));
        $('#totalCZO').text((parseFloat(totalCZOAmount)).toFixed(8));

        
        // $('#'+tableId).tableExport({
        //     headers: true, // (Boolean), display table headers (th or td elements) in the <thead>, (default: true)
        //     footers: false, // (Boolean), display table footers (th or td elements) in the <tfoot>, (default: false)
        //     formats: ['xlsx'], // (String[]), filetype(s) for the export, (default: ['xlsx', 'csv', 'txt'])
        //     filename: 'Sales_Listing', // (id, String), filename for the downloaded file, (default: 'id')
        //     bootstrap: true, // (Boolean), style buttons using bootstrap, (default: true)
        //     exportButtons: true, // (Boolean), automatically generate the built-in export buttons for each of the specified formats (default: true)
        //     position: 'bottom', // (top, bottom), position of the caption element relative to table, (default: 'bottom')
        //     ignoreRows: null, // (Number, Number[]), row indices to exclude from the exported file(s) (default: null)
        //     ignoreCols: null, // (Number, Number[]), column indices to exclude from the exported file(s) (default: null)
        //     trimWhitespace: false // (Boolean), remove all leading/trailing newlines, spaces, and tabs from cell text in the exported file(s) (default: false)
        // });

        // $('button.xlsx').removeClass("btn-default").addClass("btn-primary waves-effect waves-light m-b-rem1");

    }

    function pagingCallBack(pageNumber, fCallback){

          if(pageNumber > 1) bypassLoading = 1;
            
            $("#seeAllBtn").show();
        
        var searchId   = 'searchSales';
        var searchData = buildSearchDataByType(searchId);
        var formData = {
            command     : "getSalesListing",
            pageNumber  : pageNumber,
            searchData  : searchData
        };
        if(!fCallback)
            fCallback = loadDefaultListing;

        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
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
        
        $('.input-daterange-from').daterangepicker({
            singleDatePicker: true,
            timePicker: false,
            locale: {
                format: 'DD/MM/YYYY'
            }
        });
        $('.input-daterange-from').val('');

        $('.input-daterange-to').daterangepicker({
            singleDatePicker: true,
            timePicker: false,
            locale: {
                format: 'DD/MM/YYYY'
            }
        });
        $('.input-daterange-to').val('');
        
        return today;
    }


    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<?php echo $translations['A00114'][$language]; /* Search successfully */?>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide();
        }, 3000);
    }


</script>
</body>
</html>
