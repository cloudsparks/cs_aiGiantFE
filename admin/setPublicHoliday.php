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

                    <div class="col-lg-12 col-md-12">

                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default bx-shadow-none">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        Add New Public Holiday
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <div id="" class="text-center alert" style="display: none;"></div>

                                        <!-- <div class="col-xs-12">
                                            <div class="row">
                                                <div class="col-sm-6 form-group">
                                                    <label class="control-label" for="" data-th="#">
                                                        Stock Name
                                                    </label>
                                                    <input id="stockName" type="text" class="form-control">
                                                    <span id="stockNameError" class="errorSpan text-danger"></span>
                                                </div>
                                            </div>
                                        </div> -->

                                        <div class="col-xs-12">
                                            <div class="row">
                                                <div class="col-sm-6 form-group">
                                                    <label class="control-label" for="" data-th="#">
                                                        Date
                                                    </label>
                                                    <input id="searchDate" type="text" class="form-control" dataName="searchDate" dataType="singleDate">
                                                    <span id="dateError" class="errorSpan text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-xs-12">
                                            <div class="row">
                                                <div class="col-sm-6 form-group">
                                                    <label class="control-label" for="" data-th="#">
                                                        Remark
                                                    </label>
                                                    <input id="remark" type="text" class="form-control">
                                                    <span id="remarkError" class="errorSpan text-danger"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- <div class="col-xs-12">
                                            <div class="row">
                                                <div class="col-sm-6 form-group">
                                                    <label class="control-label" for="" data-th="#">
                                                        Buying Time
                                                    </label>
                                                    <input id="buyTime" type="time" class="form-control">
                                                    <span id="buyTimeError" class="errorSpan text-danger"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xs-12">
                                            <div class="row">
                                                <div class="col-sm-6 form-group">
                                                    <label class="control-label" for="" data-th="#">
                                                        Quantity
                                                    </label>
                                                    <input id="quantity" type="text" class="form-control">
                                                    <span id="quantityError" class="errorSpan text-danger"></span>
                                                </div>
                                            </div>
                                        </div> -->
                                    
                                        <!-- <div class="col-xs-12">
                                            <div class="row">
                                                <div class="col-sm-6 form-group">
                                                    <label class="control-label" for="" data-th="#">
                                                        Buying Price
                                                    </label>
                                                    <input id="buyPrice" type="text" class="form-control" oninput="this.value = this.value.match(/^[0-9]+\.?[0-9]{0,3}/);">
                                                    <span id="buyPriceError" class="errorSpan text-danger"></span>
                                                </div>
                                            </div>
                                        </div> -->

                                      


                                        <div class="col-xs-12">
                                            <a id ="addBtn" href="#" type="button" class="btn btn-primary waves-effect w-md waves-light m-b-20 m-t-rem3">
                                                Add
                                            </a>
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

<div class="modal fade" id="showUploadVideo" role="dialog">
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

<div class="modal fade" id="showUploadImg" role="dialog">
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
                <img id="viewImg" style="width: 100%;">
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

<script>
    var resizefunc = [];
</script>

<?php include("shareJs.php"); ?>

<script>

    var url            = 'scripts/reqAdmin.php';
    var method         = 'POST';
    var debug          = 0;
    var bypassBlocking = 0;
    var bypassLoading  = 0;
    var fCallback      = "";

    $(document).ready(function() {

        setTodayDatePicker();

        $('#backBtn').click(function() {
            $.redirect('getPublicHoliday.php');
        });

        $('#addBtn').click(function () {

            var remark = $('#remark').val(); 

            var date = $("#searchDate").val();
            date = date==""?"":dateToTimestamp(date);

            var formData = {
                command  : "addHoliday",
                date : date,
                remark : remark
            };

            fCallback = loadSuccessMessage;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });

    });


    

    function loadSuccessMessage(data, message) {
        showMessage(message, 'success', 'Add New Public Holiday', '', 'getPublicHoliday.php');
    }


    function setTodayDatePicker() {
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1;
        var yyyy = today.getFullYear();
        if(dd<10){
            dd='0'+dd;
        } 
        if(mm<10){
            mm='0'+mm;
        }
        var today = dd+'/'+mm+'/'+yyyy;

        $('#searchDate').daterangepicker({
            singleDatePicker: true,
            timePicker: false,
            locale: {
                format: 'DD/MM/YYYY'
            }
        });
        var dateToday = $('#searchDate').val(today);

        $('#timeFrom').timepicker({
            defaultTime : '',
            showSeconds: true
        });
        $('#timeTo').timepicker({
            defaultTime : '',
            showSeconds: true
        });

        return dateToTimestamp(today);
    }

    


</script>
</body>
</html>





