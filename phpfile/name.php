<?php
  include "adb.php";
  $number = count($_POST["name"]);
  if($number > 0)
  {
    for($i=0; $i<$number; $i++)
    {
      if(trim($_POST["name"][$i] != ''))
      {
        $name = $_POST["name"][$i];
        $sql = "INSERT INTO score2(class)". "VALUES('$name')";
        if ($conn->query($sql) === true){
          echo "score submitted";
        }
        else{
          echo "unable to submit";
        }
      }
    }
  }
  else{
    echo "Please Enter Grade";
  }
?>
