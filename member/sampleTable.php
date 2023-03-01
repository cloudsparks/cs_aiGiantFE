<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>

<section class="pageContent">
	<div class="kt-container">
		<div class="col-12 pageTitle">
			<?php echo $translations['M01790'][$language] /*Portfolio*/ ?>
		</div>
	    <div class="col-12">
	    	<form id="searchForm">
	    		<div class="col-12 px-0">
			        <div class="row">
			        	<div class="col-lg-4 col-md-6 col-12 form-group" id="datepicker">
			        	    <label><?php echo $translations['M00989'][$language] /*Date Range*/ ?></label>
			        	    <div class="input-daterange input-group" id="datepicker-range">
			        	    	<input id="dateRangeStart" type="text" class="input-sm form-control" name="start" dataType="dateRange" dataName="dateRange" autocomplete="off">
			        	    	<span class="input-group-text"><?php echo $translations['M00283'][$language] /*to*/ ?></span>
			        	        <input id="dateRangeEnd" type="text" class="form-control" name="end" dataType="dateRange" autocomplete="off" dataName="dateRange">
			        	    </div>
			        	</div>
			        	<div class="col-lg-4 col-md-6 col-12 form-group" id="datepicker">
			        	    <label>Username</label>
			        	    <input type="text" class="form-control" dataName="username">
			        	</div>
			        	<div class="col-lg-4 col-md-6 col-12 form-group" id="datepicker">
			        	    <label>Type</label>
			        	    <select class="form-control" dataName="type">
			        	    	<option value="">All</option>
			        	    	<option value="1">Type 1</option>
			        	    	<option value="2">Type 2</option>
			        	    	<option value="3">Type 3</option>
			        	    </select>
			        	</div>
			        </div>
	    		</div>

	    		<div class="col-12 px-0">
	    				<button id="searchBtn" class="btn btn-primary" type="button" name="button"><?php echo $translations['M00052'][$language] /*Search*/ ?></button>
	    				<span> <i class="fa fa-repeat ml-3" style="color:#696969; font-size: 20px;  transform: rotate(-40deg); vertical-align: text-top; cursor: pointer;" id="resetBtn"></i> </span>
	    		</div>

	    	</form>
	    </div>

	</div>
	<div class="kt-container pt-4">
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
		    
		</div>
	</div>
</section>

<?php include 'footer.php'; ?>
</body>

<?php include 'backToTop.php' ?>
<?php include 'sharejs.php'; ?>

</html>


<script>
//Preparation to Link Backend
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
var pagerId  = 'listingPager';
var btnArray = {};

//Table Header
var thArray  = Array(
		"<?php echo $translations['M01784'][$language] //Entry Date ?>",
		"<?php echo $translations['M00019'][$language] //Principle Amount ?>",
		"<?php echo $translations['M00166'][$language] //Bonus Value ?>",
		"<?php echo $translations['M00327'][$language] //Status ?>",
		"View"
);

$(document).ready(function(){
	//start call api to get data from backend
	var formData  = {
	  command: 'getPortfolioList'
	};
	var fCallback = loadDefaultListing;
	ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

	//function for datepicker
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

    //function for enter button for search
    $("body").keyup(function(event) {
	if (event.keyCode == 13) {
		$("#searchBtn").click();
		}
	});

	// Search Button
	$('#searchBtn').click(function() {
		pagingCallBack(pageNumber, loadSearch);
	});
	// END Search Button

	// Reset Button
	$("#resetBtn").click(function(){
		$("#searchForm").find("input").each(function(){
			$(this).val('');
		});
		$("#searchForm").find("select").each(function(){
			$(this).val('');
		});
	});
	// END Reset Button

});

//search function, change command only
function pagingCallBack(pageNumber, fCallback){
    if(pageNumber > 1) bypassLoading = 1;

    var searchId = 'searchForm';
    var searchData = buildSearchDataByType(searchId);
    var formData = {
        command             : "getPortfolioList",
        pageNumber          : pageNumber,
        searchData          : searchData
    };
    if(!fCallback)
        fCallback = loadDefaultListing;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}


function loadSearch(data, message) {
		$('#searchMsg').addClass('noData').html('<span><?php echo $translations['M00548'][$language]; //Search Successful ?></span>').show();
		setTimeout(function() {
				$('#searchMsg').removeClass('noData').html('').hide();
		}, 3000);
}


//load data (replace param)
function loadDefaultListing(data, message) {
	console.log(data);

	
	var list = data.portfolioPageListing;
	var tableNo;

	if(list){
		var newList = [];
		$.each(list, function(k,v){
			//loop for button
			var viewBtn = `
				<a href="javascript:;" class="btn btn-primary" onclick="viewFuction('${v['id']}')">
					View Here
				</a>
			`;

			var rebuildData ={
				entryDate			:	v['createdAt'],
				amount				:	v['amount'],
				bonusValue			:	numberThousand(v['bonus_value'], 2), 
				price				:	v['statusDisplay'],
				view 				:   viewBtn
			};
				newList.push(rebuildData);
		});

		buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
		pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

		// set css style for specific column
		$('#'+tableId).find('thead tr').each(function(){
			$(this).find('th:eq(1)').css('text-align', "right");
			$(this).find('th:eq(0)').css('white-space', "nowrap");
			$(this).find('th:eq(0)').css('background-color', "grey");
		});

		$('#'+tableId).find('tbody tr').each(function(){
			$(this).find('td:eq(1)').css('text-align', "right");
			$(this).find('td:eq(0)').css('white-space', "nowrap");
		});

		
		// DataTables setting
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
		//to set style function for datatable
		    columnDefs: [
		        { className: 'control', orderable: false, targets: 0 },
		        { responsivePriority: 3, targets: 1,},
		        { responsivePriority: 4, targets: 2 },
		        { responsivePriority: 1, targets: 3 },
		        { responsivePriority: 2, targets: 4 }
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
}

//function to bring data from current page to next page (view invoice,edit)
function viewFuction(clientID) {
	$.redirect('detailPage.php', {
		clientID : clientID
	});
}

</script>
