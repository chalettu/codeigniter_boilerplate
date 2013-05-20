<?php

class Admin_Controller extends MY_Controller
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