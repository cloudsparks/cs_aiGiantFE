<?php 
    session_start();

    if (in_array("Bank Account Listing", $_SESSION['blockedRights'])){
     header("Location: dashboard.php");
    } 
?>


<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>

<section class="pageContent">
	<div class="kt-container">
		<?php include 'sidebar.php'; ?>
		<div class="col-12">
			<div class="row justify-content-center">
				<div class="col-md-11 col-lg-10">

					<div class="listingWrapper">
						<div class="col-12 pageTitle">
							<span data-lang="M00074"><?php echo $translations['M00074'][$language] /*Bank Account Listing*/ ?></span>
						</div>
					    <!-- <div class="col-12">
					    	<form id="searchDIV">
					    		<div class="col-12 px-0">
							        <div class="row align-items-end">
							        	<div class="col-lg-3 col-md-6 col-12 form-group" id="datepicker">
							        	    <label><?php echo $translations['M00091'][$language] /*Date Range*/ ?></label>
							        	    <div class="input-daterange input-group" id="datepicker-range">
							        	    	<input id="dateRangeStart" type="text" class="input-sm form-control" name="start" dataType="dateRange" dataName="dateRange" autocomplete="off">
							        	    	<span class="input-group-text">-</span>
							        	        <input id="dateRangeEnd" type="text" class="form-control" name="end" dataType="dateRange" autocomplete="off" dataName="dateRange">
							        	    	<label for="dateRangeStart" class="input-group-text"><i class="fa fa-calendar"></i></label>
							        	    </div>
							        	</div>

							        	<div class="col mt-3">
							        		<button id="searchBtn" class="btn btn-primary" type="button" name="button"><?php echo $translations['M00243'][$language] /*Search*/ ?></button>
							        		<span> <i class="fa fa-repeat ml-3" style="color:#696969; font-size: 20px;  transform: rotate(-40deg); vertical-align: text-top; cursor: pointer;" id="resetBtn"></i> </span>
							        	</div>
							        </div>
					    		</div>

					    	</form>
					    </div> -->
						<div class="col-12">
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
		<?php include 'footer.php'; ?>
	</div>
</section>


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
		"<?php echo $translations['M00068'][$language] //Bank ?>",
		"<?php echo $translations['M00067'][$language] //Account Holder Name ?>",
		"<?php echo $translations['M00069'][$language] //Account No ?>",
		"<?php echo $translations['M00071'][$language] //Branch ?>",
);


$(document).ready(function(){
	
	var formData  = {
	  command: 'getBankAccountListMember'
	};
	var fCallback = loadDefaultListing;
	ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

	$("body").keyup(function(event) {
		if (event.keyCode == 13) {
			$("#searchBtn").click();
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
        command             : "getBankAccountListMember",
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


function loadDefaultListing(data, message) {
	var list = data.bankAccList;
	var tableNo;

	if(list){
		var newList = [];
		$.each(list, function(k,v){

			var buildBtn = ``;
			if(v['statusFlag'] == 1){
				buildBtn = `<div class="btn btn-primary" onclick="inactiveAcc('${v['id']}')"><?php echo $translations["M00971"][$language]; /* Inactive */ ?></div>`;
			}

			var rebuildData ={
				bankName				:	v['bankName'],
				accountHolder			:	v['accountHolder'],
				accountNo				:	v['accountNo'],
				branch					:	v['branch'],
			};
				newList.push(rebuildData);
		});

	} 

	buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
	pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

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
}

function inactiveAcc(id){

	var canvasBtnArray = {
	    'Confirm' : '<?php echo $translations["M00086"][$language]; /* Confirm */ ?>'
	};

	showMessage(`<span data-lang="M00076"><?php echo $translations["M00076"][$language]; /* Are you sure you want to deactive this bank account */ ?></span>`, 'warning', `<span data-lang="M00075"><?php echo $translations["M00075"][$language]; /* Inactive Confirmation */ ?></span>`, '', '', canvasBtnArray);

	$('#canvasConfirmBtn').click(function() {
	    var formData  = {
	      command: 'inactiveBankAccount',
	      checkedIDs : id
	    };
	    var fCallback = inactiveSuccess;
	    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
	});
}

function inactiveSuccess(data, message) {
	showMessage(message, 'success', `<span data-lang="M00215"><?php echo $translations["M00215"][$language]; /* Success */ ?></span>`, '', 'bankAccountListing.php');
}

</script>
