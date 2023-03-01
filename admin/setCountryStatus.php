<?php session_start(); ?>
<!DOCTYPE html>
<html>
<?php include("head.php"); ?>
<div id="wrapper">
    <?php include("topbar.php"); ?>
    <?php include("sidebar.php"); ?>
    <div class="content-page">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div>
                            <h4 class="panel-title" id="countryListing">
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                            <form>
                                <div id="basicwizard" class="pull-in">
                                    <div class="tab-content b-0 m-b-0 p-t-0">
                                        <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                        <div id="listingDiv" class="table-responsive"></div>
                                        <span id="paginateText"></span>
                                        <div class="text-center">
                                            <ul class="pagination pagination-md" id="listingPager"></ul>
                                        </div>
                                        <!-- start -->
                                            <div id="paginationOptions" class="newLineMargin" style="display: table;padding: 10px 0px;">
                                                <div style="display: inline-block;">
                                                    <span class="m-l-rem1">
                                                        <?php echo $translations['A00602'][$language]; /* with selected */ ?> : 
                                                    </span>
                                                </div>
                                                <div id="selectionDiv" style="display: inline-block; margin-left: 5px; width: 150px">
                                                    <select id="statusSelect" class="m-l-rem1 form-control" dataName="status" dataType="select">
                                                        <option value="Inactive">
                                                            <?php echo $translations['A00373'][$language]; /* Inactive */ ?>
                                                        </option>
                                                        <option value="Active">
                                                            <?php echo $translations['A00372'][$language]; /* Active */ ?>
                                                        </option>
                                                    </select>
                                                </div>
                                                <div style="display: inline-block; margin-left:20px;">
                                                    <div id="updateBtn" class="btn btn-primary waves-effect waves-light" style="width: 100px">
                                                        <?php echo $translations['A00300'][$language]; /* Update */ ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end -->
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>

            </div>

        </div>

        <?php include("footer.php"); ?>

    </div>

</div>

<script>
    var resizefunc = [];
</script>

<?php include("shareJs.php"); ?>

<script>
    var divId    = 'listingDiv';
    var tableId  = 'listingTable';
    var pagerId  = 'listingPager';
    var btnArray = {};
    var thArray  = Array (
        '<input type="checkbox" id="checkAll" >',
        // "Country ID",
        "<?php echo $translations['A00153'][$language]; /* Country */ ?>",
        "ISO Code 2",
        "ISO Code 3",
        "<?php echo $translations['M00388'][$language]; /* Country Code */ ?>",
        "<?php echo $translations['A00366'][$language]; /* Currency Code */ ?>",
        "<?php echo $translations['A00318'][$language]; /* Status */ ?>"
    );

    var url             = 'scripts/reqAdmin.php';
    var method          = 'POST';
    var debug           = 1;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";

    $(document).ready(function() {
        var formData  = {
            command: 'getAllCountriesList'
        };
        var fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $('#updateBtn').click(function() {
            var countryIDs = [];
            $(".countryCheck:checked").each(function() {
                var checkboxID = $(this).val();
                countryIDs.push(checkboxID);
            });

            if(countryIDs.length === 0)
                showMessage('<?php echo $translations['A00613'][$language]; /* No check box selected. */ ?>', 'warning', '<?php echo $translations['A00614'][$language]; /* Update Status */ ?>', 'edit', '');
            else {
                var formData   = {
                    command : 'updateCountryStatus',
                    countryIDs : countryIDs,
                    status : $('#statusSelect').find('option:selected').val()
                };
                fCallback = updateCallback;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }
        });

    });

    function loadDefaultListing(data, message) {
        console.log(data);
        $('#basicwizard').show();
        var tableNo;

        if (data.countriesList){
            var newList = [];
            $.each(data.countriesList, function(k, v){

                var checkbox = `<input type="checkbox" value="${v['id']}" class="countryCheck" >`;

                var rebuild = {
                    checkbox : checkbox,
                    // id : v['id'],
                    name : v['name'],
                    isoCode2 : v['isoCode2'], 
                    isoCode3 : v['isoCode3'], 
                    countryCode: v['countryCode'],
                    currencyCode: v['currencyCode'],
                    status: v['status']
                };

                newList.push(rebuild);
            });

            buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
            pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

            $("#checkAll").change(function(){
                var checked = $(this).is(":checked");
                $(".countryCheck").prop("checked", checked);
             });
        }
    }

    function tableBtnClick(btnId) {
        var btnName  = $('#'+btnId).attr('id').replace(/\d+/g, '');
        var tableRow = $('#'+btnId).parent('td').parent('tr');
        var tableId  = $('#'+btnId).closest('table');

        if (btnName == 'edit') {
            var exchangeRate    = tableRow.find('input#exchangeRate').val();
            var buyRate         = tableRow.find('input#buyRate').val();
            var exchangeRateId  = tableRow.attr('data-th');
            formData  = {
                command         : 'editExchangeRate',
                exchangeRateId  : exchangeRateId,
                exchangeRate    : exchangeRate,
                buyRate         : buyRate
            };
            fCallback = sendEdit;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        }
    }

    function sendEdit(data, message) {
        showMessage(message, 'success', '<?php echo $translations['A00368'][$language]; /* Successfully updated exchange rate */?>', 'retweet', 'exchangeRateList.php');
    }

    function pagingCallBack(pageNumber, fCallback){
        
        if(pageNumber > 1) bypassLoading = 1;
        
        var formData = {
            command      : "getAllCountriesList",
            pageNumber   : pageNumber
        };
        
        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function updateCallback(data, message) {
        showMessage('<?php echo $translations['A00616'][$language]; /* Successful updated status. */ ?>', 'success', '<?php echo $translations['A00617'][$language]; /* Update Status */ ?>', 'edit', 'setCountryStatus.php');
    }
</script>
</body>
</html>
