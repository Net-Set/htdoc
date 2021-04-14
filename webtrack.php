<?php
$con = mysqli_connect('localhost','root');
	if($con){
		echo "connect are done";
	}else{
		echo "connect are faile";
	}
	mysqli_select_db($con,'webtrack');
	$Names = $_POST['Name'];
	$Emails = $_POST['Email'];
	$Messages = $_POST['Message'];


	$query = "insert into webtrackform (Name,Email,Message) values ('$Names','$Emails','$Messages')";

	mysqli_query($con,$query);

	header('location:WEBtrack-home.html');
?>