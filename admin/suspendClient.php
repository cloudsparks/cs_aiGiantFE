<?php 
    session_start(); 
    $countryList = $_SESSION['countryList'];
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
                                        <a role="button" data-toggle="collapse" data-parent="#accordion"
                                           href="#collapseOne" aria-expanded="false" aria-controls="collapseOne"
                                           class="collapse">
                                            <?php echo $translations['A00051'][$language]; /* Search */ ?>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel"
                                     aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <div id="searchMsg" class="text-center alert" style="display: none;"></div>
                                        <form id="searchForm" role="form">
                                            <div class="col-xs-12">
                                                <div class="row">
                                                    <!-- <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00137'][$language]; /* Date */ ?>
                                                        </label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control input-daterange-from"
                                                                   dataName="dateRange" dataType="dateRange"/>
                                                            <span class="input-group-addon">
                                                                <?php echo $translations['A00139'][$language]; /* to */ ?>
                                                            </span>
                                                            <input type="text" class="form-control input-daterange-to"
                                                                   dataName="dateRange" dataType="dateRange"/>
                                                        </div>
                                                    </div> -->
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00102'][$language]; /* Username */ ?>
                                                        </label>
                                                        <span class="pull-right">
                                                            <input id="umatch" type="radio" name="usernameType" value="match"
                                                                   checked>
                                                            <label for="umatch"
                                                                   style="margin-right: 15px;"><?php echo $translations['A01347'][$language]; /* Match */ ?></label>

                                                            <input id="ulike" type="radio" name="usernameType" value="like"
                                                                   style="margin-left: 15px;">
                                                            <label for="ulike"><?php echo $translations['A01348'][$language]; /* Like */ ?></label>
                                                        </span>
                                                        <input type="text" class="form-control username" dataName="username"
                                                               dataType="text">
                                                    </div>

                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            Suspended Date                                         
                                                        </label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control input-daterange-from" dataname="suspendedDate" datatype="dateRange">
                                                            <span class="input-group-addon">
                                                                <?php echo $translations['A00139'][$language]; /* to */?>
                                                            </span>
                                                            <input type="text" class="form-control input-daterange-to" dataname="suspendedDate" datatype="dateRange">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            Done By
                                                        </label>
                                                        <span class="pull-right">
                                                            <input id="dBmatch" type="radio" name="doneByType" value="match"
                                                                   checked>
                                                            <label for="dBmatch"
                                                                   style="margin-right: 15px;"><?php echo $translations['A01347'][$language]; /* Match */ ?></label>
                                                            <input id="dBlike" type="radio" name="doneByType" value="like"
                                                                   style="margin-left: 15px;">
                                                            <label for="dBlike"><?php echo $translations['A01348'][$language]; /* Like */ ?></label>
                                                        </span>
                                                        <input type="text" class="form-control username" dataName="doneBy"
                                                               dataType="text">
                                                    </div>

                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            Done By Date                                         
                                                        </label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control input-daterange-from" dataname="unsuspendedDate" datatype="dateRange">
                                                            <span class="input-group-addon">
                                                                <?php echo $translations['A00139'][$language]; /* to */?>
                                                            </span>
                                                            <input type="text" class="form-control input-daterange-to" dataname="unsuspendedDate" datatype="dateRange">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            Status
                                                        </label>
                                                        <select id="status" class="form-control" dataName="status" dataType="text">
                                                            <option value="">
                                                                <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                            </option>
                                                            <option value="suspended">
                                                                Suspended
                                                            </option>
                                                            <option value="unsuspended">
                                                                Unsuspended
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                             
                                        </form>

                                        <div class="col-xs-12" style="margin-top: 10px">
                                            <button id="searchBtn" type="submit"
                                                    class="btn btn-primary waves-effect waves-light">
                                                <?php echo $translations['A00051'][$language]; /* Search */ ?>
                                            <!-- </button> -->
                                            <button type="submit" id="resetBtn"
                                                    class="btn btn-default waves-effect waves-light">
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
                        <div id="basicwizard" class="pull-in" style="display:none">
                            <div class="tab-content b-0 m-b-0 p-t-0">
                                <a id="seeAllBtn" onclick="seeAllBtn()" class="btn btn-primary waves-effect waves-light m-b-rem1" style="display: none;">
                                    <?php echo $translations['A01191'][$language]; /* See All */ ?>
                                </a>
                                <form>
                                    <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                    <div id="listingDiv" class="table-responsive"></div>
                                    <span id="paginateText"></span>
                                    <div class="text-center">
                                        <ul class="pagination pagination-md" id="listingPager"></ul>
                                    </div>
                                </form>
                                
                                <div style="display: inline-block; margin-left:20px;">
                                    <button type="" id="updateBtn" class="btn btn-primary waves-effect waves-light"
                                            style="width: 100px">
                                        <?php echo $translations['A00300'][$language]; /* Update */ ?>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" id="detectSeeAll" value="0">
        <?php include("footer.php"); ?>
    </div>
</div>
<script>
    var resizefunc = [];
