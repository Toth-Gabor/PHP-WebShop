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

    public function __construct($id, $name, $brand, $specification, $description,
                                $price, $quantity, $image, $category)
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

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getBrand()
    {
        return $this->brand;
    }

    public function setBrand($brand): void
    {
        $this->brand = $brand;
    }

    public function getSpecification()
    {
        return $this->specification;
    }

    public function setSpecification($specification): void
    {
        $this->specification = $specification;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description): void
    {
        $this->description = $description;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price): void
    {
        $this->price = $price;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setQuantity($quantity): void
    {
        $this->quantity = $quantity;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image): void
    {
        $this->image = $image;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory($category): void
    {
        $this->category = $category;
    }


}