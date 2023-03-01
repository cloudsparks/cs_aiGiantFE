<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>

<link href="css/login.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />

<body  class="kt-page--loading-enabled kt-page--loading kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header--minimize-topbar kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-page--loading">

    <section class="loginPage">
        <div class="w-100 p-2">
            <div class="btn-group languageDropdown">
                <span type="" class="languageFont" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="cursor: pointer;">
                    <img class="mr-3" src="images/project/globe.png" alt="" width="20px">
                    <span><?php echo $config["languages"][$language]['displayName'] ?></span>
                    <span><i class="fa fa-angle-down ml-3" style="color: black;"></i></span>
                </span>
                <div class="dropdown-menu dropdown_language">
                    <?php $languages = $config['languages']; ?>
                    <?php foreach($languages as $key => $value) { 
                        if ($key=="chineseSimplified" || $key=="chineseTraditional") {
                            $flag="chinese";
                        }else if ($key == "korean"){
                            $flag="korean";
                        }else if ($key == "vietnam"){
                            $flag="vietnam";
                        }else if ($key == "japanese"){
                            $flag="japanese";
                        }else if($key == 'english'){
                            $flag="english";
                        }else if ($key == "thailand"){
                            $flag="thai";
                        }
                        ?>
                        <a href="javascript:void(0)" class="changeLanguage dropdown-item" language="<?php echo $key; ?>" style="margin-top: 0;margin-bottom: 0;">
                            <img style="width: 20px;margin-right: 5px;" src ="images/language/<?php echo $flag; ?>.png">
                            <?php echo $languages[$key]['displayName']; ?>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="kt-container loginWrap">
            <div class="col-12 mx-auto">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-6 col-lg-5">
                        <div class="loginForm">
                            <div class="col-12 px-0">
                                <a href="/login">
                                    <img src="images/logo/logo2.png" class="loginLogo">
                                </a>
                                <div class="loginMask">
                                    <div class="row">
                                        <div class="col-12 mt-4 mb-4 text-center loginFont01">
                                            Welcome Back
                                        </div>
                                        <div class="col-12 mt-3">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa fa-user"></i></div>
                                                </div>
                                                <input id="username" type="text" class="form-control" placeholder="<?php echo $translations['M00001'][$language]; //Username ?>">
                                            </div>
                                        </div>
                                        <div class="col-12 mt-3">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa fa-lock"></i></div>
                                                </div>
                                                <input id="password" type="password" class="form-control" placeholder="<?php echo $translations['M00002'][$language]; //Password ?>">
                                                <i class="far fa-eye eyeIco"></i>
                                            </div>
                                        </div>
                                        <div class="col-12 text-right">
                                            <a href="resetPassword" class="btn forgotPasswordBtn"><span data-lang='M00203'><?php echo $translations['M00203'][$language]; //Forgot password? ?></span></a>
                                        </div>
                                        <div class="col-12 mt-4">
                                            <div class="input-group">
                                                <div class="input-group-prepend" style="margin-bottom: 3px;">
                                                    <div class="input-group-text"><i class="fa fa-shield"></i></div>
                                                </div>
                                                <input id="captcha" type="text" class="form-control" placeholder="<?php echo $translations['M00003'][$language]; //Security Code ?>">
                                                <div class="input-group-append">
                                                    <img id="captchaImage" class="ml-2" src="captcha.php?" style="width: 100px;">
                                                </div>                                            
                                            </div>
                                        </div>
                                        
                                        <div class="col-12 mt-5 text-center">
                                            <button id="loginBtn" class="btn btn-login" data-lang='M00374'><?php echo $translations['M00374'][$language]; //Login ?></button>
                                        </div>
                                        <div class="col-12 mt-3 text-center">
                                            <span>Do not have an account?</span>
                                            <a class="btn forgotPasswordBtn ml-1" href="publicRegistration" data-lang=''>
                                                Register Now!
                                            </a>
                                            
                                        </div>
                                    </div>
                                </div>
                                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
     <div class="modal fade" id="captchaModal" tabindex="-1" role="dialog" aria-modal="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content noBackground">
            <div class="slidercaptcha card">
                <div class="card-header">
                    <span>
                      <?php echo $translations['M01626'][$language]; //Security Verification ?>
                    </span>
                </div>
                <div class="card-body">
                    <div id="captcha1"></div>
                </div>
            </div>
          </div>
            
        </div>
    </div>

<?php include 'sharejs.php'; ?>

</body>


</html>

<script>

    $(document).ready(function(){
        var url             = 'scripts/reqLogin.php';
        var method          = 'POST';
        var debug           = 0;
        var bypassBlocking  = 0;
        var bypassLoading   = 0;
        var fCallback = "";

        var jvcUsername = localStorage.getItem("jvcUsername");
          var jvcPassword = localStorage.getItem("jvcPassword");
        $('#username').val(jvcUsername);

         $('#password').val(jvcPassword);
        if(jvcUsername) {
            $("#rememberMeCheck").prop("checked", true);
        }
         if(jvcPassword) {
            $("#rememberMeCheck").prop("checked", true);
        }

        // default login type
        var loginType = "username";

        var id        = "<?php echo $_POST['id']; ?>";
        var username  = "<?php echo $_POST['username']; ?>";

        if (id && username) {
            var formData  = {
                'command'   : 'memberLogin',
                'id'        : id,
                'loginType' : "username",
                'username'  : username
            };

            validateLogin(formData);
        }

        $('#secureCodeRefresh').click(function(event) {
            $("#captchaImage").attr("src", "captcha.php?" + Math.round(new Date().getTime() / 1000));
            $('input#captcha').val("");
        });

        $("body").keyup(function(event) {
            if (event.keyCode == 13) {
                $("#loginBtn").click();
            }
        });

        $('#loginBtn').click(function(){
            $('#loginError').hide();
            var username = $('#username').val();
            var password = $('#password').val();
            var captcha = $('#captcha').val();

            $("input").each(function(){
                $(this).removeClass('is-invalid');
                $('.invalid-feedback').html("");
            });

            $('#secureCodeRefresh').parent().removeClass('inputError');

            showCanvas();

            var formData  = {
                'command'   : 'memberLogin',
                'username'  : username,
                'password'  : password,
                'loginType' : loginType,
                'captcha'   : captcha
            };

            validateLogin(formData);
        });

    });

    function validateLogin(formData){
        startRecordTime("Login Performance");
        $.ajax({
                    type     : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                    url      : 'scripts/reqLogin.php', // the url where we want to POST
                    data     : formData, // our data object
                    dataType : 'text', // what type of data do we expect back from the server
                    encode   : true
                })
        .done(function(data) {
            var obj = JSON.parse(data);
            hideCanvas();
            if(obj.status == "ok") {
                var rememberMeCheck = $("#rememberMeCheck").is(":checked");
                if(rememberMeCheck) {
                    var username = $('#username').val();
                    var password = $('#password').val();
                    localStorage.setItem("jvcUsername", username);
                        localStorage.setItem("jvcPassword", password);
                }else{
                    localStorage.removeItem("jvcUsername", username);
                    localStorage.removeItem("jvcPassword", password);
                }
                window.location.href = "dashboard";
            }
            else {
                refreshCaptcha();
                if(obj.statusMsg != '')
                {
                    if(obj.data != null && obj.data.field)
                            showCustomErrorField(obj.data.field, obj.statusMsg);
                        else
                            errorHandler(obj.code, obj.statusMsg);
                }
            }
        });
    }

    function refreshCaptcha(){
        $('input#captcha').val("");
        $("#captchaImage").attr("src", "captcha.php?" + Math.round(new Date().getTime() / 1000));
    }

</script>
