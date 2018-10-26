<?php

if(isset($_POST['field10']) && isset($_POST['field11']) && isset($_POST['field12'])) {
$output=file_get_contents('output4.php');	//read output state selected by a23.php

$volt=($_POST['field10'] * 256 + $_POST['field11']) * 5 / 1024;	//calculate arduino input volts
$volt=round($volt, 3);

$a2="analogue input = " . $volt . " V<br>Digital input = " . $_POST['field12'] . "<br>" . $output;	
file_put_contents("input.php", $a2);	//record received inputs

echo $volt . " V  input=" . $_POST['field12'];
echo "\n" . $output;
}

?>

