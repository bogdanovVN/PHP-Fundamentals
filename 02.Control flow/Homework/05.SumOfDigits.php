<?php
if (isset($_GET['calculate'])){
    $inputArray = preg_split("/[\s,-]+/", $_GET['inputString']);
    $outputArray = array();
    for ($i = 0; $i < count($inputArray); $i++){
        $sumOfDigits = 0;
        $currentString = $inputArray[$i];
        $currantArray = str_split($inputArray[$i]);
        if (intval($inputArray[$i]) != 0){
            for ($j = 0; $j < count($currantArray); $j++){
                $sumOfDigits += intval($currantArray[$j]);
            }
            $outputArray[$currentString] = $sumOfDigits;
        } else {
            $outputArray[$currentString] = 'I cannot sum that';
        }
    }
}
include '05.SumOfDigitsHTML.php';