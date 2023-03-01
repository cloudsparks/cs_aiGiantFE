<?php
include 'include/config.php';
include 'head.php';
include 'header.php';


$currentTime = microtime(true) * 1000;
$stopRecord = $_SESSION["stopRecord"];
?>

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
				<div class="productBoxDisplay">
					<div class="row justify-content-center">
						<div class="col-12">
							<div class="row">
								<div class="col-md-9 col-7 mt-4">
									<div class="dashboardBoxTitle02">
										<?php echo $translations['M03653'][$language]; /* Life Code Course */ ?>
									</div>
									<div class="col-md-6 col-12 mt-3 px-0 py-0">
										<div class="productTitle01">
											<?php echo $translations['M03651'][$language]; /* Original price $800, first three months promotion only */ ?>  &nbsp;&nbsp;<span class="productTitle02">$280</span>
										</div>
									</div>
								</div>
								<div class="col-md-3 col-5">
									<div>
										<img src="../images/price_banner2.png" class="priceBanner">
										<div class="priceDisplay text-center">
											<span class="productFont01">
												<?php echo $translations['M03652'][$language]; /* Free Cash Voucher */ ?>
											</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 mt-5">
		<div id="productDisplay" class="row justify-content-center">
			
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

<div class="modal" id="reentryModelPaypal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="padding-left:17px; padding-right: 17px;" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header canvasheader">
              <img id="canvasAlertIcon" src="images/project/successIcon2.png" class="mr-2 modalMsgIcon" alt="">
              <span id="canvasTitle" class="modal-title">
                  <span data-lang="M01108"><?php echo $translations['A01561'][$language]; /* Purchase Package Confirmation */ ?></span>
              </span>
              <button type="button" onclick="reentryCnlBtn()" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            
            <!-- <div class="modal-body col-12 mt-3">
		<div id="reentryVerificationContent"></div>
	    </div> -->
            <div class="modal-footer col-12" style="display:block">
                <!-- <div class="canvasButtonWrapper"> -->
				<div id="paypal-button-container" class="col-12"></div>

				<div class="text-center">
					<button onclick="reentryCnlBtn()" type="button" class="btn btnDefaultModal col-12" data-dismiss="modal" data-lang="M00114"><?php echo $translations['M00114'][$language]; //Cancel ?></button>
				</div>
                    
                    <!-- <button onclick="reentryCfmBtn()" type="button" class="btn btnThemeModal" data-dismiss="modal" data-lang="M00086"><?php echo $translations['M00086'][$language]; //Confirm ?></button>-->
                <!-- </div> -->
            </div>
        </div>
    </div>
</div>

