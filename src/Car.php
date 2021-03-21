<?php

final class Car
{
    private $color;
    private $make;
    private $fuelConsumption;
    private $tankCapacity;

    public function __construct(string $color, string $make, float $fuelConsumption, int $tankCapacity)
    {
        $this->color = $color;
        $this->make = $make;
        $this->fuelConsumption = $fuelConsumption;
        $this->tankCapacity = $tankCapacity;
    }
}
