<?php

require_once(LIBRARY_PATH.'/sag/Sag.php');

class CI_Sag extends Sag
{

function __construct()
{
	$CI =& get_instance();
	$CI->config->load('couch_db');
	
	$host=$CI->config->item('couch_db_host');
	$username=$CI->config->item('couch_db_user');
	$password=$CI->config->item('couch_db_password');
	$db_name=$CI->config->item('couch_db_name');
	

	parent::__construct($host,'5984');
	$this->login($username,$password);
		// Select the database that holds our blog's data.
	$this->setDatabase($db_name);	

}




}
















?>