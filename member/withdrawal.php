<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>

<section class="pageContent">
    <div class="kt-container">
        <div class="col-12 px-5">
            <div>
                <img src="/images/withdrawalBg.png" class="w-100">
            </div>
            <div class="bgContainer">                
                <div class="col-12">
                    <div class="pageTitle">
                         <span data-lang="M03736"><?php echo $translations['M03736'][$language]; //Wallet Withdrawal ?></span>
                    </div>
                    <div class="row">
                        <!-- <div class="col-md-5 col-12 summaryDisplay">
                            <div class="displayContainer mt-2">
                                <div class="pageTitle" style="text-decoration: underline;">
                                    <?php echo $translations['M03735'][$language]; //Summary ?>
                                </div>
                                <div class="withdrawalFont01">
                                     <?php echo $translations['M00110'][$language]; //Withdrawal Amount ?>:
                                     <div id="amountDisplay" style="float: right;">
                                         
                                     </div>
                                </div>
                                <div class="withdrawalFont01 mt-3">
                                     <?php echo $translations['M01033'][$language]; //Admin Fee ?>:
                                     <div id="adminFee" style="float: right;">
                                         
                                     </div>
                                </div>
                                <div class="withdrawalFont01 mt-3">
                                     <?php echo $translations['M01144'][$language]; //NET Withdrawal Amount ?>:
                                     <div id="receiveAmount" style="float: right;">
                                         
                                     </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-md-6 col-12 px-5">
                            <div class="form-group mt-4">
                                <label data-lang="M00110" class="d-flex justify-content-between" style="color: #000;">
                                    <?php echo $translations['M00278'][$language]; //Crypto Type ?>
                                </label>
                                <select id="cryptoType" class="form-control inputDesign">
                                   <option value=""><?php echo $translations['M00436'][$language]; ?></option>
                                   <option value="TRC20">TRC20</option>
                                   <option value="BEP20">BEP20</option>
                               </select>
                            </div>
                            <div class="form-group mt-4">
                                <label data-lang="M00110" class="d-flex justify-content-between" style="color: #000;">
                                    <?php echo $translations['M02105'][$language]; //Wallet Address ?>
                                </label>
                                
                                <input id="walletAddress" class="form-control inputDesign" type="text">
                            </div>
                            <div class="form-group">
                                <label data-lang="M00042" style="color: #000;"><?php echo $translations['M00042'][$language]; //Transaction Password ?></label>
                                <div class="row align-items-center">
                                     <div class="col-12">
                                        <div class="position-relative">
                                            <input id="transactionPassword" class="form-control inputDesign" type="password">
                                    <!-- <i class="far fa-eye eyeIcon"></i> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="balanceContainer">
                                <div class="withdrawalFont02" style="float: right;">
                                    <?php echo $translations['M01033'][$language]; //Admin Fee ?>: 
                                    <span id="adminFeePercentage"></span>
                                </div>
                                <div class="withdrawalFont02">
                                    <?php echo $translations['M03583'][$language]; //Available Amount ?>: 
                                    <span id="balance"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12 px-5">
                            <div class="form-group mt-4">
                                <label data-lang="M00110" class="d-flex justify-content-between" style="color: #000;">
                                    <?php echo $translations['M01036'][$language]; //Crypto Rate ?>
                                </label>
                                
                                <input id="cryptoRate" class="form-control inputDesign" type="text" disabled>
                            </div>
                            <div class="form-group mt-4">
                                <label data-lang="M00110" class="d-flex justify-content-between" style="color: #000;">
                                    <?php echo $translations['M00110'][$language]; //Withdrawal Amount ?>
                                </label>
                                
                                <input id="amount" class="form-control inputDesign" type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '');calcAmt();">
                            </div>
                            <div class="form-group mt-4">
                                <label data-lang="M00110" class="d-flex justify-content-between" style="color: #000;">
                                    <?php echo $translations['M02100'][$language]; //Receivable Amount ?>
                                </label>
                                
                                <input id="receiveAmount" class="form-control inputDesign" type="text" disabled>
                            </div>
                        </div>
                        <div class="col-6 mt-4">
                            <div class="d-flex">
                                <button onclick="goBack();" type="button" class="btn btn-default w-100 py-3 mr-3" data-lang="M00163"><?php echo $translations['M00163'][$language]; /* Back */?></button>
                                <button id="nextBtn" type="button" class="btn btn-primary w-100 py-3" data-lang="M00034">
                                    <?php echo $translations['M00034'][$language]; //Next ?>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</section>

