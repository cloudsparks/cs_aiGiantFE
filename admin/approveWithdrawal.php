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
<div id="wrapper">
    <?php include("topbar.php"); ?>
    <?php include("sidebar.php"); ?>
    <div class="content-page">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box p-b-0">
                            <div class="row">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab">
                                            <?php echo $translations['A01035'][$language]; /*Approve Withdrawal*/ ?>
                                        </a></li>
                                </ul>
                                <div class="tab-content m-b-30">
                                    <div class="col-md-12 m-b-20">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <form role="form" id="approveWithdrawal" data-parsley-validate novalidate>
                                                <div id="basicwizard" class=" pull-in">
                                                    <div class="tab-content b-0 m-b-0 p-t-0">
                                                        <div class="form-group">
                                                            <label>
                                                                <?php echo $translations['A01014'][$language]; /*client name*/ ?>  :
                                                            </label>
                                                            <span id="name"></span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>
                                                                <?php echo $translations['A00267'][$language]; /* Credit Type */ ?> :
                                                            </label>
                                                            <span id="creditType"></span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>
                                                                <?php echo $translations['A00821'][$language]; /* Amount */ ?> :
                                                            </label>
                                                            <span id="amount"></span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>
                                                                <?php echo $translations['A01040'][$language]; /* Charges */ ?> :
                                                            </label>
                                                            <span id="chargesDisplay"></span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>
                                                                <?php echo $translations['A01185'][$language]; /* Wallet Address */ ?> :
                                                            </label>
                                                            <span id="walletAddress"></span>
                                                        </div>
                                                        <!-- <div class="form-group">
                                                            <label>
                                                                <?php echo $translations['A00606'][$language]; /* Bank */ ?> :
                                                            </label>
                                                            <span id="bankName"></span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>
                                                                <?php echo $translations['A01036'][$language]; /* Branch */ ?> :
                                                            </label>
                                                            <span id="branch"></span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>
                                                                <?php echo $translations['A00609'][$language]; /* Account number */ ?> :
                                                            </label>
                                                            <span id="accountNumber"></span>
                                                        </div> -->
                                                        <div class="form-group">
                                                            <label>
                                                                <?php echo $translations['A01038'][$language]; /* Withdrawal Date */ ?> :
                                                            </label>
                                                            <span id="withdrawalDate"></span>
                                                        </div>
                                                        <div id="status" class="m-b-20">
                                                            <label class="control-label">
                                                                <?php echo $translations['A00318'][$language]; /* Status */ ?> :
                                                            </label>
                                                            <!-- <div class="radio radio-info">
                                                                <input type="radio" id="Pending" name="status" value="Pending" checked="checked"/>
                                                                <label>
                                                                    <?php echo $translations['A01017'][$language]; /*pending*/ ?>
                                                                </label>
                                                            </div> -->

                                                            <div class="radio radio-info">
                                                                <input type="radio" id="Pending" name="status" value="Pending"/>
                                                                <label for="Pending">
                                                                    Pending
                                                                </label>
                                                            </div>
                                                            <div class="radio radio-info">
                                                                <input type="radio" id="waitingApproval" name="status" value="Waiting Approval" />
                                                                <label for="waitingApproval">
                                                                    <?php echo $translations['A01019'][$language]; /*waiting approval*/ ?>
                                                                </label>
                                                            </div>
                                                            <div class="radio radio-info">
                                                                <input type="radio" id="Reject" name="status" value="Reject" />
                                                                <label for="Reject">
                                                                    <?php echo $translations['A01137'][$language]; /*Reject*/ ?>
                                                                </label>
                                                            </div>
                                                            <div class="radio radio-info">
                                                                <input type="radio" id="Approve" name="status" value="Approve"/>
                                                                <label for="Approve">
                                                                    <?php echo $translations['A01186'][$language]; /*Approve*/ ?>
                                                                </label>
                                                            </div>
                                                            <div class="radio radio-info">
                                                                <input type="radio" id="Cancel" name="status" value="Cancel"/>
                                                                <label for="Cancel">
                                                                    Cancel
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div id="chargesDiv" class="form-group" hidden="hidden">
                                                            <label>
                                                                <?php echo $translations['A01040'][$language]; /*Charges*/ ?>
                                                            </label>
                                                            <input id="charges" type="text" class="form-control"/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>
                                                                <?php echo $translations['A00571'][$language]; /*Remark*/ ?>
                                                            </label>
                                                            <input id="remark" type="text" class="form-control"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 m-b-20">
                            <button id="submit" type="submit" class="btn btn-primary waves-effect waves-light">
                                <?php echo $translations['A00123'][$language]; /*Confirm*/ ?>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <?php include("footer.php"); ?>
        </div>
    </div>
    <script>
        var resizefunc     = [];
    </script>
    <?php include("shareJs.php"); ?>
    <script>
        var url            = 'scripts/reqAdmin.php';
        var method         = 'POST';
        var debug          = 0;
        var bypassBlocking = 0;
        var bypassLoading  = 0;

        $(document).ready(function() {
            var withdrawalId    = "<?php echo $_POST['id']; ?>";
            var formData        = {
                command         : "getAdminClientWithdrawalDetail",
                withdrawalId    : withdrawalId
            };

            var fCallback  = loadMemberDetail;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);


            $('#name').text("<?php echo $_POST['clientName'] ?>");

            $('#status').on("change", function(){

                if ($('input[name=status]:checked').val() === "Complete"){
                    $('#chargesDiv').removeAttr("hidden");
                }
                else{
                    $('#chargesDiv').prop("hidden", "hidden");
                }

            });

            $('#submit').click(function() {
                var validate = $('#approveWithdrawal').parsley().validate();
                if(validate) {
                    var status              = $('input[name=status]:checked').val();
                    var charges             = parseFloat($('#charges').val());
                    var remark              = $('#remark').val();
                    var withdrawalId        = "<?php echo $_POST['id']; ?>";

                    // var formData = {
                    //     command       : "approveWithdrawal",
                    //     withdrawalId  : withdrawalId,
                    //     status        : status,
                    //     charges       : charges,
                    //     remark        : remark
                    // };
                    // console.log(formData);
                    // var fCallback = sendEdit;
                    // ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

                    var checkedIDs = [];
                    checkedIDs.push(withdrawalId);
                    
                    var formData   = {
                        command : 'updateWithdrawalStatus',
                        checkedIDs : checkedIDs,
                        status : status,
                        remark : remark
                    };
                    fCallback = sendEdit;
                    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
                }
            });
        });

        function loadMemberDetail(data, message) {
            console.log(data);
            $('#amount').text(data['amount']);
            // $('#bankName').text(data['bankName']);
            // $('#branch').text(data['branch']);
            // $('#accountNumber').text(data['accountNumber']);
            $("#chargesDisplay").text(data["charges"]);
            $('#walletAddress').text(data['walletAddress']);
            $('#creditType').text(data['creditType']);

            $('#withdrawalDate').text(data['withdrawalDate']);
            $('#remark').val(data['remark']);
            $('#charges').val(data['charges']);
            if(data['status'] == 'Waiting Approval'){
                $("input[name=status][id=waitingApproval]").prop("checked","checked");
            }else{
                $("input[name=status][value=" + data['status'] +"]").prop("checked","checked");
            }
            $("input[name=status]").trigger("change");

            if (data['status'] === "Complete") {
                $('#status').prop("hidden", "hidden");
                $('#remark').prop("disabled", "disabled");
                $('#charges').prop("disabled", "disabled");
                $('#submit').prop("disabled", "disabled");
            }
        }

        function sendEdit(data, message) {
            showMessage('Withdrawal request updated', 'success', 'Approve withdrawal', 'edit', 'withdrawalList.php');
        }
    </script>
    </body>
</html>
