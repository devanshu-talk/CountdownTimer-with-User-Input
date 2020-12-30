<?php
	session_start();
	if(isset($_POST['submit']))
	{
		echo "hi";
		$_SESSION['hr'] = $_POST['hr'];
		$_SESSION['min'] = $_POST['min'];
		$_SESSION['sec'] = $_POST['sec'];
		header("Location: timer.php");
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Timer</title>
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	
	</head>
	<style>
	.vertical-center {
		  padding-top: 100px;
		}
	</style>
	<body class="container vertical-center" style="background-image: url('https://cdn.shutterstock.com/shutterstock/videos/3006571/thumb/1.jpg?i10c=img.resize(height:160)'); background-size: cover; color:antiquewhite;">
		<h1><center><strong>Timer</strong></center></h1>
			
				<form class="form-horizontal" method="post" >
				<div class="form-group">
					<label class="col-sm-4" for="email">Hours:</label>
					<div class="col-sm-10">
					  <input type="number" class="form-control" id="hr" placeholder="Hours" name="hr" value="0" min="0">
					</div>
				  </div>
				  <div class="form-group">
					  <label class="col-sm-4" for="min">Minutes:</label>
					<div class="col-sm-10">
					  <input type="number" class="form-control" id="min" placeholder="Minutes" name="min" value="0" min="0" max="59">
					</div>
				  </div>
				  <div class="form-group">
					  <label class="col-sm-4" for="sec">Seconds:</label>
					<div class="col-sm-10">
					  <input type="number" class="form-control" id="sec" placeholder="Seconds" name="sec" value="0" min="0" max="59">
					</div>
				  </div>

				  <div class="form-group">	
					<div class="col-sm-offset col-sm-10">
						<button type="submit" class="btn btn-default" name="submit" style="border: 2px solid black;"><strong>Submit</strong></button>
					</div>
				  </div>
			</form> 
		
	</body>
</html>	 