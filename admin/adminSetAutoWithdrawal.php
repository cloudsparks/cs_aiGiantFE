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
                <div class="container">
                    <!-- Back button -->
                    <div class="row">
                        <div class="col-sm-4">
                            <div id="backBtn" class="btn btn-primary waves-effect waves-light m-b-20">
                                <?php echo $translations['A00115'][$language]; /* Back */?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-box p-b-0">
                                <!-- <h4 class="header-title m-t-0 m-b-30">Add Pop Up Memo</h4> -->
                                <div class="row">
                                        <form role="form" enctype="multipart/form-data">
                                            <div id="basicwizard" class=" pull-in">
                                                <div class="tab-content b-0 m-b-0 p-t-0">
                                                    <div class="form-group row mx-0">
                                                        <div class="col-md-10">
                                                            <label class="control-label" id='withdrawTypeLabel'><span class="text-danger"> <?php echo $translations['A01445'][$language] ; ?> : <?php echo $_POST["withdrawType"] ; ?> ( <?php echo $_POST["info"]; ?> )</span></label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mx-0">
                                                        <div class="col-md-5">
                                                            <label class="control-label" id='currentStatus'></label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mx-0">
                                                        <div class="col-md-5">
                                                            <label class="control-label"><?php echo $translations["A00318"][$language]; // Status?></label>
                                                            <select id="status" class="form-control" dataName="status" dataType="text">
                                                                <option value="1"><?php echo $translations["A01198"][$language];?></option>
                                                                <option value="0"><?php echo $translations["A01199"][$language];?></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mx-0">
                                                        <div class="col-md-5">
                                                            <label class="control-label"><?php echo $translations["A01438"][$language]; // Withdrawal Type?></label>
                                                            <select id="withdrawalType" class="form-control" dataName="withdrawalType" dataType="text" onchange="displayForm(this.value)">
                                                                <option value="">Select Default Auto Withdrawal</option>
                                                                <option value="crypto"><?php echo $translations["A01440"][$language]; // Crypto?></option>
                                                                <option value="bank"><?php echo $translations["A00606"][$language]; //Bank?></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div id='cryptoForm'>
                                                        <div class="form-group row mx-0">
                                                            <div class="col-md-5">
                                                                <label>
                                                                    <?php echo $translations["A01439"][$language]; /* Crypto Type */?>
                                                                </label>
                                                                <select id="creditType" class="form-control" dataName="creditType" dataType="text" onchange="changeCreditType(this.value)">
                                                                </select>
                                                                <span id="creditTypeError" class="errorSpan text-danger"></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mx-0">
                                                            <div class="col-md-5">
                                                                <label>
                                                                    <?php echo $translations["A01185"][$language]; /* Wallet Address */?>
                                                                </label>
                                                                <input id="walletAddress" type="text" class="form-control" required/>
                                                                <span id="walletAddressError" class="errorSpan text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id='bankForm' style="display:none">
                                                        <div class="form-group row mx-0">
                                                            <div class="col-md-5">
                                                                <label>
                                                                    <?php echo $translations["A00606"][$language]; /* Bank */?><span class="text-danger">*</span>
                                                                </label>
                                                                <select id="bankSelect" class="form-control" dataName="bankSelect" dataType="text" onchange="changeBank(this.value)">
                                                                </select>
                                                                <span id="bankTypeError" class="errorSpan text-danger"></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mx-0">
                                                            <div class="col-md-5">
                                                                <label>
                                                                    <?php echo $translations["A00608"][$language]; /* "Account holder name" */?><span class="text-danger">*</span>
                                                                </label>
                                                                <input id="accountHolderName" type="text" class="form-control" required/>
                                                                <span id="accHolderNameError" class="errorSpan text-danger"></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mx-0">
                                                            <div class="col-md-5">
                                                                <label>
                                                                    <?php echo $translations["A00609"][$language]; /* Account No */?><span class="text-danger">*</span>
                                                                </label>
                                                                <input id="accountNo" type="text" class="form-control" required/>
                                                                <span id="accountNoError" class="errorSpan text-danger"></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mx-0">
                                                            <div class="col-md-5">
                                                                <label>
                                                                    <?php echo $translations["A00598"][$language]; /* Province */?><span class="text-danger">*</span>
                                                                </label>
                                                                <input id="province" type="text" class="form-control" required/>
                                                                <span id="provinceError" class="errorSpan text-danger"></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mx-0">
                                                            <div class="col-md-5">
                                                                <label>
                                                                    <?php echo $translations["A00597"][$language]; /* Branch */?><span class="text-danger">*</span>
                                                                </label>
                                                                <input id="branch" type="text" class="form-control" required/>
                                                                <span id="branchError" class="errorSpan text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="submitBtn" class="btn btn-primary waves-effect waves-light">
                                                        <?php echo $translations['A00323'][$language]; /* Submit */?>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End row -->
                </div><!-- container -->
            </div><!-- content -->
            <?php include("footer.php"); ?>
        </div><!-- End content-page -->
        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->
    </div>
    <!-- END wrapper -->

