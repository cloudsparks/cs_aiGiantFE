<?php
session_start();

// Get current page name
$thisPage = basename($_SERVER['PHP_SELF']);
$thisUrl = $_SERVER['REQUEST_URI'];
$pathInfo = pathinfo($thisUrl);

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
                    <div class="col-md-12 m-b-20">
                        <button id="backBtn" class="btn btn-primary waves-effect waves-light">
                            <?php echo $translations['A00115'][$language]; /* Back */?>
                        </button>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-box p-b-0">
                                <div class="row">
                                    <div class="form-group">
                                        <label>
                                            <?php echo $translations['A00101'][$language]; /* Name */?> :
                                        </label>
                                        <span id="name"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            <?php echo $translations['A00102'][$language]; /* Username */?> :
                                        </label>
                                        <span id="username"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            <?php echo $translations['A00207'][$language]; /* Balance */?> :
                                        </label>
                                        <span id="balance"></span>
                                    </div>
                                    <ul class="nav nav-tabs">
                                        <li id="memberDetails" class="active">
                                            <a data-toggle="tab">
                                                <span id="creditTransaction"></span> <?php echo $translations['A00885'][$language]; /* Transaction Details */?>
                                            </a>
                                        </li>
                                        <li id="adjustmentTab" >
                                            <a data-toggle="tab">
                                                <span id="creditAdjustment"></span> <?php echo $translations['A00886'][$language]; /* Adjustment */?>
                                            </a>
                                        </li>
                                        <li id="transferTab" >
                                            <a data-toggle="tab">
                                                <span id="creditTransfer"></span> <?php echo $translations['A00887'][$language]; /* Transfer */?>
                                            </a>
                                        </li>
                                        <li id="withdrawalTab" >
                                            <a data-toggle="tab">
                                                <span id="creditWithdrawal"></span> <?php echo $translations['A00888'][$language]; /* Withdrawal */?>
                                            </a>
                                        </li>
                                    </ul>
                                    <div id="memberTransactionForm" class="tab-content m-b-30">
                                        <form>
                                            <div id="basicwizard" class="pull-in">
                                                <div class="tab-content b-0 m-b-0 p-t-0">
                                                    <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                                    <div id="memberDetailsListDiv" class="table-responsive"></div>
                                                    <span id="paginateText"></span>
                                                    <div class="text-center">
                                                        <ul class="pagination pagination-md" id="pagerMemberDetailsList"></ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End row -->
                </div>
                <!-- container -->
            </div>
            <!-- content -->

            <?php include("footer.php"); ?>

        </div>
        <!-- End content-page -->


        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

<script>
    var resizefunc     = [];
</script>

<!-- jQuery  -->
<?php include("shareJs.php"); ?>

