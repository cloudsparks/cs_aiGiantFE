<?php
session_start();


?>

<!DOCTYPE html>
<html>
<?php include("head.php"); ?>
<div id="wrapper">
    <?php include("topbar.php"); ?>
    <?php include("sidebar.php"); ?>
    <div class="content-page">
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
                                        <form id="searchInvoice" role="form">
                                          <div class="col-sm-12 px-0">
                                            <div class="col-sm-3 form-group">
                                                <label class="control-label" for="">
                                                    <?php echo $translations['A00937'][$language]; /* Invoice Number */?>
                                                </label>
                                                <input type="text" class="form-control" dataName="invoice_no" dataType="text">
                                            </div>
                                            <div class="col-sm-3 form-group">
                                                <label class="control-label" for="">
                                                    <?php echo $translations['A00102'][$language]; /* Username */?>
                                                </label>
                                                <span class="pull-right">
                                                        <input id="match" type="radio" name="usernameType" value="match" checked> 
                                                        <label for="match" style="margin-right: 15px;"><?php echo $translations['A01347'][$language]; /* Match */ ?></label>

                                                        <input id="like" type="radio" name="usernameType" value="like" style="margin-left: 15px;" > 
                                                        <label for="like"><?php echo $translations['A01348'][$language]; /* Like */ ?></label>
                                                </span>
                                                <input type="text" class="form-control" dataName="username" dataType="text">
                                            </div>
                                            <!-- <div class="col-sm-3 form-group">
                                                <label class="control-label">
                                                    Username Type 
                                                </label>
                                                <div class="form-control" style="border: none">
                                                    <input id="match" type="radio" name="usernameType" value="match" checked> 
                                                    <label for="match">Match</label>

                                                    <input id="like" type="radio" name="usernameType" value="like" style="margin-left: 15px;" > 
                                                    <label for="like">Like</label>
                                                </div>
                                            </div> -->
                                            <div class="col-sm-3 form-group">
                                                <label class="control-label" for="">
                                                    <?php echo $translations['A00117'][$language]; /* Full Name */?>
                                                </label>
                                                <input type="text" class="form-control" dataName="fullname" dataType="text">

                                            </div>
                                            <div class="col-sm-3 form-group">
                                                <label class="control-label">
                                                    <?php echo $translations['A00148'][$language]; /* Member ID */ ?>
                                                </label>
                                                <input type="text" class="form-control" dataName="memberID" dataType="text">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 px-0">
                                            <div class="col-sm-3 form-group">
                                                <label class="control-label" for="">
                                                   <?php echo $translations['A01349'][$language]; /* Main Leader Username */ ?>
                                                </label>
                                                <input id="mainLeaderUsername" type="text" class="form-control" dataName="mainLeaderUsername" dataType="text">
                                            </div>
                                            
                                            <div class="col-sm-3 form-group">
                                                <label class="control-label">
                                                    <?php echo $translations['A01109'][$language]; /* Leader Username */ ?>
                                                </label>
                                                <input type="text" class="form-control" dataName="leaderUsername" dataType="text">
                                            </div>
                                            <div id="datepicker" class="col-sm-3 form-group">
                                                <label class="control-label">
                                                    <?php echo $translations['A00564'][$language]; /* Transaction Date */?>
                                                </label>
                                                <div class="input-daterange input-group" id="datepicker-range">
                                                    <input id="dateRangeStart" type="text" class="input-sm form-control" name="start" dataName="transactionDate" dataType="dateRange">
                                                    <div class="input-group-addon">
                                                        <?php echo $translations['A00139'][$language]; /* to */?>
                                                    </div>
                                                    <input id="dateRangeEnd" type="text" class="input-sm form-control" name="end" dataName="transactionDate" dataType="dateRange">
                                                </div>
                                            </div>
                                            <div class="col-sm-3 form-group">
                                                <label class="control-label" for="">
                                                    <?php echo $translations['A00301'][$language]; /* Full Name */?>
                                                </label>
                                                <select id="category" type="text" class="form-control" dataName="category" dataType="text">
	                                                <option value="">
				                                        <?php echo $translations['A00055'][$language]; /* All */ ?>
				                                    </option>
				                                    <option value="mlm">
				                                        <?php echo $translations['A01282'][$language]; /* All */ ?>
				                                    </option>
				                                    <option value="Emall">
				                                        <?php echo $translations['M01789'][$language]; /* All */ ?>
				                                    </option>
				                                    <option value="fundIn">
				                                        <?php echo $translations['M01082'][$language]; /* All */ ?>
				                                    </option>
			                                    </select> 
                                            </div>
                                        </div>
                                    </form>
                                    <div class="col-xs-12">
                                        <button id="searchInvoiceBtn" type="submit" class="btn btn-primary waves-effect waves-light">
                                            <?php echo $translations['A00051'][$language]; /* Search */?>
                                        </button>
                                        <button type="submit" id="resetBtn" class="btn btn-default waves-effect waves-light">
                                            <?php echo $translations['A00053'][$language]; /* Reset */?>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12" style="padding-left: 0; padding-right: 0;">
                <!-- <div class="card-box p-b-0"> -->
                    <form>
                        <div id="basicwizard" class="pull-in" style="display: none">
                            <div class="tab-content b-0 m-b-0 p-t-0">
                                <div id="alertMsg" class="alert" style="display: none;"></div>
                                <div id="invoiceListDiv" class="table-responsive"></div>
                                <span id="paginateText"></span>
                                <div class="text-center">
                                    <ul class="pagination pagination-md" id="pagerInvoiceList"></ul>
                                </div>
                            </div>
                        </div>
                    </form>
                <!-- </div> -->
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

    var divId    = 'invoiceListDiv';
    var tableId  = 'invoiceListTable';
    var pagerId  = 'pagerInvoiceList';
    var btnArray = {};// Array('view');
    var thArray  = Array (
        "<?php echo $translations['A00942'][$language]; /* No. */?>",
        "<?php echo $translations['A00937'][$language]; /* Invoice Number */?>",
        "<?php echo $translations['A00117'][$language]; /* Full Name */?>",
        "<?php echo $translations['A00102'][$language]; /* Username */?>",
        "<?php echo $translations['A00148'][$language]; /* Member ID */ ?>",
        "<?php echo $translations['A01349'][$language]; /* Main Leader Username */ ?>",
        "<?php echo $translations['A00651'][$language]; /* Grand Total */?>",
        "<?php echo $translations['A00564'][$language]; /* Transaction Date */?>",
        "<?php echo $translations['A00301'][$language]; /* Type */?>"
    );

    var method         = 'POST';
    var debug          = 0;
    var bypassBlocking = 0;
    var bypassLoading  = 0;
    var pageNumber     = 1;
    var offsetSecs     = getOffsetSecs();

    $(document).ready(function() {
        url       = 'scripts/reqAdmin.php';

        $("body").keyup(function(event) {
            if (event.keyCode == 13) {
                $("#searchInvoiceBtn").click();
            }
        });
        
        // formData  = {command : "getInvoiceList"};
        // fCallback = loadDefaultListing;
        // ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $('#resetBtn').click(function() {
            $('#alertMsg').removeClass('alert-success').html('').hide();
            $('#searchInvoice').find('input:not([type=radio])').each(function() {
                $(this).val('');
            });
            $('#searchInvoice').find('select').each(function() {
                $(this).val('');
            });
        });

        $('#searchInvoiceBtn').click(function() {
            pagingCallBack(pageNumber, loadSearch);
        });

        $('#datepicker input').each(function() {
            $(this).datepicker('clearDates');
        });

        //  $('#searchInvoice').keypress(function(e){
        //     if(e.which == 13){//Enter key pressed
        //         $('#searchInvoiceBtn').click();//Trigger enter button click event
        //     }
        // });

    });

    function loadDefaultListing(data, message) {
        console.log(data);
        $('#basicwizard').show();
        /*
            createdAt: "10/12/2019 12:50:46 PM"
            fullname: "protest03"
            id: 167
            invoiceNumber: "3877412989"
            mainLeaderUsername: "-"
            memberID: "00080073"
            totalAmount: "6000.00000000"
            username: "protest03"
        */
		var newList = [];
        $.each(data.invoicePageListing, function(k, v) {

            var rebuildData = {
                id : v['id'],
                invoiceNumber : v['invoiceNumber'],
                username : v['username'],
                fullname : v['fullname'],
                memberID : v['memberID'],
                mainLeaderUsername : v['mainLeaderUsername'],
                totalAmount : v['totalAmount'],
                createdAt : v['createdAt'],
                categoryDisplay : v['categoryDisplay'],
            };
            newList.push(rebuildData);
        });

        var tableNo = {pageNumber : data.pageNumber, numRecord : data.numRecord};
        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        $('#'+tableId).find('tbody tr').each(function(){
            $(this).find('td:eq(4)').css('text-align', "right");
            $(this).find("td:last-child").css('text-align', 'center');
        });
    }

    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<?php echo $translations['A00114'][$language]; /* Search successfully */?>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide();
        }, 3000);
    }

    function tableBtnClick(btnId) {
        var btnName  = $('#'+btnId).attr('id').replace(/\d+/g, '');
        var tableRow = $('#'+btnId).parent('td').parent('tr');
        var tableId  = $('#'+btnId).closest('table');

        if (btnName == 'view') {
            var invoiceId = tableRow.attr('data-th');
            $.redirect("viewInvoice.php",{invoiceId: invoiceId});
        }
    }

    function pagingCallBack(pageNumber, fCallback){
        if(pageNumber > 1) bypassLoading = 1;

        var searchId = 'searchInvoice';
        var searchData = buildSearchDataByType(searchId);
        var formData = {
            command             : "getInvoiceList",
            pageNumber          : pageNumber,
            offsetSecs          : offsetSecs,
            searchData          : searchData,
            usernameSearchType : $("input[name=usernameType]:checked").val()
        };
        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

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
</script>
</body>
</html>