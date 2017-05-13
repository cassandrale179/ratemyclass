<?php
  session_start();

  //Check to see if user is logged in
  if ($_SESSION['logged_in'] != 1 ){
    header('location: login.php');
  }
  else{
    	$username = $_SESSION['username'];
  }


 //Form submission
 include "adb.php";
 if ($_SERVER['REQUEST_METHOD'] == 'POST')
 {

   //capture things from form
   $class1 = $_POST['class1'];
   $letter1 = $_POST['letter1'];
   $year1 = $_POST['year1'];
   $class2 = $_POST['class2'];
   $letter2 = $_POST['letter2'];
   $year2 = $_POST['year2'];
   $class3 = $_POST['class3'];
   $letter3 = $_POST['letter3'];
   $year3 = $_POST['year3'];

   //Char letter grade conversion function
   if ($letter1 == "A")$letter1 = 4;
   if ($letter1 == "B")$letter1 = 3;
   if ($letter1 == "C")$letter1 = 2;
   if ($letter1 == "D")$letter1 = 1;
   if ($letter1 == "F")$letter1 = 0;
   if ($letter2 == "A")$letter2 = 4;
   if ($letter2 == "B")$letter2 = 3;
   if ($letter2 == "C")$letter2 = 2;
   if ($letter2 == "D")$letter2 = 1;
   if ($letter2 == "F")$letter2 = 0;
   if ($letter3 == "A")$letter3 = 4;
   if ($letter3 == "B")$letter3 = 3;
   if ($letter3 == "C")$letter3 = 2;
   if ($letter3 == "D")$letter3 = 1;
   if ($letter3 == "F")$letter3 = 0;


   //Store variables into database
   $sql1 = "INSERT INTO score2(class, grade, year)". "VALUES ('$class1', '$letter1', '$year1')";
   $sql2 = "INSERT INTO score2(class, grade, year)". "VALUES ('$class2', '$letter2', '$year2')";
   $sql3 = "INSERT INTO score2(class, grade, year)". "VALUES ('$class3', '$letter3', '$year3')";

   //if query is successful
   if ($conn->query($sql1)===true and $conn->query($sql2)===true and $conn->query($sql3)===true)
   {
     $_SESSION['message'] = "Registration successful.";
     $_SESSION['logged_in'] = 1;
     $_SESSION['minimum_class'] = 1;
     header("location: dashboard.php");
   }


 }



 ?>

<!-- ................................................................................................ -->
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





<div>
		<h1> What Classes Have You Taken? </h1>
    <h4> Enter at least three classes you have taken and your grade for that class. The information you provide is private and won't be shared without your consent (see Privacy Policy). </h4>

    <form class="form form-group" action="initclass.php" method="post" enctype="multipart/form-data" autocomplete="off">
    <div id="text-before-form">
    <!-- _______________________________________FIRST ROW___________________________________________ -->
      <div class="column">
        <div>
          <label> Class </label>
          <input class="form-control" type="text" placeholder="CS171" name="class1" list="drexelclass" required />
        </div>
      </div>
      <div class="column mid-padding">
        <label> Grade </label>
        <input type="text" class="form-control" name="letter1" placeholder="E.g: A+" list="grade" required />
      </div>
      <div class="column">
        <label> Year </label>
        <input type="number" class="form-control" name="year1"
        placeholder="E.g: 2014">
      </div>

      <!-- _______________________________________SECOND ROW___________________________________________ -->
      <div class="column">
        <div>
          <input class="form-control" type="text" placeholder="CS171" name="class2" list="drexelclass" required />
        </div>
      </div>
      <div class="column mid-padding">
        <input type="text" class="form-control" name="letter2" placeholder="E.g: A+" list="grade" required />
      </div>
      <div class="column">
        <input type="number" class="form-control" name="year2"
        placeholder="E.g: 2014">
      </div>


      <!-- _______________________________________THIRD ROW___________________________________________ -->
      <div class="column">
        <div>
          <input class="form-control" type="text" placeholder="CS171" name="class3" list="drexelclass" required />
        </div>
      </div>
      <div class="column mid-padding">
        <input type="text" class="form-control" name="letter3" placeholder="E.g: A+" list="grade" required />
      </div>
      <div class="column">
        <input type="number" class="form-control" name="year3"
        placeholder="E.g: 2014">
      </div>
      <input type="submit" value="Submit" name="next" class="reg-btn inline" />
  </div>
</div>
