<?php
$inputWord = strtolower(fgets(STDIN));
$arrayOfLetters = [];
$lengthOfIInpString = strlen($inputWord);
for ($i = 0; $i < 26; $i++) {
    $arrayOfLetters[$i] = chr(97 + $i);
}
for ($i = 0; $i < $lengthOfIInpString; $i++) {
    for ($j = 0; $j < count($arrayOfLetters); $j++) {
        if ($inputWord[$i] == $arrayOfLetters[$j]){
            echo "{$inputWord[$i]} -> {$j}\r\n";
        }
    }
}