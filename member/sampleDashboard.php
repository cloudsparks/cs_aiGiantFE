<?php
include 'include/config.php';
include 'head.php';
include 'header.php';

?>


<div class="pageContent">
	

	<section class="dashboardSection02">
		<div class="kt-container">
			<div class="col-12">
				<div class="row justify-content-center">						
					
					<div class="col-12 text-center">
						Welcome, <?php echo $_SESSION['username'] ?>
					</div>

					<div class="col-12 text-center mt-2">
						Capital Amount : <span id="capitalAmount"></span>
					</div>

					<div class="col-12 text-center mt-3">
						<a id="walletBtn" href="javascript:;" class="btn btn-primary">
							Wallet
						</a>
						<a id="bonusBtn" href="javascript:;" class="btn btn-primary">
							Bonus
						</a>
					</div>

					<div class="col-12 mt-4">
						<div id="walletSection" class="row justify-content-center"></div>
						<div id="bonusSection" class="row justify-content-center" style="display: none;"></div>
					</div>


					<div class="col-12 mt-4">
					    <form>
					        <div id="basicwizard" class="pull-in col-12 px-0">
					            <div class="tab-content b-0 m-b-0 p-t-0">
					                <div id="alertMsg" class="text-center" style="display: block;"></div>
					                <div id="listingDiv" class="table-responsive"></div>
					                <span id="paginateText"></span>
					                <div class="text-center">
					                    <ul class="pagination pagination-md" id="listingPager"></ul>
					                </div>
					            </div>
					        </div>
					    </form>
					    <div class="col-12">
					    	<button id="terminateBtn" class="btn btn-primary" type="button" name="button" style="display: none;"><?php echo $translations['M00047'][$language] //Termination ?></button>
					    </div>
					</div>

					<div class="col-12 mt-4">
						<div id="newsSection" class="row"></div>
						<div id="newsDetails"></div>
					</div>

				</div>
			</div>
		</div>
	</section>

</div>


<?php include 'footer.php'; ?>
</body>


<?php include 'sharejs.php'; ?>



</html>



<script>


var url             = 'scripts/reqDefault.php';
var method          = 'POST';
var debug           = 0;
var bypassBlocking  = 0;
var bypassLoading   = 0;
var fCallback = "";

var divId = 'listingDiv';
var tableId = 'listingTable';
var pagerId = 'listingPager';
var btnArray = {};
var thArray  = Array(
	"Date",
	"Package Name",
	"Amount",
	"Status"
);

$(document).ready(function(){

	//start call api to get data from backend
	var formData  = {
	    command: 'getDashboard'
	};
	var fCallback = loadDefaultListing;
	ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

	$("#walletBtn").click(function(){
		$("#walletSection").show();
		$("#bonusSection").hide();
	});

	$("#bonusBtn").click(function(){
		$("#walletSection").hide();
		$("#bonusSection").show();
	});
});


