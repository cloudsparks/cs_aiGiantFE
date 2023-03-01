<?php
    session_start();
    $thisPage = basename($_SERVER['PHP_SELF']);
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
                    <div class="col-lg-12">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default bx-shadow-none">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion"
                                           href="#collapseOne" aria-expanded="false" aria-controls="collapseOne"
                                           class="collapse">
                                            <?php echo $translations['A00051'][$language]; /* Search */ ?>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel"
                                     aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <div id="searchMsg" class="text-center alert" style="display: none;"></div>
                                        <form id="searchForm" role="form">
                                            <div class="col-xs-12">
                                                <div class="row">
                                                    <div class="col-sm-4 form-group" id="datepicker">
                                                        <label class="control-label" data-th="">Set Date</label>
                                                        <div class="input-daterange input-group" id="datepicker-range">
                                                            <input id="dateRangeStart" type="text" class="form-control"
                                                                   name="start" dataName="setDate" dataType="dateRange">
                                                            <div class="input-group-addon">
                                                                <?php echo $translations['A00139'][$language]; /* to */ ?>
                                                            </div>
                                                            <input id="dateRangeEnd" type="text" class="form-control"
                                                                   name="end" dataName="setDate" dataType="dateRange"
                                                                   autocomplete="off">
                                                        </div>
                                                    </div>

                                                    <!-- <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            Admin Username 
                                                        </label>
                                                        <input type="text" class="form-control" dataName="adminUsername" dataType="text">
                                                    </div>

                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            Stock Name
                                                        </label>
                                                        <input type="text" class="form-control" dataName="stockName" dataType="text">
                                                    </div> -->
                                                </div>
                                            </div>

                                        </form>

                                        <div class="col-xs-12 m-t-rem1">
                                            <button id="searchBtn" type="submit"
                                                    class="btn btn-primary waves-effect waves-light">
                                                <?php echo $translations['A00051'][$language]; /* Search */ ?>
                                            </button>
                                            <button id="resetBtn" type="submit"
                                                    class="btn btn-default waves-effect waves-light">
                                                <?php echo $translations['A00053'][$language]; /* Reset */ ?>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="row">
                    <div class="col-lg-12">
                        <button id="addBtn" type="" onclick="window.location.href='setPublicHoliday.php'"class="btn btn-primary waves-effect waves-light"
                                style="margin-bottom: 10px">
                            Add New Public Holiday
                        </button>
                    </div>
                    <div class="col-lg-12">
                        <!-- <div class="card-box p-b-0"> -->
                        <button id="exportBtn" type="" class="btn btn-primary waves-effect waves-light"
                                style="margin-bottom: 10px;display: none">
                            Export to xlsx
                        </button>
                        <button id="seeAllBtn" type="" class="btn btn-primary waves-effect waves-light"
                                style="margin-bottom: 10px;display: none">
                            See All
                        </button>
                        <form>
                            <div id="basicwizard" class="pull-in" style="display: block;">
                                <div class="tab-content b-0 m-b-0 p-t-0">
                                    <div id="alertMsg" class="text-center alert" style="display: block;"></div>
                                    <div id="bonusListDiv" class="table-responsive"></div>
                                    <span id="grandTotal"></span>
                                    <span id="paginateText"></span>
                                    <div class="text-center">
                                        <ul class="pagination pagination-md" id="pagerBonusList"></ul>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- </div> -->
                    </div>
                </div><!-- End row -->

            </div> <!-- container -->

        </div> <!-- content -->

        <?php include("footer.php"); ?>

    </div>
    <!-- End content-page -->


    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->

</div>

