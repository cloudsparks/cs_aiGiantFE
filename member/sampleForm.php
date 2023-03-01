<?php include 'include/config.php'; ?>
<?php
    session_start();

    if (in_array("Account Registration", $_SESSION['blockedRights']['Registration'])){
     header("Location: dashboard.php");
    }
?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>

<section class="pageContent">
    <div class="kt-container">
        <div class="col-12 pageTitle">
            <?php echo $translations['M00128'][$language]; //Registration ?>
        </div>
        <div class="col-12">
            <div class="row">
                <div class="col-lg-7 col-md-8">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row">
                                <label class="col-md-5"><?php echo $translations['M00177'][$language]; //Full Name ?> <span class="mustFill">*</span></label>
                                <div class="col-md-7">
                                    <input id="fullName" class="form-control inputDesign" type="text" value="<?php echo $_POST['fullName']; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-5"><?php echo $translations['M00104'][$language]; //Username ?> <span class="mustFill">*</span></label>
                                <div class="col-md-7">
                                    <input id="username" class="form-control inputDesign" type="text" value="<?php echo $_POST['username']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-5"><?php echo $translations['M00187'][$language]; //Email Address ?> <span class="mustFill">*</span>
                                </label>
                                <div class="col-md-7">
                                    <input id="email" class="form-control inputDesign" type="text" value="<?php echo $_POST['email']; ?>">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-md-5"><?php echo $translations['M00178'][$language]; //Country ?> <span class="mustFill">*</span></label>
                                <div class="col-md-7">
                                   <select id="country" class="form-control inputDesign"></select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-5"><?php echo $translations['M00188'][$language]; //Mobile Number ?> <span class="mustFill">*</span>
                                </label>
                                <div class="col-md-7">
                                    <div class="input-group px-0">
                                        <div class="input-group-append signupMobileFormRight"><span class="input-group-text phoneCodeStyle" id="phoneCode"> <?php echo $_POST['dialingArea']; ?> </span></div>
                                           <input id="phone" class="form-control inputDesign" type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '');" value="<?php echo $_POST['phone']; ?>">
                                    </div>
                                </div>
                            </div>

                        
                            <div class="form-group row">
                                <label class="col-md-5"><?php echo $translations['M00105'][$language]; //Password ?> <span class="mustFill">*</span></label>
                                <div class="col-md-7">
                                    <input id="password" class="form-control inputDesign" type="password" value="<?php echo $_POST['password']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-5"><?php echo $translations['M00191'][$language]; //Retype Password ?> <span class="mustFill">*</span></label>
                                <div class="col-md-7">
                                    <input id="checkPassword" class="form-control inputDesign" type="password" value="<?php echo $_POST['checkPassword']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-5"><?php echo $translations['M00192'][$language]; //Transaction Password ?> <span class="mustFill">*</span></label>
                                <div class="col-md-7">
                                    <input id="tPassword" class="form-control inputDesign" type="password" value="<?php echo $_POST['tPassword']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-5"><?php echo $translations['M00194'][$language]; //Retype Transaction Password ?> <span class="mustFill">*</span></label>
                                <div class="col-md-7">
                                    <input id="checkTPassword" class="form-control inputDesign" type="password" value="<?php echo $_POST['checkTPassword']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-5"><?php echo $translations['M01651'][$language]; //Sponsor Username ?> <span class="mustFill">*</span></label>
                                <div class="col-md-7">
                                    <input id="sponsorUsername" class="form-control inputDesign" type="text" value="<?php echo $_SESSION['username']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-5"><?php echo $translations['M00196'][$language]; //Placement Username ?> <span class="mustFill">*</span></label>
                                <div class="col-md-7">
                                    <input id="placementUsername" class="form-control inputDesign" type="text">
                                    <div id="placementPosition" class="kt-radio-inline loginRadio" style="margin-top: 5px;">
                                        <label class="kt-radio">
                                            <input type="radio" name="placementPosition" value="1"><?php echo $translations['M00198'][$language]; //Left ?>
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input type="radio" name="placementPosition" value="2"><?php echo $translations['M00200'][$language]; //Right ?>
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row my-5">
                                <div class="col-12">
                                    <button id="signUpBtn" type="button" class="btn btn-primary nextArrow" style="text-transform: uppercase;">
                                        <?php echo $translations['M00155'][$language]; //NEXT ?>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include 'footer.php'; ?>
