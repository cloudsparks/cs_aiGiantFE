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
                <div class="row">
                    <div class="col-sm-4">
                         <a href="moduleSettingList.php" class="btn btn-primary btn-md waves-effect waves-light m-b-20"><i class="md md-add"></i>Back</a>
                    </div><!-- end col -->
                </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-box p-b-0">
                                <h4 class="header-title m-t-0 m-b-30">Module Setting</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <form role="form" id="addNewModuleSettings" data-parsley-validate novalidate>
                                            <div class="form-group">
                                                <label for="">Module Name</label>
                                                <input id="moduleName" type="text" class="form-control"  required>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Disabled</label>
                                                <div class="m-b-20">
                                                    <div class="radio radio-info radio-inline">
                                                        <input type="radio" id="disabled" value="1" name="disabled" checked="">
                                                        <label for="inlineRadio1"> On </label>
                                                    </div>
                                                    <div class="radio radio-inline">
                                                        <input type="radio" id="disabled" value="0" name="disabled" checked="">
                                                        <label for="inlineRadio2"> Off </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Payment</label>
                                                <div class="m-b-20">
                                                    <div class="radio radio-info radio-inline">
                                                        <input type="radio" id="payment" value="1" name="payment" checked="">
                                                        <label for="inlineRadio1"> On </label>
                                                    </div>
                                                    <div class="radio radio-inline">
                                                        <input type="radio" id="payment" value="0" name="payment" checked="">
                                                        <label for="inlineRadio2"> Off </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 m-b-20">
                            <button id="addNewSetting" type="submit" class="btn btn-primary waves-effect waves-light">Confirm</button>
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
    var url = 'scripts/reqSettings.php';
    var method = 'POST';
    var debug = 0;
    var bypassBlocking = 0;
    var bypassLoading = 0;

    $(document).ready(function() {
        $('#addNewSetting').click(function() {
            var validate = $('#addNewModuleSettings').parsley().validate();
            if(validate) {
                var moduleName = $('#moduleName').val();
                var disabled =  $("input[name='disabled']:checked").val();
                var payment = $("input[name='payment']:checked").val();

                var formData = { command     : "addModuleSetting", 
                                 "moduleName": moduleName, 
                                 "disabled"  : disabled, 
                                 "payment"   : payment, 
                            };
                var fCallback = sendNew;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }
        });
    });

    function sendNew(data, message) {
        showMessage('Module setting successfully created.', 'success', 'Add New Module Setting', 'Setting', 'moduleSettingList.php');
    }
</script>
</html>