<!-- <?php include '2faSection.php'; ?> -->

<?php include 'footer.php'; ?>
</body>

<div class="modal fade" id="withdrawConfirmation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="padding-left:17px; padding-right: 17px;" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header canvasheader">
                <div class="row text-center">
                    <div class="col-12"><img id="canvasAlertIcon" src="images/project/warningIcon.png" alt="" width="65"></div>
                    <div class="col-12"><span id="canvasTitle" class="modal-title" data-lang="M00199"><?php echo $translations['M00199'][$language]; //Confirmation ?></span></div>
                </div>
                <div class="modalCloseWrap">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                </div>                
            </div>
            <!-- <div class="modalLine"></div> -->
            <div class="modal-body modalBodyFont">
                <div>
                    <div data-lang="M00184"><?php echo $translations['M00184'][$language]; //Balance ?></div>
                    <div id="balance_c" class="modalValue"></div>
                </div>
                <div class="mt-4">
                    <div data-lang="M00110"><?php echo $translations['M00110'][$language]; //Withdrawal Unit ?></div>
                    <div id="amount_c" class="modalValue"></div>
                </div>
                <div class="mt-4 capitalHide">
                    <div data-lang="M01033"><?php echo $translations['M01033'][$language]; //Admin Fee ?> (<span id="adminFeePerc_c">0</span>%)</div>
                    <div id="adminCharges_c" class="modalValue"></div>
                </div>
                <div class="mt-4 capitalHide">
                    <div data-lang="M01144"><?php echo $translations['M01144'][$language]; //NET Withdrawal  ?></div>
                    <div id="receive_c" class="modalValue"></div>
                </div>
                <!-- <div class="mt-4 capitalHide">
                    <div data-lang="M01145"><?php echo $translations['M01145'][$language]; //Unit to Amount ?></div>
                    <div id="unitRate_c" class="modalValue"></div>
                </div> -->
                <div class="mt-4">
                    <div data-lang="M01037"><?php echo $translations['M01037'][$language]; //Receivable Amount (USD) ?></div>
                    <div id="convertedAmount_c" class="modalValue"></div>
                </div>
                <div class="mt-4 cryptoRateWrapper" style="display: none;">
                    <div data-lang="M01036"><?php echo $translations['M01036'][$language]; //Crypto Rate ?></div>
                    <div id="liveRate_c" class="modalValue"></div>
                </div>
                <div class="mt-4 cryptoRateWrapper" style="display: none;">
                    <div data-lang="M01009"><?php echo $translations['M01009'][$language]; //Receivable  Amount ?> (<span class="creditCodeDisplay"></span>)</div>
                    <div id="exchangeAmt_c" class="modalValue"></div>
                </div>
                <div class="mt-4 cryptoRateWrapper">
                    <div data-lang="M00275"><?php echo $translations['M00275'][$language]; //Wallet Address ?></div>
                    <div id="walletAddress_c" class="modalValue"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="canvasCloseBtn" type="button" class="btn btn-default" data-dismiss="modal" data-lang="M00114"><?php echo $translations['M00114'][$language]; //Close ?></button>
                <button id="confirmBtn" type="button" class="btn btn-primary" data-dismiss="modal" data-lang="M00086"><?php echo $translations['M00086'][$language]; //Confirm ?></button>
            </div>
        </div>
    </div>
</div>

<?php include 'backToTop.php' ?>
<?php include 'sharejs.php'; ?>
</html>

<script>
var url             = 'scripts/reqDefault.php';
var method          = 'POST';
var debug           = 0;
var bypassBlocking  = 0;
var bypassLoading   = 0;
var fCallback = "";
var withdrawalData,bankData,walletData,unitRate, exchangeRateDisplay; //display
var balance,adminFee,minAmount,adminFeePerc,exchangeRate,adminFeeFixed; //calculation
var passData;
var creditType		= "<?php echo $_POST['creditType']; ?>";
var userId = '<?php echo $_SESSION['userID'] ?>';
var googleAuth;
var responseArr;

