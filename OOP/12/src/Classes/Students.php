<?php
namespace AllClasses\Classes;

session_start();

use AllClasses\Database\Db;
use PDO;

class Students extends Db
{
	var $student_no;
	var $surname;
	var $forename;

	public function __construct($student_no, $surname, $forename){
        $this->getDb();
        if(isset($_POST['new_student'])):
            $this->student_no = $student_no;
            $this->surname = $surname;
            $this->forename = $forename;
        endif;
	}

	public function save(){
		$pdo = $this->getDb();
		$sql = "SELECT * FROM students WHERE student_no = $this->student_no AND surname = '$this->surname' AND forename = '$this->forename'";
		$res = $pdo->query($sql)->fetchAll(PDO::FETCH_OBJ);

		if($res){
            $_SESSION['message'] = "Toks studentas jau yra.";
            header('Location: index.php');
		}else{
			$sql = "INSERT INTO students (student_no, surname, forename) VALUES (:student_no, :surname, :forename)";

			$this->query($sql, [
				'student_no' => $this->student_no,
				'surname' => $this->surname,
				'forename' => $this->forename
			]);
            $_SESSION['message'] = "Naujas studentas pridėtas";
            header('Location: index.php');
		}
	}
}