<?php
class Person
{
    private $personName;
    private $pokemonCollection = null;
    private $parents = null;
    private $children = null;
    private $company = null;
    private $car = null;
    public function __construct(string $personName)
    {
        $this->personName = $personName;
    }
    public function getPersonName()
    {
        return $this->personName;
    }
    public function getPokemonCollection()
    {
        return $this->pokemonCollection;
    }
    public function getParents()
    {
        return $this->parents;
    }
    public function getChildren()
    {
        return $this->children;
    }
    public function getCompany()
    {
        return $this->company;
    }
    public function getCar()
    {
        return $this->car;
    }
    public function addPokemon(Pokemon $pokemon)
    {
        $this->pokemonCollection[] = $pokemon;
    }
    public function addParent(ParentOfPerson $parent)
    {
        $this->parents[] = $parent;
    }
    public function addChild(Child $child)
    {
        $this->children[] = $child;
    }
    public function setCompany(Company $company)
    {
        $this->company = $company;
    }
    public function setCar(Car $car)
    {
        $this->car = $car;
    }
    private function generateOutput($object)
    {
        $output = '';
        if ($object !== null) {
            if (is_array($object)) {
                foreach ($object as $item) {
                    $output .= $item . PHP_EOL;
                }
            } else {
                $output = $object . PHP_EOL;
            }
        }
        return $output;
    }
    public function __toString()
    {
        $companyOutput = self::generateOutput($this->company);
        $carOutput = self::generateOutput($this->car);
        $pokemonOutput = self::generateOutput($this->pokemonCollection);
        $parentsOutput = self::generateOutput($this->parents);
        $childrenOutput = self::generateOutput($this->children);
        return $this->personName . PHP_EOL
        . 'Company:' . PHP_EOL . $companyOutput
        . 'Car:' . PHP_EOL . $carOutput
        . 'Pokemon:' . PHP_EOL . $pokemonOutput
        . 'Parents:' . PHP_EOL . $parentsOutput
        . 'Children:' . PHP_EOL . $childrenOutput;
    }
}
class Company
{
    private $companyName;
    private $department;
    private $salary;
    public function __construct(string $companyName, string $department, float $salary)
    {
        $this->companyName = $companyName;
        $this->department = $department;
        $this->salary = $salary;
    }
    public function __toString()
    {
        return $this->companyName . ' ' . $this->department . ' ' . number_format($this->salary, 2);
    }
}
class Pokemon
{
    private $pokemonName;
    private $pokemonType;
    public function __construct(string $pokemonName, string $pokemonType)
    {
        $this->pokemonName = $pokemonName;
        $this->pokemonType = $pokemonType;
    }
    public function __toString()
    {
        return $this->pokemonName . ' ' . $this->pokemonType;
    }
}
class ParentOfPerson
{
    private $parentName;
    private $parentBirthday;
    public function __construct(string $parentName, string $parentBirthday)
    {
        $this->parentName = $parentName;
        $this->parentBirthday = $parentBirthday;
    }
    public function __toString()
    {
        return $this->parentName . ' ' . $this->parentBirthday;
    }
}
class Child
{
    private $childName;
    private $childBirthday;
    public function __construct(string $childName, string $childBirthday)
    {
        $this->childName = $childName;
        $this->childBirthday = $childBirthday;
    }
    public function __toString()
    {
        return $this->childName . ' ' . $this->childBirthday;
    }
}
class Car
{
    private $carModel;
    private $carSpeed;
    public function __construct(string $carModel, int $carSpeed)
    {
        $this->carModel = $carModel;
        $this->carSpeed = $carSpeed;
    }
    public function __toString()
    {
        return $this->carModel . ' ' . $this->carSpeed;
    }
}
$people = [];
while (true) {
    $input = trim(fgets(STDIN));
    if ($input === "End") {
        break;
    }
    $personInfo = explode(" ", $input);
    $personName = $personInfo[0];
    $person = new Person($personName);
    $typeOfInput = $personInfo[1];
    if ($typeOfInput === "company") {
        list($companyName, $department, $salary) =
            [$personInfo[2], $personInfo[3], floatval($personInfo[4])];
        $company = new Company($companyName, $department, $salary);
        if (!array_key_exists($personName, $people)) {
            $person->setCompany($company);
            $people[$personName] = $person;
        } else {
            $people[$personName]->setCompany($company);
        }
    } else if ($typeOfInput === "pokemon") {
        list($pokemonName, $pokemonType) =
            [$personInfo[2], $personInfo[3]];
        $pokemon = new Pokemon($pokemonName, $pokemonType);
        if (!array_key_exists($personName, $people)) {
            $person->addPokemon($pokemon);
            $people[$personName] = $person;
        } else {
            $people[$personName]->addPokemon($pokemon);
        }
    } else if ($typeOfInput === "parents") {
        list($parentName, $parentBirthday) =
            [$personInfo[2], $personInfo[3]];
        $parent = new ParentOfPerson($parentName, $parentBirthday);
        if (!array_key_exists($personName, $people)) {
            $person->addParent($parent);
            $people[$personName] = $person;
        } else {
            $people[$personName]->addParent($parent);
        }
    } else if ($typeOfInput === "children") {
        list($childName, $childBirthday) =
            [$personInfo[2], $personInfo[3]];
        $child = new Child($childName, $childBirthday);
        if (!array_key_exists($personName, $people)) {
            $person->addChild($child);
            $people[$personName] = $person;
        } else {
            $people[$personName]->addChild($child);
        }
    } else if ($typeOfInput === "car") {
        list($carModel, $carSpeed) =
            [$personInfo[2], intval($personInfo[3])];
        $car = new Car($carModel, $carSpeed);
        if (!array_key_exists($personName, $people)) {
            $person->setCar($car);
            $people[$personName] = $person;
        } else {
            $people[$personName]->setCar($car);
        }
    }
}
$people = array_filter($people, function ($v) {
    return $v !== null;
});
$name = trim(fgets(STDIN));
foreach ($people as $key => $person) {
    if ($key === $name) {
        echo $person;
    }
}