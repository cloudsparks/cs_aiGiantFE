<?php 
    session_start();

    // Get current page name
    $thisPage = basename($_SERVER['PHP_SELF']);

    // Check the session for this page
    if(!isset ($_SESSION['access'][$thisPage]))
        echo '<script>window.location.href="accessDenied.php";</script>';
    else
        $_SESSION['lastVisited'] = $thisPage;
?>
<!DOCTYPE html>
<html>
<?php include("head.php"); ?>
    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        <?php include("topbar.php"); ?>
        <!-- Top Bar End -->

        <!-- ========== Left Sidebar Start ========== -->
        <?php include("sidebar.php"); ?>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <button id="backBtn" onclick="backBtn()" class="btn btn-primary btn-md waves-effect waves-light m-b-20">
                            <?php echo $translations['A00115'][$language]; /* Back */ ?>
                        </button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box p-b-0">
                            <h4 class="header-title m-t-0 m-b-30">
                                Edit Bidding Campaign
                            </h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <form role="form" id="editCampaign" data-parsley-validate novalidate>
                                        <div id="basicwizard" class=" pull-in">
                                            <div class="tab-content b-0 m-b-0 p-t-0">
                                                <div class="form-group">
                                                    <label for="">
                                                    <?php echo $translations['A01697'][$language]; /* Bid Title*/ ?> <span class="text-danger">*</span>
                                                    </label>
                                                    <input id="bidTitle" type="text" class="form-control"  required/>
                                                    <span id="bidTitleErr" class="customError text-danger"></span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">
                                                    <?php echo $translations['A01698'][$language]; /* Starting Date*/ ?> <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="input-group input-daterange">
                                                        <input id="startDate" type="text" class="form-control input-daterange-to campaign-input-left" dataName="startDate" dataType="startDate" required>
                                                        <span id="startDateErr" class="customError text-danger"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">
                                                    <?php echo $translations['A01699'][$language]; /* Starting Time*/ ?> <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="input-group">
                                                        <div>
                                                            <input id="timeFrom" type="text" class="form-control" dataName="searchTime" dataType="timeRange" dataParent="searchDate" required>
                                                            <span id="startTimeErr" class="customError text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">
                                                    <?php echo $translations['A01702'][$language]; /* Number of Days*/ ?>
                                                    </label>
                                                    <div class="input-group">
                                                        <input id="numberOfDays" type="text" class="form-control" disabled required/>
                                                        <span id="noDaysErr" class="customError text-danger"></span>
                                                        <span style="display:table-cell;vertical-align:middle;">
                                                        <div class="checkbox checkbox-primary" style="padding-left: 40px!important;">
                                                            <input type="checkbox" id="changeNoDays">
                                                                <label></label>
                                                            </input>
                                                        </div>  
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">
                                                    <?php echo $translations['A01470'][$language]; /* Total Amount*/ ?> <span class="text-danger">*</span>
                                                    </label>
                                                    <input id="totalAmount" type="number" class="form-control" required/>
                                                    <span id="totalAmountErr" class="customError text-danger"></span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">
                                                    Available Amount<span class="text-danger">*</span>
                                                    </label>
                                                    <input id="availableAmount" type="number" class="form-control" required/>
                                                    <span id="availableAmountErr" class="customError text-danger"></span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">
                                                    <?php echo $translations['A01686'][$language]; /* Profit Gain (%)*/ ?> <span class="text-danger">*</span>
                                                    </label>
                                                    <input id="profit" class="form-control" type="number" step="any" required/>
                                                    <span id="profitErr" class="customError text-danger"></span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">
                                                    <?php echo $translations['A01700'][$language]; /* Payout Date T+10*/ ?> <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="input-group input-daterange">
                                                        <input id="payoutDate" type="text" class="form-control input-daterange-to campaign-input-left" dataName="payoutDate" dataType="payoutDate" required>
                                                        <span id="payoutDateError" class="customError text-danger"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">
                                                    Invoice <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="input-group input-daterange">
                                                        <input id="invoice" type="text" class="form-control campaign-input-left" required/>
                                                        <span id="invoiceErr" class="customError text-danger"></span>
                                                        <span style="display:table-cell;vertical-align:middle;">
                                                        <div class="checkbox checkbox-primary" style="padding-left: 40px!important;">
                                                            <input type="checkbox" id="showInv">
                                                                <label></label>
                                                            </input>
                                                        </div>  
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">
                                                    Transaction ID <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="input-group input-daterange">
                                                        <input id="transactionId" type="text" class="form-control campaign-input-left" required/>
                                                        <span id="transactionIdErr" class="customError text-danger"></span>
                                                        <span style="display:table-cell;vertical-align:middle;">
                                                        <div class="checkbox checkbox-primary" style="padding-left: 40px!important;">
                                                            <input type="checkbox" id="showTransId">
                                                                <label></label>
                                                            </input>
                                                        </div>  
                                                        </span>
                                                    </div>
                                                </div>

                                                <!-- start img -->
