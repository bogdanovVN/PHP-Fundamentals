<?php
$number = (trim(fgets(STDIN)));
while (getAverage($number) <= 5) {
    $number .= "9";
}
echo $number;

function getAverage ($num) {
    $length = strlen($num);
    $sum = 0;
    for ($i = 0; $i < $length; $i++) {
        $sum += $num[$i];
    }
    return $sum /$length;
}
