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
	 case **'dev.blah.com'**:
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

1. Edit the couch config file for each environment. **Example: /application/config/local/couch_db.php**


Create a model that extends DB
You can find an **example in /application/models/users_model.php**


	class Users_model extends DB
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

To enable debugging hit any url in your codeigniter site and add the querystring debug=true.  **Example http://blah.com/?debug=true**

To turn off logging just hit a url like **Example http://blah.com/?debug=false**

## How to Use the REST Server Classes to make a RESTful endpoint

In order to create a restful endpoint all you need to do is create a controller and make it extend **REST_Controller**  . Look below for an example of requiring the REST Controller class instantiating it

	<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	require(LIBRARY_PATH.'REST_Controller.php');

	class Rest extends REST_Controller {



### How to create RESTFUL Methods

When you create a method name in this class you must specify the http method.  Methods supported are **get,post,put,delete**

YOU MUST INCLUDE THE TYPE OF HTTP_METHOD AT THE END OF THE FUNCTION NAME
Example **function test_get()**

	function test_get()
	{
			$user=array('test');
			$this->response($user, 200);	
	}

To view a simple REST Example I have included you can view the controller at **/application/controllers/rest.php** or hit **http://blah.com/rest/test**


### How to you switch output formats for the RESTFUL URL?

Here are the available output formats **xml,json,jsonp,html**

You have two simple ways you can do this.

Option 1. add the output format in as part of the URL . **Example http://blah.com/rest/test/format/json**

Option 2. add the output format in as part of the URL Querystring **Example http://blah.com/rest/test/?format=json**




