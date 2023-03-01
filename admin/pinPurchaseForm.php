<?php
session_start();


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
                <div class="col-md-12 card-box" style="padding: 20px;">
                    
                        <div class="col-md-12">
                            <h3><?php echo $translations['A00620'][$language]; /* Product Type */ ?></h3>
                        </div>
                        <div id="productType" class="col-md-12">
                          
                            <input id="NBV" type="radio" name="productType" value="NBV" checked> 
                            <label for="NBV" style="margin-right: 15px;">NBV</label>

                            <input id="NBVR" type="radio" name="productType" value="NBVR"> 
                            <label for="NBVR" style="margin-right: 15px;">NBVR</label>
                          
                        </div>

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>Username</label>
                                    <input id="username" class="form-control" type="text" name="">
                                    <span id="usernameError" class="error text-danger"></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>Amount</label>
                                    <input id="invesmentAmount" class="form-control" type="text" name="" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\.*)\./g, '$1');">
                                    <span id="totalError" class="error text-danger"></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <button id="next" class="btn btn-primary btn-md waves-effect waves-light m-b-20">
                                <i class="md md-add"></i>
                                <?php echo $translations['A00205'][$language]; /* Next */ ?>
                            </button>
                        </div>

                  
                </div>


            </div> <!-- container -->

        </div> <!-- content -->

        <?php include("footer.php"); ?>

    </div>
    <!-- End content-page -->


    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->

</div>
<!-- END wrapper -->

<div class="modal fade in" id="confirmationDetails" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content-wrapper">
                <div class="modal-content" style="overflow-y:scroll;max-height: 100vh">
                    <div class="modal-header clearfix text-left">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                        </button>
                        <h5>
                            <?php echo $translations['A00250'][$language]; /* Confirmation */ ?>
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive" style="border: none;">
                            <table class="table" style="border: 1px solid #dddddd;">
                                <tbody>
                                    <tr><th><?php echo $translations['A00102'][$language]; /* Username */ ?></th><td id="username_c"></td></tr>
                                    <tr><th><?php echo $translations['A00620'][$language]; ?></th><td id="productType_c"></td></tr>
                                    <tr><th><?php echo $translations['A00821'][$language]; ?></th><td id="amount_c"></td></tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a type="button" class="btn btn-default" data-dismiss="modal" style="border-radius: 0 !important; border: none !important;">
                            <?php echo $translations['A00660'][$language]; /* cancel */ ?>
                        </a>
                        <a type="button" class="btn btn-primary" data-dismiss="modal" data-target="" data-toggle="modal" data-backdrop="static" data-keyboard="false" onclick="confirmPurchasePin()">
                            <?php echo $translations['A00123'][$language]; /* confirm */ ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->
<?php include("shareJs.php"); ?>

