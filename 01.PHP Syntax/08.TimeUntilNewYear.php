<?php

date_default_timezone_set("UTC");

$currentTime = strtotime(date("d-m-Y G:i:s"));
$currentYear = date('Y');
$newYear = strtotime("31-12-{$currentYear} 23:59:59");
$diff = $newYear - $currentTime;

/*
number_format
Parameters ¶number
The number being formatted.  -> (floor($diff / 60 / 60)

decimals
Sets the number of decimal points.   ->  (0)

dec_point
Sets the separator for the decimal point.   -> ('.')

thousands_sep
Sets the thousands separator.  -> (' ')
*/
echo 'Hours until new year : ' . number_format(floor($diff / 60 / 60), 0, '.', ' ') . "<br>";
echo 'Minutes until new year : ' . number_format(floor($diff / 60), 0, '.', ' ') . "<br>";
echo 'Seconds until new year : ' . number_format($diff, 0, ',', ' ') . "<br>";

$days = floor($diff / 60 / 60 / 24);
$hours = floor($diff / 60 / 60) % $days;
$minutes = floor($diff / 60) % 60;
$seconds = $diff % 60;
echo "Days:Hours:Minutes:Seconds {$days}:{$hours}:{$minutes}:{$seconds}";