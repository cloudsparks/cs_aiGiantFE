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
                                                            <label class="control-label">
                                                                <?php echo $translations['A00137'][$language]; /* Date */ ?>
                                                            </label>
                                                            <div class="input-group input-daterange">
                                                                <input type="text" class="form-control" dataName="date"
                                                                       dataType="dateRange">
                                                                <span class="input-group-addon">
                                                                    <?php echo $translations['A00139'][$language]; /* to */ ?>
                                                                </span>
                                                                <input type="text" class="form-control" dataName="date"
                                                                       dataType="dateRange">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-4 form-group">
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
                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label">
                                                                <?php echo $translations['A00318'][$language]; /* Username */ ?>
                                                            </label>
                                                            <!-- <input type="text" class="form-control" dataName="username" dataType="text"> -->
                                                            <select id="status" class="form-control" dataName="status"
                                                                dataType="text">
                                                            <option value="">
                                                                <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                            </option>
                                                            <option value="Waiting">
                                                            Waiting
                                                            </option>
                                                            <option value="Released">
                                                            Released
                                                            </option>
                                                            </select>
                                                        
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xs-12">
                                                    <div class="row">
                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label">
                                                            <?php echo $translations['A01715'][$language]; /* Reference ID */ ?>
                                                            </label>
                                                            <input type="text" class="form-control" dataName="refID" dataType="text">
                                                        </div>
                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label">
                                                            <?php echo $translations['A01716'][$language]; /* Payment ID */ ?>
                                                            </label>
                                                            <input type="text" class="form-control" dataName="paymentID" dataType="text">
                                                        </div>
                                                        <!-- <div class="col-sm-4 form-group">
                                                            <label class="control-label">
                                                            <?php echo $translations['A01717'][$language]; /* Order ID  */ ?>
                                                            </label>
                                                            <input type="text" class="form-control" dataName="orderID" dataType="text">
                                                        </div> -->
                                                    </div>
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
                            <form>
                                <div id="basicwizard" class="pull-in" style="display: none">
                                    <div class="tab-content b-0 m-b-0 p-t-0" style="padding-bottom: 0;">
                                            <a id="exportBtn" onclick="exportBtn()" class="btn btn-primary waves-effect waves-light m-b-rem1" style="display: none;"><?php echo $translations['A01352'][$language]; /* Export to xlsx */ ?></a>
                                            <!-- <a id="seeAllBtn" onclick="seeAllBtn()" class="btn btn-primary waves-effect waves-light m-b-rem1" style="display: none;">
                                                <?php echo $translations['A01191'][$language]; /* See All */ ?>
                                            </a> -->
                                        <form>
                                            <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                            <div id="listingDiv" class="table-responsive"></div>
                                            <span id="paginateText"></span>
                                            <div class="text-center">
                                                <ul class="pagination pagination-md" id="listingPager"></ul>
                                            </div></form>
                                        </form>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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
    //   var url       = 'scripts/reqBonus.php';
    var url            = 'scripts/reqAdmin.php';
      var divId    = 'listingDiv';
    var tableId  = 'listingTable';
    var pagerId  = 'listingPager';
    var btnArray = {};
    var thArray  = Array(
        '<span data-lang="M00058"><?php echo $translations['A00112'][$language]; //Created At ?></span>',
        '<span data-lang="M00058"><?php echo $translations['A00148'][$language]; //Member ID ?></span>',
        // '<span data-lang="M00058"><?php echo $translations['A01717'][$language]; //Order ID ?></span>',
        '<span data-lang="M00058"><?php echo $translations['A01715'][$language]; //Reference ID ?></span>',
        '<span data-lang="M00058"><?php echo $translations['A00318'][$language]; //Status ?></span>',
        // '<span data-lang="M00058"><?php echo $translations['A01720'][$language]; //Wallet Option x ?></span>',
        '<span data-lang="M00058"><?php echo $translations['A01721'][$language]; //Fiat Symbol ?></span>',
        '<span data-lang="M00058"><?php echo $translations['A01722'][$language]; //Fiat Amount ?></span>',
        '<span data-lang="M00058"><?php echo $translations['A00821'][$language]; //Amount ?>(USDT)</span>',
        '<span data-lang="M00058"><?php echo $translations['A01723'][$language]; //Fee ?></span>',
        '<span data-lang="M00058"><?php echo $translations['A01477'][$language]; //Receivable Amount ?></span>',
        '<span data-lang="M00058"><?php echo $translations['A01716'][$language]; //Payment ID ?></span>',

        // 'Member ID',
        // 'Order ID',
    );
    var thexport  = Array(
        'Created At' ,
        'Member ID',
        // 'Order ID',
        'Reference ID ',
        'Status',
        // 'Wallet Option',
        'Fiat Symbol',
        'Fiat Amount',
        'Amount',
        'Fee',
        'Receivable Amount',
        'Payment ID',
    );
        
    // Initialize the arguments for ajaxSend function
    
    var method         = 'POST';
    var debug          = 0;
    var bypassBlocking = 0;
    var bypassLoading  = 0;
    var pageNumber     = 1;
    var activityDate   = ""; 
        
    $(document).ready(function() {
        setTodayDatePicker();
        
        $("body").keyup(function(event) {
            if (event.keyCode == 13) {
                $("#searchBtn").click();
            }
        });
        
        $('#searchBtn').click(function() {
            pagingCallBack(pageNumber, loadSearch);
        });
        
        $('#resetBtn').click(function() {
            $('#alertMsg').removeClass('alert-success').html('').hide();
            $('#searchForm').find('input:not([type=radio])').each(function() {
               $(this).val(''); 
            });
            $('#searchForm').find('select').val('');
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
    });

    // $('#seeAllBtn').click(function () {
    //     var searchId   = 'searchForm';
    //     var searchData = buildSearchDataByType(searchId);

    //     if(pageNumber > 1) bypassLoading = 1;
        
    //     var formData = {
    //         command     : "getCryptoOrderPurchaseList",
    //         searchData  : searchData,
    //         pageNumber  : pageNumber,
    //         seeAll      : 1
    //     };
        
    //     fCallback = CryptoOrderPurchaseList;

    //     ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    // });

    function exportBtn(){
        var searchId = 'searchForm';
            var searchData = buildSearchDataByType(searchId);
            var key  = Array (
                'created_at',
                'memberID',
                // 'order_id',
                'reference_id',
                'status',
                // 'walletOption',
                'fiat_symbol',
                'fiat_amount',
                'amount',
                'adminCharged',
                'receivableAmount',
                'payment_id',
            );

            var formData = {
                command: "getCryptoOrderPurchaseList",
                filename: "CryptoOrderPurchaseList",
                searchData: searchData,
                header: thexport,
                key: key,
                DataKey: "orderListing",
                type: 'export',
            };
            fCallback = exportExcel;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }


    
    function CryptoOrderPurchaseList(data, message) {

        $('#basicwizard').show();
        if(data){
        $("#exportBtn").show();
        }
        // $("#seeAllBtn").show();
        // if (data.totalPage >= 1) {
        //     $("#seeAllBtn").show();
        // } else {
        //     $("#seeAllBtn").hide();
        // }
        
        var orderListing = data.orderListing;
        if (orderListing){
            var newData = [];
            $.each(orderListing, function(k, v){
                if(v['memberID'] == '') {
                    v['memberID'] = '-';
                }
                // if(v['walletOption'] == '') {
                //     v['walletOption'] = '-';
                // }
                if(v['reference_id'] == '') {
                    v['reference_id'] = '-';
                }
                if(v['order_id'] == '') {
                    v['order_id'] = '-';
                }
                if(v['fiat_symbol'] == '') {
                    v['fiat_symbol'] = '-';
                }
                if(v['fiat_amount'] == '') {
                    v['fiat_amount'] = '0';
                }
                if(v['amount'] == '') {
                    v['amount'] = '0';
                }
                if(v['payment_id'] == '') {
                    v['payment_id'] = '-';
                }
                var rebuild = {
                    created_at             : v['created_at'],
                    memberID               : v['memberID'],
                    // order_id               : v['order_id'],
                    reference_id           : v['reference_id'], 
                    status                 : v['status'],
                    // walletOption           : v['walletOption'],
                    fiat_symbol            : v['fiat_symbol'],
                    fiat_amount            : numberThousand( v['fiat_amount'],2), 
                    amount                 : numberThousand(v['amount'],2),
                    adminCharged           : numberThousand(v['adminCharged'],3),
                    receivableAmount       : numberThousand( v['receivableAmount'],2),
                    payment_id             : v['payment_id'],

                   
                };

                newData.push(rebuild);
            });
        }

        var tableNo;
        buildTable(newData, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);
        
        $('#' + tableId).find('tr').each(function () {
            $(this).find('td:eq(6), th:eq(6)').css('text-align', "right");
            $(this).find('td:eq(7), th:eq(7)').css('text-align', "right");
            $(this).find('td:eq(8), th:eq(8)').css('text-align', "right");
        });

        if(typeof(data.activityTypeList) != 'undefined') {
            var selection = $('#searchForm #activityType').val();
            // Set the Command dropdown in Search section
            var searchDropdown = data.activityTypeList;
            setSearchOption(searchDropdown, selection);
        }

        if(data.grandTotal) {
            $('#' + tableId).find('tbody').append(`
                <tr style="">
                    <td colspan='6' class="text-right"><b><?php echo $translations['A00651'][$language]; /* Grand Total */?>:</b></td>
                    <td> ${numberThousand(data.grandTotal.tronUSDT.topUpAmount, 2)} </td>
                    <td>${numberThousand(data.grandTotal.tronUSDT.callBackAmount, 2)} </td>
                    <td>${numberThousand(data.grandTotal.tronUSDT.receivableAmount, 2)} </td>
                    <td colspan='10'></td>
                </tr>
            `);
        }
    }

    function pagingCallBack(pageNumber, fCallback){
        var searchId   = 'searchForm';
        var searchData = buildSearchDataByType(searchId);

        if(pageNumber > 1) bypassLoading = 1;
        var formData = {
            command      : "getCryptoOrderPurchaseList",
            searchData    : searchData,
            pageNumber   : pageNumber,
            usernameSearchType : $("input[name=usernameType]:checked").val()
        };
        
        // if(!fCallback)
            fCallback = CryptoOrderPurchaseList;
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
        $('#searchForm #activityType').find('option:not(:first-child)').remove();
        $.each(data, function(key, val) {
            $('#searchForm #activityType').append('<option value="' + val['activityType'] + '">' + val['activityType'] + '</option>');
        });
        if (searchVal != ' '){
            $('#searchForm #activityType').val(searchVal);
        }
    }
    
    function loadSearch(data, message) {
        CryptoOrderPurchaseList(data, message);
        $('#searchMsg').addClass('alert-success').html('<span><?php echo $translations['A00114'][$language]; /* Search successful. */ ?></span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide(); 
        }, 3000);
    }
    
</script>
</body>
</html>