</script>
<?php include("shareJs.php"); ?>
<script>

    var divId = 'listingDiv';
    var tableId = 'listingTable';
    var pagerId = 'listingPager';
    var btnArray = {};
    var thArray = Array(
        "check",
        "<?php echo $translations['A01771'][$language]; /* Suspended Client */ ?>",
        "<?php echo $translations['A00318'][$language]; /* Status */ ?>",
        "<?php echo $translations['A01772'][$language]; /* Suspended Date */ ?>",
        "<?php echo $translations['A01773'][$language]; /* Un-suspended At */ ?>",
        "<?php echo $translations['A00147'][$language]; /* Done By */ ?>",
    );

    var method = 'POST';
    var url = 'scripts/reqAdmin.php';
    var debug = 0;
    var bypassBlocking = 0;
    var bypassLoading = 0;
    var pageNumber = 1;
    var offsetSecs = getOffsetSecs();
    var currentID = "";

    $(document).ready(function () {
        setTodayDatePicker();

        $("body").keyup(function (event) {
            if (event.keyCode == 13) {
                $("#searchBtn").click();
            }
        });

        $('#resetBtn').click(function () {
            $('#alertMsg').removeClass('alert-success').html('').hide();
            $('#searchForm').find('input:not([type=radio])').each(function () {
                $(this).val('');
            });
            $('#searchForm').find('select').each(function () {
                $(this).val('');
            });
        });

        $('#searchBtn').click(function () {
            var getDataType = $("input[name=usernameType]:checked").val();
            $('.username').attr('dataType', getDataType);
            pagingCallBack(pageNumber, loadSearch);
        });

        $('#updateBtn').click(function () {
            var username = [];
            var checkedDetails = [];
            $('#' + tableId).find('[type=checkbox]:checked').each(function () {
                var checkboxID = $(this).parent('td').parent('tr').attr('data-username');
                username.push(checkboxID);
            });
            if (username.length === 0)
                showMessage('<?php echo $translations['A00613'][$language]; /* No check box selected. */ ?>', 'warning', '<?php echo $translations['A00614'][$language]; /* Update Status */ ?>', 'edit', '');
            
            else if(username.length >= 500){
                showMessage('Cannot select records more than 500.', 'warning', 'Update Status', 'edit', '');
            } else {
                var formData = {
                    command: 'unsuspendClient',
                    selected: username,
                    action: $('#statusSelect').find('option:selected').val(),
                    remark : $("#remark").val()
                };
                // console.log(formData)
                fCallback = updateCallback;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }
        });

    });

    function seeAllBtn() {
        var searchID = 'searchForm';
        var searchData = buildSearchDataByType(searchID);
        formData = {
            command         : 'getSuspendListing',
            searchData      : searchData,
            pageNumber      : 1,
            seeAll          : 1
        };

        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadDefaultListing(data, message) {
        $('#basicwizard').show();

        if (data) {
            $("#exportBtn").show();
        } else {
            $("#exportBtn").hide();
        }

        if (data.totalPage > 1) {
            $("#seeAllBtn").show();
        } else {
            $("#seeAllBtn").hide();
        }

        var tableNo;
        var listing = data.suspendedListing;

        if (data != "" && listing.length > 0) {
            var newData = [];
            $.each(listing, function (k, v) {  
                var checkbox = "";

                if (v['isSuspended']) {
                    checkbox = "<input name ='checkbox' type ='checkbox'>";              
                }
                
                var rebuild = {
                    check               : checkbox,
                    suspendedClient     : v['username'],
                    status              : v['status'],
                    suspendedDate       : v['suspendedTime'] == null ? '-' : v['suspendedTime'],
                    unsuspendedDateTime : v['unsuspendedTime'] == null ? '-' : v['unsuspendTime'],
                    doneBy              : v['adminUsername'] == null ? '-' : v['adminUsername'],
                };

                newData.push(rebuild);
            });
        }

        buildTable(newData, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        if (data != "" && listing.length > 0) {
            $.each(listing, function (k, v) {
                $('#' + tableId).find('tr#' + k).attr('data-username', v['client_id']);
            });
        }

        // $('#' + tableId).find('tr').each(function () {
        //     $(this).find('td:eq(6), th:eq(6)').css('text-align', "right");
        //     $(this).find('td:eq(7), th:eq(7)').css('text-align', "right");
        //     $(this).find('td:eq(8), th:eq(8)').css('text-align', "right");
        // });
    }

    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<?php echo $translations['A00114'][$language]; /* Search successfully */?>').show();
        setTimeout(function () {
            $('#searchMsg').removeClass('alert-success').html('').hide();
        }, 3000);
    }

    function pagingCallBack(pageNumber, fCallback) {

        if (pageNumber > 1) bypassLoading = 1;

        $("#seeAllBtn").show();

        var searchId = 'searchForm';
        var searchData = buildSearchDataByType(searchId);
        var formData = {
            command             : "getSuspendListing",
            pageNumber          : pageNumber,
            searchData          : searchData,
            // usernameSearchType  : $("input[name=usernameType]:checked").val()
        };

        // console.log(formData);
        // return;
        fCallback = loadDefaultListing;

        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function updateCallback(data, message) {
        showMessage('<?php echo $translations['A00616'][$language]; /* Successful updated status. */ ?>', 'success', '<?php echo $translations['A00617'][$language]; /* Update Status */ ?>', 'edit', 'unsuspendClient.php');
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
</script>
</body>
</html>
