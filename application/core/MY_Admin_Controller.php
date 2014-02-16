<?php
class MY_Admin_Controller extends CI_Controller
{
  var $data;
    function __construct()
    {
        parent::__construct();
       		
      ///check if the user is logged in , if not redirect('/article/13', 'location', 403);
		  
    }
	function checkLoginState()
	{
		if($this->session->userdata('user_id')=='')
		{
		
			//redirect to 403
		//	redirect('/error/error_403', 'location' );
		
		}
		
		
	}   	
}