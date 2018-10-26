<?php

if(isset($_POST['field13']) && isset($_POST['field14']) && isset($_POST['field15'])) {
$output=file_get_contents('output5.php');	//read output state selected by a23.php

$volt=($_POST['field13'] * 256 + $_POST['field14']) * 5 / 1024;	//calculate arduino input volts
$volt=round($volt, 3);

$a2="analogue input = " . $volt . " V<br>Digital input = " . $_POST['field15'] . "<br>" . $output;	
file_put_contents("input.php", $a2);	//record received inputs

echo $volt . " V  input=" . $_POST['field15'];
echo "\n" . $output;
}

?>

