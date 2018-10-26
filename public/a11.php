<?php

if(isset($_POST['field1']) && isset($_POST['field2']) && isset($_POST['field3'])) {
$output=file_get_contents('output1.php');	//read output state selected by a23.php

$volt=($_POST['field1'] * 256 + $_POST['field2']) * 5 / 1024;	//calculate arduino input volts
$volt=round($volt, 3);

$a2="analogue input = " . $volt . " V<br>Digital input = " . $_POST['field3'] . "<br>" . $output;	
file_put_contents("input.php", $a2);	//record received inputs

echo $volt . " V  input=" . $_POST['field3'];
echo "\n" . $output;
}

?>

