
<?php

  include "../phpfile/adb.php";
  if(!$conn){
    die("Connection failed".mysqli_connect_error());
}

  date_default_timezone_set('America/New_York');

  //Adding Grades to Class Data
  if (isset($_POST['gradeSubmit'])){
    $letter = $_POST['letter'];
    $class = $_POST['class'];
    $year = $_POST['year'];

    if ($letter == "A" || $letter == "A+") $letter = 4;
    if ($letter == "A-") $letter = 3.67;
    if ($letter == "B+") $letter = 3.33;
    if ($letter == "B") $letter = 3;
    if ($letter == "B-") $letter = 2.67;
    if ($letter == "C+") $letter = 2.33;
    if ($letter == "C")$letter = 2;
    if ($letter == "C-") $letter = 1.67;
    if ($letter == "D+") $letter = 1.33;
    if ($letter == "D")$letter = 1;
    if ($letter == "F")$letter = 0;

      $sql = "INSERT INTO score2(class, grade, year) VALUES ('$class', '$letter', '$year')";
      if ($conn->query($sql)===true){
        header('location: ../class/classes.php');
      }


  }

?>
