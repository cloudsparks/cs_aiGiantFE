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
                         <a href="creditPaymentSetting.php" class="btn btn-primary btn-md waves-effect waves-light m-b-20">
                            <i class="md md-add"></i>
                            <?php echo $translations['A00126'][$language]; /* Back */ ?>
                        </a>
                    </div><!-- end col -->
                </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-box p-b-0">
                                <h4 class="header-title m-t-0 m-b-30">
                                    <?php echo $translations["A00987"][$language]?>
                                </h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <form id="editPaymentMethod" role="form" data-parsley-validate novalidate>
                                             <div class="form-group" hidden>
                                                <label>
                                                ID
                                                </label>
                                                <input id="ID" type="text" class="form-control" disabled/>
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    <?php echo $translations["A00967"][$language]?>
                                                </label>
                                                <input id="payment_type" type="text" class="form-control" disabled/>
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    <?php echo $translations['A00988'][$language]; /* credit */?>
                                                </label>
                                                <input id="credit_type" type="text" class="form-control" disabled/>
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    <?php echo $translations['A00989'][$language]; /* min % */?>
                                                </label>
                                                <input id="min_percentage" type="number" class="form-control" required/>
                                            </div>
                                            <div class="form-group">
                                                <label for="">
                                                    <?php echo $translations['A00990'][$language]; /* max % */?>
                                                </label>
                                                <input id="max_percentage" type="number" class="form-control" required/>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">
                                                    <?php echo $translations['A00318'][$language]; /* Status */?>
                                                </label>
                                                <select id="status" class="form-control">
                                                    <option value="Active"><?php echo $translations['A00372'][$language]; /* Active */?></option>
                                                    <option value="Inactive"><?php echo $translations['A00373'][$language]; /* Inactive */?></option>
                                                </select>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 m-b-20">
                            <!-- <button type="submit" class="btn btn-default waves-effect waves-light">Cancel</button> -->
                            <button id="edit" type="submit" class="btn btn-primary waves-effect waves-light">
                                <?php echo $translations['A00134'][$language]; /* Confirm */ ?>
                            </button>
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
    var url            = 'scripts/reqAdmin.php';
    var method         = 'POST';
    var debug          = 0;
    var bypassBlocking = 0;
    var bypassLoading  = 0;
    var role           = [];

    var fCallback      = "";
    $(document).ready(function() {
        // var formData = {
        //     command        : "getRoles",
        //     getActiveRoles : "getActiveRoles",
        // };

        // fCallback = loadFormDropdown;
        // ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        
        editId    = "<?php echo $_POST['id']; ?>";

        if(editId) {
            var formData = {
                            'command': 'getPaymentMethodDetails',
                            'id'     : editId
            };
            fCallback = loadEdit;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }
        else{
            window.location = 'creditPaymentSetting.php';
        }
        
        $('#edit').click(function() {
            var validate = $('#editPaymentMethod').parsley().validate();
            if(validate) {
                showCanvas();
                var id       = $('input#ID').val();
                var paymentType = $('input#payment_type').val();
                var creditType = $('input#credit_type').val();
                var minPercentage    = $('input#min_percentage').val();
                var maxPercentage   = $('input#max_percentage').val();
                var status   = $('#status').find('option:selected').val();
                
                var formData = {
                    'command'        : 'editPaymentMethod',
                    'id'             : id,
                    'payment_type'   : paymentType,
                    'credit_type'    : creditType,
                    'min_percentage' : minPercentage,
                    'max_percentage' : maxPercentage,
                    'status'         : status
                };
                
                fCallback = sendEdit;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }
        }); 
    });
    
    function loadFormDropdown(data, message) {
        roleData = data.roleList;
        $.each(roleData, function(key) {
            $('#roleID').append('<option value="' + roleData[key]['id'] + '">' + roleData[key]['name'] + '</option>');
        });
    }
    
    function loadEdit(data, message) {
        $.each(data.settingDetail, function(key, val) {
            if(key == 'status') {
                $('#'+key).find('option[value="'+val+'"]').attr('selected', 'selected');
            }
            else {
                $('#'+key).val(val);
            }
        });
    }
    
    function sendEdit(data, message) {
        showMessage('<?php echo "Updated Payment Setting Successful"; /* Successful updated payment setting. */ ?>', 'success', '<?php echo "Update Payment Setting"; /* Update payment setting */ ?>', 'address-card', 'creditPaymentSetting.php');
    }
</script>
</body>
</html>
