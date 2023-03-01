<?php include 'include/config.php'; ?>
<?php
    session_start();

    if (in_array("Portfolio", $_SESSION['blockedRights']['Subscription Portfolio'])){
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
				<span data-lang="M00014"><?php echo $translations["M00014"][$language]; //Deposit Listing ?></span>
			</div>
		</div>

        <div class="col-12">
            <div class="row justify-content-center">
                <div class="col-11">
                    <div class="listingWrapper2">
					    <div class="col-12">
					    	<form id="searchDIV">
					    		<div class="col-12 px-0">
							        <div class="row align-items-end">
							        	<div class="col-lg-3 col-md-6 col-12 form-group" id="datepicker">
							        	    <label data-lang='M00091'><?php echo $translations['M00091'][$language] /*Date Range*/ ?></label>
							        	    <div class="input-daterange input-group" id="datepicker-range">
							        	    
							        	        <input id="dateRangeStart" type="text" class="input-sm form-control" name="start" dataType="dateRange" dataName="searchDate" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
							        	        <!-- <div class="input-group-append"> -->
							        	            <span class="input-group-text">-</span>
							        	        <!-- </div> -->
							        	        <input id="dateRangeEnd" type="text" class="form-control" name="end" dataType="dateRange" autocomplete="off" dataName="searchDate" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
							        	  
							        	    </div>
							        	</div>

							        	<div class="col mt-3">
							        		<button id="searchBtn" class="btn btn-primary" type="button" name="button" data-lang='M00243'><?php echo $translations['M00243'][$language] /*Search*/ ?></button>
							        		<button id="resetBtn" class="btn btn-default" type="button" name="button" data-lang='M00085'><?php echo $translations['M00085'][$language] /*Reset*/ ?></button>
							        		<!-- <span> <i class="fa fa-repeat ml-3" style="color:#696969; font-size: 20px;  transform: rotate(-40deg); vertical-align: text-top; cursor: pointer;" id="resetBtn"></i> </span> -->
							        	</div>
							        </div>
					    		</div>

					    	</form>
					    </div>

					    <div class="col-12 mt-4">
					    	<form>
					            <div id="basicwizard" class="pull-in col-12 px-0">
					                <div class="tab-content b-0 m-b-0 p-t-0">
					                    <div id="alertMsg" class="text-center" style="display: block;"></div>
					                    <div id="portfolioDiv" class="table-responsive"></div>
					                    <span id="paginateText"></span>
					                    <div class="text-center">
					                        <ul class="pagination pagination-md" id="pagerInvoiceList"></ul>
					                    </div>
					                </div>
					            </div>
					        </form>
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
var pageNumber      = 1;
var formData        = "";
var fCallback       = "";
var creditType 		= "<?php echo $_POST['creditType'] ?>";

var divId    = 'portfolioDiv';
var tableId  = 'portfolioTable';
var pagerId  = 'pageList';
var btnArray = {};

var thArray  = Array(
		'<span data-lang="M00091" class="bottom"><?php echo $translations['M00091'][$language]; //Date ?></span>',
		'<span data-lang="M00975" class="bottom"><?php echo $translations['M00975'][$language]; /* Coin Type */ ?></span>',
		'<span data-lang="M00050" class="bottom"><?php echo $translations['M00050'][$language]; //Amount ?></span>',
		// '<span data-lang="M00976" class="bottom"><?php echo $translations['M00976'][$language]; /* Callback Amount */ ?></span>',
		// '<span data-lang="M00104" class="bottom"><?php echo $translations['M00104'][$language]; /* Amount Receivable */ ?></span>',
		'<span data-lang="M00107" class="bottom"><?php echo $translations['M00107'][$language]; /* Status */ ?></span>',
		'<span data-lang="M00977" class="bottom"><?php echo $translations['M00977'][$language]; /* Callback At */ ?></span>',
		'<span data-lang="M00275" class="bottom"><?php echo $translations['M00275'][$language]; /* Wallet Address */ ?></span>',
		'<span data-lang="M01006" class="bottom"><?php echo $translations['M01006'][$language]; /* Transaction Hash */ ?></span>'
);
var creditDisplay = "<?php echo $_POST['creditDisplay']; ?>";

$(document).ready(function(){
	$("#walletName").html(creditDisplay + ' -');
	var formData  = {
	  command: 'getTronlinkListing',
	  creditType: creditType,
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

function pagingCallBack(pageNumber, loadSearch)
{
	if(pageNumber > 1) bypassLoading = 1;

	var searchId 	 = "searchDIV";
	var searchData = buildSearchDataByType(searchId);
	console.log(searchData);
	var formData   = {
			command     : "getTronlinkListing",
			pageNumber  : pageNumber,
			searchData  : searchData,
			creditType 	: creditType,
	};

	if(!fCallback)
			fCallback = loadDefaultListing;
	ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function loadSearch(data, message) {
		loadDefaultListing(data, message);
		$('#searchMsg').addClass('noData').html('<span><?php echo $translations['M00548'][$language]; //Search Successful ?></span>').show();
		setTimeout(function() {
				$('#searchMsg').removeClass('noData').html('').hide();
		}, 3000);
}

function loadDefaultListing(data, message) {
	console.log(data);
	var list = data.listing;
	var tableNo;
	var grandTotal = data.grandTotal;
	var htmlContent = "";

	if(list){
		var newList = [];
		$.each(list, function(k,v){
			var rebuildData ={
				created_at					:	v['created_at'],
				payCreditDisplay			:	v['coinTypeDisplay'],
				amount						:	numberThousand(v['amount'],8),
				// call_back_amount			:	numberThousand(v['call_back_amount'],8),
				// receivable_amount			:	numberThousand(v['receivable_amount'],8),
				status						:	v['status'],
				call_back_at				:	v['call_back_at'],
				wallet_address				:	v['walletAddress'],
				transaction_hash			:	v['txID'],
			};
				newList.push(rebuildData);
		});
	} 

	buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
	pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

	$('#' + tableId).find('tr').each(function () {
        $(this).find('td:eq(2), th:eq(2)').css('text-align', "right");
        $(this).find('td:eq(3), th:eq(3)').css('text-align', "right");
        $(this).find('td:eq(4), th:eq(4)').css('text-align', "right");
    });

	htmlContent = '<h4>Total Principle Amount : '+(grandTotal?grandTotal:0);

	$('#totalPrincipleAmount').append(htmlContent);

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

function setSearchOption(data, searchVal) {
    $('#searchDIV').find('option:not(:first-child)').remove();
    $.each(data, function(key, val) {
        $('#searchDIV').append('<option value="' + val['activityType'] + '">' + val['activityType'] + '</option>');
    });
    if (searchVal != ' '){
        $('#searchDIV').val(searchVal);
    }
}
</script>
