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
            
            case "getAdminList":
                
                $params = array("pageNumber" => $_POST['pageNumber'],
                                "searchData" => $_POST['inputData']
                );
                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getAdminDetails":

                $params = array("id" => $_POST['id']);
                               
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "addAdmins":
                
                $params = array("fullName" => $_POST['fullName'],
                                "username" => $_POST['username'],
                                "email"    => $_POST['email'],
                                "roleID"   => $_POST['roleID'],
                                "password" => $_POST['password'],
                                "leaderUsername" => $_POST['leaderUsername'],
                                "status"   => $_POST['status']
                               );
                                
                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "editAdmins":
                
                $params = array("id"       => $_POST['id'],
                                "fullName" => $_POST['fullName'],
                                "username" => $_POST['username'],
                                "leaderUsername" => $_POST['leaderUsername'],
                                "email"    => $_POST['email'],
                                "roleID"   => $_POST['roleID'],
                                "password"   => $_POST['password'],
                                "status"   => $_POST['status']
                                );
                                
                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getRoles":

                $params = array("searchData"     => $_POST['inputData'],
                                "getActiveRoles" => $_POST['getActiveRoles'],
                                "site"           => $_POST['site']
                               );
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "leaderLockAccount":

                $params = array("searchData"     => $_POST['inputData'],
                                "step"           => $_POST['step'],
                                "blockedList"        => $_POST['blockedList'],
                                "pageNumber"        => $_POST['pageNumber'],
                                "seeAll"            => $_POST['seeAll'],
                                "pageType"          => "lockAccount"
                               );
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "getAdminWithdrawalList":
                $params = array();
                foreach ($_POST as $key => $value) {
                    if ($key == 'command') continue;

                    $params[$key] = $value;
                }
                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getPortfolioListRebateLock":

                $params = array(
                    "pageNumber"   => $_POST['pageNumber'],
                    "searchData"   => $_POST['inputData'],
                    "seeAll" => $_POST['seeAll'],
                    "usernameSearchType" => $_POST["usernameSearchType"]
                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getPortfolioListRebateWithholding":

                $params = array(
                    "pageNumber"   => $_POST['pageNumber'],
                    "searchData"   => $_POST['inputData'],
                    "seeAll" => $_POST['seeAll'],
                    "usernameSearchType" => $_POST["usernameSearchType"]
                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getBlockMemberLoginByCountryIPandTree":

                $params = array(
                    "pageNumber"   => $_POST['pageNumber'],
                    // "searchData"   => $_POST['inputData'],
                    // "seeAll" => $_POST['seeAll'],
                    // "usernameSearchType" => $_POST["usernameSearchType"],
                    "username"   => $_POST['username']
                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getBlockMemberLoginByRegisteredCountry":

                $params = array(
                    "pageNumber"   => $_POST['pageNumber'],
                    "searchData"   => $_POST['inputData'],
                    "seeAll" => $_POST['seeAll'],
                    "usernameSearchType" => $_POST["usernameSearchType"]
                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getPromoSalesReport":

                $params = array(
                    "pageNumber"   => $_POST['pageNumber'],
                    "searchData"   => $_POST['inputData'],
                    "seeAll" => $_POST['seeAll'],
                    "usernameSearchType" => $_POST["usernameSearchType"]
                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getAdminWithdrawalListBankDetails":

                $params = array(
                    "pageNumber"   => $_POST['pageNumber'],
                    "searchData"   => $_POST['inputData'],
                    "seeAll" => $_POST['seeAll'],
                    "usernameSearchType" => $_POST["usernameSearchType"]
                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "packageCashbackList":

                $params = array(
                    "pageNumber"   => $_POST['pageNumber'],
                    "searchData"   => $_POST['inputData'],
                    "seeAll" => $_POST['seeAll']
                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "adminCancelWithdrawal":

                $params = array("withdrawalId"      => $_POST['withdrawalId'],
                                "clientId"          => $_POST['clientId']
                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getAdminClientWithdrawalDetail":

                $params = array("withdrawalId"      => $_POST['withdrawalId']
                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "approveWithdrawal":

                $params = array("withdrawalId"      => $_POST['withdrawalId'],
                                "status"            => $_POST['status'],
                                "charges"           => $_POST['charges'],
                                "remark"            => $_POST['remark'],
                                "adminId"           => $userId,
                                "adminName"         => $username
                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getActivityLogList":

                $params = array("pageNumber"   => $_POST['pageNumber'],
                                "searchData"   => $_POST['inputData'],
                                "memberId"     => $_POST['memberId'],
                                "usernameSearchType" => $_POST["usernameSearchType"]
                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getLanguageTranslationList":

                $params = array("pageNumber" => $_POST['pageNumber'],
                                "searchData" => $_POST['searchData']
                                //search data inside will be below
                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getLanguageTranslationData":

                $params = array("id"      => $_POST['id'] );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "editLanguageTranslationData":

                $params = array("id"          => $_POST['id'],
                                "contentCode" => $_POST['contentCode'],
                                "module"      => $_POST['module'],
                                "language"    => $_POST['language'],
                                "site"        => $_POST['site'],
                                "category"    => $_POST['category'],
                                "content"     => $_POST['content']
                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getMemberAccList":

                $params = array(
                    "searchData" => $_POST['inputData'],
                    "creditType" => $_POST['creditType'],
                    "pageNumber" => $_POST['pageNumber'],
                    "usernameSearchType" => $_POST["usernameSearchType"]
                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getTransactionHistory":

                $params = array(
                    "id"         => $_POST['memberId'],
                    "creditType" => $_POST['creditType'],
                    "pageNumber" => $_POST['pageNumber'],
                    "pageType"   => $_POST['pageType'],
		    "flag"   => $_POST['flag'],
                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getMemberBalanceAdmin":

                $params = array("id"         => $_POST['id'],
                                "creditType" => $_POST['creditType']
                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "editAdjustmentDetailAdmin":

                $params = array("id"               => $_POST['id'],
                                "creditType"       => $_POST['creditType'],
                                "adjustmentType"   => $_POST['adjustmentType'],
                                "adjustmentAmount" => $_POST['adjustmentAmount'],
                                "remark"           => $_POST['remark']
                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "transferCreditAdmin":

                $params = array("creditType"       => $_POST['creditType'],
                                "clientId"       => $_POST['id'],
                                "receiverUsername" => $_POST['receiverUsername'],
                                "amount"   => $_POST['transferAmount'],
                                "remark"           => $_POST['remark'],
                                "type"             => 2
                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "transferCreditConfirmationAdmin":

                $params = array("creditType"       => $_POST['creditType'],
                                "clientId"       => $_POST['id'],
                                "receiverUsername" => $_POST['receiverUsername'],
                                "amount"   => $_POST['transferAmount'],
                                "remark"           => $_POST['remark'],
                                "type"             => 2
                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getWithdrawalDetailAdmin":

                $params = array("creditType"            => $_POST['creditType'],
                                "clientId"              => $_POST['id']    
                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "addNewWithdrawalAdmin":

                $params = array("clientId"              => $_POST['id'],
                                "amount"                => $_POST['amount'],
                                "countryID"             => $_POST['country'],
                                "bankId"                => $_POST['bankId'],
                                "accountNumber"         => $_POST['accountNumber'],
                                "branch"                => $_POST['branch'],
                                "creditType"            => $_POST['creditType']
                );

                $result = $post->curl($command, $params);

                echo $result;
                break;
            case "addNewWithdrawalByAddress":
            	unset($_POST['command']);
                $result = $post->curl("memberAddNewWithdrawalConfirmation", $_POST);
                echo $result;
            	break;
            case "getClientPortfolioList":

                $params = array("searchData"        => $_POST['searchData'],
                                "pageNumber"        => $_POST['pageNumber'],
                                "clientId"          => $_POST['clientId'],
                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getMemberList":
                
                $params = array (
                                    "searchData" => $_POST['inputData'],
                                    "pageNumber" => $_POST['pageNumber']
                                );
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "getMemberDetails":

                $params = array("memberId"          => $_POST['memberId']

                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getRankMaintain":

                $params = array("clientID"          => $_POST['clientId']);

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "updateRankMaintain":

                $params = array("clientID"          => $_POST['clientId'],
                                "bonusName"         => $_POST['bonusName'],
                                "percentage"        => $_POST['percentage'],
                                "rank_id"           => $_POST['rank_id'],

                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getInvoiceList":

                $params = array("searchData"        => $_POST['searchData'],
                                "offsetSecs"        => $_POST['offsetSecs'],
                                "pageNumber"        => $_POST['pageNumber'],
                                "usernameSearchType" => $_POST["usernameSearchType"]

                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getPortfolioList":
                $params = array();
                foreach ($_POST as $key => $value) {
                    if ($key == 'command') continue;

                    $params[$key] = $value;
                }
                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getSwapTransaction":

                $params = array("searchData"        => $_POST['searchData'],
                                "pageNumber"        => $_POST['pageNumber'],
                                "seeAll"            => $_POST['seeAll']
                );

                if($_POST['fromByLeader']) $params['fromByLeader'] = $_POST['fromByLeader'];
                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getInvoiceDetail":

                $params = array("invoiceId"         => $_POST['invoiceId']

                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getPinList":

                $params = array("searchData"        => $_POST['searchData'],
                                "offsetSecs"        => $_POST['offsetSecs'],
                                "pageNumber"        => $_POST['pageNumber']

                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getPinDetail":

                $params = array("pinId"             => $_POST['pinId']

                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "updatePinDetail":

                $params = array("pinId"             => $_POST['pinId'],
                                "status"            => $_POST['status']

                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getPinPurchaseFormDetail":

                $params = array();

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "checkProductAndGetClientCreditType":

                $params = array("productIdList"     => $_POST['productIdList'],
                                "clientId"          => $_POST['clientId']

                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "purchasePin":

                $params = array("products"          => $_POST['products'],
                                "buyerId"           => $_POST['buyerId'],
                                "wallets"           => $_POST['wallets'],
                                "tPassword"         => $_POST['tPassword']

                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getProductDetail":

                $params = array("searchData"        => $_POST['searchData'],
                                "offsetSecs"        => $_POST['offsetSecs'],
                                "pageNumber"        => $_POST['pageNumber']

                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getExchangeRateList":

                $params = array("offsetSecs"        => $_POST['offsetSecs'],
                                "pageNumber"        => $_POST['pageNumber']

                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "editExchangeRate":

                $params = array("countryID"         => $_POST['countryID'],
                                "exchangeRate"      => $_POST['exchangeRate'],
                                "buyRate"           => $_POST['buyRate'],

                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getUnitPriceList":

                $params = array("offsetSecs"        => $_POST['offsetSecs'],
                                "pageNumber"        => $_POST['pageNumber']

                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "addUnitPrice":

                $params = array("unitPrice"         => $_POST['unitPrice'],
                                "creatorId"         => $userId

                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getTicketList":

                $params = array("searchData"        => $_POST['searchData'],
                                "offsetSecs"        => $_POST['offsetSecs'],
                                "pageNumber"        => $_POST['pageNumber']

                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getTicketDetail":

                $params = array("searchData"        => $_POST['searchData'],
                                "offsetSecs"        => $_POST['offsetSecs'],
                                "pageNumber"        => $_POST['pageNumber'],
                                "ticketId"          => $_POST['ticketId']

                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "replyTicket":

                $params = array("senderId"          => $_POST['senderId'],
                                "ticketId"          => $_POST['ticketId'],
                                "message"           => $_POST['message']

                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "updateTicketStatus":

                $params = array("status"            => $_POST['status'],
                                "ticketId"          => $_POST['ticketId']

                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "changeMemberPassword":
                $params = array(
                                    "clientID"           => $_POST['memberId'],
                                    "passwordType"       => $_POST['passwordType'],
                                    "newPassword"        => $_POST['newPassword']
                                );
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "getCustomerServiceMemberDetails":

                $params = array("clientID"  => $_POST['memberId']);

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getLanguageCodeList":

                $searchData = $_POST['searchData'];
                // $searchData = json_encode($searchData);
                $params = array(
                    "searchData" => $searchData,
                    "pageNumber" => $_POST['pageNumber']
                );
                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getLanguageCodeData":

                $params = array(
                    "id" => $_POST['languageCodeId']
                );
                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "editLanguageCodeData":

                $params = array(
                    "id"            => $_POST['id'],
                    "language"      => $_POST['language'],
                    "content"       => $_POST['content']
                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getMemberLoginDetail":

                $params = array(
                    "memberId"          => $_POST['memberId'],
                    // "loginToMemberURL"  => $config['loginToMemberURL'],
                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getWhoIsOnlineList":

                $params = array();

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getClientRightsList":

                $params = array(
                    "clientId"          => $_POST['clientId'],
                    "pageType"          => $_POST['pageType']
                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "lockAccount":

                $params = array(
                    "clientId"          => $_POST['clientId'],
                    "blockedList"       => $_POST['blockedList']
                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "deleteRole":
                $deleteData = $_POST['deleteData'];
                $params = array("id" => $deleteData);
                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "addRole":
                $params = array("roleName" => $_POST['roleName'],
                    "description" => $_POST['description'],
                    "status" => $_POST['status'],
                    "site" => $_POST['site']
                );
                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getRoleDetails":
                $params = array("id" => $_POST['editId']
                );
                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "editRole":
                $params = array("id" => $_POST['roleID'],
                    "roleName" => $_POST['roleName'],
                    "description" => $_POST['description'],
                    "status" => $_POST['status']
                );
                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getPaymentMethodList":
                $params = array ("inputData" => $_POST['inputData'],
                                "pageNumber" => $_POST['pageNumber']
                                );
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "getPaymentMethodDetails":

                $params = array("id" => $_POST['id']);
                               
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

             case "editPaymentMethod":
                
                $params = array("id"       => $_POST['id'],
                                "payment_type" => $_POST['payment_type'],
                                "credit_type" => $_POST['credit_type'],
                                "min_percentage"    => $_POST['min_percentage'],
                                "max_percentage"   => $_POST['max_percentage'],
                                "status"   => $_POST['status']
                                );
                                
                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "deletePaymentMethod":
                $deleteData = $_POST['deleteData'];
                $params = array("id" => $deleteData);
                $result = $post->curl($command, $params);

                echo $result;
                break;


            case "getPaymentSettingDetails":
                // $params = array ("inputData" => $_POST['inputData'],
                //                 "pageNumber" => $_POST['pageNumber']
                //                 );
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "addPaymentMethod":
                
                $params = array("paymentType" => $_POST['paymentType'],
                                "creditType" => $_POST['creditType'],
                                "minPercentage"    => $_POST['minPercentage'],
                                "maxPercentage" => $_POST['maxPercentage'],
                                "status"   => $_POST['status']
                               );
                                
                $result = $post->curl($command, $params);

                echo $result;
                break;


            case "getInboxUnreadMessage":
                $params = array ();
                               
                $result = $post->curl($command, $params);

                $result = json_decode($result, true);

                $unread = $result['data']['inboxUnreadMessage'];
                $_SESSION["unreadMessage"] = $unread;
                
                $result = json_encode($result);

                
                echo $result;
                break;


            case "getCoinSwapAdminCharges":
                $params = array ();
                               
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "updateSwapCoinAdminFee":
                $params = array("percentage" => $_POST["percentage"]);
                               
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "getCZOBasePrice":
                $params = array ();
                               
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "updateCZOBasePrice":
                $params = array("basePrice" => $_POST["basePrice"]);
                               
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "getWithdrawalAdminFeeDetail":
                $params = array("creditType" => $_POST["creditType"]);
                               
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "updateWithdrawalAdminFees":
                $params = array("creditType" => $_POST["creditType"],
                                "percentage" => $_POST["percentage"],
                                "minFees"    => $_POST["minFees"]);
                               
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "getWithdrawalUnreadCount":
                $params = array ();
                               
                $result = $post->curl($command, $params);

                $result = json_decode($result, true);

                $withdrawalNotification = $result['data']['withdrawalUnreadCount'];
                $_SESSION["withdrawalNotification"] = $withdrawalNotification;
                
                $result = json_encode($result);

                
                echo $result;
                break;

            case "getBonusPayoutSummary":

                foreach($_POST AS $key => $val){
                    if($key == "command") continue;
                    $params[$key] = $val;
                }
                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "updateWithdrawalStatus":
                $params = array(
                    "checkedIDs" => $_POST["checkedIDs"],
                    "status" => $_POST["status"],
                    "remark" => $_POST["remark"]
                );
                               
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "updateRebateLock":
                $params = array(
                    "checkedIDs" => $_POST["checkedIDs"],
                    "status" => $_POST["status"]
                );
                               
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "updateRebateWithholdingCredit":
                $params = array(
                    "checkedIDs" => $_POST["checkedIDs"],
                    "status" => $_POST["status"]
                );
                               
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "setBlockMemberLoginByCountryIPandTree":
                $params = array(
                    "checkedIDs" => $_POST["checkedIDs"],
                    "status" => $_POST["status"],
                    "username"=>$_POST["username"]
                );
                               
                $result = $post->curl($command, $params);
                
                echo $result;
                break;
            case "setBlockMemberLoginByRegisteredCountry":
                $params = array(
                    "checkedIDs" => $_POST["checkedIDs"],
                    "status" => $_POST["status"]
                );
                               
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "getNotificationUserList":
                
                $params = array("pageNumber" => $_POST['pageNumber'],
                                "inputData" => $_POST['inputData']
                );
                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "addNotificationUser":
                
                $params = array("name" => $_POST['name'],
                                "dialCode" => $_POST['dialCode'],
                                "phone" => $_POST['phone']
                );
                $result = $post->curl($command, $params);

                echo $result;
                break;
            
            case "updateNotificationUser":
                
                $params = array("id" => $_POST['id']
                );
                $result = $post->curl($command, $params);

                echo $result;
                break;  

             case "updateStakeLimit":
                
                $params = array("country" => $_POST['country'],
                                "clientUsername" => $_POST['clientUsername'],
                                "minStake" => $_POST['minStake'],
                                "maxStake" => $_POST['maxStake'],
                                "leaderUsername" => $_POST['leaderUsername']

                );
                if($_POST['status']) $params['status'] = $_POST['status'];

                $result = $post->curl($command, $params);

                echo $result;
                break;  
            
            case "getCountriesList":
                $params = array();
                foreach ($_POST as $key => $value) {
                    if ($key == 'command') continue;
                    $params[$key] = $value;
                }

                $result = $post->curl($command, $params);

                echo $result;
                break; 


            case "getKnowYourClientList":
                
                $params = array(
                    "clientId" => $userId,
                    "inputData" => $_POST['inputData'],
                    "pageNumber" => $_POST['pageNumber'],
                    "site" => $_POST["site"]
                );
                $result = $post->curl($command, $params);

                echo $result;
                break; 
            

            case "getImageByID":
                
                $params = array(
                    "clientId" => $userId,
                    "imageID" => $_POST['imageID']
                );
                $result = $post->curl($command, $params);

                echo $result;
                break; 
            

            case "updateKnowYourClient":
                
                $params = array(
                    "clientId" => $userId,
                    "kycID" => $_POST['kycID'],
                    "status" => $_POST['status'],
                    "remark" => $_POST['remark']
                );
                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "setSwapRules":
                
                $params = array(
                    "change_type" => $_POST['change_type'],
                    "swap_type" => $_POST['swap_type'],
                    "amount" => $_POST['amount'],
                    "price_change" => $_POST['price_change']
                );
                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "startStake": 

                $params = array(
                    "username" => $_POST['username'],
                    "amount" => $_POST['amount']
                    
                );
                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getTrendSetting": 

                $params = array();
                
                $result = $post->curl($command, $params);

                echo $result;
                break;

            
            case "setTrendSetting":
                
                $params = array(
                    "buy_volume" => $_POST['buy_volume'],
                    "sell_volume" => $_POST['sell_volume'],
                    "buy_percentage" => $_POST['buy_percentage'],
                    "sell_percentage" => $_POST['sell_percentage']
                );
                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "setLeader":
                
                $params = array(
                    "type" => $_POST['type'],
                    "username" => $_POST['username']
                );
                $result = $post->curl($command, $params);

                echo $result;
                break; 


            case "getLeaderList":
                
                $params = array();
                $result = $post->curl($command, $params);

                echo $result;
                break; 


            case "getSalesListing":
                
                $params = array("searchData"     => $_POST['searchData'],
                                "pageNumber"   => $_POST['pageNumber'],
                                "seeAll"       => $_POST['seeAll']
                                );
                $result = $post->curl($command, $params);

                echo $result;
                break; 

              case "freezeTrendSetting":
                
                $params = array("switch"     => $_POST['switch']);
                $result = $post->curl($command, $params);

                echo $result;
                break; 

             case "getFundInHistoryList":
                
                $params = array("searchData"     => $_POST['searchData'],
                                "pageNumber"   => $_POST['pageNumber'],
                                "seeAll"       => $_POST['seeAll']
                                );
                $result = $post->curl($command, $params);

                echo $result;
                break; 


            //  case "getFundInListing":
                
                // $params = array("searchData"     => $_POST['searchData'],
                //                 "pageNumber"   => $_POST['pageNumber'],
                //                 "seeAll"       => $_POST['seeAll'],
                //                 "usernameSearchType" => $_POST["usernameSearchType"]
                //                 );
                // $result = $post->curl($command, $params);

                // echo $result;
                // break; 

             case "getAdminFundInListing":
                
                $params = array("searchData"     => $_POST['searchData'],
                                "pageNumber"   => $_POST['pageNumber'],
                                "seeAll"       => $_POST['seeAll']
                                );
                $result = $post->curl($command, $params);

                echo $result;
                break; 

            case "getStakeLimitList":
                
                $params = array("searchData"     => $_POST['searchData'],
                                "pageNumber"   => $_POST['pageNumber'],
                                "seeAll"       => $_POST['seeAll']
                                );
                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "quantumMaintenanceListing":
                
                $params = array("searchData"     => $_POST['searchData'],
                                "pageNumber"   => $_POST['pageNumber'],
                                "seeAll"       => $_POST['seeAll'],
                                "usernameSearchType" => $_POST["usernameSearchType"]
                                );
                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "adminFundInSearchMember":
                
                $params = array(
                    "username"     => $_POST['username']
                );
                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "adminAdjustFundIn":
                
                $params = array(
                    "clientID" => $_POST['clientID'],
                    "creditType" => $_POST['creditType'],
                    "adjustmentAmount" => $_POST['adjustmentAmount'],
                    "remark" => $_POST['remark'],
                    "step" => $_POST['step']
                );
                $result = $post->curl($command, $params);

                echo $result;
                break;

              case "adminChangePassword":

                $params = array("currentPassword"      => $_POST['currentPassword'],
                                "newPassword"          => $_POST['newPassword'],
                                "newPasswordConfirm"      => $_POST['newPasswordConfirm']
                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

              case "adminUpdateEstimatedDate":

                $params = array("checkedIDs"          => $_POST['checkedIDs'],
                                "estimated_date"      => $_POST['estimated_date']
                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

              case "batchUpdateWithdrawalStatus":

              	foreach($_POST AS $key => $val){
              		if($key == "command") continue;
              		$params[$key] = $val;
              	}
                $result = $post->curl($command, $params);

                echo $result;
                break;

              case "adminSetIBGTRate":

                $params = array("rate"          => $_POST['rate']);

                $result = $post->curl($command, $params);

                echo $result;
                break;

              case "adminSetIBGTRateList":

                $params = array(
                    "searchData"     => $_POST['inputData'],
                    "pageNumber"   => $_POST['pageNumber'],
                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

              case "loadRedeemPrize":
                    
                $params = array ();
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

              case "prizeListing":
                // $params = array();
                $params = array("searchData"     => $_POST['inputData'],
                                "pageNumber"   => $_POST['pageNumber'],
                                "seeAll"       => $_POST['seeAll'],
                                "usernameSearchType" => $_POST["usernameSearchType"]
                                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

               case "updateRedeemPrizeStatus":
                $params = array(
                    "checkedIDs" => $_POST["checkedIDs"],
                    "status" => $_POST["status"],
                    "remark" => $_POST["remark"]
                );
                               
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "pumpPromoSales":
                $params = array(
                    "clientID" => $_POST["clientID"],
                    "amount" => $_POST["amount"],
                    "type" => $_POST["type"]
                );
                               
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

              case "getLeadershipRankReport":
                
                $params = array("searchData"     => $_POST['inputData'],
                                "pageNumber"   => $_POST['pageNumber'],
                                "seeAll"       => $_POST['seeAll']
                                );
                $result = $post->curl($command, $params);

                echo $result;
                break; 

             case "setBlockClientBonus":
                
                $params = array(
                    "type" => $_POST['type'],
                    "username" => $_POST['username'],
                    "blockType" => $_POST['blockType']
                );
                $result = $post->curl($command, $params);

                echo $result;
                break; 

              case "getBlockClientBonusList":
                
                $params = array();
                $result = $post->curl($command, $params);

                echo $result;
                break; 

            case "getEmallCategory":
                
                $params = array();
                $result = $post->curl($command, $params);

                echo $result;
                break; 

            case "getEmallOrderList":
                
                // $params = array();
                $params = array(
                    "searchData"        => $_POST['inputData'],
                    "pageNumber"        => $_POST['pageNumber'],
                    "seeAll"            => $_POST['seeAll'],
                    "isGetFormOption"   => $_POST['isGetFormOption'],
                    "usernameSearchType"=> $_POST['usernameSearchType'],
                );
                $result = $post->curl($command, $params);

                echo $result;
                break;

            // case "getTerminationListing":
                
            //     // $params = array();
            //     $params = array(
            //         "searchData"        => $_POST['searchData'],
            //         "pageNumber"        => $_POST['pageNumber'],
            //         "seeAll"            => $_POST['seeAll'],
            //         "flag"              => $_POST['flag']
            //     );
            //     $result = $post->curl($command, $params);

            //     echo $result;
            //     break;

            case "adminUpdateEmallOrder":
                
                // $params = array();
                $params = array(
                    "checkedIDs"        => $_POST['checkedIDs'],
                    "status"            => $_POST['status'],
                );
                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "addExcelReq":
                $params = array("command"     => $_POST['API'],
                                "type"        => 'excel',
                                "titleKey"    => $_POST['titleKey'],
                                "params"      => $_POST['params'],
                                "headerAry"   => $_POST['headerAry'],
                                "totalAry"   => $_POST['totalAry'],
                                "keyAry"      => $_POST['keyAry'],
                                "fileName"    => $_POST['fileName'],
                                // "flag"    => $_POST['flag'],

                );

                $result = $post->curl($command, $params);
                echo $result;
                break;

            case "purchasePinVerification":

                foreach($_POST AS $key => $val){
                    if($key == "command") continue;
                    $params[$key] = $val;
                }
                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "purchasePinConfirmation":
            case "adminRunBonus":
            case "adminResetBonus":
            case "getBonusProcessList":
            case "insertUnitPrice":
            case "getFundInListing":
            case "getTerminationListing":
            case "actionForTerminatePortfolio":

                foreach($_POST AS $key => $val){
                    if($key == "command") continue;
                    $params[$key] = $val;
                }
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

            // case "getAdminWithdrawalListBankDetails":
                
            //     $params = array("searchData"     => $_POST['searchData'],
            //                     "pageNumber"   => $_POST['pageNumber']
            //                     );
            //     $result = $post->curl($command, $params);

            //     echo $result;
            //     break;
        }
    }
?>
