<?php
$inputArray = array_map('trim', explode(' ', fgets(STDIN)));
$outputArray = array_count_values($inputArray);
ksort($outputArray);
foreach ($outputArray as $key => $value) {
    echo $key . " -> " . $value . " times \n";
}