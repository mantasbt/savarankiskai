<?php
	session_start();
	
	//Išsaugom failą į uploads direktoriją
	$uploaddir = __DIR__."\\uploads\\";
	$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

	if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
	    $_SESSION['file_upload'] = "Failas išsaugotas aplanke Uploads";
	} else {
	    $_SESSION['file_upload'] = "Failas didesnis, nei 5 Mb";
	    header("Location: index.php");
	    exit;
	}

	//Įrašom failą į files.txt
	date_default_timezone_set ("Europe/Vilnius");
	$date = date("Y-m-d H:i:s");
	$upload_file_name = $date . " " . basename($_FILES['userfile']['name']).PHP_EOL;
	$file = "files.txt";

	if(!file_exists($file)){
		file_put_contents($file, $upload_file_name);
		$_SESSION['message'] = "Failo įrašas sukurtas";
		header("Location: index.php");
	}else{
		file_put_contents($file, $upload_file_name, FILE_APPEND);
		$_SESSION['message'] = "Failo įrašas pridėtas";
		header("Location: index.php");
	}
?>