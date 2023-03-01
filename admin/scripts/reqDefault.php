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
