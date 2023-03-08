<script>
  var language = "<?php echo $language; ?>";
  // var translations = <?php echo json_encode($translations)?>;
</script>

<!-- begin::Global Config(global config for global JS sciprts) -->
<script>
	var KTAppOptions = {"colors":{"state":{"brand":"#374afb","light":"#ffffff","dark":"#282a3c","primary":"#5867dd","success":"#34bfa3","info":"#36a3f7","warning":"#ffb822","danger":"#fd3995"},"base":{"label":["#c5cbe3","#a1a8c3","#3d4465","#3e4466"],"shape":["#f0f3ff","#d9dffa","#afb4d4","#646c9a"]}}};
</script>

<!--begin:: Global Mandatory Vendors -->
<script src="vendors/general/jquery/dist/jquery.js" type="text/javascript"></script>
<script src="vendors/general/popper.js/dist/umd/popper.js" type="text/javascript"></script>
<script src="vendors/general/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script src="vendors/general/moment/min/moment.min.js" type="text/javascript"></script>
<script src="vendors/general/tooltip.js/dist/umd/tooltip.min.js" type="text/javascript"></script>
<script src="vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js" type="text/javascript"></script>
<script src="vendors/general/sticky-js/dist/sticky.min.js" type="text/javascript"></script>
<script src="js/croppie.js" type="text/javascript"></script>
<!--end:: Global Mandatory Vendors -->


<!-- Data Table -->
<script src="plugins/jquery-datatable/media/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="plugins/jquery-datatable/extensions/TableTools/js/dataTables.tableTools.min.js" type="text/javascript"></script>
<script src="plugins/jquery-datatable/media/js/dataTables.bootstrap.js" type="text/javascript"></script>
<script src="plugins/jquery-datatable/extensions/Bootstrap/jquery-datatable-bootstrap.js" type="text/javascript"></script>
<script type="text/javascript" src="plugins/datatables-responsive/js/datatables.responsive.js"></script>
<script type="text/javascript" src="plugins/datatables-responsive/js/lodash.min.js"></script>
<script src="plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
<script src="js/datatables.js" type="text/javascript"></script>
<script type="text/javascript" src="plugins/datatable/datatables.js"></script>
<script type="text/javascript" src="plugins/datatable/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="plugins/datatable/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="plugins/datatable/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="plugins/datatable/responsive.bootstrap.min.js"></script>
<!-- Data Table -->


<!--begin:: Standard Platform js -->

<script src="js/jquery.redirect.js" type="text/javascript"></script>
<script src="js/standardJS/general.js?v=<?php echo filemtime('js/standardJS/general.js'); ?>" type="text/javascript"></script>
<script src="js/standardJS/logout.js?v=<?php echo filemtime('js/standardJS/logout.js'); ?>" type="text/javascript"></script>
<script src="js/standardJS/search.js?v=<?php echo filemtime('js/standardJS/search.js'); ?>" type="text/javascript"></script>
<script src="js/standardJS/table.js?v=<?php echo filemtime('js/standardJS/table.js'); ?>" type="text/javascript"></script>
<script src="js/standardJS/tree.js?v=<?php echo filemtime('js/standardJS/tree.js'); ?>" type="text/javascript"></script>
<!--end:: Standard Platform js -->

<!--begin:: Global Optional Vendors -->
<script src="vendors/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="vendors/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<script src="vendors/general/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
<script src="vendors/general/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
<script src="vendors/general/select2/dist/js/select2.full.js" type="text/javascript"></script>
<script src="vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js" type="text/javascript"></script>
<script src="js/jquery.qrcode.js" type="text/javascript"></script>
<script src="js/performanceMonitoring.js?v=<?php echo filemtime('js/performanceMonitoring.js'); ?>"  type="text/javascript"></script>
<!--end:: Global Optional Vendors -->


<script src="js/aos.js" type="text/javascript"></script>

<script src="js/qr_packed.js"></script>

<!--begin::Global Theme Bundle(used by all pages) -->
<script src="js/vendors.min.js" type="text/javascript"></script>
<!--end::Global Theme Bundle -->
<script src="language/lang_<?php echo $language; ?>.js?v=<?php echo filemtime('language/lang_'.$language.'.js'); ?>"></script>

<?php include "headerjs.php" ?>

