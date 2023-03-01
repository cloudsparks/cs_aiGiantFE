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
                            <?php echo $translations['A00115'][$language]; /* Back */ ?>
                        </a>
                    </div><!-- end col -->
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box p-b-0">
                            <h4 class="header-title m-t-0 m-b-30">
                                <?php echo $translations["A00994"][$language]?>
                            </h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <form role="form" id="newPaymentMethod" data-parsley-validate novalidate>
                                        <div id="basicwizard" class=" pull-in">
                                            <div class="tab-content b-0 m-b-0 p-t-0">
                                                <div class="form-group">
                                                    <label for="paymentType">
                                                        <?php echo $translations["A00967"][$language]?>
                                                    </label>
                                                    <!-- <input id="paymentType" type="text" class="form-control" /> -->
                                                    <select id="paymentTypeOption" class="form-control" dataName="paymentType" dataType="select">
                                                    <!--     <option value="Registration">Registration</option>
                                                        <option value="Purchase Pin">Purchase Pin</option>
                                                        <option value="Package Repurchase">Package Repurchase</option> -->
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">
                                                        <?php echo $translations['A00988'][$language]; /* credit */?>
                                                    </label>
                                                    <select id="creditOption" class="form-control" dataName="creditType" dataType="select">
                                                        <!-- <option value="Active">Active</option>
                                                        <option value="Inactive">Inactive</option> -->
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">
                                                        <?php echo $translations['A00989'][$language]; /* min % */?>
                                                    </label>
                                                    <input id="minPercentage" type="number" class="form-control"  required/>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">
                                                        <?php echo $translations['A00990'][$language]; /* max % */?>
                                                    </label>
                                                    <input id="maxPercentage" type="number" class="form-control"  required/>
                                                </div>

                                                 <div class="form-group">
                                                    <label class="control-label">
                                                        <?php echo $translations['A00318'][$language]; /* Status */ ?>
                                                    </label>
                                                    <div id="status" class="m-b-20">
                                                        <div class="radio radio-info radio-inline">
                                                            <input type="radio" id="inlineRadio1" value="Active" name="radioInline" checked="checked"/>
                                                            <label for="inlineRadio1">
                                                                <?php echo $translations['A00372'][$language]; /* Active */?>
                                                            </label>
                                                        </div>
                                                        <div class="radio radio-inline">
                                                            <input type="radio" id="inlineRadio2" value="Inactive" name="radioInline"/>
                                                            <label for="inlineRadio2">
                                                                <?php echo $translations['A00373'][$language]; /* Inactive */?>
                                                            </label>
                                                        </div>
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
                            <!-- <button type="submit" class="btn btn-default waves-effect waves-light">Cancel</button> -->
                        <button id="add" type="submit" class="btn btn-primary waves-effect waves-light">
                            <?php echo $translations['A00123'][$language]; /* Confirm */ ?>
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
    var url             = 'scripts/reqAdmin.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
        
    var fCallback      = "";
    $(document).ready(function() {
        var formData = {
            command        : "getPaymentSettingDetails",
            // getActiveRoles : "getActiveRoles",
        };

        fCallback = loadFormDropdown;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        
        $('#add').click(function() {
            var validate = $('#newPaymentMethod').parsley().validate();
            if(validate) {
                showCanvas();
                var paymentType = $('#paymentTypeOption').find('option:selected').val();
                var creditType =  $('#creditOption').find('option:selected').val();
                var minPercentage = $('#minPercentage').val();
                var maxPercentage = $('#maxPercentage').val();
                var status   = $('#status').find('input[type=radio]:checked').val();
                
                var formData = {
                    command  : "addPaymentMethod",
                    paymentType : paymentType,
                    creditType : creditType,
                    minPercentage : minPercentage,
                    maxPercentage : maxPercentage,
                    status   : status
                };
                var fCallback = sendNew;

                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }
        });
    });
    
    function loadFormDropdown(data, message) {
        paymentType = data.paymentType;
        creditData = data.creditData;

        $.each(paymentType, function(key, value) {
            $('select#paymentTypeOption').append('<option value="' + value + '">' + value + '</option>');
        });

        $.each(creditData, function(key, value) {
            $('select#creditOption').append('<option value="' + value + '">' + value + '</option>');
        });
    }
    
    function sendNew(data, message) {
        showMessage('<?php echo "Successful created new payment method"; /* Successful created new payment method. */ ?>', 'success', '<?php echo "Create New Payment Method"; /* Create New Payment Method */ ?>', 'user-plus', 'creditPaymentSetting.php');
    }
</script>
</body>
</html>
