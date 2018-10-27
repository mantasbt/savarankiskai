<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Daras Nr.4</title>

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<div class="col-sm-12 from_box">
		<div class="col-lg-3 col-sm-6">
			<form action="user.php" method="post">
				<div class="form-group">
			    	<label for="name">Vardas:</label>
			    	<input type="text" class="form-control" name="name">
			  	</div>
			  	<div class="form-group">
			    	<label for="pass">Slaptažodis:</label>
			    	<input type="password" class="form-control" name="pass">
			  	</div>
			  	<button type="submit" class="btn btn-primary">Prisijungti</button>
			</form>
		</div>
	</div>

	<?php
		if(isset($_SESSION['message'])):
			echo $_SESSION['message'];
			unset($_SESSION['message']);
		endif;
	?>

</body>
</html>