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
                                        <form id="searchForm" role="form">
                                            <div class="col-xs-12">
                                                <div class="row">
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A01165'][$language]; /* Ticket No */ ?>
                                                        </label>
                                                        <input type="text" class="form-control" dataName="ticketNo" dataType="text">
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00369'][$language]; /* Subject */ ?>
                                                        </label>
                                                        <input type="text" class="form-control" dataName="subject" dataType="text">
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A01167'][$language]; /* Created By */ ?>
                                                        </label>
                                                        <input type="text" class="form-control" dataName="username" dataType="text">
                                                        <!-- <input id="purchaseDate" type="text" class="form-control" dataName="purchaseDate" dataType="singleDate"> -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="row">
                                                    <div class="col-sm-4 form-group">
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
                                                    <div class="col-sm-4 form-group">
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
                        <!-- <div class="card-box p-b-0"> -->
                            <div id="basicwizard" class="pull-in" style="display: none">
                                <div class="tab-content b-0 m-b-0 p-t-0">
                                    <form>
                                        <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                        <div id="listingDiv" class="table-responsive"></div>
                                        <span id="paginateText"></span>
                                        <div class="text-center">
                                            <ul class="pagination pagination-md" id="listingPager"></ul>
                                        </div>

                                    </form>
                                    <span>
                                        <?php echo $translations['A00663'][$language]; /* With selected */ ?> : 
                                    </span>
                                    <select id="status">
                                        <option value="Open" selected>
                                            <?php echo $translations['A01168'][$language]; /* Open */ ?>
                                        </option>
                                        <option value="Closed">
                                            <?php echo $translations['A01169'][$language]; /* Closed */ ?>
                                        </option>
                                         <option value="Remove">
                                           Remove
                                        </option>
                                    </select>
                                    <button type="submit" id="updateBtn" class="btn btn-primary waves-effect waves-light">
                                        <?php echo $translations['A00300'][$language]; /* Update */ ?>
                                    </button>
                                </div>
                            </div>
                        <!-- </div> -->
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
    var divId    = 'listingDiv';
    var tableId  = 'listingTable';
    var pagerId  = 'listingPager';
    var btnArray = Array('view');
    var thArray  = Array(  '',
                           '<?php echo $translations['A01165'][$language]; /* Ticket No */ ?>',
                           '<?php echo $translations['A00369'][$language]; /* Subject */ ?>',
                           '<?php echo $translations['A00142'][$language]; /* Created username */ ?>',
                           '<?php echo $translations['A01167'][$language]; /* Created By */ ?>',
                           '<?php echo $translations['A01170'][$language]; /* Created Time */ ?>',
                           '<?php echo $translations['A01171'][$language]; /* Last Update */ ?>',
                           '<?php echo $translations['A00318'][$language]; /* Status */ ?>'
                        );

     // Initialize the arguments for ajaxSend function
    var url             = 'scripts/reqTicketing.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";
    var searchId        = 'searchForm';
    var offsetSecs      = -getOffsetSecs();

    $(document).ready(function() {
        
        setTodayDatePicker();

        $("body").keyup(function(event) {
            if (event.keyCode == 13) {
                $("#searchBtn").click();
            }
        });
        
        // formData  = {
        //     command : 'getTicketList',
        //     offsetSecs: offsetSecs,
        //     pageNumber   : pageNumber
        // };
        // fCallback = loadDefaultListing;
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
            setTodayDatePicker();
            });

        });
        
        $('#searchBtn').click(function() {
            pagingCallBack(pageNumber, loadSearch);
        }); 

        $('#updateBtn').click(function(){
            var ticketIDList = [];

            $("#ticketingListTable > tbody > tr").each(function(key, value){

                if ($(this).find("input[name='checkbox']").is(':checked')){
                    ticketIDList.push($(this).attr("data-id"));
                }
            });

            if (ticketIDList=="") {
                showMessage("<?php echo $translations['A01173'][$language]; /* Please select Ticket to update status */ ?>", "danger", "<?php echo $translations['A00727'][$language]; /* Error */ ?>", "file", "");
            }else{
                var status = $('#status').val();
                if (status == 'Remove'){
                    if (confirm('The ticket will remove and not able to find back. Are you sure want to delete it?')) {
                        formData = {
                            command     : "updateTicketStatus",
                            ticketId     : ticketIDList,
                            status      : status
                        };

                        fCallback = loadSuccessful;
                        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
                    }
                } else {
                     formData = {
                        command     : "updateTicketStatus",
                        ticketId     : ticketIDList,
                        status      : status
                    };

                        fCallback = loadSuccessful;
                        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
                }
               
            }

        });
    });
    
    function loadDefaultListing(data, message) {
        $('#basicwizard').show();
        var tableNo;
        var ticketResult = data.ticketPageListing;
        
        if(data != "" && ticketResult.length>0) {
            var newList = [];
            var unreadMessage = [];
            var j = 0;
            $.each(ticketResult, function(k, v) {
                var checkbox = "";
                if(v['status'] === "Open" || v['status'] === "Closed"){
                    checkbox = "<input name ='checkbox' type ='checkbox'>";
                }else{
                    checkbox = "-";
                }

                var rebuildData = {
                    unraed : v['unreadMessage'],
                    check : checkbox,
                    ticketNo : v['ticketNo'],
                    subject : v['subject'],
                    username : v['username'],
                    creatorType : v['creatorType'],
                    createdAt : v['createdAt'],
                    updatedAt : v['updatedAt'],
                    status : v['status'],
                };
                ++j;
                newList.push(rebuildData);
                unreadMessage.push(v['unreadMessage']);
            });
        }

        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);
        var countRow = 0;
        $('#'+tableId).find('tbody tr').each(function(){
            $(this).find('td:eq(0)').addClass('hide');
            var unreadMessageAlert = $(this).find('td:eq(0)').text();
            // console.log(unreadMessageAlert);

            if(unreadMessageAlert != 0){
                // $(this).find('td:eq(1)').append('<div align="center"><span class="badge"><?php echo $_SESSION["unreadMessage"]; ?></span></div>');
                $(this).find('td:eq(1)').append('<div align="center"><span class="badge">'+unreadMessage[countRow]+'</span></div>');
            }

            $(this).find('td:eq(1)').css('text-align', 'center');
            $(this).find('td:last-child').css('text-align', 'center');
            countRow++;
        });

        if(ticketResult) {
            $.each(ticketResult, function(k, v) {
                $('#'+tableId).find('tr#'+k).attr('data-th', v['ticketNo']);
                $('#'+tableId).find('tr#'+k).attr('data-id', v['id']);
            });
        }
    }

    function pagingCallBack(pageNumber, fCallback){
        if(pageNumber > 1) bypassLoading = 1;

        var searchData = buildSearchDataByType(searchId);
        var formData   = {
            command : 'getTicketList',
            offsetSecs: offsetSecs,
            pageNumber   : pageNumber,
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

        if (btnName == 'view') {
            var ticketID = tableRow.attr('data-id');
           
            $.redirect("supportTicketInbox.php", {
                ticketID: ticketID
            });
        }
    }

    function loadSuccessful(data, message){
        showMessage("<?php echo $translations['A00684'][$language]; /* Update Successful */ ?>", "success", "<?php echo $translations['A01175'][$language]; /* Ticketing Listing */ ?>", "edit", "supportTicket.php");
    }

</script>
</body>
</html>