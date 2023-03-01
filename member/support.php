<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>

<?php
    if (in_array("Support", $_SESSION['blockedRights'])){
        header("Location: dashboard");
    }
?>

<section class="pageContent">
    <div class="kt-container">
        <div class="text-center">
            <div class="pageTitle">
                 <span data-lang="M00032"><?php echo $translations['M00032'][$language]; //Support ?></span>
            </div>
        </div>

        <div class="col-12">
            <div class="row justify-content-center">
                <div class="col-md-11 col-lg-10">
                    <div class="listingWrapper">

                        <div class="row">
                            <div class="col-lg-7 col-md-8 col-12">

                                <div class="form-group row mt-4">
                                    <label class="col-md-4" data-lang="M00064"><?php echo $translations['M00064'][$language]; //Subject ?> <span class="mustFill">*</span>
                                    </label>
                                    <div class="col-md-8 mt-md-0 mt-2">
                                        <input id="subject" type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row mt-4">
                                    <label class="col-md-4" data-lang="M00143"><?php echo $translations['M00143'][$language]; //Image ?></label>
                                    <div class="col-md-8 mt-md-0 mt-2">
                                        <div style="display: none">
                                            <input id="upload" type="file" accept="image/*" name="image">
                                        </div>
                                        <button class="btn btn-primary" type="button" data-lang="M00144" onclick="chooseFile();"><?php echo $translations['M00144'][$language]; //Choose File ?></button>
                                        <input class="supportImageName" id="fileName" name="image" disabled style="margin-left: 10px;">
                                        <div class="squareImage-modal-body border-b" align="center">
                                            <input id="trID" type="hidden" name="" value="">
                                            <input id="imgData" type="hidden" name="" value="">
                                            <input id="imgName" type="hidden" name="" value="">
                                            <input id="imgSize" type="hidden" name="" value="">
                                            <input id="imgType" type="hidden" name="" value="">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mt-4">
                                    <label class="col-md-4" data-lang="M00145"><?php echo $translations['M00145'][$language]; //Message ?> <span class="mustFill">*</span>
                                    </label>
                                    <div class="col-md-8 mt-md-0 mt-2">
                                        <textarea id="message" rows="5" type="text" class="form-control"></textarea>
                                    </div>
                                    
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4"></div>
                                    <div class="col mt-4">
                                        <button id="btnSend" type="button" class="btn btn-primary" data-lang="M00147"><?php echo $translations['M00147'][$language]; //Submit ?></button>
                                    </div>
                                </div>
                            </div>
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
    var reqData =  new FormData();

    var clientID ='<?php echo $_SESSION['userID']; ?>';

    $(document).ready(function() {

        function readURL(input) {
            if (input.files && input.files[0]) {

                if (input.files[0]["size"] < 5242880) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $("#imgData").empty().val(reader["result"]);
                        $("#imgName").empty().val(input.files[0]["name"]);
                        $("#imgSize").empty().val(input.files[0]["size"]);
                        $("#imgType").empty().val(input.files[0]["type"]);
                        $("#fileName").empty().val(input.files[0]["name"]);
                        $('#preivewUploaded').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                    $(".btnPreview").show();
                    $(".btnCancel").show();
                } else {
                    alert(`<?php echo $translations['M00153'][$language]; //(Maximum File Size: 5MB) ?>`);
                }
                
            }
        }


        $("#upload").change(function(){
            readURL(this);
        });
    });


    $('#btnSend').click(function() {
        var subject = $("#subject").val();
        var message = $("#message").val();

        $("input").each(function(){
            $(this).removeClass('is-invalid');
            $('.invalid-feedback').html("");
        });


        if (message == "" && subject == "")
            {
                errorDisplay("subject",`<?php echo $translations['E00825'][$language]; //Please Enter Your Subject. ?>`);
                errorDisplay("message",`<?php echo $translations['E00826'][$language]; //Please Enter Your Message. ?>`);
            }
            else if (subject == "")
            {
                $("#message").removeClass('is-invalid');
                errorDisplay("subject",`<?php echo $translations['E00825'][$language]; //Please Enter Your Subject. ?>`);
            }
            else if (message == "")
            {
                $("#subject").removeClass('is-invalid');
                errorDisplay("message",`<?php echo $translations['E00826'][$language]; //Please Enter Your Message. ?>`);
            }

        else{

            $('.customError').empty();

            var imageData = $('#imgData').val();
            var imageType = $('#imgType').val();
            var imageName = $('#imgName').val();

            if(imageData == ""){
                var imageFlag = 0;
            }else{
                var imageFlag = 1;
            }

            var uploadImage = [];
            uploadImage.push({
                imageType : imageType,
                imageName : imageName,
                imageFlag : imageFlag
            });

            reqData = [{
                imageData : imageData
            }];

            var formData  = {
                command: 'addTicket',
                subject: $('#subject').val(),
                message: $('#message').val(),
                uploadData : uploadImage,
                clientID : clientID,
                type: 'support'
            };
            var fCallback = submitCallback;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        }

    });

    function deleteImg() {
        $("#imgData").val("");
        $("#imgName").val("");
        $("#imgSize").val("");
        $("#imgType").val("");

        $(".btnPreview").hide();
        $(".btnCancel").hide();
        $("#fileName").val("");
    }

    function submitCallback(data, message) {

        if(data.uploadData){
            $('#modalProcessing').modal('show');
            var reqData2 = new FormData();

            var imagefiles = reqData[0].imageData;
            var block = imagefiles.split(";");
            var contentType = block[0].split(":")[1];
            var realData = block[1].split(",")[1];

            var blob = b64toBlob(realData, contentType);
            
            reqData2.append('imageData', blob);
            reqData2.append('image', data.uploadData.image_name);

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
                        sendCallback();
                    }, 1000);
                },
            });
        } else {
            sendCallback();
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


    function sendCallback(data, message) {
        showMessage(`<?php echo $translations['M00150'][$language]; //Successfully submitted. ?>`, 'success', `<?php echo $translations['M00032'][$language]; //Support ?>`, 'upload', 'inbox');
    }

    function chooseFile() {
        $("#upload").click();
    }
</script>