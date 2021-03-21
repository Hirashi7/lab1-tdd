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
}
