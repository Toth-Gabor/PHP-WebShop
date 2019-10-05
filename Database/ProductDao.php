<?php


interface ProductDao
{
    public function GetAll();
    public function GetOneById($product_id);
    public function GetAllByIds($productIdList);
    public function GetAllByCategory($category);
    public function GetCurrentQuantity($product_id);
    public function UpdateQty($new_qty, $product_id);
    public function Create($name, $brand, $specification, $description,
                           $price, $quantity, $image, $category);
    public function DeleteById($product_id);
    public function GetAllCategories();
}