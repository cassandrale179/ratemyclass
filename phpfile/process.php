<?php

	session_start();
	include "adb.php";

//Get value from form
	$username = $_POST['username'];
	$password = md5($_POST['password']);

//Query the database for table user
	$result = mysqli_query($conn, "select * from users where username = '$username' and password='$password'") or die("Failure to query database" .mysqli_error($conn));
	$row = mysqli_fetch_array($result);

//Redirect to dashboard
	if ($row['username'] == $username && $row['password'] == $password){
		$_SESSION['logged_in'] = true;
		$_SESSION['username'] = $row['username'];
		header("location: dashboard.php");
	}
	else{
		echo "Failed to login";
	}

?>
