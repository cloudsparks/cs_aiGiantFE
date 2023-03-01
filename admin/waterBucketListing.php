<?php
    session_start();
    $thisPage = basename($_SERVER['PHP_SELF']);
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
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00117'][$language]; /* Full Name */ ?>
                                                        </label>
                                                        <input type="text" class="form-control" dataName="name"
                                                               dataType="text">
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00102'][$language]; /* Username */ ?>
                                                        </label>
                                                        <span class="pull-right">
                                                            <input id="match" type="radio" name="usernameType" value="match"
                                                                   checked>
                                                            <label for="match"
                                                                   style="margin-right: 15px;"><?php echo $translations['A01347'][$language]; /* Match */ ?></label>

                                                            <input id="like" type="radio" name="usernameType" value="like"
                                                                   style="margin-left: 15px;">
                                                            <label for="like"><?php echo $translations['A01348'][$language]; /* Like */ ?></label>
                                                        </span>
                                                        <input type="text" class="form-control" dataName="username"
                                                               dataType="text">
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00148'][$language]; /* Member ID */ ?>
                                                        </label>
                                                        <input type="text" class="form-control" dataName="memberID"
                                                               dataType="text">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="row">
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            Type
                                                        </label>
                                                        <select class="form-control" dataName="type" dataType="select">
                                                            <option value="">
                                                                <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                            </option>
                                                            <option value="daily">Daily</option>
                                                            <option value="instant">Instant</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                        <div class="col-xs-12 m-t-rem1">
                                            <button id="searchBtn" type="submit"
                                                    class="btn btn-primary waves-effect waves-light">
                                                <?php echo $translations['A00051'][$language]; /* Search */ ?>
                                            </button>
                                            <button id="resetBtn" type="submit"
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

                <a id="addWaterBucket" href="addWaterBucket.php" type="button"
                   class="btn btn-primary waves-effect w-md waves-light m-b-20">
                    Add Water Bucket
                </a>
                <div class="row">
                    <div class="col-lg-12">
                        <button id="exportBtn" type="button" onclick="exportBtn()"
                                class="btn btn-primary waves-effect waves-light m-b-rem1"
                                style="display: none"><?php echo $translations['A01352'][$language]; /*Export to xlsx*/ ?></button>
                        <button id="seeAllBtn" type="button" onclick="seeAllBtn()"
                                class="btn btn-primary waves-effect waves-light "
                                style="margin-bottom: 10px;display: none">
                            <?php echo $translations['A01191'][$language]; /*See All*/ ?>
                        </button>
                        <form>
                            <div id="basicwizard" class="pull-in" style="display: none">
                                <div class="tab-content b-0 m-b-0 p-t-0">
                                    <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                    <div id="listingDiv" class="table-responsive"></div>
                                    <span id="paginateText"></span>
                                    <div class="text-center">
                                        <ul class="pagination pagination-md" id="listingPager"></ul>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- End row -->

            </div> <!-- container -->

        </div> <!-- content -->

        <?php include("footer.php"); ?>

    </div>

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
    var btnArray =  {};// Array('edit');
    var thArray  = Array('<?php echo $translations['A00148'][$language]; /* Member ID */ ?>',
                         '<?php echo $translations['A00117'][$language]; /* Full Name */ ?>',
                         '<?php echo $translations['A00102'][$language]; /* Username */ ?>',
                         'Type',
                         '%',
                         '<?php echo $translations['A00147'][$language]; /* Done By */?>',
                         'Done At'
                        );
    var searchId = 'searchForm';
    // Initialize the arguments for ajaxSend function
    var url = 'scripts/reqBonus.php';
    var method = 'POST';
    var debug = 0;
    var bypassBlocking = 0;
    var bypassLoading = 0;
    var pageNumber = 1;
    var formData = "";
    var fCallback = "";

    $(document).ready(function () {

        // fCallback = loadDefaultListing;
        // formData  = {command: 'getWaterBucketPercentage'};
        // ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        //reset to default search
        $('#resetBtn').click(function () {
            $('#alertMsg').removeClass('alert-success').html('').hide();
            $('#searchForm').find('input:not([type=radio])').each(function () {
                $(this).val('');
            });
            $('#searchForm').find('select').each(function () {
                $(this).val('');
                $("#searchForm")[0].reset();
            });

        });

        $('#searchBtn').click(function () {
            pagingCallBack(pageNumber, loadSearch);
        });

        $('#datepicker input').each(function () {
            $(this).datepicker('clearDates');
        });
    });

    $('#dateRangeStart').datepicker({
        // language: language,
        format: 'dd/mm/yyyy',
        orientation: 'auto',
        autoclose: true
    });

    $('#dateRangeEnd').datepicker({
        // language: language,
        format: 'dd/mm/yyyy',
        orientation: 'auto',
        autoclose: true
    });

    function exportBtn() {

        var searchID = 'searchWithdrawal';
        var searchData = buildSearchDataByType(searchID);
        var thArray = Array(
            "Member ID",
            "Username",
            "Full Name",
            "Type",
            "Value",
            "Done By",
            "Done At"
        );
        var key = Array(
            'memberID',
            'username',
            'name',
            'type',
            'value',
            'adminUsername',
            'created_at'
        );
        var formData = {
            command: "getWaterBucketPercentage",
            filename: "WaterBucketPercentage",
            inputData: searchData,
            header: thArray,
            key: key,
            DataKey: "waterBucketPercentageListing",
            type: 'export',
            usernameSearchType : $("input[name=usernameType]:checked").val()
        };

        fCallback = exportExcel;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }


    function seeAllBtn() {
        var searchID = 'searchWithdrawal';
        var searchData = buildSearchDataByType(searchID);
        formData = {
            command: 'getWaterBucketPercentage',
            inputData: searchData,
            pageNumber: 1,
            seeAll: 1
        };

        // console.log(formData);
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function pagingCallBack(pageNumber, fCallback) {
        if (pageNumber > 1) bypassLoading = 1;

        var searchData = buildSearchDataByType(searchId);
        var formData = {
            command: 'getWaterBucketPercentage',
            pageNumber: pageNumber,
            inputData: searchData,
            usernameSearchType: $("input[name=usernameType]:checked").val()
        };

        if (!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadDefaultListing(data, message) {
        console.log(data);
        $('#basicwizard, #exportBtn, #seeAllBtn').show();
        var waterBucketPercentageListing = data.waterBucketPercentageListing;
        var tableNo;

        if (waterBucketPercentageListing) {
            var newList = [];
            $.each(waterBucketPercentageListing, function(k,v){
                
             var rebuildData ={
                memberID : v['memberID'],
                name : v['name'],
                username : v['username'],
                type : v['type'],
                value : v['value'],
                adminUsername : v['adminUsername'],
                created_at : v['created_at']
                // createdAt : v['business_id'],
                // lastLogin : v['last_login']
            };
            newList.push(rebuildData);
        });

        }


        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        if (waterBucketPercentageListing) {
            $.each(waterBucketPercentageListing, function (k, v) {
                $('#' + tableId).find('tr#' + k).attr('data-th', v['username']);
                $('#' + tableId).find('tr#' + k).attr('data-value', v['value']);
                $('#' + tableId).find('tr#' + k).attr('data-type', v['type']);
            });
        }

        $('#' + tableId).find('tbody tr').each(function () {

           // $(this).find('td:last-child').css('text-align', 'center');
        });
    }
    
    // function tableBtnClick(btnId) {
    //     var btnName  = $('#'+btnId).attr('id').replace(/\d+/g, '');
    //     var tableRow = $('#'+btnId).parent('td').parent('tr');
    //     var tableId  = $('#'+btnId).closest('table');
        
    //     if (btnName == 'edit') {
    //         var username = tableRow.attr('data-th');
    //         var value = tableRow.attr('data-value');
    //         var type = tableRow.attr('data-type');

    //         $.redirect("editWaterBucketListing.php",{username: username, value: value, type: type});
    //     }
    // }
    
    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span><?php echo $translations['A00114'][$language]; /* Search successful. */ ?></span>').show();
        setTimeout(function () {
            $('#searchMsg').removeClass('alert-success').html('').hide();
        }, 3000);
    }


</script>
</body>
</html>
