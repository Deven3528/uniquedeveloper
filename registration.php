<?php 

session_start();


$con=mysql_connect('localhost','root');

if ($con) 
  {
		echo "connection successful";
  }
else
	{
		echo "no connection";
	}

 mysql_select_db($con,'uniquedeveloper');
 $name=$_POST['name'];
 $pass=$_POST['password'];
 $email=$_POST['email'];

 $q="select * from login where username='$name' && password='$pass'";

 $result=mysql_query($con,$q);
 $num=mysql_num_rows($result);
 if ($num==1)
  {
 	"duplicate data";
 	header('location:signup.html');
 }
 else
 {
 	$qy="insert into login(username,password,email) values('$name','$pass','$email')";
 	mysql_query($con,$qy);
 	echo "inserted";
 	header('location:login.php');
 }





 ?>