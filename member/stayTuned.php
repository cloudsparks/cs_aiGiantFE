<?php
include 'include/config.php';
include 'head.php';
include 'header.php';


$currentTime = microtime(true) * 1000;
$stopRecord = $_SESSION["stopRecord"];
?>

<style>
	body{
	    width: 100%;
	    overflow-x: hidden;
	}
</style>

<link href="css/dashboard.css?v=<?php echo filemtime('css/dashboard.css'); ?>" rel="stylesheet" type="text/css" />

<!-- <div class ="navBar">
<div class="dropdown">
    <button class="dropbtn">Dropdown 
	<img class="" src="./images/588a6507d06f6719692a2d15.png" width="25px">   
    </button>
	<div class="dropdown-content">
      <a href="#">Link 1</a>
      <a href="#">Link 2</a>
      <a href="#">Link 3</a>
    </div> 
</div> -->

<!-- <div class="dropdown">
  <button class="dropbtn"><img class="" src="./images/588a6507d06f6719692a2d15.png" width="25px">   </button>
  <div class="dropdown-content">
    <a href="#">Homepage</a>
    <a href="#">About Us</a>
    <a href="#">Contact Us</a>
  </div>
</div> -->

<!-- Slideshow start -->
<!-- <div class="slideshow-container" style="padding-top:25px;">
	<div><?php include 'yinYangSymbol.php' ?></div>
	<div class="mySlides fade">
	<img src="images/1.jpeg" style="width:100%; max-height: 600px; background-size:cover;border-radius: 0px 0px 15px 15px">
	</div>
	<div class="mySlides fade">
	<img src="images/2.jpeg" style="width:100%; max-height: 600px; background-size:cover;border-radius: 0px 0px 15px 15px">
	</div>
	<div class="mySlides fade">
	<img src="images/3.jpeg" style="width:100%; max-height: 600px; background-size:cover;border-radius: 0px 0px 15px 15px">
	</div>
</div> -->
<div class="kt-container">
	<?php include("sidebar.php"); ?>
	<!-- Banner start -->
	<div class="col-12">
		<div class="row justify-content-center">
			<div class="col-12 mt-3">
				<div class="">
					<img src="../images/stayTuned.png" class="w-100">
					<div class="stayTunedFont01">
						Stay Tuned
						<div style="font-weight: 500;">
							We are Coming Soon...
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Banner stop -->


	<!-- 
	<section class="dbSection03">
		<div class="walletBg">
			
			<div>
				<div class="dbSection02Title whiteText">
					<?php if (!in_array("My Wallet", $_SESSION['blockedRights']))  { ?>
						<span data-lang="M00415"><?php echo $translations['M00415'][$language]; //My Wallet ?></span>
					<?php } ?>
				</div>
				<div class="row justify-content-center" id="walletSection">
				paypalPrice = data.totalPric;	</div>
			</div>
		</div>
		
	</section> -->
	<!-- JavaScript Bundle with Popper -->
	<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
	<?php include 'footer.php'; ?>
</div>

</body>


<?php
include 'sharejs.php';
$_SESSION["stopRecord"] = 1;
?>
</html>

<div class="modal fade successModal" id="successFundIn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="padding-left: 17px; padding-right: 18.9884px; display: none;" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <span class="modal-title" data-lang='M00451'><?php echo $translations['M00451'][$language]; //Congratulations ?></span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modalLine"></div>
            <div class="modal-body modalBodyFont">
                <div id="canvasAlertMessage" data-lang='M00033'><?php echo $translations['M00033'][$language]; //You has successful fund in ?></div>
            </div>
            <div class="modal-footer">
            	<button id="closeBtn" type="button" class="btn btnDefaultModal" data-dismiss="modal" data-lang='M00112'><?php echo $translations['M00112'][$language]; //Close ?></button>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="reentryVerification" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="padding-left:17px; padding-right: 17px;" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header canvasheader">
              <img id="canvasAlertIcon" src="images/project/warningIcon.png" alt="" width="40">
              <span id="canvasTitle" class="modal-title">
                  <span data-lang="M01108"><?php echo $translations['A01561'][$language]; /* Purchase Package Confirmation */ ?></span>
              </span>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            
            <div class="modal-body col-12 mt-3">
		<div id="reentryVerificationContent"></div>
	    </div>
            <div class="modal-footer col-12" style="display:block">
                <!-- <div class="canvasButtonWrapper"> -->
			<div id="paypal-button-container" class="col-12"></div>

                    <button onclick="reentryCnlBtn()" type="button" class="btn btnDefaultModal col-12" data-dismiss="modal" data-lang="M00114"><?php echo $translations['M00114'][$language]; //Cancel ?></button>
                    <!-- <button onclick="reentryCfmBtn()" type="button" class="btn btnThemeModal" data-dismiss="modal" data-lang="M00086"><?php echo $translations['M00086'][$language]; //Confirm ?></button>-->
                <!-- </div> -->
            </div>
        </div>
    </div>
</div>

<script>

var url             = 'scripts/reqDefault.php';
var method          = 'POST';
var debug           = 0;
var bypassBlocking  = 0;
var bypassLoading   = 0;
var fCallback = "";
var walletNumber;

var divId    = 'portfolioDiv';
var tableId  = 'portfolioTable';
var pagerId  = 'pagerList';
var btnArray = {};
var btnArray2 = {};
var packageID;
let packagePrice;
var quantity;
var packageType;
var depositPercentage;
var tranchePackageID;
var chinaContractDays = 30;
var lockPackageId;
var campaignId;
var allHtml = [];
var campaignList = [];
var pdfSelected;

var intervals = [];
var countDowns = [];

var thArray  = Array(
	'<span data-lang="M00392" class="bottom"><?php echo $translations['M00392'][$language]; ?></span>', //Date
	'<span data-lang="A00623" class="bottom"><?php echo $translations['A00623'][$language]; ?></span>', //Product Name
	'<span data-lang="M00111" class="bottom"><?php echo $translations['M00111'][$language]; ?></span>', //Type
	'<span data-lang="A01091" class="bottom"><?php echo $translations['A01091'][$language]; ?></span>', //Packages Price
	'<span data-lang="M00553" class="bottom"><?php echo $translations['M00553'][$language]; ?></span>', //Payment Amount
	'<span data-lang="M00011" class="bottom"><?php echo $translations['M00011'][$language]; ?></span>', //Status
);

var thArrayVoucher  = Array(
	'<span data-lang="M03646" class="bottom"><?php echo $translations['M03646'][$language]; ?></span>', //Voucher code
	'<span data-lang="M03647" class="bottom"><?php echo $translations['M03647'][$language]; ?></span>', //Voucher BV
	'<span data-lang="M00011" class="bottom"><?php echo $translations['M00011'][$language]; ?></span>', //Status
	'<span data-lang="M03644" class="bottom"><?php echo $translations['M03644'][$language]; ?></span>', //Redeemed By
	'<span data-lang="M03645" class="bottom"><?php echo $translations['M03645'][$language]; ?></span>', //Redeemed Date
	
);

var translations = <?php echo json_encode($translations)?>;
var language = "<?php echo $language?>";

$(document).ready(function() {

});


</script>
