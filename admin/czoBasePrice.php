<?php
session_start();


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
                    <div class="col-lg-12">
                        <div class="card-box p-b-0">
                            <h4 class="header-title m-t-0 m-b-30">
                                Edit CZO Base Price
                            </h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <form id="editBasePrice" role="form" data-parsley-validate novalidate>
                                        <div class="form-group">
                                            <label>
                                                Current Base Price
                                            </label>
                                            <input id="basePrice" type="text" placeholder="Enter Price" class="form-control" required/>
                                        </div>
                                    </form>
                                    <div class="col-md-12 m-b-20">
                                        <button id="editBtn" type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
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
    // Initialize all the id in this page
    // var divId    = 'swapAdminFeeDiv';
    // var tableId  = 'swapAdminFeeTable';
    // var pagerId  = 'pagerSwapAdminFee';
    // var btnArray = {};
    // var thArray  = Array (
    //     '<?php echo $translations['A00354'][$language]; /* No. */?>',
    //     '<?php echo $translations['A00355'][$language]; /* Unit Price */?>',
    //     '<?php echo $translations['A00356'][$language]; /* Created Date */?>',
    //     '<?php echo $translations['A00147'][$language]; /* Done By */?>',
    // );

    // Initialize the arguments for ajaxSend function
    var url             = 'scripts/reqAdmin.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";

    $(document).ready(function() {

        fCallback = loadDefaultListing;
        formData  = {command: 'getCZOBasePrice'};
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $('#editBtn').click(function() {
            var validate = $('#editBasePrice').parsley().validate();
            if(validate) {
                showCanvas();
                var basePrice   = $('#basePrice').val();

                var formData = {
                    'command'    : 'updateCZOBasePrice',
                    'basePrice'  : basePrice
                };

                fCallback = sendEdit;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }
        });

    });

    function loadDefaultListing(data, message) {
        $("#basePrice").val(parseFloat(data).toFixed(8));
        // $("#basePrice").val(data);
    }

    function sendEdit(data, message) {
        showMessage('<?php echo $translations['A00684'][$language]; /* Update Successful */?>', 'success', 'CZO Base Price', '', 'czoBasePrice.php');
    }


</script>
</body>
</html>
