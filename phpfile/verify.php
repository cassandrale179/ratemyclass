<?php
  session_start();
  include "adb.php";
  if ($_SESSION['logged_in'] != 1 ){
  header('location: login.php');
  }
  else
  {
    $username = $_SESSION['username'];

    //if user hasn't input grade, force them to
    if ($_SESSION['minimum_class'] != 1){
      header('location: initclass.php');
    }

    else{
      $_SESSION['minimum_class'] = 1;
      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
        $randnum = $_POST['verification'];
        $result = mysqli_query($conn, "select * from users where username = '$username' and randnum='$randnum'") or die("Failure to query database" .mysqli_error($conn));
        $row = mysqli_fetch_array($result);

        if ($row['username'] == $username && $row['randnum'] == $randnum)
        {
      		$_SESSION['logged_in'] = 1;
      		$_SESSION['username'] = $row['username'];
      		header("location: dashboard.php");
      	}
        else{
      		echo "<script>alert('Wrong verification code.')</script>";
      	}
      }

    }
  }
?>

<!-- __________________________________________ HTML PART ____________________________________  -->
<!DOCTYPE html>
<html lang = "en">
<html>
<head>
	<meta charset="utf-8">
 	<meta name = "viewport" content="width=device-wdith, initial-scale=1">
	<title> Verification </title>

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
  <form class="form form-group" action="verify.php" method="post" enctype="multipart/form-data" autocomplete="off">
      <h1> Your Account Is Created :) </h1>
      <h4> A verification code has been sent to your Drexel email address. Please check your Drexel Email address. </h4>
      <label for="verification"> Verification Code: </label>
        <input class="form-control" type="text" placeholder="0000" name="verification" required />
      </div>
      <div id="verify">
        <input type="submit" value="Verify Account" name="verify" class="next-btn inline" />
      </div>
  </form>
</body>
