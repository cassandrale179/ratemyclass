<?php
	session_start();
	include "adb.php";
	if ( $_SESSION['logged_in'] != 1 ) {
	  header('location: login.php');
	}
	else {

			//DISPLAYING CLASSES USER HAVE INPUT
	    $username= $_SESSION['username'];
			$result = mysqli_query($conn, "select * from users where username = '$username'") or die("Failure to query database" .mysqli_error($conn));
			$row = mysqli_fetch_array($result);
			$str = $row['userclass'];
			$classes = explode(",", $str);

			//DISPLAYING RECENTLY UPDATED CLASSES
			$rowSQL = mysqli_query($conn, "SELECT MAX( ID ) AS max FROM `score2`;" );
			$row2 = mysqli_fetch_array( $rowSQL );
			$largestNumber = $row2['max'];

			//I KNOW THIS CODE IS VERY INEFFICIENT BUT I AM DOING THIS AT 1 AM IN THE MORNING WITHOUT SLEEP AND I HAVE A DEMO TOMORROW
			$u1 = mysqli_query($conn, "select * from score2 where id = '$largestNumber'") or die("Failure to query database". mysqli_error($conn));
			$c1 = mysqli_fetch_array($u1)['class'];
			$u2 = mysqli_query($conn, "select * from score2 where id = '$largestNumber'-1");
			$c2 = mysqli_fetch_array($u2)['class'];
			$u3 = mysqli_query($conn, "select * from score2 where id = '$largestNumber'-2");
			$c3 = mysqli_fetch_array($u3)['class'];
			$u4 = mysqli_query($conn, "select * from score2 where id = '$largestNumber'-3");
			$c4 = mysqli_fetch_array($u4)['class'];
			$u5 = mysqli_query($conn, "select * from score2 where id = '$largestNumber'-4");
			$c5 = mysqli_fetch_array($u5)['class'];
			$u6 = mysqli_query($conn, "select * from score2 where id = '$largestNumber'-5");
			$c6 = mysqli_fetch_array($u6)['class'];
			$u7 = mysqli_query($conn, "select * from score2 where id = '$largestNumber'-6");
			$c7 = mysqli_fetch_array($u7)['class'];
			$u8 = mysqli_query($conn, "select * from score2 where id = '$largestNumber'-7");
			$c8 = mysqli_fetch_array($u8)['class'];
			$u9 = mysqli_query($conn, "select * from score2 where id = '$largestNumber'-8");
			$c9 = mysqli_fetch_array($u9)['class'];
			$u10 = mysqli_query($conn, "select * from score2 where id = '$largestNumber'-9");
			$c10 = mysqli_fetch_array($u10)['class'];

		};
	?>

	<head>
	<meta charset='utf-8'>
 	<meta name='viewport' content='width=device-width, height=device-height, initial-scale=1.0, user-scalable=yes'>
	<title> Dashboard</title>

	<!-- Latest compiled and minified CSS -->
 	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>

 	<!-- Optional theme -->
 	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css' integrity='sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp' crossorigin='anonymous'>

 	<!-- Latest compiled and minified jQuery -->
	<script src='https://code.jquery.com/jquery-3.1.1.slim.min.js'
	 integrity='sha256-/SIrNqv8h6QGKDuNoLGA4iret+kyesCkHGzVUUV0shc='
  	crossorigin='anonymous'></script>

 	<!-- Latest compiled and minified JavaScript -->
 	<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' integrity='sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa' crossorigin='anonymous'></script>

	<!-- Link the HTML to Font Awesome Icon (Bootstrap CDN) -->
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>

	<!--Link to chart.JS CDN -->
	<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.3/Chart.min.js'></script>

	<!-- Link the HTML with CSS -->
	<link rel='stylesheet' href='../css/dashboardstyle.css' type='text/css'>

	<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:300' rel='stylesheet'>
</head>

<body>
	<!--<div id='Header'> GRADE RANK </div>-->
	<div id='A'>
		<div id='A1'>
			<a href='dashboard.php'><button id='Abtn'> DASHBOARD </button></a>
		</div>
		<div id='A2'>
			<a href='searchpage.php'><button id='Abtn'> SEARCH CLASS</button></a>
		</div>
		<div id='A3'>
			<a href='sorting.php'><button id='Abtn'> SORT </button></a>
		</div>
		<div id='A4'>
			<a href='inputgrade.php'><button id='Abtn'> INPUT GRADE </button></a>
		</div>
		<div id='A5'>
			<a href='setting.php'><button id='Abtn'> SETTINGS </button></a>
		</div>
		<div id='A6'>
			<a href='logout.php'><button id='Abtn' name='logout'> LOGOUT </button></a>
		</div>
	</div>
	<div id="B1">
		<h1> Thank you for being our beta user! </h1>
		<h3> Would you mind answering our <b><a href="https://goo.gl/forms/HXxNC7qG2NWWjN7o1" target="blank">SURVEY </a> </b>to improve the website? Thank you :) </h3>
	</div>

	<div id='B2'>
		<canvas id='canvas' width='900' height='400'></canvas>
		<p>This figure displayed average grade across all classes under a college (e.g the average grade of all Lebow classes are 3.92 out of 4.00)</p>
	</div>

	<!-- ___________________________ LIST OF CLASSES_______________________________________ -->
	<div id="C">
		<h1> CLASSES YOU SUBMITTED </h1>
		To add more classes, click <a href="inputgrade.php"> HERE </a> and help build the data :)
		<?php
			for ($i = 0; $i < sizeof($classes)-1; $i++){
				echo "<li> You entered grade for <b>$classes[$i]</b></li>";
			}
		 ?>
	</div>

	<div id="D">
		<h1> RECENTLY UPDATED CLASSES </h1>
		To see all classes that contain grade, click <a href="../terms/available.php"> HERE.</a>
		<?php
			echo "<li>Someone just added grade for <b>$c1</b></li>";
			echo "<li>Someone just added grade for <b>$c2</b></li>";
			echo "<li>Someone just added grade for <b>$c3</b></li>";
			echo "<li>Someone just added grade for <b>$c4</b></li>";
			echo "<li>Someone just added grade for <b>$c5</b></li>";
			echo "<li>Someone just added grade for <b>$c6</b></li>";
			echo "<li>Someone just added grade for <b>$c7</b></li>";
			echo "<li>Someone just added grade for <b>$c8</b></li>";
			echo "<li>Someone just added grade for <b>$c9</b></li>";
			echo "<li>Someone just added grade for <b>$c10</b></li>";
		 ?>
	</div>
<script type="text/javascript" src="dashboardjs.js"></script>
</body>
