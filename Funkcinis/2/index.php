<?php

	// First task
	function myName(){
		echo "<h1>Mantas</h1>";
	}
	myName();

	echo "<br><br>";


	// Second task
	function checkString(String $text, $bool){
		if(!isset($text)){
			return false;
		}elseif($bool === true){
			echo "<h1>$text</h1>";
		}else{
			echo $text;
		}
	}
	checkString("Tekstas", true);

	echo "<br><br>";


	// Third task
	function checkStatus($state){
		$name = myName();

		if($state == "happy"){
			$smile = ":)";
			echo $name . " is " . $smile . " today";
		}elseif($state == "sad"){
			$smile = ":(";
			echo $name . " is " . $smile . " today";
		}else{
			$smile = ":|";
			echo $name . " is " . $smile . " today";
		}
	}
	checkStatus("happy");

?>