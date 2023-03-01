<script>
    var language = "<?php echo $language; ?>";
    var translations = <?php echo json_encode($translations); ?>;
</script>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script> 
<script src="js/detect.js"></script>
<script src="js/fastclick.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.blockUI.js"></script>
<script src="js/waves.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<script src="js/jquery.scrollTo.min.js"></script>

<!-- Datatables-->
<!--
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.js"></script>
<script src="plugins/datatables/dataTables.buttons.min.js"></script>
<script src="plugins/datatables/buttons.bootstrap.min.js"></script>
<script src="plugins/datatables/jszip.min.js"></script>
<script src="plugins/datatables/pdfmake.min.js"></script>
<script src="plugins/datatables/vfs_fonts.js"></script>
<script src="plugins/datatables/buttons.html5.min.js"></script>
<script src="plugins/datatables/buttons.print.min.js"></script>
<script src="plugins/datatables/dataTables.fixedHeader.min.js"></script>
<script src="plugins/datatables/dataTables.keyTable.min.js"></script>
<script src="plugins/datatables/dataTables.responsive.min.js"></script>
<script src="plugins/datatables/responsive.bootstrap.min.js"></script>
<script src="plugins/datatables/dataTables.scroller.min.js"></script>
-->

<!-- Datatable init js -->
<!--<script src="pages/datatables.init.js"></script>-->

<!-- App js -->
<script src="js/jquery.core.js"></script>
<script src="js/jquery.app.js"></script>
<script src="js/jquery.redirect.js"></script>

<!-- Plugins Js -->
<script src="plugins/switchery/switchery.min.js"></script>
<script src="plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<script type="text/javascript" src="plugins/multiselect/js/jquery.multi-select.js"></script>
<script type="text/javascript" src="plugins/jquery-quicksearch/jquery.quicksearch.js"></script>
<script src="plugins/select2/dist/js/select2.min.js" type="text/javascript"></script>
<script src="plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
<script src="plugins/bootstrap-inputmask/bootstrap-inputmask.min.js" type="text/javascript"></script>
<script src="plugins/moment/moment.js"></script>
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="plugins/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<script src="plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>

<!-- Validation js (Parsleyjs) -->
<script type="text/javascript" src="js/parsley.js-2.8.0/dist/parsley.min.js"></script>
<script type="text/javascript" src="js/parsley.js-2.8.0/src/extra/validator/comparison.js"></script>
<script type="text/javascript" src="js/parsley.js-2.8.0/dist/i18n/en.js"></script>
<script type="text/javascript">window.Parsley.setLocale('en');</script>

<!-- T2ii custom standard js -->
<script src="js/logout.js"></script>
<script src="js/search.js"></script>
<!-- <script src="js/general.js"></script> -->
<?php echo '<script src="js/general.js?ts='.time().'"></script>'; ?>
<?php echo '<script src="js/table.js?ts='.time().'"></script>'; ?>
<!-- Build Tree js -->
<?php echo '<script src="js/tree.js?ts='.time().'"></script>'; ?>
<!-- Build export excel file -->
<script src="js/xlsx.core.min.js"></script>
<script src="js/FileSaver.js"></script>
<script src="js/tableexport.js"></script>

<script>
        // Date Picker
//            jQuery('#datepicker').datepicker();
//            jQuery('#datepicker-autoclose').datepicker({
//                autoclose: true,
//                todayHighlight: true
//            });
//            jQuery('#datepicker-inline').datepicker();
//            jQuery('#datepicker-multiple-date').datepicker({
//                format: "mm/dd/yyyy",
//                clearBtn: true,
//                multidate: true,
//                multidateSeparator: ","
//            });
//            jQuery('#date-range').datepicker({
//                toggleActive: true
//            });

            // Time Picker
            jQuery('#timepicker').timepicker({
                defaultTIme : false
            });
            jQuery('#timepicker2').timepicker({
                defaultTIme : false
//                showMeridian : false
            });
            jQuery('#timepicker3').timepicker({
                minuteStep : 15
            });
</script>

