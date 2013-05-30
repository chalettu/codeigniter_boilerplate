<?php 
require_once(LIBRARY_PATH.'/FirePHPCore/fb.php');

class logger
{
	
	function __construct()
	{
	
		if ((isset($_REQUEST['debug']) && $_REQUEST['debug']=='true') ||  (isset($_SESSION['debug']) && $_SESSION['debug']==true))
		{
			if (!isset($_SESSION['debug']))
			{
				$_SESSION['debug']=true;
			}
		
			$this->debug_enabled=true;
		}
		else
		{
			if (isset($_REQUEST['debug']) && $_REQUEST['debug']=='false')
			{
				unset($_SESSION['debug']);
			}
		
			$this->debug_enabled=false;
		}
	}
	
	function info($msg)
	{
		//echo 'debug enabled '.$this->debug_enabled;
		//check if its a string or an object print r it if its an object	
		if ($this->debug_enabled)
		{
			if (is_string($msg))
			{
				error_log($msg);
			}
			else
			{
				error_log(print_r($msg,true));
			}
			FB::log($msg);
		}	
		
	}







}