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
                    <div class="col-sm-4">
                         <a href="leaderSettingListing.php" class="btn btn-primary btn-md waves-effect waves-light m-b-20">
                            <i class="md md-add"></i>
                            <?php echo $translations['A00115'][$language]; /* Back */ ?>
                        </a>
                    </div><!-- end col -->
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box p-b-0">
                            <!-- <h4 class="header-title m-t-0 m-b-30">
                                <?php echo $translations['A00116'][$language]; /* User Profile */ ?>
                            </h4> -->
                            <div class="row">
                                <div class="col-md-6">
                                    <form role="form" id="newAdmin" data-parsley-validate novalidate>
                                        <div id="basicwizard" class=" pull-in">
                                            <div class="tab-content b-0 m-b-0 p-t-0">
                                                <div class="form-group">
                                                    <label for="">
                                                        <?php echo $translations['A00102'][$language]; /* Username */ ?>
                                                    </label>
                                                    <input id="username" type="text" class="form-control"  required/>
                                                    <span id="usernameError" class="customError text-danger"></span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">
                                                        <?php echo $translations['A00301'][$language]; /* Type */ ?>
                                                    </label>
                                                    <select id="type" class="form-control" dataName="type" dataType="select" required>
                                                        <option value="">
                                                            <?php echo $translations['A01250'][$language]; /* Please Select */ ?>
                                                        </option>
                                                        <option value="mustKYC">
                                                            <?php echo $translations['A01251'][$language]; /* KYC */ ?>
                                                        </option>
                                                        <option value="czoRate">
                                                            <?php echo $translations['A01252'][$language]; /* CZO Rate */ ?>
                                                        </option>
                                                        <option value="internalTransfer">
                                                            <?php echo $translations['A01253'][$language]; /* Internal Transafer */ ?>
                                                        </option>
                                                        <option value="restrictSwapCoin">
                                                            <?php echo $translations['A01254'][$language]; /* Restrict Swap Coin */ ?>
                                                        </option>
                                                        <option value="promo">
                                                            <?php echo 'Promo'; /* Restrict Swap Coin */ ?>
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">
                                                        <?php echo 'Group Type'; /* Group Type */ ?>
                                                    </label>
                                                    <select  id="groupType" class="form-control" dataName="groupType" dataType="select" required>
                                                        <option value="">
                                                            <?php echo $translations['A01250'][$language]; /* Please Select */ ?>
                                                        </option>
                                                        <option value="leader">
                                                            <?php echo $translations['A01248'][$language]; /* Leader */ ?>
                                                        </option>
                                                        <option id="individual" value="individual">
                                                            <?php echo $translations['A01249'][$language]; /* Individual */ ?>
                                                        </option>
                                                    </select>
                                                </div>
                                                <div id="promoBox" class="form-group" style="display:none">
                                                    <label for="">
                                                        <?php echo 'Promo'; /* Value */ ?>
                                                    </label>
                                                    <select id="promo" class="form-control" dataName="promo" dataType="select">
                                                        <option value="">
                                                            <?php echo $translations['A01250'][$language]; /* Please Select */ ?>
                                                        </option>
                                                    </select>
                                                    <span id="promoError" class="customError text-danger"></span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="" id="changeValue">
                                                        <?php echo 'CZO Rate'; /* Value */ ?>
                                                    </label>
                                                    <input id="value" type="text" class="form-control" />
                                                    <span id="valueError" class="customError text-danger"></span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">
                                                        <?php echo 'Enable Setting'; /* Disabled */ ?>
                                                    </label>
                                                    <div id="status" class="m-b-20">
                                                        <div class="radio radio-info radio-inline">
                                                            <input type="radio" id="inlineRadio1" value="0" name="radioInline" checked="checked"/>
                                                            <label for="inlineRadio1">
                                                                <?php echo $translations['A01198'][$language];; /* On */ ?>
                                                            </label>
                                                        </div>
                                                        <div class="radio radio-inline">
                                                            <input type="radio" id="inlineRadio2" value="1" name="radioInline" />
                                                            <label for="inlineRadio2">
                                                                <?php echo $translations['A01199'][$language];; /* Off */ ?>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="czoPrice" style="display:none">
                                                    <h4 class="header-title m-t-0 m-b-30"><?php echo $translations['A01227'][$language]; /*Buy Volume*/ ?></h4>
                                                    <div class="form-group">
                                                        <label for="">
                                                            <?php echo $translations['A01229'][$language]; /*Buy Volume*/ ?>
                                                        </label>
                                                        <input id="buyVolume" type="text" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"/>
                                                        <span id="buyVolumeError" class="customError text-danger"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">
                                                            <?php echo $translations['A01230'][$language]; /*Sell Volume*/ ?>
                                                        </label>
                                                        <input id="sellVolume" type="text" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
                                                        <span id="sellVolumeError" class="customError text-danger"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">
                                                            <?php echo $translations['A01231'][$language]; /*Buy Percentage*/ ?>
                                                        </label>
                                                        <input id="buyPercentage" type="text" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"/>
                                                        <span id="buyPercentageError" class="customError text-danger"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">
                                                            <?php echo $translations['A01232'][$language]; /*Sell Percentage*/ ?>
                                                        </label>
                                                        <input id="sellPercentage" type="text" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"/>
                                                        <span id="sellPercentageError" class="customError text-danger"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00318'][$language]; /* Status */ ?>
                                                        </label>
                                                        <div id="priceSettingStatus" class="m-b-20">
                                                            <div class="radio radio-info radio-inline">
                                                                <input type="radio" id="statusRadio1" value="0" name="radioInline2" checked="checked"/>
                                                                <label for="statusRadio1">
                                                                    <?php echo $translations['A01198'][$language]; /* On */ ?>
                                                                </label>
                                                            </div>
                                                            <div class="radio radio-inline">
                                                                <input type="radio" id="statusRadio2" value="1" name="radioInline2" />
                                                                <label for="statusRadio2">
                                                                    <?php echo $translations['A01199'][$language]; /* Off */ ?>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 
                                            </div>
                                        </div>
                                    </form>
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
        var id = '<?php echo $_POST['id']; ?>';
        if(id){
            var formData = {
                command        : "getLeaderSetting",
                id : id,
            };
            fCallback = loadDefaultData;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        } 
        var inputData = [{dataName : 'status' , dataValue : 'Active'}];
        var formData  = {
                command   : "getLeaderPromoList",
                inputData : inputData,
                groupData : "yes",
        };
        var fCallback = promoDetails;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $('#type').on('change', function() {
            if(this.value == "mustKYC" || this.value == "internalTransfer" || this.value == "restrictSwapCoin" || this.value == "promo"){
                $('#value').val(''); 
                $('#value').attr('disabled', true); 
                $('#value').removeAttr('required', true); 
            }else{
                $('#value').removeAttr('disabled', true); 
                $('#value').attr('required', true); 
            }
            if(this.value != "mustKYC"){
                $('#groupType').val('');
                $('#individual').attr('style', "display:none");
            }else{
                $('#individual').attr('style', "display:block");
            }
            if(this.value == "czoRate"){
                // $('#groupType').val('leader');
                $('#czoPrice').attr('style', "display:block");
                $('#buyVolume').attr('required', true);
                $('#sellVolume').attr('required', true);
                $('#sellPercentage').attr('required', true);
                $('#buyPercentage').attr('required', true);
            }else{
                $('#czoPrice').attr('style', "display:none");
                $('#buyVolume').removeAttr('required', true);
                $('#sellVolume').removeAttr('required', true);
                $('#sellPercentage').removeAttr('required', true);
                $('#buyPercentage').removeAttr('required', true);
            }

            if(this.value == "promo"){
                $('#promoBox').attr('style', "display:block");
                $('#promo').attr('required', true);
            }else{
                $('#promoBox').attr('style', "display:none");
                $('#promo').removeAttr('required', true);
            }
        });



        $('#add').click(function() {
            var validate = $('#newAdmin').parsley().validate();
            if(validate) {
                showCanvas();
                var username = $('#username').val();
                var value = $('#value').val();
                var groupType = $('#groupType').val();
                var type    = $('#type').val();
                var status   = $('#status').find('input[type=radio]:checked').val();

                var command = 'setLeaderSetting';
                if(id){
                    command = 'updateLeaderSetting';
                }
                if(type == "promo"){
                    if($('#promo').val() != ""){
                        value = $('#promo').val();
                    }
                } 
                var formData = {
                    command  : command,
                    leaderUsername : username,
                    type : type,
                    groupType    : groupType,
                    disable   : status,
                    value   : value,
                    id : id
                };
                if(type == "czoRate"){
                    var buyVolume = $('#buyVolume').val();
                    var sellVolume = $('#sellVolume').val();
                    var buyPercentage = $('#buyPercentage').val();
                    var sellPercentage = $('#sellPercentage').val();
                    var priceSettingStatus   = $('#priceSettingStatus').find('input[type=radio]:checked').val();
                    var extraData = {
                        buyVolume  : buyVolume,
                        sellVolume : sellVolume,
                        buyPercentage : buyPercentage,
                        sellPercentage    : sellPercentage,
                        priceSettingStatus : priceSettingStatus    
                    };
                    $.extend( true, formData, extraData );
                }   
                var fCallback = sendNew;

                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }
        });
    });
    
    function loadDefaultData(data, message) {
        data = data.defaultData;

        $('#username').val(data['username']);
        $('#username').attr('disabled', true); 
        $('#value').val(data['value']);
        $('#type').val(data['type']);
        $('#type').attr('disabled', true);
        if(data['type'] == "mustKYC" || data['type'] == "internalTransfer"){
            $('#value').attr('disabled', true);
        } 
        if(data['type'] == "czoRate"){
            $('#czoPrice').attr('style', "display:block");
            $('#buyVolume').attr('required', true);
            $('#sellVolume').attr('required', true);
            $('#sellPercentage').attr('required', true);
            $('#buyPercentage').attr('required', true);
            $('#czoPrice').attr('style', "display:block");
            $('#buyVolume').attr('required', true);
            $('#sellVolume').attr('required', true);
            $('#sellPercentage').attr('required', true);
            $('#buyPercentage').attr('required', true);
            $('#individual').attr('style', "display:none");

            $('#buyVolume').val(data['trendBuyVolume']);
            $('#sellVolume').val(data['trendSellVolume']); 
            $('#buyPercentage').val(data['trendBuyPercent']);
            $('#sellPercentage').val(data['trendSellPercent']);
            if(data['status'] == 1)
                $("#statusRadio2").prop('checked', true);
            else
                $("#statusRadio1").prop('checked', true);
        }

        if(data['type'] == "promo"){
            $('#changeValue').html('');
            $('#changeValue').html('Current Promo');
            $('#value').attr('disabled', true);
            $('#promoBox').attr('style', "display:block");
            $('#promo').val(data['value']);
        }

        $('#groupType').val(data['group_type']);

        if(data['disabled'] == 1)
            $("#inlineRadio1").prop('checked', true);
        else
            $("#inlineRadio2").prop('checked', true);
    }

    function promoDetails (data, message) {
        // console.log(data);
        var promoList = data.leaderPromoList;

        if(promoList) {
            $.each(promoList, function(key) {
              $('#promo').append('<option value="'+promoList[key]['name']+'" name="'+promoList[key]['name']+'">'+promoList[key]['name']+'</option>');
            });
        }
    }

    function sendNew(data, message) {
        showMessage('<?php echo $translations['A01244'][$language]; /* Successful Add Setting. */ ?>', 'success', '<?php echo $translations['A01245'][$language]; /* Add Leader Setting */ ?>', 'user-plus', 'leaderSettingListing.php');
    }
</script>
</body>
</html>
