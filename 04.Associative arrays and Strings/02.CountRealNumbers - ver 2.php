<?php
$input = explode(" ", fgets(STDIN));
$input = array_map('trim', $input);
$occurrences = array_count_values($input);
ksort($occurrences);
$output = '';
foreach ($occurrences as $element => $count) {
    $output .= "{$element} -> {$count} times\n";
}
echo $output;