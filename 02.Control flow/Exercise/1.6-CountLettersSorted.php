<?php
$inputWord = fgets(STDIN);
$inputWord = rtrim($inputWord, "\n\r");
$countLetters = array();
$wordLength = strlen($inputWord);
for ($i = 0; $i < $wordLength; $i++){
    $currentLetter = $inputWord[$i];
    if (!array_key_exists($currentLetter, $countLetters)){
        $countLetters[$currentLetter] = 0;
    }
    $countLetters[$currentLetter]++;
}
arsort($countLetters);
foreach ($countLetters as $key => $value){
    echo $key . " -> " . $value . "\n";
}