<?php
$inputArray = explode(" ", fgets(STDIN));
$timesToRotated = intval(fgets(STDIN));
$countOfElements = count($inputArray);
$lastElement = "";
$finalArray = [];
$arrayOfSum = [];
for ($i = 0; $i < $timesToRotated; $i++){
    //$finalArray[$i] = [];  // Making multidimentional array
    $lastElement = $inputArray[$countOfElements - 1];
    array_splice($inputArray, $countOfElements - 1, 1);    // array_splice($array, $startIndex, $length) – removes the elements in the given range
    array_splice($inputArray, 0, 0, $lastElement);         // array_splice($array, $startIndex, $length, $element)
    $finalArray[$i] = $inputArray;                         // Making Multidimentional array from arrays.
}
for ($i = 0; $i <= $countOfElements - 1; $i++){
    // Sum all elemenets from the arrays in the Multidimentional array & making new sum array.
    $sum = 0;
    for ($j = 0; $j < $timesToRotated; $j++){   // Sum all numbers in each column[$j].
        $sum += intval($finalArray[$j][$i]);
        $arrayOfSum[$i] = $sum;
    }
}
$outputString = "";
foreach ($arrayOfSum as $item) {
    $outputString .= "{$item} ";
}
echo $outputString;