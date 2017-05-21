<?php
$input = trim(fgets(STDIN));
$average = getAverage($input);
while ($average <= 5) {
    $input .= "9";
    $average = getAverage($input);
}
echo $input;

function getAverage($num) {
    $sumOfDigits = 0;
    for ($i = 0; $i < strlen($num); $i++) {
        $sumOfDigits += intval($num[$i]);
    }
    return $sumOfDigits / strlen($num);
}