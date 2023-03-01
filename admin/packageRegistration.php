<?php 
    session_start();

    include_once("mobileDetect.php");
    $detect = new Mobile_Detect;

    $thisPage = basename($_SERVER['PHP_SELF']);

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
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default bx-shadow-none">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <?php echo $translations['A00180'][$language]; /* Fill Up Info */ ?>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div id="registrationForm" class="text-center alert hide"></div>
                                            <form id="memberRegistrationForm" role="form">

                                                <div class="col-sm-6">

                                                    <div class="col-sm-12 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00117'][$language]; /* Full Name */ ?>
                                                            <span class="text-danger">
                                                                *
                                                            </span>
                                                        </label>
                                                        <input id="fullName" type="text" class="form-control" maxlength="225" required/>
                                                        <span id="fullNameError" class="customError text-danger"></span>
                                                    </div>

                                                    <div class="col-sm-12 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00102'][$language]; /* Username */ ?>
                                                            <span class="text-danger">
                                                                *
                                                            </span>
                                                        </label>
                                                        <input id="username" type="text" class="form-control" maxlength="225" required/>
                                                        <span id="usernameError" class="customError text-danger"></span>
                                                    </div>

                                                    <!-- <div class="col-sm-12 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['M01956'][$language]; /* identity number */ ?>
                                                            <span class="text-danger">
                                                                *
                                                            </span>
                                                        </label>
                                                        <input id="identityNumber" type="text" class="form-control" maxlength="225" required/>
                                                        <span id="identityNumberError" class="customError text-danger"></span>
                                                    </div> -->
                                                    <div class="col-sm-12 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00153'][$language]; /* Country */ ?>
                                                            <span class="text-danger">
                                                                *
                                                            </span>
                                                        </label>
                                                        <select id="country" class="form-control">
                                                            <option value="">
                                                                <?php echo $translations['A00191'][$language]; /* Please select a Country */ ?>
                                                            </option>
                                                        </select>
                                                        <span id="countryError" class="customError text-danger"></span>
                                                    </div>

                                                    <!-- <div class="col-sm-12 form-group">
                                                        <label class="control-label">
                                                            Date of Birth
                                                            <span class="text-danger">
                                                                *
                                                            </span>
                                                        </label>
                                                        <input type="text" class="form-control" id="dateOfBirth" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '');" value="<?php echo $_POST['dateOfBirth']; ?>">
                                                        <span id="dateOfBirthError" class="customError text-danger"></span>
                                                    </div> -->

                                                    <div class="col-sm-12 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00171'][$language]; /* Mobile Number */ ?>
                                                            <span class="text-danger">
                                                                *
                                                            </span>
                                                        </label>

                                                        <div class="input-group">
                                                            <input id="phoneDialing" type="text" class="form-control" disabled required/>

                                                            <span class="input-group-addon">-</span>

                                                            <input id="phone" type="text" class="form-control" maxlength="15" required/>
                                                        </div>

                                                        <span id="phoneError" class="customError text-danger"></span>
                                                    </div>


                                                   
                                                    
                                                    <div class="col-sm-12 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00195'][$language]; /* Email Address */ ?>
                                                            <span class="text-danger">
                                                                *
                                                            </span>
                                                        </label>
                                                        <input id="email" type="email" class="form-control" maxlength="225" required/>
                                                        <span id="emailError" class="customError text-danger"></span>
                                                    </div>
                                                    <div class="col-sm-12 form-group">
                                                        <label class="control-label">
                                                            Placement Username
                                                            <span class="text-danger">
                                                                *
                                                            </span>
                                                        </label>
                                                        <input id="placementUsername" type="text" class="form-control" required style="margin-bottom: 10px;">
                                                        <input id="left" type="radio" name="placementPosition" value="1"> 
                                                        <label for="left" style="margin-right: 15px;"><?php echo $translations['A00200'][$language]; /* Left */ ?></label>

                                                        <input id="right" type="radio" name="placementPosition" value="2"> 
                                                        <label for="right" style="margin-right: 15px;"><?php echo $translations['A00201'][$language]; /* Right */ ?></label>
                                                        <span id="placementPositionError" class="customError text-danger"></span>
                                                        

                                                    </div>
                                                    
                                                    
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="col-sm-12 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00120'][$language]; /* Password */ ?>
                                                            <span class="text-danger">
                                                                *
                                                            </span>
                                                        </label>
                                                        <input id="password" type="password" class="form-control" maxlength="20" required/>

                                                        <span id="passwordSpan" class="miniNotice">
                                                            <?php echo $translations['A00184'][$language]; /* Must contain 6 - 20 characters, which consists of letters and numbers. */ ?>
                                                        </span>
                                                        <span id="passwordError" class="customError text-danger"></span>
                                                    </div>
                                                    <div class="col-sm-12 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00185'][$language]; /* Re-type Password */ ?>
                                                            <span class="text-danger">
                                                                *
                                                            </span>
                                                        </label>
                                                        <input id="retypePassword" type="password" class="form-control" maxlength="20" required/>
                                                        <span id="checkPasswordError" class="customError text-danger"></span>
                                                    </div>
                                                    <div class="col-sm-12 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00186'][$language]; /* Transaction Password */ ?>
                                                            <span class="text-danger">
                                                                *
                                                            </span>
                                                        </label>
                                                        <input id="transactionPassword" type="password" class="form-control" maxlength="20"  required/>
                                                        <span id="tPasswordSpan" class="miniNotice" style="display: block;">
                                                            <?php echo $translations['A00184'][$language]; /* Must contain 6 - 20 characters, which consists of letters and numbers. */ ?>
                                                        </span>
                                                        <span id="tPasswordError" class="customError text-danger"></span>
                                                    </div>
                                                    <div class="col-sm-12 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00188'][$language]; /* Re-type Transaction Password */ ?>
                                                            <span class="text-danger">
                                                                *
                                                            </span>
                                                        </label>
                                                        <input id="retypeTPassword" type="password" class="form-control" maxlength="20" required/>
                                                        <span id="checkTPasswordError" class="customError text-danger"></span>
                                                    </div>
                                                    <div class="col-sm-12 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00154'][$language]; /* Sponsor Username */ ?>
                                                            <span class="text-danger">
                                                                *
                                                            </span>
                                                        </label>
                                                        <input id="sponsorUsername" type="text" class="form-control" maxlength="225" required/>
                                                        <span id="sponsorUsernameError" class="customError text-danger"></span>
                                                    </div>
                                                    
                                                </div>
                                            </form>
                                            <div class="col-xs-12 col-sm-12">
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
                </div>
            </div>

            <?php include("footer.php"); ?>

        </div>

    </div>

    <div class="modal fade in" id="confirmationDetails" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content-wrapper">
                <div class="modal-content" style="overflow-y:scroll;max-height: 100vh">
                    <div class="modal-header clearfix text-left">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                        </button>
                        <h5>
                            Confirmation
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive" style="border: none;">
                            <table class="table" style="border: 1px solid #dddddd;">
                                <tbody>
                                    <tr><th><?php echo $translations['A00117'][$language]; ?></th><td id="fullname_c"></td></tr>
                                    <tr><th><?php echo $translations['A00102'][$language]; /* Username */ ?></th><td id="username_c"></td></tr>
                                    <!-- <tr><th><?php echo $translations['M01956'][$language]; /* identity number */ ?></th><td id="identityNumber_c"></td></tr> -->
                                    <tr><th><?php echo $translations['A00153'][$language]; ?></th><td id="country_c"></td></tr>
                                    <tr><th><?php echo $translations['A00171'][$language]; ?></th><td id="phone_c"></td></tr>
                                    <tr><th><?php echo $translations['A00195'][$language]; ?></th><td id="email_c"></td></tr>
                                    <tr><th><?php echo $translations['A00154'][$language]; ?></th><td id="sponsorUsername_c"></td></tr>
                                    <!-- <tr><th><?php echo $translations['A00198'][$language]; ?></th><td id="placementUsername_c"></td></tr> -->
