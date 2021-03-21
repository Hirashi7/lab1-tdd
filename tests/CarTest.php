<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

/**
 * @internal
 * @coversNothing
 */
final class CarTest extends TestCase
{
    public function testCarCanBeCreated()
    {
        $car = new Car(CarColors::PINK(), CarMakes::POLONEZ(), 13.4, 2);
        $this->assertInstanceOf(Car::class, $car);
    }

    public function testCarHasPropertiesGetters()
    {
        $car = new Car(CarColors::PINK(), CarMakes::POLONEZ(), 13.498, 2);

        $this->assertTrue(method_exists($car, 'getColor'));
        $this->assertTrue(method_exists($car, 'getMake'));
        $this->assertTrue(method_exists($car, 'getFuelConsumption'));
        $this->assertTrue(method_exists($car, 'getTankCapacity'));
        $this->assertTrue(method_exists($car, 'getFuelLevel'));
        $this->assertTrue(method_exists($car, 'getOdometer'));
        $this->assertTrue(method_exists($car, 'getDailyOdometer'));
    }

    public function testCarHasValidPropertiesGetters()
    {
        $car = new Car(CarColors::PINK(), CarMakes::POLONEZ(), 13.498, 2);

        $this->assertTrue($car->getColor() == CarColors::PINK(), 'Color getter is invalid');
        $this->assertTrue($car->getMake() == CarMakes::POLONEZ(), 'Make getter is invalid');
        $this->assertTrue(13.5 === $car->getFuelConsumption(), 'Fuel consumption getter is invalid');
        $this->assertTrue(2 === $car->getTankCapacity(), 'Tank capacity getter is invalid');
        $this->assertIsFloat($car->getFuelLevel(), 'Fuel level has wrong type');

        // Odometer
        $this->assertIsInt($car->getOdometer(), 'Odometer has wrong type');
        $this->assertGreaterThanOrEqual(0, $car->getOdometer(), 'Odometer has wrong value');
        $this->assertLessThan(1000000, $car->getOdometer(), 'Odometer has wrong type');

        // Daily odometer
        $this->assertIsFloat($car->getDailyOdometer(), 'Daily odometer has wrong type');
        $this->assertGreaterThanOrEqual(0, $car->getDailyOdometer(), 'Daily odometer has wrong type');
        $this->assertLessThan(1000, $car->getDailyOdometer(), 'Daily odometer has wrong type');
    }

    public function testCarCanRefuel()
    {
        $car = new Car(CarColors::PINK(), CarMakes::POLONEZ(), 13.498, 40);

        $this->assertTrue(method_exists($car, 'refuel'));
    }

    public function testCarRefuelValid()
    {
        $car = new Car(CarColors::PINK(), CarMakes::POLONEZ(), 13.498, 40);

        $car->refuel(30);
        $car->refuel(30);
        $car->refuel(30);

        $this->assertGreaterThanOrEqual(30, $car->getFuelLevel());
        $this->assertLessThanOrEqual($car->getTankCapacity(), $car->getFuelLevel());
    }

    public function testCarRefuelCannotBeNegative()
    {
        $car = new Car(CarColors::PINK(), CarMakes::POLONEZ(), 13.498, 40);
        $oldfuelLevel = $car->getFuelLevel();

        $car->refuel(-100);

        $this->assertSame($car->getFuelLevel(), $oldfuelLevel);
    }

    public function testCarCanDrive()
    {
        $car = new Car(CarColors::PINK(), CarMakes::POLONEZ(), 13.498, 40);

        $this->assertTrue(method_exists($car, 'drive'));
    }

    public function testCarDriveConsumesFuel()
    {
        $car = new Car(CarColors::PINK(), CarMakes::POLONEZ(), 10, 40);

        $car->refuel(40);

        $fuelLevel = $car->getFuelLevel();

        $car->drive(20);

        $this->assertSame($car->getFuelLevel(), $fuelLevel - (10 / 100 * 20));
    }
}
