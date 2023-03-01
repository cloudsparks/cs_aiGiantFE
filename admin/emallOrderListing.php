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
                                        <form id="searchDiamondOrder" role="form">
                                            <div class="col-sm-12 px-0">
                                                <div class="col-sm-3 form-group">
                                                    <label class="control-label">
                                                        <?php echo $translations['A00102'][$language]; /* Username */ ?>
                                                    </label>
                                                    <span class="pull-right">
                                                        <input id="match" type="radio" name="usernameType" value="match" checked> 
                                                        <label for="match" style="margin-right: 15px;"><?php echo $translations['A01347'][$language]; /* Match */ ?></label>

                                                        <input id="like" type="radio" name="usernameType" value="like" style="margin-left: 15px;" > 
                                                        <label for="like"><?php echo $translations['A01348'][$language]; /* Like */ ?></label>
                                                    </span>
                                                    <input type="text" class="form-control" dataName="username" dataType="text">
                                                </div>
                                                <div class="col-sm-3 form-group">
                                                    <label class="control-label">
                                                        <?php echo $translations['A00112'][$language]; /* Created at */ ?>
                                                    </label>
                                                     <div class="input-group">
                                                        <div>
                                                            <input id="dateFrom" type="text" class="form-control" dataName="createdAt" dataType="dateRange">
                                                        </div>
                                                        <span class="input-group-addon">
                                                            <?php echo $translations['A00139'][$language]; /* to */?>
                                                        </span>
                                                        <div>
                                                            <input id="dateTo" type="text" class="form-control" dataName="createdAt" dataType="dateRange">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 form-group">
                                                    <label class="control-label">
                                                        <?php echo $translations['A00153'][$language]; /* Country */ ?>
                                                    </label>
                                                    <select id="countryName" class="form-control" dataName="country_id" dataType="text">
                                                        <option value="">
                                                            <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-3 form-group">
                                                    <label class="control-label">
                                                        <?php echo $translations['A00344'][$language]; /* Category */ ?>
                                                    </label>
                                                    <select id="selectionCategory" class="form-control" dataName="category" dataType="text">
                                                        <option value="">
                                                            <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 px-0">
                                                <div class="col-sm-3 form-group">
                                                    <label class="control-label">
                                                        <?php echo "Collect Method";//$translations['A00344'][$language]; /* Category */ ?>
                                                    </label>
                                                    <select id="selectionCollectMethod" class="form-control" dataName="collectMethod" dataType="text">
                                                        <option value="">
                                                            <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                        </option>
                                                        <option value="Delivery">
                                                            <?php echo $translations['A01386'][$language]; /* Delivery */ ?>
                                                        </option>
                                                        <option value="Self Collect">
                                                            <?php echo $translations['A01385'][$language]; /* Self Collect */ ?>
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-3 form-group">
                                                    <label class="control-label">
                                                        <?php echo $translations['A00318'][$language]; /* Status */ ?>
                                                    </label>
                                                    <select id="selectionStatus" class="form-control" dataName="status" dataType="text">
                                                        <option value="">
                                                            <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                        </option>
                                                        <option value="Pending">
                                                            <?php echo $translations['A01017'][$language]; /* Pending */ ?>
                                                        </option>
                                                        <option value="Delivered">
                                                            <?php echo $translations['A01379'][$language]; /* Delivered */ ?>
                                                        </option>
                                                        <option value="Collected">
                                                            <?php echo $translations['A01380'][$language]; /* Collected */ ?>
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                         <!-- <div class="col-sm-12 px-0">
                                            <div class="col-sm-3 form-group">
                                                <label class="control-label">
                                                    <?php echo $translations['A00102'][$language]; /* Username */ ?>
                                                </label>
                                                <span class="pull-right">
                                                    <input id="match" type="radio" name="usernameType" value="match" checked> 
                                                    <label for="match" style="margin-right: 15px;"><?php echo $translations['A01347'][$language]; /* Match */ ?></label>

                                                    <input id="like" type="radio" name="usernameType" value="like" style="margin-left: 15px;" > 
                                                    <label for="like"><?php echo $translations['A01348'][$language]; /* Like */ ?></label>
                                                </span>
                                                <input type="text" class="form-control" dataName="username" dataType="text">
                                            </div>
                                            <div class="col-sm-3 form-group">
                                                <label class="control-label">
                                                    <?php echo $translations['A01165'][$language]; /* Ticket No */ ?>
                                                </label>
                                                <input type="text" class="form-control" dataName="ticketNo" dataType="text">
                                            </div>
                                            <div class="col-sm-3 form-group">
                                                <label class="control-label">
                                                    <?php echo $translations['A00369'][$language]; /* Subject */ ?>
                                                </label>
                                                <input type="text" class="form-control" dataName="subject" dataType="text">
                                            </div>
                                            <div class="col-sm-3 form-group">
                                                <label class="control-label">
                                                    <?php echo $translations['A01167'][$language]; /* Created By */ ?>
                                                </label>
                                                <input type="text" class="form-control" dataName="username" dataType="text">
                                            </div>
                                            <div class="col-sm-3 form-group">
                                                <label class="control-label">
                                                    <?php echo $translations['A00318'][$language]; /* Status */ ?>
                                                </label>
                                                <select class="form-control" dataName="status" dataType="select">
                                                    <option value="">
                                                        <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                    </option>
                                                    <option value="open">
                                                        <?php echo $translations['A01168'][$language]; /* Open */ ?>
                                                    </option>
                                                    <option value="closed">
                                                        <?php echo $translations['A01169'][$language]; /* Closed */ ?>
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 px-0">
                                            <div class="col-sm-3 form-group">
                                                <label class="control-label">
                                                    <?php echo $translations['A00112'][$language]; /* Created at */ ?>
                                                </label>
                                                 <div class="input-group">
                                                    <div>
                                                        <input id="dateFrom" type="text" class="form-control" dataName="createdAt" dataType="dateRange">
                                                    </div>
                                                    <span class="input-group-addon">
                                                        <?php echo $translations['A00139'][$language]; /* to */?>
                                                    </span>
                                                    <div>
                                                        <input id="dateTo" type="text" class="form-control" dataName="createdAt" dataType="dateRange">
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
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
                        <div id="basicwizard" class="pull-in" style="display: none">
                            <div class="tab-content b-0 m-b-0 p-t-0">
                                <form>
                                    <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                    <div id="OrderListDiv" class="table-responsive"></div>
                                    <span id="paginateText"></span>
                                    <div class="text-center">
                                        <ul class="pagination pagination-md" id="pagerOrderList"></ul>
                                    </div>

                                </form>
                                <span>
                                    <?php echo $translations['A00663'][$language]; /* With selected */ ?> : 
                                </span>
                                <select id="editSelectionStatus">
                                </select>
                                <button type="submit" id="updateBtn" class="btn btn-primary waves-effect waves-light">
                                    <?php echo $translations['A00300'][$language]; /* Update */ ?>
                                </button>
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
    var divId    = 'OrderListDiv';
    var tableId  = 'OrderListTable';
    var pagerId  = 'pagerOrderList';
    // var btnArray = Array('view');
    var btnArray = {};
    var thArray  = Array(  
                            '',
                            "<?php echo $translations['A00137'][$language]; /* Date */ ?>",
                            "<?php echo $translations['A00674'][$language]; /* Buyer username */ ?>",
                            // "Serial number",
                            // "GIA number",
                            // "Shape",
                            // "Color",
                            // "Clarity",
                            // "carat",
                            "<?php echo $translations['A00571'][$language]; /* Remark */ ?>",
                            "<?php echo $translations['A01403'][$language]; /* Cost */ ?>",
                            // "Diamond selling price",
                            "<?php echo $translations['A00344'][$language]; /* Category */ ?>",
                            "<?php echo $translations['A01404'][$language]; /* Ring size */ ?>",
                            "<?php echo $translations['A01405'][$language]; /* Design name */ ?>",
                            "<?php echo $translations['A01406'][$language]; /* Engagement ring */ ?>",
                            "<?php echo $translations['A01407'][$language]; /* Material */ ?>",
                            // "Design price",
                            "<?php echo $translations['A00629'][$language]; /* Total price */ ?>",
                            "<?php echo $translations['A01408'][$language]; /* Receiver name */ ?>",
                            "<?php echo $translations['A01409'][$language]; /* Receiver country */ ?>",
                            "<?php echo $translations['A01410'][$language]; /* Receiver address */ ?>",
                            "<?php echo $translations['A01411'][$language]; /* Receiver email */ ?>",
                            "<?php echo $translations['A01412'][$language]; /* Receiver phone number */ ?>",
                            "<?php echo $translations['M01676'][$language]; /* Send Type */ ?>",
                            "<?php echo $translations['A00318'][$language]; /* Status */ ?>",
                            "<?php echo $translations['A01413'][$language]; /* Collect method */ ?>",
                            "<?php echo $translations['A00147'][$language]; /* Done by */ ?>",
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
    var searchId        = 'searchDiamondOrder';
    // var offsetSecs      = -getOffsetSecs();

    $(document).ready(function() {
        
        setTodayDatePicker();

        var formData   = {
            command : 'getEmallOrderList',
            isGetFormOption   : 1,
        };
        fCallback = loadFormOption;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        
        //reset to default search
        $('#resetBtn').click(function() {
            $('#alertMsg').removeClass('alert-success').html('').hide();
            $('#searchDiamondOrder').find('input').each(function() {
               $(this).val(''); 
            });
            $('#searchDiamondOrder').find('select').each(function() {
                $(this).val('');
            $("#searchDiamondOrder")[0].reset();
            setTodayDatePicker();
            });

        });
        
        $('#searchBtn').click(function() {
            pagingCallBack(pageNumber, loadSearch);
        }); 

        $('#updateBtn').click(function(){
            var orderIDList = [];

            $("#OrderListTable > tbody > tr").each(function(key, value){

                if ($(this).find("input[name='checkbox']").is(':checked')){
                    orderIDList.push($(this).attr("data-id"));
                }
            });
            if (orderIDList=="") {
                showMessage("<?php echo $translations['A01419'][$language]; /* Please select order to update status */ ?>", "danger", "<?php echo $translations['A00727'][$language]; /* Error */ ?>", "file", "");
            }else{
                var status = $('#editSelectionStatus').val();
                if (status == 'Delivered' || status == 'Collected')
                {
                    var confirmMsg = "<?php echo $translations['A01414'][$language]; /* This action is not reversible. Are you sure you want to perform this action? */ ?>";
                    if (confirm(confirmMsg)){
                        updateOrderStatus(status, orderIDList);
                    }
                }
            }

        });
    });

    function updateOrderStatus(status, orderIDList)
    {
        formData = {
                        command     : "adminUpdateEmallOrder",
                        checkedIDs  : orderIDList,
                        status      : status
                    };

        fCallback = loadSuccessful;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadFormOption(data, message) {
        if(data.countryList) {
            // $('#countryName').empty();
            $.each(data.countryList, function(key, val) {
                var countryID = val['id'];
                var country   = val['name'];
                $('#countryName').append('<option value="' + countryID + '">' + country + '</option>');
            });
        }
        if(data.status) {
            $('#selectionStatus').empty();
            $('#editSelectionStatus').empty();
            $.each(data.status, function(key, val) {
                var value = val['value'];
                var display   = val['display'];
                $('#selectionStatus').append('<option value="' + value + '">' + display + '</option>');

                if(value!='' && value!='Pending') {
                    $('#editSelectionStatus').append('<option value="' + value + '">' + display + '</option>');                    
                }
            });
        }
        if(data.collectMethod) {
            $('#selectionCollectMethod').empty();
            $.each(data.collectMethod, function(key, val) {
                var value = val['value'];
                var display   = val['display'];
                $('#selectionCollectMethod').append('<option value="' + value + '">' + display + '</option>');
            });
        }
        if(data.category) {
            $('#selectionCategory').empty();
            $.each(data.category, function(key, val) {
                var value = val['value'];
                var display   = val['display'];
                $('#selectionCategory').append('<option value="' + value + '">' + display + '</option>');
            });
        }
    }

    function loadDefaultListing(data, message) {
        $('#basicwizard').show();
        // var tableNo;

        var newData = [];
        var diamondOrderAry = data.diamondOrderAry;

        if(diamondOrderAry) {
            $.each(diamondOrderAry, function(i, obj){
                var checkbox = "";
                if(obj.status === "Pending"){
                    checkbox = "<input name ='checkbox' type ='checkbox'>";
                }else{
                    checkbox = "-";
                }

                if (obj.cost == "") {
                    var cost = "-";
                } else {
                    var cost = addCommas(Number(obj.cost).toFixed(2));
                }
                
                if (obj.total_price == "") {
                    var totalPrice = "-"
                } else {
                    var totalPrice = addCommas(Number(obj.total_price).toFixed(2));
                }

                var rebuild = {

                    check : checkbox,
                    date: timestampToDate(obj.created_at, 1, 0),
                    buyerusername: obj.buyer_username,
                    // serialnumber: obj.,
                    // gianumber: obj.,
                    // shape: obj.,
                    // color: obj.,
                    // clarity: obj.,
                    // carat: obj.,
                    remark: obj.remark,
                    cost: cost,
                    // diamond selling price: obj.,
                    category: obj.category,
                    ringsize: obj.ring_size,
                    designname: obj.design_name,
                    engagementring: obj.engagement_ring,
                    material: obj.material,
                    // designprice: obj.,
                    totalprice: totalPrice,
                    receivername: obj.name,
                    receivercountry: obj.country,
                    receiveraddress: obj.address,
                    receiveremail: obj.email,
                    receiverphonenumber: obj.contact_number,
                    senttype: obj.sendTypeDisplay,
                    status: obj.status,
                    collectmethod: obj.taken_method,
                    doneby: obj.updater_username,
                };

                newData.push(rebuild);
            });

            var tableNo;
            buildTable(newData, tableId, divId, thArray, btnArray, message, tableNo);
            pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

            $.each(diamondOrderAry, function(k, v) {
                $('#'+tableId).find('tr#'+k).attr('data-id', v['id']);
            });

            $('#'+tableId).find('thead tr').each(function(){
                $(this).find("th:eq(0)").css("text-align", "center");
                $(this).find("th:eq(4)").css("text-align", "right");
                $(this).find("th:eq(10)").css("text-align", "right");
            });

            $('#'+tableId).find('tbody tr').each(function(){
                $(this).find("td:eq(0)").css("text-align", "center");
                $(this).find("td:eq(4)").css("text-align", "right");
                $(this).find("td:eq(10)").css("text-align", "right");
            });

        }else{
            $("#"+divId).empty();
            $("#pageFundInList").empty();
            $("#paginateText").empty();
            $('#alertMsg').addClass('alert-success').html("<span>No Result Found.</span>").show();
        }
    }

    function pagingCallBack(pageNumber, fCallback){
        if(pageNumber > 1) bypassLoading = 1;

        var searchData = buildSearchDataByType(searchId);
        var formData   = {
            command : 'getEmallOrderList',
            inputData  : searchData, 
            pageNumber   : pageNumber,
            usernameSearchType : $("input[name=usernameType]:checked").val(),
        };
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

        if (btnName == 'view') {
            var ticketID = tableRow.attr('data-id');
           
            // $.redirect("supportTicketInbox.php", {
            //     ticketID: ticketID
            // });
        }
    }

    function loadSuccessful(data, message){
        showMessage("<?php echo $translations['A00684'][$language]; /* Update Successful */ ?>", "success", "<?php echo $translations['A01415'][$language]; /* Order Listing */ ?>", "edit", "emallOrderListing.php");
    }

</script>
</body>
</html>