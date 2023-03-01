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
                <!-- Start container -->
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-box p-b-0">
                                <div class="row">
                                    <div class="col-md-6">
                                        <form role="form" id="verifyRegistration">
                                            <div id="basicwizard" class=" pull-in">
                                                <div class="tab-content b-0 m-b-0 p-t-0">
                                                    <div class="form-group">
                                                        <label>
                                                            <?php echo $translations['A00117'][$language]; /* Full Name */ ?>
                                                        </label>
                                                        <input id="fullName" type="text" class="form-control"  readonly/>
                                                        <span id="fullNameError" class="customError text-danger"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>
                                                            <?php echo $translations['A00225'][$language]; /* Username */ ?>
                                                        </label>
                                                        <input id="username" type="text" class="form-control" readonly/>
                                                        <span id="usernameError" class="customError text-danger"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>
                                                            <?php echo $translations['A00226'][$language]; /* Address */ ?>
                                                        </label>
                                                        <input id="address" type="text" class="form-control" readonly/>
                                                        <span id="addressError" class="customError text-danger"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>
                                                            <?php echo $translations['A00153'][$language]; /* Country */ ?>
                                                        </label>
                                                        <input id="country" type="text" class="form-control" readonly></input>
                                                        <span id="countryError" class="customError text-danger"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>
                                                            <?php echo $translations['A00228'][$language]; /* State */ ?>
                                                        </label>
                                                        <input id="state" type="text" class="form-control" readonly/>
                                                        <span id="stateError" class="customError text-danger"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>
                                                            <?php echo $translations['A00193'][$language]; /* County */ ?>
                                                        </label>
                                                        <input id="county" type="text" class="form-control" readonly/>
                                                        <span id="countyError" class="customError text-danger"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>
                                                            <?php echo $translations['A00194'][$language]; /* City */ ?>
                                                        </label>
                                                        <input id="city" type="text" class="form-control" readonly/>
                                                        <span id="cityError" class="customError text-danger"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>
                                                            <?php echo $translations['A00171'][$language]; /* Mobile Number */ ?>
                                                        </label>
                                                        <input id="phone" type="text" class="form-control" readonly/>
                                                        <span id="phoneError" class="customError text-danger"></span>
                                                    </div><div class="form-group">
                                                        <label>
                                                            <?php echo $translations['A00195'][$language]; /* Email Address */ ?>
                                                        </label>
                                                        <input id="email" type="text" class="form-control" readonly/>
                                                        <span id="emailError" class="customError text-danger"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>
                                                            <?php echo $translations['A00120'][$language]; /* Password */ ?>
                                                        </label>
                                                        <input id="password" type="password" class="form-control"  readonly/>
                                                        <span id="passwordtext" style="font-size:8pt">
                                                            <?php echo $translations['A00234'][$language]; /* Password must contain 6 - 20 characters, which consists of letters and numbers. */ ?>
                                                        </span>
                                                        <span id="passwordError" class="customError text-danger"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>
                                                            <?php echo $translations['A00186'][$language]; /* Transaction Password */ ?>
                                                        </label>
                                                        <input id="transactionPassword" type="password" class="form-control"  readonly/>
                                                        <span id="transactionPasswordtext" style="font-size:8pt">
                                                            <?php echo $translations['A00236'][$language]; /* Transaction Password must contain 6 - 20 characters, which consists of letters and numbers. */ ?>
                                                        </span>
                                                        <span id="tPasswordError" class="customError text-danger"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>
                                                            <?php echo $translations['A00154'][$language]; /* Sponsor Username */ ?>
                                                        </label>
                                                        <input id="sponsorUsername" type="text" class="form-control" readonly/>
                                                        <span id="sponsorUsernameError" class="customError text-danger"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>
                                                            <?php echo $translations['A00198'][$language]; /* Placement Username */ ?>
                                                        </label>
                                                        <input id="placementUsername" type="text" class="form-control" readonly/>
                                                        <span id="placementUsernameError" class="customError text-danger"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>
                                                            <?php echo $translations['A00199'][$language]; /* Placement Position */ ?>
                                                        </label>
                                                        <input id="placementPosition" type="text" class="form-control" readonly/>
                                                        <span id="placementPositionError" class="customError text-danger"></span>
                                                    </div>
                                                    <!-- Package & Free-->
                                                    <div id="packageDiv" class="form-group" style="display: none;">
                                                        <label>
                                                            <?php echo $translations['A00203'][$language]; /* Package */ ?>
                                                        </label>
                                                        <div class="container" style="padding-right: 0px">
                                                            <label>
                                                                <?php echo $translations['A00101'][$language]; /* Name */ ?>
                                                            </label>
                                                            <input id="pacName" type="text" class="form-control" readonly/>
                                                            <label>
                                                                <?php echo $translations['A00218'][$language]; /* Price */ ?>
                                                            </label>
                                                            <input id="pacPrice" type="text" class="form-control" readonly/>
                                                            <label>
                                                                <?php echo $translations['A00206'][$language]; /* Bonus Value */ ?>
                                                            </label>
                                                            <input id="pacValue" type="text" class="form-control" readonly/>
                                                            <span id="packageError" class="customError text-danger"></span>
                                                        </div>
                                                    </div>
                                                     <!-- Pin -->
                                                    <div id="pinDiv" class="form-group" style="display: none;">
                                                        <label>
                                                            <?php echo $translations['A00204'][$language]; /* Pin */ ?>
                                                        </label>
                                                        <div class="container" style="padding-right: 0px">
                                                            <label>
                                                                <?php echo $translations['A00245'][$language]; /* Code */ ?>
                                                            </label>
                                                            <input id="pinCode" type="text" class="form-control" readonly/>
                                                            <label>
                                                                <?php echo $translations['A00101'][$language]; /* Name */ ?>
                                                            </label>
                                                            <input id="pinName" type="text" class="form-control" readonly/>
                                                            <label>
                                                                <?php echo $translations['A00218'][$language]; /* Price */ ?>
                                                            </label>
                                                            <input id="pinValue" type="text" class="form-control" readonly/>
                                                            <span id="pinError" class="customError text-danger"></span>
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
                            <button id="confirmBtn" class="btn btn-primary waves-effect waves-light">
                                <?php echo $translations['A00123'][$language]; /* Confirm */ ?>
                            </button>
                            <button id="editBtn" class="btn btn-primary btn-md waves-effect waves-light">
                                <?php echo $translations['A00249'][$language]; /* Edit */ ?>
                            </button>
                        </div>
                    </div>
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

        var fullName, username, address, country, countryName, state, county, city, dialingArea, phone, phoneNum, email, password, transactionPassword, sponsorUsername, placementUsername, placementPosition, codeNum, creditData;

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
            creditData          = <?php echo json_encode($_POST['creditData']); ?>;

            phoneNum = dialingArea + phone;

            $('#fullName').val(fullName);
            $('#username').val(username);
            $('#address').val(address);
            $('#country').val(countryName);
            $('#state').val(state);
            $('#county').val(county);
            $('#city').val(city);
            $('#phone').val(phoneNum);
            $('#email').val(email);
            $('#password').val(password);
            $('#transactionPassword').val(transactionPassword);
            $('#sponsorUsername').val(sponsorUsername);
            $('#placementUsername').val(placementUsername);
            $('#placementPosition').val(positionName);
            
            registerTypeDetail(type);
            var status    = "New";
            var formData  = {
                command         : "getRegistrationPackageDetailAdmin",
                codeNum         : codeNum,
                status          : status,
                type            : type,
                sponsorUsername : sponsorUsername
            };
            var fCallback = registerDetails;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

            $('#editBtn').click(function() {
                $.redirect('memberRegistration.php?type=' + type, {
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
                                                        codeNum             : codeNum
                });
            });

            $('#confirmBtn').click(function() {
                $('.customError').text('');
                var formData = {
                                    command             : "memberRegistrationConfirmationAdmin",
                                    type                : type,
                                    fullName            : fullName,
                                    username            : username,
                                    address             : address,
                                    country             : country,
                                    countryName         : countryName,
                                    state               : stateID,
                                    county              : countyID,
                                    city                : cityID,
                                    dialingArea         : dialingArea,
                                    phone               : phone,
                                    email               : email,
                                    password            : password,
                                    transactionPassword : transactionPassword,
                                    sponsorUsername     : sponsorUsername,
                                    placementUsername   : placementUsername,
                                    placementPosition   : placementPosition,
                                    codeNum             : codeNum,
                                    creditData          : creditData
                                };
                var fCallback = redirect;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

                //if have span text-danger will be remove
                $('#memberRegistrationForm').find('span[class="customError text-danger"]').each(function() {
                   $(this).text(''); 
                });
            });
        });

        function registerTypeDetail(registerType) {
            if(type == 'package' || type == 'free') {
                $('#packageDiv').show();
            } 
            else if(type == 'pin') {
                $('#pinDiv').show();
            }
        }

        function registerDetails(data, message) {
            var result = data.result;
            if(result) {
                if(type == 'package') {
                    $('#pacId').val(result.id);
                    $('#pacName').val(result.name);
                    $('#pacPrice').val(result.price);
                    $('#pacValue').val(result.value);
                }
                $.each(result, function(key, value) {
                    if(type == 'pin') {
                        $('#pinCode').val(value['code']);
                        $('#pinName').val(value['name']);
                        $('#pinValue').val(value['bonusValue']);
                    }
                    else if(type == 'free') {
                        $('#pacName').val(value['name']);
                        $('#pacPrice').val(0);
                        $('#pacValue').val(0);
                    }
                });
            }
        }

        function redirect(data, message) {
            $.redirect('registrationSuccess.php?type=' + type, {
                                                        fullName            : fullName,
                                                        username            : username,
                                                        address             : address,
                                                        countryName         : countryName,
                                                        state               : state,
                                                        county              : county,
                                                        city                : city,
                                                        phone               : phoneNum,
                                                        email               : email,
                                                        password            : password,
                                                        transactionPassword : transactionPassword,
                                                        sponsorUsername     : sponsorUsername,
                                                        placementUsername   : placementUsername,
                                                        placementPosition   : positionName,
                                                        codeNum             : codeNum,
                                                        creditData          : creditData,
                                                        invoiceId           : data
            });
        }

</script>
</body>
</html>