<!--                                    <tr><th>--><?php //echo $translations['A00821'][$language]; ?><!--</th><td id="investmentAmount_c"></td></tr>-->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a type="button" class="btn btn-default" data-dismiss="modal" style="border-radius: 0 !important; border: none !important;">
                            <?php echo $translations['A00660'][$language]; /* cancel */ ?>
                        </a>
                        <a type="button" class="btn btn-primary" data-dismiss="modal" data-target="" data-toggle="modal" data-backdrop="static" data-keyboard="false" onclick="confirmRegistrationPass()">
                            <?php echo $translations['A00123'][$language]; /* confirm */ ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade in" id="successModal" role="dialog" style="display: none; padding-right: 17px;">
        <div class="modal-dialog" role="document" style="width: 400px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><span><?php echo $translations['A00732'][$language]; /* Congratulations! */ ?></span></h4>
                </div>
                <div class="modal-body">
                    <div id="canvasAlertMessage" class="alert alert-info">
                        <input id="typeBox" type="hidden">
                        <span id="successAlertMessage"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary waves-effect waves-light" data-dismiss="modal" onclick="redirectGoBack();">Close</button>
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
        
        var url             = 'scripts/reqClient.php';
        var method          = 'POST';
        var debug           = 0;
        var bypassBlocking  = 0;
        var bypassLoading   = 0;
        var position        = "";
        var codeNum         = "";
        var type            = "<?php echo $_GET['type']; ?>";
        var fullName;
        var username;
        var country;
        var identityNumber;
        var dialingArea;
        var phone;
        var password;
        var checkPassword;
        var tPassword;
        var checkTPassword;
        var dateOfBirth;
        var sponsorName;
        var placementUsername;
        var placementPosition;

        
        $(document).ready(function() {
            fullName            = "<?php echo $_POST['fullName']; ?>";
            username            = "<?php echo $_POST['username']; ?>";
            identityNumber      = "<?php echo $_POST['identityNumber']; ?>";
            address             = "<?php echo $_POST['address']; ?>";
            country             = "<?php echo $_POST['country']; ?>";
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
            investmentAmount    = "<?php echo $_POST['investmentAmount']; ?>";

            // registerType(type);

            $('#dateOfBirth').datepicker({
                autoclose: true,
                format: "dd-mm-yyyy"
            });

            var formData  = {
                command   : "getRegistrationDetailAdmin",
            };
            var fCallback = registerDetails;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);


            $('#nextBtn').click(function() {
                $('.customError').text('');

                fullName = $('#fullName').val();
                username = $('#username').val();
                country = $('#country').find('option:selected').val();
                identityNumber = $('#identityNumber').val();
                dialingArea = $('#phoneDialing').val();
                email = $('#email').val();
                phone = $('#phone').val();
                password = $('#password').val();
                checkPassword = $('#retypePassword').val();
                tPassword = $('#transactionPassword').val();
                checkTPassword = $('#retypeTPassword').val();
                dateOfBirth = $('#dateOfBirth').val();
                sponsorUsername = $('#sponsorUsername').val();
                placementUsername = $('#placementUsername').val();
                placementPosition = $("input[name=placementPosition]:checked").val();

                var formData = {
                    command         : "memberRegistration",
                    registerType    : 'free',
                    fullName        : fullName,
                    username        : username,
                    identityNumber  : identityNumber,
                    country         : country,
                    dialingArea     : dialingArea,
                    phone           : phone,
                    email           : email,
                    password        : password,
                    checkPassword   : checkPassword,
                    tPassword       : tPassword,
                    checkTPassword  : checkTPassword,
                    dateOfBirth     : dateOfBirth,
                    sponsorUsername : sponsorUsername,
                    placementUsername : placementUsername,
                    placementPosition : placementPosition,
                };

                var fCallback = goConfirmation;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

                $('#memberRegistrationForm').find('span[class="customError text-danger"]').each(function() {
                    $(this).text('');
                });
            });

            // reset to default search
            $('#resetBtn').click(function() {
                $('#memberRegistrationForm').find('input').each(function() {
                   $(this).val(''); 
                });
                $('#memberRegistrationForm').find('select').each(function() {
                   $(this).val(''); 
                });
                $('#memberRegistrationForm').find('input[name="role"]:checked').removeAttr('checked');
                $('#memberRegistrationForm').find('a[class="tablinks m-b-rem1 active"]').removeClass("tablinks m-b-rem1 active").addClass("tablinks m-b-rem1");
                $('#memberRegistrationForm').find('span[class="customError text-danger"]').each(function() {
                   $(this).text(''); 
                });
                $('#memberRegistrationForm').find('textarea').each(function() {
                   $(this).val(''); 
                });
            });
        });

        function goConfirmation(data, message) {
            console.log(data);
            $('#confirmationDetails').modal('show');
            $('#fullname_c').text(fullName);
            $('#username_c').text(username);
            $('#identityNumber_c').text(identityNumber);
            $('#country_c').text(data.countryDisplay);
            $('#dateOfBirth_c').text(dateOfBirth);
            $('#phone_c').text(dialingArea+" "+phone);
            $('#email_c').text(email);
            $('#sponsorUsername_c').text(sponsorUsername);
            $('#placementUsername_c').text(placementUsername);

            if (placementPosition == 1) {
                $('#placementPosition_c').text('Left');
            } else if (placementPosition == 2) {
                $('#placementPosition_c').text('Right');
            }
        }

        function confirmRegistrationPass() {
            var formData = {
                command             : "memberRegistrationConfirmation",
                registerType        : 'free', 
                fullName            : fullName, 
                username            : username, 
                country             : country, 
                identityNumber      : identityNumber, 
                dialingArea         : dialingArea,
                email               : email, 
                phone               : phone, 
                password            : password, 
                checkPassword       : checkPassword, 
                tPassword           : tPassword, 
                checkTPassword      : checkTPassword, 
                dateOfBirth         : dateOfBirth,
                sponsorUsername     : sponsorUsername,
                placementUsername   : placementUsername, 
                placementPosition   : placementPosition,
            };

            var fCallback = successConfirmation;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }

        function successConfirmation(data, message) {
            showMessage(message, 'success', '<?php echo $translations['A00732'][$language]; /* Congratulations! */ ?>', '', 'memberRegistration.php');
        }

        function registerDetails(data, message) {
            var countriesList = data.countriesList;
            var stateList     = data.stateList;
            var cityList      = data.cityList;
            var countyList    = data.countyList;
            var pacDetails    = data.pacDetails;
                position      = data.placementPosition;
            if(countriesList) {
                $.each(countriesList, function(key) {
                    $('#country').append('<option id="'+countriesList[key]['id']+'" data-code="'+countriesList[key]['countryCode']+'" value="'+countriesList[key]['id']+'" name="'+countriesList[key]['name']+'">'+countriesList[key]['name']+'</option>');
                });
            }

            $('#country').on('change', function() {
                var countryID = this.value;
                $("#phoneDialing").val($('#country').find('option:selected').attr('data-code'));

              
                /*$('#state').empty();
                $('#state').append('<option value="">' + defaultText + '</option>');
                $('#state').trigger('change');
                if (stateList){
                    $.each(stateList, function(key, value) {
                        if (value['country_id'] == countryID && value['country_id'] !== 0)
                        $('#state').append('<option id="'+value['id']+'" value="'+value['id']+'" name="'+value['name']+'">'+value['name']+'</option>');
                    });
                }*/
            });

            /*$('#state').on('change', function() {
                var stateID = this.value;
                var defaultText = "<?php echo $translations['A00965'][$language]; /* ——Please select a City—— */ ?>";
                $('#city').empty();
                $('#city').append('<option value="">' + defaultText + '</option>');
                $('#city').trigger('change');
                if (cityList){
                    $.each(cityList, function(key, value) {
                        if (value['state_id'] == stateID && value['state_id'] !== 0)
                            $('#city').append('<option id="'+value['id']+'" value="'+value['id']+'" name="'+value['name']+'">'+value['name']+'</option>');
                    });
                }
            });

            $('#city').on('change', function() {
                var cityID = this.value;
                var defaultText = "<?php echo $translations['A00966'][$language]; /* ——Please select a County—— */ ?>";
                $('#county').empty();
                $('#county').append('<option value="">' + defaultText + '</option>');
                if (countyList){
                    $.each(countyList, function(key, value) {
                        if (value['city_id'] == cityID && value['city_id'] !== 0)
                            $('#county').append('<option id="'+value['id']+'" value="'+value['id']+'" name="'+value['name']+'">'+value['name']+'</option>');
                    });
                }
            });*/

            /*if(pacDetails) {
                $.each(pacDetails, function(key, value) {
                    if(type == 'package') {
                        $('#packagePac').append('<div class="col-sm-3"><div class="text-center packageBox"><a class="tablinks m-b-rem1" id="'+ value['id'] +'" onclick="selection.call(this)" style="border: 1px solid #ddd; width: 100%;"><span class="text-20">'+ value["name"] +'</span><hr style="margin: 5px;"><span class="text-12"><?php echo $translations['A00206'][$language]; /* Bonus Value */ ?> '+ value["value"] +'</span><h3>'+ value["price"] +'</h3></a></div></div>');
                    }
                    else if(type == 'free') {
                    $('#packagePac').append('<div class="col-sm-3"><div class="text-center packageBox"><a class="tablinks m-b-rem1" id="'+ value['id'] +'" onclick="selection.call(this)" style="border: 1px solid #ddd; width: 100%;"><span class="text-20">'+ value["name"] +'</span><hr style="margin: 5px;"><span class="text-12">0</span><h3>0.00</h3></a></div></div>');
                    }
                });
            }
            if(position) {
                if(position == 2) {
                    $('#placementPosition2').show();
                }
                else if(position ==3) {
                    $('#placementPosition3').show();
                }
            }*/
            // when return back will be receive data here
            $('#fullName').val(fullName);
            $('#username').val(username);
            $('#identityNumber').val(identityNumber);
            $('#address').val(address);
            $('#country').val(country);
            $('#country').trigger('change');
            $('#state').val(stateID);
            $('#state').trigger('change');
            $('#city').val(cityID);
            $('#city').trigger('change');
            $('#county').val(countyID);
            $('#phoneDialing').val(dialingArea);
            $('#phone').val(phone);
            $('#email').val(email);
            $('#password').val(password);
            $('#transactionPassword').val(transactionPassword);
            $('#sponsorUsername').val(sponsorUsername);
            $('#placementUsername').val(placementUsername);
            $('#investmentAmount').val(investmentAmount);
        }

        function selection() {
            $('#packagePac').each(function(key, value){
                $(this).find("a").removeClass("active");
            });
        }

    


</script>
</body>
</html>
