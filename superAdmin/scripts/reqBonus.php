<?php
    /**
     * @author TtwoWeb Sdn Bhd.
     * This file is contains the Permission related conditions.
     * Date  21/07/2017.
    **/
	session_start();

    include ($_SERVER["DOCUMENT_ROOT"] . "/include/config.php");
	include($_SERVER["DOCUMENT_ROOT"]."/include/class.post.php");
    
    $post = new post();

	$command = $_POST['command'];

    $username   = $_SESSION['username'];
    $userId     = $_SESSION['userId'];
    $sessionID  = $_SESSION['sessionID'];

    if($_POST['type'] == 'logout'){
        session_destroy();
    }
    else{
        switch($command) {
            
            case "getBonusSettingAll":
                
                $result = $post->curl($command);

                echo $result;
                break;

            case "getBonusSettingDetails":
                
                $params = array("id" => $_POST['id']);
                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "editBonusSetting":
                
                $params = array("id" => $_POST['id'],
                                "name" => $_POST['name'],
                                "bonus_source" => $_POST['bonus_source'],
                                "calculation" => $_POST['calculation'],
                                "calculation_start" => $_POST['calculation_start'],
                                "payment" => $_POST['payment'],
                                "payment_start" => $_POST['payment_start'],
                                "priority" => $_POST['priority'],
                                "allow_rank_maintain" => $_POST['allow_rank_maintain'],
                                "disabled" => $_POST['disabled'],
                                "languageCode" => $_POST['languageCode'],
                                "file_path" => $_POST['file_path'],
                                "tableName" => $_POST['tableName']);
                                

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "addBonusSetting":
                
                $params = array("name" => $_POST['name'],
                                "bonus_source" => $_POST['bonus_source'],
                                "calculation" => $_POST['calculation'],
                                "calculation_start" => $_POST['calculation_start'],
                                "payment" => $_POST['payment'],
                                "payment_start" => $_POST['payment_start'],
                                "priority" => $_POST['priority'],
                                "allow_rank_maintain" => $_POST['allow_rank_maintain'],
                                "disabled" => $_POST['disabled'],
                                "languageCode" => $_POST['languageCode'],
                                "file_path" => $_POST['file_path'],
                                "tableName" => $_POST['tableName']);
                                

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getAdminDetails":

                $params = array("id" => $_POST['id']);
                               
                $result = $post->curl($command, $params);
                
                echo $result;
                break;            
        }
    }
?>
