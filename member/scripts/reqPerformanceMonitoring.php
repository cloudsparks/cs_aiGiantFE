<?php
/**
 * @author TtwoWeb Sdn Bhd.
 * Date  29/08/2018.
**/
session_start();

include($_SERVER["DOCUMENT_ROOT"]."/include/config.php");
include($_SERVER["DOCUMENT_ROOT"]."/include/class.post.php");

$post = new post();
$command = $_POST['command'];

$username   = $_SESSION['username'];
$userId     = $_SESSION['userID'];
$sessionID  = $_SESSION['sessionID'];

if($_POST['type'] == 'logout') {
  session_destroy();
}

switch($command) {
	case "recordPerformance":

		$params["usedTime"] = $_POST["usedTime"];
		$params["eventSection"] = $_POST["eventSection"];
		$params["domainName"] = $_SERVER["HTTP_HOST"];
		$params["registerUsername"] = $_POST["username"];
		$params["package"] = $_POST["package"];

		$result = $post->curl($command, $params);
		echo $result;

	break;
}

?>