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



<div class="kt-container">
	<div class="row p-md-0 p-5">
		<div class="col-12 mt-3 px-5">
			<div id="walletSection" class="row justify-content-center">
				<div class="col-md-3">
					<div class="dashboard_user_display">
						<div class="row">
							<div class="col-12 mt-4">
								<div class="dashboard_text01 mb-2 text-center">
									<?php echo $translations['M03742'][$language]; /* Welcome Back to AI Giant */ ?>
								</div>
								<div class="seperateLine"></div>
								<div class="dashboard_text02 mt-1 text-center">
									<?php echo $_SESSION['username'] ?>
								</div>
								<div class="dashboard_text03 mb-4 text-center">
									<?php echo $translations['M03743'][$language]; /* Joined */ ?> 12-02-2022
								</div>
								<div class="seperateLine2"></div>
							</div>
						</div>
						<div class="row px-2 pt-3 mt-3">
							<div class="col-6 seperateLine3">
								<img src="/images/dashboard_icon01.png" class="mt-2 ml-3 mr-3" style="float: left;">
								<div class="dashboard_text03 ml-5"><?php echo $translations['A00984'][$language]; /* Rank */ ?></div>
								<div class="dashboard_text04 ml-5"><?php echo $translations['A00517'][$language]; /* Member */ ?></div>
							</div>
							<div class="col-6">
								<img src="/images/dashboard_icon02.png" class="mt-2" style="float: left;">
								<div class="dashboard_text03 ml-5"><?php echo $translations['M03744'][$language]; /* Total Investment */ ?></div>
								<div class="dashboard_text04 ml-5">-</div>
							</div>
						</div>
					</div>
				</div>
				
			</div>
			
		</div>
		
		<div class="col-md-7 col-12 mt-5 pl-5">
			<div class="portfolioDisplay">
				<a href="javascript:;" class="portfolioViewMore">
					<?php echo $translations['M03745'][$language]; /* View More */ ?>
				</a>
				<div class="dashboard_text05">
					<?php echo $translations['A01291'][$language]; /* Portfolio */ ?>
				</div>
				<form>
			        <div id="basicwizard" class="pull-in col-12 mt-4 px-0">
			            <div class="tab-content b-0 m-b-0 p-t-0">
			                <div id="alertMsg" class="text-center" style="display: block;"></div>
			                <div id="portfolioDiv" class="table-responsive"></div>
			                <span id="paginateText"></span>
			                <div class="text-center">
			                    <ul class="pagination pagination-md" id="pagerList"></ul>
			                </div>
			            </div>
			        </div>
			    </form>

			</div>
			
		</div>
		<div class="col-md-5 col-12 mt-5 px-4">
			<div class="newsDisplay">
				<div class="row">
					<div class="col-12 dashboard_text05">
						<?php echo $translations['M03746'][$language]; /* Latest News */ ?>
					</div>
				</div>
				<div class="row mt-2">
					<!-- <div class="col-5">
						<img src="/images/news_image01.png" class="newsImage">
					</div> -->
					<div class="col-12 newsContent01">
						<img src="/images/comingSoon.webp" class="comingSoon">
						<!-- <div class="news_text01">
							Coming Soon
						</div>
						<div class="news_text02">
							Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
						</div> -->
					</div>
				</div>
			</div>
		</div>
	</div>
	
</div>
<?php include 'footer.php'; ?>
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
    <div class="modal-dialog" role="document" style="max-width:80%;">
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
						<div class="col-md-6 col-12">
							<div id="buildCredit" class="row"></div>
							<div id="buildCredit2" class="row"></div>
						</div>
						<div class="col-md-6 col-12 paymentSummaryBoxOutside">
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
						<div class="col-12 registrationBtnPosition" style="margin-top: 20px;">
							<label class="registrationLabel"><?php echo $translations['M00042'][$language]; //Transaction Password ?> <span class="mustFill">*</span></label>
							<input id="transactionPassword" class="form-control inputDesign" type="password">
						</div>
					</div>
				</div>

				<div class="text-center" style="margin-top: 20px;">
					<button onclick="reentryCnlBtn()" type="button" class="btn btnDefaultModal" style="display:inline-block;width:49%;margin-right:1%;" data-dismiss="modal" data-lang="M00114"><?php echo $translations['M00114'][$language]; //Cancel ?></button>
					<button onclick="reentryConfirmationBtn()" type="button" class="btn btn-primary" style="display:inline-block;width:49%;" data-dismiss="modal" data-lang="M03654"><?php echo $translations['M03654'][$language]; /* Buy Now */ ?></button>
				</div>
                    
                    <!-- <button onclick="reentryCfmBtn()" type="button" class="btn btnThemeModal" data-dismiss="modal" data-lang="M00086"><?php echo $translations['M00086'][$language]; //Confirm ?></button>-->
                <!-- </div> -->
            </div>
        </div>
    </div>
