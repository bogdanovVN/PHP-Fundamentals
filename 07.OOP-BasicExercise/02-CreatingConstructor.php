<?php

class Person
{
    private $name;
    private $age;

    public function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
        echo $this->name . " " . $this->age;
    }
}

$inputName = trim(fgets(STDIN));
$inputAge = intval(fgets(STDIN));
$person = new Person($inputName, $inputAge);