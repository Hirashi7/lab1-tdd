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
    private const OPEL = 'opel';
    private const POLONEZ = 'polonez';
    private const FERRARI = 'ferrari';
    private const NISSAN = 'nissan';
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

    public function getColor(): CarColors
    {
        return $this->color;
    }

    public function getMake(): CarMakes
    {
        return $this->make;
    }

    public function getFuelConsumption(): float
    {
        return $this->fuelConsumption;
    }

    public function getTankCapacity(): int
    {
        return $this->tankCapacity;
    }
}