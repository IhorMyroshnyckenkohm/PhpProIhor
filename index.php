<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/src/const.php';

try {
    require_once __DIR__ . '/app/index.php';
} catch (Exception $exception) {
    dd($exception->getCode() .' - '. $exception->getMessage());
}


interface d{
    public const age = 2;
    public function f();
}
abstract class ds{
    public $age = 2;
    abstract public function fs();
}

class dd implements d{

    public function f()
    {
        // TODO: Implement f() method.
    }
}


