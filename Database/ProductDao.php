<?php


interface ProductDao
{
    public function GetAll();
    public function GetOneById($product_id);
    public function GetAllByIds($productIdList);
    public function GetAllByCategory($category);
    public function DecrementQty($product_id, $cart_qty);
    public function IncrementQty($product_id, $cart_qty);
    public function GetCurrentQuantity($product_id);
    public function UpdateQty($new_qty, $product_id);
    public function Add($name, $brand, $specification, $description,
                        $price, $quantity, $image, $category);
}