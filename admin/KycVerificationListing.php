<?php
session_start();


?>

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
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default bx-shadow-none">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapse">
                                                <?php echo $translations['A00051'][$language]; /* Search */ ?>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div id="searchMsg" class="text-center alert" style="display: none;"></div>
                                            <form id="searchForm" role="form">
                                                <!--< div class="col-sm-4 form-group">
                                                    <label class="control-label">
                                                        <?php echo $translations['A00101'][$language]; /* Name */ ?>
                                                    </label>
                                                    <input type="text" class="form-control" dataName="name" dataType="text">
                                                </div> -->
                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label">
                                                        <?php echo $translations['A00102'][$language]; /* Username */ ?>
                                                    </label>
                                                    <input type="text" class="form-control" dataName="username" dataType="text">
                                                </div>
                                                 <div class="col-sm-4 form-group">
                                                    <label class="control-label">
                                                        <?php echo $translations['A00318'][$language]; /* Status */ ?>
                                                    </label>
                                                    <select class="form-control" dataName="status" dataType="select" >
                                                    <option value="">
                                                        <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                    </option>
                                                    <option value="Waiting Approval">
                                                        <?php echo $translations['A01217'][$language]; /*pending*/ ?>
                                                    </option>
                                                    <option value="Approve">
                                                        <?php echo $translations['A01218'][$language]; /* Approved */ ?>
                                                    </option>
                                                    <option value="Reject">
                                                        <?php echo $translations['A01212'][$language]; /* Failed */ ?>
                                                    </option>
                                                </select>
                                                </div>
                                                <!-- <div class="col-sm-4 form-group">
                                                    <label class="control-label" for="" data-th="email">
                                                        <?php echo $translations['A00103'][$language]; /* Email */ ?>
                                                    </label>
                                                    <input type="text" class="form-control" dataName="email" dataType="text">
                                                </div> -->
                                                <!-- <div class="col-sm-4 form-group">
                                                    <label class="control-label" data-th="role_id">Role Name</label>
                                                    <select id="roleName" class="form-control">
                                                    </select>
                                                </div> -->
                                                <!-- <div class="col-sm-4 form-group">
                                                    <label class="control-label" data-th="disabled">
                                                        <?php echo $translations['A00104'][$language]; /* Disabled */ ?>
                                                    </label>
                                                    <select class="form-control" dataName="disabled" dataType="select">
                                                        <option value="">
                                                            <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                        </option>
                                                        <option value="1">
                                                            <?php echo $translations['A00056'][$language]; /* Yes */ ?>
                                                        </option>
                                                        <option value="0">
                                                            <?php echo $translations['A00057'][$language]; /* No */ ?>
                                                        </option>
                                                    </select>
                                                </div> -->
                                                <!-- <div class="col-sm-4 form-group" id="datepicker" >
                                                    <label class="control-label" data-th=""><?php echo $translations['A00564'][$language]; /* Created at */ ?></label>
                                                    <div class="input-daterange input-group" id="datepicker-range">
                                                    <input id="dateRangeStart" type="text" class="form-control" name="start" dataName="transactionDateRange" dataType="dateRange">
                                                    <div class="input-group-addon">
                                                        <?php echo $translations['A00139'][$language]; /* to */?>
                                                    </div>
                                                    <input id="dateRangeEnd" type="text" class="form-control" name="end" dataName="transactionDateRange" dataType="dateRange">
                                                    </div>
                                                </div> -->
                                            </form>
                                            <!-- hidden -->
                                            <!-- <form id="adminType" role="form" style="display:none;">
                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label" for="" data-th="name">Admin Type</label>
                                                    <input type="text" class="form-control" value="Admin">
                                                </div>
                                            </form> -->

                                            <div class="col-xs-12 m-t-rem1">
                                                <button id="searchBtn" type="submit" class="btn btn-primary waves-effect waves-light">
                                                    <?php echo $translations['A00051'][$language]; /* Search */ ?>
                                                </button>
                                                <button id="resetBtn" type="submit" class="btn btn-default waves-effect waves-light">
                                                    <?php echo $translations['A00053'][$language]; /* Reset */ ?>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default bx-shadow-none">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <?php echo $translations['A01215'][$language]; /* Kyc Verification Listing */ ?>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                     <div id="basicwizard" class="pull-in">
                                        <div class="tab-content b-0 m-b-0 p-t-0">
                                            <form>
                                                <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                                <div id="portfolioListDiv" class="table-responsive"></div>
                                                <span id="paginateText"></span>
                                                <div class="text-center">
                                                    <ul class="pagination pagination-md" id="pagerPortfolioList"></ul>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div id="" class="text-center alert" style="display: none;"></div>
                                    <div class="col-sm-3 form-group">
                                        <label class="control-label">
                                         <?php echo $translations['A01211'][$language]; /* Add Remark */ ?>
                                     </label>
                                     <input id="remarkInput" type="text" class="form-control" dataName="username" dataType="text">
                                 </div>
                                 <div class="col-sm-3 form-group">
                                    <label class="control-label">
                                        <?php echo $translations['A00617'][$language]; /* Update Status */ ?>
                                    </label>
                                    <select id="status" class="form-control" dataName="status" dataType="select" >
                                       <!--  <option value="">
                                            <?php echo $translations['A00055'][$language]; /* All */ ?>
                                        </option> -->
                                        <option value="Waiting Approval">
                                            <?php echo $translations['A01217'][$language]; /*pending*/ ?>
                                        </option>
                                        <option value="Approve">
                                            <?php echo $translations['A01218'][$language]; /* Approved */ ?>
                                        </option>
                                        <option value="Reject">
                                            <?php echo $translations['A01212'][$language]; /* Failed */ ?>
                                        </option>
                                    </select>
                                </div>
                                <div class="col-sm-12" style="margin-top: 30px">
                                    <button id="updateBtn" type="submit" class="btn btn-primary waves-effect waves-light">
                                       <?php echo $translations['A00300'][$language]; /* Update */ ?>
                                   </button>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