<div class="modal" id="reentryModelWallet" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="padding-left:17px; padding-right: 17px;" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header canvasheader">
              <img id="canvasAlertIcon" src="images/project/successIcon2.png" class="mr-2 modalMsgIcon" alt="">
              <span id="canvasTitle" class="modal-title">
                  <span data-lang="M01108"><?php echo $translations['A01561'][$language]; /* Purchase Package Confirmation */ ?></span>
              </span>
              <button type="button" onclick="reentryCnlBtn()" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            
            <!-- <div class="modal-body col-12 mt-3">
		<div id="reentryVerificationContent"></div>
	    </div> -->
            <div class="modal-footer col-12" style="display:block">
                <!-- <div class="canvasButtonWrapper"> -->
				<div>
					<div class="row">
						<div class="col-12 paymentSummaryBoxOutside">
							<div class="paymentSummaryBox">
								<div class="row">

									<div class="col-12 paymentTitle">
										<span><?php echo $translations['M00551'][$language]; //Price Summary ?></span>
									</div>
									<div class="col-12 my-3">
										<div class="paymentTotal">
											<div class="d-flex justify-content-between">
												<div class="">
													<?php echo $translations['M01097'][$language]; /* Contract Amount */ ?> :
												</div>
												<div class="displayUnit">
													<span id="totalPrice"></span>
												<!--        <?php echo $translations['M00983'][$language]; /* Unit */ ?> -->
														
												</div>
											</div>
										</div>
									</div>
									<div class="col-12">
										<div id="buildCreditAmount" class="row"></div>
									</div>
									<div class="col-12">
										<div class="paymentSummary total">
											<div class="d-flex justify-content-between">
												<div class="">
													<?php echo $translations['M00553'][$language]; //Total Amount ?> :
												</div>
												<div id="totalAmt" class="displayUnit">0.00 </div>
											</div>
										</div>            			                
									</div>
									<div class="col-12">
										<div id="totalAmount"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12">
							<div id="buildCredit" class="row"></div>
							<div id="buildCredit2" class="row"></div>
						</div>
						<div class="col-12 registrationBtnPosition" style="margin-top: 20px;">
							<label class="registrationLabel"><?php echo $translations['M00042'][$language]; //Transaction Password ?> <span class="mustFill">*</span></label>
							<input id="transactionPassword" class="form-control inputDesign" type="password">
						</div>
					</div>
				</div>

				<div class="text-center" style="margin-top: 20px;">
					<button onclick="reentryCnlBtn()" type="button" class="btn btnDefaultModal" style="display:inline-block;width:49%;margin-right:1%;" data-dismiss="modal" data-lang="M00114"><?php echo $translations['M00114'][$language]; //Cancel ?></button>
					<button onclick="reentryWalletBtn()" type="button" class="btn btn-primary" style="display:inline-block;width:49%;" data-dismiss="modal" data-lang="M03654"><?php echo $translations['M03654'][$language]; /* Buy Now */ ?></button>
				</div>
                    
                    <!-- <button onclick="reentryCfmBtn()" type="button" class="btn btnThemeModal" data-dismiss="modal" data-lang="M00086"><?php echo $translations['M00086'][$language]; //Confirm ?></button>-->
                <!-- </div> -->
            </div>
        </div>
    </div>
</div>

<script>
//paypal
        var paypalPrice;
	let voucherInput;
        // Render the PayPal button into #paypal-button-container
        paypal.Buttons({

            // Set up the transaction
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: paypalPrice
                        }
                    }]
                });
            },

            // Finalize the transaction
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(orderData) {
                    // Successful capture! For demo purposes:
                    //console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                    //var transaction = orderData.purchase_units[0].payments.captures[0];
                    //alert('Transaction '+ transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');
			let formData = {
				'command': 'reentryConfirmationPayPal',
            			type : 'package',
            			packageID : packageID,
            			creditUnit : packagePrice,
				paypalPrice : paypalPrice,
				paypalData : orderData,
				cashVoucherCode : voucherInput
			};

			var fCallback = reentryConfirmationPayPalCallback;
			ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0); 

                    // Replace the above to show a success message within this page, e.g.
                    // const element = document.getElementById('paypal-button-container');
                    // element.innerHTML = '';
                    // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                    // Or go to another URL:  actions.redirect('thank_you.html');
                });
            }


        }).render('#paypal-button-container');
//
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

let payType; //paypal or registerWallet

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

