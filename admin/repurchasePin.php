<?php
session_start();

// Get current page name
$thisPage = basename($_SERVER['PHP_SELF']);

// Check the session for this page
// if(!isset ($_SESSION['access'][$thisPage]))
//     echo '<script>window.location.href="accessDenied.php";</script>';
// else
//     $_SESSION['lastVisited'] = $thisPage;
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
                    <!-- Start col -->
                    <div class="col-sm-4">
                        <a href="reentryPinPackage.php" class="btn btn-primary btn-md waves-effect waves-light m-b-20">
                            <i class="md md-add"></i>
                            <?php echo $translations['A00115'][$language]; /* Back */ ?>
                        </a>
                    </div>
                    <!-- End col -->
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box p-b-0">
                            <div class="row">
                                <ul class="nav nav-tabs">
                                    <li id="repurchasePinTab" class="active">
                                        <a data-toggle="tab">
                                            <?php echo $translations['A00701'][$language]; /* Re-purchase Pin */ ?>
                                        </a>
                                    </li>
                                    <!-- <li id="repurchasePackageTab">
                                        <a data-toggle="tab">
                                            <?php echo $translations['A00702'][$language]; /* Re-purchase Package */ ?>
                                        </a>
                                    </li> -->
                                </ul>
                                <div class="tab-content m-b-30">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <form role="form" id="repurchasePin" data-parsley-validate novalidate>
                                                <div id="basicwizard" class=" pull-in">
                                                    <div class="tab-content b-0 m-b-0 p-t-0">
                                                        <div class="form-group">
                                                            <label class="col-sm-6">
                                                                <?php echo $translations['A00117'][$language]; /* Full name */ ?> :
                                                            </label>
                                                            <span id="fullname"></span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-6">
                                                                <?php echo $translations['A00102'][$language]; /* Username */ ?> :
                                                            </label>
                                                            <span id="username"></span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-6">
                                                                <?php echo $translations['A00154'][$language]; /* Sponsor Username */ ?> :
                                                            </label>
                                                            <span id="sponsorUsername"></span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-6">
                                                                <?php echo $translations['A00574'][$language]; /* Sponsor ID */ ?> :
                                                            </label>
                                                            <span id="sponsorId"></span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-6">
                                                                <?php echo $translations['A00198'][$language]; /* Placement Username */ ?> :
                                                            </label>
                                                            <span id="placementUsername"></span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-6">
                                                                <?php echo $translations['A00582'][$language]; /* Placement ID */ ?> :
                                                            </label>
                                                            <span id="placementId"></span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-6">
                                                                <?php echo $translations['A00199'][$language]; /* Placement position */ ?> :
                                                            </label>
                                                            <span id="placementPosition"></span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-6">
                                                                <?php echo $translations['A00204'][$language]; /* Pin */ ?> :
                                                            </label>
                                                            <input id="pin" type="text" class="form-control"/>
                                                            <span id="pinCodeError" class="customError text-danger"></span>
                                                        </div>

                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 m-b-20">
                            <button id="submit" class="btn btn-primary waves-effect waves-light">
                                <?php echo $translations['A00123'][$language]; /* Confirm */ ?>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <?php include("footer.php"); ?>
        </div>
    </div>
    <script>
        var resizefunc     = [];
    </script>
    <?php include("shareJs.php"); ?>
    <script>
        var url            = 'scripts/reqClient.php';
        var method         = 'POST';
        var debug          = 0;
        var bypassBlocking = 0;
        var bypassLoading  = 0;
        var clientId       = "<?php echo $_POST['clientId'] ?>";

        $(document).ready(function() {
            // if id empty return back reentryPinPackage.php 
            if(!clientId) {
                var message  = '<?php echo $translations['A00178'][$language]; /* Client does not exist */ ?>';
                showMessage(message, '', '<?php echo $translations['A00727'][$language]; /* Error */ ?>', 'exclamation-triangle', 'reentryPinPackage.php');
                return;
            }
            
            var formData   = {
                command    : "getClientRepurchasePinDetail",
                clientId   : clientId
            };
            var fCallback  = loadPinDetail;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

            //repurchasePackage page
            $('#repurchasePackageTab').click(function() {
                $.redirect('repurchasePackage.php', {clientId : clientId});
            });

            $('#submit').click(function() {
                $('.customError').text('');
                var validate = $('#repurchasePin').parsley().validate();
                if(validate) {

                    var formData = {
                        command         : "reentryConfirmation",
                        pinNumber       : $('#pin').val(),
                        receiverId      : clientId,
                        type            : 'pin',
                    }
                    var fCallback = sendEdit;
                    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
                }
            });
        });

        function loadPinDetail(data, message){

            $('#fullname').text(data.name);
            $('#username').text(data.username);
            $('#sponsorUsername').text(data.sponsor_username);
            $('#sponsorId').text(data.sponsor_id);
            $('#placementUsername').text(data.placement_username);
            $('#placementId').text(data.placement_id);
            $('#placementPosition').text(data.client_position);

        }

        function sendEdit(data, message) {
            showMessage('<?php echo $translations['A00712'][$language]; /* Repurchased pin */ ?>', 'success', '<?php echo $translations['A00712'][$language]; /* Repurchased pin */ ?>', 'edit', 'reentryPinPackage.php');
        }
        
</script>
</body>
</html>
