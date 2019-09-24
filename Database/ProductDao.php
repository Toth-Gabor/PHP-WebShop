<?php


interface ProductDao
{
    public function GetAll();
    public function GetOneById($product_id);
    public function GetAllByIds($productIdList);
    public function GetAllByCategory($category);
    public function DecrementQuantity($quantity);
    public function IncrementQuantity($quantity);
}