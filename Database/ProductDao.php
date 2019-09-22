<?php


interface ProductDao
{
    public function GetAll();
    public function GetOneById($product_id);
    public function GetAllByCategory($category);
}