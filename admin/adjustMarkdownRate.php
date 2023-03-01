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
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel-group">
                                <div class="panel panel-default bx-shadow-none">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            Set Mark Down Rate
                                        </h4>
                                    </div>

                                    <div class="panel-body">
                                        <div id="searchMsg" class="text-center alert" style="display: none;"></div>
                                        <form id="setForm" role="form">
                                            <div class="col-xs-12">
                                                <div class="row">
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label">
                                                            Active Date
                                                        </label>
                                                        <div class="input-daterange">
                                                            <input type="text" class="form-control" id="activeDateTS" dataName="activeDateTS" dataType="singleDate">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label">
                                                            Crypto Type
                                                        </label>
                                                        <select class="form-control" id="coinType" dataName="coinType" dataType="select"></select>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label">
                                                            Live Rate
                                                        </label>
                                                        <input type="text" class="form-control" id="coinLiveRate" readonly="readonly">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label">
                                                            Module
                                                        </label>
                                                        <select class="form-control" id="module" dataName="module" dataType="select">
                                                            <option value="">
                                                                --Please Select--
                                                            </option>
                                                            <?php foreach($_SESSION["liveRateModules"] as $key => $value){ ?>
                                                                <option value="<?php echo $key; ?>">
                                                                    <?php echo $value; ?>
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label">
                                                            Mark Type
                                                        </label>
                                                        <div>
                                                            <input type="radio" id="markTypeIncS" name="markTypeS" value="inc" checked>
                                                            <label for="markTypeIncS" style="margin-right: 100px;">Increase</label>

                                                            <input type="radio" id="markTypeDecS" name="markTypeS" value="dec" style="margin-left: 100px;">
                                                            <label for="markTypeDecS">Decrease</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label">
                                                            Coin Rate
                                                        </label>
                                                        <input type="text" id="coinRate" class="form-control" dataName="coinRate" dataType="text" oninput="
                                                        this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1'); 
                                                        this.value = (this.value.indexOf('.') >= 0) ? (this.value.substr(0, this.value.indexOf('.')) + this.value.substr(this.value.indexOf('.'), 9)) : t;
                                                        " onkeyup="updateCryptoRate()">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label">
                                                            Crypto Rate
                                                        </label>
                                                        <input type="text" class="form-control" id="cryptoRate" readonly="readonly">
                                                    </div>
                                                </div>
                                            </div>                                   
                                        </form>

                                        <div class="col-xs-12">
                                            <button id="submitBtn" type="submit" class="btn btn-primary waves-effect waves-light">
                                                <?php echo $translations['A00323'][$language]; /* Submit */ ?>
                                            </button>
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
                                                                Module
                                                            </label>
                                                            <select class="form-control" id="module" dataName="module" dataType="select">
                                                                <option value="">
                                                                    --Please Select--
                                                                </option>
                                                                <?php foreach($_SESSION["liveRateModules"] as $key => $value){ ?>
                                                                    <option value="<?php echo $key; ?>">
                                                                        <?php echo $value; ?>
                                                                    </option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>

                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label">
                                                                Mark Type
                                                            </label>
                                                            <div>
                                                                <input type="radio" id="markTypeInc" name="markType" value="inc" checked>
                                                                <label for="markTypeInc" style="margin-right: 100px;">Up</label>

                                                                <input type="radio" id="markTypeDec" name="markType" value="dec" style="margin-left: 100px;">
                                                                <label for="markTypeDec">Down</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xs-12">
                                                    <div class="row">
                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label">
                                                                Crypto Type
                                                            </label>
                                                            <select class="form-control" id="cryptoType" dataName="cryptoType" dataType="select">
                                                                <option value="">
                                                                    --Please Select--
                                                                </option>
                                                                <?php foreach($_SESSION["coinTypeArr"] as $key => $value){ ?>
                                                                    <option value="<?php echo $value['value']; ?>">
                                                                        <?php echo $value['display']; ?>
                                                                    </option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>

                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label">
                                                                <?php echo $translations['A00137'][$language]; /* Date */ ?>
                                                            </label>
                                                            <div class="input-group input-daterange">
                                                                <input type="text" class="form-control" dataName="date"
                                                                       dataType="dateRange">
                                                                <span class="input-group-addon">
                                                                    <?php echo $translations['A00139'][$language]; /* to */ ?>
                                                                </span>
                                                                <input type="text" class="form-control" dataName="date"
                                                                       dataType="dateRange">
                                                            </div>
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
                    <!-- End row -->

                    <!-- Start row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <form>
                                <div id="basicwizard" class="pull-in" style="display: none">
                                    <div class="tab-content b-0 m-b-0 p-t-0" style="padding-bottom: 0;">
                                        <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                        <div id="markDownRateDiv" class="table-responsive"></div>
                                        <span id="paginateText"></span>
                                        <div class="text-center">
                                            <ul class="pagination pagination-md" id="markDownRatePager"></ul>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
    var divId    = 'markDownRateDiv';
    var tableId  = 'markDownRateTable';
    var pagerId  = 'markDownRatePager';
    var btnArray = {};
    var thArray  = Array(
            'id',
            'Crypto Type',
            'Module Type',
            'Percentage',
            'Mark Type',
            'Date',
            'Done By',
            'Active At'
        );
    var searchId = 'searchForm';
    var coinLiveRate = {};
    var coinDisplay = {};
        
    // Initialize the arguments for ajaxSend function
    var url             = 'scripts/reqAdmin.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";

    $(document).ready(function() {

        formData = {
            command   : 'getCoinLiveRate'
        };
       
        fCallback = loadCoinLiveRate;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $("#coinType").change(function () {
            $('#coinLiveRate').attr('value', coinLiveRate[this.value]);
            updateCryptoRate();
        });

    
        $('.input-daterange input').each(function() {
            $(this).daterangepicker({
                singleDatePicker: true,
                timePicker: false,
                locale: {
                    format: 'DD/MM/YYYY'
                }
            });
        });

        $('#submitBtn').click(function() {
            $('.text-danger').text("");

            if($('#module').find('option:selected').val()) {
                // showMessage("Confirm to set mark down rate?", 'warning', "Set Mark Down Rate", 'edit', '', ['Confirm']);
                // $('#canvasConfirmBtn').click(function() {

                    var coinType = $("#coinType").find('option:selected').val();
                    var coinRate = $("#coinRate").val();
                    var markType = $("input[name=markTypeS]:checked").val();
                    var modules = $("#module").find('option:selected').val();
                    var activeDateTS = dateToTimestamp($('#activeDateTS').val());

                    var formData = {
                        'command'       : 'insertMarkDownRate',
                        'coinType'      : coinType,
                        'coinRate'      : coinRate,
                        'markType'      : markType,
                        'module'        : modules,
                        'activeDateTS'  : activeDateTS
                    };

                    fCallback = sendSubmit;
                    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
                // });
            } else {
                showMessage("Please select a module", 'warning', "Invalid", '', '');
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
            $('#searchForm').find('select').val('');
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

    });

    function loadCoinLiveRate(data, message) {
        if(data) {
            coinLiveRate = data.coinLiveRate;
            coinDisplay = data.coinDisplay;

            var optionHtml = ``;
            $.each(coinDisplay, function(k, v) {
                optionHtml += `<option value="${k}">${v}</option>`;
            });
            $('#coinType').html(optionHtml);

            $('#coinLiveRate').attr('value', coinLiveRate[$("#coinType option:first").val()]);
            updateCryptoRate();
        }
    }

    function updateCryptoRate() {
        var oldValue = $('#coinLiveRate').val() * 1.0;
        var rateValue = $('#coinRate').val() * 1.0;
        var newValue = 0;
        switch($("input[name=markTypeS]:checked").val()) {
            case "inc":
                newValue = oldValue + rateValue;
                break;
            case "dec":
                newValue = oldValue - rateValue;
                break;
        }

        $('#cryptoRate').attr('value', newValue.toFixed(8));
    }
    
    function loadDefaultListing(data, message) {
        $('#basicwizard').show();
        var tableNo;
        
        if (data.listing) {
            var newList = [];
            $.each(data.listing, function(k, v){
                var rebuild = {
                    id          : v['id'],
                    cryptoType  : v['cryptoType'],
                    moduleType  : v['moduleType'],
                    percentage  : v['percentage'] + "%",      
                    markType    : v['markType'],
                    date        : v['date'],
                    doneBy      : v['doneBy'],
                    activeAt    : v['activeAt']
                };

                newList.push(rebuild);
            });
        }

        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);
    }

    function pagingCallBack(pageNumber, fCallback){
        if(pageNumber > 1) bypassLoading = 1;

        var searchData = buildSearchDataByType(searchId);
        searchData.push({
            dataName    : 'markType',
            dataValue   : $("input[name=markType]:checked").val()
        })
        var formData   = {
            command     : 'getMarkDownRateList',
            pageNumber  : pageNumber,
            searchData  : searchData
        };
        if(!fCallback)
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

/*    function updateCallback(data, message) {
        showMessage('<?php echo $translations['A00616'][$language]; // Successful updated status. ?>', 'success', '<?php echo $translations['A00617'][$language]; // Update Status ?>', 'edit', 'adjustMarkDownRate.php');
    }*/

    function sendSubmit(data, message) {
        showMessage(message, 'success', 'Congratulations', '', 'adjustMarkdownRate.php');
    }

</script>
</body>
</html>
