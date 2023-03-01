<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>

<style>
    .footerPosition {
        position: unset;
    }

</style>

<section class="pageContent" style="margin-bottom: 20px;">
    <div class="kt-container">
        <?php include("sidebar.php"); ?>
        <div class="col-12 pageTitle text-left ml-3">
            <?php echo $translations['M00087'][$language]; //Change Transaction Password ?>
        </div>
        <div class="col-12 mb-5">
            <div id="editPassword" class="row justify-content-center">

                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12 px-5">
                            <div class="row">
                                <div class="col-md-4 col-12 pw_banner p-5">
                                    
                                </div>
                                <div class="col-md-8 col-12 p-5">
                                    <div class="form-group">
                                        <label for="" data-lang="M00088"><?php echo $translations['M00088'][$language]; //Old password 
                                                                            ?></label>
                                        <input id="currentTPassword" type="password" class="form-control inputWidth" placeholder="<?php echo $translations['M00382'][$language]; //Enter Your Username 
                                                                                                            ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="" data-lang="M00089"><?php echo $translations['M00089'][$language]; //New password 
                                                                            ?></label>
                                        <input id="newTPassword" type="password" class="form-control inputWidth" placeholder="<?php echo $translations['M01972'][$language]; //Enter Your Username 
                                                                                                            ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="" data-lang="M00090"><?php echo $translations['M00090'][$language]; //retype new password 
                                                                            ?></label>
                                        <input id="newTPasswordConfirm" type="password" class="form-control inputWidth" placeholder="<?php echo $translations['M00383'][$language]; //Enter Your Username 
                                                                                                            ?>">
                                    </div>
                                    <div class="form-group">
                                        <button id="confirmBtn" type="button" class="btn btn-primary"><?php echo $translations['M00086'][$language]; //Confirm ?></button>  
                                    </div>
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <?php include 'footer.php'; ?>
    </div>
</section>




</body>

<?php include 'backToTop.php' ?>

<?php include 'sharejs.php'; ?>


</html>

<script>
	// Initialize the arguments for ajaxSend function
    var url             = 'scripts/reqDefault.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;


    $(document).ready(function() {

        $('#nextBtn').click(function() {
        	$("input").each(function(){
                $(this).removeClass('is-invalid');
                $('.invalid-feedback').html("");
            });

        	if ($('#currentTPassword').val()=="") {
        		errorDisplay("currentTPassword","<?php echo $translations['M01146'][$language]; //Please Enter Your Current Transaction Password. ?>");
        	}else if($('#newTPassword').val()==""){
        		errorDisplay("newTPassword","<?php echo $translations['M01147'][$language]; //Please Enter Your New Transaction Password. ?>");
        	}else if($('#newTPasswordConfirm').val()==""){
        		errorDisplay("newTPasswordConfirm","<?php echo $translations['M01148'][$language]; //Please Retype Your New Transaction Password. ?>");
        	}else{
        		var canvasBtnArray = {
			        Confirm: '<?php echo $translations['M00225'][$language]; /* Confirm */ ?>'
			    };

        		showMessage('<?php echo $translations["M00564"][$language]; /* This will change the settings for your changes. Are you sure that you want to proceed */ ?> ?', 'warning', '<?php echo $translations["M00563"][$language]; /* Change settings */ ?>', '', '', canvasBtnArray);

        		$('#canvasConfirmBtn').click(function() {
        			confirmModal();
        		});
        	}
        });

        // reset to default search
        $('#resetBtn').click(function() {
            $('#editPassword').find('input').each(function() {
                $(this).val('');
            });
            $("input").each(function(){
                $(this).removeClass('is-invalid');
                $('.invalid-feedback').html("");
            });
        });

        $('#confirmBtn').click(function(){
            var currentTPassword    = $('#currentTPassword').val();
            var newTPassword        = $('#newTPassword').val();
            var newTPasswordConfirm = $('#newTPasswordConfirm').val();
            var formData           = {
                                        command            : "memberChangeTransactionPassword",
                                        currentPassword    : currentTPassword,
                                        newPassword        : newTPassword,
                                        newPasswordConfirm : newTPasswordConfirm,
                                        passwordCode       : 2
            };
            var fCallback = submitCallback;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });
    });

    function submitCallback(data, message) {
        showMessage('<?php echo $translations["M00283"][$language]; //Successful changed password ?>.', 'success', '<?php echo $translations["M00331"][$language]; //Change Password ?>', '', 'changeTransactionPassword.php');
    }

    function confirmModal() {
        var currentTPassword    = $('#currentTPassword').val();
        var newTPassword        = $('#newTPassword').val();
        var newTPasswordConfirm = $('#newTPasswordConfirm').val();
        var formData           = {
                                    command            : "memberChangeTransactionPassword",
	                                currentPassword    : currentTPassword,
		                            newPassword        : newTPassword,
		                            newPasswordConfirm : newTPasswordConfirm,
                                    passwordCode       : 2
        };
        var fCallback = submitCallback;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

</script>
