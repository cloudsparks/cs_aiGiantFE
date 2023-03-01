<?php
    session_start();

    if (in_array("Add Bank Account", $_SESSION['blockedRights'])){
     header("Location: dashboard.php");
    }
?>
<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>
<!-- begin:: Content -->
<section class="pageContent">
    <div class="kt-container">
        <?php include 'sidebar.php'; ?>
        <div class="col-12">
            <div class="row justify-content-center">
                <div class="col-md-11 col-lg-7">
                    <div class="listingWrapper">
                        <div class="col-12 pageTitle">
                            <span data-lang="M00066"><?php echo $translations['M00066'][$language]; //Add Bank Account ?></span>
                        </div>
                        <div class="offset-md-1 col-md-10">
                	       <div class="form-group">
                	           <label data-lang="M00068"><?php echo $translations['M00068'][$language]; //Bank ?></label>
                	           <select id="bankType" class="form-control inputDesign" type="select"></select>
                	       </div>
                        	<div class="form-group">
                        	    <label data-lang="M00067"><?php echo $translations['M00067'][$language]; //Account Holder Name ?></label>
                        	    <input id="accHolderName" class="form-control inputDesign" type="text">
                        	</div>
                            <div class="form-group">
                                <label data-lang="M00069"><?php echo $translations['M00069'][$language]; //Account No ?></label>
                                <input id="accountNo" class="form-control inputDesign" type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                            </div>
                            <div class="form-group">
                                <label data-lang="M00070"><?php echo $translations['M00070'][$language]; //Province ?></label>
                                <input id="province" class="form-control inputDesign" type="text">
                            </div>
                            <div class="form-group">
                                <label data-lang="M00071"><?php echo $translations['M00071'][$language]; //Branch ?></label>
                                <input id="branch" class="form-control inputDesign" type="text">
                            </div>
                            <div class="form-group">
                                <label data-lang="M00042"><?php echo $translations['M00042'][$language]; //Transaction Password ?></label>
                                <div class="position-relative">
                                    <input id="tPassword" class="form-control inputDesign" type="password">
                                    <!-- <i class="far fa-eye eyeIcon"></i> -->
                                </div>
                            </div>
                            <div>
                                <button id="submitBtn" type="button" class="btn btn-primary w-100 py-3" data-lang="M00147">
                                    <?php echo $translations['M00147'][$language]; //Submit ?>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'footer.php'; ?>

    </div>
</section>
<!-- end:: Content -->

</body>

<!-- end:: Page -->

<!-- begin::Scrolltop -->
<?php include 'backToTop.php' ?>
<!-- end::Scrolltop -->

<?php include 'sharejs.php'; ?>



<!-- end::Body -->
</html>

<script>
        
    // Initialize the arguments for ajaxSend function
    var url             = 'scripts/reqDefault.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0; 
    var accHolderName, bankType, accountNo, province, branch, tPassword;

    $(document).ready(function() {
        formData        = {
        	command : 'getBankAccountDetail'
        };
        fCallback       = loadDetail;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $('#submitBtn').click(function() {
        	$("input,select").each(function(){
                $(this).removeClass('is-invalid');
                $('.invalid-feedback').html("");
            });

	        var bankID            = $('#bankType').find('option:selected').val();
	        var accountHolder       = $('#accHolderName').val();
	        var accountNo       	= $('#accountNo').val();
	        var province            = $('#province').val();
	        var branch              = $('#branch').val();
	        var tPassword 			= $('#tPassword').val();

	        var formData  = {
                command             : "addBankAccountDetail",
                bankID       		: bankID,
                accountHolder       : accountHolder,
                accountNo       	: accountNo,
                province            : province,
                branch              : branch,
                tPassword 			: tPassword
	        }
	        var fCallback = submitCallback;
	        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });
    });

    function loadDetail(data, message) {

    	var bankDetails = data.bankDetails;

        if(bankDetails) {
            $.each(bankDetails, function(k, v) {
                $('#bankType').append('<option value="'+v['id']+'">'+v['display']+'</option>');
            });
        }
    }

    function submitCallback(data, message) {
    	showMessage(message, 'success', `<span data-lang="M00066"><?php echo $translations["M00066"][$language]; /* Add Bank Account */ ?></span>`, '', 'bankAccountListing.php');
    }

</script>