$(document).ready(function(){

	var formData  = {
	    command: 'getFSProductList',
	    // type : "subpackage"
	};
	var fCallback = loadProduct;
	ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

	// showMessage('Testing 123', 'success' ,  'Title')

	for( var i=10 ;i<=90; i=i+10){
      $("#depositAmtSelect").append('<option value="'+ i +'">'+ i +'%</option>');
    }
	
	$('#walletBtn').click(function() {
		$('#walletBtn').addClass('active');
		$('#bonusBtn').removeClass('active');
		$('#walletID').show();
		$('#bonusID').hide();
	})

	$('#bonusBtn').click(function() {
		$('#walletBtn').removeClass('active');
		$('#bonusBtn').addClass('active');
		$('#walletID').hide();
		$('#bonusID').show();
	})

	$('.packageType').click(function() {
		$('.packageType').removeClass('active');
		$(this).addClass('active');

		packageType = $('.packageType.active').attr('packageType');

		if(packageType == 'contract'){
			$('#contractSelect').show();
		}else{
			$('#contractSelect').hide();
		}
	})

	$('.portfolioType').click(function() {
		$('.portfolioType').removeClass('active');
		$(this).addClass('active');

		var portfolioType = $('.portfolioType.active').attr('portfolioType');

		if(portfolioType == 'portfolio'){
			$('.portfolioListing').show();
			$('.portfolioContractListing').hide();
		}else{
			$('.portfolioListing').hide();
			$('.portfolioContractListing').show();
		}
	})

        // var formData  = {
        //     command: 'getFSProductList'
        // };
        // var fCallback = loadProductListing;
        // ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

	if ( $(window).width() >= 1200 ) {
		const slider = document.querySelector('.items');

		if(slider) {
			let isDown = false;
			let startX;
			let scrollLeft;

			slider.addEventListener('mousedown', (e) => {
				isDown = true;
				slider.classList.add('active');
				startX = e.pageX - slider.offsetLeft;
				scrollLeft = slider.scrollLeft;
			});
			slider.addEventListener('mouseleave', () => {
				isDown = false;
				slider.classList.remove('active');
			});
			slider.addEventListener('mouseup', () => {
				isDown = false;
				slider.classList.remove('active');
			});
			slider.addEventListener('mousemove', (e) => {
				if(!isDown) return;
				e.preventDefault();
				const x = e.pageX - slider.offsetLeft;
			const walk = (x - startX) * 3; //scroll-fast
			slider.scrollLeft = scrollLeft - walk;
			});
		}

	}

	if("<?php echo $_SESSION['memo']; ?>") {
		$('#popUpModal').modal('show');
		"<?php unset($_SESSION['memo']); ?>"
	}

	// $(".quickSelectItem").click(function(){
	// 	$(".quickSelectItem").removeClass("active");
	// 	$(this).addClass("active");

	// 	var type = $(this).attr("data-type");
	// 	var amt = $(this).attr("data-amt");

	// 	if(type == "fix") {
	// 		$('#creditUnitInp').val(amt);
	// 	}else{
	// 		$('#creditUnitInp').val("");
	// 	}
	// });

	var recordToken = "<?php echo $stopRecord ?>";

	  if(recordToken == 1){
	      // sessionStorage.setItem('Dashboard Refresh',"<?php echo $currentTime?>");
	      // stopRecordTime("Dashboard Refresh", false); // Temporarily do not sending for this 04Sept
	  }else{
	      stopRecordTime("Login Performance", true);
	  }
});

// $(document).on('click','.quickSelectItem', function(){
function selectItem(e){
	$(".quickSelectItem").removeClass("active");
	$(e).addClass("active");

	var type = $(e).attr("data-type");
	var amt = $(e).attr("data-amt");

	if(type == "fix") {
		$('#creditUnitInp').val(amt);
		$('#creditUnitInp2').val(amt);
	}else{
		$('#creditUnitInp').val("");
		$('#creditUnitInp2').val("");
	}
}


