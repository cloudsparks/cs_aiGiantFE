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
                                                <div class="form-group row mx-0">
                                                    <div class="col-md-5">
                                                        <label>
                                                            <?php echo $translations['A00369'][$language]; /* Subject */?>
                                                        </label>
                                                        <input id="subject" type="text" class="form-control" required/>
                                                        <span id="subjectError" class="errorSpan text-danger"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row mx-0">
                                                    <div class="col-md-5">
                                                        <label>
                                                            <?php echo $translations['A00145'][$language]; /* Description */?>
                                                        </label>
                                                        <textarea id="description" class="form-control" rows="4" cols="50" required></textarea>
                                                        <span id="descriptionError" class="errorSpan text-danger"></span>
                                                    </div>
                                                </div>
                                                <div id="datepicker" class="form-group row mx-0">
                                                    <div class="col-md-5">
                                                        <label class="control-label">
                                                            Date
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
                                                            <div id="appendImage">
                                                                <div class="col-md-4">
                                                                    <div class="popupMemoImageWrapper default">
                                                                        <span class="dtxt">Default</span>
                                                                        <input type="hidden" id="storeFileData1">
                                                                        <input type="hidden" id="storeFileName1">
                                                                        <input type="hidden" id="storeFileSize1">
                                                                        <input type="hidden" id="storeFileType1">
                                                                        <input type="hidden" id="storeFileFlag1">
                                                                        <input type="file" id="fileUpload1" class="hide" accept="image/jpeg, image/png, image/gif, image/bmp, image/tiff" onchange="displayFileName('1', this)">
                                                                        <div>
                                                                            <a href="javascript:;" onclick="$('#fileUpload1').click()" class="btn btn-primary btnUpload">Upload</a>
                                                                            <span id="fileName1" class="fileName">No File Uploaded</span>
                                                                            <a id="viewImg1" href="javascript:;" class="btn" style="display: none;padding:6px;" onclick="showImg('1')">
                                                                                <i class="fa fa-eye"></i>
                                                                            </a>
                                                                            <a id="deleteImg1" href="javascript:;" class="btn" style="display:none;padding:6px;" onclick="deleteImg('1')">
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
                                                                    <span>Add Image</span>
                                                                </div>
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
                                                        <div class="radio radio-inline hide">
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

