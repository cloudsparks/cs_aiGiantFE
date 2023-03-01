<?php 
    session_start();

    if (in_array("Portfolio", $_SESSION['blockedRights'])){
     header("Location: dashboard.php");
    } 
?>
<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>

<section class="pageContent">
	<div class="kt-container">

		<div class="text-center">
			<div class="pageTitle">
				<span data-lang="M01078"><?php echo $translations['M01078'][$language]; //Contract Subscription Portfolio ?></span>
			</div>
		</div>

		<div class="col-12">
			<div class="row justify-content-center">
				<div class="col-md-11 col-lg-10">

					<div class="listingWrapper">
					    <div class="col-12">
					    	<form id="searchDIV">
					    		<div class="col-12 px-0">
							        <div class="row align-items-end">
							        	<div class="col-lg-3 col-md-6 col-12 form-group" id="datepicker">
							        	    <label data-lang="M01082"><?php echo $translations['M01082'][$language]; //Purchase Date ?></label>
							        	    <div class="input-daterange input-group" id="datepicker-range">
							        	    	<input id="dateRangeStart" type="text" class="input-sm form-control" name="start" dataType="dateRange" dataName="date" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
							        	    	<span class="input-group-text">-</span>
							        	        <input id="dateRangeEnd" type="text" class="form-control" name="end" dataType="dateRange" autocomplete="off" dataName="date" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
							        	    	<label for="dateRangeStart" class="input-group-text"><i class="fa fa-calendar"></i></label>
							        	    </div>
							        	</div>

							        	<div class="col-lg-3 col-md-6 col-12 form-group mt-4 mt-lg-0">
							        	    <label data-lang="M00011"><?php echo $translations['M00011'][$language]; //Status ?></label>
							        	    <select id="status" class="form-control" dataName="status" dataType="select">
							        	        <option value=""><?php echo $translations['M00369'][$language]; /* All */ ?></option>
							        	        <option value="Active"><?php echo $translations['A00372'][$language]; /* Active */ ?></option>
							        	        <option value="Not Active"><?php echo $translations['A00373'][$language]; /* InActive */ ?></option>
							        	        <option value="Terminate"><?php echo $translations['M01054'][$language]; /* Terminate*/ ?></option>
							        	    </select>
							        	</div>

							        	<div class="col-lg-3 col-md-6 col-12 form-group mt-4 mt-lg-0">
							        		<button id="searchBtn" class="btn btn-primary" type="button" name="button"><?php echo $translations['M00243'][$language] /*Search*/ ?></button>
							        		<button id="resetBtn" class="btn btn-default" type="button" name="button"><?php echo $translations['M00085'][$language] /*Reset*/ ?></button>
							        		<!-- <span> <i class="fa fa-repeat ml-3" style="color:#696969; font-size: 20px;  transform: rotate(-40deg); vertical-align: text-top; cursor: pointer;" id="resetBtn"></i> </span> -->
							        	</div>
							        </div>
					    		</div>

					    	</form>
					    </div>
						<div class="col-12 mt-4 pt-4">
							<div id="totalPrincipleAmount" class="pull-in col-12 px-0">
					        </div>
						    <form>
						        <div id="basicwizard" class="pull-in col-12 px-0">
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
						    <!-- <div class="col-12">
						    	<div class="d-md-flex justify-content-end align-items-center form-group">
						    		<label data-lang="M01082">Total Remaining Units:</label>
						    		<div class="col-sm-3 px-0 px-md-2">
						    			<input type="text" class="form-control">
						    		</div>
						    		<button id="payBtn" class="btn btn-primary mt-2 mt-md-0" type="button" name="button">Pay</button>
						    	</div>
						    </div> -->
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

</body>
</html>

<script>
var url             = 'scripts/reqDefault.php';
var method          = 'POST';
var debug           = 0;
var bypassBlocking  = 0;
var bypassLoading   = 0;
var pageNumber      = 1;
var formData        = "";
var fCallback       = "";

var divId    = 'portfolioDiv';
var tableId  = 'portfolioTable';
var pagerId  = 'pagerList';
var btnArray = {};
var portfolioID;

var thArray  = Array(
		// "",
		"<?php echo $translations['M01082'][$language]; ?>", //Purchase Date
		"<?php echo $translations['M01083'][$language]; ?>", //Contract ID
		"<?php echo $translations['M01068'][$language]; ?>", //Tranche
		"<?php echo $translations['M01084'][$language]; ?>", //Countdown Timer
		"<?php echo $translations['M01070'][$language]; ?>", //Contract Units
		"<?php echo $translations['M01085'][$language]; ?>", //Subscription Units
		"<?php echo $translations['M01086'][$language]; ?>", //Activation Units
		"<?php echo $translations['M01087'][$language]; ?>", //Remaining Units
		"<?php echo $translations['M00011'][$language]; ?>", //Status
		""
);

