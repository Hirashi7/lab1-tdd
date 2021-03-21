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
        $car = new Car('pink', 'Polonez', 13.4, 2);
        $this->assertInstanceOf(Car::class, $car);
    }
}
