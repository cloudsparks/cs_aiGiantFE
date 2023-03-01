<?php
    
    header('P3P: CP="CAO PSA OUR"');
    header('Content-Type: text/html; charset=utf-8');

    // include($_SERVER["DOCUMENT_ROOT"].'/include/class.post.php');
    include_once('include/class.post.php');
    $post = new post();

    unset($dataArray);
    $dataArray = json_decode($GLOBALS['HTTP_RAW_POST_DATA'],true); //can also use file_get_contents('php://input')

    if(count($dataArray)<=0){
        $dataArray = json_decode(file_get_contents('php://input'),true);
    }

    /*Received Call Back*/

    //{"command":"paymentGatewayCallback","params":{"receivedTxID":"0xb8ae917dc6c23410977e0a8cb425abec0fcda40f11427148db47962fd01091db1","referenceID":"2197269","txDetails":{"input":[{"receivedTxID":"0xb8ae917dc6c23410977e0a8cb425abec0fcda40f11427148db47962fd01091db1","amount":"2509.000000","unit":"USDT","type":"tetherUSD","exchangeRate":"1.00052141","referenceID":2197269,"charges":{"amount":0,"unit":"USDT","type":"tetherUSD","exchangeRate":"1.00052141"},"minerFee":{"amount":0,"unit":"USDT","type":"tetherUSD","exchangeRate":"1.00052141"},"ethMinerFee":{"amount":0,"unit":"ETH","type":"ethereum","exchangeRate":"463.22624166"}}],"output":[{"destination":{"amount":0,"unit":"USDT","type":"tetherUSD","exchangeRate":"1.00052141"},"charges":{"amount":0,"unit":"USDT","type":"tetherUSD","exchangeRate":"1.00052141"},"minerFee":{"amount":0,"unit":"USDT","type":"tetherUSD","exchangeRate":"1.00052141"},"ethMinerFee":{"amount":0,"unit":"ETH","type":"ethereum","exchangeRate":"463.22624166"}}]},"txID":"","amount":"2509 USDT","amountReceive":"2509 USDT","serviceCharge":"0 USDT","minerAmount":"0 USDT","address":"0x07c9c44317188a59fa915540beb243559c9d06cb","status":"received","transactionDate":"0","transactionUrl":"","type":"tetherUSD","sender":{"internal":"","external":"0x2819c144d5946404c0516b6f817a960db37d4929"},"recipient":{"internal":"","external":""},"creditDetails":{"amountDetails":{"amount":"2509000000","unit":"USDT","rate":"1000000","type":"tetherUSD"},"amountReceiveDetails":{"amount":"2509000000","unit":"USDT","rate":"1000000","type":"tetherUSD"},"serviceChargeDetails":{"amount":0,"unit":"USDT","rate":"1000000","type":"tetherUSD"},"minerAmountDetails":{"amount":0,"unit":"USDT","rate":"1000000","type":"tetherUSD"},"ethMinerAmountDetails":{"amount":0,"unit":"ETH","rate":"1000000000000000000","type":"ethereum"},"exchangeRate":{"USD":"1.00052141"},"ethExchangeRate":{"USD":"463.22624166"}}}}


    /*Pending Call Back*/
    // {"command":"paymentGatewayCallback","params":{"receivedTxID":"0xb8ae917dc6c23410977e0a8cb425abec0fcda40f11427148db47962fd01091db1","referenceID":"2197269","txDetails":{"input":[{"receivedTxID":"0xb8ae917dc6c23410977e0a8cb425abec0fcda40f11427148db47962fd01091db1","amount":"2509.000000","unit":"USDT","type":"tetherUSD","exchangeRate":"1.0005214100","referenceID":2197269,"charges":{"amount":"12.545000","unit":"USDT","type":"tetherUSD","exchangeRate":"1.00047718"},"minerFee":{"amount":"3.915958","unit":"USDT","type":"tetherUSD","exchangeRate":"1.00047718"},"ethMinerFee":{"amount":"0.008460000000000000","unit":"ETH","type":"ethereum","exchangeRate":"463.26483391"}}],"output":[{"destination":{"amount":"2492.539042","unit":"USDT","type":"tetherUSD","exchangeRate":"1.00047718"},"charges":{"amount":"12.545000","unit":"USDT","type":"tetherUSD","exchangeRate":"1.00047718"},"minerFee":{"amount":"3.915958","unit":"USDT","type":"tetherUSD","exchangeRate":"1.00047718"},"ethMinerFee":{"amount":"0.008460000000000000","unit":"ETH","type":"ethereum","exchangeRate":"463.26483391"}}]},"txID":"0x7fd174a5b96701d44acd11e339e10a9c1427178d566935287bb45ee3b37a14041111111","amount":"2492.539042 USDT","amountReceive":"2509 USDT","serviceCharge":"12.545 USDT","minerAmount":"3.915958 USDT","address":"0x07c9c44317188a59fa915540beb243559c9d06cb","status":"pending","transactionDate":"0","transactionUrl":"0x7fd174a5b96701d44acd11e339e10a9c1427178d566935287bb45ee3b37a14041111111","type":"tetherUSD","sender":{"internal":"","external":"0x2819c144d5946404c0516b6f817a960db37d4929"},"recipient":{"internal":"","external":"0xb948597e52d4518b97aCAf88810ecB5BF991f99C"},"creditDetails":{"amountDetails":{"amount":2492539042,"unit":"USDT","rate":"1000000","type":"tetherUSD"},"amountReceiveDetails":{"amount":"2509000000","unit":"USDT","rate":"1000000","type":"tetherUSD"},"serviceChargeDetails":{"amount":"12545000","unit":"USDT","rate":"1000000","type":"tetherUSD"},"minerAmountDetails":{"amount":"3915958","unit":"USDT","rate":"1000000","type":"tetherUSD"},"ethMinerAmountDetails":{"amount":"8460000000000000","unit":"ETH","rate":"1000000000000000000","type":"ethereum"},"exchangeRate":{"USD":"1.00047718"},"ethExchangeRate":{"USD":"463.26483391"}}}}


    /*Success Call Back*/

    //{"command":"paymentGatewayCallback","params":{"receivedTxID":"0xb8ae917dc6c23410977e0a8cb425abec0fcda40f11427148db47962fd01091db1","referenceID":"2197269","txDetails":{"input":[{"receivedTxID":"0xb8ae917dc6c23410977e0a8cb425abec0fcda40f11427148db47962fd01091db1","amount":"2509.000000","unit":"USDT","type":"tetherUSD","exchangeRate":"1.0005214100","referenceID":2197269,"charges":{"amount":"12.545000","unit":"USDT","type":"tetherUSD","exchangeRate":"1.00052520"},"minerFee":{"amount":"0.287468","unit":"USDT","type":"tetherUSD","exchangeRate":"1.00052520"},"ethMinerFee":{"amount":"0.002250000000000000","unit":"ETH","type":"ethereum","exchangeRate":"463.26101278"}}],"output":[{"destination":{"amount":"2492.539042","unit":"USDT","type":"tetherUSD","exchangeRate":"1.00052520"},"charges":{"amount":"12.545000000000000000","unit":"USDT","type":"tetherUSD","exchangeRate":"1.00052520"},"minerFee":{"amount":"0.287468","unit":"USDT","type":"tetherUSD","exchangeRate":"1.00052520"},"ethMinerFee":{"amount":"0.002250000000000000","unit":"ETH","type":"ethereum","exchangeRate":"463.26101278"}}]},"txID":"0x7fd174a5b96701d44acd11e339e10a9c1427178d566935287bb45ee3b37a14041111111","amount":"2492.539042 USDT","amountReceive":"2509 USDT","serviceCharge":"12.545 USDT","minerAmount":"0.287468 USDT","address":"0x07c9c44317188a59fa915540beb243559c9d06cb","status":"success","transactionDate":"2020-11-13 11:23:49","transactionUrl":"https:\/\/etherscan.io\/tx\/0x7fd174a5b96701d44acd11e339e10a9c1427178d566935287bb45ee3b37a14041111111","type":"tetherUSD","sender":{"internal":"","external":"0x2819c144d5946404c0516b6f817a960db37d4929"},"recipient":{"internal":"","external":"0xb948597e52d4518b97aCAf88810ecB5BF991f99C"},"creditDetails":{"amountDetails":{"amount":"2492539042","unit":"USDT","rate":"1000000","type":"tetherUSD","exchangeRate":{"USD":"1.00052520"}},"amountReceiveDetails":{"amount":"2509000000","unit":"USDT","rate":"1000000","type":"tetherUSD","exchangeRate":{"USD":"1.00052520"}},"serviceChargeDetails":{"amount":"12545000","unit":"USDT","rate":"1000000","type":"tetherUSD","exchangeRate":{"USD":"1.00052520"}},"minerAmountDetails":{"amount":"287468","unit":"USDT","rate":"1000000","type":"tetherUSD","exchangeRate":{"USD":"1.00052520"}},"ethMinerAmountDetails":{"amount":"2250000000000000","unit":"ETH","rate":"1000000000000000000","type":"ethereum","exchangeRate":{"USD":0}},"exchangeRate":{"USD":"1.00052520"},"ethExchangeRate":{"USD":0}}}}

    $raw_body = "\n".date("Y-m-d H:i:s")."\t";
    $raw_body .= file_get_contents('php://input');

    $file = 'log/theNuxCallBack.log';
    file_put_contents($file, $raw_body, FILE_APPEND);

    $command = $dataArray['command'];
    $dataArray1 = $dataArray['params'];

    switch ($command) {
        case 'paymentGatewayCallback':
            $referenceID = (string)$dataArray1['referenceID'];
            $returnAddress = (string)$dataArray1['address'];
            $returnCurrency = (string)$dataArray1['type'];
            $returnHash = (string)$dataArray1['txID'];
            $receivedTxID = (string)$dataArray1['receivedTxID'];
            $returnAmount = (string)$dataArray1['amountReceive'];
            $returnStatus = (string)$dataArray1['status'];
            $exchangeRate = (string)$dataArray1['creditDetails']['exchangeRate']['USD'];

            $returnAmount = trim(str_replace(" USD2", "", $returnAmount));
            $returnAmount = trim(str_replace(" USDT", "", $returnAmount));
            $returnAmount = trim(str_replace(" BTC", "", $returnAmount));
            $returnAmount = trim(str_replace(" ETH", "", $returnAmount));
            $returnAmount = trim(str_replace(" TRX-USDT", "", $returnAmount));

            $params = array(
                        "receivedTxID" => $receivedTxID,
                        "referenceID" => $referenceID,
                        "walletAddress" => $returnAddress,
                        "transactionHash" => $returnHash,
                        "receivedAmount" => $returnAmount,
                        "returnCurrency" => $returnCurrency,
                        "originalData" => json_encode($dataArray),
                        "status" => $returnStatus,
                        "exchangeRate"  => $exchangeRate,
                    );

            // if($returnStatus == 'success' || $returnStatus == 'received'){
            $result =  array('status' => "ok", 'code' => 0, 'statusMsg' => 'Received "'.$returnStatus.'" Status Call Back"', 'data' => "");
            $apiResult = $post->curl("theNuxFundInCallBack", $params);
            // }
            break;

        case 'externalFundOutCallback':
            $referenceID = (string)$dataArray1['referenceID'];
            $returnHash = (string)$dataArray1['transactionHash'];
            $returnStatus = (string)$dataArray1['status'];
            $returnAmountDetails = $dataArray1['amountDetails'];
            $returnServiceChargeDetails = $dataArray1['serviceChargeDetails'];
            $returnFeeChargeDetails = $dataArray1['feeChargeDetails'];
            $transactionDetails = $dataArray1['transactionDetails'];

            $params = array(
                            "returnData" => $dataArray,
                            "referenceID" => $referenceID,
                            "transactionHash" => $returnHash,
                            "status" => $returnStatus,
                            "amountDetails" => $returnAmountDetails,
                            "serviceChargeDetails" => $returnServiceChargeDetails,
                            "feeChargeDetails" => $returnFeeChargeDetails,
                            "transactionDetails" => $transactionDetails
                        );


            $result =  array('status' => "ok", 'code' => 0, 'statusMsg' => 'Received "'.$returnStatus.'" Status Call Back"', 'data' => "");
            if(in_array($returnStatus, array('confirmed', 'success', 'failed'))){
                $apiResult = $post->curl("theNuxFundOutCallback", $params);
            }
            break;
        
        default:
            echo 'Undefined Command';
            break;
    }

    echo json_encode($result);
    
?>