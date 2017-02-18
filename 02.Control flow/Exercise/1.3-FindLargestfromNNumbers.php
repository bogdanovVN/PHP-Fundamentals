<?php
$maxNumber = 0;
while ($inputNumber = intval(fgets(STDIN))){
    $maxNumber = max($inputNumber, $maxNumber);
}
echo "Max: " . $maxNumber;