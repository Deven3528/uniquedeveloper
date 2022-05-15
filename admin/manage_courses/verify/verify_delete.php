<?php 


	$course_name=$_GET['course_name'];


       		 $con=mysql_connect('localhost','root');
			mysql_select_db($con,'uniquedeveloper');

       		$id=$_GET['course_id'];
       		$q="DELETE from courses where id='$id'";
			$result=mysql_query($con,$q);
			if ($result) {
				header("location:../edit_topics.php?course_name=$course_name");
			}








 ?>