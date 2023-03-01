<?php
    /**
     * @author TtwoWeb Sdn Bhd.
     * Date  20/04/2017.
     **/
    session_start();

    include($_SERVER["DOCUMENT_ROOT"] . "/include/config.php");
    include($_SERVER["DOCUMENT_ROOT"] . "/include/class.post.php");

    $post = new post();

    $command = $_POST['command'];

    $username = $_SESSION['username'];
    $userID = $_SESSION['userID'];
    $sessionID = $_SESSION['sessionID'];

    if ($_POST['type'] == 'logout') {
        session_destroy();
    } else {

        switch ($command) {

            case "getLeaderGroupSalesReport":
                $params = array();
                foreach ($_POST as $key => $value) {
                    if ($key == 'command') continue;

                    $params[$key] = $value;
                }
                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getSalesPlacementReport":

                $params = array(
                    'pageNumber' => $_POST['pageNumber'],
                    'searchData' => $_POST['inputData']
                );
                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getSalesPurchaseReport":

                $params = array(
                    'pageNumber' => $_POST['pageNumber'],
                    'searchData' => $_POST['inputData'],
                    "seeAll" => $_POST['seeAll']
                );
                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getFundInSalesReport":

                $params = array(
                    'pageNumber' => $_POST['pageNumber'],
                    'inputData' => $_POST['inputData'],
                    "seeAll" => $_POST['seeAll']
                );
                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "addExcelReq":
                $params = array(
                    "command" => $_POST['API'],
                    "type" => 'excel',
                    "titleKey" => $_POST['titleKey'],
                    "params" => $_POST['params'],
                    "headerAry" => $_POST['headerAry'],
                    "totalAry" => $_POST['totalAry'],
                    "keyAry" => $_POST['keyAry'],
                    "fileName" => $_POST['fileName']
                );

                $result = $post->curl($command, $params);
                echo $result;
                break;
        }
    }
?>
