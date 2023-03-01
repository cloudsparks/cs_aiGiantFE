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
            case "getThirdPartyTradePair":
                $params = array(
                    "searchData" => $_POST['inputData'],
                );
                $result = $post->curl($command, $params);
                
                echo $result;
                break;
            case "addThirdPartyPair":
                $params = array(
                    "pair" => $_POST['pair'],
                );
                $result = $post->curl($command, $params);
                
                echo $result;
                break;
            case "updateThirdPartyPair":
                $params = array(
                    "id" => $_POST['id'],
                    "operation" => $_POST['operation']
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