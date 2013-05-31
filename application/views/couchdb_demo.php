<!doctype html>

<html>

  <head>
    <title>A Simple Couch DB Tutorial</title>
    <meta charset="utf-8" />
  </head>

  <body>
  <style>
	.hideEdit{
		display: none;
	}
	#edit_user
	{
		display: none;
	}
  </style>
  <div>
  		This is a simple crash course on couchdb using the integration work I did with CI and couchdb
  </div>
  
  <div style="border-style:solid;border-width:medium;width:211px;margin: 2px;padding: 10px;">
  <form id="add_user">
<h2>Adding a User</h2>	  
<label for="first_name">First Name</label>
  <input type="text" name="first_name" id="first_name"><br>
  <label for="last_name">Last Name</label>
  <input type="text" name="last_name" id="last_name"><br>
  <label for="email">Email</label>
  <input type="text" name="email" id="email"><br>
   <label for="address">Address</label>
  <input type="text" name="address" id="address"><br>
   <label for="address">City</label>
  <input type="text" name="city" id="city"><br>
  </form>
  <button onclick="createUser()">Create User</button>
  </div>
  <br>
  <div style="border-style:solid;border-width:medium;width:200px;margin: 2px;padding: 10px;">
	 <label for="email">Email</label>
  <input type="text" name="email" id="search_email"><br>
<button onclick="searchUserEmail()">Search For User</button>
  </div>
    <button onclick="editUser()" class="hideEdit">Edit User</button>
  <div id="edit_user">
	<form id="edit_user_form">
	<input type="text" id="user_id" name="user_id">	
		
		
	</form>	  
	<button onclick="updateUser()"> Update User</button>	  
	  
  </div>
  
  
  
  
<?php
	renderJavascriptTags();
	//this code renders js script tags that you have defined in your controllers
?>
<script>
	function createUser()
	{
		var data=$("#add_user").serialize();
		
		 $.getJSON( "<?php echo site_url('couch_demo/createUser/format/json/');?>",data, function(response) {
		//	 console.log( response );
			 $("#user_id").val(response.user_id);
			 $(".hideEdit").show();
			 
  	});
		
		
	}
	
	function editUser()
	{
		$("#edit_user").show();
		var data={user_id:$("#user_id").val()};
		 $.getJSON( "<?php echo site_url('couch_demo/getUser/format/json/');?>",data, function(response) {
		//	 console.log( response );
	//		 $("#user_id").val(response.user_id);
	
		  //first you need to get the handlebars template you have coded, in this case i called mine myfirst-template .  See below
	  var source   = $("#editUser-template").html();
	  //next compile the template
	  var template = Handlebars.compile(source);
	  
	  var html="";

	  html+=template(response);
		  
		  
	  
	  $("#edit_user_form").append(html);
	
	
	
	
	
	
	
  	});

		
		
	}
	function updateUser()
	{
		
		var data=$("#edit_user_form").serialize();
		
		 $.getJSON( "<?php echo site_url('couch_demo/updateUser/format/json/');?>",data, function(response) {
		alert('it worked');
		
	  	});

		
	}
	function searchUserEmail()
	{
	
	  var data={email:$("#search_email").val()};
		 $.getJSON( "<?php echo site_url('couch_demo/getUserByEmail/format/json/');?>",data, function(response) {

  	  var source   = $("#editUser-template").html();
	  //next compile the template
	  var template = Handlebars.compile(source);
	  
	  var html="";

	  html+=template(response);
		  
		  
	  
	  $("#edit_user_form").append(html);
	
	$("#edit_user").show();
	
	
	
	
	
  	});

		
		
		
		
		
	}
	
	
	
	
</script>




<script id="editUser-template" type="text/x-handlebars-template">  
  
  <h2>Edit a User</h2>	  
<label for="first_name">First Name</label>
  <input type="text" name="first_name" id="first_name" value="{{first_name}}"><br>
  <label for="last_name">Last Name</label>
  <input type="text" name="last_name" id="last_name" value="{{last_name}}"><br>
  <label for="email">Email</label>
  <input type="text" name="email" id="email" value="{{email}}"><br>
   <label for="address">Address</label>
  <input type="text" name="address" id="address" value="{{address}}"><br>
   <label for="address">City</label>
  <input type="text" name="city" id="city" value="{{city}}"><br>


  
</script>













 </body>

</html>