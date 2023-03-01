<?php
    /**
     * @author TtwoWeb Sdn Bhd.
     * Date  30/03/2017.
    **/
	session_start();

    include ($_SERVER["DOCUMENT_ROOT"]."/include/config.php");
	include($_SERVER["DOCUMENT_ROOT"]."/include/class.post.php");
    
    $post = new post();

	$command = $_POST['command'];

    $username   = $_SESSION['username'];
    $userID     = $_SESSION['userID'];
    $sessionID  = $_SESSION['sessionID'];

    if($_POST['type'] == 'logout') {
        session_destroy();
    }
    else {

        switch($command) {
            
            case "getAnnouncementList":
                    
                $params = array(
                    'pageNumber' => $_POST['pageNumber'],
                    'searchData' => $_POST['inputData']
                );
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "addAnnouncement":

                // $imageTempName = $_FILES['image']['tmp_name'];
                // $attachmentTempName = $_FILES['attachment']['tmp_name'];

                // if(!empty($imageTempName) && is_uploaded_file($imageTempName)) {
                //     $fileData = file_get_contents($imageTempName);
                //     $imageBase64 = base64_encode($fileData);
                // }
                // if(!empty($attachmentTempName) && is_uploaded_file($attachmentTempName)) {
                //     $fileData = file_get_contents($attachmentTempName);
                //     $attachmentBase64 = base64_encode($fileData);
                // }
                $params = array();
                foreach ($_POST as $key => $value) {
                    if ($key == 'command') continue;
                    $params[$key] = $value;
                }
                $params['clientID'] = $userID;

                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "getAnnouncement":
                    
                $params = array('id' => $_POST['id']);
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "editAnnouncement":
                $params = array();
                foreach ($_POST as $key => $value) {
                    if ($key == 'command') continue;
                    $params[$key] = $value;
                }
                $params['clientID'] = $userID;

                // if($_POST['imageFlag']) {
                //     $imageTempName = $_FILES['image']['tmp_name'];

                //     if(!empty($imageTempName) && is_uploaded_file($imageTempName)) {
                //         $fileData = file_get_contents($imageTempName);
                //         $imageBase64 = base64_encode($fileData);
                //     }
                //     $params['imageData'] = $imageBase64;
                //     $params['imageType'] = $_FILES['image']['type'];
                //     $params['imageName'] = $_FILES['image']['name'];
                // }

                // if($_POST['attachmentFlag']) {
                //     $attachmentTempName = $_FILES['attachment']['tmp_name'];

                //     if(!empty($attachmentTempName) && is_uploaded_file($attachmentTempName)) {
                //         $fileData = file_get_contents($attachmentTempName);
                //         $attachmentBase64 = base64_encode($fileData);
                //     }
                //     $params['attachmentData'] = $attachmentBase64;
                //     $params['attachmentType'] = $_FILES['attachment']['type'];
                //     $params['attachmentName'] = $_FILES['attachment']['name'];
                // }

                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "removeAnnouncement":
                    
                $params = array('id' => $_POST['id']);
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "getMemoList":

                $params = array(
                    'pageNumber' => $_POST['pageNumber'],
                    'searchData' => $_POST['inputData']
                );
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "addMemo":
                foreach ($_POST as $key => $value) {
                    if ($key == 'command') continue;
                    $params[$key] = $value;
                }
                $params['clientID'] = $userID;

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getMemo":
                    
                $params = array('id' => $_POST['id']);
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "editMemo":
                $params = array();
                foreach ($_POST as $key => $value) {
                    if ($key == 'command') continue;
                    $params[$key] = $value;
                }
                $params['clientID'] = $userID;
                
                // if($_POST['imageFlag']) {
                //     $imageTempName = $_FILES['image']['tmp_name'];

                //     if(!empty($imageTempName) && is_uploaded_file($imageTempName)) {
                //         $fileData = file_get_contents($imageTempName);
                //         $imageBase64 = base64_encode($fileData);
                //     }

                //     $params['imageData'] = $imageBase64;
                //     $params['imageType'] = $_FILES['image']['type'];
                //     $params['imageName'] = $_FILES['image']['name'];
                // }

                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "removeMemo":
                    
                $params = array('id' => $_POST['id']);
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "getDocumentList":

                $params = array(
                    'pageNumber' => $_POST['pageNumber'],
                    'searchData' => $_POST['inputData']
                );
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "addDocument":

                $params = array();
                foreach ($_POST as $key => $value) {
                    if ($key == 'command') continue;
                    $params[$key] = $value;
                }
                $params['clientID'] = $userID;

                $result = $post->curl($command, $params);
                
                echo $result;
                
                break;

            case "getDocument":
                    
                $params = array('id' => $_POST['id']);
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "editDocument":

                foreach ($_POST as $key => $value) {
                    if ($key == 'command') continue;
                    $params[$key] = $value;
                }
                $params['clientID'] = $userID;

                $result = $post->curl($command, $params);
                
                echo $result;
                
                break;

            case "removeDocument":
                    
                $params = array('id' => $_POST['id']);
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "massChangePassword":

                $tmpName = $_FILES['excel']['tmp_name'];
                if(!empty($tmpName) && is_uploaded_file($tmpName)) {
                    $fileData = file_get_contents($tmpName);
                    $base64 = base64_encode($fileData);
                }
                $params = array (
                                    'tmpName' => $tmpName,
                                    'type' => $_FILES['excel']['type'],
                                    'name' => $_FILES['excel']['name'],
                                    'base64' => $base64,
                                    'clientID' => $userID
                                );
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "getImportData":
            
                $params = array(
                    'pageNumber' => $_POST['pageNumber'],
                    'type' => $_POST['type'],
                    'searchData' => $_POST['inputData']
                );
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "getImportDataDetails":

                $params = array(
                    'id' => $_POST['id'],
                    'pageNumber' => $_POST['pageNumber'],
                    'inputData' => $_POST['inputData'],
                );
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "adminBatchRegistration":

                $tmpName = $_FILES['excel']['tmp_name'];
                if(!empty($tmpName) && is_uploaded_file($tmpName)) {
                    $fileData = file_get_contents($tmpName);
                    $base64 = base64_encode($fileData);
                }
                $params = array (
                                    'tmpName' => $tmpName,
                                    'type' => $_FILES['excel']['type'],
                                    'name' => $_FILES['excel']['name'],
                                    'base64' => $base64,
                                    'clientID' => $userID
                                );
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "adminSpecialBatchRegistration":

                $tmpName = $_FILES['excel']['tmp_name'];
                if(!empty($tmpName) && is_uploaded_file($tmpName)) {
                    $fileData = file_get_contents($tmpName);
                    $base64 = base64_encode($fileData);
                }
                $params = array (
                                    'tmpName' => $tmpName,
                                    'type' => $_FILES['excel']['type'],
                                    'name' => $_FILES['excel']['name'],
                                    'base64' => $base64,
                                    'clientID' => $userID,
                                    'package' => $_POST['package'],
                                    'portfolioType' => $_POST['portfolioType']
                                );
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "adminBatchUnlock":

                $tmpName = $_FILES['excel']['tmp_name'];
                if(!empty($tmpName) && is_uploaded_file($tmpName)) {
                    $fileData = file_get_contents($tmpName);
                    $base64 = base64_encode($fileData);
                }
                $params = array (
                                    'tmpName' => $tmpName,
                                    'type' => $_FILES['excel']['type'],
                                    'name' => $_FILES['excel']['name'],
                                    'base64' => $base64,
                                    'clientID' => $userID,
                                    'rightsType' => $_POST['rightsType'],
                                    'adjustType' => $_POST['adjustType']
                                );
                $result = $post->curl($command, $params);
                
                echo $result;
                break;
 
            case "adminBatchCreditAdjustment":

                $tmpName = $_FILES['excel']['tmp_name'];
                if(!empty($tmpName) && is_uploaded_file($tmpName)) {
                    $fileData = file_get_contents($tmpName);
                    $base64 = base64_encode($fileData);
                }
                $params = array (
                                    'tmpName' => $tmpName,
                                    'type' => $_FILES['excel']['type'],
                                    'name' => $_FILES['excel']['name'],
                                    'base64' => $base64,
                                    'clientID' => $userID,
                                    'adjustType' => $_POST['adjustType'],
                                    'creditType' => $_POST['creditType']
                                );
                $result = $post->curl($command, $params);
                
                echo $result;
                break; 

            case "adminBatchSetRank":

                $tmpName = $_FILES['excel']['tmp_name'];
                if(!empty($tmpName) && is_uploaded_file($tmpName)) {
                    $fileData = file_get_contents($tmpName);
                    $base64 = base64_encode($fileData);
                }
                $params = array (
                                    'tmpName' => $tmpName,
                                    'type' => $_FILES['excel']['type'],
                                    'name' => $_FILES['excel']['name'],
                                    'base64' => $base64,
                                    'clientID' => $userID,
                                    'bonusName' => $_POST['bonusName']
                                );
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

             case "adminBatchStatusAdjustment":

                $tmpName = $_FILES['excel']['tmp_name'];
                if(!empty($tmpName) && is_uploaded_file($tmpName)) {
                    $fileData = file_get_contents($tmpName);
                    $base64 = base64_encode($fileData);
                }
                $params = array (
                                    'tmpName' => $tmpName,
                                    'type' => $_FILES['excel']['type'],
                                    'name' => $_FILES['excel']['name'],
                                    'base64' => $base64,
                                    'clientID' => $userID
                                );
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

               case "adminBatchAddWaterBucket":

                $tmpName = $_FILES['excel']['tmp_name'];
                if(!empty($tmpName) && is_uploaded_file($tmpName)) {
                    $fileData = file_get_contents($tmpName);
                    $base64 = base64_encode($fileData);
                }
                $params = array (
                                    'tmpName' => $tmpName,
                                    'type' => $_FILES['excel']['type'],
                                    'name' => $_FILES['excel']['name'],
                                    'base64' => $base64,
                                    'clientID' => $userID
                                );
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "adminBatchUpdateWithdrawal":

                $tmpName = $_FILES['excel']['tmp_name'];
                if(!empty($tmpName) && is_uploaded_file($tmpName)) {
                    $fileData = file_get_contents($tmpName);
                    $base64 = base64_encode($fileData);
                }
                $params = array (
                                    'tmpName' => $tmpName,
                                    'type' => $_FILES['excel']['type'],
                                    'name' => $_FILES['excel']['name'],
                                    'base64' => $base64,
                                    'clientID' => $userID,
                                    // 'adjustType' => $_POST['adjustType'],
                                    // 'creditType' => $_POST['creditType']
                                );
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "getCreditType":
                $params = array('isShowMainWallet' => $_POST['isShowMainWallet']);
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "getBatchSetRankDetail":
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
        }
    }
?>
