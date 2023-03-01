<?php 
    session_start();

    // Get current page name
    $thisPage = basename($_SERVER['PHP_SELF']);

    // Check the session for this page
    // if(!isset ($_SESSION['access'][$thisPage]))
    //     echo '<script>window.location.href="accessDenied.php";</script>';
    // $_SESSION['lastVisited'] = $thisPage;
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
                                                <?php echo $translations['A00051'][$language]; /* Search */?>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div id="searchMsg" class="text-center alert" style="display: none;"></div>
                                            <form id="searchForm" role="form">
                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label" for="">
                                                        Approval Date
                                                    </label>
                                                    <input id="searchDate" type="text" class="form-control" dataName="approvedDate" dataType="singleDate" value="">
                                                </div>
                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label">
                                                       <?php echo $translations['A00102'][$language]; /* Username */ ?>
                                                    </label>
                                                    <input type="text" class="form-control" dataName="username" dataType="text">
                                                </div>

                                         <!--        <div class="col-sm-4 form-group">
                                                    <label class="control-label" for="" data-th="">
                                                        <?php echo $translations['A00828'][$language]; /* Product */?>
                                                    </label>
                                                    <select id="productNameList" class="form-control" dataName="product" dataType="select">
                                                    </select>
                                                </div> -->
                                            </form>
                                            <div class="col-xs-12">
                                                <div id="searchBtn" class="btn btn-primary waves-effect waves-light">
                                                    <?php echo $translations['A00051'][$language]; /* Search */?>
                                                </div>
                                                <div id="resetBtn" class="btn btn-default waves-effect waves-light">
                                                    <?php echo $translations['A00053'][$language]; /* Reset */?>
                                                </div>
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
                                <button id="backBtn" class="btn btn-primary waves-effect waves-light m-b-rem1">Back</button>
                                <form>
                                    <div id="basicwizard" class="pull-in">
                                        <div class="tab-content b-0 m-b-0 p-t-0">
                                            <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                            <div id="salesReportListDiv" class="table-responsive"></div>
                                            <span id="paginateText"></span>
                                            <div class="text-center">
                                                <ul class="pagination pagination-md" id="pagerSalesReportList"></ul>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!-- End row -->
                </div><!-- container -->
            </div><!-- content -->
            <?php include("footer.php"); ?>
        </div>
        <!-- End content-page -->
        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->
    </div><!-- END wrapper -->
    <!-- jQuery  -->
    <script>var resizefunc = [];</script>
    <?php include("shareJs.php"); ?>
    <script>
        // Initialize all the id in this page
        var divId    = 'salesReportListDiv';
        var tableId  = 'salesReportListTable';
        var pagerId  = 'pagerSalesReportList';
        var btnArray = {};
        var thArray  = Array( "Date",
                        "Username",
                        // "Main Leader Username",
                        "Coin Type",
                        "Qty of Coin Fund In",
                        "Live rate",
                        "Fund In Value in USD",
                        "Callback Amount"
                        );
            
        // Initialize the arguments for ajaxSend function
        var url             = 'scripts/reqAdmin.php';
        var method          = 'POST';
        var debug           = 0;
        var bypassBlocking  = 0;
        var bypassLoading   = 0;
        var pageNumber      = 1; 

        $(document).ready(function() {
            // alert("<?php echo $_POST['viewDate'] ?>");

            var today = "<?php echo $_POST['viewDate'] ?>";
            var t = today.split("-");

            // console.log(t);

            var latestDetectDate = t[2]+"/"+t[1]+"/"+t[0];

            $("#searchDate").val(latestDetectDate);



            var searchID = 'searchForm';
            var searchData = buildSearchDataByType(searchID);
            var formData   = {
                command     : "getFundInListing",
                pageNumber  : pageNumber,
                searchData   : searchData
            };
            // console.log(formData);
            fCallback = loadDefaultListing;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

            // setTodayDatePicker();

            // var formData  = {
            //     command: 'getFundInSalesReport',
            //     // pageNumber: pageNumber
            // };
            // var fCallback = loadDefaultListing;
            // ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
                
            $('#resetBtn').click(function() {
                $("#searchForm")[0].reset();
            });
            
            $('#searchBtn').click(function() {
                pagingCallBack(pageNumber, loadSearch);
            });

            // Initialize date picker
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
        });

        function pagingCallBack(pageNumber, fCallback){
                if(pageNumber > 1) bypassLoading = 1;

                var searchID = 'searchForm';
                var searchData = buildSearchDataByType(searchID);
                var formData   = {
                    command     : "getFundInListing",
                    pageNumber  : pageNumber,
                    searchData   : searchData
                };
                if(!fCallback)
                    fCallback = loadDefaultListing;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }
        
        function loadDefaultListing(data, message) {
            // console.log(data);
            
            var tableNo;
            if (data.fundInList){
                var newList = [];
                $.each(data.fundInList, function(k, v){
                    var rebuildData = {
                        approved_at : v['created_at'],
                        username: v['username'], 
                        // mainLeaderUsername : v['mainLeaderUsername'],
                        credit_type : v['crypto_type'],
                        amount: v['top_up_amount'], 
                        rate : v['coin_rate'],
                        totalValue : v['receivable_amount'],
                        callbackAmount: v['call_back_amount']
                    };
                    newList.push(rebuildData);
                });
            }
            buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
            pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

            // $('#'+tableId).find('tbody tr').each(function(){
            //     $(this).find('td:eq(0)').css('min-width', "100px");
            //     $(this).find('td:eq(2)').css('min-width', "100px");
            //     $(this).find('td:eq(3)').css('min-width', "100px");
            //     $(this).find('td:eq(4)').css('min-width', "100px");
            //     $(this).find('td:eq(5)').css('min-width', "100px");
            //     $(this).find('td:eq(6)').css('min-width', "100px");
            //     $(this).find('td:eq(7)').css('min-width', "100px");
            //     $(this).find('td:eq(8)').css('min-width', "100px");
            //     $(this).find('td:eq(9)').css('min-width', "100px");
            // });

            // $('#salesReportListTable thead tr:first').before('<tr>'+data.firstTableHeader+'</tr>');

            // $('#'+tableId).tableExport({
            //     headers: true, // (Boolean), display table headers (th or td elements) in the <thead>, (default: true)
            //     footers: false, // (Boolean), display table footers (th or td elements) in the <tfoot>, (default: false)
            //     formats: ['xlsx'], // (String[]), filetype(s) for the export, (default: ['xlsx', 'csv', 'txt'])
            //     filename: 'Sales_Purchase_Report', // (id, String), filename for the downloaded file, (default: 'id')
            //     bootstrap: true, // (Boolean), style buttons using bootstrap, (default: true)
            //     exportButtons: true, // (Boolean), automatically generate the built-in export buttons for each of the specified formats (default: true)
            //     position: 'bottom', // (top, bottom), position of the caption element relative to table, (default: 'bottom')
            //     ignoreRows: null, // (Number, Number[]), row indices to exclude from the exported file(s) (default: null)
            //     ignoreCols: null, // (Number, Number[]), column indices to exclude from the exported file(s) (default: null)
            //     trimWhitespace: false // (Boolean), remove all leading/trailing newlines, spaces, and tabs from cell text in the exported file(s) (default: false)
            // });

            // $('button.xlsx').removeClass("btn-default").addClass("btn-primary waves-effect waves-light");
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

        $('#searchDate').daterangepicker({
            singleDatePicker: true,
            timePicker: false,
            locale: {
                format: 'DD/MM/YYYY'
            }
        });

        function tableBtnClick(btnId) {
            var btnName  = $('#'+btnId).attr('id').replace(/\d+/g, '');
            var tableRow = $('#'+btnId).parent('td').parent('tr');
            var tableId  = $('#'+btnId).closest('table');

            if (btnName == 'view') {
                var viewDate = tableRow.attr('data-th');
                $.redirect("fundInSalesReportListing.php", {viewDate : viewDate});
            }
        }
        
        function loadSearch(data, message) {
            loadDefaultListing(data, message);
            $('#searchMsg').addClass('alert-success').html('<span>'+'<?php echo $translations['A00114'][$language]; /* Search successful. */?>'+'</span>').show();
            setTimeout(function() {
                $('#searchMsg').removeClass('alert-success').html('').hide(); 
            }, 3000);
        }

        $("#backBtn").click(function(){
            window.location.href="fundInSalesReport.php";
        })
    </script>
</body>
</html>