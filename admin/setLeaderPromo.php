<?php 
    session_start();

    // Get current page name
    $thisPage = basename($_SERVER['PHP_SELF']);

    // Check the session for this page
    if(!isset ($_SESSION['access'][$thisPage]))
        echo '<script>window.location.href="accessDenied.php";</script>';
    else
        $_SESSION['lastVisited'] = $thisPage;

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
                        <div class="card-box p-b-0">
                            <!-- <h4 class="header-title m-t-0 m-b-30">
                                <?php echo $translations['A00116'][$language]; /* User Profile */ ?>
                            </h4> -->
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- <form role="form" id="newAdmin" data-parsley-validate novalidate> -->
                                        <div id="basicwizard" class=" pull-in">
                                            <div class="tab-content b-0 m-b-0 p-t-0">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">
                                                        <?php echo 'Promo Name'; /* Username */ ?>
                                                    </label>
                                                    <input id="promoName" type="text" class="form-control"  />
                                                    <span id="promoNameError" class="customError text-danger"></span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">
                                                        <?php echo 'Promo Date'; /* Type */ ?>
                                                    </label>
                                                    <div id="datepicker" class="form-group">
                                                        <div class="input-daterange input-group" id="datepicker-range">
                                                            <input id="dateRangeStart" type="text" class="input-sm form-control dateRangeStart" name="start" dataName="transactionDate" dataType="dateRange">
                                                            <div class="input-group-addon">
                                                                <?php echo $translations['A00139'][$language]; /* to */?>
                                                            </div>
                                                            <input id="dateRangeEnd" type="text" class="input-sm form-control dateRangeEnd" name="end" dataName="transactionDate" dataType="dateRange">
                                                        </div>
                                                    </div>
                                                </div>
                                                <button id="addBox" class="btn-primary waves-effect w-md waves-light m-b-20">+</button>
                                                <div id="promoDetail" >
                                                    <div class="promoBox">
                                                        <div class="form-group">
                                                            <label for="">
                                                                <?php echo 'Min Stake'; /* Stake */ ?>
                                                            </label>
                                                            <input id="value" type="text" class="form-control value"  />
                                                            <span id="valueError" class="customError text-danger"></span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">
                                                                <?php echo 'Extra Percentage'; /* Extra Percentage */ ?>
                                                            </label>
                                                            <input id="multiplier" type="text" class="form-control multiplier"  />
                                                            <span id="multiplierError" class="customError text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="statusBox" style="display:none" class="form-group">
                                                    <label for="">
                                                        <?php echo 'Status'; /* status */ ?>
                                                    </label>
                                                        <select id="status" class="form-control" dataName="status" dataType="select">
                                                            <option value="Active">
                                                                 <?php echo 'Active'; /* KYC */ ?>
                                                            </option>
                                                            <option value="Inactive">
                                                                <?php echo 'Inactive'; /* CZO Rate */ ?>
                                                            </option>
                                                            <option value="Deleted">
                                                                <?php echo 'Deleted'; /* Internal Transfer */ ?>
                                                            </option>
                                                        </select>
                                                    <span id="statusError" class="customError text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                    <!-- </form> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 m-b-20">
                            <!-- <button type="submit" class="btn btn-default waves-effect waves-light">Cancel</button> -->
                        <button id="add" type="submit" class="btn btn-primary waves-effect waves-light">
                            <?php echo $translations['A00123'][$language]; /* Confirm */ ?>
                        </button>
                    </div>
                </div>
                <!-- End row -->
                    
                </div> <!-- container -->

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
    // Initialize the arguments for ajaxSend function
    var url             = 'scripts/reqLeader.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
        
    var fCallback;
    $(document).ready(function() {
        var name = '<?php echo $_POST['name']; ?>';
        var searchData = [{dataName:"name",dataValue:name}];
        if(name){
            var formData = {
                command        : "getLeaderPromoList",
                searchData     : searchData,
            };
            fCallback = loadDefaultData;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        } 

        $('#add').click(function() {
            var promoData = [];

            $('.promoBox').each(function(index, obj){
                promoData.push({ value : $(obj).find('.value').val() , multiplier : $(obj).find('.multiplier').val() , id : $(obj).find('.id').val()});
            }); 
            var command = 'addLeaderPromo';
            if(name) command = 'updateLeaderPromo';
            var name = $('#promoName').val();
            var dateRangeStart = $('#dateRangeStart').val();
            var dateRangeEnd = $('#dateRangeEnd').val();

            var formData = {
                command  : command,
                name : name,
                startDate : dateRangeStart,
                endDate    : dateRangeEnd,
                promoData   : promoData
            };
            if(command == 'updateLeaderPromo'){
                var buyVolume = $('#buyVolume').val();
                var sellVolume = $('#sellVolume').val();
                var buyPercentage = $('#buyPercentage').val();
                var sellPercentage = $('#sellPercentage').val();
                var priceSettingStatus   = $('#priceSettingStatus').find('input[type=radio]:checked').val();
                var extraData = {
                                    name  : name,
                                    status : $('#status').val()
                                };
                $.extend( true, formData, extraData );
            } console.log(formData);
                var fCallback = sendNew;

                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            
        });
    });
    
    function loadDefaultData(data, message) {console.log(data);
        data = data.leaderPromoList;
        $('#promoName').val(data[0]['name']);
        $('#dateRangeStart').val(data[0]['startDate']);
        $('#dateRangeEnd').val(data[0]['endDate']);

        $('#promoName').attr('disabled', true);
        $('#dateRangeStart').attr('disabled', true);
        $('#dateRangeEnd').attr('disabled', true);
        $('#addBox').attr("style","display:none");
        $('#status').val(data[0]['status']);
        $('#statusBox').attr("style","display:block");
        $('#promoDetail').html('');
        $.each( data, function( key, value ) {
            var content = '<div class="promoBox"><div class="form-group"><div class="form-group"><label for=""><?php echo "Min Stake"; /* Stake */ ?></label><input id="value" type="text" class="form-control value" value="'+ value['minStake'] + '" /><span id="valueError" class="customError text-danger"></span></div><div class="form-group"><label for=""><?php echo "Extra Percentage"; /* Extra Percentage */ ?>
                            </label><input id="multiplier" type="text" class="form-control multiplier" value="' + value['multiplier'] + '" /><span id="multiplierError" class="customError text-danger"></span></div><input class="id" type="hidden" value="'+value['tableID']+'"></div>';

            $('#promoDetail').append(content);
        });
        // console.log(data);

    }
    
    function sendNew(data, message) {
        showMessage('<?php echo $translations['A01244'][$language]; /* Successful Add Setting. */ ?>', 'success', '<?php echo $translations['A01245'][$language]; /* Add Leader Setting */ ?>', 'user-plus', 'leaderPromoListing.php');
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

    $('#addBox').click(function(){
        var content = '<div class="promoBox"><div class="form-group"><div class="form-group"><label for=""><?php echo "Min Stake"; /* Stake */ ?></label><input id="value" type="text" class="form-control value"  /><span id="valueError" class="customError text-danger"></span></div><div class="form-group"><label for=""><?php echo "Extra Percentage"; /* Extra Percentage */ ?>
                            </label><input id="multiplier" type="text" class="form-control multiplier"  /><span id="multiplierError" class="customError text-danger"></span></div></div>';

        $('#promoDetail').append(content);
    });
</script>
</body>
</html>
