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

            case "getTrdPaymentMethod":
                $params = array ("clientID" => $_POST['clientID'],
                                "pageNumber" => $_POST['pageNumber']
                                );
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "getMemberPaymentMethodList":

                $params = array ("searchData" => $_POST['inputData'],
                                "pageNumber" => $_POST['pageNumber']
                                );
                               
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "verifyPaymentMethod":
                
                $params = array("clientID" => $_POST['clientID'],
                                "paymentMethodID" => $_POST['paymentMethodID'],
                                "paymentMethodType" => $_POST['paymentMethodType'],
                                "paymentMethodData" => $_POST['paymentMethodData'],
                                );
        
                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "deleteTrdPaymentMethod":
                $deleteData = $_POST['deleteData'];
                $params = array("id" => $deleteData);
                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getAdvertisementList":
                
                $params = array("searchData" => $_POST['inputData'],
                                "pageNumber" => $_POST['pageNumber']
                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getOrderList":
                
                $params = array("searchData" => $_POST['inputData'],
                                "pageNumber" => $_POST['pageNumber']
                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "viewPaymentMethod":

                $params = array("paymentMethodID" => $_POST['paymentMethodID']);

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "viewReceipt":

                $params = array("attachmentID" => $_POST['attachmentID'],
                                "orderID" => $_POST['orderID']);

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "adminUpdateOrderStatus":

                $params = array("orderID" => $_POST['orderID'],
                                "status"  => $_POST['status']

                );

                $result = $post->curl($command, $params);

                echo $result;
                break;
        }
    }
?>
