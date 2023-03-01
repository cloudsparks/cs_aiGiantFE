<?php 
    session_start();

    if (in_array("HAM Trading", $_SESSION['blockedRights'])){
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
				<?php echo $translations['M01039'][$language] //HAM Trading ?>
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
							        	<!-- <div class="col-lg-4 col-md-6 col-5 form-group" id="datepicker">
							        	    <label><?php echo $translations['M00091'][$language] /*Date Range*/ ?></label>
							        	    <div class="input-daterange input-group" id="datepicker-range">
							        	    	<input id="dateRangeStart" type="text" class="input-sm form-control" name="start" dataType="dateRange" dataName="date" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
							        	    	<span class="input-group-text">-</span>
							        	        <input id="dateRangeEnd" type="text" class="form-control" name="end" dataType="dateRange" autocomplete="off" dataName="date" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
							        	    	<label for="dateRangeStart" class="input-group-text"><i class="fa fa-calendar"></i></label>
							        	    </div>
							        	</div> -->

							        	<div class="col-lg-4 col-md-6 col-5 form-group" id="datepicker">
							        	    <label><?php echo $translations['M01044'][$language] /*Close Date*/ ?></label>
							        	    <div class="input-daterange input-group" id="datepicker-range2">
							        	    	<input id="dateRangeStart2" type="text" class="input-sm form-control" name="start" dataType="dateRange" dataName="closeDate" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
							        	    	<span class="input-group-text">-</span>
							        	        <input id="dateRangeEnd2" type="text" class="form-control" name="end" dataType="dateRange" autocomplete="off" dataName="closeDate" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
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
						<div class="col-12 pt-4">
						    <form>
						        <div id="basicwizard" class="pull-in col-12 px-0">
						            <div class="tab-content b-0 m-b-0 p-t-0">
						                <div id="alertMsg" class="text-center" style="display: block;"></div>
						                <div id="mt4Div" class="table-responsive"></div>
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

	var creditType = "<?php echo $_POST['creditType']; ?>";
	var creditDisplay = "<?php echo $_POST['creditDisplay']; ?>";
	var divId    = 'mt4Div';
	var tableId  = 'mt4Table';
	var pagerId  = 'pagerList';
	var btnArray = {};
	var thArray  = Array (
	'<?php echo $translations['M01040'][$language]; //Symbol ?>',
	'<?php echo $translations['M01041'][$language]; //Open Price ?>',
	'<?php echo $translations['M01042'][$language]; //Close Price ?>',
	'<?php echo $translations['M01043'][$language]; //Close Time ?>',
	'<?php echo $translations['M00399'][$language]; //Profit ?>'
	);

	$(document).ready(function() {

		var formData = {
	        command: 'getMT4TradeReport',
	        pageNumber: pageNumber
	    };
        fCallback = loadDefaultListing;
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

        $('#dateRangeEnd2').click(function() {
            $('#dateRangeStart2').trigger('click');
        });
        $('#dateRangeStart2').daterangepicker({    
            autoApply: true,
            autoUpdateInput: false,
            locale: {
                format: 'DD/MM/YYYY'
            }
        }, function(start, end, label) {
            $("#dateRangeStart2").val(start.format('DD/MM/YYYY'));
            $("#dateRangeEnd2").val(end.format('DD/MM/YYYY'));
        });

        $('#dateRangeEnd2').click(function() {
            $('#dateRangeStart2').trigger('click');
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
	        command: 'getMT4TradeReport',
			searchData 	: searchData,
            pageNumber  : pageNumber
	    };
        fCallback = loadDefaultListing;
	    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
	}

	function loadSearch(data, message) {
	   	loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span><?php echo $translations['A00114'][$language]; /* Search successful. */ ?></span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide(); 
        }, 3000);
	}
	

	function loadDefaultListing(data, message) {
		var tableNo;
		console.log(data);
        $('#basicwizard').show();
       
        if (data.report){
            var newList = [];
            $.each(data.report, function(k, v){

                var rebuildData = {
					symbol 		: v['symbol'],
					openPrice 	: numberThousand(v['openPrice'], 2),
					closePrice  : numberThousand(v['closePrice'], 2),
					closeTime 	: v['closeTime'],
					profit 		: numberThousand(v['profit'], 2)
				};
				newList.push(rebuildData);
            });
        }
        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);
		
        // $('#' + tableId).find('tbody tr').each(function () {
        //     $(this).find('td:eq(1)').css('text-align', "right");
        //     $(this).find('td:eq(2)').css('text-align', "right");
        //     $(this).find('td:eq(4)').css('text-align', "right");
        // });

	}
</script>
