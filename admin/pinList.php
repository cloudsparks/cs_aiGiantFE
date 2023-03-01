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
                                                            <?php echo $translations['A00653'][$language]; /* Pin Code */ ?>
                                                        </label>
                                                        <input type="text" class="form-control" dataName="code" dataType="text">
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00654'][$language]; /* Purchase Date */ ?>
                                                        </label>
                                                        <input id="purchaseDate" type="text" class="form-control" dataName="purchaseDate" dataType="singleDate">
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00655'][$language]; /* Buyer Name */ ?>
                                                        </label>
                                                        <input type="text" class="form-control" dataName="buyerName" dataType="text">
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
                                                            <option value="New">
                                                                <?php echo $translations['A00658'][$language]; /* New */ ?>
                                                            </option>
                                                            <option value="Used">
                                                                <?php echo $translations['A00659'][$language]; /* Used */ ?>
                                                            </option>
                                                            <option value="Cancel">
                                                                <?php echo $translations['A00660'][$language]; /* Cancel */ ?>
                                                            </option>
                                                            <option value="Refund">
                                                                <?php echo $translations['A00661'][$language]; /* Refund */ ?>
                                                            </option>
                                                            <option value="Transferred">
                                                                <?php echo $translations['A00662'][$language]; /* Transferred */ ?>
                                                            </option>
                                                        </select>
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
                    <div class="col-xs-12">
                        <div id="basicwizard" class="pull-in" style="display: none;">
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
                                    <option value="Used" selected>
                                        <?php echo $translations['A00659'][$language]; /* Used */ ?>
                                    </option>
                                    <option value="Cancel">
                                        <?php echo $translations['A00660'][$language]; /* Cancel */ ?>
                                    </option>
                                    <option value="Refund">
                                        <?php echo $translations['A00661'][$language]; /* Refund */ ?>
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

        </div>

        <?php include("footer.php"); ?>

    </div>

</div>

<script>
    var resizefunc = [];
</script>

<?php include("shareJs.php"); ?>

<script>

    var divId    = 'listingDiv';
    var tableId  = 'listingTable';
    var pagerId  = 'listingPager';
    var btnArray = Array('edit');
    var thArray  = Array(
        '<?php echo $translations['A00668'][$language]; /* No */ ?>',
        '<?php echo $translations['A00653'][$language]; /* Pin Code */ ?>',
        '<?php echo $translations['A00654'][$language]; /* Purchase Date */ ?>',
        '<?php echo $translations['A00671'][$language]; /* Entry Price */ ?>',
        '<?php echo $translations['A00672'][$language]; /* Purchase Price */ ?>',
        '<?php echo $translations['A00206'][$language]; /* Bonus Value */ ?>',
        'Non-Bonus Value',
        '<?php echo $translations['A00673'][$language]; /* Buyer ID */ ?>',
        '<?php echo $translations['A00674'][$language]; /* Buyer Username */ ?>',
        '<?php echo $translations['A00203'][$language]; /* Package */ ?>',
        '<?php echo $translations['A00676'][$language]; /* BV Type */ ?>',
        '<?php echo $translations['A00677'][$language]; /* Place ID */ ?>',
        '<?php echo $translations['A00198'][$language]; /* Placement Username */ ?>',
        '<?php echo $translations['A00679'][$language]; /* Holder ID */ ?>',
        '<?php echo $translations['A00680'][$language]; /* Holder Username */ ?>',
        '<?php echo $translations['A00681'][$language]; /* Place Date */ ?>',
        '<?php echo $translations['A00318'][$language]; /* Status */ ?>',
        );

    var method         = 'POST';
    var url            = 'scripts/reqAdmin.php';
    var debug          = 0;
    var bypassBlocking = 0;
    var bypassLoading  = 0;
    var pageNumber     = 1;

    $(document).ready(function() {
        $('#purchaseDate').daterangepicker({
            singleDatePicker: true,
            timePicker: false,
            locale: {
                format: 'DD/MM/YYYY'
            }
        });
        $('#purchaseDate').val('');

        formData = {command : "getPinList", pageNumber : pageNumber};
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $('#resetBtn').click(function() {
            $("#searchForm")[0].reset();
            $('#purchaseDate').val('');
        });

        $('#searchBtn').click(function() {
            pagingCallBack(pageNumber, loadSearch);
        });

        $('#updateBtn').click(function(){
            var pinIdList = [];

            $("#pinListTable > tbody > tr").each(function(key, value){

                if ($(this).find("input[name='checkbox']").is(':checked')){
                    pinIdList.push($(this).attr("data-th"));
                }
            });

            var status = $('#status').val();

            formData = {
                command     : "updatePinDetail",
                pinId       : pinIdList,
                status      : status
            };

            fCallback = loadSuccessful;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        });
    });

    function loadDefaultListing(data, message) {
        $("#basicwizard").show();
        var tableNo = {pageNumber : data.pageNumber, numRecord : data.numRecord};
        buildTable(data.pinPageListing, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        $('tr').each(function(){
            $(':eq(17)',this).remove().insertBefore($(':eq(0)',this));
        });

        $("#pinListTable > thead > tr").each(function(key, value){
            $(this).prepend("<td></td>");
        });

        $("#pinListTable > tbody > tr").each(function(key, value){

            if ($(this).find("td:contains('New')").text() === "New")
                $(this).prepend("<td><input name ='checkbox' type ='checkbox'></td>");
            else
                $(this).prepend("<td></td>");

        });
    }

    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span><?php echo $translations['A00114'][$language]; /* Search successful. */ ?></span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide();
        }, 3000);
    }

    function tableBtnClick(btnId) {
        var btnName  = $('#'+btnId).attr('id').replace(/\d+/g, '');
        var tableRow = $('#'+btnId).parent('td').parent('tr');
        var tableId  = $('#'+btnId).closest('table');

        if (btnName == 'edit') {
            var pinId = tableRow.attr('data-th');
            $.redirect("updatePinDetail.php",{pinId: pinId});
        }

    }

    function pagingCallBack(pageNumber, fCallback){
        var searchId   = 'searchForm';
        var searchData = buildSearchDataByType(searchId);
        if(pageNumber > 1) bypassLoading = 1;

        var formData = {
            command     : "getPinList",
            searchData  : searchData,
            pageNumber  : pageNumber
        };
        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadSuccessful(data, message){
        showMessage("<?php echo $translations['A00684'][$language]; /* Update Successful */ ?>", "success", "<?php echo $translations['A00685'][$language]; /* Update Pin Detail */ ?>", "edit", "pinList.php");
    }

</script>
</body>
</html>