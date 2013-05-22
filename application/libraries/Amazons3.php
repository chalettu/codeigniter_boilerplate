<?php


include_once('aws.phar');
use Aws\Common\Aws;
use Aws\Common\Enum\Region;
use Aws\S3\Exception\S3Exception;

class Amazons3 {

	private $aws;
	private $s3Client;
	public $debug = true;

	function __construct() {
		$CI =& get_instance();
		$this->aws = Aws::factory(array(
				 'key'    => $CI->config->item('s3_access_key_id'),
				 'secret' => $CI->config->item('s3_secret_key'),
				'region' => 'us-east-1'
			));
		$this->s3Client = $this->aws->get('s3');
	}
	function doesBucketExist($bucket_name){
        try {
            if($this->s3Client->doesBucketExist($bucket_name)){
                return true;
            }
            return false;
        } catch (S3Exception $e) {
            if($this->debug){
                return $e->getMessage();
            }
            else{
                return false;
            }
        }
    }
	function doesFileExist($filename)
	{
		
		$options=array('Bucket'=>'stylified_stylists','Prefix'=>$filename);
		$res=$this->s3Client->listObjects($options);
		
		if (count($res) > 0)
		{
			return true;
		}
		else
		{
			return false;	
		}
		
	}
	function putObject($options = array()) {
		// If body is set then lets create a dynamic file
		if(isset($options['body'])) {
			try {
				if($this->s3Client->putObject(array(
							'Bucket' => $options['bucket'],
							'Key' => $options['key'],
							'Body' => $options['body'],
							'ContentType'=>$options['ContentType']
						))) {
					return true;
				}
				return false;
			} catch (S3Exception $e) {
			echo $e->getMessage();
				if($this->debug) {
					return $e->getMessage();
				}
				else {
					return false;
				}
			}
		}
	}
}

?>