<?php

	session_start();
	$name = $_POST['name'];
	$pass = $_POST['pass'];

	$user = array(
		'username' => "admin",
		'password' => "admin123"
	);
	$myUser = array(
		'username' => $name,
		'password' => $pass
	);

	function checkUser($user, $myUser){
		global $name;
		if($user['username'] == $myUser['username'] && $user['password'] == $myUser['password']){
			$_SESSION['message'] = "<p>Prisijungęs vartotojas: <b>" . $name . "</b></p>";
			header("Location: index.php");
		}else{
			$_SESSION['message'] = "Prisijungti gali tik admin";
			header("Location: index.php");
		}
	}
	checkUser($user, $myUser);

?>