<!--
                                                <div class="form-group row mx-0" style="margin-top: 30px;">
                                                    <div class="col-md-12">

                                                        <div class="row">
                                                            <div id="appendImage">
                                                                <div class="col-md-4">
                                                                    <div class="popupMemoImageWrapper default">
                                                                        <input type="hidden" id="storeFileData1">
                                                                        <input type="hidden" id="storeFileName1">
                                                                        <input type="hidden" id="storeFileSize1">
                                                                        <input type="hidden" id="storeFileType1">
                                                                        <input type="hidden" id="storeFileFlag1">

                                                                        <input type="hidden" id="storeAttachmentData1">
                                                                        <input type="hidden" id="storeAttachmentName1">
                                                                        <input type="hidden" id="storeAttachmentSize1">
                                                                        <input type="hidden" id="storeAttachmentType1">
                                                                        <input type="hidden" id="storeAttachmentFlag1">

                                                                        <input type="file" id="fileUpload1" class="hide" accept="image/jpeg, image/png, image/gif, image/bmp, image/tiff" onchange="displayFileName('1', this)">

                                                                        <div>
                                                                            <a href="javascript:;" onclick="$('#fileUpload1').click()" class="btn btn-primary btnUpload"class="btn btn-primary btnUpload"><?php echo $translations['A00304'][$language]; /* Upload*/ ?></a>
                                                                            <span id="fileName1" class="fileName"><?php echo $translations['A01701'][$language]; /* No Image Uploaded*/ ?></span>
                                                                            <a id="viewImg1" href="javascript:;" class="btn" style="display: none; padding: 6px;" onclick="showImg('1')">
                                                                                <i class="fa fa-eye"></i>
                                                                            </a>
                                                                            <a id="deleteImg1" href="javascript:;" class="btn" style="display:none;padding:6px;" onclick="deleteImg('1')">
                                                                                <i class="fa fa-times"></i>
                                                                            </a>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                   
                                                        </div>
                                                    </div>
                                                </div>