</body>

<?php include 'backToTop.php' ?>

<?php include 'sharejs.php'; ?>


</html>

<script>

    var url             = 'scripts/reqDefault.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;

    //store data to forward next step
    var fullName;
    var username;
    var country;
    var identityNumber;
    var dialingArea;
    var phone;
    var email;
    var password;
    var checkPassword;
    var tPassword;
    var checkTPassword;
    var sponsorName;
    var placementUsername;
    var placementPosition;
    var registerType;
    var creditUnit;
    var produc;
    var fromSponsorDiagram;
    var getPlacementName;
    var getSponserUsername;

    $(document).ready(function(){
        //call for load countries (change command only)
        var formData  = {
            command   : "getRegistrationDetailMember"
        };
        var fCallback = loadCountries;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);


        //function for change country and country code
        $('#country').change(function(){
            var phoneCode = $('#country option:selected').attr('data-code');
            $('#phoneCode').text(phoneCode);
        });

        //Step 1 (verify) info
        $('#signUpBtn').click(function(){

            //refresh error message
            $('.invalid-feedback').remove();
            $('input').removeClass('is-invalid');

            //form data to verify
            fullName = $('#fullName').val();
            username = $('#username').val();
            email = $('#email').val();
            country = $('#country').find('option:selected').val();
            dialingArea = $('#phoneCode').text();
            phone = $('#phone').val();
            password = $('#password').val();
            checkPassword = $('#checkPassword').val();
            tPassword = $('#tPassword').val();
            checkTPassword = $('#checkTPassword').val();
            sponsorName = $('#sponsorUsername').val();
            placementUsername = $('#placementUsername').val();
            placementPosition = $("input[name=placementPosition]:checked").val();

            //build data needed to pass to backend verify
            var formData = {
                command : "memberRegistration",
                'registerType' : "free",
                'fullName' : fullName,
                'username' : username,
                'country' : country,
                'identityNumber' : identityNumber,
                'dialingArea' : dialingArea,
                'phone' : phone,
                'email' : email,
                'password' : password,
                'checkPassword' : checkPassword,
                'tPassword' : tPassword,
                'checkTPassword' : checkTPassword,
                'placementUsername' : placementUsername,
                'placementPosition' : placementPosition,
                sponsorName : sponsorName
            };

            var fCallback = publicRegistrationSuccess;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

                
            
        });
});

    //build country list
    function loadCountries(data,message){
        console.log(data);
        var countriesList = data.countriesList;

        if(countriesList) {
            $('#country').append(`<option value=""><?php echo $translations['M00179'][$language]; /* Please select a country */ ?></option>`);
            $.each(countriesList, function(key) {
                var selected = '';


                var countryDisplay = '';
                countryDisplay = countriesList[key]['display'];

                $('#country').append('<option value="'+countriesList[key]['id']+'" data-code="+'+countriesList[key]['countryCode']+'" name="'+countriesList[key]['name']+'" '+selected+'>'+countryDisplay+'</option>');
            });
            
            var phoneCode = $('#country option:selected').attr('data-code');
            $('#phoneCode').text(phoneCode);


        }

    }
    //if verify success will these data to next page for confirmation
function publicRegistrationSuccess() {
    $.redirect('sampleForm2.php', {
        fullName2 : fullName,
        username : username,
        country : country,
        identityNumber : identityNumber,
        dialingArea : dialingArea,
        phone : phone,
        email : email,
        password : password,
        checkPassword : checkPassword,
        tPassword : tPassword,
        checkTPassword : checkTPassword,
        sponsorName : sponsorName,
        fromSponsorDiagram : fromSponsorDiagram,
        placementUsername : placementUsername,
        placementPosition : placementPosition
    });
}




</script>