// var walletName = "<?php echo $_POST['walletName']; ?>";
// var creditDisplay = "<?php echo $_POST['creditDisplay']; ?>";
// var balance  		= "<?php echo $_POST['balance']; ?>";

$(document).ready(function(){

	var formData = {
		'command' : "getCreditData",
		creditType : creditType,
		type : "withdrawal"
	};
	var fCallback = loadWithdrawalData;
	ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

	$("body").keyup(function(event) {
		if (event.keyCode == 13) {
			$("#nextBtn").click();
		}
	});

    var date = new Date();
    var currentDate = date.getDate();
    var currentMonth = date.getMonth() + 1; 
    var currentYear = date.getFullYear();
    var todayDate = (currentDate + "-" + currentMonth + "-" + currentYear);
    /*
    $('.sendCode').click(function(){
        $(".invalid-feedback").remove();

        var cryptoType          = $('#crypto').find('option:selected').val();
        // var walletAddress       = $("#walletAddress").val();
        var walletAddress       =  $('#selectedWalletDropDown').find('option:selected').val();
        var amount              = $("#amount").val();
        var withdrawalDetails = {};

        withdrawalDetails = {
            amount : amount,
            walletAddress : walletAddress,
            cryptoType : cryptoType,
            creditType : creditType
        }

        var formData  = {
            command     : "sendOTPCode",
            type        : "withdrawal",
            sendType    : "email",
            username    : "<?php echo $_SESSION['username'] ?>",
            email       : "<?php echo $_SESSION['userEmail'] ?>",
            withdrawalDetails : withdrawalDetails,
        };
        
        fCallback = otpCallback;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }); */

    $('#todayDate').text(todayDate);

    if (creditType == "capitalCredit") {
        $('.capitalHide').hide();
    } else {
        $('.capitalHide').show();
    }

    /*
    $('.verifiedBtn').click(function() {
        $('.invalid-feedback').remove();
        $('input').removeClass('is-invalid');
        
        var code = $(window).width() <= 800 ? $('#mobileFACode').val() : code = $('#webFACode').val();

        var Secret_key   = $("#keyInput").val();
        var formData     = {
            command            : "getGoogleAuth",
            email              : userId,
            code               : code,  
        };
        var fCallback = hidingModal;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    });*/

	$("#nextBtn").click(function(){

        $('.invalid-feedback').remove();
        $('input').removeClass('is-invalid');

        var type = $('#withdrawalType').find('option:selected').val();

        var cryptoType 			= $('#cryptoType').find('option:selected').val();
        var walletAddress 		= $("#walletAddress").val();
        var amount 				= $("#amount").val();
        var transactionPassword = $("#transactionPassword").val();
        var addNewAddress		= $("#addAdress:checked").val();

        var bankID 				= $('#bankType').find('option:selected').val();
        var accountNumber 		= $("#accountNo").val();
        var branch 				= $("#branch").val();
        var accountHolder 		= $("#accountHolder").val();
        var province 			= $("#province").val();
        var otpCode             = $('#otpCode').val();

        if(type == 'bank'){
            var formData = {
                'command' : "memberAddNewWithdrawal",
                creditType: creditType,
                type : type,
                amount : amount,
                bankID : bankID,
                accountNumber: accountNumber,
                accountHolder: accountHolder,
                branch: branch,
                province: province,
                transactionPassword : transactionPassword,
                //otpType : "email",
                //otpCode : otpCode,
            };

            passData = formData;
        }else{
            var formData = {
                'command' : "memberAddNewWithdrawal",
                creditType: creditType,
                type : type,
                amount : amount,
                cryptoType : cryptoType,
                walletAddress: walletAddress,
                transactionPassword : transactionPassword,
                // addNewAddress: addNewAddress,
                //otpType : "email",
                //otpCode : otpCode,
            };

            passData = formData;
        }

        var fCallback = withdrawConfirmation;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

    })

	$("#confirmBtn").click(function(){

        $(".mobileView").hide();
        $(".webView").hide();
        $("#sidenav-overlay").remove();

		var formData = passData;
		formData['command'] = "memberAddNewWithdrawalConfirmation";

		var fCallback = withdrawSuccess;
		ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
	});
});

