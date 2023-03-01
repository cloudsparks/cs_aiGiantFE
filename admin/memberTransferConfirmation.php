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
                                <div class="row">
                                    <div class="col-md-12 m-b-20">
                                        <button id="backBtn" class="btn btn-primary waves-effect waves-light">
                                            <?php echo $translations['A00115'][$language]; /* back*/ ?>
                                        </button>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            <?php echo $translations['A00101'][$language]; /* Name */ ?>:
                                        </label>
                                        <span id="name"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            <?php echo $translations['A00102'][$language]; /*Username */ ?>:
                                        </label>
                                        <span id="username"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            <?php echo $translations['A00207'][$language]; /* balance */ ?>:
                                        </label>
                                        <span id="balance"></span>
                                    </div>
                                    <ul class="nav nav-tabs">
                                        <li id="memberDetailsTab" >
                                            <a data-toggle="tab">
                                                <?php echo $translations['A01063'][$language]; /* Transaction Details */ ?>
                                            </a>
                                        </li>
                                        <li id="adjustmentTab" >
                                            <a data-toggle="tab">
                                                <?php echo $translations['A01064'][$language]; /* Adjustment*/ ?>
                                            </a>
                                        </li>
                                        <li id="transferTab" class="active">
                                            <a data-toggle="tab">
                                                <?php echo $translations['A01065'][$language]; /* Transfer*/ ?>
                                            </a>
                                        </li>
                                        <li id="withdrawalTab" >
                                            <a data-toggle="tab">
                                                <?php echo $translations['A00888'][$language]; /*Withdrawal*/ ?>
                                            </a>
                                        </li>
                                    </ul>
                                    <div id="memberTransferForm" class="tab-content m-b-30">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div id="transferDiv">
                                                    <form role="form" id="editCoinMemberDetail" data-parsley-validate novalidate>
                                                        <div id="basicwizard" class=" pull-in">
                                                            <div class="tab-content b-0 m-b-0 p-t-0">
                                                                <div class="form-group">
                                                                    <label>
                                                                        <?php echo $translations['A01067'][$language]; /*Receiver Username*/ ?>
                                                                    </label>
                                                                    <input id="receiverUsername" type="text" class="form-control" readonly/>
                                                                    <span id="receiverUsernameError" class="customError text-danger"></span>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>
                                                                        <?php echo $translations['A01068'][$language]; /*Transfer Amount*/ ?>
                                                                    </label>
                                                                    <input id="transferAmount" type="text" step="0.01" class="form-control" readonly/>
                                                                    <span id="transferAmountError" class="customError text-danger"></span>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>
                                                                        <?php echo $translations['A00571'][$language]; /*Remark*/ ?>
                                                                    </label>
                                                                    <input id="remark" type="text" class="form-control" readonly/>
                                                                    <span id="remarkError" class="customError text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <div class="col-md-12">
                                                        <button id="confirmBtn" class="btn btn-primary waves-effect waves-light">
                                                            <?php echo $translations['A00123'][$language]; /*Confirm*/ ?>
                                                        </button>
                                                        <button id="editBtn" class="btn btn-default waves-effect waves-light">
                                                            <?php echo $translations['A00249'][$language]; /*Edit*/ ?>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
    var resizefunc     = [];
</script>

<!-- jQuery  -->
<?php include("shareJs.php"); ?>

