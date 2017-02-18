<?php
$input = floatval(trim(fgets(STDIN)));
$commands = explode(", ",trim(fgets(STDIN)));

foreach ($commands as $command) {
    echo performCommand($command, $input) ."\n";  // Rewriting the input with the value of $num.
}

function performCommand($cmd, &$num){
    if($cmd === "chop"){
        $num = $num / 2 ;
    } elseif ($cmd === "dice"){
        $num = sqrt($num);
    } elseif ($cmd === "spice"){
        $num = $num + 1;
    } elseif ($cmd === "bake"){
        $num = $num * 3;
    } elseif ($cmd === "fillet"){
        $num = $num * 0.8;
    }
    return $num;
}