<div class="modal stick-up" id="editModal" tabindex="-1" role="dialog" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content-wrapper">
            <div class="modal-content">
                <div class="modal-header clearfix text-left">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="pg-close fs-14"></i>
                    </button>
                    <h3>
                       Edit Public Holiday
                   </h3>
               </div>
               <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-sm-6 form-group">
                                <label class="control-label" for="" data-th="#">
                                    Date
                                </label>
                                <input id="searchDate" type="text" class="form-control" dataName="searchDate" dataType="singleDate">
                                <span id="dateError" class="errorSpan text-danger"></span>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label class="control-label" for="" data-th="#">
                                    Remark
                                </label>
                                <input id="remark" type="text" class="form-control">
                                <span id="remarkError" class="errorSpan text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="confirmButton" type="button" class="btn btn-primary waves-effect waves-light" data-dismiss="modal" data-toggle="modal" data-backdrop="static" data-keyboard="false" onclick="editConfirmation()">
                        <span>
                            <?php echo $translations['A00123'][$language]; /* Confirm */ ?>
                        </span>
                    </button>
                    <button type="button" class="btn btn-default btn-cons no-margin inline" data-dismiss="modal">
                        <?php echo $translations['A00660'][$language]; /* Cancel */ ?>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal stick-up" id="deleteModal" tabindex="-1" role="dialog" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content-wrapper">
            <div class="modal-content">
                <div class="modal-header clearfix text-left">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="pg-close fs-14"></i>
                    </button>
                    <h3>
                       Delete Confirmation
                   </h3>
               </div>
               <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <p>Are you sure you want to delete this public holiday?</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="confirmDeleteButton" type="button" class="btn btn-primary waves-effect waves-light" data-dismiss="modal" data-toggle="modal" data-backdrop="static" data-keyboard="false" onclick="editConfirmation()">
                        <span>
                            <?php echo $translations['A00123'][$language]; /* Confirm */ ?>
                        </span>
                    </button>
                    <button type="button" class="btn btn-default btn-cons no-margin inline" data-dismiss="modal">
                        <?php echo $translations['A00660'][$language]; /* Cancel */ ?>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END wrapper -->

<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->
<?php include("shareJs.php"); ?>