-->                                                     <label>Image</label><span class="text-danger">*</span>
							                            <div class="imgIconCustom" >
                                                            <i id="imgButton"  class=" btn btn-primary btnUpload btn btn-primary btnUpload" style="padding-top: 10px; color: #bfbfbf;" aria-hidden="true">
                                                                <span class="imgButtonSpan"><?php echo $translations['A00304'][$language]; /* Upload*/ ?></span> 
                                                            </i>
                                                            <span id="fileName1" class="fileName"><?php echo $translations['A01701'][$language]; /* No Image Uploaded*/ ?>
                                                            </span> 
                                                            <a id="viewImg1" href="javascript:;" class="btn" style="display: none; padding: 6px;" onclick="showImg()">
                                                                <i class="fa fa-eye"></i>
                                                            </a>
                                                            <a id="deleteImg1" href="javascript:;" class="btn" style="display:none;padding:6px;" onclick="deleteImg('1')">
                                                                <i class="fa fa-times"></i>
                                                            </a>
                                                        </div>
                                                        <input type='file' id="upload" style="display: none;"/>
                                                        <span id="imgUploadErr" class="customError text-danger"></span>
                                                        <div class="squareImage-modal-body border-b" align="center">
                                                            <input id="trID" type="hidden" name="" value="">
                                                            <input id="imgData" type="hidden" name="" value="">
                                                            <input id="imgName" type="hidden" name="" value="">
                                                            <input id="imgSize" type="hidden" name="" value="">
                                                            <input id="imgType" type="hidden" name="" value="">
                                                        </div>

                                               <!-- end img-->

                                            </div>
                                        </div>
                                        <!-- start of description input -->
                                        <div class="form-group row mx-0" style="margin-top: 30px;">
                                            <div class="col-md-12">

                                                <div class="row">
                                                    <div id="appendImage">
                                                        <div class="col-md-4" style="width:100%;">
                                                            <div class="">

                                                                <input type="hidden" id="attachmentData">
                                                                <input type="hidden" id="attachmentName">
                                                                <input type="hidden" id="attachmentSize">
                                                                <input type="hidden" id="attachmentType">
                                                                <div>
                                                                    <label>
                                                                        <?php echo $translations['A00145'][$language]; /* Description */?>
                                                                    </label><span class="text-danger">*</span>
                                                                    <p id="emptyErr" class="err-msg">This value is required.</p>
                                                                    <span id="descriptionError" class="errorSpan text-danger"></span>
                                                                    <textarea id="descriptionInput" class="form-control limitText" rows="4" cols="50" ></textarea>
                                                                    <br>
                                                                </div>

                                                                <input type="file" id="uploadPdf" class="hide" accept='application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel, application/msword, application/vnd.ms-powerpoint, text/plain, application/pdf,.txt'>

                                                                <div class="m-t-rem1">
                                                                    <a href="javascript:;" id="uploadPdfBtn" class="btn btn-primary btnUpload">Upload</a>
                                                                    <span id="attachmentName1" class="fileName">No Attachment Uploaded</span> 
                                                                    <a id="viewAttachment1" href="javascript:;" class="btn" style="display: none; padding: 6px;" onclick="showPdf(this)">
                                                                        <i class="fa fa-eye"></i>
                                                                    </a>
                                                                    <a id="deleteAttachment1" href="javascript:;" class="btn" style="display:none;padding:6px;" onclick="deleteAtt()">
                                                                        <i class="fa fa-times"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end of description input -->
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="col-md-12 m-b-20">
                            <!-- <button type="submit" class="btn btn-default waves-effect waves-light">Cancel</button> -->
                        <button id="editContent" type="submit" class="btn btn-primary waves-effect waves-light">
                            <?php echo $translations['A00123'][$language]; /* Confirm */ ?>
                        </button>
                    </div>
                </div>
                <!-- End row -->
                    
                </div> <!-- container -->
                <div class="modal fade" id="showImage" role="dialog">
                    <div class="modal-dialog modal-xs" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title">
                                </h4>
                            </div>
                            <div class="modal-body">
                                <img id="modalImg" width="100%" src="">
                            </div>
                            <div class="modal-footer">
                                <button id="canvasCloseBtn" type="button" class="btn btn-primary waves-effect waves-light" data-dismiss="modal"><?php echo $translations['A00742'][$language]; /* Close */ ?></button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- start show attachment -->
                <div class="modal fade" id="showAttachment" role="dialog">
                    <div class="modal-dialog modal-xs" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title">
                                </h4>
                            </div>
                            <div class="modal-body">
                                <iframe id="viewer" frameborder="0" scrolling="no" width="100%" height="600"></iframe>
                            </div>
                            <div class="modal-footer">
                                <button id="canvasCloseBtn" type="button" class="btn btn-primary waves-effect waves-light" data-dismiss="modal"><?php echo $translations['A00742'][$language]; /* Close */ ?></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!---- end of attachment> 

            </div> <!-- content -->

            <?php include("footer.php"); ?>

        </div>
        <!-- End content-page -->


        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <script>
        var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <?php include("shareJs.php"); ?>