<script>

        var url              = 'scripts/reqAdmin.php';
        var method           = 'POST';
        var debug            = 0;
        var bypassBlocking   = 0;
        var bypassLoading    = 0;
        var pageNumber       = 1;

        var creditType       = "<?php echo $_GET['type'];?>";
        var id               = "<?php echo $_POST['id']; ?>";
        var fullName         = "<?php echo $_POST['fullName']; ?>";
        var username         = "<?php echo $_POST['username']; ?>";
        var receiverUsername = "<?php echo $_POST['receiverUsername']; ?>";
        var transferAmount   = "<?php echo $_POST['transferAmount']; ?>";
        var remark           = "<?php echo $_POST['remark']; ?>";
        var decimalPlaces    = "<?php echo $_SESSION['decimalPlaces']; ?>";
        var creditName     = "<?php echo $_POST['creditName']; ?>";

        $(document).ready(function() {
            // if id or creditType empty will be return back memberDetailsList.php
            if((!id) || (!creditType)) {
                if(creditType) {
                    var message  = '<?php echo $translations['A01076'][$language]; /*Client does not exist*/ ?>';
                    showMessage(message, '', '<?php echo $translations['A00727'][$language]; /*Error*/ ?>', 'exclamation-triangle', 'memberDetailsList.php?type=' + creditType);
                    return;
                }

            var message  = '<?php echo $translations['A01076'][$language]; /*Client does not exist*/ ?>';
            showMessage(message, '', '<?php echo $translations['A00727'][$language]; /*Error*/ ?>', 'exclamation-triangle', 'memberDetailsList.php?type=tierValue');
            return;
            }

            //set data in form
            $('#name').text(fullName);
            $('#username').text(username);
            $('#receiverUsername').val(receiverUsername);
            $('#transferAmount').val(parseFloat(transferAmount).toFixed(decimalPlaces));
            $('#remark').val(remark);
            $('.page-title').empty().append(creditName + ' Credit Transfer Confirmation');

            var formData   = {
                command    : "getMemberBalanceAdmin",
                id         : id,
                creditType : creditType,

            };
            var fCallback  = loadMemberBalance;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

            $('#backBtn').click(function() {
                $.redirect('memberDetailsList.php?type=' + creditType, {
                                                        id                  : id,
                                                        fullName            : fullName,
                                                        username            : username,
                                                        creditName          : creditName
                                                        
                });
            });

            //member details list page
            $('#memberDetailsTab').click(function() {
                $.redirect('memberTransactionList.php?type=' + creditType, {
                                                        id                  : id,
                                                        fullName            : fullName,
                                                        username            : username,
                                                        creditName          : creditName
                });
            });

            //adjustment page
            $('#adjustmentTab').click(function() {
                $.redirect('memberAdjustment.php?type=' + creditType, {
                                                        id                  : id,
                                                        fullName            : fullName,
                                                        username            : username,
                                                        creditName          : creditName
                });
            });

            //withdrawal page
            $('#withdrawalTab').click(function() {
                $.redirect('memberWithdrawal.php?type=' + creditType, {
                                                        id                  : id,
                                                        fullName            : fullName,
                                                        username            : username,
                                                        creditName          : creditName
                });
            });

            $('#confirmBtn').click(function() {
                var validate = $('#editCoinMemberDetail').parsley().validate();
                if(validate) {
                        creditType          = creditType;
                        transferID          = id;
                    var receiverUsername    = $('#receiverUsername').val();
                    var transferAmount      = $('#transferAmount').val();
                    var remark              = $('#remark').val();

                    var formData = {
                        command             : "transferCreditConfirmationAdmin",
                        creditType          : creditType,
                        id                  : id,
                        receiverUsername    : receiverUsername,
                        transferAmount      : transferAmount,
                        remark              : remark
                    }
                    var fCallback = sendEdit;
                    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
                }
            });

            $('#editBtn').click(function() {
                $.redirect('memberTransfer.php?type=' + creditType, {
                                                    creditType          : creditType,
                                                    id                  : id,
                                                    fullName            : fullName,
                                                    username            : username,
                                                    receiverUsername    : receiverUsername,
                                                    transferAmount      : transferAmount,
                                                    remark              : remark,
                                                    creditName          : creditName                           
                });
            });

        });

        function loadMemberBalance(data, message) {
            $('#balance').text(data.balance);

            if(data.permissions) {
                if(data.permissions.isAdjustable == "0") {
                    $("li#adjustmentTab").remove();
                }
                // if(data.permissions.isAdminTransferable == "0") {
                //     $("li#transferTab").remove();
                //     $("#transferDiv").empty();
                // }
                // if(data.permissions.isAdminWithdrawable == "0") {
                //     $("li#withdrawalTab").remove();
                // }
                if(data.permissions.isTransferable == "0") {
                    $("li#transferTab").remove();
                    $("#transferDiv").empty();
                }
                if(data.permissions.isWithdrawable == "0") {
                    $("li#withdrawalTab").remove();
                }
            }
        }

        function sendEdit(data, message) {
            showMessage('<?php echo $translations['A01072'][$language]; /*Member details successfully updated.*/ ?>', 'success', '<?php echo $translations['A01074'][$language]; /*Credit Transfer*/ ?>', 'edit', ['memberTransfer.php?type=' + creditType, {creditType : creditType, id : id, fullName : fullName, username : username, creditName : creditName} ]);
        }

        
</script>
</body>
</html>
