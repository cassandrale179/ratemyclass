<?php
    session_start();
    $class = "CS164"; //-------------------CHANGE VALUE HERE!!!!!
    include '../phpfile/classmessage.php';
    if ( $_SESSION['logged_in'] != 1 ) {
  	  header('location: ../phpfile/login.php');
  	}
  	else {
  	    // Makes it easier to read
  	    $username= $_SESSION['username'];
    }
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=yes">
	<title>CS 164</title>

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
	<link rel="stylesheet" href="../css/classpagestyle.css" type="text/css">

	<!-- Font style of Robot Condensed for ChartJs -->
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300" rel="stylesheet">
</head>

<body>
	<div id="A">
		<a href="../phpfile/dashboard.php"><div id="A1"></div></a>
		<a href="../phpfile/searchpage.php"><div id="A2"></div></a>
		<a href="../phpfile/sorting.php"><div id="A3"></div></a>
		<a href="../phpfile/inputgrade.php"><div id="A4"></div></a>
		<a href="../phpfile/setting.php"><div id="A5"></div></a>
		<a href="../phpfile/logout.php"><div id="A6"></div></a>
	</div>


	<h1> CS 164 </h1> <!-- _______________ CHANGE VALUE HERE!!!!! -->
	<div id="B">
		<div id="B1">
			<div id="easy"><h3 id="jsondisplay"> </h3></div>
			<canvas id="canvas1" width="450" height="360"></canvas>
		</div>
	</div>

	<div id="C">
		<button id="C1B"> COMPUTER PROGRAMMING I </button>
		<div id="C1">
			This course serves as an introduction to the field of computer science. This course is designed to introduce the field while reinforcing the importance of programming. Programming assignments will primarily be done in JavaScript and HTML, which are the principal programming languages used for producing pages for the World Wide Web. <br>
			<br>
			<b> Credits: </b> 3.00
			<br>
			<b> Prerequesites: </b> None
		</div>

		<br>

		<button id="C1B"> HAVE YOU TAKEN THIS CLASS BEFORE? </button>
		<div id="C2">
			<form method='post' action='classmessage.php'>
				<div id='wrapper'>
					<input name='letter' type='text' id='C2input' list='classes'
            placeholder='Enter your grade here :) Your data helps us grow!' required />
          <input name='class' type='hidden' value='CS171' /> <!-- _______________ CHANGE VALUE HERE!!!!! -->
					<datalist id='classes'>
						<option value='A+'>
						<option value='A'>
						<option value='A-'>
						<option value='B+'>
						<option value='B'>
						<option value='B-'>
						<option value='C+'>
						<option value='C'>
						<option value='C-'>
						<option value='D+'>
						<option value='D'>
						<option value='F'>
					</datalist>
					<button id='submit' name='gradeSubmit' value='gradeSubmit'> SUBMIT </button>
				</div>
			</form>
		</div>

		<div id="C3">
			<button id="review"></button>
		</div>

    <!-- ______________________ FORM TO SUBMIT REVIEW _________________ -->
		<div id="C4">
			<div id="target" style="display: none">
          <button> Yes </button>
          <button> No </button>
		  </div>
    </div>
  </div>
  </div>


<script> var className = "CS164"</script> <!-- CHANGE VALUE HERE!!!!! -->
<script type="text/javascript" src="../phpfile/classpage.js"></script>
