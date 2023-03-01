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
            
            case "getAgentSummary":
                
                $params = array("pageNumber" => $_POST['pageNumber'],
                                "inputData" => $_POST['inputData']
                );
                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "updateAgentSummary":
                
                $params = array("agentID" => $_POST['agentID'],
                                "paidOutData" => $_POST['paidOutData'],
                                "balanceData" => $_POST['balanceData'],
                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getBalanceReport":
                $params = array();
                foreach ($_POST as $key => $value) {
                    if ($key == 'command') continue;
                    $params[$key] = $value;
                }
                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getGroupStakingReport":
                
                $params = array("pageNumber" => $_POST['pageNumber'],
                                "inputData" => $_POST['inputData']
                );
                $result = $post->curl($command, $params);

                echo $result;
                break;

        }
    }
?>
