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
class Family
{
    private $people = array();
    public function addMember(Person $person)
    {
        $this->people[] = $person;
    }
    public function getPeople()
    {
        return $this->people;
    }
    public function getOldestMember()
    {
        $oldestMemberAge = -1;
        $oldestMemberName = '';
        $familyMembers = $this->people;
        foreach ($familyMembers as $familyMember) {
            if ($familyMember->getAge() > $oldestMemberAge) {
                $oldestMemberAge = $familyMember->getAge();
                $oldestMemberName = $familyMember->getName();
            }
        }
        return $oldestMemberName . ' ' . $oldestMemberAge;
    }
}
$linesCount = intval(trim(fgets(STDIN)));
$family = new Family();
for ($i = 0; $i < $linesCount; $i++) {
    $personalInfo = explode(" ", trim(fgets(STDIN)));
    list($name, $age) = [$personalInfo[0], intval($personalInfo[1])];
    $person = new Person($name, $age);
    $family->addMember($person);
}
echo $family->getOldestMember();