<script>

    // Initialize all the id in this page
    var divId    = 'productListDiv';
    var tableId  = 'productListTable';
    var pagerId  = 'pagerProductList';
    var btnArray = Array();
    var thArray  = Array(
                            '<?php echo $translations['A00623'][$language]; /* Product Name */ ?>',
                            '<?php echo $translations['A00624'][$language]; /* Pin Type */ ?>',
                            '<?php echo $translations['A00625'][$language]; /* Unit BV */ ?>',
                            '<?php echo $translations['A00355'][$language]; /* Unit Price */ ?>',
                            '<?php echo $translations['A00627'][$language]; /* Quantity */ ?>',
                            '<?php echo $translations['A00628'][$language]; /* Total BV */ ?>',
                            '<?php echo $translations['A00629'][$language]; /* Total Price */ ?>',
                        );

    // Initialize the arguments for ajaxSend function
    var method         = 'POST';
    var debug          = 0;
    var bypassBlocking = 0;
    var bypassLoading  = 0;
    var pageNumber     = 1;
    var decimalPlaces  = "<?php echo $_SESSION['decimalPlaces']; ?>";
    // var clientID       = "<?php echo $_POST['clientId'] ?>"
    var productTypeData;

    $(document).ready(function() {
        // if clientID empty return back pinPurchase.php 
        // if(!clientID) {
        //     var message  = '<?php echo $translations['A00178'][$language]; /* Client does not exist */ ?>';
        //     showMessage(message, '', '<?php echo $translations['A00727'][$language]; /* Error */ ?>', 'exclamation-triangle', 'pinPurchase.php');
        //     return;
        // }

        // url      = 'scripts/reqAdmin.php';
        // formData = {command : "getPinPurchaseFormDetail"};
        // fCallback = loadDefaultListing;
        // ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        // $("input[name='productType']").change(function(){
        //     populateTable(productTypeData, tableId, divId, thArray, message, tableNo);
        // });

        $("#next").click(function () {
            var invesmentAmount = $('#invesmentAmount').val();
            var username = $('#username').val();
            var pinType = $('input:radio[name="productType"]:checked').val();

            url      = 'scripts/reqAdmin.php';
            formData = {
                command : "purchasePinVerification",
                invesmentAmount : invesmentAmount,
                username : username,
                pinType : pinType,

            };

            fCallback = loadDefaultListing;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });


        $("#back").click(function () {

            $.redirect('pinPurchase.php');
        });

    });

    function loadDefaultListing(data, message) {
        $('#username_c').text(data.clientData.username);
        $('#productType_c').text(data.pinType);
        $('#amount_c').text(data.invesmentAmount);
        $("#confirmationDetails").modal();
    }

    // function loadDefaultListing(data, message) {
    //     var tableNo = {pageNumber : data.pageNumber, numRecord : data.numRecord};
    //     $.each(data.pinProduct, function(key, value){
    //         value['quantity']   = "";
    //         value['totalBV']    = 0;
    //         value['totalPrice'] = 0;
    //     });
    //     productTypeData = data.pinProduct;
    //     loadProductType(data.pinType);
    //     populateTable(productTypeData, tableId, divId, thArray, message, tableNo);
    //     pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

    //     $('tr').each(function(key, value){
    //         if ($(this).attr('id')){
    //             $(this).children("td:eq(2)").css("text-align", "right");
    //             $(this).children("td:eq(3)").css("text-align", "right");
    //             $(this).children("td:eq(5)").css("text-align", "right");
    //             $(this).children("td:eq(6)").css("text-align", "right");
    //         }
    //     });
    // }

    function onProductTypeRadioClick(){

        var message;
        var tableNo;
        $('#productListTable tr').remove();
        populateTable(productTypeData, tableId, divId, thArray, message, tableNo);
        $('tr').each(function(key, value){
            if ($(this).attr('id')){
                $(this).children("td:eq(2)").css("text-align", "right");
                $(this).children("td:eq(3)").css("text-align", "right");
                $(this).children("td:eq(5)").css("text-align", "right");
                $(this).children("td:eq(6)").css("text-align", "right");
            }
        });
    }

    function confirmPurchasePin() {
        url      = 'scripts/reqAdmin.php';
        var invesmentAmount = $('#invesmentAmount').val();
        var username = $('#username').val();
        var pinType = $('input:radio[name="productType"]:checked').val();

        var formData = {
            command : "purchasePinConfirmation",
            invesmentAmount : invesmentAmount,
            username : username,
            pinType : pinType,
        };

        var fCallback = goConfirmation;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function goConfirmation(data, message) {
        showMessage(message, 'success', '<span><?php echo $translations['A00732'][$language]; /* Congratulations! */ ?>', '', 'pinPurchaseForm.php');
    }

    // function loadProductType(data){

    //     var i = 1;

    //     $.each(data, function(key, value){
    //         $.each(value, function(key, value){
    //             if (key === "name")
    //                 $('#productType').append("<div class='col-sm-2'>" +
    //                     "<input onclick='onProductTypeRadioClick()' id=productType" + i +" name='productType' type='radio' value='" + value + "'>" +
    //                     "<label style='padding-left: 5%'>" + value + "</label>" +
    //                     "</div>");
    //             i++
    //         })
    //     });

    //     $('#productType1').attr('checked', 'checked');
    // }

    // function calculatePrice(){
    //     var tableRow    = $(this).parent('td').parent('tr');
    //     var bonusValue  = tableRow.children("td:eq(2)").text();
    //     var unitPrice   = tableRow.children("td:eq(3)").text();
    //     var quantity    = $(this).val();

    //     if (!quantity)
    //         quantity = 0;

    //     if ($.isNumeric(bonusValue) && $.isNumeric(unitPrice) && $.isNumeric(quantity)){
    //         if (quantity != "" && quantity > 0) {
    //             var totalBV = bonusValue * quantity;
    //             var totalPrice = unitPrice * quantity;

    //             tableRow.children("td:eq(5)").text(totalBV.toFixed(decimalPlaces));
    //             tableRow.children("td:eq(6)").text(totalPrice.toFixed(decimalPlaces));
    //         }
    //         else {
    //             tableRow.children("td:eq(5)").text(0);
    //             tableRow.children("td:eq(6)").text(0);
    //         }
    //     }
    // }

//     function populateTable(data, tableId, divId, thArray, message, tableNo){

//         $('#'+divId).find('table#'+tableId).detach();
//         $('#'+divId).prev().removeClass('alert-success').html('').hide();

//         if(!data){
//             $('#'+divId).prev().addClass('alert-success').html('<span>'+message+'</span>').show();
//             return;
//         }

//         $('#'+divId).append('<table id="'+tableId+'" class="table tabel-borderless table-responsive no-footer m-0"></table>');
//         $('#'+divId).find('table#'+tableId).append('<thead><tr></tr></thead>');
//         $('#'+divId).find('table#'+tableId).append('<tbody></tbody>');

//         var objKey;
//         objKey = Object.keys(data);

//         // Remove this block of code once all listing done changing
//         if(thArray.length < 2) {
//             thArray = [];
//             objKey = Object.keys(data);
//             $.each(objKey, function(key, val) {
//                 thArray.push(val.split('_').join(' '));
//             });
//         }
//         // Till here

//         // Loop to insert table headers
//         $.each(thArray, function(key, val) {
//             $('#'+tableId).find('thead tr').append('<th>'+val+'</th>');
//         });

//         var j = 0;

//         $.each(data, function(key, value){
//             if ($('input:radio[name="productType"]:checked').val() === value['pin_type']) {
//                 $('#'+tableId).find('tbody').append('<tr id='+j+'></tr>');
//                 $('#'+tableId).find('tr#'+j).attr('data-th', value['id']);
//                 $.each(value, function (k, v) {
//                     if (k === "id"){

//                     }
//                     else if (k === "quantity") {
//                         $('#' + tableId).find('tr#' + j).append('<td><input type="text" min="0" oninput="limitInteger.call(this)" onkeyup="calculatePrice.call(this)"/></td>');
//                     }
//                     else {
//                         $('#' + tableId).find('tr#' + j).append('<td>' + v + '</td>');
//                     }
//                 });

//                 j++;
//             }
//         });

//         if(tableNo) {
//             var endRow = tableNo.pageNumber * tableNo.numRecord;
//             var startRow = endRow - tableNo.numRecord + 1;
// //        $('#'+tableId).find('th:first-child').html('No.');
//             var tdRowCount = 1;
//             while(startRow <= endRow){
//                 $('#'+tableId).find('tr:nth-child('+tdRowCount+') td:first-child').html(startRow);
//                 startRow++;
//                 tdRowCount++;
//             }
//         }

//         // To initialize the tooltip
//         $('[data-toggle="tooltip"]').tooltip();

//     }

</script>
</body>
</html>