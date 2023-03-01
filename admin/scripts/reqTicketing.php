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

            case "getTicketList":
                $params = array ("searchData" => $_POST['inputData'],
                                "offsetSecs" => $_POST['offsetSecs'],
                                "pageNumber" => $_POST['pageNumber']
                                );
                $result = $post->curl($command, $params);

                echo $result;
            break;

            case "getTicketDetail":
                $params = array ("ticketId" => $_POST['ticketId']
                                );
                $result = $post->curl($command, $params);
                
                echo $result;
            break;

            case "replyTicket":
                $params = array ("ticketId" => $_POST['ticketId'],
                                "senderId" => $_SESSION['userID'],
                                "message" => $_POST['message'],
                                "uploadData" => $_POST['uploadData']
                                );
                $result = $post->curl($command, $params);
                
                echo $result;
            break;

            case "updateTicketStatus":
                $params = array ("ticketId" => $_POST['ticketId'],
                                "status" => $_POST['status']
                                );
                $result = $post->curl($command, $params);
                
                echo $result;
            break;

            case "addTicket":
                    
                $params = array (
                    'clientID' => $_POST['clientID'],
                    "receiverID"  => $_POST['receiverID'],
                    'subject' => $_POST['subject'],
                    'message' => $_POST['message'],
                    'uploadData' => $_POST['uploadData'],
                    'type' => $_POST['type'],
                );
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

             case "deleteMessage":
                    
                $params = array (
                    'message_id' => $_POST['message_id'],
                );
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

        }
    }
?>
