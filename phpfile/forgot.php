<?php
  session_start();
  include "adb.php";
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    	$email = $_POST['email'];
      $myArray = explode('@', $email);

      //----- IF IT'S NOT DREXEL EMAIL------
			if ($myArray[1] != "drexel.edu"){
				echo "<script>alert('Please enter your Drexel email address')</script>";
			}

      //----- ELSE SEND PASSWORD TO EMAIL------
      else{

        //retrieve username & password from database
        $result = mysqli_query($conn, "select * from users where email = '$email'")
        or die("Failure to query database" .mysqli_error($conn));
        $row = mysqli_fetch_array($result);
        $username = $row['username'];
        $password = base64_decode($row['password']);


        /*send email to user */
        $to = $email;
        $subject = "Your Password & Username | RateMyClass";
        $message = "Your username is $username and your password is $password";
        $headers = 'From:noreply@ratemyclass.org' . "\r\n";
        mail($to, $subject, $message, $headers);
      }
  }
?>



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
</body>
  <div id="forgotpassdiv">
      <h1> FORGOT YOUR PASSWORD? </h1>
        <h4> Input your Drexel email address below. We'll email instructions on how to retrieve your password and username. </h4>
      <form action="forgot.php" method="post">
     		<div class="form-group">
          <label for="email"> Email: </label>
    			<input type="email" class="form-control" name="email" placeholder="jd123@drexel.edu" required />
          <button id="forgot-btn" type="submit" name="forgotpass"> Submit </button>
        </div>
  </div>
</body>
