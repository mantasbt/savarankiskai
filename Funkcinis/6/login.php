<?php
	session_start();
	
	$host = "localhost";
	$db = "maindb";
	$dsn = "mysql:host=$host;dbname=$db";
	$user = "root";
	$password = "";
	$pdo = new PDO($dsn, $user, $password);

	$sql = "SELECT * FROM users WHERE username=:username AND password=:password";
	$sth = $pdo->prepare($sql);

	$sth->bindParam(':username', $username);
	$sth->bindParam(':password', $password);

	$username = $_POST['username'];
	$password = $_POST['password'];

	$sth->execute();
	$user = $sth->fetch(PDO::FETCH_ASSOC);

	if($user != false){
		$_SESSION['username'] = $user['username'];
		header("Location: main.php");
	}else{
		$_SESSION['message'] = "Neteisingas vartotojo vardas arba slaptažodis";
		header("Location: index.php");
	}

?>