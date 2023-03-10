<!DOCTYPE html>
<html>
    <?php include("head.php"); ?>

        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">
            <div class="text-center">
                <a href="pageLogin.php" class="logo">
                    <!-- <?php echo "<img src=\"".$config["logoURL"]."\" alt=\"LOGO\" width=\"250\">"; ?> -->
                    <?php echo "<img src=\"images/logo/logo.png\" alt=\"LOGO\" width=\"100\">"; ?>
                </a>
                <h5 class="text-muted m-t-10 font-600">
                    <?php echo $translations['A00772'][$language]; /* Admin */ ?>
                </h5>
            </div>
            <div class="m-t-40 card-box text-center">
                <div class="col-md-12">
                  <div class="text-right">
                     <div class="dropdown pull-right">
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                           <i class="fa fa-globe pull-right languageButtonLogin"></i>
                       </a>
                       <div class="dropdown-menu dropdown-custom dropdown-menu-right">
                          <li> 
                             <?php $languages = $config['languages']; ?>
                             <?php foreach($languages as $key => $value) { ?>
                             <a href="javascript:void(0)" class="changeLanguage dropdown-item" language="<?php echo $key; ?>">
                                <?php echo $value; ?>
                            </a>
                            <?php } ?>
                        </li>
                        
                    </div>
                </div>
                     
                </div>
            </div>
                <div id="loginError" class="alert alert-danger" style="display: none;">
                </div>
                <div class="text-center">
                    <h4 class="text-uppercase font-bold m-b-0">
                        <?php echo $translations['A00773'][$language]; /* Sign In */ ?>
                    </h4>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal m-t-20" action="">

                        <div class="form-group ">
                            <div class="col-md-12">
                                
                                <input id="userName" class="form-control" type="text" required="" placeholder="<?php echo $translations['A00102'][$language]; /* Username */ ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <input id="password" class="form-control" type="password" required="" placeholder="<?php echo $translations['A00120'][$language]; /* Password */ ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <!-- <label>
                                    <?php echo $translations['M00106'][$language]; /* Security Code */ ?>
                                </label> -->
                                <div class="controls input-group">
                                    <input autocomplete="off" id="captcha" type="text" class="form-control" name="text" placeholder="<?php echo $translations['A01631'][$language]; /* Security Code */ ?>" required>
                                    <span class="input-group-addon"><img id="captchaImage" src="captcha.php?" class=""><i class="fa fa-refresh" style="cursor:pointer;margin-left:5px"></i></span>
                                </div>
                            </div>


                        
                        </div>


<!--    
                        <div class="form-group text-center m-t-30">
                            <div class="col-xs-12">
                                <button class="" >Sign In</button>
                            </div>
                        </div>
-->

                        <!-- <div class="form-group m-t-30 m-b-0">
                            <div class="col-sm-12">
                                <a href="pageRecoverPw.php" class="text-muted"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                            </div>
                        </div> -->
                    </form>
                    <div class="form-group text-center m-t-30">
                        <div class="col-xs-12">
                            <button id="pageLoginBtn" class="btn btn-primary waves-effect w-md waves-light m-b-20" onclick="validateForm();" >
                                <?php echo $translations['A00774'][$language]; /* Sign In */ ?>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card-box-->

        </div>
        <!-- end wrapper page -->
        
        <script>
            var resizefunc = [];
        </script>

    <!-- jQuery  -->
    <?php include("shareJs.php"); ?>
    
    <script type="text/javascript">
        $('i.fa-refresh').click(function(event) {
            $("#captchaImage").attr("src", "captcha.php?" + Math.round(new Date().getTime() / 1000));
            $('input#captcha').val("");
        });

        $('.wrapper-page').keypress(function(e){
            if(e.which == 13){//Enter key pressed
                $('#pageLoginBtn').click();//Trigger enter button click event
            }
        });
        function validateForm() {
            showCanvas();
            $('#loginError').css('display', 'none');
            var userName = $('#userName').val();
            var password = $('#password').val();
            var captcha   = $('#captcha').val();
            var formData = {
                'command': 'adminLogin',
                'username': userName,
                'password': password,
                'captcha' : captcha
            };
            
            $.ajax({
                type    : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                url     : 'scripts/reqLogin.php', // the url where we want to POST
                data    : formData, // our data object
                dataType: 'text', // what type of data do we expect back from the server
                encode  : true
            })
            .done(function(data) {
                var obj = JSON.parse(data);
                hideCanvas();
                if(obj.status == "ok") {
                    $('#loginError').html('').css('display', 'none');
                    var permissions = obj.data.permissions;

                    if (!permissions) {
                        $('#loginError').html('<span>You have no permissions to login</span>').css('display', 'block');
                    }
                    else {
                        
                        window.location.href = "whoIsOnline.php";
                        return true;

                        $.each(permissions, function(key,value){
                            if (value['file_path']) {
                                window.location.href = value['file_path'];
                                return false;
                            }
                        });
                    }
                }
                else {
                    $('input#captcha').val("");
                    $("#captchaImage").attr("src", "captcha.php?" + Math.round(new Date().getTime() / 1000));
                    var message = '<?php echo $translations['A00775'][$language]; /* Invalid credentials */ ?>';
                    if (obj.statusMsg != '')
                        message = obj.statusMsg;
                    $('#loginError').html('<span>' + message + '</span>').css('display', 'block');
                }
            });
        }
    </script>
</html>
