<?php include 'include/config.php'; ?>
<?php
    session_start();

    if (in_array("Wallet Address Listing", $_SESSION['blockedRights'])){
     header("Location: dashboard");
    }
?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>

<section class="pageContent">
    <div class="kt-container">

        <div class="text-center">
            <div class="pageTitle">
                <span data-lang="M00471"><?php echo $translations['M00471'][$language]; //Wallet Address Listing ?></span>
            </div>
        </div>

        <div class="col-12">
            <div class="row justify-content-center">
                <div class="col-md-11 col-12">

                    <div class="listingWrapper2">
                        <div class="col-12">
                            <form id="searchDIV">
                                <div class="col-12 px-0">
                                    <div class="row align-items-end">
                                        <!-- <div class="col-lg-3 col-md-6 col-12 form-group" id="datepicker">
                                            <label><?php echo $translations['M00091'][$language] /*Date Range*/ ?></label>
                                            <div class="input-daterange input-group" id="datepicker-range">
                                                <input id="dateRangeStart" type="text" class="input-sm form-control" name="start" dataType="dateRange" dataName="createdAt" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                <span class="input-group-text">-</span>
                                                <input id="dateRangeEnd" type="text" class="form-control" name="end" dataType="dateRange" autocomplete="off" dataName="createdAt" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                <label for="dateRangeStart" class="input-group-text"><i class="fa fa-calendar"></i></label>
                                            </div>
                                        </div> -->
                                        <div class="col-lg-3 col-md-6 col-12 form-group">
                                            <label data-lang="M00278"><?php echo $translations['M00278'][$language]; //Crypto Type ?></label>
                                            <select id="creditTypeSelect" class="form-control inputDesign" dataName="creditType" dataType="select"></select>
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

<div id="selectedId" class="hide"></div>

<div class="modal fade" id="confirmInactiveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="padding-left:17px; padding-right: 17px;" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header canvasheader">
                <div class="row text-center">
                    <div class="col-12"><img id="canvasAlertIcon" src="images/project/warningIcon.png" alt="" width="65"></div>
                    <div class="col-12"><span id="canvasTitle" class="modal-title" data-lang="M00075"><?php echo $translations['M00075'][$language]; //Inactive Confirmation ?></span></div>
                </div>
                <div class="modalCloseWrap">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                </div>                
            </div>
            <!-- <div class="modalLine"></div> -->
            <div class="modal-body modalBodyFont">
                <div id="canvasAlertMessage">
                    <span class="showLangCode" data-lang="M00281">
                        <?php echo $translations['M00281'][$language]; //Are you sure you want to deactivate this wallet address? ?>
                    </span>
                </div>
            </div>
            <div class="modal-footer">
                <button id="canvasCloseBtn" type="button" class="btn btn-default" data-dismiss="modal" data-lang="M00020"><?php echo $translations['M00020'][$language]; //Close ?></button>
                <button onclick="inactiveFunc()" type="button" class="btn btn-primary" data-dismiss="modal" data-lang="M00077">
                    <?php echo $translations['M00077'][$language]; //Confirm ?>
                </button>
            </div>
        </div>
    </div>
</div>



<?php include 'backToTop.php' ?>

<?php include 'sharejs.php'; ?>


</html>

<script>

    var divId    = 'listingDiv';
    var tableId  = 'listingTable';
    var pagerId  = 'pagerList';
    var btnArray = {};
    var thArray  = Array(
        '<span class="bottom" data-lang="M00058"><?php echo $translations['M00058'][$language]; ?></span>', //Created At
        '<span class="bottom" data-lang="M00278"><?php echo $translations['M00278'][$language]; ?></span>', //Crypto Type
        '<span class="bottom" data-lang="M00275"><?php echo $translations['M00275'][$language]; ?></span>', //Wallet Address
        '<span class="bottom" data-lang="M00107"><?php echo $translations['M00107'][$language]; ?></span>', //Status
        '<span class="bottom" data-lang="M03627"><?php echo $translations['M03627'][$language]; /* Action */ ?></span>'
    );

    var method         = 'POST';
    var url            = 'scripts/reqDefault.php';
    var debug          = 0;
    var bypassBlocking = 0;
    var bypassLoading  = 0;
    var pageNumber     = 1;

    $(document).ready(function() {

        $("body").keyup(function(event) {
            if (event.keyCode == 13) {
                $("#searchPortfolioBtn").click();
            }
        });

        formData  = {
            command : "getWalletAddressListing"
        };
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        formData = {
            command   : 'getAvailableCreditWalletAddress'
        };
       
        var fCallback = buildCreditType;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $('#resetBtn').click(function() {
            $('#alertMsg').removeClass('alert-success').html('').hide();
            $('#searchDIV').find('input').each(function() {
                $(this).val('');
            });
            $('#searchDIV').find('select').each(function() {
                $(this).val('');
            });
        });

        $('#searchBtn').click(function() {
            pagingCallBack(pageNumber, loadSearch);
        });

    });

    function buildCreditType (data, message){
        var html = `<option value=""><?php echo $translations['M00369'][$language]; //All ?></option>`;
        $.each(data.creditList, function(i, obj) {
            // html+=`<option value="${obj.name}">${obj.translation_code}</option>`;
            html+=`<option value="${obj.value}">${obj.display}</option>`;
        });
        $("#creditTypeSelect").html(html);
    }

    function loadDefaultListing(data, message) {

        var tableNo;

        if (data.dataList) {
            var newList = [];
            var btn = [];
            $.each(data.dataList, function(i, obj){

                var btnList = {
                    status: (obj.status == "Active" ? 1 : 0),
                    id: obj.id
                };

                var rebuildData = {
                    createdAt : obj.createdAt,
                    creditType : obj.creditTypeDisplay,
                    walletAddress : obj.walletAddress,
                    status : obj.statusDisplay,
                    action : "",
                };

                btn.push(btnList);
                newList.push(rebuildData);
            });
        }
            
        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        $.each(btn, function(i, obj){
            if(obj.status == 1){
                $("#"+tableId+" tbody tr").eq(i).find("td:last-child").html(`<button type="button" onclick="confirmDelete('${obj.id}')" class="btn btn-primary"><?php echo $translations['A00373'][$language]; //Inactive ?></button>`);
            }
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
    }

    function tableBtnClick(btnId) {}

    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html("<?php echo $translations['M00339'][$language]; /* Search successfully */ ?>").show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide();
        }, 3000);
    }

    function pagingCallBack(pageNumber, fCallback){
        var searchId   = 'searchDIV';
        var searchData = buildSearchDataByType(searchId);
        if(pageNumber > 1) bypassLoading = 1;

        var formData = {
            command     : "getWalletAddressListing",
            usernameSearchType : "match",
            pageNumber  : pageNumber,
            searchData  : searchData
        };
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    $('#dateRangeStart').datepicker({
        // language: language,
        format      : 'dd/mm/yyyy',
        orientation : 'top',
        autoclose   : true
    });

    $('#dateRangeEnd').datepicker({
        // language: language,
        format      : 'dd/mm/yyyy',
        orientation : 'top',
        autoclose   : true
    });

    function confirmDelete(id) {
        $("#selectedId").val(id);
        $("#confirmInactiveModal").modal();
    }

    function inactiveFunc() {
        formData  = {
            command : "inactiveWalletAddress",
            addressID : $("#selectedId").val()
        };

        fCallback = loadInactive;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadInactive(data, message) {
        $("#confirmInactiveModal").modal('hide');
        showMessage(message, 'success', '<?php echo $translations['M00079'][$language]; /* update successful */ ?>', 'edit', 'addWalletAddressListing');
    }
</script>
