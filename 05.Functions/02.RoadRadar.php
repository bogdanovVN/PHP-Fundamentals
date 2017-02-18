<?php
$speed = floatval(trim(fgets(STDIN)));
$area = trim(fgets(STDIN));
$overspeed = function () use ($speed, $area) : float{
    $limit = 0;
    if($area === "motorway") $limit = 130;
    else if($area === "interstate") $limit = 90;
    else if($area === "city") $limit = 50;
    else if($area === "residential") $limit = 20;
    return $speed - $limit;
};
if($overspeed() >= 0){
    echo checkInfractionSeverity($overspeed());
}
function checkInfractionSeverity ($overLimit){
    $infraction = '';
    if ($overLimit >= 0 && $overLimit <= 20) $infraction = "speeding";
    else if ($overLimit > 20 && $overLimit <= 40) $infraction = "excessive speeding";
    else if ($overLimit > 40) $infraction = "reckless driving";
    return $infraction;
}