<script>
    // Initialize the arguments for ajaxSend function
    var url             = 'scripts/reqBiddingCampaign.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var reqData =  new FormData();
	let uploadData;
    var showInvoiceValue = 0;
    var showTxidValue = 0;
    var descriptionType = '';
    var descriptionContent;
    var rowId = "<?php echo $_POST['id']; ?>";
    var imgUrl;
    var pdfUrl;
    var descriptionCheck;
    var oldTime;
        
    var fCallback;


    function updateHTML(content) {
        if(content == '') {
            $("#uploadPdfBtn").removeClass('disable-button')
        }else {
            $("#uploadPdfBtn").addClass('disable-button')
        }
        cmeditor.getDoc().setValue(content);
        descriptionContent = content;
    }

    var HTMLContainer = document.querySelector(".HTMLContainer");

    var cmeditor = CodeMirror(HTMLContainer, {
        lineNumbers: true,
        mode: "htmlmixed"

    });


    $(document).ready(function() {

        $('#imgButton').click(function () {
            // alert(1);
            $("#upload").trigger('click');
        })

        $("#upload").change(function(){
            readURL(this);
        });

        $('#uploadPdfBtn').click(function(){
            $("#uploadPdf").trigger('click');
        })

        $('#uploadPdf').change(function(){
            uploadAttachment(this)
        })

        //for attachment only 
        function uploadAttachment(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    
                    $("#attachmentData").empty().val(reader["result"]);
                    $("#attachmentName").empty().val(input.files[0]["name"]);
                    $("#attachmentSize").empty().val(input.files[0]["size"]);
                    $("#attachment").empty().val(input.files[0]["type"]);

                    var file = URL.createObjectURL(input.files[0]);
                    $("#viewAttachment1").attr('data-res', file);

                }
                
                reader.readAsDataURL(input.files[0]);

                if( $("#uploadPdf").val() != '' && $("#uploadPdf").val() != null) {
                  $('#attachmentName1').hide()
                  $('#viewAttachment1').show()
                  $('#deleteAttachment1').show()
                  $('#descriptionInput_ifr').addClass('disable-button')
                }

            }
        }

        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();
             
                reader.onload = function (e) {

                    $("#imgData").empty().val(reader["result"]);
                    $("#imgName").empty().val(input.files[0]["name"]);
                    $("#imgSize").empty().val(input.files[0]["size"]);
                    $("#imgType").empty().val(input.files[0]["type"]);

                }
                
                reader.readAsDataURL(input.files[0]);

                if( $("#upload").val() != '' && $("#upload").val() != null) {
                    $('#fileName1').hide()
                    $('#viewImg1').show()
                }

            }
        }

        var numberOfDays = $('#numberOfDays').val(3);

        var formData = {
            command: "editCampaign",
            id : rowId, 
            action : "edit",
            step: 1
        }
        
        fCallback = showEdits
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        function showEdits(data,message) {

            //cal starting date
            var [dateValues, timeValues] = data.start_time.split(' ');
            let today = new Date(dateValues);
            
            let yyyy = today.getFullYear();
            let mm = today.getMonth() + 1; // Months start at 0!
            let dd = today.getDate();

            if (dd < 10) dd = '0' + dd;
            if (mm < 10) mm = '0' + mm;

            let formattedDate = dd + '/' + mm + '/' + yyyy;

            oldTime = timeValues

            $('#timeFrom').val(timeValues)

            setTodayDatePicker()

            $('#startDate').val(formattedDate)

            //cal for payout date 
            var [payoutValues] = data.payout_date.split(' ');
            let payoutDate = new Date(payoutValues);
            
            let payoutYear = payoutDate.getFullYear();
            let payoutMonth = payoutDate.getMonth() + 1; // Months start at 0!
            let payoutDay = payoutDate.getDate();

            if (payoutDay < 10) payoutDay = '0' + payoutDay;
            if (payoutMonth < 10) payoutMonth = '0' + payoutMonth;
            let formattedPayout = payoutDay + '/' + payoutMonth + '/' + payoutYear;

            $('#payoutDate').val(formattedPayout)

            $('#bidTitle').val(data.title)

            $('#totalAmount').val(data.total_amount)       

            $('#availableAmount').val(data.available_amount)
            
            $('#numberOfDays').val(data.days)

            $('#profit').val(data.profit_gain * 100)

            $('#invoice').val(data.invoice)

            $('#transactionId').val(data.transaction_id)

            imgUrl = data.image
            
            $('#fileName1').hide()
            $('#viewImg1').show()

            if(data.showTransaction) {
                $('#showTransId').prop('checked','true')
                showTxidValue = 1
            }

            if(data.showInvoice) {
                $('#showInv').prop('checked','true')
                showInvoiceValue = 1
            }

            //disble non value inputs for description
            descriptionContent = data.description

            tinymce.init({
                selector: "#descriptionInput",
                height: 400,
                menubar: false,
                toolbar: false,
                content_style: "body{font-family:'Montserrat';}",
                setup: function (editor) {
                    editor.on("keyup", function (e) {
                        updateHTML(editor.getContent());
                    });
                    editor.on("change", function (e) {
                        updateHTML(editor.getContent());
                    });
                    editor.on("init",function(e) {
                        if(descriptionContent && descriptionContent != '') {
                            editor.setContent(`${descriptionContent}`)
                        }else {
                            $('#descriptionInput_ifr').addClass('disable-button')
                        }
                    })
                }
            });

            if(data.description == '') {
                $('#attachmentName1').hide()
                $('#viewAttachment1').show()
                $('#deleteAttachment1').show()
                pdfUrl = data.attachment
                descriptionType = 'file'
            }else {
                $("#uploadPdfBtn").addClass('disable-button')
                descriptionType = 'text'
            }
        }

        $('#changeNoDays').change(
          function(){
            $('#changeNoDays')[0].checked == true ? 
                $('#numberOfDays')[0].disabled = false
                : $('#numberOfDays')[0].disabled = true; $('#numberOfDays').val(3)
        });

        $('#showInv').change(() => {
            $('#showInv')[0].checked == true ?
                showInvoiceValue = 1 : showInvoiceValue = 0; 
        });
            
        $('#showTransId').change(() => {
            $('#showTransId')[0].checked == true ?
                showTxidValue = 1 :  showTxidValue = 0; 
        });

        function validateDescription() {
            var desText = descriptionContent
            var desFile = $('#attachmentData').val() 

            if( desText == '' && desFile == '' && !pdfUrl ) {
                $('#emptyErr').show()
                descriptionType = ''
                descriptionCheck = false
            }else {
                $('#emptyErr').hide()  
                desText != '' ? descriptionType = 'text' : descriptionType = 'file'
                descriptionCheck = true
            }
        }

        $('#editContent').click(function() {

            var validate = $('#editCampaign').parsley().validate();
            validateDescription()
            var fCallback = editCallback;
            
            if(validate && descriptionCheck) {
                var searchId   = 'editCampaign';
                var searchData = buildSearchDataByType(searchId);

                var startDate = searchData.filter((item)=>{
                    if(item.dataName == 'startDate') {
                        return item.dataValue;
                    }
                })

                var startTime = searchData.filter((item)=>{
                    if(item.dataName == 'searchTime') {
                        return item.dataValue;
                    }
                })

                var payoutDate = searchData.filter((item)=>{
                    if(item.dataName == 'payoutDate') {
                        return item.dataValue;
                    }
                }) 

                const [day,month,year] = startDate[0].dataValue.split('/');
                const [hours, minutes, seconds] = startTime[0].timeFrom.split(':');

                var date1 = new Date(+year, month - 1, +day, +hours, +minutes, +seconds);

                //get timestamp for payout date
                const [day2, month2, year2] = payoutDate[0].dataValue.split('/');

                var date2 = new Date(+year2, month2 - 1, +day2)                

                var bidTitle = $('#bidTitle').val();
                var numberOfDays = $('#numberOfDays').val();
                var totalAmount = $('#totalAmount').val();
                var availableAmount = $('#availableAmount').val();
                var profit = $('#profit').val();
                var invoice = $('#invoice').val();
                var transactionId = $('#transactionId').val();
                var description = descriptionContent

                //var uploadData2 = getImgObj();

                var imageData = $('#imgData').val();
                var imageType = $('#imgType').val();
                var imageName = $('#imgName').val();
                var imageSize = $('#imgSize').val();

                var attachmentData = $('#attachmentData').val();
                var attachmentType = $('#attachmentType').val();
                var attachmentName = $('#attachmentName').val();
                var attachmentSize = $('#attachmentSize').val();

                if(imageData == ""){
                    var imageFlag = 0;
                }else{
                    var imageFlag = 1;
                }
            
                if(attachmentData == '') {
                    var attachmentFlag = 0
                }else {
                    var attachmentFlag = 1
                }

                let uploadImage = {
                    imageData : imageData,
                    imageType : imageType,
                    imageName : imageName,
                    imageFlag : imageFlag,
                    imageSize : imageSize
                };

                let uploadAttachment = {
                    attachmentData : attachmentData,
                    attachmentType : attachmentType,
                    attachmentName : attachmentName,
                    attachmentFlag : attachmentFlag,
                    attachmentSize : attachmentSize
                };

                reqData = [{
                    imageData : imageData,
                    imageName : imageName,
                    attachment: attachmentName,
                    attachmentData: attachmentData
                }];

                var imageArr = {
                    imgName: uploadImage.imageName,
                    imgType: uploadImage.imageType,
                    imgSize: uploadImage.imageSize
                }

                var attachmentArr = {
                    attachmentName: uploadAttachment.attachmentName,
                    attachmentType: uploadAttachment.attachementType,
                    attachmentSize: uploadAttachment.attachmentSize
                }


                var formData = {
                    command: 'editCampaign',
                    action: 'edit',
                    id: rowId,
                    step: 2,
                    bidTitle : bidTitle,
                    startDate: (date1.getTime()/1000),
                    numberOfDays : numberOfDays,
                    totalAmount : totalAmount,
                    availableAmount : availableAmount,
                    profit_gain : profit,
                    payout_date : (date2.getTime()/1000),
                    txid: transactionId,
                    invoice: invoice,
                    showInvoice: showInvoiceValue,
                    showTransactionID: showTxidValue
                };

                if(imageData && imageData != '') {
                    formData = {
                        ...formData,
                        imageData: imageArr,
                    }
                    fCallback = sendNew
                }

                if(description != '') {
                    formData = {
                        ...formData,
                        description: description,
                    }
                }else {
                    if(attachmentData && attachmentData != '') {
                        formData = {
                            ...formData,
                            attachmentData: attachmentArr,
                        }   
                        fCallback = sendNew
                    }    
                }
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }
        });
    });
    
    function sendNew(data, message) {
        if(data) {

            $('#modalProcessing').modal('show');
                var reqData2 = new FormData();

                if(data.imageName) {
                    var imagefiles = reqData[0].imageData;
                    var block = imagefiles.split(";");
                    var contentType = block[0].split(":")[1];
                    var realData = block[1].split(",")[1];

                    var blob = b64toBlob(realData, contentType);
                    
                    reqData2.append('imageData', blob);
                    reqData2.append('image', data.imageName);
                }

                if(data.attachment){
                    var base64Data = reqData[0].attachmentData;
                    var block = base64Data.split(";");
                    var contentType = block[0].split(":")[1];
                    var realData = block[1].split(",")[1];
                    var blob = b64toBlob(realData, contentType);

                    reqData2.append('attachmentData', blob);
                    reqData2.append('attachment', data.attachment);
                }
                
                $.ajax({
                    url: 'scripts/reqUploadCDN.php',
                    type: 'post',
                    data: reqData2,
                    contentType: false,
                    processData: false,
                    async: false,
                    success: function(data){
                        setTimeout(function(){
                            $('#modalProcessing').modal('hide');
                            //submitSuccessful();
                        }, 1000);
                    },
                });

            $('#modalProcessing').modal('hide');
            showMessage('Successfully Edit Bidding Campaign', 'success', 'Edit Bidding Campaign', 'upload', 'biddingCampaignSetting.php');
       
        }
      
    }
    

    function b64toBlob(b64Data, contentType, sliceSize) {
        contentType = contentType || '';
        sliceSize = sliceSize || 512;

        var byteCharacters = atob(b64Data);
        var byteArrays = [];

        for (var offset = 0; offset < byteCharacters.length; offset += sliceSize) {
            var slice = byteCharacters.slice(offset, offset + sliceSize);

            var byteNumbers = new Array(slice.length);
            for (var i = 0; i < slice.length; i++) {
                byteNumbers[i] = slice.charCodeAt(i);
            }

            var byteArray = new Uint8Array(byteNumbers);

            byteArrays.push(byteArray);
        }

      var blob = new Blob(byteArrays, {type: contentType});
      return blob;
    }

    function setTodayDatePicker() {
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1;
        var yyyy = today.getFullYear();
        if (dd < 10) {
            dd = '0' + dd;
        }
        if (mm < 10) {
            mm = '0' + mm;
        }
        var today = dd + '/' + mm + '/' + yyyy;

        $('.input-daterange-from').daterangepicker({
            singleDatePicker: true,
            timePicker: false,
            locale: {
                format: 'DD/MM/YYYY'
            }
        });
        $('.input-daterange-from').val('');

        $('.input-daterange-to').daterangepicker({
            singleDatePicker: true,
            timePicker: false,
            locale: {
                format: 'DD/MM/YYYY'
            }
        });
        $('.input-daterange-to').val('');

        $('#timeFrom').timepicker({
            defaultTime : oldTime,
            showSeconds: true
        });

        $('#timeTo').timepicker({
            defaultTime : '',
            showSeconds: true
        });

        return dateToTimestamp(today);
    }

    function getImgObj() {
        var uploadData = {};

        $(".popupMemoImageWrapper").each(function(i, obj) {
            var lang = $(obj).find('[id^="fileUploadLang"]').val();
            if(lang!=""){
                var imgData = $(obj).find('[id^="storeFileData"]').val();
                var imgName = $(obj).find('[id^="storeFileName"]').val();
                var imgType = $(obj).find('[id^="storeFileType"]').val();
                var imgFlag = $(obj).find('[id^="storeFileFlag"]').val();
                var imgSize = $(obj).find('[id^="storeFileSize"]').val();

                var attachmentData = $(obj).find('[id^="storeAttachmentData"]').val();
                var attachmentName = $(obj).find('[id^="storeAttachmentName"]').val();

                var subject = $(obj).find('[id^="subject"]').val();
                var description = $(obj).find('[id^="description"]').val();
                var attachmentType = $(obj).find('[id^="storeAttachmentType"]').val();
                var attachmentFlag = $(obj).find('[id^="storeAttachmentFlag"]').val();
                var attachmentSize = $(obj).find('[id^="storeAttachmentSize"]').val();

                var defaultImage = (imgData=='')?'':1;
                var defaultAttachment = (attachmentData=='')?'':1;

                if(i > 0) {
                    defaultImage = '';
                    defaultAttachment = '';
                }

                uploadData = {
                    imgName: imgName,
                    imgType: imgType,
                    imgFlag: imgFlag,
                    imgSize: imgSize,
                    defaultImage: defaultImage,
                };

                reqData = {
                    imgName: imgName,
                    imgData: imgData,
                    attachment: attachmentName,
                    attachmentData: attachmentData,
                    default: defaultAttachment,
                    subject : subject
                };
            }

        });

        return uploadData;
    }

    function deleteAtt() {
            $("#uploadPdf").val("");
            $("#attachmentName1").show()
            $("#storeAttachmentData").val("");
            $("#storeAttachmentName").val("");
            $("#storeAttachmentType").val("");
            $("#storeAttachmentFlag").val("");
            $("#storeAttachmentSize").val("");

            $("#viewAttachment1").hide();
            $("#deleteAttachment1").hide();
            pdfUrl = ''
            $('#descriptionInput_ifr').removeClass('disable-button')

    }

    
    function editCallback(data, message) {
        showMessage(
            "Successfully Edit Bidding Campaign",
            'success', 
            'Edit Bidding Campaign',
            'upload', 
            'biddingCampaignSetting.php'
        );
    }

    function showImg() {

        if($('#imgData').val()) {
            $("#modalImg").attr('src', $("#imgData").val());
            $("#showImage").modal();
        }else {
            $("#modalImg").attr('src',"<?php echo $config['tempMediaUrl']; ?>"+imgUrl);
            $("#showImage").modal();
        }

    }

    function showPdf(n) {

        if($('#attachmentData').val()) {
            $("#viewer").attr('src',$(n).attr('data-res'));
            $("#showAttachment").modal();
        }else {
            $("#viewer").attr('src',"<?php echo $config['tempMediaUrl']; ?>"+pdfUrl);
            $("#showAttachment").modal();
        }
    }

    function backBtn() {
        $.redirect('biddingCampaignSetting.php')
    }

</script>
</body>
</html>
