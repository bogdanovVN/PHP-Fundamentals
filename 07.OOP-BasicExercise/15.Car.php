<?php
class Car{
    private $speed;
    private $fuel;
    private $fuelEconomy;
    private $distance;
    function __construct(float $speed, float $fuel, float $fuelEconomy)
    {
        $this->speed = $speed;
        $this->fuel = $fuel;
        $this->fuelEconomy = $fuelEconomy;
    }
    public function travel(float $distance)
    {
        $fraction = $this->fuel/$this->fuelEconomy;
        $distancePossible = $fraction * 100;
        if($distancePossible >= $distance){
            $fuelUsed = ($distance / 100  ) * $this->fuelEconomy;
            $this->distance += $distance;
            $this->fuel -= $fuelUsed;
        } else {
            $this->distance += $distancePossible;
            $this->fuel = 0;
        }
    }
    public function refuel(string $fuel)
    {
        $this->fuel += (float)$fuel;
        return $this->fuel;
    }
    public function getDistance()
    {
        return number_format($this->distance, 1);
    }
    public function time(){
        $timeDecimal = $this->distance / $this->speed;
        $hours = (int)$timeDecimal;
        $minutes = round(($timeDecimal - $hours)  * 60);
        return "{$hours} hours and {$minutes} minutes";
    }
    public function getFuel()
    {
        return number_format($this->fuel, 1);
    }
}
$input = explode(' ', trim(fgets(STDIN)));
$input = array_map('floatval', $input);
list($speed, $fuel, $fuelEconomy) = [$input[0], $input[1], $input[2]];
$car = new Car($speed, $fuel, $fuelEconomy);
$output = '';
while (true){
    $commandLine = trim(fgets(STDIN));
    if($commandLine == "END"){
        break;
    }
    $commandLine = explode(" ", $commandLine);
    if(count($commandLine) > 1){
        list($command, $value) = [$commandLine[0], $commandLine[1]];
    } else {
        $command = $commandLine[0];
    }
    if($command == 'Travel'){
        $car->travel($value);
    } else if($command == 'Refuel'){
        $car->refuel($value);
    } else if($command == 'Distance'){
        $output .= 'Total Distance: ' . $car->getDistance() . PHP_EOL;
    } else if($command == 'Time'){
        $output .= 'Total Time: ' . $car->time() . PHP_EOL;
    } else if($command == 'Fuel'){
        $output .= 'Fuel left: ' . $car->getFuel() . ' liters' . PHP_EOL;
    }
}
echo $output;