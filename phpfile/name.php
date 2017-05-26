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
            $sql = "INSERT INTO test(name)". "VALUES('$name')";
            mysqli_query($conn, $sql);
          }
     }
     echo "Data Inserted";
}
else
{
     echo "Please Enter Name";
}
?>
