<?php
$input = array_map('trim', explode(' ', fgets(STDIN)));
$reversedArr = [];
foreach ($input as $element) {
    $reversedArr[] = intval(strrev($element));
}
echo array_sum($reversedArr);

/*
 * $input = '123 234 12';
 * $arrayOfNums = explode(" ", $input);
 * $sum = 0;
 * foreach ($arrayOfNums as $value) {
 *      $value = strrev($value);
 *      $sum += $value;
 * }
 * echo $sum;
 */





/*  VER 3.0
 *
 * <?php
function reverseNumber ($number) {
    $length = strlen($number);
    $newNumber = [];
    for ($i = 0; $i < $length; $i++) {
        $newNumber[$i] = $number[$length - 1 - $i];
    }
    $newNumberInt = "";
    foreach ($newNumber as $num){
        $newNumberInt .= $num;
    }
    return $newNumberInt;
}
$arr = array_map('trim', explode(' ', fgets(STDIN)));
$sum = 0;
foreach ($arr as $digit) {
    $reversedNumber = reverseNumber ($digit);
    $sum += intval($reversedNumber);
}
echo $sum;
 *
 */