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
                                        <form id="searchOrder" role="form">
                                            <div class="col-sm-4 form-group">
                                                <label class="control-label">
                                                    <?php echo $translations["A01134"][$language]; /* Order No */ ?>
                                                </label>
                                                <input type="text" class="form-control" dataName="orderNo" dataType="text">
                                            </div>
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
                                                    <option value="Pending">
                                                        <?php echo $translations['A01135'][$language]; /* Pending */ ?>
                                                    </option>
                                                    <option value="Canceled">
                                                        <?php echo $translations['A00956'][$language]; /* Canceled */ ?>
                                                    </option>
                                                    <option value="Accepted">
                                                        <?php echo $translations['A01136'][$language]; /* Accepted */ ?>
                                                    </option>
                                                    <option value="Rejected">
                                                        <?php echo $translations['A01137'][$language]; /* Rejected */ ?>
                                                    </option>
                                                    <option value="TimeOut">
                                                        <?php echo $translations['A01138'][$language]; /* Time Out */ ?>
                                                    </option>
                                                    <option value="Disputes">
                                                        <?php echo $translations['A01139'][$language]; /* Disputes */ ?>
                                                    </option>
                                                    <option value="Completed">
                                                        <?php echo $translations['A01140'][$language]; /* Completed */ ?>
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
                                        <div id="orderListDiv" class="table-responsive"></div>
                                        <span id="paginateText"></span>
                                        <div class="text-center">
                                            <ul class="pagination pagination-md" id="pagerOrderList"></ul>
                                        </div>

                                    </form>
                                    <span>
                                        <?php echo $translations['A00663'][$language]; /* With selected */ ?> : 
                                    </span>
                                    <select id="status">
                                        <option value="Completed" selected>
                                            <?php echo $translations['A01141'][$language]; /* Approved */ ?>
                                        </option>
                                        <option value="Rejected">
                                            <?php echo $translations['A01142'][$language]; /* Rejected */ ?>
                                        </option>
                                        <option value="Terminate">
                                            <?php echo $translations['A01143'][$language]; /* Terminate */ ?>
                                        </option>
                                    </select>
                                    <button type="submit" id="updateBtn" class="btn btn-primary waves-effect waves-light">
                                        <?php echo $translations['A00300'][$language]; /* Update */ ?>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End row -->

            </div> <!-- container -->

            <!-- modal START -->
            <div class="modal stick-up" id="viewDetails" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-md">
                    <div class="modal-content-wrapper">
                        <div class="modal-content">
                            <div class="modal-header clearfix text-left">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                                </button>
                                <div id="modalHeader"></div>
                            </div>
                            <div id="modalContent" class="modal-body mt-4">
                                <!-- <div class="table-responsive pt-4" style="border: none;">
                                <table class="table" style="border: 1px solid #dddddd;">
                                    <tbody id="modalContent"></tbody>
                                </table>
                                </div> -->
                            </div>
                            <div class="modal-footer">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal END -->
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
    var divId    = 'orderListDiv';
    var tableId  = 'orderListTable';
    var pagerId  = 'pagerOrderList';
    var btnArray = {};
    var thArray  = Array(  '',
                           '<?php echo $translations['A00564'][$language]; /* Transaction Date */ ?>',
                           '<?php echo $translations["A01134"][$language]; /* Order No */ ?>',
                           '<?php echo $translations["A00950"][$language]; /* Ad No */ ?>',
                           '<?php echo $translations['A00565'][$language]; /* Transaction Type */ ?>',
                            '<?php echo $translations['A00102'][$language]; /* Username */ ?>',
                            '<?php echo $translations['A00117'][$language]; /* Full Name */ ?>',
                            '<?php echo $translations['A00171'][$language]; /* Phone */ ?>',
                            '<?php echo $translations['A00959'][$language]; /* Quantity */ ?>',
                           // '<?php echo $translations['A00960'][$language]; /* Quantity Left */ ?>',
                            '<?php echo $translations['A00961'][$language]; /* Price */ ?>',
                            '<?php echo $translations['A00962'][$language]; /* Total Cost */ ?>',
                            '<?php echo $translations['A00318'][$language]; /* Status */ ?>',
                            '<?php echo $translations['A01152'][$language]; /* Updated By */ ?>',
                            '<?php echo $translations['A01153'][$language]; /* Payment Method */ ?>',
                            '<?php echo $translations['A01154'][$language]; /* Receipt */ ?>',
                            
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
    var searchId        = 'searchOrder';
    // var type            = "<?php echo $_GET['type'];?>";  

    $(document).ready(function() {

        setTodayDatePicker();
        formData  = {
            command : 'getOrderList',
            pageNumber   : pageNumber
        };
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        
        //reset to default search
        $('#resetBtn').click(function() {
            $('#alertMsg').removeClass('alert-success').html('').hide();
            $('#searchOrder').find('input').each(function() {
               $(this).val(''); 
            });
            $('#searchOrder').find('select').each(function() {
                $(this).val('');
            $("#searchOrder")[0].reset();
            setTodayDatePicker();
            });

        });
        
        $('#searchBtn').click(function() {
            pagingCallBack(pageNumber, loadSearch);
        }); 

        $('#updateBtn').click(function(){
            var orderIDList = [];

            $("#orderListTable > tbody > tr").each(function(key, value){

                if ($(this).find("input[name='checkbox']").is(':checked')){
                    orderIDList.push($(this).attr("data-th"));
                }
            });

            var status = $('#status').val();

            formData = {
                command     : "adminUpdateOrderStatus",
                orderID     : orderIDList,
                status      : status
            };

            fCallback = loadSuccessful;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        });
    });
    
    function loadDefaultListing(data, message) {
        var tableNo;
        var orderResult = data.orderList;
        
        if(data != "" && orderResult.length>0) {
            var newList = [];
            var j = 0;
            $.each(orderResult, function(k, v) {
                var checkbox = "";
                if(v['status'] === "Disputes" || v['status'] === "Pending" || v['status'] === "Accepted"){
                    checkbox = "<input name ='checkbox' type ='checkbox'>";
                }else{
                    checkbox = "-";
                }

                var rebuildData = {
                    check : checkbox,
                    Date : v['createdAt'],
                    orderNo : v['orderNo'],
                    AdNo : v['advertisementNo'],
                    type : v['type'],
                    username : v['username'],
                    name : v['name'],
                    contact: v['contactNumber'],
                    quantity : v['quantity'],
                    price : v['price'],
                    totalCost : v['totalCost'],
                    status : v['status'],
                    updatedBy : v['updater'],
                    paymentMethod: '<a data-toggle="tooltip" title="View" id="viewPaymentMethod'+j+'" onclick="tableBtnClick(this.id, '+v['paymentMethod']+')" class="m-t-5 m-r-10 btn btn-icon waves-effect waves-light btn-primary"><i class="fa fa-eye"></i></a>',
                    receipt: '<a data-toggle="tooltip" title="View" id="viewReceipt'+j+'" onclick="tableBtnClick(this.id, '+v['attachmentID']+')" class="m-t-5 m-r-10 btn btn-icon waves-effect waves-light btn-primary"><i class="fa fa-eye"></i></a>'
                };
                ++j;
                newList.push(rebuildData);
            });
        }

        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        if(orderResult) {
            $.each(orderResult, function(k, v) {
                $('#'+tableId).find('tr#'+k).attr('data-th', v['id']);
            });

            // $("#orderListTable > tbody > tr").each(function(key, value){
            //     if ($(this).find("td:contains('Disputes')").text() === "Disputes")
            //         $(this).append("<td><input name ='checkbox' type ='checkbox'></td>");
            //     else
            //         $(this).append("<td></td>");

            // });
        }
    }

    function pagingCallBack(pageNumber, fCallback){
        if(pageNumber > 1) bypassLoading = 1;

        var searchData = buildSearchDataByType(searchId);
        var formData   = {
            command     : 'getOrderList',
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

    function tableBtnClick(btnId, data, orderId) {
        var btnName  = $('#'+btnId).attr('id').replace(/\d+/g, '');
        var tableRow = $('#'+btnId).parent('td').parent('tr');
        var tableId  = $('#'+btnId).closest('table');

        if (btnName == 'viewPaymentMethod') {
            var paymentMethodAry = data.toString().split("##");
            var formData   = {
                command     : 'viewPaymentMethod',
                paymentMethodID     : paymentMethodAry,
            };

            // if(!fCallback)
                fCallback = loadDetails;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }

        if (btnName == 'viewReceipt') {
            var viewId = tableRow.attr('data-th');
            var formData   = {
                command     : 'viewReceipt',
                orderID     : viewId,
                attachmentID : data,
            };
            // if(!fCallback)
                fCallback = loadDetails;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        }
    }

    function loadDetails(data, message) {
        var paymentMethod = data.paymentMethod;
        var attachment = data.attachment;
        var modalHeader = "";
        var modalData = "";

        $("#modalHeader").empty();
        $("#modalContent").empty();

        if(paymentMethod){
            $.each(paymentMethod, function(key, value){
                modalHeader += '<h4><?php echo $translations['A01153'][$language]; /* Payment Method */ ?></h4>';
                modalData += '<h4 style="font-weight:bold; border-bottom:1px;">'+value.paymentMethod+'</h4>';
                $.each(value.details, function(k, v){
                    modalData += '<div><label>'+v.display+'</label> : <span class="m-l-rem1">'+v.value+'</span></div>';
                });    
            });
        }

        if(attachment){
            modalHeader += '<h4><?php echo $translations['A01154'][$language]; /* Receipt */ ?></h4>';
            $.each(attachment, function(key, value){
                modalData += '<div class="card-block" style="padding: 0;"><img src="'+value['base_64']+'" class="imgCustom" style="width: 100%;"></div>';
            });
        } 
        
        if(modalHeader != "" && modalData != ""){
            $("#modalHeader").append(modalHeader);
            $("#modalContent").append(modalData);
        }else{
            modalData = "<div><span style='text-align:center;'>No results.</span></div>";
            $("#modalContent").append(modalData);
        }

        $("#viewDetails").modal("show");
    }

    function loadSuccessful(data, message){
        showMessage("<?php echo $translations['A00684'][$language]; /* Update Successful */ ?>", "success", "Trade Order Listing", "edit", "trdOrderList.php");
    }

</script>
</body>
</html>