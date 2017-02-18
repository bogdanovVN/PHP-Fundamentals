<?php
$number = 145;

$uniqueNums = [];
for ($i = 102; $i <= $number; $i++){
    if (isDistinct($i)){
        array_push($uniqueNums, $i);
    }
}

if (sizeof($uniqueNums)===0){
    echo 'no';
}
else{
    echo implode(', ', $uniqueNums);
}

function isDistinct($num)
{
    $num = '' . $num;  // in such a way, we make it in string type.
    $currentNumber = [];
    for ($i = 0; $i < strlen($num); $i++){
        $currentDigit = $num[$i];
        if (in_array($currentDigit, $currentNumber)){
            return false;
        }
        array_push($currentNumber, $currentDigit);
    }
    return true;
}