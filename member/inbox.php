<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>

<?php
    if (in_array("Inbox", $_SESSION['blockedRights'])){
        header("Location: dashboard");
    }
?>

<section class="pageContent dbPaddingX">
    <div class="kt-container">
        <div class="text-center">
            <div class="pageTitle">
                 <span data-lang="M00031"><?php echo $translations['M00031'][$language]; //Inbox ?></span>
            </div>
        </div>
        
        <div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app">
            <button class="kt-app__aside-close" id="kt_chat_aside_close">
                <i class="la la-close"></i>
            </button>
            <div class="kt-grid__item kt-app__toggle kt-app__aside kt-app__aside--lg kt-app__aside--fit" id="kt_chat_aside" style="opacity: 1;">
                <div class="kt-portlet kt-portlet--last" style="box-shadow: 0 2px 4px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12)!important;min-height: 100%;">
                    <div class="kt-portlet__body inboxList">

                        <div class="kt-widget kt-widget--users">
                            <div class="kt-scroll ps ps--active-y scrolbarColor" style="max-height: 500px;overflow: auto!important;">
                                <div class="kt-widget__items kt-scroll ps ps--active-y" id="inboxList"></div>


                                <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="kt-grid__item kt-grid__item--fluid kt-app__content" id="kt_chat_content">
                <div class="kt-chat" style="height:100%;">
                    <div class="kt-portlet kt-portlet--head-lg kt-portlet--last" style="box-shadow: 0 2px 4px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12)!important;height:100%;">
                        <div class="kt-portlet__head" style="flex-grow: 0!important;">
                            <div class="kt-chat__head ">
                                <div class="kt-chat__left">
                                    <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md kt-hidden-desktop" id="kt_chat_aside_mobile_toggle">
                                        <i class="flaticon2-open-text-book"></i>
                                    </button>
                                </div>

                                <div class="kt-chat__center">
                                    <div class="kt-chat__label">
                                        <span class="kt-chat__title text-center" id="titleName"></span>
                                    </div>

                                </div>

                                <div class="kt-chat__right">
                                </div>
                            </div>
                        </div>

                        <div class="kt-portlet__body" style="overflow-y: auto; max-height: 300px;">
                            <div id="inboxDIV" class="kt-scroll kt-scroll--pull ps ps--active-y" data-mobile-height="300" style="min-height: 250px; overflow-y: auto;">
                                <div class="kt-chat__messages" id="inboxMessages"></div>
                                <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                </div>
                            </div>
                        </div>

                        <div class="kt-portlet__foot" id="replyDiv" style="display:none;">
                                <div class="kt-chat__input">
                                    <div class="kt-chat__editor">
                                        <textarea style="" rows="3" placeholder="<?php echo $translations['M00151'][$language]; //Type here... ?>" id="inputMessage"></textarea>
                                    </div>
                                    <div class="kt-chat__toolbar">
                                        <div class="kt_chat__tools">
                                            <input type='file' id="fileUpload" style="display: none;" onchange="readURL(this)">

                                            <button type="button" class="btn btnUpload" onclick="$('#fileUpload').click()">
                                                <i class="flaticon2-photograph"></i>
                                            </button>


                                            <button type="button" class="btn btnCancel" style="display: none;" onclick="deleteImg()">
                                                <i class="fa fa-times" aria-hidden="true"></i>
                                            </button>
                                            <button data-toggle="modal" data-target="#previewImg" type="button" class="btn btnPreview" style="display: none;">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </button>
                                            <span id="imgFileName"></span>

                                            <div class="squareImage-modal-body border-b" align="center">
                                                <input id="trID" type="hidden" name="" value="">
                                                <input id="imgData" type="hidden" value="">
                                                <input id="imgName" type="hidden" value="">
                                                <input id="imgSize" type="hidden" value="">
                                                <input id="imgType" type="hidden" value="">
                                            </div>
                                        </div>
                                        <div class="kt_chat__actions">
                                            <button type="button" id="btnSend" value="" class="btn btn-primary" data-lang="M00152" onclick="sendMessage(this)"><?php echo $translations['M00152'][$language]; //Reply ?></button>
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
    "use strict";
    var KTAppChat = function () {
        var chatAsideEl;
        var chatContentEl;

        var initAside = function () {
            var offcanvas = new KTOffcanvas(chatAsideEl, {
                overlay: true,
                baseClass: 'kt-app__aside',
                closeBy: 'kt_chat_aside_close',
                toggleBy: 'kt_chat_aside_mobile_toggle'
            });

        }

        return {
            init: function() {
                chatAsideEl = KTUtil.getByID('kt_chat_aside');

                initAside();

                KTChat.setup(KTUtil.getByID('kt_chat_content'));
            }
        };
    }();

    KTUtil.ready(function() {
        KTAppChat.init();
    });


    var url             = 'scripts/reqDefault.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var clientID ='<?php echo $_SESSION['userID']; ?>';
    var id;
    var reqData =  new FormData();

    $(document).ready(function(){
        var formData  = {
            command: 'getInboxListing',
            clientID : clientID
        };
        var fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            if (input.files[0]["size"] < 5242880) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $("#imgData").val(reader["result"]);
                    $("#imgName").val(input.files[0]["name"]);
                    $("#imgSize").val(input.files[0]["size"]);
                    $("#imgType").val(input.files[0]["type"]);

                    $('#preivewUploaded').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
                $(".btnPreview").show();
                $(".btnCancel").show();
                $("#imgFileName").html(input.files[0]["name"]);
            } else {
                alert(`<p data-lang='M00153'><?php echo $translations['M00153'][$language]; //(Maximum File Size: 5MB) ?></p>`);
            }
            
        }
    }

    function deleteImg() {
        $("#imgData").val("");
        $("#imgName").val("");
        $("#imgSize").val("");
        $("#imgType").val("");

        $(".btnPreview").hide();
        $(".btnCancel").hide();
        $("#imgFileName").html("");
        KTAppChat.init();
    }


    function loadDefaultListing(data, message, object) {

        var imageData = $('#imgData').val("");
        var imageType = $('#imgType').val("");
        var imageName = $('#imgName').val("");
        $("#imgFileName").html("");
        $(".btnPreview").hide();
        $(".btnCancel").hide();

        $(".inboxNotification").hide();

        var inboxList = data.inboxListing;
        var message = object.statusMsg;
        var inboxListDetails = '';
        if(inboxList)
        {
            $.each(inboxList, function(key,value){

                inboxListDetails+='<a class="kt-widget__item inboxChatList" style="cursor: pointer;" id="'+value['id']+'" name="'+value['subject']+'" onclick="inboxClick(this)">';
                inboxListDetails+='   <div class="kt-widget__info">';
                inboxListDetails+='     <div class="kt-widget__section">';
                inboxListDetails+='       <span class="kt-widget__username">'+value['subject']+'</span>';
                inboxListDetails+='     </div>';
                inboxListDetails+='     <span class="kt-widget__desc">';
                if (value['lastMessage'] == "") {
                    inboxListDetails+='';
                }else{
                    inboxListDetails+=         value['lastMessage']+` <?php echo $translations['M02119'][$language]; ?> `+value['lastSender'];
                }
                inboxListDetails+='     </span>';
                inboxListDetails+='    </div>';
                inboxListDetails+='    <div class="kt-widget__action">';
                inboxListDetails+='    <span class="kt-widget__date">'+value['time_different']+'</span>';

                if (value['unreadMessage'] > 0) {
                    inboxListDetails+='    <div class="msgNumber">'+value['unreadMessage']+'</div>';
                }

                inboxListDetails+='   </div>';
                inboxListDetails+='</a> ';
            });
            $("#inboxList").empty().append(inboxListDetails);
            $('.inboxChatList').removeClass('active');
            $('.inboxChatList#'+id).addClass('active');
        }else{
            inboxListDetails+='<a class="kt-widget__item inboxChatList">';
            inboxListDetails+='   <div class="kt-widget__info">';
            inboxListDetails+='     <div class="kt-widget__section">';
            inboxListDetails+='       <span class="kt-widget__username"></span>';
            inboxListDetails+='     </div>';
            inboxListDetails+='     <span class="kt-widget__desc" style="text-transform: uppercase;">';
            inboxListDetails+=        message;
            inboxListDetails+='     </span>';
            inboxListDetails+='    </div>';
            inboxListDetails+='    <div class="kt-widget__action">';
            inboxListDetails+='    <span class="kt-widget__date"></span>';
            inboxListDetails+='    <span class="kt-badge kt-badge--success kt-font-bold" style="background:#6f7071;">0</span>';
            inboxListDetails+='   </div>';
            inboxListDetails+='</a> ';
            $("#inboxList").empty().append(inboxListDetails);
            $("#titleName").append(`<p class="m-0" style="color: #74788d; font-weight: 500;" data-lang="M02084"><?php echo $translations['M02084'][$language]; //Contact us if you have any queries ?></p>`);
            // $("#inboxMessages").html('<img src="images/qtn/emailIcon.png" style="width:40%;left:30%;position:absolute;opacity:0.6;" alt="">');
        }
    }

    function inboxClick(element) {
        $('.inboxChatList').removeClass('active');
        $('.inboxChatList#'+element.id).addClass('active');

        $('#btnSend').attr('value', element.id);
        var titleName = element.name;

        var formData  = {
            command: 'getInboxMessages',
            inboxID: element.id,
            clientID : clientID
        };
        var fCallback = inboxMessages;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $("#titleName").html(titleName);
        $('#inboxMessages').empty();
    }

    function inboxMessages(data,message) {
        $('#replyDiv').show();
        var message = data.messages;
        var inboxMessage = "";

        if(message)
        {
            $.each(message, function(key,value){
                if(value['message_type'] == "image/text"  || value['message_type'] == "image"){
                    if(value['person'] != `<?php echo $translations['M00425'][$language]; ?>`){
                        inboxMessage+='     <div class="kt-chat__message">';
                    }else{
                        inboxMessage+='     <div class="kt-chat__message kt-chat__message--right">';
                    }
                    inboxMessage+='       <div class="kt-chat__user">';
                    if(value['person'] == `<?php echo $translations['M00425'][$language]; ?>`){
                        inboxMessage+=`         <span href="#" class="kt-chat__username" data-lang="M02118"><?php echo $translations['M02118'][$language]; ?></span>`;
                    }else{
                        inboxMessage+='         <span href="#" class="kt-chat__username">'+value['person']+'</span>';
                    }
                    inboxMessage+='         <span class="kt-chat__datetime">'+value['datetime']+'</span>';
                    inboxMessage+='       </div>';
                    if(value['person'] != `<?php echo $translations['M00425'][$language]; ?>`){
                        inboxMessage+='       <div class="kt-chat__text kt-bg-light-success">';
                    }else{
                        inboxMessage+='       <div class="kt-chat__text kt-bg-light-brand">';
                    }
                    inboxMessage+='         <img src="<?php echo $config['tempMediaUrl'] ?>'+value['base64Image']+'" alt="" style="width:100%;">';
                    inboxMessage+='       </div>';
                    inboxMessage+='     </div>';
                }

                if(value['message'] != ""){
                    if(value['person'] != `<?php echo $translations['M00425'][$language]; ?>`){
                        inboxMessage+='     <div class="kt-chat__message">';
                    }else{
                        inboxMessage+='     <div class="kt-chat__message kt-chat__message--right">';
                    }
                    inboxMessage+='       <div class="kt-chat__user">';
                    if(value['person'] == `<?php echo $translations['M00425'][$language]; ?>`){
                        inboxMessage+=`         <span href="#" class="kt-chat__username" data-lang="M02118"><?php echo $translations['M02118'][$language]; ?></span>`;
                    }else{
                        inboxMessage+='         <span href="#" class="kt-chat__username">'+value['person']+'</span>';
                    }
                    inboxMessage+='         <span class="kt-chat__datetime">'+value['datetime']+'</span>';
                    inboxMessage+='       </div>';
                    if(value['person'] == `<?php echo $translations['M00425'][$language]; ?>`){
                        inboxMessage+='       <div class="kt-chat__text kt-bg-light-success">';
                    }else{
                        inboxMessage+='       <div class="kt-chat__text kt-bg-light-brand">';
                    }
                    inboxMessage+=            value['message'];
                    inboxMessage+='       </div>';
                    inboxMessage+='     </div>';
                }
            });
        }
        $('#inboxMessages').html(inboxMessage);
        $('#inboxDIV').scrollTop(0);
        $("#inboxDIV").animate({ scrollTop: $('#inboxDIV').prop("scrollHeight")}, 1000);
    }

    function sendMessage(element) {
        $('.inboxChatList').removeClass('active');
        $('.inboxChatList#'+element.id).addClass('active');
        if(element.value) {
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
                command: 'addInboxMessages',
                message: $('#inputMessage').val(),
                inboxID: element.value,
                clientID : clientID,
                uploadData : uploadImage,
            };
            var fCallback = sendMessageStatus;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }
    }

    function sendMessageStatus(data,message) {
        if(data.uploadData){
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
                success: function(data){},
            });
        } 


        id = data.inboxID;

        if(data.inboxID)
        {
            var formData  = {
                command: 'getInboxMessages',
                inboxID: data.inboxID,
                clientID : clientID
            };
            var fCallback = inboxMessages;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }
        $("#inputMessage").val("");

        var formData  = {
            command: 'getInboxListing',
            clientID : clientID
        };
        var fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
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
</script>