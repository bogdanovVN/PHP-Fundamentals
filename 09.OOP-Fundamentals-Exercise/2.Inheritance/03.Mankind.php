<?php

class Human
{
    private $firstName;
    private $lastName;

    public function __construct(string $firstName, string $lastName)
    {
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    protected function setFirstName(string $firstName)
    {
        if (!ctype_upper($firstName[0])) {
            throw new Exception("Expected upper case letter!Argument: firstName");
        }

        if (strlen($firstName) < 4) {
            throw new Exception("Expected length at least 4 symbols!Argument: firstName");
        }

        $this->firstName = $firstName;
    }

    protected function setLastName(string $lastName)
    {
        if (!ctype_upper($lastName[0])) {
            throw new Exception("Expected upper case letter!Argument: lastName");
        }

        if (strlen($lastName) < 3) {
            throw new Exception("Expected length at least 3 symbols!Argument: lastName\"");
        }

        $this->lastName = $lastName;
    }

    public function __toString()
    {
        return 'First Name: ' . $this->getFirstName() . PHP_EOL
        . 'Last Name: ' . $this->getLastName() . PHP_EOL;
    }
}

class Student extends Human
{
    private $facultyNumber;

    public function __construct(string $firstName, string $lastName, string $facultyNumber)
    {
        parent::__construct($firstName, $lastName);
        $this->setFacultyNumber($facultyNumber);
    }

    public function getFacultyNumber()
    {
        return $this->facultyNumber;
    }

    public function setFacultyNumber($facultyNumber)
    {
        if (!(strlen($facultyNumber) >= 5 && strlen($facultyNumber) <= 10))  {
            throw new Exception("Invalid faculty number!");
        }

        $this->facultyNumber = $facultyNumber;
    }

    public function __toString()
    {
        return parent::__toString() . 'Faculty number: ' . $this->getFacultyNumber() . PHP_EOL;
    }
}

class Worker extends Human
{
    private $salaryPerWeek;
    private $workingHoursPerDay;
    private $salaryPerHour;

    public function __construct(string $firstName, string $lastName, float $salaryPerWeek, float $workingHoursPerDay)
    {
        parent::__construct($firstName, $lastName);
        $this->setSalaryPerWeek($salaryPerWeek);
        $this->setWorkingHoursPerDay($workingHoursPerDay);
        $this->setSalaryPerHour($salaryPerWeek, $workingHoursPerDay);
    }

    public function getSalaryPerWeek()
    {
        return $this->salaryPerWeek;
    }

    public function getWorkingHoursPerDay()
    {
        return $this->workingHoursPerDay;
    }

    public function getSalaryPerHour()
    {
        return $this->salaryPerHour;
    }

    public function setSalaryPerWeek($salaryPerWeek)
    {
        if ($salaryPerWeek <= 10) {
            throw new Exception("Expected value mismatch!Argument: weekSalary");
        }

        $this->salaryPerWeek = $salaryPerWeek;
    }

    public function setWorkingHoursPerDay($workingHoursPerDay)
    {
        if ($workingHoursPerDay < 1 || $workingHoursPerDay > 12) {
            throw new Exception("Expected value mismatch!Argument: workHoursPerDay");
        }

        $this->workingHoursPerDay = $workingHoursPerDay;
    }

    public function setSalaryPerHour($salaryPerWeek, $workingHoursPerDay)
    {
        $this->salaryPerHour = round($salaryPerWeek / ($workingHoursPerDay * 7), 2);
    }

    protected function setLastName(string $lastName)
    {
        if (strlen($lastName) < 4) {
            throw new Exception("Expected length more than 3 symbols!Argument: lastName");
        }

        parent::setLastName($lastName);
    }

    public function __toString(): string
    {
        return parent::__toString()
        . "Week Salary: " . number_format($this->getSalaryPerWeek(), 2, ".", "") . PHP_EOL
        . "Hours per day: " . number_format($this->getWorkingHoursPerDay(), 2) . PHP_EOL
        . "Salary per hour: " . $this->getSalaryPerHour();
    }
}

$firstLine = explode(" ", trim(fgets(STDIN)));
$studentFirsName = $firstLine[0];
$studentLastName = $firstLine[1];
$studentFacultyNumber = $firstLine[2];
$secondLine = explode(" ", trim(fgets(STDIN)));
$workerFirsName = $secondLine[0];
$workerLastName = $secondLine[1];
$workerSalary = $secondLine[2];
$workingHours = $secondLine[3];
try{
    $student = new Student($studentFirsName, $studentLastName, $studentFacultyNumber);
    $worker = new Worker($workerFirsName, $workerLastName, $workerSalary, $workingHours);
    echo $student;
    echo PHP_EOL;
    echo $worker;
}catch (Exception $e){
    echo $e->getMessage() . PHP_EOL;
}