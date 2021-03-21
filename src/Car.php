<?php

use MyCLabs\Enum\Enum;

final class CarColors extends Enum
{
    private const PINK = 'pink';
    private const RED = 'red';
    private const BLUE = 'blue';
    private const GREEN = 'green';
}

final class CarMakes extends Enum
{
    const OPEL = 'opel';
    const POLONEZ = 'polonez';
    const FERRARI = 'ferrari';
    const NISSAN = 'nissan';
}

final class Car
{
    private $color;
    private $make;
    private $fuelConsumption;
    private $tankCapacity;

    public function __construct(CarColors $color, CarMakes $make, float $fuelConsumption, int $tankCapacity)
    {
        $this->color = $color;
        $this->make = $make;
        $this->fuelConsumption = $fuelConsumption;
        $this->tankCapacity = $tankCapacity;
    }
}
