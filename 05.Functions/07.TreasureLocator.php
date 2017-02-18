<?php
$input = explode(", ", trim(fgets(STDIN)));
$countMapSites = count($input);
for ($i = 0; $i < $countMapSites; $i += 2) {
    list($x, $y) = [intval($input[$i]),intval($input[$i + 1])];
    echo checkIslands($x, $y) . "\n";
}
function checkIslands($x, $y){
    if ($x >= 1 && $x <= 3 && $y >= 1 && $y <= 3) return "Tuvalu";
    if ($x >= 8 && $x <= 9 && $y >= 0 && $y <= 1) return "Tokelau";
    if ($x >= 5 && $x <= 7 && $y >= 3 && $y <= 6) return "Samoa";
    if ($x >= 0 && $x <= 2 && $y >= 6 && $y <= 8) return "Tonga";
    if ($x >= 4 && $x <= 9 && $y >= 7 && $y <= 8) return "Cook";
    else return "On the bottom of the ocean";
}