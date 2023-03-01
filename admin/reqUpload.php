<?php
include('include/config.php');

if (($_FILES['file']['name']=="")){
	die("Please upload file!");
} 

$videoName        	= $_POST["videoName"];
$previousVideoName  = $_POST["previousVideoName"];
if($previousVideoName != ""){
	$prevPath = $config['tempVideoPath'].$previousVideoName;
	unlink($prevPath);
}

//echo "prevPath: ".$prevPath."\n";
// Where the file is going to be stored

$target_dir = $config['tempVideoPath'];
$file = $_FILES['file']['name'];
$path = pathinfo($file);
// $filename = $path['filename'];
$filename = $videoName;
$ext = $path['extension'];
$temp_name = $_FILES['file']['tmp_name'];
$path_filename_ext = $target_dir.$filename.".".$ext;
//$date = date("Y-m-d H:i:s");
//$timestamp = strtotime($date);
//$apkConfig = "apkConfig.json";
//echo "path_filename_ext: ".$path_filename_ext."\n";

// Check if file already exists
if (file_exists($path_filename_ext)) {
	move_uploaded_file($temp_name,$path_filename_ext);
	$statusMsg = "Congratulations! File Replace Successfully.";
}else{
	move_uploaded_file($temp_name,$path_filename_ext);
    $statusMsg = "Congratulations! File Uploaded Successfully.";
}

    $returnData = array(
        'status' => 'ok',
        'statusMsg' => $statusMsg,
    );
    echo json_encode($returnData);

//if($ext == "apk"){
//	$android['filename'] = $filename;
//	$android['dateTime'] = $date;
//	$android['timestamp'] = $timestamp;
//}else{
//	$ios['filename'] = $filename;
//	$ios['dateTime'] = $date;
//	$ios['timestamp'] = $timestamp;
//}
//
//if(file_exists($apkConfig)){
//	$json = file_get_contents($apkConfig);
//	$data = json_decode($json,true);
//	// print_r($data);
//}else{
//	$data = array();
//}
//
//if($android) $data['android'] = $android;
//if($ios) $data['ios'] = $ios;
//// print_r($data);
//// echo '<pre>' . print_r($data, true) . '</pre>';
//if(!empty($data)){
//	$data = json_encode($data); echo ($data);
//	file_put_contents($apkConfig, $data);
//}