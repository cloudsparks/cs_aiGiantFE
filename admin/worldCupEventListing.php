<?php 
session_start();
$thisPage = basename($_SERVER['PHP_SELF']);
$thisUrl = $_SERVER['REQUEST_URI'];
$pathInfo = pathinfo($thisUrl);

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
                                                            <?php echo $translations['A00112'][$language]; /* Created At */?>
                                                        </label>
                                                        <div class="input-group input-daterange">
                                                            <input type="text" class="form-control input-daterange-to" dataName="date_range" dataType="dateRange">
                                                            <span class="input-group-addon">
                                                                <?php echo $translations['A00139'][$language]; //To ?>
                                                            </span>
                                                            <input type="text" class="form-control input-daterange-to" dataName="date_range" dataType="dateRange">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A01725'][$language]; /* Match */?>
                                                        </label>
                                                        <input type="text" class="form-control" dataName="match" dataType="text">
                                                    </div>
                                                    
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

                <div class="row">
                    <div class="col-lg-12">
                        <form>
                            <div id="basicwizard" class="pull-in">
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
                </div>
            </div>

            <!-- reject campaign modal -->
            <div class="modal fade" id="rejectCampaign" role="dialog">
                <div class="modal-dialog modal-xs" role="document">
                    <div class="modal-content">
                        <div>
                            <h4 data-lang="A00250">
                                <?php echo $translations['A00250'][$language]; /* Confirmation */ ?>
                            </h4>
                        </div>
                        <div class="modal-input">
                            <div class="col-sm-6 form-group">
                                <label class="control-label" for="" data-th="#">
                                <?php echo $translations['A01730'][$language]; /* Confirm Delete World Cup Event? */ ?> 
                                </label>
                            </div>  
                            <!--
                            <div class="col-sm-6 form-group">
                                <label class="control-label" for="" data-th="#">
                                <?php echo $translations['A00571'][$language]; /* Remark */ ?>
                                </label>
                                <input id="rejectRemark" type="text" class="form-control">
                                <span id="remarkError" class="errorSpan text-danger"></span>
                            </div>-->
                        </div>
                        <div class="modal-footer">
                            <button 
                                id="canvasCloseBtn" 
                                type="button" 
                                class="btn btn-primary waves-effect waves-light" 
                                data-dismiss="modal"
                                data-lang="A00742"
                            >
                                <?php echo $translations['A00742'][$language]; /* Close */ ?>
                            </button>
                            <button 
                                id="canvasCloseBtn" 
                                type="button" 
                                class="btn btn-primary waves-effect waves-light" 
                                data-dismiss="modal" 
                                onclick="rejectCampaignConfirm()"
                                data-lang="A00323"
                            >
                                <?php echo $translations['A00323'][$language]; /* Submit */ ?>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of reject campaign modal -->

        </div>
        <?php include("footer.php"); ?>
    </div>
</div>
<script>
    var resizefunc = [];
</script>
<?php include("shareJs.php"); ?>
<script>
    var url       = 'scripts/reqWorldCupEvent.php';
    var divId    = 'listingDiv';
    var tableId  = 'listingTable';
    var pagerId  = 'listingPager';
    var dataArr;
    var btnArray = Array('edit','delete');
    var thArray  = Array(
        '<?php echo $translations['A00106'][$language]; /* ID */ ?>',
        '<?php echo $translations['A00112'][$language]; /* Created At */ ?>',
        '<?php echo $translations['A01347'][$language]; /* Match */ ?>',
        '<?php echo $translations['A01726'][$language]; /* Odd */ ?>',
        '<?php echo $translations['A00318'][$language]; /* Status */ ?>',
        '<?php echo $translations['A01731'][$language]; /* Action */ ?>'
    );

    var method         = 'POST';
    var debug          = 0;
    var bypassBlocking = 0;
    var bypassLoading  = 0;
    var pageNumber     = 1;
    var rowId;
    var showInvoiceValue = "0";
    var showTxidValue = "0";

    $(document).ready(function() {

        setTodayDatePicker()

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
            $('#searchForm').find('select').each(function() {
                $(this).val('');
            });
        });

    });

    function pagingCallBack(pageNumber, fCallback){
        console.log('test')
        var searchId   = 'searchForm';
        if(pageNumber > 1) bypassLoading = 1;

        var searchData = buildSearchDataByType(searchId);
        var formData   = {
            command     : "worldCupEventSetting",
            searchData   : searchData,
            pageNumber : pageNumber,
        };

        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span><?php echo $translations['A00114'][$language]; /* Search successful. */ ?></span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide(); 
        }, 3000);
    }

    function loadDefaultListing(data, message) {
        $('#basicwizard').show();
        var tableNo;
        var event = data.worldCupEventList



        if(event) {
            var newList = [];
            
            $.each(event, function(k, v) {

                var rebuildData = {
                    id: v['id'],
                    createdAt : v['created_at'],
                    match: v['match'],
                    odd: v['odd'],
                    status : v['status']
                };

                newList.push(rebuildData);
            });
        }

        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        if(event) {
            $.each(event, function(k, v) {
                if(v['status'] == 'Deleted') {
                    $(`#delete${k}`).hide()
                }
            })
        }
       

        $('#'+tableId).find('tr').each(function(){
            $(this).find('th:last-child,th:first-child,td:first-child').hide();
            $(this).find('td:last-child,th:nth-child(5)').css('text-align','center');
        })

        $('#'+ tableId).find('tbody tr').each(function(){
            $(this).find('td:last-child').css('text-align','center');
        });  

    }

    function tableBtnClick(btnId) {
        var btnName  = $('#'+btnId).attr('id').replace(/\d+/g, '');
        var tableRow = $('#'+btnId).parent('td').parent('tr');
        rowId = tableRow.attr('data-th');

        if(btnName == "delete") {
            $('#rejectCampaign').modal('show');
        }

        if(btnName == "edit") {
            $.redirect("editWorldCupEvent.php",{id: rowId});
        }
    }

    function setTodayDatePicker() {
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1;
        var yyyy = today.getFullYear();
        if (dd < 10) {
            dd = '0' + dd;
        }
        if (mm < 10) {
            mm = '0' + mm;
        }
        var today = dd + '/' + mm + '/' + yyyy;

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

    function rejectCampaignConfirm() {  
        var remark = $('#rejectRemark').val()
        var formData  = {
            command : 'editWorldCupEvent', 
            id : rowId, 
            action: 'delete',
            //remark: remark
        };
        var fCallback = removeCallback;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function removeCallback(data, message) {
        showMessage(
            "<?php echo $translations['A01732'][$language]; /* Successfully Deleted Campaign */ ?>",
            'success', 
            "<?php echo $translations['A01733'][$language]; /* Deleted Campaign */ ?>",
            'trash', 
            'worldCupEventListing.php'
        );
    }


</script>
</body>
</html>
