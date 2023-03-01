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
                        <a href="unitPriceList.php" class="btn btn-primary btn-md waves-effect waves-light m-b-20"><i class="md md-add"></i>
                            <?php echo $translations['A00115'][$language]; /* Back */?>
                        </a>
                    </div><!-- end col -->
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box p-b-0">
                            <h4 class="header-title m-t-0 m-b-30">
                                <?php echo $translations['A00359'][$language]; /* Add Unit Price */?>
                            </h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <form id="addUnitPrice" role="form" data-parsley-validate novalidate>
                                        <div class="form-group">
                                            <label>
                                                Active Date
                                            </label>
                                            <input id="actived_date" type="text" step="0.0001" class="form-control" required/>
                                        </div>
                                        <div class="form-group">
                                            <label>
                                                <?php echo $translations['A00355'][$language]; /* Unit Price */?>
                                            </label>
                                            <input id="unitPrice" type="text" step="0.0001" class="form-control" required/>
                                        </div>
                                    </form>
                                    <div class="col-md-12 m-b-20">
                                        <!-- <button type="submit" class="btn btn-default waves-effect waves-light">Cancel</button> -->
                                        <button id="add" type="submit" class="btn btn-primary waves-effect waves-light">
                                            <?php echo $translations['A00361'][$language]; /* Add */?>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
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

        $('#add').click(function() {
            var validate = $('#addUnitPrice').parsley().validate();
            if(validate) {
                showCanvas();
                var unitPrice   = $('#unitPrice').val();
                var actived_date   = $('#actived_date').val();

                actived_date = actived_date == ""?"":dateToTimestamp(actived_date);

                var formData = {
                    'command'    : 'insertUnitPrice',
                    'unitPrice'  : unitPrice,
                    'actived_date'  : actived_date
                };

                fCallback = sendEdit;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }
        });
    });

    $('#actived_date').datepicker({
        // language: language,
        format: 'dd/mm/yyyy',
        orientation: 'auto',
        autoclose: true
    });

    function sendEdit(data, message) {
        showMessage(message, 'success', '<?php echo $translations['A00363'][$language]; /* Add Unit Price */?>', '', 'unitPriceList.php');
    }
</script>
</body>
</html>
