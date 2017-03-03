<?php
class Person{
    public $name;
    function __construct(string $name){
        $this->name = $name;
        echo $name . ' says "Hello"!';
    }
}
$name = trim(fgets(STDIN));
$person = new Person($name);
$fields = count(get_object_vars($person));
$methods = count(get_class_methods($person));
if ($fields != 1 || $methods != 1) {
    throw new Exception("Too many fields or methods");
}