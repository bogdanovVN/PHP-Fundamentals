<?php
$numberOne = intval(fgets(STDIN));
$numberTwo = intval(fgets(STDIN));
$numberThree = intval(fgets(STDIN));
$largeOneTwo = max($numberOne, $numberTwo);
$maxNumber = max($largeOneTwo, $numberThree);
echo "Max: " . $maxNumber;
