<?php

class TaxiSystem
{
    public static function createTaxi($type): Taxi
    {
        return match ($type) {
            'Economy' => new EconomyTaxi(),
            'Standard' => new StandardTaxi(),
            'Lux' => new LuxTaxi(),
            default => throw new InvalidArgumentException("Invalid taxi type: $type"),
        };
    }
}

abstract class Taxi
{
    protected string $model;
    protected int|float $price;

    public function getModel(): string
    {
        return $this->model;
    }

    public function getPrice(): float|int
    {
        return $this->price;
    }
}

class EconomyTaxi extends Taxi
{
    public function __construct()
    {
        $this->model = 'Toyota';
        $this->price = 10;
    }
}

class StandardTaxi extends Taxi
{
    public function __construct()
    {
        $this->model = 'Honda';
        $this->price = 20;
    }
}

class LuxTaxi extends Taxi
{
    public function __construct()
    {
        $this->model = 'Mercedes';
        $this->price = 50;
    }
}

try {
    $selectedTaxiType = 'Standard';
    $taxi = TaxiSystem::createTaxi($selectedTaxiType);

    echo " Model: " . $taxi->getModel();
    echo " Price: $" . $taxi->getPrice();
} catch (InvalidArgumentException $e) {
    echo $e->getMessage();
}
