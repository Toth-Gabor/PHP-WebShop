<?php

include_once __DIR__ . "/../../Database/Dao/DatabaseProductDao.php";
include_once __DIR__ . "/../../services/ProductServices.php";

class SimpleProductServices implements ProductServices {

    private $productDao;

    public function __construct()
    {
        $this->productDao = new DatabaseProductDao();
    }

    public function CreateProduct($name, $brand, $specification, $description, $price, $quantity, $image, $category)
    {
        $this->productDao->Create($name, $brand, $specification, $description, $price, $quantity, $image, $category);
    }


    public function ReadAll()
    {
        return $this->productDao->GetAll();
    }

    public function ReadOne($product_id)
    {
        return $this->productDao->GetOneById($product_id);
    }

    public function ReadAllByIds($productIdList)
    {
        return $this->ReadAllByIds($productIdList);
    }

    public function AddToQty($cart_items)
    {
        // TODO: Implement AddToQty() method.
    }

    public function RemoveFromQty($cart_items)
    {
        // TODO: Implement RemoveFromQty() method.
    }

    public function ReadCurrentQty($product_id)
    {
         return $this->productDao->GetCurrentQuantity($product_id);
    }

    public function RefreshQty($new_qty, $product_id)
    {
        $this->RefreshQty($new_qty,$product_id);
    }
}