<script>

        var url            = 'scripts/reqAdmin.php';
        var method         = 'POST';
        var debug          = 0;
        var bypassBlocking = 0;
        var bypassLoading  = 0;
        var pageNumber     = 1;

        var divId    = 'memberDetailsListDiv';
        var tableId  = 'memberDetailsListTable';
        var pagerId  = 'pagerMemberDetailsList';
        var btnArray = {};
        var thArray  = Array (
            '<?php echo $translations['A00564'][$language]; /* Transaction Date */?>',
            '<?php echo $translations['A00565'][$language]; /* Transaction Type */?>',
            '<?php echo $translations['A00891'][$language]; /* To/From */?>',
            // 'Time / Date',
            '<?php echo $translations['A00892'][$language]; /* Credit In */?>',
            '<?php echo $translations['A00893'][$language]; /* Credit Out */?>',
            'Coin Rate',
            '<?php echo $translations['A00894'][$language]; /* Balance */?>',
            '<?php echo $translations['A00147'][$language]; /* Done By */?>',
            '<?php echo $translations['A00571'][$language]; /* Remark */?>'
        );
        
        var type            = "<?php echo $_GET['type'];?>";  

        if (type == "flexiCredit"){
            thArray  = Array (
                '<?php echo $translations['A00564'][$language]; /* Transaction Date */?>',
                '<?php echo $translations['A00565'][$language]; /* Transaction Type */?>',
                '<?php echo $translations['A00891'][$language]; /* To/From */?>',
                // 'Time / Date',
                '<?php echo $translations['A00892'][$language]; /* Credit In */?>',
                '<?php echo $translations['A00893'][$language]; /* Credit Out */?>',
                'Coin Type',
                'Coin Rate',
                '<?php echo $translations['A00894'][$language]; /* Balance */?>',
                '<?php echo $translations['A00147'][$language]; /* Done By */?>',
                '<?php echo $translations['A00571'][$language]; /* Remark */?>'
            );
        }else {
            thArray  = Array (
                '<?php echo $translations['A00564'][$language]; /* Transaction Date */?>',
                '<?php echo $translations['A00565'][$language]; /* Transaction Type */?>',
                '<?php echo $translations['A00891'][$language]; /* To/From */?>',
                // 'Time / Date',
                '<?php echo $translations['A00892'][$language]; /* Credit In */?>',
                '<?php echo $translations['A00893'][$language]; /* Credit Out */?>',
                'Coin Rate',
                '<?php echo $translations['A00207'][$language]; /* Balance */?>',
                '<?php echo $translations['A00147'][$language]; /* Done By */?>',
                '<?php echo $translations['A00571'][$language]; /* Remark */?>'
            );
        }

        var creditType     = "<?php echo $_GET['type'];?>";
        var id             = "<?php echo $_POST['id']; ?>";
        var fullName       = "<?php echo $_POST['fullName']; ?>";
        var username       = "<?php echo $_POST['username']; ?>";
        var creditName     = "<?php echo $_POST['creditName']; ?>";
        // alert(creditName);

        $(document).ready(function() {

            
            var formData   = {
                command    : "getTransactionHistory",
                memberId   : id,
                creditType : creditType,
                pageNumber : pageNumber,
		flag : 1

            };
            var fCallback  = loadMemberDetail;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

            $('.page-title').empty().append(creditName + ' Wallet Transaction');

            $('#backBtn').click(function() {
                $.redirect('memberDetailsList.php?type=' + creditType, {
                                                        id                  : id,
                                                        fullName            : fullName,
                                                        username            : username,
                                                        creditName          : creditName
                });
            });

            //set name and username of the member in form
            $('#name').text(fullName);
            $('#username').text(username);
            $('#creditTransaction').text(creditName);
            $('#creditAdjustment').text(creditName);
            $('#creditTransfer').text(creditName);
            $('#creditWithdrawal').text(creditName);
            //adjustment page
            $('#adjustmentTab').click(function() {
                $.redirect('memberAdjustment.php?type=' + creditType, {    
                                                        id                  : id,
                                                        fullName            : fullName,
                                                        username            : username,
                                                        creditName          : creditName
                });
            });

            //transfer page
            $('#transferTab').click(function() {
                $.redirect('memberTransfer.php?type=' + creditType, {      
                                                        id                  : id,
                                                        fullName            : fullName,
                                                        username            : username,
                                                        creditName          : creditName
                });             
            });

            //withdrawal page
            $('#withdrawalTab').click(function() {
                $.redirect('memberWithdrawalByAddress.php?type=' + creditType, {    
                                                        id                  : id,
                                                        fullName            : fullName,
                                                        username            : username,
                                                        creditName          : creditName
                });
            });
        });

         function pagingCallBack(pageNumber){
                var formData   = {
                command    : "getTransactionHistory",
                memberId   : id,
                creditType : creditType,
                pageNumber : pageNumber,
		flag : 1

            };
            var fCallback  = loadMemberDetail;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }

        function loadMemberDetail(data, message) {
            console.log(data);
            if (data.balance) {
                $('#balance').text(data.balance);
            } else {
                $('#balance').text(0);
            }

            

            if(data.transactionList) {
                if (type == "flexiCredit"){
                    var newList = [];
                    $.each(data.transactionList, function(k, v){
                        var rebuildData = {
                            created_at: v['created_at'],
                            subject: v['subject'],
                            to_from: v['to_from'],
                            credit_in: v['credit_in'],
                            credit_out: v['credit_out'],
                            type: v['type'],
                            coin_rate: v['coin_rate'],
                            balance: v['balance'],
                            creator_id: v['creator_id'],
                            remark: v['remark'],
                        };
                        newList.push(rebuildData);
                  });
               } else {
                 var newList = [];
                    $.each(data.transactionList, function(k, v){
                        var rebuildData = {
                            created_at: v['created_at'],
                            subject: v['subject'],
                            to_from: v['to_from'],
                            credit_in: v['credit_in'],
                            credit_out: v['credit_out'],
                            // type: v['type'],
                            coin_rate: v['coin_rate'],
                            balance: v['balance'],
                            creator_id: v['creator_id'],
                            remark: v['remark'],
                        };
                        newList.push(rebuildData);
                  });
               }
                var tableNo;
                buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
                pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);
            } else {
                $("#alertMsg").html("No result found.").show();
            }

            if(data.permissions) {
                if(data.permissions.isAdjustable == "0")
                    $("li#adjustmentTab").remove();
                if(data.permissions.isTransferable == "0")
                    $("li#transferTab").remove();
                if(data.permissions.isWithdrawable == "0")
                    $("li#withdrawalTab").remove();
            }
        }
</script>
</body>
</html>
