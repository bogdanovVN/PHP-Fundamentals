<?php
$text = trim(fgets(STDIN));
$bannedWords = array_map('trim', explode(', ', fgets(STDIN)));
foreach ($bannedWords as $bannedWord) {
    $stringAsterisks = str_repeat('*', strlen($bannedWord));    // str_repeat — Repeat a string
    $text = str_replace($bannedWord, $stringAsterisks, $text);
    $stringAsterisks = '';                                     // Making $stringAsterisks clear for the next iteration.
}
echo $text;


/*
 * str_replace —
 * Replace all occurrences of the search string with the replacement string
*/