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
            case "addWorldCupEvent":
                $params = array(
                    "match" => $_POST['match'],
                    "odd" => $_POST['odd'],
                );
                $result = $post->curl($command, $params);
                
                echo $result;
                
                break;
            case "worldCupEventSetting":
                $params = array(
                    "searchData" => $_POST['searchData'],
                    "pageNumber" => $_POST['pageNumber']
                );
                $result = $post->curl($command, $params);
                
                echo $result;
                break;
            case "editWorldCupEvent":
                if ($_POST['action'] == 'delete') {
                    $params = array(
                        "id" => $_POST["id"],
                        "action" => $_POST["action"],
                       // "remark" => $_POST["remark"],
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
                            "new_match" => $_POST['new_match'],
                            "new_odd" => $_POST['new_odd'],
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