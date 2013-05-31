<?php


class Users_model extends DB
{

 function __construct()
 {
        parent::__construct();
        $this->ci=& get_instance();
 }
 
 function getUserByUserId($id)
 {
 	 $result=$this->get($id);
 	 return $result->body;
	// $this->ci->logger->info($result);
 }

 function createUser($data)
 {
 
 	    $id=$this->generateIDs(1);
		$id=array_shift($id->body->uuids);
		$data['_id']=$id;

	    $this->post($data);
		return $id;
 }
 function updateUser($document_id,$data)
 {
		 $customer_rs=$this->getUserByUserId($document_id);
	    foreach($data as $key=>$val)
	    {
		    $customer_rs->$key=$val; 
	    }

		
		if(!$this->put($document_id, $customer_rs)->body->ok) {
			error_log('Unable to log a view to CouchDB.');
		} 

	 
 }
 function getUserByEmail($email)
 {
	 /* SAMPLE CODE FOR THE MAP FUNCTION
		 function(doc) {

	    if (doc.email){
	       emit(doc.email, doc);
	    }
	}
	 */
	  $query='_design/users/_view/users_by_email?key="'.$email.'"';  
	  $data=$this->get($query);
	  return $data->body;
	 
	 
	 
 }
 
 

}