//load data
function loadDefaultListing(data, message) {
	console.log(data);

	$("#capitalAmount").html(numberThousand(data.totalCommissionEarned,2));

	if (data.wallet) {
		var buildWallet = "";
		$.each(data.wallet, function(k, v) {
			buildWallet +=`
				<div class="walletBox">
					<div class="col-12">
						<div class="row">
							<div class="col-12 walletBoxText1">
								${v['creditDisplay']}
							</div>
							<div class="col-12 walletBoxText2 mt-3">
								${numberThousand(v['balance'],2)}
							</div>
						</div>
					</div>
					<div class="col-12 mt-3">
						<button type="button" class="btn walletMore" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="text-transform:uppercase"><?php echo $translations['M00016'][$language]; //MORE ?></button>
						<div class="dropdown-menu walletDropdown" role="menu">
			`;

			if (v['showTransactionHistory'] == 1) {
				buildWallet += `<a href="javascript:;" onclick="redirectTransactionHistory('${v['type']}','${v['creditDisplay']}')" class="dropdown-item"><?php echo $translations['M00170'][$language]; //Transaction History ?></a>`;
			}
			
			if (v['isFundinable'] == 1) {
                buildWallet += `<a href="javascript:;" onclick="redirectFundInCredit('${v['type']}','${v['creditDisplay']}')" class="dropdown-item"><?php echo $translations["M02031"][$language]; //Deposit by Crypto ?></a>`;

                buildWallet += `<a href="javascript:;" onclick="redirectFundInListing('${v['type']}','${v['creditDisplay']}')" class="dropdown-item"><?php echo $translations["M02090"][$language]; //Deposit Listing ?></a>`;

			}

			if (v['isTransferable'] == 1) {
				buildWallet += `<a href="javascript:;" onclick="redirectTransferCredits('${v['type']}')" class="dropdown-item"><?php echo $translations['M00454'][$language]; //Transfer Credit ?></a>`;
			}

			if (v['isConvertible'] == 1) {
                buildWallet += `<a href="javascript:;" onclick="redirectConvertCredits('${v['type']}','${v['creditDisplay']}')" class="dropdown-item"><?php echo $translations['M00017'][$language]; //Convert ?></a>`;
            } 

            if (v['isWithdrawable'] == 1) {
				buildWallet += `<a href="javascript:;" onclick="redirectWithdrawalCredits('${v['type']}', '${v['creditDisplay']}')" class="dropdown-item"><?php echo $translations['M00172'][$language]; //Withdrawal ?></a>`;

                buildWallet += `<a href="javascript:;" onclick="redirectWithdrawalListing('${v['type']}')" class="dropdown-item"><?php echo $translations['M00018'][$language]; //Withdrawal History ?></a>`;
			}

			buildWallet +=`
						</div>
					</div>
				</div>
			`;
		});
		$('#walletSection').html(buildWallet);
	}

	if (data.bonusReport) {
		var buildBonus = "";
		$.each(data.bonusReport, function(k, v) {
			buildBonus +=`
				<div class="walletBox">
					<div class="col-12">
						<div class="row">
							<div class="col-12 walletBoxText1">
								${v['name']}
							</div>
						</div>
					</div>
				</div>
			`;

		

		});
		$('#bonusSection').html(buildBonus);
	}


	if(data.portfolioList){
		var list = data.portfolioList;
		var tableNo;
		var newList = [];
		$.each(list, function(k,v){
			var rebuildData ={
				date : v['created_at'],
				packageName : v['productDisplay'],
				amount : numberThousand(v['productPrice'], 2),
				status : v['statusDisplay']
			};
			newList.push(rebuildData);
		});

		buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
		pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

		$('#'+tableId).find('thead tr').each(function(){
			$(this).find('th:eq(0)').css('white-space', "nowrap");
		});


		$('#'+tableId+' th:nth-child(1)').before('<th></th>');
		$('#'+tableId+' td:nth-child(1)').before('<td style="width:30px;"></td>');

		$('#'+tableId).DataTable({
		    "paging":   false,
		    "ordering": false,
		    "info":     false,
		    "bFilter": false,
		    "language": {
		        "zeroRecords": "", 
		        "emptyTable": ""
		    },
		    responsive: {
		        details: {
		            type: 'column',
		            target: 'tr'
		        }
		    },
		    buttons: [
		    'colvis'
		],
		    columnDefs: [
		        { className: 'control', orderable: false, targets: 0 },
		        { responsivePriority: 1, targets: 1 },
		        { responsivePriority: 2, targets: 2 },
		        { responsivePriority: 3, targets: 3 },
		    ]
		});

	} else {
		$("#"+divId).empty();
		$("#paginateText").empty();
		$('#alertMsg').html(`
		    <div class="row">
		        <div class="col-12 text-center">
		            ${buildTableHead(thArray)}
		            <div>
		                <i class="fa fa-align-justify noResultIcon"></i>
		                <span class="noResultTxt"><?php echo $translations["M00030"][$language] //No Results Found. ?></span>
		            </div>
		        </div>
		    </div>
		`).show();
	}

	if (data.top10GroupSales) {
		var buildNews = "";
		$.each(data.top10GroupSales, function(k,v){
			buildNews += `
				<div class="col-lg-3 col-md-4 col-12">
					<div class="col-12 newBox text-center" style="margin-top: 20px;">
						<div class="row">
							<div class="col-12 newsTitle newsTitleTextLimit">
								News Title ${v['no']}
							</div>
							<div class="col-12" style="margin-top: 10px;">
								<img src="images/qtn/QTN-newsDefualt.png" class="imgFit">
							</div>
							<div class="col-6 text-left newsReleaseDate">
								${v['username']}
							</div>
							<div class="col-6 text-right" style="margin-top: 10px;">
								<button type="button" class="btn btn-primary" aria-hidden="true" getModalID="${k}" onclick="newsPop(this)">View</button>
							</div>
						</div>
					</div>
				</div>
			`;
		});
		$("#newsSection").html(buildNews);

		var buildNewsDetails = "";
		$.each(data.top10GroupSales, function(k,v){
			buildNewsDetails +=`
				<div class="modal fade show" id="modal_${k}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none; padding-right: 17px;" aria-modal="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<span class="modalIcon"></span>
							<div class="modal-header">
								<span class="modal-title newsTitle">News Title ${v['no']}</span>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#000;"></button>
							</div>
							<div class="modalLine"></div>
							<div class="modal-body modalBodyFont">
								<img src="images/qtn/QTN-newsDefualt.png" style="width: 100%;">
								<div class="newsDes" style="margin-top: 10px;">${htmlDecode(v['username'])}</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-primary downloadDiv" id="download_${k}" onclick="createDownloadFile(this)"><?php echo $translations['M00301'][$language]; //Download ?></button>
							</div>
						</div>
					</div>
				</div>
			`;
		});
		$("#newsDetails").html(buildNewsDetails);
	}


}

function newsPop(n) {
	var getThisID = $(n).attr("getModalID");
	$('#modal_'+getThisID).modal('show');
}

function createDownloadFile(element) {
	var formData  = {
		command: 'newsDownload',
		announcementID: element.id
	};
	$.redirect(url, formData);
}

function htmlDecode(input) {
  var e = document.createElement('textarea');
  e.innerHTML = input;
  return e.childNodes.length === 0 ? "" : e.childNodes[0].nodeValue;
}
</script>