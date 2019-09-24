<?php

include_once __DIR__ . "/../../Database/Dao/DatabaseProductDao.php";
include_once __DIR__ . "/../../services/ProductServices.php";

class SimpleProductServices implements ProductServices {

    private $productDao;

    public function __construct()
    {
        $this->productDao = new DatabaseProductDao();
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
}