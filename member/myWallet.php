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
		
	</section>
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

	var formData  = {
	    command: 'getDashboard'
	};
	var fCallback = loadDefaultListing;
	ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

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


function loadDefaultListing(data, message) {

	var blockedRights = [<?php echo '"'.implode('","', $_SESSION['blockedRights']).'"' ?>];

	if (data.blockedRights) {
		var newBlocked = data.blockedRights.filter((item)=>{
			return item.credit_id != 0 
		})
	}else {
		var newBlocked = ''
	}

	if (data.productList && data.productList.length > 0) loadProductListing(data.productList);

	if (data.wallet) {
		var buildWallet = "";
		walletNumber = 1;

		$.each(data.wallet, function(k, v) {
			var buildMenu = "";
			var creditType = v['type'];
            var rightName = "";
			var creditDisplay = v['creditDisplay'];
			
			if(newBlocked) {
				var blockedItem = newBlocked.filter((item)=> {
					return item.credit_id == v['id']
				})

				
				blockedItem =  blockedItem.map((item)=>{
					return item.right_name
				})
			}else {
				var blockedItem = ''
			}
		


			if(v['translation_code']){
				// creditDisplay = translations[v['translation_code']][language]
				creditDisplay = v['creditDisplay']
			}

			if (v['showTransactionHistory'] == 1) {
				rightName = creditType + " Transaction History";
				if(blockedItem.indexOf('Transaction History') == -1){ 	
					buildMenu += `<a href="javascript:;" onclick="redirectTransactionHistory('${v['type']}','${v['creditDisplay']}')" class="dropdown-item" data-lang='M00012'><?php echo $translations['M00012'][$language]; //Transaction History ?></a>`;			
				}	
			}
			
			if (v['isFundinable'] == 1) {
				rightName = creditType + " Fund In";
				if(blockedItem.indexOf('Fund In') == -1){		
					buildMenu += `<a href="javascript:;" onclick="redirectFundInCredit('${v['type']}', '${v['creditNameDisplay']}')" class="dropdown-item" data-lang='M00013'><?php echo $translations["M00013"][$language]; //Deposit by Crypto ?></a>`;			
				}

			}	

			if (v['isFundinable'] == 1) {
				rightName = creditType + " Fund In History";
				if(blockedItem.indexOf('Fund In History') == -1){
					buildMenu += `<a href="javascript:;" onclick="redirectFundInListing('${v['type']}', '${v['creditNameDisplay']}')" class="dropdown-item" data-lang='M00014'><?php echo $translations["M00014"][$language]; //Deposit Listing ?></a>`;
				}

			}

			if (v['isTransferable'] == 1) {
				rightName = creditType + " Transfer";
				if(blockedItem.indexOf('Transfer Credit') == -1){ 
					buildMenu += `<a href="javascript:;" onclick="redirectTransferCredits('${v['type']}', '${v['creditDisplay']}')" class="dropdown-item" data-lang='M00015'><?php echo $translations['M00015'][$language]; //Transfer Credit ?></a>`;		
				}
			}

			if (v['isConvertible'] == 1) {
                buildMenu += `<a href="javascript:;" onclick="redirectConvertCredits('${v['type']}')" class="dropdown-item" data-lang='M00016'><?php echo $translations['M00016'][$language]; //Convert ?></a>`;
            } 

            if (v['isWithdrawable'] == 1) {
            	rightName = creditType + " Withdrawal";
				if(blockedItem.indexOf('Withdrawal') == -1){ 
					buildMenu += `<a href="javascript:;" onclick="redirectWithdrawalCredits('${v['type']}', '${v['creditDisplay']}')" class="dropdown-item" data-lang='M00017'><?php echo $translations['M00017'][$language]; //Withdrawal ?></a>`;
				}		
			}

			if(v['showWithdrawalHistory'] == 1){
				rightName = creditType + " Withdrawal History";
				if(blockedItem.indexOf("Withdrawal History") == -1){ 
					buildMenu += `<a href="javascript:;" onclick="redirectWithdrawalListing('${v['type']}')" class="dropdown-item" data-lang='M00018'><?php echo $translations['M00018'][$language]; //Withdrawal History ?></a>`;
				}
			}

			// if(v['type'] != "maxCap") {
				rightName = creditType;

				if(blockedItem.indexOf('hiddenWallet') == -1){ 
						buildWallet +=`
						
						<div class="col-12 col-md-5 my-4">
							<div class="walletBox">
								<img src="/images/project/walletIcon.png" class="dbWalletBg wallet">
								<div class="col-8 px-0">
									<div class="walletBoxTitle">
										${creditDisplay}
									</div>
									<div class="whiteLine"></div>
									<div class="walletBoxAmt">
										${numberThousand(v['balance'], 6)}										
									</div>
								</div>
							</div>
							<div class="walletBtnWrap">
								<a href="javascript:;" class="walletMoreBtn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
									<img src="/images/project/downArrow.png" alt="More" width="25px">
								</a>
								<div class="dropdown-menu walletDropdown dropdown-menu-right" role="menu" >
									${buildMenu}
								</div>
							</div>
						</div>
					`;		
				}
				// ${addCommas(Number(v['balance']).toFixed(v['decimal']))}

				walletNumber = walletNumber + 1;
			// }
			

		});
		$('#walletSection').html(buildWallet);
		// $('.bonusSection').html(buildWallet);

		

		$('.goFundIn').click(function() {
			var getType = $(this).attr('data-type');
			var creditType = $(this).attr('creditType');

			$.redirect('fundIn.php', {
			    getType 	: getType,
			    creditType 	: creditType
			});
		})
	}


	var list = data.portfolioList;
	var tableNo;
	var grandTotal = data.grandTotal;

	if(list){
		$('.viewAllBtn').show();
		list = list.slice(0, 10);
		var newList = [];
		$.each(list, function(k,v){
			var rebuildData ={
				created_at: v['created_at'],
				// units: addCommas(Number(v['units']).toFixed(2)),
				product_name: v['product_name'],
				portfolio_type: v['portfolio_type'],
				product_price: addCommas(Number(v['product_price']).toFixed(2)),
				actual_paid: addCommas(Number(v['actual_paid']).toFixed(2)),
				status: v['status']
			};
				newList.push(rebuildData);
		});
	} 

	buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
	// pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

	// START DataTables
	$('#'+tableId+' th:nth-child(1)').before('<th></th>');
	$('#'+tableId+' td:nth-child(1)').before('<td style="width:30px;"></td>');

	let voucherDataList = data.voucherList;
	if (voucherDataList) {
		let newList2 = [];
		$.each(voucherDataList, function(k,v) {
			let rebuildData = {
				code: v['code'],
				price: v['price'],
				status: v['status'],
				used_by: v['used_by'],
				used_at: v['used_at'],
				//created_at: v['created_at'],
			}
			newList2.push(rebuildData);
		});

		buildTable(newList2, 'voucherList', 'voucherDiv', thArrayVoucher, btnArray, message, tableNo);
	}
	

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

function submitBtn(id,price){
	$('.invalid-feedback').remove();
	$('input').removeClass('is-invalid');
	$('#defCreditUnitError, #quantityError').empty();

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
	$('#reentryVerification').show();

	let reentryVerificationContent = '';
		if (data.productPriority === 1)
			reentryVerificationContent += `
				<div style="padding:10px;"><?php echo $translations['A00629'][$language]; ?>: ${packagePrice}</div>
				<div id="voucherPrice" style="padding:10px;" />
				<div id="afterVoucher" style="padding:10px;" />
				<div style="padding:10px;"><?php echo $translations['M03624'][$language]; ?>:</div>
				<div style="width:70%;display:inline-block;">
					<input id="voucherInput" placeholder="<?php echo $translations['M03624'][$language]; ?>" class="form-control inputDesign" type="text">
				</div>
				<button onclick="redeemVoucherBtn()" id="btnRedeemID" type="button" class="btn btnThemeModal" data-lang="M00086" style="width:29%;display:inline-block;vertical-align: top;"><?php echo $translations['M03628'][$language]; //Confirm ?></button>
			`;
		else
			reentryVerificationContent += ``;

	$('#reentryVerificationContent').html(reentryVerificationContent);

	if (data.voucherCode != '-') {
		$('#voucherInput').val(data.voucherCode);
		$("#voucherInput").attr("disabled", true);
		$("#btnRedeemID").attr("disabled", true);
		redeemVoucherBtn();
	}

	//$.redirect('payment.php',newForm);
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
	$('#reentryVerification').hide();
	showMessage(message,'success',`<?php echo $translations['B00277'][$language]; ?>`,'','dashboard');
}

function reentryCfmBtn () {
        $('#reentryVerification').hide();
}

function reentryCnlBtn () {
	packageID = '';
	voucherInput = '';
	$('#reentryVerification').hide();
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

function loadContract (data, message) {

	if (data) {
		$('#contractDisplay').show();
	} else {
		$('#contractDisplay').hide();
	}

	var contractList = '';

	$.each(data, function(k, v) {

		contractList += `
					<div class="quickSelectTab">
						<span class="quickSelectItemContract" packageID="${v['maturityDays']['product_id']}">${v['maturityDays']['value']}</span>
					</div>
			`

	});
	$('#contractList').html(contractList);
	
	$(".quickSelectItemContract").click(function(){
		$(".quickSelectItemContract").removeClass("active");
		$(this).addClass("active");

		packageID = $(this).attr("packageID");
	});

}

function switchContractDays(type) {
	const types = [
		{title:"thirtyDays",value:30},
		{title:"sixtyDays",value:60},
		{title:"nintyDays",value:90}
	];
	let otherType = types.filter((item)=>{
		return item.title !== type
	})
	otherType.forEach((value)=>{
		$(`#${value.title}`).removeClass('active');
	})
	$(`#${type}`).addClass('active');

	chinaContractDays = types.filter((item)=>{
		if(item.title == type) {
			return item.value
		}
	})

	chinaContractDays = chinaContractDays[0].value
}
const delay = 3000; //ms

const slides = document.querySelector(".slides");
const slidesCount = slides.childElementCount;
const maxLeft = (slidesCount - 1) * 100 * -1;

let current = 0;

function changeSlide(next = true) {
  if (next) {
    current += current > maxLeft ? -100 : current * -1;
  } else {
    current = current < 0 ? current + 100 : maxLeft;
  }

  slides.style.left = current + "%";
}

/*let autoChange = setInterval(changeSlide, delay);
const restart = function() {
  clearInterval(autoChange);
  autoChange = setInterval(changeSlide, delay);
};

// Controls
document.querySelector(".next-slide").addEventListener("click", function() {
  changeSlide();
  restart();
});

document.querySelector(".prev-slide").addEventListener("click", function() {
  changeSlide(false);
  restart();
});
*/

function participate(id) {
	campaignId = id
	var formData  = {
	    command: 'enrollCampaign',
		step: 1,
		check: 0,
		id: id //need to change
	};
	var fCallback = redirectParticipate;
	ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function redirectParticipate(data,message) {
	var newData = {
		...data,
		campaignId: campaignId // need to change
	}

	$.redirect("participateCampaign.php",newData);
}

function setCountdown(id, countdown) {
	intervals[id] = setInterval(() => {
		var cDown = countDowns.find(x => x.uid == id);
		var timeLeft = cDown.cd;

		var days = Math.floor(timeLeft / (60 * 60 * 24));
		var addHours = (days *24);
		var hours = (Math.floor((timeLeft % (60 * 60 * 24)) / (60 * 60))) + addHours;
		var minutes = Math.floor((timeLeft % (60 * 60)) / (60));
		var seconds = Math.floor(((timeLeft*1000) % (1000 * 60)) / 1000);		
		
		// console.log(`${hours}:${minutes}:${seconds}`);

		$(`#hours${id}`).text(hours);
		$(`#minutes${id}`).text(minutes);
		$(`#seconds${id}`).text(seconds);		

		cDown.cd -= 1;
		
		if (cDown.cd < 0) {
			clearInterval(intervals[id]);
			var cDIdx = countDowns.findIndex(x => x.uid == id);
			countDowns.splice(cDIdx, 1);
		}
	}, 1000);
}

function setUCCountdown(id, countdown) {
	intervals[id] = setInterval(() => {
		var cDown = countDowns.find(x => x.uid == id);
		var timeLeft = cDown.cd;

		var days = Math.floor(timeLeft / (60 * 60 * 24));
		var addHours = (days *24);
		var hours = (Math.floor((timeLeft % (60 * 60 * 24)) / (60 * 60))) + addHours;
		var minutes = Math.floor((timeLeft % (60 * 60)) / (60));
		var seconds = Math.floor(((timeLeft*1000) % (1000 * 60)) / 1000);		
		
		$(`#hours1`).text(hours);
		$(`#minutes1`).text(minutes);
		$(`#seconds1`).text(seconds);		

		cDown.cd -= 1;
		
		if (cDown.cd < 0) {
			clearInterval(intervals[id]);
			var cDIdx = countDowns.findIndex(x => x.uid == id);
			countDowns.splice(cDIdx, 1);
		}
	}, 1000);
}
	
function downloadPdf() {
	window.open(`/scripts/reqDownLoadCDN.php?fileName=${pdfSelected[0].attachment}`)
}
</script>
