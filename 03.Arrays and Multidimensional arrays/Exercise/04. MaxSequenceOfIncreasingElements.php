<?php
$inputArray = array_map('intval', explode(' ', fgets(STDIN)));
//$inputArray = [3, 2, 3, 4, 2, 2, 4];
$previousNumber = $inputArray[0];
$maxLength = 1;
$len = 1;
$startOfSequence = 0;
$tempStartSequence = 0;
for ($i = 1; $i < count($inputArray); $i++) {
    if ($inputArray[$i] > $previousNumber){
        $tempStartSequence = $i - $len;
        $len++;
        $previousNumber = $inputArray[$i];
        if ($maxLength < $len){
            $maxLength = $len;
            $startOfSequence = $tempStartSequence;
        }
    } else {
        $len = 1;
        $previousNumber = $inputArray[$i];
    }
}
for ($i = 0; $i < $maxLength; $i++) {
    echo $inputArray[$i + $startOfSequence] . " ";
}