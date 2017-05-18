<?php

	session_start();
	include "adb.php";
	if ( $_SESSION['logged_in'] != 1 ) {
	  header('location: login.php');
	}
	else
	{
		$username= $_SESSION['username'];
		if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{

			//Capture the password
			$password = base64_encode($_POST['current']);
			$newpass = base64_encode($_POST['new']);
			$newpass2 = base64_encode($_POST['new2']);

			//Query the database for table user
			$result = mysqli_query($conn, "select * from users where username = '$username' and password='$password'") or die("Failure to query database" .mysqli_error($conn));
			$row = mysqli_fetch_array($result);

			//Check if the user log in is the owner of the account
			if ($row['username'] == $username && $row['password'] == $password)
			{
				if ($newpass == $newpass2){
					 $sql = "UPDATE users SET password='$newpass' WHERE username='$username'";
					 if (mysqli_query($conn, $sql)){
						 echo "<script>alert('Your password is updated!')</script>";
					 }
				}
				else{
					 echo "<script>alert('Password do not match')</script>";
				}
			}
			else{
				echo "<script>alert('Cannot update password. Please logout and try again')</script>";
			}
		}
	}
?>
<head>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=yes">
	<title>Settings</title>

	<!-- Latest compiled and minified CSS -->
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

 	<!-- Optional theme -->
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

 	<!-- Latest compiled and minified jQuery -->
	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"
	 integrity="sha256-/SIrNqv8h6QGKDuNoLGA4iret+kyesCkHGzVUUV0shc="
  	crossorigin="anonymous"></script>

 	<!-- Latest compiled and minified JavaScript -->
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<!-- Link the HTML to Font Awesome Icon (Bootstrap CDN) -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<!--Link to chart.JS CDN -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.3/Chart.min.js"></script>

	<!-- Link the HTML with CSS -->
	<link rel="stylesheet" href="../css/settingstyle.css" type="text/css">

	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300" rel="stylesheet">


</head>

<body>
	<div id="A">
		<div id="A1">
			<a href="dashboard.php"><button id="Abtn"> DASHBOARD </button></a>
		</div>
		<div id="A2">
			<a href="searchpage.php"><button id="Abtn"> SEARCH CLASS</button></a>
		</div>
		<div id="A3">
			<a href="sorting.php"><button id="Abtn"> SORT </button></a>
		</div>
		<div id="A4">
			<a href="inputgrade.php"><button id="Abtn"> INPUT GRADE </button></a>
		</div>
		<div id="A5">
			<a href="setting.php"><button id="Abtn"> SETTINGS </button></a>
		</div>
		<div id="A6">
			<a href='logout.php'><button id="Abtn" name="logout"> LOGOUT </button></a>
		</div>
	</div>

<!-- _______________________________ CHANGING PASSWORD __________________________________________ -->
<div id="B">
	<a href="#"><button> CHANGE PASSWORD </button></a>
	<div id="B1">
		<form action="setting.php" method="post">
			<h4>Current: &nbsp&nbsp<input type="password" name="current"></h4>
			<h4>New: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="password" name="new"></h4>
			<h4>Re-type: &nbsp <input type="password" name="new2"></h4><br />
		<div id="B2">
			<button type="submit">SAVE</button>
		</div>
		</form>
	</div>
</div>
