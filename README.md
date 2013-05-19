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

	



How to Use the Couch DB Driver