$(document).ready(function(){


	$('#payBtn').click(function() {
		portfolioID = $('.checkboxID:checked').val();

		if(portfolioID == '' || !portfolioID){
			showMessage('No selected portfolio', "error", "Error");
		}else{
			$.redirect('upgradePayment.php',{
				portfolioID : portfolioID,
			});
		}
	});

	$("body").keyup(function(event) {
		if (event.keyCode == 13) {
			$("#searchBtn").click();
		}
	});
	
	var formData  = {
	  command: 'getMemberContractSubPortfolio'
	};
	var fCallback = loadDefaultListing;
	ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

	$('#dateRangeStart').daterangepicker({    
        autoApply: true,
        autoUpdateInput: false,
        locale: {
            format: 'DD/MM/YYYY'
        }
    }, function(start, end, label) {
        $("#dateRangeStart").val(start.format('DD/MM/YYYY'));
        $("#dateRangeEnd").val(end.format('DD/MM/YYYY'));
    });

    $('#dateRangeEnd').click(function() {
        $('#dateRangeStart').trigger('click');
    });

	// Reset Button
	$("#resetBtn").click(function(){
		$("#searchDIV").find("input").each(function(){
			$(this).val('');
		});
		$('#dateRangeStart').data('daterangepicker').remove();
        $('#dateRangeStart').daterangepicker({    
            autoApply: true,
            autoUpdateInput: false,
            locale: {
                format: 'DD/MM/YYYY'
            }
        }, function(start, end, label) {
            $("#dateRangeStart").val(start.format('DD/MM/YYYY'));
            $("#dateRangeEnd").val(end.format('DD/MM/YYYY'));
        });
		$('#searchDIV').find('select').each(function() {
			$(this).val('');
			$("#searchForm")[0].reset();
		});
	});
	// END Reset Button

	// Search Button
	$('#searchBtn').click(function() {
		pagingCallBack(pageNumber, loadSearch);
	});
	// END Search Button
});


function pagingCallBack(pageNumber, fCallback){
    if(pageNumber > 1) bypassLoading = 1;

    var searchId = 'searchDIV';
    var searchData = buildSearchDataByType(searchId);
    var formData = {
        command             : "getMemberContractSubPortfolio",
        pageNumber          : pageNumber,
        searchData          : searchData
    };
    // if(!fCallback)
        fCallback = loadDefaultListing;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}



function loadSearch(data, message) {
		$('#searchMsg').addClass('noData').html('<span><?php echo $translations['M00548'][$language]; //Search Successful ?></span>').show();
		setTimeout(function() {
				$('#searchMsg').removeClass('noData').html('').hide();
		}, 3000);
}

function loadDefaultListing(data, message) {
	var list = data.dataList;
	var tableNo;
	var grandTotal = data.grandTotal;
	
	if(list){
		var newList = [];
		$.each(list, function(k,v){
			// var checkbox = "";
			var payBtn = "";

			if(v['showPayOption'] == 1) {
				// checkbox = `
				//     <input type="checkbox" class="checkboxID" value="${v['portfolioID']}">
				// `;

				payBtn =`<button onclick="goUpgradePayment(${v['portfolioID']})" class="btn btn-primary" type="button"><?php echo $translations['M01105'][$language]; /* Pay */ ?></button>`
			}

			var rebuildData ={
				// checkbox: checkbox,
				purchaseDate: v['purchaseDate'],
				contractID: v['contractID'],
				tranche: v['tranche'],
				countdownTimer: v['countdownTimer'],
				contractUnit: numberThousand(v['contractUnit'] || 0, 2),
				subscriptionUnit: numberThousand(v['subscriptionUnit'] || 0, 2),
				activationUnit: numberThousand(v['activationUnit'] || 0, 2),
				remainingUnit: numberThousand(v['remainingUnit'] || 0, 2),
				status: v['status'],
				payBtn: payBtn
			};
				newList.push(rebuildData);
		});

	} 

	buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
	pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

	$('#'+tableId).find('tr').each(function(){
		$(this).find('td:eq(3), th:eq(3)').css('text-align', "center");
	    $(this).find('td:eq(4), th:eq(4)').css('text-align', "right");
	    $(this).find('td:eq(5), th:eq(5)').css('text-align', "right");
	    $(this).find('td:eq(6), th:eq(6)').css('text-align', "right");
	    $(this).find('td:eq(7), th:eq(7)').css('text-align', "right");
	});

	// START DataTables
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

	// else {
	// 	$("#"+divId).empty();
	// 	$("#paginateText").empty();
	// 	$('#alertMsg').html(`
	// 	    <div class="row">
	// 	        <div class="col-12 text-center">
	// 	            ${buildTableHead(thArray)}
	// 	            <div>
	// 	                <i class="fa fa-align-justify noResultIcon"></i>
	// 	                <span class="noResultTxt"><?php echo $translations["M00030"][$language] //No Results Found. ?></span>
	// 	            </div>
	// 	        </div>
	// 	    </div>
	// 	`).show();
	// }
}

$(document).on('change', '.checkboxID', function() {
	$('.checkboxID:checked').not(this).each(function(){
         $(this).prop('checked',false);
	});
});

function goUpgradePayment(portfolioID){
	$.redirect('upgradePayment.php',{
		portfolioID : portfolioID,
	});
}

</script>
