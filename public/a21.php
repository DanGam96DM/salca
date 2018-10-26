<?php

if(isset($_POST['field4']) && isset($_POST['field5']) && isset($_POST['field6'])) {
$output=file_get_contents('output2.php');	//read output state selected by a23.php

$volt=($_POST['field4'] * 256 + $_POST['field5']) * 5 / 1024;	//calculate arduino input volts
$volt=round($volt, 3);

$a2="analogue input = " . $volt . " V<br>Digital input = " . $_POST['field6'] . "<br>" . $output;	
file_put_contents("input.php", $a2);	//record received inputs

echo $volt . " V  input=" . $_POST['field6'];
echo "\n" . $output;
}

?>

