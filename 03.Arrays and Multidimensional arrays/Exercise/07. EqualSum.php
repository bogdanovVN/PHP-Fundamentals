<?php
function leftSum($index, $array) {
    $sum = 0;
    for ($i = 0; $i < $index; $i++) {
        $sum += $array[$i];
    }
    return $sum;
}
function rightSum($index, $array) {
    $sum = 0;
    for ($i = $index + 1; $i < count($array); $i++) {
        $sum += $array[$i];
    }
    return $sum;
}
$inputArray = array_map('trim', explode(' ', fgets(STDIN)));
//$inputArray = [1, 2, 3, 3];
//$leftSum = 0;
//$rightSum = 0;
$indexOfElement = "";
$isFoundEqualSum = false;
for ($i = 0; $i < count($inputArray); $i++) {
    if (leftSum($i, $inputArray) == rightSum($i, $inputArray)){
        $indexOfElement = $i;
        $isFoundEqualSum = true;
        //echo $i;
    } else if (!$isFoundEqualSum){
        $indexOfElement = "no";
        //echo "no";
    }
}
//print_r($inputArray);
echo $indexOfElement;