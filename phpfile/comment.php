<?php
  include "../phpfile/adb.php";
    date_default_timezone_set('America/New_York');
    if (isset($_POST['commentSubmit'])){
        $date = $_POST['date'];
        $class = $_POST['class'];
        $message = $_POST['message'];

        $sql = "INSERT INTO comments (class, date, message)". "VALUES ('$class', '$date', '$message')";
        if ($conn->query($sql)===true){
          header("location: ../class/classes.php");
      }
    }

?>
