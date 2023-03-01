
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/jquery.min.js"></script>
    <style>
        * {
            box-sizing: border-box;
        }
        html, body {
            margin: 0;
            padding: 0;
        }
        table {
            margin-top: 15px;
        }
        table.noMargin {
            margin-top: 0;
        }
        table th {
            text-align: left;
            padding-right: 30px;
        }
        table th, table td {
            vertical-align: top;
        }
        h3, p{
            margin: 0;
        }
        .listWrapper {
            padding: 8px 15px;
            border-bottom: 1px solid #ccc;
        }
        ol {
            margin: 0;
        }
        .searchContainer {
            padding: 7px 15px;
            background-color: #308fce;
            color: #fff;
        }
        .inputStyle {
            border: 1px solid #777;
            height:  30px;
            padding: 0 7px;
            border-radius: 5px;
            outline: none;
        }
        .inputStyle.first {
            margin-left: 15px;
        }
        .buttonStyle, .buttonStyle:focus {
            height:  30px;
            padding: 0 7px;
            border-radius: 5px;
            outline: none;
            border: 1px solid #777;
            background-color: #fff;
            cursor: pointer;
            transition: .1s;
        }

        .buttonStyle:hover {
            border: 1px solid #203c4e;
            background-color: #203c4e;
            color: #fff;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="searchContainer">
            <label>Search</label>
            <select id="type" class="inputStyle first">
                <option value="address">Address</option>
                <option value="hash">Hash</option>
            </select>
            <input type="text" id="searchInp" class="inputStyle">
            <input type="button" id="submitBtn" value="Search" class="buttonStyle">
            <input type="button" id="resetBtn" value="Reset" class="buttonStyle">
        </div>
        <div id="appendList"></div>
    </div>

    <?php 
        session_start();

        // if($_SESSION["userID"] != '1'){
        //  die ('<h1>404 Not Found<h1>');
        // }
        // $login = (string)$_GET['login'];
        // if($login != 8888){
        //  die ('<h1>404 Not Found<h1>');
        // }

        $handle = fopen('../member/log/theNuxCallBack.log','r') or die ('File opening failed');
        $requestsCount = 0;

        while (!feof($handle)) {
            $callback = fgets($handle);
            $requestsCount++;   

            $cutPosotion = strpos($callback, "{");
            $data = substr($callback, $cutPosotion);
            $dataArray = json_decode($data, true);

            if(!$dataArray) continue;

            $command = $dataArray['command'];
            $dataDetails = $dataArray['params'];

            $dateTimeRes = substr($callback, 0, $cutPosotion); 
            $dateTime = trim($dateTimeRes);

            switch ($command) {
                case 'paymentGatewayCallback':
                    $address      = (string)$dataDetails['address'];
                    $coinType     = (string)$dataDetails['type'];
                    $receivedTxID = (string)$dataDetails['receivedTxID'];
                    $returnAmount = (string)$dataDetails['amountReceive'];
                    $serciveFee   = (string)$dataDetails['serviceCharge'];
                    $minerFee     = (string)$dataDetails['minerAmount'];
                    $status       = (string)$dataDetails['status'];

                    $returnAmount = trim(str_replace(" USD2", "", $returnAmount));
                    $returnAmount = trim(str_replace(" USDT", "", $returnAmount));
                    $returnAmount = trim(str_replace(" BTC", "", $returnAmount));
                    $returnAmount = trim(str_replace(" ETH", "", $returnAmount));

                    $dataDisplay['command'] = $command;
                    $dataDisplay['dateTime'] = $dateTime;
                    $dataDisplay['receivedTxID'] = $receivedTxID;
                    $dataDisplay['type'] = coinconvert($coinType);
                    $dataDisplay['amount'] = $returnAmount;
                    $dataDisplay['status'] = $status;
                    $dataDisplay['address'] = $address;
                    $dataDisplay['serviceFee'] = $serciveFee;
                    $dataDisplay['minerFee'] = $minerFee;

                    break;

                case 'externalFundOutCallback':
                    $hash       = (string)$dataDetails['transactionHash'];
                    $status     = (string)$dataDetails['status'];
                    $serciveFee = (string)$dataDetails['serviceChargeDetails']['amount'];
                    $minerFee   = (string)$dataDetails['feeChargeDetails']['amount'];
                    $transactionDetails = $dataDetails['transactionDetails'];

                    $dataDisplay['command'] = $command;
                    $dataDisplay['transactionDetails'] = $transactionDetails;
                    $dataDisplay['dateTime'] = $dateTime;
                    $dataDisplay['hash'] = $hash;
                    $dataDisplay['serviceFee'] = $serciveFee;
                    $dataDisplay['minerFee'] = $minerFee;
                    $dataDisplay['status'] = $status;

                    break;

                default:
                    continue;
                    break;
            }

            /* Sample Output*/
            /* 2021-02-02 18:13:45
            receivedTxID : 0x6ead24dc2e7332e122b9f8d926a73440cc3b04cd4baeb532c709e18ec116d06f
            type : USDT
            amt : 1.574
            status : received
            add : 0x06a764c57006984d9d914170f5172abedffcf5a6 */

            $dataDisplayAry[] = $dataDisplay;
            unset($dataDisplay);
        }

        fclose($handle);

        krsort($dataDisplayAry);

        // echo "<pre>";
        // print_r($dataDisplayAry);

        // foreach ($dataDisplayAry as $display) {
        //  // $show = "<table>";
        //  switch ($display['command']) {
        //      case 'paymentGatewayCallback':
        //          $show = '<table style="font-size:18px;">';
                    // $show .= "<th colspan=3 align=left>Fund In Call Back</th>";              
        //          $show .= "<tr><td colspan=3>".$display['dateTime']."</td></tr>";
        //          $show .= "<tr><td>rTxID</td><td>:</td><td> ".$display['receivedTxID']."</td></tr>"; 
        //          $show .= "<tr><td>Type        </td><td>:</td><td> ".$display['type']."</td></tr>";  
        //          $show .= "<tr><td>Amount      </td><td>:</td><td> ".$display['amount']."</td></tr>";
        //          $show .= "<tr><td>Status      </td><td>:</td><td> ".$display['status']."</td></tr>";
        //          $show .= "<tr><td>Service Fee </td><td>:</td><td> ".$display['serviceFee']."</td></tr>";
        //          $show .= "<tr><td>Miner Fee   </td><td>:</td><td> ".$display['minerFee']."</td></tr>";
        //          $show .= "<tr><td>Address     </td><td>:</td><td> ".$display['address']."</td></tr>";
        //          $show .= "</table>";
        //          break;

        //      case 'externalFundOutCallback':
        //          $show = '<table style="font-size:18px;">';
                    // $show .= "<th colspan=3 align=left>External Fund Out Call Back</th>";            
        //          $show .= "<tr><td colspan=3>".$display['dateTime']."</td></tr>";
        //          $show .= "<tr><td>Hash</td><td>:</td><td> ".$display['hash']."</td></tr>";  
        //          $show .= "<tr><td>Service Fee</td><td>:</td><td> ".$display['serviceFee']."</td></tr>";
        //          $show .= "<tr><td>Miner Fee</td><td>:</td><td> ".$display['minerFee']."</td></tr>";
        //          $show .= "<tr><td>Status</td><td>:</td><td> ".$display['status']."</td></tr>";
                    
        //          if($display['transactionDetails']){
        //              $show .= "<tr><td>Transaction</td><td>:</td></tr>";
        //              $show .= '<tr><td></td><td colspan=3><ol style="margin:0">';
        //              $show .= "<tr><td></td><td></td><td><ol>";
           //           foreach ($display['transactionDetails'] as $transactionDetail) {
           //               $show .= "<li>";
           //               $show .= "Address: ".$transactionDetail['receiverAddress']."<br>";
           //               $show .= "Amount: ".$transactionDetail['amount'];
           //               $show .= "</li>";
           //           }
           //           $show .= "</ol></td></tr>";
        //          }
        //          $show .= "</table>";

        //          break;
                
        //      default:
        //          break;
        //  }

        //  $show .= "<br>-----------------------------------------------<br><br>";
        //  echo $show;
        // }

        function coinconvert($coin){
            switch (strtolower($coin)) {
                case 'btc':
                case 'bitcoin':
                    return 'BTC';
                    break;

                case 'usdt':
                case 'erc20':
                case 'tether':
                case 'tetherusd':
                    return 'USDT (ERC20)';
                    break;

                case 'eth':
                case 'ethereum':
                    return 'ETH';
                    break;

                case 'trc20':
                case 'tronusdt':
                case 'trx-usdt':
                    return 'USDT (TRC20)';
                    break;

                case 'fil':
                case 'filecoin':
                    return 'FIL';
                    break;

                case 'ltc':
                case 'litecoin':
                    return 'LTC';
                    break;

                default:
                    return false;
                    break;
            }
        }
    ?>

    <script type="text/javascript">
        var data = Object.values(JSON.parse(`<?php echo json_encode($dataDisplayAry); ?>`));
        // console.log(data);
        data.reverse();
        
        buildTable(data);

        $("#resetBtn").click(function(){
            $("#searchInp").val("");
        });

        $("#submitBtn").click(function(){
            var type = $("#type").val();
            var searchInp = $("#searchInp").val();

            if(type == "address") {
                var filteredArr = [];

                $.each(data,function (k,v) {

                    if(v['command'] == "externalFundOutCallback") {
                        var searchAdd = v['transactionDetails'].filter((item) => (item['receiverAddress']).indexOf(searchInp)>=0 );
                        if(searchAdd.length > 0) {
                            filteredArr.push(v);
                        }
                    }

                    if(v['command'] == "paymentGatewayCallback") {
                        if (v['address'].search(searchInp) != -1) {
                            filteredArr.push(v);
                        }
                    }

                    
                });

                // var filteredArr = data.filter((item) => item['command']=="externalFundOutCallback" );
                // filteredArr = filteredArr.filter((item) => (item['hash']).indexOf(searchInp)>=0 );
                // console.log(filteredArr);

                buildTable(filteredArr);
            }
            if(type == "hash") {

                var filteredArr = [];

                $.each(data,function (k,v) {

                    if(v['command'] == "externalFundOutCallback") {
                        if (v['hash'].search(searchInp) != -1) {
                            filteredArr.push(v);
                        }

                        if(!v['hash']){
                            var searchAdd = v['transactionDetails'].filter((item) => (item['transactionHash']).indexOf(searchInp)>=0 );
                            if(searchAdd.length > 0) {
                                filteredArr.push(v);
                            }
                        }
                    }

                    if(v['command'] == "paymentGatewayCallback") {
                        if (v['receivedTxID'].search(searchInp) != -1) {
                            filteredArr.push(v);
                        }
                    }

                    
                });

                // var filteredArr = data.filter((item) => item['command']=="externalFundOutCallback" );
                // filteredArr = filteredArr.filter((item) => (item['hash']).indexOf(searchInp)>=0 );
                // console.log(filteredArr);

                buildTable(filteredArr);
            }
        });

        function buildTable(data) {
            var appendList = "";

            if(data.length > 0) {
                $.each(data, function(k,v){

                    var title = "";

                    if(v['command'] == "paymentGatewayCallback"){
                        appendList += `
                            <div class="listWrapper">
                                <h3>Fund In Call Back</h3>
                                <p>${v['dateTime']}</p>
                                <table>
                                    <tr><th>rTxID</th><td>${v['receivedTxID']}</td></tr>
                                    <tr><th>Type</th><td>${v['type']}</td></tr>
                                    <tr><th>Amount</th><td>${v['amount']}</td></tr>
                                    <tr><th>Status</th><td>${v['status']}</td></tr>
                                    <tr><th>Service Fee</th><td>${v['serviceFee']}</td></tr>
                                    <tr><th>Miner Fee</th><td>${v['minerFee']}</td></tr>
                                    <tr><th>Address</th><td>${v['address']}</td></tr>
                                </table>
                            </div>
                        `;
                    }

                    //$show = '<table style="font-size:18px;">';
                                        // $show .= "<th colspan=3 align=left>External Fund Out Call Back</th>";            
                            //          $show .= "<tr><td colspan=3>".$display['dateTime']."</td></tr>";
                            //          $show .= "<tr><td>Hash</td><td>:</td><td> ".$display['hash']."</td></tr>";  
                            //          $show .= "<tr><td>Service Fee</td><td>:</td><td> ".$display['serviceFee']."</td></tr>";
                            //          $show .= "<tr><td>Miner Fee</td><td>:</td><td> ".$display['minerFee']."</td></tr>";
                            //          $show .= "<tr><td>Status</td><td>:</td><td> ".$display['status']."</td></tr>";
                                        
                            //          if($display['transactionDetails']){
                            //              $show .= "<tr><td>Transaction</td><td>:</td></tr>";
                            //              $show .= '<tr><td></td><td colspan=3><ol style="margin:0">';
                            //              $show .= "<tr><td></td><td></td><td><ol>";
                               //           foreach ($display['transactionDetails'] as $transactionDetail) {
                               //               $show .= "<li>";
                               //               $show .= "Address: ".$transactionDetail['receiverAddress']."<br>";
                               //               $show .= "Amount: ".$transactionDetail['amount'];
                               //               $show .= "</li>";
                               //           }
                               //           $show .= "</ol></td></tr>";
                            //          }
                            //          $show .= "</table>";
                    if(v['command'] == "externalFundOutCallback"){

                        var addressList = "";

                        if(v['transactionDetails']) {
                            $.each(v['transactionDetails'], function(k1,v1){
                                if(v1['transactionHash']){
                                    addressList += `
                                        <table class="noMargin">
                                            <tr><td>${k1+1}.</td><td>Address: </td><td>${v1['receiverAddress']}</td></tr>
                                            <tr><td></td><td>Amount: </td><td>${v1['amount']}</td></tr>
                                            <tr><td></td><td>Hash: </td><td>${v1['transactionHash']}</td></tr>
                                        </table>
                                    `;  
                                } else {
                                    addressList += `
                                        <table class="noMargin">
                                            <tr><td>${k1+1}.</td><td>Address: </td><td>${v1['receiverAddress']}</td></tr>
                                            <tr><td></td><td>Amount: </td><td>${v1['amount']}</td></tr>
                                        </table>
                                    `;
                                }
                            });
                        }

                        if(v['hash']){
                            appendList += `
                                <div class="listWrapper">
                                    <h3>External Fund Out Call Back</h3>
                                    <p>${v['dateTime']}</p>
                                    <table>
                                        <tr><th>Hash</th><td>${v['hash']}</td></tr>
                                        <tr><th>Service Fee</th><td>${v['serviceFee']}</td></tr>
                                        <tr><th>Miner Fee</th><td>${v['minerFee']}</td></tr>
                                        <tr><th>Status</th><td>${v['status']}</td></tr>
                                        <tr><th>Transaction</th><td>
                                            ${addressList}
                                        </td></tr>
                                    </table>
                                </div>
                            `;
                        } else {
                            appendList += `
                                <div class="listWrapper">
                                    <h3>External Fund Out Call Back</h3>
                                    <p>${v['dateTime']}</p>
                                    <table>
                                        <tr><th>Service Fee</th><td>${v['serviceFee']}</td></tr>
                                        <tr><th>Miner Fee</th><td>${v['minerFee']}</td></tr>
                                        <tr><th>Status</th><td>${v['status']}</td></tr>
                                        <tr><th>Transaction</th><td>
                                            ${addressList}
                                        </td></tr>
                                    </table>
                                </div>
                            `;
                        }
                    }

                    
                });
            }else{
                appendList += `
                    <div class="listWrapper">
                        <h3>No result found.</h3>
                    </div>
                `;
            }

            

            $("#appendList").html(appendList);
        }
    </script>
</body>
</html>