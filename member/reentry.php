<?php include 'include/config.php'; ?>
<?php
    session_start();

    if (in_array("Investment", $_SESSION['blockedRights'])){
        header("Location: dashboard.php");
    }
?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>

<section class="pageContent" style="margin-bottom: 20px;">
	<div class="kt-container">

		<div class="col-12">
			<div class="row justify-content-center">
				<div class="col-md-11 col-lg-7">

					<div class="listingWrapper">
						<?php if($_SESSION['userRankStatus']['notNewUser'] == 1) { ?>

						<div class="col-12 pageTitle">
							<?php echo $translations['M00982'][$language]; /* Your Current Package */ ?>
						</div>
						<div class="col-12">
							
							<div class="row">
								<div class="col-md-6 col-lg-6 mb-3" style="margin: auto;">
									<div class="packageWrapper" data-amt="" data-type="current">
										<img src="images/project/packageBg.png" alt="" class="packageBg">
										<div class="packageDetails">
											<div class="unit">
												<span class="txt"><?php echo $translations['M00983'][$language]; /* Unit */ ?></span>
											</div>
											<div class="priceRange"><?php echo number_format($_SESSION['userRankStatus']['totalAUM'],0); ?></div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-12 my-3">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group text-center" style="font-size: 15px;">
										<label><?php echo $translations['M01010'][$language]; /* Purchase Reentry */ ?></label>
										<input type="text" class="form-control" placeholder="<?php echo $translations['M00050'][$language]; /* Amount */ ?>(<?php echo $translations['M00983'][$language]; /* Unit */ ?>)" id="creditUnit" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onblur="calcAmt()" onchange="calcAmt()" />
									</div>
								</div>
							</div>
						</div>

						<?php } else { ?>
						<div class="col-12 pageTitle">
							<?php echo $translations['M00009'][$language]; //Package ?>
						</div>	
						<div class="col-12">
							<p style="font-size: 15px;"><?php echo $translations['M00033'][$language]; /* Select Package */ ?></p>
							<div class="row">
								<div class="col-md-6 col-lg-6 mb-3">
									<div class="packageWrapper" data-amt="100" data-type="fix">
										<img src="images/project/packageBg.png" alt="" class="packageBg">
										<div class="packageDetails">
											<div class="unit">
												<span class="txt"><?php echo $translations['M00983'][$language]; /* Unit */ ?></span>
											</div>
											<div class="priceRange">100</div>
										</div>
									</div>
								</div>
								<div class="col-md-6 col-lg-6 mb-3">
									<div class="packageWrapper" data-amt="500" data-type="min">
										<img src="images/project/packageBg.png" alt="" class="packageBg">
										<div class="packageDetails">
											<div class="unit">
												<span class="txt"><?php echo $translations['M00983'][$language]; /* Unit */ ?></span>
											</div>
											<div class="priceRange">> 500</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-12 my-3">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label><?php echo $translations['M00050'][$language]; /* Amount */ ?></label>
										<input type="text" class="form-control" id="creditUnit" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onblur="calcAmt()" onchange="calcAmt()" />
									</div>
								</div>
							</div>
						</div>

						<?php } ?>

						

					    <div class="col-12 registrationBtnPosition" style="margin-top: 20px;">
					    	<button onclick="submitBtn()" type="button" class="btn btn-primary" style="text-transform: uppercase; width: 100%;"><?php echo $translations['M00034'][$language]; //NEXT ?></button>
					    </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<?php include 'footer.php'; ?>
</body>

<?php include 'backToTop.php' ?>

<?php include 'sharejs.php'; ?>


</html>

<script>

    var url             = 'scripts/reqDefault.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var creditUnit;

    $(document).ready(function(){

    	$(".packageWrapper").click(function(){
    		$(".packageWrapper").removeClass("active");
    		$(this).addClass("active");

    		var type = $(this).attr("data-type");
    		var amt = $(this).attr("data-amt");

    		if(type == "fix") {
    			$('#creditUnit').val(amt);
    		}else{
    			$('#creditUnit').val("");
    		}
    	});
        
        
	});

	function submitBtn(){
		$('.invalid-feedback').remove();
		$('input').removeClass('is-invalid');
		
		creditUnit = $('#creditUnit').val();

		var formData  = {
		    command: 'reentryVerification',
		    creditUnit : creditUnit,
		    type : "credit",
		    step : 1

		};
		var fCallback = goPayment;
		ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
	}

function calcAmt() {
	var amt = $("#creditUnit").val();
	amt = amt == ""?0:parseFloat(amt);

	var selAmt = parseFloat($(".packageWrapper.active").attr("data-amt"));
	var selType = $(".packageWrapper.active").attr("data-type");

	if(selType == "min") {
		if(amt < selAmt) {
			$("#creditUnit").val(selAmt);
		}
	}
}


function goPayment (data,message) {
	$.redirect('payment.php',{
		creditUnit : creditUnit
	});
}








</script>