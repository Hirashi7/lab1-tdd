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
    }

    public function testCarHasValidPropertiesGetters()
    {
        $car = new Car(CarColors::PINK(), CarMakes::POLONEZ(), 13.498, 2);

        $this->assertTrue($car->getColor() == CarColors::PINK(), 'Color getter is invalid');
        $this->assertTrue($car->getMake() == CarMakes::POLONEZ(), 'Make getter is invalid');
        $this->assertTrue(13.5 === $car->getFuelConsumption(), 'Fuel consumption getter is invalid');
        $this->assertTrue(2 === $car->getTankCapacity(), 'Tank capacity getter is invalid');
    }
}
