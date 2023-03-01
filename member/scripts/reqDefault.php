<?php
/**
* @author TtwoWeb Sdn Bhd.
* Date  29/08/2018.
**/
session_start();

include($_SERVER["documentIDENT_ROOT"]."/language/lang_all.php");
include($_SERVER["DOCUMENT_ROOT"]."/include/config.php");
include($_SERVER["DOCUMENT_ROOT"]."/include/class.post.php");
include($_SERVER["DOCUMENT_ROOT"].'/include/class.cryptDes.php');
        
$post = new post();
$crypt = new cryptDes();
$command = $_POST['command'];
$username   = $_SESSION['username'];
$userId     = $_SESSION['userID'];
$sessionID  = $_SESSION['sessionID'];

if($_POST['type'] == 'logout') {
    session_destroy();
}
else {

    switch($command) {

        case "getTs":
            $myTimeZone = date_default_timezone_get();
            date_default_timezone_set($myTimeZone);
            $date = new DateTime();
            $serverTimeZone = date_offset_get($date);
            $currentTime = strtotime("now");

            $data->currentTime = $currentTime;
            $data->serverTimeZone = $serverTimeZone;

            $result = json_encode($data);

            echo $result;

            break;

        case "recordPerformance":

            $params["usedTime"] = $_POST["usedTime"];
            $params["eventSection"] = $_POST["eventSection"];
            $params["domainName"] = $_SERVER["HTTP_HOST"];
            $params["registerUsername"] = $_POST["username"];
            $params["package"] = $_POST["package"];

            $result = $post->curl($command, $params);

            $result = json_decode($result,true);

            if ($result['sessionData']['newSessionID']) {
                $_SESSION["sessionID"] = $result['sessionData']['newSessionID'];
                $_SESSION["sessionExpireTime"] = $result['sessionData']['timeOut'];
            }

            if ($result["code"] == 5 || $result["code"] == 3){
                setcookie("marcajeData", "", time() - 3600, "/",NULL,TRUE,TRUE);
            }

            $result = json_encode($result);
            echo $result;

        break;

        case "documentDownload":

            $params = array (
                'documentID' => $_POST['documentID']
            );

            $result = $post->curl($command, $params);

            $result = json_decode($result, true);

            $data = $result['data'];
            $fileName = $data['download']['fileName'];
            $fileData = base64_decode($data['download']['fileData']);

            $ext = pathinfo($fileName, PATHINFO_EXTENSION);
            header("Content-Type: {'".$ext."'}");
            header("Content-Transfer-Encoding: base64");
            header("Content-Disposition: attachment; filename=$fileName");
            flush();
            ob_end_clean();
            echo $fileData;
            flush();
            ob_end_clean();
            unlink($fileName);

            break;

        case "getInboxUnreadMessage":
            $params = array ();

            $result = $post->curl($command, $params);

            $result = json_decode($result,true);

            $unread = $result['data']['inboxUnreadMessage'];
            $_SESSION["unreadMessage"] = $unread;

            if ($result['sessionData']['newSessionID']) {
                $_SESSION["sessionID"] = $result['sessionData']['newSessionID'];
                $_SESSION["sessionExpireTime"] = $result['sessionData']['timeOut'];
            }

            if ($result["code"] == 5 || $result["code"] == 3){
                setcookie("marcajeData", "", time() - 3600, "/",NULL,TRUE,TRUE);
            }

            $result = json_encode($result);


            echo $result;
            break;

        case "newsDownload":
            $params = array (
                'announcementID' => $_POST['announcementID']
            );

            $result = $post->curl($command, $params);
            $result = json_decode($result, true);

            $data = $result['data'];
            $fileName = $data['download']['attachment_name'];
            $fileData = base64_decode($data['download']['base_64']);
            $ext = pathinfo($fileName, PATHINFO_EXTENSION);

            header("Content-Type: {'".$ext."'}");
            header("Content-Transfer-Encoding: base64");
            header("Content-Disposition: attachment; filename=$fileName");
            flush();
            ob_end_clean();
            echo $fileData;
            flush();
            ob_end_clean();
            unlink($fileName);
            break;

        case "getTreeSponsor":

            $params = array(
                'clientID' => $_POST['clientID'],
                'username' => $_POST['username'],
                'realClientID' => $userId
            );
            $result = $post->curl($command, $params);

            $result = json_decode($result,true);

            if ($result['sessionData']['newSessionID']) {
                $_SESSION["sessionID"] = $result['sessionData']['newSessionID'];
                $_SESSION["sessionExpireTime"] = $result['sessionData']['timeOut'];
            }

            if ($result["code"] == 5 || $result["code"] == 3){
                setcookie("marcajeData", "", time() - 3600, "/",NULL,TRUE,TRUE);
            }

            $result = json_encode($result);

            echo $result;
            break;

        case "getTreePlacement":

            $params = array (
                'clientID' => $_POST['clientID'],
                'depthLevel' => $_POST['depthLevel'],
                'realClientID' => $userId,
                'username' => $_POST['username']
            );
            $result = $post->curl($command, $params);

            $result = json_decode($result,true);

            if ($result['sessionData']['newSessionID']) {
                $_SESSION["sessionID"] = $result['sessionData']['newSessionID'];
                $_SESSION["sessionExpireTime"] = $result['sessionData']['timeOut'];
            }

            if ($result["code"] == 5 || $result["code"] == 3){
                setcookie("marcajeData", "", time() - 3600, "/",NULL,TRUE,TRUE);
            }

            $result = json_encode($result);

            echo $result;
            break;

        case "getSponsorTreeVerticalView":
            $params = array (
                "clientID" => $_POST['clientId'],
                "targetID" => $_POST['targetId']?$_POST['targetId']:$_POST['clientId'],
                "targetUsername" => $_POST['targetUsername'],
                "viewType" => $_POST['viewType']
            );

            $result = $post->curl($command, $params);

            $result = json_decode($result,true);

            if ($result['sessionData']['newSessionID']) {
                $_SESSION["sessionID"] = $result['sessionData']['newSessionID'];
                $_SESSION["sessionExpireTime"] = $result['sessionData']['timeOut'];
            }

            if ($result["code"] == 5 || $result["code"] == 3){
                setcookie("marcajeData", "", time() - 3600, "/",NULL,TRUE,TRUE);
            }

            $result = json_encode($result);

            echo $result;
            break;

        case "getSponsorTreeTextView":

                $params = array(
                    'clientID' => $_POST['clientID'],
                    'username' => $_POST['username']
                );
                $result = $post->curl($command, $params);

            $result = json_decode($result,true);

            if ($result['sessionData']['newSessionID']) {
                $_SESSION["sessionID"] = $result['sessionData']['newSessionID'];
                $_SESSION["sessionExpireTime"] = $result['sessionData']['timeOut'];
            }

            if ($result["code"] == 5 || $result["code"] == 3){
                setcookie("marcajeData", "", time() - 3600, "/",NULL,TRUE,TRUE);
            }

            $result = json_encode($result);

                echo $result;
                break;

        case "getPlacementTreeVerticalView":
            $params = array (
                "clientID" => $_POST['clientId'],
                "targetID" => $_POST['targetId']?$_POST['targetId']:$_POST['clientId'],
                "username" => $_POST['username'],
                "viewType" => $_POST['viewType']
            );

            $result = $post->curl($command, $params);

            $result = json_decode($result,true);

            if ($result['sessionData']['newSessionID']) {
                $_SESSION["sessionID"] = $result['sessionData']['newSessionID'];
                $_SESSION["sessionExpireTime"] = $result['sessionData']['timeOut'];
            }

            if ($result["code"] == 5 || $result["code"] == 3){
                setcookie("marcajeData", "", time() - 3600, "/",NULL,TRUE,TRUE);
            }

            $result = json_encode($result);

            echo $result;
            break;

        case "getClientIntroductionDetails":
            $params = array(
                      "encrypt_code" => $_POST['encrypt_code'],
            );

            $result = $post->curl($command, $params);

            $result = json_decode($result,true);

            if ($result['sessionData']['newSessionID']) {
                $_SESSION["sessionID"] = $result['sessionData']['newSessionID'];
                $_SESSION["sessionExpireTime"] = $result['sessionData']['timeOut'];
            }

            if ($result["code"] == 5 || $result["code"] == 3){
                setcookie("marcajeData", "", time() - 3600, "/",NULL,TRUE,TRUE);
            }

            $result = json_encode($result);

            if($config["isLocalHost"]){
                $resultEncode = $result;
            }else{
                $resultDecode = json_decode($result,true);
                $resultDecode['data']["encryptedUsername"] = $crypt->encrypt($resultDecode['data']["username"]);
                $resultEncode = json_encode($resultDecode);
            }

            echo $resultEncode;
            break;


        case "decodeUsername":
            $referralUsername = $_POST['qr'];
            if(!$config["isLocalHost"]){
                $crypt = new cryptDes();
                $encryptedUsername = $referralUsername;
                $referralUsername = $crypt->decrypt($referralUsername);
            }

            echo $referralUsername;
            break;

        case "getProductList":
            $params = array(
              "getProductLimit" => 1,
              "subscription" => 1
            );

            $result = $post->curl($command, $params);

            $result = json_decode($result,true);

            if ($result['sessionData']['newSessionID']) {
                $_SESSION["sessionID"] = $result['sessionData']['newSessionID'];
                $_SESSION["sessionExpireTime"] = $result['sessionData']['timeOut'];
            }

            if ($result["code"] == 5 || $result["code"] == 3){
                setcookie("marcajeData", "", time() - 3600, "/",NULL,TRUE,TRUE);
            }

            $result = json_encode($result);
            echo $result;
            break;

        case "verifyTransactionPassword":
            $params = array (
                "tPassword" => $_POST["tPassword"],
                "clientID" => $userId
            );

            $result = $post->curl($command, $params);

            $result = json_decode($result,true);

            if ($result["status"]=='ok') {
                $_SESSION["ReportTransactionPassword"] = 1;
            }

            if ($result['sessionData']['newSessionID']) {
                $_SESSION["sessionID"] = $result['sessionData']['newSessionID'];
                $_SESSION["sessionExpireTime"] = $result['sessionData']['timeOut'];
            }

            if ($result["code"] == 5 || $result["code"] == 3){
                setcookie("marcajeData", "", time() - 3600, "/",NULL,TRUE,TRUE);
            }

            $result = json_encode($result);
            // print_r($params);
            echo $result;
            break;


        case 'getBankAccountDetailMember': 
        case 'updateClientAutoRenewStatus':
        case 'addTicket': 
        case 'addBankAccountDetailMember': 
        case 'getWithdrawalData': 
        case 'memberAddNewWithdrawal': 
        case 'memberAddNewWithdrawalConfirmation': 
        case 'documentDownloadList': 
        case 'getInvoiceList': 
        case 'getInvoiceDetail': 
        case 'getInboxListing': 
        case 'getInboxMessages': 
        case 'addInboxMessages': 
        case 'getUnreadAnnoucement': 
        case 'getInboxUnreadMessage': 
        case 'getCreditData': 
        case 'getAvailableCreditWalletAddress': 
        case 'addWalletAddress': 
        case 'getWalletAddressListing': 
        case 'inactiveWalletAddress': 
        case 'getDocumentAnnouncementUnreadMessage': 
        case 'getNavBarDetails': 
        case 'getCreditData':
        case 'convertCreditVerify':
        case 'convertCreditConfirmation':
        case 'newsDisplay':
        case 'verifyTransactionPassword':
        case 'getPortfolioList':
        case 'getWithdrawalListing':
        case 'memberCancelWithdrawal':
        case 'getMemberDetails':
        case 'updateWithdrawalStatus':
        case 'activatePortfolio':
        case 'refundPortfolio':
        case 'getPortfolioReturnListing':
        case 'getRegistrationDetailMember':
        case 'getSurveyQuestionAnswer':
        case 'publicRegistration':
        case 'publicRegistrationConfirmation':
        case 'getCreditData':
        case 'updateMemberUpline':
        case 'manageClientIntroductionDetails':
        case 'getTheNuxTransactionToken':
        case 'insertTheNuxFundInTransactionID':
        case 'reentryVerification':
        case 'reentryConfirmation':
        case 'getFundInListing':
        case 'requestPortfolioTermination':
        case 'getKYCDetails':
        case 'addKYC':
        case 'memberRegistration':
        case 'memberRegistrationConfirmation':
        case 'getRebateBonusReport':
        case 'getPairingBonusReport':
        case 'getWaterBucketBonusReport':
        case 'getGoldmineBonusReport':
        case 'getReleaseBonusReport':
        case 'memberChangePassword':
        case 'memberChangeTransactionPassword':
        case 'getMemberDetails':
        case 'editMemberDetails':
        case 'getMinMaxPayableByCredit':
        case 'memberReentryVerification':
        case 'memberReentryConfirmation':
        case 'verifyClientSponsor':
        case 'getRegistrationDetailMember':
        case 'publicRegistration':
        case 'publicRegistrationConfirmation':
        case 'sendOTPCode':
        case 'memberResetPassword':
        case 'resetSuccessPassword':
        case 'getPendingRewardList':
        case 'returnPendingCredit':
        case 'getLeadershipBonusReport':
        case 'getInstanReferalBonusListing':
        case 'getRebateBonusListing':
        case 'getBuilderBonusReport':
        case 'getTransactionHistory':
        case 'memberTransferCredit':
        case 'memberTransferCreditConfirmation':
        case 'getBankAccountDetail':
        case 'addBankAccountDetail':
        case 'getBankAccountListMember':
        case 'inactiveBankAccount':
        case 'getClientActivity':
        case 'verifySecuritySettings':
        case 'getCapitalRedemptionListing':
        case 'terminatePortfolio':
        case 'updateMemberDetails':
        case 'getContractList':
        case 'getRebateBonusContractReport':
        case 'getSponsorBonusContractReport':
        case 'getMemberContractSubPortfolio':
        case 'updateTrancheActivationVerification':
        case 'updateTrancheActivationConfirmation':
        case 'getRebateBonusContractSubReport': 
        case 'getTraderBonusContractSubReport': 
        case 'getJulyPromoRewardDetails':  
        case 'getJulyPromoListing':  
        case 'redeemPointJulyPromo':  
        case 'getDividendBonusReport':
        case 'campaignDividendReport':
        case 'getAugustRankPromo2022Report':  
        case 'getTeamsBonusReport':
        case 'getLoyaltyBonusReport':
        case 'getDirectReferalBonusReport':
        case 'getManagementBonusReport':
        case 'getThirdPartyMatchReport':
        case 'getThirdPartyTradePairReport':
        case 'requestTerminatePortfolio':
        case 'memberUpdateLockDays':
        case 'getCryptoOrderData':
        case 'getCryptoOrderPurchaseList':
        case 'sendCryptoOrderRequest':
        case 'getWorldCupEventList':
        case 'getGoogleAuth':
        case 'getGoogleAuthDisable':
        case 'paypal':

            $params = array ("clientID" => $userId);

            foreach($_POST AS $key => $val){
                if($key == "command") continue;
                $params[$key] = $val;
            }
            $result = $post->curl($command, $params);

            $result = json_decode($result,true);

            if ($result['sessionData']['newSessionID']) {
                $_SESSION["sessionID"] = $result['sessionData']['newSessionID'];
                $_SESSION["sessionExpireTime"] = $result['sessionData']['timeOut'];
            }

            if ($result["code"] == 5 || $result["code"] == 3){
                setcookie("marcajeData", "", time() - 3600, "/",NULL,TRUE,TRUE);
            }

            $result = json_encode($result);

            echo $result;
            break;

        case 'getMT4TradeReport':
            $params = array ("accountID" => $userId);

            foreach($_POST AS $key => $val){
                if($key == "command") continue;
                $params[$key] = $val;
            }
            $result = $post->curl($command, $params);

            $result = json_decode($result,true);

            if ($result['sessionData']['newSessionID']) {
                $_SESSION["sessionID"] = $result['sessionData']['newSessionID'];
                $_SESSION["sessionExpireTime"] = $result['sessionData']['timeOut'];
            }

            if ($result["code"] == 5 || $result["code"] == 3){
                setcookie("marcajeData", "", time() - 3600, "/",NULL,TRUE,TRUE);
            }

            $result = json_encode($result);

            echo $result;
            break;

        case 'getDashboard':
            $params = array ("clientID" => $userId);

            foreach($_POST AS $key => $val){
                if($key == "command") continue;
                $params[$key] = $val;
            }
            $result = $post->curl($command, $params);

            $result = json_decode($result,true);

            if ($result['sessionData']['newSessionID']) {
                $_SESSION["sessionID"] = $result['sessionData']['newSessionID'];
                $_SESSION["sessionExpireTime"] = $result['sessionData']['timeOut'];
            }

            if ($result['data']['userRankStatus']) {
                $_SESSION["userRankStatus"] = $result['data']['userRankStatus'];
            }

            if ($result["code"] == 5 || $result["code"] == 3){
                setcookie("marcajeData", "", time() - 3600, "/",NULL,TRUE,TRUE);
            }

            $result = json_encode($result);

            echo $result;
            break;

        case 'enrollCampaign':

            foreach($_POST AS $key => $val){
                if($key == "command") continue;
                $params[$key] = $val;
            }
            $result = $post->curl($command, $params);

            $result = json_decode($result,true);

            if ($result['sessionData']['newSessionID']) {
                $_SESSION["sessionID"] = $result['sessionData']['newSessionID'];
                $_SESSION["sessionExpireTime"] = $result['sessionData']['timeOut'];
            }

            if ($result["code"] == 5 || $result["code"] == 3){
                setcookie("marcajeData", "", time() - 3600, "/",NULL,TRUE,TRUE);
            }

            $result = json_encode($result);

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
