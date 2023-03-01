<?php 
    session_start();

    // Get current page name
    $thisPage = basename($_SERVER['PHP_SELF']);

    // Check the session for this page
    if(!isset ($_SESSION['access'][$thisPage]))
        echo '<script>window.location.href="accessDenied.php";</script>';
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
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default bx-shadow-none">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapse">
                                                <?php echo $translations['A01258'][$language]; /* Purchase */ ?> PC
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-sm-6 form-group">
                                                    <label class="control-label">
                                                        <?php echo $translations['A00102'][$language]; /* Username */ ?>
                                                    </label>
                                                    <input type="text" class="form-control" id="username">
                                                    <span id="usernameError" class="customError text-danger"></span>
                                                </div>

                                                <div class="col-sm-12 m-t-rem1">
                                                    <button id="searchUsername" class="btn btn-primary waves-effect waves-light">
                                                        <?php echo $translations['A01343'][$language]; /* Username */ ?>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row" id="purchaseBlock" style="display: none;">
                        <div class="col-lg-12">
                            <div class="card-box p-b-0">
                                <form>
                                    <div id="basicwizard" class="pull-in">
                                        <div class="tab-content b-0 m-b-0 p-t-0">
                                           <div class="row m-t-15">
                                                <label class="control-label col-md-3"><?php echo $translations['A01343'][$language]; /* Username */ ?></label>
                                                <label id="usernameDisplay" class="control-label col-md-5"></label>
                                            </div>
                                            <div class="row m-t-15">
                                                <label class="control-label col-md-3"><?php echo $translations['A00148'][$language]; /* Member ID */ ?></label>
                                                <label id="memberIdDisplay" class="control-label col-md-5"></label>
                                            </div>
                                            <div class="row m-t-15">
                                                <label class="control-label col-md-3"><?php echo $translations['M01651'][$language]; /* Sponsor Username */ ?></label>
                                                <label id="sponsorUsername" class="control-label col-md-5"></label>
                                            </div> 
                                            <div class="row m-t-15">
                                                <label class="control-label col-md-3"><?php echo $translations['A00207'][$language]; /* Balance */ ?></label>
                                                <label id="balance" class="control-label col-md-5"></label>
                                            </div> 
                                            <div class="row m-t-15">
                                                <label class="control-label col-md-3"><?php echo $translations['A00267'][$language]; /* Credit Type */ ?></label>
                                                <div class="col-md-4">
                                                    <select id="selectCreditType" class="form-control" onchange="showBalance()"></select>
                                                </div>
                                            </div> 
                                            <div class="row m-t-15">
                                                <label class="control-label col-md-3"><?php echo $translations['A01344'][$language]; /* Purchase Amount */ ?></label>
                                                <div class="col-md-4">
                                                    <input type="number" class="form-control" id="purchaseAmount" onkeyup="calcAmount()" min="0" step="" />
                                                </div>
                                                <label class="control-label col-md-3">Credit(s)</label>
                                                <div class="col-md-9 col-md-offset-3">
                                                    <span id="adjustmentAmountError" class="customError text-danger" error="error"></span>
                                                </div>
                                            </div> 
                                            <div class="row m-t-15">
                                                <label class="control-label col-md-3"><?php echo $translations['M01578'][$language]; /* Live Rate */ ?></label>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" id="liveRate" disabled />
                                                </div>
                                            </div> 
                                            <div class="row m-t-15">
                                                <label class="control-label col-md-3"><?php echo $translations['M01076'][$language]; /* Receivable Amount */ ?></label>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" id="receivableAmount" disabled />
                                                </div>
                                            </div> 
                                            <div class="row m-t-15">
                                                <label class="control-label col-md-3"><?php echo $translations['M01360'][$language]; /* Remarks */ ?></label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" id="remarks" />
                                                    <span id="remarkError" class="customError text-danger" error="error"></span>
                                                </div>
                                            </div>
                                             <div class="row m-t-30">
                                                <div class="col-md-12">
                                                    <button type="button" id="submitPurchase" class="btn btn-primary waves-effect waves-light" onclick="submitVerify()">
                                                        <?php echo $translations['A00323'][$language]; /* Submit */ ?>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!-- End row -->

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

