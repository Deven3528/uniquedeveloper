<?php
session_start();

	$con=mysql_connect('localhost','root');
	mysql_select_db($con,'uniquedeveloper');

	
		 $id=$_POST['txt1'];
		echo "hello sunil";
		$q="select * from courses where id=$id";
		$result=mysql_query($con,$q);
		$res=mysql_fetch_array($result); 

	?>
      <div class="card col-md-6">
           <?php $_SESSION['message']=$res['description'];
           	
           //echo $res['description'];
            header("location:java_programming.php?course_name=".$res['course_name']); ?>


      </div>

	
	<?php ?>