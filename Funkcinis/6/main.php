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

<?php echo "Sveiki, ".$_SESSION['username'] ?>
<br><br>
<a href="logout.php"><button>Atsijungti</button></a>

</body>
</html>