function loadProduct(data, message) {

	var productListing = data.allProduct;

	var productDisplay = "";
	$.each(productListing, function(k, v) {

		if (v['id'] == 1) {
				productDisplay += `
					<div class="col-md-3 col-6 mb-5 mb-md-0">
						<div class="row productBg ml-1" style="background-image: url('../images/${v['image_name']}');">
							<div class="col-md-4 col-2"></div>
							<div class="col-md-8 col-10 px-3 py-3 mb-5">
								<div class="daysDisplay">
									<img src="../images/clock_icon.png" class="mr-2"> <span class="productFont04">${v['courseDay']['value']} days course</span>
								</div>
							</div>
							<div class="col-12 productFont05 mt-5">
								${v['display']}
							</div>
							<div class="col-3 productFont06 mt-1">
								$${v['price']}
							</div>
							<div class="col-9 productFont07 mt-1">
								Original Price:
								<br>$${v['oriPrice']}
							</div>
							<div class="col-6 mt-4" style="padding:0;">
								<button class="btn btn-primary h-100" style="min-width:99%;margin-right:1%;" onclick="submitBtn(${v['id']},${v['price']},'paypal')" ${v['canPurchase'] ? '' : 'disabled'} data-lang=''>PayPal<!-- <?php echo $translations['M03654'][$language]; /* Buy Now */ ?> --></button>
							</div>
							<div class="col-6 mt-4" style="padding:0;">
								<button class="btn btn-primary h-100" style="min-width:99%;margin-left:1%;" onclick="submitBtn(${v['id']},${v['price']},'registerWallet')" ${v['canPurchase'] ? '' : 'disabled'} data-lang=''><?php echo $translations['C00241'][$language]; /* Registration Wallet */ ?></button>
							</div>
						</div>
					</div>
				`
		} else {
				productDisplay += `
					<div class="col-md-3 col-6 mb-5 mb-md-0">
						<div class="row productBg ml-1" style="background-image: url('../images/${v['image_name']}');">
							<div class="col-md-4 col-2"></div>
							<div class="col-md-8 col-10 px-3 py-3 mb-5">
								<div class="daysDisplay">
									<img src="../images/clock_icon.png" class="mr-2"> <span class="productFont04">${v['courseDay']['value']} days course</span>
								</div>
							</div>
							<div class="col-12 productFont05 mt-5">
								${v['display']}
							</div>
							<div class="col-3 productFont06 mt-1">
								$${v['price']}
							</div>
							<div class="col-9 productFont07 mt-2">
								${v['rv']['value']} RP, ${v['cp']['value']} CP
							</div>
							<div class="col-6 mt-4" style="padding:0;">
								<button  class="btn btn-primary h-100" style="min-width:99%;margin-right:1%;" onclick="submitBtn(${v['id']},${v['price']},'paypal')" ${v['canPurchase'] ? '' : 'disabled'} data-lang=''>PayPal<!--<?php echo $translations['M03654'][$language]; /* Buy Now */ ?>--></button>
							</div>
							<div class="col-6 mt-4" style="padding:0;">
								<button class="btn btn-primary h-100" style="min-width:99%;margin-left:1%;" onclick="submitBtn(${v['id']},${v['price']},'registerWallet')" ${v['canPurchase'] ? '' : 'disabled'} data-lang=''><?php echo $translations['C00241'][$language]; /* Registration Wallet */ ?></button>
							</div>
						</div>
					</div>
				`
		}

		
		$('#productDisplay').html(productDisplay);
	});
}

function loadProductListing(data, message) {
	let productColor = [
		'#f5d55f',
		'#f99e50',
		'#f97171',
		'#4f5866'
	];
	let productString = '';
	$.each(data, function(k, v) {
		var productDisplay = v['display'];
		var priceDisplay;

		if (v['oriPrice'] > 0) {
			priceDisplay = `$ ${v['oriPrice']} ($ ${v['price']})`
		} else {
			priceDisplay = `$ ${v['price']}`
		}

		productString += `
                        <div class="float productData" style="background:${productColor[k]}; ${isMobile ? 'min-width:100%;' : 'min-width:24%;'} margin: 0 auto;">
                                <c1-4 md1-3 style="background:${productColor[k]};min-width:24%; margin: 0 auto;">
                                        <div class="productTitle" style="height:80px;">${v['display'] || v['name']}</div>
                                        <p class="price">${priceDisplay}</p>
                                        <ul>
		`;

		$.each(v['featureList'], function(k, v) {
			console.log(v['has'] == 1);
			productString += `				<li class="${v['has'] == 1 ? 'tick' : 'cross'}"><span>` + v['value'] + `</span></li>`;
		});

		productString += `
                                        </ul>
										<button class="btn btn-primary" style="margin:10px;" onclick="submitBtn(${v['id']},${v['price']})" ${v['canPurchase'] ? '' : 'disabled'}>购买</button>
                                </c1-4>
                        </div>
		`;
	});
	$('#productList').html(productString);
	if (isMobile) {
		$('#productList').css({'flex-direction': 'column'});
		$('.productData').css({'margin-bottom': '20px'});
	}
}
 
function redirectTransferCredits(credit) {
	$.redirect("transfer.php", {creditType: credit});
}

function redirectWithdrawalCredits(credit, creditDisplay) {
	$.redirect("withdrawal.php", {creditType: credit, creditDisplay : creditDisplay});
}

function redirectWithdrawalListing(credit) {
	$.redirect("withdrawalListing.php", {creditType: credit});
}

function redirectFundInCredit(credit, creditDisplay) {
	$.redirect("fundIn.php", {creditType: credit, creditDisplay : creditDisplay});
}

function redirectFundInListing(credit, creditDisplay) {
	$.redirect("depositListing.php", {creditType: credit, creditDisplay: creditDisplay});
}

