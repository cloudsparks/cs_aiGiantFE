<?php
    /**
     * @author TtwoWeb Sdn Bhd.
     * This file is contains the functions related to Admin user.
     * Date  21/07/2017.
    **/
	session_start();

    include ($_SERVER["DOCUMENT_ROOT"] . "/include/config.php");
	include($_SERVER["DOCUMENT_ROOT"]."/include/class.post.php");
    
    $post = new post();

	$command = $_POST['command'];

    $username   = $_SESSION['username'];
    $userId     = $_SESSION['userID'];
    $sessionID  = $_SESSION['sessionID'];

    if($_POST['type'] == 'logout'){
        session_destroy();
    }
    else{
        switch($command) {
            case "addCampaign":
                $params = array(
                    "title" => $_POST['bidTitle'],
                    "startDate" => $_POST['startDate'],
                    "numberOfDays" => $_POST['numberOfDays'],
                    "totalAmount" => $_POST['totalAmount'],
                    "profitGain" => $_POST['profit'],
                    "payoutDate" => $_POST['payout'],
                    "imgName" => $_POST['imgName'],
                    "attachmentData" => $_POST['attachmentData'],
                    "description" => $_POST['description'],
                    "invoice" => $_POST['invoice'],
                    "txid" => $_POST['txid'],
                    "showInvoice" => $_POST['showInvoice'],
                    "showTransactionID" => $_POST['showTransactionID']
                );
                $result = $post->curl($command, $params);
                
                echo $result;
                
                break;
            case "campaignSettingList":
                $params = array(
                    "searchData" => $_POST['inputData'],
                    "pageNumber" => $_POST['pageNumber']
                );
                $result = $post->curl($command, $params);
                
                echo $result;
                break;
            case "editCampaign":
                if ($_POST['action'] == 'reject') {
                    $params = array(
                        "id" => $_POST["id"],
                        "action" => $_POST["action"],
                        "remark" => $_POST["remark"],
                    );
                }else {
                    if($_POST['step'] == 1) {
                        $params = array(
                            "id" => $_POST["id"],
                            "action" => $_POST["action"],
                            "step" => $_POST['step']
                        );
                    }else {
                        $params = array(
                            "id" => $_POST["id"],
                            "action" => $_POST["action"],
                            "step" => $_POST['step'],
                            "bidTitle" => $_POST['bidTitle'],
                            "startDate" => $_POST['startDate'],
                            "numberOfDays" => $_POST['numberOfDays'],
                            "totalAmount" => $_POST['totalAmount'],
                            "availableAmount" => $_POST['availableAmount'],
                            "profit_gain" => $_POST['profit_gain'],
                            "payout_date" => $_POST['payout_date'],
                            "imageData" => $_POST['imageData'],
                            "attachmentData" => $_POST['attachmentData'],
                            "description" => $_POST['description'],
                            "invoice" => $_POST['invoice'],
                            "txid" => $_POST['txid'],
                            "showInvoice" => $_POST['showInvoice'],
                            "showTransactionID" => $_POST['showTransactionID']
                        );
                    }
                    
                }
                $result = $post->curl($command, $params);
                
                echo $result;
                break;
            case "campaignParticipationListing":
                $params = array(
                    "searchData" => $_POST['inputData'],
                    "pageNumber" => $_POST['pageNumber']
                );
                $result = $post->curl($command, $params);
                
                echo $result;
                break;
            case 'adminPayCampaignParticipation':
                $params = array(
                    "id" => $_POST["id"],
                    "step" => $_POST["step"]
                );
                $result = $post->curl($command, $params);
                
                echo $result;
                break;
            default: 
                foreach($_POST AS $key => $val){
                    if($key == "command") continue;
                    $params[$key] = $val;
                }
                $result = $post->curl($command, $params);

                echo $result;
                break;
            
        }
    }

?>