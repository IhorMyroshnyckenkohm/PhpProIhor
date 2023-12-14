<?php

class TaxiSystem
{
    public static function createTaxi($type): Taxi
    {
        return match (strtolower($type)) {
            'economy' => new EconomyTaxi(),
            'standard' => new StandardTaxi(),
            'lux' => new LuxTaxi(),
            default => throw new InvalidArgumentException("Invalid taxi type: $type"),
        };
    }
}

abstract class Taxi
{
    public string $model;
    public int|float $price;

    abstract function createCar(): void;
    abstract function __construct();

}

class EconomyTaxi extends Taxi
{
    public function __construct()
    {
        $this->createCar();
    }

    public function createCar(): void
    {
        $this->model = 'Toyota';
        $this->price = 10;
    }
}

class StandardTaxi extends Taxi
{
    public function __construct()
    {
        $this->createCar();
    }

    public function createCar(): void
    {
        $this->model = 'Honda';
        $this->price = 20;
    }
}

class LuxTaxi extends Taxi
{
    public function __construct()
    {
        $this->createCar();
    }

    public function createCar(): void
    {
        $this->model = 'Mercedes';
        $this->price = 50;
    }
}

try {
    $selectedTaxiType = 'economy';
    $taxi = TaxiSystem::createTaxi($selectedTaxiType);

    echo " Model: " . $taxi->model;
    echo " Price: $" . $taxi->price;
} catch (InvalidArgumentException $e) {
    echo $e->getMessage();
}