<script>
    // Initialize all the id in this page
    var divId = 'bonusListDiv';
    var tableId = 'bonusListTable';
    var pagerId = 'pagerBonusList';
    var btnArray = {};
    var thArray = Array(
        '',
        '',
        'Date',
        'Remark',
        'Updated By',
        'Updated At'
        
    );
    var searchId = 'searchForm';

    // Initialize the arguments for ajaxSend function
    var url = 'scripts/reqAdmin.php';
    var method = 'POST';
    var debug = 0;
    var bypassBlocking = 0;
    var bypassLoading = 0;
    var pageNumber = 1;
    var formData = "";
    var fCallback = "";
    var id ="";

    var getHolidayID;
    // var getEditHolidayID;
    // var getDeleteHolidayID;

    $(document).ready(function () {

        $('#resetBtn').click(function () {
            $('#alertMsg').removeClass('alert-success').html('').hide();
            $('#searchForm').find('input').each(function () {
            	if($(this).val() == "match" || $(this).val() == "like" ) return true;
                $(this).val('');
            });
            $('#searchForm').find('select').each(function () {
                $(this).val('');
                $("#searchForm")[0].reset();
            });

        });

        $('#seeAllBtn').click(function () {

            var searchID = 'searchForm';
            var searchData = buildSearchDataByType(searchID);
            formData = {
                command: 'getHoliday',
                searchData: searchData,
                pageNumber: 1,
                seeAll: 1,
                usernameSearchType: $("input[name=usernameType]:checked").val(),

            };
            fCallback = loadDefaultListing;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        });

        $('#searchBtn').click(function () {
            pagingCallBack(pageNumber, loadSearch);
        });

        $('#datepicker input').each(function () {
            $(this).datepicker('clearDates');
        });

        setTodayDatePicker();

        $("#confirmButton").click(function() {
            var remark = $('#remark').val(); 
            var date = $("#searchDate").val();
            date = date==""?"":dateToTimestamp(date);

            var formData = {
                command  : "editHoliday",
                date : date,
                remark : remark,
                id : getHolidayID
            };

            var fCallback = successEdit;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });

        $("#confirmDeleteButton").click(function() {

            var formData    = {
                command: 'deleteHoliday',
                id : getHolidayID
            };
            var fCallback = successRemove;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });

    });

    $('#dateRangeStart').datepicker({
        // language: language,
        format: 'dd/mm/yyyy',
        orientation: 'auto',
        autoclose: true
    });

    $('#dateRangeEnd').datepicker({
        // language: language,
        format: 'dd/mm/yyyy',
        orientation: 'auto',
        autoclose: true
    });

    $('#exportBtn').click(function () {
        var searchId = 'searchForm';
        var searchData = buildSearchDataByType(searchId);
        var key = Array(
            'date',
            'remark',
            'adminUsername',
            'updated_at'
            
        );

        var thArray = Array(
            'Date',
            'Remark',
            'Updated By',
            'Updated At'
            
        );

        var exportParams = {
            searchData  : searchData,
            pageNumber  : pageNumber,
            seeAll      : 1,
            usernameSearchType  : $("input[name=usernameType]:checked").val()
        };

        var formData  = {
            command     : "addExcelReq",
            API         : "getHoliday",
            titleKey    : "list",
            params      : exportParams,
            headerAry   : thArray,
            keyAry      : key,
            fileName    : 'pubHoliday',
            returnType  : 'excel',
            usernameSearchType : $("input[name=usernameType]:checked").val()
        };

        fCallback = exportExcel;
        ajaxSend("scripts/reqAdmin.php", formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    });

    function pagingCallBack(pageNumber, fCallback) {
        if (pageNumber > 1) bypassLoading = 1;

        var searchData = buildSearchDataByType(searchId);
        var formData = {
            command: "getHoliday",
            pageNumber: pageNumber,
            searchData: searchData,
            usernameSearchType: $("input[name=usernameType]:checked").val(),

        };

        if (!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadDefaultListing(data, message) {


        $('#basicwizard').show();
        var tableNo;

        if (data.list) {
            $('#exportBtn, #seeAllBtn').show();
            var newList = [];
            $.each(data.list, function (k, v) {

                var editBtn = `<a data-toggle="tooltip" title="" onclick="editHoliday('${v.id}')" class="btn btn-icon waves-effect waves-light btn-primary" data-original-title="Edit"><i class="fa fa-edit"></i></a>`;

                var removeBtn = `<a data-toggle="tooltip" title="" onclick="removeHoliday('${v.id}')" class="btn btn-icon waves-effect waves-light btn-primary" data-original-title="Remove"><i class="fa fa-ban"></i></a>`;
                
                var rebuildData = {
                    editBtn: editBtn,
                    removeBtn: removeBtn,
                    date: v['date'],
                    remark: v['remark'],
                    adminUsername: v['adminUsername'],
                    updated_at: v['updated_at']

                    
                };
                newList.push(rebuildData);
            });

        }
        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        // $('tr').each(function(){
        //     $(':eq(5)',this).remove().insertBefore($(':eq(0)',this));
        // });

       // if(data.list) {
       //      $.each(data.list, function(k, v) {
       //          $('#'+tableId).find('tr#'+k).attr('data-id', v['id']);
       //      });      
       //  }


        $('#' + tableId).find('tbody tr').each(function () {
            $(this).find('td:eq(0)').css('text-align', "center");
            $(this).find('td:eq(1)').css('text-align', "center");
        });

        $('#' + tableId).find('thead tr').each(function () {
            $(this).find('th:eq(0)').css('text-align', "center");
            $(this).find('th:eq(1)').css('text-align', "center");
        });

        // $('#' + tableId).find('tbody').append(`
        //     <tr style="">
        //         <td colspan='7' class="text-right"><?php echo $translations['A00651'][$language]; /* Grand Total */?>:</td>
        //         <td style="text-align: right;"> ${addCormer(data.grandTotal)} </td>
        //     </tr>
        // `);
    }

    // function tableBtnClick(btnId) {
    //     var btnName  = $('#'+btnId).attr('id').replace(/\d+/g, '');
    //     var tableRow = $('#'+btnId).parent('td').parent('tr');
    //     var tableId  = $('#'+btnId).closest('table');

    //     if (btnName == 'edit') {
    //         var editId = tableRow.attr('data-th');
    //         $.redirect("editAdmin.php",{id: editId});
    //     }
    // }


    // function removeStock (id) {

    //     var formData  = {
    //             command: 'deleteHoliday',
    //             id : id,
    //         };
    //     var fCallback = successRemove;
    //     ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    // }

    // function viewStock (id) {

    //     var formData  = {
    //             command: 'editHoliday',
    //             username : username,
    //         };
    //     var fCallback = successRemove;
    //     ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    // }



    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span><?php echo $translations['A00114'][$language]; /* Search successful. */ ?></span>').show();
        setTimeout(function () {
            $('#searchMsg').removeClass('alert-success').html('').hide();
        }, 3000);
    }

    function removeHoliday(id) {
        getHolidayID = id;

        $('#deleteModal').modal("show"); 
    }


    function successRemove(data, message) {
        showMessage(message, 'success', 'Removed Holiday', '', 'getPublicHoliday.php');
    }

    function editHoliday(id) {
        getHolidayID = id;

        $('#editModal').modal("show"); 
    }

    

    function successEdit(data, message) {
        showMessage(message, 'success', 'Edited Holiday', '', 'getPublicHoliday.php');
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
    

    // function tableBtnClick(btnId) {
    //     var btnName  = $('#'+btnId).attr('id').replace(/\d+/g, '');
    //     var tableRow = $('#'+btnId).parent('td').parent('tr');
    //     var tableId = $('#'+btnId).closest('table');
    //     var id = tableRow.attr('data-id');

    //     if(btnName == 'edit') {
    //         $.redirect("editShare.php", {
    //             id : id,
    //         });
    //     }
    // }



</script>
</body>
</html>