</div>

<script>
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
var adCount = 0;

var thArray  = Array(
	'<span data-lang="M00392" class="bottom"><?php echo $translations['M00392'][$language]; ?></span>', //Date
	'<span data-lang="A00623" class="bottom"><?php echo $translations['A00623'][$language]; ?></span>', //Product Name
	'<span data-lang="M00111" class="bottom"><?php echo $translations['M00111'][$language]; ?></span>', //Type
	'<span data-lang="A01091" class="bottom"><?php echo $translations['A01091'][$language]; ?></span>', //Packages Price
	'<span data-lang="M00553" class="bottom"><?php echo $translations['M00553'][$language]; ?></span>', //Payment Amount
	'<span data-lang="M00011" class="bottom"><?php echo $translations['M00011'][$language]; ?></span>', //Status
);

var translations = <?php echo json_encode($translations)?>;
var language = "<?php echo $language?>";

$(document).ready(function(){

	var formData  = {
	    command: 'getDashboard'
	};
	var fCallback = loadDefaultListing;
	ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

	

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



function loadDefaultListing(data, message) {

	var blockedRights = [<?php echo '"'.implode('","', $_SESSION['blockedRights']).'"' ?>];

	if (data.blockedRights) {
		var newBlocked = data.blockedRights.filter((item)=>{
			return item.credit_id != 0 
		})
	}else {
		var newBlocked = ''
	}

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
					buildMenu += `<a href="javascript:;" onclick="redirectFundInCredit('${v['type']}', '${v['creditDisplay']}')" class="dropdown-item" data-lang='M00013'><?php echo $translations["M00013"][$language]; //Deposit by Crypto ?></a>`;			
				}

			}	

			if (v['isFundinable'] == 1) {
				rightName = creditType + " Fund In History";
				if(blockedItem.indexOf('Fund In History') == -1){
					buildMenu += `<a href="javascript:;" onclick="redirectFundInListing('${v['type']}', '${v['creditDisplay']}')" class="dropdown-item" data-lang='M00014'><?php echo $translations["M00014"][$language]; //Deposit Listing ?></a>`;
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
						
								<div class="col-12 col-md-3 mt-md-0 mt-4">
									<div class="walletBoxDisplay${walletNumber}">
										<div class="col-12 text-center">
											<div class="walletTitle${walletNumber}">
												${creditDisplay}
											</div>
											<div class="walletBox_balance${walletNumber} mt-5">
												${numberThousand(v['balance'], 2)}									
											</div>
											<div class="mt-5 mb-1">
												<a href="javascript:;" class="wallet_viewmore${walletNumber}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
													View More
												</a>
												<div class="dropdown-menu walletDropdown dropdown-menu-right" role="menu" >
													${buildMenu}
												</div>
											</div>
										</div>
									</div>
									<div class="walletBorder${walletNumber}"></div>
								</div>
							`;	
				}
				// ${addCommas(Number(v['balance']).toFixed(v['decimal']))}

				walletNumber = walletNumber + 1;
			// }
			

		});
		$('#walletSection').append(buildWallet);
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

function submitBtn(id){
	$('.invalid-feedback').remove();
	$('input').removeClass('is-invalid');
	$('#defCreditUnitError, #quantityError').empty();

	creditUnit = $('#creditUnitInp').val();
	// packageType = $('.packageType.active').attr('packageType');

	var formData  = {
	    command: 'reentryVerification',
	    type : 'package',
	    productID : id,
	    step : 1
	};

	var fCallback = goPayment;
	ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0); 
}

function goPayment (data,message) {

	let newForm = {
		type : 'package',
		packageID : data.productID
	}

	packageID = data.productID;
	$('#reentryVerification').show();

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
}

function reentryConfirmationBtn () {
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

	var fCallback = reentryConfirmationCallback;
	ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0); 
}

function reentryConfirmationCallback (data,message) {
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

function loadVideo(data, message) {

	getAccumulatedTotal();

	var videoListing = data.videoListing;

	var videoDisplay = "";
	let videoid = [];
	$.each(videoListing, function(k, v) {

		if (k < 3) {
			videoDisplay += `
				<div class="col-4" style="position:relative;">
					<iframe
						id="video-${k}"
						src="${v['link']}/iframe"
						style="border: none; width:100%;height:auto;"
						allow="accelerometer; gyroscope; autoplay; encrypted-media; picture-in-picture;"
						allowfullscreen="true"
						></iframe>
					<div style="position:absolute;bottom:20px;left:30px;color:#fff;font-weight:bold;">${v['name']}</div>
					<div class="myVideoOverlay" onclick="redirectVideo();"></div>
				</div>
			`
			videoid.push("video-" + k);
		}

		
	});
	$('#videoDisplay').html(videoDisplay);
	
	$.each(videoid, function(k, v) {
		loadVideoStream(v);
	});
}

function loadVideoStream (id) {
	var myvideo = document.getElementById(id);
	//console.log(vid);
	//vid.onended = function() {
	//  alert("The video has ended");
	//};
	const player = Stream(document.getElementById(id));
	console.log(player);
	player.addEventListener('ended', () => {
		console.log('end');
		var formData  = {
			command: 'memberWatchVideoEnd',
		};
		var fCallback = watchVideoCallback;
		ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
	});
	player.play().catch(() => {
		console.log(id + 'playback failed, muting to try again');
		player.muted = true;
		// player.play();
	});
}

function watchVideoCallback (data, message) {
	let accumulate = 0;
	if (data.accumulate) {
		accumulate = data.accumulate
		$('#totalAccumulated').html(accumulate);
	}
}

function getAccumulatedTotal () {
	var formData  = {
		command: 'getAccumulatedVideoCount',
	};
	var fCallback = accumulatedVideoCountCallback;
	ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function accumulatedVideoCountCallback (data, message) {
	let accumulate = 0;
	if (data.accumulate) accumulate = data.accumulate
	$('#totalAccumulated').html(accumulate);
}

function redirectVideo() {
	$.redirect("courseVideo");
}

function loadAd(data, message) {

	var advertisementListing = data.advertisementListing;

	var adDisplay = "";
	var indicatorsDisplay = "";

	if (advertisementListing) {

			$.each(advertisementListing, function(k, v) {


			if (k == 0) {
				indicatorsDisplay += `
						<li data-target="#demo2" data-slide-to="${k}" class="active"></li>
				`

				adDisplay += `
					<div class="carousel-item active">
				    	<div class="col-12 mb-4" style="position:relative; margin: auto;">
							<iframe
								id="video-${k}"
								src="${v['link']}/iframe?autoplay=true&muted=true"
								style="width:100%;"
								allow="accelerometer; autoplay; gyroscope; encrypted-media; picture-in-picture;"
								allowfullscreen="true"
								class="courseVideo2"
								></iframe>
							<div style="position:absolute;bottom:20px;left:30px;color:#fff;font-weight:bold;">${v['name']}</div>
				        </div>
				    </div>
								
				`
			} else {
				indicatorsDisplay += `
						<li data-target="#demo2" data-slide-to="${k}"></li>
				`

				adDisplay += `
					<div class="carousel-item">
				    	<div class="col-12 mb-4" style="position:relative; margin: auto;">
							<iframe
								id="video-${k}"
								src="${v['link']}/iframe?autoplay=true&muted=true"
								style="width:100%;"
								allow="accelerometer; autoplay; gyroscope; encrypted-media; picture-in-picture;"
								allowfullscreen="true"
								class="courseVideo2"
								></iframe>
							<div style="position:absolute;bottom:20px;left:30px;color:#fff;font-weight:bold;">${v['name']}</div>
				        </div>
				    </div>
								
				`

			}


		});

		$('#popUpVideoModal').modal('show');
		$('#adDisplay').html(adDisplay);
		$('#indicatorsDisplay').html(indicatorsDisplay);

	}
	
}

// function closeModal(count) {
// 	$('#popUpVideoModal' + count).addClass('hide');
// 	adCount++

// 	var formData  = {
// 	    command: 'advertisementList',
// 		// inputData: searchData,
// 	};
// 	var fCallback = loadAd;
// 	ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);	

// }

</script>
