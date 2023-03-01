<?php
include_once($_SERVER["DOCUMENT_ROOT"].'/include/config.php');
include_once($_SERVER["DOCUMENT_ROOT"].'/doSpaces/aws/autoloader.php');
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

$s3Params=[
        'version' => 'latest',
        'region' => $config['doRegion'],
        'endpoint' => $config['doEndpoint'],
        'credentials' => [
            'key'    => $config['doApiKey'],
            'secret' => $config['doSecretKey'],
            ],
         'debug' => false
        ];
$s3 = new S3Client($s3Params);

if ($_POST['folderName']) {
    $folderName = '/'.$_POST['folderName'];
}

if (($_FILES['attachmentData']['name'] != "")){
    $attachmentName = $_POST["attachment"];
    $attachmentSize = $_FILES['attachmentData']['size'];
    $attachmentType = $_FILES['attachmentData']['type'];
    $attachment_temp_name = $_FILES['attachmentData']['tmp_name'];
    $path_attachmentfilename_ext = $attachmentName;

    $putParams = [   
        'ContentLength'     => $attachmentSize,
        'ContentType'       => $attachmentType,
        'Bucket'            => $config['doBucketName'].$folderName,
        'Key'               => $config['doFolderName'].$path_attachmentfilename_ext, // this is the save as file in the space
        'Body'              => fopen($attachment_temp_name,rb), // and this is the file name on this server
        'ACL'               => 'public-read',
         ] ;

    try {
        $result = $s3->putObject($putParams);
        $result->toArray();
        $attStatusMsg = "Congratulations! Attachment Uploaded Successfully.";
    } catch (S3Exception $e) {
        $attStatusMsg = $e;
    }
} else {
    $attStatusMsg = "No Attachment Found.";
}

if (($_FILES['videoData']['name'] != "")){
    $mediaVideoName = $_POST["video"];
    $videoSize = $_FILES['videoData']['size'];
    $videoType = $_FILES['videoData']['type'];
    $video_temp_name = $_FILES['videoData']['tmp_name'];
    $path_videofilename_ext = $mediaVideoName;

    $putParams = [   
        'ContentLength'     => $videoSize,
        'ContentType'       => $videoType,
        'Bucket'            => $config['doBucketName'],
        'Key'               => $config['doFolderName'].$path_videofilename_ext, // this is the save as file in the space
        'Body'              => fopen($video_temp_name,rb), // and this is the file name on this server
        'ACL'               => 'public-read',
         ] ;

    try {
        $result = $s3->putObject($putParams);
        $result->toArray();
        $videoStatusMsg = "Congratulations! Video File Uploaded Successfully.";
    } catch (S3Exception $e) {
        $videoStatusMsg = $e;
    }
} else {
    $videoStatusMsg = "No Video File Found.";
}

if (($_FILES['imageData']['name'] != "")){
    $mediaImageName = $_POST["image"];
    $imageSize = $_FILES['imageData']['size'];
    $imageType = $_FILES['imageData']['type'];
    $image_temp_name = $_FILES['imageData']['tmp_name'];
    $path_imagefilename_ext = $mediaImageName;

    $putParams = [   
        'ContentLength'     => $imageSize,
        'ContentType'       => $imageType,
        'Bucket'            => $config['doBucketName'],
        'Key'               => $config['doFolderName'].$path_imagefilename_ext, // this is the save as file in the space
        'Body'              => fopen($image_temp_name,rb), // and this is the file name on this server
        'ACL'               => 'public-read',
         ] ;
    try {
        $result = $s3->putObject($putParams);
        $result->toArray();
        $imageStatusMsg = "Congratulations! Image Uploaded Successfully.";
    } catch (S3Exception $e) {
        $imageStatusMsg = $e;
    }
} else {
    $imageStatusMsg = "No Image File Found.";
}

$returnData = array(
    'status' => 'ok',
    'attStatusMsg' => $attStatusMsg,
    'videoStatusMsg' => $videoStatusMsg,
    'imageStatusMsg' => $imageStatusMsg,
);
echo json_encode($returnData);

?>