<?php


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