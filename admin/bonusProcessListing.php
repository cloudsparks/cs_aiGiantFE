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
                    <?php if($_SESSION['bonusOperationSwitch'] == 1) { ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default bx-shadow-none">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion2" href="#collapseSet" aria-expanded="false" aria-controls="collapseSet" class="collapse">
                                                Bonus Function
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseSet" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                             <div class="col-sm-12 px-0">
                                                <div class="row">
                                                    <div class="col-sm-5 form-group" >
                                                        <label class="control-label col-sm-4" data-th="date">Type</label>
                                                        <div class="col-sm-8">
                                                            <div class="radio radio-info radio-inline">
                                                                <input type="radio" id="runBonus" name="type" class="bonusType" value="run" checked />
                                                                <label for="runBonus">
                                                                    Run
                                                                </label>
                                                            </div>
                                                            <div class="radio radio-inline">
                                                                <input type="radio" id="resetBonus" name="type" class="bonusType" value="reset"/>
                                                                <label for="resetBonus">
                                                                    Reset
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-sm-5 form-group" >
                                                        <label class="control-label col-sm-4" data-th="date">Bonus Date</label>
                                                        <div class="col-sm-8">
                                                            <input id="bonusDateTS" type="text" class="form-control" autocomplete="off">
                                                            <span id="bonusDateTSError" class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <button id="setBtn" class="btn btn-primary waves-effect waves-light">
                                                    Set
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="row m-t-rem1">
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
                                            <form id="searchFundInHistory" role="form">
                                             <div class="col-sm-12 px-0">
                                                <div class="col-sm-3 form-group" id="datepicker" >
                                                    <label class="control-label" data-th="date">Bonus Date</label>
                                                    <div class="input-daterange input-group" id="datepicker-range">
                                                        <input id="dateRangeStart" type="text" class="form-control" name="start" dataName="bonusDate" dataType="dateRange" autocomplete="off">
                                                        <div class="input-group-addon">
                                                            <?php echo $translations['A00941'][$language]; /* to */?>
                                                        </div>
                                                        <input id="dateRangeEnd" type="text" class="form-control" name="end" dataName="bonusDate" dataType="dateRange">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 px-0">
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
                            <!-- <div class="card-box p-b-0"> -->
                                <button id="exportBtn" type="" onclick="exportBtn()" class="btn btn-primary waves-effect waves-light" style="margin-bottom: 10px;display: none">
                                      <?php echo $translations['A01352'][$language]; /*Export to xlsx*/ ?>
                                </button>
                                 <button id="seeAllBtn" type="" onclick="seeAllBtn()" class="btn btn-primary waves-effect waves-light" style="margin-bottom: 10px;display: none">
                                      <?php echo $translations['A01191'][$language]; /*See All*/ ?>
                                </button>
                                <form>
                                    <div id="basicwizard" class="pull-in" style="display: none">
                                        <div class="tab-content b-0 m-b-0 p-t-0" style="padding-bottom: 0;">
                                            <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                            <div id="fundInListDiv" class="table-responsive"></div>
                                            <span id="paginateText"></span>
                                            <div class="text-center">
                                                <ul class="pagination pagination-md" id="pageFundInList"></ul>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                           <!--  </div> -->
                        </div>
                    </div>
                    <!-- End row -->
                </div>
                <!-- container -->
            </div>
            
            <!-- content -->

            <?php include("footer.php"); ?>

        </div>
        <!-- End content-page -->

        <div class="modal fade" id="confirmBonus" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div id="bonusTitle" class="modal-title">Confirmation</div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body modalBodyFont">
                        <div id="bonusMessage"></div>
                    </div>
                    <div class="modal-footer">
                         <button type="button" class="btn btnDefaultModal" data-dismiss="modal" aria-label="Close">Close</button>
                         <button id="confirmBonusBtn" type="button" class="btn btn-primary" onclick="confirmBonusBtn()">Confirm</button>

                    </div>
                </div>
            </div>
        </div>


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
    var divId    = 'fundInListDiv';
    var tableId  = 'fundInListTable';
    var pagerId  = 'pageFundInList';
    var btnArray = {};
    var thArray  = Array(
            "Bonus Date",
            "Creator Name",
            "Bonus Name",
            "Status",
            "Created At"
        );
        
    // Initialize the arguments for ajaxSend function
    var url            = 'scripts/reqAdmin.php';
    var method         = 'POST';
    var debug          = 0;
    var bypassBlocking = 0;
    var bypassLoading  = 0;
    var pageNumber     = 1;
    var activityDate   = ""; 
    var passData;

    $(document).ready(function() {
        setTodayDatePicker();
        // formData    = {command      : 'getFundInListing'
        // };
        // fCallback = loadDefaultListing;
        // ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        
        $('#searchBtn').click(function() {
            pagingCallBack(pageNumber, loadSearch);
        });
        
        $('#resetBtn').click(function() {
            $('#alertMsg').removeClass('alert-success').html('').hide();
            $('#searchFundInHistory').find('input:not([type=radio])').each(function() {
               $(this).val(''); 
            });
            $('#searchFundInHistory').find('select').val('');
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

        $('#setBtn').click(function() {

            var type = $(".bonusType:checked").val();
            var bonusDateTS = $("#bonusDateTS").val();
            var command = "adminRunBonus";

            bonusDateTS = bonusDateTS==""?"":dateToTimestamp(bonusDateTS);

            if(type == "run") {
                command = "adminRunBonus";
            }else{
                command = "adminResetBonus";
            }

            var formData   = {
                command : command,
                bonusDateTS: bonusDateTS,
                step: 1
            };
            fCallback = updateCallback;

            passData = formData;

            // console.log(formData);
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });
    });

    
    function loadDefaultListing(data, message) {
        console.log(data);
        
        var addressPageListing = data.listArr;
        if (addressPageListing){
            var newData = [];

            $.each(addressPageListing, function(i, obj){
                var rebuild = {
                    bonusDate: obj['bonusDate'],
                    creatorName: obj['creatorName'],
                    bonusName: obj['bonusName'],
                    status: obj['status'],
                    createdAt: obj['createdAt']
                };

                newData.push(rebuild);
            });
        }

        var tableNo;
        buildTable(newData, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        $("#"+divId).before(`
            <div class="bonusProgressBlock">
                <table>
                    <tr><td>Bonus Run: </td><td>${data['calBonusDate']}</td></tr>
                    <tr><td>Progress: </td><td><div id="bonusProgress" class="bonusProgressBar"></div></td></tr>
                </table>
            </div>
        `);

        var width = data['bonusDone'] / data['totalBonus'] * 100;

        var progress = `<div class="progress">
        <div class="progress-bar" role="progressbar" aria-valuenow="${width}" aria-valuemin="0" aria-valuemax="100" style="width: ${width}%;">
        <span class="progressText"> ${data['bonusDone']} / ${data['totalBonus']} ${data['processStatus']}</span>
        </div>`;

        $("#bonusProgress").html(progress);

        $('#basicwizard').show();

    }

    function pagingCallBack(pageNumber, fCallback){
        var searchId   = 'searchFundInHistory';
        var searchData = buildSearchDataByType(searchId);

        if(pageNumber > 1) bypassLoading = 1;
        
        var formData = {
            command      : "getBonusProcessList",
            searchData    : searchData,
            pageNumber   : pageNumber
        };
        
        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
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
        
        $('#createdAt').daterangepicker({
            singleDatePicker: true,
            timePicker: false,
            locale: {
                format: 'DD/MM/YYYY'
            }
        });

        $('#bonusDateTS').daterangepicker({
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
    
    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span><?php echo $translations['A00114'][$language]; /* Search successful. */ ?></span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide(); 
        }, 3000);
    }
    
    function updateCallback(data, message) {
        // showMessage(message, 'success', 'Congratulations', 'edit', 'bonusProcessListing.php');

        var type = $(".bonusType:checked").val();
        var html = `<p>Confirm to ${type} bonus?</p>`;

        if(data && data['remindMsg']) {
            html += `<div class="alert alert-danger"><p>${data['remindMsg']}</p><div>`;
        }

        if(data && data['genealogy']) {
            html += `<div class="alert alert-info"><p>${data['genealogy']['alertMsg']}</p><div>`;

            $.each(data['genealogy']['option'], function(k,v){
                html += `
                    <div class="radio radio-info radio-inline">
                        <input type="radio" id="genealogy${k}" name="genealogy" class="genealogy" value="${k}" />
                        <label for="genealogy${k}">
                            ${v}
                        </label>
                    </div>
                `;
            });

            html += `<span id="genealogyOptionError" class="text-danger"></span></div></div>`;
        }
        $("#bonusMessage").html(html);
        $("#confirmBonus").modal("show");
    }

    function confirmBonusBtn() {
        var formData = passData;

        formData['step'] = 2;
        formData['genealogyOption'] = $(".genealogy:checked").val();

        fCallback = confirmRunBonus;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }
    
    function confirmRunBonus(data, message) {

        $("#confirmBonus").modal("hide");
        showMessage(message, 'success', 'Congratulations', 'edit', "");

        setTimeout(function(){
            pagingCallBack(pageNumber, loadSearch);
        }, 5000)
    }
    
</script>
</body>
</html>