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

    $raw_body = "\n".date("Y-m-d H:i:s")."\t";
    $raw_body .= file_get_contents('php://input');

    $file = 'log/cryptoOrderCallback_'.date("Y-m-d").'.log';
    file_put_contents($file, $raw_body, FILE_APPEND);

    $command = $dataArray['command'];
    $dataArray1 = $dataArray['params'];

    switch ($command) {
        case 'buySellCryptoCallback':
            $referenceID   = (string)$dataArray1['reference_id'];
            $returnStatus  = (string)$dataArray1['status'];
            $returnType    = (string)$dataArray1['type'];
            $paymentID     = (string)$dataArray1['payment_id'];
            $cryptoSymbol  = (string)$dataArray1['crypto_symbol'];
            $cryptoAmount  = (string)$dataArray1['crypto_amount'];
            $fiatSymbol    = (string)$dataArray1['fiat_symbol'];
            $fiatAmount    = (string)$dataArray1['fiat_amount'];
            $txnToken      = (string)$dataArray1['transaction_token'];

            $returnAmount = trim(str_replace(" USD2", "", $returnAmount));
            $returnAmount = trim(str_replace(" USDT", "", $returnAmount));
            $returnAmount = trim(str_replace(" BTC", "", $returnAmount));
            $returnAmount = trim(str_replace(" ETH", "", $returnAmount));
            $returnAmount = trim(str_replace(" TRX-USDT", "", $returnAmount));

            $params = array(
                        "transaction_token" => $txnToken,
                        "fiat_amount" => $fiatAmount,
                        "fiat_symbol" => $fiatSymbol,
                        "crypto_amount" => $cryptoAmount,
                        "crypto_symbol" => $cryptoSymbol,
                        "payment_id" => $paymentID,
                        "status" => $returnStatus,
                        "reference_id" => $referenceID,
                        "type" => $returnType
                    );

            // if($returnStatus == 'success' || $returnStatus == 'received'){
            $result =  array('status' => "ok", 'code' => 0, 'statusMsg' => 'Received "'.$returnStatus.'" Status Call Back"', 'data' => "");
            $apiResult = $post->curl("cryptoOrderCallBack", $params);
            // }
            break;
        
        default:
            $result =  array('status' => "ok", 'code' => 0, 'statusMsg' => 'Undefined Command', 'data' => "");
            break;
    }

    echo json_encode($result);
    
?>