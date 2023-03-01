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
                                                        <label class="control-label" data-lang="A01688">
                                                            <?php echo $translations['A01688'][$language]; /* Pair Name */?>
                                                        </label>
                                                        <input type="text" class="form-control" dataName="pair" dataType="text">
                                                    </div>
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
                                                </div>
                                            </div>
                                        </form>

                                        <div class="col-xs-12 m-t-rem1">
                                            <button id="searchBtn" type="submit" class="btn btn-primary waves-effect waves-light">
                                                <?php echo $translations['A00051'][$language]; /* Search */ ?>
                                            </button>
                                            <button id="resetBtn" type="submit" class="btn btn-default waves-effect waves-light">
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
                        <a onclick="showModal()" type="button" class="btn btn-primary waves-effect w-md waves-light m-b-20" data-lang="A01689">
                            <?php echo $translations['A01689'][$language]; /* New Pair */ ?>
                        </a>
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

        </div>

        <?php include("footer.php"); ?>

    </div>

</div>

<div class="modal fade" id="addPair" role="dialog">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
            <div>
                <h4 data-lang="A01690">
                    <?php echo $translations['A01690'][$language]; /* Add Third Party Trade Pair */ ?> 
                </h4>
            </div>
            <div class="modal-input">
                <label data-lang="A01688">
                    <?php echo $translations['A01688'][$language]; /* Pair Name */?>
                </label>
                <input id="pairInput"/>
            </div>
            <div class="modal-footer">
                <button 
                    id="canvasCloseBtn" 
                    type="button" 
                    class="btn btn-primary waves-effect waves-light" 
                    data-dismiss="modal"
                >
                    <?php echo $translations['A00742'][$language]; /* Close */ ?>
                </button>
                <button 
                    id="canvasCloseBtn" 
                    type="button" 
                    class="btn btn-primary waves-effect waves-light" 
                    data-dismiss="modal" 
                    onclick="createPair()"
                    data-lang="A00323"
                >
                    <?php echo $translations['A00323'][$language]; /* Submit */ ?>
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deletePair" role="dialog">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
            <div>
                <h4 data-lang="A00250">
                    <?php echo $translations['A00250'][$language]; /* Confirmation */ ?>
                </h4>
            </div>
            <div class="modal-input">
                <label data-lang="A01691">
                    <?php echo $translations['A01691'][$language]; /* Confirm Remove Pairs? */ ?>
                </label>
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
                    onclick="removePairConfirm()"
                    data-lang="A00323"
                >
                    <?php echo $translations['A00323'][$language]; /* Submit */ ?>
                </button>
            </div>
        </div>
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
    var btnArray = Array('delete');
    var thArray  = Array(
        'ID',
        '<?php echo $translations['A00137'][$language]; /* Date */ ?>',
        '<?php echo $translations['A01754'][$language] //Pairs ?>',
        '<?php echo $translations['A00147'][$language] //Done By ?>',
        '<?php echo $translations['A01753'][$language] //Actions ?>',
    );

    var searchId = 'searchForm';

    var url             = 'scripts/reqThirdPartyPair.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";  
    var rowId;

    $(document).ready(function() {

        setTodayDatePicker()

        $("body").keyup(function(event) {
            if (event.keyCode == 13) {
                $("#searchBtn").click();
            }
        });

        $('#resetBtn').click(function() {
            $('#alertMsg').removeClass('alert-success').html('').hide();
            $('#searchForm').find('input').each(function() {
                $(this).val(''); 
            });
            $('#searchForm').find('select').each(function() {
                $(this).val('');
                $("#searchForm")[0].reset();
            });

        });

        $('#searchBtn').click(function() {
            pagingCallBack(pageNumber, loadSearch);
        }); 
    });

    function pagingCallBack(pageNumber, fCallback){
        if(pageNumber > 1) bypassLoading = 1;

        var searchData = buildSearchDataByType(searchId);
        var formData   = {
            command     : "getThirdPartyTradePair",
            pageNumber  : pageNumber,
            inputData   : searchData
        };

        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadDefaultListing(data, message) {

        var tableNo;
        var pairingListing = data.pairingListing

        if(data != "" && pairingListing && pairingListing.length > 0) {
            var newList = [];

            $.each(pairingListing, function(k, v) {

                var rebuildData = {
                    id: v['id'],
                    created_at : v['created_at'],
                    pair : v['pair'],
                    username : v['username']
                };

                newList.push(rebuildData);
            });
        }

        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        $('#'+tableId).find('tr').each(function(){
            $(this).find('th:last-child,th:first-child,td:first-child').hide();
            $(this).find('td:last-child,th:nth-child(5)').css('text-align','center');
        })
    }

    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span><?php echo $translations['A00114'][$language]; /* Search successful. */ ?></span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide(); 
        }, 3000);
    }

    function showModal() {
        $('#addPair').modal('show')
    }

    function createPair() {
        var pairName = $('#pairInput').val();
        
        var formData = {
            command  : "addThirdPartyPair",
            pair : pairName
        };
        var fCallback = sendNew;

        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function sendNew(data, message) {
        showMessage(
            "<?php echo $translations['A01692'][$language]; ?>",//Create New Pair Successful
            'success', 
            "<?php echo $translations['A01693'][$language]; ?>",//Create New Pair
            'user-plus', 
            'thirdPartyPair.php'
        );
    }

    function tableBtnClick(btnId) {
        var btnName  = $('#'+btnId).attr('id').replace(/\d+/g, '');
        var tableRow = $('#'+btnId).parent('td').parent('tr');
        rowId = tableRow.attr('data-th');

        if(btnName == "delete") {
            $('#deletePair').modal('show');
        }
    }

    function removePairConfirm() {        
        var formData  = {command : 'updateThirdPartyPair', id : rowId, operation: 'remove'};
        var fCallback = removeCallback;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function removeCallback(data, message) {
        showMessage(
            "<?php echo $translations['A01694'][$language]; ?>",//Successfully Remove Pairs
            'success', 
            "<?php echo $translations['A01695'][$language]; ?>",//Remove Pairs
            'trash', 
            'thirdPartyPair.php'
        );
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

        return today;
    }
</script>
</body>
</html>
