<?php
/**
* @author ttwoweb.
* This file is contains the script to process memberLogin.
*
**/

session_start();
include($_SERVER["DOCUMENT_ROOT"]."/include/class.post.php");
include($_SERVER["DOCUMENT_ROOT"]."/language/lang_all.php");

$post = new post();
$command = $_POST['command'];
if($_POST['type'] == 'logout')
{
  setcookie("marcajeData", "", time() - 3600, "/",NULL,TRUE,TRUE);
  session_destroy();
}
else
{
  switch($command)
  {
    case "memberLogin":
    if($_SESSION['captcha'] == strtoupper($_POST['captcha']) || !empty($_POST['id']))
    {
      $params = array(
        "id"       => $_POST['id'],
        "username" => $_POST['username'],
        "loginBy" => $_POST['loginType'],
        "password" => $_POST['password']
      );

      $result              = $post->curl($command, $params);
      $userData            = $result['data']['userDetails'];
      $userID              = $userData['userID'];
      $username            = $userData['username'];
      $userEmail           = $userData['userEmail'];
      $userRoleID          = $userData['userRoleID'];
      $sessionID           = $userData['sessionID'];
      $pagingCount         = $userData['pagingCount'];
      $timeOutFlag         = $userData['timeOutFlag'];
      $decimalPlaces       = $userData['decimalPlaces'];
      $memo                = $userData['memo'];
      $blockedRights       = $userData['blockedRights'];


      $_SESSION["userID"]              = $userID;
      $_SESSION["username"]            = $username;
      $_SESSION["userEmail"]           = $userEmail;
      $_SESSION["sessionID"]           = $sessionID;
      $_SESSION["pagingCount"]         = $pagingCount;
      $_SESSION["sessionExpireTime"]   = $timeOutFlag;
      $_SESSION["decimalPlaces"]       = $decimalPlaces;
      $_SESSION["memo"]                = $memo;
      $_SESSION["blockedRights"]       = $blockedRights;
      $_SESSION["bonusReport"]         = $result['data']['bonusReport'];
      $_SESSION["addBankAllow"]         = $result['data']['addBankAllow'];
      $_SESSION["isTransactionPassword"]       = 0;

      $marcaje      = $result['data']['marcaje'];
      $marcajeTK    = $result['data']['marcajeTK'];
      $expiredTS    = $result['data']['expiredTS'];

      $_SESSION["marcaje"] = $marcaje;
      $_SESSION["marcajeTK"] = $marcajeTK;
      $_SESSION["expiredTS"] = $expiredTS;

      if($result['data']['marcaje'] && $result['data']['marcajeTK']){
        $setlogincookie = array(
          'marcaje' => $marcaje,
          'marcajeTK' => $marcajeTK
        );

        setcookie("marcajeData", json_encode($setlogincookie), $expiredTS,"/",NULL,TRUE,TRUE);
      } else {
        setcookie("marcajeData", "", time() - 3600, "/",NULL,TRUE,TRUE);
      }

      if ($result["code"] == 5 || $result["code"] == 3){
          setcookie("marcajeData", "", time() - 3600, "/",NULL,TRUE,TRUE);
      }


      $myJson = json_encode($result);
      echo $myJson;
    }

    else
    {
      $myJson = array('status' => 'error', 'code' => 1, 'statusMsg' => 'Incorrect security code.', 'data' => array('field' => array(array('id'=>"captchaError",'msg'=>$translations['E00837'][$_SESSION['language']]))));
      $myJson = json_encode($myJson);
      echo $myJson;
    }
    break;

    case "setLanguage":

                $_SESSION['language'] = $_POST['language'];
                setcookie("language", $_POST['language'], time() + (86400 * 30), "/");

                if ($_SESSION['language']) {
                    $results = array('status' => "ok", 'code' => 0, 'statusMsg' => '', 'data' => "");
                    echo json_encode($results);
                }

                $params = array(
                                    "clientID" => $_SESSION["userID"],
                                    "language" => $_POST["language"]
                );
                $result = $post->curl($command, $params);

                $result = json_decode($result,true);

                if ($result['sessionData']['newSessionID']) {
                    $_SESSION["sessionID"] = $result['sessionData']['newSessionID'];
                    $_SESSION["sessionExpireTime"] = $result['sessionData']['timeOut'];
                }

                if ($result["code"] == 5 || $result["code"] == 3){
                    setcookie("marcajeData", "", time() - 3600, "/",NULL,TRUE,TRUE);
                }

                $result = json_encode($result);
                  
                break;
  }
}
?>
