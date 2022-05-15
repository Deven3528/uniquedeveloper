
<?php
	


		  $con=mysql_connect('localhost','root');
      mysql_select_db($con,'uniquedeveloper');

       $topicname=$_POST['topic_name'];
	 	$coursename=$_POST['coursename'];
	 	$description=$_POST['editor'];
	 	// echo $topicname;
	 	// echo $coursename;
	 	// echo $description;

	 	$qy="INSERT INTO `courses`( `topic_name`, `description`, `course_name`) VALUES ('$topicname','$description','$coursename')";


 	mysql_query($con,$qy);
 	// echo "inserted";
 	header('location:admin_edit_courses.php?course_name='.$coursename);
?>