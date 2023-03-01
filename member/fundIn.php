<?php include 'include/config.php'; ?>
<?php
    session_start();

    if (in_array("Account Registration", $_SESSION['blockedRights']['Registration'])){
     header("Location: dashboard");
    }
?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>

<section class="pageContent">
	<div class="kt-container">

		<div class="text-center">
			<div class="pageTitle">
				<span id="walletName"></span>
				<span data-lang="M00978"><?php echo $translations["M00978"][$language]; //Deposit ?></span>
			</div>
		</div>

		<div class="col-12">
			<div class="row justify-content-center">
				<div class="col-md-11 col-lg-10">

					<div class="listingWrapper">
						<div class="row">
				            <div class="col-lg-6 col-md-7 col-12">
			                    <div class="form-group">
			                        <label data-lang="M00979"><?php echo $translations['M00979'][$language]; /* Fund In Amount */?></label>
			                        <input id="amount" class="form-control inputDesign" type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
			                        <div id="amountError" class="amountError" style="display: none;"><?php echo $translations['M01017'][$language]; /* Amount must be greater than */ ?> 0</div>
			                    </div>
		                    	<div class="form-group">
		                    	    <label data-lang="M01014"><?php echo $translations['M01014'][$language]; //Unit Rate ?></label>
		                    	    <div id="unitRate" class="formValue"></div>
		                    	</div>
		                    	<div class="form-group">
		                    	    <label data-lang="M01016"><?php echo $translations['M01016'][$language]; /* Price in USD */ ?></label>
		                    	    <div id="priceUSD" class="formValue">0</div>
		                    	</div>

			                    <div class="form-group" style="margin-top: 10px;">
			                        <label data-lang='M00278'><?php echo $translations['M00278'][$language]; /* Crypto Type */?></label>
			                        <select id="cryptoType" class="form-control inputDesign"></select>
			                    </div>

		                    	<div class="form-group">
		                    	    <label data-lang="M00980"><?php echo $translations['M00980'][$language]; //Crypto Rate ?></label>
		                    	    <div id="cryptoRate" class="formValue"></div>
		                    	</div>

		                    	<div class="form-group">
		                    	    <label data-lang="M00553"><?php echo $translations['M00553'][$language]; //Total Amount ?></label>
		                    	    <div id="convertedAmount" class="formValue"></div>
		                    	</div>

			                    <div class="form-group">
			                        <label data-lang='M00042'><?php echo $translations['M00042'][$language]; //Transaction Password ?></label>
			    					<input id="transactionPassword" class="form-control inputDesign" type="password">
			                    </div>

			                    <div class="d-flex">
		                    		<button onclick="goBack();" type="button" class="btn btn-default w-100 py-3 mr-3" data-lang='M00163'><?php echo $translations['M00163'][$language]; /* Back */?></button>
		                    		<button id="nextBtn" type="button" class="btn btn-primary w-100 py-3" data-lang='M00034'><?php echo $translations['M00034'][$language]; /* Next */?></button>
			                    </div>
				            </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<script src="./js/tronweb.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/web3/1.7.4-rc.1/web3.min.js"></script>

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
//let tronWeb = window.tronWeb;
var testing;
// testing = tronWeb.trx.getTransactionInfo('d4f6a7253be017415fa4eea459ca7c1b5a26d5f946e675a48a7c6f468386e282');
console.log(123);
console.log(testing);
console.log(123);
    // var getType = '<?php echo $_POST['getType']; ?>';
    var creditType = '<?php echo $_POST['creditType']; ?>';
    var creditDisplay = "<?php echo $_POST['creditDisplay']; ?>";
    var unitRate;
	let metamaskWalletAddyress;
	let globalCoinType;

    $(document).ready(function(){
    	$("#walletName").html(creditDisplay + " -");
        var formData  = {
            command   	: "getCreditData",
            type 	    : "fundIn",
            creditType 	: creditType
        };
        var fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
	});

	function loadDefaultListing (data,message) {
		unitRate = data.unitRate;
		unitRate = Number(unitRate).toFixed(2);
		$('#unitRate').text(unitRate);

		$.each(data['coinDetails'], function(k,v){
			$('#cryptoType').append(`
				<option value="${v["coin_value"]}" data-rate="${v["rate"]}" coinTypeDisplay="${v["coin_display"]}">${v["coin_display"]}</option>
			`);
		});

		var defRate = data.coinDetails[0].rate;
		defRate = Number(defRate).toFixed(2);

		$('#cryptoRate').text(defRate);
		// $('#amount').val('0');
		$('#convertedAmount').text('0.00');
	}

	$('#cryptoType').on("change", function(){
		var cryptoType = $(this).find('option:selected');
       	var rate = cryptoType.data('rate');
       	rate = Number(rate).toFixed(2);

		$('#cryptoRate').text(rate);
		calculateAmount();
	});

	$('#amount').on('input', function() {
		calculateAmount();
	});

	function calculateAmount(){
    	var amount = $('#amount').val();
    	var cryptoRate = $('#cryptoRate').text();

		var priceUSD = Number(amount) * unitRate;
		priceUSD = parseFloat(priceUSD).toPrecision(12);
		
		var convertedAmount = priceUSD / cryptoRate;

		if(isNaN(convertedAmount)){
			convertedAmount = 0;
		}

		$('#convertedAmount').text(numberThousand(convertedAmount,8));
		$('#priceUSD').text(numberThousand(priceUSD,2));
    }

    $('#nextBtn').click(function(){
    	var amount = $('#amount').val();
		globalCoinType = $('#cryptoType').find("option:selected").val();

    	if (amount > 0) {
          $("#amountError").hide();
          $('.invalid-feedback').remove();
          $('input').removeClass('is-invalid');
          
          firstStep();
      }else {
                $("#amountError").show();
                $('.invalid-feedback').remove();
                $('input').removeClass('is-invalid');
                
            }
    });

	async function firstStep () {
		let senderAddress;
		if (globalCoinType.toLowerCase() === 'tronusdt') {//trc20
			let tronWeb = window.tronWeb;
			senderAddress = tronWeb.defaultAddress.base58;
			// senderAddress = await tronLink.request({method: 'tron_requestAccounts'});
		} else if (globalCoinType.toLowerCase() === 'tetherusd') {
			senderAddress = await ethereum.request({ method: 'eth_requestAccounts' });
			senderAddress = senderAddress[0];
		} else {
			showMessage('invalid type', 'error', 'ERROR', '');
			return true;
		}
		var formData  = {
    	    command   	: "connectTronlinkWallet",
    	    creditType 	: creditType,
    	    coinType 	: globalCoinType,
    	    walletAddress 	: senderAddress,
    	};

    	var fCallback = nextStep;
    	ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0); 
	}

    function nextStep(data,message) {
    	var amount 		= $('#amount').val();
    	var tPassword 	= $('#transactionPassword').val();
    	var asd = $('#cryptoType').find("option:selected");
    	var coinTypeDisplay = asd.attr("coinTypeDisplay");
    	var walletAddress = data.walletAddress;

    	var formData  = {
    	    command   	: "requestTronlink",
    	    amount 	    : amount,
    	    coin_type 	: globalCoinType,
    	    tPassword 	: tPassword,
    	    coinTypeDisplay : coinTypeDisplay,
    	    creditType : creditType,
    	    walletAddress : walletAddress
    	};

    	var fCallback = submitCallback;
    	ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);  
    }

	function submitCallback(data, message) {
		if (globalCoinType.toLowerCase() === 'tronusdt') tronusdtCallback(data); //trc20
		else if (globalCoinType.toLowerCase() === 'tetherusd') tetherUSDCallback(data); //bep20
		else showMessage('invalid type', 'error', 'ERROR', '');
	}

	async function tronusdtCallback(data) {
		let referenceID = data.referenceID;
		let contractAddress = data.contractAddress;
		//let contractAddress = 'TMo7crUb3QPN3nKNUrr9ryCgyVa7sH2ZJp';
		let receiverAddress = data.companyAddress;

		let tronWeb = window.tronWeb;
		var senderAddress = tronWeb.defaultAddress.base58;
		var amount = parseInt(data.amount * 1000000);
		var parameter = [{type:'address',value:receiverAddress},{type:'uint256',value:amount}];
		var options = {
			feeLimit:100000000                    
		}
		const transactionObject = await tronWeb.transactionBuilder.triggerSmartContract(
			tronWeb.address.toHex(contractAddress), 
			"transfer(address,uint256)", 
			options, 
			parameter,
			tronWeb.address.toHex(senderAddress)
		);
		var signedTransaction = await tronWeb.trx.sign(transactionObject.transaction);
		var broadcastTransaction = await tronWeb.trx.sendRawTransaction(signedTransaction);

		var formData  = {
			command: 'callbackTronlink',
			rawdata: JSON.stringify(broadcastTransaction),
			status: broadcastTransaction.result ? 'success' : 'fail',
			txid: broadcastTransaction.txid,
			referenceID: referenceID,
		};

		var fCallback = goToSuccess;
		ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
	}
	
	async function tetherUSDCallback (data) {
		let referenceID = data.referenceID;
		//let receiverAddress = data.companyAddress; //live
		//let receiverAddress = '0xd3007981b92c9fdb2a9ad76cde0dcb1740378694';
		let receiverAddress = '0x55d398326f99059ff775485246999027b3197955';
		// let receiverAddress = '0x59bF81f88A3c5B9f4A2BE1eB33e5d63D3f82bD7E';
		//var amount = BigInt(data.amount * 1000000000000000000); //live
		//var amount = 1;
		let errorReturn;
		let amount = BigInt(1000000000000000000*data.amount); 
		let senderAddress = await ethereum.request({ method: 'eth_requestAccounts' });
		senderAddress = senderAddress[0];

		let params = [{
			"from": senderAddress,
			"to": receiverAddress,
		//	"data": getDataFieldValue("0x7CB4e40c19aF8b78Db101c49AAba2348a296d47A", amount),
			"data": getDataFieldValue("0xd1b08F57bd668318e70429191d0b786E05A92D0d", amount),
			//"data": getDataFieldValue(receiverAddress, amount),
			//"data": getDataFieldValue(senderAddress, amount),
		}]
		let txIDID;
		let result = await window.ethereum.request({ method: "eth_sendTransaction",params })
		.then((txHash) => {
			txIDID = txHash;
		})
		.catch((err)=>{
			errorReturn = err;
		});
		if(txIDID){
			var formData  = {
				command: 'callbackTronlink',
				//rawdata: JSON.stringify(broadcastTransaction),
				status: 'success',
				txid: txIDID,
				referenceID: referenceID,
			};
		} else {
			let errorReturn2 = {
				'code' : errorReturn.code,
				'message' : errorReturn.message,
			}
			var formData  = {
				command: 'callbackTronlink',
				rawdata: JSON.stringify(errorReturn2),
				status: 'fail',
				referenceID: referenceID,
			};
		}
		var fCallback = goToSuccess;
		ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
	}

	function getDataFieldValue(tokenRecipientAddress, tokenAmount) {
		const web3 = new Web3();
		const TRANSFER_FUNCTION_ABI = {"constant":false,"inputs":[{"name":"_to","type":"address"},{"name":"_value","type":"uint256"}],"name":"transfer","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"};
		return web3.eth.abi.encodeFunctionCall(TRANSFER_FUNCTION_ABI, [
			tokenRecipientAddress,
			tokenAmount
		]);
	}

    function goToSuccess (data,message) {
		showMessage(message, 'success', '<?php echo $translations['M00072'][$language]; //Congratulation ?>', '', 'dashboard');  
	}

</script>
