<?php
    session_start();
    include "../phpfile/adb.php";
    include "../phpfile/comment.php";
    if ( $_SESSION['logged_in'] != 1 ) {
  	  header('location: ../phpfile/login.php');
  	}
  	else
    {
      $username= $_SESSION['username'];
      date_default_timezone_set('America/New_York');

      //QUERY THE DATABASE FOR USER CLASS
      $result = mysqli_query($conn, "select * from users where username = '$username'") or die("Failure to query database" .mysqli_error($conn));
      $row = mysqli_fetch_array($result);
      $str = $row['userclass'];

      //ADDING GRADES TO CLASS DATA
      if (isset($_POST['gradeSubmit']))
      {
        //CAPTURE STUFF FROM FORM
        $letter = $_POST['letter'];
        $class = $_POST['class'];
        $year = $_POST['year'];

        //GRADE CONVERSION FUNCTION
        if ($letter == "A" || $letter == "A+") $letter = 4;
        if ($letter == "A-") $letter = 3.67;
        if ($letter == "B+") $letter = 3.33;
        if ($letter == "B")  $letter = 3;
        if ($letter == "B-") $letter = 2.67;
        if ($letter == "C+") $letter = 2.33;
        if ($letter == "C")  $letter = 2;
        if ($letter == "C-") $letter = 1.67;
        if ($letter == "D+") $letter = 1.33;
        if ($letter == "D")  $letter = 1;
        if ($letter == "F")  $letter = 0;

        //CHECK IF USER ALREADY ENTER GRADE FOR THAT CLASS
        $enter = 0;
        $classes = explode(",", $str);
        for ($i = 0; $i < sizeof($classes); $i++){
          if ($classes[$i] == $class){
            echo "<script>alert('You already enter grade for this class')</script>";
            $enter = 1;
          }
        }

        //IF THEY HAVEN'T ENTER THE GRADE FOR THAT CLASS YET
        if ($enter == 0){
          $str .= $class .",";
          $sql = "INSERT INTO score2(class, grade, year) VALUES ('$class', '$letter', '$year')";
          $update = "UPDATE course SET sum = sum + '$letter', count = count + 1 WHERE class = '$class'";
          $check = "UPDATE users SET userclass = '$str' WHERE username = '$username'";
          if ($conn->query($sql)===true and $conn->query($check)===true and $conn->query($update) === true){
              header('location: ../class/classes.php');
          }
        }
      }
    }
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=yes">
  <title> Search</title>

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

  <!-- Some jQuery stuff for the dialogue box -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

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

  <h1 id="header"></h1>
	<div id="B">
		<div id="B1">
			<div id="easy"><h3 id="jsondisplay"> </h3></div>
			<canvas id="canvas1" width="450" height="360"></canvas>
		</div>
	</div>

<div id="C">

      <!-- _________________ COURSE DESCRIPTION GOES HERE __________________  -->
		<button id="C1B"> </button>
		<div id="C1">
		</div>

		<br>

    <!-- _________________ USER CAN INPUT GRADE HERE __________________  -->
		<button id="C1B"> HAVE YOU TAKEN THIS CLASS BEFORE? </button>
		<div id="C2">
			<form method='post' action='classes.php'>
				<div id='wrapper'>
					<input name='letter' type='text' id='C2input' list='classes'
            placeholder='Grade' required />
          <input name='year' type='text' placeholder="Year" id='C2input' />
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

      <!-- _________________ USER CAN ADD COMMENTS HERE  __________________  -->
  		<div id="C3">
  			<button id="review">ADD REVIEW + </button>
  		</div>
		  <div id="C4">
          <form method='POST' action='../phpfile/comment.php'>
            <div id='classplace'></div>
            <div id='target' style='display:none'>
              <input type='hidden' name='date' value="<?php echo date('Y-m-d');?>"/>
              <textarea id='C4input' name='message' required></textarea><br />
              <button type='submit' name='commentSubmit'> Submit </button>
              <h5> Your review will be posted anonymously. </h5>
            </div>
          </form>
      </div>
</div>
<div id="D">
  <h3> Reviews </h3>
  <h5> Reviews for a class will be posted down here.</h5>
</div>

<br /><br />
<script type="text/javascript" src="../phpfile/classpage.js"></script>

<div id="dialog" title="NO DATA EXIST">
  <p> No data exist for this class yet :( To see a list of classes with data, click <a href="../terms/available.php"><b>HERE.</b></a> Else, invite more Drexel students to join and grow data! </p>
</div>
