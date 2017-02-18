<?php
//$inputWord = fgets(STDIN);
$inputArray1 = array_map('trim', explode(' ', fgets(STDIN)));
$inputArray2 = array_map('trim', explode(' ', fgets(STDIN)));
$maxLengthOfCommonLeft = 0;
$maxLengthOfCommonRight = 0;
$countOfArrLength = min(count($inputArray1), count($inputArray2));
for ($i = 0; $i < $countOfArrLength; $i++){
    if ($inputArray1[$i] == $inputArray2[$i]){
        $maxLengthOfCommonLeft++;
    } else {
        break;
    }
}
$revArray1 = array_reverse($inputArray1);
$revArray2 = array_reverse($inputArray2);
for ($i = 0; $i < $countOfArrLength; $i++){
    if ($revArray1[$i] == $revArray2[$i]){
        $maxLengthOfCommonRight++;
    } else {
        break;
    }
}
if ($maxLengthOfCommonLeft > $maxLengthOfCommonRight){
    echo $maxLengthOfCommonLeft;
} else {
    echo $maxLengthOfCommonRight;
}