function redirectTransactionHistory(credit, creditDisplay) {
	$.redirect("transactionHistory.php", {creditType: credit, creditDisplay: creditDisplay});
}

function redirectConvertCredits(credit, creditDisplay) {
  $.redirect("convert.php", {creditType: credit, creditDisplay: creditDisplay});
}

var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }

  if (x[slideIndex-1]) {
  	x[slideIndex-1].style.display = "block";
  }
  
}

function calcAmt() {
	var amt = $("#creditUnit").val();
	amt = amt == ""?0:parseFloat(amt);

	var selAmt = parseFloat($(".quickSelectItem.active").attr("data-amt"));
	var selType = $(".quickSelectItem.active").attr("data-type");

	if(selType == "min") {
		if(amt < selAmt) {
			$("#creditUnit").val(selAmt);
		}
	}
}

function submitBtn(id,price,type){
	$('.invalid-feedback').remove();
	$('input').removeClass('is-invalid');
	$('#defCreditUnitError, #quantityError').empty();

	payType = type; //paypal or registerWallet

	creditUnit = $('#creditUnitInp').val();
	// packageType = $('.packageType.active').attr('packageType');

	var formData  = {
	    command: 'reentryVerification',
	    type : 'package',
	    packageID : id,
	    step : 1,
	    creditUnit : price,
	};

	var fCallback = goPayment;
	ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0); 
}

