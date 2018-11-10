<?php
session_start();

require "vendor/autoload.php";

use AllClasses\Classes\Students;

$student_no = $_POST['student_no'];
$surname = $_POST['surname'];
$forename = $_POST['forename'];

if(isset($_POST['new_student'])){
    $student = new Students($student_no, $surname, $forename);
    $student->save();
}

if(isset($_POST['new_mark'])){
    $student = new Students($student_no, $surname, $forename);
    $student->save();
}