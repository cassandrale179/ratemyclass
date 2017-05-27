<?php
  session_start();
  $username= $_SESSION['username'];
  include "adb.php";
  $result = mysqli_query($conn, "select * from users where username = '$username'") or die("Failure to query database" .mysqli_error($conn));
  $row = mysqli_fetch_array($result);
  $str = $row['userclass'];
  $classes = explode(",", $str);
  $enter = 0;

  $number = count($_POST["name"]);

  if($number > 0)
  {
    //MAKE A LOOP TO INSERT SCORE INTO THE DATABASE
    for($i=0; $i<$number; $i++)
    {
      if(trim($_POST["name"][$i] != ''))
      {
        //CAPTURE STUFF FROM FORM AND CHECK IF CLASS ALREADY EXIST
        $name = $_POST["name"][$i];
        /*for ($i = 0; $i < sizeof($classes); $i++){
          if ($classes[$i] == $name){
            $enter = 1;
            echo "You already enter grade for this class";
          }
        }*/

        $letter = $_POST["letter"][$i];
        $year = $_POST["year"][$i];

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

        //INSERT STUFF TO FORM
          $str .= $name .",";
          $sql = "INSERT INTO score2(class, grade, year)". "VALUES('$name', '$letter', '$year')";
          $update = "UPDATE course SET sum = sum + '$letter', count = count + 1 WHERE class = '$name'";
          $check = "UPDATE users SET userclass = '$str' WHERE username = '$username'";
          mysqli_query($conn, $sql);
          mysqli_query($conn, $update);
          mysqli_query($conn, $check);
      }
    }
      echo "Data submitted";
  }
  else{
    echo "Please Enter Grade";
  }
?>
