<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>



<section class="pageContent">
	<div class="kt-container">
		<div class="text-center">
			<div class="pageTitle" data-lang='M00012'>
				<span id="creditType" data-lang="M00007"><?php echo $_POST['creditDisplay'] ?></span> -
				<?php echo $translations['M00012'][$language] //Transaction History ?>
			</div>
		</div>

		<div class="col-12">
			<div class="row justify-content-center">
				<div class="col-md-11">

					<div class="listingWrapper2">
					    <div class="col-12">
					    	<form id="searchDIV">
					    		<div class="col-12 px-0">
							        <div class="row align-items-end">
							        	<div class="col-lg-4 col-md-6 col-12 form-group date-container" id="datepicker">
							        	    <label data-lang='M00091'><?php echo $translations['M00091'][$language] /*Date Range*/ ?></label>
							        	    <div class="input-daterange input-group" id="datepicker-range">
							        	    	<input id="dateRangeStart" type="text" class="input-sm form-control" name="start" dataType="dateRange" dataName="dateRange" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
							        	    	<span class="input-group-text">-</span>
							        	        <input id="dateRangeEnd" type="text" class="form-control" name="end" dataType="dateRange" autocomplete="off" dataName="dateRange" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
							        	    	<label for="dateRangeStart" class="input-group-text mr-2"><i class="fa fa-calendar"></i></label>
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
		<?php include 'footer.php'; ?>
	</div>
</section>



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

	var creditType = "<?php echo $_POST['creditType']; ?>";
	var creditDisplay = "<?php echo $_POST['creditDisplay']; ?>";
	var divId    = 'transactionHistoryDiv';
	var tableId  = 'transactionHistoryTable';
	var pagerId  = 'pagerList';
	var btnArray = {};
	var thArray  = Array (
	'<span data-lang="M00092" class="bottom"><?php echo $translations['M00092'][$language]; //TRANSACTION DATE ?></span>',
	'<span data-lang="M00093" class="bottom"><?php echo $translations['M00093'][$language]; //TRANSACTION TYPE ?></span>',
	'<span data-lang="M00094" class="bottom"><?php echo $translations['M00094'][$language]; //TO/FROM ?></span>',
	'<span data-lang="M00095" class="bottom"><?php echo $translations['M00095'][$language]; //IN ?></span>',
	'<span data-lang="M00096" class="bottom"><?php echo $translations['M00096'][$language]; //OUT ?></span>',
	'<span data-lang="M00097" class="bottom"><?php echo $translations['M00097'][$language]; //BALANCE ?></span>',
	'<span data-lang="M00098" class="bottom"><?php echo $translations['M00098'][$language]; //DONE BY ?></span>',
	'<span data-lang="M00099" class="bottom"><?php echo $translations['M00099'][$language]; //REMARK ?></span>'
	);

	$(document).ready(function() {

		$("body").keyup(function(event) {
			if (event.keyCode == 13) {
				$("#searchBtn").click();
			}
		});

		

		formData  = {
			command: 'getTransactionHistory',
			creditType: creditType
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



	function pagingCallBack(pageNumber, fCallback){
	    if(pageNumber > 1) bypassLoading = 1;

	    var searchId = 'searchDIV';
	    var searchData = buildSearchDataByType(searchId);
	    var formData = {
	        command             : "getTransactionHistory",
	        creditType  : "<?php echo $_POST['creditType']; ?>",
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
		console.log(data);

		$('#creditType').html(data.creditDisplay);

		var list = data.transactionList;
		var tableNo;
		var grandTotal = data.grandTotal;
		var htmlContent = "";

		if(list){
			var newList = [];
			$.each(list, function(k, v) {
				if (v['credit_in'] != "-") {
					var credit_in = numberThousand(v['credit_in'],2);
				} else {
					var credit_in = v['credit_in'];
				}

				if (v['credit_out'] != "-") {
					var credit_out = numberThousand(v['credit_out'],2);
				} else {
					var credit_out = v['credit_out'];
				}

				if(v['subject'] == "Re-entry")
				{
					var transactiontype = '<?php echo $translations['M00629'][$language]; //Subscription ?> ' +translations[v['package']][language];
				}
				else
				{
					var transactiontype = v['subject'];
				}

				var getCurrentInfo = "";
				if(creditType == "quantiniumWallet")
					getCurrentInfo = v['packageSN'];
				else
					getCurrentInfo = v['to_from'];

				var rebuildData = {
					created_at 		: v['created_at'],
					subject 		: transactiontype,
					getCurrentInfo  : getCurrentInfo,
					credit_in 		: credit_in,
					credit_out 		: credit_out,
					balance 		: addCommas(Number(v['balance']).toFixed(2)),
					creator_id 		: v['creator_id'],
					remark 			: v['remark']
				};
				newList.push(rebuildData);

			});

		} 



			buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
			pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

			$('#'+tableId).find('thead tr').each(function(){
				$(this).find('th:eq(3)').css('text-align', "right");
				$(this).find('th:eq(4)').css('text-align', "right");
				$(this).find('th:eq(5)').css('text-align', "right");
			});

			$('#'+tableId).find('tbody tr').each(function(){
				$(this).find('td:eq(3)').css('text-align', "right");
				$(this).find('td:eq(4)').css('text-align', "right");
				$(this).find('td:eq(5)').css('text-align', "right");
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
