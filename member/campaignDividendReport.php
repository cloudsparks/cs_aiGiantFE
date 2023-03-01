<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>

<section class="pageContent">
	<div class="kt-container">
		<div class="text-center">
			<div class="pageTitle" data-lang='M03576'>
				<!-- <span id="creditType" data-lang="M00007"><?php echo $_POST['creditDisplay'] ?></span> -  -->
                <?php echo $translations['M03576'][$language] //Bidding Campaign Dividend Report ?>
			</div>
		</div>

		<div class="col-12">
			<div class="row justify-content-center">
				<div class="col-md-11">
					<div class="listingWrapper2">
					    <div class="col-12">
					    	<form id="searchDIV">
					    		<div class="col-12 px-2">
							        <div class="row align-items-end">
							        	<div class="col-lg-4 col-md-6 col-12 form-group date-container" id="datepicker">
							        	    <label data-lang='M00091'><?php echo $translations['M00091'][$language] /*Date*/ ?></label>
							        	    <div class="input-daterange input-group" id="datepicker-range">
							        	    	<input id="dateRangeStart" type="text" class="input-sm form-control" name="start" dataType="dateRange" dataName="date" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
							        	    	<span class="input-group-text">-</span>
							        	        <input id="dateRangeEnd" type="text" class="form-control" name="end" dataType="dateRange" autocomplete="off" dataName="date" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
							        	    	<label for="dateRangeStart" class="input-group-text mr-2"><i class="fa fa-calendar"></i></label>
							        	    </div>
							        	</div>

							        	<div class="col mt-3">
							        		<button id="searchBtn" class="btn btn-primary" type="button" name="button" data-lang='M00243'><?php echo $translations['M00243'][$language] /*Search*/ ?></button>
							        		<button id="resetBtn" class="btn btn-default" type="button" name="button" data-lang='M00085'><?php echo $translations['M00085'][$language] /*Reset*/ ?></button>
							        	</div>
							        </div>
					    		</div>
					    	</form>
					    </div>
						<div class="col-12 pt-4 px-0">
						    <form>
						        <div id="basicwizard" class="pull-in col-12 px-0">
						            <div class="tab-content b-0 m-b-0 p-t-0">
						                <div id="alertMsg" class="text-center" style="display: block;"></div>
						                <div id="transactionHistoryDiv" class="table-responsive"></div>
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

	// var creditType = "<?php echo $_POST['creditType']; ?>";
	// var creditDisplay = "<?php echo $_POST['creditDisplay']; ?>";
	var divId    = 'transactionHistoryDiv';
	var tableId  = 'transactionHistoryTable';
	var pagerId  = 'pagerList';
	var btnArray = {};
	var thArray  = Array (
            '<span data-lang="M00092" class="bottom"><?php echo $translations['M00092'][$language]; //Date ?></span>',
            '<span data-lang="M03603" class="bottom"><?php echo $translations['M03603'][$language]; //Bidding Title ?></span>',
            '<span data-lang="M03577" class="bottom"><?php echo $translations['M03577'][$language]; //Paticipating Amount ?></span>',
            '<span data-lang="M03578" class="bottom"><?php echo $translations['M03578'][$language]; //Profit Gain (%) ?></span>',
            '<span data-lang="M03579" class="bottom"><?php echo $translations['M03579'][$language]; //Total Campaign Dividend ?></span>',
	);

	$(document).ready(function() {

		formData  = {
            command : "getNavBarDetails"
        };

        fCallback = blockAccess;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

		$("body").keyup(function(event) {
			if (event.keyCode == 13) {
				$("#searchBtn").click();
			}
		});

		formData  = {
			command: 'campaignDividendReport',
			// creditType: creditType
		};
		fCallback = loadDefaultListing;
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
		$('#searchBtn').click(function() {
			pagingCallBack(pageNumber, loadSearch);
		});
	});

	function blockAccess(data, message) {
       if(data.isChinaLine && data.isChinaLine == 1) {
        	window.location.href = 'dashboard.php';
        }
    }

	function pagingCallBack(pageNumber, fCallback){
	    if(pageNumber > 1) bypassLoading = 1;

	    var searchId = 'searchDIV';
	    var searchData = buildSearchDataByType(searchId);
	    var formData = {
	        command             : "campaignDividendReport",
	        // creditType          : "<?php echo $_POST['creditType']; ?>",
	        pageNumber          : pageNumber,
	        searchData          : searchData
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
		var list = data.campaignReport;
		var tableNo;
		var htmlContent = "";

		if(list){
			var newList = [];
			$.each(list, function(k, v) {
				var rebuildData = {
					date 		    		: v['date'],
					title : v['title'],
					participatingamount 	: addCommas(Number(v['participatingamount']).toFixed(0)),
					profitgain         		: addCommas(Number(v['profitgain']).toFixed(2)) + '%',
					totalcampaigndividend 	: numberThousand(v['totalcampaigndividend'],0),
				};
				newList.push(rebuildData);
			});
		} 

			buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
			pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

			$('#'+tableId).find('thead tr').each(function(){
				$(this).find('th:eq(1)').css('text-align', "right");
				$(this).find('th:eq(2)').css('text-align', "right");
				$(this).find('th:eq(3)').css('text-align', "right");
			});

			$('#'+tableId).find('tbody tr').each(function(){
				$(this).find('td:eq(1)').css('text-align', "right");
				$(this).find('td:eq(2)').css('text-align', "right");
				$(this).find('td:eq(3)').css('text-align', "right");
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
</script>