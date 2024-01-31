<?php
namespace App\Http\Controllers;

require './laravelFiles/vendor/autoload.php';

use Aws\S3\S3Client;

use Illuminate\Http\Request;
use Aws\S3\Exception\S3Exception;


class AwsS3 extends Controller
{

    function upload($fileName,$path,$bucketName,){
        

        $s3 = new S3Client([
            'version' => 'latest',
            'region'  => 'ap-southeast-1',
            'credentials' => array(
                'key' => getenv("S3_KEY"),
                'secret'  => getenv("S3_SECRET"),
            )
        ]);

        try {
            $s3->putObject([
                'Bucket' => $bucketName,
                'Key'    => $fileName,
                'Body'   => fopen($path, 'r'),
                'ACL'    => 'public-read',
            ]);
        } catch (S3Exception $e) {
            echo $e;
            echo "There was an error uploading the file.\n";
        }

    }

}
