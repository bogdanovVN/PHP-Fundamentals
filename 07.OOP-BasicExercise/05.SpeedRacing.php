<?php
class Car
{
    private $model;
    private $fuelAmount;
    private $fuelCostFor1km;
    private $distanceTraveled;
    public function __construct(string $model,
                                float $fuelAmount,
                                float $fuelCostFor1km)
    {
        $this->model = $model;
        $this->fuelAmount = $fuelAmount;
        $this->fuelCostFor1km = $fuelCostFor1km;
        $this->distanceTraveled = 0;
    }
    public function getModel()
    {
        return $this->model;
    }
    public function drive(float $distance)
    {
        $fuelUsed = $distance * $this->fuelCostFor1km;
        $fuelUsed = round($fuelUsed , 2);
        if ($fuelUsed > round($this->fuelAmount, 2)) {
            throw new Exception("Insufficient fuel for the drive");
        }
        $this->fuelAmount -= $fuelUsed;
        $this->distanceTraveled += $distance;
    }
    public function __toString()
    {
        return $this->model . ' '
        . number_format(abs($this->fuelAmount), 2) . ' '
        . $this->distanceTraveled . PHP_EOL;
    }
}
$numberOfCars = intval(trim(fgets(STDIN)));
$cars = [];
for ($i = 0; $i < $numberOfCars; $i++) {
    $carInfo = explode(" ", trim(fgets(STDIN)));
    list($model, $fuelAmount, $fuelCostFor1km) =
        [$carInfo[0], floatval($carInfo[1]), floatval($carInfo[2])];
    $car = new Car($model, $fuelAmount, $fuelCostFor1km);
    $cars[$model] = $car;
}
while (true) {
    $commandLine = trim(fgets(STDIN));
    if ($commandLine == 'End') {
        break;
    }
    $commandLine = explode(" ", $commandLine);
    if($commandLine[0] != 'Drive'){
        continue;
    }
    list($carModel, $distanceTraveled) =
        [$commandLine[1],$commandLine[2]];
    $car = $cars[$carModel];
    try{
        $car->drive($distanceTraveled);
    } catch (Exception $e){
        echo $e->getMessage() . PHP_EOL;
    }
}
foreach ($cars as $car) {
    echo $car;
}