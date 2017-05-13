
<!DOCTYPE html>
<html lang = "en">
<html>
<head>
 	<meta charset="utf-8">
 	<meta name = "viewport" content="width=device-wdith, initial-scale=1">
 	<title>Login</title>
 	<meta name = "description" content = "ClassDoor">

 	<!-- Latest compiled and minified CSS-->
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

 	<!--Link HTML file to CSS file -->
 	<link href="../css/registerstyle.css" rel="stylesheet" type="text/css">

 </head>


<body>
<!-- Creating an account -->
<div id="account">
	<h1> LOGIN </h1>

	<!-- Creating input form -->
	<!-- 'name' tag is used later for SQL -->
	<form action="process.php" method="post">

		<div class="form-group">
			<label for="username"> Username: </label>
			<input type="text" class="form-control" name="username" id="username" placeholder="E.g: abc123">
		</div>

		<div class="form-group">
			<label for="password"> Password: </label>
			<input type="password" class="form-control" name="password" id="password"
			aria-describedby="passHelp" placeholder="New password">
		</div>

		<button id="login-mod"> Login </button><br>

		<div class="check">
			<label>
			<input type="checkbox" name="rememberpass" value="passrem"> Keep me logged in<br>
			</label>
		</div>

	</form>

</div>
</body>
</html>
