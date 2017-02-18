<?php
$inputArray = array_map('intval', explode(' ', fgets(STDIN)));
$previousNumber = $inputArray[0];
$maxLength = 1;
$bestStart = $inputArray[0];
$countOfArray = count($inputArray);
$len = 1;
for ($i = 1; $i < $countOfArray; $i++) {
    if ($inputArray[$i] === $previousNumber){   // Comparing the the second[i] number with the fisrt[0] number
        $len++;
        $previousNumber = $inputArray[$i];
        if ($maxLength < $len){
            $maxLength = $len;
            $bestStart = $inputArray[$i];
        }
    } else {
        $len = 1;
        $previousNumber = $inputArray[$i];     // To check with the next number($inputArray[$i] === $repeatedElement)
    }
}
for ($i = 0; $i < $maxLength; $i++) {
    echo $bestStart . " ";
}