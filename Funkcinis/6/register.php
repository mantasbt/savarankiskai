<?php
	session_start();
	
	$host = "localhost";
	$db = "maindb";
	$dsn = "mysql:host=$host;dbname=$db";
	$user = "root";
	$password = "";
	$pdo = new PDO($dsn, $user, $password);

	$sql = "INSERT INTO users (username, password, email, name) VALUES (:username, :password, :email, :name)";
	$sth = $pdo->prepare($sql);

	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$name = $_POST['name'];

	$data = array(
		'username' => $username,
		'password' => $password,
		'email' => $email,
		'name' => $name
	);
	$sth->execute($data);
	$_SESSION['message'] = "Sėkmingai prisiregistravote, dabar galite prisijungti";
	header("Location: index.php")
	
?>