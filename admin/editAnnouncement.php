<?php 
    session_start();
    $thisPage = basename($_SERVER['PHP_SELF']);
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
                        <div class="col-sm-4">
                            <div id="backBtn" class="btn btn-primary waves-effect waves-light m-b-20">
                                <?php echo $translations['A00115'][$language]; /* Back */?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-box p-b-0">
                                <div class="row">
                                        <form role="form" enctype="multipart/form-data">
                                            <div id="basicwizard" class=" pull-in">
                                                <div class="tab-content b-0 m-b-0 p-t-0">
                                                    <div id="datepicker" class="form-group row mx-0">
                                                        <div class="col-md-5">
                                                            <label class="control-label">
                                                                <?php echo $translations['A00564'][$language]; /* Transaction Date */?>
                                                            </label>
                                                            <div class="input-daterange input-group" id="datepicker-range">
                                                                <input id="dateRangeStart" type="text" class="input-sm form-control" name="start" dataName="transactionDate" dataType="dateRange" autocomplete="off">
                                                                <div class="input-group-addon">
                                                                    <?php echo $translations['A00139'][$language]; /* to */?>
                                                                </div>
                                                                <input id="dateRangeEnd" type="text" class="input-sm form-control" name="end" dataName="transactionDate" dataType="dateRange" autocomplete="off">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mx-0">
                                                        <div class="col-md-5">
                                                            <div class="row">
                                                                <div class="col-md-10">
                                                                    <label>
                                                                        Include Leader Username
                                                                    </label>
                                                                    <input id="leaderUsername" type="text" class="form-control" required/>
                                                                </div>
                                                                <div id="addUsernameBtn" class="btn btn-primary waves-effect waves-light col-md-2" style="margin-top: 28px;">
                                                                    Add
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12 p-r-0">
                                                                    <div id="addUsernameList" style="margin-top: 10px; border: 1px solid #ddd; height: 150px; overflow: scroll;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <span id="leaderUsernameError" class="errorSpan text-danger"></span>
                                                        </div>

                                                        <div class="col-md-5 m-l-15">
                                                            <div class="row">
                                                                <div class="col-md-10">
                                                                    <label>
                                                                        Exclude Leader Username
                                                                    </label>
                                                                    <input id="excludeLeaderUsername" type="text" class="form-control" required/>
                                                                </div>
                                                                <div id="addExcludeUsernameBtn" class="btn btn-primary waves-effect waves-light col-md-2" style="margin-top: 28px;">
                                                                    Add
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12 p-r-0">
                                                                    <div id="addExcludeUsernameList" style="margin-top: 10px; border: 1px solid #ddd; height: 150px; overflow: scroll;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <span id="excludeLeaderUsernameError" class="errorSpan text-danger"></span>
                                                        </div>

                                                    </div>

                                                    <div class="form-group row mx-0 m-t-30">
                                                        <div class="col-md-5">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <label class="control-label">
                                                                        <?php echo $translations['A00153'][$language]; /* Country */ ?> Include
                                                                    </label>
                                                                    <select id="countryName" class="form-control country" dataName="countryName" dataType="text">
                                                                        <option value="">
                                                                            <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div id="addCountryList" style="margin-top: 10px; border: 1px solid #ddd; height: 150px; overflow: scroll;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <span id="countryIDError" class="errorSpan text-danger"></span>
                                                        </div>

                                                        <div class="col-md-5 m-l-15">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <label class="control-label">
                                                                        <?php echo $translations['A00153'][$language]; /* Country */ ?> Exclude
                                                                    </label>
                                                                    <select id="excludeCountryName" class="form-control country" dataName="excludeCountryName" dataType="text">
                                                                        <option value="">
                                                                            <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div id="addExcludeCountryList" style="margin-top: 10px; border: 1px solid #ddd; height: 150px; overflow: scroll;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <span id="excludeCountryIDError" class="errorSpan text-danger"></span>
                                                        </div>

                                                    </div>

                                                    <div class="form-group row mx-0" style="margin-top: 30px;">
                                                        <div class="col-md-12">
                                                            <label>
                                                                <?php echo $translations['A00439'][$language]; /* Image */ ?>
                                                            </label>

                                                            <div class="row">
                                                                <div id="appendImage"></div>
                                                                <div class="col-md-4">
                                                                    <div class="addLanguageImage" onclick="addImage()">
                                                                        <b><i class="fa fa-plus-circle"></i></b>
                                                                        <span>Add Image</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <label>
                                                            <?php echo $translations['A00804'][$language]; /* Status */?>
                                                        </label>
                                                        <div id="status" class="m-b-20">
                                                            <div class="radio radio-info radio-inline">
                                                                <input id="active" type="radio" value="Active" name="statusRadio" checked="checked"/>
                                                                <label for="active">
                                                                    <?php echo $translations['A00372'][$language]; /* Active */?>
                                                                </label>
                                                            </div>
                                                            <div class="radio radio-inline">
                                                                <input id="inActive" type="radio" value="Inactive" name="statusRadio"/>
                                                                <label for="inActive">
                                                                    <?php echo $translations['A00373'][$language]; /* Inactive */?>
                                                                </label>
                                                            </div>
                                                            <div class="radio radio-inline">
                                                                <input id="deleted" type="radio" value="Deleted" name="statusRadio"/>
                                                                <label for="deleted">
                                                                    <?php echo $translations['A00374'][$language]; /* Deleted */?>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <span id="statusError" class="errorSpan text-danger"></span>
                                                    </div>

                                                <div class="form-group">
                                                    <label>
                                                        Type
                                                    </label>
                                                    <div id="treeType" class="m-b-20">
                                                        <div class="radio radio-inline">
                                                            <input id="placementRadio" type="radio" value="placement" name="typeRadio"/>
                                                            <label for="placementRadio">
                                                                Placement
                                                            </label>
                                                        </div>
                                                        <div class="radio radio-inline">
                                                            <input id="sponsorRadio" type="radio" value="sponsor" name="typeRadio" checked/>
                                                            <label for="sponsorRadio">
                                                                Sponsor
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
                       
                    </div>
                </div>
            </div>
            <?php include("footer.php"); ?>
        </div>
    </div>

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

    <script>var resizefunc = [];</script>
    <?php include("shareJs.php"); ?>

    <script>
        var url             = 'scripts/reqUpload.php';
        var method          = 'POST';
        var debug           = 0;
        var bypassBlocking  = 0;
        var bypassLoading   = 0;

        var imageFlag       = 0;
        var attachmentFlag  = 0;
        var language        = "<?php echo $language; ?>";
        var systemLang = [];
        var selectedLang = [];
        var dataURL = "<?php echo $config['tempMediaUrl']; ?>";
        var reqData =  new FormData();

        $(document).ready(function() {
            var id = "<?php echo $_POST['id']; ?>";           
            if(!id) {
                var message  = '<?php echo $translations['A00809'][$language]; /* Client does not exist */?>';
                showMessage(message, '', 'Error', 'exclamation-triangle', 'announcement.php');
                return;
            }

            formData  = {
                command : 'getAnnouncement', id : id
            };
            var fCallback = loadDefaultData;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

            $('#upload').change(function() {
                $('#imageDiv').attr('style', 'display: none;');
                imageFlag = 1;
            });

            $('#uploadFile').change(function() {
                $('#attachmentDiv').attr('style', 'display: none;');
            });

            $('#backBtn').click(function() {
                $.redirect('announcement.php');
            });

            $('#datepicker input').each(function() {
                $(this).datepicker('clearDates');
            });

            $("#uploadFile").change(function(){
                readFileURL(this);
            });
            
            $('#submitBtn').click(function() {
            var nameTagArr = [];
            var excludenameTagArr = [];
            var countryTagArr = [];
            var excludecountryTagArr = [];

            $('.nameTag').each(function (index, value) {
                nameTagArr.push(value.id);
            });

            $('.excludenameTag').each(function (index, value) {  
                excludenameTagArr.push(value.id);
            });

            $('.includecountryTag').each(function (index, value) {
                countryTagArr.push(value.id);
            });

            $('.excludecountryTag').each(function (index, value) { 
                excludecountryTagArr.push(value.id);
            });


                $('.errorSpan').empty();

                var subject = $('#subject').val();
                var description = $('#description').val();
                var status = $('#status').find('input[type=radio]:checked').val();
                var treeType = $('#treeType').find('input[type=radio]:checked').val();
                var dateOfBirthStart = $('#dateRangeStart').val();
                var dateOfBirthEnd   = $('#dateRangeEnd').val();
                var attachmentData = $('#fileData').val();
                var attachmentType = $('#fileType').val();
                var attachmentName = $('#fileName').val()
                var attachmentSize = $('#fileSize').val()

                var uploadData = getImgObj();

                formData  = {
                    command: 'editAnnouncement',
                    id : '<?php echo $_POST["id"] ?>', 
                    subject : subject, 
                    description : description, 
                    status : status,
                    treeType: treeType, 
                    leaderUsernameAry : nameTagArr, 
                    excludeLeaderUsernameAry : excludenameTagArr,
                    countryIDAry : countryTagArr,
                    excludeCountryIDAry : excludecountryTagArr,
                    uploadData : uploadData,
                    startDate  : dateToTimestamp(dateOfBirthStart),
                    endDate  : dateToTimestamp(dateOfBirthEnd)
                };
                fCallback = submitCallback;
                ajaxSend('scripts/reqUpload.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            });
        });

        function closeDiv(n) {
            var getThisInd = $('.closeBtn').index($(n));
            getThisInd+=1;

            selectedLang.splice(getThisInd, 1);

            $(n).parent().parent().remove();
        }

        function detectDuplicate(n) {
            var options = $('[id^="fileUploadLang"]');
            var values = $.map(options ,function(option) {
                return $(option).val();
            });

            var getThisInd = $('[id^="fileUploadLang"]').index($(n));
            var thisSelected = $(n).val();
            var inArr = $.inArray(thisSelected, selectedLang);
            var nth = getThisInd+1;
            $('#storeFileFlag'+nth).val(1);

            if(inArr >= 0) {
                $(n).val("");
                alert("This language is selected.");
                selectedLang.splice(getThisInd, 1);
            }else {
                selectedLang[getThisInd] = thisSelected;
            }

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

                    uploadData[lang] = {
                        subject: subject,
                        description: description,
                        imgName: imgName,
                        imgType: imgType,
                        imgFlag: imgFlag,
                        imgSize: imgSize,
                        defaultImage: defaultImage,
                        attachmentName: attachmentName,
                        attachmentType : attachmentType,
                        attachmentFlag: attachmentFlag,
                        attachmentSize: attachmentSize,
                        defaultAttachment: defaultAttachment,
                        languageType : lang
                    };

                    reqData[lang] = {
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

        function displayFileName(id, n) {
            var dFileName = $("#fileName"+id);

            if (n.files && n.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    dFileName.text(n.files[0]["name"]);

                    $("#storeFileData"+id).val(reader["result"]);
                    $("#storeFileName"+id).val(n.files[0]["name"]);
                    $("#storeFileType"+id).val(n.files[0]["type"]);
                    $("#storeFileSize"+id).val(n.files[0]["size"]);
                    $("#storeFileFlag"+id).val('1');

                    $("#viewImg"+id).css('display', 'inline-block');
                    $("#deleteImg"+id).css('display', 'inline-block');
                };

                reader.readAsDataURL(n.files[0]);
            }
        }

        function displayAttachmentName(id, n) {
            var dFileName = $("#attachmentName"+id);

            if (n.files && n.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    dFileName.text(n.files[0]["name"]);

                    $("#storeAttachmentData"+id).val(reader["result"]);
                    $("#storeAttachmentName"+id).val(n.files[0]["name"]);
                    $("#storeAttachmentSize"+id).val(n.files[0]["size"]);
                    $("#storeAttachmentType"+id).val(n.files[0]["type"]);
                    $("#storeAttachmentFlag"+id).val('1');

                    var file = URL.createObjectURL(n.files[0]);

                    $("#viewAttachment"+id).attr('data-res', file);
                    $("#viewAttachment"+id).css('display', 'inline-block');
                    $("#deleteAttachment"+id).css('display', 'inline-block');
                };

                reader.readAsDataURL(n.files[0]);
            }
        }

        function deleteImg(id) {
            $("#fileUpload"+id).val("");
            $("#fileName"+id).text("No File Uploaded");
            $("#storeFileData"+id).val("");
            $("#storeFileName"+id).val("");
            $("#storeFileType"+id).val("");
            $("#storeFileFlag"+id).val("");
            $("#storeFileSize"+id).val("");

            $("#viewImg"+id).hide();
            $("#deleteImg"+id).hide();

            var lang = $("#fileUploadLang"+id).val();
            $("#fileUploadLang"+id).html(buildLangOption());
            $("#fileUploadLang"+id).removeAttr('disabled');

            if(lang != "") {
                var inArr = $.inArray(lang, selectedLang);
                selectedLang.splice(inArr, 1)
            }
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

        function addImage(){
            var wrapperLength = $(".popupMemoImageWrapper").length + 1;

            var wrapper = `
                <div class="col-md-4">
                    <div class="popupMemoImageWrapper">
                        <a href="javascript:;" class="closeBtn" onclick="closeDiv(this)">&times;</a>
                        <input type="hidden" id="storeFileData${wrapperLength}">
                        <input type="hidden" id="storeFileName${wrapperLength}">
                        <input type="hidden" id="storeFileType${wrapperLength}">
                        <input type="hidden" id="storeFileFlag${wrapperLength}">
                        <input type="hidden" id="storeFileSize${wrapperLength}">

                        <input type="hidden" id="storeAttachmentData${wrapperLength}">
                        <input type="hidden" id="storeAttachmentName${wrapperLength}">
                        <input type="hidden" id="storeAttachmentType${wrapperLength}">
                        <input type="hidden" id="storeAttachmentFlag${wrapperLength}">
                        <input type="hidden" id="storeAttachmentSize${wrapperLength}">

                        <input type="file" id="fileUpload${wrapperLength}" class="hide" accept="image/jpeg, image/png, image/gif, image/bmp, image/tiff" onchange="displayFileName('${wrapperLength}', this)">

                        <input type="file" id="attachmentUpload${wrapperLength}" class="hide" accept='application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel, application/msword, application/vnd.ms-powerpoint, text/plain, application/pdf' onchange="displayAttachmentName('${wrapperLength}', this)">

                        <div>
                            <label>
                                <?php echo $translations['A00369'][$language]; /* Subject */?>
                            </label>
                            <input id="subject" type="text" class="form-control" required/>
                            <span id="subjectError" class="errorSpan text-danger"></span>
                            <br>
                        </div>

                        <div>
                            <label>
                                <?php echo $translations['A00145'][$language]; /* Description */?>
                            </label>
                            <textarea id="description" class="form-control limitText" rows="4" cols="50" required ></textarea>
                            <span id="descriptionError" class="errorSpan text-danger"></span>
                            <br>
                        </div>
                        <div>
                            <a href="javascript:;" onclick="$('#fileUpload${wrapperLength}').click()" class="btn btn-primary btnUpload">Upload</a>
                            <span id="fileName${wrapperLength}" class="fileName">No Image Uploaded</span>
                            <a id="viewImg${wrapperLength}" href="javascript:;" class="btn" style="display: none;padding:6px;" onclick="showImg('${wrapperLength}')">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a id="deleteImg${wrapperLength}" href="javascript:;" class="btn" style="display:none;padding:6px;" onclick="deleteImg('${wrapperLength}')">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>

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

        function buildLangOption(lang) {
            var html = `<option value="">Select Language</option>`;
            if(systemLang) {
                $.each(systemLang, function(i, obj) {
                    var selected = "";
                    if(lang && lang == obj.language) {
                        selected = "selected";
                    }
                    html += `<option value="${obj.language}" ${selected}>${translations[obj.language_code][language]}</option>`;
                });
            }

            return html;
        }

        function showImg(n) {
            $("#modalImg").attr('src', $("#storeFileData"+n).val());
            $("#showImage").modal();
        }

        function showAttachment(n) {
            var pdfURl = $(n).attr('data-res');
            var check  = pdfURl.includes(dataURL);
            if(check) pdfURl = "https://docs.google.com/viewer?url="+pdfURl+"&embedded=true";
            $("#viewer").attr('src', pdfURl);
            $("#showAttachment").modal();
        }

        
        function loadDefaultData(data, message) { 
            $('#dateRangeStart').val(data.permissions.startDate);
            $('#dateRangeEnd').val(data.permissions.endDate);

            if(data.announcement.status == "Active")
                $("#active").prop("checked", true)
            else if(data.announcement.status == "Inactive")
                $("#inActive").prop("checked", true);
            else if(data.announcement.status == "Deleted")
                $("#deleted").prop("checked", true);

            if(data.permissions.treeType == "placement")
            $("#placement").prop("checked", true);
             else if(data.permissions.treeType == "sponsor")
            $("#sponsor").prop("checked", true);

            $.each(data.countryList, function(key, val) {
                var countryID = val['id'];
                var country   = val['name'];
                $('#countryName').append('<option value="' + countryID + '">' + country + '</option>');
                $('#excludeCountryName').append('<option value="' + countryID + '">' + country + '</option>');
            });

            systemLang = data.systemLanguages;
            var ind = 0;

            $.each(data.announcementDetail, function(i,obj){
                selectedLang.push(i);
                var wrapperLength = ind+1;
                var defaultClass = "";
                var closeButton = `<a href="javascript:;" class="closeBtn" onclick="closeDiv(this)">&times;</a>`;

                if(ind==0) {
                    defaultClass = "default";
                    closeButton = `<span class="dtxt">Default</span>`;
                }


                var imgF = '';
                var attF = '';
                var imgView = 'none';
                var attView = 'none';
                var videoView = 'none';

                if(obj.image_name) {
                    imgView = 'inline-block';
                }

                if(obj.attachement_name) {
                    attView = 'inline-block';
                }

                var wrapper = `
                    <div class="col-md-4">
                        <div class="popupMemoImageWrapper ${defaultClass}">
                            ${closeButton}
                            <input type="hidden" id="storeFileData${wrapperLength}" value="${dataURL+obj.image_name || ''}">
                            <input type="hidden" id="storeFileName${wrapperLength}" value="${obj.image_name || ''}">
                            <input type="hidden" id="storeFileType${wrapperLength}" value="${obj.image_type || ''}">
                            <input type="hidden" id="storeFileSize${wrapperLength}" value="${obj.image_size || ''}">
                            <input type="hidden" id="storeFileFlag${wrapperLength}" value="0">

                            <input type="hidden" id="storeAttachmentData${wrapperLength}" value="${obj.attachement_name || ''}">
                            <input type="hidden" id="storeAttachmentName${wrapperLength}" value="${obj.attachement_name || ''}">
                            <input type="hidden" id="storeAttachmentType${wrapperLength}" value="${obj.attachement_type || ''}">
                            <input type="hidden" id="storeAttachmentSize${wrapperLength}" value="${obj.attachement_size || ''}">
                            <input type="hidden" id="storeAttachmentFlag${wrapperLength}" value="0">

                            <div>
                                <label>
                                    <?php echo $translations['A00369'][$language]; /* Subject */?>
                                </label>
                                <input id="subject" type="text" class="form-control" required value="${obj.subject || ''}" />
                                <span id="subjectError" class="errorSpan text-danger"></span>
                                <br>
                            </div>

                            <div>
                                <label>
                                    <?php echo $translations['A00145'][$language]; /* Description */?>
                                </label>
                                <textarea id="description" class="form-control limitText" rows="4" cols="50" required >${obj.description || ''}</textarea>
                                <span id="descriptionError" class="errorSpan text-danger"></span>
                                <br>
                            </div>

                            <input type="file" id="fileUpload${wrapperLength}" class="hide" accept="image/jpeg, image/png, image/gif, image/bmp, image/tiff" onchange="displayFileName('${wrapperLength}', this)">

                            <input type="file" id="attachmentUpload${wrapperLength}" class="hide" accept='application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel, application/msword, application/vnd.ms-powerpoint, text/plain, application/pdf' onchange="displayAttachmentName('${wrapperLength}', this)">

                            <div>
                                <a href="javascript:;" onclick="$('#fileUpload${wrapperLength}').click()" class="btn btn-primary btnUpload">Upload</a>
                                <span id="fileName${wrapperLength}" class="fileName">${obj.image_name || 'No Image'}</span>
                                <a id="viewImg${wrapperLength}" href="javascript:;" class="btn" style="display: ${imgView};padding:6px;" onclick="showImg('${wrapperLength}')">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a id="deleteImg${wrapperLength}" href="javascript:;" class="btn" style="display:${imgView};padding:6px;" onclick="deleteImg('${wrapperLength}')">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>

                            <div class="m-t-rem1">
                                <a href="javascript:;" onclick="$('#attachmentUpload${wrapperLength}').click()" class="btn btn-primary btnUpload">Upload</a>
                                <span id="attachmentName${wrapperLength}" class="fileName">${obj.attachement_name || 'No attachment'}</span>
                                <a id="viewAttachment${wrapperLength}" href="javascript:;" class="btn" style="display: ${attView};padding:6px;" onclick="showAttachment(this)" data-res="${dataURL+obj.attachement_name}">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a id="deleteAttachment${wrapperLength}" href="javascript:;" class="btn" style="display:${attView};padding:6px;" onclick="deleteAtt('${wrapperLength}')">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                          
                            <select id="fileUploadLang${wrapperLength}" class="form-control m-t-15 fileUploadLang" onchange="detectDuplicate(this)">
                                ${buildLangOption(i)}
                            </select>
                        </div>
                    </div>
                `;

                $("#appendImage").append(wrapper);

                ind+=1;
            });

            if(data.permissions){
                if(data.permissions.leader){
                    $.each(data.permissions.leader, function(key, value){
                        $("#addUsernameList").append('<div id="'+value+'" class="nameTag" style="background-color: #c5efc2; padding: 5px 10px; border-radius: 5px; margin-left: 10px; margin-right: 10px; margin-top: 10px;">'+value+' <i class="fa fa-times cancelUser" aria-hidden="true" style="margin-left: 10px;" value="'+value+'"></i></div>');
                    });
                }

                if(data.permissions.excludeLeader){
                    $.each(data.permissions.excludeLeader, function(key, value){
                        $("#addExcludeUsernameList").append('<div id="'+value+'" class="excludenameTag" style="background-color: #c5efc2; padding: 5px 10px; border-radius: 5px; margin-left: 10px; margin-right: 10px; margin-top: 10px;">'+value+' <i class="fa fa-times cancelUser" aria-hidden="true" style="margin-left: 10px;" value="'+value+'"></i></div>');
                    });
                }
                

                if(data.permissions.country){
                    $.each(data.permissions.country, function(key, value){
                        $("#addCountryList").append('<div id="'+value["id"]+'" data-select="countryName" class="countryTag includecountryTag" style="background-color: #c5efc2; padding: 5px 10px; border-radius: 5px; margin-left: 10px; margin-right: 10px; margin-top: 10px;">'+value["name"]+' <i class="fa fa-times cancelUser" aria-hidden="true" style="margin-left: 10px;"></i></div>');

                        $("#countryName").find('option[value="'+value["id"]+'"]').remove();
                    });
                }

                if(data.permissions.excludeCountry){
                    $.each(data.permissions.excludeCountry, function(key, value){
                        $("#addExcludeCountryList").append('<div id="'+value["id"]+'" data-select="excludeCountryName" class="countryTag excludecountryTag" style="background-color: #c5efc2; padding: 5px 10px; border-radius: 5px; margin-left: 10px; margin-right: 10px; margin-top: 10px;">'+value["name"]+' <i class="fa fa-times cancelUser" aria-hidden="true" style="margin-left: 10px;"></i></div>');

                        $("#excludeCountryName").find('option[value="'+value["id"]+'"]').remove();
                    });
                }
            }

            $(".upload").change(function(){
                readURL(this);
            });

            $(".uploadFile").change(function(){
                readFileURL(this);
            });
        }

        $('select#countryName').change(function(){
            var countryID = $(this).find("option:selected").val();
            var country = $(this).find("option:selected").text();

            var countryDiv = `
                <div id="${countryID}" data-select="countryName" class="countryTag includecountryTag" style="">${country} <i class="fa fa-times cancelUser" aria-hidden="true" style="margin-left: 10px;"></i></div>
            `;

            $("#addCountryList").append(countryDiv);

            $(this).find("option:selected").remove();
            $(this).val('');
        });

        $('select#excludeCountryName').change(function(){
            var countryID = $(this).find("option:selected").val();
            var country = $(this).find("option:selected").text();

            var countryDiv = `
                <div id="${countryID}" data-select="excludeCountryName" class="countryTag excludecountryTag" style="">${country} <i class="fa fa-times cancelUser" aria-hidden="true" style="margin-left: 10px;"></i></div>
            `;

            $("#addExcludeCountryList").append(countryDiv);

            $(this).find("option:selected").remove();
            $(this).val('');
        });


        $("#addUsernameBtn").click(function(){
            var text = $("#leaderUsername").val();

            if(text != ""){

                $("#addUsernameList").append('<div id="'+text+'" class="nameTag" style="background-color: #c5efc2; padding: 5px 10px; border-radius: 5px; margin-left: 10px; margin-right: 10px; margin-top: 10px;">'+text+' <i class="fa fa-times cancelUser" aria-hidden="true" style="margin-left: 10px;" value="'+text+'"></i></div>');

            }

            $("#leaderUsername").val("");
        });

        $("#addExcludeUsernameBtn").click(function(){
            var text = $("#excludeLeaderUsername").val();

            if(text != ""){

                $("#addExcludeUsernameList").append('<div id="'+text+'" class="excludenameTag" style="background-color: #c5efc2; padding: 5px 10px; border-radius: 5px; margin-left: 10px; margin-right: 10px; margin-top: 10px;">'+text+' <i class="fa fa-times cancelUser" aria-hidden="true" style="margin-left: 10px;" value="'+text+'"></i></div>');


            }

            $("#excludeLeaderUsername").val("");
        });

    $(document).on("click",".nameTag",function() {
        $(this).remove();
    });

    $(document).on("click",".excludenameTag",function() {
        $(this).remove();
    });

   

    $(document).on("click",".countryTag",function() {
        $(this).remove();

        var selectId = $(this).attr('data-select');
        var countryId = $(this).attr('id');
        var country = $(this).text();
        var optionHtml = `<option value=""><?php echo $translations['A00055'][$language]; /* All */ ?></option>`;

        var csel = $("#"+selectId);
        var appendHtml  = `<option value="${countryId}">${country}</option>`;
        csel.append(appendHtml);
        csel.html(csel.find('option').sort(function(x, y) {
            return $(x).text() > $(y).text() ? 1 : -1;
        }));

        csel.prepend(optionHtml);
        csel.find("option[value='']").not(':first').remove();

        csel.val("");
    });

    $('#dateRangeStart').datepicker({
        format      : 'dd/mm/yyyy',
        orientation : 'auto',
        autoclose   : true
    });

    $('#dateRangeEnd').datepicker({
        format      : 'dd/mm/yyyy',
        orientation : 'auto',
        autoclose   : true
    });

    function submitCallback(data, message) {
        if(data.uploadData != null){
            $('#modalProcessing').modal('show');
            $.each(data.uploadData, function (lang, val) {
                var reqData2 = new FormData();

                if(val.imgName){
                    var imagefiles = reqData[lang]['imgData'];
                    var block = imagefiles.split(";");
                    var contentType = block[0].split(":")[1];
                    var realData = block[1].split(",")[1];
                    var blob = b64toBlob(realData, contentType);

                    reqData2.append('imageData', blob);
                    reqData2.append('image', val['imgName']);
                }


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

            uploadVideoSuccess();
        } else {
            uploadVideoSuccess();
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

    function uploadVideoSuccess() {
        showMessage('<?php echo $translations['A00495'][$language]; /* Successful added announcement. */?>', 'success', '<?php echo $translations['A00496'][$language]; /* Add Announcement */?>', 'upload', 'announcement.php');
    }

    $(document).on("input",".limitText",function() {
        var words = 0;
        var maxLen = 200;

        if ((this.value.match(/\S+/g)) != null) {
          words = this.value.match(/\S+/g).length;
        }

        if (words > maxLen) {
            // if (e.which !== 8) e.preventDefault();

          // Split the string on first 200 words and rejoin on spaces
          var trimmed = $(this).val().split(/\s+/, maxLen).join(" ");
          // Add a space at the end to make sure more typing creates new words
          $(this).val(trimmed + " ");

          alert('Maximum ' +maxLen+' words only.')
        }

        // $('.display_count').text(words);
    });

    </script>
</body>
</html>
