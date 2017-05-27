<?php
	session_start();
	include "adb.php";
	if ( $_SESSION['logged_in'] != 1 ) {
	  header('location: login.php');
	}
	else {
	    $username= $_SESSION['username'];
      $result = mysqli_query($conn, "select * from users where username = '$username'") or die("Failure to query database" .mysqli_error($conn));
      $row = mysqli_fetch_array($result);
      $str = $row['userclass'];
      $classes = explode(",", $str);
      $enter = 0;
		};
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<link rel="stylesheet" href="../css/inputgradestyle.css" type="text/css">
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
			<a href='logout.php'><button id="Abtn" name="logout"> LOGOUT </button></a>
		</div>
	</div>

  <div id="B">
    <form name="add_name" id="add_name">
      <div class="table-responsive">
        <table id="dynamic_field">
            <tr>
              <th>Class</th>
              <th>Grade</th>
              <th>Year</th>
            </tr>
            <tr>
              <td><input type="text" name="name[]" placeholder="CS171" list="classes" /></td>
              <datalist id="classes"></datalist>
              <td><input type="text" name="letter[]" placeholder = "A+" /></td>
              <td><input type="text" name="year[]" placeholder="2014" /></td>
              <td><button type="button" name="add" id="add">Add More</button></td>
            </tr>
        </table>
        <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />
      </div>
    </form>
  </div>
</body>
 </html>
 <script src="datalist.js"></script>
 <script>
 $(document).ready(function(){
      var i=1;
      $('#add').click(function(){
           i++;
           $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="name[]" list="classes" /></td>  <datalist id="classes"></datalist><td><input type="text" name="letter[]" placeholder = "A+" /></td><td><input type="text" name="year[]"</td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
      });
      $(document).on('click', '.btn_remove', function(){
           var button_id = $(this).attr("id");
           $('#row'+button_id+'').remove();
      });
      $('#submit').click(function(){
           $.ajax({
                url:"name.php",
                method:"POST",
                data:$('#add_name').serialize(),
                success:function(data)
                {
                     alert(data);
                     $('#add_name')[0].reset();
                }
           });
      });
 });
 </script>
