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
                                        <form role="form" id="editModuleSettings" data-parsley-validate novalidate>
                                            <div class="form-group" hidden>
                                                <label for="moduleId">id</label>
                                                <input id="moduleId" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Module Name</label>
                                                <input id="moduleName" type="text" class="form-control" disabled required>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Disabled</label>
                                                <div class="m-b-20">
                                                    <div class="radio radio-info radio-inline">
                                                        <input type="radio" id="disabled" value="1" name="disabled">
                                                        <label for="inlineRadio1"> On </label>
                                                    </div>
                                                    <div class="radio radio-inline">
                                                        <input type="radio" id="disabled" value="0" name="disabled">
                                                        <label for="inlineRadio2"> Off </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Payment</label>
                                                <div class="m-b-20">
                                                    <div class="radio radio-info radio-inline">
                                                        <input type="radio" id="payment" value="1" name="payment">
                                                        <label for="inlineRadio1"> On </label>
                                                    </div>
                                                    <div class="radio radio-inline">
                                                        <input type="radio" id="payment2" value="0" name="payment">
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
                            <!-- <button type="submit" class="btn btn-default waves-effect waves-light">Cancel</button> -->
                            <button id="editSetting" type="submit" class="btn btn-primary waves-effect waves-light">Confirm</button>
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
        var settingId = window.location.search.substr(1).split("=");
        settingId = settingId[1];
        if(settingId != '') {
            var formData = {
                'command': 'getModuleSettingData',
                'settingId' : settingId
            };
            fCallback = loadEdit;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }

        $('#editSetting').click(function() {
            var validate = $('#editModuleSettings').parsley().validate();
            if(validate) {
                var moduleName = $('#moduleName').val();
                var disabled =  $("input[name='disabled']:checked").val();
                var payment = $("input[name='payment']:checked").val();

                var formData = { "settingId" : settingId,
                                 command    : "editModuleSettingData", 
                                 "moduleName": moduleName, 
                                 "disabled"  : disabled, 
                                 "payment"   : payment, 
                            };
                fCallback = sendEdit;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }
        });
    });

    function loadEdit(data, message) {
        $.each(data.moduleSettingData, function(key, val) {
            if((key == 'disabled' || key == 'payment')) {
                $("input[name="+key+"][value="+val+"]").attr('checked', 'checked');
            }else {
                $('#'+key).val(val);
            }

        });
    }

    function sendEdit(data, message) {
        showMessage('Setting successfully updated.', 'success', 'Edit Module Setting', 'Module Setting', 'moduleSettingList.php');
    }
</script>
</html>