<?php 
    session_start();

    if (in_array("Bonus Report", $_SESSION['blockedRights'])){
     header("Location: dashboard.php");
    } 
?>
<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>

<link href="css/dashboard.css?v=<?php echo filemtime('css/dashboard.css'); ?>" rel="stylesheet" type="text/css" />

<div class="kt-container">
	<div class="col-12 px-5">
		 <div class="portfolioDisplay">

			<div class="col-12">
				<div class="row justify-content-center">
					<div class="col-12">
						<a id="viewMoreBtn" href="javascript:;" class="portfolioViewMore">
							View More
						</a>
						<div class="dashboard_text05">
							Leadership Report
						</div>
					</div>
					<div id="listingWrapper" class="listingWrapper">
					    <div class="col-12">
					    	<form id="searchDIV">
					    		<div class="col-12 px-0">
							        <div class="row align-items-end">
							        	<div class="col-md-12 col-12 form-group" id="datepicker">
							        	    <label><?php echo $translations['M00091'][$language] /*Date Range*/ ?></label>
							        	    <div class="input-daterange input-group" id="datepicker-range">
							        	    	<input id="dateRangeStart" type="text" class="input-sm form-control" name="start" dataType="dateRange" dataName="bonusDate" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
							        	    	<span class="input-group-text">-</span>
							        	        <input id="dateRangeEnd" type="text" class="form-control" name="end" dataType="dateRange" autocomplete="off" dataName="bonusDate" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
							        	    	<label for="dateRangeStart" class="input-group-text"></label>
							        	    </div>
							        	</div>
							        	<div class="col-12 mt-3">
							        		<button id="searchBtn" class="btn btn-primary mr-3" type="button" name="button"><?php echo $translations['M00243'][$language] /*Search*/ ?></button>
							        		<button id="resetBtn" class="btn btn-default" type="button" name="button"><?php echo $translations['M00085'][$language] /*Reset*/ ?></button>
							        		
							        	</div>
							        </div>
					    		</div>

					    	</form>
					    </div>
					</div>
					<div class="col-12 px-0 pt-4">
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
		"Group ROI",
		"Calculate %",
		"Paid %",
		"<?php echo $translations['M00985'][$language]; ?>", //Leadership Bonus
);

$(document).ready(function(){

	$("body").keyup(function(event) {
		if (event.keyCode == 13) {
			$("#searchBtn").click();
		}
	});
	
	var formData  = {
	  command: 'getLeadershipBonusReport'
	};
	var fCallback = loadDefaultListing;
	ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

	$('body').click(function(evt){    
       if((evt.target.id == "viewMoreBtn") || (evt.target.id == "listingWrapper") || (evt.target.id == "datepicker") || (evt.target.id == "searchBtn") || (evt.target.id == "resetBtn") || (evt.target.id == "dateRangeStart") || (evt.target.id == "dateRangeEnd")) {
       	$('.listingWrapper').show();
       } else {
       	$('.listingWrapper').hide();
       }
	});

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
        command             : "getLeadershipBonusReport",
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
				bonusDate: v['bonusDate'],
				rankDisplay: v['rankDisplay'],
				fromAmount: numberThousand(v['fromAmount'], 2),
				percentage: numberThousand(v['percentage'], 2),
				payPercentage: numberThousand(v['payPercentage'], 2),
				payableAmount: numberThousand(v['payableAmount'], 2),
			};
				newList.push(rebuildData);
		});
	} 

	buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
	pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

	$('#'+tableId).find('tr').each(function(){
	    $(this).find('td:eq(2), th:eq(2)').css('text-align', "right");
	    $(this).find('td:eq(3), th:eq(3)').css('text-align', "right");
	    $(this).find('td:eq(4), th:eq(4)').css('text-align', "right");
	    $(this).find('td:eq(5), th:eq(5)').css('text-align', "right");
	    // $(this).find('td:eq(6), th:eq(6)').css('text-align', "right");
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
			        <td colspan='5' class="text-right"><?php echo $translations['A00651'][$language]; /* Grand Total */?>:</td>
			        <td style="text-align: right;"> ${numberThousand(grandTotal, 2)} </td>
			    </tr>
			`);
		}
	}
}

</script>