<div class="modal fade" id="modalProcessing" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="padding-left: 17px; padding-right: 25px;" aria-modal="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <span id="canvasTitle" class="modal-title"><?php echo "Processing"; //Processing ?></span>
            </div>
            <div class="modalLine"></div>
            <div class="modal-body modalBodyFont">
                <div id="canvasAlertMessage"><?php echo "Uploading file..."; //Uploading file... ?></div>
            </div>
            <div class="modal-footer">

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
    var language        = "<?php echo $language; ?>";
    var systemLang      = null;
    var selectedLang = [];

    var reqData =  new FormData();


    $(document).ready(function() {
        $('#backBtn').click(function() {
            $.redirect('memo.php');
        });

        fCallback = buildCountry;
        formData  = {command: 'getMemoList'};
        ajaxSend('scripts/reqUpload.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

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

            var uploadData = getImgObj();

            fCallback = submitCallback;
            formData  = {
                command: 'addMemo',
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

            ajaxSend('scripts/reqUpload.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        });
    });

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

                var defaultImage = (imgData=='')?'':1;

                if(i > 0) {
                    defaultImage = '';
                }

                uploadData[lang] = {
                    imgData: imgData,
                    imgName: imgName,
                    imgType: imgType,
                    imgFlag: imgFlag,
                    imgSize: imgSize,
                    defaultImage: defaultImage,
                    languageType : lang
                };

                reqData[lang] = {
                    imgName: imgName,
                    imgData: imgData,
                    subject : subject
                };
            }else{
                var imgData = $(obj).find('[id^="storeFileData"]').val();
                var imgName = $(obj).find('[id^="storeFileName"]').val();
                var imgType = $(obj).find('[id^="storeFileType"]').val();
                var imgFlag = $(obj).find('[id^="storeFileFlag"]').val();
                var imgSize = $(obj).find('[id^="storeFileSize"]').val();

                uploadData['noLang'] = {
                    imgData: imgData,
                    imgName: imgName,
                    imgType: imgType,
                    imgFlag: imgFlag,
                    imgSize: imgSize,
                    defaultImage: '',
                    languageType: null
                };
            }

        });

        return uploadData;
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
    }

    function addImage(){
        var wrapperLength = $(".popupMemoImageWrapper").length + 1;

        var wrapper = `
        <div class="col-md-4">
        <div class="popupMemoImageWrapper">
        <a href="javascript:;" class="closeBtn" onclick="closeDiv(this)">&times;</a>
        <input type="hidden" id="storeFileData${wrapperLength}">
        <input type="hidden" id="storeFileName${wrapperLength}">
        <input type="hidden" id="storeFileSize${wrapperLength}">
        <input type="hidden" id="storeFileType${wrapperLength}">
        <input type="hidden" id="storeFileFlag${wrapperLength}">
        <input type="file" id="fileUpload${wrapperLength}" class="hide" accept="image/jpeg, image/png, image/gif, image/bmp, image/tiff" onchange="displayFileName('${wrapperLength}', this)">
        <div>
        <a href="javascript:;" onclick="$('#fileUpload${wrapperLength}').click()" class="btn btn-primary btnUpload">Upload</a>
        <span id="fileName${wrapperLength}" class="fileName">No File Uploaded</span>
        <a id="viewImg${wrapperLength}" href="javascript:;" class="btn" style="display:none;padding:6px;" onclick="showImg('${wrapperLength}')">
        <i class="fa fa-eye"></i>
        </a>
        <a id="deleteImg${wrapperLength}" href="javascript:;" class="btn" style="display:none;padding:6px;" onclick="deleteImg('${wrapperLength}')">
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

    function deleteImg(id) {
        $("#fileUpload"+id).val("");
        $("#fileName"+id).text("No File Uploaded");
        $("#storeFileData"+id).val("");
        $("#storeFileName"+id).val("");
        $("#storeFileSize"+id).val("");
        $("#storeFileType"+id).val("");
        $("#storeFileFlag"+id).val("");

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

    function displayFileName(id, n) {
        var dFileName = $("#fileName"+id);

        if (n.files && n.files[0]) {
            var filesize = n.files[0].size;
            if(filesize >  3000000){
                alert("Maximun upload size 3 MB");
                return;
            }
            var reader = new FileReader();
            reader.onload = function (e) {
                dFileName.text(n.files[0]["name"]);

                $("#storeFileData"+id).val(reader["result"]);
                $("#storeFileName"+id).val(n.files[0]["name"]);
                $("#storeFileSize"+id).val(n.files[0]["size"]);
                $("#storeFileType"+id).val(n.files[0]["type"]);
                $("#storeFileFlag"+id).val('1');

                $("#viewImg"+id).css('display', 'inline-block');
                $("#deleteImg"+id).css('display', 'inline-block');
            };

            reader.readAsDataURL(n.files[0]);
        }
    }

    function showImg(n) {
        $("#modalImg").attr('src', $("#storeFileData"+n).val());
        $("#showImage").modal();
    }


        function submitCallback(data, message) {
            if(data){
                $('#modalProcessing').modal('show');
                $.each(data, function (lang, val) {
                    var reqData2 = new FormData();

                    if(val.imgName){
                        // $('[name=storeVideoName]').val(reqData[lang]['image']);
                        var imagefiles = reqData[lang]['imgData'];//$('#uploadVideo')[0].files[0];
                        var block = imagefiles.split(";");
                        // Get the content type of the image
                        var contentType = block[0].split(":")[1];// In this case "image/gif"
                        // get the real base64 content of the file
                        var realData = block[1].split(",")[1];// In this case "R0lGODlhPQBEAPeoAJosM...."

                        // // Convert it to a blob to upload
                        var blob = b64toBlob(realData, contentType);
                        // $('[name=videoName]').val(data.company_video_name);
                        
                        reqData2.append('imageData', blob);
                        reqData2.append('image', val['imgName']);
                    }

                    $.ajax({
                        url: 'scripts/reqUploadCDN.php',
                        type: 'post',
                        data: reqData2,
                        contentType: false,
                        processData: false,
                        async: false,
                        success: function(data){
                            // console.log(data);
                            // return;
                            // var json = JSON.parse(data);
                            // console.log(data);
                            // if (json.status == 'ok') {
                            //     uploadVideoSuccess();
                            // }
                        },
                    });
                });

                $('#modalProcessing').modal('hide');

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
            showMessage('<?php echo $translations['A00446'][$language]; /* Successful added memo. */?>', 'success', '<?php echo $translations['A00447'][$language]; /* Add Memo */?>', 'upload', 'memo.php');
        }


    
    



    function buildCountry(data, message){
        if(data) {
            $.each(data.countryList, function(key, val) {
                var countryID = val['id'];
                var country   = val['name'];
                $('#countryName').append('<option value="' + countryID + '">' + country + '</option>');
                $('#excludeCountryName').append('<option value="' + countryID + '">' + country + '</option>');
            });
        }


        systemLang = data.systemLanguages;

        $("#fileUploadLang1").html(buildLangOption());

        $(".upload").change(function(){
            readURL(this);
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
    })

    $("#addExcludeUsernameBtn").click(function(){
        var text = $("#excludeLeaderUsername").val();

        if(text != ""){

            $("#addExcludeUsernameList").append('<div id="'+text+'" class="excludenameTag" style="background-color: #c5efc2; padding: 5px 10px; border-radius: 5px; margin-left: 10px; margin-right: 10px; margin-top: 10px;">'+text+' <i class="fa fa-times cancelUser" aria-hidden="true" style="margin-left: 10px;" value="'+text+'"></i></div>');


        }

        $("#excludeLeaderUsername").val("");
    })

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

</script>
</body>
</html>