</div>
<?php include("footer.php"); ?>
</div>
</div>

<div id="viewImage" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">
                       <?php echo $translations['A01216'][$language]; /* View Image */?>
                    </h4>
                </div>
                <div class="modal-body" align="center">
                   <img id="showImage" src="" width="100%">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">
                        <?php echo $translations['A00350'][$language]; /* Ok */?>
                    </button>
                </div>
            </div>
        </div>
    </div>
<script>
    var resizefunc = [];
</script>
<?php include("shareJs.php"); ?>
<script>

    var divId    = 'portfolioListDiv';
    var tableId  = 'portfolioListTable';
    var pagerId  = 'pagerPortfolioList';
    var btnArray = {};
    var thArray  = Array (
        "<?php echo $translations['M01359'][$language]; /* Submission Date / Time */?>",
        "<?php echo $translations['A00102'][$language]; /* Username */?>",
        '<?php echo $translations['A00117'][$language]; /* Full Name */?>',
        "Passport",
        "<?php echo $translations['A00153'][$language]; /* Country */?>",
        "<?php echo $translations['A01113'][$language]; /* National ID */?>",
        // "<?php echo $translations['A01213'][$language]; /* Proof of address */?>",
        "<?php echo $translations['A01214'][$language]; /* Selfie Photo */?>",
        "<?php echo $translations['A00318'][$language]; /* Status */ ?>",
        "<?php echo $translations['A00377'][$language]; /* Updated At */ ?>",
        "<?php echo $translations['A01152'][$language]; /* Updated By */ ?>",
        "<?php echo $translations['A00571'][$language]; /* Remark */?>"       
        );

    var method         = 'POST';
    var url            = 'scripts/reqAdmin.php';
    var debug          = 0;
    var bypassBlocking = 0;
    var bypassLoading  = 0;
    var pageNumber     = 1;
    var offsetSecs     = getOffsetSecs();

    $(document).ready(function() {

        formData  = {
            command : "getKnowYourClientList",
            site : "admin"
        };
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

    });

    $('#searchBtn').click(function() {
        pagingCallBack(pageNumber, loadSearch);
    });

    //reset to default search
    $('#resetBtn').click(function() {
        $('#alertMsg').removeClass('alert-success').html('').hide();
        $('#searchForm').find('input').each(function() {
           $(this).val(''); 
        });
        $('#searchForm').find('select').each(function() {
            $(this).val('');
        $("#searchForm")[0].reset();
        });

    });

    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span><?php echo $translations['A00114'][$language]; /* Search successful. */ ?></span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide(); 
        }, 3000);
    }

    function pagingCallBack(pageNumber, fCallback){
        if(pageNumber > 1) bypassLoading = 1;

        var searchId   = 'searchForm';
        var searchData = buildSearchDataByType(searchId);
        var formData   = {
            command     : 'getKnowYourClientList',
            site : "admin",
            pageNumber  : pageNumber,
            inputData   : searchData
        };
        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    $('#updateBtn').click(function() {
        var kycList = [];

        $('#'+tableId).find('[type=checkbox]:checked').each(function() {
            var checkboxID = $(this).parent('td').parent('tr').attr('data-th');
            kycList.push(checkboxID);
        });

        var remark = $("#remarkInput").val();


        var fCallback = doneUpdate;
        formData  = {
            command : 'updateKnowYourClient',
            kycID : kycList,
            status : $('#status').find('option:selected').val(),
            remark : remark
        };
        // console.log(formData);
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);      
    }); 

    function doneUpdate(data, message){
        // console.log(data);
        showMessage('Successfully updated.', 'success', '<?php echo $translations['M01347'][$language]; /* KYC Verification */ ?>', 'upload', 'KycVerificationListing.php');
    }

    function loadDefaultListing(data, message) {
     console.log(data);
        // loadCountryDropdown(data.countryList);

        var tableNo;
        var kycList = data;
        if (kycList==null) {
            var p = 1;
            $('#alertMsg').addClass('alert-success').html("<span><?php echo $translations["A00354"][$language] ?></span>").show();
            // setTimeout(function() {
            //     $('#alertMsg').removeClass('alert-success').html('').hide(); 
            // }, 3000);
        }else {

            var newList = [];
            $.each(kycList, function(k, v) {

                var rebuildData = {
                    created_at : v['created_at'],
                    username : v['username'],
                    full_name : v['full_name'],
                    passport : v['passport'],
                    country : v['country'],
                    image_id : v['image_id'],
                    // image_id_2 : v['image_id_2'],
                    image_id_3 : v['image_id_3'],
                    status : v['status'],
                    updated_at : v['updated_at'],
                    updated_by : v['updated_by'],
                    remark : v['remark']
                };
                newList.push(rebuildData);
            });
        }

        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        addColumn(tableId,data);
        // pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        if(kycList) {
            $.each(kycList, function(k, v) {
                $('#'+tableId).find('tr#'+k).attr('data-th', v['id']);
            });
        }

        $('#'+tableId).find('tbody tr').each(function(){

            console.log($(this).find('td:eq(8)').text());
            var status = $(this).find('td:eq(8)').text();
            if(status == "Approved" || status == "Failed"){
                $(this).find('td:eq(0)').html("-");
            }

            $(this).find('td:eq(6)').addClass('text-center');
            $(this).find('td:eq(7)').addClass('text-center');
            // $(this).find('td:eq(8)').addClass('text-center');

            var image1 = $(this).find('td:eq(6)').text();
            var image2 = $(this).find('td:eq(7)').text();
            // var image3 = $(this).find('td:eq(8)').text();


            $(this).find('td:eq(6)').html('<a data-toggle="tooltip" title="" id="viewNationalID'+this.id+'" onclick="tableBtnClick(\'viewNationalID'+this.id+'\', \''+image1+'\')" class="m-t-5 m-r-10 btn btn-icon waves-effect waves-light btn-primary btn-block" style="color: white ; width: 80px"  data-original-title="View"><?php echo $translations["A00802"][$language] ?></a>');

            $(this).find('td:eq(7)').html('<a data-toggle="tooltip" title="" id="viewProofAddress'+this.id+'" onclick="tableBtnClick(\'viewProofAddress'+this.id+'\', \''+image2+'\')" class="m-t-5 m-r-10 btn btn-icon waves-effect waves-light btn-primary btn-block" style="color: white; width: 80px"  data-original-title="View"><?php echo $translations["A00802"][$language] ?></a>');

            // $(this).find('td:eq(8)').html('<a data-toggle="tooltip" title="" id="viewSelfie'+this.id+'" onclick="tableBtnClick(\'viewSelfie'+this.id+'\', \''+image3+'\')" class="m-t-5 m-r-10 btn btn-icon waves-effect waves-light btn-primary btn-block" style="color: white; width: 80px" data-original-title="View"><?php echo $translations["A00802"][$language] ?></a>');
        });
    }


    function tableBtnClick(btnId, imgID) {
        var btnName  = $('#'+btnId).attr('id').replace(/\d+/g, '');
        var tableRow = $('#'+btnId).parent('td').parent('tr');
        var tableId  = $('#'+btnId).closest('table');

        var formData = {
            command     : "getImageByID",
            imageID : imgID
        };
        fCallback = seeImgBox;

        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        // if (btnName == 'viewNationalID') {
        //    $('#viewImage').modal('show');
        
        // } else if (btnName == 'viewProofAddress'){
        //    $('#viewImage').modal('show');
        // } else if (btnName == 'viewSelfie'){
        //    $('#viewImage').modal('show');
        // }
    }


    function seeImgBox(data, message){
        $('#viewImage').modal('show');
        $("#showImage").attr("src", data);
        // console.log(data);
    }


    function addColumn(tableId, data) {
        var rows = $('#' + tableId + ' tr');
        for (var i = 0; i < rows.length; i++) {
            var checkbox = $('<input />', {
                type: 'checkbox',
                id: 'chk' + i,
                value: 'myvalue' + i
            });
            checkbox.wrap('<td style="width : 12px !important;"></td>').parent().prependTo(rows[i]);
        }
        $("#chk0").click(function(){
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
        
        $('#portfolioListDiv tr td').find('input[type=checkbox]').on('click', function() {
            var numberOfRow = $('#portfolioListDiv tbody').find('tr').length; //exclude first row
            var numberOfChecked = $('#portfolioListDiv tr td').find('input:checked').length; //count number of checkbox checked

            if (numberOfChecked == numberOfRow) {
                $('#chk0').prop('checked', this.checked);
            }
        });
    }

</script>
</body>
</html>