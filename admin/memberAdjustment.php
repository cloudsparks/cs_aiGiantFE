<?php
session_start();

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
                    <div class="col-md-12 m-b-20">
                        <button id="backBtn" class="btn btn-primary waves-effect waves-light">
                            <?php echo $translations['A00115'][$language]; /* Back */?>
                        </button>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-box p-b-0">
                                <div class="row">
                                    <div class="form-group">
                                        <label>
                                            <?php echo $translations['A00101'][$language]; /* Name */?> :
                                        </label>
                                        <span id="name"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            <?php echo $translations['A00102'][$language]; /* Username */?> :
                                        </label>
                                        <span id="username"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            <?php echo $translations['A00207'][$language]; /* Balance */?> :
                                        </label>
                                        <span id="balance"></span>
                                    </div>
                                    <ul class="nav nav-tabs">
                                        <li id="memberDetailsTab" >
                                            <a data-toggle="tab">
                                                <span id="creditTransaction"></span> <?php echo $translations['A00885'][$language]; /* Transaction Details */?>
                                            </a>
                                        </li>
                                        <li id="adjustmentTab" class="active">
                                            <a data-toggle="tab">
                                               <span id="creditAdjustment"></span> <?php echo $translations['A00886'][$language]; /* Adjustment */?>
                                            </a>
                                        </li>
                                        <li id="transferTab" >
                                            <a data-toggle="tab">
                                              <span id="creditTransfer"></span> <?php echo $translations['A00887'][$language]; /* Transfer */?>
                                            </a>
                                        </li>
                                        <li id="withdrawalTab" >
                                            <a data-toggle="tab">
                                              <span id="creditWithdrawal"></span> <?php echo $translations['A00888'][$language]; /* Withdrawal */?>
                                            </a>
                                        </li>
                                    </ul>
                                    <div id="memberAdjustmentForm" class="tab-content m-b-30">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div id="adjustmentDiv">
                                                    <form role="form" id="editCoinMemberDetail" data-parsley-validate novalidate>
                                                        <div id="basicwizard" class=" pull-in">
                                                            <div class="tab-content b-0 m-b-0 p-t-0">
                                                                <div class="form-group">    
                                                                    <label class="control-label">
                                                                        <?php echo $translations['A00897'][$language]; /* Adjustment Type */?>
                                                                    </label>
                                                                    <div id="adjustmentType" class="m-b-20">
                                                                        <div class="radio radio-info radio-inline">
                                                                            <input type="radio" id="adjustmentTypeIn" name="adjustmentType" value="Adjustment In" />
                                                                            <label for="adjustmentTypeIn">
                                                                                <?php echo $translations['A00898'][$language]; /* In */?>
                                                                            </label>
                                                                        </div>
                                                                        <div class="radio radio-inline">
                                                                            <input type="radio" id="adjustmentTypeOut" name="adjustmentType" value="Adjustment Out"/>
                                                                            <label for="adjustmentTypeOut">
                                                                                <?php echo $translations['A00899'][$language]; /* Out */?>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <span id="adjustmentTypeError" class="customError text-danger"></span>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>
                                                                        <?php echo $translations['A00900'][$language]; /* Adjustment Amount */?>
                                                                    </label>
                                                                    <input id="adjustmentAmount" type="text" step="0.01" class="form-control"/>
                                                                    <span id="adjustmentAmountError" class="customError text-danger"></span>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>
                                                                        <?php echo $translations['A00571'][$language]; /* Remark */?>
                                                                    </label>
                                                                    <input id="remark" type="text" class="form-control"/>
                                                                    <span id="remarkError" class="customError text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <div class="col-md-12">
                                                        <button id="submitBtn" class="btn btn-primary waves-effect waves-light">
                                                            <?php echo $translations['A00323'][$language]; /* Submit */?>
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

        var url            = 'scripts/reqAdmin.php';
        var method         = 'POST';
        var debug          = 0;
        var bypassBlocking = 0;
        var bypassLoading  = 0;
        var pageNumber     = 1;

        var creditType     = "<?php echo $_GET['type'];?>";
        var id             = "<?php echo $_POST['id']; ?>";
        var fullName       = "<?php echo $_POST['fullName']; ?>";
        var username       = "<?php echo $_POST['username']; ?>";
        var creditName     = "<?php echo $_POST['creditName']; ?>";

        $(document).ready(function() {
            // if id or creditType empty will be return back memberDetailsList.php
            if((!id) || (!creditType)) {

                if(creditType) {
                    var message  = '<?php echo $translations['A00178'][$language]; /* Client does not exist */?>';
                    showMessage(message, '', '<?php echo $translations['A00727'][$language]; /* Error */ ?>', 'exclamation-triangle', 'memberDetailsList.php?type=' + creditType);
                    return;
                }

                var message  = '<?php echo $translations['A00178'][$language]; /* Client does not exist */?>';
                showMessage(message, '', '<?php echo $translations['A00727'][$language]; /* Error */ ?>', 'exclamation-triangle', 'memberDetailsList.php?type=tierValue');
                return;
            }

            $('.page-title').empty().append(creditName + ' Credit Adjustment');

            //set name and username of the member in form
            $('#name').text(fullName);
            $('#username').text(username);
            $('#creditTransaction').text(creditName);
            $('#creditAdjustment').text(creditName);
            $('#creditTransfer').text(creditName);
            $('#creditWithdrawal').text(creditName);
            
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

            //transfer page
            $('#transferTab').click(function() {
                $.redirect('memberTransfer.php?type=' + creditType, {      
                                                        id                  : id,
                                                        fullName            : fullName,
                                                        username            : username,
                                                        creditName          : creditName
                });
            });

            //withdrawal page
            $('#withdrawalTab').click(function() {
                $.redirect('memberWithdrawalByAddress.php?type=' + creditType, {
                                                        id                  : id,
                                                        fullName            : fullName,
                                                        username            : username,
                                                        creditName          : creditName
                });
            });

            $('#submitBtn').click(function() {
                var validate = $('#editCoinMemberDetail').parsley().validate();
                if(validate) {
                        clientId            = id;
                        creditType          = creditType;
                    var adjustmentType      = $('input[name=adjustmentType]:checked').val();
                    var adjustmentAmount    = $('#adjustmentAmount').val();
                    var remark              = $('#remark').val();
                    
                    var formData = {
                        command             : "editAdjustmentDetailAdmin",
                        id                  : clientId,
                        creditType          : creditType,
                        adjustmentType      : adjustmentType,
                        adjustmentAmount    : adjustmentAmount,
                        remark              : remark
                    };
                    var fCallback = sendEdit;
                    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
                }
            });
        });

        function loadMemberBalance(data, message) {
            $('#balance').text(data.balance);

            if(data.permissions) {
                if(data.permissions.isAdjustable == "0") {
                    $("li#adjustmentTab").remove();
                    $("#adjustmentDiv").empty();
                }
                if(data.permissions.isTransferable == "0") {
                    $("li#transferTab").remove();
                }
                if(data.permissions.isWithdrawable == "0") {
                    $("li#withdrawalTab").remove();
                }
            }
        }

        function sendEdit(data, message) { 
            showMessage('<?php echo $translations['A00905'][$language]; /* Member detail successfully updated. */?>', 'success', '<?php echo $translations['A00906'][$language]; /* Credit Adjustment */?>', 'edit', ['memberAdjustment.php?type=' + creditType, {creditType : creditType, id : id, fullName : fullName, username : username, creditName : creditName} ]);
        }

        
</script>
</body>
</html>
