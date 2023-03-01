<?php
	session_start();

    include ($_SERVER["DOCUMENT_ROOT"] . "/include/config.php");
	include($_SERVER["DOCUMENT_ROOT"]."/include/class.post.php");
    
    $post = new post();

	$command = $_POST['command'];

    if($_POST['type'] == 'logout'){
        session_destroy();
    }
    else{

        switch($command) {
            case "getCredits":
                $inputData = $_POST['inputData'];
                
                $params = array("searchData" => $inputData,
                                "pageNumber" => $_POST['pageNumber']);
                $result = $post->curl($command, $params);
                
                echo $result;
                break;
            
            case "deleteCredit":
                $deleteData = $_POST['deleteData'];
                $params = array("id" => $deleteData);
                $result = $post->curl($command, $params);
                
                echo $result;
                break;
            
            case "addCredit":

                $params = array("creditName" => $_POST['creditName'],
                                "creditDisplay" => $_POST['creditDisplay'],
                                "description" => $_POST['description'],
                                "priority" => $_POST['priority']
                               );
                $result = $post->curl($command, $params);
                
                echo $result;
                break;
                
            case "getCreditDetails":
                $params = array("id" => $_POST['editId']
                               );
                $result = $post->curl($command, $params);
                
                echo $result;
                break;
                
            case "editCredit":
                $params = array("id" => $_POST['creditID'],
                                "creditName" => $_POST['creditName'],
                                "creditDisplay" => $_POST['creditDisplay'],
                                "description" => $_POST['description'],
                                "translationCode" => $_POST['translationCode'],
                                "priority" => $_POST['priority'],
                               );
                $result = $post->curl($command, $params);
                
                echo $result;
                break;
                
            case "getCreditSettingDetails":
                $params = array("id" => $_POST['editId']
                               );
                $result = $post->curl($command, $params);
                
                echo $result;
                break;
                
            case "editCreditSetting":
                $params = array("creditID" => $_POST['creditID'],
                                "id" => $_POST['id'],
                                "values" => $_POST['values'],
                                "admin" => $_POST['admin'],
                                "member" => $_POST['member']
                               );
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "getActiveLanguages":
                $result = $post->curl($command);

                echo $result;
                break;
        }
    }

?>
