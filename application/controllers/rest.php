<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require(LIBRARY_PATH.'REST_Controller.php');

class Rest extends REST_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function test_get()
	{
	//	$this->load->view('welcome_message');
		$this->log->info('testing');
		$this->load->model('users_model','users');
		$user=array('test');
		$this->response($user, 200);	
		//$this->users->getUserByUserId('blah@blah.com');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */