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

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>

<body>
	<!--<div id="Header"> GRADE RANK </div>-->
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

<!--

<div id="B">
		<form name="add_class" id="add_class">
			<table id="dynamic_field">
				<tr>
					<th>Class</th>
					<th>Grade</th>
					<th>Year</th>
				</tr>
				<tr>
					<td><input type="text" name="class[]" placeholder="MATH101"/></td>
					<td><input type="text" name="letter[]" placeholder="A+"/></td>
					<td><input type="text" name="year[]" placeholder="2014"/></td>
					<td><button type="button" name="add" id="add"> ADD+</button></td>
				</tr>
			</table>
			<button id="submit"> Submit </button>
		</form>
</div>


<script>
	$(document).ready(function(){
		var i = 1;
		$('#add').click(function(){
			i++;
			$('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="class[]" placeholder="MATH101" /></td><td><input type="text" name="letter[]" placeholder = "A+" /></td><td><input type="text" name="year[]" placeholder="2014" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
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
</script> -->

<div id="B">
<form name="add_name" id="add_name">
		 <div class="table-responsive">
					<table class="table table-bordered" id="dynamic_field">
							 <tr>
										<td><input type="text" name="name[]" placeholder="CS171" required /></td>
										<td><input type="text" name="letter[]" placeholder = "A+" /></td>
										<td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
							 </tr>
					</table>
					<input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />
		 </div>
</form>
</div>
</body>
</html>
<script>
$(document).ready(function(){
var i=1;
$('#add').click(function(){
i++;
$('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="name[]" placeholder="Enter your Name" /></td><td><input type="text" name="letter[]" placeholder = "A+" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
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
</body>
