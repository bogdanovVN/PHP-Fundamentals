<?php
class Person
{
    private $name;
    private $age;

    function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getAge()
    {
        return $this->age;
    }
}
$numberOfInputs = trim(fgets(STDIN));

$persons = array();
for ($i = 0; $i < $numberOfInputs; $i++) {
    $input = trim(fgets(STDIN));
    $input = explode(' ', $input);

    $name = $input[0];
    $age = intval($input[1]);

    if ($age > 30) {
        $person = new Person($name, $age);
        $persons[] = $person;
    }
}
function sortNames(Person $a, Person $b) {
    return strcmp($a->getName(), $b->getName());
}

usort($persons, "sortNames");

foreach ($persons as $person) {
    echo $person->getName() . ' - ' . $person->getAge() . "\n";
}

?>