function verifyBtn() {
    $('.invalid-feedback').remove();
    $('input').removeClass('is-invalid');
    
    var code = $('#code').val();

    var Secret_key   = $("#keyInput").val();
    var formData     = {
        command            : "getGoogleAuth",
        email              : userId,
        code              : code,  
    };
    var fCallback = withdrawConfirmation;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function myf(data,message) {

    responseArr = data

    $('#code').val('');

    if($(window).width() <= 990) {
        $(".slideout-sidebar1").css("top","250px");
        $('.webView').html('')
    }else {
        $(".slideout-sidebar").css("right","0px");
        $('.mobileView').html('')
    }

    $("body").append('<div id="sidenav-overlay" style="opacity: 1;" class=""></div>');

    $("#sidenav-overlay").click(function(){
        $(".slideout-sidebar").css("right","-450px");
        $(".slideout-sidebar1").css("top","1000px");
        $("#sidenav-overlay").remove();
        //$(".mobileView").hide()
    });
}

function getNavBarDetails(data,message) {
    googleAuth = data.GoogleAuth
}

function hideSideBar() {
    $(".slideout-sidebar").css("right","-450px");
    $(".slideout-sidebar1").css("top","1000px");
    $("#sidenav-overlay").remove();
}

function loadWithdrawalData(data, message) {

	withdrawalData = data;

	balance = withdrawalData.balance;
	adminFeePerc = withdrawalData.adminFeePercentage;
    adminFee = withdrawalData.adminFee;
	minAmount = withdrawalData.minWithdrawalAmount;
	bankData = withdrawalData.bankData;
	walletData = withdrawalData.walletData;
	unitRate = withdrawalData.unitRate;
    exchangeRateDisplay = withdrawalData.exchangeRateDisplay;

	var withdrawalType = withdrawalData.withdrawalType;
	var cryptoTypeData = withdrawalData.cryptoTypeData;
    var walletData  = withdrawalData.walletData;

	$('#walletName').text(withdrawalData.creditTypeDisplay);
	$('#balance').text(numberThousand(balance,2));
	$('#cryptoRate').val(numberThousand(unitRate, 2));
    $('#adminFeePercentage').text(addCommas(adminFeePerc + "%"));

	if(withdrawalType) {
	    $.each(withdrawalType, function(k, v) {
	        $('#withdrawalType').append('<option value="'+v['type']+'">'+v['typeDisplay']+'</option>');
	    });
	}

	if(cryptoTypeData) {
	    $.each(cryptoTypeData, function(k, v) {
	        $('#crypto').append('<option value="'+v['value']+'" data-code="'+v['coinRatePrefix']+'">'+v['display']+'</option>');
	    });
	}

	if(bankData) {
	    $.each(bankData, function(k, v) {
	        $('#bankType').append('<option value="'+v['bankID']+'">'+v['bankDisplay']+'</option>');
	    });
	}
    if(walletData.length >0) {
              var buildWalletAddressHTML = "<option value=''><?php echo $translations['M02911'][$language]; /*  Select a Wallet Address */ ?></option>";
        $.each(walletData, function(k, v) {
            buildWalletAddressHTML += `
            
                <option value="${v['info']}">${v['info']}</option>
            `;
           
        });
         $('#selectedWalletDropDown').append(buildWalletAddressHTML);
    }else{
           
             $('#walletButton').show();
                $('#selectedWalletDropDown').hide();
    }

    selectWithdrawType();
    selectCryptoType();
    selectWallet();
    calcAmt();
}

function selectWithdrawType(){
    var type = $('#withdrawalType').find('option:selected').val();

    if(type){
        $('.wrapper').hide();
        $('#'+type+'Wrapper').show();
    }else{
        $('.wrapper').hide();
    }
}

// $('#withdrawalType').on('change', function() {

//   	var type = $(this).val();

//   	if(type){
// 		$('.wrapper').hide();
// 		$('#'+type+'Wrapper').show();
// 	}else{
// 		$('.wrapper').hide();
// 	}
// });

// $('#bankType').on('change', function() {

//   	var bankID = $(this).val();

//   	if(bankID){
// 	  	var filteredBank = (bankData).filter((item) => item.bankID == bankID)[0];

// 		$('#accountHolder').val(filteredBank.accountHolder);
// 		$('#accountNo').val(filteredBank.accountNo);
// 		$('#province').val(filteredBank.province);
// 		$('#branch').val(filteredBank.branch);
// 	}else{
// 		$('#accountHolder').val('');
// 		$('#accountNo').val('');
// 		$('#province').val('');
// 		$('#branch').val('');
// 	}
// });

function selectCryptoType(){
    var cryptoType = $('#crypto').find('option:selected').val();
    var creditCodeDisplay = $('#crypto option:selected').attr('data-code');

    exchangeRate = exchangeRateDisplay[cryptoType];

    // if(cryptoType){
    //     var filteredAddress = (walletData).filter((item) => item.credit_type == cryptoType);

    //     if(filteredAddress) {
    //         $.each(filteredAddress, function(k, v) {
    //             $('#addressList').empty().append('<option value="'+v['info']+'"></option>');
    //         });
    //     }
    // }else{
    //     $('#addressList').empty();
    // }

    if(cryptoType){
        $('#exchangeRate').text(addCommas(exchangeRate));
        $('.creditCodeDisplay').text(creditCodeDisplay);
        $('.cryptoRateWrapper').show();
    }else{
        $('.cryptoRateWrapper').hide();
    }
}

function selectWallet(){
    var walletAddress     = $('#selectedWalletDropDown').find('option:selected').val();
   

    if(walletAddress){
    
        $('.cryptoRateWrapper').show();
    }else{
        $('.cryptoRateWrapper').hide();
    }
}
// $('#crypto').on('change', function() {

//     var cryptoType = $(this).val();
//     var creditCodeDisplay = $('#crypto option:selected').attr('data-code');

//     exchangeRate = exchangeRateDisplay[cryptoType];

//     // if(cryptoType){
//     //     var filteredAddress = (walletData).filter((item) => item.credit_type == cryptoType);

//     //     if(filteredAddress) {
//     //         $.each(filteredAddress, function(k, v) {
//     //             $('#addressList').empty().append('<option value="'+v['info']+'"></option>');
//     //         });
//     //     }
//     // }else{
//     //     $('#addressList').empty();
//     // }

//     if(cryptoType){
//         $('#exchangeRate').text(addCommas(exchangeRate));
//         $('.creditCodeDisplay').text(creditCodeDisplay);
//         $('.cryptoRateWrapper').show();
//     }else{
//         $('.cryptoRateWrapper').hide();
//     }
// });

function withdrawConfirmation(data, message) {

    $("#sidenav-overlay").remove();
    $(".slideout-sidebar1").css("top","1000px");
    $(".slideout-sidebar").css("right","-450px");


    var value = data.balance ? data : responseArr

    // var totalAmount = data.totalAmount;
    // var unitRate = data.unitRate;
    var exchangeAmt = $('#exchangeAmt').val();
    var convertedAmt_c = $('#receiveAmount').val();
    var walletAddress_c = $("#selectedWalletDropDown").val();
    var receivableAmount = parseFloat(value.receivableAmount?value.receivableAmount:0);
    var unitRate = parseFloat(value.unitRate?value.unitRate:0);
    var convertedAmt = receivableAmount * unitRate;

	$('#balance_c').text(numberThousand(value.balance, 2));
	$('#adminFeePerc_c').text(addCommas(value.adminFeePercent));
    $('#adminCharges_c').text(addCommas(value.adminCharges));
	$('#amount_c').text(numberThousand(value.totalAmount, 2));
    // $('#amount_c').text(numberThousand(data.totalAmount, 2) +' ' + '<?php echo $translations['A00975'][$language]; /* Unit */ ?>');
	// $('#unitRate_c').text(numberThousand(data.unitRate, 2));
    $('#liveRate_c').text(numberThousand(value.liveRate, 2));
    $('#receive_c').text(numberThousand(value.receivableAmount, 2));
    $('#exchangeAmt_c').text(exchangeAmt); 
    $('#convertedAmount_c').text(numberThousand(data.receivableAmount, 2));
    $('#walletAddress_c').text(walletAddress_c);
	$('#withdrawConfirmation').modal('show');
}

function calcAmt(){

    var amount = $("#amount").val();
	amount = parseFloat(amount?amount:0);
	adminFeePerc = parseFloat(adminFeePerc?adminFeePerc:0);
    adminFeeFixed = parseFloat(adminFee?adminFee:0);
	unitRate = parseFloat(unitRate?unitRate:1);
    exchangeRate = parseFloat(exchangeRate?exchangeRate:1);

	var adminFeeCalc = amount * adminFeePerc * 0.01;

    //use fixed admin fee or admin fee percentage - whichever higher
    if (adminFeeCalc < adminFeeFixed) {
        adminFeeCalc = adminFeeFixed;
    }

	var receiveAmt = amount - adminFeeCalc; //unit
    var convertedAmt = receiveAmt * unitRate; //usd
    var exchangeAmt = convertedAmt / exchangeRate; //usd

    if(receiveAmt < 0){
        receiveAmt = 0;
        exchangeAmt = 0;
        convertedAmt = 0;
    }

	$('#convertedAmt').val(numberThousand(convertedAmt, 2));
	$('#receiveAmount').val(numberThousand(receiveAmt, 2));
    $('#adminFee').text(numberThousand(adminFeeCalc, 2));
    $('#exchangeAmt').val(numberThousand(exchangeAmt, 2));
    $('#amountDisplay').text(numberThousand(amount, 2));
}

function withdrawSuccess(data, message) {
	showMessage(message, 'success', '<?php echo $translations['M00215'][$language]; /* Success */ ?>','', 'dashboard');
}

$(document).on("keypress",'#walletAddress',function(e){
    if(e.keyCode == 13) {
        e.preventDefault();
    }
});

$(document).on("click",'#walletAddress',function(){

    var cryptoType = $('#crypto option:selected').val();

    var walletAddress = (walletData).filter((item) => item.credit_type == cryptoType);

    var walletDropDown = $(this).parent().find(".walletDropDown");
    walletDropDown.empty();

    $.each(walletAddress,function (k,v) {
        walletDropDown.show();
        walletDropDown.append('<div class="walletItems">'+v['info']+'</div>');
    });
}); 

$(document).on("click",'.walletItems',function(){
    var selectedWallet = $(this).text();
    $("#walletAddress").val(selectedWallet);
    $(this).parent().hide();
});

$(document).on("blur",'#walletAddress',function(){
    var walletDropDown = $(this).parent().find(".walletDropDown");
    setTimeout(function(){
        walletDropDown.hide();
    }, 200);
});

$(document).on("input",'#walletAddress',function(){
    var walletDropDown = $(this).parent().find(".walletDropDown");
    setTimeout(function(){
        walletDropDown.hide();
    }, 200);
});

/*
function otpCallback(data, message) {
    showMessage(message, 'success', '<?php echo $translations['M01324'][$language]; //Send OTP Code?>', 'success')
    // otpCode = data.resendOTPCountDown;
    countDown(data.resendOTPCountDown);
} */

function countDown(second){
    var minutes = Math.floor(second/60);
    var seconds = second - (minutes*60);
    if(minutes == 0 && seconds == 0){
        $('.sendCode').text('<?php echo $translations['M03558'][$language]; //Resend OTP?>')
        $('.sendCode').show();
        $('.timer').hide();
        return;
    }else if(minutes == 0 && seconds != 0){
        $('.sendCode').hide();
        $('.timer').show();
        $('.timer span').empty().append(seconds+" "+"<?php echo $translations['M01095'][$language]; /* Sec */ ?>");
        setTimeout('countDown('+(second-1)+')',1000);
    }else{
        $('.sendCode').hide();
        $('.timer').show();
        $('.timer span').empty().append(minutes+" "+"<?php echo $translations['M01094'][$language]; /* Min */ ?>"+" "+seconds+" "+"<?php echo $translations['M01095'][$language]; /* Sec */ ?>");
        setTimeout('countDown('+(second-1)+')',1000);
    }
}

</script>
