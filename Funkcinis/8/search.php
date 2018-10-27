<?php
	session_start();

	function getDb(){
		$host = "localhost";
		$user = "root";
		$password = "";
		$db = "learn";
		$dsn = "mysql:host=$host;dbname=$db";
		return new PDO($dsn, $user, $password);
	}
	function searchResults($module_name, $surname, $forename){
		$sql = "SELECT module_name, surname, forename 
				FROM marks
				LEFT JOIN modules ON marks.module_code = modules.module_code 
				LEFT JOIN students ON students.student_no = marks.student_no
				WHERE module_name LIKE :module_name AND surname LIKE :surname AND forename LIKE :forename";
		$sth = getDb()->prepare($sql);

		$sth->bindParam('module_name', $module_name);
		$sth->bindParam('surname', $surname);
		$sth->bindParam('forename', $forename);

		$sth->execute(
			array(
		        'forename' => "%".$forename."%",
		        'surname' => "%".$surname."%",
		        'module_name' => "%".$module_name."%"
    		)
		);

		$result = $sth->fetchAll(PDO::FETCH_ASSOC);
	    $count = $sth->rowCount();
	    if($count > 0){
	        return $result;
	    } 
	    else {
	        return false;
	    }
	}

	$results = searchResults($_GET['module_name'], $_GET['surname'], $_GET['forename']);

	if(!empty($results)){
		$_SESSION['results'] = $results;

		header("Location: index.php");
	}else{
		$_SESSION['error'] = "Įrašų nerasta.";
		header("Location: index.php");
	}

