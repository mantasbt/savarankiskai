<?php 

	// First task
	$months = array("Sausis", "Vasaris", "Kovas", "Balandis", "Gegužė"); 

	echo "Mano mėgstamiausi mėnesiai:<br>";
	?></ol><?php
		foreach ($months as $key => $month) {
			echo "<li>$month</li>";
		}
	?></ol><?php

	echo "<br><br>";

	// Second task
	$shopping_cart = [
	   [
	       'type' => 'vegetables',
	       'name' => 'potato',
	       'quantity' => '10',
	       'price' => '1.0'
	   ],
	   [
	       'type' => 'vegetables',
	       'name' => 'onion',
	       'quantity' => '5',
	       'price' => '0.5'
	   ],
	   [
	       'type' => 'vegetables',
	       'name' => 'cucumber',
	       'quantity' => '2',
	       'price' => '1.2'
	   ],
	    [
	       'type' => 'fruits',
	       'name' => 'banana',
	       'quantity' => '2',
	       'price' => '1.0'
	    ],
	    [
	       'type' => 'fruits',
	       'name' => 'apple',
	       'quantity' => '3',
	       'price' => '1.2'
	    ]
	];

	echo "<b>Vaisiai:</b><br>";
	foreach ($shopping_cart as $cart) {
		if($cart['type'] == "fruits"){
			$price = $cart['quantity'] * $cart['price'];
			echo $cart['name'] . " , kurių bendra kaina yra: " . $price . " Eu<br>";
		}
	}

	echo "<br><br>";

	echo "<b>Daržovės:</b><br>";
	foreach ($shopping_cart as $cart) {
		if($cart['type'] == "vegetables"){
			$price = $cart['quantity'] * $cart['price'];
			echo $cart['name'] . " , kurių bendra kaina yra: " . $price . " Eu<br>";
		}
	}

	echo "<br><br>";

	// Third task
	$myArray = array(1=>"Pirmas elementas", 2=>"Antras elementas", 3=>"Paskutinis elementas");
	
	function checkArray($array){
		if($array != null){
			echo end($array);
		}else{
			echo "Array is empty";
		}
	}
	checkArray($myArray);
