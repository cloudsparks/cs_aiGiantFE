<?php 
    session_start();

    if (in_array("Bonus Report", $_SESSION['blockedRights'])){
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
				<span data-lang="M00985"><?php echo $translations['M00984'][$language] /*Goldmine Bonus*/ ?></span>
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
							        	    <label><?php echo $translations['M00091'][$language] /*Date Range*/ ?></label>
							        	    <div class="input-daterange input-group" id="datepicker-range">
							        	    	<input id="dateRangeStart" type="text" class="input-sm form-control" name="start" dataType="dateRange" dataName="bonusDate" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
							        	    	<span class="input-group-text">-</span>
							        	        <input id="dateRangeEnd" type="text" class="form-control" name="end" dataType="dateRange" autocomplete="off" dataName="bonusDate" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
							        	    	<label for="dateRangeStart" class="input-group-text"><i class="fa fa-calendar"></i></label>
							        	    </div>
							        	</div>

							        	<div class="col mt-3">
							        		<button id="searchBtn" class="btn btn-primary" type="button" name="button"><?php echo $translations['M00243'][$language] /*Search*/ ?></button>
							        		<button id="resetBtn" class="btn btn-default" type="button" name="button"><?php echo $translations['M00085'][$language] /*Reset*/ ?></button>
							        		<!-- <span> <i class="fa fa-repeat ml-3" style="color:#696969; font-size: 20px;  transform: rotate(-40deg); vertical-align: text-top; cursor: pointer;" id="resetBtn"></i> </span> -->
							        	</div>
							        </div>
					    		</div>

					    	</form>
					    </div>
						<div class="col-12 mt-4 pt-4">
						    <form>
						        <div id="basicwizard" class="pull-in col-12 px-0">
						            <div class="tab-content b-0 m-b-0 p-t-0">
						                <div id="alertMsg" class="text-center" style="display: block;"></div>
						                <div id="listingDiv" class="table-responsive"></div>
						                <span id="paginateText"></span>
						                <div class="text-center">
						                    <ul class="pagination pagination-md" id="pagerList"></ul>
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

var divId    = 'listingDiv';
var tableId  = 'listingTable';
var pagerId  = 'pagerList';
var btnArray = {};

var thArray  = Array(
		"<?php echo $translations['M00113'][$language]; ?>", //Date
		"<?php echo $translations['M00651'][$language]; ?>", //Rank
		"<?php echo $translations['M00052'][$language]; ?>", //From Username
		"<?php echo $translations['M00056'][$language]; ?>", //Static
		"<?php echo $translations['M00174'][$language]; ?>", //Bonus Value
		// "<?php echo $translations['M01027'][$language]; ?>", //Unit Price
		"<?php echo $translations['M00049'][$language]; ?>", //Percentage
		"<?php echo $translations['M00054'][$language]; ?>" //Payable amount
);

$(document).ready(function(){

	$("body").keyup(function(event) {
		if (event.keyCode == 13) {
			$("#searchBtn").click();
		}
	});
	
	var formData  = {
	  command: 'getGoldmineBonusReport'
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
        command             : "getGoldmineBonusReport",
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
	var list = data.bonusList;
	var tableNo;
	var grandTotal = data.grandTotal;

	if(list){
		var newList = [];

		$.each(list, function(k,v){
			var rebuildData ={
				bonusDate: v['bonus_date'],
				rankDisplay: v['rankDisplay'],
				fromUsername: v['fromUsername'],
				fromLevel: v['fromLevel'],
				bonusValue: numberThousand(v['bonusValue'], 2),
				// unitPrice: numberThousand(v['unitPrice'], 2),
				percentage: numberThousand(v['percentage'], 2),
				payableAmount: numberThousand(v['payableAmount'], 2),
			};
				newList.push(rebuildData);
		});
	} 

	buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
	pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

	$('#'+tableId).find('tr').each(function(){
	    $(this).find('td:eq(4), th:eq(4)').css('text-align', "right");
	    $(this).find('td:eq(5), th:eq(5)').css('text-align', "right");
	    $(this).find('td:eq(6), th:eq(6)').css('text-align', "right");
	    // $(this).find('td:eq(7), th:eq(7)').css('text-align', "right");
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

	if($(window).width() >= 767) {
		if(grandTotal){
			$('#' + tableId).find('tbody').append(`
			    <tr style="">
			        <td colspan='4' class="text-right"><?php echo $translations['A00651'][$language]; /* Grand Total */?>:</td>
			        <td style="text-align: right;"> ${numberThousand(grandTotal['bonusValue'], 2)} </td>
			        <td></td>
			        <td style="text-align: right;"> ${numberThousand(grandTotal['payableAmount'], 2)} </td>
			    </tr>
			`);
		}
	}
}

</script>
