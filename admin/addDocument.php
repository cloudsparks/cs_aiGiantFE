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
                    <!-- Back button -->
                    <div class="row">
                        <div class="col-sm-4">
                            <div id="backBtn" class="btn btn-primary waves-effect waves-light m-b-20">
                                <?php echo $translations['A00115'][$language]; /* Back */?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-box p-b-0">
                                <!-- <h4 class="header-title m-t-0 m-b-30">Add Document</h4> -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <form role="form" enctype="multipart/form-data">
                                            <div id="basicwizard" class=" pull-in">
                                                <div class="tab-content b-0 m-b-0 p-t-0">
                                                    
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div id="appendImage">
                                                                <div class="col-md-12">
                                                                    <div class="popupMemoImageWrapper default">
                                                                    	<span class="dtxt">Default</span>
																		<div class="form-group">
					                                                        <label>
					                                                            <?php echo $translations['A00369'][$language]; /* Subject */?>
					                                                        </label>
					                                                        <input id="subject" type="text" class="form-control" required/>
					                                                        <span id="subjectError" class="errorSpan text-danger"></span>
					                                                    </div>
					                                                    <div class="form-group">
					                                                        <label>
					                                                            <?php echo $translations['A00145'][$language]; /* Description */?>
					                                                        </label>
					                                                        <textarea id="description" class="form-control" rows="4" cols="50" required></textarea>
					                                                        <span id="descriptionError" class="errorSpan text-danger"></span>
					                                                    </div>
                                                                        <input type="hidden" id="storeAttachmentData1">
                                                                        <input type="hidden" id="storeAttachmentName1">
                                                                        <input type="hidden" id="storeAttachmentType1">
                                                                        <input type="hidden" id="storeAttachmentFlag1">
                                                                        <input type="hidden" id="storeAttachmentSize1">
                                                                        <input type="file" id="attachmentUpload1" class="hide" accept='application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel, application/msword, application/vnd.ms-powerpoint, text/plain, application/pdf' onchange="displayAttachmentName('1', this)">

                                                                        <div class="m-t-rem1">
                                                                            <a href="javascript:;" onclick="$('#attachmentUpload1').click()" class="btn btn-primary btnUpload">Upload</a>
                                                                            <span id="attachmentName1" class="fileName">No Attachment Uploaded</span>
                                                                            <a id="viewAttachment1" href="javascript:;" class="btn" style="display: none; padding: 6px;" onclick="showAttachment(this)">
                                                                                <i class="fa fa-eye"></i>
                                                                            </a>
                                                                            <a id="deleteAttachment1" href="javascript:;" class="btn" style="display:none;padding:6px;" onclick="deleteAtt('1')">
                                                                                <i class="fa fa-times"></i>
                                                                            </a>
                                                                        </div>

                                                                        <select id="fileUploadLang1" class="form-control m-t-15 fileUploadLang" onchange="detectDuplicate(this)"></select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="addLanguageImage" onclick="addImage()">
                                                                    <b><i class="fa fa-plus-circle"></i></b>
                                                                    <span>Add Attachment</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>
                                                            <?php echo $translations['A00318'][$language]; /* Status */?>
                                                        </label>
                                                        <div id="status" class="m-b-20">
                                                            <div class="radio radio-info radio-inline">
                                                                <input type="radio" value="Active" name="statusRadio" checked="checked"/>
                                                                <label>
                                                                    <?php echo $translations['A00372'][$language]; /* Active */?>
                                                                </label>
                                                            </div>
                                                            <div class="radio radio-inline">
                                                                <input type="radio" value="Inactive" name="statusRadio"/>
                                                                <label>
                                                                    <?php echo $translations['A00373'][$language]; /* Inactive */?>
                                                                </label>
                                                            </div>
                                                            <div class="radio radio-inline">
                                                                <input type="radio" value="Deleted" name="statusRadio"/>
                                                                <label>
                                                                    <?php echo $translations['A00374'][$language]; /* Deleted */?>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <span id="statusError" class="errorSpan text-danger"></span>
                                                    </div>
                                                    <div id="submitBtn" class="btn btn-primary waves-effect waves-light">
                                                        <?php echo $translations['A00323'][$language]; /* Submit */?>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-md-12 m-b-20">
                            <div id="submitBtn" class="btn btn-primary waves-effect waves-light">Search</div>
                        </div> -->
                    </div><!-- End row -->
                </div><!-- container -->
            </div><!-- content -->
            <?php include("footer.php"); ?>
        </div><!-- End content-page -->
        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->
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
    </div>

    <!-- END wrapper -->

    <!-- jQuery  -->
    <script>var resizefunc = [];</script>
    <?php include("shareJs.php"); ?>

    <script>
        // Initialize the arguments for ajaxSend function
        var url             = 'scripts/reqUpload.php';
        var method          = 'POST';
        var debug           = 0;
        var bypassBlocking  = 0;
        var bypassLoading   = 0;
        var selectedLang = [];
        var reqData =  new FormData();

        $(document).ready(function() {
            $('#backBtn').click(function() {
                $.redirect('document.php');
            });
            
            fCallback = buildCountry;
            formData  = {command: 'getAnnouncementList'};
            ajaxSend('scripts/reqUpload.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

            $('#submitBtn').click(function() {
                $('.errorSpan').empty();
                var uploadData = getImgObj();
                var subject = $('#subject').val();
                var description = $('#description').val();
                var status = $('#status').find('input[type=radio]:checked').val();
                formData  = {
                    command: 'addDocument', 
                    subject : subject, 
                    description : description, 
                    status : status, 
                    uploadData: uploadData
                };
                var fCallback = submitCallback;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            });
        });


        function submitCallback(data, message) {
            if(data){
                $('#modalProcessing').modal('show');
                $.each(data, function (lang, val) {
                    var reqData2 = new FormData();

                    if(val.attachmentName){
                        var base64Data = reqData[lang]['attachmentData'];
                        var block = base64Data.split(";");
                        var contentType = block[0].split(":")[1];
                        var realData = block[1].split(",")[1];
                        var blob = b64toBlob(realData, contentType);

                        reqData2.append('attachmentData', blob);
                        reqData2.append('attachment', val['attachmentName']);
                    }

                    $.ajax({
                        url: 'scripts/reqUploadCDN.php',
                        type: 'post',
                        data: reqData2,
                        contentType: false,
                        processData: false,
                        async: false,
                        success: function(data){
                        },
                    });
                });

                $('#modalProcessing').modal('hide');

                successUpload();
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

        function successUpload() {
            showMessage('<?php echo $translations['A00411'][$language]; /* Successful added document. */?>', 'success', '<?php echo $translations['A00412'][$language]; /* Add Document */?>', 'upload', 'document.php');
        }


        
       

        function buildCountry(data, message){
            $.each(data.systemLanguages, function (key, val) {
                $("#systemLanguage").append("<input id='" + val.language + "Lang' class='systemLanguage' value='" + val.language + "' hidden='hidden' />");

                systemLang = data.systemLanguages;

                $("#fileUploadLang1").html(buildLangOption());

                $(".upload").change(function(){
                    readURL(this);
                });
            });
        }

        function buildLangOption() {
            var html = `<option value="">Select Language</option>`;
            if(systemLang) {
                $.each(systemLang, function(i, obj) {
                    html += `<option value="${obj.language}">${translations[obj.language_code][language]}</option>`;
                });
            }

            return html;
        }

        function addImage(){
            var wrapperLength = $(".popupMemoImageWrapper").length + 1;

            var wrapper = `
                <div class="col-md-12">
                    <div class="popupMemoImageWrapper">
                        <a href="javascript:;" class="closeBtn" onclick="closeDiv(this)">&times;</a>
                        <div class="form-group">
                            <label>
                                <?php echo $translations['A00369'][$language]; /* Subject */?>
                            </label>
                            <input id="subject" type="text" class="form-control" required/>
                            <span id="subjectError" class="errorSpan text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label>
                                <?php echo $translations['A00145'][$language]; /* Description */?>
                            </label>
                            <textarea id="description" class="form-control" rows="4" cols="50" required></textarea>
                            <span id="descriptionError" class="errorSpan text-danger"></span>
                        </div>
                        <input type="hidden" id="storeAttachmentData${wrapperLength}">
                        <input type="hidden" id="storeAttachmentName${wrapperLength}">
                        <input type="hidden" id="storeAttachmentType${wrapperLength}">
                        <input type="hidden" id="storeAttachmentFlag${wrapperLength}">
                        <input type="hidden" id="storeAttachmentSize${wrapperLength}">

                        <input type="file" id="attachmentUpload${wrapperLength}" class="hide" accept='application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel, application/msword, application/vnd.ms-powerpoint, text/plain, application/pdf' onchange="displayAttachmentName('${wrapperLength}', this)">

                        <div class="m-t-rem1">
                            <a href="javascript:;" onclick="$('#attachmentUpload${wrapperLength}').click()" class="btn btn-primary btnUpload">Upload</a>
                            <span id="attachmentName${wrapperLength}" class="fileName">No Attachment Uploaded</span>
                            <a id="viewAttachment${wrapperLength}" href="javascript:;" class="btn" style="display: none;padding:6px;" onclick="showAttachment(this)">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a id="deleteAttachment${wrapperLength}" href="javascript:;" class="btn" style="display:none;padding:6px;" onclick="deleteAtt('${wrapperLength}')">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>

                        <select id="fileUploadLang${wrapperLength}" class="form-control m-t-15 fileUploadLang" onchange="detectDuplicate(this)">
                            ${buildLangOption()}
                        </select>
                    </div>
                </div>
            `;

            $("#appendImage").append(wrapper);
        }

        function closeDiv(n) {
            var lang = $(n).parent().find('.fileUploadLang').val();
            if(lang != "") {
                var inArr = $.inArray(lang, selectedLang);
                selectedLang.splice(inArr, 1)
            }

            $(n).parent().parent().remove();
        }

        function detectDuplicate(n) {
            var thisSelected = $(n).val();
            var inArr = $.inArray(thisSelected, selectedLang);

            if(inArr >= 0) {
                $(n).val("");
                alert("This language is selected.");
            }else {
                selectedLang.push(thisSelected);
                $(n).attr('disabled', 'disabled');
            }

            console.log(selectedLang);
        }

        function getImgObj() {
            var uploadData = {};

            $(".popupMemoImageWrapper").each(function(i, obj) {
               var lang = $(obj).find('[id^="fileUploadLang"]').val();
               if(lang!=""){
                    var attachmentData = $(obj).find('[id^="storeAttachmentData"]').val();
                    var attachmentName = $(obj).find('[id^="storeAttachmentName"]').val();

                    var subject = $(obj).find('[id^="subject"]').val();
                    var description = $(obj).find('[id^="description"]').val();
                    var attachmentSize = $(obj).find('[id^="storeAttachmentSize"]').val();
                    var attachmentType = $(obj).find('[id^="storeAttachmentType"]').val();
                    var attachmentFlag = $(obj).find('[id^="storeAttachmentFlag"]').val();

                    var description = $(obj).find('[id^="description"]').val();
                    var subject = $(obj).find('[id^="subject"]').val();

                    // var defaultImage = (imgData=='')?'':1;
                    var defaultAttachment = (attachmentData=='')?'':1;

                    if(i > 0) {
                        defaultImage = '';
                        defaultAttachment = '';
                    }

                    uploadData[lang] = {
                        // attachmentData: attachmentData,
                        attachmentType: attachmentType,
                        attachmentName: attachmentName,
                        attachmentFlag: attachmentFlag,
                        attachmentSize: attachmentSize,
                        defaultAttachment: defaultAttachment,
                        languageType : lang,
                        description : description,
                        subject : subject
                    };


                    reqData[lang] = {
                        attachment: attachmentName,
                        attachmentData: attachmentData,
                        default: defaultAttachment,
                        subject : subject
                    };

               }
               
            });

            return uploadData;
        }

        function displayAttachmentName(id, n) {
            var dFileName = $("#attachmentName"+id);

            if (n.files && n.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    // $('#blah').attr('src', e.target.result);
                    // $("#imgData"+input.id).empty().val(reader["result"]);
                    dFileName.text(n.files[0]["name"]);
                    // $("#imgSize"+input.id).empty().val(input.files[0]["size"]);
                    // $("#imgType"+input.id).empty().val(input.files[0]["type"]);
                    // $("#imgFlag"+input.id).empty().val("1");

                    $("#storeAttachmentData"+id).val(reader["result"]);
                    $("#storeAttachmentName"+id).val(n.files[0]["name"]);
                    $("#storeAttachmentSize"+id).val(n.files[0]["size"]);
                    $("#storeAttachmentType"+id).val(n.files[0]["type"]);
                    $("#storeAttachmentFlag"+id).val('1');

                    var file = URL.createObjectURL(n.files[0]);
                    // $("#viewAttachment"+id).attr('href', file);
                    // $("#viewAttachment"+id).show();

                    $("#viewAttachment"+id).attr('data-res', file);
                    $("#viewAttachment"+id).css('display', 'inline-block');
                    $("#deleteAttachment"+id).css('display', 'inline-block');
                };

                reader.readAsDataURL(n.files[0]);
            }
        }

        function showAttachment(n) {
            $("#viewer").attr('src', $(n).attr('data-res'));
            $("#showAttachment").modal();
        }

        function deleteAtt(id) {
            $("#attachmentUpload"+id).val("");
            $("#attachmentName"+id).text("No File Uploaded");
            $("#storeAttachmentData"+id).val("");
            $("#storeAttachmentName"+id).val("");
            $("#storeAttachmentType"+id).val("");
            $("#storeAttachmentFlag"+id).val("");
            $("#storeAttachmentSize"+id).val("");

            $("#viewAttachment"+id).hide();
            $("#deleteAttachment"+id).hide();

            var lang = $("#fileUploadLang"+id).val();
            $("#fileUploadLang"+id).html(buildLangOption());
            $("#fileUploadLang"+id).removeAttr('disabled');

            if(lang != "") {
                var inArr = $.inArray(lang, selectedLang);
                selectedLang.splice(inArr, 1)
            }
        }
    </script>
</body>
</html>