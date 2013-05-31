<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require(LIBRARY_PATH.'REST_Controller.php');

class Couch_demo extends REST_Controller {

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
	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model','users');		
	}
	public function index_get()
	{
		//parent::__construct();
		includeJSFile('jquery-2.0.0.min');
		includeJSFile('parsley.min');
		includeJSFile('handlebars');
		 $ci=& get_instance();
		 $test=$ci->load->view('couchdb_demo',true);
		echo $test;
		//$this->response($test,200);
		
	}
	public function createUser_get()
	{
		//echo print_r($_REQUEST,true);
		$data=$this->input->get(NULL, TRUE);
		$user_id=$this->users->createUser($data);
		$return_data=array('user_id'=>$user_id);

		$this->response($return_data, 200);
	}
	public function getUser_get()
	{
		$user_id=$this->input->get('user_id', TRUE);
		//echo $user_id;
		$data=$this->users->getUserByUserId($user_id);
	//	echo print_r($data,true);
		$this->response($data, 200);
	}
	public function updateUser_get()
	{
		$data=$this->input->get(NULL, TRUE);
		//$data['_id']=$data['user_id'];
		$user_id=$data['user_id'];
		unset($data['user_id']);
		$this->users->updateUser($user_id,$data);
		
	}
	public function getUserByEmail_get()
	{
		$email=$this->input->get('email', TRUE);
		$data=$this->users->getUserByEmail($email);
		$firstRow=$data->rows;//sometimes you get a bunch of rows if you have multiple records
		$firstRow=array_shift($firstRow);//i just want the first record
		$firstRowData=$firstRow->value;//the query returns key and value.  I want the value
		
		$this->response($firstRowData, 200);
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */