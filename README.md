# CodeIgniter BoilerPlate
=======================

This is a Sample Boilerplate for a Codeigniter PHP application.  This installation has been modified with a bunch of little features that make Codeigniter a little more complete for building RESTful websites and scalable websites. I also wrote this boilerplate to include Codeigniter support for CouchDB.  


## Libraries that are included in this template

Codeigniter 
Version 2.1.3
http://ellislab.com/codeigniter


SAG Library
Version 0.8.0
http://www.saggingcouch.com/

FirePHP
0.3.2
http://www.firephp.org/HQ/Install.htm

Codeigniter REST Server
https://github.com/philsturgeon/codeigniter-restserver


## Tips and Tricks

How to configure your Environments
At the top of the index.php for the CI app you will see a section that has a switch statement that looks like this

	$server_name=$_SERVER['SERVER_NAME'];
 
 	switch($server_name)
 	{
	 case 'dev.blah.com':
	 $env='development';
	 break;
	 case 'blah.com':
	 $env='production';
	 break;
	 case 'test.blah.com':
	 $env='test';
	 break;
	 case 'www.blah.com':
	 $env='production';
	 break;
	 default:
	 $env='local';
	 
	 break;
	 	
 	}

Change the switch statement to match your websites domain names.  For each environment "development,test,local,production" you will find subfolders in /application/config.  Put your environment specific configs in the appropriate environment subfolder. 



## How to Use the Couch DB Driver

I made some classes and infrastructure to help make it easy to use SaggingCouch php library .  
To configure couch db driver 
1. Edit the couch config file for each environment. Example /application/config/local/couch_db.php


Create a model that extends CI_Sag
You can find an example in /application/models/users_model.php


	class Users_model extends CI_Sag
	{

	function __construct()
	{
        parent::__construct();
        $this->ci=& get_instance();
	}
	function getUserByUserId($id)
	{
	 $result=$this->get($id."?include_docs=true");
	 $this->ci->log->info($result);
	 }

	 }

## How to log data with my Logging class

The logging class is always included with every page so no need to instantiate it.

To log something you just need to call the logging class like

	$this->log->info("hello world"); or $this->log->info($data);
	
If you want to see the data in firebug or in PHP's error log all you need to is to enable debugging

To enable debugging hit any url in your codeigniter site and add debug=true.  Example blah.com/?debug=true


## How to Use the REST Server Classes to make a RESTful endpoint




