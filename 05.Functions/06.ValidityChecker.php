<?php
$input = array_map('intval', explode(", ", trim(fgets(STDIN))));

list($x1, $y1, $x2, $y2) = [$input[0], $input[1], $input[2], $input[3]];
$dist10 = calculateDist($x1, $y1, 0, 0);      // Calc the distance btw point 1 and (0,0).
$dist20 = calculateDist($x2, $y2, 0, 0);      // Calc the distance btw point 2 and (0,0).
$dist12 = calculateDist($x1, $y1, $x2, $y2);  // Calc the distance btw point 1 and point 2.
echo validityCheck($dist10, $x1, $y1, 0, 0);
echo validityCheck($dist20, $x2, $y2, 0, 0);
echo validityCheck($dist12, $x1, $y1, $x2, $y2);

function calculateDist($x1, $y1, $x2, $y2)
{
    $distX12 = $x1 - $x2;
    $distY12 = $y1 - $y2;
    return sqrt(pow($distX12, 2) + pow($distY12, 2));
}
function validityCheck($dist, $x1, $y1, $x2, $y2)
{
    if ($dist === round($dist)) {
        return "{{$x1}}, {{$y1}} to {{$x2}}, {{$y2}} is valid\n";
    } else {
        return "{{$x1}}, {{$y1}} to {{$x2}}, {{$y2}} is invalid\n";
    }
}