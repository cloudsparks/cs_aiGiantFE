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
                                        <li id="adjustmentTab">
                                            <a data-toggle="tab">
                                               <span id="creditAdjustment"></span> <?php echo $translations['A00886'][$language]; /* Adjustment */?>
                                            </a>
                                        </li>
                                        <li id="transferTab" >
                                            <a data-toggle="tab">
                                              <span id="creditTransfer"></span> <?php echo $translations['A00887'][$language]; /* Transfer */?>
                                            </a>
                                        </li>
                                        <li id="withdrawalTab" class="active">
                                            <a data-toggle="tab">
                                              <span id="creditWithdrawal"></span> <?php echo $translations['A00888'][$language]; /* Withdrawal */?>
                                            </a>
                                        </li>
                                    </ul>
                                    <div id="memberDetailsForm" class="tab-content m-b-30">
                                        <form role="form" id="newWithdrawal" data-parsley-validate novalidate>
                                            <div class="form-group">
                                                <span>
                                                    <?php echo $translations['A00821'][$language]; /* Amount */?>
                                                </span>
                                                <input id="withdrawalAmount" type="text" step="0.01" name="Withdrawal Amount" class="form-control">
                                                <span id="amountError" class="customError text-danger"></span>
                                            </div>
                                            <div class="form-group">
                                                <span>
                                                    <?php echo $translations['A01185'][$language]; /* Account No */?>
                                                </span>
                                                <input id="walletAddress" type="text" name="Account" class="form-control">
                                                <span id="walletAddressError" class="customError text-danger"></span>
                                            </div>
                                        </form>
                                        <div class="btn">
                                            <button id="confirmBtn" class="btn btn-primary waves-effect waves-light">
                                                <?php echo $translations['A00123'][$language]; /* Confirm */?>
                                            </button>
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

        var countryList, bankList, formData, fCallbank;
        var fullName, username, password, transactionPassword, email, phone, address, country, countryName, sponsor;

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

            formData = {
                command     : "getWithdrawalDetailAdmin",
                creditType  : creditType,
                id          : id
            };
            fCallback = loadDefaultListing;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

            $('.page-title').empty().append(creditName + ' Credit Withdrawal');
            $('#creditTransaction').text(creditName);
            $('#creditAdjustment').text(creditName);
            $('#creditTransfer').text(creditName);
            $('#creditWithdrawal').text(creditName);
            
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

            //transfer page
            $('#transferTab').click(function() {
                $.redirect('memberTransfer.php?type=' + creditType, {
                                                        id                  : id,
                                                        fullName            : fullName,
                                                        username            : username,
                                                        creditName          : creditName
                });
            });

            $('#confirmBtn').click(function() {
                $('.customError').empty();
                $('#newWithdrawal').find('span[class="customError text-danger"]').each(function() {
                   $(this).text(''); 
                });
                var validate = $('#newWithdrawal').parsley().validate();

                if(validate) {
                    var formData = {
                        command             : "addNewWithdrawalByAddress",
                        amount              : $('#withdrawalAmount').val(),
                        walletAddress       : $('#walletAddress').val(),
                        creditType          : creditType,
                        type          : 1,
                        clientId            : id
                    };

                    var fCallback = redirect;
                    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
                }
            });

            $('#country').on("change", function () {
                var countryId = $('#country').find('option:selected').val();
                alterBankDropdown(countryId);
            });

        });

        function loadDefaultListing(data, message) {

            $('#name').text(data.fullname);
            $('#username').text(data.username);
            $('#balance').text(data.balance);

            loadCountryDropdown(data, message);
            loadBankDropdown(data, message);

            if(data.permissions) {
                if(data.permissions.isAdjustable == "0") {
                    $("li#adjustmentTab").remove();
                }
                if(data.permissions.isTransferable == "0") {
                    $("li#transferTab").remove();
                }
                if(data.permissions.isWithdrawable == "0") {
                    $("li#withdrawalTab").remove();
                    $("#memberDetailsForm").empty();
                }
            }
        }

        function loadCountryDropdown(data, message) {
            countryList = data.countryList;
            if(countryList) {
                $.each(countryList, function(key) {
                    $('#country').append('<option id="'+countryList[key]['id']+'" value="'+countryList[key]['id']+'" name="'+countryList[key]['name']+'">'+countryList[key]['name']+'</option>');
                });
            }
        }

        function loadBankDropdown(data, message) {
            bankList = data.bankList;
            if(bankList) {
                alterBankDropdown(1);
            }
        }

        function alterBankDropdown(countryId) {
            $('#bank').empty();
            $.each(bankList, function(key) {
                if (countryId == bankList[key]['country_id']) {
                    $('#bank').append('<option id="' + bankList[key]['id'] + '" value="' + bankList[key]['id'] + '" name="' + bankList[key]['name'] + '">' + bankList[key]['name'] + '</option>');
                }
            });
        }

        function redirect() {
            showMessage('<?php echo $translations['A00918'][$language]; /* Withdrawal request submitted successfully */?>', 'success', '<?php echo $translations['A00919'][$language]; /* Credit Withdrawal */?>', 'list-ul', ['memberWithdrawalByAddress.php?type=' + creditType, {creditType : creditType, id : id, fullName : fullName, username : username, creditName : creditName} ]);
        }

        
</script>
</body>
</html>
