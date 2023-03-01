<?php
    /**
     * @author TtwoWeb Sdn Bhd.
     * Date  30/03/2018.
    **/
	session_start();

    include ($_SERVER["DOCUMENT_ROOT"]."/include/config.php");
	include($_SERVER["DOCUMENT_ROOT"]."/include/class.post.php");
    
    $post = new post();

	$command = $_POST['command'];

    $username   = $_SESSION['username'];
    $userId     = $_SESSION['userID'];
    $sessionID  = $_SESSION['sessionID'];

    if($_POST['type'] == 'logout') {
        session_destroy();
    }
    else {

        switch($command) {

            case "getTreeSponsor":
                    
                $params = array('clientID' => $_POST['clientID']);
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "getTreePlacement":

                $params = array (
                                    'clientID' => $_POST['clientID'],
                                    'depthLevel' => $_POST['depthLevel'],
                                    'realClientID' => $_POST['realClientID']
                                );
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "getSponsorTreeTextView":
                    
                $params = array('clientID' => $_POST['clientID']);
                $result = $post->curl($command, $params);
                
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
                
                echo $result;
                break;

            case "getPlacementTreeVerticalView":
                $params = array (
                                    "clientID" => $_POST['clientId'],
                                    "targetID" => $_POST['targetId']?$_POST['targetId']:$_POST['clientId'],
                                    "targetUsername" => $_POST['targetUsername'],
                                    "viewType" => $_POST['viewType']
                                );
                               
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "getUpline":

                $params = array('clientID' => $_POST['clientID']);
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "getSponsor":

                $params = array('clientID' => $_POST['clientID']);
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "getPlacement":

                $params = array('clientID' => $_POST['clientID']);
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "changeSponsor":

                $params = array (
                                    'clientID' => $_POST['clientID'],
                                    'uplineUsername' => $_POST['uplineUsername']
                                );
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "changePlacement":

                $params = array (
                                    'clientID' => $_POST['clientID'],
                                    'uplineUsername' => $_POST['uplineUsername'],
                                    'position' => $_POST['position'] //Eg. 1,2,3
                                );
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "adminSearchDownline":

                $params = array (
                                    'clientID' => $_POST['clientID'],
                                    'targetUsername' => $_POST['targetUsername']
                                );
                $result = $post->curl($command, $params);
                
                echo $result;
                break;
        }
    }
?>