function goPayment (data,message) {

	let newForm = {
		type : 'package',
		packageID : data.productID,
		creditUnit : data.totalPrice
	}

	packageID = data.productID;
	packagePrice = data.totalPrice;
	paypalPrice = data.totalPrice;
	if (payType === 'registerWallet') {
		$('#totalPrice').text(numberThousand(data.totalPrice || 0, 2))

        var timer = data.spTokenRateExpiryTime;
        var tempMin, tempSec;
        tempMin = timer/60;
        tempSec = timer%60;
        tempMin = tempMin.toString().split('.')[0];
        tempSec = Number(tempSec).toFixed(0);
        tempSec = (tempSec < 10) ? '0' + tempSec : tempSec;

        var timer2;
        timer2 = tempMin+":"+tempSec;
        var interval = setInterval(function() {
            var timer = timer2.split(':');
            var minutes = parseInt(timer[0], 10);
            var seconds = parseInt(timer[1], 10);

            --seconds;

            minutes = (seconds < 0) ? --minutes : minutes;

            seconds = (seconds < 0) ? 59 : seconds;
            seconds = (seconds < 10) ? '0' + seconds : seconds;
            timer2 = minutes + ':' + seconds;

            if(timer2 === "0:00") {
                clearInterval(interval);
                window.location.reload();
            }
        }, 1000);

		var buildCredit = "";
        var buildCredit2 = "";
		var buildCreditAmount = "";

		$.each(data.paymentCredit, function(k, v) {
            if(k.includes('registrationWallet')){
                buildCredit +=`
                    <div class="col-12 paymentBox" style="margin-top: 10px">
                        <div class="row">
                            <div class="col-12"><span class="paymentName">${v['creditDisplay']}</span></div>
                            <div class="col-12 paymentBalance">
                                <?php echo $translations['M00097'][$language]; //Balance ?> : <span>${addCommas(Number(v['balance']).toFixed(2))}</span>
                                 <div>
                                  <?php echo $translations['M00515'][$language]; //Minimum ?> : <span>${addCommas(Number(v['minPrice']).toFixed(2))}</span>
                                </div>
                                <div>
                                  <?php echo $translations['M01057'][$language]; //Maximum ?> : <span>${addCommas(Number(v['maxPrice']).toFixed(2))}</span>
                                </div>
                            </div>
                            <div class="col-12">
                                <!-- <label class="registrationLabel">${v['creditDisplay']} <span class="mustFill">*</span></label> -->
                                <input id="${v['creditType']}" data-credit="${v['creditType']}" class="form-control inputDesign paymentField" type="text" getCal="${v['formula']}" getRate="${v['rate']}">
                            </div>
                            <div class="col-12 paymentCalculation">
                                <?php echo $translations['M00262'][$language]; //Payment ?> : <span class="getCalculation">0.00</span>
                                <input type="hidden" class="getTotalCalculation">
                            </div>
                            <!-- <div class="col-12">
                                <span id="${v['creditType']}"></span>
                            </div> -->
                        </div>
                    </div>
                `;
            }
            else{
                buildCredit2 +=`
                    <div class="col-12 paymentBox" style="margin-top: 10px">
                        <div class="row">
                            <div class="col-12"><span class="paymentName">${v['creditDisplay']}</span></div>
                            <div class="col-12 paymentBalance">
                                <?php echo $translations['M00097'][$language]; //Balance ?> : <span>${addCommas(Number(v['balance']).toFixed(2))}</span>
                                 <div>
                                  <?php echo $translations['M00515'][$language]; //Minimum ?> : <span>${addCommas(Number(v['minPrice']).toFixed(2))}</span>
                                </div>
                                <div>
                                  <?php echo $translations['M01057'][$language]; //Maximum ?> : <span>${addCommas(Number(v['maxPrice']).toFixed(2))}</span>
                                </div>
                            </div>
                            <div class="col-12">
                                <!-- <label class="registrationLabel">${v['creditDisplay']} <span class="mustFill">*</span></label> -->
                                <input id="${v['creditType']}" data-credit="${v['creditType']}" class="form-control inputDesign paymentField" type="text" getCal="${v['formula']}" getRate="${v['rate']}">
                            </div>
                            <div class="col-12 paymentCalculation">
                                <?php echo $translations['M00262'][$language]; //Payment ?> : <span class="getCalculation">0.00</span>
                                <input type="hidden" class="getTotalCalculation">
                            </div>
                            <!-- <div class="col-12">
                                <span id="${v['creditType']}"></span>
                            </div> -->
                        </div>
                    </div>
                `;
            }
    			
			
			

			buildCreditAmount += `
				<div class="col-12 paymentSummary">
					<div class="d-flex justify-content-between">
						<div class="">
							${v['creditDisplay']} :
						</div>
						<div class="displayUnit">
							<span id="${v['creditType']}amount" getCal="${v['formula']}">0.00</span>
						</div>
					</div>
				</div>
			`;
			

		});

		$('#buildCredit').html(buildCredit);
        $('#buildCredit2').html(buildCredit2);
		$('#buildCreditAmount').html(buildCreditAmount);

		$('.paymentField').on('input', function () {
			var getThisName = $(this).attr('id');
			this.value = this.value.match(/^[0-9]+\.?[0-9]{0,8}/);

            var getFormula = $(this).attr('getCal');
            var getValue = $(this).val();
            var getRate = $(this).attr('getRate');

            // if (getThisName == "BTC" || getThisName == "USDT") {
            // 	$('#'+getThisName+'amount').html(addCommas(Number(getValue).toFixed(2)));
            // } else {
            // 	$('#'+getThisName+'amount').html(addCommas(Number(getValue).toFixed(2)));
            // }
            
            $('#'+getThisName+'amount').html(addCommas(Number(getValue).toFixed(2)));

            if (getFormula == "divide") {
            	var getCalculation = getValue * getRate;
            	$(this).parent().parent().find('.getTotalCalculation').val(getCalculation);
            	$(this).parent().parent().find('.getCalculation').html(addCommas(Number(getCalculation).toFixed(2)));
            	 // $('#'+getThisName+'amount2').html(addCommas(Number(getCalculation).toFixed(2)));
            	
            }

            if (getFormula == "multiply") {
            	var getCalculation = getValue / getRate;
            	$(this).parent().parent().find('.getTotalCalculation').val(getCalculation);
            	$(this).parent().parent().find('.getCalculation').html(addCommas(Number(getCalculation).toFixed(2)));
            	// $('#'+getThisName+'amount2').html(addCommas(Number(getCalculation).toFixed(2)));
            }

            if (getThisName == "spCredit") {
                var getCalculation = getValue * data.spRate / data.unitPrice;
                // console.log(getCalculation)
                // getCalculation = Math.trunc(getCalculation*Math.pow(10, 2))/Math.pow(10, 2)
                // console.log(getCalculation)
                $(this).parent().parent().find('.getTotalCalculation').val(getCalculation);
                $(this).parent().parent().find('.getCalculation').html(addCommas(Number(getCalculation).toFixed(2)));
                $('#'+getThisName+'amount').html(addCommas(Number(getCalculation).toFixed(2)));
            }
            
            var totalAmt = 0;
    		$.each($(".getTotalCalculation"), function(k,v){
    			var amount = $(v).val();
    			amount = parseFloat(amount || 0);

    			totalAmt += amount;
    		});
    		$("#totalAmt").html(addCommas(Number(totalAmt).toFixed(2)));  

        });
		$('#reentryModelWallet').show();
	} else $('#reentryModelPaypal').show();

	// let reentryVerificationContent = '';
	// 	if (data.productPriority === 1)
	// 		reentryVerificationContent += `
	// 			<div style="padding:10px;"><?php echo $translations['A00629'][$language]; ?>: ${packagePrice}</div>
	// 			<div id="voucherPrice" style="padding:10px;" />
	// 			<div id="afterVoucher" style="padding:10px;" />
	// 			<div style="padding:10px;"><?php echo $translations['M03624'][$language]; ?>:</div>
	// 			<div style="width:70%;display:inline-block;">
	// 				<input id="voucherInput" placeholder="<?php echo $translations['M03624'][$language]; ?>" class="form-control inputDesign" type="text">
	// 			</div>
	// 			<button onclick="redeemVoucherBtn()" id="btnRedeemID" type="button" class="btn btnThemeModal" data-lang="M00086" style="width:29%;display:inline-block;vertical-align: top;"><?php echo $translations['M03628'][$language]; //Confirm ?></button>
	// 		`;
	// 	else
	// 		reentryVerificationContent += ``;

	// $('#reentryVerificationContent').html(reentryVerificationContent);

	// if (data.voucherCode != '-') {
	// 	$('#voucherInput').val(data.voucherCode);
	// 	$("#voucherInput").attr("disabled", true);
	// 	$("#btnRedeemID").attr("disabled", true);
	// 	redeemVoucherBtn();
	// }

	//$.redirect('payment.php',newForm);
}

