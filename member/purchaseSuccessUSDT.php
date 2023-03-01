<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>

<section id="chinaContract" class="dbSection02 dbPaddingX ">	
	<div class="dbSection02Title mb-3 mt-3 mb-md-5 mt-md-5">
		<span data-lang="M03622">
			<?php echo $translations['M03622'][$language]; //Purchase Success ?>
		</span>
	</div>
	<div class="py-5 bgBaige">
		<div class="row justify-content-center">
			<div class=" purchaseSuccess">
				<div class="center-obj">
	                <img src="/images/project/successIcon.png" class="mt-4 purchaseSuccessImg">
				</div>
				<div style="font-weight: 300; color: #000; font-size: 18px" class="center-obj purchaseSuccessContent" data-lang="M03623">
					<?php echo $translations['M03623'][$language] //Congratulations, you have purchase successfully. ?>
				</div>
				<div class="center-obj">
					<button type="button" class="btn btn-primary" data-lang="M03624" onclick="window.location='purchaseUSDT.php'">
			    		<?php echo $translations['M03624'][$language] //Go To Wallet ?>
				    </button>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- end:: Content -->
<?php include 'footer.php'; ?>
</body>

<!-- end:: Page -->

<!-- begin::Scrolltop -->
<?php include 'backToTop.php' ?>
<!-- end::Scrolltop -->

<?php
    if(isset($_COOKIE['sessionData'])) {
        $_SESSION = json_decode($_COOKIE['sessionData'], true);
    }
?>

<?php include 'sharejs.php'; ?>



<!-- end::Body -->
</html>

<script>
var url             = 'scripts/reqDefault.php';
var method          = 'POST';
var debug           = 0;
var bypassBlocking  = 0;
var bypassLoading   = 0;
var fCallback = "";

$(document).ready(function(){

});





</script>