<div class="modal fade" id="showImage" role="dialog">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">
                </h4>
            </div>
            <div class="modal-body">
                <img id="modalImg" width="100%" src="">
                <video id="modalVideo" width="400" controls>
                  <source src="" type="">
                </video>
            </div>
            <div class="modal-footer">
                <button id="canvasCloseBtn" type="button" class="btn btn-primary waves-effect waves-light" data-dismiss="modal"><?php echo $translations['A00742'][$language]; /* Close */ ?></button>
            </div>
        </div>
    </div>
</div>



    <!-- jQuery  -->
    <script>var resizefunc = [];</script>
    <?php include("shareJs.php"); ?>

    <script>
        // Initialize the arguments for ajaxSend function
        var url             = 'scripts/reqClient.php';
        var method          = 'POST';
        var debug           = 0;
        var bypassBlocking  = 0;
        var bypassLoading   = 0;
        var language        = "<?php echo $language; ?>";
        var systemLang      = null;
        var selectedLang = [];
        var clientID        = "<?php echo $_POST['id']; ?>";
        var walletData      = [];
        var bankData        = [];


        $(document).ready(function() {
            $('#backBtn').click(function() {
                $.redirect('autoWithdrawalListing.php');
            });

            getBankDetail();
            getCryptoType();
            getAutoWithdrawalData();
            
            $('#submitBtn').click(function() {
                processButton("submitBtn","disabled","<?php echo $translations['A01420'][$language]; // Processing ?>");

                var withdrawalType = $('#withdrawalType').val();

                $('.errorSpan').empty();
                // var videoData = getVideoObj();
                var fCallback = submitCallback;
                if(withdrawalType == 'crypto'){
                    var formData  = {
                        command: 'adminSetAutoWithdrawal',
                        clientID: clientID,
                        withdrawalType : $('#withdrawalType').val(),
                        creditType : $('#creditType').val(),
                        walletAddress : $('#walletAddress').val(),
                        status : $('#status').val(),
                    };
                }else if(withdrawalType == 'bank'){
                    var formData  = {
                        command: 'adminSetAutoWithdrawal',
                        clientID: clientID,
                        withdrawalType : $('#withdrawalType').val(),
                        bankID : $('#bankSelect').val(),
                        accountHolderName : $('#accountHolderName').val(),
                        accountNo : $('#accountNo').val(),
                        province : $('#province').val(), 
                        branch : $('#branch').val(),
                        status : $('#status').val(),
                    };
                }

                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0,'submitBtn',"<?php echo $translations['A00323'][$language]; /* Submit */?>");

            });
        });

        function getAutoWithdrawalData(){
            var fCallback = autoWithdrawaCallback;
            var formData  = {
                command: 'getAutoWithdrawalData',
                clientID: clientID,
            };

            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0,'submitBtn',"<?php echo $translations['A00323'][$language]; /* Submit */?>");
        }

        function displayForm(value){
            if(value == 'bank'){

                $('#bankForm').show();
                $('#cryptoForm').hide();

                changeBank($('#bankSelect').val());

            }else if(value == 'crypto'){

                $('#bankForm').hide();
                $('#cryptoForm').show();

            }else{
                $('#bankForm').hide();
                $('#cryptoForm').hide();
            }
        }

        function getCryptoType(){
            var fCallback = buildCreditType;
            var formData  = {
                command: 'getAvailableCreditWalletAddress',
            };

            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0,'submitBtn',"<?php echo $translations['A00323'][$language]; /* Submit */?>");
        }

        function getBankDetail(){
            var fCallback = buildBankDetail;
            var formData  = {
                command: 'getAllBankAccountDetail',
                clientID: clientID,
            };

            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0,'submitBtn',"<?php echo $translations['A00323'][$language]; /* Submit */?>");
        }

        function buildCreditType (data, message){
            // var html = `<option value=""><?php echo $translations['A00055'][$language]; /* All */ ?></option>`;
            var html = "";

            $.each(data.creditList, function(i, obj) {
                html+=`<option value="${obj.value}">${obj.display}</option>`;
            });
            $("#creditType").html(html);
        }

        function buildBankDetail (data, message){

            var html = "";

            if(data.bankDetails){
                $.each(data.bankDetails, function(i, obj) {
                    html+=`<option value="${obj.id}">${obj.display}</option>`;
                });
            }

            $("#bankSelect").html(html);
        }

        function autoWithdrawaCallback (data, message){
            console.log(data);

            $('#bankForm').hide();
            $('#cryptoForm').hide();

            if(data.withdrawalSetting){

                $('#currentStatus').empty().append("<span class='text-danger'> <?php echo $translations["A01446"][$language]; ?> : "+data.withdrawalSetting.onOffSetting+"</span>");

                $('#status').find('option[value="'+data.withdrawalSetting.onOffValue+'"]').attr('selected', 'selected');

                $('#withdrawTypeLabel').empty().append("<span class='text-danger'> <?php echo $translations['A01445'][$language] ; ?> : "+data.withdrawalSetting.withdrawalTypeDisplay+" ( "+data.withdrawalSetting.withdrawalInfo+" )</span>");

                var settingType = data.withdrawalSetting.withdrawalType;
                var infoId = data.withdrawalSetting.settingReference;

            }

            if(data.walletData.length >0){

                if(settingType == 'crypto'){
                    $('#withdrawalType').val('crypto');
                }
                displayForm(settingType);

                $.each(data.walletData, function(i, obj) {

                    walletData[obj.credit_type] = obj.info;

                    $('#creditType').find('option[value="'+obj.credit_type+'"]').attr('selected', 'selected');
                    $('#walletAddress').val(obj.info);
                });
                
            }

            if(data.bankData.length  >0){
                if(settingType == 'bank'){
                    $('#withdrawalType').val('bank');
                }
                displayForm(settingType);

                
                $.each(data.bankData, function(i, obj) {
                    bankData[obj.bank_id] = {};
                    bankData[obj.bank_id]['bank_id'] = obj.bank_id;
                    bankData[obj.bank_id]['account_no'] = obj.account_no;
                    bankData[obj.bank_id]['account_holder'] = obj.account_holder;
                    bankData[obj.bank_id]['province'] = obj.province;
                    bankData[obj.bank_id]['branch'] = obj.branch;

                    if(infoId){
                        if(infoId == obj.bank_id){
                            $('#bankSelect').find('option[value="'+obj.bank_id+'"]').attr('selected', 'selected');
                            $('#accountHolderName').val(obj.account_holder);
                            $('#accountNo').val(obj.account_no);
                            $('#province').val(obj.province);
                            $('#branch').val(obj.branch);
                        }

                    }else{
                        $('#bankSelect').find('option[value="'+obj.bank_id+'"]').attr('selected', 'selected');
                        $('#accountHolderName').val(obj.account_holder);
                        $('#accountNo').val(obj.account_no);
                        $('#province').val(obj.province);
                        $('#branch').val(obj.branch);
                    }

                    
                });
            }
        }

        function changeBank(value){
            var bankDetails = bankData[value];

            if(bankDetails){
                $('#accountHolderName').val(bankDetails.account_holder);
                $('#accountNo').val(bankDetails.account_no);
                $('#province').val(bankDetails.province);
                $('#branch').val(bankDetails.branch);
            }else{
                $('#accountHolderName').val('');
                $('#accountNo').val('');
                $('#province').val('');
                $('#branch').val('');
            }
            
        }

        function changeCreditType(value){
            var walletDetail = walletData[value];

            if(walletDetail){
                $('#walletAddress').val(walletDetail);
            }else{
                $('#walletAddress').val('');
            }
            
        }

        function processButton(buttonID,status,buttonText) {
            $("#"+buttonID).attr('disabled',status);
            $("#"+buttonID).text(buttonText);
        }

        function submitCallback(data, message) {
            showMessage('<?php echo $translations["M00598"][$language]; /* Successful add bank account */ ?>.', 'success', '<?php echo $translations["M00599"][$language]; /* Add New Bank Account */ ?>', '','autoWithdrawalListing.php');
        }

    </script>
</body>
</html>
