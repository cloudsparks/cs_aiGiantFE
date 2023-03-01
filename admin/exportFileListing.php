<?php
    session_start();

    // Get current page name
    $thisPage = basename($_SERVER['PHP_SELF']);

    // Check the session for this page
    if(!isset ($_SESSION['access'][$thisPage]))
        echo '<script>window.location.href="pageLogin.php";</script>';
    $_SESSION['lastVisited'] = $thisPage;
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
                    <div class="col-lg-12">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <!-- <div class="panel panel-default bx-shadow-none">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapse">
                                                <?php echo $translations['A00051'][$language]; /* Search */ ?>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div id="searchMsg" class="text-center alert" style="display: none;"></div>
                                            <form id="searchMember" role="form">
                                                <div class="col-sm-3 form-group">
                                                    <label class="control-label">
                                                        <?php echo $translations['A00151'][$language]; /* Username */ ?>
                                                    </label>
                                                    <input type="text" class="form-control" dataName="username" dataType="text">
                                                </div>
                                                <div class="col-sm-3 form-group">
                                                    <label class="control-label">
                                                        <?php echo $translations['A00156'][$language]; /* Suspended */ ?>
                                                    </label>
                                                    <select class="form-control" dataName="suspended" dataType="select">
                                                        <option value="">
                                                            <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                        </option>
                                                        <option value="1">
                                                            <?php echo $translations['A00056'][$language]; /* Yes */ ?>
                                                        </option>
                                                        <option value="0">
                                                            <?php echo $translations['A00057'][$language]; /* No */ ?>
                                                        </option>
                                                    </select>
                                                </div>
                                            </form>
                                            <div class="col-sm-12">
                                                <button id="searchMemberBtn" class="btn btn-primary waves-effect waves-light">
                                                    <?php echo $translations['A00052'][$language]; /* Search */ ?>
                                                </button>
                                                <button id="resetBtn" class="btn btn-default waves-effect waves-light">
                                                    <?php echo $translations['A00053'][$language]; /* Reset */ ?>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-b-0">
                            <form>
                                <div id="basicwizard" class="pull-in" style="">
                                    <div class="tab-content b-0 m-b-0 p-t-0">
                                        <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                        <div id="memberListDiv" class="table-responsive"></div>
                                        <span class="text-danger" style="float: right;font-size: 13px; font-style: italic;">*Please note that all report will only be store for 2 days.</span>
                                        <span id="paginateText"></span>
                                        <div class="text-center">
                                            <ul class="pagination pagination-md" id="pagerMemberList"></ul>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include("footer.php"); ?>
    </div>
</div>
<script>
    var resizefunc = [];
