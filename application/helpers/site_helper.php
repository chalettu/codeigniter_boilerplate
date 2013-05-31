<?php

function cdn_url($link)
{
	$env=array();
		
	if (ENVIRONMENT=='test')
	{
	$url=site_url($link);
	}
	else
	{
		$url=SERVER_PROTOCOL.'://'.CDN_URL.'/'.$link;
	}
	return $url;

}

function includeJSOnload($filename,$admin='')
{
	 $ci=& get_instance();
	 if (!isset($ci->data->page_includes))
	 {
		 $ci->data->page_includes=array();
	 }
	 
	 if ($admin !='')
	 {
	 	$admin_folder="admin/js/";
	 }
	 else
	 {
		$admin_folder="public/js/";
	 }
	 $ci->data->page_includes[]=cdn_url('assets/'.$admin_folder.'page_includes/'.$filename.'.js');
}

function includeJSFile($file,$admin='')
{
	$ci=& get_instance();
	if (stripos($file,'http')!==false)
	{
		$ci->data->js_includes[]=$file;
	}
	else
	{
		if ($admin !='')
		{
		$admin_folder='admin/';
		}
		else
		{
		 $admin_folder='public/';
		}
		$ci->data->js_includes[]=cdn_url('assets/'.$admin_folder.'js/'.$file.'.js');
	}
}

function renderJavascriptTags()
{
	$ci=& get_instance();
	if (isset($ci->data->js_includes) && count($ci->data->js_includes) >0)
	{
	//echo implode("\r\n",$ci->data->page_includes);
		foreach($ci->data->js_includes as $include)
		{
			echo '<script src="'. $include.'"></script>'."\n";
		}	
	}
	
	if (isset($ci->data->page_includes) && count($ci->data->page_includes) >0)
	{
		foreach($ci->data->page_includes as $include)
		{
			echo '<script src="'. $include."\"></script>"."\n";
		}	
	}


}




