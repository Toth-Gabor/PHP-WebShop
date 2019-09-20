<?php


class product {

    private $id;
    private $name;
    private $brand;
    private $specification;
    private $description;
    private $price;
    private $quantity;
    private $image;
    private $category;

    public function __construct($id, $name, $brand, $specification, $description, $price, $quantity, $image, $category)
    {
        $this->id = $id;
        $this->name = $name;
        $this->brand = $brand;
        $this->specification = $specification;
        $this->description = $description;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->image = $image;
        $this->category = $category;
    }

}