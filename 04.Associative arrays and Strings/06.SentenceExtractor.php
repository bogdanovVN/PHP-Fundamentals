<?php
$text = trim(fgets(STDIN));
$word = trim(fgets(STDIN));
preg_match_all("/([^.?!]*\\b" . $word . "\\b[^.?!]*[.?!])/", $text, $result);
$sentences = array_map('trim',$result[0]);
echo implode("\n", $sentences);



/*
 * preg_match_all — Perform a global regular expression match.
 * Searches subject for all matches to the regular expression given in pattern
 * and puts them in matches in the order specified by flags.
 * After the first match is found, the subsequent searches are continued on from end of the last match.
 *
 *
*/