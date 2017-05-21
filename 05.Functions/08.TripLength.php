<?php
declare(strict_types = 1);
list($x1, $y1, $x2, $y2, $x3, $y3) = array_map("floatval", explode(", ", trim(fgets(STDIN))));
echo buildShortestPath(
    calculateDistance($x1, $y1, $x2, $y2),
    calculateDistance($x1, $y1, $x3, $y3),
    calculateDistance($x2, $y2, $x3, $y3));
function buildShortestPath(float $distanceA, float $distanceB, float $distanceC)
{
    $paths = [
        (object)["name" => "ab", "len" => $distanceA],
        (object)["name" => "ac", "len" => $distanceB],
        (object)["name" => "bc", "len" => $distanceC],
    ];
    usort($paths, function ($a, $b) {
        $res = $a->len <=> $b->len;
        return $res === 0 ? $a->name <=> $b->name : $res;
    });
    if ($paths[2]->name == "bc") {
        $output = "2->1->3: ";
    } else if ($paths[2]->name == "ac") {
        $output = "1->2->3: ";
    } else {
        $output = "1->3->2: ";
    }
    $output .= ($paths[0]->len + $paths[1]->len);
    return $output;
}

function calculateDistance(float $x1, float $y1, float $x2, float $y2): float
{
    return sqrt((($x2 - $x1) * ($x2 - $x1)) + (($y2 - $y1) * ($y2 - $y1)));
}