<script type="text/javascript">
  $(document).ready(function() {
    
    AOS.init();
    
    loadCoinRate();

    $(".sideBarItem").each(function(){
      if (this.href == window.location.href){
        $(this).addClass('active');
      }
    });

    $(".sideBarMenuDropdownItem").each(function(){
      if (this.href == window.location.href){
        $(this).addClass('active');
      }
    });

    $(".menuAddActive").each(function(){
      if (this.href == window.location.href){
        $(this).addClass('active');
      }
    });

    $(".subMenuAddActive").each(function(){
      if (this.href == window.location.href){
        $(this).addClass('active');
      }
    });

    $(".subMenuAddActive.active").each(function(){
      if (this.href == window.location.href){
        $(this).parent().parent().parent().addClass('active');
      }
    });


    $(".subSubMenuAddActive").each(function(){
      if (this.href == window.location.href){
        $(this).addClass('active');
      }
    });

    $(".subSubMenuAddActive.active").each(function(){
      if (this.href == window.location.href){
        $(this).parent().parent().parent().parent().parent().parent().addClass('active');
      }
    });

    $(".sideBarDropdown").click(function(){
      $(".sideBarDropdown").not(this).removeClass("open");
      if($(this).hasClass("open")){
        $(this).removeClass("open");
      }else{
        $(this).addClass("open");
      }
    });

    $(".menuIcon, .sideBarScreen").click(function() {
      if($(".sideBar").hasClass("open")){
        $(".sideBar").removeClass("open");
        $(".sideBarScreen").hide();
      }else{
        $(".sideBar").addClass("open");
        $(".sideBarScreen").show();
      }
    });

        $(".changeLanguage").click(function(){
          changeLanguage($(this).attr("language"));

        });

        $(".loginPageChangeLanguage").change(function(){
          changeLanguage($(this).val());
        });

        <?php
        $sessionTimeOut = isset($_SESSION['sessionTimeOut'])?$_SESSION['sessionTimeOut']:time();
        $sessionExpireTime = isset($_SESSION['sessionExpireTime'])?$_SESSION['sessionExpireTime']:0;
        $decimalPlaces = isset($_SESSION['decimalPlaces'])?$_SESSION['decimalPlaces']:0;
        ?>

        window.ajaxEnabled = true;

        var pageName = "<?php echo basename($_SERVER['PHP_SELF']);?>";
        if((pageName == 'login.php') || (pageName == 'accessDenied.php') || (pageName == 'publicRegistration.php') || (pageName == 'publicRegistrationConfirmation.php') || (pageName == 'survey.php') || (pageName == 'publicRegistrationSuccess.php') || (pageName == 'resetPassword.php') || (pageName == 'resetPasswordVerification.php') || (pageName == 'resetPasswordSuccess.php'))
          return true;
        
        if ((pageName == 'landingPage.php') || (pageName == 'homepage.php') || (pageName == 'ourServices.php') || (pageName == 'aboutUs.php') || (pageName == 'missionVision.php') || (pageName == 'historicalBackground.php') || (pageName == 'jointComputationalVantageEcosystem.php') || (pageName == 'contactUs.php'))
          window.location.href = '/login';

        <?php
        $sessionID = isset($_SESSION["sessionID"])?:'';
        ?>

        var sessionID = "<?php echo $sessionID;?>";

        if(sessionID == '') {
            // No access token, thus don't allow to call backend
            window.ajaxEnabled = false;
            showMessage('<?php echo $translations['M00139'][$language]; //You don’t have permission to access. ?>', 'error', '<?php echo $translations['M00116'][$language]; //Access Denied ?>', '', 'login');
            return true;
          }

          formData  = {
              command : "getDocumentAnnouncementUnreadMessage",
              type : "announcementRead"
          };
          fCallback = listUnreadNews;
          ajaxSend("scripts/reqDefault.php", formData, "POST", fCallback, debug, bypassBlocking, bypassLoading, 0);

          var getNewData  = {
              command   : "getInboxUnreadMessage"
            };
          $.ajax({
                      type     : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                      url      : 'scripts/reqDefault.php', // the url where we want to POST
                      data     : getNewData, // our data object
                      dataType : 'text', // what type of data do we expect back from the server
                      encode   : true
                  })
          .done(function(data) {
            var obj = JSON.parse(data);
            if (obj.data.inboxUnreadMessage) {
              $(".unreadMsg").show();
            } else {
               $(".unreadMsg").hide();
            }
          });

          
          formData  = {
              command : "getNavBarDetails"
          };
          fCallback = getNavBarDetails;
          ajaxSend("scripts/reqDefault.php", formData, "POST", fCallback, debug, bypassBlocking, bypassLoading, 0);



          var currentTime = "<?php echo time();?>";
          var sessionTimeOut = "<?php echo $sessionTimeOut;?>";
          var sessionExpireTime = "<?php echo $sessionExpireTime;?>";

          setTimeout(function(){
            $.ajax({
              type: 'POST',
              url: 'scripts/reqLogin.php',
              data: {type : "logout"},
              success : function(result) {
              },
              error : function(result) {
              }
            });
            errorHandler(3, '<?php echo $translations['M00234'][$language]; //Your session had timed out due to inactivity. ?>');
            window.ajaxEnabled = false;
          }, sessionExpireTime*1000);

          if((currentTime - sessionTimeOut) > sessionExpireTime) {
            $.ajax({
              type: 'POST',
              url: 'scripts/reqLogin.php',
              data: {type : "logout"},
              success	: function(result) {
              },
              error	: function(result) {
              }
            });
            errorHandler(3, '<?php echo $translations['M00234'][$language]; //Your session had timed out due to inactivity. ?>');
            window.ajaxEnabled = false;
          }
          else {
            <?php $_SESSION["sessionTimeOut"] = time(); //Reset session ?>
          }

          getTs();

          if((pageName == 'dashboard.php') || (pageName == 'packageRegistration.php') || (pageName == 'repurchasePackage.php')){
            if ( $(window).width() >= 1200 ) {
              const slider = document.querySelector('.items');

              if(slider) {
                let isDown = false;
                let startX;
                let scrollLeft;
                slider.addEventListener('mousedown', (e) => {
                  isDown = true;
                  slider.classList.add('active');
                  startX = e.pageX - slider.offsetLeft;
                  scrollLeft = slider.scrollLeft;
                });
                slider.addEventListener('mouseleave', () => {
                  isDown = false;
                  slider.classList.remove('active');
                });
                slider.addEventListener('mouseup', () => {
                  isDown = false;
                  slider.classList.remove('active');
                });
                slider.addEventListener('mousemove', (e) => {
                    if(!isDown) return;
                    e.preventDefault();
                    const x = e.pageX - slider.offsetLeft;
                    const walk = (x - startX) * 3; //scroll-fast
                    slider.scrollLeft = scrollLeft - walk;
                });
              }
            }
          }

          $('.eyeIcon').click(function(){
                 
            if($(this).hasClass('fa-eye-slash')){    
              $(this).removeClass('fa-eye-slash');   
              $(this).addClass('fa-eye');
              
              $(this).parent().find('input').attr('type','password');
                
            }else{
             
              $(this).removeClass('fa-eye');    
              $(this).addClass('fa-eye-slash');

              $(this).parent().find('input').attr('type','text');
            }
          });
        
          $('.showContractSub').click(function() {
            $('.contractSubMenu').addClass('active');
            $('.packageSubMenu').removeClass('active');
          })

          $('.showPackageSub').click(function() {
            $('.contractSubMenu').removeClass('active');
            $('.packageSubMenu').addClass('active');
          })
        });

  
  function getNavBarDetails(data, message) {
    if(data.isChinaLine && data.isChinaLine == 1) {
      $('#campaignDividendReport').hide()
    }

    // if(data.rankDetails && data.rankDetails.rankDisplay){
    //   var rankDisplayCode = data.rankDetails.rankDisplay;
    //   var rankDisplay = translations[rankDisplayCode][language];
    //   $('#sidebarRankDisplay').text(rankDisplay);
    // }
    
    // if (data.memberKycStatus == "New") {
    //   $('#noticeKYC').show();
    //   $('#kycMsg').html('<?php echo $translations['M00032'][$language]; //You haven't set KYC information. ?>');
    // } else if (data.memberKycStatus == "Waiting Approval") {
    //   $('#noticeKYC').show();
    //   $('#kycMsg').html('<?php echo $translations['M00041'][$language]; //Pending: Your KYC information are pending to be verified. ?>');
    // } else if (data.memberKycStatus == "Rejected") {
    //   $('#noticeKYC').show();
    //   $('#kycMsg').html('<?php echo $translations['M00042'][$language]; //Rejected: Your KYC information failed to be verified. ?>');
    // } else {
    //   $('#noticeKYC').hide();
    // }


    // if (data.walletAddressTab == 1) {
    //   $('.walletAddressDisplay').show();
    // } else {
    //   $('.walletAddressDisplay').hide();
    // }
    
  }

  function listUnreadNews(data, message) {
    if (data) {
      if (data.unreadMessage > 0) {
        $(".unreadNews").show();
      }
    }
    
  }

	 function getTs(){
           var url = "scripts/reqDefault.php";
           var val  =  "";
           val  =  {"command" : "getTs"
                   };
           $.ajax({
              url: url,
              type: "POST",
              data: val,

              success: function(result){
               var json = JSON.parse(result);
               serverTimeZone = json.serverTimeZone;
               ts = json.currentTime;
               // console.log(ts);
               window.onload = display_ct(ts); // Display date time at the top nav bar
              },
          });
       }
       

      function display_c(){
          var refresh=1000; // Refresh rate in milli seconds
          mytime=setTimeout('display_ct()',refresh);
      }

      function display_ct() {
          var currentDT = "";

          var days = new Array('<?php echo $translations['M00118'][$language]; //Sunday ?>', '<?php echo $translations['M00119'][$language]; //Monday ?>', '<?php echo $translations['M00120'][$language]; //Tuesday ?>', '<?php echo $translations['M00121'][$language]; //Wednesday ?>', '<?php echo $translations['M00122'][$language]; //Thursday ?>', '<?php echo $translations['M00123'][$language]; //Friday ?>', '<?php echo $translations['M00124'][$language]; //Saturday ?>');
       

          var months = new Array("<?php echo $translations['M00125'][$language]; //January ?>", "<?php echo $translations['M00126'][$language]; //February ?>", "<?php echo $translations['M00127'][$language]; //March ?>", "<?php echo $translations['M00128'][$language]; //April ?>", "<?php echo $translations['M00129'][$language]; //May ?>", "<?php echo $translations['M00130'][$language]; //June ?>", "<?php echo $translations['M00131'][$language]; //July ?>", "<?php echo $translations['M00132'][$language]; //August ?>", "<?php echo $translations['M00133'][$language]; //September ?>", "<?php echo $translations['M00134'][$language]; //October ?>", "<?php echo $translations['M00135'][$language]; //November ?>", "<?php echo $translations['M00136'][$language]; //December ?>");

          var now = new Date();
          
          var tzDifference = now.getTimezoneOffset();
          var offsetTime = new Date(ts*1000 + tzDifference * 60 * 1000 + serverTimeZone*1000);
          
          var hour=offsetTime.getHours();
          var minute=offsetTime.getMinutes();
          var second=offsetTime.getSeconds();
          if(hour <10 ){hour='0'+hour;}
          if(minute <10 ) {minute='0' + minute; }
          if(second<10){second='0' + second;}

          currentDT += days[offsetTime.getDay()] + ", " + offsetTime.getDate() + " " + months[offsetTime.getMonth()] + " " + offsetTime.getFullYear() + " - " + hour +":" + minute + ":" + second;
          $('.currentTime').text(currentDT);
          ts++;
          tt=display_c();
      }

    function changeLanguage(language) {
      var url = 'scripts/reqLogin.php';
      var method = 'POST';
      var debug = 0;
      var bypassBlocking = 0;
      var bypassLoading = 0;
      var fCallback = reloadPage;
      var formData = {command: 'setLanguage', language : language};

      ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function reloadPage() {
      location.reload();
    }

    $("#openQRModal").click(function () {
      $(".copiedMsg").hide();
      $("#qr_modal").modal();
    })

    function copyQR() {
      /* Get the text field */
      var copyText = document.getElementById("qrInput");

      /* Select the text field */
      copyText.select();
      copyText.setSelectionRange(0, 99999); /*For mobile devices*/

      /* Copy the text inside the text field */
      document.execCommand("copy");

      /* Alert the copied text */
      // alert("Copied QR Link: " + copyText.value);
      $(".copiedMsg").show();
    }

    function loadCoinRate(){
      var url             = 'coinRateData/coinRate.xml';
      var method          = 'GET';
      var formData  = {};
      var leaderIDRate = $('#leaderIDRate').val();

      $.ajax({
        type : method,
        url : url,
        data : formData,
        dataType : 'xml',
        encode : true
      })
      .done(function(data){

        $(data).find('Data').each(function(){
              var coinRateName = $(this).find('name').text();
              var coinRateValue = $(this).find('value').text();


              if (coinRateName=="coalculus") {
                $(".coalCoinRate").text(currencyFormat(parseFloat(coinRateValue),3)+" COAL");
              }else if (coinRateName=="infireum") {
                $(".IFRCoinRate").text(currencyFormat(parseFloat(coinRateValue),3)+" IFR");
              }
        });

      });
    }

var text = "<?php echo $qrCodeRegistrationUrl; ?>"
$('#qrInput').val(text);
$('#qrcode').qrcode({

  render: "canvas",
  text: "<?php echo $qrCodeRegistrationUrl; ?>",
  width: 200,
  height: 200,
  background: "#ffffff",
  foreground: "#000000",
  src: '',
  imgWidth: 40,
  imgHeight: 40
});

var position = $(window).scrollTop(); // should start at 0
$(window).scroll(function() {
  var scroll = $(window).scrollTop();
  if (scroll > position) {
    $('#kt_header_mobile').removeClass('header-mobile');
    $('#mobile_fix').removeClass('header-mobile');
    
  } else if ($(window).scrollTop() > 400 ) {
     $('#kt_header_mobile').addClass('header-mobile');
    $('#mobile_fix').addClass('header-mobile');
  }
  position = scroll;
});


function shareFacebook(id) {
  var getUrl = $("#"+id).val();

  window.open("https://www.facebook.com/sharer/sharer.php?u="+encodeURIComponent(getUrl));
}
function shareTwitter(id) {
  var getUrl = $("#"+id).val();

  window.open("https://twitter.com/intent/tweet?url="+encodeURIComponent(getUrl)+"&text=Check out my registration url");
}

function shareWhatsapp(id) {
  var getUrl = $("#"+id).val();
  // window.location="whatsapp://send?text=Check out my registration url: "+encodeURIComponent(getUrl);
  window.open("https://api.whatsapp.com/send?text=Check out my registration url: "+encodeURIComponent(getUrl));
  
}

function shareWeibo(id) {
  var getUrl = $("#"+id).val();
  window.open("http://service.weibo.com/share/share.php?url="+encodeURIComponent(getUrl)+"&appkey=&title=Check out my registration URL: &pic=&ralateUid=&language=zh_cn");
}

function shareTelegram(id) {
  var getUrl = $("#"+id).val();
  window.open("https://t.me/share/url?text=Please check out my registration URL&url="+encodeURIComponent(getUrl));
}


$('.eyeIcon3').click(function(){
                 
            if($(this).hasClass('fa-eye-slash')){    
              $(this).removeClass('fa-eye-slash');   
              $(this).addClass('fa-eye');
              
              $(this).parent().find('input').attr('type','password');
                
            }else{
             
              $(this).removeClass('fa-eye');    
              $(this).addClass('fa-eye-slash');

              $(this).parent().find('input').attr('type','text');
            }
          });

$(document).on('click','.eyeIco', function(){
  if($(this).hasClass('fa-eye-slash')){    
    $(this).removeClass('fa-eye-slash');   
    $(this).addClass('fa-eye');

    $('input#password').attr('type', 'password');
      
  }else{
   
    $(this).removeClass('fa-eye');    
    $(this).addClass('fa-eye-slash');

    $('input#password').attr('type', 'text');
  }
});

function showSidebar(){        
  $('.mobileSidebar').addClass('open');
}

function hideSidebar(){        
  $('.mobileSidebar').removeClass('open');
}

$('.showDropdown').click(function(){
  $(".showDropdown").not(this).removeClass("open");
  if($(this).hasClass("open")){
    $(this).removeClass("open");
  }else{
    $(this).addClass("open");
  }
});

function stayTuned() {
  $('#stayTuned').modal('show');
}

</script>
