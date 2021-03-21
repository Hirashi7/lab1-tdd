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
    private $fuelLevel = 0;
    private $odometer = 0;
    private $odometerLimit = 999999;
    private $dailyOdometer = 0;
    private $dailyOdometerLimit = 999;

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
        return round($this->fuelConsumption, 1);
    }

    public function getTankCapacity(): int
    {
        return $this->tankCapacity;
    }

    public function getFuelLevel(): float
    {
        return $this->fuelLevel;
    }

    public function getOdometer(): int
    {
        return $this->odometer;
    }

    public function getDailyOdometer(): float
    {
        return $this->dailyOdometer;
    }

    public function refuel(float $litres_of_fuel): void
    {
        if ($litres_of_fuel < 0) {
            return;
        }

        if (($this->fuelLevel + $litres_of_fuel) > $this->tankCapacity) {
            $this->fuelLevel = $this->tankCapacity;

            return;
        }

        $this->fuelLevel += $litres_of_fuel;
    }

    public function drive(float $distanceInKilometers): void
    {
        $distanceFuelConsumption = $this->fuelConsumption / 100 * $distanceInKilometers;

        if ($distanceFuelConsumption > $this->fuelLevel) {
            $maxDistanceDrivedOnCurrentFuel = $this->fuelLevel / $this->fuelConsumption * 100;

            $this->fuelLevel = 0;
            $this->updateOdometer($maxDistanceDrivedOnCurrentFuel);
            $this->updateDailyOdometer($maxDistanceDrivedOnCurrentFuel);

            return;
        }

        $this->fuelLevel -= $distanceFuelConsumption;

        $this->updateOdometer($distanceInKilometers);
        $this->updateDailyOdometer($distanceInKilometers);
    }

    private function updateOdometer(float $distanceInKilometers): void
    {
        $this->odometer += $distanceInKilometers;

        while ($this->odometer > $this->odometerLimit) {
            $this->odometer -= $this->odometerLimit;
        }
    }

    private function updateDailyOdometer(float $distanceInKilometers): void
    {
        $this->dailyOdometer += $distanceInKilometers;

        while ($this->dailyOdometer > $this->dailyOdometerLimit) {
            $this->dailyOdometer -= $this->dailyOdometerLimit;
        }
    }
}
