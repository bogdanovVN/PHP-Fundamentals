<?php
$inputArray = array_map('trim', explode(' ', fgets(STDIN)));
$maxLength = 0;
$countOfArray = count($inputArray);
$arrayElement = "";
for ($i = 0; $i < $countOfArray; $i++) {
    $countOfElements = 0;
    for ($j = 0; $j < $countOfArray; $j++) {
        if ($inputArray[$i] == $inputArray[$j]){
            $countOfElements++;
        }
    }
    if ($maxLength < $countOfElements){
        $maxLength = $countOfElements;
        $arrayElement = $inputArray[$i];
    }
}
echo $arrayElement;