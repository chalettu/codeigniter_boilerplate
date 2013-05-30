<!doctype html>

<html>

  <head>
    <title>A blank HTML5 page</title>
    <meta charset="utf-8" />
  </head>

  <body>
  
  
  
  
  <div style="margin-bottom:10px">
  <div>
	  Sample Parsley Test
  </div>
	  <form data-validate="parsley">
		  name <input type="text" name="name" data-required="true"><br>
		  email <input type="text" name="email" data-trigger="change" data-required="true" data-type="email">
		  <br>
		  <input type="submit" value="click me">
	  </form>
  </div>
  
  <div>
  Sample Test for handlebars
  <button onclick="testHandlebars()">Click me</button>
  <ul id="test_list">
	  
  </ul>
  </div>
  

<?php
	renderJavascriptTags();
	//this code renders js script tags that you have defined in your controllers
?>
  <script>
  function testHandlebars()
  {
	  
	  //first you need to get the handlebars template you have coded, in this case i called mine myfirst-template .  See below
	  var source   = $("#myfirst-template").html();
	  //next compile the template
	  var template = Handlebars.compile(source);
	  
	  var ajaxData=[{"color":"red"},{"color":"white"},{"color":"blue"},{"color":"yellow"},{"color":"green"}];
	  var html="";
	  $(ajaxData).each(function(key,obj){
		  //console.log(val);
		  html+=template(obj);
		  
		  
	  });
	  
	  $("#test_list").append(html);
	  
  }
  </script>
<script id="myfirst-template" type="text/x-handlebars-template">
  <li>{{color}}</li>
</script>

  </body>

</html>