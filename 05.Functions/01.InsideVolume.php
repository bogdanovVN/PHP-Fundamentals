<?php
$input = array_map('floatval', explode(", ", trim(fgets(STDIN))));
$countInput = count($input);
$coordSets = [];
for ($i = 0; $i < $countInput; $i += 3) {
    list($x, $y, $z) = [$input[$i], $input[$i + 1], $input[$i + 2]];
    if(isVolume($x, $y, $z)){
        echo "inside\n";
    } else {
        echo "outside\n";
    }
}
function isVolume(float $x, float $y, float $z): bool {
    $x1 = 10; $x2 = 50;
    $y1 = 20; $y2 = 80;
    $z1 = 15; $z2 = 50;
    if ($x >= $x1 && $x <= $x2) {
        if ($y >= $y1 && $y <= $y2) {
            if ($z >= $z1 && $z <= $z2) {
                return true;
            }
        }
    }
    return false;
}