<div class="modal stick-up" id="confirmationFundIn" tabindex="-1" role="dialog" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content-wrapper">
            <div class="modal-content">
                <div class="modal-header clearfix text-left">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="pg-close fs-14"></i>
                    </button>
                    <h3>
                       <?php echo $translations['A01345'][$language]; /* Fund In Confirmation */ ?>
                   </h3>
               </div>
               <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table mb-none table-borderless">
                                <tr>
                                    <td><?php echo $translations['A00102'][$language]; /* Username */ ?></td>
                                    <td id="pUsername"></td>
                                </tr>
                                <tr>
                                    <td><?php echo $translations['A00148'][$language]; /* Member ID */ ?></td>
                                    <td id="pMemberId"></td>
                                </tr>
                                <tr>
                                    <td><?php echo $translations['M01651'][$language]; /* Sponsor Username */ ?></td>
                                    <td id="pSponsorName"></td>
                                </tr>
                                <tr>
                                    <td><?php echo $translations['A00207'][$language]; /* Balance */ ?></td>
                                    <td id="pBalance"></td>
                                </tr>
                                <tr>
                                    <td><?php echo $translations['A00267'][$language]; /* Credit Type */ ?></td>
                                    <td id="pCreditType"></td>
                                </tr>
                                <tr>
                                    <td><?php echo $translations['A01344'][$language]; /* Purchase Amount */ ?></td>
                                    <td id="pPurchaseAmount"></td>
                                </tr>
                                <tr>
                                    <td><?php echo $translations['M01578'][$language]; /* Live Rate */ ?></td>
                                    <td id="pLiveRate"></td>
                                </tr>
                                <tr>
                                    <td><?php echo $translations['M01696'][$language]; /* Live Rate */ ?></td>
                                    <td id="pReceivableAmount"></td>
                                </tr>
                                <tr>
                                    <td><?php echo $translations['M01360'][$language]; /* Remarks */ ?></td>
                                    <td id="pRemarks"></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="confirmButton" type="button" class="btn btn-primary waves-effect waves-light" data-dismiss="modal" data-toggle="modal" data-backdrop="static" data-keyboard="false" onclick="submitConfirmation()">
                        <span>
                            <?php echo $translations['A00123'][$language]; /* Confirm */ ?>
                        </span>
                    </button>
                    <button type="button" class="btn btn-default btn-cons no-margin inline" data-dismiss="modal">
                        <?php echo $translations['A00660'][$language]; /* Cancel */ ?>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

    <script>
        var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <?php include("shareJs.php"); ?>

<script>
    // Initialize all the id in this page
    // Initialize the arguments for ajaxSend function
    var url             = 'scripts/reqAdmin.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";  
    var credit = [];
    var liveRate = [];

    $(document).ready(function() {

        $("#searchUsername").click(function(){
            var username = $("#username").val();
            fCallback = loadSearchUser;
            formData  = {
                command: 'adminFundInSearchMember',
                username: username
            };

            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });

    });

    var purchaseAmount = document.getElementById('purchaseAmount');

    // Listen for input event on numInput.
    purchaseAmount.onkeydown = function(e) {
        if(!(e.keyCode == 190 || (e.keyCode > 95 && e.keyCode < 106)
          || (e.keyCode > 47 && e.keyCode < 58) 
          || e.keyCode == 8)) {
            return false;
        }
    }

    function submitVerify() {

        var clientID = $("#memberIdDisplay").text();
        var creditType = $("#selectCreditType").val();
        var adjustmentAmount = $("#purchaseAmount").val();
        var remark = $("#remarks").val();
        
        fCallback = loadAdjustVerify;
        formData  = {
            command: 'adminAdjustFundIn',
            clientID: clientID,
            creditType: creditType,
            adjustmentAmount: adjustmentAmount,
            remark: remark
        };

        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function submitConfirmation() {

        var clientID = $("#memberIdDisplay").text();
        var creditType = $("#selectCreditType").val();
        var adjustmentAmount = $("#purchaseAmount").val();
        var remark = $("#remarks").val();
        
        fCallback = loadAdjustConfirmation;
        formData  = {
            command: 'adminAdjustFundIn',
            clientID: clientID,
            creditType: creditType,
            adjustmentAmount: adjustmentAmount,
            remark: remark,
            step: 1
        };

        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadAdjustConfirmation(data, message) {
        showMessage(message, 'success', 'Congratulation', 'check', 'adminFundIn.php');
    }

    function loadAdjustVerify(data, message) {

        $("#pUsername").text($("#usernameDisplay").text());
        $("#pMemberId").text($("#memberIdDisplay").text());
        $("#pSponsorName").text($("#sponsorUsername").text());
        $("#pBalance").text($("#balance").text());
        $("#pCreditType").text($("#selectCreditType").val());
        $("#pPurchaseAmount").text($("#purchaseAmount").val());
        $("#pRemarks").text($("#remarks").val());
        $("#pLiveRate").text($("#liveRate").val());
        $("#pReceivableAmount").text($("#receivableAmount").val());

        $("#confirmationFundIn").modal();
    }
    
    function loadSearchUser(data, message) {
        console.log(data);
        $("#purchaseBlock").fadeIn('fast');

        var client = data.clientDetail[0];
        var optionHtml = "";
        credit = data.balance;
        liveRate = data.liveRate;

        $.each(data.availableCredit, function(i, obj){
            optionHtml+=`<option value="${i}">${obj}</option>`;
        });

        $("#usernameDisplay").text(client.username);
        $("#memberIdDisplay").text(client.id);
        $("#sponsorUsername").text(data.sponsorUsername);
        $("#selectCreditType").html(optionHtml);
        $("#balance").text(credit[$("#selectCreditType").val()] + " credit(s)");
        $("#liveRate").val(liveRate[$("#selectCreditType").val()]);
    }

    function showBalance() {
        var creditType = $("#selectCreditType").val();
        $("#balance").text(credit[creditType]);
        $("#liveRate").val(liveRate[creditType]);
    }

    function calcAmount() {
        var liveRate = parseFloat($("#liveRate").val());
        var purchaseAmount = parseFloat($("#purchaseAmount").val());

        $("#receivableAmount").val((liveRate*purchaseAmount) || 0);
    }
   
</script>
</body>
</html>