<script type="text/javascript">
    $(document).ready(function() {

        // table drag

         var mx = 0;

         $(".table-responsive").on({
              mousemove: function(e) {
                var mx2 = e.pageX - this.offsetLeft;
                if(mx) this.scrollLeft = this.sx + mx - mx2;
            },
            mousedown: function(e) {
                this.sx = this.scrollLeft;
                mx = e.pageX - this.offsetLeft;
            }
        });

        // $('#searchForm').keypress(function(e){
        //     if(e.which == 13){//Enter key pressed
        //         $('#searchBtn').click();//Trigger enter button click event
        //     }
        // });

        $(document).on("mouseup", function(){
            mx = 0;
        });

        // Dashboard top menu bar and Side site - change language
        $(".changeLanguage").click(function(){
            changeLanguage($(this).attr("language"));
            
        });
        // Login Page and set password page - change language
        $(".loginPageChangeLanguage").change(function(){
            changeLanguage($(this).val());
        });
        
        <?php
            $sessionTimeOut = isset($_SESSION['sessionTimeOut'])?$_SESSION['sessionTimeOut']:time();
            $sessionExpireTime = isset($_SESSION['sessionExpireTime'])?$_SESSION['sessionExpireTime']:0;
        ?>
        
        window.ajaxEnabled = true;
        
        var pageName = "<?php echo basename($_SERVER['PHP_SELF']);?>";
        if((pageName == 'pageLogin.php') || (pageName == 'accessDenied.php'))
            return true;
        
        var currentTime = "<?php echo time();?>";
        var sessionTimeOut = "<?php echo $sessionTimeOut;?>";
        var sessionExpireTime = "<?php echo $sessionExpireTime;?>";
        
        if((currentTime - sessionTimeOut) > sessionExpireTime) {
            $.ajax({
                type: 'POST',
                url: 'scripts/reqLogin.php',
                data: {type : "logout"},
                success	: function(result) {
                },
                error	: function(result) {
                    alert("Error!");
                }
            });
            errorHandler(3, 'Session expired.');
            window.ajaxEnabled = false;
        }
        else {
            <?php $_SESSION["sessionTimeOut"] = time(); //Reset session ?>
        }
    });

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


    $(document).ready(function() {
        // alert(1);
        var s = $("#sessionIDBox").val();

        if(s != ""){
            // alert(1);
            formData  = {
                command : "getInboxUnreadMessage"
            };
            fCallback = listUnreadMessage;
            // console.log(formData);
            ajaxSend("scripts/reqAdmin.php", formData, "POST", fCallback, debug, bypassBlocking, bypassLoading, 0);


            var formData2  = {
                command : "getWithdrawalUnreadCount"
            };
            var fCallback2 = listWithdrawalUnreadMessage;
            // console.log(formData);
            ajaxSend("scripts/reqAdmin.php", formData2, "POST", fCallback2, debug, bypassBlocking, bypassLoading, 0);
        }
            
    });

    function listUnreadMessage(data, message){
        // alert(2);
    };

    function listWithdrawalUnreadMessage(data, message){
        // alert(2);
    };

    function decimalWithoutRoundSpecial(number) {
        if (!number) 
            return '-';

        if(isNaN(number) || number == '')
            return number;
        
        number = parseFloat(number);

        number = number.toString().match(/^-?\d+(?:\.\d{0,2})?/)[0];
        return number;
    }

    function decimalWithoutRoundSpecialZero(number) {
        if (!number) 
            return '0';

        if(isNaN(number) || number == '')
            return number;
        
        number = parseFloat(number);

        number = number.toString().match(/^-?\d+(?:\.\d{0,2})?/)[0];
        return number;
    }

    // function addCormer(number) {
    //     var parts = number.toString().split(".");
    //     parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    //     return parts.join(".");
    // }
    function addCormer(number, decimal) {
        if(decimal || decimal == 0) {
            number = parseFloat(number).toFixed(decimal);
        }

        if (!number) 
            return '0';

        if(isNaN(number) || number == '')
            return number;

        var parts = number.toString().split(".");
        parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        return parts.join(".");
    }

    function fixedNonDecimal(number, decimal){
        return Math.floor(number, decimal);
    }

    // $('input').keypress(function(e){
    //     if(e.which == 13){//Enter key pressed
    //         return false;
    //     }
    // });

    function exportExcel(data,message){
        showMessage('Excel file has been successfully exported.', "success", "Export Excel File","", "exportFileListing.php");
    }
</script>