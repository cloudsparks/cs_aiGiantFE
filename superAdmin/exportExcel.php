<?php

    session_start();
    setlocale(LC_ALL, "US");

    include($_SERVER["DOCUMENT_ROOT"]."/include/class.post.php");
    include($_SERVER["DOCUMENT_ROOT"]."/language/lang_all.php");
    include($_SERVER["DOCUMENT_ROOT"]."/include/PHPExcel.php");
    include($_SERVER["DOCUMENT_ROOT"]."/include/PHPExcel/Writer/Excel2007.php");
    $post = new post();

    // Create new PHPExcel object
    $objPHPExcel = new PHPExcel();

    $params = array('inputData' => $_POST['inputData'],
                    'searchData' => $_POST['inputData'],
                    // 'username' => $_POST['username'],
                    'type'=>'export',
                    'seeAll'=>'1'
                    );
    
    $json = $post->curl($_POST['command'], $params);
    $result = json_decode($json, true);

    $dataKey = $_POST['DataKey'];
    $dataReturn = $result ['data'][$dataKey];
    $timeStamp = $result ['data']['lastTimeStamp'];
    if(!$timeStamp) $timeStamp = time();
    // $result ['data']['bonusList'];

    $headerArr = $_POST['header'] ? $_POST['header'] : $result ['data']['headerArr'] ;
    $dataKeyArr = $result ['data']['headerArr'] ;

    $objPHPExcel->setActiveSheetIndex(0);
    $excelRow = 0;
// print_r($dataReturn);
// print_r($result ['data']['headerArr']);
// exit();
    // /* grand total bonus list */
    // foreach ($grandTotalList as $bonusName => $bonusRow) {

    //     $alphaRow = A;
    //     $excelRow++;
    //     $objPHPExcel->getActiveSheet()->SetCellValue($alphaRow++.$excelRow, $bonusRow['bonusName']);
    //     $objPHPExcel->getActiveSheet()->SetCellValue($alphaRow++.$excelRow, $bonusRow['totalBonus']);

    // }

    $excelRow += 1;
    $alphaRow = A;

    /* header bonus list */
    foreach ($headerArr as $headerRow) {
        $objPHPExcel->getActiveSheet()->SetCellValue($alphaRow++.$excelRow, $headerRow);
    }
    foreach ($dataReturn as $key => $data) {
        $excelRow++;
        $alphaRow = A;

        foreach ($dataKeyArr as $dataKey) {
            // if(strlen($data[$dataKey]) > 13) 
                $objPHPExcel->getActiveSheet()->setCellValueExplicit($alphaRow++.$excelRow, $data[$dataKey], PHPExcel_Cell_DataType::TYPE_STRING);
            // else $objPHPExcel->getActiveSheet()->SetCellValue($alphaRow++.$excelRow, $data[$dataKey]);
                // if($dataKey == 'amount')print_r($data[$dataKey]); 
        }
    }
    if($_POST['command'] == "getPortfolioList"){
        // $grandTotal = $result ['data']['grandTotal'];
        $excelRow++;
        // $objPHPExcel->getActiveSheet()->SetCellValue("J".$excelRow, "Grand Total");
        if(strlen($grandTotal) > 13) $objPHPExcel->getActiveSheet()->setCellValueExplicit("K".$excelRow, $grandTotal, PHPExcel_Cell_DataType::TYPE_STRING);
        else $objPHPExcel->getActiveSheet()->SetCellValue("K".$excelRow, $grandTotal);
    }

    if($_POST['command'] == "getBalanceReport"){
        $grandTotal = $result ['data']['grandTotal'];
        $excelRow++;
        $objPHPExcel->getActiveSheet()->SetCellValue("B".$excelRow, "Total");
        if(strlen($grandTotal['bitcoin']) > 13) $objPHPExcel->getActiveSheet()->setCellValueExplicit("C".$excelRow, $grandTotal['bitcoin'], PHPExcel_Cell_DataType::TYPE_STRING);
        else $objPHPExcel->getActiveSheet()->SetCellValue("C".$excelRow, $grandTotal['bitcoin']);
        if(strlen($grandTotal['bitcoinCash']) > 13) $objPHPExcel->getActiveSheet()->setCellValueExplicit("D".$excelRow, $grandTotal['bitcoinCash'], PHPExcel_Cell_DataType::TYPE_STRING);
        else $objPHPExcel->getActiveSheet()->SetCellValue("D".$excelRow, $grandTotal['bitcoinCash']);
        if(strlen($grandTotal['ethereum']) > 13) $objPHPExcel->getActiveSheet()->setCellValueExplicit("E".$excelRow, $grandTotal['ethereum'], PHPExcel_Cell_DataType::TYPE_STRING);
        else $objPHPExcel->getActiveSheet()->SetCellValue("E".$excelRow, $grandTotal['ethereum']);
        if(strlen($grandTotal['litecoin']) > 13) $objPHPExcel->getActiveSheet()->setCellValueExplicit("F".$excelRow, $grandTotal['litecoin'], PHPExcel_Cell_DataType::TYPE_STRING);
        else $objPHPExcel->getActiveSheet()->SetCellValue("F".$excelRow, $grandTotal['litecoin']);
        if(strlen($grandTotal['tether']) > 13) $objPHPExcel->getActiveSheet()->setCellValueExplicit("G".$excelRow, $grandTotal['tether'], PHPExcel_Cell_DataType::TYPE_STRING);
        else $objPHPExcel->getActiveSheet()->SetCellValue("G".$excelRow, $grandTotal['tether']);
        if(strlen($grandTotal['czoCredit']) > 13) $objPHPExcel->getActiveSheet()->setCellValueExplicit("H".$excelRow, $grandTotal['czoCredit'], PHPExcel_Cell_DataType::TYPE_STRING);
        else $objPHPExcel->getActiveSheet()->SetCellValue("H".$excelRow, $grandTotal['czoCredit']);
        if(strlen($grandTotal['ripple']) > 13) $objPHPExcel->getActiveSheet()->setCellValueExplicit("I".$excelRow, $grandTotal['ripple'], PHPExcel_Cell_DataType::TYPE_STRING);
        else $objPHPExcel->getActiveSheet()->SetCellValue("I".$excelRow, $grandTotal['ripple']);
        if(strlen($grandTotal['augur']) > 13) $objPHPExcel->getActiveSheet()->setCellValueExplicit("J".$excelRow, $grandTotal['augur'], PHPExcel_Cell_DataType::TYPE_STRING);
        else $objPHPExcel->getActiveSheet()->SetCellValue("J".$excelRow, $grandTotal['augur']);
        if(strlen($grandTotal['stellar']) > 13) $objPHPExcel->getActiveSheet()->setCellValueExplicit("K".$excelRow, $grandTotal['stellar'], PHPExcel_Cell_DataType::TYPE_STRING);
        else $objPHPExcel->getActiveSheet()->SetCellValue("K".$excelRow, $grandTotal['stellar']);
    }
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    ob_start();
    $objWriter->save('php://output');
    $excelOutput = ob_get_clean();
    $rawFile = base64_encode($excelOutput);

    $filename = $_POST['filename']."_".$timeStamp.".xlsx";
    $fileData = base64_decode($rawFile);

    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    header("Content-Type: {'".$ext."'}");
    header("Content-Transfer-Encoding: base64");
    header("Content-Disposition: attachment; filename=$filename");
    flush();
    ob_end_clean();
    echo $fileData;
    flush();
    ob_end_clean();
    unlink($filename);
    
?>
