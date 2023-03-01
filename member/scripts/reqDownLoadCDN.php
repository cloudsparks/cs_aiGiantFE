<?php
include_once($_SERVER["DOCUMENT_ROOT"].'/include/config.php');
include_once($_SERVER["DOCUMENT_ROOT"].'/doSpaces/aws/autoloader.php');
// include_once($_SERVER["DOCUMENT_ROOT"].'/doSpaces/spaces.php');
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



$downloadFile = $_GET["fileName"];
$subject = $_GET["subject"];

print_r($_GET);
print_r($s3Params);



$fileType = end(explode('.', $downloadFile));

$downloadFileName = str_replace(' ', '_', $subject);
$downloadFileName .= '_'.time();
$downloadFileName .= '.'.$fileType;

$downloadFile = str_replace(' ', '+', $downloadFile);

$getParams = [
    'Bucket' => $config['doBucketName'],
    'Key' => $config['doFolderName'].$downloadFile,
];

try {
    $result = $s3->getObject($getParams);

    $ext = pathinfo($downloadFileName, PATHINFO_EXTENSION);
    header("Content-Type: {'".$ext."'}");
    header("Content-Disposition: attachment; filename=".$downloadFileName);
    ob_end_clean();
    echo $result['Body'];
    ob_end_clean();
    unlink($downloadFileName);
    $downloadStatusMsg = $result->toArray();
}
catch (S3Exception $e) {
    echo 'there has been an exception<br>';
    $downloadStatusMsg = $e;
}

?>