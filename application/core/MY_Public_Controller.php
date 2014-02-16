<?php
class MY_Public_Controller extends CI_Controller
{
    /*
	function __construct()
    {
        parent::__construct();
        
        if($this->config->item('site_open') === FALSE)
        {
            show_error('Sorry the site is shut for now.');
        }

        // If the user is using a mobile, use a mobile theme
        $this->load->library('user_agent');
        if( $this->agent->is_mobile() )
        {
                         * Use my template library to set a theme for your staff
             *     http://philsturgeon.co.uk/code/codeigniter-template
             
            $this->template->set_theme('mobile');
        }
    }
	*/
	var $data;
	var $title;
	var $footer;
	
	
    function __construct()
    {
        parent::__construct();
        $this->data=new stdClass();
        $this->data->includes=array();
		//includeJSOnload('public_site');
		$this->title='';
	//	$this->footer=$this->render_footer();
      ///check if the user is logged in , if not redirect('/article/13', 'location', 403);
	  	
	  
	  
    }
   	
}