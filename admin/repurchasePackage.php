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
    <!-- Begin page -->
    <div id="wrapper">

    <!-- Top Bar Start -->
    <?php include("topbar.php"); ?>
    <!-- Top Bar End -->

    <!-- Left Sidebar Start -->
    <?php include("sidebar.php"); ?>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <!-- Start container -->
            <div class="container">
                <div class="row">
                    <!-- Start col -->
                    <div class="col-sm-4">
                        <a href="reentryPackageListing.php" class="btn btn-primary btn-md waves-effect waves-light m-b-20">
                            <i class="md md-add"></i>
                            <?php echo $translations['A00115'][$language]; /* Back */ ?>
                        </a>
                    </div>
                    <!-- End col -->
                </div>
                <!-- Start row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box">
                            <div class="row">
                                <div class="tab-content m-b-30" style="border: none;">
                                   <div>
                                        <h4>
                                            Reentry Package
                                        </h4>
                                    </div>
                                    <div class="row m-t-15">
                                        <div class="col-md-12">
                                            <div class="row">
                                            	<div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><?php print_r($permission); echo $translations['A00301'][$language];?></label>
                                                        <select id="reentryType" class="form-control" dataName="reentryType" dataType="select">
                                                        	<option value=""><?php echo $translations['A01250'][$language]; /* Please Select */ ?></option>
                                                    		<option id="reentry"  style="display:none;" "Credit Reentry"><?php echo $translations['M02009'][$language];?></option>
                                                    		<option id="reentryNBVR" style="display:none;" value="NBVR Registration">Purchase Pre-order scheme NBVR</option>
                                                    		<option id="reentryNBV" style="display:none;" value="NBV Registration">Purchase Pre-order scheme NBV</option>
                                                    	</select>
                                                        <span id="reentryTypeError" class="error text-danger"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Amount</label>
                                                        <input id="invesmentAmount" class="form-control" type="text" name="" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                        <span id="totalError" class="error text-danger"></span>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-12 m-t-20 m-b-20">
                                            <button id="submit" class="btn btn-primary waves-effect waves-light">
                                                <?php echo $translations['A00123'][$language]; /* Confirm */ ?>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <!-- End row -->
            </div>
            <!-- End container -->
        <!-- End content -->

        <?php include("footer.php"); ?>

    </div>
    <!-- End content-page -->

<input id="storeValue" type="hidden">
    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

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
        var clientID       = "<?php echo $_POST['clientID'] ?>";
        // alert(clientID);

        $(document).ready(function() {

            var formData = {
                command        : "getPagePermission",
                filePath : "<?php echo $thisPage; ?>",
            };
            fCallback = loadDefaultData;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

            // if id empty return back reentryPinPackage.php 
            if(!clientID) {
                var message  = '<?php echo $translations['A00178'][$language]; /* Client does not exist */ ?>';
                showMessage(message, '', '<?php echo $translations['A00727'][$language]; /* Error */ ?>', 'exclamation-triangle', 'reentryPackageListing.php');
                return;
            }

            $('#submit').click(function() {

                var invesmentAmount = $('#invesmentAmount').val();
                var reentryType = $('#reentryType').val();
                $('#reentryTypeError').html("");
                $('#totalError').html("");
                if(reentryType == "") {
                	$('#reentryTypeError').html("<?php echo $translations['A01250'][$language]; /* Please Select */ ?>");
                	return;
                }
                if(invesmentAmount < 0 || invesmentAmount == ""){
                	$('#totalError').html("<?php echo $translations['E00126'][$language]; /* invalid amount */ ?>");
                	return;
                }
                
                var formData    = {
                    command     :  "reentryPackageValidate",
                    clientID: clientID,
                    invesmentAmount: invesmentAmount,
                    step:1,
                    portfolioType:reentryType
                };
                var fCallback = redirectToPayment;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            });
        });

        function redirectToPayment(data, message) {
            
            var invesmentAmount = $('#invesmentAmount').val();

            $.redirect('repurchasePackagePayment.php', {
                callbackData: JSON.stringify(data),
                invesmentAmount: invesmentAmount,
                clientID: clientID
            });
        }

	    function loadDefaultData(data, message) {
	        permission = data.permission;
	        console.log(permission);
	        $.each(permission, function(i, obj){
	        	if(obj == "Purchase Pre-order scheme") $('#reentry').css("display","block");
	        	if(obj == "Purchase Pre-order scheme NBVR") $('#reentryNBVR').css("display","block");
	        	if(obj == "Purchase Pre-order scheme NBV") $('#reentryNBV').css("display","block");
            });
	    }
</script>
</body>
</html>
