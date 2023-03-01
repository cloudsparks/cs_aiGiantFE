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
                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <form id="registrationSuccessForm" role="form">
                                                <div class="pull-in row">
                                                    <div class="p-l-rem2 p-r-rem2">
                                                        <h3>
                                                            <?php echo $translations['A00250'][$language]; /* Confirmation */ ?>
                                                        </h3>
                                                    </div>
                                                    <div class="col-sm-12" id="congratulations" style="display: block; padding-left: 20px; padding-right: 20px;" align="center">
                                                        <div class="alert alert-success">
                                                            <strong>
                                                                <?php echo $translations['A00251'][$language]; /* Congratulations! */ ?>
                                                            </strong>
                                                            <span class="m-l-rem1">
                                                                <?php echo $translations['A00252'][$language]; /* FuYour registration are successful!ll */ ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 p-t-rem1 p-l-rem3">
                                                        <div class="col-lg-6">
                                                            <div class="m-t-rem1">
                                                                <span>
                                                                    <?php echo $translations['A00117'][$language]; /* Full Name */ ?>
                                                                </span><br>
                                                                <label id="fullName" style="color: #059607;"></label>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <div class="m-t-rem1">    
                                                                <span>
                                                                    <?php echo $translations['A00254'][$language]; /* Username */ ?>
                                                                </span><br>
                                                                <label id="username" style="color: #059607;"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 p-t-rem1 p-l-rem3">
                                                        <div class="col-lg-6">
                                                            <div class="m-t-rem1">    
                                                                <span>
                                                                    <?php echo $translations['A00153'][$language]; /* Country */ ?>
                                                                </span><br>
                                                                <label id="country" style="color: #059607;"></label>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <div class="m-t-rem1">    
                                                                <span>
                                                                    <?php echo $translations['A00192'][$language]; /* State */ ?>
                                                                </span><br>
                                                                <label id="state" style="color: #059607;"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 p-t-rem1 p-l-rem3">
                                                        <div class="col-lg-6">
                                                            <div class="m-t-rem1">    
                                                                <span>
                                                                    <?php echo $translations['A00194'][$language]; /* City */ ?>
                                                                </span><br>
                                                                <label id="city" style="color: #059607;"></label>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <div class="m-t-rem1">    
                                                                <span>
                                                                    <?php echo $translations['A00193'][$language]; /* County */ ?>
                                                                </span><br>
                                                                <label id="county" style="color: #059607;"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 p-t-rem1 p-l-rem3">
                                                        <div class="col-lg-6">
                                                            <div class="m-t-rem1">    
                                                                <span>
                                                                    <?php echo $translations['A00256'][$language]; /* Address Field */ ?>
                                                                </span><br>
                                                                <label id="address" style="color: #059607;"></label>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <div class="m-t-rem1">    
                                                                <span>
                                                                    <?php echo $translations['A00171'][$language]; /* Mobile Number */ ?>
                                                                </span><br>
                                                                <label id="phone" style="color: #059607;"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 p-t-rem1 p-l-rem3">
                                                        <div class="col-lg-6">
                                                            <div class="m-t-rem1">    
                                                                <span>
                                                                    <?php echo $translations['A00103'][$language]; /* Email */ ?>
                                                                </span><br>
                                                                <label id="email" style="color: #059607;"></label>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <div class="m-t-rem1">    
                                                                <span>
                                                                    <?php echo $translations['A00199'][$language]; /* Placement Position */ ?>
                                                                </span><br>
                                                                <label id="placementPosition" style="color: #059607;"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 p-t-rem1 p-l-rem3">
                                                        <div class="col-lg-6">
                                                            <div class="m-t-rem1">    
                                                                <span>
                                                                    <?php echo $translations['A00154'][$language]; /* Sponsor Username */ ?>
                                                                </span><br>
                                                                <label id="sponsorUsername" style="color: #059607;"></label>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <div class="m-t-rem1">    
                                                                <span>
                                                                    <?php echo $translations['A00198'][$language]; /* Placement Username */ ?>
                                                                </span><br>
                                                                <label id="placementUsername" style="color: #059607;"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 p-t-rem1 p-l-rem3">
                                                        <!-- Package -->
                                                        <div id="packageDiv" style="display: none;">
                                                            <div class="col-lg-12 p-t-rem1 p-l-rem3">
                                                                <div class="col-lg-12 m-t-rem1">
                                                                    <hr>
                                                                    <label>
                                                                        <?php echo $translations['A00203'][$language]; /* Package */ ?>
                                                                    </label>
                                                                    <div class="col-lg-12">
                                                                        <div class="m-t-rem1">    
                                                                            <span>
                                                                                <?php echo $translations['A00101'][$language]; /* Name */ ?>
                                                                            </span><br>
                                                                            <div class="col-lg-12">
                                                                                <label id="pacName" style="color: #059607;"></label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12">
                                                                        <div class="m-t-rem1">    
                                                                            <span>
                                                                                <?php echo $translations['A00218'][$language]; /* Price */ ?>
                                                                            </span><br>
                                                                            <div class="col-lg-12">
                                                                                <label id="pacPrice" style="color: #059607;"></label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12">
                                                                        <div class="m-t-rem1">    
                                                                            <span>
                                                                                <?php echo $translations['A00265'][$language]; /* Value */ ?>
                                                                            </span><br>
                                                                            <div class="col-lg-12">
                                                                                <label id="pacValue" style="color: #059607;"></label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- Package Details div End -->
                                                            <!-- Payment Details div Start -->
                                                            <div class="col-lg-12 p-t-rem1 p-l-rem3">
                                                                <div id="packageDiv" class="col-lg-12 m-t-rem1">
                                                                    <hr>
                                                                    <label>
                                                                        <?php echo $translations['A00212'][$language]; /* Payment */ ?>
                                                                    </label>
                                                                    <div id="payment" class="col-lg-12">
                                                                        <table id="paymentTable" class="table tabel-borderless table-responsive no-footer m-0" step="0.01">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>
                                                                                        <?php echo $translations['A00267'][$language]; /* Credit Type */ ?>
                                                                                    </th>
                                                                                    <th>
                                                                                        <?php echo $translations['A00268'][$language]; /* Available Balance */ ?>
                                                                                    </th>
                                                                                    <th>
                                                                                        <?php echo $translations['A00269'][$language]; /* Amount To Pay */ ?>
                                                                                    </th>
                                                                                </tr>
                                                                            </thead>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Package -->
                                                        <!-- Free -->
                                                        <div id="freeDiv" class="col-lg-12 p-t-rem1 p-l-rem3" style="display: none;">
                                                            <div class="col-lg-12 m-t-rem1">
                                                                <hr>
                                                                <label>
                                                                    <?php echo $translations['A00203'][$language]; /* Package */ ?>
                                                                </label>
                                                                <div class="col-lg-12">
                                                                    <div class="m-t-rem1">    
                                                                        <span>
                                                                            <?php echo $translations['A00101'][$language]; /* Name */ ?>
                                                                        </span><br>
                                                                        <div class="col-lg-12">
                                                                            <label id="freeName" style="color: #059607;"></label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="m-t-rem1">    
                                                                        <span>
                                                                            <?php echo $translations['A00218'][$language]; /* Price */ ?>
                                                                        </span><br>
                                                                        <div class="col-lg-12">
                                                                            <label id="freePrice" style="color: #059607;"></label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="m-t-rem1">    
                                                                        <span>
                                                                            <?php echo $translations['A00265'][$language]; /* Value */ ?>
                                                                        </span><br>
                                                                        <div class="col-lg-12">
                                                                            <label id="freeValue" style="color: #059607;"></label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Free -->
                                                        <!-- Pin -->
                                                        <div id="pinDiv" class="col-lg-12 m-t-rem1 p-l-rem3" style="display: none;">
                                                            <div class="col-lg-12 m-t-rem1">
                                                                <hr>
                                                                <label>
                                                                    <?php echo $translations['A00274'][$language]; /* Pin Details */ ?>
                                                                </label>
                                                                <div class="col-lg-12">
                                                                    <div class="m-t-rem1">    
                                                                        <span>
                                                                            <?php echo $translations['A00245'][$language]; /* Code */ ?>
                                                                        </span><br>
                                                                        <label id="pinCode" style="color: #059607;"></label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="m-t-rem1">    
                                                                        <span>
                                                                            <?php echo $translations['A00101'][$language]; /* Name */ ?>
                                                                        </span><br>
                                                                        <label id="pinName" style="color: #059607;"></label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="m-t-rem1">    
                                                                        <span>
                                                                            <?php echo $translations['A00218'][$language]; /* Price */ ?>
                                                                        </span><br>
                                                                        <label id="pinValue" style="color: #059607;"></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Pin -->
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="col-xs-12 col-sm-12">
                                                <button id="nextBtn" class="btn btn-default waves-effect w-md waves-light m-b-20 m-t-rem3">
                                                    <?php echo $translations['A00278'][$language]; /* New registration */ ?>
                                                </button>
                                                <button id="invoiceBtn" class="btn btn-default waves-effect w-md waves-light m-b-20 m-t-rem3" style="display: none;">
                                                    <?php echo $translations['A00279'][$language]; /* Invoice */ ?>
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
        var url            = 'scripts/reqClient.php';
        var method         = 'POST';
        var debug          = 0;
        var bypassBlocking = 0;
        var bypassLoading  = 0;
        var type           = "<?php echo $_GET['type']; ?>";
        var decimalPlaces  = "<?php echo $_SESSION['decimalPlaces']; ?>";

        var fullName, username, address, country, state, county, city, phone, email, password, transactionPassword, sponsorUsername, placementUsername, positionName, codeNum, creditData, invoiceId;

    $(document).ready(function() {
        fullName            = "<?php echo $_POST['fullName']; ?>";
        username            = "<?php echo $_POST['username']; ?>";
        address             = "<?php echo $_POST['address']; ?>";
        countryName         = "<?php echo $_POST['countryName']; ?>";
        state               = "<?php echo $_POST['state']; ?>";
        county              = "<?php echo $_POST['county']; ?>";
        city                = "<?php echo $_POST['city']; ?>";
        phone               = "<?php echo $_POST['phone']; ?>";
        email               = "<?php echo $_POST['email']; ?>";
        password            = "<?php echo $_POST['password']; ?>";
        transactionPassword = "<?php echo $_POST['transactionPassword']; ?>";
        sponsorUsername     = "<?php echo $_POST['sponsorUsername']; ?>";
        placementUsername   = "<?php echo $_POST['placementUsername']; ?>";
        positionName        = "<?php echo $_POST['placementPosition']; ?>";
        codeNum             = "<?php echo $_POST['codeNum']; ?>";
        invoiceId           = "<?php echo $_POST['invoiceId']; ?>";
        creditData          = <?php echo json_encode($_POST['creditData']); ?>;
        
        $('#fullName').text(fullName);
        $('#username').text(username);
        $('#address').text(address);
        $('#country').text(countryName);
        $('#state').text(state);
        $('#county').text(county);
        $('#city').text(city);
        $('#phone').text(phone);
        $('#email').text(email);
        $('#password').text(password);
        $('#transactionPassword').text(transactionPassword);
        $('#sponsorUsername').text(sponsorUsername);
        $('#placementUsername').text(placementUsername);
        $('#placementPosition').text(positionName);

        registerTypeDetail(type);
        var status    = "Used";
        var formData  = {
            command   : "getRegistrationPackageDetailAdmin",
            codeNum   : codeNum,
            type      : type,
            status    : status,
            sponsorUsername : sponsorUsername
        };
        var fCallback = registerDetails;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $('#nextBtn').click(function() {
            window.location='memberRegistration.php?type=' + type;
        });
        $('#invoiceBtn').click(function() {
            $.redirect("viewInvoice.php", {invoiceId : invoiceId});
        });
    });

    function registerTypeDetail(registerType) {
        if(type == 'package') {
            $('#packageDiv').show();
            $('#invoiceBtn').show();
        }
        if(type == 'free') {
            $('#freeDiv').show();
        }
        else if(type == 'pin') {
            $('#pinDiv').show();
        }
    }

    function registerDetails(data, message) {
        var result = data.result;
        var credit = data.credit;
        if(result) {
            if(type == 'package') {
                $('#pacName').text(result.name);
                $('#pacPrice').text(result.price);
                $('#pacValue').text(result.value);
            } 
            $.each(result, function(key, value) {
                if(type == 'pin') {
                    $('#pinCode').text(value['code']);
                    $('#pinName').text(value['name']);
                    $('#pinValue').text(value['bonusValue']);
                }
                else if(type == 'free') {
                    $('#freeName').text(value['name']);
                    $('#freePrice').text(0);
                    $('#freeValue').text(0);
                }
            });
        }

        if(type == 'package') {
            if(credit) {
                var paymentMethod = new FormData();
                var paidBy = {};
                $.each(creditData, function() {
                    paidBy[this.creditType] = parseFloat(this.paymentAmount).toFixed(decimalPlaces);
                });
                $.each(credit, function(key, value) {
                    var paid = paidBy[value['name']] ? paidBy[value['name']] : "0.00";

                    $('#paymentTable').append("<tr><td>" +value["name"]+ "</td><td align='right' step='0.01'>" +value["value"]+ "</td><td align='right' step='0.01'>" +paid+ "</td></tr>");
                });
            }
        }
    }


</script>
</body>
</html>