<?php 
	
	   
	   $con=mysql_connect('localhost','root');
	   if (!$con) {
	   	die('connection failed'.mysql_connect_error());
	   }

	mysql_select_db($con,'uniquedeveloper');

 ?>