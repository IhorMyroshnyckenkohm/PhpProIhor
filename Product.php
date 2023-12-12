<?php

class Product {
    public function get($name) {}
    public function set($name, $value) {}
}


class ProcessProduct{
    public function save(Product $product) {}
    public function update(Product $product) {}
    public function delete(Product $product) {}

}
class ViewProduct{
    public function show(Product $product) {}
    public function print(Product $product) {}
}

