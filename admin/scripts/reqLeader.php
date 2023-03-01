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
            
            case "getLeaderSettingListing":
                
                foreach ($_POST as $key => $value) {
                    if($key == 'command') continue;
                    $params[$key] = $value;
                }
                $result = $post->curl($command, $params);

                echo $result;
                break;
            case "setLeaderSetting":
                
                foreach ($_POST as $key => $value) {
                    if($key == 'command') continue;
                    $params[$key] = $value;
                }
                $params['creatorID'] = $userId;
                $result = $post->curl($command, $params);

                echo $result;
                break;        
            case "updateLeaderSetting":
                
                foreach ($_POST as $key => $value) {
                    if($key == 'command') continue;
                    $params[$key] = $value;
                }
                $params['updaterID'] = $userId;
                $result = $post->curl($command, $params);

                echo $result;
                break;
            case "getLeaderSetting":
                
                foreach ($_POST as $key => $value) {
                    if($key == 'command') continue;
                    $params[$key] = $value;
                }
                $result = $post->curl($command, $params);

                echo $result;
                break;
            case "getLeaderSettingListByType":
                
                foreach ($_POST as $key => $value) {
                    if($key == 'command') continue;
                    $params[$key] = $value;
                }
                $result = $post->curl($command, $params);

                echo $result;
                break;
            case "addLeaderPromo":
                
                foreach ($_POST as $key => $value) {
                    if($key == 'command') continue;
                    $params[$key] = $value;
                }
                $params['creatorID'] = $userId;
                $result = $post->curl($command, $params);

                echo $result;
                break;    
            case "getLeaderPromoList":
                
                foreach ($_POST as $key => $value) {
                    if($key == 'command') continue;
                    $params[$key] = $value;
                }
                $result = $post->curl($command, $params);

                echo $result;
                break;
            case "updateLeaderPromo":
                
                foreach ($_POST as $key => $value) {
                    if($key == 'command') continue;
                    $params[$key] = $value;
                }
                $params['updaterID'] = $userId;
                $result = $post->curl($command, $params);

                echo $result;
                break; 
        }
    }
?>
