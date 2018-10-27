<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Daras Nr.6</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col">
				<form action="register.php" method="post">
					<legend>Registracija</legend>
					<div class="form-group">
				    	<label for="username">Vartotojo vardas:</label>
				    	<input type="text" class="form-control" name="username" required>
				  	</div>
				  	<div class="form-group">
				    	<label for="pass">Slaptažodis:</label>
				    	<input type="password" class="form-control" name="password" required>
				  	</div>
				  	<div class="form-group">
				    	<label for="email">El. paštas:</label>
				    	<input type="email" class="form-control" name="email" required>
				  	</div>
				  	<div class="form-group">
				    	<label for="name">Vardas:</label>
				    	<input type="text" class="form-control" name="name" required>
				  	</div>
				  	<button type="submit" class="btn btn-primary">Registruotis</button>
				</form>
			</div>

			<div class="col">
				<form action="login.php" method="post">
					<legend>Prisijungimas</legend>
					<div class="form-group">
				    	<label for="username">Vartotojo vardas:</label>
				    	<input type="text" class="form-control" name="username" required>
				  	</div>
				  	<div class="form-group">
				    	<label for="pass">Slaptažodis:</label>
				    	<input type="password" class="form-control" name="password" required>
				  	</div>
				  	<button type="submit" class="btn btn-primary">Prisijungti</button>
				</form>
			</div>
			



		</div>
	</div>

	<?php
		if(isset($_SESSION['message'])){
			echo $_SESSION['message'];
			unset($_SESSION['message']);
		}
	?>

</body>
</html>