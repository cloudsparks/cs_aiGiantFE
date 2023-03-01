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
				<span data-lang="M03626"><?php echo $translations['M03626'][$language] /* World Cup Event */ ?></span>
			</div>
		</div>

		<div class="col-12">
			<div class="row justify-content-center">
				<div class="col-11 ">

					<div class="listingWrapper2">
					    <div class="col-12">
					    	<form id="searchDIV">
					    		<div class="col-12 px-0">
							        <div class="row align-items-end">
							        	<div class="col-lg-4 col-md-6 col-12 form-group" id="datepicker">
							        	    <label data-lang="M00091"><?php echo $translations['M00091'][$language] /*Date Range*/ ?></label>
							        	    <div class="input-daterange input-group" id="datepicker-range">
							        	    	<input id="dateRangeStart" type="text" class="input-sm form-control" name="start" dataType="dateRange" dataName="date" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
							        	    	<span class="input-group-text">-</span>
							        	        <input id="dateRangeEnd" type="text" class="form-control" name="end" dataType="dateRange" autocomplete="off" dataName="date" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
							        	    	<label for="dateRangeStart" class="input-group-text mr-2"><i class="fa fa-calendar"></i></label>
							        	    </div>
							        	</div>

							        	<div class="col mt-3">
							        		<button id="searchBtn" class="btn btn-primary" type="button" name="button" data-lang="M00243"><?php echo $translations['M00243'][$language] /*Search*/ ?></button>
							        		<button id="resetBtn" class="btn btn-default" type="button" name="button" data-lang="M00085"><?php echo $translations['M00085'][$language] /*Reset*/ ?></button>
							        		<!-- <span> <i class="fa fa-repeat ml-3" style="color:#696969; font-size: 20px;  transform: rotate(-40deg); vertical-align: text-top; cursor: pointer;" id="resetBtn"></i> </span> -->
							        	</div>
							        </div>
					    		</div>

					    	</form>
					    </div>
						<div class="col-12 mt-4 pt-4 px-0">
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
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</section>

<div class="modal fade oddModal" id="oddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="" aria-modal="true">
    <div class="modal-dialog worldCupModalDialog" role="document">
        <div class="modal-content">
            <div class="modal-header canvasheader">
                <div class="row text-center">
                
                    <div class="col-12" data-lang="M03630"><span><?php echo $translations['M03630'][$language]; /* World Cup Event Details */ ?></span></div>
                </div>
                <div class="modalCloseWrap">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                </div>                
            </div>
            <!-- <div class="modalLine"></div> -->
            <div class="modal-body w-100">
                <div class="col-12 px-0">
                    <form>
                        <div id="basicwizardDetails" class="pull-in col-12 px-0 overflowTable">
                            <div class="tab-content b-0 m-b-0 p-t-0">
                                <div id="alertMsgDetails" class="text-center" style="display: block;"></div>
									<table class="table table-striped tableHeadCustom worldCupFont worldCupTable" id="worldCupDetails">
										<tr>
											<td id="eventDate" class="worldCupColumnFirst"></td>
											<td id="eventDateContent"></td>
										</tr>
										<tr>
											<td id="eventMatch" class="worldCupColumnFirst"></td>
											<td id="eventMatchContent"></td>
										</tr>
										<tr>
											<td id="eventOdd" class="worldCupColumnFirst"></td>
											<td id="eventOddContent"></td>
										</tr>
									</table>
                                <div id="transactionHistoryDivDetails" class="table-responsive worldCupFont">									
								</div>
                                <span id="paginateTextDetails"></span>
                                <div class="text-center">
                                    <ul class="pagination pagination-md" id="pagerListDetails"></ul>
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
var disabledValue;
var daysValue;
var saveData;
var divIdDetails    = 'transactionHistoryDivDetails';
var tableIdDetails  = 'transactionHistoryTableDetails';
var pagerIdDetails  = 'pagerListDetails';
var btnArrayDetails = {};

var thArray  = Array(
		'<span data-lang="M00392" class="bottom"><?php echo $translations['M00392'][$language]; ?></span>', //Date
		'<span data-lang="M03628" class="bottom"><?php echo $translations['M03628'][$language]; /* Match */ ?></span>',
		'<span data-lang="M03629" class="bottom"><?php echo $translations['M03629'][$language]; /* Odd */ ?></span>', 
		'<span data-lang="M03627"><?php echo $translations['M03627'][$language]; /* Action */ ?></span',
);

