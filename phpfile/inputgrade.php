<head>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=yes">
	<title>Search Page</title>

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
	<link rel="stylesheet" href="../css/inputgradestyle.css" type="text/css">

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
			<a href='setting.php'><button id="Abtn"> SETTINGS </button></a>
		</div>
		<div id="A6">
			<a href='index.html'><button id="Abtn" name="logout"> LOGOUT </button></a>
		</div>
	</div>

	<div id="B">
		<div id="B1">
			<button id="class"> Class Name </button>
			<form>
				<input type="text" placeholder="Enter a class here" list="classes"/>
				<datalist id="classes">
					<option value="MATH 221">
					<option value="CS 171">
					<option value="CS 260">
					<option value="CS 164">
				</datalist>
			</form>
		</div>
		<div id="B2">
			<button id="grade"> Grade </button>
			<form>
				<input type="text" placeholder="A+"/>

			</form>
		</div>
		<div id="B3">
			<button id="year"> Year </button>
			<form>
				<input type="text" placeholder="2014"/>
			</form>
		</div>
	</div>


	<div id="C">
			 <button id="inputSubmit"> ADD MORE + </button>
	</div>
</body>
