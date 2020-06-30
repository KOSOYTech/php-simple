<?php
    $numbers = array();
	for ($i = 1; $i <= 10; $i++) {
    	array_push($numbers, rand());
	}
    rsort($numbers);
    foreach ($numbers as $value) {
    	echo $value . "<br/>";
	}
?>