<?php
$maxNumber = -9223372036854775807;
while ($inputNumber = intval(fgets(STDIN))){
    $maxNumber = max($inputNumber, $maxNumber);
}
echo "Max: " . $maxNumber;