var thArrayDetails  = Array (
    '<span data-lang="M00392"><?php echo $translations['M00392'][$language]; /* Date */ ?></span>',
    '<span data-lang="M03628"><?php echo $translations['M03628'][$language]; /* Match */ ?></span>',
    '<span data-lang="M03629"><?php echo $translations['M03629'][$language]; /* Odd */ ?></span>'
);

$(document).ready(function(){
    var formData  = {
	  command: 'getWorldCupEventList'
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

    $("body").keyup(function(event) {
		if (event.keyCode == 13) {
			$("#searchBtn").click();
		}
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
});

function pagingCallBack(pageNumber, fCallback){
    if(pageNumber > 1) bypassLoading = 1;

    var searchId = 'searchDIV';
    var searchData = buildSearchDataByType(searchId);
    var formData = {
        command             : "getWorldCupEventList",
        pageNumber          : pageNumber,
        searchData          : searchData
    };
    // if(!fCallback)
        fCallback = loadDefaultListing;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function loadDefaultListing(data, message, item) {
	var list = data.report;
    var tableNo;
    saveData = list;
    var oddString;
	var matchString;
	
	if(list){
		var newList = [];
		$.each(list, function(k,v){

            if($(v['odd']).html().length >= 60 || $(v['odd']).length > 1) {
                oddString = $(v['odd']).html()
				oddString = oddString.replace(/&nbsp;/g,' ')
				oddString = oddString.slice(0,40)
				oddString = oddString+'...'
            }else {
                oddString = $(v['odd']).html();
            }

			if($(v['match']).html().length >= 60 || $(v['match']).length > 1) {
                matchString = $(v['match']).html()
				matchString = matchString.replace(/&nbsp;/g,' ')
				matchString = matchString.slice(0,40)
				matchString = matchString+'...'
            }else {
                matchString = $(v['match']).html();
            } 

			viewBtn = `<button class="btn btn-primary" type="button" onclick="openModal(${v['id']})"><i class="fa fa-eye"></i></button>`;

            var rebuildData ={
                date: v['created_at'],
                match: matchString,
                odd: oddString,
                viewBtn: viewBtn,
            };
        
            newList.push(rebuildData);
		});

	}

	buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
	pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

	$('#'+tableId).find('tr').each(function(){
	    $(this).find('td,th').css('text-align', "center");
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

}

function loadSearch(data, message) {
    $('#searchMsg').addClass('noData').html('<span><?php echo $translations['M00548'][$language]; //Search Successful ?></span>').show();
    setTimeout(function() {
            $('#searchMsg').removeClass('noData').html('').hide();
    }, 3000);
}

function openModal(id){
        var oddList = saveData;
        var tableNoDetails;

        if(oddList){
            var newList = [];
            $.each(oddList, function(k, v) {
                if(v['id'] == id ) {
					$('#eventDate').html(thArrayDetails[0])
					$('#eventMatch').html(thArrayDetails[1])
					$('#eventOdd').html(thArrayDetails[2])
					$('#eventDateContent').html(v['created_at'])
					$('#eventMatchContent').html(v['match'])
					$('#eventOddContent').html(v['odd'])
                }
            });
        } 

		

        /* buildTable(newList, tableIdDetails, divIdDetails, thArrayDetails, btnArrayDetails, "", tableNoDetails);
 
		$('#'+tableIdDetails).find('tr').each(function(){
        	$(this).find('th:eq(0),td:eq(0)').css('width', "123px");
        	$(this).find('th:eq(0),td:eq(0)').css('min-width', "123px");
        	$(this).find('th:eq(1),td:eq(1)').css('width', "226px");
			$(this).find('td:eq(1) > p').css('width', "226px");
        	$(this).find('td:eq(1) > p').css('word-wrap', "break-word");
        	$(this).find('th:eq(2),td:eq(2)').css('width', "349px");
        	$(this).find('td:eq(2) > p').css('width', "349px");
        	$(this).find('td:eq(2) > p').css('word-wrap', "break-word");


        });

		$('#newTable').tableflip($('#'+tableIdDetails)); */

		//$('#worldCupDetails').find('td:first-child').css('backgroundColor','#C9A66C')
		//$('#worldCupDetails').find('td:first-child').css('backgroundColor','#C9A66C')

        $('#oddModal').modal('show');
    }

</script>
