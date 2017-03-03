<?php
class Car
{
    private $model;
    private $engine;
    private $weight;
    private $color;
    function __construct(string $model,
                         Engine $engine,
                         string $weight,
                         string $color)
    {
        $this->model = $model;
        $this->engine = $engine;
        $this->weight = $weight;
        $this->color = $color;
    }
    public function __toString()
    {
        return $this->model . ':' . PHP_EOL .
        '  ' . $this->engine->getModel() . ':' . PHP_EOL .
        '    Power: ' . $this->engine->getPower() . PHP_EOL .
        '    Displacement: ' . $this->engine->getDisplacement() . PHP_EOL .
        '    Efficiency: ' . $this->engine->getEfficiency() . PHP_EOL .
        '  Weight: ' . $this->weight . PHP_EOL .
        '  Color: ' . $this->color . PHP_EOL;
    }
}
class Engine
{
    private $model;
    private $power;
    private $displacement;
    private $efficiency;
    function __construct(string $model,
                         string $power,
                         string $displacement,
                         string $efficiency)
    {
        $this->model = $model;
        $this->power = $power;
        $this->displacement = $displacement;
        $this->efficiency = $efficiency;
    }
    public function getModel()
    {
        return $this->model;
    }
    public function getPower()
    {
        return $this->power;
    }
    public function getDisplacement()
    {
        return $this->displacement;
    }
    public function getEfficiency()
    {
        return $this->efficiency;
    }
}
$n = intval(trim(fgets(STDIN)));
$engines = [];
for ($i = 0; $i < $n; $i++) {
    $engineInfo = explode(" ", trim(fgets(STDIN)));
    list($model, $power, $displacement, $efficiency) =
        [$engineInfo[0], floatval($engineInfo[1]), 'n/a', 'n/a'];
    if (count($engineInfo) > 2) {
        if (is_numeric($engineInfo[2])) {
            $displacement = floatval($engineInfo[2]);
        } else {
            $efficiency = $engineInfo[2];
        }
    }
    if (count($engineInfo) > 3) {
        $efficiency = $engineInfo[3];
    }
    $engine = new Engine($model, $power, $displacement, $efficiency);
    $engines[$model] = $engine;
}
$m = intval(trim(fgets(STDIN)));
$cars = [];
for ($i = 0; $i < $m; $i++) {
    $carInfo = explode(" ", trim(fgets(STDIN)));
    list($model, $carEngine, $weight, $color) =
        [$carInfo[0], $carInfo[1], 'n/a', 'n/a'];
    if (count($carInfo) > 2) {
        if (is_numeric($carInfo[2]) && $carInfo[2] != 0) {
            $weight = floatval($carInfo[2]);
        } else {
            $color = $carInfo[2];
        }
    }
    if (count($carInfo) > 3) {
        $color = $carInfo[3];
    }
    $carEngine = $engines[$carEngine];
    $car = new Car($model, $carEngine, $weight, $color);
    $cars[] = $car;
}
foreach ($cars as $car){
    echo $car;
}