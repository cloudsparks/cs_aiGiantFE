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
                                Edit Withdrawal Admin Fees
                            </h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <form id="editAdminFee" role="form" data-parsley-validate novalidate>
                                        <div class="form-group">
                                            <label>
                                                Credit Type:
                                            </label>
                                            <select id="creditType" name="creditType" type="text" class="form-control" required/>
                                            <option id="" value="">Select a credit type</option>
                                            <option id="" value="bitcoin">Bitcoin</option>
                                            <option id="" value="bitcoinCash">Bitcoin Cash</option>
                                            <option id="" value="ethereum">Ethreum</option>
                                            <option id="" value="litecoin">Lite Coin</option>
                                            
                                            </select>
                                        </div>
                                
                                        <div class="form-group" id="percentageForm">
                                            <label>
                                                Admin Fee Percentage %
                                            </label>
                                            <input id="percentage" type="text" placeholder="%" class="form-control" required/>
                                        </div>

                                        <div class="form-group" id="minFeesForm">
                                            <label>
                                                Minimum Admin Fee
                                            </label>
                                            <input id="minFees" type="text" placeholder="" class="form-control" required/>
                                        </div>

                                    </form>
                                    <div class="col-md-12 m-b-20">
                                        <button id="updateBtn" type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
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
    var creditType      = "";

    
$(document).ready(function() {

    $('select#creditType').change(function(){
        creditType = $('select[name = creditType]').val();
            // console.log(creditType);
        fCallback = loadDefaultListing;
        var formData  = {
                        'command': 'getWithdrawalAdminFeeDetail',
                        'creditType': creditType
                        };
        
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

    });
    $('#updateBtn').click(function() {
        var validate = $('#editAdminFee').parsley().validate();
        if(validate) {

            showCanvas();
            var percentage   = $('#percentage').val();
            var minFees   = $('#minFees').val();
            creditType = $('select[name = creditType]').val();

            var formData = {
                'command'    : 'updateWithdrawalAdminFees',
                'percentage'  : percentage,
                'minFees'   : minFees,
                'creditType' : creditType
            };

            fCallback = sendEdit;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }
    });

});

    function loadDefaultListing(data, message) {

        $("#percentage").val(data.adminFeesPercentage);
        $("#minFees").val(data.minimumAdminFee);
    }

    function sendEdit(data, message) {
        showMessage('<?php echo $translations['A00684'][$language]; /* Successful added unit price */?>', 'success', 'Withdrawal Admin Fee', '', 'editWithdrawalFees.php');
    }


</script>
</body>
</html>
