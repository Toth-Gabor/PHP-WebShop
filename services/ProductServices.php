<?php

interface ProductServices{

    public function ReadAll();
    public function ReadOne($product_id);
    public function ReadAllByIds($productIdList);
    public function ReadAllByCategory($category);
    public function ReadCurrentQty($product_id);
    public function RefreshQty($new_qty, $product_id);
    public function CreateProduct($name, $brand, $specification, $description,
                                  $price, $quantity, $image, $category);
    public function RemoveById($product_id);
    public function ReadAllCategories();
}