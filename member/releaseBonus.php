<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>

<section class="pageContent">
	<div class="kt-container">
        <div class="col-12 pageTitle">
            <?php echo $translations['M00095'][$language]; //Release Bonus ?>
        </div>
	    <div class="col-12">
	    	<form id="searchDIV">
	    		<div class="col-12 px-0">
			        <div class="row">
			        	<div class="col-lg-3 col-md-6 col-12 form-group" id="datepicker">
			        	    <label><?php echo $translations['M00989'][$language] /*Date Range*/ ?></label>
			        	    <div class="input-daterange input-group" id="datepicker-range">
			        	    	<input id="dateRangeStart" type="text" class="input-sm form-control" name="start" dataType="dateRange" dataName="bonusDate" autocomplete="off">
			        	    	<span class="input-group-text"><?php echo $translations['M00283'][$language] /*to*/ ?></span>
			        	        <input id="dateRangeEnd" type="text" class="form-control" name="end" dataType="dateRange" autocomplete="off" dataName="bonusDate">
			        	  
			        	    </div>
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
            <button id="seeAllBtn" type="button" class="btn btn-primary mb-2" style="display: none;"><?php echo $translations['A01191'][$language] //See All ?></button>
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
            <div class="col-12">
                <button id="terminateBtn" class="btn btn-primary" type="button" name="button" style="display: none;"><?php echo $translations['M00047'][$language] //Termination ?></button>
            </div>
        </div>
    </div>
</section>


<?php include 'footer.php'; ?>
</body>

<?php include 'backToTop.php' ?>
<?php include 'sharejs.php'; ?>

</html>

<div class="modal fade warningModal" id="terminatePortfolio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="padding-left: 17px; padding-right: 18.9884px; display: none;" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <span class="modal-title"><?php echo $translations['M00047'][$language] //Termination ?></span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modalLine"></div>
            <div class="modal-body modalBodyFont">
                <div class="col-12">
                	<div class="row">
                		<div class="col-12" style="margin-top: 10px">
                			<label class="registrationLabel"><?php echo $translations['M00014'][$language] //Total Principle ?></label>
                			<input id="totalPrinciple" class="form-control inputDesign" type="text" disabled>
                		</div>
                		<div class="col-12" style="margin-top: 10px">
                			<label class="registrationLabel"><?php echo $translations['M00048'][$language] //Termination Fee ?></label>
                			<input id="terminationFee" class="form-control inputDesign" type="text" disabled>
                		</div>
                		<div class="col-12" style="margin-top: 10px">
                			<label class="registrationLabel"><?php echo $translations['M00465'][$language] //Amount Receivable ?></label>
                			<input id="amountReceivable" class="form-control inputDesign" type="text" disabled>
                		</div>
                		<div class="col-12" style="margin-top: 10px">
                			<label class="registrationLabel"><?php echo $translations['M00192'][$language] //Transaction Password ?></label>
                			<input id="paymentTPassword" class="form-control inputDesign" type="password">
                		</div>
                	</div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="closeBtn" type="button" class="btn btn-default" data-dismiss="modal"><?php echo $translations['M00112'][$language]; //Close ?></button>
                <button id="confirmBtn" type="button" class="btn btn-primary"><?php echo $translations['M00225'][$language] /*Confirm*/ ?></button>
            </div>
        </div>
    </div>
</div>


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

var thArray  = Array(
		"<?php echo $translations['A00969'][$language]; //Bonus Date ?>",
		"<?php echo $translations['M00166'][$language]; //Bonus Value ?>",
		"<?php echo $translations['A00973'][$language]; //Percentage ?>",
		"<?php echo $translations['M00162'][$language]; //Bonus Received ?>",
);


$(document).ready(function(){
	
	var formData  = {
	  command: 'getReleaseBonusReport'
	};
	var fCallback = loadDefaultListing;
	ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

    $('#seeAllBtn').click(function() {

        var searchID = 'searchForm';
        var searchData = buildSearchDataByType(searchID);
        formData  = {
            command : 'getReleaseBonusReport',
            inputData   : searchData,
            pageNumber   : 1,
            seeAll   : 1
        };
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

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
        command             : "getReleaseBonusReport",
        pageNumber          : pageNumber,
        searchData          : searchData
    };
    // if(!fCallback)
    var fCallback = loadDefaultListing;
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

    if(list){
        var newList = [];
        $.each(list, function(k,v){

            var rebuildData ={
				bonus_date				:	v['bonus_date'],
				from_amount				:	addCommas(Number(v['from_amount']).toFixed(8)), 
				percentage				:	addCommas(Number(v['percentage']).toFixed(2)),
				bonus_received			:	addCommas(Number(v['bonus_received']).toFixed(8))
			};
            newList.push(rebuildData);
        });

        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);
        

        if ( $(window).width() >= 767 ) {
            $('#' + tableId).find('tbody').append(`
                <tr class="">
                    <td></td>
                    <td></td>
                    <td style="text-align:right;border-left: none;">
                        <b>
                            <?php echo $translations['A00651'][$language]; /* Grand Total */?>:
                        </b>
                    </td>
                    <td>${addCommas(Number(data.pagingTotal).toFixed(8))}</td>  
                </tr>
            `);
        }

    
        $('#'+tableId).find('thead tr').each(function(){
            $(this).find('th:eq(2)').css('text-align', "right");
            $(this).find('th:eq(4)').css('text-align', "right");
        });

        $('#'+tableId).find('tbody tr').each(function(){
            $(this).find('td:eq(2)').css('text-align', "right");
            $(this).find('td:eq(4)').css('text-align', "right");
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
                { responsivePriority: 4, targets: 4 }
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

    if (data.pageNumber > 1) {
        $('#seeAllBtn').show();
    } else {
        $('#seeAllBtn').hide();
    }
}



function successMessage(data, message) {
	$('#terminatePortfolio').modal('hide');
	showMessage(message, "success", "<?php echo $translations['M00451'][$language]; /* Congratulations */ ?>","", "portfolio.php");
}
</script>