function reentryWalletBtn () {
	$('.invalid-feedback').remove();
	$('input').removeClass('is-invalid');

	tPassword = $('#transactionPassword').val();

	spendCredit = {};

	$('.paymentField').each(function() {
		// var getName = $(this).parent().parent().find('.paymentName').text();
		var getName = $(this).attr('data-credit');
		var getAmount = $(this).val();
		spendCredit[getName] = {amount: getAmount};
	});

	var formData  = {
		command: 'reentryConfirmation',
		type : 'package',
		step : "2",
		tPassword : tPassword,
		spendCredit : spendCredit,
		creditUnit : packagePrice,
		packageID : packageID
	};

	var fCallback = reentryConfirmationPayPalCallback;
	ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0); 
}

function redeemVoucherBtn () {
	console.log('redeem');

	voucherInput = $('#voucherInput').val();

	let formData = {
		command: 'memberRedeemVoucher',
		voucherCode: voucherInput
	};

	var fCallback = redeemCallback;
	ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function redeemCallback (data,message) {
	let afterVoucher = packagePrice - data.price;
	$('#voucherPrice').html(`<?php echo $translations['M03629'][$language]; ?>: ${data.price}`);
	$('#afterVoucher').html(`<?php echo $translations['M03630'][$language]; ?>: ${afterVoucher}`);
	paypalPrice = afterVoucher;
}

function reentryConfirmationPayPalCallback (data,message) {
	$('#reentryModelWallet').hide();
	$('#reentryModelPaypal').hide();
	showMessage(message,'success',`<?php echo $translations['B00277'][$language]; ?>`,'','products');
}
function reentryCnlBtn () {
	packageID = '';
	voucherInput = '';
	payType = '';
	$('#reentryModelPaypal').hide();
	$('#reentryModelWallet').hide();
}

function clearReentry(section){
	if(section == 'tranche'){
		$('#quantity').val($("#quantity option:first").val());
		$("#depositAmtSelect").val($("#depositAmtSelect option:first").val());
	}else{
		$('#creditUnitInp').val('');
		$(".quickSelectItem").removeClass('active');
	}
}
</script>
