<?php
	session_start();
	if ( $_SESSION['logged_in'] != 1 ) {
	  header('location: login.php');
	}
	else {
	    $username= $_SESSION['username'];
		};

	?>

<head>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=yes">
	<title>Sort Class</title>

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
	<link rel="stylesheet" href="../css/sortingstyle.css" type="text/css">

	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300" rel="stylesheet">
</head>

<body>
	<!-- NAVIGATION BAR -->
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
	<!-- OPTION ONE: SORTING FROM EASIEST TO MOST DIFFICULT -->
	<div id="C">
		<div id="C1">
			<button id="C2button"> CHOOSE A MAJOR </button>
			<input type="text" id="searchbar" placeholder="Type A Major Here..." list="classes"/>
				<datalist id="classes">
					<option value="Biology (BIO)">
					<option value="Computer Science (CS)">
					<option value="English (ENGL)">
					<option value="Mathematics (MATH)">
				</datalist>
		</div>
		<div id="C2">
			<button id="C2button"> CHOOSE LEVEL OF DIFFICULTY</button>
			<select id="mySelect">
				<option> Choose Sorting Order </option>
				<option value="Easy"> Easiest to Hardest</option>
				<option value="Difficult">Hardest to Easiest</option>
			</select>
		</div>

	</div>


		<div id="D">
			<button id="btnSave"> SUBMIT </button>
			<p><i>(If there is error, please refresh page and choose again)</i></p>
		</div>


<script type="text/javascript" src="sortpage2.js"></script>
</body>
