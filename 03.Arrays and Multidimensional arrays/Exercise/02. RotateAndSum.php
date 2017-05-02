<?php
$inputArray = array_map('trim', explode(" ", fgets(STDIN)));
$timesToRotate = intval(trim(fgets(STDIN)));
$countOfElements = count($inputArray);
$lastElement = "";
$finalArray = [];
$arrayOfSum = [];
for ($i = 0; $i < $timesToRotate; $i++) {
    //$finalArray[$i] = [];  // Making multidimensional array
    $lastElement = $inputArray[$countOfElements - 1];
    array_splice($inputArray, - 1); // array_splice($array, $startIndex, $length)– removes the elements in the given range
    array_splice($inputArray, 0, 0, $lastElement); // array_splice($array, $startIndex, $length, $element)
    $finalArray[$i] = $inputArray;  // Making Multidimensional array from arrays.
}
for ($i = 0; $i < $countOfElements; $i++) {
    // Sum all elements from the arrays in the Multidimensional array & making new sum array
    $sum = 0;
    for ($j = 0; $j < $timesToRotate; $j++) {  // Sum all numbers in each column[$j].
        $sum += intval($finalArray[$j][$i]);
        $arrayOfSum[$i] = $sum;
    }
}
foreach ($arrayOfSum as $item) {
    echo "{$item} ";
}