</script>
<?php include("shareJs.php"); ?>
<script>
    var divId    = 'memberListDiv';
    var tableId  = 'memberListTable';
    var pagerId  = 'pagerMemberList';
    var btnArray = Array('download');
    var thArray  = Array(
        // '',
        '<?php echo $translations['A00112'][$language]; ?>',
        '<?php echo $translations['A00330'][$language]; ?>',
        '<?php echo $translations['A00307'][$language]; ?>',
        '<?php echo $translations['A00318'][$language]; ?>',
        '<?php echo "Progress %"; ?>',
        '<?php echo "Start Time"; ?>',
        '<?php echo "End Time"; ?>',
        '<?php echo "Error Message"; ?>'
    );

    var method         = 'POST';
    var debug          = 0;
    var bypassBlocking = 0;
    var bypassLoading  = 0;
    var pageNumber     = 1;
    var checked        = 0;

    $(document).ready(function() {
        url       = 'scripts/reqClient.php';
        formData  = {command : "getExcelReqList", pageNumber : pageNumber};
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $('#resetBtn').click(function() {
            $('#alertMsg').removeClass('alert-success').html('').hide();
            $('#searchMember').find('input').each(function() {
                $(this).val('');
            });
            $('#searchMember').find('select').each(function() {
                $(this).val('');
            });
        });

        $('#searchMemberBtn').click(function() {
            pagingCallBack(pageNumber, loadSearch);
        });

        $('#selectAll').click(function() {
            checked = checked == 0 ? 1 : 0;
            var checkedIDs = [];
            $('#'+tableId).find('[type=checkbox]').each(function() {
                var checkboxID = $(this).parent('td').parent('tr').attr('id');
                checkedIDs.push(checkboxID);
                $(this).prop("checked", checked);
            });
            console.log(checkedIDs.length);
        });

        $('#updateBtn').click(function() {
            var checkedIDs = [];
            var checkedDetails = [];
            $('#'+tableId).find('[type=checkbox]:checked').each(function() {
                var checkboxID = $(this).parent('td').parent('tr').attr('data-th');
                checkedIDs.push(checkboxID);
            });
            if(checkedIDs.length === 0)
                showMessage('<?php echo $translations['A00613'][$language]; /* No check box selected. */ ?>', 'warning', '<?php echo $translations['A00614'][$language]; /* Update Status */ ?>', 'edit', '');
            else {
                deleteExcelFile(checkedIDs);
            }
        });

        setInterval(function() {
            formData  = {command : "getExcelReqList", pageNumber : pageNumber};
            fCallback = loadDefaultListing;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }, 30000);
    });

    function loadDefaultListing(data, message) {
        var tableNo;
        var memberList = data.exportList;
        if (data=="" || memberList.length<=0) {
            var p = 1;
            $('#alertMsg').addClass('alert-success').html("<span><?php echo $translations["A00354"][$language] ?></span>").show();
            // setTimeout(function() {
            //     $('#alertMsg').removeClass('alert-success').html('').hide();
            // }, 3000);
        }else if(memberList.length>0) {
            var newList = [];
            $.each(data.exportList, function(k, v) {
                var showCheckBox = v["status"] == 'completed' || v["status"] == 'failed' ? 1 : '';
                var rebuildData = {
                    // checkbox       : showCheckBox,
                    created_at     : v["created_at"],
                    export_type    : v["type"],
                    file_name      : v["file_name"],
                    status         : v["status"],
                    progress       : v["progress"],
                    start_time     : v["start_time"],
                    end_time       : v["end_time"],
                    error_message  : v["error_msg"]
                };
                newList.push(rebuildData);
            });
        }

        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        if(data.exportList) {
            $.each(data.exportList, function(k, v) {
                $('#'+tableId).find('tr#'+k).attr('data-th', v['attachment_id']);
                $('#'+tableId).find('tr#'+k).attr('downloadFile', v['file_name']);
                if (!v['attachment_id']) {
                    $('#view' + k).hide();
                    $('#delete' + k).hide();
                }

                if(v['status'] != 'Success'){
                    $('#download' + k).hide();
                }
                /*
                if (v['status'] == "scheduled"){
                    $('#delete' + k).hide();
                }
                */
            });
        }

        $('#'+tableId).find('tbody tr').each(function(){
            $(this).find('td:eq(1)').css('text-transform', "capitalize");
        });


    }

    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span><?php echo $translations['A00167'][$language]; /* Search successful. */ ?></span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide();
        }, 5000);
    }

    function tableBtnClick(btnId) {
        var btnName  = $('#'+btnId).attr('id').replace(/\d+/g, '');
        var tableRow = $('#'+btnId).parent('td').parent('tr');
        var tableId  = $('#'+btnId).closest('table');
        var attachment_id = tableRow.attr('data-th');
        var downloadFile = tableRow.attr('downloadFile');

        if (btnName == 'view') {
            createDownloadFile(attachment_id);
        }
        else if (btnName == 'delete') {
            var canvasBtnArray = Array('Ok');
            var message        = "Are you sure you want to delete this documents?";
            showMessage(message, '', "Delete document request", 'trash', '', canvasBtnArray);
            $('#canvasOkBtn').click(function() {
                var checkedIDs = [];
                checkedIDs.push(attachment_id);
                deleteExcelFile(checkedIDs);
            });
        } else if (btnName == 'download') {
            // $.redirect('<?php echo $config['adminURL'] ?>'+downloadFile);
            window.open('<?php echo $config['adminURL'] ?>'+'xlsx/'+downloadFile);
        }
    }

    function pagingCallBack(pageNumber, fCallback){
        var searchId   = 'searchMember';
        var searchData = buildSearchDataByType(searchId);
        if(pageNumber > 1) bypassLoading = 1;

        var formData = {
            command    : "getExcelReqList",
            inputData  : searchData,
            pageNumber : pageNumber
        };
        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function createDownloadFile(attachmentId) {
        var formData  = {
            command: 'exportExcelDownload',
            attachment_id: attachmentId
        };
        $.redirect('scripts/reqUpload.php', formData);
    }

    function deleteExcelFile(attachmentIdArray) {
        var formData    = {
            'command'              : 'removeExportExcel',
            'attachment_id_array'  : attachmentIdArray
        };
        fCallback = updateCallback;
        ajaxSend('scripts/reqUpload.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function updateCallback(data, message) {
        showMessage('<?php echo $translations['A00387'][$language]; /* Successful updated documents. */ ?>', 'success', '<?php echo $translations['A00617'][$language]; /* Update Status */ ?>', 'edit', 'exportFileListing.php');
    }

</script>
</body>
</html>