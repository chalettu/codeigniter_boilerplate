<?php
class MY_Loader extends CI_Loader
{


	function __construct()
    {
        parent::__construct();
		self::include_files();
	}
	
	function include_files()
	{
		$core_path=str_replace('/system', '', BASEPATH);
		$dir=$core_path.APPPATH.'third_party';
	//	echo $dir;
		$files = scandir($dir);
		foreach($files as $file)
		if (stripos($file, '.php'))
		{
		//	echo $dir.DIRECTORY_SEPARATOR.$file;
			include_once($dir.DIRECTORY_SEPARATOR.$file);
		}
		//echo print_r($files1,true);
	}
	



}