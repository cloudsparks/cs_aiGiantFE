<?php 
    session_start();

    // Get current page name
    $thisPage = basename($_SERVER['PHP_SELF']);

    // Check the session for this page
    // if(!isset ($_SESSION['access'][$thisPage]))
    //     echo '<script>window.location.href="accessDenied.php";</script>';
    // $_SESSION['lastVisited'] = $thisPage;
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
                                            <?php echo $translations['A00212'][$language]; /* Payment */ ?>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div id="paymentMsg" class="text-center alert" style="display: none;"></div>
                                            <form id="paymentForm" role="form">
                                                <div class="col-sm-12">
                                                    <div class="col-sm-4 text-center">
                                                        <div class="m-t-rem1 mobileBox">
                                                            <span>
                                                                <?php echo $translations['A00213'][$language]; /* Username */ ?>
                                                            </span><br>
                                                            <label id="sponsorUsername" style="color: #059607;">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 text-center mobileBorderLess" style="border-left: 1px solid #ddd; border-right: 1px solid #ddd;">
                                                        <div class="m-t-rem1 mobileBox">    
                                                            <span>
                                                                <?php echo $translations['A00148'][$language]; /* Member ID */ ?>
                                                            </span><br>
                                                            <label id="sponsorID" style="color: #059607;"></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 text-center">
                                                        <div class="m-t-rem1 mobileBox">    
                                                            <span>
                                                                <?php echo $translations['A00203'][$language]; /* Package */ ?>
                                                            </span><br>
                                                            <label id="pacName" style="color: #059607;"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 m-t-rem2 m-b-rem2" style="border-bottom: 1px solid #ddd;"></div>
                                                <!-- Payment Form Start -->
                                                <div class="col-sm-12"> 
                                                    <!-- div package Details Form End -->
                                                    <div class="col-sm-6">
                                                        <div class="col-sm-12 m-b-rem2" style="background-color: #f7f7f7;">
                                                            <div class="p-t-rem2 p-b-rem2" style="padding: 10px;">
                                                                <span class="registerConfirmPriceSubject text-16">
                                                                    <strong>
                                                                        <?php echo $translations['A00216'][$language]; /* Package Summary */ ?>
                                                                    </strong>
                                                                </span><br>
                                                                <div class="p-l-rem2">
                                                                    <div class="m-t-rem2">
                                                                        <span>
                                                                            <?php echo $translations['A00217'][$language]; /* Package Name */ ?>
                                                                        </span><br>
                                                                        <label id="packageName" style="color: #059607;"></label>
                                                                    </div>
                                                                    <div class="m-t-rem1">    
                                                                        <span>
                                                                            <?php echo $translations['A00218'][$language]; /* Price */ ?>
                                                                        </span><br>
                                                                        <label id="packagePrice" step="0.01" style="color: #059607;"></label>
                                                                    </div>    
                                                                    <div class="m-t-rem1">    
                                                                        <span>
                                                                            <?php echo $translations['A00206'][$language]; /* Bonus Value */ ?>
                                                                        </span><br>
                                                                        <label id="packageBonus" style="color: #059607;"></label>
                                                                    </div>    
                                                                </div>
                                                                <div class="p-t-rem3">  
                                                                    <label class="text-16">
                                                                        <?php echo $translations['A00212'][$language]; /* Payment */ ?>
                                                                    </label>
                                                                    <div class="table-responsive">
                                                                        <table class="table mb-none table-borderless" style="border-bottom: 1px solid #163440;">
                                                                            <tbody id="creditTypeForm"></tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <div align="right" style="color: #FF7B6A;">
                                                                    <label>
                                                                        <h4>
                                                                            <strong>
                                                                                <?php echo $translations['A00221'][$language]; /* Total */ ?> : 
                                                                            </strong>
                                                                        </h4>
                                                                    </label>
                                                                    <label id="total" step="0.01" maxlength="18"></label>
                                                                    <label>
                                                                        <h4>
                                                                            <strong>
                                                                                <?php echo $translations['A00208'][$language]; /* Credit(s) */ ?>
                                                                             </strong>
                                                                        </h4>
                                                                    </label>
                                                                </div>
                                                                <span id="totalError" class="customError text-danger pull-right" error="error"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- div package Details Form End -->
                                                    <!-- div credit Type Form Start -->
                                                    <div id="creditForm" class="col-sm-6"></div>
                                                    <!-- div credit Type Form End -->
                                                </div>
                                                <!-- Payment Form End -->
                                            </form>
                                            <div class="col-xs-12 col-sm-12 m-t-rem3">
                                                <button id="backBtn" class="btn btn-primary waves-effect waves-light">
                                                    <?php echo $translations['A00115'][$language]; /* Back */ ?>
                                                </button>
                                                <button id="nextBtn" class="btn btn-primary waves-effect waves-light">
                                                    <?php echo $translations['A00205'][$language]; /* Next */ ?>
                                                </button>
                                                <button id="resetBtn" class="btn btn-primary waves-effect waves-light">
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
        var url             = 'scripts/reqClient.php';
        var method          = 'POST';
        var debug           = 0;
        var bypassBlocking  = 0;
        var bypassLoading   = 0;
        var position        = "";
        var decimalPlaces   = "<?php echo $_SESSION['decimalPlaces']; ?>";
        var type            = "<?php echo $_GET['type']; ?>";
        var price           = "";
        var total           = "";
        var creditData      = [];
        var sponsorID       = "";
        var fullName, username, address, country, countryName, state, county, city, dialingArea, phone, phoneNum, email, password, transactionPassword, sponsorUsername, placementUsername, placementPosition, codeNum;

        $(document).ready(function() {
            fullName            = "<?php echo $_POST['fullName']; ?>";
            username            = "<?php echo $_POST['username']; ?>";
            address             = "<?php echo $_POST['address']; ?>";
            country             = "<?php echo $_POST['country']; ?>";
            countryName         = "<?php echo $_POST['countryName']; ?>";
            stateID             = "<?php echo $_POST['stateID']; ?>";
            state               = "<?php echo $_POST['state']; ?>";
            countyID            = "<?php echo $_POST['countyID']; ?>";
            county              = "<?php echo $_POST['county']; ?>";
            cityID              = "<?php echo $_POST['cityID']; ?>";
            city                = "<?php echo $_POST['city']; ?>";
            dialingArea         = "<?php echo $_POST['dialingArea']; ?>";
            phone               = "<?php echo $_POST['phone']; ?>";
            email               = "<?php echo $_POST['email']; ?>";
            password            = "<?php echo $_POST['password']; ?>";
            transactionPassword = "<?php echo $_POST['transactionPassword']; ?>";
            sponsorUsername     = "<?php echo $_POST['sponsorUsername']; ?>";
            placementUsername   = "<?php echo $_POST['placementUsername']; ?>";
            placementPosition   = "<?php echo $_POST['placementPosition']; ?>";
            positionName        = "<?php echo $_POST['positionName']; ?>";
            codeNum             = "<?php echo $_POST['codeNum']; ?>";

            var formData  = {
                command         : "getRegistrationPaymentDetailAdmin",
                sponsorUsername : sponsorUsername,
                codeNum         : codeNum
            };
            var fCallback = paymentDetails;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

            // reset to default search
            $('#resetBtn').click(function() {
                $('#creditForm').find('input').each(function() {
                   $(this).val(''); 
                });
                $('#tPassword').find('input').each(function() {
                   $(this).val(''); 
                });
                $('#tPasswordError').find('span').each(function() {
                   $(this).text(''); 
                });
                $('#creditTypeForm').find('label').each(function() {
                   $(this).text(''); 
                });
                $('#total').each(function() {
                   $(this).text('');
                });
                $('#totalError').each(function() {
                   $(this).text('');
                });
                $('#paymentForm').find('span[class="customError text-danger"]').each(function() {
                   $(this).text(''); 
                });
            });

            $('#nextBtn').click(function() {
                $('.customError').text('');
                var wallets    = [];
                    sponsorID  = sponsorID;
                    packageId  = codeNum;
                
                // Unset creditData array
                creditData     = [];
                $('#creditForm').find('input').each(function() {
                    if(!$(this).val())
                        return true;
                    
                    var creditType    = $(this).attr('id');
                    var paymentAmount = parseFloat($(this).val());
                    var credit = {
                            creditType     : creditType,
                            paymentAmount  : paymentAmount
                    };
                    creditData.push(credit);
                });

                var formData   = {
                                    command    : "verifyPaymentAdmin",
                                    sponsorID  : sponsorID,
                                    packageId  : packageId,
                                    creditData : creditData
                };
                var fCallback = redirect;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

                //if have span text-danger will be remove
                $('#paymentForm').find('span[class="customError text-danger"]').each(function() {
                   $(this).text(''); 
                });
            });

            $('#backBtn').click(function() {
                $.redirect('memberRegistration.php?type=' + type, {
                                                        fullName            : fullName,
                                                        username            : username,
                                                        address             : address,
                                                        country             : country,
                                                        stateID             : stateID,
                                                        state               : state,
                                                        countyID            : countyID,
                                                        county              : county,
                                                        cityID              : cityID,
                                                        city                : city,
                                                        dialingArea         : dialingArea,
                                                        phone               : phone,
                                                        email               : email,
                                                        password            : password,
                                                        transactionPassword : transactionPassword,
                                                        sponsorUsername     : sponsorUsername,
                                                        placementUsername   : placementUsername,
                                                        codeNum             : codeNum
                });
            });
        });

        function paymentDetails(data, message) {
            var balance       = data.balance;
            var resultPackage = data.resultPackage;

            $('#sponsorUsername').text(sponsorUsername);
            sponsorID = data.sponsorID;
            $('#sponsorID').text(sponsorID);

            if(balance) {
                $.each(balance, function(key, value) {                
                    $('#creditForm').append('<div class="col-sm-12 m-t-rem1" style="padding: 0;"><b class="text-16">'+ value['name'] +'</b><div class="m-t-rem1"><span class="text-15">(<?php echo $translations['A00207'][$language]; /* Balance */ ?>: <b></b>'+ value['value'] +'<b> <?php echo $translations['A00208'][$language]; /* Credit(s) */ ?></b>)</span><br><span class="text-11"><span class="text-danger">*</span><?php echo $translations['A00209'][$language]; /* Min Usage */ ?>: '+value["payment"]["min_usage"]+', <?php echo $translations['A00210'][$language]; /* Max Usage */ ?>: '+value["payment"]["max_usage"]+'</span></div><div class="m-t-rem1 paymentBox" style="background-color: #ebebeb; padding: 10px; width: 80%;"><span><?php echo $translations['A00211'][$language]; /* Amount to Pay */ ?> :</span><input id="'+ value['name'] +'" type="text" step="0.01" class="form-control paymentInput" placeholder="<?php echo $translations['A00208'][$language]; /* Credit(s) */ ?>" maxlength="18" onkeyup="synCredit(this, this.value)"><span id="'+ value['name'] +'Error" class="customError text-danger"></span></div></div>');
                    
                });
                $.each(balance, function(key, value) {                
                    $('#creditTypeForm').append('<tr><td>'+ value['name'] +'</td><td align="right"><label id="'+ value['name'] +'" step="0.01" maxlength="18"></label></td></tr>');
                    
                });
            }
            if(resultPackage) {
                $('#pacName').text(resultPackage.name);
                $('#packageName').text(resultPackage.name);
                $('#packagePrice').text(resultPackage.price);
                $('#packageBonus').text(resultPackage.value);
            }
        }

        function synCredit(element, value) {
            var creditBalance = 0;
            if(value)
                creditBalance = parseFloat(value);
            $('td #'+element.id).text(creditBalance.toFixed(decimalPlaces));

            var balance = 0;
            $('#creditForm').find('input').each(function() {
                if($(this).val())
                    balance += parseFloat($(this).val());
            });
            $('#total').text(balance.toFixed(decimalPlaces));
        }

        function redirect(data, message) {
            $.redirect('verifyRegistration.php?type=' + type, {
                                                    fullName            : fullName,
                                                    username            : username,
                                                    address             : address,
                                                    country             : country,
                                                    countryName         : countryName,
                                                    stateID             : stateID,
                                                    state               : state,
                                                    countyID            : countyID,
                                                    county              : county,
                                                    cityID              : cityID,
                                                    city                : city,
                                                    dialingArea         : dialingArea,
                                                    phone               : phone,
                                                    email               : email,
                                                    password            : password,
                                                    transactionPassword : transactionPassword,
                                                    sponsorUsername     : sponsorUsername,
                                                    placementUsername   : placementUsername,
                                                    placementPosition   : placementPosition,
                                                    positionName        : positionName,
                                                    codeNum             : codeNum,
                                                    creditData          : creditData
            });
        }


</script>
</body>
</html>
