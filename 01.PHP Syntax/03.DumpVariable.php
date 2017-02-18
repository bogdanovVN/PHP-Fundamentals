<?php

$var = "string";
finder($var);

$var = 15;
finder($var);

$var = 1.234;
finder($var);

$var = array(1, 2, 3);
finder($var);

$var = (object)[2,34];
finder($var);

function finder($var){
    if (is_numeric($var)){
        var_dump($var) . "\n";
    }
    else{
        echo gettype($var) . "\n";
    }
}