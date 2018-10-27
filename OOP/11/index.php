<?php

abstract class Db
{
    const HOST = "localhost";
    const USER = "root";
    const PASSWORD = "";
    const DB = "learn";

    protected function getDb(){
        try{
            return new PDO('mysql:host=localhost;dbname=learn', 'root', '');
        }
        catch (Exception $e){
            echo "Nepavyko prisijungti prie DB";
            exit();
        }
    }

    protected function query($sql, $params = []){
        $sth = $this->getDb()->prepare($sql);
        $sth->execute($params);

        return $sth;
    }
}

class Student extends Db
{
	var $results;
	var $student_no;
	var $surname;
	var $forename;

	public function __construct($student_no, $surname, $forename){
		$this->getDb();
		$this->student_no = $student_no;
		$this->surname = $surname;
		$this->forename = $forename;
	}

	public function save(){
		$pdo = $this->getDb();
		$sql = "SELECT * FROM students WHERE student_no = $this->student_no AND surname = '$this->surname' AND forename = '$this->forename'";
		$res = $pdo->query($sql)->fetchAll(PDO::FETCH_OBJ);

		if($res){
			echo "Toks studentas jau yra.";
		}else{
			$sql = "INSERT INTO students (student_no, surname, forename) VALUES (:student_no, :surname, :forename)";

			$this->query($sql, [
				'student_no' => $this->student_no,
				'surname' => $this->surname,
				'forename' => $this->forename
			]);
			echo "Studentas pridėtas.";
		}
	}
}

$student = new Student("57", "Petras", "Petrauskas");
$student->save();
