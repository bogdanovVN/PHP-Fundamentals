<?php

class Person
{
    private $name;
    private $age;
}
$person = new Person();
echo count(get_object_vars($person));