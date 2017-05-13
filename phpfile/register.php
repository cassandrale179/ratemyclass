<?php
	session_start();
	include "adb.php";

	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		//-----IF PASSWORD MATCH-----
		if ($_POST['password'] == $_POST['confirmpassword'])
		{
			$username = $_POST['username'];
			$email = $_POST['email'];
			$password = md5($_POST['password']);

			//-----EMAIL PARSING-----
			$myArray = explode('@', $email);
			if ($myArray[1] != "drexel.edu"){
				echo "<script>alert('Please enter your Drexel email address')</script>";
			}

			else
			{
				//Insert into database and redirect to dashboard
				$sql = "INSERT INTO users(username, email, password)". "VALUES ('$username', '$email', '$password')";
				if ($conn->query($sql)===true)
				{
					header("location: initclass.php");
					$_SESSION['username'] = $username;
					$_SESSION['logged_in'] = 1;
				}
			}
		}

		//-----IF PASSWORD DO NOT MATCH-----
		else{
			echo "<script>alert('Two passwords do not match'); </script>";
		}
	}
?>



<!-- __________________________________________ HTML PART _______________ ____________________  -->
<!DOCTYPE html>
<html lang = "en">
<html>
<head>
	<meta charset="utf-8">
 	<meta name = "viewport" content="width=device-wdith, initial-scale=1">
	<title> GradeRank Registration</title>

	<!-- Latest compiled and minified CSS for Bootstrap -->
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

 	<!-- Optional theme -->
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

 	<!-- Latest compiled and minified jQuery -->
	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"
	 integrity="sha256-/SIrNqv8h6QGKDuNoLGA4iret+kyesCkHGzVUUV0shc="
  	crossorigin="anonymous"></script>

  	<!-- jQuery 3.1.1 -->
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

 	<!-- Latest compiled and minified JavaScript -->
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

 	<!-- Link the HTML with CSS -->
	<link rel="stylesheet" href="../css/registerstyle.css" type="text/css">

	<!-- Link the HTML to Font Awesome Icon (Bootstrap CDN) -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div>
	    <form class="form form-group" action="register.php" method="post" enctype="multipart/form-data" autocomplete="off">


	    	<!-- ________________________________ FIRST DIV SHOWN ______________________________________-->
		    <div id="account">
		    	<h1>Register</h1>
			    <div>
					<label for="username"> Username: </label>
			    	<input class="form-control" type="text" placeholder="johndoe123" name="username" required />
			    </div>
			    <div class="space">
			    	<label for="email"> Drexel Email: </label>
				    <input class="form-control" type="email" placeholder="jd123@drexel.edu" name="email" required />
				</div>
				<div id="flex-display" class= "space">
					<div id="pass1">
						<label for="password"> Password: </label>
				    	<input type="password" class="form-control" placeholder="Password" name="password" autocomplete="new-password" aria-describedby="passHelp" required />
				    </div>
				    <div id = "pass2">
				    	<label for="confirmpassword"> Confirm Password: </label>
				    	<input type="password" class="form-control" placeholder="Password must match" name="confirmpassword" autocomplete="new-password" aria-describedby="passHelp2" required />
				    </div>
				</div>
				<div id="next">
					<input type="submit" value="Register" name="next" class="next-btn inline" />
				</div>
</body>
